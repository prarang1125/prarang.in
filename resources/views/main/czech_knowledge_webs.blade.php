@php
    $metaData = [
        'nav-heading' => view('components.nav-heading', [
            'text' => 'CZECH Knowledge Webs',
            'leftImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
            'rightImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
        ]),
        'nav-sub-heading' => '',
    ];

    $title = 'Czech Republic';
    $code = 'czech-republic';
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
        --shadow-card: 0 .5rem 2rem rgba(26, 79, 214, 0.08), 0 .125rem .5rem rgba(0, 0, 0, 0.04);
        --shadow-hover: 0 1.5rem 3.75rem rgba(26, 79, 214, 0.15), 0 .25rem 1rem rgba(0, 0, 0, 0.08);
        --radius-card: 1.5rem;
        --radius-btn: .75rem;
    }

    .nepal-webs-section {
        background: var(--surface);
        padding: 3rem 0 4rem;
        min-height: 100vh;
        font-family: 'DM Sans', sans-serif;
    }

    /* ── WIP Badge ── */
    .wip-badge {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        background: linear-gradient(135deg, #fff7e0, #fff);
        border: .0938rem solid #F5C800;
        border-radius: 62.4375rem;
        padding: .375rem 1.125rem;
        font-size: 11.52px;
        font-weight: 700;
        letter-spacing: 0.14em;
        color: #92600a;
        text-transform: uppercase;
        box-shadow: 0 .125rem .75rem rgba(245, 200, 0, 0.18);
        margin-bottom: .5rem;
    }

    .wip-badge::before {
        content: '';
        width: .5rem;
        height: .5rem;
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
        font-size: clamp(25.6px, 3.5vw, 38.4px);
        color: var(--text-main);
        font-weight: 700;
        letter-spacing: -0.02em;
        line-height: 1.2;
    }

    .section-subtitle {
        color: var(--text-muted);
        font-size: 15.2px;
        margin-top: .375rem;
    }

    /* ── Cards ── */
    .nkw-card {
        border-radius: var(--radius-card);
        overflow: hidden;
        background: var(--card-bg);
        box-shadow: var(--shadow-card);
        border: .0625rem solid var(--border);
        transition: transform 0.32s cubic-bezier(.22, .68, 0, 1.2), box-shadow 0.32s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .nkw-card:hover {
        transform: translateY(-0.625rem);
        box-shadow: var(--shadow-hover);
    }

    /* Image wrapper */
    .nkw-img-wrap {
        position: relative;
        overflow: hidden;
    }

    .nkw-img-wrap img {
        height: 13.125rem;
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
        bottom: .875rem;
        left: 1rem;
        font-size: 11.2px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #fff;
        opacity: 0.92;
    }

    /* Body */
    .nkw-card-body {
        padding: 1.25rem 1.125rem 1.375rem;
        display: flex;
        flex-direction: column;
        gap: .625rem;
        flex: 1;
    }

    /* Buttons */
    .nkw-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;
        padding: .6875rem 1rem;
        border-radius: var(--radius-btn);
        font-size: 12.48px;
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
        transform: translateY(-0.125rem);
        filter: brightness(1.06);
        box-shadow: 0 .375rem 1.25rem rgba(0, 0, 0, 0.12);
        text-decoration: none;
    }

    .nkw-btn:active {
        transform: translateY(0);
    }

    /* Colour variants */
    .btn-blue {
        background: linear-gradient(135deg, #1A4FD6, #2563eb);
        color: #fff;
        box-shadow: 0 .25rem .875rem rgba(26, 79, 214, 0.28);
    }

    .btn-yellow {
        background: linear-gradient(135deg, #F5C800, #fbbf24);
        color: #1a1a1a;
        box-shadow: 0 .25rem .875rem rgba(245, 200, 0, 0.30);
    }

    .btn-red {
        background: linear-gradient(135deg, #D92B2B, #ef4444);
        color: #fff;
        box-shadow: 0 .25rem .875rem rgba(217, 43, 43, 0.28);
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
        border-top: .1875rem solid var(--blue);
    }

    .nkw-card.accent-yellow {
        border-top: .1875rem solid var(--yellow);
    }

    .nkw-card.accent-red {
        border-top: .1875rem solid var(--red);
    }

    /* Icon chip inside button */
    .btn-icon {
        width: 1.125rem;
        height: 1.125rem;
        opacity: 0.85;
        flex-shrink: 0;
    }

    /* analytics hide */
    .nepal-webs .analytics-content {
        display: none !important;
    }

    /* ── Modal ── */
    #showLocalizationBox .modal-dialog {
        max-width: 48.75rem;
        margin-top: 3.75rem;
    }

    #showLocalizationBox .modal-content {
        border-radius: 1.25rem;
        border: none;
        overflow: hidden;
        box-shadow: 0 2rem 5rem rgba(0, 0, 0, 0.18);
    }

    #showLocalizationBox .modal-header {
        background: linear-gradient(135deg, #1A4FD6 0%, #2563eb 100%);
        border: none;
        padding: 1.125rem 1.5rem;
    }

    #showLocalizationBox .modal-title {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 19.2px;
        font-weight: 700;
        letter-spacing: -0.01em;
    }

    #showLocalizationBox .btn-close {
        filter: invert(1) brightness(2);
        opacity: 0.8;
    }

    #showLocalizationBox .modal-body {
        background: #f7f8fc;
        padding: 1.75rem 1.5rem;
    }

    #showLocalizationBox .modal-footer {
        background: #f7f8fc;
        border-top: .0625rem solid rgba(0, 0, 0, 0.06);
        padding: .875rem 1.5rem;
    }

    /* Localisation grid */
    .loc-grid {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        gap: 1.25rem;
        align-items: center;
    }

    @media (max-width: 40rem) {
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
        gap: .75rem;
    }

    .loc-chip {
        display: block;
        width: 100%;
        text-align: center;
        padding: .75rem 1rem;
        border-radius: .75rem;
        font-size: 11.52px;
        font-weight: 700;
        letter-spacing: 0.13em;
        text-transform: uppercase;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        cursor: default;
    }

    .loc-chip:hover {
        transform: translateY(-0.125rem);
    }

    .loc-chip-blue {
        background: #1A4FD6;
        color: #fff;
        box-shadow: 0 .25rem 1rem rgba(26, 79, 214, 0.2);
    }

    .loc-chip-yellow {
        background: #F5C800;
        color: #1a1a1a;
        box-shadow: 0 .25rem 1rem rgba(245, 200, 0, 0.2);
    }

    .loc-chip-red {
        background: #D92B2B;
        color: #fff;
        box-shadow: 0 .25rem 1rem rgba(217, 43, 43, 0.2);
    }

    .loc-center-col {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loc-center-card {
        background: linear-gradient(135deg, #fffbea, #fff);
        border: .0938rem solid #f5c800;
        border-radius: 1.125rem;
        padding: 1.5rem 1.25rem;
        text-align: center;
        box-shadow: 0 .75rem 2.5rem rgba(245, 200, 0, 0.14);
        font-family: 'Playfair Display', serif;
        font-size: 16px;
        color: #1a1a2e;
        line-height: 1.5;
        max-width: 13.75rem;
    }

    .loc-center-card .loc-icon {
        font-size: 32px;
        margin-bottom: .5rem;
    }

    /* Stagger reveal animation */
    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(1.5rem);
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
        padding-top: .3125rem;

    }

    /* Paragraph */
    .modal-xlg div p {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 79px;
        transform: translatex(0px) translatey(0px);
        background-color: #a7e5f0;
        border-style: solid;
        border-width: 1px;
        border-color: #020202;
    }

    /* Paragraph */
    .container #showLocalizationBox .modal-xlg .modal-content .modal-body div p {
        width: 89% !important;
    }

    /* Division */
    .modal-xlg .modal-body div {
        display: flex;
        justify-content: center;
        align-items: center;
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
                            <a href="https://g2c.prarang.in/Czech-Republic?data" target="_blank"
                                class="nkw-btn btn-blue">

                                Multilateral Data
                            </a>
                            <a href="https://g2c.prarang.in/czech-republic" target="_blank" class="nkw-btn btn-blue">

                                National Data
                            </a>
                            <button class="nkw-btn btn-blue" data-bs-toggle="modal"
                                data-bs-target="#showLocalizationBox">

                                TAG CZECH LOCALISATION
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
                            <a data-bs-toggle="modal" data-bs-target="#czechRegionsModal" class="nkw-btn btn-yellow">
                                CZECH AI REPORTS
                            </a>
                            <a href="https://www.prarang.in/india-czech-republic/all-posts" target="_blank"
                                class="nkw-btn btn-yellow">

                                BILATERAL : INDIA-CZECH
                            </a>
                            <button class="nkw-btn btn-yellow" data-bs-toggle="modal"
                                data-bs-target="#showLocalizationBox">

                                TEXT CZECH LOCALISATION
                            </button>
                        </div>
                    </div>
                </div>

                {{-- ── Card 3 : Images ── --}}
                <div class="col-md-6 col-lg-4">
                    <div class="nkw-card accent-red">
                        <div class="nkw-img-wrap">
                            <img src="{{ asset('assets/images/Image_Czech.png') }}" alt="Nepal Images">
                            <div class="nkw-img-overlay"></div>

                        </div>
                        <div class="nkw-card-body">
                            <span class="nkw-btn btn-red " data-bs-toggle="modal" data-bs-target="#showNepalCNModal">

                                CZECH – CULTURE/NATURE IMAGES
                            </span>
                            <span class="nkw-btn btn-red " data-bs-toggle="modal"
                                data-bs-target="#showNepalCitiesModal">

                                CITIES/VILLAGES : OLD/NEW IMAGES
                            </span>
                            <button class="nkw-btn btn-red" data-bs-toggle="modal"
                                data-bs-target="#showLocalizationBox">

                                TITLE CZECH LOCALISATION

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

    <style>
        /* Modal body */
        #showLocalizationBox .modal-xlg .modal-body {
            padding-top: 18px !important;
            padding-bottom: 0px !important;
        }

        /* Button */
        .modal-dialog-top .modal-body a {
            background-color: #f2d811;
            color: #020202;
        }

        /* Button (hover) */
        .modal-dialog-top .modal-body a:hover {
            font-weight: 600;
        }
    </style>

    {{-- ══════════════════════════════════════════
         Localisation Modal
    ══════════════════════════════════════════ --}}
    <div class="modal fade" id="showLocalizationBox" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xlg modal-dialog-centered">
            <div class="modal-content"
                style="border-radius:1rem; overflow:hidden; border:none; box-shadow:0 1.25rem 3.75rem rgba(0,0,0,0.15);">


                <div class="modal-body" style="background:#f8f9fc; ">

                    <div class="">
                        <p class="text-cenetr">
                            Native language translator to be contracted
                        </p>
                    </div>

                </div>

                <div class="modal-footer"
                    style="background:#f8f9fc; border-top:.0625rem solid rgba(0,0,0,0.06); padding:.75rem 1.5rem;">
                    <button type="button" class="btn btn-secondary btn-sm px-4" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="czechRegionsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-top">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Czech Republic AI Reports</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                @php
                    $czRegions = [
                        [
                            'name' => 'Prague and Central Bohemia',
                            'url' => 'https://g2c.prarang.in/czech-republic/prague-and-central-bohemia',
                        ],
                        ['name' => 'South Bohemia', 'url' => 'https://g2c.prarang.in/czech-republic/south-bohemia'],
                        ['name' => 'Pilsen', 'url' => 'https://g2c.prarang.in/czech-republic/pilsen'],
                        ['name' => 'South Moravia', 'url' => 'https://g2c.prarang.in/czech-republic/south-moravia'],
                        ['name' => 'Vysocina', 'url' => 'https://g2c.prarang.in/czech-republic/vysocina'],
                        [
                            'name' => 'Moravia-Silesia',
                            'url' => 'https://g2c.prarang.in/czech-republic/moravia--silesia',
                        ],
                        ['name' => 'Usti nad Labem', 'url' => 'https://g2c.prarang.in/czech-republic/usti-and-labem'],
                        ['name' => 'Olomouc', 'url' => 'https://g2c.prarang.in/czech-republic/olomouc'],
                        ['name' => 'Hradec Kralove', 'url' => 'https://g2c.prarang.in/czech-republic/hradec-kralove'],
                        ['name' => 'Pardubice', 'url' => 'https://g2c.prarang.in/czech-republic/pardubice'],
                        ['name' => 'Zlin', 'url' => 'https://g2c.prarang.in/czech-republic/zlin'],
                        ['name' => 'Karlovy Vary', 'url' => 'https://g2c.prarang.in/czech-republic/karlovy-vary'],
                        ['name' => 'Liberec', 'url' => 'https://g2c.prarang.in/czech-republic/liberec'],
                        ['name' => 'Czech Republic', 'url' => 'https://g2c.prarang.in/Czech Republic'],
                    ];
                @endphp


                <div class="modal-body text-center">

                    <p class="mb-3 text-muted">
                        The Czech Republic is divided into 14 regions, including Prague City, which falls within Central
                        Bohemia.
                    </p>

                    <div class="row g-2">


                        @foreach ($czRegions as $region)
                            <div class="col-6 col-sm-4">
                                <a target="_blank" href="{{ $region['url'] }}"
                                    class="btn btn-primary w-100">{{ $region['name'] }}</a>
                            </div>
                        @endforeach
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    {{-- nepal cn  --}}
    <div class="modal fade" id="showNepalCNModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content"
                style="border-radius:16px; overflow:hidden; border:none; box-shadow:0 20px 60px rgba(0,0,0,0.15);">



                <div class="modal-body" style="background:#f8f9fc; padding:32px 24px;">

                    <img src="{{ asset('assets/images/CZECH-CN-60.png') }}" alt="Nepal CN">
                    <div class="text-end">

                        <button type="button" data-bs-toggle="modal" data-bs-target="#showOtherImgModal"
                            class="btn btn-outline-primary btn-sm px-4">+ Others</button>
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
    </div>
    <div class="modal fade" id="showNepalCitiesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content"
                style="border-radius:16px; overflow:hidden; border:none; box-shadow:0 20px 60px rgba(0,0,0,0.15);">



                <div class="modal-body" style="background:#f8f9fc; padding:32px 24px;">

                    <img src="{{ asset('assets/images/CZECH CITIES.png') }}" alt="Nepal CN" </div>

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
</x-layout.main.base>
