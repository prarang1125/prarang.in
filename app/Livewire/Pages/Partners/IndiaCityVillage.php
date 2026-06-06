<?php

namespace App\Livewire\Pages\Partners;

use App\Services\LocationFilter;
use Illuminate\Support\Str;
use Livewire\Component;

class IndiaCityVillage extends Component
{
    private LocationFilter $service;

    public array $states = [];
    public array $townDistricts = [];
    public array $villageDistricts = [];
    public array $villageSubDistricts = [];
    public array $villages = [];
    public array $towns = [];

    public $townState, $townDistrict, $townCityType;
    public $villageState, $villageDistrict, $villageSubDistrict;
    public array $selectedTownIds = [];
    public array $selectedVillageIds = [];

    public array $selectedTownsList = [];
    public array $selectedVillagesList = [];

    public function boot()
    {
        $this->service = new LocationFilter();
    }

    public function mount($hashId = null)
    {
        $this->states = $this->service->loadStates();
    }

    public function updatedTownState($value)
    {
        if ($value) {
            $this->townDistrict = null;
            $this->townCityType = '';
            $this->townDistricts = [];
            $this->towns = [];

            $this->loadTownDistricts();
            $this->loadTownOptions();
        } else {
            $this->townDistrict = null;
            $this->townCityType = '';
            $this->townDistricts = [];
            $this->towns = [];
        }
    }

    public function updatedTownCityType($value)
    {
        $this->loadTownOptions();
    }

    public function updatedTownDistrict($value)
    {
        $this->towns = [];

        if ($value) {
            $this->loadTownOptions();
        } else {
            $this->loadTownOptions();
        }
    }

    public function updatedVillageState($value)
    {
        if ($value) {
            $this->villageDistrict = null;
            $this->villageSubDistrict = null;
            $this->villageDistricts = [];
            $this->villageSubDistricts = [];
            $this->villages = [];

            $this->loadVillageDistricts();
        } else {
            $this->villageDistrict = null;
            $this->villageSubDistrict = null;
            $this->villageDistricts = [];
            $this->villageSubDistricts = [];
            $this->villages = [];
        }
    }

    public function updatedVillageDistrict($value)
    {
        if ($value) {
            $this->villageSubDistrict = null;
            $this->villageSubDistricts = [];
            $this->villages = [];

            $this->loadVillageSubDistricts();
        } else {
            $this->villageSubDistrict = null;
            $this->villageSubDistricts = [];
            $this->villages = [];
        }
    }

    public function updatedVillageSubDistrict($value)
    {
        if ($value) {
            $this->villages = [];

            $this->loadVillageOptions();
        } else {
            $this->villages = [];
        }
    }

    public function toggleTownSelection($townId)
    {
        $townId = (string) $townId;
        $currentIds = $this->selectedTownIds;

        if (in_array($townId, $currentIds)) {
            $this->selectedTownIds = array_values(array_filter(
                $currentIds,
                fn($selectedId) => (string) $selectedId !== $townId
            ));

            $this->selectedTownsList = array_values(array_filter(
                $this->selectedTownsList,
                fn($item) => (string) $item['id'] !== $townId
            ));

            return;
        }

        $currentIds[] = $townId;
        $this->selectedTownIds = $currentIds;

        $town = collect($this->towns)->firstWhere('id', $townId);
        $townName = $town ? $town['name'] : 'Unknown Town';

        $tempList = $this->selectedTownsList;
        $tempList[] = [
            'id' => $townId,
            'name' => $townName,
            'state_id' => $this->townState,
            'district_id' => $this->townDistrict,
        ];
        $this->selectedTownsList = $tempList;
    }

    public function removeTownSelection($townId)
    {
        $this->selectedTownIds = array_values(array_filter(
            $this->selectedTownIds,
            fn($selectedId) => (string) $selectedId !== (string) $townId
        ));

        $this->selectedTownsList = array_values(array_filter(
            $this->selectedTownsList,
            fn($item) => (string) $item['id'] !== (string) $townId
        ));
    }

    public function toggleVillageSelection($villageId)
    {
        $villageId = (string) $villageId;
        $currentIds = $this->selectedVillageIds;

        if (in_array($villageId, $currentIds)) {
            $this->selectedVillageIds = array_values(array_filter(
                $currentIds,
                fn($selectedId) => (string) $selectedId !== $villageId
            ));

            $this->selectedVillagesList = array_values(array_filter(
                $this->selectedVillagesList,
                fn($item) => (string) $item['id'] !== $villageId
            ));

            return;
        }

        $currentIds[] = $villageId;
        $this->selectedVillageIds = $currentIds;

        $village = collect($this->villages)->firstWhere('id', $villageId);
        $villageName = $village ? $village['name'] : 'Unknown Village';

        $tempList = $this->selectedVillagesList;
        $tempList[] = [
            'id' => $villageId,
            'name' => $villageName,
            'state_id' => $this->villageState,
            'district_id' => $this->villageDistrict,
        ];
        $this->selectedVillagesList = $tempList;
    }

    public function removeVillageSelection($villageId)
    {
        $this->selectedVillageIds = array_values(array_filter(
            $this->selectedVillageIds,
            fn($selectedId) => (string) $selectedId !== (string) $villageId
        ));

        $this->selectedVillagesList = array_values(array_filter(
            $this->selectedVillagesList,
            fn($item) => (string) $item['id'] !== (string) $villageId
        ));
    }

