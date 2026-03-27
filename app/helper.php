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


if (! function_exists('getSuperScript')) {
    function getSuperScript($number)
    {
        $lastDigit = $number % 10;
        $lastTwoDigits = $number % 100;
        if ($lastTwoDigits >= 11 && $lastTwoDigits <= 13) {
            $ordinal = 'th';
        } else {
            switch ($lastDigit) {
                case 1:
                    $ordinal = 'st';
                    break;
                case 2:
                    $ordinal = 'nd';
                    break;
                case 3:
                    $ordinal = 'rd';
                    break;
                default:
                    $ordinal = 'th';
                    break;
            }
        }
        echo number_format($number, 0, '.', ',') . '<sup>' . $ordinal . '</sup>';
    }
}


if (!function_exists('url_encoder')) {
    function url_encoder($data)
    {
        // 1. Standard base64 encode
        // 2. Replace + and / with - and _ to make it URL-safe
        // 3. Trim the = padding from the end
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}

if (!function_exists('url_decoder')) {
    function url_decoder($data)
    {
        // PHP's base64_decode handles missing padding (=) automatically
        return base64_decode(strtr($data, '-_', '+/'));
    }
}
