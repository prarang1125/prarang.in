<?php

namespace App\Livewire\Pages;

use League\Uri\Http;
use Livewire\Component;

class CzeComparisonTool extends Component
{
    // Selection state
    public $selectedCzeRegion = null;
    public $selectedIndiaCities = [];
    public $isConfirmed = false;
    public $errorMessage = '';
    public $output = [];
    // Constants
    public const MAX_INDIA_CITIES = 3;
    public const CZECH_REGIONS = [
        1 => 'Prague and Central Bohemia',
        2 => 'South Bohemia',
        3 => 'Pilsen',
        4 => 'Karlovy Vary',
        5 => 'Usti nad Labem',
        6 => 'Liberec',
        7 => 'Hradec Kralove',
        8 => 'Pardubice',
        9 => 'Vysocina',
        10 => 'South Moravia',
        11 => 'Olomouc',
        12 => 'Zlin',
        13 => 'Moravia-Silesia',
    ];

    /**
     * Get Indian cities grouped by state from API
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
     * Toggle Czech Republic region selection (only 1 allowed)
     */
    public function toggleCzeRegion($regionId)
    {
        // Toggle: if same region clicked, deselect; otherwise select new one
        $this->selectedCzeRegion = ($this->selectedCzeRegion == $regionId) ? null : $regionId;
    }

    /**
     * Toggle Indian city selection (max 3 allowed)
     * $cityData contains id and city name
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
     * Confirm selection and show comparison results
     */
    public function confirmSelection()
    {

        if (!$this->selectedCzeRegion) {
            $this->errorMessage = 'Please select a Czech region';
            return;
        }

        if (empty($this->selectedIndiaCities)) {
            $this->errorMessage = 'Please select at least one Indian city';
            return;
        }

        $this->errorMessage = '';
        $this->isConfirmed = true;
        $czeData = httpGet('/cze/get-top-rank-data', [
            'city_code' => $this->selectedCzeRegion,
        ])['data']['cnSentances'];
        foreach ($this->selectedIndiaCities as $city) {
            $cityData = httpGet('/india-culture-nature-sec', [
                'city_id' => $city['id'],
            ])['sentence'];
            $this->output['india'][] = $cityData;
        }

        $this->output['cze'][] = $czeData;
    }

    /**
     * Reset all selections
     */
    public function resetSelection()
    {
        $this->selectedCzeRegion = null;
        $this->selectedIndiaCities = [];
        $this->isConfirmed = false;
        $this->output = [
            'cze' => [],
            'india' => [],
        ];
    }

    /**
     * Get total selected count
     */
    public function getSelectedCountProperty()
    {
        return ($this->selectedCzeRegion ? 1 : 0) + count($this->selectedIndiaCities);
    }

    /**
     * Get Czech region name by ID
     */
    public function getCzeRegionNameProperty()
    {
        return self::CZECH_REGIONS[$this->selectedCzeRegion] ?? 'None';
    }

    public function render()
    {
        return view('livewire.pages.cze-comparison-tool', [
            'czechRegions' => self::CZECH_REGIONS,
            'indianStates' => $this->getIndianCitiesWithState(),
            'maxIndiaCities' => self::MAX_INDIA_CITIES,
        ])->layout('components.layout.main.cze');
    }
}
