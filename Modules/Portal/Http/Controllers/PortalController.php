<?php

namespace Modules\Portal\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\PortalLocaleizetion;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Portal\Models\BiletralPortal;
use Modules\Portal\Models\CountryPortal;
use Modules\Portal\Models\Portal;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;


class PortalController extends Controller
{
    public function portal($portal)
    {
        $isCityPortal = Portal::where('slug', $portal)->exists();

        $isCityPortalBiletral = BiletralPortal::where('slug', $portal)->exists();

        if ($isCityPortal) {
            return $this->indianCitiesPortal($portal);
        } elseif ($isCityPortalBiletral) {
            return $this->bilateralCountriesPortal($portal);
        } else {
            abort(404);
        }
    }

    public function indianCitiesPortal($portal)
    {
        $isAdsEnable = in_array(strtolower($portal), config('portal.portal'));

        $portal = Portal::where('slug', $portal)->firstOrFail();
        try {
            $books = json_decode($portal->books, true);
            $links = json_decode($portal->links, true);
        } catch (\JsonException $e) {
            $books = [];
            $links = [];
        }
        $locale = PortalLocaleizetion::where('lang_code', $portal->local_lang)->firstOrFail();
        $locale = $locale['json'] ?? [];
        $cityCode = $portal->city_code;
        $yellowPages = City::where('portal_id', $portal->id)->first();
        $analyticsCities = Cache::remember('analytics_cities', 24 * 30 * 60, function () {
            return collect(httpGet('cities')['data'])->pluck('city', 'id')->toArray();
        });
        $portal['analytics_name'] = $analyticsCities[$portal->city_id];

        return view('portal::portal.home', compact('cityCode', 'portal', 'yellowPages', 'locale', 'books', 'links', 'isAdsEnable'));
    }

    public function bilateralCountriesPortal(string $slug)
    {

        $main = Cache::remember('1bilateral_portal_' . $slug, 24 * 60 * 60, function () use ($slug) {
            return BiletralPortal::with(['primaryCountry', 'secondaryCountry'])
                ->where('slug', $slug)
                ->firstOrFail();
        });

        $primary = $main->primaryCountry;
        $secondary = $main->secondaryCountry;
        // dd($secondary, $primary);
        $pageSlm = httpGet('/country-pages-slm', ['country_id' => $secondary->anlytics_code])['data'] ?? [];
        // Cache::remember('country-pages-slmx-' . $secondary->anlytics_code, 24 * 60 * 60, function () use ($secondary) {
        //     return httpGet('/country-pages-slm', ['country_id' => $secondary->anlytics_code])['data'] ?? [];
        // });

        $primaryLinks = json_decode($primary->important_links, true) ?? [];
        $extendedPrimaryLinks = json_decode($main->extended_primary_link, true) ?? [];

        $mergedPrimaryLinks = [];

        $allKeys = array_unique(array_merge(
            array_keys($primaryLinks),
            array_keys($extendedPrimaryLinks)
        ));

        foreach ($allKeys as $key) {
            $mergedPrimaryLinks[$key] = array_merge(
                $primaryLinks[$key] ?? [],
                $extendedPrimaryLinks[$key] ?? []
            );
        }

        $primary->important_links = $mergedPrimaryLinks;

        $secondaryLinks = json_decode($secondary->important_links, true) ?? [];
        $extendedSecondaryLinks = json_decode($main->extended_secondary_link, true) ?? [];

        $mergedSecondaryLinks = [];

        $allKeys = array_unique(array_merge(
            array_keys($secondaryLinks),
            array_keys($extendedSecondaryLinks)
        ));

        foreach ($allKeys as $key) {
            $mergedSecondaryLinks[$key] = array_merge(
                $secondaryLinks[$key] ?? [],
                $extendedSecondaryLinks[$key] ?? []
            );
        }

        $secondary->important_links = $mergedSecondaryLinks;

        $locale = PortalLocaleizetion::where('lang_code', 'en')->firstOrFail();
        $locale = $locale['json'] ?? [];
        $indianCities = httpGet('/cities', ['groupby' => 1, 'group' => 'MSTR2'])['data'] ?? [];
        $stateZones = httpGet('/state-zone')['data'] ?? [];
        try {
            $userAgent = strtolower(request()->userAgent());

            $isMobile = preg_match('/mobile|android|iphone|ipad/', $userAgent);

            $view = $this->resolveView();
            return view($view, compact(
                'main',
                'primary',
                'secondary',
                'locale',
                'indianCities',
                'stateZones',
                'pageSlm'
            ));
        } catch (\Exception $e) {
            return view('portal::portal.country_new', compact('pageSlm', 'main', 'primary', 'secondary', 'locale', "indianCities", 'stateZones'));
        }
    }

    private function resolveView(): string
    {
        $userAgent = request()->userAgent();

        if (!$userAgent) {
            return 'portal::portal.country'; // safe fallback
        }

        $userAgent = Str::lower($userAgent);

        $isMobile = Str::contains($userAgent, [
            'mobile',
            'android',
            'iphone',
            'ipad',
            'ipod',
            'blackberry',
            'opera mini',
            'windows phone'
        ]);

        return $isMobile
            ? 'portal::portal.country_mobile'
            : 'portal::portal.country_new';
        // : 'portal::portal.country_mobile';
    }
}
