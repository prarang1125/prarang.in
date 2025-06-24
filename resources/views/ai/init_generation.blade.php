<x-layout.main.base>
    <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <style>
        /* Span Tag */
        .list-group .list-group-item span {
            color: #020202 !important;
        }
    </style>
    <div class="action-buttons-corner" style="top: 92vh;height: 100px !important;">
        <button class=" action-button print" style="height: 42px !important;" onclick="printResponses()" title="Print">
            {{-- <i class="fas fa-print"></i> --}}
            Print
        </button>
        <form id="shareForm" action="{{ route('share.store') }}" method="POST" style="display: inline;">
            @csrf
            <input type="hidden" name="prompt" value="{{ $prompt }}">
            @if(isset($content))
            <input type="hidden" name="uman_response" value="{{ $content }}">
            @endif
            @if(isset($gptResponse))
            <input type="hidden" name="gpt_response" value="{{ $gptResponse }}">
            @endif
            @if(isset($geminiResponse))
            <input type="hidden" name="gemini_response" value="{{ $geminiResponse }}">
            @endif
            @if(isset($claudeResponse))
            <input type="hidden" name="claude_response" value="{{ $claudeResponse }}">
            @endif
            @if(isset($grokResponse))
            <input type="hidden" name="grok_response" value="{{ $grokResponse }}">
            @endif
            @if(isset($deepseekResponse))
            <input type="hidden" name="deepseek_response" value="{{ $deepseekResponse }}">
            @endif
            @if(isset($metaResponse))
            <input type="hidden" name="meta_response" value="{{ $metaResponse }}">
            @endif
            <button type="button" onclick="handleShare()" class="action-button share" title="Share">
                {{-- <i class="fas fa-share-alt"></i> --}}
                Share
            </button>
        </form>
    </div>

    <div class="section-title">Comparison Report :{{ 
        (isset($content) && !empty(trim($content)) ? 1 : 0) + 
        (isset($gptResponse) && !empty(trim($gptResponse)) ? 1 : 0) + 
        (isset($metaResponse) && !empty(trim($metaResponse)) ? 1 : 0) + 
        (isset($deepseekResponse) && !empty(trim($deepseekResponse)) ? 1 : 0) + 
        (isset($geminiResponse) && !empty(trim($geminiResponse)) ? 1 : 0) + 
        (isset($claudeResponse) && !empty(trim($claudeResponse)) ? 1 : 0) 
    }} A.I. Models</div>

    <div class="info-box">
        <div class="timestamp">
            <strong>Result Time (GMT):</strong> {{ now('UTC')->format('d-m-Y') }} | {{ now('UTC')->format('H:i:s') }}
        </div>
        <div class="model-section">
            <div class="model-links-container">
                <!-- <div class="model-header">
                    <span class="model-label">AI-Models:</span>
                </div> -->
                <div class="model-links-wrapper" style="display: flex; flex-wrap: nowrap; overflow-x: auto; white-space: nowrap;">
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
                            'grok' => 'grokResponse'
                        ];
                        
                        $displayedLinks = array();
                        foreach ($model as $modelName) {
                            $varName = $responseTypes[$modelName] ?? null;
                            if ($varName) {
                                $responseContent = $varName === 'content' ? $content ?? '' : $$varName ?? '';
                                
                                if (!empty(trim($responseContent))) {
                                    $modelCount++;
                                    $displayedLinks[] = '<a class="model-link" href="javascript:void(0);" data-container="' . $modelName . '-container" onclick="window.scrollToResponse(\'' . $modelName . '-container\')">(' . chr(96 + $modelCount) . ')' . ($modelName === 'meta' ? 'Meta Llama' : ucfirst($modelName)) . '</a>';
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
        $count=1;
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
            'meta' => 'https://t0.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://ai.meta.com/&size=256',
            'upmana' => null
        ];

        $modelFullNames = [
            'chatgpt' => 'ChatGPT',
            'gemini' => 'Gemini',
            'claude' => 'Claude',
            'grok' => 'Grok',
            'deepseek' => 'Deepseek',
            'meta' => 'Meta Llama',
            'upmana' => 'UPMANA - Knowledge By Comparision'
        ];

        $responseTypes = [
            'meta' => 'metaResponse', 
            'gemini' => 'geminiResponse', 
            'deepseek' => 'deepseekResponse', 
            'chatgpt' => 'gptResponse', 
            'upmana' => 'content', 
            'claude' => 'claudeResponse', 
            'grok' => 'grokResponse'
        ];
        @endphp

        @foreach($model as $modelName)
            @php
            $varName = $responseTypes[$modelName] ?? null;
            $responseContent = $varName === 'content' ? $content ?? '' : $$varName ?? '';
            @endphp

            @if(!empty(trim($responseContent)))
                @if($modelName === 'upmana' && $upmanaPosition === 'selected')
                    <div class="response-container" id="content-container">
                        <div class="response-content">
                            <div class="ai-name">({{ chr(96 + $count++) }}) {{ $modelFullNames[$modelName] }}</div>
                            <div class="prompt-box upman">
                                <strong>Prompt:</strong> {{ $prompt }}
                            </div>
                            <div class="p-3 ai-response h-100">
                                {!! $responseContent !!}
                            </div>
                        </div>
                    </div>
                @elseif($modelName !== 'upmana')
                    <div class="response-container" id="{{ $modelName }}-container">
                        @if($modelLogos[$modelName])
                            <img src="{{ $modelLogos[$modelName] }}" alt="{{ $modelFullNames[$modelName] }} Logo" class="ai-logo">
                        @endif
                        <div class="response-content">
                            <div class="ai-name">({{ chr(96 + $count++) }}) {{ $modelFullNames[$modelName] }}</div>
                            <div class="prompt-box {{ $modelName }}">
                                <strong>Prompt:</strong> {{ $prompt }}
                            </div>
                            <div class="p-3 ai-response h-100">
                                {!! $responseContent !!}
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach

        @if($upmanaPosition === 'last' && isset($content))
            <div class="response-container" id="content-container">
                <div class="response-content">
                    <div class="ai-name">({{ chr(96 + $count++) }}) {{ $modelFullNames['upmana'] }}</div>
                    <div class="prompt-box upman">
                        <strong>Prompt:</strong> {{ $prompt }}
                    </div>
                    <div class="p-3 ai-response h-100">
                        {!! $content !!}
                    </div>
                </div>
            </div>
        @endif

        @if(empty($model))
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
