<x-layout.main.base>
    <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
        <script src="{{ asset('assets/ai/js/ai-response.js') }}"></script>
    <style>
        .list-group .list-group-item span {
            color: #020202 !important;
        }
        .response-container.loading .ai-response {
            text-align: center;
        }
    </style>

    <div class="action-buttons-corner" style="top: 92vh; height: 100px !important;">
        <button class="action-button print" style="height: 42px !important;" onclick="printResponses()" title="Print">
            Print
        </button>
        <form id="shareForm" action="{{ route('share.store') }}" method="POST" style="display: inline;">
            @csrf
            <input type="hidden" name="prompt" value="{{ $prompt }}">
            <input type="hidden" name="uman_response" id="uman_response">
            <input type="hidden" name="gpt_response" id="gpt_response">
            <input type="hidden" name="gemini_response" id="gemini_response">
            <input type="hidden" name="claude_response" id="claude_response">
            <input type="hidden" name="grok_response" id="grok_response">
            <input type="hidden" name="deepseek_response" id="deepseek_response">
            <input type="hidden" name="meta_response" id="meta_response">
            <button type="button" onclick="handleShare()" class="action-button share" title="Share">
                Share
            </button>
        </form>
    </div>

    <div class="section-title">Comparison Report: <span id="model-count">0</span> A.I. Models</div>

    <div class="info-box">
        <div class="timestamp">
            <strong>Result Time (GMT):</strong> {{ now('UTC')->format('d-m-Y') }} | {{ now('UTC')->format('H:i:s') }}
        </div>
        <div class="model-section">
            <div class="model-links-container">
                <div class="model-header">
                    <span class="model-label">AI-Models:</span>
                </div>
                <div class="model-links-wrapper" id="model-links-wrapper"></div>
            </div>
        </div>
    </div>

    <div class="container-row" id="container-row"></div>

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

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Wrap tables in a container for scrolling
            document.querySelectorAll('.ai-response table').forEach(table => {
                const container = document.createElement('div');
                container.className = 'table-container';
                table.parentNode.insertBefore(container, table);
                container.appendChild(table);
            });

            // Initialize form for parallel processing
            enableParallelProcessing('ai-compare-form');
        });
    </script>
    @endpush
</x-layout.main.base>
    