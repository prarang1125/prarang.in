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
                        //  ->orderByRaw('CAST(approveDate AS DATE) DESC')
                         ->orderByRaw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y') DESC")
                        //   ->orderBy('chittiId', 'desc')
                         ->with(['tagMappings.tag', 'images'])  // Eager load tagMappings and related tag
                         ->paginate(35);
        
        $postsByMonth = $chittis->groupBy(function ($chitti) {
            return \Carbon\Carbon::parse($chitti->dateOfApprove)->format('F Y');
        })->map(function ($chittis) {
            return $chittis->map(function ($chitti) {
                // Retrieve image or use default
                $imageUrl = $chitti->images->first()->imageName ?? asset('default_image.jpg');  // Get the first image
    
                // Get all tags related to this Chitti and join them by commas
                $tags = $chitti->tagMappings->map(function ($tagMapping) {
                    return $tagMapping->tag->tagInEnglish;  // Access the related tag's tagInEnglish
                })->filter()->join(', ');  // Join tags by comma if there are multiple
    
                // Return formatted data
                return [
                    'id' => $chitti->chittiId,
                    'title' => $chitti->Title,
                    'subTitle' => $chitti->SubTitle,
                    'description' => $chitti->description,
                    'imageUrl' => $imageUrl,
                    'tags' => $tags,
                    'createDate' => $chitti->dateOfApprove,
                    // 'color'=>$chitti->;
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
        // Fetch the specific post along with related images and tags
        $post = Chitti::where('chittiId', $postId)
                      ->where('finalStatus', 'approved')
                      ->with(['tagMappings.tag', 'images'])  // Eager load related data
                      ->first();
                     
        
        if (!$post) {
            abort(404, 'Post not found');
        }
    
        // Fetch related geography data
        $geography = ChittiGeography::where('chittiId', $postId)->first();
        
        $formattedDate = $post->createDate ? Carbon::parse($post->createDate)->format('Y-m-d H:i:s') : 'N/A';
    
        // Fetch the previous and next post IDs
        $previousPost = Chitti::where('chittiId', '<', $postId)
                              ->where('finalStatus', 'approved')
                              ->orderBy('chittiId', 'desc')
                              ->first();
    
        $nextPost = Chitti::where('chittiId', '>', $postId)
                          ->where('finalStatus', 'approved')
                          ->orderBy('chittiId', 'asc')
                          ->first();
        
        // Fetch recent posts excluding the current one
        $recentPosts = Chitti::where('finalStatus', 'approved')
                             ->where('chittiId', '!=', $postId)
                             ->orderBy('chittiId', 'desc')
                             ->take(5)
                             ->get();
        
        // Add image URL and formatted date for recent posts
        $recentPostsFormatted = $recentPosts->map(function ($recent) {
            
            $recent->imageUrl = ChittiImageMapping::where('chittiId', $recent->chittiId)->value('imageName') ?? 'images/default_image.jpg';
            $recent->formattedDate = $recent->createDate ? Carbon::parse($recent->createDate)->format('d-m-Y H:i A') : 'N/A';
            return $recent;
        });
        $post->tagInUnicode = $post->tagMappings->first()->tag->tagInUnicode;

        // Return the view with all necessary data
        return view('portal.post-summary', [
            'post' => $post,
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
            'recentPosts' => $recentPostsFormatted,
            'cityCode' => $geography ? $geography->Geography : null,
        ]);
    }
    
    
}
