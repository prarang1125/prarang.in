<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Geography;
use App\Models\Chitti;
use Carbon\Carbon;
use App\Models\ChittiGeography;

class postController extends Controller
{
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
            $imageUrl = optional($chitti->images->first())->chittiUrl ?? 'default-image-url.jpg'; // Fallback to default image
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
        ]);
    }

    public function post_summary($postId)
    {
        // Fetch the post
        $post = Chitti::where('chittiId', $postId)
                      ->where('finalStatus', 'approved')
                      ->with(['images', 'tags.tag'])
                      ->first();
    
        if (!$post) {
            return view('no_data', ['message' => 'Post not found']);
        }
    
        // Ensure the 'createDate' is a Carbon instance
        $createDate = Carbon::parse($post->createDate); // Convert string to Carbon instance
    
        // Format the date as desired (example format: 'Y-m-d H:i:s')
        $formattedDate = $createDate->format('Y-m-d H:i:s'); 
    
        // Fetch recent posts
        $recentPosts = Chitti::where('finalStatus', 'approved')
                             ->where('chittiId', '!=', $postId) 
                             ->orderBy('createDate', 'desc')
                             ->take(5)
                             ->get();
    
        // Prepare post details with formatted date
        $postDetails = [
            'title' => $post->Title,
            'subTitle' => $post->SubTitle,
            'description' => $this->filterHindiContent($post->description),  // Use the helper function
            'imageUrl' => optional($post->images->first())->chittiUrl ?? 'default-image-url.jpg', // Fallback to default image
            'createDate' => $formattedDate, // Use the formatted date here
        ];
    
        // Format recent posts' created_at field
        $recentPostsFormatted = $recentPosts->map(function ($recent) {
            $recent->formattedDate = Carbon::parse($recent->createDate)->format('d-m-Y H:i A');
            return $recent;
        });
    
        // Return the data to the view
        return view('portal.post-summary', [
            'post' => $postDetails,
            'recentPosts' => $recentPostsFormatted,
        ]);
    }
    
    /**
     * Helper function to filter Hindi content from the description
     */
    private function filterHindiContent($text)
    {
        // Strip HTML tags
        $cleanText = strip_tags($text);
    
        // Filter for only Hindi characters (regex for Hindi script)
        return preg_replace('/[^अ-ह़ा-ह]+/', ' ', $cleanText); // Keep only Hindi characters
    }
}
