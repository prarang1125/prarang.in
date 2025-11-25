<x-layout.portal.base>

    <style>
        #header .header-map--gmaps {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            background: rgba(0, 0, 0, 0.9);
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .header-map--visible {
            display: flex !important;
            opacity: 1 !important;
            align-items: center;
            justify-content: center;
        }

        .header-map--loading::before {
            content: "Loading map...";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 18px;
            z-index: 10000;
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
            min-width: 200px;
        }

        .map-selector::before {
            content: "🌍";
            position: absolute;
            left: -25px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
        }

        #map-container {
            width: 90%;
            max-width: 800px;
            height: 70vh;
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        #map-container iframe {
            width: 100% !important;
            height: 100% !important;
            border: none !important;
            border-radius: 10px;
        }

        .header-map__close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1001;
        }

        .header-map__close:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }

        .header-map__close-ico {
            font-size: 20px;
            color: #333;
        }

        /* Mobile menu styles */
        .header-mobile-menu {
            display: none;
        }

        .header-mobile-menu--visible {
            display: block;
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

        /* Header background  image */
        .header-background__image {
            background-position-y: 0px !important;
        }

        /* Text center */
        #main .shadow h3.text-center {
            font-size: 25px;
        }

        /* Text center */
        #main .shadow .text-center {
            margin-top: 14px !important;
            margin-bottom: 18px !important;
        }

        /* Shadow */
        #main .shadow {
            padding-top: 5px;
        }

        /* Font Icon */
        #main .btn-success i {
            position: relative;
            top: 2px;
        }

        /* Column 6/12 */
        #columns footer .col-6 {
            color: #ffffff;
        }

        /* Span Tag */
        #columns footer span {
            color: #ffffff;
            font-size: 20px;
        }

        /* Font Icon */
        #columns a .fa-twitter {
            font-size: 18px;
            color: #ffffff;
        }

        /* Font Icon */
        #columns a .fa-facebook {
            font-size: 19px;
            color: #ffffff;
        }

        /* Font Icon */
        #columns a .fa-instagram {
            font-size: 18px;
            color: #ffffff;
        }

        /* Font Icon */
        #columns a .fa-linkedin {
            color: #ffffff;
            font-size: 10px;
        }

        /* Link */
        .row .col-sm .row .col-6 a {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 8px;
        }

        /* Footer */
        #wrapper #core .core__inner #columns footer {
            background-color: rgba(0, 0, 0, 0.67) !important;
        }

        /* Col */
        #columns footer .col-sm {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Span Tag */
        #columns footer span {
            font-size: 18px !important;
            position: relative;
            top: 3px;
        }

        /* Font Icon */
        #columns a .fa-linkedin {
            font-size: 18px !important;
        }

        /* Header background  singled */
        #wrapper .header-background--singled {
            position: fixed;
            transform: translatex(0px) translatey(0px);
        }

        /* Header  content inner */
        #header .header__content-inner {
            padding-bottom: 0px;
            transform: translatex(0px) translatey(0px);
            padding-top: 1px;
        }

        /* Image */
        .header-logo--front .header-logo__link img {
            width: 51px;
        }

        /* Division */
        #wrapper .header-background__image--default {
            transform: translatex(0px) translatey(0px);
        }

        /* Columns */
        #columns {
            transform: translatex(0px) translatey(0px);
            margin-top: -130px;
        }

        /* Lsvr container */
        #columns .lsvr-container {
            margin-top: -50px;
            transform: translatex(0px) translatey(0px);
        }

        @media (min-width:992px) {

            /* Header  content */
            #header .header__content {
                height: 47px;
            }

        }

        /* Image */
        .header-logo--front .header-logo__link img {
            position: relative;
            top: 5px;
        }

        /* Image */
        #wrapper #header .header__inner .header__content .lsvr-container .header__content-inner .header-logo--front .header-logo__link img {
            width: 75px !important;
        }

        /* Modal body */
        .hentry div .modal-body {
            height: 605px;
        }

        /* Modal body */
        #core .lsvr-container .lsvr-grid .columns__main #main .main__inner .hentry .page__content div .modal .modal-dialog .modal-content .modal-body {
            transform: translatex(0px) translatey(0px) !important;
        }

        /* Header toolbar */
        #wrapper #header .header__inner .header__content .lsvr-container .header__content-inner .header-toolbar {
            z-index: 1000 !important;
        }

        /* Header toolbar */
        #header .header-toolbar {
            bottom: -10px;
        }

        /* Columns */
        #columns {
            position: relative;
            top: 30px;
        }

        /* Lsvr grid */
        #core .lsvr-grid {
            top: -40px;
        }

        @media (min-width:992px) {

            /* Header toolbar */
            #header .header-toolbar {
                position: fixed;
                top: 5px;
                right: 14px;
            }

        }

        /* Core  inner */
        #core .core__inner {
            position: relative;
            top: 30px;
        }

        /* Columns */
        #columns {
            top: 10px !important;
            bottom: auto !important;
        }

        /* Core */
        #core {
            top: 130px;
            padding-top: -12px;
            transform: translatex(0px) translatey(0px);
        }

        /* Lsvr grid */
        #core .lsvr-grid {
            margin-top: -50px;
        }


        /* Img fluid */
        #core .lsvr-container .lsvr-grid .columns__main #main .main__inner .hentry .page__content div .modal .modal-dialog .modal-content .modal-body section .img-fluid {
            width: 100% !important;
        }

        /* Image */
        .hentry p img {
            text-align: center;
            margin-bottom: 18px;
            margin-top: 9px;
        }

        /* Image */
        .lsvr-grid .columns__main #main .main__inner .hentry .page__content div .modal .modal-dialog .modal-content .modal-body section .main-dec p img {
            width: 100% !important;
        }


        /* Shadow */

        @media (max-width:767px) {

            /* Lsvr grid */
            #core .lsvr-grid {
                transform: translatex(0px) translatey(0px);
                top: -310px !important;
            }

            /* Lsvr grid */
            #wrapper #core .core__inner #columns .columns__inner .lsvr-container .lsvr-grid {
                bottom: auto !important;
            }

        }

        @media (max-width:576px) {

            /* Top line */
            #top-line {
                transform: translatex(0px) translatey(0px);
            }

            /* Style */
            #style-LdSff {
                left: 48px !important;
                right: auto !important;
            }

            /* Style */
            #style-tSQyz {
                left: 30px !important;
                right: auto !important;
            }

            /* Style */
            #style-jGmEr {
                left: 17px !important;
                right: auto !important;
            }

        }

        @media (max-width:480px) {

            /* Style */
            #style-tSQyz {
                left: 31px !important;
                right: auto !important;
            }

            /* Style */
            #style-jGmEr {
                left: 27px !important;
                right: auto !important;

            }

            /* Light */
            #main>.bg-light:nth-child(2) {
                margin-top: 84px !important;
            }

            /* Container openweathermap widget 19 */
            #container-openweathermap-widget-19 {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Container openweathermap widget 16 */
            #container-openweathermap-widget-16 {
                display: flex;
                justify-content: center;
            }

            /* Lsvr container */
            #columns .lsvr-container {
                height: 4036px;
            }

            /* Footer */
            #columns footer {
                background-size: cover;
            }

        }

        @media (max-width:767px) {

            /* Light */
            #main>.bg-light:nth-child(2) {
                margin-top: 85px !important;
            }

        }

        @media (max-width:576px) {

            /* Button */
            #main .btn-info {
                margin-bottom: 8px;
            }

        }

        @media (max-width:480px) {

            /* Container fluid */
            .lsvr-grid .columns__sidebar .container-fluid {
                margin-bottom: 28px;
            }

            /* Footer */
            #columns footer {
                margin-top: 792px !important;
            }

        }

        #core .lsvr-container .lsvr-grid .columns__main #main .main__inner .hentry .page__content div .modal .modal-dialog .modal-content .modal-body {
            height: 85vh !important;
        }

        /* Comparison links */
        #main .comparison-links {
            background-color: rgba(13, 202, 240, 0);
            color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Link */
        #main .comparison-links a {
            text-align: center;
            color: #000000 !important;
            display: flex;
            justify-content: center;
            background-color: #0dcaf0;
            margin-left: 10px;
            margin-right: 10px;
            padding-left: 0px;
            padding-right: 0px;
            padding-top: 8px;
            padding-bottom: 8px;
        }

        /* Link */
        .comparison-links a {
            flex-direction: column;
            font-weight: 600;
        }

        /* Span Tag */
        .comparison-links .cursor-pointer span {
            font-size: 12px;
        }

        /* Link (hover) */
        #core .lsvr-container .lsvr-grid .columns__main #main .bg-light .comparison-links .col-sm-6 a:hover {
            color: #0619a6 !important;
        }
    </style>
    <div id="wrapper">
        <header class="header--has-languages header--has-map" id="header">
            <div class="header__inner">

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
                            <!-- HEADER TOOLBAR TOGGLE : end -->
                            <!-- HEADER TOOLBAR : begin -->

                            <div class="header-toolbar" style=" z-index: 999 !important;">


                                <a class="header-map-toggle header-map-toggle--desktop header-toolbar__item"
                                    href="{{ url($main->slug) }}/all-posts">

                                    <i class="fa fa-map-marker"></i>
                                    <span class="header-map-toggle__label">
                                        <b>All Posts</b>
                                    </span>
                                </a>


                                <!-- HEADER MOBILE MENU : end -->
                            </div>
                            <!-- HEADER TOOLBAR : end -->
                        </div>
                    </div>
                </div>
                <!-- HEADER CONTENT : end -->
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
                                                        cityCode="{{ $main->content_country_code ?? 'CON24' }}"
                                                        :locale="$locale" />
                                                    <!-- TOWNPRESS SITEMAP : begin -->
                                                    <x-portal.tag-list :cityId="$main->content_country_code" :cityCode="$main->content_country_code"
                                                        :citySlug="$main->slug" :locale="$locale" />
                                                </div>
                                                <!-- CATEGORY CONTENT : end -->
                                            </div>


                                        </div>
                                        <div class=" shadow  mt-3 pb-2 bg-light">
                                            <h3 class="text-center h3">Comparison Tools </h3>
                                            <div class="comparison-links">
                                                <div class="col-sm-6">
                                                    <a class="cursor-pointer text-light rounded-none"
                                                        href="/czech-republic-regional-comparison">Regional
                                                        Comparison <span>Czech - India</span></a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a class="cursor-pointer text-light rounded-none"
                                                        href="/czech-republic-country-comparison">Country Comparison
                                                        <span>Czech with Other Countries</span></a>
                                                </div>
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

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="p-2 pt-1 shadow bg-light">
                                            <h5 class="p-0 m-0 text-center">AI Reports</h5>
                                            <div class="row">
                                                <div class="col-sm-6"><a
                                                        href="https://g2c.prarang.in/ai/{{ urlencode($primary->analytics_slug ?? 'Country') }}"
                                                        class="btn btn-info btn-sm w-100 fw-semibold" target="_blank">
                                                        <i class="fa fa-robot me-1"></i>
                                                        {{ $primary->country_name ?? 'Country' }} AI Report
                                                    </a></div>
                                                <div class="col-sm-6"><a
                                                        href="https://g2c.prarang.in/ai/{{ ucfirst($secondary->analytics_slug ?? 'Country') }}"
                                                        class="btn btn-info btn-sm w-100 fw-semibold" target="_blank">
                                                        <i class="fa fa-robot me-1"></i>
                                                        {{ $secondary->country_name ?? 'Country' }} AI Report
                                                    </a></div>

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
                                <p>Prarang provides integrated digital solutions and unique insights to understand the
                                    cities of India and the World. Through our composite methodology of traditional
                                    research from rare books, maps and images, a Big database of India and World
                                    Metrics, an in-house LLM based on Indian Linguistics, we provide in depth city -
                                    hyperlocal knowledge, comprehensive knowledge by comparison between cities of the
                                    world, through our content, analytics, and semiotics solutions, for governance &
                                    corporate communication, while being localisation ready for any language/script.
                                </p>
                            </div>
                            <div class="text-center col-sm">
                                <h4 class="text-center">Follow Us</h4>
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
                <script>
                    function showComingSoon(event) {
                        event.preventDefault();

                        // Create modal HTML
                        const modalHTML = `
                            <div class="modal fade show" id="comingSoonModal" tabindex="-1" style="display: block; background: rgba(0,0,0,0.5);">
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
