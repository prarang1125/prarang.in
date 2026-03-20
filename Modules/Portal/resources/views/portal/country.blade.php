<x-layout.portal.country_base>

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

    #columns .lsvr-grid > .lsvr-grid__col {
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
                            <button
                                class="px-4 py-1 rounded-full text-xs font-bold bg-blue-600 text-white shadow-sm">EN</button>
                            <button onclick="showComingSoonToast('Czech Language Content - Coming Soon.')"
                                class="px-4 py-1 rounded-full text-xs font-bold text-gray-500 hover:bg-gray-200 transition-colors">HI</button>
                        </div>
                        {{-- <a
                            class="flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all shadow-md group"
                            href="{{ url($main->slug) }}/all-posts">
                        <span class="text-sm font-bold">All Posts</span>
                        </a> --}}
                    </div>
                </div>

                <!-- Central Title Banner -->
                <div class="flex-grow flex items-center justify-center">
                    @livewire('portal.subscribe')
                </div>

                <!-- Right Side: Stats & Logins -->
                {{-- <div class="flex flex-col gap-3 w-full lg:w-auto">
                    <!-- Stats Grid -->
                    <div class="bg-slate-900 text-white p-3 rounded-lg border border-slate-700 shadow-inner">
                        <div class="grid grid-cols-1 gap-2 text-[11px]">
                            <div class="flex justify-between items-center gap-4">
                                <span class="opacity-80">Subscribers:</span>
                                <span class="font-mono font-bold text-green-400" id="city-subscriber-count">12</span>
                            </div>
                            <div class="flex justify-between items-center gap-4 border-t border-slate-800 ">
                                <span class="opacity-80">Monthly Website Reach:</span>
                                <span class="font-mono font-bold text-blue-400" id="city-monthly-count">32</span>
                            </div>
                            <div class="flex justify-between items-center gap-4 border-t border-slate-800">
                                <span class="opacity-80">Daily Readers:</span>
                                <span class="font-mono font-bold text-amber-400" id="city-daily-count">8</span>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Login Buttons -->
                    <div class="flex gap-2 w-full lg:w-auto" style="width: 286px">
                        <a target="_blank" href="https://b2b.prarang.in/login?lt=partner"
                            class="flex-1 text-center bg-amber-400 hover:bg-amber-500 text-black text-xs font-bold rounded shadow hover:shadow-md transition-all"
                            style="display:flex; align-items:center; justify-content:center; min-height:56px; line-height:1.2; text-decoration:none; height: 48px !important;">Business Login</a>
                        <a target="_blank" href="https://b2b.prarang.in/login?lt=g2c"
                            class="flex-1 text-center bg-amber-400 hover:bg-amber-500 text-black text-xs font-bold rounded shadow hover:shadow-md transition-all"
                            style="display:flex; align-items:center; justify-content:center; min-height:56px; line-height:1.2; text-decoration:none; height: 48px !important;">Govt./NGO Login</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- MAP MODAL -->
        <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mapModalLabel">
                            <i class="fa fa-map-marker me-2"></i>Country Maps
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label d-block mb-2">Select Country:</label>
                            <div id="countrySelectGroup">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="countrySelect"
                                        id="countryPrimary" value="primary">
                                    <label class="form-check-label"
                                        for="countryPrimary">{{ $primary->country_name ?? 'Primary Country' }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="countrySelect"
                                        id="countrySecondary" value="secondary">
                                    <label class="form-check-label"
                                        for="countrySecondary">{{ $secondary->country_name ?? 'Secondary Country' }}</label>
                                </div>
                            </div>
                        </div>


                        <div id="mapContainer"
                            style="width: 100%; height: 500px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden;">
                            {!! $primary->maps ?? '' !!}

                            {!! $secondary->maps ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- HEADER : end -->
        <div class="header-background header-background--singled" style="display: none;">
            <div class="header-background__image header-background__image--default"
                style="background-image: url('{{ Storage::url($main->header_image) }}');">
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
                                                        src="{{ Storage::url($main->header_image) }}" alt="">
                                                </div>
                                                <!-- MAIN HEADER : begin -->
                                                {{-- <header class="main__header"
                                                    style="padding: 40px 0; text-align: center;">
                                                    <h1 class="m-0 main__title"
                                                        style="font-size: 2.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                                                        {{ $main->title ?? 'India-Pakistan' }}
                                                    </h1>
                                                    <p class="main__slogan"
                                                        style="font-size: 1.2rem; color: #fff; margin-top: 10px;">
                                                        {{ $main->slogan ?? 'India & Pakistan Relations' }}
                                                    </p>
                                                </header> --}}
                                                <!-- MAIN HEADER : end -->

                                                <!-- CATEGORY CONTENT : begin -->
                                                <div class="page__content">
                                                    <x-portal.posts-carousel
                                                        cityId="{{ $main->content_country_code ?? 'CON24' }}"
                                                        cityCode="{{ $main->content_country_code ?? 'CON24' }}"
                                                        :locale="$locale" />
                                                    <!-- TOWNPRESS SITEMAP : begin -->
                                                    <x-portal.tag-list :cityId="$main->content_country_code" :cityCode="$main->content_country_code"
                                                        :citySlug="$main->slug" :locale="$locale" />
                                                </div>
                                                <!-- CATEGORY CONTENT : end -->
                                            </div>


                                        </div>
                                        <div class="shadow mt-2 bg-light">
                                            <h3 class="text-center h5 fw-bold ">Knowledge By Comparison A.I.</h3>
                                            <div class="comparison-links-new px-3 pb-2">
                                                <a class="comparison-btn" target="_blank"
                                                    href="{{ url('/nepal-country-comparison') }}">
                                                    <strong>Country Comparison :&nbsp;</strong> <span>Compare Czech
                                                        with
                                                        Other
                                                        Countries</span>
                                                </a>
                                                <a class="comparison-btn mt-2" href="javascript:void(0)"
                                                    onclick="showComingSoon(event)">
                                                    <strong>India-Nepal Comparison :&nbsp;</strong> <span>Compare Nepal
                                                        with
                                                        Indian Regions</span>
                                                </a>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="flex flex-col">
                                                        <h4 class="text-center fw-bold">Development Planners</h4>
                                                        <a class="planner-btns btn btn-primary" target="_blank"
                                                            href="https://g2c.prarang.in/world/development-planner">World
                                                        </a>
                                                        <a class="planner-btns btn btn-primary" target="_blank"
                                                            href="https://g2c.prarang.in/india/development-planners">India</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="flex flex-col">

                                                        <h4 class="text-center fw-bold">Market Planners</h4>
                                                        <a class="planner-btns btn btn-primary " target="_blank"
                                                            href="https://g2c.prarang.in/world/market-planner">World
                                                        </a>
                                                        <a class="planner-btns btn btn-primary" target="_blank"
                                                            href="https://g2c.prarang.in/india/market-planner/states">India</a>

                                                    </div>
                                                </div>
                                                <x-portal.ai-reports :primary="$primary" :secondary="$secondary"
                                                    :cities="$indianCities" :zone="$stateZones" />
                                            </div>

                                        </div>

                                        {{-- <x-portal.ai-reports :primary="$primary" :secondary="$secondary" :cities="$indianCities"
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
                                                                    :code="$secondary->analytics_slug ?? 'country'" />

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
                                    <x-biletral-portal-aside :data="$primary" side="left" />
                                    <!-- LEFT SIDEBAR : end -->
                                </div>
                                <div
                                    class="columns__sidebar columns__sidebar--right lsvr-grid__col lsvr-grid__col--span-3 right-section">
                                    <x-biletral-portal-aside :data="$secondary" side="right" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        #wrapper footer .row .col p {
                            margin-bottom: 5px !important;
                        }
                    </style>

                    <footer class="p-4 ps-4 pe-4"
                        style="background-color: #FFB1A3; margin-top:200px;  background-image: url('{{ Storage::url($main->footer_image) }}');">
                        <div class="row g-2">
                            <div class="col-sm">
                                <h4 class="text-center h4">About Prarang</h4>
                                <p>Prarang provides integrated digital solutions and unique insights to understand the
                                    cities of India and the World. Through our composite methodology of traditional
                                    research from rare books, maps and images, a Big database of India and World
                                    Metrics, our own SLM Model based on Indian Linguistics, we provide in depth city -
                                    hyperlocal knowledge, comprehensive knowledge by comparison between cities of the
                                    world, through our content, analytics, and semiotics solutions, for governance &
                                    corporate communication, while being localisation ready for any language/script.
                                </p>
                            </div>
                            <div class="text-center col-sm">
                                <h4 class="text-center h4">Follow Us</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0)" onclick="showComingSoon(event)" target="_blank">
                                            <i class="p-2 shadow fa fa-facebook rounded-circle fa-2x"></i> <span
                                                class="h4">Facebook</span>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0)" onclick="showComingSoon(event)" target="_blank">
                                            <img width="30"
                                                src="https://images.freeimages.com/image/grids/9fe/x-twitter-light-grey-logo-5694251.png"><span
                                                class="h4">
                                                Twitter</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <a href=" https://www.instagram.com/prarang_in/?hl=en" target="_blank">
                                            <i class="p-2 shadow fa fa-instagram rounded-circle fa-2x"></i> <span
                                                class="h4">Instagram</span>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="https://www.linkedin.com/company/indeur-prarang/" target="_blank">
                                            <i class="p-2 shadow fa fa-linkedin rounded-circle fa-2x"></i> <span
                                                class="h4">
                                                LinkedIn</span>

                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm ps-3">
                                <h4 class="text-center h4"><i class="tp tp-eye"></i> Address</h4>
                                <p class="text-center">Office #25, 11th Floor, The I-Thum, A40,</p>
                                <p class="text-center">Sector 62, Noida (U.P), India 201309</p>
                                <p class="text-center">Phone: 0120-4561284</p>
                                <p class="text-center">Mail: <a href="mailto:query@prarangin">Query@prarang.in</a>
                                </p>
                            </div>
                        </div>
                        <div class="p-4">
                            <p>© - {{ date('Y') }} All content on this website, such as text, graphics, logos,
                                button
                                icons,
                                software, images
                                and its selection, arrangement, presentation & overall design, is the property of
                                Indoeuropeans
                                India Pvt. Ltd. and protected by international copyright laws.</p>
                        </div>
                    </footer>

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
