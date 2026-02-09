<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $metaData['title'] ?? 'Prarang : Knowledge Webs' }}</title>
    <meta name="description" content="Knowledge webs for smarter citizenship, advertising, and governance.">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $metaData['title'] ?? 'Prarang : Knowledge Webs' }}">
    <meta name="title" property="og:title" content="{{ $metaData['title'] ?? 'Prarang : Knowledge Webs' }}">
    <meta name="image" property="og:image"
        content="{{ $metaData['image'] ?? 'https://prarang.s3.amazonaws.com/posts-2017-24/og_home_image.png' }}">
    <meta name="description" property="og:description"
        content="{{ $metaData['description'] ?? 'Knowledge webs for smarter citizenship, advertising, and governance.' }}">
    <meta property="og:url" content="https://prarang.in">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="Prarang">
    <meta name="twitter:title" content="{{ $metaData['title'] ?? 'Prarang : Knowledge Webs' }}">
    <meta name="twitter:description"
        content="{{ $metaData['description'] ?? 'Knowledge webs for smarter citizenship, advertising, and governance.' }}">
    <meta name="twitter:image"
        content="{{ $metaData['image'] ?? 'https://prarang.s3.amazonaws.com/posts-2017-24/og_home_image.png' }}">
    <meta name="google-site-verification" content="-DA48RRV_4JbpmDcYV7r8QBnMMtBXSzO4GmHj-gow2Q" />
    <!-- CSS Files -->
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/main/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/ai-response.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/typeit@8.7.1/dist/index.umd.js"></script>

    @livewireStyles
    @yield('css')
