<x-layout.main.base>
    <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <style>
        .list-group .list-group-item span {
            color: #020202 !important;
        }

        /* HTML Parser Styles */
        .ai-response h3 {
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
            font-weight: bold;
        }

        .ai-response h1,
        .ai-response h2,
        .ai-response h3,
        .ai-response h4,
        .ai-response h5,
        .ai-response h6 {
            margin-top: 20px;
            margin-bottom: 15px;
            color: #333;
            font-weight: 600;
        }

        .ai-response h1 {
            font-size: 28px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
        }

        .ai-response h2 {
            font-size: 24px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 8px;
        }

        .ai-response h3 {
            font-size: 20px;
        }

        .ai-response h4 {
            font-size: 18px;
        }

        .ai-response h5 {
            font-size: 16px;
        }

        .ai-response h6 {
            font-size: 14px;
        }

        .ai-response ul {
            margin-left: 30px;
            margin-bottom: 15px;
            list-style-type: disc;
        }

        .ai-response ol {
            margin-left: 30px;
            margin-bottom: 15px;
            list-style-type: decimal;
        }

        .ai-response li {
            margin-bottom: 8px;
            line-height: 1.6;
            color: #333;
        }

        .ai-response table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .ai-response table th {
            background: linear-gradient(135deg, #e4e7eb 0%, #e7eaec 100%);
            color: black;
            font-weight: bold;
            padding: 15px;
            text-align: left;
            border: 1px solid #2e3033;
        }

        .ai-response table td {
            padding: 12px 15px;
            border: 1px solid #474343;
            text-align: left;
        }

        .ai-response table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .ai-response table tr:hover {
            background-color: #f0f0f0;
        }

        .ai-response code {
            background-color: #f5f5f5;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            color: #d73a49;
            font-size: 13px;
        }

        .ai-response pre {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            margin: 15px 0;
            border-left: 4px solid #007bff;
        }

        .ai-response pre code {
            background-color: transparent;
            padding: 0;
            color: #333;
            font-size: 13px;
        }

        .ai-response a {
            color: #007bff;
            text-decoration: none;
            border-bottom: 1px solid #007bff;
        }

        .ai-response a:hover {
            background-color: #e7f0ff;
            border-radius: 2px;
        }

        .ai-response p {
            margin-bottom: 12px;
            line-height: 1.7;
            color: #333;
        }

        .ai-response strong {
            font-weight: 600;
            color: #000;
        }

        .ai-response em {
            font-style: italic;
            color: #555;
        }

        .ai-response blockquote {
            border-left: 4px solid #007bff;
            padding-left: 15px;
            margin: 20px 0;
            color: #666;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 3px;
        }

        .ai-response blockquote p {
            margin: 0;
        }
    </style>
    <div class="action-buttons-corner" style="top: 92vh;height: 100px !important;">
        <button class=" action-button print" style="height: 42px !important;" onclick="printResponses()" title="Print">
            {{ $label['print'] }}
        </button>
        <form id="shareForm" action="{{ route('share.store') }}" method="POST" style="display: inline;">
            @csrf
            <input type="hidden" name="prompt" value="{{ $prompt }}">
            @if (isset($content))
                <input type="hidden" name="upmana_response" value="{{ $content }}">
            @endif
            @if (isset($gptResponse))
                <input type="hidden" name="gpt_response" value="{{ $gptResponse }}">
            @endif
            @if (isset($geminiResponse))
                <input type="hidden" name="gemini_response" value="{{ $geminiResponse }}">
            @endif
            @if (isset($claudeResponse))
                <input type="hidden" name="claude_response" value="{{ $claudeResponse }}">
            @endif
            @if (isset($grokResponse))
                <input type="hidden" name="grok_response" value="{{ $grokResponse }}">
            @endif
            @if (isset($deepseekResponse))
                <input type="hidden" name="deepseek_response" value="{{ $deepseekResponse }}">
            @endif
            @if (isset($perplexityResponse))
                <input type="hidden" name="perplexity_response" value="{{ $perplexityResponse }}">
            @endif
            @if (isset($metaResponse))
                <input type="hidden" name="meta_response" value="{{ $metaResponse }}">
            @endif
            <button type="button" onclick="handleShare()" class="action-button share" title="share">
                {{-- <i class="fas fa-share-alt"></i> --}}
                {{ $label['share'] }}
            </button>
        </form>
    </div>

    <div class="section-title">
        {{ $label['compare_share_report'] }}:{{ (isset($content) && !empty(trim($content)) ? 1 : 0) +
            (isset($gptResponse) && !empty(trim($gptResponse)) ? 1 : 0) +
            (isset($metaResponse) && !empty(trim($metaResponse)) ? 1 : 0) +
            (isset($deepseekResponse) && !empty(trim($deepseekResponse)) ? 1 : 0) +
            (isset($geminiResponse) && !empty(trim($geminiResponse)) ? 1 : 0) +
            (isset($claudeResponse) && !empty(trim($claudeResponse)) ? 1 : 0) +
            (isset($grokResponse) && !empty(trim($grokResponse)) ? 1 : 0) +
            (isset($perplexityResponse) && !empty(trim($perplexityResponse)) ? 1 : 0) }}
        {{ $label['ai_modal_lable'] }}</div>

    <div class="info-box">
        <div class="timestamp">
            <strong>{{ $label['result_time_lable'] }}:</strong> {{ now('UTC')->format('d-m-Y') }} |
            {{ now('UTC')->format('H:i:s') }}
        </div>
        <div class="model-section">
            <div class="model-links-container">
                <!-- <div class="model-header">
                    <span class="model-label">AI-Models:</span>
                </div> -->
                <div class="model-links-wrapper"
                    style="display: flex; flex-wrap: nowrap; overflow-x: auto; white-space: nowrap;">
                    <div class="model-links-row" style="display: flex; gap: 10px; align-items: center;">
                        <?php
                        $modelCount = 0;
                        $responseTypes = [
                            'meta' => 'metaResponse',
                            'gemini' => 'geminiResponse',
                            'deepseek' => 'deepseekResponse',
                            'chatgpt' => 'gptResponse',
                            'upmana' => 'content',
                            'claude' => 'claudeResponse',
                            'grok' => 'grokResponse',
                            'perplexity' => 'perplexityResponse',
                        ];
                        
                        $displayedLinks = [];
                        foreach ($model as $modelName) {
                            $varName = $responseTypes[$modelName] ?? null;
                            if ($varName) {
                                $responseContent = $varName === 'content' ? $content ?? '' : $$varName ?? '';
                        
                                if (!empty(trim($responseContent))) {
                                    $modelCount++;
                                    $displayedLinks[] = '<a class="model-link" href="javascript:void(0);" data-container="' . ($modelName === 'upmana' ? 'upmana-container' : $modelName . '-container') . '" onclick="window.scrollToResponse(\'' . ($modelName === 'upmana' ? 'upmana-container' : $modelName . '-container') . '\')">(' . chr(96 + $modelCount) . ')' . ($modelName === 'meta' ? 'Meta Llama' : ucfirst($modelName)) . '</a>';
                                }
                            }
                        }
                        
                        echo implode(' ', $displayedLinks);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-row">
        @php
            $count = 1;
            $upmanaPosition = 'last';

            // Determine Upmana's position
if (in_array('upmana', $model)) {
    $upmanaPosition = 'selected';
}

$modelLogos = [
    'chatgpt' => 'https://upload.wikimedia.org/wikipedia/commons/0/04/ChatGPT_logo.svg',
    'gemini' => 'https://upload.wikimedia.org/wikipedia/commons/8/8a/Google_Gemini_logo.svg',
    'claude' => 'https://upload.wikimedia.org/wikipedia/commons/7/78/Anthropic_logo.svg',
    'grok' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/X_Logo.svg/2048px-X_Logo.svg.png',
    'deepseek' => 'https://chat.deepseek.com/favicon.svg',
    'meta' =>
        'https://t0.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://ai.meta.com/&size=256',
    'upmana' => asset('assets/ai/images/byr-btn.png'),
    'perplexity' =>
        'https://framerusercontent.com/images/gcMkPKyj2RX8EOEja8A1GWvCb7E.jpg?width=2000&height=2000', // Replace with actual logo URL
];

$modelFullNames = [
    'chatgpt' => 'ChatGPT',
    'gemini' => 'Gemini',
    'claude' => 'Claude',
    'grok' => 'Grok',
    'deepseek' => 'Deepseek',
    'meta' => 'Meta Llama',
    'upmana' => 'UPMANA - Knowledge By Comparision',
    'perplexity' => 'Perplexity AI',
];

$responseTypes = [
    'meta' => 'metaResponse',
    'gemini' => 'geminiResponse',
    'deepseek' => 'deepseekResponse',
    'chatgpt' => 'gptResponse',
    'upmana' => 'content',
    'claude' => 'claudeResponse',
    'grok' => 'grokResponse',
    'perplexity' => 'perplexityResponse',
            ];
        @endphp

        @foreach ($model as $modelName)
            @php
                $varName = $responseTypes[$modelName] ?? null;
                $responseContent = $varName === 'content' ? $content ?? '' : $$varName ?? '';
            @endphp

            @if (!empty(trim($responseContent)))
                @if ($modelName === 'upmana' && $upmanaPosition === 'selected')
                    <div class="response-container" id="content-container">
                        <div class="response-content">
                            <div class="ai-name">({{ chr(96 + $count++) }}) {{ $modelFullNames[$modelName] }}</div>
                            <div class="prompt-box upman">
                                <strong>{{ $label['prompt'] }}:</strong> {{ $prompt }}
                            </div>
                            <div class="p-3 ai-response h-100">
                                {!! $responseContent !!}
                            </div>
                        </div>
                    </div>
                @elseif($modelName !== 'upmana')
                    <div class="response-container" id="{{ $modelName }}-container">
                        @if ($modelLogos[$modelName])
                            <img src="{{ $modelLogos[$modelName] }}" alt="{{ $modelFullNames[$modelName] }} Logo"
                                class="ai-logo">
                        @endif
                        <div class="response-content">
                            <div class="ai-name">({{ chr(96 + $count++) }}) {{ $modelFullNames[$modelName] }}</div>
                            <div class="prompt-box {{ $modelName }}">
                                <strong>{{ $label['prompt'] }}:</strong> {{ $prompt }}
                            </div>
                            <div class="p-3 ai-response h-100">
                                {!! $responseContent !!}
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach

        @if ($upmanaPosition === 'last' && isset($content))
            <div class="response-container" id="content-container">
                <div class="response-content">
                    <div class="ai-name">({{ chr(96 + $count++) }}) {{ $modelFullNames['upmana'] }}</div>
                    <div class="prompt-box upman">
                        <strong>{{ $label['prompt'] }}:</strong> {{ $prompt }}
                    </div>
                    <div class="p-3 ai-response h-100">
                        {!! $content !!}
                    </div>
                </div>
            </div>
        @endif

        @if (empty($model))
            <div class="error-container">
                No response available for the selected model.
            </div>
        @endif
    </div>

    <div class="share-modal" id="shareModal">
        <div class="share-content">
            <button class="close-modal" onclick="hideShareModal()">
                <i class="fas fa-times"></i>
            </button>
            <h2>Share Response</h2>

            <div class="share-link">
                <input type="text" id="shareLink" value="" readonly>
                <button onclick="copyShareLink()" class="copy-button">
                    <i class="fas fa-copy"></i> Copy
                </button>
            </div>
        </div>
    </div>


    <script>
        // Define scrollToResponse globally
        window.scrollToResponse = function(containerId) {
            console.log('Attempting to scroll to container:', containerId);

            // Special handling for Upmana response
            if (containerId === 'upmana-container') {
                containerId = 'content-container';
            }

            const container = document.getElementById(containerId);

            if (!container) {
                console.warn('Container not found:', containerId);
                alert("That response is not available.");
                return;
            }

            container.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        };

        document.addEventListener('DOMContentLoaded', function() {
            // Attach click event listener to model links
            document.querySelectorAll('.model-link').forEach(link => {
                link.addEventListener('click', function(event) {
                    const containerId = this.getAttribute('data-container');
                    if (containerId) {
                        window.scrollToResponse(containerId);
                        event.preventDefault();
                    }
                });
            });

            // Wrap all tables in a container for proper scrolling
            document.querySelectorAll('.ai-response table').forEach(table => {
                const container = document.createElement('div');
                container.className = 'table-container';
                table.parentNode.insertBefore(container, table);
                container.appendChild(table);
            });

            // Ensure parallel processing is initialized
            if (typeof enableParallelProcessing === 'function') {
                enableParallelProcessing('ai-compare-form');
            }
        });
    </script>

</x-layout.main.base>
