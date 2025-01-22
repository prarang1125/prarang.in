<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
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

            // Create an Intervention Image instance
            $image = Image::make($fileContent);

            // Manipulate the image (e.g., resize, add watermark, etc.)
            $image->resize(300, null, function ($constraint) {
                $constraint->aspectRatio(); // Maintain aspect ratio
            });

            // Optional: Add watermark text
            $image->text('Your Watermark', 10, 10, function ($font) {
                $font->size(24);
                $font->color('#ffffff');
                $font->align('left');
                $font->valign('top');
            });

            // Return the manipulated image as a response
            return $image->response('png'); // or 'jpg' based on your requirement
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to process the image: ' . $e->getMessage()], 500);
        }

    }
}