</head>
<style>
    body {
        font-family: 'Outfit', sans-serif;
    }

    .navbar {
        background: #ffffff !important;
        border-bottom: 1px solid #eee;
        padding: 0;
        z-index: 1030;
    }

    .nav-link {
        color: #333 !important;
        font-weight: 500;
        font-size: 15px;
        padding: 12px 20px !important;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .nav-link:hover {
        background: rgba(0, 0, 0, 0.05);
        color: #007bff !important;
    }

    /* Dropdown Enhancements - Desktop */
    @media (min-width: 992px) {
        .dropdown:hover>.dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        border-radius: 8px;
        padding: 8px 0;
        margin-top: 0;
        border: 1px solid rgba(0, 0, 0, 0.08);
        min-width: 200px;
    }

    /* Desktop dropdown animation */
    @media (min-width: 992px) {
        .dropdown-menu {
            display: block;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
            pointer-events: none;
        }

        .dropdown:hover>.dropdown-menu {
            pointer-events: auto;
        }
    }

    .dropdown-item {
        padding: 10px 24px;
        font-weight: 500;
        color: #4a4a4a;
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        /* background-color: #f0f7ff; */
        color: #007bff;
        transform: translateX(5px);
    }

    /* Dropdown toggle icon */
    .dropdown-toggle::after {
        content: "\f107";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        border: none;
        vertical-align: middle;
        margin-left: 6px;
        font-size: 12px;
        transition: transform 0.2s ease;
    }

    @media (min-width: 992px) {
        .dropdown:hover>.dropdown-toggle::after {
            transform: rotate(180deg);
        }
    }

    @media (max-width: 991px) {
        .dropdown.show>.dropdown-toggle::after {
            transform: rotate(180deg);
        }
    }

    /* Logo Interactions */
    .bs5-logo-image {
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .bs5-logo:hover .bs5-logo-image {
        transform: scale(1.08) rotate(-3deg);
    }

    /* Navbar Toggler */
    .navbar-toggler {
        border: none;
        padding: 8px;
        border-radius: 8px;
        transition: background 0.3s ease;
    }

    .navbar-toggler:hover {
        background: rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 991.98px) {
        .navbar-nav {
            padding: 8px 0;
            background: #ffffff;
        }

        .nav-link {
            align-items: flex-start;
            padding: 14px 20px !important;
            font-size: 15px !important;
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-link:active {
            background: #e3f2fd;
            transform: scale(0.98);
        }

        .nav-item:last-child .nav-link {
            border-bottom: none;
        }

        .dropdown-menu {
            box-shadow: none;
            padding: 0;
            margin: 0;
            margin-left: 0;
            background: #f8f9fa;
            border-left: 3px solid #007bff;
            border-radius: 0;
            display: none;
            opacity: 1;
            visibility: visible;
            transform: none;
            transition: none;
            position: static;
            float: none;
        }

        .dropdown:hover>.dropdown-menu {
            display: none;
        }

        .dropdown.show>.dropdown-menu {
            display: block;
            animation: slideDownMobile 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideDownMobile {
            from {
                opacity: 0;
                max-height: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                max-height: 800px;
                transform: translateY(0);
            }
        }

        .nav-item>.dropdown-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            position: relative;
        }

        .nav-item>.dropdown-toggle::after {
            position: absolute;
            right: 20px;
        }

        .dropdown-item.dropdown-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 500;
        }

        /* Active state for mobile dropdowns */
        .dropdown.show>.dropdown-toggle {
            background: #e3f2fd;
            color: #0056b3 !important;
        }

        /* Touch feedback */
        .dropdown-toggle:active,
        .dropdown-item:active {
            background: #d1e7fd;
            transform: scale(0.98);
        }
    }
    }
    }

    .nav-item>.dropdown-toggle {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .dropdown-item.dropdown-toggle {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    }

    /* Modal Premium Styling */
    .modal-content {
        background: rgba(255, 255, 255, 0.8) !important;
        backdrop-filter: blur(25px) saturate(180%) !important;
        -webkit-backdrop-filter: blur(25px) saturate(180%) !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        box-shadow: 0 32px 64px -16px rgba(0, 0, 0, 0.25) !important;
    }

    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.45) !important;
        backdrop-filter: blur(6px) !important;
    }

    .btn-premium {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        border: none;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
    }

    .btn-premium:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(0, 123, 255, 0.4);
        color: white;
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 24px;
        }

        .header-tagline {
            font-size: 14px;
        }
    }

    /* Body */
    body {
        padding-top: 0px;
    }

    /* Header Branding */
    .header-title {
        color: #4a90e2;
        font-size: 32px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .header-tagline {
        color: #333;
        font-size: 18px;
        font-weight: 700;
        margin-top: -3px;
    }

    @media (max-width: 991.98px) {
        #main-header .navbar .container {
            background-color: #ffffff;
            padding-top: 5px;
            padding-bottom: 5px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-content .header-title {
            font-size: 0.9rem !important;
            margin-bottom: 0;
            line-height: 1.1;
            font-weight: 800;
        }

        .header-content .header-tagline {
            font-size: 0.55rem !important;
            margin-top: 1px !important;
            color: #666;
            font-weight: 600;
        }

        /* Mobile Menu Items Styling */
        .navbar-nav {
            padding: 1rem 0;
        }

        .nav-link {
            align-items: flex-start !important;
            justify-content: flex-start !important;
            padding: 12px 15px !important;
            border-bottom: 1px solid #f8f9fa;
            font-size: 16px !important;
        }

        .nav-link:hover {
            padding-left: 20px !important;
            background: #f8f9fa;
        }

        .dropdown-menu {
            border: none;
            box-shadow: none;
            padding-left: 15px;
            background: #fafafa;
        }
    }

    @media (max-width: 576px) {
        .header-content .header-title {
            font-size: 1rem !important;
        }

        .header-content .header-tagline {
            font-size: 0.55rem !important;
        }

        .navbar-brand img {
            height: 35px !important;
        }
    }
</style>

<style>
    @media (max-width:576px) {

        /* Container */
        #main-header .navbar .container {
            box-shadow: 0px 2px 0px -50px rgba(0, 0, 0, 0.1);
            transform: translatex(0px) translatey(0px);
        }

        /* Heading */
        #main-header .navbar .container .d-flex .text-center .header-content h1 {
            font-size: 16px !important;
        }

        /* Paragraph */
        #main-header .navbar .container .d-flex .text-center .header-content p {
            font-size: 11px !important;
        }

    }

    .d-flex .navbar-toggler span:active {
        border-style: none;
    }

    /* Navbar nav */
    #mainNavbarMenu .navbar-nav {
        font-weight: 500;
        color: #ffffff;
        background-color: #206df3;
    }

    /* Nav link */
    .navbar-nav .nav-item .nav-link {
        color: #ffffff !important;
    }

    /* Row */
    .d-lg-block .align-items-center {
        justify-content: center;
        flex-direction: row;
        padding-left: 138px;
    }

    /* Header */
    #main-header header {
        padding-top: 0px !important;
    }

    /* Navigation */
    #main-header nav {
        box-shadow: none !important;
    }

    /* Column 9/12 */
    .d-lg-block .text-center {
        width: 511px;
    }

    @media (max-width:991px) {

        /* Container */
        #main-header .navbar .container {
            box-shadow: 0px 2px 0px 0px rgba(0, 0, 0, 0.1);
        }

    }

    @media (max-width:767px) {

        /* Container */
        #main-header .navbar .container {
            margin-left: 0px !important;
        }

    }

    /* Navbar nav */
    #mainNavbarMenu .navbar-nav {
        background-color: #eef1f1;

    }

    /* Nav link */
    .navbar-nav .nav-item .nav-link {
        color: #020202 !important;
        height: 45px;
    }

    /* Navigation */
    #main-header nav {
        background-color: rgba(255, 255, 255, 0) !important;
    }

    @media (max-width:576px) {

        /* Justify center */
        .container .justify-center {
            flex-direction: row;
            justify-content: center;
            margin-top: 9px !important;
        }

    }

    /* List Item */


    /* Nested Dropdown Styling */
    .dropdown-menu .dropdown-toggle::after {
        content: "\f105";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        border: none;
        margin-left: auto;
        font-size: 11px;
    }

    .dropdown-menu .dropdown {
        position: relative;
    }

    /* Desktop: Show submenu on hover */
    @media (min-width: 992px) {
        .dropdown-menu .dropdown-menu {
            position: absolute;
            left: 100%;
            top: -8px;
            margin-left: 2px;
            display: block;
            opacity: 0;
            visibility: hidden;
            transform: translateX(-10px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
            pointer-events: none;
            min-width: 200px;
        }

        .dropdown-menu .dropdown:hover>.dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
            pointer-events: auto;
        }

        .dropdown-menu .dropdown-toggle::after {
            margin-left: 8px;
        }
    }

    /* Mobile: Show submenu on click with proper spacing */
    @media (max-width: 991px) {
        .dropdown-menu .dropdown-menu {
            position: static;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1), padding 0.3s ease, opacity 0.2s ease;
            margin-left: 0;
            padding-left: 0;
            border-left: 3px solid #0056b3;
            background: #e9ecef;
            display: block !important;
            opacity: 0;
            visibility: visible;
            transform: none;
        }

        .dropdown-menu .dropdown.show>.dropdown-menu {
            max-height: 600px;
            padding-top: 6px;
            padding-bottom: 6px;
            opacity: 1;
        }

        .dropdown-menu .dropdown-toggle {
            padding: 12px 20px !important;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .dropdown-menu .dropdown-toggle:active {
            background: #d1e7fd;
            transform: scale(0.98);
        }

        .dropdown-menu .dropdown-toggle::after {
            transform: rotate(0deg);
            transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 10px;
        }

        .dropdown-menu .dropdown.show>.dropdown-toggle {
            background: #d6e9f7;
            color: #0056b3;
        }

        .dropdown-menu .dropdown.show>.dropdown-toggle::after {
            transform: rotate(90deg);
        }

        .dropdown-menu .dropdown-item {
            padding: 11px 20px;
            font-size: 14px;
            transition: all 0.15s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dropdown-menu .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-menu .dropdown-item:active {
            background: #d1e7fd;
            transform: translateX(3px);
        }

        /* Nested dropdown items styling */
        .dropdown-menu .dropdown-menu .dropdown-item {
            padding-left: 24px;
            font-size: 13px;
            background: #f8f9fa;
        }
    }

    /* Nav link */
    .navbar-nav .nav-item:nth-child(3) .nav-link {
        flex-direction: row;
    }
</style>

<body class="bg-light" style="min-height: 100vh !important;" style="background: #ffffff !important;">

    <div id="main-header" class="">
        <header class="bg-white container-fluid py-3 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9 text-center">
                        <h1 class="header-title mb-0 text-primary">Prarang Knowledge Webs</h1>
                        <p class="header-tagline mb-0">Bridging the Digital Divide – By City, By Language</p>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="/" class="text-decoration-none">
                            <img class="bs5-logo-image" src="https://www.prarang.in/home-assets/image/logo.png"
                                alt="Prarang" height="60">
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg bg-white shadow-sm">
            <div class="container">
                <!-- Mobile Header Area (Toggler + Brand + Logo) -->
                <div class="d-flex w-100 align-items-center justify-content-between d-lg-none py-2">
                    <!-- Mobile Toggler -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mainNavbarMenu" aria-controls="mainNavbarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Mobile Brand Content -->
                    <div class="text-center px-2">
                        <div class="header-content">
                            <h1 class="header-title mb-0 text-primary">Prarang Knowledge Webs</h1>
                            <p class="header-tagline mb-0">Bridging the Digital Divide – By City, By Language</p>
                        </div>
                    </div>

                    <!-- Mobile Logo -->
                    <a class="navbar-brand me-0" href="/">
                        <img class="bs5-logo-image" src="https://www.prarang.in/home-assets/image/logo.png"
                            alt="Prarang" height="35" style="width: auto;">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="mainNavbarMenu">
                    <ul class="navbar-nav w-100 justify-content-between">
                        @if (url()->current() != '/')
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    Home
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/digital-divide">Digital Divide</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Solutions
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/content">Content</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                        Analytics
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" target="_blank"
                                                href="https://g2c.prarang.in/india">India Analytics</a></li>
                                        <li><a class="dropdown-item" target="_blank"
                                                href="https://g2c.prarang.in/world">World Analytics</a></li>
                                        <li><a class="dropdown-item" href="/cirus">CIRUS</a></li>

                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="/ai/upmana">A.I.</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                        Performance Metrics
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/semiotics">Semiotics</a></li>
                                        <li><a class="dropdown-item" href="/partners">Partner Metrics
                                            </a></li>
                                    </ul>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/partners">Partners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about-us">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" id="viveks-modal">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/knowledge">Knowledge</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/intelligence">Intelligence</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <main class="container" style="min-height: 70vh !important;">
        {{ $slot }}
    </main>
    <footer>
        <div class="container-fluid">
            <br>
            {{-- <div class="container mt-3">
                <div class="footer-design row">
                    <div class="col-sm-3">
                        <a href="https://www.prarang.in/privacy-policy" class="">
                            Privacy Policy
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="/terms-conditions" class="">
                            Terms &amp; Conditions
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="/refund-cancellation">
                            Cancellations and Refund
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="/about-us">
                            About Us
                        </a>
                    </div>
                </div>
            </div> --}}
            <div class="container-fluid">

            </div>
            <p class="container"><br>
                <b>Please read this disclaimer carefully before using our website. By accessing and using our website,
                    you
                    agree to the terms and conditions stated in this disclaimer. </b> <br>

                1. Copyright and Intellectual Property: <br> a) The content, design, graphics, and data presented on
                this
                website are protected by copyright and intellectual property laws. <br> b) Unauthorized use,
                reproduction, or
                distribution of any material from this website, whether free or paid, is strictly prohibited. <br>
                2. Changes to Disclaimer: <br> a) We reserve the right to modify or update this disclaimer at any
                time
                without
                prior notice. <br> b) Any changes will be effective immediately upon posting on the website.
                By using our website, you acknowledge that you have read, understood, and agree to this
                disclaimer
                in
                its entirety. If you do not agree with any part of this disclaimer, please refrain from using
                our
                website. For
                any questions or clarifications, please contact us at query@prararag.in
            </p>
            <p id="demo">
            </p>
            <br>
        </div>
    </footer>
    <script>
        document.addEventListener('change', function(e) {

            // only checkbox
            if (!e.target.classList.contains('form-check-input')) return;

            // ❗ sirf CHECK hone par
            if (!e.target.checked) return;

            const accordionItem = e.target.closest('.accordion-item');
            if (!accordionItem) return;

            const collapseEl = accordionItem.querySelector('.accordion-collapse');
            if (!collapseEl) return;

            const instance =
                bootstrap.Collapse.getInstance(collapseEl) ||
                new bootstrap.Collapse(collapseEl, {
                    toggle: false
                });

            instance.hide();
        });

        // prevent accidental toggle on click
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('form-check-input')) {
                e.stopPropagation();
            }
        });

        // Enhanced dropdown handling for mobile with touch optimization
        document.addEventListener('DOMContentLoaded', function() {
            let touchStartY = 0;
            let isSwiping = false;

            // Handle all dropdown toggles (both main and nested)
            document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
                // Touch start tracking
                toggle.addEventListener('touchstart', function(e) {
                    touchStartY = e.touches[0].clientY;
                    isSwiping = false;
                }, {
                    passive: true
                });

                // Touch move detection
                toggle.addEventListener('touchmove', function(e) {
                    const touchY = e.touches[0].clientY;
                    if (Math.abs(touchY - touchStartY) > 10) {
                        isSwiping = true;
                    }
                }, {
                    passive: true
                });

                // Click/Touch handler
                toggle.addEventListener('click', function(e) {
                    // Ignore if user was swiping
                    if (isSwiping) {
                        return;
                    }

                    // Only handle on mobile or if it's a nested dropdown
                    if (window.innerWidth < 992 || this.closest('.dropdown-menu')) {
                        e.preventDefault();
                        e.stopPropagation();

                        const parentDropdown = this.closest('.dropdown');
                        if (parentDropdown) {
                            const wasOpen = parentDropdown.classList.contains('show');

                            // Close other dropdowns at the same level
                            const siblings = parentDropdown.parentElement.querySelectorAll(
                                ':scope > .dropdown');
                            siblings.forEach(function(sibling) {
                                if (sibling !== parentDropdown && sibling.classList
                                    .contains('show')) {
                                    sibling.classList.remove('show');
                                }
                            });

                            // Toggle current dropdown
                            if (wasOpen) {
                                parentDropdown.classList.remove('show');
                            } else {
                                parentDropdown.classList.add('show');

                                // Add haptic feedback on supported devices
                                if (window.navigator && window.navigator.vibrate) {
                                    window.navigator.vibrate(10);
                                }
                            }
                        }
                    }
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown') && !e.target.closest('.navbar-toggler')) {
                    document.querySelectorAll('.dropdown.show').forEach(function(dropdown) {
                        dropdown.classList.remove('show');
                    });
                }
            });

            // Close mobile menu when clicking a non-dropdown link
            document.querySelectorAll(
                '.navbar-nav .nav-link:not(.dropdown-toggle), .dropdown-menu .dropdown-item:not(.dropdown-toggle)'
            ).forEach(function(link) {
                link.addEventListener('click', function(e) {
                    // Don't close if it's a dropdown toggle
                    if (this.classList.contains('dropdown-toggle')) {
                        return;
                    }

                    const navbarCollapse = document.getElementById('mainNavbarMenu');
                    if (navbarCollapse && window.innerWidth < 992) {
                        // Small delay for better UX
                        setTimeout(function() {
                            const bsCollapse = bootstrap.Collapse.getInstance(
                                navbarCollapse);
                            if (bsCollapse) {
                                bsCollapse.hide();
                            }
                        }, 150);
                    }
                });
            });

            // Close all dropdowns when navbar is collapsed
            const navbarCollapse = document.getElementById('mainNavbarMenu');
            if (navbarCollapse) {
                navbarCollapse.addEventListener('hidden.bs.collapse', function() {
                    document.querySelectorAll('.dropdown.show').forEach(function(dropdown) {
                        dropdown.classList.remove('show');
                    });
                });
            }
        });
    </script>
    @yield('script')
    <script src="{{ asset('assets/js/blog-m.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/ai-response.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    <!-- Dynamic Generic Modal -->
    <div class="modal fade" id="dynamicModal" tabindex="-1" aria-labelledby="dynamicModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="border-radius: 28px;">
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="modal-title font-bold text-dark fs-3" id="dynamicModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 pt-3">
                    <p id="dynamicModalBody" class="text-secondary leading-relaxed fs-5"></p>
                </div>
                <div class="modal-footer border-0 p-4 pt-0 justify-content-start">
                    <button type="button" class="btn btn-premium rounded-pill px-5 py-2 font-semibold fs-6"
                        data-bs-dismiss="modal">Excellent</button>
                    <button type="button" class="btn btn-link text-secondary text-decoration-none ms-auto"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Dynamic Modal Function
        function openModal(title, content) {
            document.getElementById('dynamicModalLabel').innerText = title;
            document.getElementById('dynamicModalBody').innerText = content;
            const modal = new bootstrap.Modal(document.getElementById('dynamicModal'));
            modal.show();
        }

        // Sticky Header & Scroll Effects
        // Blogs Modal Listener (if needed)
        // document.getElementById('viveks-modal')?.addEventListener('click', function() {
        //     openModal('Prarang Blogs',
        //         'Our blogs are coming soon! Stay tuned for deep insights into knowledge webs and community growth.'
        //     );
        // });
    </script>
    @livewireScripts
</body>

</html>
