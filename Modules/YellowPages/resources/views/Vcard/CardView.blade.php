<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>विकार्ड</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5 d-flex justify-content-center">
        <div class="card" id="vcard-container" style="max-width: 600px;">
            <div class="card-body">
                <!-- Banner -->
                @if ($vcard->banner_img)
                    <div class="text-center mb-3">
                        <img src="{{ Storage::url($vcard->banner_img) }}" alt="Cover Photo" class="img-fluid rounded" style="object-fit: cover; width: 100%; height: auto;">
                    </div>
                @endif

                <!-- Logo -->
                @if ($vcard->logo)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . $vcard->logo) }}" alt="Logo" class="img-fluid" style="max-height: 100px;">
                    </div>
                @endif

                <!-- Main Information -->
                <p><strong>शीर्षक:</strong> {{ $vcard->title }}</p>
                <p><strong>विवरण:</strong> {{ $vcard->description }}</p>

                <!-- Dynamic Fields -->
                @if ($vcard->dynamicFields)
                    <h5>अतिरिक्त जानकारी</h5>
                    <ul class="list-group">
                        @foreach ($vcard->dynamicFields as $field)
                            <li class="list-group-item">
                                <strong>{{ $field->title }}:</strong> {{ $field->data }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                <!-- Buttons -->
                <div class="mt-4 text-center">
                    <button class="btn btn-primary" onclick="saveCard()">Save Card (PDF)</button>
                    @if ($vcard->qr_code)
                        <a href="{{ asset('storage/' . $vcard->qr_code) }}" download class="btn btn-secondary">Download QR</a>
                    @endif
                    <button class="btn btn-success" onclick="shareOnWhatsApp()">Share on WhatsApp</button>
                    <button class="btn btn-info" onclick="shareOnFacebook()">Share on Facebook</button>
                    <button class="btn btn-warning" onclick="shareOnInstagram()">Share on Instagram</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        /**
         * Save the card as a smaller PDF.
         */
        function saveCard() {
            const vcard = document.getElementById('vcard-container');
            html2pdf(vcard, {
                margin: 5,
                filename: 'vcard-small.pdf',
                html2canvas: { scale: 1.5 },
                jsPDF: { unit: 'mm', format: 'a5', orientation: 'portrait' }
            });
        }

        /**
         * Share the card on WhatsApp.
         */
        function shareOnWhatsApp() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent('Check out my VCard: ' + url);
            window.open(`https://wa.me/?text=${text}`, '_blank');
        }

        /**
         * Share the card on Facebook.
         */
        function shareOnFacebook() {
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
        }

        /**
         * Share on Instagram (only a note since browser-based Instagram sharing is not possible).
         */
        function shareOnInstagram() {
            alert('Instagram sharing is not supported directly from web browsers. Use your phone’s sharing options instead.');
        }
    </script>
</body>
</html>
