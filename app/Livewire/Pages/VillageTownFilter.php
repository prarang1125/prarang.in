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

    public $villageType = [];

    public function mount($type = 'village')
    {
        $this->type = $type;
        if ($type == 'village') {
            $this->villageType = $this->loadVillageTypes();
        }

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
        $this->reset(['state', 'district', 'subDistrict', 'village', 'town', 'districts', 'subDistricts', 'villages', 'towns']);
        $this->loadStates();
    }

    public function loadVillageTypes()
    {
        return [
            'type_a' => 'Populated villages (1011 censuses)',
            'type_b' => 'Unpopulated villages (1011 censuses)',
            'type_c' => 'New villages (after 1011 censuses) ',
        ];
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
            $this->villages = [];
            $this->towns = [];

            if ($this->type === 'town') {
                $this->loadVillagesAndTowns();
            } else {
                $this->loadSubDistricts();
            }
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
            $statesData = $this->getStaticStates();

            $this->states = collect($statesData)
                ->sort(function ($a, $b) {
                    // Step 1: type priority (state first)
                    $typeOrder = ['state' => 0, 'ut' => 1];

                    if ($typeOrder[$a['type']] !== $typeOrder[$b['type']]) {
                        return $typeOrder[$a['type']] <=> $typeOrder[$b['type']];
                    }

                    // Step 2: population DESC
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

        if ($this->type === 'village' && !$this->subDistrict) {
            $this->villages = [];
            $this->towns = [];
            return;
        }

        try {
            $data = $this->getCachedFilterData([
                'type' => $this->type,
                'state_id' => $this->state,
                'district_id' => $this->district,
                'sub_district_id' => $this->type === 'village' ? $this->subDistrict : null,
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
            $name = is_array($selected) ? ($selected['name'] ?? $this->type) : ($selected->name ?? $this->type);
            return Str::slug($name);
        }

        return $this->type;
    }


    public function render()
    {
        $heading = $this->type === 'town' ? 'India Towns' : 'India Villages';
        $metaData['nav-heading'] = view('components.nav-heading', [
            'text' => $heading,
            'leftImg' => "https://www.prarang.in/assets/images/home/Villages-1.png",
            'rightImg' => "https://www.prarang.in/assets/images/home/Villages-1.png",
        ]);
        $metaData['nav-sub-heading'] = '';
        return view('livewire.pages.village-town-filter')->layout('components.layout.main.base', compact('metaData'));;
    }
    protected function getStaticStates()
    {
        return [
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
            ['id' => 28, 'name' => 'Andhra Pradesh', 'type' => 'state', 'population' => 49386799], // undivided (incl. Telangana)
            ['id' => 29, 'name' => 'Karnataka', 'type' => 'state', 'population' => 61095297],
            ['id' => 30, 'name' => 'Goa', 'type' => 'state', 'population' => 1458545],
            ['id' => 31, 'name' => 'Lakshadweep', 'type' => 'ut', 'population' => 64473],
            ['id' => 32, 'name' => 'Kerala', 'type' => 'state', 'population' => 33406061],
            ['id' => 33, 'name' => 'Tamil Nadu', 'type' => 'state', 'population' => 72147030],
            ['id' => 34, 'name' => 'Puducherry', 'type' => 'ut', 'population' => 1247953],
            ['id' => 35, 'name' => 'Andaman and Nicobar', 'type' => 'ut', 'population' => 380581],
            ['id' => 36, 'name' => 'Telangana', 'type' => 'state', 'population' => 35193978],
            ['id' => 37, 'name' => 'Ladakh', 'type' => 'ut', 'population' => 274000], // estimated from J&K split
            ['id' => 38, 'name' => 'Dadra and Nagar Haveli and Daman and Diu', 'type' => 'ut', 'population' => 585764],
        ];
    }
}
