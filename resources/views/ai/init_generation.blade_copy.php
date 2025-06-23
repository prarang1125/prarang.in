
<!-- parallel response  -->
<x-layout.main.base>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <style>
        .list-group .list-group-item span { color: #020202 !important; }
        .table-container { overflow-x: auto; }
        .share-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
        }
        .share-content {
            background: white;
            padding: 20px;
            border-radius: 5px;
            position: relative;
        }
        .close-modal {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>

    <!-- Action Buttons -->
    <div class="action-buttons-corner" style="top: 92vh; height: 100px !important;">
        <button class="action-button print" style="height: 42px !important;" onclick="printResponses()" title="Print">Print</button>
        <button class="action-button share" onclick="handleShare()" title="Share">Share</button>
    </div>

    <!-- Section Title -->
    <div class="section-title">Comparison Report: <span id="model-count">0</span> A.I. Models</div>

    <!-- Info Box -->
    <div class="info-box">
        <div class="timestamp">
            <strong>Result Time (GMT):</strong> <span id="result-time">{{ now('UTC')->format('d-m-Y H:i:s') }}</span>
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

    <!-- Prompt and Form -->
    <div class="container">
        <div class="card mb-3 p-4">
            <h2 class="text-xl font-bold mb-2">Enter Your Prompt</h2>
            <textarea id="prompt-input" class="form-control" rows="5" placeholder="Enter your prompt here"></textarea>
            <textarea id="content-source" class="form-control mt-3" rows="5" placeholder="Enter your content (optional)"></textarea>
        </div>
        @include('form-actions')
    </div>

    <!-- Responses -->
    <div id="ai-responses" class="container-row"></div>

    <!-- Share Modal -->
    <div class="share-modal" id="shareModal">
        <div class="share-content">
            <button class="close-modal" onclick="closeShareModal()"><i class="bx bx-x"></i></button>
            <h2>Share Response</h2>
            <div class="share-link">
                <input type="text" id="shareLink" value="" readonly>
                <button onclick="copyShareLink()" class="copy-button"><i class="bx bx-copy"></i> Copy</button>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/marked@4.0.0/lib/marked.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dompurify@2.4.0/dist/purify.min.js"></script>
    <script>
        function scrollToResponse(containerId) {
            const element = document.getElementById(containerId);
            if (element) element.scrollIntoView({ behavior: 'smooth' });
        }

        function printResponses() {
            const responses = document.getElementById('ai-responses');
            if (responses) {
                const printWindow = window.open('', '_blank');
                printWindow.document.write(`
                    <html>
                        <head>
                            <title>AI Comparison Report</title>
                            <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
                            <style>.table-container { overflow-x: auto; } .action-buttons-corner, .share-modal { display: none; }</style>
                        </head>
                        <body>${responses.innerHTML}</body>
                    </html>
                `);
                printWindow.document.close();
                printWindow.print();
            }
        }

        function handleShare() {
            const shareModal = document.getElementById('shareModal');
            const shareLink = document.getElementById('shareLink');
            if (shareModal && shareLink) {
                const responses = JSON.parse(localStorage.getItem('aiResponses') || '{}');
                const shareData = btoa(JSON.stringify(responses));
                shareLink.value = `${window.location.origin}/share?data=${encodeURIComponent(shareData)}`;
                shareModal.style.display = 'flex';
            }
        }

        function closeShareModal() {
            document.getElementById('shareModal').style.display = 'none';
        }

        function copyShareLink() {
            const shareLink = document.getElementById('shareLink');
            shareLink.select();
            document.execCommand('copy');
            alert('Link copied to clipboard!');
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.ai-response table').forEach(table => {
                if (!table.parentElement.classList.contains('table-container')) {
                    const container = document.createElement('div');
                    container.className = 'table-container';
                    table.parentNode.insertBefore(container, table);
                    container.appendChild(table);
                }
            });
        });
    </script>
    <script src="{{ asset('js/ai-response.js') }}" defer></script>
    @endpush
</x-layout.main.base>

