<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    public function submitVideo(Request $request)
    {
        // Validate the request

        Log::info('Video submission request received', [
            'user_id' => Auth::id(),
            'video_file' => $request->hasFile('video_file'),
            'video_link' => $request->video_link,
        ]);

        $request->validate([
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:200000',
            'video_link' => 'nullable|url',
        ]);

        if (!$request->hasFile('video_file') && !$request->video_link) {
            return redirect()->back()->withErrors('Please provide either a video file or a video link.');
        }

        $user = Auth::user();

        if ($request->hasFile('video_file')) {
            $videoPath = $request->file('video_file')->store('videos', 'public');
            $user->video_file = $videoPath;
            $user->video_link = null; // Clear the link if a file is uploaded
        } else {
            $user->video_link = $request->video_link;
            $user->video_file = null; // Clear the file if a link is provided
        }

        $user->video_submitted_at = now(); // Save the current timestamp
        $user->save();

        return redirect()->route('submit')->with('success', 'Video submitted successfully!');
    }
}