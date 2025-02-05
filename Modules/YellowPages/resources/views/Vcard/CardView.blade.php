<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $user->name ?? 'Prarang Page' }}</title>

    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column;">

    <!-- Business Card -->
    <div id="card-container" style="display: none; background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); display: flex; max-width: 600px; width: 100%; border: 1px solid #ddd; margin-top: 20px; align-items: center;">

        <!-- Left Side (Details) -->
        <div style="width: 70%; padding: 10px;">
            <p style="margin: 5px 0;"><strong>Name:</strong> {{ $user->name ?? 'Not Available' }}</p>
            <p style="margin: 5px 0;"><strong>Phone:</strong> {{ $user->phone ?? 'Not Available' }}</p>
            <p style="margin: 5px 0;"><strong>Email:</strong> {{ $user->email ?? 'Not Available' }}</p>
            <p style="margin: 5px 0;"><strong>Address:</strong> {{ $address->address ?? 'Not Available' }}</p>
            <p style="margin: 5px 0;"><strong>Category:</strong> {{ $category ?? 'Not Available' }}</p>
            <p style="margin: 5px 0;"><strong>social_media:</strong> {{ $category ?? 'Not Available' }}</p>
        </div>

        <!-- Right Side (Profile Image) -->
        <div style="width: 30%; text-align: center;">
            @if ($user->profile)
                <img src="{{ Storage::url($user->profile) }}" alt="Photo" style="max-width: 80px; height: 80px; border-radius: 50%; border: 2px solid #ddd;">
            @endif
        </div>
    </div>

    <!-- Share Button -->
    <div id="share-container" style="display: none; margin-top: 20px; text-align: center;">
        <button onclick="toggleShareOptions()" style="background-color: #007bff; color: white; padding: 10px 20px; margin: 5px; border: none; border-radius: 5px; cursor: pointer;">Share</button>

        <div id="share-icons" style="display: none; margin-top: 10px;">
            <a href="#" onclick="shareOnWhatsApp()" style="margin: 5px;"><img src="https://cdn-icons-png.flaticon.com/128/733/733585.png" alt="WhatsApp" style="width: 30px;"></a>
            <a href="#" onclick="shareOnInstagram()" style="margin: 5px;"><img src="https://cdn-icons-png.flaticon.com/128/174/174855.png" alt="Instagram" style="width: 30px;"></a>
            <a href="#" onclick="shareOnFacebook()" style="margin: 5px;"><img src="https://cdn-icons-png.flaticon.com/128/733/733547.png" alt="Facebook" style="width: 30px;"></a>
        </div>
    </div>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            console.log("Scanned QR Code:", decodedText);
            document.getElementById("scanner-container").style.display = "none";
            document.getElementById("card-container").style.display = "flex";
            document.getElementById("share-container").style.display = "block";
        }

        function stopScanner() {
            html5QrcodeScanner.clear();
            document.getElementById("scanner-container").style.display = "none";
        }

        let html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);

        function toggleShareOptions() {
            let shareIcons = document.getElementById("share-icons");
            shareIcons.style.display = shareIcons.style.display === "none" ? "block" : "none";
        }

        function shareOnWhatsApp() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent('Check out my VCard: ' + url);
            window.open(`https://wa.me/?text=${text}`, '_blank');
        }

        function shareOnInstagram() {
            alert("Instagram sharing requires uploading a QR image manually.");
        }

        function shareOnFacebook() {
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
        }
    </script>

</body>
</html>
