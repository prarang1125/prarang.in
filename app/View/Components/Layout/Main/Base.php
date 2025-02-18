<?php

namespace App\View\Components\Layout\Main;

use App\Models\Visitor;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

    public function durationUpdate(Request $request)
    {
        $existingVisitor = Visitor::where('ip_address', $request->input('ip_address'))
            ->where('post_id', $request->input('post_id'))
            ->first();
        if ($existingVisitor) {
            $existingDuration = $existingVisitor->duration ?? 0;
            $newDuration = $existingDuration + $request->input('duration');
            $existingVisitor->update(['duration' => $newDuration]);

            if ($request->max_scroll > ($existingVisitor->scroll ?? 0)) {
                $existingVisitor->update(['scroll' => $request->max_scroll]);
            }
        }
        return response()->json(['message' => 'Duration updated successfully!', 'duration' => $newDuration, 'scroll' => $request->max_scroll], 200);
    }

    public function visitorLocation(Request $request)
    {
        // Prepare the visitor data
        $existingVisitor = $this->findExistingVisitor($request->input('post_id'), $request->input('ip_address'));
        if ($existingVisitor) {
            // Increment visit count if the visitor already exists
            $this->incrementVisitCount($existingVisitor);
            return response()->json(['message' => 'Visitor visit count updated successfully!'], 200);
        }
        $visitorData = $this->prepareVisitorData($request);
        $visitorLocation = $this->getVisitorLocation($request);
        $visitor = new Visitor();
        $visitor->post_id = $visitorData['post_id'];
        $visitor->post_city = $visitorData['city'];
        $visitor->ip_address = $visitorData['ip_address'];
        $visitor->latitude = $visitorData['latitude'];
        $visitor->longitude = $visitorData['longitude'];
        $visitor->language = $visitorData['language'];
        $visitor->screen_width = $visitorData['screen_width'];
        $visitor->screen_height = $visitorData['screen_height'];
        $visitor->user_agent = $visitorData['user_agent'];
        $visitor->current_url = $visitorData['current_url'];
        $visitor->referrer = $visitorData['referrer'];
        $visitor->duration = $visitorData['duration'];
        $visitor->visit_count = $visitorData['visit_count'];
        $visitor->scroll = $visitorData['scroll'];
        $visitor->user_type = $visitorData['user_type'];
        $visitor->visitor_city = $visitorLocation['visitor_city'] ?? null;
        $visitor->visitor_address = $visitorLocation['visitor_address'] ?? null;
        $saved = $visitor->save();
        return response()->json(['message' => $saved ? 'Visitor data saved successfully!' : 'Error saving visitor data!'], $saved ? 201 : 500);
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
            'referrer' => $request->input('referrer', null),
            'duration' => $request->input('duration', null),
            'scroll' => $request->input('scroll', null),
            'user_type' => $request->input('user_type', null),
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
        try {
            $latitude = $request->input('latitude', null);
            $longitude = $request->input('longitude', null);

            if ($latitude == 'null' || $longitude == 'null') {
                $ipLocation = Http::get("https://ipapi.co/{$request->input('ip_address')}/json");

                if ($ipLocation->successful()) {
                    $data = $ipLocation->json();
                    return [
                        'visitor_city' => $data['city'] ?? null,
                        'visitor_address' => $data['region'] . ', ' . $data['country'] ?? null,
                    ];
                }
            } else {
                // First try OpenCage
                $openCageUrl = "https://api.opencagedata.com/geocode/v1/json?key=cfaa6c00aec1419eb8f68e69689019fc&q={$latitude}+{$longitude}";

                $openCageResponse = Http::get($openCageUrl);

                if ($openCageResponse->successful() && isset($openCageResponse->json()['results'][0])) {
                    $result = $openCageResponse->json()['results'][0];
                    $visitor_city = $result['components']['city'] ?? $result['components']['_normalized_city'] ?? null;
                    $visitor_address = $result['formatted'] ?? null;
                } else {
                    // If OpenCage fails, fallback to Nominatim
                    $nominatimUrl = "https://nominatim.openstreetmap.org/search?format=json&q={$latitude},{$longitude}";
                    $nominatimResponse = Http::get($nominatimUrl);

                    if ($nominatimResponse->successful() && isset($nominatimResponse->json()[0])) {
                        $nominatimData = $nominatimResponse->json()[0];
                        $visitor_address = $nominatimData['display_name'] ?? 'Unknown Address';
                    } else {
                        // If Nominatim fails, fallback to IP API
                        $ipLocation = Http::get("https://ipapi.co/{$request->input('ip_address')}/json");

                        if ($ipLocation->successful()) {
                            $data = $ipLocation->json();
                            $visitor_city = $data['city'] ?? null;
                            $visitor_address = $data['region'] . ', ' . $data['country'] ?? null;
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error("Error fetching location data: " . $e->getMessage());
        }

        return [
            'visitor_city' => $visitor_city ?? null,
            'visitor_address' => $visitor_address ?? 'Unknown Address',
        ];
    }
}
