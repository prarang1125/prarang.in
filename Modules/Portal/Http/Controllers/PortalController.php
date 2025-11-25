<?php

namespace Modules\Portal\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\PortalLocaleizetion;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\DB;
use Modules\Portal\Models\BiletralPortal;
use Modules\Portal\Models\CountryPortal;
use Modules\Portal\Models\Portal;

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
        // dd($locale);

        $cityCode = $portal->city_code;
        $yellowPages = City::where('portal_id', $portal->id)->first();
        return view('portal::portal.home', compact('cityCode', 'portal', 'yellowPages', 'locale', 'books', 'links'));
    }

    public function bilateralCountriesPortal(string $slug)
    {
        // Fetch portal with related countries
        $main = BiletralPortal::with(['primaryCountry', 'secondaryCountry'])
            ->where('slug', $slug)
            ->firstOrFail();

        $primary   = $main->primaryCountry;
        $primary->important_links = json_decode($primary->important_links) ?: [];
        $secondary = $main->secondaryCountry;
        $secondary->important_links = json_decode($secondary->important_links) ?: [];
        $locale = PortalLocaleizetion::where('lang_code', 'en')->firstOrFail();
        $locale = $locale['json'] ?? [];
        return view('portal::portal.country', compact('main', 'primary', 'secondary', 'locale'));
    }
}
