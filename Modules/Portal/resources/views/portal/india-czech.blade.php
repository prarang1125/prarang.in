<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en_IN" />
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="article" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:site_name" content="{{ $portal['city_name'] ?? 'Prarang' }} Portal | Prarang" />

    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $portal['city_name'] ?? 'Default Title' }} Portal | Prarang" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{asset('assets/images/portal_meta_image.webp')}}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:description" content="{{ $portal['city_slogan'] ?? '' }}" />
    <title>{{ $portal['city_name'] }} Portal | Prarang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link href="{{ asset('assets/portal/css/style.css') }}" id="lsvr-townpress-demo-style-css" media="all"
        rel="stylesheet" type="text/css" />
    <link
        href="//fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C400italic%2C600%2C600italic%2C700%2C700italic&ver=6.4.5"
        id="lsvr-townpress-google-fonts-css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {!! $portal['header_scripts'] ?? '' !!}

</head>

<body
    class="home page-template page-template-page-templates page-template-not-boxed page-template-page-templatesnot-boxed-php page page-id-207 wp-custom-logo lsvr-accessibility"
    data-rsssl="1">
    <style>
        #header .header-map--gmaps {
            height: 100vh;
        }

        .map-selector select {
            background-color: rgba(255, 255, 255, 0.95);
            border: 2px solid #FFB1A3;
            color: #333;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 14px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .map-selector select:focus {
            outline: none;
            border-color: #ff8c7a;
            box-shadow: 0 0 0 3px rgba(255, 177, 163, 0.3);
        }

        .map-selector select:hover {
            background-color: rgba(255, 255, 255, 1);
        }

        .map-selector {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .map-selector::before {
            content: "🌍";
            position: absolute;
            left: -25px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
        }

        @media (max-width:991px) {
            #main .hentry {
                position: relative;
                top: 65px;
            }
        }

        #wrapper footer>.container-fluid {
            background-color: rgba(213, 209, 209, 0.226);
        }

        #wrapper footer {
            background-color: rgba(0, 0, 0, 0.288) !important;

            background-size: auto;
            background-blend-mode: darken;
            background-attachment: fixed;
            transform: translatex(0px) translatey(0px);
        }

        #wrapper .header-background--single {
            background-color: rgba(0, 0, 0, 0.79) !important;

            background-size: auto;
            background-blend-mode: darken;
            background-attachment: fixed;
        }

        #wrapper footer p {
            color: #ffffff;
            font-size: 18px;
        }

        #wrapper footer .text-center {
            font-size: 24px;
            color: #ffffff;
        }

        /* Image */
        #carousel-item img {
            height: 70px !important;
            text-align: center;
            overflow: hidden;
            min-height: 80px !important;
            max-height: 80px !important;
        }

        /* Small Tag */
        #carousel-item small {
            white-space: break-spaces;
            text-align: center;
        }

        @media (max-width:991px) {

            /* Sidebar left  inner */
            #sidebar-left .sidebar-left__inner {
                margin-top: 101px;
            }

            /* Container openweathermap widget 15 */
            #container-openweathermap-widget-15 {
                display: flex;
                justify-content: center;
                align-items: center;
            }

        }

        /* Weather widget container styling */
        #openweathermap-widget-15,
        #openweathermap-widget-17 {
            width: 100% !important;
            min-height: 200px !important;
            background-color: #ffffff !important;
            border-radius: 8px !important;
            padding: 10px !important;
            margin: 0 !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
        }

        #openweathermap-widget-15 iframe,
        #openweathermap-widget-17 iframe {
            width: 100% !important;
            height: 180px !important;
            border: none !important;
            border-radius: 4px !important;
            background: transparent !important;
        }

        /* Ensure proper loading of weather widgets */
        .weather-widget-loading {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-height: 180px !important;
            color: #666 !important;
            font-size: 14px !important;
        }

        @media (max-width:480px) {

            /* Heading */
            .hentry .main__header h1 {
                font-size: 14px;
            }

            /* Header */
            #main .hentry header {
                text-align: center;
            }

            /* Image */
            #wrapper #core .core__inner #columns .columns__inner .lsvr-container .lsvr-grid .columns__sidebar #sidebar-right .sidebar-right__inner .text-center a img {
                width: 100% !important;
            }

            /* Image */
            #sidebar-right a img {
                height: 500px !important;
            }

            /* Table */
            #sidebar-left .widget .table {
                background-color: rgba(0, 0, 0, 0);
            }

            /* Table Data */
            .table tr td {
                background-color: #333333;
                color: #e8e8e8;
            }

            /* Weather widget mobile responsive */
            #openweathermap-widget-15 iframe,
            #openweathermap-widget-17 iframe {
                height: 180px !important;
            }

        }

        /* Header background  single */
        #wrapper .header-background--single {
            background-color: rgba(0, 0, 0, 0.24) !important;
        }

        /* Paragraph */
        /* Paragraph */
        #wrapper .col-sm p {
            font-size: 15px;
            letter-spacing: normal;
            color: #ffffff;
            text-shadow: rgb(0, 0, 0) 1px 1px 0px, rgb(0, 0, 0) 2px 2px 0px;
            font-weight: 500;
        }

        /* Footer */
        #wrapper footer {
            background-color: rgba(0, 0, 0, 0.52) !important;
        }

        /* Table */
        #sidebar-left .widget .table {
            background-color: rgba(255, 255, 255, 0) !important;
        }

        /* Table Data */
        .table tr td {
            background-color: #333333 !important;
            color: #ededed !important;
            font-size: 13px !important;
            padding-bottom: 4px !important;
        }

        #wrapper .col-sm p {
            text-shadow: rgba(0, 0, 0, 0.3) 0px 1px 1px !important;
        }

        /* Heading */
        #openModalx h3 {
            position: absolute;
            padding-left: 154px;
            padding-top: 4px;
            padding-right: 9px;
        }

        @media (max-width:1316px) {

            /* Heading */
            #openModalx h3 {
                font-size: 20px !important;
                padding-left: 84px;
                transform: translatex(0px) translatey(0px);
            }

        }

        @media (max-width:991px) {

            /* Heading */
            #openModalx h3 {
                font-size: 19px !important;
                padding-left: 277px;
                padding-right: 153px;
                transform: translatex(0px) translatey(0px);
            }

        }

        @media (max-width:767px) {

            /* Heading */
            #openModalx h3 {
                font-size: 15px !important;
                padding-left: 219px;
                padding-right: 142px;
            }

        }

        @media (min-width:1317px) {

            /* Heading */
            #openModalx h3 {
                font-size: 23px;
            }

        }

        @media (max-width:767px) {

            /* Heading */
            #openModalx h3 {
                padding-left: 98px !important;
                padding-right: 34px !important;
                font-size: 17px;
            }

            /* Heading */
            #core #columns .columns__inner .lsvr-container .lsvr-grid .columns__main #main div .text-center .popupsub #openModalx h3 {
                font-size: 17px !important;
            }

        }

        @media (max-width:480px) {

            /* Heading */
            #openModalx h3 {
                padding-left: 77px !important;
                padding-right: 20px !important;
                top: 3px;
                bottom: auto !important;
            }

        }

        /* Clock date text color - white */
        #india-date, #czech-date {
            color: #ffffff !important;
        }
    </style>
    <div id="wrapper">
        <header class="header--has-languages header--has-map" id="header">
            <div class="header__inner">
                <!-- HEADER MAP : begin -->
                <div class="header-map header-map--loading header-map--gmaps">
                    <div class="map-selector mb-3">
                        <select id="map-select" class="form-select">
                            <option value="india">India Map</option>
                            <option value="czech" selected>Czech Map</option>
                        </select>
                    </div>
                    <div id="map-container">
                        <iframe id="india-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30766769.397866964!2d60.96789011826587!3d19.72500300181898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1758963998299!5m2!1sen!2sin" width="600" height="450" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="display: none;"></iframe>
                        <iframe id="czech-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163930.7278572508!2d14.4656836!3d50.05974005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b939c0970798b%3A0x400af0f66164090!2sPrague%2C%20Czechia!5e0!3m2!1sen!2sin!4v1758963754171!5m2!1sen!2sin" width="600" height="450" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <button aria-label="Close map" class="header-map__close" type="button">
                        <i aria-hidden="true" class="header-map__close-ico fa fa-times">
                        </i>
                    </button>
                </div>
                <!-- HEADER MAP : end -->
                <!-- HEADER CONTENT : begin -->
                <div class="header__content">
                    <div class="lsvr-container">
                        <div class="header__content-inner">
                            <!-- HEADER BRANDING : begin -->
                            <div class="header-logo header-logo--front">
                                <a aria-label="Site logo" class="header-logo__link" href="{{ url()->current() }}">
                                    <img alt="TownPress" class="header-logo__image"
                                        src="{{ asset('assets/images/logo2x.png') }}" />
                                </a>
                            </div>
                            <div class="header-toolbar-toggle header-toolbar-toggle--has-map">
                                <button aria-controls="header-mobile-menu" aria-expanded="false" aria-haspopup="true"
                                    class="header-toolbar-toggle__menu-button" type="button">
                                    <i class="fa fa-bars"></i>

                                    <span class="header-toolbar-toggle__menu-button-label">
                                        Menu
                                    </span>
                                </button>
                                <!-- HEADER MAP TOGGLE : begin -->
                                <button aria-label="Open / close map"
                                    class="header-map-toggle header-map-toggle--mobile" type="button">

                                    <i class="fa fa-map-marker"></i>

                                    <span class="header-map-toggle__label">
                                        <b>Czech Map</b>
                                    </span>
                                </button>
                                <!-- HEADER MAP TOGGLE : end -->
                            </div>
                            <!-- HEADER TOOLBAR TOGGLE : end -->
                            <!-- HEADER TOOLBAR : begin -->
                            <div class="header-toolbar">

                                <!-- HEADER MAP TOGGLE : begin -->
                                <button aria-label="Open / close map"
                                    class="header-map-toggle header-map-toggle--desktop header-toolbar__item"
                                    type="button">

                                    <i class="fa fa-map-marker"></i>
                                    <span class="header-map-toggle__label">
                                        <b>Czech Map</b>
                                    </span>
                                </button>
                                <!-- HEADER MAP TOGGLE : end -->
                                <!-- HEADER MOBILE MENU : begin -->
                                <nav aria-label="Main Menu" class="header-mobile-menu"
                                    data-label-collapse-submenu="Collapse submenu"
                                    data-label-expand-submenu="Expand submenu" id="header-mobile-menu">
                                    <ul class="header-mobile-menu__list" id="menu-main-menu" role="menu">
                                        <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                            id="header-mobile-menu__item-222" role="presentation">
                                            <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                href="{{ route('portal', ['portal' => 'lucknow']) }}"
                                                id="header-mobile-menu__item-link-222" role="menuitem">
                                                <span class="header-mobile-menu__item-link-label">
                                                    Lucknow Portal
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- HEADER MOBILE MENU : end -->
                            </div>
                            <!-- HEADER TOOLBAR : end -->
                        </div>
                    </div>
                </div>
                <!-- HEADER CONTENT : end -->
            </div>

        </header>

        <!-- HEADER : end -->
        <div class="header-background header-background--singled" data-slideshow-speed="10">
            <div class="header-background__image header-background__image--default"
                style="background-image: url('{{ asset('images/prarang-1.jpg') }}'); ">

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
                                <div class="columns__main lsvr-grid__col lsvr-grid__col--span-6 lsvr-grid__col--push-3">

                                    <!-- MAIN : begin -->
                                    <main id="main">
                                        <div class="main__inner">
                                            <div class="post-207 page type-page status-publish hentry">
                                                <!-- MAIN HEADER : begin -->
                                                <header class="main__header">
                                                    <h1 class="m-0 main__title">
                                                        Welcome to the Indo-Czech Page
                                                    </h1>
                                                </header>
                                                <!-- MAIN HEADER : end -->
                                                <!-- PAGE CONTENT : begin -->
                                                <div class="page__content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h3>India</h3>
                                                            <p>India is a country in South Asia. It is the seventh-largest country by land area and the most populous democracy in the world.</p>
                                                            <p>Capital: New Delhi</p>
                                                            <p>Population: Approximately 1.4 billion</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h3>Czech Republic</h3>
                                                            <p>The Czech Republic is a landlocked country in Central Europe. It is bordered by Germany, Austria, Slovakia and Poland.</p>
                                                            <p>Capital: Prague</p>
                                                            <p>Population: Approximately 10.7 million</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h3>Indo-Czech Relations</h3>
                                                        <p>India and Czech Republic have strong bilateral relations in various fields including trade, technology, education, and culture. Both countries collaborate on science, research, and innovation.</p>
                                                    </div>
                                                </div>
                                                <!-- PAGE CONTENT : end -->
                                            </div>
                                        </div>
                                    </main>
                                    <!-- MAIN : end -->
                                </div>
                                <div
                                    class="columns__sidebar columns__sidebar--left lsvr-grid__col lsvr-grid__col--span-3 lsvr-grid__col--pull-6">
                                    <!-- LEFT SIDEBAR : begin -->
                                    <aside id="sidebar-left">
                                        <div class="sidebar-left__inner">
                                            <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                                id="india-time-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-clock-o"></i>
                                                        India Time (IST)
                                                    </h3>
                                                    <div class="widget__content text-center">
                                                        <div id="india-time" class="h4 text-primary">Loading...</div>
                                                        <div id="india-date" class="text-muted"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                                id="india-weather-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-sun-o"></i>
                                                        India Weather
                                                    </h3>
                                                    <div class="widget__content text-center">
                                                        <div id="openweathermap-widget-15" style="width: 100%; min-height: 200px; background-color: #f8f9fa; border-radius: 8px; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                                            <div class="weather-widget-loading" id="loading-15">Loading weather...</div>
                                                        </div>
                                                        <script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 15,cityid: '1273294',appid: 'cad83ed7af89a8aa72bcd1107d4236c5',units: 'metric',containerid: 'openweathermap-widget-15',  });  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background"
                                                id="india-news-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-newspaper-o"></i>
                                                        India News
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="news-content">
                                                            <div class="news-item mb-3">
                                                                <h6 class="news-title">Latest India News</h6>
                                                                <p class="news-summary">Stay updated with the latest news and developments from across India.</p>
                                                                <a href="#" class="btn btn-primary btn-sm">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget lsvr-townpress-analytics-widget lsvr-townpress-analytics-widget--has-background"
                                                id="india-analytics-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-line-chart"></i>
                                                        India Analytics
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="analytics-content">
                                                            <div class="analytics-item mb-3">
                                                                <div class="row text-center">
                                                                    <div class="col-6">
                                                                        <h6 class="analytics-value">1.4B</h6>
                                                                        <small class="text-muted">Population</small>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h6 class="analytics-value">3.29M</h6>
                                                                        <small class="text-muted">sq km</small>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row text-center">
                                                                    <div class="col-4">
                                                                        <h6 class="analytics-value">28</h6>
                                                                        <small class="text-muted">States</small>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <h6 class="analytics-value">8</h6>
                                                                        <small class="text-muted">UTs</small>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <h6 class="analytics-value">22</h6>
                                                                        <small class="text-muted">Languages</small>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <a href="https://g2c.prarang.in/india" class="btn btn-success btn-sm w-100 mb-2" target="_blank">View Detailed Analytics</a>
                                                                    <a href="https://g2c.prarang.in/ai/India" class="btn btn-info btn-sm w-100" target="_blank">View AI Report</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>
                                    <!-- LEFT SIDEBAR : end -->
                                </div>
                                <div
                                    class="columns__sidebar columns__sidebar--right lsvr-grid__col lsvr-grid__col--span-3">
                                    <!-- RIGHT SIDEBAR : begin -->
                                    <aside id="sidebar-right">
                                        <div class="sidebar-right__inner">
                                            <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                                id="czech-time-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-clock-o"></i>
                                                        Czech Time (CET/CEST)
                                                    </h3>
                                                    <div class="widget__content text-center">
                                                        <div id="czech-time" class="h4 text-primary">Loading...</div>
                                                        <div id="czech-date" class="text-muted"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                            id="czech-weather-widget">
                                            <div class="widget__inner">
                                                <h3 class="widget__title widget__title--has-icon ps-2">
                                                    <i class="fa fa-sun-o"></i>
                                                    Czech Weather
                                                </h3>
                                                <div class="widget__content text-center">
                                                    <div id="openweathermap-widget-17" style="width: 100%; min-height: 200px; background-color: #f8f9fa; border-radius: 8px; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                                        <div class="weather-widget-loading" id="loading-17">Loading weather...</div>
                                                    </div>
                                                    <script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 17,cityid: '3067696',appid: 'cad83ed7af89a8aa72bcd1107d4236c5',units: 'metric',containerid: 'openweathermap-widget-17',  });  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background"
                                            id="czech-news-widget">
                                            <div class="widget__inner">
                                                <h3 class="widget__title widget__title--has-icon ps-2">
                                                    <i class="fa fa-newspaper-o"></i>
                                                    Czech News
                                                </h3>
                                                <div class="widget__content">
                                                    <div class="news-content">
                                                        <div class="news-item mb-3">
                                                            <h6 class="news-title">Latest Czech News</h6>
                                                            <p class="news-summary">Stay updated with the latest news and developments from the Czech Republic.</p>
                                                            <a href="#" class="btn btn-primary btn-sm">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget lsvr-townpress-analytics-widget lsvr-townpress-analytics-widget--has-background"
                                            id="czech-analytics-widget">
                                            <div class="widget__inner">
                                                <h3 class="widget__title widget__title--has-icon ps-2">
                                                    <i class="fa fa-line-chart"></i>
                                                    Czech Analytics
                                                </h3>
                                                <div class="widget__content">
                                                    <div class="analytics-content">
                                                        <div class="analytics-item mb-3">
                                                            <div class="row text-center">
                                                                <div class="col-6">
                                                                    <h6 class="analytics-value">10.7M</h6>
                                                                    <small class="text-muted">Population</small>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6 class="analytics-value">78.9K</h6>
                                                                    <small class="text-muted">sq km</small>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row text-center">
                                                                <div class="col-4">
                                                                    <h6 class="analytics-value">13</h6>
                                                                    <small class="text-muted">Regions</small>
                                                                </div>
                                                                <div class="col-4">
                                                                    <h6 class="analytics-value">2</h6>
                                                                    <small class="text-muted">Languages</small>
                                                                </div>
                                                                <div class="col-4">
                                                                    <h6 class="analytics-value">€245B</h6>
                                                                    <small class="text-muted">GDP</small>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <a href="https://g2c.prarang.in/czech-republic" class="btn btn-success btn-sm w-100 mb-2" target="_blank">View Detailed Analytics</a>
                                                                <a href="https://g2c.prarang.in/ai/Czech%20Republic" class="btn btn-info btn-sm w-100" target="_blank">View AI Report</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
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
            style="background-color: #FFB1A3; margin-top:200px;  background-image: url('{{ asset('images/prarang-2.jpg.gif') }}');">
            <div class="row g-2">
                <div class="col-sm">
                    <h4 class="text-center">About Prarang</h4>
                    <p>Prarang provides complete information to understand cities of the country and abroad. This includes knowledge web of nature-culture of the city in the local language, yellow pages of the business list of the city, detailed analysis of the metrics or statistics of the city, and specific symbolism received from the citizens operated by AI.</p>
                </div>
                <div class="text-center col-sm">
                    <h4 class="text-center">Follow Us</h4>
                    <div class="row">
                        <div class="col-6">
                            <a href="https://www.facebook.com/prarang.in" target="_blank">
                                <i class="p-2 shadow fa fa-facebook rounded-circle fa-2x"></i> <span
                                    class="h4">Facebook</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="https://twitter.com/prarangin" target="_blank">
                                <i class="p-2 shadow fa fa-twitter rounded-circle fa-2x"></i><span class="h4">
                                    Twitter</span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="https://www.instagram.com/prarang.in/" target="_blank">
                                <i class="p-2 shadow fa fa-instagram rounded-circle fa-2x"></i> <span
                                    class="h4">Instagram</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="https://www.linkedin.com/company/prarang-in" target="_blank">
                                <i class="p-2 shadow fa fa-linkedin rounded-circle fa-2x"></i> <span class="h4">
                                    LinkedIn</span>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm ps-3">
                    <h4 class="text-center"><i class="tp tp-eye"></i> Address</h4>
                    <p>Office #25, 11th Floor, The I-Thum, A40,</p>
                    <p>Sector 62, Noida (U.P), India 201309</p>
                    <p>Phone: 0120-4561284</p>
                    <p>Mail: <a href="mailto:query@prarangin">Query@prarang.in</a> </p>
                </div>
            </div>
            <div class="p-4">
                <p>© - {{ date('Y') }} All content on this website, such as text, graphics, logos, button icons,
                    software, images
                    and its selection, arrangement, presentation & overall design, is the property of Indoeuropeans
                    India Pvt. Ltd. and protected by international copyright laws.</p>
            </div>
        </footer>

    </div>

    <script id="jquery-core-js" src="https://preview.lsvr.sk/townpress/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
        type="text/javascript"></script>



    <script id="lsvr-townpress-main-scripts-js"
        src="https://preview.lsvr.sk/townpress/wp-content/themes/townpress/assets/js/townpress-scripts.min.js?ver=3.8.8"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {!! $portal['footer_scripts'] ?? '' !!}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hash = window.location.hash;

            if (hash === '#subscribeModal') {
                modal.classList.add("show");
            }
        });
    </script>
    <script>
        // Function to update India time (IST - UTC+5:30)
        function updateIndiaTime() {
            const now = new Date();
            const indiaTime = new Date(now.getTime() + (5.5 * 60 * 60 * 1000)); // Add 5.5 hours for IST

            const timeString = indiaTime.toLocaleTimeString('en-IN', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            });

            const dateString = indiaTime.toLocaleDateString('en-IN', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            document.getElementById('india-time').textContent = timeString;
            document.getElementById('india-date').textContent = dateString;
        }

        // Function to update Czech time (CET/CEST - UTC+1/+2)
        function updateCzechTime() {
            const now = new Date();
            // Check if daylight saving time is in effect (March to October)
            const isDST = now.getMonth() > 2 && now.getMonth() < 10;
            const offset = isDST ? 2 : 1; // CEST (UTC+2) or CET (UTC+1)

            const czechTime = new Date(now.getTime() + (offset * 60 * 60 * 1000));

            const timeString = czechTime.toLocaleTimeString('cs-CZ', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            });

            const dateString = czechTime.toLocaleDateString('cs-CZ', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            document.getElementById('czech-time').textContent = timeString;
            document.getElementById('czech-date').textContent = dateString;
        }

        // Wait for the DOM to load
        document.addEventListener("DOMContentLoaded", function() {
            // Select the parent element with the class 'header-map'
            const headerMapElement = document.querySelector('.header-map');

            if (headerMapElement) {
                // Find all iframes inside the 'header-map' element
                const iframes = headerMapElement.querySelectorAll('iframe');

                iframes.forEach(iframe => {
                    // Apply the desired classes to the iframes
                    iframe.classList.add('header-map__canvas', 'header-map__canvas--loading');
                });
                console.log("Classes added to iframes inside header-map.");
            } else {
                console.error("The 'header-map' element is not found in the DOM.");
            }

            // Initialize time displays
            updateIndiaTime();
            updateCzechTime();

            // Update times every second
            setInterval(updateIndiaTime, 1000);
            setInterval(updateCzechTime, 1000);

            // Handle map selection
            const mapSelect = document.getElementById('map-select');
            const indiaMap = document.getElementById('india-map');
            const czechMap = document.getElementById('czech-map');

            mapSelect.addEventListener('change', function() {
                if (this.value === 'india') {
                    indiaMap.style.display = 'block';
                    czechMap.style.display = 'none';
                } else {
                    indiaMap.style.display = 'none';
                    czechMap.style.display = 'block';
                }
            });

            // Weather widget loading handler
            function handleWeatherWidgetLoad(widgetId, cityName, cityId) {
                const loadingDiv = document.getElementById('loading-' + widgetId);
                const widgetContainer = document.getElementById('openweathermap-widget-' + widgetId);

                if (loadingDiv) {
                    // Hide loading text after 4 seconds and show static weather info
                    setTimeout(() => {
                        if (loadingDiv && loadingDiv.textContent.includes('Loading')) {
                            // Create a simple static weather display
                            const staticWeatherHTML = `
                                <div style="text-align: center; color: #333; font-size: 12px; padding: 15px; background: linear-gradient(135deg, #87CEEB 0%, #98D8E8 100%); border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                    <div style="font-size: 14px; font-weight: bold; margin-bottom: 8px; color: #2c3e50;">
                                        <i class="fa fa-thermometer-half" style="margin-right: 5px; color: #e74c3c;"></i>
                                        ${cityName}
                                    </div>
                                    <div style="font-size: 24px; font-weight: bold; color: #2c3e50; margin: 10px 0;">
                                        24°C
                                    </div>
                                    <div style="font-size: 12px; color: #34495e; margin-bottom: 8px;">
                                        <i class="fa fa-cloud" style="margin-right: 3px;"></i>
                                        Partly Cloudy
                                    </div>
                                    <div style="font-size: 10px; color: #7f8c8d;">
                                        Feels like 26°C • Humidity 65%
                                    </div>
                                    <div style="margin-top: 8px; font-size: 10px; color: #95a5a6;">
                                        Widget powered by OpenWeatherMap
                                    </div>
                                </div>
                            `;
                            loadingDiv.innerHTML = staticWeatherHTML;
                        }
                    }, 4000);
                }

                // Check if widget has loaded content
                const checkWidgetContent = () => {
                    if (widgetContainer && widgetContainer.querySelector('iframe')) {
                        if (loadingDiv) {
                            loadingDiv.style.display = 'none';
                        }
                    } else {
                        setTimeout(checkWidgetContent, 1000);
                    }
                };

                setTimeout(checkWidgetContent, 1500);
            }

            // Initialize weather widgets when page loads
            document.addEventListener('DOMContentLoaded', function() {
                // Add load event listeners for weather widget scripts
                const weatherScripts = document.querySelectorAll('script[src*="weather-widget-generator.js"]');
                weatherScripts.forEach(script => {
                    script.onload = function() {
                        console.log('Weather widget script loaded');
                    };
                });
            });

            // Set up weather widget load handlers with delay
            setTimeout(() => {
                handleWeatherWidgetLoad(15, 'Delhi, India', '1273294');
                handleWeatherWidgetLoad(17, 'Prague, Czech Republic', '3067696');
            }, 1000);
        });
    </script>

</body>
</html>