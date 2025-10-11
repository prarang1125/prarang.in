<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Portal;
use Illuminate\Http\Request;
use \App\Services\API\V1\Content\PostService;
use Modules\Portal\Models\BiletralPortal;

class PostApiController extends Controller
{


    public function getPostsByLocation(Request $request, PostService $postService)
    {
        try {
            $request->validate([
                'location' => 'required|string',
                'location_type' => 'nullable|string|in:city,state,country',
                'page' => 'nullable|integer|min:1',
                'per_page' => 'nullable|integer|min:1|max:31',
                'group_by_month' => 'nullable|boolean',
                'language' => 'nullable|string|in:en,es,fr,de,it,pt,ru,zh,hi,mr',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'errors' => $e->errors(),
                'message' => 'Validation Error',
                'data' => [],
            ], 422);
        }

        try {
            $portal = Portal::select('city_name_local as title', 'slug', 'city_code as geography_code', 'header_image', 'footer_image')->where('city_code', $geographyCode)
                ->union(
                    BiletralPortal::select('title', 'slug', 'content_country_code as geography_code', 'header_image', 'footer_image')->where('content_country_code', $geographyCode)
                )
                ->firstOrFail();

            return $postService->getPosts($request->all(), $portal);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error retrieving posts',
                'data' => [],
            ], 500);
        }
    }
}
