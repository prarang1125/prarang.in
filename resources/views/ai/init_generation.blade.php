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

    <div class="section-title">Comparison Report :{{ (isset($content) ? 1 : 0) + (isset($gptResponse) ? 1 : 0) + (isset($geminiResponse) ? 1 : 0) + (isset($claudeResponse) ? 1 : 0) }} A.I. Models</div>

    <div class="info-box">
        <div class="timestamp">
            <strong>Result Time (GMT):</strong> {{ now('UTC')->format('d-m-Y') }} | {{ now('UTC')->format('H:i:s') }}
        </div>
        <div class="model-section">
            <div class="model-links-container">
                <div class="model-header">
                    <span class="model-label">AI-Models:</span>
                </div>
                <div class="model-links-wrapper">
                    <div class="model-links-row first-row">
                        @php
                        $modelCount = 0;
                        @endphp
                        @if(isset($content))
                        @php $modelCount++; @endphp
                        <a class="model-link" onclick="scrollToResponse('content-container')">({{ chr(96 + $modelCount) }})Prarang-Upmana</a>
                        @endif

                        @if(isset($gptResponse))
                        @php $modelCount++; @endphp
                        <a class="model-link" onclick="scrollToResponse('gpt-container')">({{ chr(96 + $modelCount) }})Microsoft-ChatGPT</a>
                        @endif

                    </div>
                    <div class="model-links-row">
                        @if(isset($geminiResponse))
                        @php $modelCount++; @endphp
                        <a class="model-link" onclick="scrollToResponse('gemini-container')">({{ chr(96 + $modelCount) }})Google-Gemini</a>
                        @endif
                        @if(isset($claudeResponse))
                        @php $modelCount++; @endphp
                        <a class="model-link" onclick="scrollToResponse('claude-container')">({{ chr(96 + $modelCount) }})Claude-Anthropic</a>
                        @endif

                    </div>
                    <div class="model-links-row">

                        @if(isset($deepseekResponse))
                        @php $modelCount++; @endphp
                        <a class="model-link" onclick="scrollToResponse('deepseek-container')">({{ chr(96 + $modelCount) }})Deepseek-High Flyer</a>
                        @endif

                        @if(isset($metaResponse))
                        @php $modelCount++; @endphp
                        <a class="model-link" onclick="scrollToResponse('meta-container')">({{ chr(96 + $modelCount) }})Meta Llama</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-row">
        @php
        $count=1;
        @endphp
        @if(isset($content))
        <div class="response-container" id="content-container">
            <div class="response-content">
                <div class="ai-name">({{ chr(96 + $count++) }}) UPMANA - Knowledge By Comparision</div>
                <div class="prompt-box upman">
                    <strong>Prompt:</strong> {{ $prompt }}
                </div>
                <div class="p-3 ai-response h-100">
                    {!! $content !!}
                </div>
            </div>
        </div>
        @endif


        @if(isset($gptResponse))
        <div class="response-container" id="gpt-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/ChatGPT_logo.svg" alt="GPT Logo" class="ai-logo">
            <div class="response-content">
                <div class="ai-name">({{ chr(96 + $count++) }}) ChatGPT</div>
                <div class="prompt-box chatgpt">
                    <strong>Prompt:</strong> {{ $prompt }}
                </div>
                <div class="p-3 ai-response h-100">
                    {!! $gptResponse !!}
                </div>
            </div>
        </div>
        @endif

        @if(isset($geminiResponse))
        <div class="response-container" id="gemini-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/8a/Google_Gemini_logo.svg" alt="Google Gemini Logo" class="ai-logo">
            <div class="response-content">
                <div class="ai-name">({{ chr(96 + $count++) }}) Gemini</div>
                <div class="prompt-box gemini">
                    <strong>Prompt:</strong> {{ $prompt }}
                </div>
                <div class="p-3 ai-response h-100">
                    {!! $geminiResponse !!}
                </div>
            </div>
        </div>
        @endif

        @if(isset($claudeResponse))
        <div class="response-container" id="claude-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Anthropic_logo.svg" alt="Anthropic Logo" class="ai-logo">
            <div class="response-content">
                <div class="ai-name">({{ chr(96 + $count++) }}) Claude</div>
                <div class="prompt-box claude">
                    <strong>Prompt:</strong> {{ $prompt }}
                </div>
                <div class="p-3 ai-response h-100">
                    {!! $claudeResponse !!}
                </div>
            </div>
        </div>
        @endif

        @if(isset($grokResponse))
        <div class="response-container" id="grok-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/X_Logo.svg/2048px-X_Logo.svg.png" alt="Grok Logo" class="ai-logo">
            <div class="response-content">
                <div class="ai-name">({{ chr(96 + $count++) }}) Grok</div>
                <div class="prompt-box grok">
                    <strong>Prompt:</strong> {{ $prompt }}
                </div>
                <div class="p-3 ai-response h-100">
                    {!! $grokResponse !!}
                </div>
            </div>
        </div>
        @endif

        @if(isset($deepseekResponse))
        <div class="response-container" id="deepseek-container">
            <img src="https://chat.deepseek.com/favicon.svg" alt="Grok Logo" class="ai-logo">
            <div class="response-content">
                <div class="ai-name">({{ chr(96 + $count++) }}) Deepseek</div>
                <div class="prompt-box grok">
                    <strong>Prompt:</strong> {{ $prompt }}
                </div>
                <div class="p-3 ai-response h-100">
                    {!! $deepseekResponse !!}
                </div>
            </div>
        </div>
        @endif


        @if(isset($metaResponse))
        <div class="response-container" id="meta-container">
            <img src="https://t0.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://ai.meta.com/&size=256" alt="Grok Logo" class="ai-logo">
            <div class="response-content">
                <div class="ai-name">({{ chr(96 + $count++) }}) Meta Llama</div>
                <div class="prompt-box grok">
                    <strong>Prompt:</strong> {{ $prompt }}
                </div>
                <div class="p-3 ai-response h-100">
                    {!! $metaResponse !!}
                </div>
            </div>
        </div>
        @endif

        @if(!isset($gptResponse) && !isset($geminiResponse) && !isset($claudeResponse) && !isset($grokResponse))
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
                    {{-- <i class="fas fa-copy"></i> --}}
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Wrap all tables in a container for proper scrolling
            document.querySelectorAll('.ai-response table').forEach(table => {
                const container = document.createElement('div');
                container.className = 'table-container';
                table.parentNode.insertBefore(container, table);
                container.appendChild(table);
            });
        });
    </script>
    @endpush

</x-layout.main.base>
