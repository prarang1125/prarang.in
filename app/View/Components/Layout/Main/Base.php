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
     * @author Vivek Yadav <dev.vivek16@gmail.com>
     * @copyright 2025 Prarang <www.prarang.in>
      */



    public function render(): View|Closure|string
    {
        return view('components.layout.main.base');
    }

    public function visitorLocation(Request $request)
    {

        try {
             $data = $this->prepareVisitorData($request);
            if (env('LOCATION') == 'ON') {
                $location = $this->getVisitorLocation($request);
                if ($location) {
                    $data['visitor_city'] = $location['visitor_city'];
                    $data['visitor_address'] = $location['visitor_address'];
                }
            }

             $visitor = $this->findExistingVisitor($data['post_id'], $data['ip_address']);
            if ($visitor) {
                $this->incrementVisitCount($visitor);
            } else {

                $this->createNewVisitor($data);
            }
            return response()->json([
                'data'=>$data,
                'message' => 'Visitor information stored successfully.',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to store visitor information.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
    private function prepareVisitorData(Request $request)
    {
        return [
            'city' => $request->input('city', null),
            'post_id' => $request->input('post_id', null),
            'current_url' => $request->input('current_url', null),
            'ip_address' => $request->input('ip_address', null),
            'latitude' => $request->input('latitude', null),
            'longitude' => $request->input('longitude', null),
            'language' => $request->input('language', null),
            'screen_width' => $request->input('screen_width', null),
            'screen_height' => $request->input('screen_height', null),
            'timestamp' => now(),
            'user_agent' => $request->header('User-Agent'),
            'visit_count' => 1,
        ];
    }
    private function findExistingVisitor($postId, $ipAddress)
    {
        return Visitor::where('post_id', $postId)
                      ->where('ip_address', $ipAddress)
                      ->first();
    }

    private function incrementVisitCount($visitor)
    {
        $visitor->increment('visit_count');

    }

    private function createNewVisitor($data)
    {

        Visitor::create($data);
    }
    private function getVisitorLocation($request)
    {

        $latitude = $request->input('latitude', null);
        $longitude = $request->input('longitude', null);


        $openCageUrl = "https://api.opencagedata.com/geocode/v1/json?key=cfaa6c00aec1419eb8f68e69689019fc&q={$latitude}+{$longitude}";
        $nominatimUrl = "https://nominatim.openstreetmap.org/search?format=json&q={$latitude},{$longitude}";


        $visitor_city = null;
        $visitor_address = null;

        try {
             $openCageResponse = Http::get($openCageUrl);
            if ($openCageResponse->successful() && isset($openCageResponse->json()['results'][0])) {
                $result = $openCageResponse->json()['results'][0];
                 $visitor_city = $result['components']['city'] ?? $result['components']['_normalized_city'] ?? null;
                $visitor_address = $result['formatted'] ?? null;
            } else {
                if ($visitor_city === null && $visitor_address === null) {
                    $ipLocation = Http::get("https://ipapi.co/{$request->input('ip_address')}/json");

                    if ($ipLocation->successful()) {
                        return $ipLocation->json();
                    }
                    $nominatimResponse = Http::get($nominatimUrl);

                    if ($nominatimResponse->successful() && isset($nominatimResponse->json()[0])) {
                        $nominatimData = $nominatimResponse->json()[0];
                        $visitor_address = $nominatimData['display_name'] ?? 'Unknown Address';
                    }
                }
            }
        } catch (\Exception $e) {


            \Log::error("Error fetching location data: " . $e->getMessage());
        }


        return [
            'visitor_city' => $visitor_city,
            'visitor_address' => $visitor_address,
        ];
    }


}
