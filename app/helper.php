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

if (! function_exists('httpPost')) {
    function httpPost($url, $parameters)
    {
        try {
            $header = ['api-auth-token' => config('apidata.TOKEN'), 'api-auth-type' => config('apidata.TYPE'), 'Content-Type' => 'application/json'];
            $response = Http::withHeaders($header)
                ->post(env('API_DOMAIN') . '/api/' . $url, $parameters);
            //Base Url + Parameters
            if ($response->failed()) {
                return Redirect::back()->withErrors(['apiError' => $response->status() . ' : Unable to reach.']);
            } else {
                return $response->throw()->json();  //  Returning Response  (Json)
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 401);
        }
    }
}
