<?php

namespace App\View\Components\Post;

use App\Models\Portal;
use App\View\Components\Portal\TagList;
use Closure;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $cityCode;

    public $cityId;

    public $tagCounts;

    public $tagSubCounts;

    public $portal;

    public function __construct($cityId, $cityCode)
    {
        $this->portal = Portal::where('city_code', $cityCode)->firstOrFail();

        $cacheKey = "tag_counts_{$cityCode}";

        $taglist = Cache::remember($cacheKey.'_list', now()->addMinutes(330), function () use ($cityId, $cityCode) {
            return new TagList($cityId, $cityCode, $this->portal->slug);
        });
        try {

            $this->tagCounts = Cache::remember($cacheKey, now()->addMinutes(330), function () use ($cityCode, $taglist) {
                return $taglist->getCounts($cityCode);
            });
        } catch (Exception $e) {
            Log::error('Error fetching tag counts: '.$e->getMessage());
            $tagCounts = [];
        }
        try {

            $this->tagSubCounts = Cache::remember($cacheKey.'tag', now()->addMinutes(330), function () use ($cityCode, $taglist) {
                return $taglist->getChittiTagsData($cityCode);
            });
        } catch (Exception $e) {
            Log::error('Error fetching tag counts: '.$e->getMessage());
            $tagSubCounts = [];
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.post.navbar');
    }
}
