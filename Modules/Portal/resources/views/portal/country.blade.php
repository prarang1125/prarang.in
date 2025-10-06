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

        /* Header background  image */
        .header-background__image {
            background-size: contain;
            background-attachment: fixed;
            background-position-y: -30px;
            background-blend-mode: overlay;
            background-color: rgba(0, 0, 0, 0.25);
        }

        /* Header */
        #main .hentry header {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        /* Column 6/12 */
        #core .lsvr-grid .columns__main {
            margin-top: 8px !important;
        }

        /* Columns  inner */
        #columns .columns__inner {
            position: relative;
            top: 50px;

        }

        /* Footer */
        #wrapper footer {
            background-size: cover !important;
            background-position-y: -60px;
        }
    </style>

    <style>
        /* Column 6/12 */
        /* #core .lsvr-grid .columns__main {
            position: sticky;
            top: 2px;
        } */

        /* Lsvr grid */
        /* #core .lsvr-grid {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: normal;
        } */


        /* Column 6/12 */
        /* #core .lsvr-grid .columns__main {
            left: 413px;

        } */
        /* #core .lsvr-grid .columns__main {
            justify-content: center;
        } */
        /* Text center */
        #main .shadow h3.text-center {
            font-weight: 600;
            color: #020202;
        }

        /* Widget Title */
        #-analytics-widget h3 {
            transform: translatex(0px) translatey(0px);
            color: #020202 !important;
        }

        /* Widget Title */
        #left-news-widget h3 {
            color: #0c18b9 !important;
        }

        /* Widget Title */
        #right-news-widget h3 {
            color: #0d34a9 !important;
        }
    </style>
    <div id="wrapper">
        <header class="header--has-languages header--has-map" id="header">
            <div class="header__inner">
                <!-- HEADER MAP : begin -->
                <div class="header-map header-map--loading header-map--gmaps">
                    <div class="map-selector mb-3">
                        <select id="map-select" class="form-select">
                            <option value="india">{{ $primary->country_name ?? 'India' }} Map</option>
                            <option value="secondary" selected>{{ $secondary->country_name ?? 'Pakistan' }} Map
                            </option>
                        </select>
                    </div>
                    <div id="map-container">
                        <iframe id="india-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30766769.397866964!2d60.96789011826587!3d19.72500300181898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1758963998299!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" style="display: none;"></iframe>
                        <iframe id="secondary-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7215464.636316154!2d67.00576915!3d30.3753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38db52d2f8fd751f%3A0x46b7a1f7e614925c!2sPakistan!5e0!3m2!1sen!2sin!4v1758963754171!5m2!1sen!2sin"
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
                                        <b>{{ $secondary->country_name ?? 'Pakistan' }} Map</b>
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
                                        <b>{{ $secondary->country_name ?? 'Pakistan' }} Map</b>
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
                style="background-image: url('{{ Storage::url($main->header_image) }}'); height: 120vh; min-height: 800px;">
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
                                                        {{ $main->title ?? 'India-Pakistan' }}
                                                    </h1>
                                                    <p class="main__slogan"
                                                        style="font-size: 1.2rem; color: #fff; margin-top: 10px;">
                                                        {{ $main->slogan ?? 'India & Pakistan Relations' }}
                                                    </p>
                                                </header>
                                                <!-- MAIN HEADER : end -->

                                                <!-- CATEGORY CONTENT : begin -->
                                                <div class="page__content">
                                                    <x-portal.posts-carousel
                                                        cityId="{{ $main->content_country_code ?? 'CON24' }}"
                                                        cityCode="{{ $main->content_country_code ?? 'CON24' }}" />
                                                    <!-- TOWNPRESS SITEMAP : begin -->
                                                    <x-portal.tag-list
                                                        cityId="{{ $main->content_country_code ?? 'CON2' }}"
                                                        cityCode="{{ $main->content_country_code ?? 'CON2' }}"
                                                        citySlug="{{ $main->content_country_code ?? 'CON2' }}" />
                                                </div>
                                                <!-- CATEGORY CONTENT : end -->
                                            </div>


                                        </div>
                                        <div class=" shadow  mt-3 pb-2">
                                            <h3 class="text-center h2">UPMANA - Knowledge By Comparison</h3>
                                            <div class="text-center my-4">
                                                <a href="https://www.prarang.in/ai/upmana" target="_blank"
                                                    class="btn btn-success">
                                                    Try now <i class="fa fa-external-link ms-2"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </div>

                                        </div>
                                        <section class="mt-3">


                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="widget lsvr-townpress-analytics-widget lsvr-townpress-analytics-widget--has-background shadow-sm mb-4 border rounded"
                                                        id="-analytics-widget">
                                                        <div class="widget__inner p-3">
                                                            <h3
                                                                class="widget__title widget__title--has-icon ps-2 mb-3 text-center text-secondary fw-bold">
                                                                <i class="fa fa-line-chart me-2"></i>
                                                                {{ $primary->country_name ?? 'N/A' }} Analytics
                                                            </h3>
                                                            <div class="widget__content text-center">
                                                                <div class="analytics-content">
                                                                    <a href="https://g2c.prarang.in/{{ $primary->analytics_slug ?? 'country' }}"
                                                                        target="_blank">
                                                                        <img src="https://www.prarang.in/matric-.JPG"
                                                                            alt="{{ $primary->country_name ?? 'Country' }} Analytics"
                                                                            class="img-fluid rounded shadow-sm mb-3 border">
                                                                    </a>
                                                                    <a href="https://g2c.prarang.in/ai/{{ urlencode($primary->country_name ?? 'Country') }}"
                                                                        class="btn btn-info btn-sm w-100 fw-semibold"
                                                                        target="_blank">
                                                                        <i class="fa fa-robot me-1"></i> View AI Report
                                                                    </a>
                                                                </div>
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
                                                                <i class="fa fa-line-chart me-2"></i>
                                                                {{ $secondary->country_name ?? 'N/A' }} Analytics
                                                            </h3>
                                                            <div class="widget__content text-center">
                                                                <div class="analytics-content">
                                                                    <a href="https://g2c.prarang.in/{{ $secondary->analytics_slug ?? 'country' }}"
                                                                        target="_blank">
                                                                        <img src="https://www.prarang.in/matric-.JPG"
                                                                            alt="{{ $secondary->country_name ?? 'Country' }} Analytics"
                                                                            class="img-fluid rounded shadow-sm mb-3 border">
                                                                    </a>
                                                                    <a href="https://g2c.prarang.in/ai/{{ urlencode($secondary->country_name ?? 'Country') }}"
                                                                        class="btn btn-info btn-sm w-100 fw-semibold"
                                                                        target="_blank">
                                                                        <i class="fa fa-robot me-1"></i> View AI Report
                                                                    </a>
                                                                </div>
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
                                    class="columns__sidebar columns__sidebar--left lsvr-grid__col lsvr-grid__col--span-3 lsvr-grid__col--pull-6">
                                    <!-- LEFT SIDEBAR : begin -->
                                    <x-biletral-portal-aside :data="$primary" side="left" />
                                    <!-- LEFT SIDEBAR : end -->
                                </div>
                                <div
                                    class="columns__sidebar columns__sidebar--right lsvr-grid__col lsvr-grid__col--span-3">
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
                                <h4 class="text-center">About Prarang</h4>
                                <p>Prarang provides complete information to understand cities of the country and abroad.
                                    This
                                    includes knowledge web of nature-culture of the city in the local language, yellow
                                    pages of
                                    the business list of the city, detailed analysis of the metrics or statistics of the
                                    city,
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
                                            <i class="p-2 shadow fa fa-twitter rounded-circle fa-2x"></i><span
                                                class="h4">
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
                                            <i class="p-2 shadow fa fa-linkedin rounded-circle fa-2x"></i> <span
                                                class="h4">
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


                </body>

                </html>
</x-layout.portal.base>
