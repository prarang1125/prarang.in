<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class BiletralPortalAside extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public $side;
    public $isNepalComparison;
    public $internateData;
    public $cirusData;
    public function __construct($data, $side = 'left', $isNepalComparison = null)
    {
        $this->data = $data;
        $this->side = $side;
        $this->isNepalComparison = $isNepalComparison;
        $this->cirusData = Cache::remember('biletral-portal-aside-covid-data--' . $this->data->anlytics_code, now()->addDays(24), function () {
            return $this->loadCirusData()[$this->data->anlytics_code][0];
        });
        // dd($this->cirusData);
        $this->internateData = Cache::remember('biletral-portal-aside-internate-data--' . $this->data->anlytics_code, now()->addDays(24), function () use ($data) {
            return httpGet('/internate-data/countries', ['country_id' => $data->anlytics_code])['data'] ?? [];
        });
    }
    public function loadCirusData()
    {
        $data = json_decode(file_get_contents('https://api.apratyaksh.org/api/v1/cirus/countries'), true)['data'] ?? [];
        if ($data) {
            return collect($data)->groupBy('id');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.biletral-portal-aside', [
            'data' => $this->data,
            'side' => $this->side,
            'isNepalComparison' => $this->isNepalComparison,
        ]);
    }
}
