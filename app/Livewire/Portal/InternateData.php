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
    public $internateError = null;
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
            $this->internateError = null;

            $cacheKey = "internateData_{$this->city_id}_news";

            // Check cache first (equivalent to localStorage in React)
            $cachedData = Cache::get($cacheKey);

            if ($cachedData) {
                $this->internateData = $cachedData;
                $this->loading = false;
                return;
            }

            // Fetch from API

            $filteredData = httpGet('/internate-data/cities', ['city_id' => $this->city_id])['data'];

            // Cache for a while (e.g., 24 hours) as per React localStorage intent
            Cache::put($cacheKey, $filteredData, now()->addDay());

            $this->internateData = $filteredData;
        } catch (\Exception $e) {
            $this->internateError = $e->getMessage();
        } finally {
            $this->loading = false;
        }
    }

    public function fetchCirusData()
    {
        try {
            $cacheKey = "cirusData_{$this->cityDatabaseId}-1";
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
                    // dd($filtered);
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
