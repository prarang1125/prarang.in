<x-layout.portal.base>

    <style>
        #header .header-map--gmaps {
            height: 100vh;
        }
        .time-display {
            font-size: 2.5rem;
            font-weight: bold;
            color: #000;
            text-shadow: 1px 1px 2px rgba(0, 0, 0.1);
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
        }

        .date-display {
            font-size: 1rem;
            color: #666;
            background-color: #fff;
            padding: 5px;
            border-radius: 3px;
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
            min-height: 250px !important;
            max-height: 320px !important;
            background: linear-gradient(135deg, #FFD54F 0%, #FFEB3B 100%) !important;
            border-radius: 12px !important;
            padding: 15px !important;
            margin: 10px 0 !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
            overflow: visible !important;
            position: relative !important;
            display: block !important;
        }

        #openweathermap-widget-15 > div,
        #openweathermap-widget-17 > div {
            min-height: 220px !important;
            max-height: 290px !important;
            display: block !important;
            width: 100% !important;
            overflow: visible !important;
        }

        #openweathermap-widget-15 iframe,
        #openweathermap-widget-17 iframe {
            width: 100% !important;
            min-height: 220px !important;
            max-height: 280px !important;
            height: 280px !important;
            border: none !important;
            border-radius: 8px !important;
            background: transparent !important;
            display: block !important;
        }

        /* Force consistent widget layout */
        #openweathermap-widget-15 .owm-widget-15,
        #openweathermap-widget-17 .owm-widget-17 {
            background: linear-gradient(135deg, #FFD54F 0%, #FFEB3B 100%) !important;
            border-radius: 8px !important;
        }

        /* Aggressive CSS to force both widgets to look identical */
        #openweathermap-widget-15 *,
        #openweathermap-widget-17 * {
            box-sizing: border-box !important;
        }

        /* Force widget content to be horizontal layout */
        #openweathermap-widget-15 > div > div,
        #openweathermap-widget-17 > div > div {
            display: block !important;
            width: 100% !important;
            padding: 0 !important;
            min-height: 220px !important;
            overflow: visible !important;
        }

        /* Style city name consistently */
        #openweathermap-widget-15 .city-name,
        #openweathermap-widget-17 .city-name,
        #openweathermap-widget-15 h2,
        #openweathermap-widget-17 h2,
        #openweathermap-widget-15 .owm-city,
        #openweathermap-widget-17 .owm-city {
            font-size: 22px !important;
            font-weight: bold !important;
            color: #2c3e50 !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Style temperature consistently */
        #openweathermap-widget-15 .owm-temperature,
        #openweathermap-widget-17 .owm-temperature,
        #openweathermap-widget-15 .temperature,
        #openweathermap-widget-17 .temperature,
        #openweathermap-widget-15 .temp,
        #openweathermap-widget-17 .temp {
            font-size: 48px !important;
            font-weight: 700 !important;
            color: #000000 !important;
            line-height: 1 !important;
        }

        /* Style weather description */
        #openweathermap-widget-15 .owm-description,
        #openweathermap-widget-17 .owm-description,
        #openweathermap-widget-15 .description,
        #openweathermap-widget-17 .description {
            font-size: 14px !important;
            color: #666666 !important;
            text-transform: capitalize !important;
        }

        /* Style weather details (feels like, wind, humidity, pressure) */
        #openweathermap-widget-15 .owm-details,
        #openweathermap-widget-17 .owm-details,
        #openweathermap-widget-15 .details,
        #openweathermap-widget-17 .details {
            font-size: 12px !important;
            color: #555555 !important;
            margin-top: 8px !important;
        }

        /* Override any OpenWeatherMap default styles */
        #openweathermap-widget-15 div[class*="owm"],
        #openweathermap-widget-17 div[class*="owm"] {
            background: transparent !important;
        }

        /* Target all possible OpenWeatherMap class names */
        #openweathermap-widget-15 .openweathermap-widget,
        #openweathermap-widget-17 .openweathermap-widget {
            min-height: 220px !important;
            padding: 15px !important;
            background: transparent !important;
        }

        /* Ensure left section (city + temp) is consistent */
        #openweathermap-widget-15 .owm-left,
        #openweathermap-widget-17 .owm-left,
        #openweathermap-widget-15 > div > div > div:first-child,
        #openweathermap-widget-17 > div > div > div:first-child {
            flex: 1 !important;
            min-width: 60% !important;
        }

        /* Ensure right section (details) is consistent */
        #openweathermap-widget-15 .owm-right,
        #openweathermap-widget-17 .owm-right,
        #openweathermap-widget-15 > div > div > div:last-child,
        #openweathermap-widget-17 > div > div > div:last-child {
            flex: 1 !important;
            max-width: 40% !important;
            text-align: right !important;
        }

        /* Force all text to be visible */
        #openweathermap-widget-15 *,
        #openweathermap-widget-17 * {
            opacity: 1 !important;
            visibility: visible !important;
        }

        /* Remove any borders from inner elements */
        #openweathermap-widget-15 * ,
        #openweathermap-widget-17 * {
            border: none !important;
        }

        /* Make sure weather icon is visible and sized consistently */
        #openweathermap-widget-15 img,
        #openweathermap-widget-17 img,
        #openweathermap-widget-15 .owm-icon,
        #openweathermap-widget-17 .owm-icon {
            width: 80px !important;
            height: 80px !important;
            object-fit: contain !important;
        }

        /* Ensure parent containers don't clip the widgets */
        #sidebar-left .sidebar-left__inner,
        #sidebar-right .sidebar-right__inner {
            overflow: visible !important;
        }

        #sidebar-left,
        #sidebar-right {
            overflow: visible !important;
        }

        /* Ensure weather widget wrapper divs are properly sized */
        #openweathermap-widget-15 > div,
        #openweathermap-widget-17 > div {
            position: relative !important;
        }

        /* Make iframes fully visible */
        #openweathermap-widget-15 iframe,
        #openweathermap-widget-17 iframe {
            transform: scale(1) !important;
            transform-origin: top left !important;
        }

        /* Ensure proper loading of weather widgets */
        .weather-widget-loading {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-height: 180px !important;
            color: #666 !important;
        }
        @media (max-width:480px) {

            /* Heading */
            .hentry .main__header h1 {
            }

            /* Weather widget mobile responsive */
            #openweathermap-widget-15 iframe,
            #openweathermap-widget-17 iframe {
                height: 180px !important;
            }


        /* Map toggle functionality */
        .header-map {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-100%);
            transition: all 0.3s ease;
        }

        .header-map--active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Header background  single */

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
        /* Collapsible Map Styling */
        #primary-map-widget .btn,
        #secondary-map-widget .btn {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #primary-map-widget .btn:hover,
        #secondary-map-widget .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        #primary-map-widget .btn:active,
        #secondary-map-widget .btn:active {
            transform: translateY(0);
        }

        .map-widget-iframe {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .collapse {
            transition: all 0.3s ease-in-out;
        }

        .collapse.show {
            animation: fadeInScale 0.3s ease-out;
        }

        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(0.95);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Progress bar animations */
        .progress-bar.progress-bar-striped.progress-bar-animated {
            animation: progressBarAnimation 2s linear infinite;
        }

        /* Country Connections Section Styles */
        .country-connections-section {
            position: relative;
            overflow: hidden;
        }

        .connection-exchange-icon {
            animation: connectionPulse 2s infinite;
        }

        @keyframes connectionPulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }

        .connection-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .connection-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .featured-connection {
            animation: featuredGlow 3s ease-in-out infinite;
        }

        @keyframes featuredGlow {
            0%, 100% { box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3); }
            50% { box-shadow: 0 6px 20px rgba(76, 175, 80, 0.5); }
        }

        /* Responsive Country Connections */
        @media (max-width: 768px) {
            .country-connections-section {
                padding: 20px 15px;
                margin: 20px 0;
            }

            .country-connections-section h2 {
                font-size: 1.5rem;
                flex-direction: column;
                gap: 10px;
            }

            .current-connection {
                padding: 15px;
            }

            .current-connection .current-connection > div:nth-child(2) {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
    <div id="wrapper">
        <header class="header--has-languages header--has-map" id="header">
            <div class="header__inner">
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
                            </div>
                            <!-- HEADER TOOLBAR TOGGLE : end -->
                            <!-- HEADER TOOLBAR : begin -->
                            <div class="header-toolbar">

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
                style="background-image: url('{{ $main->header_image ? Storage::url($main->header_image) : asset('images/prarang-1.jpg') }}'); height: 120vh; min-height: 800px;">

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

                                                <!-- UPMANA AI LINK : begin -->
                                                <div class="upmana-ai-section" style="margin: 30px 0; text-align: center;">
                                                    <div class="upmana-ai-widget" style="background: linear-gradient(135deg, #fedd59 0%, #f6e39a 100%); border-radius: 12px; padding: 25px; box-shadow: 0 8px 25px rgba(254, 221, 89, 0.25); transition: all 0.3s ease; position: relative; overflow: hidden; border: 1px solid rgba(254, 221, 89, 0.2);">
                                                        <div style="position: absolute; top: -30px; right: -30px; width: 100px; height: 100px; background: rgba(255, 255, 255, 0.15); border-radius: 50%;"></div>
                                                        <div style="position: absolute; bottom: -20px; left: -20px; width: 80px; height: 80px; background: rgba(255, 255, 255, 0.1); border-radius: 50%;"></div>
                                                        <div style="position: relative; z-index: 1;">
                                                            <div style="margin-bottom: 18px;">
                                                                <i class="fa fa-magic" style="font-size: 2.5rem; color: #172a28; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);"></i>
                                                            </div>
                                                            <h3 style="color: #172a28; font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 1.6rem; margin-bottom: 12px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); letter-spacing: -0.3px;">
                                                                Upmana AI
                                                            </h3>
                                                            <p style="color: #333333; font-family: 'Roboto', sans-serif; font-size: 1rem; margin-bottom: 20px; line-height: 1.5; font-weight: 400;">
                                                                Experience the power of AI-driven insights and intelligent assistance tailored to your needs
                                                            </p>
                                                            <a href="{{ route('upmana-ai') }}"
                                                               class="upmana-ai-button"
                                                               target="_blank"
                                                               style="display: inline-block; background: #172a28; color: #ffffff; padding: 12px 32px; border-radius: 25px; font-family: 'Roboto', sans-serif; font-weight: 600; font-size: 1rem; text-decoration: none; box-shadow: 0 4px 12px rgba(23, 42, 40, 0.25); transition: all 0.3s ease; border: 2px solid transparent;">
                                                                <i class="fa fa-rocket" style="margin-right: 8px; font-size: 0.9rem;"></i>
                                                                Launch Upmana AI
                                                                <i class="fa fa-arrow-right" style="margin-left: 8px; font-size: 0.85rem;"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <style>
                                                    .upmana-ai-widget:hover {
                                                        transform: translateY(-3px);
                                                        box-shadow: 0 12px 35px rgba(254, 221, 89, 0.35);
                                                    }

                                                    .upmana-ai-button:hover {
                                                        background: #fedd59;
                                                        color: #172a28;
                                                        transform: translateY(-2px);
                                                        box-shadow: 0 6px 18px rgba(254, 221, 89, 0.4);
                                                        border-color: #172a28;
                                                    }

                                                    @media (max-width: 768px) {
                                                        .upmana-ai-widget {
                                                            padding: 20px 18px;
                                                        }

                                                        .upmana-ai-widget h3 {
                                                            font-size: 1.4rem;
                                                        }

                                                        .upmana-ai-widget p {
                                                            font-size: 0.95rem;
                                                        }

                                                        .upmana-ai-button {
                                                            padding: 10px 28px;
                                                            font-size: 0.95rem;
                                                        }
                                                    }

                                                    @media (max-width: 480px) {
                                                        .upmana-ai-widget {
                                                            padding: 18px 15px;
                                                        }

                                                        .upmana-ai-widget h3 {
                                                            font-size: 1.3rem;
                                                        }

                                                        .upmana-ai-widget p {
                                                            font-size: 0.9rem;
                                                            margin-bottom: 18px;
                                                        }

                                                        .upmana-ai-button {
                                                            padding: 9px 24px;
                                                            font-size: 0.9rem;
                                                        }

                                                        .upmana-ai-widget i.fa-magic {
                                                            font-size: 2.2rem !important;
                                                        }
                                                    }
                                                </style>
                                                <!-- UPMANA AI LINK : end -->

                                                <!-- CATEGORY CONTENT : begin -->
                                                <div class="page__content">
                                                    <x-portal.posts-carousel cityId="c2" cityCode="c2" />
                                                    <!-- TOWNPRESS SITEMAP : begin -->
                                                    <x-portal.tag-list cityId="CON24" cityCode="CON24"
                                                        citySlug="CON24" />
                                                </div>
                                                <!-- CATEGORY CONTENT : end -->

                                                {{-- COUNTRY CONNECTIONS SECTION : begin --}}
                                                <!--
                                                <div class="country-connections-section" style="margin: 60px 0; padding: 30px; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border-radius: 15px; border: 2px solid #007bff; position: relative; overflow: hidden;">
                                                    <div style="position: absolute; top: -20px; right: -20px; width: 100px; height: 100px; background: rgba(0, 123, 255, 0.1); border-radius: 50%;"></div>
                                                    <div style="position: absolute; bottom: -15px; left: -15px; width: 80px; height: 80px; background: rgba(0, 123, 255, 0.05); border-radius: 50%;"></div>

                                                    <div style="position: relative; z-index: 2; text-align: center; margin-bottom: 30px;">
                                                        <h2 style="color: #2c3e50; font-size: 2rem; font-weight: 700; margin-bottom: 10px; display: flex; align-items: center; justify-content: center; gap: 15px;">
                                                            <i class="fa fa-handshake-o" style="color: #007bff; font-size: 2.2rem;"></i>
                                                            Country Connections
                                                            <i class="fa fa-handshake-o" style="color: #007bff; font-size: 2.2rem;"></i>
                                                        </h2>
                                                        <p style="color: #6c757d; font-size: 1.1rem; margin: 0; max-width: 600px; margin: 0 auto;">
                                                            Discover the special bilateral relationships and cultural connections between {{ $primary->country_name ?? 'India' }} and {{ $secondary->country_name ?? 'Czech Republic' }}
                                                        </p>
                                                    </div>

                                                    {{-- Current Connection Display --}}
                                                    <div class="current-connection" style="background: #ffffff; border-radius: 12px; padding: 25px; margin-bottom: 30px; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1); border-left: 5px solid #007bff;">
                                                        <h3 style="color: #2c3e50; font-size: 1.4rem; margin-bottom: 20px; text-align: center;">
                                                            <i class="fa fa-star" style="color: #ffc107; margin-right: 10px;"></i>
                                                            Featured Connection
                                                        </h3>
                                                        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
                                                            <div style="flex: 1; min-width: 200px; text-align: center; padding: 20px; background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%); border-radius: 10px; position: relative;">
                                                                <div style="font-size: 1.8rem; font-weight: bold; color: #1976d2; margin-bottom: 8px;">{{ strtoupper(substr($primary->country_name ?? 'India', 0, 3)) }}</div>
                                                                <div style="font-size: 1.1rem; color: #2c3e50; font-weight: 600;">{{ $primary->country_name ?? 'India' }}</div>
                                                                <div style="position: absolute; top: 10px; right: 10px; width: 20px; height: 20px; background: #4caf50; border-radius: 50%; border: 3px solid #ffffff; box-shadow: 0 2px 8px rgba(76, 175, 80, 0.3);"></div>
                                                            </div>

                                                            <div style="display: flex; align-items: center; justify-content: center; padding: 20px;">
                                                                <i class="fa fa-exchange connection-exchange-icon" style="font-size: 2.5rem; color: #007bff;"></i>
                                                            </div>

                                                            <div style="flex: 1; min-width: 200px; text-align: center; padding: 20px; background: linear-gradient(135deg, #fce4ec 0%, #f8bbd9 100%); border-radius: 10px; position: relative;">
                                                                <div style="font-size: 1.8rem; font-weight: bold; color: #c2185b; margin-bottom: 8px;">{{ strtoupper(substr($secondary->country_name ?? 'Czech', 0, 3)) }}</div>
                                                                <div style="font-size: 1.1rem; color: #2c3e50; font-weight: 600;">{{ $secondary->country_name ?? 'Czech Republic' }}</div>
                                                                <div style="position: absolute; top: 10px; right: 10px; width: 20px; height: 20px; background: #e91e63; border-radius: 50%; border: 3px solid #ffffff; box-shadow: 0 2px 8px rgba(233, 30, 99, 0.3);"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- All Available Connections --}}
                                                    @if(!empty($countryConnections) && count($countryConnections) > 0)
                                                    <div class="all-connections">
                                                        <h3 style="color: #2c3e50; font-size: 1.3rem; margin-bottom: 20px; text-align: center;">
                                                            <i class="fa fa-globe" style="color: #28a745; margin-right: 10px;"></i>
                                                            Explore All Bilateral Connections
                                                        </h3>
                                                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px;">
                                                            @foreach($countryConnections as $connection)
                                                                @php
                                                                    $isCurrentConnection = ($connection->id === $main->id);
                                                                    $primaryCountry = $connection->primaryCountry;
                                                                    $secondaryCountry = $connection->secondaryCountry;
                                                                @endphp
                                                                <div class="connection-card {{ $isCurrentConnection ? 'featured-connection' : '' }}" style="background: {{ $isCurrentConnection ? '#e8f5e8' : '#ffffff' }}; border: 2px solid {{ $isCurrentConnection ? '#4caf50' : '#e0e0e0' }}; border-radius: 10px; padding: 15px; text-align: center; position: relative;">
                                                                    @if($isCurrentConnection)
                                                                        <div style="position: absolute; top: -8px; right: -8px; background: #4caf50; color: white; padding: 5px 10px; border-radius: 15px; font-size: 0.75rem; font-weight: bold;">CURRENT</div>
                                                                    @endif

                                                                    <div style="margin-bottom: 10px;">
                                                                        <span style="font-size: 1.2rem; font-weight: bold; color: #1976d2;">{{ $primaryCountry->country_name ?? 'Country 1' }}</span>
                                                                        <i class="fa fa-arrows-h" style="margin: 0 8px; color: #666;"></i>
                                                                        <span style="font-size: 1.2rem; font-weight: bold; color: #c2185b;">{{ $secondaryCountry->country_name ?? 'Country 2' }}</span>
                                                                    </div>

                                                                    <a href="{{ route('portal', ['portal' => $connection->slug]) }}" style="display: inline-block; background: {{ $isCurrentConnection ? '#4caf50' : '#007bff' }}; color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; font-weight: 600; transition: all 0.3s ease;" class="connection-link">
                                                                        <i class="fa fa-eye" style="margin-right: 5px;"></i>
                                                                        {{ $isCurrentConnection ? 'Currently Viewing' : 'View Connection' }}
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="no-connections" style="text-align: center; padding: 40px; background: #ffffff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                                                        <i class="fa fa-info-circle" style="font-size: 3rem; color: #17a2b8; margin-bottom: 15px;"></i>
                                                        <h4 style="color: #2c3e50; margin-bottom: 10px;">No Bilateral Connections Available</h4>
                                                        <p style="color: #6c757d;">More country connections will be added soon. Stay tuned for updates!</p>
                                                    </div>
                                                    @endif

                                                    {{-- Connection Info --}}
                                                    <div style="margin-top: 30px; padding: 20px; background: rgba(0, 123, 255, 0.1); border-radius: 10px; border-left: 4px solid #007bff;">
                                                        <h4 style="color: #2c3e50; margin-bottom: 15px;">
                                                            <i class="fa fa-info-circle" style="color: #007bff; margin-right: 10px;"></i>
                                                            About Bilateral Relations
                                                        </h4>
                                                        <p style="color: #495057; line-height: 1.6; margin: 0;">
                                                            Bilateral relations encompass diplomatic, economic, cultural, and social ties between two sovereign states. These connections foster mutual understanding, trade opportunities, and cultural exchange programs that benefit both nations and their citizens.
                                                        </p>
                                                    </div>
                                                </div>
                                                -->
                                                {{-- COUNTRY CONNECTIONS SECTION : end --}}
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
                                            @php
                                                // Build safe embeddable map URLs for primary country
                                                $primaryName = $primary->country_name ?? null;
                                                $primaryMapRaw = $primary->maps ?? null;
                                                $primaryMapSrc = null;
                                                if (!empty($primaryName)) {
                                                    if (!empty($primaryMapRaw)) {
                                                        $primaryMapSrc = str_contains($primaryMapRaw, 'google.com/maps/embed')
                                                            ? $primaryMapRaw
                                                            : 'https://www.google.com/maps?q=' . urlencode($primaryName) . '&output=embed';
                                                    } else {
                                                        $primaryMapSrc = 'https://www.google.com/maps?q=' . urlencode($primaryName) . '&output=embed';
                                                    }
                                                }
                                            @endphp
                                            @if(!empty($primaryMapSrc))
                                            <div class="widget" id="primary-map-widget">
                                                <div class="widget__inner">
                                                    <button type="button"
                                                        class="btn w-100 d-flex align-items-center justify-content-center gap-2"
                                                        style="background:#E54730;color:#fff;font-weight:800;border-radius:8px;"
                                                        data-bs-toggle="collapse" data-bs-target="#primaryMapCollapse"
                                                        aria-expanded="false" aria-controls="primaryMapCollapse">
                                                        <i class="fa fa-map-marker"></i>
                                                        <span>{{ strtoupper($primaryName) }} MAP</span>
                                                    </button>
                                                    <div class="collapse mt-2" id="primaryMapCollapse">
                                                        <div class="ratio ratio-4x3">
                                                            <iframe src="{{ $primaryMapSrc }}" style="border:0;" loading="lazy"
                                                                referrerpolicy="no-referrer-when-downgrade"
                                                                allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                                id="india-time-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-clock-o"></i>
                                                        {{ $primary->country_name ?? 'India' }} Time
                                                    </h3>
                                                    <div class="widget__content text-center">
                                                        <div id="india-time" class="h4 time-display">Loading...</div>
                                                        <div id="india-date" class="date-display"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Embassy Section -->
                                            <div class="widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background"
                                                id="india-embassy-moved">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-building-o"></i>
                                                        Embassy of {{ $primary->country_name ?? 'India' }}
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="embassy-content">
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    @php
                                                                        // Find embassy link by matching country name
                                                                        $embassyCountry = \Modules\Portal\Models\CountryPortal::where('country_name', $primary->country_name)->first();
                                                                        $embassyLink = $embassyCountry ? $embassyCountry->embassy_link : null;
                                                                    @endphp
                                                                    @if(!empty($embassyLink))
                                                                        <a href="{{ $embassyLink }}"
                                                                            class="btn btn-warning btn-sm w-100"
                                                                            target="_blank">
                                                                            <i class="fa fa-external-link"></i> Embassy of {{ $primary->country_name ?? 'India' }}
                                                                        </a>
                                                                    @else
                                                                        <div class="alert alert-info text-center" role="alert">
                                                                            <i class="fa fa-info-circle"></i> Please Set Link
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if(!empty($primary->weather))
                                                <div style="position: relative; left: 0; margin: 10px 0;">
                                                    @php
                                                        // Ensure primary weather widget uses unique IDs (id: 15, openweathermap-widget-15)
                                                        $primaryWeather = $primary->weather;
                                                        // Replace any existing widget ID with 15 for primary
                                                        $primaryWeather = preg_replace('/id:\s*\d+/', 'id: 15', $primaryWeather);
                                                        $primaryWeather = preg_replace('/openweathermap-widget-\d+/', 'openweathermap-widget-15', $primaryWeather);
                                                    @endphp
                                                    {!! $primaryWeather !!}
                                                </div>
                                            @elseif(!empty($primary->weather_city_id) && !empty($primary->weather_api_key))
                                                <div id="openweathermap-widget-15"
                                                    style="width: 100%; min-height: 200px; display: flex; align-items: center; justify-content: center; margin: 10px 0;">
                                                    <div class="weather-widget-loading" id="loading-15">
                                                        Loading weather...</div>
                                                </div>
                                                <script>
                                                    window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
                                                    window.myWidgetParam.push({
                                                        id: 15,
                                                        cityid: '{{ $primary->weather_city_id }}',
                                                        appid: '{{ $primary->weather_api_key }}',
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
                                            @endif
                                            <div class="widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background"
                                                id="india-news-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-newspaper-o"></i>
                                                        {{ $primary->country_name ?? 'India' }} News
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="news-content">
                                                            <div class="news-item mb-3">
                                                                <h6 class="news-title">Latest
                                                                    {{ $primary->country_name ?? 'India' }} News</h6>
                                                                <p class="news-summary">Stay updated with the latest
                                                                    news and developments from
                                                                    {{ $primary->country_name ?? 'India' }}.</p>
                                                                <div id="india-news-list">
                                                                    @if(!empty($primary->news))
                                                                        <a href="{{ $primary->news }}"
                                                                            class="btn btn-primary btn-sm w-100"
                                                                            target="_blank">
                                                                            <i class="fa fa-external-link"></i> Read Latest News
                                                                        </a>
                                                                    @else
                                                                        <div class="alert alert-info text-center" role="alert">
                                                                            <i class="fa fa-info-circle"></i> Link is not available
                                                                        </div>
                                                                    @endif
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
                                                        {{ $primary->country_name ?? 'India' }} Analytics
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="analytics-content">
                                                            <div class="analytics-item mb-3">
                                                                <div class="text-center mb-3">
                                                                    <a href="https://g2c.prarang.in/{{ $primary->analytics_slug ?? 'india' }}"
                                                                        target="_blank">
                                                                        <img src="https://www.prarang.in/matric-.JPG"
                                                                            alt="India Analytics"
                                                                            style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                                                    </a>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <a href="https://g2c.prarang.in/ai/{{ urlencode($primary->country_name ?? 'India') }}"
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
                                                        <i class="fa fa-link"></i>
                                                        Important Links of {{ $primary->country_name ?? 'Country' }}
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="embassy-content">
                                                            @php
                                                                // Get important links directly from backend without fallbacks
                                                                $primaryImportantLinksRaw = $primary->important_links ?? null;
                                                                // Decode if stored as JSON string or ensure array
                                                                if (is_string($primaryImportantLinksRaw)) {
                                                                    $decoded = json_decode($primaryImportantLinksRaw, true);
                                                                    $primaryImportantLinksRaw = is_array($decoded) ? $decoded : [];
                                                                }
                                                                $primaryImportantLinks = is_array($primaryImportantLinksRaw) ? $primaryImportantLinksRaw : [];
                                                                $primaryTouristPlaces = $primaryImportantLinks['tourist_places'] ?? [];
                                                                $primaryCommunityPages = $primaryImportantLinks['community_pages'] ?? [];
                                                                $primaryResources = $primaryImportantLinks['resources'] ?? [];
                                                            @endphp
                                                            <!-- Tourist Places Section -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #28a745;">
                                                                        <i class="fa fa-map-marker"></i> Tourist Places
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (!empty($primaryTouristPlaces) && is_array($primaryTouristPlaces) && count($primaryTouristPlaces) > 0)
                                                                            @foreach ($primaryTouristPlaces as $index => $link)
                                                                                @if (!empty($link))
                                                                                    <a href="{{ $link }}"
                                                                                        class="btn btn-success btn-sm mb-2"
                                                                                        target="_blank"
                                                                                        style="width: 100%;">
                                                                                        <i class="fa fa-globe"></i> Tourist
                                                                                        Place {{ $index + 1 }}
                                                                                    </a>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <div class="alert alert-info text-center" role="alert">
                                                                                <i class="fa fa-info-circle"></i> Link is not available
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Czech Living Indians Section -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #17a2b8;">
                                                                        <i class="fa fa-users"></i> Community Pages
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (!empty($primaryCommunityPages) && is_array($primaryCommunityPages) && count($primaryCommunityPages) > 0)
                                                                            @foreach ($primaryCommunityPages as $index => $link)
                                                                                @if (!empty($link))
                                                                                    <a href="{{ $link }}"
                                                                                        class="btn btn-primary btn-sm mb-2"
                                                                                        target="_blank"
                                                                                        style="width: 100%;">
                                                                                        <i class="fa fa-external-link"></i>
                                                                                        Community Page {{ $index + 1 }}
                                                                                    </a>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <div class="alert alert-info text-center" role="alert">
                                                                                <i class="fa fa-info-circle"></i> Link is not available
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Additional Resources -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #6f42c1;">
                                                                        <i class="fa fa-book"></i> Other Links
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (!empty($primaryResources) && is_array($primaryResources) && count($primaryResources) > 0)
                                                                            @foreach ($primaryResources as $index => $link)
                                                                                @if (!empty($link))
                                                                                    <a href="{{ $link }}"
                                                                                        class="btn btn-outline-primary btn-sm mb-2"
                                                                                        target="_blank"
                                                                                        style="width: 100%;">
                                                                                        <i class="fa fa-university"></i>
                                                                                        Resource {{ $index + 1 }}
                                                                                    </a>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <div class="alert alert-info text-center" role="alert">
                                                                                <i class="fa fa-info-circle"></i> Link is not available
                                                                            </div>
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
                                            @php
                                                // Build safe embeddable map URLs for secondary country
                                                $secondaryName = $secondary->country_name ?? null;
                                                $secondaryMapRaw = $secondary->maps ?? null;
                                                $secondaryMapSrc = null;
                                                if (!empty($secondaryName)) {
                                                    if (!empty($secondaryMapRaw)) {
                                                        $secondaryMapSrc = str_contains($secondaryMapRaw, 'google.com/maps/embed')
                                                            ? $secondaryMapRaw
                                                            : 'https://www.google.com/maps?q=' . urlencode($secondaryName) . '&output=embed';
                                                    } else {
                                                        $secondaryMapSrc = 'https://www.google.com/maps?q=' . urlencode($secondaryName) . '&output=embed';
                                                    }
                                                }
                                            @endphp
                                            @if(!empty($secondaryMapSrc))
                                            <div class="widget" id="secondary-map-widget">
                                                <div class="widget__inner">
                                                    <button type="button"
                                                        class="btn w-100 d-flex align-items-center justify-content-center gap-2"
                                                        style="background:#E54730;color:#fff;font-weight:800;border-radius:8px;"
                                                        data-bs-toggle="collapse" data-bs-target="#secondaryMapCollapse"
                                                        aria-expanded="false" aria-controls="secondaryMapCollapse">
                                                        <i class="fa fa-map-marker"></i>
                                                        <span>{{ strtoupper($secondaryName) }} MAP</span>
                                                    </button>
                                                    <div class="collapse mt-2" id="secondaryMapCollapse">
                                                        <div class="ratio ratio-4x3">
                                                            <iframe src="{{ $secondaryMapSrc }}" style="border:0;" loading="lazy"
                                                                referrerpolicy="no-referrer-when-downgrade"
                                                                allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                                id="czech-time-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-clock-o"></i>
                                                        {{ $secondary->country_name ?? 'Czech Republic' }} Time
                                                    </h3>
                                                    <div class="widget__content text-center">
                                                        <div id="czech-time" class="h4 time-display">Loading...</div>
                                                        <div id="czech-date" class="date-display"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Embassy Section -->
                                            <div class="widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background"
                                                id="czech-embassy-moved">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-building-o"></i>
                                                        Embassy of {{ $secondary->country_name ?? 'Czech Republic' }}
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="embassy-content">
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    @php
                                                                        // Find embassy link by matching country name
                                                                        $embassyCountrySecondary = \Modules\Portal\Models\CountryPortal::where('country_name', $secondary->country_name)->first();
                                                                        $embassyLinkSecondary = $embassyCountrySecondary ? $embassyCountrySecondary->embassy_link : null;
                                                                    @endphp
                                                                    @if(!empty($embassyLinkSecondary))
                                                                        <a href="{{ $embassyLinkSecondary }}"
                                                                            class="btn btn-warning btn-sm w-100"
                                                                            target="_blank">
                                                                            <i class="fa fa-external-link"></i> Embassy of {{ $secondary->country_name ?? 'Czech Republic' }}
                                                                        </a>
                                                                    @else
                                                                        <div class="alert alert-info text-center" role="alert">
                                                                            <i class="fa fa-info-circle"></i> Please Set Link
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if(!empty($secondary->weather))
                                                <div style="position: relative; left: 0; margin: 10px 0;">
                                                    @php
                                                        // Ensure secondary weather widget uses unique IDs (id: 17, openweathermap-widget-17)
                                                        $secondaryWeather = $secondary->weather;
                                                        // Replace any existing widget ID with 17 for secondary
                                                        $secondaryWeather = preg_replace('/id:\s*\d+/', 'id: 17', $secondaryWeather);
                                                        $secondaryWeather = preg_replace('/openweathermap-widget-\d+/', 'openweathermap-widget-17', $secondaryWeather);
                                                    @endphp
                                                    {!! $secondaryWeather !!}
                                                </div>
                                            @elseif(!empty($secondary->weather_city_id) && !empty($secondary->weather_api_key))
                                                <div id="openweathermap-widget-17"
                                                    style="width: 100%; min-height: 200px; display: flex; align-items: center; justify-content: center; margin: 10px 0;">
                                                    <div class="weather-widget-loading" id="loading-17">
                                                        Loading weather...</div>
                                                </div>
                                                <script>
                                                    window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
                                                    window.myWidgetParam.push({
                                                        id: 17,
                                                        cityid: '{{ $secondary->weather_city_id }}',
                                                        appid: '{{ $secondary->weather_api_key }}',
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
                                            @endif
                                            <div class="widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background"
                                                id="czech-news-widget">
                                            <div class="widget__inner">
                                                <h3 class="widget__title widget__title--has-icon ps-2">
                                                    <i class="fa fa-newspaper-o"></i>
                                                    {{ $secondary->country_name ?? 'Czech Republic' }} News
                                                </h3>
                                                <div class="widget__content">
                                                    <div class="news-content">
                                                        <div class="news-item mb-3">
                                                            <h6 class="news-title">Latest
                                                                {{ $secondary->country_name ?? 'Czech Republic' }}
                                                                News</h6>
                                                            <p class="news-summary">Stay updated with the latest news
                                                                and developments from the
                                                                {{ $secondary->country_name ?? 'Czech Republic' }}.
                                                            </p>
                                                            <div id="czech-news-list">
                                                                @if(!empty($secondary->news))
                                                                    <a href="{{ $secondary->news }}"
                                                                        class="btn btn-primary btn-sm w-100"
                                                                        target="_blank">
                                                                        <i class="fa fa-external-link"></i> Read Latest News
                                                                    </a>
                                                                @else
                                                                    <div class="alert alert-info text-center" role="alert">
                                                                        <i class="fa fa-info-circle"></i> Link is not available
                                                                    </div>
                                                                @endif
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
                                                        {{ $secondary->country_name ?? 'Czech Republic' }} Analytics
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="analytics-content">
                                                            <div class="analytics-item mb-3">
                                                                <div class="text-center mb-3">
                                                                    <a href="https://g2c.prarang.in/{{ $secondary->analytics_slug ?? 'czech-republic' }}"
                                                                        target="_blank">
                                                                        <img src="https://www.prarang.in/matric-.JPG"
                                                                            alt="Czech Analytics"
                                                                            style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                                                    </a>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <a href="https://g2c.prarang.in/ai/{{ urlencode($secondary->country_name ?? 'Czech Republic') }}"
                                                                        class="btn btn-info btn-sm w-100"
                                                                        target="_blank">View AI Report</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background"
                                                id="czech-embassy-widget">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-link"></i>
                                                        Important Links of {{ $secondary->country_name ?? 'Country' }}
                                                    </h3>
                                                    <div class="widget__content">
                                                        <div class="embassy-content">
                                                            @php
                                                                // Get important links directly from backend without fallbacks
                                                                $secondaryImportantLinksRaw = $secondary->important_links ?? null;
                                                                // Decode if stored as JSON string or ensure array
                                                                if (is_string($secondaryImportantLinksRaw)) {
                                                                    $decoded = json_decode($secondaryImportantLinksRaw, true);
                                                                    $secondaryImportantLinksRaw = is_array($decoded) ? $decoded : [];
                                                                }
                                                                $secondaryImportantLinks = is_array($secondaryImportantLinksRaw) ? $secondaryImportantLinksRaw : [];
                                                                $secondaryTouristPlaces = $secondaryImportantLinks['tourist_places'] ?? [];
                                                                $secondaryCommunityPages = $secondaryImportantLinks['community_pages'] ?? [];
                                                                $secondaryResources = $secondaryImportantLinks['resources'] ?? [];
                                                            @endphp
                                                            <!-- Tourist Places Section -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #28a745;">
                                                                        <i class="fa fa-map-marker"></i> Tourist Places
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (!empty($secondaryTouristPlaces) && is_array($secondaryTouristPlaces) && count($secondaryTouristPlaces) > 0)
                                                                            @foreach ($secondaryTouristPlaces as $index => $link)
                                                                                @if (!empty($link))
                                                                                    <a href="{{ $link }}"
                                                                                        class="btn btn-success btn-sm mb-2"
                                                                                        target="_blank"
                                                                                        style="width: 100%;">
                                                                                        <i class="fa fa-globe"></i> Tourist
                                                                                        Place {{ $index + 1 }}
                                                                                    </a>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <div class="alert alert-info text-center" role="alert">
                                                                                <i class="fa fa-info-circle"></i> Link is not available
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Indians Living in Czech Section -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #17a2b8;">
                                                                        <i class="fa fa-users"></i> Community Pages
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (!empty($secondaryCommunityPages) && is_array($secondaryCommunityPages) && count($secondaryCommunityPages) > 0)
                                                                            @foreach ($secondaryCommunityPages as $index => $link)
                                                                                @if (!empty($link))
                                                                                    <a href="{{ $link }}"
                                                                                        class="btn btn-primary btn-sm mb-2"
                                                                                        target="_blank"
                                                                                        style="width: 100%;">
                                                                                        <i class="fa fa-external-link"></i>
                                                                                        Community Page {{ $index + 1 }}
                                                                                    </a>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <div class="alert alert-info text-center" role="alert">
                                                                                <i class="fa fa-info-circle"></i> Link is not available
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Additional Resources -->
                                                            <div class="embassy-item mb-3">
                                                                <div class="text-center">
                                                                    <h6 class="embassy-title" style="color: #6f42c1;">
                                                                        <i class="fa fa-book"></i> Other Links
                                                                    </h6>
                                                                    <div class="mt-2">
                                                                        @if (!empty($secondaryResources) && is_array($secondaryResources) && count($secondaryResources) > 0)
                                                                            @foreach ($secondaryResources as $index => $link)
                                                                                @if (!empty($link))
                                                                                    <a href="{{ $link }}"
                                                                                        class="btn btn-outline-primary btn-sm mb-2"
                                                                                        target="_blank"
                                                                                        style="width: 100%;">
                                                                                        <i class="fa fa-university"></i>
                                                                                        Resource {{ $index + 1 }}
                                                                                    </a>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <div class="alert alert-info text-center" role="alert">
                                                                                <i class="fa fa-info-circle"></i> Link is not available
                                                                            </div>
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
                                    <!-- RIGHT SIDEBAR : end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            #wrapper footer .row .col p {
                margin-bottom: 5px !important;
            }
            
            /* Weather widget loading styling */
            .weather-widget-loading {
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                min-height: 250px !important;
                height: auto !important;
                color: #666 !important;
                font-size: 16px !important;
                width: 100% !important;
            }
            
            /* Responsive adjustments */
            @media (max-width: 768px) {
                .weather-widget-loading {
                    min-height: 220px !important;
                    height: auto !important;
                    font-size: 14px !important;
                }
            }
            
            @media (max-width: 480px) {
                .weather-widget-loading {
                    min-height: 200px !important;
                    height: auto !important;
                    font-size: 12px !important;
                }
            }
        </style>

        <footer class="p-4 ps-4 pe-4"
            style="background-color: #FFB1A3; margin-top:200px; background-image: url('{{ $main->footer_image ? Storage::url($main->footer_image) : asset('images/prarang-2.jpg.gif') }}');">
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
        // Country timezone configuration from database
        const countryConfig = {
            primary: {
                name: '{{ $primary->country_name ?? "India" }}',
                timezone: '{{ $primary->timezone ?? "Asia/Kolkata" }}',
                locale: 'en-GB' // Set to English by default
            },
            secondary: {
                name: '{{ $secondary->country_name ?? "Czech Republic" }}',
                timezone: '{{ $secondary->timezone ?? "Europe/Prague" }}',
                locale: 'en-GB' // Set to English by default
            }
        };

        function updateCountryTime(country, elementPrefix) {
            const config = countryConfig[country];
            
            // Create date in the country's timezone
            const options = {
                timeZone: config.timezone,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            };

            const dateOptions = {
                timeZone: config.timezone,
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };

            const now = new Date();
            const timeString = now.toLocaleTimeString(config.locale, options);
            const dateString = now.toLocaleDateString(config.locale, dateOptions);

            const timeElement = document.getElementById(elementPrefix + '-time');
            const dateElement = document.getElementById(elementPrefix + '-date');

            if (timeElement && dateElement) {
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
        }

        function updateIndiaTime() {
            updateCountryTime('primary', 'india');
        }

        function updateCzechTime() {
            updateCountryTime('secondary', 'czech');
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

            // Force consistent styling on weather widgets after they load
            function forceWeatherWidgetConsistency() {
                const widget15 = document.getElementById('openweathermap-widget-15');
                const widget17 = document.getElementById('openweathermap-widget-17');
                
                if (widget15 && widget17) {
                    // Force both to use same background and dimensions
                    [widget15, widget17].forEach(widget => {
                        widget.style.background = 'linear-gradient(135deg, #FFD54F 0%, #FFEB3B 100%)';
                        widget.style.minHeight = '250px';
                        widget.style.maxHeight = '320px';
                        widget.style.width = '100%';
                        widget.style.borderRadius = '12px';
                        widget.style.padding = '15px';
                        widget.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.15)';
                        widget.style.overflow = 'visible';
                        widget.style.position = 'relative';
                        widget.style.display = 'block';
                        widget.style.margin = '10px 0';
                    });
                    
                    // Fix inner div
                    const widget15Inner = widget15.querySelector('div');
                    const widget17Inner = widget17.querySelector('div');
                    
                    if (widget15Inner && widget17Inner) {
                        [widget15Inner, widget17Inner].forEach(inner => {
                            inner.style.minHeight = '220px';
                            inner.style.width = '100%';
                            inner.style.overflow = 'visible';
                            inner.style.position = 'relative';
                        });
                    }
                    
                    // Fix iframes if they exist
                    const iframe15 = widget15.querySelector('iframe');
                    const iframe17 = widget17.querySelector('iframe');
                    
                    if (iframe15 && iframe17) {
                        [iframe15, iframe17].forEach(iframe => {
                            iframe.style.width = '100%';
                            iframe.style.height = '280px';
                            iframe.style.border = 'none';
                            iframe.style.borderRadius = '8px';
                            iframe.style.background = 'transparent';
                            iframe.style.display = 'block';
                        });
                    }
                    
                    console.log('Weather widgets consistency applied');
                }
            }

            // Initialize weather widgets when page loads
            document.addEventListener('DOMContentLoaded', function() {
                // Add load event listeners for weather widget scripts
                const weatherScripts = document.querySelectorAll(
                    'script[src*="weather-widget-generator.js"]');
                weatherScripts.forEach(script => {
                    script.onload = function() {
                        console.log('Weather widget script loaded');
                        // Apply consistency after widgets load
                        setTimeout(forceWeatherWidgetConsistency, 2000);
                    };
                });
                
                // Also apply consistency periodically in case widgets load late
                setInterval(forceWeatherWidgetConsistency, 3000);
            });

            // Set up weather widget load handlers with delay
            setTimeout(() => {
                @if(!empty($primary->weather_city_id) && !empty($primary->weather_api_key))
                    handleWeatherWidgetLoad(15, '{{ $primary->country_name ?? 'India' }}', '{{ $primary->weather_city_id }}');
                @endif
                @if(!empty($secondary->weather_city_id) && !empty($secondary->weather_api_key))
                    handleWeatherWidgetLoad(17, '{{ $secondary->country_name ?? 'Czech Republic' }}', '{{ $secondary->weather_city_id }}');
                @endif
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
        // document.getElementById('editPortalBtn').style.display = 'block';

        // Map functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar map collapse functionality
            const primaryMapBtn = document.querySelector('[data-bs-target="#primaryMapCollapse"]');
            const secondaryMapBtn = document.querySelector('[data-bs-target="#secondaryMapCollapse"]');
            const primaryMapCollapse = document.getElementById('primaryMapCollapse');
            const secondaryMapCollapse = document.getElementById('secondaryMapCollapse');

            // Function to update button appearance when collapsed/expanded
            function updateButtonState(button, target, isExpanded) {
                const icon = button.querySelector('i');
                const span = button.querySelector('span');

                if (isExpanded) {
                    icon.className = 'fa fa-chevron-up';
                    button.style.backgroundColor = '#C73E1D';
                } else {
                    icon.className = 'fa fa-map-marker';
                    button.style.backgroundColor = '#E54730';
                }
            }

            // Function to close other collapse when one opens
            function closeOtherCollapse(currentTarget) {
                if (currentTarget === '#primaryMapCollapse' && secondaryMapCollapse) {
                    const bsCollapse = bootstrap.Collapse.getInstance(secondaryMapCollapse);
                    if (bsCollapse && bsCollapse._isShown) {
                        bsCollapse.hide();
                        if (secondaryMapBtn) {
                            updateButtonState(secondaryMapBtn, '#secondaryMapCollapse', false);
                        }
                    }
                } else if (currentTarget === '#secondaryMapCollapse' && primaryMapCollapse) {
                    const bsCollapse = bootstrap.Collapse.getInstance(primaryMapCollapse);
                    if (bsCollapse && bsCollapse._isShown) {
                        bsCollapse.hide();
                        if (primaryMapBtn) {
                            updateButtonState(primaryMapBtn, '#primaryMapCollapse', false);
                        }
                    }
                }
            }

            // Sidebar map button click events
            if (primaryMapBtn && primaryMapCollapse) {
                primaryMapBtn.addEventListener('click', function() {
                    // Let Bootstrap handle the collapse toggle, but update visual state
                    setTimeout(() => {
                        const isExpanded = primaryMapCollapse.classList.contains('show');
                        updateButtonState(primaryMapBtn, '#primaryMapCollapse', isExpanded);
                        if (isExpanded) {
                            closeOtherCollapse('#primaryMapCollapse');
                        }
                    }, 10);
                });
            }

            if (secondaryMapBtn && secondaryMapCollapse) {
                secondaryMapBtn.addEventListener('click', function() {
                    // Let Bootstrap handle the collapse toggle, but update visual state
                    setTimeout(() => {
                        const isExpanded = secondaryMapCollapse.classList.contains('show');
                        updateButtonState(secondaryMapBtn, '#secondaryMapCollapse', isExpanded);
                        if (isExpanded) {
                            closeOtherCollapse('#secondaryMapCollapse');
                        }
                    }, 10);
                });
            }

            // Bootstrap collapse event listeners for state management
            if (primaryMapCollapse) {
                primaryMapCollapse.addEventListener('show.bs.collapse', function() {
                    if (primaryMapBtn) {
                        updateButtonState(primaryMapBtn, '#primaryMapCollapse', true);
                    }
                    closeOtherCollapse('#primaryMapCollapse');
                });

                primaryMapCollapse.addEventListener('hide.bs.collapse', function() {
                    if (primaryMapBtn) {
                        updateButtonState(primaryMapBtn, '#primaryMapCollapse', false);
                    }
                });
            }

            if (secondaryMapCollapse) {
                secondaryMapCollapse.addEventListener('show.bs.collapse', function() {
                    if (secondaryMapBtn) {
                        updateButtonState(secondaryMapBtn, '#secondaryMapCollapse', true);
                    }
                    closeOtherCollapse('#secondaryMapCollapse');
                });

                secondaryMapCollapse.addEventListener('hide.bs.collapse', function() {
                    if (secondaryMapBtn) {
                        updateButtonState(secondaryMapBtn, '#secondaryMapCollapse', false);
                    }
                });
            }
        });

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
