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
        'human_response' => 'nullable|string',
        'gpt_response' => 'nullable|string',
        'gemini_response' => 'nullable|string',
        'claude_response' => 'nullable|string',
        'grok_response' => 'nullable|string',
    ]);

    // Generate UUID and UTC timestamp
    $data['uuid'] = Str::uuid()->toString();
    $data['created_at_utc'] = now('UTC')->toISOString();

    // Send data to external API
    $response = Http::post('https://external-api.com/share-response', $data);

    // Optional: Check for success or failure
    if ($response->successful()) {
        return response()->json(['uuid' => $data['uuid']]);
    } else {
        return response()->json([
            'error' => 'Failed to store data in external API.',
            'details' => $response->body()
        ], 500);
    }
}

    public function show($uuid)
    {
        // Fetch the shared response by UUID
        $sharedResponse = DB::table('shared_responses')->where('uuid', $uuid)->first();

        if (!$sharedResponse) {
            abort(404);
        }

        return view('ai.shared_response', [
            'created_at' => $sharedResponse->created_at_utc,
            'prompt' => $sharedResponse->prompt,
            'umanResponse' => $sharedResponse->uman_response,
            'gptResponse' => $sharedResponse->gpt_response,
            'geminiResponse' => $sharedResponse->gemini_response,
            'claudeResponse' => $sharedResponse->claude_response,
            'grokResponse' => $sharedResponse->grok_response,
        ]);
    }
}
