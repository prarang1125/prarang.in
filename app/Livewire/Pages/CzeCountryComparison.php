<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Services\SentenceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class CzeCountryComparison extends Component
{
    public $output = [];
    public $entity = [];
    public $prompt = '';
    public $response = '';
    public $cities = [];
    public $mainChecks = [];
    public $activeMainChecks = [];
    public $subChecks = [];
    public $messages = [];
    public $comparisonSentence = '';
    public $activeSection = [];
    public $selectedModels = [];
    public $selectedSequence = [];

    protected $verticalService;
    protected $sentenceService;
    public $selectedCities = [];
    public $selectedStates = [];
    public $selectedCountries = [];
    public $source;
    public $citiesTOChose, $firstCity, $takeme;
    public $genHit, $isRegistered;
    public $localLocation, $lables;
    public $selectedLanguage = '';

    public $type;

    // Regional comparison properties
    public $selectedCzeRegions = [];
    public $selectedIndiaCities = [];
    public $isConfirmed = false;
    public $errorMessage = '';
    public $czeFields = [];
    public $insCities = [];
    public $share;

    // Constants for regional comparison
    public const MAX_INDIA_CITIES = 3;
    public const MAX_CZE_REGIONS = 3;
    public const CZECH_REGIONS = [
        1 => 'Prague - Central Bohemia',
        2 => 'South Bohemia',
        3 => 'Pilsen',
        4 => 'Karlovy Vary',
        5 => 'Usti - Labem',
        6 => 'Liberec',
        7 => 'Hradec Kralove',
        8 => 'Pardubice',
        9 => 'Vysocina',
        10 => 'South Moravia',
        11 => 'Olomouc',
        12 => 'Zlin',
        13 => 'Moravia-Silesia',
    ];

    public function mount(Request $request, $type, SentenceService $sentenceService, $lang = null)
    {



        $this->type = $type;
        if ($lang) {
            session()->put('locale', $lang);
            APP::setLocale($lang);
        } else {
            $this->selectedLanguage = session('locale', 'en');
            app()->setlocale($this->selectedLanguage);
        }

        // Auto-select Czech Republic only for country comparison
        if ($this->type === 'country') {
            $this->cities[] = json_encode(['name' => 'Czech Republic', 'real_name' => 'Czech Republic']);
        }

        session(['chat_id' => uniqid('chat_', true)]);
        $this->verticalService = httpGet('/upamana/get-verticals/' . app()->getLocale())['data'];
        $this->czeFields = httpGet('/upamana/get-cze-india-verticals/')['data'];
        $this->sentenceService = $sentenceService;
        $this->mainChecks = $this->verticalService;
        $this->messages['success'][] = 'Session started!';
        $this->activeSection = [
            'firstPrompt' => true,
            'category' => true,
            'promptBox' => true,
            'geography' => true,
            'output' => false
        ];
        $this->citiesTOChose = $this->sentenceService->geography();
        $this->genHit = session()->get('gen-hit', 0);
        $this->isRegistered = session()->has('upmana-auth');
        $local = App::getLocale();
        $this->lables = cache()->remember('local-labelss' . $local, now()->addDays(1), function () use ($local) {
            $lable = httpGet('/local/lable/', ['local' => $local]);

            if ($lable['status'] == 'success') {
                return $lable['data'];
            }
            return [];
        });
        $this->share = $request->query('share', null);
        if ($this->share) {

            $share = explode('@', base64_decode($request->query('share')));
            $location = $share[0];
            $fields = $share[1];
            $this->prompt = "";
            $this->generate(explode('-', $location), explode('-', $fields));
        }
    }
    public function changeLanguage(SentenceService $sentenceService)
    {
        // dd($this->selectedLanguage);

        if ($this->selectedLanguage) {
            session()->put('locale', $this->selectedLanguage);
            APP::setLocale($this->selectedLanguage);
        }
        $local = App::getLocale();
        if (isset($this->output) && $this->output != []) {
            $this->updatePromptFromState();
            $this->generate();
            $this->lables = cache()->remember('local-labelss' . $local, now()->addDays(1), function () use ($local) {
                $lable = httpGet('/local/lable/', ['local' => $local]);

                if ($lable['status'] == 'success') {
                    return $lable['data'];
                }
                return [];
            });
        } else {

            return redirect()->route('upmana-ai');
        }
    }
    public function toggleMainCheck($main)
    {
        if (in_array($main, $this->activeMainChecks)) {
            $this->activeMainChecks = array_diff($this->activeMainChecks, [$main]);
        } else {
            $this->activeMainChecks[] = $main;
        }
    }

    public function generate($locationIds = null, $fieldIds = null)
    {

        // For regional mode, use confirmSelection instead
        // if ($this->type === 'regional') {
        //     $this->confirmSelection();
        // }
      
        if (!$fieldIds && true) {

            $this->validate(
                [
                    'subChecks' => 'required|array|min:1',
                    'subChecks.*' => 'required|array',
                ],
                [
                    'subChecks.required' => 'Please choose at least one thing.',
                    'subChecks.min' => 'Please choose at least one thing.',
                    'subChecks.*.required' => 'Please choose at least one things.',
                ]
            );
        }
       
        $fields = collect($this->subChecks)
            ->flatMap(fn($group) => array_keys(array_filter($group)))
            ->unique()
            ->values()
            ->all();
        if ($locationIds && $fieldIds) {
            $fields = $fieldIds;

            $cities = $locationIds;
        }
        $this->activeSection['firstPrompt'] = false;
        $this->activeSection['promptBox'] = false;
        $this->activeSection['output'] = true;

        $this->messages = [];
        $this->messages['danger'][] = 'Failed to generate response!';

        // if (empty($this->geography()['city'])) {
        //     $this->messages['warning'][] = 'Please provide a location ID and prompt.';
        //     return;
        // }
        // dd($locationIds, $fieldIds);
        $topic = array_keys($this->subChecks);
        // dd($this->subChecks);
        $topic = array_diff($this->activeMainChecks, $topic);
        $this->updatePromptFromState();
        $newOutput = httpGet('/upamana/transformer', [
            'ids' => $cities ?? $this->geography()['city'],
            'fields' => $fields,
            'prompt' => $this->prompt,
            'topic' => $topic,
            'locale' => app()->getLocale()
        ])['data'];

        if ($newOutput == 400) {
            $this->messages['warning'][] = 'Please choose/Compare a different location or field.';
            return;
        }

        if (isset($newOutput['comparison_sentence'])) {
            $this->comparisonSentence = $newOutput['comparison_sentence'];
        }
        $this->source = collect($this->makeSource($fields))->toArray();
        $this->output = $newOutput;
    }

    public function toggleAllSubChecks($main)
    {
        if (!isset($this->subChecks[$main])) {
            $this->subChecks[$main] = [];
        }

        $current = $this->subChecks[$main];

        if (count($current) === count($this->mainChecks[$main])) {
            $this->subChecks[$main] = [];
        } else {
            $allIds = [];
            foreach ($this->mainChecks[$main] as $sub) {
                $allIds[$sub->id] = true;
            }
            $this->subChecks[$main] = $allIds;
        }
    }

    public function updatePromptFromState()
    {


        if (!$this->sentenceService) {
            $this->sentenceService = new SentenceService;
        }

        if (count($this->geography()['city']) == 2) {
            $this->comparisonSentence = "In comparison, {$this->geography()['city'][0]} is :area km² in size, and :population in population, while {$this->geography()['city'][1]} is :area2 km² in size, and :population2 in population.";
        } else {

            $this->comparisonSentence = '';
        }

        $this->dispatch('closemodal');

        $fields = collect($this->subChecks)
            ->flatMap(fn($group) => array_keys(array_filter($group)))
            ->unique()
            ->values()
            ->all();

        $this->prompt = $this->sentenceService->makePrompt($this->geography()['local_name'], $fields);
    }



    public function compareResponse()
    {
        // Log the models before comparison
        Log::info('Models for Comparison: ', [
            'selectedModels' => $this->selectedModels,
            'selectedSequence' => $this->selectedSequence
        ]);

        $this->dispatch('compare-now', ['prompt' => $this->prompt]);
    }

    public function makeSource($fields)
    {
        return httpGet('/upamana/make-source', ['fields' => $fields])['data'];
    }


    public function flattenValuesOnly(array $array): array
    {
        $flat = [];

        foreach ($array as $value) {
            if (is_array($value)) {
                $flat = array_merge($flat, $this->flattenValuesOnly($value));
            } else {
                $flat[] = $value;
            }
        }

        return $flat;
    }

    private function  geography()
    {

        $cities = ['city' => [], 'local_name' => []];
        foreach ($this->cities as $city) {
            $cities['city'][] = json_decode($city)->name;
            $cities['location_type']['city'][] =  json_decode($city)->name;
            $cities['local_name'][] = json_decode($city)->real_name;
        }
        foreach ($this->selectedCzeRegions as $region) {
            $cities['city'][] = $region;
            $cities['location_type']['region'][] = $region;
            $cities['local_name'][] = $region;
        }
        foreach ($this->selectedIndiaCities as $city) {
            $cities['city'][] = $city['city'];
            $cities['location_type']['city'][] = $city['city'];
            $cities['local_name'][] = $city['city'];
        }

        if (count($cities['city']) < 2) {
            session()->flash('cityerror', 'Please select at least two geography to compare.');
        }
        $this->insCities = $cities['location_type']??[];
        return $cities;
    }




    public function processHtml()
    {
        // dd($this->takeme);
    }

    /**
     * Get Indian cities grouped by state from API (for regional mode)
     */
    public function getIndianCitiesWithState()
    {
        $response = httpGet('/cities', ['groupby' => 1, 'group' => 'MSTR1']);
        $cities = $response['data'] ?? [];

        // Convert to array if it's a collection
        if (is_object($cities) && method_exists($cities, 'toArray')) {
            $cities = $cities->toArray();
        }

        return $cities;
    }

    /**
     * Toggle Czech Republic region selection (max 3 allowed)
     */
    public function toggleCzeRegion($regionId)
    {
        $index = array_search($regionId, $this->selectedCzeRegions);

        if ($index !== false) {
            // Region already selected - remove it
            unset($this->selectedCzeRegions[$index]);
            $this->selectedCzeRegions = array_values($this->selectedCzeRegions);
        } else {
            // Region not selected - add if under limit
            if (count($this->selectedCzeRegions) < self::MAX_CZE_REGIONS) {
                $this->selectedCzeRegions[] = $regionId;
                $this->errorMessage = ''; // Clear any previous error
            } else {
                $this->errorMessage = 'Maximum ' . self::MAX_CZE_REGIONS . ' Czech regions can be selected';
            }
        }
    }

    /**
     * Toggle Indian city selection (max 3 allowed)
     */
    public function toggleIndiaCity($cityId, $cityName)
    {
        $index = array_search($cityId, array_column($this->selectedIndiaCities, 'id'));

        if ($index !== false) {
            // City already selected - remove it
            unset($this->selectedIndiaCities[$index]);
            $this->selectedIndiaCities = array_values($this->selectedIndiaCities);
        } else {
            // City not selected - add if under limit
            if (count($this->selectedIndiaCities) < self::MAX_INDIA_CITIES) {
                $this->selectedIndiaCities[] = [
                    'id' => $cityId,
                    'city' => $cityName
                ];
                $this->errorMessage = ''; // Clear any previous error
            } else {
                $this->errorMessage = 'Maximum ' . self::MAX_INDIA_CITIES . ' cities can be selected';
            }
        }
    }

    /**
     * Confirm selection and show comparison results (for regional mode)
     */
    public function confirmSelection()
    {
        return;
        if (empty($this->selectedCzeRegions)) {
            // $this->errorMessage = 'Please select at least one Czech region';
            return;
        }

        if (empty($this->selectedIndiaCities)) {
            $this->errorMessage = 'Please select at least one Indian city';
            return;
        }

        // Validate metrics selection
        $this->validate(
            [
                'subChecks' => 'required|array|min:1',
                'subChecks.*' => 'required|array',
            ],
            [
                'subChecks.required' => 'Please choose at least one metric.',
                'subChecks.min' => 'Please choose at least one metric.',
                'subChecks.*.required' => 'Please choose at least one metric.',
            ]
        );

        $this->errorMessage = '';
        $this->isConfirmed = true;
    }

    /**
     * Reset all selections (for regional mode)
     */
    public function resetSelection()
    {
        $this->selectedCzeRegions = [];
        $this->selectedIndiaCities = [];
        $this->isConfirmed = false;
        $this->output = [];
        $this->errorMessage = '';
    }

    /**
     * Get total selected count (for regional mode)
     */
    public function getSelectedCountProperty()
    {
        return count($this->selectedCzeRegions) + count($this->selectedIndiaCities);
    }

    /**
     * Get Czech region name by ID (for regional mode)
     */
    /**
     * Get selected Czech region names (for regional mode)
     */
    public function getCzeRegionNamesProperty()
    {
        if (empty($this->selectedCzeRegions)) {
            return 'None';
        }

        return collect($this->selectedCzeRegions)
            ->map(fn($region) => self::CZECH_REGIONS[array_search($region, self::CZECH_REGIONS)] ?? $region)
            ->implode(', ');
    }

    public function render()
    {
        $data = [
            'czechRegions' => self::CZECH_REGIONS,
            'indianStates' => $this->type === 'regional' ? $this->getIndianCitiesWithState() : [],
            'maxIndiaCities' => self::MAX_INDIA_CITIES,
            'maxCzeRegions' => self::MAX_CZE_REGIONS,
            'selectedCzeRegions' => $this->selectedCzeRegions,
        ];

        return view('livewire.pages.cze-country-comparison', $data)->layout('components.layout.main.cze');
    }
}
