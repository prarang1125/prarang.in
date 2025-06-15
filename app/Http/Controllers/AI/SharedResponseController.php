<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SharedResponse;

class SharedResponseController extends Controller
{
        public function store(Request $request)
    {

        $data = $request->validate([
            'prompt' => 'required|string',
            'uman_response' => 'nullable|string',
            'gpt_response' => 'nullable|string',
            'gemini_response' => 'nullable|string',
            'claude_response' => 'nullable|string',
            'grok_response' => 'nullable|string',
        ]);

        $response = SharedResponse::create($data);

        // Return the UUID for the share link
        return response()->json(['uuid' => $response->uuid]);
    }

    // Show the saved response via UUID
    public function show($uuid)
    {
        $sharedResponse = SharedResponse::where('uuid', $uuid)->firstOrFail();

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
