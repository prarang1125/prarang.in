<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Services\TextToHtmlParser;
use Livewire\Component;
use Illuminate\Http\Request;

class ComparisonApi extends Component
{
    public $prompt;
    public $model = [];
    public $content;
    public $loading = true;

    public $label = [];
    public $gptResponse;
    public $geminiResponse;
    public $claudeResponse;
    public $grokResponse;
    public $deepseekResponse;
    public $metaResponse;
    public $perplexityResponse;

    public function mount($key)
    {
        $data = json_decode(Cache::get($key), true);
        if ($data) {
            $this->prompt = $data['prompt'] ?? '';
            $this->content = $data['content'] ?? '';
            $modelsWithVersions = $data['models'] ?? [];
            usort($modelsWithVersions, function ($a, $b) {
                return intval(explode('-', $a)[1] ?? 0) <=> intval(explode('-', $b)[1] ?? 0);
            });

            $orderedModelNames = array_map(function ($model) {
                return strtolower(explode('-', $model)[0]);
            }, $modelsWithVersions);

            // Add Upmana to the end if not already in the list
            if (!in_array('upmana', $orderedModelNames)) {
                $orderedModelNames[] = 'upmana';
            }
            $this->model = $orderedModelNames;
        }

        $local = session('locale', 'en');
        $labelData = httpGet('/local/lable', ['local' => $local]);
        $this->label = $labelData['data'] ?? [];
    }

    public function loadServices()
    {
        ini_set('max_execution_time', 300);

        // Step 1: Format Upmana response if available
        if ($this->content) {
            // Remove Livewire block comments from innerHTML to clean up the view
            $this->content = preg_replace('/<!--\[if [A-Z]+\]><!\[endif\]-->/', '', $this->content);
        }

        // Step 2: Generate responses for each model using OpenRouter API
        $openRouterUrl = 'http://localhost:4000/run';
        $openRouterModels = [
            'google' => 'google/gemma-3-4b-it',
            'gemini' => 'google/gemma-3-4b-it',
            'chatgpt' => 'openai/gpt-5-nano',
            'claude' => 'anthropic/claude-3-haiku',
            'grok' => 'x-ai/grok-4-fast',
            'deepseek' => 'deepseek/deepseek-v4-flash',
            'meta' => 'meta-llama/llama-3.1-8b-instruct',
            'perplexity' => 'perplexity/sonar',
        ];

        try {
            // Build models array for OpenRouter API
            $apiModels = [];
            foreach ($this->model as $modelName) {
                if (isset($openRouterModels[$modelName])) {
                    $apiModels[] = $openRouterModels[$modelName];
                }
            }

            // Call OpenRouter API
            if (!empty($apiModels)) {
                $openRouterPayload = [
                    'prompt' => $this->prompt,
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

                        // Parse raw output into HTML
                        $parsedOutput = TextToHtmlParser::parse($output);

                        // Extract model name and map to response key
                        $shortName = explode('/', $model)[0]; // "google", "openai", etc
                        if ($shortName === 'google') {
                            $this->geminiResponse = $parsedOutput;
                        } elseif ($shortName === 'openai') {
                            $this->gptResponse = $parsedOutput;
                        } elseif ($shortName === 'anthropic') {
                            $this->claudeResponse = $parsedOutput;
                        } elseif ($shortName === 'deepseek') {
                            $this->deepseekResponse = $parsedOutput;
                        } elseif ($shortName === 'meta-llama') {
                            $this->metaResponse = $parsedOutput;
                        } elseif ($shortName === 'openrouter') {
                            $this->grokResponse = $parsedOutput;
                        } elseif ($shortName === 'perplexity') {
                            $this->perplexityResponse = $parsedOutput;
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            Log::warning('OpenRouter API Error: ' . $e->getMessage());
        }

        $this->loading = false;
    }

    public function render()
    {
        $metaData = [
            'nav-heading' => 'Comparison Report',
            'nav-sub-heading' => '',
        ];
        return view('livewire.pages.comparison-api')
            ->layout('components.layout.main.base', compact('metaData'));
    }
}

