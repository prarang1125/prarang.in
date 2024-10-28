<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Prarang - YellowPages</title>
    <meta name="description" content="Find local crafts and businesses in your area. Listings for furniture, embroidery, and more.">
    <meta name="keywords" content="craft, furniture, embroidery, local business">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    
    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body style="font-family: Arial, sans-serif; background-color: #f5f9fc; margin: 0; padding: 0;">

    <!-- Navbar Include -->
    @include('yellowpages::layout.navbar');
<br><br>
    <!-- Header Section -->
    <div style="position: relative; background-image: url('{{ asset('storage/categories/cate_bg.jpg') }}'); background-size: cover; background-position: center; padding: 60px; text-align: center; color: white;">
        <!-- Optional Overlay for better text visibility -->
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5);"></div>
        <h1 style="position: relative; z-index: 1; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);">Select Your Plan</h1>
    </div>

    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
        <h1 style="text-align: center; margin-bottom: 20px;">Add Your Listing</h1>

        <div style="margin-bottom: 20px;">
            <label for="location" style="display: block; font-weight: bold;">Location:</label>
            <input type="text" id="location" name="location" placeholder="Enter your location" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="listingTitle" style="display: block; font-weight: bold;">Listing Title:</label>
            <input type="text" id="listingTitle" name="listingTitle" placeholder="Enter listing title" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="companyName" style="display: block; font-weight: bold;">Business/Company Name:</label>
            <input type="text" id="companyName" name="companyName" placeholder="Enter company name" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="companyAddress" style="display: block; font-weight: bold;">Business/Company Address:</label>
            <textarea id="companyAddress" name="companyAddress" placeholder="Enter company address" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; height: 100px;"></textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="primaryPhone" style="display: block; font-weight: bold;">Business/Company Primary Phone Number:</label>
            <input type="tel" id="primaryPhone" name="primaryPhone" placeholder="Enter primary phone number" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="secondaryPhone" style="display: block; font-weight: bold;">Business/Company Secondary Phone Number:</label>
            <input type="tel" id="secondaryPhone" name="secondaryPhone" placeholder="Enter secondary phone number" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="background-color: #f2f2f2; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 20px;">
            <h2 style="margin-bottom: 10px;">Feeling Lazy? Say HELLO! to Fill-O-Bot!</h2>
            <p style="margin-bottom: 5px;">Don't worry Fill-o-BOT will help you OUT! Just enter any business on google places and Fill-O-Bot automatically fills in the data that it can grab.</p>
            <input type="checkbox" id="fillOBot" style="margin-right: 5px;">
            <label for="fillOBot">Turn Me On</label>
        </div>

        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
    </div>

    @include('yellowpages::layout.footer')

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
