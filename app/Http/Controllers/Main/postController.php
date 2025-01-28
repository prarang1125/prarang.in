<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\Chitti;
use App\Models\ChittiGeography;
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

        $chittiIds = ChittiGeography::where('Geography', $geography->geographycode)
            ->pluck('chittiId');

        $chittis = Chitti::whereIn('chittiId', $chittiIds)
            ->where('finalStatus', 'approved')

            ->orderByRaw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y') DESC")

            ->with(['tagMappings.tag', 'images'])
            ->paginate(35);

        $postsByMonth = $chittis->groupBy(function ($chitti) {
            return \Carbon\Carbon::parse($chitti->dateOfApprove)->format('F Y');
        })->map(function ($chittis) {
            return $chittis->map(function ($chitti) {

                $imageUrl = $chitti->images->first()->imageUrl ?? asset('default_image.jpg');

                $tags = $chitti->tagMappings->map(function ($tagMapping) {
                    return $tagMapping->tag->tagInEnglish;
                })->filter()->join(', ');

                return [
                    'id' => $chitti->chittiId,
                    'title' => $chitti->Title,
                    'subTitle' => $chitti->SubTitle,
                    'description' => $chitti->description,
                    'imageUrl' => $imageUrl,
                    'tags' => $tags,
                    'color' => $chitti->color->colorcode ?? '',
                    'createDate' => $chitti->dateOfApprove,
                ];
            });
        });

        return view('portal.post', [
            'city_name' => $city,
            'postsByMonth' => $postsByMonth,
            'cityCode' => $geography->geographycode,
            'chittis' => $chittis,
            'name' => $name,
            'portal'=>$portal,
           'isTags'=>false,
        ]);
    }

    //updated public function post_summary($slug, $postId)

    public function post_summary($slug, $postId)
    {

        $post = Chitti::where('chittiId', $postId)
            ->where('finalStatus', 'approved')
            ->with(['tagMappings.tag', 'images', 'color'])
            ->firstOrFail();

        $ColorCode = $post->color->colorcode ?? '';

        $geography = $post->geography;
        $portal = Portal::where('slug', $slug)->firstOrFail();

        $previousPost = $this->postButton($post, $portal, 'pre');
        $nextPost = $this->postButton($post, $portal, 'next');

        $recentPosts = Chitti::whereHas('geography.portal', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->where('chittiId', '!=', $postId)
            ->orderBy('chittiId', 'desc')
            ->where('finalStatus', 'approved')
            ->take(3)
            ->get()
            ->map(function ($recent) {
                $recent->imageUrl = optional($recent->images->first())->imageUrl ?? 'images/default_image.jpg';
                $recent->formattedDate = $recent->createDate ? Carbon::parse($recent->createDate)->format('d-m-Y H:i A') : 'N/A';

                return $recent;
            });

        $post->tagInUnicode = $post->tagMappings->first()->tag->tagInUnicode;

        return view('portal.post-summary', [
            'post' => $post,
            'slug' => $slug,
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
            'recentPosts' => $recentPosts,
            'cityCode' => $geography->Geography ?? null,
            'ColorCode' => $ColorCode,
            'city_name' => $portal->slug ?? 'Unknown',
            'portal' => $portal,
        ]);
    }

    private function postButton($post, $portal, $dateWise)
    {
        // Adjust date based on $dateWise
        $dateAdjustment = match ($dateWise) {
            'pre' => Carbon::createFromFormat('d-m-Y H:i A', trim($post->dateOfApprove))->subDay(),
            'next' => Carbon::createFromFormat('d-m-Y H:i A', trim($post->dateOfApprove))->addDay(),
        };

        // Format start and end dates
        $startDate = $dateAdjustment->format('d-m-Y').' 00:00';
        $endDate = $dateAdjustment->format('d-m-Y').' 23:59';

        // Query the database
        return DB::table('chitti')
            ->join('vChittiGeography as vg', 'vg.chittiId', '=', 'chitti.chittiId')
            ->whereBetween('chitti.dateOfApprove', [$startDate, $endDate])
            ->where('chitti.finalStatus', 'approved')
            ->where('vg.Geography', $portal->city_code)
            ->first();
    }
}
