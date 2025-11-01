<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Portal;
use Illuminate\Http\Request;
use \App\Services\API\V1\Content\PostService;
use Modules\Portal\Models\BiletralPortal;

class PostApiController extends Controller
{
    public function getAllPosts(Request $request, PostService $postService)
    {

        try {
            $request->validate([
                'page' => 'nullable|integer|min:1',
                'per_page' => 'nullable|integer|min:1|max:31',
                'group_by_month' => 'nullable|boolean',
                'language' => 'nullable|string|in:en,es,fr,de,it,pt,ru,zh,hi,mr',
                'location' => 'nullable|string',
                'location_type' => 'nullable|string|in:city,state,country',
                'order_by' => 'nullable|string|in:asc,desc',
                'tag_id' => 'nullable|integer',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'errors' => $e->errors(),
                'message' => 'Validation Error',
                'data' => [],
            ], 422);
        }
        return $postService->getPosts($request);
    }


    public function getPostById(Request $request, PostService $postService)
    {

        try {
            $request->validate([
                'id' => 'required|integer|exists:chitti,chittiId',
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
        return $postService->getPostById($request);
    }
}
