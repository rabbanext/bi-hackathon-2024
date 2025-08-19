<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Google\Cloud\Storage\StorageClient;

class VideoController extends Controller
{
    public function submitVideo(Request $request)
    {
        // Validate the request

        // Google Cloud Storage Bucket path:
        // hackathon-bi-bucket/videos/ 
        Log::info('Video submission request received', [
            'user_id' => Auth::id(),
            'video_file' => $request->hasFile('video_file'),
            'video_link' => $request->video_link,
        ]);

        // File format MP4, MPG/MPEG, WEBM • Max 300 MB
        $request->validate([
            // Laravel file size uses KB; 300 MB = 300 * 1024 = 307200 KB
            'video_file' => 'nullable|file|mimes:mp4,mpg,mpeg,webm|max:307200',
            'video_link' => 'nullable|url',
        ]);

        if (!$request->hasFile('video_file') && !$request->video_link) {
            return redirect()->back()->withErrors('Please provide either a video file or a video link.');
        }

        $user = Auth::user();

        if ($request->hasFile('video_file')) {
            $file = $request->file('video_file');
            $folder = 'videos';
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $bucket = env('GCS_BUCKET');
            $relativePath = trim($folder . '/' . $filename, '/');

            $publicUrl = null;

            // Prefer official Google Cloud Storage SDK using service account JSON
            $credentialsPath = storage_path('app/gcs_credentials.json');
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
                Log::info('Video uploaded via GCS SDK', [
                    'user_id' => $user->id,
                    'path' => $relativePath,
                ]);
            } catch (\Throwable $e) {
                Log::error('GCS SDK upload failed', [
                    'error' => $e->getMessage(),
                ]);

                // Fallback to S3-compatible disk if configured with HMAC keys
                try {
                    // Ensure exceptions are thrown for better visibility
                    config(['filesystems.disks.gcs.throw' => true]);
                    $stored = Storage::disk('gcs')
                        ->putFileAs($folder, $file, $filename, ['visibility' => 'public']);
                    Log::info('Video stored via S3-compatible disk', [
                        'stored' => $stored,
                    ]);
                    if ($stored) {
                        $publicUrl = 'https://storage.googleapis.com/' . $bucket . '/' . $relativePath;
                    }
                } catch (\Throwable $e2) {
                    Log::error('S3-compatible upload failed', [
                        'error' => $e2->getMessage(),
                    ]);
                }
            }

            if (!$publicUrl) {
                return redirect()->back()->withErrors('Upload gagal. Mohon coba lagi beberapa saat atau kirim tautan video.');
            }

            Log::info('User ID: ' . $user->id . 'Video URL: ' . $publicUrl);
            $user->video_file = $publicUrl;
        } else {
            Log::info('User ID: ' . $user->id . ' Video URL: ' . $request->video_link);
            $user->video_link = $request->video_link;
        }
        $user->video_submitted_at = now();
        $user->save();

        return redirect()->route('submit')->with('success', 'Video submitted successfully!');
    }
}