<div>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Share Button -->



    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Copy Link -->
                    <div class="mb-1">
                        <label class="form-label">Share Link</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="share-url" value="{{ $url }}" readonly>
                            <button class="btn btn-dark" onclick="copyLink()">Copy</button>
                        </div>
                    </div>

                    @php
                    $encodedUrl = urlencode($url);
                    $encodedTitle = urlencode($title);
                    $encodedDesc = urlencode($description);
                    $shareText = urlencode($title . ' - ' . $description . "\n" . $url);
                    @endphp

                    <!-- Social Icons -->
                    <div class="text-center row g-3">
                        <div class="col-4">
                            <a href="https://wa.me/?text={{ $shareText }}" target="_blank"
                                class="text-success text-decoration-none">
                                <i class='bx bxl-whatsapp display-6'></i><br>WhatsApp
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}" target="_blank"
                                class="text-primary text-decoration-none">
                                <i class='bx bxl-facebook display-6'></i><br>Facebook
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://twitter.com/intent/tweet?url={{ $encodedUrl }}&text={{ $encodedTitle }}"
                                target="_blank" class="text-info text-decoration-none">
                                <i class='bx bxl-twitter display-6'></i><br>Twitter
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $encodedUrl }}&title={{ $encodedTitle }}&summary={{ $encodedDesc }}"
                                target="_blank" class="text-primary text-decoration-none">
                                <i class='bx bxl-linkedin display-6'></i><br>LinkedIn
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://t.me/share/url?url={{ $encodedUrl }}&text={{ $shareText }}" target="_blank"
                                class="text-info text-decoration-none">
                                <i class='bx bxl-telegram display-6'></i><br>Telegram
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://reddit.com/submit?url={{ $encodedUrl }}&title={{ $encodedTitle }}"
                                target="_blank" class="text-danger text-decoration-none">
                                <i class='bx bxl-reddit display-6'></i><br>Reddit
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="https://pinterest.com/pin/create/button/?url={{ $encodedUrl }}&description={{ $encodedDesc }}"
                                target="_blank" class="text-danger text-decoration-none">
                                <i class='bx bxl-pinterest display-6'></i><br>Pinterest
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="mailto:?subject={{ $encodedTitle }}&body={{ $shareText }}" target="_blank"
                                class="text-secondary text-decoration-none">
                                <i class='bx bxs-envelope display-6'></i><br>Email
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="sms:?&body={{ $shareText }}" class="text-dark text-decoration-none">
                                <i class='bx bxs-phone display-6'></i><br>SMS
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center ps-3 pe-3">
                    <hr>
                    <b>Google Notebook LM</b>
                    <p>for one-click AI summary of this comparative AI Report </p>
                    </p>
                    <a target="_blank" class="btn btn-dark" href="https://notebooklm.google.com/">Notebook LM</a> <br>
                    <small>Note: Copy the Link First and Paste it in Google Notebook LM</small>
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.on('openBootstrapInfoModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('shareModal'));
            modal.show();
        });
    });


    function copyLink() {
        const input = document.getElementById('share-url');
        input.select();
        input.setSelectionRange(0, 99999);
        document.execCommand('copy');

    }
</script>