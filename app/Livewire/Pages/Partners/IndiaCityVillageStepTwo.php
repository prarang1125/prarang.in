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
    public $shareUrl = null;
    public $pricing = [];
    public $planData = [];

    public $cities = [];
    public $villages = [];

    public function mount(Request $request, $hashId = null)
    {
        $this->hashId = $hashId;
        $this->pricing = config('data.partners-filter.pricing');

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
                $this->planData                  = $data['planData'] ?? [];
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
                if ($this->step >= 3) {
                    $this->initializeDefaultPlans();
                }
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
        if (empty($this->hashId)) {
            $this->hashId = 'SID_' . date('d-m-Y') . '_' . Str::upper(Str::random(10));
        }
    }

    public function initializeDefaultPlans()
    {
        if (empty($this->cityData)) {
            return;
        }
        foreach ($this->cityData as $distId => $group) {
            $dhq = $group['dhq'];
            $towns = $group['towns'] ?? [];
            $villages = $group['villages'] ?? [];

            $selectedLangsForCity = [];
            if ($dhq && isset($dhq['languages']) && is_array($dhq['languages'])) {
                $topLangs = array_slice($dhq['languages'], 0, 3, true);
                foreach ($topLangs as $langCode => $langData) {
                    if (!empty($this->selectedLanguages["{$distId}-{$langCode}"])) {
                        $selectedLangsForCity[$langCode] = $langData;
                    }
                }
            }

            $locations = [];
            if ($dhq) {
                $locations[] = $dhq;
            }
            foreach ($towns as $town) {
                $locations[] = $town;
            }
            foreach ($villages as $village) {
                $locations[] = $village;
            }

            foreach ($locations as $loc) {
                $locId = $loc['city_id'] ?? null;
                if (!$locId) continue;
                foreach ($selectedLangsForCity as $langCode => $langData) {
                    $planKey = "{$locId}-{$langCode}";
                    if (empty($this->selectedPlans[$planKey])) {
                        $this->selectedPlans[$planKey] = "{$locId}-{$langCode}-prarang";
                    }
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
            $this->initializeDefaultPlans();
        } else {
            session()->flash('error', 'Please select at least one language');
        }
    }

    /**
     * Proceed to Step 4 after selecting hosting plans.
     */
    public function confirmPlanSelection()
    {
        $selectedValues = [];
        if (is_array($this->selectedPlans)) {
            foreach ($this->selectedPlans as $key => $isChecked) {
                if ($isChecked) {
                    $selectedValues[] = $key;
                }
            }
        }

        if (count($selectedValues) > 0) {
            $this->step = 4;
        } else {
            session()->flash('error', 'Please select at least one plan');
        }
    }

    /**
     * Finalize the fourth step (city post selections).
     */
    public function confirmCityPostsSelection()
    {
        if (empty($this->selectedCityPosts)) {
            session()->flash('error', 'Please select at least one option from each.');
            return;
        }
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



    public function applyPlanDefaults($key, $planType)
    {
        if ($planType === 'daily') {
            $this->selectedDistrictAnalytics[$key] = true;
            $this->selectedSemiotics[$key] = true;
            $this->selectedPartnerMetrics[$key] = true;
        } elseif ($planType === 'alternateday') {
            $this->selectedDistrictAnalytics[$key] = false;
            $this->selectedSemiotics[$key] = true;
            $this->selectedPartnerMetrics[$key] = true;
        } elseif ($planType === 'weekly') {
            $this->selectedDistrictAnalytics[$key] = false;
            $this->selectedSemiotics[$key] = true;
            $this->selectedPartnerMetrics[$key] = true;
        }
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

        DB::table('partner-plan-ref')->updateOrInsert(
            ['hash_id' => $this->hashId],
            [
                'data' => json_encode($payload),
                'step' => $this->step,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        $this->shareUrl = route('partners.step-2', ['hashId' => $this->hashId]);
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
            'LAN17' => 'English',
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
            'LAN17' => 'English',
        ];

        return view('livewire.pages.partners.india-city-village-step-two', [
            'lang_titles' => $langTitle
        ])->layout('components.layout.main.base', [
            'metaData' => [
                'nav-heading' => 'India – Cities & Villages – Digital Marketing',
                'nav-sub-heading' => ""
            ],
        ]);
    }
}
