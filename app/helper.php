<?php


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


if (!function_exists('httpGet')) {
    function httpGet($url, $parameters = [])
    {
        try {
            $headers = [
                'api-auth-token' => env('API_TOKEN'),
                'api-auth-type' => env('API_TYPE'),
                'Content-Type' => 'application/json',
            ];
            $fullUrl = rtrim(env('API_DOMAIN'), '/') . '/api/' . ltrim($url, '/');

            // Log::info("API Request: " . $fullUrl, ['params' => $parameters]);

            $response = Http::withHeaders($headers)->timeout(180)->get($fullUrl, $parameters);
            // dd($response->json());
            if ($response->failed()) {
                Log::error("API Failed: " . $response->status(), ['response' => $response->body()]);
                return ['status' => 'error', 'message' => 'API request failed.', 'code' => $response->status()];
            }

            return $response->json();
        } catch (Exception $e) {
            Log::error("API Exception: " . $e->getMessage());
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}

if (!function_exists('httpGetAPS')) {
    function httpGetAPS($url, $parameters = [])
    {
        try {
            $headers = [
                'api-auth-token' => env('API_TOKEN'),
                'api-auth-type' => env('API_TYPE'),
                'Content-Type' => 'application/json',
            ];
            $fullUrl = rtrim(env('API_DOMAIN_APS'), '/') . "/" . ltrim($url, '/');

            // Log::info("API Request: " . $fullUrl, ['params' => $parameters]);

            $response = Http::withHeaders($headers)->timeout(180)->get($fullUrl, $parameters);
            // dd($response->json());
            if ($response->failed()) {
                Log::error("API Failed: " . $response->status(), ['response' => $response->body()]);
                return ['status' => 'error', 'message' => 'API request failed.', 'code' => $response->status()];
            }

            return $response->json();
        } catch (Exception $e) {
            Log::error("API Exception: " . $e->getMessage());
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}



if (!function_exists('httpPost')) {
    function httpPost($url, $parameters)
    {
        try {
            $headers = [
                'api-auth-token' => env('API_TOKEN'),
                'api-auth-type' => env('API_TYPE'),
                'Content-Type' => 'application/json',
            ];

            $fullUrl = rtrim(env('API_DOMAIN'), '/') . '/api/' . ltrim($url, '/');

            $response = Http::withHeaders($headers)->post($fullUrl, $parameters);

            // Always return the Response object (Laravel HTTP client)
            return $response;
        } catch (\Exception $e) {
            Log::error('httpPost() Exception: ' . $e->getMessage());

            // Return a mock Response-like structure
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}

function highlightFirstOccurrence($paragraph, $cityNames, $type = null)
{
    foreach ($cityNames as $city) {
        // Escape regex special characters (if any)
        $escapedCity = preg_quote($city, '/');

        // Match all occurrences (case insensitive)
        if (preg_match_all("/\b($escapedCity)\b/i", $paragraph, $matches, PREG_OFFSET_CAPTURE)) {
            $firstMatch = $matches[0][0]; // first occurrence
            $start = $firstMatch[1];
            $length = strlen($firstMatch[0]);

            // Apply highlighting
            $highlightedCity = '<span style="color:blue; font-weight:bold;">' . $firstMatch[0] . '</span> ' . $type;

            // Replace first occurrence only
            $paragraph = substr_replace($paragraph, $highlightedCity, $start, $length);
        }
    }
    return $paragraph;
}

if (!function_exists('is_assoc')) {
    function is_assoc($array)
    {
        if (!is_array($array) || empty($array)) {
            return false;
        }
        return array_keys($array) !== range(0, count($array) - 1);
    }
}
