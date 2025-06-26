<x-layout.main.base>

<div class="action-buttons-corner">
    <button class="action-button print" onclick="printResponses()" title="Print">
        <!-- <i class="fas fa-print"></i> -->
        Print
    </button>
</div>


<div class="section-title">Comparison Report :{{ (isset($content) ? 1 : 0) + (isset($gptResponse) ? 1 : 0) + (isset($geminiResponse) ? 1 : 0) +  (isset($deepSeekResponse) ? 1 : 0) +  (isset($metaResponse) ? 1 : 0) +(isset($claudeResponse) ? 1 : 0) }} A.I. Models</div>

<div class="info-box">
    <div class="timestamp">
        <strong>Result Time (GMT):</strong> {{ $created_at }}
    </div>
    <div class="model-section">
        <div class="model-links-container">
            <div class="model-header">
                <span class="model-label">AI-Models:</span>
            </div>
            <div class="model-links-wrapper">
                <div class="model-links-row">
                    @php
                    $modelCount = 0;
                    @endphp
                    @if(isset($umanResponse))
                    @php $modelCount++; @endphp
                    <a class="model-link" onclick="scrollToResponse('upmana-container')">({{ chr(96 + $modelCount) }})Upmana</a>
                    @endif

                    @if(isset($gptResponse))
                    @php $modelCount++; @endphp
                    <a class="model-link" onclick="scrollToResponse('gpt-container')">({{ chr(96 + $modelCount) }})ChatGPT</a>
                    @endif

                    @if(isset($geminiResponse))
                    @php $modelCount++; @endphp
                    <a class="model-link" onclick="scrollToResponse('gemini-container')">({{ chr(96 + $modelCount) }})Gemini</a>
                    @endif

                    @if(isset($claudeResponse))
                    @php $modelCount++; @endphp
                    <a class="model-link" onclick="scrollToResponse('claude-container')">({{ chr(96 + $modelCount) }})Claude</a>
                    @endif

                    @if(isset($deepSeekResponse))
                    @php $modelCount++; @endphp
                    <a class="model-link" onclick="scrollToResponse('deepseek-container')">({{ chr(96 + $modelCount) }})DeepSeek</a>
                    @endif

                    @if(isset($metaResponse))
                    @php $modelCount++; @endphp
                    <a class="model-link" onclick="scrollToResponse('meta-container')">({{ chr(96 + $modelCount) }})Meta</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <h6 class="section-prompt"><strong>Prompt:</strong> {{ ($prompt) }}</h6> -->

<div class="container-row">
    @php
    $count=1;
    @endphp
    @if(isset($umanResponse))
    <div class="response-container" id="upmana-container">
        <div class="response-content">
            <div class="ai-name">({{ chr(96 + $count++) }}) UPMANA - Knowledge By Comparison</div>
            <div class="prompt-box upman">
                <strong>Prompt:</strong> {{ $prompt }}
            </div>
            <div class="ai-response p-3 h-100">
                {!! $umanResponse !!}
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
            <div class="ai-response p-3 h-100">
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
            <div class="ai-response p-3 h-100">
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
            <div class="ai-response p-3 h-100">
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
            <div class="ai-response p-3 h-100">
                {!! $grokResponse !!}
            </div>
        </div>
    </div>
    @endif
    @if(isset($deepSeekResponse))
    <div class="response-container" id="deepseek-container">
        <img src="https://chat.deepseek.com/favicon.svg" alt="deepseek Logo" class="ai-logo">
        <div class="response-content">
            <div class="ai-name">({{ chr(96 + $count++) }}) Deepseek</div>
            <div class="ai-response p-3 h-100">
                {!! $deepSeekResponse !!}
            </div>
        </div>
    </div>
    @endif
    @if(isset($metaResponse))
    <div class="response-container" id="meta-container">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/X_Logo.svg/2048px-X_Logo.svg.png" alt="meta Logo" class="ai-logo">
        <div class="response-content">
            <div class="ai-name">({{ chr(96 + $count++) }}) Meta</div>
            <div class="ai-response p-3 h-100">
                {!! $metaResponse !!}
            </div>
        </div>
    </div>
    @endif

</div>

<div class="share-modal" id="shareModal">
    <div class="share-content">
        <div class="share-link">
            <input type="text" id="shareLink" value="" readonly>
            <button onclick="copyShareLink()" class="copy-button">
                <!-- <i class=" fa-copy"></i> -->
            </button>
        </div>
    </div>
</div>


<script>
    function scrollToResponse(containerId) {
    const container = document.getElementById(containerId);
    console.log(container);
    if (container) {
        console.log("Scrolling to:", containerId);
        container.scrollIntoView({ 
            behavior: 'smooth', 
            block: 'start' 
        });
    } else {
        console.warn("Element not found:", containerId);
    }
}

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

</x-layout.main.base>
