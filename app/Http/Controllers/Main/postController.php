<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\Chitti;
use App\Models\ChittiGeography;
use App\Models\ChittiImageMapping;
use App\Models\Color;
use App\Models\Geography;
use App\Models\Portal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    public function getChittiData($city, $name = null, $forAbour = null)
    {
        $portal = Portal::where('slug', $city)->firstOrFail();

        $geography = Geography::where('geographycode', $portal->city_code)->first();
        if (! $geography) {
            return abort(404, 'Geography not found');
        }

        // Get Chitti IDs related to the geography
        $chittiIds = ChittiGeography::where('Geography', $geography->geographycode)
            ->pluck('chittiId');

        // Fetch Chittis with eager loading for images and tags, ordered by createDate desc
        return $chittis = Chitti::whereIn('chittiId', $chittiIds)
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
                ];
            });
        });

        // Return view with data
        return view('portal.post', [
            'city_name' => $city,
            'postsByMonth' => $postsByMonth,
            'cityCode' => $geography->geographycode,
            'chittis' => $chittis,
            'name' => $name,
        ]);
    }

    // public function post_summary($slug,$postId)
    // {

    //     $post = Chitti::where('chittiId', $postId)
    //                   ->where('finalStatus', 'approved')
    //                   ->with(['tagMappings.tag', 'images'])  // Eager load related data
    //                   ->first();

    //     $color=Color::where('id', $post->color_value)->first();
    //     $ColorCode=$color->colorcode;
    //     if (!$post) {
    //         abort(404, 'Post not found');
    //     }

    //     // Fetch related geography data
    //     $geography = ChittiGeography::where('chittiId', $postId)->first();

    //     $formattedDate = $post->createDate ? Carbon::parse($post->createDate)->format('Y-m-d H:i:s') : 'N/A';

    //     $portal = Portal::where('city_code', $geography->Geography)->firstOrFail();

    //     // Fetch the previous and next post IDs
    //     $previousPost = Chitti::where('chittiId', '<', $postId)
    //                           ->where('finalStatus', 'approved')

    //                           ->orderBy('chittiId', 'desc')
    //                           ->first();

    //     $nextPost = Chitti::where('chittiId', '>', $postId)
    //                       ->where('finalStatus', 'approved')
    //                       ->orderBy('chittiId', 'asc')
    //                       ->first();

    //     // Fetch recent posts excluding the current one
    //     $recentPosts = Chitti::where('finalStatus', 'approved')
    //                          ->where('chittiId', '!=', $postId)
    //                         //  ->where('areaId', $portal->city_code)
    //                          ->orderBy('chittiId', 'desc')
    //                          ->take(5)
    //                          ->get();

    //     // Add image URL and formatted date for recent posts
    //     $recentPostsFormatted = $recentPosts->map(function ($recent) {

    //         $recent->imageUrl = ChittiImageMapping::where('chittiId', $recent->chittiId)->value('imageName') ?? 'images/default_image.jpg';
    //         $recent->formattedDate = $recent->createDate ? Carbon::parse($recent->createDate)->format('d-m-Y H:i A') : 'N/A';
    //         return $recent;
    //     });

    //     $post->tagInUnicode = $post->tagMappings->first()->tag->tagInUnicode;

    //     // Return the view with all necessary data
    //     return view('portal.post-summary', [
    //         'city_name' =>$portal->slug,
    //         'post' => $post,
    //         'previousPost' => $previousPost,
    //         'ColorCode' => $ColorCode,
    //         'nextPost' => $nextPost,
    //         'recentPosts' => $recentPostsFormatted,
    //         'cityCode' => $geography ? $geography->Geography : null,
    //     ]);

    // }

    //updated public function post_summary($slug, $postId)

    public function post_summary($slug, $postId)
    {
        // Fetch the current post with relationships
        $post = Chitti::where('chittiId', $postId)
            ->where('finalStatus', 'approved')
            ->with(['tagMappings.tag', 'images', 'color'])
            ->firstOrFail();

        // Post color
        $ColorCode = $post->color->colorcode ?? '#FFFFFF';

        // Geography and Portal
        $geography = $post->geography;
        $portal = Portal::where('slug', $slug)->firstOrFail();

        // Previous and Next Posts
        $startDate = Carbon::createFromFormat('d-m-Y H:i A', trim($post->dateOfApprove))->subDay()->format('d-m-Y').' 00:00';
        $endDate = Carbon::createFromFormat('d-m-Y H:i A', trim($post->dateOfApprove))->subDay()->format('d-m-Y').' 23:59';

        $previousPost = DB::table('chitti')
            ->join('vChittiGeography as vg', 'vg.chittiId', '=', 'chitti.chittiId')
            ->whereBetween('chitti.dateOfApprove', [$startDate, $endDate])
            ->where('chitti.finalStatus', 'approved')
            ->where('vg.Geography', $portal->city_code)
            ->first();

        $startDate = Carbon::createFromFormat('d-m-Y H:i A', trim($post->dateOfApprove))->addDay()->format('d-m-Y').' 00:00';
        $endDate = Carbon::createFromFormat('d-m-Y H:i A', trim($post->dateOfApprove))->addDay()->format('d-m-Y').' 23:59';

        $nextPost = DB::table('chitti')
            ->join('vChittiGeography as vg', 'vg.chittiId', '=', 'chitti.chittiId')
            ->whereBetween('chitti.dateOfApprove', [$startDate, $endDate])
            ->where('chitti.finalStatus', 'approved')
            ->where('vg.Geography', $portal->city_code)
            ->first();

        // Recent Posts
        $recentPosts = Chitti::whereHas('geography.portal', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->where('chittiId', '!=', $postId)
            ->orderBy('chittiId', 'desc')
            ->where('finalStatus', 'approved')
            ->take(5)
            ->get()
            ->map(function ($recent) {
                $recent->imageUrl = optional($recent->images->first())->imageName ?? 'images/default_image.jpg';
                $recent->formattedDate = $recent->createDate ? Carbon::parse($recent->createDate)->format('d-m-Y H:i A') : 'N/A';

                return $recent;
            });

        $post->tagInUnicode = $post->tagMappings->first()->tag->tagInUnicode;

        // Return view
        return view('portal.post-summary', [
            'post' => $post,
            'slug' => $slug,
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
            'recentPosts' => $recentPosts,
            'cityCode' => $geography->Geography ?? null,
            'ColorCode' => $ColorCode,
            'city_name' => $portal->slug ?? 'Unknown',
        ]);
    }
}
