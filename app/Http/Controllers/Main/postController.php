<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Geography;
use App\Models\Chitti;


class postController extends Controller
{
    // public function index($slug)
    // {
    //     $posts = Portal::where('slug', $slug)->get();
    //     print_r($posts);die;
    //     return view('portal.post', compact('posts'));
    // }


    public function getChittiData($city)
    {
        // Step 1: Fetch Geography based on City Name
        $geography = Geography::where('geography', 'like', $city)->first();
    
        if (!$geography) {
            return response()->json(['message' => 'City not found'], 404);
        }
    
        // Step 2: Fetch approved chittis with related data, using whereHas for efficiency
        $chittis = Chitti::where('finalStatus', 'approved')
                         ->whereHas('chittiGeographies', function ($query) use ($geography) {
                             $query->where('Geography', $geography->geographycode);
                         })
                         ->with(['chittiGeographies.geography', 'images', 'tags.tag'])
                         ->get();

                         echo '<pre>';
                         print_r($chittis);die;
                         echo '</pre>';

                         
        // Step 3: Map chitti data to structure response
        $result = $chittis->map(function ($chitti) {

            return [
                'title' => $chitti->Title,
                'subTitle' => $chitti->SubTitle,
                'description' => $chitti->description,
                'imageUrl' => $chitti->images->first()->imageUrl ?? null,
                'tags' => $chitti->tags->pluck('tag.tagInEnglish')->toArray() ?? [],
            ];
        });
    
        // Return the response as JSON
        return response()->json($result);
    }
    
}
