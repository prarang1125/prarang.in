@php
    $metaData = [
        'nav-heading' => view('components.nav-heading', [
            'text' => 'Nepal Knowledge Webs',
            'leftImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
            'rightImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
        ]),
        'nav-sub-heading' => '',
    ];

    $title = 'Nepal';
    $code = 'nepal';
@endphp

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@400;500;600&display=swap');

    :root {
        --blue: #1A4FD6;
        --blue-light: #EEF3FF;
        --yellow: #F5C800;
        --yellow-light: #FFFBEA;
        --red: #D92B2B;
        --red-light: #FFF0F0;
        --surface: #F7F8FC;
        --card-bg: #ffffff;
        --text-main: #1a1a2e;
        --text-muted: #6b7280;
        --border: rgba(0, 0, 0, 0.07);
        --shadow-card: 0 8px 32px rgba(26, 79, 214, 0.08), 0 2px 8px rgba(0, 0, 0, 0.04);
        --shadow-hover: 0 24px 60px rgba(26, 79, 214, 0.15), 0 4px 16px rgba(0, 0, 0, 0.08);
        --radius-card: 24px;
        --radius-btn: 12px;
    }

    .nepal-webs-section {
        background: var(--surface);
        padding: 48px 0 64px;
        min-height: 100vh;
        font-family: 'DM Sans', sans-serif;
    }

    /* ── WIP Badge ── */
    .wip-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #fff7e0, #fff);
        border: 1.5px solid #F5C800;
        border-radius: 999px;
        padding: 6px 18px;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        color: #92600a;
        text-transform: uppercase;
        box-shadow: 0 2px 12px rgba(245, 200, 0, 0.18);
        margin-bottom: 8px;
    }

    .wip-badge::before {
        content: '';
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #F5C800;
        animation: pulse-dot 1.6s ease-in-out infinite;
    }

    @keyframes pulse-dot {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: 0.4;
            transform: scale(0.7);
        }
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.6rem, 3.5vw, 2.4rem);
        color: var(--text-main);
        font-weight: 700;
        letter-spacing: -0.02em;
        line-height: 1.2;
    }

    .section-subtitle {
        color: var(--text-muted);
        font-size: 0.95rem;
        margin-top: 6px;
    }

    /* ── Cards ── */
    .nkw-card {
        border-radius: var(--radius-card);
        overflow: hidden;
        background: var(--card-bg);
        box-shadow: var(--shadow-card);
        border: 1px solid var(--border);
        transition: transform 0.32s cubic-bezier(.22, .68, 0, 1.2), box-shadow 0.32s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .nkw-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hover);
    }

    /* Image wrapper */
    .nkw-img-wrap {
        position: relative;
        overflow: hidden;
    }

    .nkw-img-wrap img {
        height: 210px;
        width: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }

    .nkw-card:hover .nkw-img-wrap img {
        transform: scale(1.06);
    }

    .nkw-img-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, transparent 40%, rgba(10, 15, 40, 0.45));
        pointer-events: none;
    }

    /* Card label strip */
    .nkw-card-label {
        position: absolute;
        bottom: 14px;
        left: 16px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #fff;
        opacity: 0.92;
    }

    /* Body */
    .nkw-card-body {
        padding: 20px 18px 22px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        flex: 1;
    }

    /* Buttons */
    .nkw-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 11px 16px;
        border-radius: var(--radius-btn);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
        width: 100%;
    }

    .nkw-btn:hover {
        transform: translateY(-2px);
        filter: brightness(1.06);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        text-decoration: none;
    }

    .nkw-btn:active {
        transform: translateY(0);
    }

    /* Colour variants */
    .btn-blue {
        background: linear-gradient(135deg, #1A4FD6, #2563eb);
        color: #fff;
        box-shadow: 0 4px 14px rgba(26, 79, 214, 0.28);
    }

    .btn-yellow {
        background: linear-gradient(135deg, #F5C800, #fbbf24);
        color: #1a1a1a;
        box-shadow: 0 4px 14px rgba(245, 200, 0, 0.30);
    }

    .btn-red {
        background: linear-gradient(135deg, #D92B2B, #ef4444);
        color: #fff;
        box-shadow: 0 4px 14px rgba(217, 43, 43, 0.28);
    }

    /* Disabled state (no-click) */
    .btn-disabled {
        opacity: 0.55;
        pointer-events: none;
        cursor: not-allowed;
        filter: grayscale(0.3);
    }

    .btn-disabled:hover {
        transform: none;
        box-shadow: none;
        filter: none;
    }

    /* Card accent top border */
    .nkw-card.accent-blue {
        border-top: 3px solid var(--blue);
    }

    .nkw-card.accent-yellow {
        border-top: 3px solid var(--yellow);
    }

    .nkw-card.accent-red {
        border-top: 3px solid var(--red);
    }

    /* Icon chip inside button */
    .btn-icon {
        width: 18px;
        height: 18px;
        opacity: 0.85;
        flex-shrink: 0;
    }

    /* analytics hide */
    .nepal-webs .analytics-content {
        display: none !important;
    }

    /* ── Modal ── */
    #showLocalizationBox .modal-dialog {
        max-width: 780px;
        margin-top: 60px;
    }

    #showLocalizationBox .modal-content {
        border-radius: 20px;
        border: none;
        overflow: hidden;
        box-shadow: 0 32px 80px rgba(0, 0, 0, 0.18);
    }

    #showLocalizationBox .modal-header {
        background: linear-gradient(135deg, #1A4FD6 0%, #2563eb 100%);
        border: none;
        padding: 18px 24px;
    }

    #showLocalizationBox .modal-title {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 1.2rem;
        font-weight: 700;
        letter-spacing: -0.01em;
    }

    #showLocalizationBox .btn-close {
        filter: invert(1) brightness(2);
        opacity: 0.8;
    }

    #showLocalizationBox .modal-body {
        background: #f7f8fc;
        padding: 28px 24px;
    }

    #showLocalizationBox .modal-footer {
        background: #f7f8fc;
        border-top: 1px solid rgba(0, 0, 0, 0.06);
        padding: 14px 24px;
    }

    /* Localisation grid */
    .loc-grid {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        gap: 20px;
        align-items: center;
    }

    @media (max-width: 640px) {
        .loc-grid {
            grid-template-columns: 1fr;
        }

        .loc-center-col {
            display: none;
        }
    }

    .loc-col {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .loc-chip {
        display: block;
        width: 100%;
        text-align: center;
        padding: 12px 16px;
        border-radius: 12px;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.13em;
        text-transform: uppercase;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        cursor: default;
    }

    .loc-chip:hover {
        transform: translateY(-2px);
    }

    .loc-chip-blue {
        background: #1A4FD6;
        color: #fff;
        box-shadow: 0 4px 16px rgba(26, 79, 214, 0.2);
    }

    .loc-chip-yellow {
        background: #F5C800;
        color: #1a1a1a;
        box-shadow: 0 4px 16px rgba(245, 200, 0, 0.2);
    }

    .loc-chip-red {
        background: #D92B2B;
        color: #fff;
        box-shadow: 0 4px 16px rgba(217, 43, 43, 0.2);
    }

    .loc-center-col {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loc-center-card {
        background: linear-gradient(135deg, #fffbea, #fff);
        border: 1.5px solid #f5c800;
        border-radius: 18px;
        padding: 24px 20px;
        text-align: center;
        box-shadow: 0 12px 40px rgba(245, 200, 0, 0.14);
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
        color: #1a1a2e;
        line-height: 1.5;
        max-width: 220px;
    }

    .loc-center-card .loc-icon {
        font-size: 2rem;
        margin-bottom: 8px;
    }

    /* Stagger reveal animation */
    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .col-md-6:nth-child(1) .nkw-card {
        animation: fadeSlideUp 0.5s ease both 0.15s;
    }

    .col-md-6:nth-child(2) .nkw-card {
        animation: fadeSlideUp 0.5s ease both 0.28s;
    }

    .col-md-6:nth-child(3) .nkw-card {
        animation: fadeSlideUp 0.5s ease both 0.41s;
    }
</style>
<style>
    /* Nepal webs section */
    .container .nepal-webs-section {
        padding-top: 5px;

    }

    /* Paragraph */
    #showLocalizationBox div p {
        text-align: center;
        height: 62px;
        transform: translatex(0px) translatey(0px);
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #86cef3;
        border-style: solid;
        border-color: #020202;
        border-width: 1px;
    }

    /* Paragraph */
    .container #showLocalizationBox .modal-xlg .modal-content .modal-body div p {
        width: 82% !important;
    }

    /* Division */
    #showLocalizationBox .modal-body div {
        display: flex;
        justify-content: center;
        align-items: center;
        transform: translatex(0px) translatey(0px);
    }

    /* Text black */
    #showAIReportModal .modal-xlg .text-black {
        color: #020202 !important;
    }

    /* Link */
    #showAIReportModal .modal-xlg a {
        color: #020202 !important;
    }

    /* Modal body */


    /* Text black */
    .container .modal-xlg .text-black:nth-child(2) {
        background-color: #fadb60;
    }

    /* Text black */
    .container .modal-xlg .text-black:nth-child(3) {
        background-color: #f2f6bb;
    }

    /* Image */
    .m-0 .nkw-card img {
        width: 100%;
        height: 270px;
    }
