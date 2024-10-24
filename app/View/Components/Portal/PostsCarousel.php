<?php

namespace App\View\Components\Portal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class PostsCarousel extends Component
{
    /**
     * Create a new component instance.
     */
    public $chittiArray;
    public function __construct($cityId,$cityCode)
    {
        $cacheKey = 'carousal_post_' . $cityCode;
       
        $this->chittiArray = Cache::remember($cacheKey, 60*60*60, function () use ($cityCode) {
            return $this->getPosts($cityCode); // Fetch counts if not in cache
        });    
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portal.posts-carousel');
    }
    private function getPosts($city){
      
        return DB::connection('main')->table('chittitagmapping as ct')
        ->join('chitti as ch', 'ct.chittiId', '=', 'ch.chittiId')
        ->join('vChittiGeography as vCg', 'ch.chittiId', '=', 'vCg.chittiId')
        ->Join('chittiimagemapping as cimg','cimg.imageId','=','ch.chittiId')
        ->join('vGeography as vg', 'vg.geographycode', '=', 'vCg.Geography')
        ->join('mtag as mt', 'mt.tagId', '=', 'ct.tagId')
        ->join('mtagcategory as mtc', 'mtc.tagCategoryId', '=', 'mt.tagCategoryId')
        ->where('ch.finalStatus', 'approved')
        ->where('vg.geographycode', $city)
        ->orderBy(DB::raw("STR_TO_DATE(dateOfApprove, '%d-%m-%Y')"), 'desc')
        ->limit(12)->get();
    }
}
