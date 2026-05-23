<x-layout.portal.country_base :portal="$main">

    <style>
        #main>.bg-light {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        #main>.bg-light {
            padding-bottom: 6px !important;
            padding-top: 4px;



        }

        #main .bg-light h3 {
            padding-top: 3px;
        }

        #main .comparison-links-new {
            margin-bottom: 6px;
        }

        #main .comparison-links-new {
            display: flex;
            flex-direction: column;
        }

        #main .comparison-links-new a {
            text-align: center;
            background-color: #137df5;
            color: #ffffff;
            padding-left: 0px;
            padding-right: 7px;
            padding-bottom: 7px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        #main .btn-primary {
            padding-top: 5px;
            padding-bottom: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .btn-primary {
            font-size: 14px;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 0.5rem;
        }

        .planner-btns {
            margin-bottom: 3px;
            margin-left: 16px;
            margin-right: 16px;
            margin-top: 3px;
        }

        .important-links-content {
            max-height: 250px;
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(0, 1, 0, 1);
        }

        @media (max-width: 992px) {
            #columns .lsvr-grid {
                display: flex;
                flex-direction: column;
            }

            #columns .lsvr-grid>.lsvr-grid__col {
                width: 100% !important;
                max-width: 100% !important;
                float: none !important;
                margin-left: 0 !important;
                margin-right: 0 !important;
                left: auto !important;
                right: auto !important;
            }

            #columns .left-section {
                order: 1;
            }

            #columns .right-section {
                order: 2;
            }

            #columns .middle-section {
                order: 3;
                margin-top: 16px !important;
            }
        }

        .modal-backdrop.show {
            opacity: 0.8 !important;
        }
    </style>
    <style>
        @import url("//fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

        body {
            font-family: 'DM Sans', sans-serif !important;
        }

        /* Paragraph */
        #socialMediaPostsModal .modal-body p {
            font-size: 15px !important;
            margin-bottom: 20px !important;
        }

        /* Paragraph */
        #joinUsModal div p {
            font-size: 16px;
        }

        /* Link */
        #joinUsModal .modal-body a {
            white-space: pre-wrap;
        }
    </style>
    <div id="wrapper">
        <header class="px-5 lsvr-container">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6 max-w-[1920px] mx-auto">

                <!-- Logo & Language Toggle Section -->
                <div class="flex items-center gap-6">
                    <div class="flex flex-col items-center">
                        <img src="https://i.ibb.co/TDKtQQrd/prarang-logo-dark.png" alt="Prarang Logo"
                            class="h-[100px] w-auto lg:h-[120px]">
                    </div>

                    <!-- Language Selector / All Posts -->
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center bg-gray-100 p-1 rounded-full border">
                            <button id="primary-language"
                                class="px-4 py-1 rounded-full text-xs font-bold bg-blue-600 text-white shadow-sm">{{ strtoupper(substr($primary->locale_lang ?? '', 0, 2)) }}
                            </button>
                            <button id="secondary-language"
                                onclick="showComingSoonToast('{{ $secondary->locale_lang }} Language Content - Coming Soon.')"
                                class="px-4 py-1 rounded-full text-xs font-bold text-gray-500 hover:bg-gray-200 transition-colors">{{ strtoupper(substr($secondary->locale_lang ?? '', 0, 2)) }}</button>
                        </div>

                    </div>

                </div>
                <div class="flex justify-center items-center">
                    @if ($main->is_active)
                        @livewire('portal.subscribe')
                    @else
                        @livewire('portal.join-us-box')
                    @endif

                </div>
                <!-- Right Side: Stats & Logins -->
                <div class="flex flex-col gap-1 w-full lg:w-auto">
                    <!-- Stats Grid -->
                    @if ($main->is_active)
                        <div class="bg-slate-900 text-white  px-2 p-1 rounded-lg border border-slate-700 shadow-inner">
                            <div class="grid grid-cols-1  text-[10px]">
                                <div class="flex justify-between items-center gap-4">
                                    <span class="opacity-80 text-[12px]">Subscribers:</span>
                                    <span class="font-mono font-bold text-green-400"
                                        id="city-subscriber-count">12</span>
                                </div>
                                <div class="flex justify-between items-center gap-4 border-t border-slate-800 ">
                                    <span class="opacity-80 text-[12px]">Monthly Website Reach:</span>
                                    <span class="font-mono font-bold text-blue-400" id="city-monthly-count">32</span>
                                </div>
                                <div class="flex justify-between items-center gap-4 border-t border-slate-800">
                                    <span class="opacity-80 text-[12px]">Daily Readers:</span>
                                    <span class="font-mono font-bold text-amber-400" id="city-daily-count">8</span>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- Login Buttons -->
                    <div class="flex gap-1 w-full lg:w-auto" style="width: 286px;">
                        <a target="_blank" href="https://b2b.prarang.in/login?lt=partner"
                            class="flex-1 text-center bg-amber-400 hover:bg-amber-500 text-black text-[12px] font-bold rounded shadow hover:shadow-md transition-all"
                            style="display:flex; align-items:center; justify-content:center; min-height:34px; line-height:1; text-decoration:none; height: 30px;">Business
                            Login</a>
                        <a target="_blank" href="https://b2b.prarang.in/login?lt=g2c"
                            class="flex-1 text-center bg-amber-400 hover:bg-amber-500 text-black text-[12px] font-bold rounded shadow hover:shadow-md transition-all"
                            style="display:flex; align-items:center; justify-content:center; min-height:34px; line-height:1; text-decoration:none; height: 30px;">Govt./NGO
                            Login</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER : end -->
        <div class="header-background header-background--singled" style="display: none;">
            <div class="header-background__image header-background__image--default"
                style="background-image: url('{{ !empty($main->header_image) ? Storage::url($main->header_image) : asset('images/default.jpg') }}');">
            </div>
        </div>

        <!-- CORE : begin -->
        <div id="core">
            <div class="core__inner">
                <!-- COLUMNS : begin -->
                <div id="columns">
                    <div class="columns__inner">
                        <div class="lsvr-container">
                            <div class="lsvr-grid">
                                <div class="columns__main lsvr-grid__col lsvr-grid__col--span-6 lsvr-grid__col--push-3 middle-section"
                                    style="margin-top: 21px;">
                                    <!-- MAIN : begin -->
                                    <main id="main">
                                        <div class="main__inner">
                                            <div class="post-207 page type-page status-publish hentry">
                                                <div class=" my-3 rounded shadow">
                                                    <img class="rounded shadow"
                                                        src="{{ !empty($main->header_image) ? Storage::url($main->header_image) : asset('images/default.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div
                                                    class="page__content rounded-lg shadow bg-light p-3 text-sm text-justify mb-3">
                                                    <p>
                                                        @foreach ($pageSlm['sentences'] as $sentence)
                                                            {!! $sentence !!}
                                                        @endforeach
                                                    </p>
                                                </div>
                                                @if ($main->is_active)
                                                    <!-- CATEGORY CONTENT : begin -->
                                                    <div class="page__content">
                                                        <x-portal.posts-carousel
                                                            cityId="{{ $main->content_country_code ?? 'CON24' }}"
                                                            cityCode="{{ $main->content_country_code ?? 'CON24' }}"
                                                            :locale="$locale" />
                                                        <!-- TOWNPRESS SITEMAP : begin -->
                                                        <x-portal.nep-tag-list :cityId="$main->content_country_code" :cityCode="$main->content_country_code"
                                                            :citySlug="$main->slug" :locale="$locale" />
                                                    </div>
                                                    <!-- CATEGORY CONTENT : end -->
                                                @else
                                                    <x-portal.connection-box :main="$main" :primary="$primary"
                                                        :secondary="$secondary" :locale="$locale" />
                                                @endif

                                            </div>

                                        </div>
                                        <div class="shadow mt-2 bg-light">
                                            <h3 class="text-center h5 fw-bold ">Knowledge By Comparison A.I.</h3>
                                            <div class="comparison-links-new px-3 pb-2">
                                                <a class="comparison-btn" target="_blank"
                                                    href="{{ url(
                                                        '/' .
                                                            $primary->country_name .
                                                            '/' .
                                                            $secondary->country_name .
                                                            "
                                                                                                                                  /country-comparison/" .
                                                            $secondary->anlytics_code .
                                                            '/' .
                                                            $primary->anlytics_code,
                                                    ) }}">
                                                    <strong>Country Comparison :&nbsp;</strong> <span>Compare
                                                        {{ $secondary->country_name }} and {{ $primary->country_name }}
                                                        with Other Countries</span>
                                                </a>

                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="flex flex-col">
                                                        <h4 class="text-center fw-bold">Development Planners</h4>
                                                        <a class="planner-btns btn btn-primary" target="_blank"
                                                            href="https://g2c.prarang.in/world/development-planner?country={{ $primary->anlytics_code }}"
                                                            target="_blank">World
                                                        </a>
                                                        <a class="planner-btns btn btn-primary" target="_blank"
                                                            href="https://g2c.prarang.in/india/development-planners">India</a>
                                                    </div>
                                                </div>
                                                <div class=" col-sm-6">
                                                    <div class="flex flex-col">

                                                        <h4 class="text-center fw-bold">Market Planners</h4>
                                                        <a class="planner-btns btn btn-primary " target="_blank"
                                                            href="https://g2c.prarang.in/world/market-planner?country={{ $primary->anlytics_code }}">World
                                                        </a>
                                                        <a class="planner-btns btn btn-primary" target="_blank"
                                                            href="https://g2c.prarang.in/india/market-planner/states">India</a>

                                                    </div>
                                                </div>

                                                @php
                                                    $isActive=$main->is_active
                                                @endphp
                                                <x-portal.ai-reports :primary="$primary" :secondary="$secondary"
                                                    :cities="$indianCities" :zone="$stateZones" :isActive="$isActive" />
                                            </div>

                                        </div>

                                        {{--
                    <x-portal.ai-reports :primary="$primary" :secondary="$secondary" :cities="$indianCities"
                      :zone="$stateZones" /> --}}
                                        <section class="mt-3">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="widget lsvr-townpress-analytics-widget lsvr-townpress-analytics-widget--has-background shadow-sm mb-4 border rounded"
                                                        id="-analytics-widget">
                                                        <div class="widget__inner p-3">
                                                            <h3
                                                                class="widget__title widget__title--has-icon ps-2 mb-3 text-center text-secondary fw-bold">
                                                                {{-- <i class="fa fa-line-chart me-2"></i> --}}
                                                                {{ $primary->country_name ?? 'N/A' }} Data Analytics
                                                            </h3>
                                                            <div class="widget__content text-center">
                                                                <x-portal.cityanaytics :title="$primary->country_name ?? 'N/A'"
                                                                    :code="$primary->analytics_slug ?? 'country'" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="widget lsvr-townpress-analytics-widget lsvr-townpress-analytics-widget--has-background shadow-sm mb-4 border rounded"
                                                        id="-analytics-widget">
                                                        <div class="widget__inner p-3">
                                                            <h3
                                                                class="widget__title widget__title--has-icon ps-2 mb-3 text-center text-secondary fw-bold">
                                                                {{-- <i class="fa fa-line-chart me-2"></i> --}}
                                                                {{ $secondary->country_name ?? 'N/A' }} Data Analytics
                                                            </h3>
                                                            <div class="widget__content text-center">

                                                                <x-portal.cityanaytics :title="$secondary->country_name ?? 'N/A'"
                                                                    :code="$secondary->analytics_slug ?? 'country'" :isActive="$main->is_analytics_active" />

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </main>
                                    <!-- MAIN : end -->
                                </div>
                                <div
                                    class="columns__sidebar columns__sidebar--left lsvr-grid__col lsvr-grid__col--span-3 lsvr-grid__col--pull-6 left-section">
                                    <!-- LEFT SIDEBAR : begin -->
                                    <x-biletral-portal-aside :data="$primary" side="left" :main="$main" />
                                    <!-- LEFT SIDEBAR : end -->
                                </div>
                                <div
                                    class="columns__sidebar columns__sidebar--right lsvr-grid__col lsvr-grid__col--span-3 right-section">
                                    <x-biletral-portal-aside :data="$secondary" side="right" :main="$main" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        #wrapper footer .row .col p {
                            margin-bottom: 5px !important;
                        }
                    </style>

                    <footer class="portal-footer">
                        <div class="container py-5">
                            <div class="row g-4">
                                {{-- About Section --}}
                                <div class="col-lg-5 col-md-6 pe-lg-5">
                                    <h5 class="footer-title text-center">About Prarang</h5>
                                    <p class="footer-text text-start text-white-50"
                                        style="width: 100%; font-size: 12px;">
                                        Prarang provides integrated digital solutions and unique insights to understand
                                        the
                                        cities of India and the World. Through our composite methodology of traditional
                                        research from rare books, maps and images, a Big database of India and World
                                        Metrics, our own SLM Model based on Indian Linguistics, we provide in depth city
                                        -
                                        hyperlocal knowledge, comprehensive knowledge by comparison between cities of
                                        the
                                        world, through our content, analytics, and semiotics solutions, for governance &
                                        corporate communication, while being localisation ready for any language/script.
                                    </p>
                                </div>

                                {{-- Social Connect --}}
                                <div class="col-lg-3 col-md-6 text-center">
                                    <h5 class="footer-title">Connect With Us</h5>
                                    <div class="social-grid justify-content-center mt-3">
                                        <a href="javascript:void(0)" onclick="showComingSoon(event)"
                                            class="social-btn" title="Facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="https://www.linkedin.com/company/india-nepal/"
                                            href="javascript:void(0)" onclick="showComingSoon(event)"
                                            class="social-btn" title="X (Twitter)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16"
                                                style="display: inline-block; vertical-align: middle;">
                                                <path
                                                    d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                            </svg>
                                        </a>
                                        <a href="https://www.linkedin.com/company/india-nepal/" target="_blank"
                                            class="social-btn" title="LinkedIn">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>

                                {{-- Address Section --}}
                                <div class="col-lg-4 col-md-12">
                                    <h5 class="footer-title text-center text-md-center text-lg-start">Contact Us</h5>
                                    <ul class="list-unstyled footer-text text-white-50 text-start text-md-center text-lg-start"
                                        style="width: 100%">
                                        <li class="mb-2">
                                            <i class="fa fa-map-marker me-2 text-primary"></i>
                                            Office #25, 11th Floor, The I-Thum, A40, Sector 62<br>
                                            Noida (U.P), India 201309
                                        </li>
                                        <li class="mb-2">
                                            <i class="fa fa-phone me-2 text-primary"></i>
                                            +91-1204561284
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope me-2 text-primary"></i>
                                            <a href="mailto:ask_me@prarang.in"
                                                class="text-white-50 text-decoration-none hover-white">
                                                ask_me@prarang.in
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Bottom Copyright --}}
                        <div class="footer-bottom">
                            <div class="container text-center">
                                <p class="mb-0 text-white-50 small">
                                    © 2017 - {{ date('Y') }} Indoeuropeans India Pvt. Ltd. | All
                                    rights reserved.
                                </p>
                                <p class="mb-0 text-white-50 x-small mt-1 opacity-50">
                                    Content protected by international copyright laws.
                                </p>
                            </div>
                        </div>
                    </footer>

                    <style>
                        .portal-footer {
                            background-color: #1a1a1a;
                            background-image: linear-gradient(rgba(26, 26, 26, 0.60), rgba(26, 26, 26, 0.75)),
                                url('{{ !empty($main->footer_image) ? Storage::url($main->footer_image) : asset('images/default.jpg') }}');
                            background-size: cover;
                            background-position: center;
                            background-attachment: fixed;
                            color: #ffffff;
                            margin-top: 100px;
                            position: relative;
                            z-index: 10;
                        }

                        .footer-title {
                            font-size: 1.1rem;
                            font-weight: 700;
                            margin-bottom: 0 !important;
                            position: relative;
                            padding-bottom: 0.75rem;
                            color: #ffffff;
                        }



                        .col-md-6.text-center .footer-title::after,
                        .text-md-center .footer-title::after {
                            left: 50%;
                            transform: translateX(-50%);
                        }

                        @media (min-width: 992px) {
                            .text-lg-start .footer-title::after {
                                left: 0;
                                transform: none;
                            }
                        }

                        .footer-text {
                            font-size: 0.95rem;
                            line-height: 1.6;
                            margin-bottom: 0;
                        }

                        .social-grid {
                            display: flex;
                            gap: 1rem;
                            flex-wrap: wrap;
                        }

                        .social-btn {
                            width: 45px;
                            height: 45px;
                            border-radius: 12px;
                            background: rgba(255, 255, 255, 0.05);
                            color: #ffffff;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            text-decoration: none;
                            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                            border: 1px solid rgba(255, 255, 255, 0.1);
                            font-size: 1.1rem;
                        }

                        .social-btn:hover {
                            background: #2563eb;
                            color: #ffffff;
                            transform: translateY(-5px);
                            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.25);
                            border-color: #2563eb;
                        }

                        .footer-bottom {
                            background: #000000;
                            padding: 1.5rem 0;
                            border-top: 1px solid rgba(255, 255, 255, 0.05);
                        }

                        .hover-white:hover {
                            color: #ffffff !important;
                        }

                        .x-small {
                            font-size: 0.75rem;
                        }

                        @media (min-width: 768px) {
                            #wrapper #core .core__inner #columns .portal-footer .container .row .pe-lg-5 p {
                                width: 100% !important;
                            }
                        }

                        .portal-footer .pe-lg-5 p {
                            font-size: 12px;
                        }

                        .portal-footer .pe-lg-5 p {
                            text-align: justify !important;
                        }
                    </style>

                </div>
                <script>
                    function showComingSoon(event) {
                        event.preventDefault();

                        // Create modal HTML
                        const modalHTML = `
                            <div class="modal fade show" id="comingSoonModal" tabindex="-1" style="display: block; background: rgba(0,0,0,0.8);">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                                        <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                                            <h5 class="modal-title text-white fw-bold">
                                                <i class="fa fa-clock-o me-2"></i>Coming Soon
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" onclick="closeComingSoon()"></button>
                                        </div>
                                        <div class="modal-body text-center p-5">
                                            <p class="text-muted" style="font-size: 1.1rem;">
                                                Coming Soon...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        // Append modal to body
                        document.body.insertAdjacentHTML('beforeend', modalHTML);
                        document.body.style.overflow = 'hidden';
                    }

                    function closeComingSoon() {
                        const modal = document.getElementById('comingSoonModal');
                        if (modal) {
                            modal.classList.remove('show');
                            setTimeout(() => {
                                modal.remove();
                                document.body.style.overflow = 'auto';
                            }, 150);
                        }
                    }

                    // Close modal on backdrop click
                    document.addEventListener('click', function(event) {
                        const modal = document.getElementById('comingSoonModal');
                        if (modal && event.target === modal) {
                            closeComingSoon();
                        }
                    });
                </script>

                <script id="jquery-core-js" src="https://preview.lsvr.sk/townpress/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
                    type="text/javascript"></script>



                <script id="lsvr-townpress-main-scripts-js"
                    src="https://preview.lsvr.sk/townpress/wp-content/themes/townpress/assets/js/townpress-scripts.min.js?ver=3.8.8"
                    type="text/javascript"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
                </script>
                {!! $portal['footer_scripts'] ?? '' !!}

                <!-- Map Functionality Script -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const radios = document.querySelectorAll('input[name="countrySelect"]');
                        const mapContainer = document.getElementById('mapContainer');
                        const primaryMap = mapContainer.children[0];
                        const secondaryMap = mapContainer.children[1];

                        radios.forEach(radio => {
                            radio.addEventListener('change', function() {
                                if (this.value === 'primary') {
                                    primaryMap.style.display = 'block';
                                    secondaryMap.style.display = 'none';
                                } else {
                                    primaryMap.style.display = 'none';
                                    secondaryMap.style.display = 'block';
                                }
                            });
                        });

                        // Set default to secondary country
                        document.getElementById('countrySecondary').checked = true;
                        primaryMap.style.display = 'none';
                        secondaryMap.style.display = 'block';
                    });
                </script>


                </body>

                </html>
                </x-layout.portal.base>
