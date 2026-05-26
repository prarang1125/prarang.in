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

    // Categorized Cities (New Filter)
    public $sc = [];
    public $dhq = [];
    public $ua = [];
    public $mcp = [];
    public $smc = [];

    public $selected_sc = null;
    public $selected_dhq = null;
    public $selected_ua = null;
    public $selected_mcp = null;
    public $selected_smc = null;

    public $cat_state = null;


    public function mount($type = 'village')
    {
        $this->type = $type == "cities" ? "town" : "village";
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
        $this->reset([
            'state',
            'cat_state',
            'district',
            'subDistrict',
            'village',
            'town',
            'districts',
            'subDistricts',
            'villages',
            'towns',
            'selected_sc',
            'selected_dhq',
            'selected_ua',
            'selected_mcp',
            'selected_smc',
            'sc',
            'dhq',
            'ua',
            'mcp',
            'smc'
        ]);
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
            $this->reset([
                'district',
                'subDistrict',
                'village',
                'town',
                'selected_sc',
                'selected_dhq',
                'selected_ua',
                'selected_mcp',
                'selected_smc',
                'subDistricts',
                'villages',
                'towns',
                'sc',
                'dhq',
                'ua',
                'mcp',
                'smc'
            ]);
            $this->loadDistricts();

            if ($this->type === 'town') {
                // Load towns at state level (no district required)
                $this->loadVillagesAndTowns();
                $this->loadAllTypeOfCities();
            }
        } else {
            $this->reset([
                'district',
                'subDistrict',
                'village',
                'town',
                'selected_sc',
                'selected_dhq',
                'selected_ua',
                'selected_mcp',
                'selected_smc',
                'districts',
                'subDistricts',
                'villages',
                'towns',
                'sc',
                'dhq',
                'ua',
                'mcp',
                'smc'
            ]);
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

            // When district is cleared in town mode, reload state-level towns
            if ($this->type === 'town' && $this->state) {
                $this->loadVillagesAndTowns();
            }
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

    /**
     * When a town is selected from the dropdown, the value may be a composite
     * key like "749-2834" (district_id-town_id). Parse and set district if needed.
     */
    public function updatedTown($value)
    {
        if ($value && str_contains($value, '-')) {
            $parts = explode('-', $value, 2);
            $districtId = $parts[0];
            $townId     = $parts[1];

            // Set district from composite key if not already set
            if (!$this->district) {
                $this->district = $districtId;
            }

            // Keep town as the composite key so URL builder works correctly
            // The selectedSlug computed property will resolve the name from $towns
        }
    }

    public function updatedSelectedSc($value)
    {
        if ($value) {
            $this->reset([
                'town',
                'selected_dhq',
                'selected_ua',
                'selected_mcp',
                'selected_smc',
                'district',
                'subDistrict',
                'village',
                'villages',
                'towns'
            ]);
            if (str_contains($value, '-')) {
                $parts = explode('-', $value, 2);
                $this->district = $parts[0];
                $this->town = $parts[1];
            } else {
                $this->town = $value;
                $item = collect($this->sc)->where('id', (string)$value)->first();
                if ($item && isset($item->district_id)) $this->district = $item->district_id;
            }
        }
    }

    public function updatedSelectedDhq($value)
    {
        if ($value) {
            $this->reset([
                'town',
                'selected_sc',
                'selected_ua',
                'selected_mcp',
                'selected_smc',
                'district',
                'subDistrict',
                'village',
                'villages',
                'towns'
            ]);
            if (str_contains($value, '-')) {
                $parts = explode('-', $value, 2);
                $this->district = $parts[0];
                $this->town = $parts[1];
            } else {
                $this->town = $value;
                $item = collect($this->dhq)->where('id', (string)$value)->first();
                if ($item && isset($item->district_id)) $this->district = $item->district_id;
            }
        }
    }

    public function updatedSelectedUa($value)
    {
        if ($value) {
            $this->reset([
                'town',
                'selected_sc',
                'selected_dhq',
                'selected_mcp',
                'selected_smc',
                'district',
                'subDistrict',
                'village',
                'villages',
                'towns'
            ]);
            if (str_contains($value, '-')) {
                $parts = explode('-', $value, 2);
                $this->district = $parts[0];
                $this->town = $parts[1];
            } else {
                $this->town = $value;
                $item = collect($this->ua)->where('id', (string)$value)->first();
                if ($item && isset($item->district_id)) $this->district = $item->district_id;
            }
        }
    }

    public function updatedSelectedMcp($value)
    {
        if ($value) {
            $this->reset([
                'town',
                'selected_sc',
                'selected_dhq',
                'selected_ua',
                'selected_smc',
                'district',
                'subDistrict',
                'village',
                'villages',
                'towns'
            ]);
            if (str_contains($value, '-')) {
                $parts = explode('-', $value, 2);
                $this->district = $parts[0];
                $this->town = $parts[1];
            } else {
                $this->town = $value;
                $item = collect($this->mcp)->where('id', (string)$value)->first();
                if ($item && isset($item->district_id)) $this->district = $item->district_id;
            }
        }
    }

    public function updatedSelectedSmc($value)
    {
        if ($value) {
            $this->reset([
                'town',
                'selected_sc',
                'selected_dhq',
                'selected_ua',
                'selected_mcp',
                'district',
                'subDistrict',
                'village',
                'villages',
                'towns'
            ]);
            if (str_contains($value, '-')) {
                $parts = explode('-', $value, 2);
                $this->district = $parts[0];
                $this->town = $parts[1];
            } else {
                $this->town = $value;
                $item = collect($this->smc)->where('id', (string)$value)->first();
                if ($item && isset($item->district_id)) $this->district = $item->district_id;
            }
        }
    }

    public function updatedCatState($value)
    {
        if ($value) {
            $this->reset([
                'state',
                'district',
                'subDistrict',
                'village',
                'town',
                'selected_sc',
                'selected_dhq',
                'selected_ua',
                'selected_mcp',
                'selected_smc',
                'subDistricts',
                'villages',
                'towns',
                'sc',
                'dhq',
                'ua',
                'mcp',
                'smc'
            ]);
            $this->state = $value;
            $this->cat_state = $value;
            $this->loadDistricts();
            $this->loadAllTypeOfCities();
        } else {
            $this->reset([
                'state',
                'cat_state',
                'district',
                'subDistrict',
                'village',
                'town',
                'selected_sc',
                'selected_dhq',
                'selected_ua',
                'selected_mcp',
                'selected_smc',
                'districts',
                'subDistricts',
                'villages',
                'towns',
                'sc',
                'dhq',
                'ua',
                'mcp',
                'smc'
            ]);
        }
    }

    public function loadAllTypeOfCities()
    {
        $state_id = $this->cat_state ?: $this->state;
        if (!$state_id) return;

        try {
            $response = httpGet('v1/pages/town-filter-by-type', ['state_id' => $state_id]);
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

            $this->sc  = $transformer($data['sc']  ?? []);
            $this->dhq = $transformer($data['dc']  ?? []);
            $this->ua  = $transformer($data['ua']  ?? []);
            $this->mcp = $transformer($data['mcp'] ?? []);
            $this->smc = $transformer($data['smc'] ?? []);
        } catch (\Exception $e) {
            $this->reset(['sc', 'dhq', 'ua', 'mcp', 'smc']);
        }
    }

    protected function getCachedFilterData(array $params)
    {
        $cacheKey = $this->type . '_filter_' . md5(json_encode($params));

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
                    $typeOrder = ['state' => 0, 'ut' => 1];
                    if ($typeOrder[$a['type']] !== $typeOrder[$b['type']]) {
                        return $typeOrder[$a['type']] <=> $typeOrder[$b['type']];
                    }
                    return $b['population'] <=> $a['population'];
                })
                ->map(function ($item) {
                    return (object)[
                        'id'   => (string)$item['id'],
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
                'type'     => $this->type,
                'state_id' => $this->state,
            ])['districts'] ?? [];

            $this->districts = collect($districtsData)->map(function ($name, $id) {
                return (object)['id' => (string)$id, 'name' => $name];
            })->sortBy('name')->values()->toArray();

            // Auto-select if only one district
            if (!$this->district && count($this->districts) === 1) {
                $this->district = $this->districts[0]->id ?? null;
                if ($this->district) {
                    if ($this->type === 'town') {
                        $this->loadVillagesAndTowns();
                    } else {
                        $this->loadSubDistricts();
                    }
                }
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
                'type'        => $this->type,
                'state_id'    => $this->state,
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
        // State is always required
        if (!$this->state) {
            $this->villages = [];
            $this->towns    = [];
            return;
        }

        // Village mode requires subDistrict
        if ($this->type === 'village' && !$this->subDistrict) {
            $this->villages = [];
            $this->towns    = [];
            return;
        }

        // Town mode requires at minimum a state (district is optional — API returns
        // composite keys "district_id-town_id" when no district is selected)
        // If district is also selected, pass it to narrow results.

        try {
            $params = [
                'type'            => $this->type,
                'state_id'        => $this->state,
                'district_id'     => $this->district ?: null,
                'sub_district_id' => $this->type === 'village' ? $this->subDistrict : null,
            ];

            $data = $this->getCachedFilterData($params);

            $villagesData = $data['villages'] ?? [];
            $townsData    = $data['towns']    ?? [];

            // Transform helper — handles both associative (id => name) and indexed arrays.
            // For town mode without district, keys arrive as "749-2834" composite strings.
            $transformer = function ($data) {
                if (is_array($data) && !isset($data[0])) {
                    // Associative: key is id (possibly composite), value is name
                    return collect($data)->map(function ($name, $id) {
                        return (object)['id' => (string)$id, 'name' => $name];
                    })->sortBy('name')->values()->toArray();
                }
                return collect($data)->map(function ($item) {
                    return (object)$item;
                })->sortBy('name')->values()->toArray();
            };

            $this->villages = $transformer($villagesData);
            $this->towns    = $transformer($townsData);

            // Auto-select if only one town
            if ($this->type === 'town' && !$this->town && count($this->towns) === 1) {
                $this->town = $this->towns[0]->id ?? null;
                // Parse composite key if needed
                if ($this->town && str_contains($this->town, '-') && !$this->district) {
                    $parts = explode('-', $this->town, 2);
                    $this->district = $parts[0];
                }
            }
        } catch (\Exception $e) {
            $this->villages = [];
            $this->towns    = [];
        }
    }

    /**
     * Build the URL state-district-town segment, handling composite town keys.
     * When town id is composite "749-2834", district = 749, town = 2834.
     */
    protected function parseTownKey(): array
    {
        $townId     = $this->town;
        $districtId = $this->district;

        if ($townId && str_contains($townId, '-')) {
            $parts      = explode('-', $townId, 2);
            $districtId = $parts[0];
            $townId     = $parts[1];
        }

        return [$districtId, $townId];
    }

    public function getSelectedSlugProperty()
    {
        $selected = null;

        if ($this->type === 'village' && $this->village) {
            $selected = collect($this->villages)->where('id', (string)$this->village)->first();
        } elseif ($this->type === 'town') {
            if ($this->town) {
                // Town id may be composite — match against full composite key in $this->towns
                $selected = collect($this->towns)->where('id', (string)$this->town)->first();
            } elseif ($this->selected_sc) {
                $selected = collect($this->sc)->where('id', (string)$this->selected_sc)->first();
            } elseif ($this->selected_dhq) {
                $selected = collect($this->dhq)->where('id', (string)$this->selected_dhq)->first();
            } elseif ($this->selected_ua) {
                $selected = collect($this->ua)->where('id', (string)$this->selected_ua)->first();
            } elseif ($this->selected_mcp) {
                $selected = collect($this->mcp)->where('id', (string)$this->selected_mcp)->first();
            } elseif ($this->selected_smc) {
                $selected = collect($this->smc)->where('id', (string)$this->selected_smc)->first();
            }
        }

        if ($selected) {
            $name = is_array($selected) ? ($selected['name'] ?? $this->type) : ($selected->name ?? $this->type);
            return Str::slug($name);
        }

        return $this->type;
    }

    /**
     * Build the encoded URL segment for state-district-town.
     * Handles composite town keys where district is embedded.
     */
    public function getTownUrlSegmentProperty(): string
    {
        [$districtId, $townId] = $this->parseTownKey();
        return $this->state . '-' . $districtId . '-' . $townId;
    }

    public function render()
    {
        $heading  = $this->type === 'town' ? 'India Cities' : 'India Villages';
        $image    = $this->type === 'town'
            ? "https://www.prarang.in/assets/images/home/town-1.png"
            : "https://www.prarang.in/assets/images/home/Villages-1.png";

        $metaData['nav-heading'] = view('components.nav-heading', [
            'text'     => $heading,
            'leftImg'  => $image,
            'rightImg' => $image,
        ]);
        $metaData['nav-sub-heading'] = '';

        return view('livewire.pages.village-town-filter')
            ->layout('components.layout.main.base', compact('metaData'));
    }

    protected function getStaticStates()
    {
        return [
            ['id' => 1,  'name' => 'Jammu And Kashmir',                              'type' => 'ut',    'population' => 12541302],
            ['id' => 2,  'name' => 'Himachal Pradesh',                               'type' => 'state', 'population' => 6864602],
            ['id' => 3,  'name' => 'Punjab',                                         'type' => 'state', 'population' => 27743338],
            ['id' => 4,  'name' => 'Chandigarh',                                     'type' => 'ut',    'population' => 1055450],
            ['id' => 5,  'name' => 'Uttarakhand',                                    'type' => 'state', 'population' => 10086292],
            ['id' => 6,  'name' => 'Haryana',                                        'type' => 'state', 'population' => 25351462],
            ['id' => 7,  'name' => 'National Capital Territory of Delhi',             'type' => 'ut',    'population' => 16787941],
            ['id' => 8,  'name' => 'Rajasthan',                                      'type' => 'state', 'population' => 68548437],
            ['id' => 9,  'name' => 'Uttar Pradesh',                                  'type' => 'state', 'population' => 199812341],
            ['id' => 10, 'name' => 'Bihar',                                          'type' => 'state', 'population' => 104099452],
            ['id' => 11, 'name' => 'Sikkim',                                         'type' => 'state', 'population' => 610577],
            ['id' => 12, 'name' => 'Arunachal Pradesh',                              'type' => 'state', 'population' => 1383727],
            ['id' => 13, 'name' => 'Nagaland',                                       'type' => 'state', 'population' => 1978502],
            ['id' => 14, 'name' => 'Manipur',                                        'type' => 'state', 'population' => 2855794],
            ['id' => 15, 'name' => 'Mizoram',                                        'type' => 'state', 'population' => 1097206],
            ['id' => 16, 'name' => 'Tripura',                                        'type' => 'state', 'population' => 3673917],
            ['id' => 17, 'name' => 'Meghalaya',                                      'type' => 'state', 'population' => 2966889],
            ['id' => 18, 'name' => 'Assam',                                          'type' => 'state', 'population' => 31205576],
            ['id' => 19, 'name' => 'West Bengal',                                    'type' => 'state', 'population' => 91276115],
            ['id' => 20, 'name' => 'Jharkhand',                                      'type' => 'state', 'population' => 32988134],
            ['id' => 21, 'name' => 'Odisha',                                         'type' => 'state', 'population' => 41974218],
            ['id' => 22, 'name' => 'Chhattisgarh',                                  'type' => 'state', 'population' => 25545198],
            ['id' => 23, 'name' => 'Madhya Pradesh',                                 'type' => 'state', 'population' => 72626809],
            ['id' => 24, 'name' => 'Gujarat',                                        'type' => 'state', 'population' => 60439692],
            ['id' => 27, 'name' => 'Maharashtra',                                    'type' => 'state', 'population' => 112374333],
            ['id' => 28, 'name' => 'Andhra Pradesh',                                 'type' => 'state', 'population' => 49386799],
            ['id' => 29, 'name' => 'Karnataka',                                      'type' => 'state', 'population' => 61095297],
            ['id' => 30, 'name' => 'Goa',                                            'type' => 'state', 'population' => 1458545],
            ['id' => 31, 'name' => 'Lakshadweep',                                   'type' => 'ut',    'population' => 64473],
            ['id' => 32, 'name' => 'Kerala',                                         'type' => 'state', 'population' => 33406061],
            ['id' => 33, 'name' => 'Tamil Nadu',                                     'type' => 'state', 'population' => 72147030],
            ['id' => 34, 'name' => 'Puducherry',                                     'type' => 'ut',    'population' => 1247953],
            ['id' => 35, 'name' => 'Andaman and Nicobar',                            'type' => 'ut',    'population' => 380581],
            ['id' => 36, 'name' => 'Telangana',                                      'type' => 'state', 'population' => 35193978],
            ['id' => 37, 'name' => 'Ladakh',                                         'type' => 'ut',    'population' => 274000],
            ['id' => 38, 'name' => 'Dadra and Nagar Haveli and Daman and Diu',       'type' => 'ut',    'population' => 585764],
        ];
    }
}
