<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class BiletralPortalAside extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public $side;
    public $main;
    public $internateData;
    public $cirusData;
    public $language = [];
    public $memo = [];
    public function __construct($data, $side = 'left', $main = null)
    {

        $this->data = $data;
        $this->main = $main;
        $this->side = $side;
        $this->language = $this->loadLanguges() ?? [];
        $this->memo = $this->loadMemo() ?? [];
        $this->main = $main;
        $this->cirusData = Cache::remember('biletral-portal-aside-covid-datsa--' . $this->data->anlytics_code, now()->addDays(24), function () {
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

    public function loadLanguges()
    {
        try {
            return Cache::remember('biletral-portal-aside-language-data-' . $this->data->anlytics_code, now()->addDays(24), function () {
                return httpGet('/get-portal-language', ['country_id' => $this->data->anlytics_code])['data'];
            });
        } catch (\Exception $e) {
            return [];
        }
    }
    public function loadMemo()
    {
        try {
            return Cache::remember('biletral-portal-aside-memo-data-s' . $this->data->anlytics_code, now()->addDays(24), function () {
                return httpGet('/get-world-memo', ['country_id' => $this->data->anlytics_code])['data'];
            });
        } catch (\Exception $e) {
            return [];
        }
    }


    function getExchangeText()
    {
        $rates = Cache::remember('exchange-rates-usd', now()->addHours(12), function () {
            return Http::get('https://v6.exchangerate-api.com/v6/e1d88a31b3bf6bb1e7a3f27f/latest/USD')->json('conversion_rates') ?? [];
        });
        if ($this->side == 'left') {
            $from = strtoupper($this->main->primary_currency);
            $to   = strtoupper($this->main->secondary_currency);
        } else {
            $from = strtoupper($this->main->secondary_currency);
            $to   = strtoupper($this->main->primary_currency);
        }

        if (!isset($rates[$from]) || !isset($rates[$to])) {
            return [];
        }

        $fromRate = $rates[$from];
        $toRate   = $rates[$to];

        // 1 FROM = X TO
        $conversion = $toRate / $fromRate;

        return [
            "1 {$from} = " . round($conversion, 2) . " {$to}",
            "1 USD = " . round($fromRate, 2) . " {$from}",


            // "1 USD = " . round($toRate, 2) . " {$to}",
        ];
    }
    public function render(): View|Closure|string
    {
        $exchange = $this->getExchangeText();

        return view('components.biletral-portal-aside', [
            'data' => $this->data,
            'side' => $this->side,
            'main' => $this->main,
            'exchange' => $exchange,
        ]);
    }
}
