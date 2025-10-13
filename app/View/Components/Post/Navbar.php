<?php

namespace App\View\Components\Post;

use App\Models\Portal;
use App\Models\PortalLocaleizetion;
use App\View\Components\Portal\TagList;
use Closure;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;
use Modules\Portal\Models\BiletralPortal;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $geographyCode;

    public $cityId = 12;

    public $tagCounts;

    public $tagSubCounts;

    public $portal, $locale;

    public function __construct($geographyCode)
    {

        $this->portal = Portal::select('city_name_local as title', 'slug', 'city_code as geography_code', 'header_image', 'footer_image', DB::raw("'portal' as type"))->where('city_code', $geographyCode)
            ->union(
                BiletralPortal::select('title', 'slug', 'content_country_code as geography_code', 'header_image', 'footer_image', DB::raw("'bilateral' as type"))->where('content_country_code', $geographyCode)
            )
            ->firstOrFail();

        $locale = PortalLocaleizetion::where('lang_code', $this->portal->type == 'portal' ? 'hi' : 'en')->firstOrFail();
        $this->locale = $locale['json'] ?? [];
        $cacheKey = "tag_counts_{$geographyCode}";

        $taglist = Cache::remember($cacheKey . '_list', now()->addMinutes(330), function () use ($geographyCode) {
            return new TagList($this->cityId, $geographyCode, $this->portal->slug);
        });
        try {

            $this->tagCounts = Cache::remember($cacheKey, now()->addMinutes(330), function () use ($geographyCode, $taglist) {
                return $taglist->getCounts($geographyCode);
            });
        } catch (Exception $e) {
            Log::error('Error fetching tag counts: ' . $e->getMessage());
            $tagCounts = [];
        }
        try {

            $this->tagSubCounts = Cache::remember($cacheKey . 'tag', now()->addMinutes(330), function () use ($geographyCode, $taglist) {
                return $taglist->getChittiTagsData($geographyCode);
            });
        } catch (Exception $e) {
            Log::error('Error fetching tag counts: ' . $e->getMessage());
            $tagSubCounts = [];
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.post.navbar');
    }
}
