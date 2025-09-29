<x-layout.portal.base>

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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            background-color: #FFFACD !important;
            border-radius: 8px !important;
            padding: 10px !important;
            margin: 0 !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
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

            /* Mobile Clock Styling */
            #india-time,
            #czech-time {
                font-size: 1.8rem !important;
                letter-spacing: 0.5px !important;
            }

            #india-date,
            #czech-date {
                font-size: 0.85rem !important;
                padding: 6px 12px !important;
            }

            #india-time-widget .widget__title,
            #czech-time-widget .widget__title {
                font-size: 1rem !important;
            }

            #india-time::before,
            #czech-time::before {
                right: -15px !important;
                width: 6px !important;
                height: 6px !important;
            }

        }

        /* Tablet Responsive */
        @media (max-width:768px) and (min-width:481px) {

            #india-time,
            #czech-time {
                font-size: 2rem !important;
            }

            #india-date,
            #czech-date {
                font-size: 0.9rem !important;
            }
        }

        /* Large Mobile */
        @media (max-width:576px) {

            #india-time-widget,
            #czech-time-widget {
                margin-bottom: 15px !important;
            }

            #india-time,
            #czech-time {
                font-size: 1.9rem !important;
            }
        }

        /* Clock date text color - white */
        #india-date,
        #czech-date {
            color: #ffffff !important;
        }

        /* Enhanced Clock Widget Styling */
        #india-time-widget,
        #czech-time-widget {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%) !important;
            border-radius: 15px !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
            border: 1px solid rgba(255, 177, 163, 0.2) !important;
            overflow: hidden !important;
            transition: all 0.3s ease !important;
        }

        #india-time-widget:hover,
        #czech-time-widget:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15) !important;
        }

        #india-time-widget .widget__inner,
        #czech-time-widget .widget__inner {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
            position: relative !important;
        }

        #india-time-widget .widget__inner::before,
        #czech-time-widget .widget__inner::before {
            content: '' !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            height: 4px !important;
            background: linear-gradient(90deg, #007bff, #0056b3, #FFB1A3) !important;
        }

        #india-time-widget .widget__title,
        #czech-time-widget .widget__title {
            color: #2c3e50 !important;
            font-weight: 600 !important;
            font-size: 1.1rem !important;
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px) !important;
            margin-bottom: 15px !important;
        }

        #india-time-widget .widget__title i,
        #czech-time-widget .widget__title i {
            background: linear-gradient(45deg, #007bff, #0056b3) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        /* Modern Clock Display */
        #india-time,
        #czech-time {
            font-family: 'Source Sans Pro', sans-serif !important;
            font-size: 2.2rem !important;
            font-weight: 700 !important;
            color: #000000 !important;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
            letter-spacing: 1px !important;
            position: relative !important;
            display: inline-block !important;
        }

        #india-time::after,
        #czech-time::after {
            content: '' !important;
            position: absolute !important;
            bottom: -5px !important;
            left: 0 !important;
            width: 100% !important;
            height: 3px !important;
            background: linear-gradient(90deg, #000000, #333333) !important;
            border-radius: 2px !important;
            animation: shimmer 2s infinite !important;
        }

        @keyframes shimmer {
            0% {
                opacity: 0.3;
            }

            50% {
                opacity: 0.7;
            }

            100% {
                opacity: 0.3;
            }
        }

        #india-date,
        #czech-date {
            color: #6c757d !important;
            font-size: 0.95rem !important;
            font-weight: 500 !important;
            letter-spacing: 0.5px !important;
            margin-top: 8px !important;
            background: rgba(255, 255, 255, 0.7) !important;
            padding: 8px 15px !important;
            border-radius: 20px !important;
            display: inline-block !important;
            backdrop-filter: blur(5px) !important;
        }

        /* Clock Animation Effects */
        #india-time.updated,
        #czech-time.updated {
            animation: timeUpdate 0.6s ease-in-out !important;
        }

        @keyframes timeUpdate {
            0% {
                transform: scale(1) !important;
                color: #333333 !important;
            }

            50% {
                transform: scale(1.05) !important;
                color: #000000 !important;
            }

            100% {
                transform: scale(1) !important;
                color: #000000 !important;
            }
        }

        /* Second indicator pulse effect */
        #india-time,
        #czech-time {
            position: relative !important;
        }

        #india-time::before,
        #czech-time::before {
            content: '' !important;
            position: absolute !important;
            top: 50% !important;
            right: -20px !important;
            transform: translateY(-50%) !important;
            width: 8px !important;
            height: 8px !important;
            background: radial-gradient(circle, #ff6b6b 0%, #ee5a5a 70%) !important;
            border-radius: 50% !important;
            animation: pulse 1s infinite !important;
            box-shadow: 0 0 0 0 rgba(255, 107, 107, 0.7) !important;
        }

        @keyframes pulse {
            0% {
                transform: translateY(-50%) scale(0.95) !important;
                box-shadow: 0 0 0 0 rgba(255, 107, 107, 0.7) !important;
            }

            70% {
                transform: translateY(-50%) scale(1) !important;
                box-shadow: 0 0 0 10px rgba(255, 107, 107, 0) !important;
            }

            100% {
                transform: translateY(-50%) scale(0.95) !important;
                box-shadow: 0 0 0 0 rgba(255, 107, 107, 0) !important;
            }
        }

        /* Category Section Styling */
        .category-section {
            background: #ffffff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .category-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 4px solid #007bff;
            transition: all 0.3s ease;
        }

        .category-item:hover {
            background: #e3f2fd;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .category-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .category-count {
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
            transition: all 0.3s ease;
        }

        /* Progress bar custom styling */
        .progress {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            transition: width 0.6s ease;
        }

        /* Indo-Czech Info Section */
        .indo-czech-info {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 40px;
            margin-top: 30px;
        }

        .country-info {
            border-radius: 10px;
            margin-bottom: 25px;
            transition: transform 0.3s ease;
        }

        .country-info:hover {
            transform: translateY(-3px);
        }

        .relations-info {
            border-radius: 10px;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .category-section {
                padding: 15px;
                margin-bottom: 15px;
            }

            .category-item {
                padding: 15px;
                margin-bottom: 10px;
            }

            .category-title {
                font-size: 1rem;
            }

            .category-count {
                font-size: 0.9rem;
                padding: 6px 12px;
            }

            .indo-czech-info {
                padding: 20px;
            }

            .country-info {
                padding: 15px;
                margin-bottom: 15px;
            }
        }

        @media (max-width: 576px) {
            .category-item {
                padding: 12px;
            }

            .category-title {
                font-size: 0.9rem;
            }

            .category-count {
                font-size: 0.8rem;
                padding: 4px 8px;
            }

            .progress {
                height: 15px !important;
            }

            .indo-czech-info {
                padding: 15px;
            }
        }

        /* Animation for dynamic updates */
        .category-count.updated {
            animation: countUpdate 0.5s ease-in-out;
        }

        @keyframes countUpdate {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Progress bar animations */
        .progress-bar.progress-bar-striped.progress-bar-animated {
            animation: progressBarAnimation 2s linear infinite;
        }

        @keyframes progressBarAnimation {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }
    </style>
    <div id="wrapper">
        <header class="header--has-languages header--has-map" id="header">
            <div class="header__inner">
                <!-- HEADER MAP : begin -->
                <div class="header-map header-map--loading header-map--gmaps">
                    <div class="map-selector mb-3">
                        <select id="map-select" class="form-select">
                            <option value="india">{{ $primary['country_name'] ?? 'India' }} Map</option>
                            <option value="czech" selected>{{ $secondary['country_name'] ?? 'Czech Republic' }} Map
                            </option>
                        </select>
                    </div>
                    <div id="map-container">
                        <iframe id="india-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30766769.397866964!2d60.96789011826587!3d19.72500300181898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1758963998299!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" style="display: none;"></iframe>
                        <iframe id="czech-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163930.7278572508!2d14.4656836!3d50.05974005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b939c0970798b%3A0x400af0f66164090!2sPrague%2C%20Czechia!5e0!3m2!1sen!2sin!4v1758963754171!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                        <b>{{ $secondary['country_name'] ?? 'Czech Republic' }} Map</b>
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
                                        <b>{{ $secondary['country_name'] ?? 'Czech Republic' }} Map</b>
                                    </span>
                                </button>
                                <!-- HEADER MAP TOGGLE : end -->
                                <!-- HEADER SUBSCRIBE BUTTON : begin -->
                                <button type="button" class="btn btn-primary header-toolbar__item"
                                    data-bs-toggle="modal" data-bs-target="#subscribeModal">
                                    <i class="fa fa-envelope"></i>
                                    <span class="header-map-toggle__label">
                                        <b>Subscribe</b>
                                    </span>
                                </button>
                                <!-- HEADER SUBSCRIBE BUTTON : end -->
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

        <!-- SUBSCRIBE MODAL : begin -->
        <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="subscribeModalLabel">Subscribe to Our Newsletter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="subscribeForm">
                            <div class="mb-3">
                                <label for="subscriberName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="subscriberName"
                                    placeholder="Enter your full name" required>
                            </div>
                            <div class="mb-3">
                                <label for="subscriberEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="subscriberEmail"
                                    placeholder="Enter your email address" required>
                            </div>
                            <div class="alert alert-info" role="alert" id="subscribeMessage"
                                style="display: none;">
                                <i class="fa fa-info-circle"></i> Coming Soon! This feature is under development.
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="subscribeBtn">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- SUBSCRIBE MODAL : end -->

        <!-- HEADER : end -->
        <div class="header-background header-background--singled" data-slideshow-speed="10">
            <div class="header-background__image header-background__image--default"
                style="background-image: url('{{ asset('images/prarang-1.jpg') }}'); height: 120vh; min-height: 800px;">

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
                                <div class="columns__main lsvr-grid__col lsvr-grid__col--span-6 lsvr-grid__col--push-3"
                                    style="margin-top: 150px;">

                                    <!-- MAIN : begin -->
                                    <main id="main">
                                        <div class="main__inner">
                                            <div class="post-207 page type-page status-publish hentry">
                                                <!-- MAIN HEADER : begin -->
                                                <header class="main__header"
                                                    style="padding: 40px 0; text-align: center;">
                                                    <h1 class="m-0 main__title"
                                                        style="font-size: 2.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                                                        {{ $main['title'] ?? 'India-Czech' }}
                                                    </h1>
                                                    <p class="main__slogan"
                                                        style="font-size: 1.2rem; color: #fff; margin-top: 10px;">
                                                        {{ $main['slogan'] ?? 'Connecting Cultures' }}
                                                    </p>
                                                </header>
                                                <!-- MAIN HEADER : end -->

                                                <!-- CATEGORY CONTENT : begin -->
                                                <div class="page__content">
                                                    <x-portal.posts-carousel cityId="c2" cityCode="c2" />
                                                    <!-- TOWNPRESS SITEMAP : begin -->
                                                    <x-portal.tag-list cityId="CON24" cityCode="CON24"
                                                        citySlug="CON24" />
                                                </div>
                                                <!-- CATEGORY CONTENT : end -->
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
                                                        {{ $primary['country_name'] ?? 'India' }} Time (IST)
                                                    </h3>
                                                    <div class="widget__content text-center">
                                                        <div id="india-time" class="h4 text-primary">Loading...
                                                        </div>
                                                        <div id="india-date" class="text-muted"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Embassy Section -->
                                            <div class="widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background"
                                                id="india-embassy-moved">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-building-o"></i>
                                                        Embassy of India
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="embassy-content">
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title">Embassy of India</h6>
                                                                    <p class="embassy-location">Prague, Czech
                                                                        Republic</p>
                                                                    <a href="https://www.indianembassy.cz/"
                                                                        class="btn btn-warning btn-sm w-100"
                                                                        target="_blank">
                                                                        <i class="fa fa-external-link"></i> Visit
                                                                        Embassy Website
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                                id="india-weather-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-sun-o"></i>
                                                        {{ $primary['country_name'] ?? 'India' }} Weather
                                                    </h3>
                                                    <div class="widget__content text-center">
                                                        <div id="openweathermap-widget-15"
                                                            style="width: 100%; min-height: 200px; background-color: #FFFACD; border-radius: 8px; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                                            <div class="weather-widget-loading" id="loading-15">
                                                                Loading weather...</div>
                                                        </div>
                                                        <script>
                                                            window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
                                                            window.myWidgetParam.push({
                                                                id: 15,
                                                                cityid: '{{ $primary['weather_city_id'] ?? '1273294' }}',
                                                                appid: '{{ $primary['weather_api_key'] ?? 'cad83ed7af89a8aa72bcd1107d4236c5' }}',
                                                                units: 'metric',
                                                                containerid: 'openweathermap-widget-15',
                                                            });
                                                            (function() {
                                                                var script = document.createElement('script');
                                                                script.async = true;
                                                                script.charset = "utf-8";
                                                                script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
                                                                var s = document.getElementsByTagName('script')[0];
                                                                s.parentNode.insertBefore(script, s);
                                                            })();
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background"
                                                id="india-news-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-newspaper-o"></i>
                                                        {{ $primary['country_name'] ?? 'India' }} News
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="news-content"
                                                            data-news-sources="{{ $primary['news_sources'] ?? '[]' }}">
                                                            <div class="news-item mb-3">
                                                                <h6 class="news-title">Latest
                                                                    {{ $primary['country_name'] ?? 'India' }} News</h6>
                                                                <p class="news-summary">Stay updated with the latest
                                                                    news and developments from
                                                                    {{ $primary['country_name'] ?? 'India' }}.</p>
                                                                <div id="india-news-list">
                                                                    <a href="#"
                                                                        class="btn btn-primary btn-sm">Read More</a>
                                                                </div>
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
                                                        {{ $primary['country_name'] ?? 'India' }} Analytics
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="analytics-content">
                                                            <div class="analytics-item mb-3">
                                                                <div class="text-center mb-3">
                                                                    <a href="https://g2c.prarang.in/{{ $primary['analytics_slug'] ?? 'india' }}"
                                                                        target="_blank">
                                                                        <img src="https://www.prarang.in/matric-.JPG"
                                                                            alt="India Analytics"
                                                                            style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                                                    </a>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <a href="https://g2c.prarang.in/ai/{{ urlencode($primary['country_name'] ?? 'India') }}"
                                                                        class="btn btn-info btn-sm w-100"
                                                                        target="_blank">View AI Report</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background"
                                                id="india-embassy-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-building-o"></i>
                                                        Important Links for Czechs
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="embassy-content">
                                                            @php
                                                                $embassy = json_decode(
                                                                    $primary['embassy_links'] ?? '{}',
                                                                    true,
                                                                );
                                                                $touristPlaces = $embassy['tourist_places'] ?? [];
                                                                $communityPages = $embassy['community_pages'] ?? [];
                                                                $resources = $embassy['resources'] ?? [];
                                                            @endphp
                                                            <!-- Tourist Places Section -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #28a745;">
                                                                        <i class="fa fa-map-marker"></i> Popular
                                                                        Tourist Places
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (count($touristPlaces) > 0)
                                                                            @foreach ($touristPlaces as $index => $link)
                                                                                <a href="{{ $link }}"
                                                                                    class="btn btn-success btn-sm mb-2"
                                                                                    target="_blank"
                                                                                    style="width: 100%;">
                                                                                    <i class="fa fa-globe"></i> Tourist
                                                                                    Place {{ $index + 1 }}
                                                                                </a>
                                                                            @endforeach
                                                                        @else
                                                                            <a href="https://www.incredibleindia.org/"
                                                                                class="btn btn-success btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-globe"></i> Incredible
                                                                                India Portal
                                                                            </a>
                                                                            <a href="https://tourism.gov.in/"
                                                                                class="btn btn-info btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-info-circle"></i>
                                                                                Ministry of Tourism
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Czech Living Indians Section -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #17a2b8;">
                                                                        <i class="fa fa-users"></i> community pages
                                                                        of Czechs
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (count($communityPages) > 0)
                                                                            @foreach ($communityPages as $index => $link)
                                                                                <a href="{{ $link }}"
                                                                                    class="btn btn-primary btn-sm mb-2"
                                                                                    target="_blank"
                                                                                    style="width: 100%;">
                                                                                    <i class="fa fa-external-link"></i>
                                                                                    Community Page {{ $index + 1 }}
                                                                                </a>
                                                                            @endforeach
                                                                        @else
                                                                            <a href="https://www.internations.org/india-expats/czechs"
                                                                                class="btn btn-primary btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-external-link"></i>
                                                                                Internations - India Expats Czechs
                                                                            </a>
                                                                            <a href="https://www.czechtradeoffices.com/in"
                                                                                class="btn btn-secondary btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-building"></i> Czech
                                                                                Trade Offices in India
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Additional Resources -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #6f42c1;">
                                                                        <i class="fa fa-book"></i> Resources &
                                                                        Information
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (count($resources) > 0)
                                                                            @foreach ($resources as $index => $link)
                                                                                <a href="{{ $link }}"
                                                                                    class="btn btn-outline-primary btn-sm mb-2"
                                                                                    target="_blank"
                                                                                    style="width: 100%;">
                                                                                    <i class="fa fa-university"></i>
                                                                                    Resource {{ $index + 1 }}
                                                                                </a>
                                                                            @endforeach
                                                                        @else
                                                                            <a href="https://www.india.gov.in/"
                                                                                class="btn btn-outline-primary btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-university"></i>
                                                                                National Portal of India
                                                                            </a>
                                                                            <a href="https://www.mea.gov.in/"
                                                                                class="btn btn-outline-secondary btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-globe"></i> Ministry of
                                                                                External Affairs
                                                                            </a>
                                                                        @endif
                                                                    </div>
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
                                                        {{ $secondary['country_name'] ?? 'Czech Republic' }} Time
                                                        (CET/CEST)
                                                    </h3>
                                                    <div class="widget__content text-center">
                                                        <div id="czech-time" class="h4 text-primary">Loading...
                                                        </div>
                                                        <div id="czech-date" class="text-muted"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Embassy Section -->
                                            <div class="widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background"
                                                id="czech-embassy-moved">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-building-o"></i>
                                                        Embassy of Czech Republic
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="embassy-content">
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title">Embassy of Czech
                                                                        Republic</h6>
                                                                    <p class="embassy-location">New Delhi, India
                                                                    </p>
                                                                    <a href="https://www.mzv.cz/newdelhi/"
                                                                        class="btn btn-warning btn-sm w-100"
                                                                        target="_blank">
                                                                        <i class="fa fa-external-link"></i> Visit
                                                                        Embassy Website
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                            id="czech-weather-widget">
                                            <div class="widget__inner">
                                                <h3 class="widget__title widget__title--has-icon ps-2">
                                                    <i class="fa fa-sun-o"></i>
                                                    {{ $secondary['country_name'] ?? 'Czech Republic' }} Weather
                                                </h3>
                                                <div class="widget__content text-center">
                                                    <div id="openweathermap-widget-17"
                                                        style="width: 100%; min-height: 200px; background-color: #FFFACD; border-radius: 8px; padding: 10px; display: flex; align-items: center; justify-content: center;">
                                                        <div class="weather-widget-loading" id="loading-17">
                                                            Loading weather...</div>
                                                    </div>
                                                    <script>
                                                        window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
                                                        window.myWidgetParam.push({
                                                            id: 17,
                                                            cityid: '{{ $secondary['weather_city_id'] ?? '3067696' }}',
                                                            appid: '{{ $secondary['weather_api_key'] ?? 'cad83ed7af89a8aa72bcd1107d4236c5' }}',
                                                            units: 'metric',
                                                            containerid: 'openweathermap-widget-17',
                                                        });
                                                        (function() {
                                                            var script = document.createElement('script');
                                                            script.async = true;
                                                            script.charset = "utf-8";
                                                            script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
                                                            var s = document.getElementsByTagName('script')[0];
                                                            s.parentNode.insertBefore(script, s);
                                                        })();
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background"
                                            id="czech-news-widget">
                                            <div class="widget__inner">
                                                <h3 class="widget__title widget__title--has-icon ps-2">
                                                    <i class="fa fa-newspaper-o"></i>
                                                    {{ $secondary['country_name'] ?? 'Czech Republic' }} News
                                                </h3>
                                                <div class="widget__content">
                                                    <div class="news-content"
                                                        data-news-sources="{{ $secondary['news_sources'] ?? '[]' }}">
                                                        <div class="news-item mb-3">
                                                            <h6 class="news-title">Latest
                                                                {{ $secondary['country_name'] ?? 'Czech Republic' }}
                                                                News</h6>
                                                            <p class="news-summary">Stay updated with the latest news
                                                                and developments from the
                                                                {{ $secondary['country_name'] ?? 'Czech Republic' }}.
                                                            </p>
                                                            <div id="czech-news-list">
                                                                <a href="#" class="btn btn-primary btn-sm">Read
                                                                    More</a>
                                                            </div>
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
                                                    {{ $secondary['country_name'] ?? 'Czech Republic' }} Analytics
                                                </h3>
                                                <div class="widget__content">
                                                    <div class="analytics-content">
                                                        <div class="analytics-item mb-3">
                                                            <div class="text-center mb-3">
                                                                <a href="https://g2c.prarang.in/{{ $secondary['analytics_slug'] ?? 'czech-republic' }}"
                                                                    target="_blank">
                                                                    <img src="https://www.prarang.in/matric-.JPG"
                                                                        alt="Czech Analytics"
                                                                        style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                                                </a>
                                                            </div>
                                                            <div class="mt-2">
                                                                <a href="https://g2c.prarang.in/ai/{{ urlencode($secondary['country_name'] ?? 'Czech Republic') }}"
                                                                    class="btn btn-info btn-sm w-100"
                                                                    target="_blank">View AI Report</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background"
                                                id="czech-embassy-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-building-o"></i>
                                                        Important Links for Indians
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="embassy-content">
                                                            @php
                                                                $embassy = json_decode(
                                                                    $secondary['embassy_links'] ?? '{}',
                                                                    true,
                                                                );
                                                                $touristPlaces = $embassy['tourist_places'] ?? [];
                                                                $communityPages = $embassy['community_pages'] ?? [];
                                                                $resources = $embassy['resources'] ?? [];
                                                            @endphp
                                                            <!-- Tourist Places Section -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #28a745;">
                                                                        <i class="fa fa-map-marker"></i> Popular
                                                                        Tourist Places in
                                                                        {{ $secondary['country_name'] ?? 'Czech Republic' }}
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (count($touristPlaces) > 0)
                                                                            @foreach ($touristPlaces as $index => $link)
                                                                                <a href="{{ $link }}"
                                                                                    class="btn btn-success btn-sm mb-2"
                                                                                    target="_blank"
                                                                                    style="width: 100%;">
                                                                                    <i class="fa fa-globe"></i> Tourist
                                                                                    Place {{ $index + 1 }}
                                                                                </a>
                                                                            @endforeach
                                                                        @else
                                                                            <a href="https://www.visitczechia.com/"
                                                                                class="btn btn-success btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-globe"></i> Official
                                                                                Tourism Portal
                                                                            </a>
                                                                            <a href="https://www.prague.eu/"
                                                                                class="btn btn-info btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-info-circle"></i>
                                                                                Prague City Tourism
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Indians Living in Czech Section -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #17a2b8;">
                                                                        <i class="fa fa-users"></i> community pages
                                                                        of Indians
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (count($communityPages) > 0)
                                                                            @foreach ($communityPages as $index => $link)
                                                                                <a href="{{ $link }}"
                                                                                    class="btn btn-primary btn-sm mb-2"
                                                                                    target="_blank"
                                                                                    style="width: 100%;">
                                                                                    <i class="fa fa-external-link"></i>
                                                                                    Community Page {{ $index + 1 }}
                                                                                </a>
                                                                            @endforeach
                                                                        @else
                                                                            <a href="https://www.internations.org/czech-expats/indians"
                                                                                class="btn btn-primary btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-external-link"></i>
                                                                                Internations - Czech Expats Indians
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Additional Resources -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #6f42c1;">
                                                                        <i class="fa fa-book"></i> Resources &
                                                                        Information
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (count($resources) > 0)
                                                                            @foreach ($resources as $index => $link)
                                                                                <a href="{{ $link }}"
                                                                                    class="btn btn-outline-primary btn-sm mb-2"
                                                                                    target="_blank"
                                                                                    style="width: 100%;">
                                                                                    <i class="fa fa-university"></i>
                                                                                    Resource {{ $index + 1 }}
                                                                                </a>
                                                                            @endforeach
                                                                        @else
                                                                            <a href="https://www.mvcr.cz/"
                                                                                class="btn btn-outline-primary btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-university"></i>
                                                                                Ministry of Interior
                                                                            </a>
                                                                            <a href="https://www.mpsv.cz/"
                                                                                class="btn btn-outline-secondary btn-sm mb-2"
                                                                                target="_blank" style="width: 100%;">
                                                                                <i class="fa fa-briefcase"></i>
                                                                                Ministry of Labour
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
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
                    <p>Prarang provides complete information to understand cities of the country and abroad. This
                        includes knowledge web of nature-culture of the city in the local language, yellow pages of
                        the business list of the city, detailed analysis of the metrics or statistics of the city,
                        and specific symbolism received from the citizens operated by AI.</p>
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
                <p>© - {{ date('Y') }} All content on this website, such as text, graphics, logos, button
                    icons,
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

            const timeElement = document.getElementById('india-time');
            const dateElement = document.getElementById('india-date');

            // Add animation effect
            timeElement.classList.add('updated');

            // Update content
            timeElement.textContent = timeString;
            dateElement.textContent = dateString;

            // Remove animation class after animation completes
            setTimeout(() => {
                timeElement.classList.remove('updated');
            }, 600);
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

            const timeElement = document.getElementById('czech-time');
            const dateElement = document.getElementById('czech-date');

            // Add animation effect
            timeElement.classList.add('updated');

            // Update content
            timeElement.textContent = timeString;
            dateElement.textContent = dateString;

            // Remove animation class after animation completes
            setTimeout(() => {
                timeElement.classList.remove('updated');
            }, 600);
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
                const weatherScripts = document.querySelectorAll(
                    'script[src*="weather-widget-generator.js"]');
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

            // Dynamic number system for categories
            function updateCategoryNumbers() {
                const categories = {
                    'sanskriti-count': {
                        base: 2120,
                        range: 50,
                        trend: 'up'
                    },
                    'samaysima-count': {
                        base: 258,
                        range: 20,
                        trend: 'up'
                    },
                    'manav-indriya-count': {
                        base: 1039,
                        range: 30,
                        trend: 'down'
                    },
                    'manav-adhikar-count': {
                        base: 823,
                        range: 25,
                        trend: 'up'
                    },
                    'prakriti-count': {
                        base: 747,
                        range: 35,
                        trend: 'up'
                    },
                    'bhoogol-count': {
                        base: 238,
                        range: 15,
                        trend: 'down'
                    },
                    'jeev-jantu-count': {
                        base: 362,
                        range: 20,
                        trend: 'up'
                    },
                    'vanaspati-count': {
                        base: 287,
                        range: 18,
                        trend: 'down'
                    }
                };

                Object.keys(categories).forEach(id => {
                    const element = document.getElementById(id);
                    if (element) {
                        const category = categories[id];
                        const change = Math.floor(Math.random() * category.range);
                        let newValue;

                        if (category.trend === 'up') {
                            newValue = category.base + change;
                        } else {
                            newValue = category.base - change;
                        }

                        // Ensure values don't go below 100
                        newValue = Math.max(newValue, 100);

                        // Add animation effect
                        element.style.transform = 'scale(1.1)';
                        element.style.transition = 'all 0.3s ease';

                        setTimeout(() => {
                            element.textContent = newValue;
                            element.style.transform = 'scale(1)';
                        }, 150);
                    }
                });
            }

            // Initialize category numbers and set up dynamic updates
            updateCategoryNumbers();
            setInterval(updateCategoryNumbers, 5000); // Update every 5 seconds

            // Add hover effects to category items
            const categoryItems = document.querySelectorAll('.category-item');
            categoryItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 4px 15px rgba(0,0,0,0.1)';
                    this.style.transition = 'all 0.3s ease';
                });

                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });

            // Subscribe modal functionality
            const subscribeBtn = document.getElementById('subscribeBtn');
            const subscribeForm = document.getElementById('subscribeForm');
            const subscribeMessage = document.getElementById('subscribeMessage');
            const subscriberName = document.getElementById('subscriberName');
            const subscriberEmail = document.getElementById('subscriberEmail');

            if (subscribeBtn) {
                subscribeBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Validate form
                    if (!subscriberName.value.trim() || !subscriberEmail.value.trim()) {
                        alert('Please fill in all fields');
                        return;
                    }

                    // Show coming soon message
                    subscribeMessage.style.display = 'block';

                    // Disable the subscribe button
                    subscribeBtn.disabled = true;
                    subscribeBtn.innerHTML = '<i class="fa fa-check"></i> Subscribed';

                    // Close modal after 2 seconds
                    setTimeout(() => {
                        const modal = bootstrap.Modal.getInstance(document.getElementById(
                            'subscribeModal'));
                        if (modal) {
                            modal.hide();
                        }
                        // Reset form after modal closes
                        setTimeout(() => {
                            subscribeForm.reset();
                            subscribeMessage.style.display = 'none';
                            subscribeBtn.disabled = false;
                            subscribeBtn.innerHTML = 'Subscribe';
                        }, 300);
                    }, 2000);
                });
            }
        });
    </script>

    <!-- Edit Portal Data Modal -->
    <div class="modal fade" id="editPortalModal" tabindex="-1" aria-labelledby="editPortalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPortalModalLabel">Edit Portal Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPortalForm">
                        <div class="mb-3">
                            <label for="mainData" class="form-label">Main Portal Data (JSON)</label>
                            <textarea class="form-control" id="mainData" rows="3">{{ json_encode($main ?? []) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="primaryData" class="form-label">Primary Country Data (JSON)</label>
                            <textarea class="form-control" id="primaryData" rows="5">{{ json_encode($primary ?? []) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="secondaryData" class="form-label">Secondary Country Data (JSON)</label>
                            <textarea class="form-control" id="secondaryData" rows="5">{{ json_encode($secondary ?? []) }}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="savePortalData">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden button to open modal (for admin use) -->
    <button id="editPortalBtn" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999; display: none;"
        class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPortalModal">
        <i class="fa fa-edit"></i> Edit
    </button>

    <script>
        // Show edit button if user is admin (you can add your logic here)
        // For demo, show it always
        document.getElementById('editPortalBtn').style.display = 'block';

        document.getElementById('savePortalData').addEventListener('click', function() {
            const mainData = document.getElementById('mainData').value;
            const primaryData = document.getElementById('primaryData').value;
            const secondaryData = document.getElementById('secondaryData').value;

            // Here you would send the data to the server via AJAX
            // For demo, just alert
            alert('Data saved! (In real implementation, send to server)');

            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('editPortalModal'));
            modal.hide();
        });
    </script>

    </body>

    </html>
</x-layout.portal.base>
