<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\Chitti;
use App\Models\ChittiGeography;
use App\Models\Geography;
use App\Models\Portal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Portal\Models\BiletralPortal;

class postController extends Controller
{
    public function getChittiData($city, $name = null, $forAbour = null)
    {

        $portal = Portal::select('city_name_local as title', 'slug', 'city_code as geography_code', 'header_image', 'footer_image','header_scripts')->where('slug', $city)
            ->union(
                BiletralPortal::select('title', 'slug', 'content_country_code as geography_code', 'header_image', 'footer_image','header_scripts')->where('slug', $city)
            )
            ->firstOrFail();

        $geography = Geography::where('geographycode', $portal->geography_code)->first();

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
            'title' => $portal->title,
            'postsByMonth' => $postsByMonth,
            'geographyCode' => $geography->geographycode,
            'chittis' => $chittis,
            'name' => $name,
            'portal' => $portal,
            'isTags' => false,
        ]);
    }

    //updated public function post_summary($slug, $postId)

    public function post_summary($slug, $postId)
    {
        $platform = strtolower(request()->source ?? null);

        $post = Chitti::where('chittiId', $postId)
            ->where('finalStatus', 'approved')
            ->with(['tagMappings.tag', 'images', 'color'])
            ->firstOrFail();

        $ColorCode = $post->color->colorcode ?? '';

        $geography = $post->geography;

        $portal = Portal::select('city_name_local as title', 'slug', 'city_code as geography_code', 'header_image', 'footer_image')->where('slug', $slug)
            ->union(
                BiletralPortal::select('title', 'slug', 'content_country_code as geography_code', 'header_image', 'footer_image')->where('slug', $slug)
            )
            ->firstOrFail();

        $previousPost = $this->postButton($post, $portal, 'pre');
        $nextPost = $this->postButton($post, $portal, 'next');

        $recentPosts = Chitti::whereHas('geography.portal', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->where('chittiId', '!=', $postId)
            ->whereRaw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y %h:%i %p') BETWEEN DATE_SUB(CURDATE(), INTERVAL 4 DAY) AND DATE_ADD(CURDATE(), INTERVAL 1 DAY)")
            ->where('finalStatus', 'approved')
            ->whereRaw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y %h:%i %p') != STR_TO_DATE('" . $post->dateOfApprove . "', '%d-%m-%Y %h:%i %p')")
            //->orderBy('chittiId', 'desc')
            ->orderByRaw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y %h:%i %p') DESC")
            ->take(5)
            ->get()
            ->map(function ($recent) {
                $recent->imageUrl = optional($recent->images->first())->imageUrl ?? 'images/default_image.jpg';

                return $recent;
            });

        $post->tagInUnicode = $post->tagMappings->first()->tag->tagInUnicode;

        return view('portal.post-summary', [
            'post' => $post,
            'slug' => $slug,
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
            'recentPosts' => $recentPosts,
            'geographyCode' => $geography->Geography ?? null,
            'ColorCode' => $ColorCode,
            'city_name' => $portal->slug ?? 'Unknown',
            'portal' => $portal,
            'platform' => $platform,
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
        $startDate = $dateAdjustment->format('d-m-Y') . ' 00:00';
        $endDate = $dateAdjustment->format('d-m-Y') . ' 23:59';

        // Query the database
        return DB::table('chitti')
            ->join('vChittiGeography as vg', 'vg.chittiId', '=', 'chitti.chittiId')
            ->whereBetween('chitti.dateOfApprove', [$startDate, $endDate])
            ->where('chitti.finalStatus', 'approved')
            ->where('vg.Geography', $portal->city_code)
            ->first();
    }
}