    public function confirmSelection()
    {
        $formattedTowns = collect($this->selectedTownsList)->map(function ($town) {
            $parts = array_filter([$town['state_id'] ?? null, $town['district_id'] ?? null, $town['id']]);
            return implode('-', $parts);
        })->toArray();

        $formattedVillages = collect($this->selectedVillagesList)->map(function ($village) {
            return ($village['state_id'] ?? '') . '-' . ($village['district_id'] ?? '') . '-' . $village['id'];
        })->toArray();

        if ($formattedTowns || $formattedVillages) {
            $this->dispatch('submit-partner-step-2', [
                'cities' => $formattedTowns,
                'villages' => $formattedVillages,
            ]);
        } else {
            session()->flash('error', 'Please select at least one city or village.');
        }
    }

    public function getSelectedTownItemsProperty(): array
    {
        return $this->selectedTownsList;
    }

    public function getSelectedVillageItemsProperty(): array
    {
        return $this->selectedVillagesList;
    }

    public function clearAll()
    {
        $this->townState = null;
        $this->townDistrict = null;
        $this->townCityType = '';
        $this->townDistricts = [];
        $this->towns = [];
        $this->selectedTownIds = [];
        $this->selectedTownsList = [];

        $this->villageState = null;
        $this->villageDistrict = null;
        $this->villageSubDistrict = null;
        $this->villageDistricts = [];
        $this->villageSubDistricts = [];
        $this->villages = [];
        $this->selectedVillageIds = [];
        $this->selectedVillagesList = [];
    }

    protected function transformLocationItems(array $data): array
    {
        return collect($data)->map(function ($item, $id) {
            if (is_array($item) && array_key_exists('id', $item)) {
                $item['id'] = (string) $item['id'];
                $item['search'] = Str::lower($item['name'] ?? '');

                return $item;
            }

            if (is_string($item)) {
                return [
                    'id' => (string) $id,
                    'name' => $item,
                    'search' => Str::lower($item),
                ];
            }

            $name = is_array($item) ? ($item['name'] ?? '') : ($item->name ?? '');
            $resolvedId = is_array($item) ? ($item['id'] ?? $id) : ($item->id ?? $id);

            return [
                'id' => (string) $resolvedId,
                'name' => $name,
                'search' => Str::lower($name),
            ];
        })->sortBy('name')->values()->toArray();
    }

    protected function getCachedFilterData(array $params)
    {
        $params['for_partner'] = 1;
        $cacheKey = 'partner_city_village_filter_' . md5(json_encode($params));

        return cache()->remember($cacheKey, now()->addDay(), function () use ($params) {
            $response = httpGet('v1/pages/filter-state-district-villages-towns', $params);

            return $response['data'] ?? [];
        });
    }

    protected function loadTownDistricts()
    {
        if (!$this->townState) {
            $this->townDistricts = [];
            return;
        }

        try {
            $districtsData = $this->getCachedFilterData([
                'type' => 'town',
                'state_id' => $this->townState,
            ])['districts'] ?? [];

            $this->townDistricts = $this->transformLocationItems($districtsData);
        } catch (\Exception $e) {
            $this->townDistricts = [];
        }
    }

    protected function loadVillageDistricts()
    {
        if (!$this->villageState) {
            $this->villageDistricts = [];
            return;
        }

        try {
            $districtsData = $this->getCachedFilterData([
                'type' => 'village',
                'state_id' => $this->villageState,
            ])['districts'] ?? [];

            $this->villageDistricts = $this->transformLocationItems($districtsData);
        } catch (\Exception $e) {
            $this->villageDistricts = [];
        }
    }

    protected function loadVillageSubDistricts()
    {
        if (!$this->villageDistrict) {
            $this->villageSubDistricts = [];
            return;
        }

        try {
            $subDistrictsData = $this->getCachedFilterData([
                'type' => 'village',
                'state_id' => $this->villageState,
                'district_id' => $this->villageDistrict,
            ])['sub_districts'] ?? [];

            $this->villageSubDistricts = $this->transformLocationItems($subDistrictsData);
        } catch (\Exception $e) {
            $this->villageSubDistricts = [];
        }
    }

    protected function loadTownOptions()
    {
        if (!$this->townState) {
            $this->towns = [];
            return;
        }

        try {
            $params = [
                'type' => 'town',
                'state_id' => $this->townState,
                'district_id' => $this->townDistrict ?: null,
            ];

            if (!empty($this->townCityType)) {
                $params['sub_filter'] = $this->townCityType;
            }

            $townsData = $this->getCachedFilterData($params)['towns'] ?? [];

            $this->towns = $this->transformLocationItems($townsData);
        } catch (\Exception $e) {
            $this->towns = [];
        }
    }

    protected function loadVillageOptions()
    {
        if (!$this->villageState || !$this->villageDistrict || !$this->villageSubDistrict) {
            $this->villages = [];
            return;
        }

        try {
            $params = [
                'type' => 'village',
                'state_id' => $this->villageState,
                'district_id' => $this->villageDistrict,
                'sub_district_id' => $this->villageSubDistrict,
            ];

            if (!empty($this->townCityType)) {
                $params['sub_filter'] = $this->townCityType;
            }

            $villagesData = $this->getCachedFilterData($params)['villages'] ?? [];

            $this->villages = $this->transformLocationItems($villagesData);
        } catch (\Exception $e) {
            $this->villages = [];
        }
    }

    public function render()
    {
        return view('livewire.pages.partners.india-city-village')->layout('components.layout.main.base', [
            'metaData' => [
                'nav-heading' => 'Select India Knowledge Webs for Partnerships',
                'nav-sub-heading' => "",
                'image' => "https://i.ibb.co/BHRqJZgW/eeps.png"
            ],
        ]);
    }
}