</style>
<x-layout.main.base :metaData="$metaData">

    <section class="nepal-webs-section nepal-webs">
        <div class="m-0 p-0">

            {{-- Section Header --}}
            <div class="text-center mb-2">
                <div class="d-flex justify-content-center mb-2">
                    <span class="wip-badge">Work in Progress</span>
                </div>
            </div>

            {{-- Cards Row --}}
            <div class="row g-4 justify-content-center">

                {{-- ── Card 1 : Data ── --}}
                <div class="col-md-6 col-lg-4">
                    <div class="nkw-card accent-blue">
                        <div class="nkw-img-wrap">
                            <img src="{{ asset('assets/images/Data.png') }}" alt="Nepal Data">
                            <div class="nkw-img-overlay"></div>

                        </div>
                        <div class="nkw-card-body">
                            <a href="https://g2c.prarang.in/nepal?data" target="_blank" class="nkw-btn btn-blue">

                                Multilateral Data
                            </a>
                            <a href="https://g2c.prarang.in/nepal/data" target="_blank" class="nkw-btn btn-blue">

                                National Data
                            </a>
                            <button class="nkw-btn btn-blue" data-bs-toggle="modal"
                                data-bs-target="#showLocalizationBox">

                                TAG NEPALI/HINDI LOCALISATION
                            </button>
                        </div>
                    </div>
                </div>

                {{-- ── Card 2 : AI / Bilateral ── --}}
                <div class="col-md-6 col-lg-4">
                    <div class="nkw-card accent-yellow">
                        <div class="nkw-img-wrap">
                            <img src="{{ asset('assets/images/Text.png') }}" alt="Nepal AI">
                            <div class="nkw-img-overlay"></div>

                        </div>
                        <div class="nkw-card-body">
                            <a data-bs-toggle="modal" data-bs-target="#showAIReportModal" class="nkw-btn btn-yellow">
                                Nepal AI Report
                            </a>
                            <a href="https://www.prarang.in/india-nepal/all-posts" target="_blank"
                                class="nkw-btn btn-yellow">

                                BILATERAL : INDIA-NEPAL
                            </a>
                            <button class="nkw-btn btn-yellow" data-bs-toggle="modal"
                                data-bs-target="#showLocalizationBox">

                                TEXT NEPALI/HINDI LOCALISATION
                            </button>
                        </div>
                    </div>
                </div>

                {{-- ── Card 3 : Images ── --}}
                <div class="col-md-6 col-lg-4">
                    <div class="nkw-card accent-red">
                        <div class="nkw-img-wrap">
                            <img src="{{ asset('assets/images/Image_Nepal.png') }}" alt="Nepal Images">
                            <div class="nkw-img-overlay"></div>

                        </div>
                        <div class="nkw-card-body">
                            <span class="nkw-btn btn-red " data-bs-toggle="modal" data-bs-target="#showNepalCNModal">

                                NEPAL – CULTURE/NATURE IMAGES
                            </span>
                            <span class="nkw-btn btn-red" data-bs-toggle="modal" data-bs-target="#showNepalCitiesModal">

                                NEPAL –

                                CITIES/VILLAGES : OLD/NEW IMAGES
                            </span>
                            <button class="nkw-btn btn-red" data-bs-toggle="modal"
                                data-bs-target="#showLocalizationBox">

                                TITLE NEPALI/HINDI LOCALISATION
                            </button>
                        </div>
                    </div>
                </div>

            </div>{{-- /row --}}

            {{-- Analytics widget --}}
            <div class="widget__content text-center mt-4">
                <x-portal.cityanaytics :title="$title" :code="$code" />
            </div>

        </div>
    </section>

    {{-- nepal cn  --}}
    <div class="modal fade" id="showNepalCNModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content"
                style="border-radius:16px; overflow:hidden; border:none; box-shadow:0 20px 60px rgba(0,0,0,0.15);">



                <div class="modal-body" style="background:#f8f9fc; padding:32px 24px;">

                    <img src="{{ asset('assets/images/NEPAL-CN-60.png') }}" alt="Nepal CN">
                    <div class="text-end">

                        <button type="button" data-bs-toggle="modal" data-bs-target="#showOtherImgModal"
                            class="btn btn-outline-primary btn-sm px-4">+ Others</button>
                    </div>
                </div>

                <div class="modal-footer"
                    style="background:#f8f9fc; border-top:1px solid rgba(0,0,0,0.06); padding:12px 24px;">
                    <button type="button" class="btn btn-secondary btn-sm px-4" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="showNepalCitiesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content"
                style="border-radius:16px; overflow:hidden; border:none; box-shadow:0 20px 60px rgba(0,0,0,0.15);">



                <div class="modal-body" style="background:#f8f9fc; padding:32px 24px;">

                    <img src="{{ asset('assets/images/NEPAL CITIES.png') }}" alt="Nepal CN" </div>

                    <div class="modal-footer"
                        style="background:#f8f9fc; border-top:1px solid rgba(0,0,0,0.06); padding:12px 24px;">
                        <button type="button" class="btn btn-secondary btn-sm px-4"
                            data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showOtherImgModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content"
                style="border-radius:16px; overflow:hidden; border:none; box-shadow:0 20px 60px rgba(0,0,0,0.15);">



                <div class="modal-body" style="background:#f8f9fc; padding:32px 24px;">

                    <img src="{{ asset('https://prarang.in/images/Process_Chart_Prarang_3.jpg') }}" alt="Nepal CN"
                        </div>

                    <div class="modal-footer"
                        style="background:#f8f9fc; border-top:1px solid rgba(0,0,0,0.06); padding:12px 24px;">
                        <button type="button" class="btn btn-secondary btn-sm px-4"
                            data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- AI Report Modal --}}
    <div class="modal fade" id="showAIReportModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xlg modal-dialog-centered">
            <div class="modal-content"
                style="border-radius:16px; overflow:hidden; border:none; box-shadow:0 20px 60px rgba(0,0,0,0.15);">

                <div class="modal-header"
                    style="background:linear-gradient(135deg,#ffffff,#ffffff); border:none; padding:16px 24px;">
                    <h5 class="modal-title" style="color:#000000; font-weight:700; font-size:1.1rem;">Nepal
                        AI Report </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        style="filter:invert(1) brightness(2);"></button>
                </div>

                <div class="modal-body" style="background:#f8f9fc; padding:32px 24px;">

                    <p class="text-center">
                        Nepal is divided into 7 provinces.
                    </p>
                    <p class="bg-blue-400 text-black py-2 rounded text-center">
                        <a href="https://g2c.prarang.in/ai/nepal" class="text-white" target="_blank">Nepal</a>
                    </p>
                    <p class="bg-blue-200 border border-blue-400 text-black py-2 rounded text-center">Province AI
                        Reports – Coming Soon
                    </p>

                </div>

                <div class="modal-footer"
                    style="background:#f8f9fc; border-top:1px solid rgba(0,0,0,0.06); padding:12px 24px;">
                    <button type="button" class="btn btn-secondary btn-sm px-4"
                        data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <style>
        /* Modal body */
        #showLocalizationBox .modal-xlg .modal-body {
            padding-top: 18px !important;
            padding-bottom: 0px !important;
        }
    </style>
    {{-- ══════════════════════════════════════════
         Localisation Modal
    ══════════════════════════════════════════ --}}
    <div class="modal fade" id="showLocalizationBox" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xlg modal-dialog-centered">
            <div class="modal-content"
                style="border-radius:16px; overflow:hidden; border:none; box-shadow:0 20px 60px rgba(0,0,0,0.15);">



                <div class="modal-body" style="background:#f8f9fc;">

                    <div class="">
                        <p class="text-cenetr">
                            Native language translator to be contracted
                        </p>
                    </div>

                </div>

                <div class="modal-footer"
                    style="background:#f8f9fc; border-top:1px solid rgba(0,0,0,0.06); padding:12px 24px;">
                    <button type="button" class="btn btn-secondary btn-sm px-4"
                        data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</x-layout.main.base>
