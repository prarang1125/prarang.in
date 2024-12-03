<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Geography;
use App\Models\Chitti;
use App\Models\ChittiGeography;


class postController extends Controller
{
    // public function index($slug)
    // {
    //     $posts = Portal::where('slug', $slug)->get();
    //     print_r($posts);die;
    //     return view('portal.post', compact('posts'));
    // }

    public function decodeText()
    {
        // Misencoded text
        $encodedText = "à¤®à¥‡à¤°à¤  à¤”à¤° à¤¤à¥ˆà¤®à¥‚à¤°";
        
        // Decode from ISO-8859-1 to UTF-8
        $decodedText = iconv('ISO-8859-1', 'UTF-8', $encodedText);

        // Return the decoded text
        return response()->json([
            'decoded_text' => $decodedText,  // Expected output: "मेरे और तैमूर"
        ]);
    }

    public function getChittiData($city)
    {
        // Step 1: Fetch Geography based on City Name
        $geography = Geography::where('geography', 'like', '%' . $city . '%')->first(); // Improved search for city
    
        if (!$geography) {
            return view('no_data', ['message' => 'City not found']);
        }
    
        // Step 2: Fetch approved chitti IDs related to the geography
        $chittiIds = ChittiGeography::where('Geography', $geography->geographycode)
                                    ->pluck('chittiId'); // Ensure it's pulling the correct data
        
        if ($chittiIds->isEmpty()) {
            return view('no_data', ['message' => 'No chitti found for this city']);
        }
    
        // Step 3: Fetch chittis with related data, improve error handling with optional images
        $chittis = Chitti::whereIn('chittiId', $chittiIds)
                         ->where('finalStatus', 'approved')
                         ->with(['images', 'tags.tag']) // Eager load images and tags
                         ->get();
    
        // Step 4: Map chitti data with optional image handling
        $posts = $chittis->map(function ($chitti) {
            // Use optional() to prevent errors if images or tags are null
            $imageUrl = optional($chitti->images->first())->chittiUrl ?? null;
            return [
                'title' => $chitti->Title,  // Ensure 'Title' field contains Hindi text
                'subTitle' => $chitti->SubTitle,
                'description' => $chitti->description,  // Ensure 'description' field contains Hindi text
                'imageUrl' => $imageUrl,
                'created_at' => $chitti->created_at,
            ];
        });
    
        // Step 5: Pass data to the view
        return view('portal.post', [
            'city_name' => $city,
            'posts' => $posts,
            'cityCode'=>$geography->geographycode,
        ]);
    }

}
