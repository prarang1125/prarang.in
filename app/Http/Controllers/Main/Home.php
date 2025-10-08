<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Portal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Facades\Hash;
use Modules\Portal\Models\BiletralPortal;

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

        return view('main.home');
    }


    // Function for Content page
    public function content()
    {

        $portal = Portal::orderby('created_at', 'desc')->get();
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
        $response = Http::get($url);
        $teamData = $response->json();
        if ($teamData['status'] === 'success') {
            $team = $teamData['data'];
        } else {
            $team = [];
        }
        return view('main.about_us', compact('team'));
    }


    public function partners()
    {
        return view('main.partners');
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
        $url1 = "{$this->apiDomain}/api/geo-scripts/total";
        $url2 = "{$this->apiDomain}/api/w-in-target-language";

        // Headers for the requests
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'api-auth-token' => $this->apiToken,
            'api-auth-type' => $this->apiType,
        ];

        try {
            // Fetch data from the first URL
            $response1 = Http::withHeaders($headers)->get($url1);
            if ($response1->status() !== 200) {
                throw new Exception("Failed to fetch data from $url1: HTTP {$response1->status()}");
            }
            $data = $response1->json();  // Convert response to array

            // Fetch data from the second URL
            $response2 = Http::withHeaders($headers)->get($url2);
            if ($response2->status() !== 200) {
                throw new Exception("Failed to fetch data from $url2: HTTP {$response2->status()}");
            }
            $languageData = $response2->json();  // Convert response to array

            // Process the metadata and data
            $metaData = [
                'title' => 'Geo-by-Languages',
                'sub-title' => 'Geography by Language and Languages by Mother Tongue Scripts'
            ];

            $scripts = $data['scripts'] ?? [];
            $total = $data['total'] ?? [];
            $languageCountry = $data['languageCountry'] ?? [];
            $worldLanguageData = $languageData['data']['worldLanguageData'] ?? [];
            $indiaLanguageData = $languageData['data']['indiaLanguageData'] ?? [];
            $languageId = $languageData['data']['languageId'] ?? [];

            // Return the data to a view
            return view('main.market', compact('metaData', 'scripts', 'total', 'languageCountry', 'worldLanguageData', 'indiaLanguageData', 'languageId'));
        } catch (Exception $e) {
            // Handle errors and display message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
