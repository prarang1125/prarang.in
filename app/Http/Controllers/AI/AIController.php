<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ChatAiServices;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Carbon;


class AIController extends Controller
{
    protected $aiService;

    public function __construct(ChatAiServices $aiService)
    {
        $this->aiService = $aiService;
    }

    // New method for parallel processing - single model response
    // public function generateAIResponse(Request $request)
    // {
    //     try {
    //         // Step 1: Validate input
    //         $request->validate([
    //             'prompt' => 'required|string',
    //             'model' => 'required|array',
    //             'model.*' => 'in:chatgpt,gemini,claude,grok',
    //             'content' => 'nullable|string',
    //         ]);

    //         // Step 2: Extract input data
    //         $prompt = $request->prompt;
    //         $models = $request->model; // array of models (should be single for this endpoint)
    //         $content = $request->content;

    //         // Step 3: Generate response for the first model only
    //         $model = $models[0] ?? null;
    //         if (!$model) {
    //             throw new \InvalidArgumentException('No valid model specified');
    //         }

    //         $response = null;
    //         switch ($model) {
    //             case 'chatgpt':
    //                 $result = $this->aiService->generateGptResponse('chatgpt', $prompt, [
    //                     'input' => $prompt,
    //                 ]);
    //                 $response = $result['success'] ? $result['response'] : 'GPT failed';
    //                 break;

    //             case 'gemini':
    //                 $result = $this->aiService->generateGiminiResponse($prompt, [
    //                     'model' => 'gemini-2.0-flash',
    //                     'temperature' => 0.7,
    //                     'max_output_tokens' => 2048,
    //                 ]);
    //                 $response = $result['success'] ? $result['response'] : 'Gemini failed';
    //                 break;

    //             case 'claude':
    //                 $result = $this->aiService->generateAnthropicResponse($prompt, [
    //                     'model' => 'claude-3.5-haiku-20240601',
    //                 ]);
    //                 $response = $result['success'] ? $result['response'] : 'Claude failed';
    //                 break;

    //             case 'grok':
    //                 $result = $this->aiService->generateGrokResponse($prompt, [
    //                     'model' => 'grok-3',
    //                     'temperature' => 0.7,
    //                     'max_output_tokens' => 2048,
    //                 ]);
    //                 $response = $result['success'] ? $result['response'] : 'Grok failed';
    //                 break;
    //         }

    //         // Step 4: Return JSON response for parallel processing
    //         return response()->json([
    //             'success' => true,
    //             'model' => $model,
    //             'response' => $response,
    //             'prompt' => $prompt,
    //             'content' => $content,
    //         ]);

    //     } catch (ValidationException $e) {
    //         return response()->json([
    //             'success' => false,
    //             'error' => 'Validation failed',
    //             'details' => $e->errors()
    //         ], 422);
    //     } catch (\InvalidArgumentException $e) {
    //         return response()->json([
    //             'success' => false,
    //             'error' => $e->getMessage()
    //         ], 400);
    //     } catch (\Exception $e) {
    //         Log::error('Single AI Response Generation Error: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'error' => 'An unexpected error occurred while generating the AI response.'
    //         ], 500);
    //     }
    // }

