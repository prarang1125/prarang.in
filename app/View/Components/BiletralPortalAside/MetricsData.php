<?php

namespace App\View\Components\BiletralPortalAside;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class MetricsData extends Component
{
    public $data;
    public array $memo = [];

    public function __construct($data)
    {
        $this->data = $data;
        $this->memo = $this->loadMemo();
    }

    public function loadMemo(): array
    {
        try {
            return Cache::remember('biletral-portal-aside-memo-data-s' . $this->data->anlytics_code, now()->addDays(24), function () {
                $response = httpGet('/get-world-memo', ['country_id' => $this->data->anlytics_code]);
                return $response['data'] ?? [];
            });
        } catch (\Exception $e) {
            return [];
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.biletral-portal-aside.metrics-data');
    }
}
