<?php

namespace App\Livewire\Pages\Partners;

use App\Services\LocationFilter;
use Illuminate\Support\Str;
use Livewire\Component;

class IndiaCityVillage extends Component
{
    private LocationFilter $service;

    public array $states = [];
    public array $districts = [];
    public array $subDistricts = [];
    public array $villages = [];
    public array $towns = [];

    public $state, $district, $subDistrict, $village, $town;
    public array $selectedTownIds = [];
    public array $selectedVillageIds = [];

    public function boot()
    {
        $this->service = new LocationFilter();
    }

    public function mount($hashId = null)
    {
        $this->states = $this->service->loadStates();
    }

    public function updatedState($value)
    {
        if ($value) {
            $this->district = null;
            $this->subDistrict = null;
            $this->village = null;
            $this->town = null;
            $this->districts = [];
            $this->subDistricts = [];
            $this->villages = [];
            $this->towns = [];
            $this->selectedTownIds = [];
            $this->selectedVillageIds = [];

            $this->loadDistricts();
            $this->loadTownOptions();
        } else {
            $this->resetLocationState();
        }
    }

    public function updatedDistrict($value)
    {
        if ($value) {
            $this->subDistrict = null;
            $this->village = null;
            $this->town = null;
            $this->subDistricts = [];
            $this->villages = [];
            $this->towns = [];
            $this->selectedTownIds = [];
            $this->selectedVillageIds = [];

            $this->loadSubDistricts();
            $this->loadTownOptions();
        } else {
            $this->subDistrict = null;
            $this->village = null;
            $this->town = null;
            $this->subDistricts = [];
            $this->villages = [];
            $this->towns = [];
            $this->selectedTownIds = [];
            $this->selectedVillageIds = [];

            $this->loadTownOptions();
        }
    }

    public function updatedSubDistrict($value)
    {
        if ($value) {
            $this->village = null;
            $this->villages = [];
            $this->selectedVillageIds = [];

            $this->loadVillageOptions();
        } else {
            $this->village = null;
            $this->villages = [];
            $this->selectedVillageIds = [];
        }
    }

    public function toggleTownSelection($townId)
    {
        $townId = (string) $townId;

        if (in_array($townId, $this->selectedTownIds, true)) {
            $this->selectedTownIds = array_values(array_filter(
                $this->selectedTownIds,
                fn($selectedId) => (string) $selectedId !== $townId
            ));

            return;
        }

        $this->selectedTownIds[] = $townId;
    }

    public function removeTownSelection($townId)
    {
        $this->selectedTownIds = array_values(array_filter(
            $this->selectedTownIds,
            fn($selectedId) => (string) $selectedId !== (string) $townId
        ));
    }

    public function toggleVillageSelection($villageId)
    {
        $villageId = (string) $villageId;

        if (in_array($villageId, $this->selectedVillageIds, true)) {
            $this->selectedVillageIds = array_values(array_filter(
                $this->selectedVillageIds,
                fn($selectedId) => (string) $selectedId !== $villageId
            ));

            return;
        }

        $this->selectedVillageIds[] = $villageId;
    }

    public function removeVillageSelection($villageId)
    {
        $this->selectedVillageIds = array_values(array_filter(
            $this->selectedVillageIds,
            fn($selectedId) => (string) $selectedId !== (string) $villageId
        ));
    }

    public function confirmSelection()
    {
        $this->dispatch('partner-location-selection-updated', [
            'state' => $this->state,
            'district' => $this->district,
            'subDistrict' => $this->subDistrict,
            'towns' => $this->selectedTownIds,
            'villages' => $this->selectedVillageIds,
        ]);
    }

    public function getSelectedTownItemsProperty(): array
    {
        return collect($this->towns)
            ->whereIn('id', $this->selectedTownIds)
            ->values()
            ->toArray();
    }

    public function getSelectedVillageItemsProperty(): array
    {
        return collect($this->villages)
            ->whereIn('id', $this->selectedVillageIds)
            ->values()
            ->toArray();
    }

    protected function resetLocationState(): void
    {
        $this->district = null;
        $this->subDistrict = null;
        $this->village = null;
        $this->town = null;
        $this->districts = [];
        $this->subDistricts = [];
        $this->villages = [];
        $this->towns = [];
        $this->selectedTownIds = [];
        $this->selectedVillageIds = [];
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
        $cacheKey = 'partner_city_village_filter_' . md5(json_encode($params));

        return cache()->remember($cacheKey, now()->addDay(), function () use ($params) {
            $response = httpGet('v1/pages/filter-state-district-villages-towns', $params);

            return $response['data'] ?? [];
        });
    }

    protected function loadDistricts()
    {
        if (!$this->state) {
            $this->districts = [];

            return;
        }

        try {
            $districtsData = $this->getCachedFilterData([
                'type' => 'town',
                'state_id' => $this->state,
            ])['districts'] ?? [];

            $this->districts = $this->transformLocationItems($districtsData);
        } catch (\Exception $e) {
            $this->districts = [];
        }
    }

    protected function loadSubDistricts()
    {
        if (!$this->district) {
            $this->subDistricts = [];

            return;
        }

        try {
            $subDistrictsData = $this->getCachedFilterData([
                'type' => 'village',
                'state_id' => $this->state,
                'district_id' => $this->district,
            ])['sub_districts'] ?? [];

            $this->subDistricts = $this->transformLocationItems($subDistrictsData);
        } catch (\Exception $e) {
            $this->subDistricts = [];
        }
    }

    protected function loadTownOptions()
    {
        if (!$this->state) {
            $this->towns = [];

            return;
        }

        try {
            $townsData = $this->getCachedFilterData([
                'type' => 'town',
                'state_id' => $this->state,
                'district_id' => $this->district ?: null,
            ])['towns'] ?? [];

            $this->towns = $this->transformLocationItems($townsData);
        } catch (\Exception $e) {
            $this->towns = [];
        }
    }

    protected function loadVillageOptions()
    {
        if (!$this->state || !$this->district || !$this->subDistrict) {
            $this->villages = [];

            return;
        }

        try {
            $villagesData = $this->getCachedFilterData([
                'type' => 'village',
                'state_id' => $this->state,
                'district_id' => $this->district,
                'sub_district_id' => $this->subDistrict,
            ])['villages'] ?? [];

            $this->villages = $this->transformLocationItems($villagesData);
        } catch (\Exception $e) {
            $this->villages = [];
        }
    }

    public function render()
    {
        return view('livewire.pages.partners.india-city-village')->layout('components.layout.main.base', [
            'metaData' => [
                'nav-heading' => 'India - Cities: Digital Marketing',
                'nav-sub-heading' => ""
            ],
        ]);
    }
}
