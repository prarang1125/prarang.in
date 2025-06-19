<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;
use Parsedown;

class ChatAiServices
{
    protected $client;
    protected $config;
    protected $parsedown;

    public function __construct()
    {
        $this->client = new Client();
        $this->config = config('services');
        $this->parsedown = new Parsedown();
        $this->parsedown->setSafeMode(true);
    }


    protected function parseResponse(string $markdown): string
    {
        // Step 1: Convert markdown to HTML
        $html = $this->parsedown->text($markdown);

        // Step 2: Load into DOMDocument
        libxml_use_internal_errors(true);
        $doc = new \DOMDocument();
        $doc->loadHTML('<?xml encoding="UTF-8">' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Allowed tags
        $allowedTags = ['p', 'div', 'br', 'strong', 'em', 'ul', 'ol', 'li', 'code', 'pre', 'blockquote', 'a', 'img', 'table', 'tr', 'td', 'th', 'thead', 'tbody', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'span', 'b', 'i', 'u', 'hr'];

        // Step 3: Strip disallowed tags
        $stripTags = function (\DOMNode $node) use (&$stripTags, $allowedTags) {
            if ($node instanceof \DOMElement && !in_array($node->tagName, $allowedTags)) {
                $node->parentNode->removeChild($node);
                return;
            }
            foreach (iterator_to_array($node->childNodes) as $child) {
                $stripTags($child);
            }
        };
        $stripTags($doc);

        // Step 4: Format tables
        $tables = $doc->getElementsByTagName('table');
        foreach ($tables as $table) {
            $table->setAttribute('class', 'table table-striped table-bordered');

            // Wrap in .table-responsive
            $wrapper = $doc->createElement('div');
            $wrapper->setAttribute('class', 'table-responsive');
            $table->parentNode->replaceChild($wrapper, $table);
            $wrapper->appendChild($table);

            // Ensure <tbody>
            $hasTbody = false;
            foreach ($table->childNodes as $child) {
                if ($child instanceof \DOMElement && $child->tagName === 'tbody') {
                    $hasTbody = true;
                    break;
                }
            }
            if (!$hasTbody) {
                $tbody = $doc->createElement('tbody');
                while ($table->firstChild) {
                    $tbody->appendChild($table->firstChild);
                }
                $table->appendChild($tbody);
            }

            // Format cells
            foreach (['td', 'th'] as $tag) {
                $cells = $table->getElementsByTagName($tag);
                foreach ($cells as $cell) {
                    $content = trim($cell->textContent);
                    $cell->nodeValue = ($content === '' || $content === '[blank]') ? "\u{00A0}" : $content;
                    $cell->setAttribute('class', 'align-middle');
                }
            }
        }

        // Step 5: Add Bootstrap spacing
        $html = $doc->saveHTML();
        $html = str_replace(['<p>', '<div>'], ['<p class="mb-1">', '<div class="mb-1">'], $html);

        // Step 6: Clean up formatting
        $html = preg_replace('/\.(?=[A-Z])/', '. ', $html); // Add space after periods if followed by capital
        $html = preg_replace('/\s+/', ' ', $html); // Collapse whitespace
        $html = preg_replace('/\s*<br\s*\/?>\s*/i', '<br>', $html); // Normalize <br>
        $html = preg_replace('/(<br\s*\/?>\s*){2,}/i', '<br>', $html); // Collapse multiple <br>

        return $html;
    }


    public function generateText(string $model, string $prompt, array $params = []): array
    {
        try {
            switch (strtolower($model)) {
                case 'chatgpt':
                case 'gpt-4':
                    return $this->generateGptResponse($model, $params);
                case 'gemini':
                    return $this->generateGiminiResponse($prompt, $params);
                case 'grok':
                    return $this->generateGrokResponse($prompt, $params);
                case 'claude':
                case 'anthropic':
                    return $this->generateAnthropicResponse($prompt, $params);
                default:
                    throw new Exception('Invalid AI model specified.');
            }
        } catch (Exception $e) {
            Log::error('AI Generation Error: ' . $e->getMessage());
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    public function generateGptResponse(string $model, array $params): array
    {
        try {
            $maxTokens = max((int)($params['max_output_tokens'] ?? 2048), 16);

            $response = Http::withToken(env('OPENAI_API_KEY'))
                ->post('https://api.openai.com/v1/responses', [
                    'model' => $model,
                    'input' => $params['input'] ?? [],
                    'text' => ['format' => ['type' => 'text']],
                    'reasoning' => new \stdClass(),
                    'tools' => [],
                    'temperature' => (float)($params['temperature'] ?? 1.0),
                    'top_p' => (float)($params['top_p'] ?? 1.0),
                    'max_output_tokens' => $maxTokens,
                    'store' => true,
                ]);

            $responseBody = $response->json();
            $content = $responseBody['output'][0]['content'][0]['text'] ?? 'No response text available';

            // Parse the response
            $parsedContent = $this->parseResponse($content);

            return [
                'success' => true,
                'response' => $parsedContent,
                'raw' => $content,
            ];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
            Log::error('AIService Client Error: ' . $e->getMessage(), [
                'status' => $e->getResponse()->getStatusCode(),
                'response' => $responseBody,
            ]);

            return [
                'success' => false,
                'error' => $responseBody['error']['message'] ?? $e->getMessage(),
            ];
        } catch (Exception $e) {
            Log::error('AIService General Error: ' . $e->getMessage());

            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    public function generateGiminiResponse(string $prompt, array $params): array
    {
        $maxTokens = max((int)($params['max_output_tokens'] ?? 256), 16);
        $model = $params['model'] ?? 'gemini-2.0-flash';

        try {
            $response = Http::post(
                "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key=" . env('GEMINI_API_KEY'),
                [
                    'contents' => [
                        [
                            'role' => 'user',
                            'parts' => [
                                ['text' => $prompt],
                            ],
                        ]
                    ],
                    'generationConfig' => [
                        'temperature' => (float)($params['temperature'] ?? 0.7),
                        'topP' => (float)($params['top_p'] ?? 1.0),
                        'maxOutputTokens' => $maxTokens,
                        'responseMimeType' => 'text/plain',
                    ],
                ]
            );

            $responseBody = $response->json();
            $content = $responseBody['candidates'][0]['content']['parts'][0]['text'] ?? 'No response text available';

            // Pre-process table content before parsing
            $content = $this->preprocessTableContent($content);

            // Parse the response
            $parsedContent = $this->parseResponse($content);

            return [
                'success' => true,
                'response' => $parsedContent,
                'raw' => $content,
            ];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
            Log::error('AIService Client Error: ' . $e->getMessage(), [
                'status' => $e->getResponse()->getStatusCode(),
                'response' => $responseBody,
            ]);

            return [
                'success' => false,
                'error' => $responseBody['error']['message'] ?? $e->getMessage(),
            ];
        } catch (\Exception $e) {
            Log::error('AIService General Error: ' . $e->getMessage());

            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    protected function preprocessTableContent(string $content): string
    {
        // If the content already contains a markdown table, return it as is
        if (strpos($content, '| ---') !== false || strpos($content, '|:---') !== false) {
            return $content;
        }

        // Convert ASCII table to markdown table
        $lines = explode("\n", $content);
        $tableLines = [];
        $inTable = false;
        $headers = [];
        $rows = [];

        foreach ($lines as $line) {
            $line = trim($line);

            // Check if line is part of a table
            if (strpos($line, '|') !== false || strpos($line, '+') !== false) {
                if (!$inTable) {
                    $inTable = true;
                }

                // Skip separator lines
                if (strpos($line, '+') !== false) {
                    continue;
                }

                // Process table line
                $cells = array_map('trim', explode('|', $line));
                $cells = array_filter($cells); // Remove empty cells

                if (empty($headers)) {
                    $headers = $cells;
                } else {
                    $rows[] = $cells;
                }
            } else {
                if ($inTable) {
                    // Convert collected table data to markdown
                    if (!empty($headers) && !empty($rows)) {
                        $tableLines[] = '| ' . implode(' | ', $headers) . ' |';
                        $tableLines[] = '| ' . implode(' | ', array_fill(0, count($headers), '---')) . ' |';
                        foreach ($rows as $row) {
                            $tableLines[] = '| ' . implode(' | ', $row) . ' |';
                        }
                    }
                    $inTable = false;
                    $headers = [];
                    $rows = [];
                }
                $tableLines[] = $line;
            }
        }

        // Handle any remaining table data
        if ($inTable && !empty($headers) && !empty($rows)) {
            $tableLines[] = '| ' . implode(' | ', $headers) . ' |';
            $tableLines[] = '| ' . implode(' | ', array_fill(0, count($headers), '---')) . ' |';
            foreach ($rows as $row) {
                $tableLines[] = '| ' . implode(' | ', $row) . ' |';
            }
        }

        return implode("\n", $tableLines);
    }

    public function generateGrokResponse(string $prompt, array $params): array
    {
        try {
            $model = $params['model'] ?? 'grok-3';
            $temperature = (float)($params['temperature'] ?? 0.7);
            $stream = $params['stream'] ?? false;

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('XAI_API_KEY'),
            ])->post('https://api.x.ai/v1/chat/completions', [
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ]
                ],
                'model' => $model,
                'stream' => $stream,
                'temperature' => $temperature,
            ]);

            $responseBody = $response->json();
            $content = $responseBody['choices'][0]['message']['content'] ?? 'No response received.';

            // Parse the response
            $parsedContent = $this->parseResponse($content);

            return [
                'success' => true,
                'response' => $parsedContent,
                'raw' => $content,
            ];
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
            Log::error('XAI Client Error: ' . $e->getMessage(), [
                'status' => $e->getResponse()->getStatusCode(),
                'response' => $responseBody,
            ]);

            return [
                'success' => false,
                'error' => $responseBody['error']['message'] ?? $e->getMessage(),
            ];
        } catch (\Exception $e) {
            Log::error('XAI General Error: ' . $e->getMessage());

            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    public function generateAnthropicResponse(string $prompt, array $params): array
    {
        try {
            $maxTokens = max((int)($params['max_output_tokens'] ?? 2048), 16);
            $model = 'claude-3-5-haiku-20241022';

            $response = Http::withHeaders([
                'anthropic-version' => '2023-06-01',
                'content-type' => 'application/json',
                'x-api-key' => env('ANTHROPIC_API_KEY'),
            ])->post('https://api.anthropic.com/v1/messages', [
                'model' => $model,
                'max_tokens' => $maxTokens,
                'temperature' => (float)($params['temperature'] ?? 1.0),
                'top_p' => (float)($params['top_p'] ?? 1.0),
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ]
                ],
            ]);

            $responseBody = $response->json();
            $content = $responseBody['content'][0]['text'] ?? 'No response text available';

            // Parse the response
            $parsedContent = $this->parseResponse($content);

            return [
                'success' => true,
                'response' => $parsedContent,
                'raw' => $content,
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }
    public function generateDeepseekResponse(string $prompt)
    {
        try {
            $model = 'deepseek/deepseek-chat-v3-0324:free';

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
            ])->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => $model,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
            ]);
            return $this->parseResponse($response->json()['choices'][0]['message']['content']);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => 'Exception: ' . $e->getMessage(),
            ];
        }
    }
}
