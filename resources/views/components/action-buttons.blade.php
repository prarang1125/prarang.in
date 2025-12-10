@props(['backUrl', 'currentUrl' => null])

@php
$shareUrl = $currentUrl ?? url()->current();
$encodedUrl = urlencode($shareUrl);
$shareText = urlencode('Check this out: ' . $shareUrl);
@endphp

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
    .pr-ai-section .share-back-print {
        display: grid;
        grid-template-columns: 80% 20%;
    }

    .pr-ai-section .share-back-print .d-flex {
        justify-content: center;
        align-items: center;
    }

    /* Modal body */
    #shareModal .modal-dialog .modal-body {
        min-height: 367px;
        /* transform: translatex(0px) translatey(0px); */
    }

    /* Column 4/12 */
    #shareModal div .col-4 {
        height: 63px;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
</style>

<div class="share-back-print">
    {{-- Back Button (Left) --}}
    <div>
        <a href="{{ $backUrl }}" class="btn btn-dark btn-sm">
            <i class="bx bi-arrow-left"></i> Back
        </a>
    </div>

    {{-- Print & Share Buttons (Right) --}}
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-warning btn-sm" onclick="window.print()" title="Print Page">
            <i class="bi bi-printer"></i> Print
        </button>

        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#shareModal"
            title="Share Page">
            <i class="bi bi-share"></i> Share
        </button>
    </div>
</div>

{{-- Share Modal --}}
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share this page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Copy Link --}}
                <div class="mb-4">
                    <label class="form-label fw-bold">Share Link</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="shareUrlInput" value="{{ $shareUrl }}" readonly>
                        <button class="btn btn-dark" type="button" onclick="copyShareLink()">
                            <i class="bi bi-clipboard"></i> Copy
                        </button>
                    </div>
                </div>

                {{-- Social Icons --}}
                <div>
                    <label class="form-label fw-bold d-block mb-3">Share on Social Media</label>
                    <div class="row g-4 text-center">
                        <div class="col-4">
                            <a href="https://wa.me/?text={{ $shareText }}" target="_blank"
                                class="d-flex flex-column align-items-center text-success text-decoration-none">
                                <i class='bx bxl-whatsapp' style="font-size: 3rem;"></i>
                                <span class="mt-2">WhatsApp</span>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}" target="_blank"
                                class="d-flex flex-column align-items-center text-primary text-decoration-none">
                                <i class='bx bxl-facebook' style="font-size: 3rem;"></i>
                                <span class="mt-2">Facebook</span>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://twitter.com/intent/tweet?url={{ $encodedUrl }}" target="_blank"
                                class="d-flex flex-column align-items-center text-info text-decoration-none">
                                <i class='bx bxl-twitter' style="font-size: 3rem;"></i>
                                <span class="mt-2">Twitter</span>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $encodedUrl }}"
                                target="_blank"
                                class="d-flex flex-column align-items-center text-primary text-decoration-none">
                                <i class='bx bxl-linkedin' style="font-size: 3rem;"></i>
                                <span class="mt-2">LinkedIn</span>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://t.me/share/url?url={{ $encodedUrl }}&text={{ $shareText }}" target="_blank"
                                class="d-flex flex-column align-items-center text-info text-decoration-none">
                                <i class='bx bxl-telegram' style="font-size: 3rem;"></i>
                                <span class="mt-2">Telegram</span>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="mailto:?subject=Check this out&body={{ $shareText }}" target="_blank"
                                class="d-flex flex-column align-items-center text-secondary text-decoration-none">
                                <i class='bx bxs-envelope' style="font-size: 3rem;"></i>
                                <span class="mt-2">Email</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function copyShareLink() {
    var input = document.getElementById('shareUrlInput');
    input.select();
    input.setSelectionRange(0, 99999);
    document.execCommand('copy');
    alert('Link copied!');
}
</script>