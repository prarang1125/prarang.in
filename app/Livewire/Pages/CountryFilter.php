<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CountryFilter extends Component
{
    public array $data = [];
    public $selectedIs = '';

    // Grouped countries: ['Africa' => [...], 'Asia' => [...], ...]
    public array $continents = [];

    // Selected values
    public ?string $selectedContinent = null;
    public ?int $selectedCountryId = null;

    // Countries filtered by continent
    public array $filteredCountries = [];

    public function mount(): void
    {
        $this->data = $this->loadCountries();

        // Sort continents alphabetically
        $this->continents = array_keys($this->data);
        sort($this->continents);
    }

    public function updatedSelectedContinent(?string $value): void
    {
        // Reset country on continent change
        $this->selectedCountryId = null;
        $this->filteredCountries = [];

        if ($value && isset($this->data[$value])) {
            // Sort countries alphabetically by Country name
            $countries = $this->data[$value];
            usort($countries, fn($a, $b) => strcmp($a['Country'], $b['Country']));
            $this->filteredCountries = $countries;
        }
    }

    public function updatedSelectedCountryId(?int $value): void
    {
        if ($value) {
            // dd for debugging — remove in production
            $country = collect($this->filteredCountries)->firstWhere('id', $value);
            // dd([
            //     'country_id'   => $value,
            //     'country_data' => $country,
            // ]);

            $countryPortal = Cache::remember('country_filter-portal', 24 * 60 * 60 * 20, function () {
                return DB::table('country_portals as cp')
                    ->join('byletral_portals as bp', 'bp.secondary_country_id', '=', 'cp.id')
                    ->where('bp.primary_country_id', 4)->pluck('bp.slug', 'cp.anlytics_code')->unique()->toArray();
            });
            $this->selectedIs  = $countryPortal[$value];
        }
    }

    public function render()
    {
        $heading = 'World Countries';
        $image = '';
        $metaData['nav-heading'] = view('components.nav-heading', [
            'text'     => $heading,
            'leftImg'  => $image,
            'rightImg' => $image,
        ]);
        $metaData['nav-sub-heading'] = '';

        return view('livewire.pages.country-filter')
            ->layout('components.layout.main.base', compact('metaData'));
    }

    private function loadCountries(): array
    {
        return Cache::remember('country_filter', 24 * 60 * 60 * 20, function () {
            return httpGet('/get-country', ['group_by' => true, 'where_not_in' => '63'])['data']['country'] ?? [];
        });
    }
}
