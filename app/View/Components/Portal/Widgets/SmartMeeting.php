<?php

namespace App\View\Components\Portal\Widgets;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class SmartMeeting extends Component
{
    /**
     * Create a new component instance.
     */
    public $portal;
    public $presentation;
    public function __construct($portal)
    {
        $this->portal=$portal;
       $this->presentation=$this->fetchPresentations();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portal.widgets.smart-meeting');
    }

    public function fetchPresentations()
    {
        $apiUrl = "https://b2b.prarang.in/api/presentations/last-month/" . $this->portal->city_code;
        $headers = [
            "Accept" => "application/json",
            "Content-Type" => "application/json"
        ];

        try {
            $response = Http::withHeaders($headers)->get($apiUrl);

            if ($response->successful() && $response->json()) {
                return $response->json();
            }

            // If response is not successful or empty
            return null;
        } catch (\Exception $e) {
            // On exception, return null
            return null;
        }
    }

}
