<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chitti;
use App\Models\ChittiGeography;
use App\Models\Geography;
use App\Models\Portal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChittiList extends Controller
{
    public function getChittiData(Request $request, $city, $name = null, $forAbour = null)
{
    // Extract `SubscriberId` and `offset` from query string
    $subscriberId = $request->query('SubscriberId');
    $offset = $request->query('offset', 0); // Default to 0 if not provided

    // Validate required parameters
    if (!$subscriberId) {
        return response()->json([
            "responseCode" => "0",
            "message" => "SubscriberId is required",
            "subscriberId" => null,
        ], 400);
    }

    $portal = Portal::where('slug', $city)->firstOrFail();
    $geography = Geography::where('geographycode', $portal->city_code)->first();

    if (!$geography) {
        return response()->json([
            "responseCode" => "0",
            "message" => "Geography not found",
            "subscriberId" => $subscriberId,
        ], 404);
    }

    $chittiIds = ChittiGeography::where('Geography', $geography->geographycode)
        ->pluck('chittiId');

    $chittis = Chitti::whereIn('chittiId', $chittiIds)
        ->where('finalStatus', 'approved')
        ->orderByRaw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y') DESC")
        ->with(['tagMappings.tag', 'images'])
        ->skip($offset)
        ->take(35)
        ->get();


    $payload = $chittis->map(function ($chitti) use ($geography) {
        $imageUrl = $chitti->images->first()->imageUrl ?? asset('default_image.jpg');
        $tags = $chitti->tagMappings->map(function ($tagMapping) {
            return [
                'chittiId' => $tagMapping->chittiId,
                'tagId' => $tagMapping->tag->id,
                'tagUnicode' => $tagMapping->tag->tagInEnglish ?? '',
                'tagIcon' => $tagMapping->tag->iconUrl ?? '',
            ];
        });

        return [
            'Title' => $chitti->Title,
            'chittiId' => $chitti->chittiId,
            'colorcode' => $chitti->color->colorcode ?? '',
            'postType' => $chitti->postType ?? '',
            'chittiname' => $chitti->name ?? '',
            'dateOfApprove' => $chitti->dateOfApprove,
            'description' => $chitti->description,
            'geography' => $geography->geographyname,
            'url' => url("{$geography->geographycode}/posts/{$chitti->chittiId}/" . urlencode($chitti->Title)),
            'isLiked' => "false", // Placeholder for actual "is liked" logic
            'totalLike' => "0",  // Placeholder for actual like count
            'totalComment' => "0", // Placeholder for actual comment count
            'image' => $chitti->images->map(function ($image) {
                return [
                    'imageId' => $image->id,
                    'chittiId' => $image->chittiId,
                    'imageUrl' => $image->imageUrl,
                    'isDefult' => $image->isDefault ? 'true' : 'false',
                ];
            }),
            'tags' => $tags,
        ];
    });

    return response()->json([
        "responseCode" => "1",
        "message" => "Success",
        "subscriberId" => $subscriberId,
        "Payload" => $payload,
    ]);
}

}
