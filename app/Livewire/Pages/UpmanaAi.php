<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Services\SentenceService;
use App\Services\TransformerService;
use App\Services\VerticalService;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class UpmanaAi extends Component
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

    protected $verticalService;
    protected $sentenceService;
    public $selectedCities = [];
    public $selectedStates = [];
    public $selectedCountries = [];
    public $source;
    public $citiesTOChose, $firstCity, $takeme;
    public $genHit;


    public function mount(SentenceService $sentenceService)
    {
        session(['chat_id' => uniqid('chat_', true)]);
        $this->verticalService = httpGet('/upamana/get-verticals', [])['data'];
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
    }

    public function toggleMainCheck($main)
    {
        if (in_array($main, $this->activeMainChecks)) {
            $this->activeMainChecks = array_diff($this->activeMainChecks, [$main]);
        } else {
            $this->activeMainChecks[] = $main;
        }

        // $this->updatePromptFromState();
    }

    public function generate()
    {
        if ($this->genHit == 2) {
            $this->dispatch('show-register-modal');
            return;
        } else {
            $this->genHit++;
            session()->put('gen-hit', $this->genHit);
        }

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

        // if ($this->getErrorBag()->isNotEmpty()) {
        //     return;
        // }
        $this->activeSection['firstPrompt'] = false;
        $this->activeSection['promptBox'] = false;
        $this->activeSection['output'] = true;

        $this->messages = [];
        $this->messages['danger'][] = 'Failed to generate response!';

        if (empty($this->geography())) {
            $this->messages['warning'][] = 'Please provide a location ID and prompt.';
            return;
        }

        $topic = array_keys($this->subChecks);

        $fields = collect($this->subChecks)
            ->flatMap(fn($group) => array_keys(array_filter($group)))
            ->unique()
            ->values()
            ->all();

        $topic = array_diff($this->activeMainChecks, $topic);

        // $newOutput = $transformerService->transform($this->geography(), $fields, $this->prompt, $topic);
        $newOutput = httpGet('/upamana/transformer', ['ids' => $this->geography(), 'fields' => $fields, 'prompt' => $this->prompt, 'topic' => $topic])['data'];

        if ($newOutput == 400) {
            $this->messages['warning'][] = 'Please choose/Compare a different location or field.';
            return;
        }

        if (isset($newOutput['comparison_sentence'])) {
            $this->comparisonSentence = $newOutput['comparison_sentence'];
        }
        $this->source = collect($this->makeSource($fields))->toArray();
        $this->firstCity = $this->geography();
        $this->output = $newOutput;
        // dd($this->output);
        // $flattened = $this->flattenValuesOnly($newOutput);
        // $this->output =  implode('<br>', $flattened);
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

        if (count($this->geography()) == 2) {
            $this->comparisonSentence = "In comparison, {$this->geography()[0]} is :area km² in size, and :population in population, while {$this->geography()[1]} is :area2 km² in size, and :population2 in population.";
        } else {

            $this->comparisonSentence = '';
        }

        $this->dispatch('closemodal');

        $fields = collect($this->subChecks)
            ->flatMap(fn($group) => array_keys(array_filter($group)))
            ->unique()
            ->values()
            ->all();

        $this->prompt = $this->sentenceService->makePrompt($this->geography(), $fields);
    }



    public function compareResponse()
    {
        $this->dispatch('compare-now', ['prompt' => $this->prompt]);
    }

    public function makeSource($fields)
    {
        return httpGet('/upamana/make-source', ['fields' => $fields])['data'];
    }

    public function render()
    {
        return view('livewire.pages.upmana-ai')->layout('components.layout.main.base');
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
        if (count($this->cities) < 2) {
            session()->flash('cityerror', 'Please select at least two geography to compare.');
        }
        return $this->cities;
    }




    public function processHtml()
    {
        dd($this->takeme);
    }
}
