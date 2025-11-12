<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ChatAiServices;
use App\Services\TextToHtmlParser;
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
        ini_set('max_execution_time', 300); // Increase to 5 minutes for multiple API calls
        $local = session('locale');
        $label = httpGet('/local/lable', ['local' => $local])['data'];

        try {
            // Step 1: Validate input
            $request->validate([
                'prompt' => 'required|string',
                'model' => 'required|array',
                'model.*' => ['required', 'regex:/^(chatgpt|gemini|claude|grok|deepseek|meta|upmana|perplexity)-\d+$/'],
                'content' => 'nullable|string',
            ]);


            // Step 2: Extract input
            $prompt = $request->prompt;
            $modelsWithVersions = $request->model; // e.g. ["meta-5", "gemini-1", ...]
            $content = $request->content;

            // Step 3: Sort by version and extract names
            usort($modelsWithVersions, function ($a, $b) {
                return intval(explode('-', $a)[1]) <=> intval(explode('-', $b)[1]);
            });

            $orderedModelNames = array_map(function ($model) {
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


            // Step 5: Generate responses for each model using OpenRouter API
            $openRouterUrl = 'http://localhost:4000/run';
            $openRouterModels = [
                'google' => 'google/gemini-2.0-flash-lite-001',
                'gemini' => 'google/gemini-2.0-flash-lite-001',
                'chatgpt' => 'openai/chatgpt-4o-latest',
                'claude' => 'anthropic/claude-3-haiku',
                'grok' => 'x-ai/grok-4-fast',
                'deepseek' => 'deepseek/deepseek-r1-0528-qwen3-8b:free',
                'meta' => 'meta-llama/llama-4-maverick:free',
                'perplexity' => 'perplexity/sonar-reasoning-pro',
            ];

            try {
                // Build models array for OpenRouter API
                $apiModels = [];
                foreach ($orderedModelNames as $modelName) {
                    if (isset($openRouterModels[$modelName])) {
                        $apiModels[] = $openRouterModels[$modelName];
                    }
                }
                // Call OpenRouter API
                if (!empty($apiModels)) {
                    $openRouterPayload = [
                        'prompt' => $prompt . "Don’t give recommendations — just provide data in tabular form with data-driven results",
                        'models' => $apiModels,
                    ];

                    $client = new \GuzzleHttp\Client();
                    $openRouterResponse = $client->post($openRouterUrl, [
                        'json' => $openRouterPayload,
                        'timeout' => 300, // 5 minute timeout
                        'http_errors' => false,
                    ]);

                    $openRouterData = json_decode($openRouterResponse->getBody(), true);

                    // Map OpenRouter responses to model names
                    if (isset($openRouterData['responses']) && is_array($openRouterData['responses'])) {
                        foreach ($openRouterData['responses'] as $modelResponse) {
                            $model = $modelResponse['model'];
                            $output = $modelResponse['output'] ?? 'No response';

                            // Extract model name and map to response key
                            $shortName = explode('/', $model)[0]; // "google", "openai", etc
                            if ($shortName === 'google') {
                                $responses['geminiResponse'] = $output;
                            } elseif ($shortName === 'openai') {
                                $responses['gptResponse'] = $output;
                            } elseif ($shortName === 'anthropic') {
                                $responses['claudeResponse'] = $output;
                            } elseif ($shortName === 'deepseek') {
                                $responses['deepseekResponse'] = $output;
                            } elseif ($shortName === 'meta-llama') {
                                $responses['metaResponse'] = $output;
                            } elseif ($shortName === 'openrouter') {
                                $responses['grokResponse'] = $output;
                            } elseif ($shortName === 'perplexity') {
                                $responses['perplexityResponse'] = $output;
                            }
                        }
                    }

                    // Log::info('OpenRouter API Response', [
                    //     'duration' => $openRouterData['total_duration'] ?? 'N/A',
                    //     'successful' => $openRouterData['successful'] ?? 0,
                    //     'failed' => $openRouterData['failed'] ?? 0,
                    // ]);
                }
            } catch (\Exception $e) {
                Log::warning('OpenRouter API Error: ' . $e->getMessage());
                // Continue without OpenRouter responses
            }




            // Step 6: Order keys for response
            $responseTypes = [
                'chatgpt' => 'gptResponse',
                'gemini' => 'geminiResponse',
                'claude' => 'claudeResponse',
                'grok' => 'grokResponse',
                'deepseek' => 'deepseekResponse',
                'meta' => 'metaResponse',
                'upmana' => 'upmanaResponse',
                'perplexity' => 'perplexityResponse',
            ];

            $orderedResponses = [
                'prompt' => $prompt,
                'model' => $orderedModelNames,
                'content' => $responses['upmanaResponse'] ?? $content,
                'generatedAt' => now()->format('H:i:s d-m-Y'),
                'label' => $label
            ];

            foreach ($orderedModelNames as $model) {
                $key = $responseTypes[$model] ?? null;
                if ($key && isset($responses[$key])) {
                    // Parse response text to HTML
                    $rawResponse = $responses[$key];
                    $orderedResponses[$key] = TextToHtmlParser::parse($rawResponse);
                    // Also keep raw version for reference
                    $orderedResponses[$key . '_raw'] = $rawResponse;
                }
            }

            // Parse content if available
            if ($orderedResponses['content']) {
                $orderedResponses['content_html'] = TextToHtmlParser::parse($orderedResponses['content']);
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
