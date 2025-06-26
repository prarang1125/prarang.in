<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SharedResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SharedResponseController extends Controller
{
    //     public function store(Request $request)
    // {
    //     dd($request->all());
    //     $data = $request->validate([
    //         'prompt' => 'required|string',
    //         'upmana_response' => 'nullable|string',
    //         'gpt_response' => 'nullable|string',
    //         'gemini_response' => 'nullable|string',
    //         'claude_response' => 'nullable|string',
    //         'grok_response' => 'nullable|string',
    //         '_response' => 'nullable|string',
    //         'grok_response' => 'nullable|string',
    //     ]);

    //     // Generate UUID and UTC timestamp manually
    //     $uuid = Str::uuid()->toString();
    //     $createdAtUtc = now('UTC');

    //     // Merge additional fields
    //     $data['uuid'] = $uuid;
    //     $data['created_at_utc'] = $createdAtUtc;
    //     // Insert into DB using query builder

    //     httpPost('/share-response', ['data' => $data])['data'];

    //     return response()->json(['uuid' => $uuid]);
    // }

    public function store(Request $request)
    {
        $data = $request->validate([
            'prompt' => 'required|string',
            'gpt_response' => 'nullable|string',
            'upmana_response' => 'nullable|string',
            'gemini_response' => 'nullable|string',
            'grok_response' => 'nullable|string',
            'claude_response' => 'nullable|string',
            'deepseek_response' => 'nullable|string',
            'meta_response' => 'nullable|string',
        ]);

        $data['gimini_response'] = $data['gemini_response'] ?? '';

        // Make API request
        $response = httpPost('/share-response', $data);

        // Handle the response
        if (method_exists($response, 'successful') && $response->successful()) {
            // return response()->json($response->json(), $response->status());
            $responseData = $response->json();
            if (is_array($responseData) && isset($responseData[0]['uuid'])) {
                return response()->json(['uuid' => $responseData[0]['uuid']], 200);
            }
        }

        // Handle failure case
        return response()->json([
            'error' => 'API request failed',
            'details' => method_exists($response, 'body') ? $response->body() : $response
        ], method_exists($response, 'status') ? $response->status() : 500);
    }

    public function show($uuid)
    {
        // Fetch the shared response by UUID
        $response = httpGet("/share-response/$uuid");

        // Check if the response is valid and has data
        if (!$response || !$response['status'] || !isset($response['data'])) {
            abort(404);
        }

        $sharedResponse = $response['data'];

        return view('ai.shared_response', [
            'created_at' => $sharedResponse['created_at_utc'],
            'prompt' => $sharedResponse['prompt'],
            'umanResponse' => $sharedResponse['upmana_response'],
            'gptResponse' => $sharedResponse['gpt_response'],
            'geminiResponse' => $sharedResponse['gimini_response'],
            'grokResponse' => $sharedResponse['grok_response'],
            'claudeResponse' => $sharedResponse['claude_response'],
            'deepSeekResponse' => $sharedResponse['deepseek_response'],
            'metaResponse' => $sharedResponse['meta_response'],
        ]);
    }
}
