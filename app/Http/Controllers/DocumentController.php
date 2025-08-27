<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Google\Cloud\Storage\StorageClient;

class DocumentController extends Controller
{
    public function submitDocument(Request $request)
    {
        // Validate the request

        // Google Cloud Storage Bucket path:
        // hackathon-bi-bucket/documents/
        Log::info('Document submission request received', [
            'user_id' => Auth::id(),
            'has_document_files' => $request->hasFile('document_file'),
        ]);

        // File format PDF, JPEG/JPG, PNG • Max 300 MB per file
        $request->validate([
            'document_file' => 'required|array',
            'document_file.*' => 'file|mimes:pdf,jpeg,jpg,png|max:307200',
        ]);

        if (!$request->hasFile('document_file')) {
            return redirect()->back()->withErrors('Please provide documents for validation. e.g: KTP, KTM.');
        }

        // Ensure total documents equals number of team members
        $members = Auth::user()->member_name ? explode(',', Auth::user()->member_name) : [];
        if (count($members) != count($request->file('document_file'))) {
            Log::warning('Document count does not match member count', [
                'user_id' => Auth::id(),
                'member_count' => count($members),
                'document_count' => count($request->file('document_file')),
            ]);
            return redirect()->back()->withErrors('Jumlah file dokumen tidak sesuai dengan jumlah anggota tim.');
        }

        $user = Auth::user();

        $files = $request->file('document_file');
        $folder = 'documents';
        $bucket = env('GCS_BUCKET');
        $uploadedDocuments = [];
        $credentialsPath = storage_path('app/gcs_credentials.json');

        foreach ($files as $index => $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . $user->id . '_' . $index . '_' . uniqid() . '.' . $extension;
            $relativePath = trim($folder . '/' . $filename, '/');

            $publicUrl = null;

            try {
                if (!file_exists($credentialsPath)) {
                    throw new \RuntimeException('GCS credentials JSON not found at ' . $credentialsPath);
                }

                $gcs = new StorageClient([
                    'keyFilePath' => $credentialsPath,
                ]);
                $bucketObj = $gcs->bucket($bucket);
                $bucketObj->upload(
                    fopen($file->getRealPath(), 'r'),
                    [
                        'name' => $relativePath,
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                $publicUrl = 'https://storage.googleapis.com/' . $bucket . '/' . $relativePath;
                Log::info('Document uploaded via GCS SDK', [
                    'user_id' => $user->id,
                    'path' => $relativePath,
                ]);
            } catch (\Throwable $e) {
                Log::error('GCS SDK upload failed (document)', [
                    'error' => $e->getMessage(),
                ]);

                try {
                    config(['filesystems.disks.gcs.throw' => true]);
                    $stored = Storage::disk('gcs')
                        ->putFileAs($folder, $file, $filename, ['visibility' => 'public']);
                    Log::info('Document stored via S3-compatible disk', [
                        'stored' => $stored,
                    ]);
                    if ($stored) {
                        $publicUrl = 'https://storage.googleapis.com/' . $bucket . '/' . $relativePath;
                    }
                } catch (\Throwable $e2) {
                    Log::error('S3-compatible upload failed (document)', [
                        'error' => $e2->getMessage(),
                    ]);
                }
            }

            if (!$publicUrl) {
                return redirect()->back()->withErrors('Upload gagal untuk salah satu dokumen. Mohon coba lagi.');
            }

            $uploadedDocuments[] = [
                'url' => $publicUrl,
                'original_name' => $file->getClientOriginalName(),
            ];
        }

        $user->document_validator = json_encode($uploadedDocuments);
        $user->is_validate = false;
        $user->save();

        return redirect()->route('submit')->with('success', 'Document submitted successfully!');
    }
}