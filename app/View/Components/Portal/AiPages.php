<?php

namespace App\View\Components\Portal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AiPages extends Component
{
    public array $indiaData = [];
    public array $worldData = [];

    public function __construct()
    {
        $this->indiaData = $this->loadIndia();
        $this->worldData = $this->loadWorld();
    }

    protected function loadIndia(): array
    {
        $response = httpGet('v1/cities', [
            'client' => 'analytics',
            'locale' => 'hi',
        ]);

        $cities = $response['data']['cities'] ?? [];

        $grouped = [];

        foreach ($cities as $c) {
            $state = $c['state'];

            if (!isset($grouped[$state])) {
                $grouped[$state] = [
                    'name' => $state,
                    'items' => [],
                    'totalPop' => 0,
                    'type' => $c['state_ut'] ?? null,
                ];
            }

            $grouped[$state]['items'][] = $c;
            $grouped[$state]['totalPop'] += (int)($c['MSTR5'] ?? 0);
        }

        usort($grouped, fn($a, $b) => $b['totalPop'] <=> $a['totalPop']);

        return array_values($grouped);
    }

    protected function loadWorld(): array
    {
        $response = httpGet('v1/countries', [
            'client' => 'analytics',
            'locale' => 'hi',
        ]);

        $countries = $response['data']['countries'] ?? [];

        $continentMap = [
            1 => 'एशिया',
            2 => 'अफ्रीका',
            3 => 'उत्तरी अमेरिका',
            4 => 'दक्षिणी अमेरिका',
            5 => 'यूरोप',
            6 => 'दक्षिण-पूर्व एशिया',
            7 => 'मध्य अमेरिका',
        ];

        $grouped = [];

        foreach ($countries as $c) {
            $name = $continentMap[$c['continent_id']] ?? ($c['continent'] ?? 'Other');

            if (!isset($grouped[$name])) {
                $grouped[$name] = [
                    'name' => $name,
                    'items' => [],
                ];
            }

            $grouped[$name]['items'][] = $c;
        }

        return array_values($grouped);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portal.ai-pages');
    }
}
