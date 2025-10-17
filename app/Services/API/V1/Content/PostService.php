<?php

namespace App\Services\API\V1\Content;

use App\Models\Chitti;
use App\Models\ChittiGeography;
use App\Models\Geography;
use App\Models\PortalLocaleizetion;
use App\Services\API\V1\BaseService;
use App\Services\PortalUnion;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class PostService extends BaseService
{
    public function getPosts(Request $request)
    {
        try {
            $page = $request->page ?? 1;
            $per_page = $request->per_page ?? 10;
            $group_by_month = $request->boolean('group_by_month', false);
            $language = $request->language ?? 'en';
            $location = $request->location ?? null;
            $location_type = $request->location_type ?? null;
            $orderBy = strtoupper($request->order_by ?? 'desc');

            $portalUnion = app(PortalUnion::class);

            $chittiQuery = Chitti::query();

            if ($location) {
                try {
                    $portal = $portalUnion->getPortalUnion(['slug', $location], ['slug', $location]);
                } catch (ModelNotFoundException $e) {
                    return $this->apiResponse(false, 'The requested location was not found', [], 404);
                }


                $geography = Geography::where('geographycode', $portal->geography_code)->first();

                if (!$geography) {
                    return $this->apiResponse(false, 'Geography not found for the given portal', [], 404);
                }

                $chittiIds = ChittiGeography::where('Geography', $geography->geographycode)
                    ->pluck('chittiId');

                if ($chittiIds->isEmpty()) {
                    $responseData = [
                        'data' => [],
                        'pagination' => [
                            'current_page' => 1,
                            'per_page' => (int)$per_page,
                            'total' => 0,
                            'last_page' => 1,
                        ]
                    ];
                    return $this->apiResponse(true, 'No posts found for the given location', $responseData, 200);
                }

                $chittiQuery->whereIn('chittiId', $chittiIds);
            }
            $locale = PortalLocaleizetion::where('lang_code', $language)->first();
            $chittiQuery->where('finalStatus', 'approved')
                ->orderByRaw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y') $orderBy")
                ->with(['tagMappings.tag', 'images']);

            $chittis = $chittiQuery->paginate($per_page, ['*'], 'page', $page);

            $processedChittis = $chittis->map(function ($chitti)   {
                $imageUrl = $chitti->images->first()->imageUrl ?? asset('images/prarang-1.jpg');

                $tags = $chitti->tagMappings->map(function ($tagMapping)  {
                    return $tagMapping->tag->tagId;
                })->filter()->join(', ');

                return [
                    'id' => $chitti->chittiId,
                    'title' => $chitti->Title,
                    'en_title' => $chitti->SubTitle,
                    'short_description' => strip_tags(Str::limit($chitti->description, 125)),
                    'image_url' => $imageUrl,
                    'tags' => $tags,
                    'color' => $chitti->color->colorcode ?? '',
                    'createDate' => $chitti->dateOfApprove,
                ];
            });

            if ($group_by_month) {
                $groupedData = $processedChittis->groupBy(function ($chitti) {
                    return \Carbon\Carbon::parse($chitti['createDate'])->format('F Y');
                })->toArray();

                $responseData = [
                    'group_by_month' => $group_by_month,
                    'posts' => $groupedData,
                    'pagination' => [
                        'current_page' => $chittis->currentPage(),
                        'per_page' => $chittis->perPage(),
                        'total' => $chittis->total(),
                        'last_page' => $chittis->lastPage(),
                    ]
                ];
            } else {
                $responseData = [
                    'group_by_month' => $group_by_month,
                    'posts' => $processedChittis->toArray(),
                    'pagination' => [
                        'current_page' => $chittis->currentPage(),
                        'per_page' => $chittis->perPage(),
                        'total' => $chittis->total(),
                        'last_page' => $chittis->lastPage(),
                    ]
                ];
            }

            if ($chittis->total() === 0) {
                return $this->apiResponse(true, 'No posts found', $responseData, 200);
            }
            return $this->apiResponse(true, 'Posts retrieved successfully', $responseData, 200);

        } catch (QueryException $e) {
            Log::error('Database query error in PostService@getPosts: ' . $e->getMessage(), ['exception' => $e]);
            return $this->apiResponse(false, 'Database error while retrieving posts', [], 500);
        } catch (\Throwable $e) {
            Log::critical('Unexpected error in PostService@getPosts: ' . $e->getMessage(), ['exception' => $e]);
            return $this->apiResponse(false, 'Unexpected error while retrieving posts', [], 500);
        }
    }

    public function getPostById($request){

        try {
            $post = Chitti::where('chittiId', $request->id)
                ->with(['tagMappings.tag', 'images'])
                ->first();

            if (!$post) {
                return $this->apiResponse(false, 'Post not found', [], 404);
            }

            $imageUrl = $post->images->first()->imageUrl ?? asset('images/prarang-1.jpg');

            $tags = $post->tagMappings->map(function ($tagMapping)  {
                return $tagMapping->tag->tagId;
            })->filter()->join(', ');

            $responseData = [
                'id' => $post->chittiId,
                'title' => $post->Title,
                'en_title' => $post->SubTitle,
                'short_description' => $post->description,
                'image_url' => $imageUrl,
                'tags' => $tags,
                'color' => $post->color->colorcode ?? '',
                'createDate' => $post->dateOfApprove,
            ];

            return $this->apiResponse(true, 'Post retrieved successfully', $responseData, 200);
        } catch (QueryException $e) {
            Log::error('Database query error in PostService@getPostById: ' . $e->getMessage(), ['exception' => $e]);
            return $this->apiResponse(false, 'Database error while retrieving post', [], 500);
        } catch (\Throwable $e) {
            Log::critical('Unexpected error in PostService@getPostById: ' . $e->getMessage(), ['exception' => $e]);
            return $this->apiResponse(false, 'Unexpected error while retrieving post', [], 500);
        }
    }


}
