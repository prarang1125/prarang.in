<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Str;

class VillageTownFilter extends Component
{

    public $type = 'village';
    public $states = [];
    public $districts = [];
    public $subDistricts = [];
    public $villages = [];
    public $towns = [];

    public $state = null;
    public $district = null;
    public $subDistrict = null;
    public $village = null;
    public $town = null;

    public function mount($type = 'village')
    {
        $this->type = $type;

        $this->loadStates();

        if ($this->state) {
            $this->loadDistricts();
        }

        if ($this->district) {
            $this->loadSubDistricts();
        }

        if ($this->subDistrict) {
            $this->loadVillagesAndTowns();
        }
    }

    public function updatedType()
    {
        $this->reset(['state', 'district', 'village', 'town', 'districts', 'villages', 'towns']);
        $this->loadStates();
    }

    public function updatedState($value)
    {
        if ($value) {
            $this->district = null;
            $this->subDistrict = null;
            $this->village = null;
            $this->town = null;
            $this->loadDistricts();
            $this->subDistricts = [];
            $this->villages = [];
            $this->towns = [];
        } else {
            $this->reset(['district', 'subDistrict', 'village', 'town', 'districts', 'subDistricts', 'villages', 'towns']);
        }
    }

    public function updatedDistrict($value)
    {
        if ($value) {
            $this->subDistrict = null;
            $this->village = null;
            $this->town = null;
            $this->loadSubDistricts();
            $this->villages = [];
            $this->towns = [];
        } else {
            $this->reset(['subDistrict', 'village', 'town', 'subDistricts', 'villages', 'towns']);
        }
    }

    public function updatedSubDistrict($value)
    {
        if ($value) {
            $this->village = null;
            $this->town = null;
            $this->loadVillagesAndTowns();
        } else {
            $this->reset(['village', 'town', 'villages', 'towns']);
        }
    }

    protected function getCachedFilterData(array $params)
    {
        $cacheKey = 'village_town_filter_' . md5(json_encode($params));

        return cache()->remember($cacheKey, now()->addDays(1), function () use ($params) {
            $response = httpGet('v1/pages/filter-state-district-villages-towns', $params);
            return $response['data'] ?? [];
        });
    }

    protected function loadStates()
    {
        try {
            $statesData = $this->getCachedFilterData(['type' => $this->type])['states'] ?? [];

            $this->states = collect($statesData)->map(function ($name, $id) {
                return (object)['id' => (string)$id, 'name' => $name];
            })->sortBy('name')->values()->toArray();

            if (!$this->state && !empty($this->states)) {
                // $this->state = $this->states[0]->id ?? null;
            }
        } catch (\Exception $e) {
            $this->states = [];
        }
    }

    protected function loadDistricts()
    {
        if (!$this->state) {
            $this->districts = [];
            return;
        }

        try {
            $districtsData = $this->getCachedFilterData([
                'type' => $this->type,
                'state_id' => $this->state,
            ])['districts'] ?? [];

            $this->districts = collect($districtsData)->map(function ($name, $id) {
                return (object)['id' => (string)$id, 'name' => $name];
            })->sortBy('name')->values()->toArray();

            if (!$this->district && !empty($this->districts)) {
                // $this->district = $this->districts[0]->id ?? null;
            }
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
                'type' => $this->type,
                'state_id' => $this->state,
                'district_id' => $this->district,
            ])['sub_districts'] ?? [];

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

            $this->subDistricts = $transformer($subDistrictsData);
        } catch (\Exception $e) {
            $this->subDistricts = [];
        }
    }

    protected function loadVillagesAndTowns()
    {
        if (!$this->state || !$this->district) {
            $this->villages = [];
            $this->towns = [];
            return;
        }

        try {
            $data = $this->getCachedFilterData([
                'type' => $this->type,
                'state_id' => $this->state,
                'district_id' => $this->district,
                'sub_district_id' => $this->subDistrict,
            ]);

            $villagesData = $data['villages'] ?? [];
            $townsData = $data['towns'] ?? [];

            // Helper to transform to object array
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

            $this->villages = $transformer($villagesData);
            $this->towns = $transformer($townsData);

            if ($this->type === 'village' && !$this->village && !empty($this->villages)) {
                // $this->village = $this->villages[0]->id ?? null;
            }

            if ($this->type === 'town' && !$this->town && !empty($this->towns)) {
                // $this->town = $this->towns[0]->id ?? null;
            }
        } catch (\Exception $e) {
            $this->villages = [];
            $this->towns = [];
        }
    }

    public function getSelectedSlugProperty()
    {
        $selected = null;
        if ($this->type === 'village' && $this->village) {
            $selected = collect($this->villages)->where('id', (string)$this->village)->first();
        } elseif ($this->type === 'town' && $this->town) {
            $selected = collect($this->towns)->where('id', (string)$this->town)->first();
        }

        if ($selected) {
            $name = is_array($selected) ? ($selected['name'] ?? 'village') : ($selected->name ?? 'village');
            return Str::slug($name);
        }

        return $this->type;
    }


    public function render()
    {
        $metaData['nav-heading'] = view('components.nav-heading', [
            'text' => 'India Villages',
            'leftImg' => "https://www.prarang.in/assets/images/home/Villages-1.png",
            'rightImg' => "https://www.prarang.in/assets/images/home/Villages-1.png",
        ]);
        $metaData['nav-sub-heading'] = '';
        return view('livewire.pages.village-town-filter')->layout('components.layout.main.base', compact('metaData'));;
    }
}
