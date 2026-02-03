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
    <meta name="image" property="og:image"
        content="{{ $metaData['image'] ?? 'https://prarang.s3.amazonaws.com/posts-2017-24/og_home_image.png' }}">
    <meta name="description" property="og:description" content="{{ $metaData['description'] ?? '' }}">
    <meta property="og:url" content="https://prarang.in">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="Prarang">
    <meta name="twitter:title" content="{{ $metaData['title'] ?? 'Prarang : Knowledge Webs' }}">
    <meta name="twitter:description" content="{{ $metaData['description'] ?? '' }}">
    <meta name="twitter:image"
        content="{{ $metaData['image'] ?? 'https://prarang.s3.amazonaws.com/posts-2017-24/og_home_image.png' }}">
    <meta name="google-site-verification" content="-DA48RRV_4JbpmDcYV7r8QBnMMtBXSzO4GmHj-gow2Q" />
    <!-- CSS Files -->
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

    /* Container fluid */
    .navbar .container-fluid {
        margin-top: -10px;
        border-bottom-style: solid;
        border-bottom-width: -1px;
        border-bottom-color: #efefef;
        transform: translatex(0px) translatey(0px);
    }

    /* Link (hover) */
    .navbar-nav .nav-item a:hover {
        background-color: #ffffff;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="https://prarang.s3.amazonaws.com/posts-2017-24/logo2.png" alt="Logo">
            </a>

            <!-- Toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.indiaczech.com">India-Czech
                            Portal</a>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        {{ $slot }}
    </main>
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

    @livewireScripts
</body>

</html>
