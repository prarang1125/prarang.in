<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class InternateData extends Component
{
    public $cityName = '';
    public $city_id, $city_code;
    public $internateData = null;
    public $loading = true;
    public $error = null;
    public $lastUpdate = '';
    public $cirusData = null;
    public $cityDatabaseId = null;

    public function mount($city_code = null, $city_id = null, $city_name = null)
    {
        $this->city_id = $city_id;
        $this->city_code = $city_code;
        $this->cityName = $city_name;
        $this->cityDatabaseId = $this->city_id;
        $this->fetchData();

        // Set last update to roughly one month ago in Hindi format
        Carbon::setLocale('hi');
        $this->lastUpdate = Carbon::now()->subMonth()->translatedFormat('F Y');
    }

    public function fetchData()
    {
        $this->fetchInternateData();
        if ($this->cityDatabaseId) {
            $this->fetchCirusData();
        }
    }

    public function fetchInternateData()
    {
        try {
            $this->loading = true;
            $this->error = null;

            $cacheKey = "internateData_{$this->city_code}";

            // Check cache first (equivalent to localStorage in React)
            $cachedData = Cache::get($cacheKey);

            if ($cachedData) {
                $this->internateData = $cachedData;
                $this->loading = false;
                return;
            }

            // Fetch from API
            $response = Http::get("https://b2b.prarang.in/api/readers?city_code={$this->city_code}");

            if (!$response->successful()) {
                throw new \Exception('Failed to fetch data from API');
            }

            $result = $response->json();

            if (!isset($result['data'])) {
                throw new \Exception('Invalid API response format');
            }

            $cityInfo = $result['data']['city_info'] ?? [];

            $cityInfo = $result['data']['city_info'] ?? [];

            // Targeted SNOs for the required metrics
            $targetSNOs = [2, 6, 7, 8, 9];

            $filteredCityInfo = array_filter($cityInfo, function ($city) use ($targetSNOs) {
                return in_array((int)$city['sno'], $targetSNOs);
            });

            // Sort by target order to ensure consistency
            usort($filteredCityInfo, function ($a, $b) use ($targetSNOs) {
                return array_search((int)$a['sno'], $targetSNOs) <=> array_search((int)$b['sno'], $targetSNOs);
            });

            // Re-index and map
            $filteredData = [
                'city_info' => array_values(array_map(function ($city) {
                    return [
                        'sno' => $city['sno'],
                        'title' => $city['title'],
                        'value' => $city['value']

                    ];
                }, $filteredCityInfo)),
                'reader_info' => $result['data']['reader_info'] ?? null
            ];

            // Cache for a while (e.g., 24 hours) as per React localStorage intent
            Cache::put($cacheKey, $filteredData, now()->addDay());

            $this->internateData = $filteredData;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        } finally {
            $this->loading = false;
        }
    }

    public function fetchCirusData()
    {
        try {
            $cacheKey = "cirusData_{$this->cityDatabaseId}";
            $cachedData = Cache::get($cacheKey);

            if ($cachedData) {
                $this->cirusData = $cachedData;
                return;
            }

            $response = Http::withHeaders(['accept' => 'application/json'])
                ->get('https://api.apratyaksh.org/api/v1/cirus/dhq');

            if ($response->successful()) {
                $result = $response->json();
                if ($result['success'] && isset($result['data'])) {
                    // Filter for the specific city database ID (string comparison as per React)
                    $filtered = collect($result['data'])->firstWhere('id', (string)$this->cityDatabaseId);
                    if ($filtered) {
                        Cache::put($cacheKey, $filtered, now()->addDay());
                        $this->cirusData = $filtered;
                    }
                }
            }
        } catch (\Exception $e) {
            // Silently fail for CIRUS as it's secondary
        }
    }

    public function clearCache()
    {
        Cache::forget("internateData_{$this->city_id}");
        if ($this->cityDatabaseId) {
            Cache::forget("cirusData_{$this->cityDatabaseId}");
        }
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.portal.internate-data');
    }
}
