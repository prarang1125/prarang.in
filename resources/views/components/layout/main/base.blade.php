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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/ai-response.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/typeit@8.7.1/dist/index.umd.js"></script>

    @livewireStyles
    @yield('css')
</head>
<style>
    .navbar-nav .col-md a {
        flex-direction: column;
        height: 50px;
    }

    .navbar-nav a span {
        margin-top: -4px;
        font-size: 14px;
    }

    .container img {
        bottom: auto !important;
    }

    @media (min-width:768px) {
        .container img {
            top: 147px;
        }
    }

    body {
        padding-top: 0px !important;
    }

    /* Navbar Unknowndown menu link */
    #navbarDropdownMenuLink {
        background-color: #eceeee;
        display: flex;
        flex-direction: row;
        font-weight: 600;
    }
</style>

<body>
    {{-- @livewire('utility.share') --}}
    <header class="container">
        <div class="row">
            <div class="order-1 col-sm-4 col-6 order-sm-1">
                <div class="bs5-hcolor-box">
                    <div class="bs5-color-1"></div>
                    <div class="bs5-color-2"></div>
                    <div class="bs5-color-3"></div>
                </div>
            </div>
            <div class="order-3 col-sm-4 col-12 order-sm-2">
                <div class="bs5-logo">
                    <div>
                        <p class="bs5-logo-title">Prarang</p>
                        <p class="bs5-logo-tagline">Knowledge Webs</p>
                    </div>
                    <div>
                        <img class="bs5-logo-image" src="https://www.prarang.in/home-assets/image/logo.png"
                            alt="Prarang">
                    </div>
                </div>
            </div>
            <div class="order-2 col-sm-4 col-6 order-sm-3">
                <div class="bs5-hcolor-box">
                    <div class="bs5-color-4"></div>
                    <div class="bs5-color-5"></div>
                    <div class="bs5-color-6"></div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-faded">
            <div class="container-fluid">
                <a class="text-center navbar-brand d-sm-block d-md-none d-lg-none" href="#"></a>
                <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">Menu &nbsp;
                    <span class="navbar-toggler-icon"></span>
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="text-center nav navbar-nav col-md-12 col-sm-12 no-padding">
                        <li class="col-md col-sm no-padding">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="col-md col-sm no-padding dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Products
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('content') }}">Content</a>
                                <a class="dropdown-item" href="{{ route('semiotics') }}">Semiotics</a>
                                <a class="dropdown-item" href="{{ route('analytics') }}">Analytics</a>
                                <a class="dropdown-item" href="/ai/upmana">Artificial Intelligence</a>
                            </div>
                        </li>
                        <li class="col-md col-sm no-padding">
                            <a href="{{ route('market') }}">Market <span>Digital Divide</span></a>
                        </li>

                        <li class="col-md col-sm no-padding">
                            <a href="{{ route('partners') }}" rel="nofollow">Partners<span>Corp. &
                                    Govt.</span></a>
                        </li>
                        <li class="col-md col-sm no-padding">
                            <a href="{{ route('about-us') }}" rel="nofollow">About Us</a>
                        </li>
                        <li class="col-md col-sm no-padding">
                            <a href="javascript:void(0);" id="viveks-modal" rel="nofollow">Blogs</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        {{ $slot }}
        {{-- </main>
    <footer>
        <div class="container-fluid">
            <br>
            <div class="container mt-3">
                <div class="footer-design row">
                    <div class="col-sm-3">
                        <a href="https://www.prarang.in/privacy-policy" class="">
                            Privacy Policy
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{ route('terms-conditions') }}" class="">
                            Terms &amp; Conditions
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{ route('refund-cancellation') }}">
                            Cancellations and Refund
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{ route('about-us') }}">
                            About Us
                        </a>
                    </div>
                </div>
            </div>
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
    </footer> --}}
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

        @livewireScripts
</body>

</html>
