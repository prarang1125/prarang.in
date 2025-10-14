<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Content\TagService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TagApiController extends Controller
{
    public function getTags(Request $request,TagService $tagService){
        try{
              $request->validate([
                'count'=>'nullable|boolean',
                'location' => 'nullable|string',
                'location_type' => 'nullable|string|in:city,state,country',               
                'language' => 'nullable|string|in:en,es,fr,de,it,pt,ru,zh,hi,mr',
            ]);
            return $tagService->tags($request);
            
        }
       catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'errors' => $e->errors(),
                'message' => 'Validation Error',
                'data' => [],
            ], 422);
        }
    }
    
}
