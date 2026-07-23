@php
$metaData = [
'nav-heading' => view('components.nav-heading', [
'text' => 'India Knowledge Webs',
'leftImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
'rightImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
]),
'nav-sub-heading' => '',
];



$language = [
['name'=>'Bengali','slug'=>'bengali'],
['name'=>'Marathi','slug'=>'marathi'],
['name'=>'Telugu','slug'=>'telugu'],
['name'=>'Tamil','slug'=>'tamil'],
['name'=>'Urdu','slug'=>'urdu'],
['name'=>'Gujarati','slug'=>'gujarati'],
['name'=>'Kannada','slug'=>'kannada'],
['name'=>'Odia','slug'=>'odisha'],
['name'=>'Malayalam','slug'=>'malayalam'],
['name'=>'Grumukhi','slug'=>'grumukhi'],
['name'=>'Assamese','slug'=>'assamese'],
];

$liveCity=[
['name'=>'Lucknow','slug'=>'lucknow'],
['name'=>'Meerut','slug'=>'meerut'],
['name'=>'Rampur','slug'=>'rampur'],
['name'=>'Jaunpur','slug'=>'jaunpur'],
['name'=>'Shahjahanpur','slug'=>'shahjahanpur'],
];
@endphp

<style>
    :root {
        --ink: #1e2a4a;
        --brand: #0d6efd;
        --brand-dark: #1d4ed8;
        --flash-color: rgba(13, 110, 253, 0.35);
    }

    .top-card-section {
        padding: 8px 0;
    }

    /* ============ RIPPLE / FLASH EFFECT ============ */
    /* Applied to any element with .ripple-btn */
    .ripple-btn {
        position: relative;
        overflow: hidden;
        -webkit-tap-highlight-color: transparent;
    }

    .ripple-span {
        position: absolute;
        border-radius: 50%;
        transform: scale(0);
        background: var(--flash-color);
        pointer-events: none;
        animation: ripple-grow 600ms ease-out forwards;
    }

    @keyframes ripple-grow {
        to {
            transform: scale(2.6);
            opacity: 0;
        }
    }

    /* quick full-surface flash on top of the ripple */
    .flash-overlay {
        position: absolute;
        inset: 0;
        background: #fff;
        opacity: 0;
        pointer-events: none;
        border-radius: inherit;
    }

    .flash-overlay.flash-active {
        animation: flash-pulse 350ms ease-out;
    }

    @keyframes flash-pulse {
        0% {
            opacity: .55;
        }

        100% {
            opacity: 0;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        .ripple-span,
        .flash-overlay.flash-active {
            animation: none !important;
            display: none !important;
        }
    }

    /* ============ TOP CARDS ============ */
    .custom-card {
        position: relative;
        border-radius: 24px;
        padding: 24px 20px;
        text-align: center;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        overflow: hidden;
        transition: transform .3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow .3s cubic-bezier(0.4, 0, 0.2, 1), border-color .3s ease;
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.08), 0 1px 3px rgba(0, 0, 0, 0.02);
        height: 100%;
        border: 1px solid rgba(13, 110, 253, 0.06);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .custom-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px -15px rgba(13, 110, 253, 0.25), 0 0 15px 2px rgba(13, 110, 253, 0.1);
        border-color: rgba(13, 110, 253, 0.35);
    }

    .custom-card:active {
        transform: translateY(-2px) scale(.99);
    }

    /* Continuous shiny sweeping flash/shimmer effect on selected button inside cards */
    .card-inner-btn {
        position: relative;
        overflow: hidden;
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
    }

    .card-inner-btn::after {
        content: '';
        position: absolute;
        top: 0;
        left: -150%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg,
                transparent,
                rgba(255, 255, 255, 0.4),
                rgba(255, 255, 255, 0.7),
                rgba(255, 255, 255, 0.4),
                transparent);
        transform: skewX(-25deg);
        animation: continuous-shimmer 3.5s infinite ease-in-out;
    }

    @keyframes continuous-shimmer {
        0% {
            left: -150%;
        }

        35% {
            left: 150%;
        }

        100% {
            left: 150%;
        }
    }

    /* Accents & Color Bars */
    .top-color-bar,
    .bottom-color-bar {
        display: flex;
        height: 4px;
        width: 100%;
        border-radius: 2px;
        overflow: hidden;
    }

    .top-color-bar {
        margin-bottom: 18px;
    }

    .bottom-color-bar {
        margin-top: 18px;
    }

    .top-color-bar span,
    .bottom-color-bar span {
        flex: 1;
        height: 100%;
    }

    .bar-blue {
        background: blue;
    }

    .bar-yellow {
        background: yellow;
    }

    .bar-red {
        background: red;
    }

    .bar-light-yellow {
        background: yellow;
    }

    .bar-lime {
        background: #bef264;
    }

    .bar-green {
        background: #22c55e;
    }

    /* Icon */
    .icon-circle {
        width: 60px;
        height: 60px;
        margin: 0 auto 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        border-radius: 50%;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(13, 110, 253, 0.05);
    }

    .custom-card:hover .icon-circle {
        transform: scale(1.1) rotate(4deg);
        background: rgba(13, 110, 253, 0.06);
        border-color: rgba(13, 110, 253, 0.15);
    }

    .icon-circle img {
        width: 36px;
        height: 36px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .custom-card:hover .icon-circle img {
        transform: scale(1.05);
    }

    .card-title-small {
        font-size: 18px;
        letter-spacing: 0.5px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 2px;
    }

    .card-number {
        font-size: 16px;
        font-weight: 600;
        color: #475569;
    }

    .card-body-wrapper {
        width: 100%;
        position: relative;
    }

    /* User Requested Styles */
    /* Top color bar */
    .top-card-section .d-block .top-color-bar {
        height: 30px;
        margin-bottom: 0px;
    }

    /* Bar yellow */
    .top-card-section .d-block .bar-yellow {
        background-color: #effb12;
    }

    /* Bottom color bar */
    .top-card-section .d-block .bottom-color-bar {
        height: 30px;
        margin-top: 0px;
    }

    /* Custom card */
    .top-card-section .d-block .custom-card {
        padding-top: 0px;
        padding-bottom: 0px;
        height: 259px;
        border-radius: 32px;
    }

    .top-card-section .d-block .card-body-wrapper {
        height: 136px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    /* Dropdown */
    .dropdown-icon {
        font-size: 20px;
        display: inline-flex;
        align-items: center;
        transition: transform .25s ease;
    }

    .dropdown-icon.rotate {
        transform: rotate(180deg);
    }

    .dropdownss {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        left: 0;
        right: 0;
        top: calc(100% + 6px);
        background-color: #fff;
        min-width: 180px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 26px rgba(0, 0, 0, 0.16);
        z-index: 99;
    }

    .dropdown-content a {
        color: #222;
        padding: 10px 14px;
        text-decoration: none;
        display: block;
        transition: background .2s ease;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #eef4ff;
        color: var(--brand-dark);
    }

    .show {
        display: block;
    }

    /* ============ ANALYTICS BUTTONS ============ */
    .analytics-card {
        position: relative;
        border-radius: 14px;
        text-align: center;
        color: var(--brand);
        font-size: 17px;
        font-weight: 600;
        text-decoration: none !important;
        padding: 14px 18px;
        background: #ffffff;
        border: 1.5px solid rgba(13, 110, 253, 0.18);
        box-shadow: 0 3px 10px rgba(13, 110, 253, 0.06);
        transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease;
        cursor: pointer;
    }

    .analytics-card:hover {
        background: var(--brand);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 10px 22px rgba(13, 110, 253, 0.25);
    }

    .analytics-card:active {
        transform: translateY(-1px) scale(.98);
    }

    .blue {
        background: #0d6efd;
    }

    .yellow {
        background: yellow;
    }

    .red {
        background: rgb(220 38 38);
    }

    /* ============ LANGUAGE / CITY CHIPS ============ */
    .hoverbox {
        display: inline-block;
        padding: 12px 16px;
        margin-bottom: 5px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .hoverbox:hover {
        background: rgba(13, 110, 253, 0.08);
    }

    .lang-chip {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        text-decoration: none !important;
        padding: 10px 14px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 500;
        color: #1e2a4a;
        background: #f4f6fb;
        border: 1px solid transparent;
        transition: transform .18s ease, box-shadow .18s ease, background .18s ease, border-color .18s ease, color .18s ease;
    }

    .lang-chip:hover {
        transform: translateY(-3px);
        background: #ffffff;
        border-color: rgba(13, 110, 253, 0.35);
        color: var(--brand-dark);
        box-shadow: 0 8px 18px rgba(13, 110, 253, 0.14);
    }

    .lang-chip:active {
        transform: translateY(-1px) scale(.97);
    }

    .city-chip {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none !important;
        padding: 8px 16px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(135deg, var(--brand), var(--brand-dark));
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.25);
        transition: transform .18s ease, box-shadow .18s ease, filter .18s ease;
        margin-right: 4px;
    }

    .city-chip:hover {
        transform: translateY(-2px);
        filter: brightness(1.08);
        box-shadow: 0 8px 18px rgba(13, 110, 253, 0.32);
    }

    .city-chip:active {
        transform: translateY(0) scale(.97);
    }

    .anchorshadow:hover {
        background: rgba(0, 0, 0, 0.06);
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    @media (max-width: 576px) {
        .anchorshadow {
            font-size: 14px;
        }

        .gapsm {
            gap: 1rem !important;
        }
    }

    /* Custom card */
    .top-card-section .d-block .custom-card {
        height: 189px;
        width: 332px;
        padding-right: 0px;
        padding-left: 0px;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
        transform: translatex(0px) translatey(0px);
    }

    /* Image */
    .top-card-section .d-block img {
        width: 50px;
        height: 50px;
    }

    /* Link */
    .top-card-section a {
        display: flex !important;
        justify-content: center;
    }

    /* Live Blinking Indicator */
    .live-blink {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #e8e5e5;
        color: #045f04;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        padding: 3px 10px;
        border-radius: 9999px;
        letter-spacing: 0.5px;
        margin-left: 8px;
        animation: pulse-live-indicator 1.2s infinite alternate;
        box-shadow: 0 0 8px rgba(220, 38, 38, 0.2);
    }

    .live-blink::before {
        content: '';
        display: inline-block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: #024802;
        animation: pulse-dot 1.2s infinite;
    }

    @keyframes pulse-live-indicator {
        0% {
            opacity: 0.85;
            box-shadow: 0 0 4px rgba(220, 38, 38, 0.15);
        }

        100% {
            opacity: 1;
            box-shadow: 0 0 12px rgba(220, 38, 38, 0.4);
        }
    }

    @keyframes pulse-dot {

        0%,
        100% {
            transform: scale(0.9);
        }

        50% {
            transform: scale(1.3);
        }
    }

    /* Card title small */
    .top-card-section .d-block .card-title-small {
        font-size: 14px;
    }

    /* Card inner */
    .top-card-section .d-block .card-inner-btn {
        height: 52px;
        transform: translatex(0px) translatey(0px);
        padding-bottom: 0px;
        background-color: rgba(250, 245, 122, 0.58);
        padding-left: 3px;
        padding-right: 4px;
    }

    /* Card number */
    .top-card-section .d-block .card-number {
        position: relative;
        top: -5px;
        font-size: 14px;
    }

    /* Card inner */
    .justify-content-center .col-md-6:nth-child(3) .card-inner-btn {
        width: 208px !important;
    }

    /* Card inner */
    .container section .top-card-section .justify-content-center .col-md-6 .d-block .custom-card .card-body-wrapper .card-inner-btn {
        width: 51% !important;
    }

    /* Link */
    .md\:items-start .md\:justify-start a {
        width: 120px;
    }

    /* Division */
    .container section .justify-center .md\:flex-row {
        padding-top: 15px !important;
    }
</style>

<x-layout.main.base :metaData="$metaData">

    <section class=" bg-gray-50" x-data="{ showModal: false }">

        <!-- TOP CARDS -->
        <div class="container top-card-section">
            <div class="row justify-content-center g-4">

                <!-- Villages -->
                <div class="col-md-6 col-lg-4">
                    <a href="{{ url('webs/filter/villages') }}" class="text-decoration-none d-block h-100">
                        <div class="custom-card ripple-btn">
                            <div class="flash-overlay"></div>

                            <div class="top-color-bar">
                                <span class="bar-blue"></span>
                                <span class="bar-yellow"></span>
                                <span class="bar-red"></span>
                            </div>

                            <div class="card-body-wrapper">
                                <div class="icon-circle">
                                    <img loading="lazy" src="{{ asset('assets/images/Villages1.png') }}" alt="Villages">
                                </div>
                                <div class="border-blue-200 border-2 rounded-full w-50 card-inner-btn">
                                    <div class="card-title-small" style="color: rgb(29 78 215);">
                                        Villages
                                    </div>
                                    <div class="card-number">
                                        592,765
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-color-bar">
                                <span class="bar-light-yellow"></span>
                                <span class="bar-lime"></span>
                                <span class="bar-green"></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Cities -->
                <div class="col-md-6 col-lg-4">
                    <a href="{{ url('webs/filter/cities') }}" class="text-decoration-none d-block h-100">
                        <div class="custom-card ripple-btn">
                            <div class="flash-overlay"></div>

                            <div class="top-color-bar">
                                <span class="bar-blue"></span>
                                <span class="bar-yellow"></span>
                                <span class="bar-red"></span>
                            </div>

                            <div class="card-body-wrapper">
                                <div class="icon-circle">
                                    <img loading="lazy" src="{{ asset('assets/images/town1.png') }}" alt="Cities">
                                </div>
                                <div class="border-blue-200 border-2 rounded-full w-50 card-inner-btn">
                                    <div class="card-title-small" style="color: rgb(29 78 215);">
                                        Cities
                                    </div>
                                    <div class="card-number">
                                        6,331
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-color-bar">
                                <span class="bar-light-yellow"></span>
                                <span class="bar-lime"></span>
                                <span class="bar-green"></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- World -->
                <div class="col-md-6 col-lg-4">
                    <a href="{{ url('/country-webs-filter') }}" class="text-decoration-none d-block h-100">
                        <div class="custom-card ripple-btn">
                            <div class="flash-overlay"></div>

                            <div class="top-color-bar">
                                <span class="bar-blue"></span>
                                <span class="bar-yellow"></span>
                                <span class="bar-red"></span>
                            </div>

                            <div class="card-body-wrapper">
                                <div class="icon-circle">
                                    <img loading="lazy" src="{{ asset('assets/images/World.png') }}"
                                        alt="World Bilateral">
                                </div>
                                <div class="border-blue-200 border-2 rounded-full w-75 card-inner-btn">
                                    <div class="card-title-small" style="color: rgb(29 78 215);">
                                        World-Bilateral
                                    </div>
                                    <div class="card-number">
                                        194
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-color-bar">
                                <span class="bar-light-yellow"></span>
                                <span class="bar-lime"></span>
                                <span class="bar-green"></span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        <!-- LANGUAGE BUTTONS -->
        <div class="flex justify-center mt-4 px-3">
            <div
                class="w-full max-w-6xl bg-white rounded-2xl shadow-lg p-5 flex flex-col md:flex-row gap-6 items-start">
                <div class="flex flex-col justify-start items-center md:items-start min-w-[220px] w-full md:w-auto">
                    <div class="flex items-center text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">
                        Hindi <span class="live-blink">Live</span>
                    </div>
                    <div class="flex flex-wrap gap-2 justify-center md:justify-start w-full">
                        @foreach ($liveCity as $ct)
                        <a href="/{{$ct['slug']}}" class="city-chip ripple-btn">
                            <div class="flash-overlay"></div>
                            {{ $ct['name'] }}
                        </a>
                        @endforeach
                        <a href="https://humsabek.in/" class="city-chip ripple-btn">
                            <div class="flash-overlay"></div>
                            All
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 w-full">
                    @foreach($language as $value)
                    <a href="javascript:void(0)" @click="showModal = true" class="lang-chip ripple-btn">
                        <div class="flash-overlay"></div>
                        {{ $value['name'] }} Web
                    </a>
                    @endforeach
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
            @click.self="showModal = false">

            <div class="bg-white rounded-2xl p-6 w-80 text-center shadow-xl">
                <h3 class="text-xl font-bold mb-2">
                    Coming Soon
                </h3>
                <p class="text-gray-500 mb-4">
                    India Stack Language Localization
                </p>
                <button @click="showModal = false"
                    class="ripple-btn w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <div class="flash-overlay"></div>
                    Close
                </button>
            </div>
        </div>

        <!-- Analytics Heading -->
        <div class="text-center mb-6 mt-12">
            <h1 class="text-xl md:text-2xl font-bold text-gray-800">
                Understanding India: Analytics
            </h1>
        </div>

        <!-- ANALYTICS -->
        <div class="flex justify-center px-4">
            <div class="flex flex-wrap justify-center gapsm items-center gap-5 sm:gap-3 w-full max-w-5xl">

                <a href="{{ url('/india-rural') }}"
                    class="analytics-card ripple-btn anchorshadow flex-1 min-w-[140px] sm:min-w-[180px] lg:min-w-0 lg:flex-[1_1_22%] max-w-[240px]">
                    <div class="flash-overlay"></div>
                    Rural
                </a>

                <a href="{{ url('/town-webs') }}"
                    class="analytics-card ripple-btn anchorshadow flex-1 min-w-[140px] sm:min-w-[180px] lg:min-w-0 lg:flex-[1_1_22%] max-w-[240px]">
                    <div class="flash-overlay"></div>
                    Urban
                </a>

                <a href="{{ url('/city-webs') }}"
                    class="analytics-card ripple-btn anchorshadow flex-1 min-w-[140px] sm:min-w-[180px] lg:min-w-0 lg:flex-[1_1_22%] max-w-[240px]">
                    <div class="flash-overlay"></div>
                    Districts
                </a>

                <div class="flex-1 min-w-[140px] sm:min-w-[180px] lg:min-w-0 lg:flex-[1_1_22%] max-w-[240px]">
                    <div class="dropdownss w-full">
                        <button type="button"
                            class="city-tab dropbtn ripple-btn whitespace-nowrap analytics-card anchorshadow w-full">
                            <div class="flash-overlay"></div>
                            Language Distribution
                            <span id="dropdownIcon" class="dropdown-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </button>

                        <div id="myDropdown" class="dropdown-content">
                            <a href="/town-webs-in" target="_blank">
                                Cities
                            </a>
                            <a href="/village-webs" target="_blank">
                                Villages
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <style>
        /* Analytics card (hover) */
        .container .gapsm a.analytics-card:hover {
            color: #000000;
        }

        /* Division */
        .container section .md\:items-start {
            justify-content: center;
            align-items: center;
            padding-top: 19px;
            padding-bottom: 17px;
            border-right-width: 4px;
        }

        /* Division */
        .md\:flex-row .md\:items-start .md\:justify-start {
            justify-content: center;
            align-items: center;
            transform: translatex(0px) translatey(0px);
        }

        /* Division */
        .container section .md\:flex-row {
            padding-top: 8px !important;
            padding-bottom: 10px !important;
        }

        /* City tab */
        .gapsm .dropdownss .city-tab {
            width: 106%;
        }

        /* City tab (hover) */
        .gapsm .dropdownss .city-tab:hover {
            color: #000000;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const dropbtn = document.querySelector('.dropbtn');
            const dropdownMenu = document.getElementById('myDropdown');
            const dropdownIcon = document.getElementById('dropdownIcon');

            if (dropbtn) {
                dropbtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    dropdownMenu.classList.toggle('show');
                    dropdownIcon.classList.toggle('rotate');
                });

                window.addEventListener('click', function(event) {
                    if (!event.target.closest('.dropdownss')) {
                        dropdownMenu.classList.remove('show');
                        dropdownIcon.classList.remove('rotate');
                    }
                });
            }

            // ============ RIPPLE + FLASH CLICK EFFECT ============
            document.querySelectorAll('.ripple-btn').forEach(function(el) {
                el.addEventListener('click', function(e) {
                    const rect = el.getBoundingClientRect();

                    // ripple circle positioned at click point
                    const ripple = document.createElement('span');
                    ripple.className = 'ripple-span';
                    const size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                    ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                    el.appendChild(ripple);
                    ripple.addEventListener('animationend', () => ripple.remove());

                    // quick full-surface flash
                    const flash = el.querySelector('.flash-overlay');
                    if (flash) {
                        flash.classList.remove('flash-active');
                        // force reflow so the animation can restart on rapid clicks
                        void flash.offsetWidth;
                        flash.classList.add('flash-active');
                    }
                });
            });
        });
    </script>

</x-layout.main.base>
