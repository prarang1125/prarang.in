<?php

namespace App\View\Components\BiletralPortalAside;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class LanguageData extends Component
{
    /**
     * Create a new component instance.
     */
    public array $language = [];
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->language = $this->loadLanguages();
    }

    public function loadLanguages(): array
    {
        try {
            return Cache::remember(
                'biletral-portal-aside-language-data-' . $this->data->anlytics_code,
                now()->addDays(24),
                function () {
                    $response = httpGet('/get-portal-language', [
                        'country_id' => $this->data->anlytics_code,
                    ]);

                    return $response['data'] ?? [];
                }
            );
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.biletral-portal-aside.language-data', [
            'data' => $this->data,
            'language' => $this->language,
        ]);
    }
}
