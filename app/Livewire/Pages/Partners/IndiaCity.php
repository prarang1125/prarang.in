<?php

namespace App\Livewire\Pages\Partners;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class IndiaCity extends Component
{
    public $states = [];
    public $selectedState = null;
    public $selectedStateName = '';
    public $cities = [];
    public $selectedCities = []; // [stateName => [cityId => cityName]]

    public $cityData = [];
    public $sourceData = [];
    public $selectedLanguages = [];
    public $selectedPlans = [];
    public $step = 1;
    public $cirusData = null;

    // Step 5 Form Fields
    public $name;
    public $mobile;
    public $email;
    public $company_name;
    public $website;
    public $isSubmitted = false;
    public $shareUrl = null;
    public $hashId = null;

    public function mount($hashId = null)
    {
        $this->hashId = $hashId;
        $this->loadStates();
        $this->fetchCirusData();

        if ($this->hashId) {
            $record = \Illuminate\Support\Facades\DB::table('partner-plan-ref')
                ->where('hash_id', $this->hashId)
                ->first();

            if ($record) {
                $data = json_decode($record->data, true);
                $this->selectedCities = $data['selectedCities'] ?? [];
                $this->selectedLanguages = $data['selectedLanguages'] ?? [];
                $this->selectedPlans = $data['selectedPlans'] ?? [];
                $this->cityData = $data['cityData'] ?? [];
                $this->sourceData = $data['sourceData'] ?? [];
                $this->step = $record->step ?? 2;
            }
        } elseif (!empty($this->states)) {
            $this->selectState($this->states[0]->id, $this->states[0]->name);
        }
    }

