<?php

namespace App\View\Components\Layout\Main;

use App\Models\Visitor;
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


    public function render(): View|Closure|string
    {
        return view('components.layout.main.base');
    }

    function visitorLocation(Request $request){
        // dd($request->all());
        try {

            // Extract data from the request
            $data = [
                'city' => $request->input('city', null),
                'post_id' => $request->input('post_id', null),
                'current_url' => $request->input('current_url', null),
                'ip_address' => $request->input('ip_address', null),
                'latitude' => $request->input('latitude', null),
                'longitude' => $request->input('longitude', null),
                'language' => $request->input('language', null),
                'screen_width' => $request->input('screen_width', null),
                'screen_height' => $request->input('screen_height', null),
                'timestamp' =>  now(), // Use `now()` as a default
                'user_agent' => $request->header('User-Agent'), // Retrieve User-Agent from headers
            ];


            // Insert data into the database using the model
            Visitor::create($data);

            // Return a success response
            return response()->json([
                'message' => 'Visitor information stored successfully.',
            ], 201);

        } catch (\Exception $e) {
            // Handle errors and return a failure response
            return response()->json([
                'error' => 'Failed to store visitor information.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
