<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Cirus extends Component
{
    public $view = 'india';

    // India
    public $allDhqRows = [];
    public $topDhqRows = [];
    public $stateTableData = [];
    public $stateDistrictsMap = [];
    public $expandedStates = [];
    public $selectedDistricts = [];
    public $showCompareIndia = false;
    public $indiaComparisonRows = [];
    public $selectedDistrictIds = [];

    // World
    public $allCountries = [];
    public $topCountries = [];
    public $continents = [];
    public $continentCountriesMap = [];
    public $expandedContinents = [];
    public $selectedCountries = [];
    public $showCompareWorld = false;
    public $worldComparisonRows = [];
    public $selectedCountryIds = [];

    public $limitSelection = 10;

    public function mount()
    {
        $this->loadData();
    }
    private function loadData()
    {
        try {
            // Cache data to reduce API calls
            $cacheKey = 'cirus_dashboard_data';
            $cachedData = cache()->get($cacheKey);

            if ($cachedData) {
                extract($cachedData);
                $this->allDhqRows = $dhq;
                $this->allCountries = $countries;
                $this->continents = $continents;
                $this->stateTableData = $stateData;
                $this->topDhqRows = $topDhq;
                $this->topCountries = $topCountries;
                return;
            }

            // API Calls
            $dhq = httpGetAPS('/cirus/dhq')['data'] ?? [];
            $states = httpGetAPS('/cirus/states')['data'] ?? [];
            $countries = httpGetAPS('/cirus/countries')['data'] ?? [];
            $continents = httpGetAPS('/cirus/continents')['data'] ?? [];

            // Normalize state table
            $stateData = collect($states)
                ->map(function ($s) {
                    if (is_string($s)) return ['state' => $s];
                    return [
                        'state' => $s['state'] ?? $s['state_ut'] ?? $s['state_name'] ?? $s['name'] ?? ''
                    ] + $s;
                })
                ->filter(fn($x) => trim($x['state']) !== '')
                ->values()
                ->toArray();

            // Top 10 DHQ
            $topDhq = collect($dhq)
                ->sortByDesc(fn($x) => intval($x['cyber_risk_rank'] ?? 0))
                ->take(10)
                ->values()
                ->toArray();

            // Top 5 Countries
            $topCountries = collect($countries)
                ->sortByDesc(fn($x) => intval($x['cyber_risk_rank'] ?? 0))
                ->take(5)
                ->values()
                ->toArray();

            // Cache for 1 hour
            cache()->put($cacheKey, [
                'dhq' => $dhq,
                'countries' => $countries,
                'continents' => $continents,
                'stateData' => $stateData,
                'topDhq' => $topDhq,
                'topCountries' => $topCountries,
            ], 3600);

            $this->allDhqRows = $dhq;
            $this->allCountries = $countries;
            $this->continents = $continents;
            $this->stateTableData = $stateData;
            $this->topDhqRows = $topDhq;
            $this->topCountries = $topCountries;
        } catch (\Exception $e) {
            logger()->error("Cirus loading error: " . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.cirus')->layout('components.layout.main.base');
    }

    // Load districts under state
    public function toggleStateExpanded($state)
    {
        // Agar same state already open hai → close kar do
        if (in_array($state, $this->expandedStates)) {
            $this->expandedStates = [];
            return;
        }

        // Ek hi state open rahegi → purani sab clear
        $this->expandedStates = [$state];

        // Districts data load (cached)
        if (!isset($this->stateDistrictsMap[$state])) {
            $cacheKey = 'cirus_districts_' . md5($state);
            $data = cache()->get($cacheKey);

            if (!$data) {
                $data = httpGetAPS("/cirus/dhq/" . $state)['data'] ?? [];
                cache()->put($cacheKey, $data, 86400);
            }

            $this->stateDistrictsMap[$state] = $data;
        }
    }


    public function toggleDistrictSelect($rowId)
    {
        // This method is now only called from Compare button click
        // Individual checkbox selections are handled client-side
        if (in_array($rowId, $this->selectedDistricts)) {
            $this->selectedDistricts = array_diff($this->selectedDistricts, [$rowId]);
        } else {
            if (count($this->selectedDistricts) >= $this->limitSelection) return;
            $this->selectedDistricts[] = $rowId;
        }
    }

    public function syncDistrictSelection($selectedIds)
    {
        // Sync selected districts from client-side to server
        $this->selectedDistricts = is_array($selectedIds) ? $selectedIds : [];
    }

    public function syncDistrictSelectionAndCompare()
    {
        // Sync and filter data based on selectedDistrictIds
        if (count($this->selectedDistrictIds)) {
            $this->indiaComparisonRows = collect($this->allDhqRows)
                ->filter(
                    fn($r) => in_array(
                        $r['id'] ?? $r['state_district_capital'],
                        $this->selectedDistrictIds,
                    ),
                )
                ->values()
                ->toArray();
            $this->showCompareIndia = true;
        }
    }

    // Continent expand
    public function toggleContinentExpanded($continent)
    {
        if (in_array($continent, $this->expandedContinents)) {
            $this->expandedContinents = array_diff($this->expandedContinents, [$continent]);
            return;
        }

        $this->expandedContinents[] = $continent;
        if (!isset($this->continentCountriesMap[$continent])) {
            $cacheKey = 'cirus_countries_' . md5($continent);
            $data = cache()->get($cacheKey);
            if (!$data) {
                $data = httpGetAPS("/cirus/countries/" . $continent)['data'] ?? [];
                cache()->put($cacheKey, $data, 86400); // Cache for 24 hours
            }
            $this->continentCountriesMap[$continent] = $data;
        }
    }

    public function toggleCountrySelect($rowId)
    {
        // This method is now only called from Compare button click
        // Individual checkbox selections are handled client-side
        if (in_array($rowId, $this->selectedCountries)) {
            $this->selectedCountries = array_diff($this->selectedCountries, [$rowId]);
        } else {
            if (count($this->selectedCountries) >= $this->limitSelection) return;
            $this->selectedCountries[] = $rowId;
        }
    }

    public function syncCountrySelection($selectedIds)
    {
        // Sync selected countries from client-side to server
        $this->selectedCountries = is_array($selectedIds) ? $selectedIds : [];
    }

    public function syncCountrySelectionAndCompare()
    {
        // Sync and filter data based on selectedCountryIds
        if (count($this->selectedCountryIds)) {
            $this->worldComparisonRows = collect($this->allCountries)
                ->filter(fn($r) => in_array($r['id'] ?? $r['country'], $this->selectedCountryIds))
                ->values()
                ->toArray();
            $this->showCompareWorld = true;
        }
    }

    public function nextIndia()
    {
        if (count($this->selectedDistricts)) {
            $this->indiaComparisonRows = collect($this->allDhqRows)
                ->filter(
                    fn($r) => in_array(
                        $r['id'] ?? $r['state_district_capital'],
                        $this->selectedDistricts,
                    ),
                )
                ->values()
                ->toArray();
            $this->showCompareIndia = true;
        }
    }

    public function resetIndia()
    {
        $this->selectedDistricts = [];
        $this->selectedDistrictIds = [];
        $this->showCompareIndia = false;
        $this->indiaComparisonRows = [];
        $this->expandedStates = [];
        $this->stateDistrictsMap = [];
    }

    public function nextWorld()
    {
        if (count($this->selectedCountries)) {
            $this->worldComparisonRows = collect($this->allCountries)
                ->filter(fn($r) => in_array($r['id'] ?? $r['country'], $this->selectedCountries))
                ->values()
                ->toArray();
            $this->showCompareWorld = true;
        }
    }

    public function resetWorld()
    {
        $this->selectedCountries = [];
        $this->selectedCountryIds = [];
        $this->showCompareWorld = false;
        $this->worldComparisonRows = [];
        $this->expandedContinents = [];
        $this->continentCountriesMap = [];
    }

    public function downloadDistrictExcel()
    {
        return response()->download(
            $this->generateDistrictExcel(),
            'district-comparison-' . date('Y-m-d-H-i-s') . '.xlsx'
        );
    }

    public function downloadCountryExcel()
    {
        return response()->download(
            $this->generateCountryExcel(),
            'country-comparison-' . date('Y-m-d-H-i-s') . '.xlsx'
        );
    }

    private function generateDistrictExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add title
        $sheet->setCellValue('A1', 'District Comparison Report');
        $sheet->mergeCells('A1:M1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

        // Add headers
        $columns = [
            'state_district_capital',
            'state_ut',
            'cyber_risk_index',
            'internet_penetration_percent',
            'internet_audience_percent_literate',
            'facebook_audience_percent_literate',
            'facebook_audience_percent_internet',
            'linkedin_audience_percent_literate',
            'linkedin_audience_percent_internet',
            'linkedin_audience_per_100_formal_employees',
            'twitter_audience_percent_literate',
            'twitter_audience_percent_internet',
            'cyber_crime_rate_per_1000_internet'
        ];

        $labels = config('cirus.india.field_labels', []);
        $columnLetter = 'A';
        foreach ($columns as $header) {
            $label = $labels[$header] ?? str_replace('_', ' ', ucwords($header, '_'));
            $sheet->setCellValue($columnLetter . '2', $label);
            $columnLetter++;
        }

        $sheet->getStyle('A2:M2')->getFont()->setBold(true);
        $sheet->getStyle('A2:M2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FF0488CD');

        // Add data
        $row = 3;
        foreach ($this->indiaComparisonRows as $data) {
            $columnLetter = 'A';
            foreach ($columns as $column) {
                $sheet->setCellValue($columnLetter . $row, $data[$column] ?? '');
                $columnLetter++;
            }
            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'M') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $filename = storage_path('app/district-comparison-' . time() . '.xlsx');
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        return $filename;
    }

    private function generateCountryExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add title
        $sheet->setCellValue('A1', 'Country Comparison Report');
        $sheet->mergeCells('A1:L1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

        // Add headers
        $columns = [
            'country',
            'cyber_risk_index',
            'internet_penetration_percent',
            'internet_audience_percent_literate',
            'facebook_audience_percent_literate',
            'facebook_audience_percent_internet',
            'linkedin_audience_percent_literate',
            'linkedin_audience_percent_internet',
            'linkedin_audience_per_100_formal_employees',
            'twitter_audience_percent_literate',
            'twitter_audience_percent_internet',
            'cyber_crime_rate_per_1000_internet'
        ];

        $labels = config('cirus.world.field_labels', []);
        $columnLetter = 'A';
        foreach ($columns as $header) {
            $label = $labels[$header] ?? str_replace('_', ' ', ucwords($header, '_'));
            $sheet->setCellValue($columnLetter . '2', $label);
            $columnLetter++;
        }

        $sheet->getStyle('A2:L2')->getFont()->setBold(true);
        $sheet->getStyle('A2:L2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FF0488CD');

        // Add data
        $row = 3;
        foreach ($this->worldComparisonRows as $data) {
            $columnLetter = 'A';
            foreach ($columns as $column) {
                $sheet->setCellValue($columnLetter . $row, $data[$column] ?? '');
                $columnLetter++;
            }
            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'L') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $filename = storage_path('app/country-comparison-' . time() . '.xlsx');
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        return $filename;
    }
}
