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
        // Define the API URL
        $apiUrl = "https://b2b.prarang.in/api/presentations/last-month/". $this->portal->city_code;
        $headers = [
            "Accept" => "application/json",
            "Content-Type" => "application/json"
        ];

        try {
            // Make the API request using Laravel's HTTP client
            $response = Http::withHeaders($headers)->get($apiUrl);

            if ($response->successful()) {
                // Return the JSON response if successful
                return $response->json();
            } else {
                // Handle the error response
                return response()->json([
                    'error' => 'Failed to fetch data',
                    'status' => $response->status(),
                ], $response->status());
            }
        } catch (\Exception $e) {   
            return response()->json([
                'error' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
