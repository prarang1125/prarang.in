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
            $tag_id = $request->tag_id ?? null;

            $portalUnion = app(PortalUnion::class);

            $chittiQuery = Chitti::query();
            $chittiQuery->select('chitti.*')
                ->join('vChittiGeography as vCg', 'chitti.chittiId', '=', 'vCg.chittiId')
                // use whereRaw to be explicit about the NOT LIKE
                ->whereRaw('vCg.Geography NOT LIKE ?', ['%CON%'])
                // use a truthy condition check for $location
                ->when($location, function ($query) use ($location) {
                    $query->whereRaw('vCg.Geography  LIKE ?', ['%' . $location . '%']);
                });

            $locale = PortalLocaleizetion::where('lang_code', $language)->first()['json'];
            try {
                $viewership = $chittiQuery->where('chitti.finalStatus', 'approved')->where('chitti.totalViewerCount', '>', 0)->orderByRaw("STR_TO_DATE(chitti.dateOfApprove, '%d-%m-%Y') $orderBy")->first(['*']);
            } catch (\Throwable $e) {
                $viewership = "0";
            }

            $chittiQuery->where('finalStatus', 'approved')
                ->orderByRaw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y') $orderBy")
                ->with(['tagMappings.tag', 'images']);

            if ($tag_id) {
                $chittiQuery->whereHas('tagMappings', function ($query) use ($tag_id) {
                    $query->where('tagId', $tag_id);
                });
            }

            $chittis = $chittiQuery->paginate($per_page, ['*'], 'page', $page);

            $processedChittis = $chittis->map(function ($chitti) use ($locale) {
                $imageUrl = $chitti->images->first()->imageUrl ?? asset('images/prarang-1.jpg');

                $tags = $chitti->tagMappings->map(function ($tagMapping) {
                    return $tagMapping->tag->tagId;
                })->toArray()[0];

                return [
                    'id' => $chitti->chittiId,
                    'title' => $chitti->Title,
                    'en_title' => $chitti->SubTitle,
                    'short_description' => strip_tags(Str::limit($chitti->description, 125)),
                    'description' => $chitti->description,
                    'image_url' => $imageUrl,
                    'tags' => $locale['tags'][$tags] ??  $tags,
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
                    'viewership' => $viewership,
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
                    'viewership' => $viewership,
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

    public function getPostById($request)
    {
        $language = $request->language ?? 'en';
        $id = $request->id;
        try {
            $post = Chitti::where('chittiId', $id)
                ->with(['tagMappings.tag', 'images'])
                ->first();

            if (!$post) {
                return $this->apiResponse(false, 'Post not found', [], 404);
            }

            $imageUrl = $post->images->first()->imageUrl ?? asset('images/prarang-1.jpg');

            $tags = $post->tagMappings->map(function ($tagMapping) {
                return $tagMapping->tag->tagId;
            })->toArray()[0];
            sleep(1);
            $locale = PortalLocaleizetion::where('lang_code', $request->language)->first()['json'];

            $responseData = [
                'id' => $post->chittiId,
                'title' => $post->Title,
                'en_title' => $post->SubTitle,
                'description' => $post->description,
                'image_url' => $imageUrl,
                'tags' => $locale['tags'][$tags] ??  $tags,
                'color' => $post->color->colorcode ?? '',
                'createDate' => $post->dateOfApprove,
                'analytics' => [
                    'post_viewership_date' => $post->postViewershipDate ?? '',
                    'post_viewership_date_to' => " " . \Carbon\Carbon::parse($post->postViewershipDateTo)->format('d-M-Y') ?? '',
                    'days' => $post->noofDaysfromUpload ?? 0,
                    'month_days' => $post->monthDay ?? "5th",
                    'city_subscrivers' => $post->citySubscriber ?? 0,
                    'total_views' => $post->totalViewerCount ?? 0,
                    'app_views' => $post->prarangApplication ?? 0,
                    'website_views' => $post->websiteCount ?? 0,
                    'email_views' => $post->emailCount ?? 0,
                    'instagram_views' => $post->instagramCount ?? 0,
                    'whatsapp_views' => $post->whatsappCount ?? 0,
                ]
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

    private function analyticsReport($postId) {}
}
