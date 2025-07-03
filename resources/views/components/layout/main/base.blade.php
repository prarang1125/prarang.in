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

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $metaData['title'] ?? 'Prarang : Knowledge Webs' }}">
    <meta name="title" property="og:title" content="{{ $metaData['title'] ?? 'Prarang : Knowledge Webs' }}">
    <meta name="image" property="og:image" content="{{ $metaData['image'] ?? 'https://prarang.s3.amazonaws.com/posts-2017-24/og_home_image.png' }}">
    <meta name="description" property="og:description" content="{{ $metaData['description'] ?? '' }}">
    <meta property="og:url" content="https://prarang.in">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="Prarang">
    <meta name="twitter:title" content="{{ $metaData['title'] ?? 'Prarang : Knowledge Webs' }}">
    <meta name="twitter:description" content="{{ $metaData['description'] ?? '' }}">
    <meta name="twitter:image" content="{{ $metaData['image'] ?? 'https://prarang.s3.amazonaws.com/posts-2017-24/og_home_image.png' }}">

    <!-- CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('assets/main/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/ai-response.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/typeit@8.7.1/dist/index.umd.js"></script>

    @yield('css')
</head>
<style>
    /* Link */
    .navbar-nav .col-md a {
        flex-direction: column;
        height: 50px;
    }

    /* Span Tag */
    .navbar-nav a span {
        margin-top: -4px;
        font-size: 14px;
    }

    /* Image */
    .container img {
        bottom: auto !important;
    }

    @media (min-width:768px) {

        /* Image */
        .container img {
            top: 147px;
        }
    }
</style>

<body>
    @livewire('utility.share')
    <header class="container">Add commentMore actions
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

    </header>
    <main class="container">
        {{ $slot }}
    </main>
    <footer>
        <div class="container-fluid">
            <br>
            <div class="container mt-3">
                <div class="footer-design row">
                    <div class="col-sm-3">
                        <a href="{{route('privacy-policy')}}" class="">
                            Privacy Policy
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{route('terms-conditions')}}" class="">
                            Terms &amp; Conditions
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{route('refund-cancellation')}}">
                            Cancellations and Refund
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{route('about-us')}}">
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
    </footer>
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/ai-response.js') }}"></script>
</body>

</html>