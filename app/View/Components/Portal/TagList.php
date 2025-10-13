<?php

namespace App\View\Components\Portal;

use App\Models\PortalLocaleizetion;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TagList extends Component
{
    /**
     * Create a new component instance.
     */
    public $cityId;
    public $cityCode;
    public $tagCounts;
    public $tagSubCounts;
    public $citySlug, $locale;

    public function __construct($cityId, $cityCode, $citySlug, $locale)
    {
        $this->cityId = $cityId;
        $this->cityCode = $cityCode;
        $this->citySlug = $citySlug;
        $cacheKey = 'tag_counts_' . $cityCode;
        $this->tagCounts = Cache::remember($cacheKey, 60 * 60, function () use ($cityCode) {
            return $this->getCounts($cityCode); // Fetch counts if not in cache
        });
        $this->tagSubCounts = Cache::remember($cacheKey . 'tag', 60 * 60, function () use ($cityCode) {
            return $this->getChittiTagsData($cityCode);
        });
        $this->locale = $locale;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portal.tag-list');
    }
    private function getChittiCountByCategory($tagCategoryIds, $city)
    {
        return DB::connection('main')->table('chittitagmapping as ct')
            ->join('chitti as ch', 'ct.chittiId', '=', 'ch.chittiId')
            ->join('vChittiGeography as vCg', 'ch.chittiId', '=', 'vCg.chittiId')
            ->join('vGeography as vg', 'vg.geographycode', '=', 'vCg.Geography')
            ->join('mtag as mt', 'mt.tagId', '=', 'ct.tagId')
            ->join('mtagcategory as mtc', 'mtc.tagCategoryId', '=', 'mt.tagCategoryId')
            ->whereIn('mtc.tagCategoryId', $tagCategoryIds)
            ->where('ch.finalStatus', 'approved')
            ->where('vg.geographycode', $city)
            ->select(DB::raw('count(distinct ct.chittiId) as totalcount'))
            ->orderBy(DB::raw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y')"), 'desc')
            ->count();
    }

    public function getCounts($city)
    {
        // Define tag categories for each count
        $cultureTagCategories = [1, 2, 3];
        $natureTagCategories = [4, 5, 6];
        $timelineTagCategory = [1];
        $manHisSensesTagCategory = [2];
        $manHisInventionsTagCategory = [3];
        $geographyTagCategory = [4];
        $faunaTagCategory = [5];
        $floraTagCategory = [6];

        // Execute the reusable method for each count
        $cultureCount = $this->getChittiCountByCategory($cultureTagCategories, $city);
        $natureCount = $this->getChittiCountByCategory($natureTagCategories, $city);
        $timelineCount = $this->getChittiCountByCategory($timelineTagCategory, $city);
        $manHisSensesCount = $this->getChittiCountByCategory($manHisSensesTagCategory, $city);
        $manHisInventionsCount = $this->getChittiCountByCategory($manHisInventionsTagCategory, $city);
        $geographyCount = $this->getChittiCountByCategory($geographyTagCategory, $city);
        $faunaCount = $this->getChittiCountByCategory($faunaTagCategory, $city);
        $floraCount = $this->getChittiCountByCategory($floraTagCategory, $city);

        // Return the results as a JSON response
        return [
            'culture_count' => $cultureCount,
            'nature_count' => $natureCount,
            'timeline_count' => $timelineCount,
            'man_senses_count' => $manHisSensesCount,
            'man_inventions_count' => $manHisInventionsCount,
            'geography_count' => $geographyCount,
            'fauna_count' => $faunaCount,
            'flora_count' => $floraCount
        ];
    }
    function getChittiTagsData($city)
    {
        $tagCategories = DB::connection('main')->table('mtag as mt')
            ->select(
                'mt.tagId',
                'mtc.tagCategoryId',
                'mt.tagInEnglish',
                'mt.tagInUnicode',
                'mt.tagIcon',
                'mtc.tagCategoryInEnglish',
                DB::raw("CASE WHEN ct1.ChittiCount IS NULL THEN 0 ELSE ct1.ChittiCount END AS count")
            )
            ->join('mtagcategory as mtc', 'mtc.tagCategoryId', '=', 'mt.tagCategoryId')
            ->leftJoin(DB::raw('(SELECT ct.tagid, COUNT(DISTINCT ch.chittiId) AS ChittiCount
                             FROM chittitagmapping AS ct
                             LEFT JOIN chitti AS ch ON ct.chittiId = ch.chittiId
                             LEFT JOIN vChittiGeography AS vCg ON ch.chittiId = vCg.chittiId
                             LEFT JOIN vGeography AS vg ON vg.geographycode = vCg.Geography
                             WHERE ch.finalStatus = "approved" AND vg.geographycode LIKE "%' . $city . '%"
                             GROUP BY ct.tagId) as ct1'), 'ct1.tagId', '=', 'mt.tagId')
            // ->where('mtc.tagCategoryId', '=', )
            // ->groupBy('mtc.tagCategoryId')
            ->get();
        foreach ($tagCategories as $data) {
            $subCatG['tag_' . $data->tagCategoryId][] = $data;
        }
        return $subCatG;
    }
}
