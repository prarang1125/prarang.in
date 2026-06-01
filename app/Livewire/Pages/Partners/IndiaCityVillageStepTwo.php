<?php

namespace App\Livewire\Pages\Partners;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class IndiaCityVillageStepTwo extends Component
{
    public $step = 2;
    public $cityData = [];
    public $sourceData = [];
    public $selectedLanguages = [];
    public $selectedPlans = [];
    public $cirusData = null;
    public $hashId = null;
    public $selectedCityPosts = [];
    public $selectedYellowPages = [];
    public $selectedOutdoorAds = [];
    public $selectedDistrictAnalytics = [];
    public $selectedSemiotics = [];
    public $selectedPartnerMetrics = [];

    public $cities = [];
    public $villages = [];

    public function mount(Request $request, $hashId = null)
    {
        $this->hashId = $hashId;
        if (!$hashId and !$request->isMethod('post')) {
            $this->redirectRoute('partners.india-town');
            return;
        }
        $this->fetchCirusData();

        if ($this->hashId) {
            $record = DB::table('partner-plan-ref')
                ->where('hash_id', $this->hashId)
                ->first();

            if ($record) {
                $data = json_decode($record->data, true);

                $this->selectedLanguages         = $data['selectedLanguages'] ?? [];
                $this->selectedPlans             = $data['selectedPlans'] ?? [];

                $this->selectedCityPosts         = $data['selectedCityPosts'] ?? [];
                $this->selectedYellowPages       = $data['selectedYellowPages'] ?? [];
                $this->selectedOutdoorAds        = $data['selectedOutdoorAds'] ?? [];
                $this->selectedDistrictAnalytics = $data['selectedDistrictAnalytics'] ?? [];
                $this->selectedSemiotics         = $data['selectedSemiotics'] ?? [];
                $this->selectedPartnerMetrics    = $data['selectedPartnerMetrics'] ?? [];

                $this->cities                    = $data['cities'] ?? [];
                $this->villages                  = $data['villages'] ?? [];

                $this->cityData                  = $data['cityData'] ?? [];
                $this->sourceData                = $data['sourceData'] ?? [];

                $this->step = $record->step ?? 2;
            }
            if ($this->step > 4) {
                $this->redirectRoute('partners.step-5', $this->hashId);
            }
        } elseif ($request->isMethod('post')) {
            $this->cities = $request->post('cities', []);
            $this->villages = $request->post('villages', []);



            if (count($this->cities) > 0 || count($this->villages) > 0) {
                $response = httpGet('/v1/partner-filter/for-step-2', [
                    'cities' => $this->cities,
                    'villages' => $this->villages
                ]);

                if (isset($response['Status']) && $response['Status'] === 'Success') {
                    $this->step = 2;
                    $grouped = [];
                    $response = $response['data'];
                    if (isset($response['dhqs'])) {  // $data → $response
                        foreach ($response['dhqs'] as $distId => $dhq) {
                            $dhq['location_type'] = 'District Capital';
                            $grouped[$distId] = [
                                'dhq' => $dhq,
                                'towns' => [],
                                'villages' => []
                            ];
                        }
                    }

                    if (isset($response['towns'])) {  // $data → $response
                        foreach ($response['towns'] as $distId => $towns) {
                            if (!isset($grouped[$distId])) {
                                $grouped[$distId] = ['dhq' => null, 'towns' => [], 'villages' => []];
                            }
                            foreach ($towns as $town) {
                                $town['location_type'] = 'City';
                                $grouped[$distId]['towns'][] = $town;
                            }
                        }
                    }

                    if (isset($response['villages'])) {  // $data → $response
                        foreach ($response['villages'] as $distId => $villages) {
                            if (!isset($grouped[$distId])) {
                                $grouped[$distId] = ['dhq' => null, 'towns' => [], 'villages' => []];
                            }
                            foreach ($villages as $village) {
                                $village['location_type'] = 'Village';
                                $grouped[$distId]['villages'][] = $village;
                            }
                        }
                    }


                    $this->cityData = $grouped;
                    $this->sourceData = $response['source'] ?? [];
                }
            }
        }
    }

    public function fetchCirusData()
    {
        try {
            $cacheKey = "cirusData_all-Updated";
            $cachedData = Cache::get($cacheKey);

            if ($cachedData) {
                $this->cirusData = $cachedData;
                return;
            }

            $response = Http::withHeaders(['accept' => 'application/json'])
                ->get('https://api.apratyaksh.org/api/v1/cirus/dhq');

            if ($response->successful()) {
                $result = $response->json()['data'];
                $this->cirusData = collect($result)->keyBy('id')->all();
                Cache::put($cacheKey, $this->cirusData, now()->addHours(300));
            }
        } catch (\Exception $e) {
            // Silently fail for CIRUS as it's secondary
        }
    }

