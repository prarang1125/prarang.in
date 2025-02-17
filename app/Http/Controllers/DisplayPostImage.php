<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DisplayPostImage extends Controller
{
    public function serveImage($filename)
    {
        try {
            // Define the S3 path based on the filename
             $s3Path = "{$filename}";

            // Check if the file exists on S3
            if (!Storage::disk('s3')->exists($s3Path)) {
                abort(404, 'Image not found');
            }

            // Get the image content from S3
            $fileContent = Storage::disk('s3')->get($s3Path);

            $response = Response::make($fileContent);
            $response->header('Content-Type', 'image/png');
            $response->header('Cache-Control','max-age=2592000');
            return $response;
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to process the image: ' ], 500);
        }
    }
}
