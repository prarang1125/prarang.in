<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Portal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Facades\Hash;
use Modules\Portal\Models\BiletralPortal;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Home extends Controller
{
    protected $apiDomain;
    protected $apiToken;
    protected $apiType;

    public function __construct()
    {
        $this->apiDomain = env('API_DOMAIN');
        $this->apiToken = env('API_TOKEN');
        $this->apiType = env('API_TYPE');
    }

    public function index()
    {

        // $portal = Cache::remember('portal-list-' . Str::random(2), now()->addDays(31), function () {
        //     return Portal::query()
        //         // ->where('local_lang', 'hi')
        //         ->leftJoin('vChittiGeography as chitti', 'chitti.Geography', '=', 'portals.city_code')
        //         ->select('portals.id', 'portals.city_code', 'portals.city_name', 'portals.state', 'portals.zone', 'portals.list_order', 'portals.local_lang', 'portals.is_ext_url', 'portals.ext_urls', 'portals.slug')
        //         ->selectRaw('COUNT(chitti.chittiid) > 0 as is_live')
        //         ->groupBy('portals.id')
        //         ->orderBy('portals.list_order', 'asc')
        //         ->get()
        //         ->groupBy('zone', 'local_lang')
        //         ->map(function ($zone) {
        //             return $zone->groupBy('state');
        //         });
        // });
        // dd($portal);


        $portal = [];




        return view('main.home', compact('portal'));
    }


    // Function for Content page
    public function content()
    {

        $key = 'portal-list-' . Str::random(2);
        $portal = Cache::remember($key, now()->addDays(31), function () {
            return Portal::query()
                ->where('local_lang', 'hi')
                ->leftJoin('vChittiGeography as chitti', 'chitti.Geography', '=', 'portals.city_code')
                ->select(
                    'portals.id',
                    'portals.city_code',
                    'portals.city_name',
                    'portals.state',
                    'portals.zone',
                    'portals.list_order',
                    'portals.local_lang',
                    'portals.is_ext_url',
                    'portals.ext_urls',
                    'portals.slug'
                )
                ->selectRaw('COUNT(chitti.chittiid) > 0 as is_live')
                ->groupBy(
                    'portals.id',
                    'portals.city_code',
                    'portals.city_name',
                    'portals.state',
                    'portals.zone',
                    'portals.list_order',
                    'portals.local_lang',
                    'portals.is_ext_url',
                    'portals.ext_urls',
                    'portals.slug'
                )
                ->orderBy('portals.list_order', 'asc')
                ->get()
                ->groupBy('zone')
                ->map(fn($zone) => $zone->groupBy('state'));
        });
        $biletrals = BiletralPortal::all();


        return view('main.content', compact('portal', 'biletrals'));
    }
    public function semiotics()
    {
        return view('main.semiotics');
    }
    public function analytics()
    {
        return view('main.analytics');
    }


    public function aboutUs()
    {
        $url = env('ADMIN_URL') . '/get-our-teams';
        $key = 'our-team-' . Str::random(2);
        $team = Cache::remember($key, now()->addDays(31), function () use ($url) {
            $response = Http::get($url);
            $teamData = $response->json();
            if ($teamData['status'] === 'success') {
                return $teamData['data'];
            } else {
                return [];
            }
        });
        return view('main.about_us', compact('team'));
    }


    public function partners()
    {
        $key = 'portal-list-' . Str::random(2);
        $portal = Cache::remember($key, now()->addDays(31), function () {
            return Portal::query()
                ->where('local_lang', 'hi')
                ->leftJoin('vChittiGeography as chitti', 'chitti.Geography', '=', 'portals.city_code')
                ->select(
                    'portals.id',
                    'portals.city_code',
                    'portals.city_name',
                    'portals.state',
                    'portals.zone',
                    'portals.list_order',
                    'portals.local_lang',
                    'portals.is_ext_url',
                    'portals.ext_urls',
                    'portals.slug'
                )
                ->selectRaw('COUNT(chitti.chittiid) > 0 as is_live')
                ->groupBy(
                    'portals.id',
                    'portals.city_code',
                    'portals.city_name',
                    'portals.state',
                    'portals.zone',
                    'portals.list_order',
                    'portals.local_lang',
                    'portals.is_ext_url',
                    'portals.ext_urls',
                    'portals.slug'
                )
                ->orderBy('portals.list_order', 'asc')
                ->get()
                ->groupBy('zone')
                ->map(fn($zone) => $zone->groupBy('state'));
        });
        return view('main.partners', compact('portal'));
    }

    public function privacyPolicy()
    {
        return view('main.privacy_policy'); // Make sure to create this view file
    }

    public function refundCancellation()
    {
        return view('main.refund_cancellation'); // Make sure to create this view file
    }

    public function termsConditions()
    {
        return view('main.terms_conditions'); // Make sure to create this view file
    }






    public function market()
    {
        // $url1 = "{$this->apiDomain}/api/geo-scripts/total";
        // $url2 = "{$this->apiDomain}/api/w-in-target-language";

        // // Headers for the requests
        // $headers = [
        //     'Accept' => 'application/json',
        //     'Content-Type' => 'application/json',
        //     'api-auth-token' => $this->apiToken,
        //     'api-auth-type' => $this->apiType,
        // ];

        // try {
        //     // Fetch data from the first URL
        //     $response1 = Http::withHeaders($headers)->get($url1);
        //     if ($response1->status() !== 200) {
        //         throw new Exception("Failed to fetch data from $url1: HTTP {$response1->status()}");
        //     }
        //     $data = $response1->json();  // Convert response to array

        //     // Fetch data from the second URL
        //     $response2 = Http::withHeaders($headers)->get($url2);
        //     if ($response2->status() !== 200) {
        //         throw new Exception("Failed to fetch data from $url2: HTTP {$response2->status()}");
        //     }
        //     $languageData = $response2->json();  // Convert response to array

        //     // Process the metadata and data
        //     $metaData = [
        //         'title' => 'Geo-by-Languages',
        //         'sub-title' => 'Geography by Language and Languages by Mother Tongue Scripts'
        //     ];

        //     $scripts = $data['scripts'] ?? [];
        //     $total = $data['total'] ?? [];
        //     $languageCountry = $data['languageCountry'] ?? [];
        //     $worldLanguageData = $languageData['data']['worldLanguageData'] ?? [];
        //     $indiaLanguageData = $languageData['data']['indiaLanguageData'] ?? [];
        //     $languageId = $languageData['data']['languageId'] ?? [];

        // return view('main.market', compact('metaData', 'scripts', 'total', 'languageCountry', 'worldLanguageData', 'indiaLanguageData', 'languageId'));
        return view('main.market');
        // } catch (Exception $e) {
        //     // Handle errors and display message
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }


    public function cityWebs()
    {
        $popData = Cache::remember("cityweb-popup", 30 * 60 * 60, function () {
            return collect(config('cityweb.popup'))->groupBy('StateID')->toArray();
        });

        $state = Cache::remember("cityweb-state", 30 * 60 * 60, function () {
            return collect(config('cityweb.data'))->pluck('state', '#')->toArray();
        });
        return view('main.citywebs', compact('popData', 'state'));
    }


    public function langWebs()
    {
        return view('main.langwebs', [
            'divide' => config('lang_webs.digital_divide_languages'),
            'balanced' => config('lang_webs.digitally_balanced_languages'),
        ]);
    }
    public function geCountrytByLanguage($langId)
    {

        $countries = Cache::remember("country-by-language-$langId", 30 * 60 * 60, function () use ($langId) {
            return collect(config('count_lang.languages'))
                ->where('language_id', $langId)
                ->pluck('country')
                ->values();
        });

        return response()->json($countries);
    }




    public function countryWebs()
    {
        $data = Cache::remember('countryweb.data', 30 * 60 * 60, function () {
            return collect(config('countryweb.data'))->groupBy('cid')->toArray();
        });
        return view('main.countrywebs', compact('data'));
    }


    public function indiaCityWebs()
    {
        $portal =
            Cache::remember('portal', 30 * 60 * 60, function () {
                return   Portal::query()
                    ->where('local_lang', 'hi')
                    ->leftJoin('vChittiGeography as chitti', 'chitti.Geography', '=', 'portals.city_code')
                    ->select(
                        'portals.id',
                        'portals.city_code',
                        'portals.city_name',
                        'portals.state',
                        'portals.zone',
                        'portals.list_order',
                        'portals.local_lang',
                        'portals.is_ext_url',
                        'portals.ext_urls',
                        'portals.slug'
                    )
                    ->selectRaw('COUNT(chitti.chittiid) > 0 as is_live')
                    ->groupBy(
                        'portals.id',
                        'portals.city_code',
                        'portals.city_name',
                        'portals.state',
                        'portals.zone',
                        'portals.list_order',
                        'portals.local_lang',
                        'portals.is_ext_url',
                        'portals.ext_urls',
                        'portals.slug'
                    )
                    ->orderBy('portals.list_order', 'asc')
                    ->get()
                    ->groupBy('zone')
                    ->map(fn($zone) => $zone->groupBy('state'));
            });
        return view('main.indiacitywebs', compact('portal'));
    }


    public function knowledgePosts()
    {

        return view('main.knowledge_posts');
    }

    public function businessApps()
    {

        return view('main.business_apps');
    }

    public function cityPortals()
    {
        return view('main.city_portals');
    }

    public function countryPortals()
    {
        return view('main.country_portals');
    }
}
