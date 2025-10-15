<?php

namespace App\Services\API\V1\Content;

use App\Services\API\V1\BaseService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TagService extends BaseService
{

    public function tags($request)
    {
        $categories = Cache::remember('api_tags_category', 12 * 60 * 60, function () {
            return $this->getCounts();
        });

        $tags = Cache::remember('api_tags', 12 * 60 * 60, function () {
            return $this->getChittiTagsData();
        });

        return $this->apiResponse(true, 'Tags fetched successfully', compact('categories', 'tags'), 200);
    }


    private function getChittiCountByCategory(array $tagCategoryIds)
    {
        return DB::connection('main')->table('chittitagmapping as ct')
            ->join('chitti as ch', 'ct.chittiId', '=', 'ch.chittiId')
            ->join('mtag as mt', 'mt.tagId', '=', 'ct.tagId')
            ->join('mtagcategory as mtc', 'mtc.tagCategoryId', '=', 'mt.tagCategoryId')
            ->whereIn('mtc.tagCategoryId', $tagCategoryIds)
            ->where('ch.finalStatus', 'approved')
            ->distinct('ct.chittiId')
            ->count('ct.chittiId');
    }


    public function getCounts()
    {
        $categories = [
            'culture_count' => [1, 2, 3],
            'nature_count' => [4, 5, 6],
            'timeline_count' => [1],
            'man_senses_count' => [2],
            'man_inventions_count' => [3],
            'geography_count' => [4],
            'fauna_count' => [5],
            'flora_count' => [6],
        ];

        $results = [];
        foreach ($categories as $key => $tagCategoryIds) {
            $results[$key] = $this->getChittiCountByCategory($tagCategoryIds);
        }

        return $results;
    }


    private function getChittiTagsData()
    {
        $tags = DB::connection('main')->table('mtag as mt')
            ->select(
                'mt.tagId',
                'mtc.tagCategoryId',
                'mt.tagInEnglish',
                'mt.tagInUnicode',
                'mt.tagIcon',
                'mtc.tagCategoryInEnglish',
                DB::raw("COALESCE(ct1.ChittiCount, 0) AS count")
            )
            ->join('mtagcategory as mtc', 'mtc.tagCategoryId', '=', 'mt.tagCategoryId')
            ->leftJoin(DB::raw('(
                SELECT ct.tagId, COUNT(DISTINCT ch.chittiId) AS ChittiCount
                FROM chittitagmapping AS ct
                JOIN chitti AS ch ON ct.chittiId = ch.chittiId
                WHERE ch.finalStatus = "approved"
                GROUP BY ct.tagId
            ) AS ct1'), 'ct1.tagId', '=', 'mt.tagId')
            ->get();

        $grouped = [];
        foreach ($tags as $tag) {
            $grouped['tag_' . $tag->tagCategoryId][] = $tag;
        }
        return $grouped;
    }
}
