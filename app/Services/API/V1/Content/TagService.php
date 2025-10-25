<?php

namespace App\Services\API\V1\Content;

use App\Models\PortalLocaleizetion;
use App\Services\API\V1\BaseService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TagService extends BaseService
{

    public function tags($request)
    {
        $language=$request->language??'en';
        $locale=PortalLocaleizetion::where('lang_code',$language)->first()['json'];

        $categories = Cache::remember("api_tags_category_{$language}", 12 * 60 * 60, function () use($locale) {
            return $this->getCounts($locale);
        });

        $tags = Cache::remember("api_tags_{$language}", 12 * 60 * 60, function () use ($locale) {
            return $this->getChittiTagsData($locale);
        });

        return $this->apiResponse(true, 'Tags fetched successfully', compact('categories', 'tags'), 200);
    }


    private function getChittiCountByCategory(array $tagCategoryIds)
    {
        return DB::connection('main')->table('chittitagmapping as ct')
            ->join('chitti as ch', 'ct.chittiId', '=', 'ch.chittiId')
            ->join('mtag as mt', 'mt.tagId', '=', 'ct.tagId')
            ->join('mtagcategory as mtc', 'mtc.tagCategoryId', '=', 'mt.tagCategoryId')
            ->join('vChittiGeography as vCg', 'ch.chittiId', '=', 'vCg.chittiId')
            ->whereIn('mtc.tagCategoryId', $tagCategoryIds)
            ->where('ch.finalStatus', 'approved')
            ->whereNot('vCg.Geography', 'LIKE', "%CON%")
            ->distinct('ct.chittiId')

            ->count('ct.chittiId');
    }


    public function getCounts($locale)
    {
        $maincategories = [
            'culture' => [1, 2, 3],
            'nature' => [4, 5, 6],
        ];
        $subcategories = [
            '1' => [1],
            '2' => [2],
            '3' => [3],
            '4' => [4],
            '5' => [5],
            '6' => [6],
        ];

        $results = [];
        foreach ($maincategories as $key => $tagCategoryIds) {
             $results['maincategories'][$key] = [
                'count' => $this->getChittiCountByCategory($tagCategoryIds),
                'icon' => "",
                'category_name'=>$locale[$key],
            ];
        }
        foreach ($subcategories as $key => $tagCategoryIds) {
            $results['subcategories'][$key] = [
                'count' => $this->getChittiCountByCategory($tagCategoryIds),
                'icon' => "",
                'category_name'=>$locale['categories'][$key],
            ];

        }

        return $results;
    }


    private function getChittiTagsData($locale)
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
            $grouped['tag_' . $tag->tagCategoryId][] = [
                'tagId' => $tag->tagId,
                'tagCategoryId' => $tag->tagCategoryId,
                'tagName'=>$locale['tags'][$tag->tagId],
                'tagIcon' =>'https://prarang.s3.amazonaws.com/'. $tag->tagIcon,
                'tagCategoryInEnglish' => $tag->tagCategoryInEnglish,
                'count' => $tag->count,
            ];
        }
        return $grouped;
    }
}
