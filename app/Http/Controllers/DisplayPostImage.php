<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DisplayPostImage extends Controller
{
    public function serveImage($filename)
{
    try {
        // AWS S3 se image ka path
        $s3Path = "{$filename}";

        // Check if the file exists in S3
        if (!Storage::disk('s3')->exists($s3Path)) {
            abort(404, 'Image not found');
        }

        // Image content fetch karein
        $fileContent = Storage::disk('s3')->get($s3Path);
        
        // File ka MIME type get karein
        $mimeType = Storage::disk('s3')->mimeType($s3Path);

        // Response with correct headers
        return response($fileContent)
                ->header('Content-Type', 'image/png')
                ->header('Content-Disposition', 'inline');
                // ->header('Cache-Control', 'max-age=2592000'); 

    } catch (\Exception $e) {
        return response()->json(['error' => 'Unable to process the image: ' . $e->getMessage()], 500);
    }
}
   
}
