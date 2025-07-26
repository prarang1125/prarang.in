<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ChatAiServices;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

class AIController extends Controller
{
    protected $aiService;

    public function __construct(ChatAiServices $aiService)
    {
        $this->aiService = $aiService;
    }

public function generateAIResponse(Request $request)
{
    $local =session('locale');
    $label=httpGet('/local/lable',['local' => $local])['data'];
    
     try {
        // Step 1: Validate input
        $request->validate([
            'prompt' => 'required|string',
            'model' => 'required|array',
            'model.*' => ['required', 'regex:/^(chatgpt|gemini|claude|grok|deepseek|meta|upmana)-\d+$/'],
            'content' => 'nullable|string',
        ]);


        // Step 2: Extract input
        $prompt = $request->prompt;
        $modelsWithVersions = $request->model; // e.g. ["meta-5", "gemini-1", ...]
        $content = $request->content;

        // Step 3: Sort by version and extract names
        usort($modelsWithVersions, function($a, $b) {
            return intval(explode('-', $a)[1]) <=> intval(explode('-', $b)[1]);
        });

        $orderedModelNames = array_map(function($model) {
            return strtolower(explode('-', $model)[0]); // "meta-5" => "meta"
        }, $modelsWithVersions);

        // Add Upmana to the end if not already in the list
        if (!in_array('upmana', $orderedModelNames)) {
            $orderedModelNames[] = 'upmana';
        }

        // Step 4: Initialize responses
        $responses = [
            'prompt' => $prompt,
            'model' => $orderedModelNames,
            'upmanaResponse' => $content ?? null,
        ];

        // Step 5: Generate responses by model
        foreach ($orderedModelNames as $model) {
            switch ($model) {
                case 'chatgpt':
                    $responses['gptResponse'] = $this->aiService->generateGptResponse('gpt-4', [
                        'prompt' => $prompt,
                        'temperature' => 0.7,
                        'max_output_tokens' => 2048,
                    ])['response'] ?? 'GPT failed';
                    
                    break;

                case 'gemini':
                    $responses['geminiResponse'] = $this->aiService->generateGiminiResponse($prompt, [
                        'model' => 'gemini-2.0-flash',
                        'temperature' => 0.7,
                        'max_output_tokens' => 2048,
                    ])['response'] ?? 'Gemini failed';
                    break;

                case 'claude':
                    $responses['claudeResponse'] = $this->aiService->generateAnthropicResponse($prompt, [
                            'model' => 'claude-3-5-haiku-20241022',
                            'temperature' => 0.7,
                            'max_output_tokens' => 2048,
                        ])['response'] ?? 'Claude failed';
                        break;
                    
                case 'deepseek':
                    $deepseekResponse = $this->aiService->generateDeepseekResponse($prompt);
                    $responses['deepseekResponse'] = is_array($deepseekResponse)
                        ? implode('', $deepseekResponse)
                        : ($deepseekResponse ?? 'Deepseek failed');
                    break;

                case 'meta':
                    $metaResponse = $this->aiService->generateMetaResponse($prompt);
                    $responses['metaResponse'] = is_array($metaResponse)
                        ? implode('', $metaResponse)
                        : ($metaResponse ?? 'Meta failed');
                    break;

                case 'grok':
                    $responses['grokResponse'] = $this->aiService->generateGrokResponse($prompt, [
                        'model' => 'grok-3',
                        'temperature' => 0.7,
                        'max_output_tokens' => 2048,
                    ])['response'] ?? 'Grok failed';
                    break;

                case 'upmana':
                    $responses['upmanaResponse'] = $content ? trim($content) : 'Upmana content not available';
                    break;
            }
        }

        // Step 6: Order keys for response
        $responseTypes = [
            'chatgpt' => 'gptResponse',
            'gemini' => 'geminiResponse',
            'claude' => 'claudeResponse',
            'grok' => 'grokResponse',
            'deepseek' => 'deepseekResponse',
            'meta' => 'metaResponse',
            'upmana' => 'upmanaResponse'
        ];

        $orderedResponses = [
            'prompt' => $prompt,
            'model' => $orderedModelNames,
            'content' => $responses['upmanaResponse'] ?? $content,
            'generatedAt' => now()->format('H:i:s d-m-Y'),
            'label'=>$label
        ];

        foreach ($orderedModelNames as $model) {
            $key = $responseTypes[$model] ?? null;
            if ($key && isset($responses[$key])) {
                $orderedResponses[$key] = $responses[$key];
            }
        }
           // Return view with ordered responses
        return view('ai.init_generation', $orderedResponses);

    } catch (ValidationException $e) {
        return back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        Log::error('AI Response Error: ' . $e->getMessage());
        return back()->with('error', 'Something went wrong while generating AI responses.')->withInput();
    }
}




}