    public function confirmLanguageSelection()
    {
        $selectedValues = [];
        if (is_array($this->selectedLanguages)) {
            foreach ($this->selectedLanguages as $key => $isChecked) {
                if ($isChecked) {
                    $selectedValues[] = $key;
                }
            }
        }

        if (count($selectedValues) > 0) {
            $this->step = 3;
        }
    }

    /**
     * Proceed to Step 4 after selecting hosting plans.
     */
    public function confirmPlanSelection()
    {
        $this->step = 4;
    }

    /**
     * Finalize the fourth step (city post selections).
     */
    public function confirmCityPostsSelection()
    {
        $payload = [
            'selectedLanguages'         => $this->selectedLanguages,
            'selectedPlans'             => $this->selectedPlans,

            'selectedCityPosts'         => $this->selectedCityPosts,
            'selectedYellowPages'       => $this->selectedYellowPages,
            'selectedOutdoorAds'        => $this->selectedOutdoorAds,
            'selectedDistrictAnalytics' => $this->selectedDistrictAnalytics,
            'selectedSemiotics'         => $this->selectedSemiotics,
            'selectedPartnerMetrics'    => $this->selectedPartnerMetrics,

            'cities'                    => $this->cities,
            'villages'                  => $this->villages,

            'cityData'                  => $this->cityData,
            'sourceData'                => $this->sourceData,
        ];

        $data = json_encode($payload);

        // Generate Hash Only Once
        if (empty($this->hashId)) {
            $this->hashId = 'SID_' . date('d-m-Y') . '_' . Str::upper(Str::random(10));
        }
        DB::table('partner-plan-ref')->updateOrInsert(
            ['hash_id' => $this->hashId],
            [
                'step' => $this->step + 1,
                'data' => $data,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        return redirect()->route(
            'partners.step-5',
            ['hashId' => $this->hashId]
        );
    }



    public function changeStep($move = 'next')
    {
        if ($move == "back") {
            $this->step--;
            if ($this->step < 2) {
                return redirect()->route('partners.india-town');
            }
        } else {
            $this->step++;
        }
    }

    public function createShareLink()
    {
        $hashId = Str::random(8);
        $data = [
            'selectedLanguages' => $this->selectedLanguages,
            'selectedPlans' => $this->selectedPlans,
            'cityData' => $this->cityData,
            'sourceData' => $this->sourceData,
            'selectedCityPosts' => $this->selectedCityPosts,
        ];

        DB::table('partner-plan-ref')->insert([
            'hash_id' => $hashId,
            'data' => json_encode($data),
            'step' => $this->step,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->hashId = $hashId;
        // Optionally dispatch event to show link to user, for now it will just change the URL if needed.
    }

    public function getLanguageTitle($code)
    {
        $langTitle = [
            'LAN3' => 'Assamese',
            'LAN4' => 'Bengali',
            'LAN5' => 'Hindi',
            'LAN6' => 'Gurumukhi',
            'LAN7' => 'Kannada',
            'LAN8' => 'Malayalam',
            'LAN9' => 'Marathi',
            'LAN10' => 'Gujarati',
            'LAN11' => 'Odia',
            'LAN12' => 'Urdu',
            'LAN13' => 'Tamil',
            'LAN14' => 'Telugu',
            'LAN17' => 'English (Multilingualism)',
        ];

        return $langTitle[$code] ?? $code;
    }

    public function render()
    {
        $langTitle = [
            'LAN3' => 'Assamese',
            'LAN4' => 'Bengali',
            'LAN5' => 'Hindi',
            'LAN6' => 'Gurumukhi',
            'LAN7' => 'Kannada',
            'LAN8' => 'Malayalam',
            'LAN9' => 'Marathi',
            'LAN10' => 'Gujarati',
            'LAN11' => 'Odia',
            'LAN12' => 'Urdu',
            'LAN13' => 'Tamil',
            'LAN14' => 'Telugu',
            'LAN17' => 'English (Multilingualism)',
        ];

        return view('livewire.pages.partners.india-city-village-step-two', [
            'lang_titles' => $langTitle
        ])->layout('components.layout.main.base', [
            'metaData' => [
                'nav-heading' => 'India - Cities & Villages: Digital Marketing',
                'nav-sub-heading' => ""
            ],
        ]);
    }
}