    public function generateAIResponse(Request $request)
    {
        dd($request->all());
        // try {
            // Step 1: Validate input
            $request->validate([
                'prompt' => 'required|string',
                'model' => 'required|array',
                'model.*' => 'in:chatgpt,gemini,claude,grok,deepseek,meta,upmana', // Added upmana
                'content' => 'nullable|string',
                'selected_models_sequence' => 'nullable|json',
            ]);

            // Step 2: Extract input data
            $prompt = $request->prompt;
            $models = $request->model; // array of models
            $content = $request->content;

            // Step 4: Loop through each selected model based on sequence
            // $sequencedModels = $request->input('selected_models_sequence', '');
           // Step 3: Decode sequence with error handling
$sequencedModels = json_decode($request->input('selected_models_sequence', '[]'), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    throw new \Exception('Invalid JSON sequence: ' . json_last_error_msg());
}

// Step 4: Verify sequence matches selected models
$diff = array_diff($sequencedModels, $models);
if (!empty($diff)) {
    throw new \Exception('Sequence contains unselected models: ' . implode(', ', $diff));
}

            
            // Ensure sequencedModels is a non-null array
            if (is_null($sequencedModels)) {
                $sequencedModels = [];
            } elseif (is_string($sequencedModels)) {
                // Remove any whitespace and split
                $sequencedModels = array_filter(explode(',', trim($sequencedModels)));
            } elseif (!is_array($sequencedModels)) {
                // Ensure it's an array, convert if not
                $sequencedModels = (array) $sequencedModels;
            }

            // Ensure models is a non-null array
            $models = $models ?? [];
            if (!is_array($models)) {
                $models = (array) $models;
            }
            
            // Combine and deduplicate models
            $allModels = array_unique(array_merge($sequencedModels, $models));

            // Initialize responses array with safe defaults
            $responses = [
                'prompt' => $prompt,
                'model' => $models,
                'upmanaResponse' => $content ?? null,
            ];

            // Safe model generation
            foreach ($allModels as $model) {
                switch ($model) {
                    case 'chatgpt':
                        $result = $this->aiService->generateText('chatgpt', $prompt, [
                            'input' => $prompt,
                        ]);
                        $responses['gptResponse'] = $result['success'] ? $result['response'] : 'GPT failed';
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
                            'model' => 'claude-3.5-haiku-20240601',
                        ])['response'] ?? 'Claude failed';
                        break;

                    case 'deepseek':
                        $deepseekResponse = $this->aiService->generateDeepseekResponse($prompt);
                        if (isset($deepseekResponse) && is_array($deepseekResponse)) {
                            $deepseekResponse = implode('', $deepseekResponse);
                        }
                        $responses['deepseekResponse'] = $deepseekResponse ?? 'Deepseek failed';        
                        break;

                    case 'meta':
                        $metaResponse = $this->aiService->generateMetaResponse($prompt);
                        if (isset($metaResponse) && is_array($metaResponse)) {
                            $metaResponse = implode('', $metaResponse);
                        }
                        $responses['metaResponse'] = $metaResponse ?? 'Meta failed';
                        break;

                    case 'grok':
                        $responses['grokResponse'] = $this->aiService->generateGrokResponse($prompt, [
                            'model' => 'grok-3',
                            'temperature' => 0.7,
                            'max_output_tokens' => 2048,
                        ])['response'] ?? 'Grok failed';
                        break;

                    case 'upmana':
                        $upmanaContent = $content ? trim($content) : null;
                        $responses['upmanaResponse'] = $upmanaContent ?: 'Upmana content not available';
                        break;
                }
            }

            // Prepare ordered responses based on sequence
            $responseTypes = [
                'gptResponse' => 'chatgpt',
                'geminiResponse' => 'gemini',
                'claudeResponse' => 'claude',
                'grokResponse' => 'grok',
                'deepseekResponse' => 'deepseek',
                'metaResponse' => 'meta',
                'upmanaResponse' => 'upmana'
            ];

            // Safely handle sequence and responses
            $orderedResponses = [];
            
            // Only iterate if sequencedModels is a non-empty array
            if (!empty($sequencedModels)) {
                foreach ($sequencedModels as $model) {
                    // Safely find the corresponding response key
                    $responseKey = array_search($model, $responseTypes);
                    if ($responseKey && isset($responses[$responseKey])) {
                        $orderedResponses[$responseKey] = $responses[$responseKey];
                    }
                }
            }

            // Merge any remaining responses not in the sequence
            $orderedResponses = array_merge(
                $orderedResponses ?: [], 
                array_diff_key($responses ?: [], $orderedResponses ?: [])
            );

            // Generate timestamp
            $generatedAt = Carbon::now()->format('H:i:s d-m-Y');

            // Ensure each response is set or null
            $safeResponses = [
                'prompt' => $prompt,
                'model' => $models,
                'content' => $orderedResponses['upmanaResponse'] ?? $content,
                'gptResponse' => $orderedResponses['gptResponse'] ?? null,
                'geminiResponse' => $orderedResponses['geminiResponse'] ?? null,
                'claudeResponse' => $orderedResponses['claudeResponse'] ?? null,
                'grokResponse' => $orderedResponses['grokResponse'] ?? null,
                'deepseekResponse' => $orderedResponses['deepseekResponse'] ?? null,
                'metaResponse' => $orderedResponses['metaResponse'] ?? null,
                'generatedAt' => $generatedAt,
            ];

            dd( $safeResponses);

            // Return view with safe responses
            return view('ai.init_generation', $safeResponses);
        // } catch (ValidationException $e) {
        //     // Return back with validation errors
        //     return back()->withErrors($e->errors())->withInput();
        // } catch (\InvalidArgumentException $e) {
        //     // Return back with specific error
        //     return back()->with('error', $e->getMessage())->withInput();
        // } catch (\Exception $e) {
        //     // Log and handle generic error
        //     Log::error('AI Response Generation Error: ' . $e->getMessage());
        //     return back()->with('error', 'An unexpected error occurred while generating the AI response. Please try again.')->withInput();
        // }
    }


    // public function showForm()
    // {
    //     return view('ai.init_generation');
    // }

    // public function generate(Request $request)
    // {
    //     try {

    //         $request->validate([
    //             'model' => 'required|string',
    //             'prompt' => 'required|string',
    //             'max_output_tokens' => 'nullable|integer|min:1',
    //             'temperature' => 'nullable|numeric|min:0|max:1',
    //             'top_p' => 'nullable|numeric|min:0|max:1',
    //             'store' => 'nullable|boolean',
    //         ]);

    //         $params = [
    //             'input' => [
    //                 [
    //                     'role' => 'user',
    //                     'content' => $request->prompt,
    //                 ],
    //             ],
    //             'temperature' => $request->input('temperature', 1.0),
    //             'max_output_tokens' => $request->input('max_output_tokens', 2048),
    //             'top_p' => $request->input('top_p', 1.0),
    //         ];

    //         $result = $this->aiService->generateText($request->model, $request->prompt, $params);

    //         if ($result['success'] && $request->has('store')) {
    //             // Save to DB if needed
    //             // Add your database storage logic here
    //         }

    //         return response()->json([
    //             'status' => $result['success'] ? 'success' : 'error',
    //             'message' => $result['response'] ?? $result['error'] ?? 'No response.',
    //             'temperature_used' => $params['temperature'],
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Failed to generate response: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }
}
