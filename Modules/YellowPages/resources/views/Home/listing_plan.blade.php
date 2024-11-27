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
    

    <!-- Info Section -->
    <div style="text-align: center; padding: 20px;">
        <h6 style="color: #d9534f; font-weight: revert;">
            Please list your Business with Prarang using our Business Listing before you start Listing products under your Business using our Bazaar Listing.
        </h6>
        <br><br>
        <!-- Tabs Section -->
        <div style="display: flex; justify-content: center; margin-bottom: 20px;">
            <button class="btn btn-primary" style="margin-right: 5px;">Business Plans</button>
            <button class="btn btn-outline-primary" style="margin-right: 5px;">Bazaar Plans</button>
            <button class="btn btn-outline-primary" onclick="window.location.href='{{ url('yellow-pages/vcard') }}'">Get V-Card</button>
        </div>
    </div>

<!-- Plans Section -->
<div style="display: flex; gap: 20px; justify-content: center; margin: 20px auto;">
    <!-- Free Plan Box -->
    <div style="width: 250px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; text-align: center;">
        <div style="background-color: #000; color: #fff; padding: 20px 10px;">
            <h3 style="margin: 0; font-size: 13px; font-weight: normal; border: 2px solid #fff; padding: 3px 15px; border-radius: 15px; text-transform: uppercase; color: #fff;">
                Business Listing 
            </h3>
                        <div style="font-size: 36px; font-weight: bold;">Free</div>
            <small>Per Listing</small>
        </div>
        <ul style="padding: 20px; text-align: left; list-style: none; margin: 0;">
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Duration: Unlimited days</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Map Display</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Contact Display</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Image Gallery</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Business Tagline</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Location</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Website</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Social Links</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">FAQ</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Tags/Keywords</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Business Hours</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Deals-Offers-Discounts</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Lead Form</li>
        </ul>
        <button style="padding: 15px; font-size: 16px; color: #fff; background-color: #000; border: none; cursor: pointer; width: 100%;" onclick="window.location.href='{{ route('yp.getLocationData') }}'">Continue</button>

        {{-- <button style="padding: 15px; font-size: 16px; color: #fff; background-color: #000; border: none; cursor: pointer; width: 100%;">Continue</button> --}}
        
    </div>

    <!-- Featured Plan Box -->
    <div style="width: 250px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; text-align: center;">
        <div style="background-color: #000; color: #fff; padding: 20px 10px;">
            <h6 style="margin: 0; font-size: 13px; font-weight: normal; border: 2px solid #fff; padding: 3px 15px; border-radius: 15px; text-transform: uppercase; color: #fff;">
                Business Listing Featured
            </h6>            <div style="font-size: 36px; font-weight: bold;">₹35.40</div>
            <small>Per Listing</small>
            <div style="background-color: #e74c3c; color: #fff; padding: 5px 10px; font-size: 12px; border-radius: 3px; margin-top: 10px; display: inline-block;">HOT</div>
        </div>
        <ul style="padding: 20px; text-align: left; list-style: none; margin: 0;">
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Duration: 15 days</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Map Display</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Contact Display</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Image Gallery</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Video</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Business Tagline</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Location</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Website</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Social Links</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Price Range</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Tags/Keywords</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Business Hours</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Menu</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Announcement</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Deals-Offers-Discounts</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Events</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Bookings</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">Lead Form</li>
            <li style="margin: 10px 0; padding-left: 24px; position: relative;">V Card</li>
        </ul>
        <button style="padding: 15px; font-size: 16px; color: #fff; background-color: #000; border: none; cursor: pointer; width: 100%;" onclick="window.location.href='{{ route('yp.getLocationData') }}'">Continue</button>
    </div>
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
