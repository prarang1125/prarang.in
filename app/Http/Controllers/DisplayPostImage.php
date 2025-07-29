<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DisplayPostImage extends Controller
{
    public function serveImage($filename)
    {
        $url = "https://prarang.s3.ap-south-1.amazonaws.com/" . $filename;
        return redirect($url);
    }
}
