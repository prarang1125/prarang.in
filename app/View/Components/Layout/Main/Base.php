<?php

namespace App\View\Components\Layout\Main;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Base extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.main.base');
    }

    function visitorLocation(Request $request){
        $response = Http::get(env('ADMIN_URL').'/visitor-location', $request->all());

        // Return the response from the external server (optional)
        return response()->json($response->json());
    }
}
