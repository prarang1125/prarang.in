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


    public function generateAIResponse(Request $request)
    {

        try {
            // Step 1: Validate input
            $request->validate([
                'prompt' => 'required|string',
                'model' => 'required|array',
                'model.*' => 'in:chatgpt,gemini,claude,grok,deepseek', // each selected model must be valid
                'content' => 'nullable|string',
            ]);

            // Step 2: Extract input data
            $prompt = $request->prompt;
            $models = $request->model; // array of models
            $content = $request->content;




            // Step 3: Initialize response data
            $responses = [
                'prompt' => $prompt,
                'model' => $models,
                'content' => $content,
            ];

            // Step 4: Loop through each selected model and generate response
            foreach ($models as $model) {
                switch ($model) {
                    case 'chatgpt':
                        $responses['gptResponse'] = $this->aiService->generateGptResponse('gpt-4', [
                            'input' => $prompt,
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
                            'model' => 'claude-3.5-haiku-20240601',
                        ])['response'] ?? 'Claude failed';
                        break;

                    case 'grok':
                        $responses['grokResponse'] = $this->aiService->generateGrokResponse($prompt, [
                            'model' => 'grok-3',
                            'temperature' => 0.7,
                            'max_output_tokens' => 2048,
                        ])['response'] ?? 'Grok failed';
                        break;
                    case 'deepseek':
                        $deepseekResponse = $this->aiService->generateDeepseekResponse($prompt)['response'] ?? 'Deepseek failed';
                        $responses['deepseekResponse'] = $deepseekResponse;

                        break;
                }
            }

            $generatedAt = Carbon::now()->format('H:i:s d-m-Y');


            // Step 5: Return view with AI responses
            return view('ai.init_generation', [
                'prompt' => $prompt,
                'model' => $models,
                'content' => $content,
                'gptResponse' => $responses['gptResponse'] ?? null,
                'geminiResponse' => $responses['geminiResponse'] ?? null,
                'claudeResponse' => $responses['claudeResponse'] ?? null,
                'grokResponse' => $responses['grokResponse'] ?? null,
                'deepseekResponse' => $responses['deepseekResponse'] ?? null,
                'generatedAt' => $generatedAt,
            ]);
        } catch (ValidationException $e) {
            // Return back with validation errors
            return back()->withErrors($e->errors())->withInput();
        } catch (\InvalidArgumentException $e) {
            // Return back with specific error
            return back()->with('error', $e->getMessage())->withInput();
        } catch (\Exception $e) {
            // Log and handle generic error
            Log::error('AI Response Generation Error: ' . $e->getMessage());
            return back()->with('error', 'An unexpected error occurred while generating the AI response. Please try again.')->withInput();
        }
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
