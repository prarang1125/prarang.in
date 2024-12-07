<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Geography;
use App\Models\ChittiImageMapping;
use App\Models\Portal;
use App\Models\Chitti;
use Carbon\Carbon;
use App\Models\ChittiGeography;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    public function getChittiData($city,$name=null)
    {
        // Fetch portal by city slug
        $portal = Portal::where('slug', $city)->firstOrFail(); 
        
        // Fetch related geography data2
        $geography = Geography::where('geographycode', $portal->city_code)->first();
        if (!$geography) {
            return abort(404, 'Geography not found');
        }
    
        // Get Chitti IDs related to the geography
        $chittiIds = ChittiGeography::where('Geography', $geography->geographycode)
                                     ->pluck('chittiId');
        
        // Fetch Chittis with eager loading for images and tags, ordered by createDate desc
        $chittis = Chitti::whereIn('chittiId', $chittiIds)
                         ->where('finalStatus', 'approved')
                         ->orderBy('chittiId', 'desc') // Add ordering by createDate desc
                         ->with(['images', 'tags.tag'])                         
                         ->paginate(35);

        
        $postsByMonth = $chittis->groupBy(function ($chitti) {
            return \Carbon\Carbon::parse($chitti->createDate)->format('F Y');
        })->map(function ($chittis) {
            return $chittis->map(function ($chitti) {
                // Retrieve image or use default
                $imageUrl = ChittiImageMapping::where('chittiId', $chitti->chittiId)->value('imageName') ?? asset('default_image.jpg');
                // Return formatted data
                return [
                    'id'=> $chitti->chittiId,
                    'title' => $chitti->Title,
                    'subTitle' => $chitti->SubTitle,
                    'description' => $chitti->description,
                    'imageUrl' => $imageUrl,
                    'createDate' => $chitti->createDate,
                ];
            });
        });
    
        // Return view with data
        return view('portal.post', [
            'city_name' => $city,
            'postsByMonth' => $postsByMonth,
            'cityCode'=>$geography->geographycode,
            'chittis'=>$chittis,
            'name'=>$name
        ]);
    }
    
    public function post_summary($postId)
    {
        // Fetch the specific post along with related images
        $post = Chitti::where('chittiId', $postId)
                      ->where('finalStatus', 'approved')
                      ->with('images') // Ensure the 'images' relationship is defined in Chitti model
                      ->first();

        $geography = ChittiGeography::where('chittiId', $postId)->first();

        // Get the main image URL from the ChittiImageMapping table or fallback to default
        $imageUrl = ChittiImageMapping::where('chittiId', $postId)->value('imageName') ?? 'images/default_image.jpg';    
        // Format the creation date of the main post
        $formattedDate = $post->createDate ? Carbon::parse($post->createDate)->format('Y-m-d H:i:s') : 'N/A';

        $recentPosts = Chitti::where('finalStatus', 'approved')
                             ->where('chittiId', '!=', $postId)
                             ->orderBy('chittiId', 'desc')
                             ->take(5)
                             ->get();
        $recentPostsFormatted = $recentPosts->map(function ($recent) {
          
            // Get the first image for the recent post
            $recent->imageUrl  = ChittiImageMapping::where('chittiId', $recent->chittiId)->value('imageName') ?? 'images/default_image.jpg';

            // Format the creation date
            $recent->formattedDate = $recent->createDate ? Carbon::parse($recent->createDate)->format('d-m-Y H:i A') : 'N/A';
            return $recent;
        });
      
    
        // Prepare main post details for the view
        // $postDetails = [
        //     'title' => $post->Title,
        //     'subTitle' => $post->SubTitle,
        //     'description' => $post->description,
        //     'imageUrl' => $imageUrl,
        //     'createDate' => $formattedDate,
        //     ''

        // ];
    
        // Return the view with post details and recent posts
        return view('portal.post-summary', [
            'post' => $post,
            'recentPosts' => $recentPostsFormatted,
            'cityCode'=>$geography->Geography,
        ]);
    }

}