    public function createShareLink()
    {
        $hashId = \Illuminate\Support\Str::random(8);
        $data = [
            'selectedCities' => $this->selectedCities,
            'selectedLanguages' => $this->selectedLanguages,
            'selectedPlans' => $this->selectedPlans,
            'cityData' => $this->cityData,
            'sourceData' => $this->sourceData,
        ];

        \Illuminate\Support\Facades\DB::table('partner-plan-ref')->insert([
            'hash_id' => $hashId,
            'data' => json_encode($data),
            'step' => $this->step,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->shareUrl = url('/partners/india-city/' . $hashId);
    }

    public function selectState($stateId, $stateName)
    {
        $this->selectedState = $stateId;
        $this->selectedStateName = $stateName;
        $this->loadCities();
    }

    public function toggleCity($cityId, $cityName)
    {
        if (isset($this->selectedCities[$this->selectedStateName][$cityId])) {
            // Always allow deselection
            unset($this->selectedCities[$this->selectedStateName][$cityId]);
            if (empty($this->selectedCities[$this->selectedStateName])) {
                unset($this->selectedCities[$this->selectedStateName]);
            }
        } else {
            // Count total selected cities across all states
            $totalSelected = collect($this->selectedCities)->sum(fn($cities) => count($cities));
            if ($totalSelected >= 25) {
                return; // Silently enforce the limit
            }
            $this->selectedCities[$this->selectedStateName][$cityId] = $cityName;
        }
    }

    public function removeCity($stateName, $cityId)
    {
        if (isset($this->selectedCities[$stateName][$cityId])) {
            unset($this->selectedCities[$stateName][$cityId]);
            if (empty($this->selectedCities[$stateName])) {
                unset($this->selectedCities[$stateName]);
            }
        }
    }

    public function loadCities()
    {
        $this->cities = [];

        if (!$this->selectedState) return;

        try {
            $response = httpGet('v1/pages/town-filter-by-type-30k', ['state_id' => $this->selectedState]);
            $data = $response['data'] ?? [];

            $transformer = function ($data) {
                if (is_array($data) && !isset($data[0])) {
                    return collect($data)->map(function ($name, $id) {
                        return (object)['id' => (string)$id, 'name' => $name];
                    })->sortBy('name')->values()->toArray();
                }
                return collect($data)->map(function ($item) {
                    return (object)$item;
                })->sortBy('name')->values()->toArray();
            };
            // Only need District Capitals (DHQ)
            $this->cities = $transformer($data['dc'] ?? []);
        } catch (\Exception $e) {
            $this->cities = [];
        }
    }

    public function changeStep($move = 'next')
    {
        if ($move == "back") {
            $this->step--;
        } else {
            $this->step++;
        }
    }

    public function confirmSelection()
    {
        $cityIds = [];
        foreach ($this->selectedCities as $stateName => $stateCities) {
            foreach (array_keys($stateCities) as $cityId) {
                $cityIds[] = explode("-", $cityId)[0];
            }
        }
        $response = httpGet('partner-india-cities-data', ['city_ids' => $cityIds]);

        if (isset($response['Status']) && $response['Status'] === 'Success') {
            $this->step = 2;
            $this->cityData = collect($response['cities'])->values()->toArray();
            $this->sourceData = $response['source'] ?? [];
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
        } else {
            // Can add an error notice here later if needed
        }
    }

    public function confirmPlanSelection()
    {
        $this->step = 4;
    }

    public function goToStepFive()
    {
        $this->step = 5;
    }

    public function sendEnrolment()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        // Gather data for the email
        $planData = [];
        $planPrices = [
            'light' => 14000,
            'plus' => 45000,
            'prime' => 500000,
        ];
        $totalPrice = 0;

        foreach ($this->cityData as $city) {
            $citySelectedPlans = [];
            foreach ($this->selectedPlans as $key => $planVal) {
                if (str_starts_with($key, $city['city_id'] . '-')) {
                    $parts = explode('-', $planVal);
                    $pType = end($parts);
                    $lCode = $parts[1];
                    $price = $planPrices[$pType] ?? 0;
                    $totalPrice += $price;

                    $citySelectedPlans[] = [
                        'language' => $this->getLanguageTitle($lCode),
                        'plan' => ucfirst($pType),
                        'price' => $price,
                    ];
                }
            }
            if (count($citySelectedPlans) > 0) {
                $planData[] = [
                    'city' => $city['city_name'],
                    'plans' => $citySelectedPlans
                ];
            }
        }

        // Generate share link for Step 3 configuration
        $hashId = \Illuminate\Support\Str::random(8);
        $dataToSave = [
            'selectedCities' => $this->selectedCities,
            'selectedLanguages' => $this->selectedLanguages,
            'selectedPlans' => $this->selectedPlans,
            'cityData' => $this->cityData,
            'sourceData' => $this->sourceData,
        ];

        \Illuminate\Support\Facades\DB::table('partner-plan-ref')->insert([
            'hash_id' => $hashId,
            'data' => json_encode($dataToSave),
            'step' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $shareUrl = url('/partners/india-city/' . $hashId);

        $enrolmentData = [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'company_name' => $this->company_name,
            'website' => $this->website,
            'planData' => $planData,
            'totalPrice' => $totalPrice,
            'date' => date('d M, Y'),
            'shareUrl' => $shareUrl,
        ];

        try {
            \Illuminate\Support\Facades\Mail::to($this->email)
                ->cc([
                    'sales@prarang.in',
                ])
                ->send(new \App\Mail\PartnerEnrolmentMail($enrolmentData));

            $this->isSubmitted = true;
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to send email. Please try again.');
        }
    }

    protected function getLanguageTitle($code)
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

    protected function loadStates()
    {
        try {
            $statesData = [
                ['id' => 1, 'name' => 'Jammu And Kashmir', 'type' => 'ut', 'population' => 12541302],
                ['id' => 2, 'name' => 'Himachal Pradesh', 'type' => 'state', 'population' => 6864602],
                ['id' => 3, 'name' => 'Punjab', 'type' => 'state', 'population' => 27743338],
                ['id' => 4, 'name' => 'Chandigarh', 'type' => 'ut', 'population' => 1055450],
                ['id' => 5, 'name' => 'Uttarakhand', 'type' => 'state', 'population' => 10086292],
                ['id' => 6, 'name' => 'Haryana', 'type' => 'state', 'population' => 25351462],
                ['id' => 7, 'name' => 'National Capital Territory of Delhi', 'type' => 'ut', 'population' => 16787941],
                ['id' => 8, 'name' => 'Rajasthan', 'type' => 'state', 'population' => 68548437],
                ['id' => 9, 'name' => 'Uttar Pradesh', 'type' => 'state', 'population' => 199812341],
                ['id' => 10, 'name' => 'Bihar', 'type' => 'state', 'population' => 104099452],
                ['id' => 11, 'name' => 'Sikkim', 'type' => 'state', 'population' => 610577],
                ['id' => 12, 'name' => 'Arunachal Pradesh', 'type' => 'state', 'population' => 1383727],
                ['id' => 13, 'name' => 'Nagaland', 'type' => 'state', 'population' => 1978502],
                ['id' => 14, 'name' => 'Manipur', 'type' => 'state', 'population' => 2855794],
                ['id' => 15, 'name' => 'Mizoram', 'type' => 'state', 'population' => 1097206],
                ['id' => 16, 'name' => 'Tripura', 'type' => 'state', 'population' => 3673917],
                ['id' => 17, 'name' => 'Meghalaya', 'type' => 'state', 'population' => 2966889],
                ['id' => 18, 'name' => 'Assam', 'type' => 'state', 'population' => 31205576],
                ['id' => 19, 'name' => 'West Bengal', 'type' => 'state', 'population' => 91276115],
                ['id' => 20, 'name' => 'Jharkhand', 'type' => 'state', 'population' => 32988134],
                ['id' => 21, 'name' => 'Odisha', 'type' => 'state', 'population' => 41974218],
                ['id' => 22, 'name' => 'Chhattisgarh', 'type' => 'state', 'population' => 25545198],
                ['id' => 23, 'name' => 'Madhya Pradesh', 'type' => 'state', 'population' => 72626809],
                ['id' => 24, 'name' => 'Gujarat', 'type' => 'state', 'population' => 60439692],
                ['id' => 27, 'name' => 'Maharashtra', 'type' => 'state', 'population' => 112374333],
                ['id' => 28, 'name' => 'Andhra Pradesh', 'type' => 'state', 'population' => 49386799],
                ['id' => 29, 'name' => 'Karnataka', 'type' => 'state', 'population' => 61095297],
                ['id' => 30, 'name' => 'Goa', 'type' => 'state', 'population' => 1458545],
                ['id' => 31, 'name' => 'Lakshadweep', 'type' => 'ut', 'population' => 64473],
                ['id' => 32, 'name' => 'Kerala', 'type' => 'state', 'population' => 33406061],
                ['id' => 33, 'name' => 'Tamil Nadu', 'type' => 'state', 'population' => 72147030],
                ['id' => 34, 'name' => 'Puducherry', 'type' => 'ut', 'population' => 1247953],
                ['id' => 35, 'name' => 'Andaman and Nicobar', 'type' => 'ut', 'population' => 380581],
                ['id' => 36, 'name' => 'Telangana', 'type' => 'state', 'population' => 35193978],
                ['id' => 37, 'name' => 'Ladakh', 'type' => 'ut', 'population' => 274000],
                ['id' => 38, 'name' => 'Dadra and Nagar Haveli and Daman and Diu', 'type' => 'ut', 'population' => 585764],
            ];

            $this->states = collect($statesData)
                ->sort(function ($a, $b) {
                    $typeOrder = ['state' => 0, 'ut' => 1];
                    if ($typeOrder[$a['type']] !== $typeOrder[$b['type']]) {
                        return $typeOrder[$a['type']] <=> $typeOrder[$b['type']];
                    }
                    return $b['population'] <=> $a['population'];
                })
                ->map(function ($item) {
                    return (object)[
                        'id' => (string)$item['id'],
                        'name' => $item['name'],
                        'type' => $item['type'],
                    ];
                })
                ->values()
                ->toArray();
        } catch (\Exception $e) {
            $this->states = [];
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


        return view('livewire.pages.partners.india-city', ['lang_titles' => $langTitle])
            ->layout('components.layout.main.base', [
                'metaData' => [
                    'nav-heading' => 'India - Cities: Digital Marketing',
                    'nav-sub-heading' => ""
                ],
            ]);
    }
}
