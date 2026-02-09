<x-layout.main.base>

    <style>
        /* Partner */
        main .be-partner {
            display: flex;
            justify-content: normal;
            align-items: center;
            flex-wrap: wrap;
        }

        /* Division */
        main .be-partner div {
            background-color: yellow;
            border: 1px solid gray;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 30px;
            padding-bottom: 30px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            margin-left: 58px;
            margin-bottom: 20px;
            margin-top: 10px;
            font-weight: 600;
        }

        /* Column 6/12 */
        main .col-md-6 {
            font-size: 14px;
        }

        @media (max-width:950px) {

            /* Division */
            main .be-partner div {
                display: none;
            }

        }

        @media (max-width:1200px) {

            /* Button */
            main .d-md-block {
                width: 200px;
            }

        }

        /* Request tomeet */
        #requestTomeet {
            background-color: rgba(255, 255, 0, 0);
        }

        /* Label */
        #meetingRequest .m-2 label {
            font-size: 14px;
            font-weight: 600;
            margin-left: 9px;
        }

        /* Modal content */
        #requestTomeet .modal-dialog .modal-content {
            height: 94vh;
            margin-top: -3px;
        }

        /* Request tomeet */
        #requestTomeet {
            margin-top: -12px;
            height: 100vh;
        }

        /* Modal body */
        main #requestTomeet .modal-dialog .modal-content .modal-body {
            height: 472px !important;
        }

        /* Modal content */
        #requestTomeet .modal-dialog .modal-content {
            height: 499px !important;
            transform: translatex(0px) translatey(0px);
            margin-top: 0px !important;
        }

        /* Request tomeet */
        #requestTomeet {
            margin-top: 12px !important;
        }

        /* Mail success */
        #mail-success {
            text-align: center;
            position: relative;
            top: 16px;
            left: -1px;
        }

        main .btn-warning {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
            padding-left: 0px;
            padding-right: 0px;
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .mx-auto .table-header-title-wrap h2 {
            font-size: 35px;
        }

        .matrix-table {
            width: 100%;
            border-collapse: collapse;
            border: 3px solid #0b2f6a;
            background: #ffffff;
            min-height: 356px;
        }

        .matrix-table th,
        .matrix-table td {
            border: 2px solid #0b2f6a;
            padding: 10px 12px;
            vertical-align: middle;
        }

        .matrix-table th:nth-child(5),
        .matrix-table td:nth-child(5) {
            min-width: 220px;
        }

        .matrix-head {
            background: #2c4f92;
            color: #ffffff;
            font-weight: 700;
            text-align: center;
            font-size: 14px;
        }

        .matrix-left-title {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 2px;
            text-align: center;
        }

        .matrix-subhead {
            font-weight: 700;
            font-size: 13px;
        }

        .matrix-bg {
            background: #e6f1fb;
        }

        .matrix-pill {
            display: inline-block;
            background: #4a6fb3;
            color: #ffffff;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            line-height: 1.1;
            margin: 4px 4px 0 0;
            border: 1px solid #3b5f9a;
        }

        .matrix-pill-lite {
            background: #4a6fb3;
            border: 1px solid #3b5f9a
        }

        .matrix-pill-outline {
            background: #ffffff;
            color: #0b2f6a;
            border: 1px solid #0b2f6a;
        }

        .matrix-pill-block {
            display: inline-block;
            margin-top: 6px;
        }

        .pune-stack {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .city-meta {
            font-size: 12px;
            font-weight: 700;
            color: #000000;
            margin-bottom: 6px;
        }

        .city-subnote {
            font-size: 12px;
            font-weight: 700;
            color: #000000;
            margin-top: 6px;
            line-height: 1.1;
        }

        .zone-modal .modal-content {
            border: 2px solid #0b2f6a;
            border-radius: 4px;
            overflow: hidden;
        }

        .zone-modal .modal-header {
            background: #3f6fb7;
            color: #ffffff;
            padding: 8px 12px;
            border: none;
        }

        .zone-modal .modal-title {
            font-weight: 700;
            font-size: 14px;
        }

        .zone-modal .btn-close {
            filter: invert(1);
        }

        .zone-accordion .accordion-item {
            background: #e3eefb;
            border: 1px solid #7aa0d6;
            margin: 6px 8px;
            border-radius: 2px !important;
            overflow: visible;
        }

        .zone-accordion .accordion-button {
            background: #d7e6fb !important;
            padding: 6px 8px;
            font-weight: 600 !important;
            color: #0b2f6a !important;
            box-shadow: none !important;
            border: none;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .zone-accordion .accordion-button::after {
            width: 12px;
            height: 12px;
            background-size: 12px 12px;
            margin-left: 6px;
        }

        .zone-city-count {
            font-size: 11px;
            color: #0b2f6a;
            background: #d7e6fb;
            padding: 2px 6px;
            border-radius: 2px;
            margin-left: auto;
            margin-right: 2px;
        }

        .zone-district-tabs {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 8px;
        }

        .zone-district-tab {
            background: #ffffff;
            border: 1px solid #7aa0d6;
            color: #0b2f6a;
            font-size: 12px;
            padding: 6px 8px;
            border-radius: 4px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 28px;
            transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease;
        }

        .zone-district-tab:hover {
            background: #f4f8ff;
            border-color: #3f6fb7;
            color: #0b2f6a;
            text-decoration: none;
        }

        .zone-district-tab.border-warning {
            background: #fff3cd;
            border-color: #ffc107;
        }

        .zone-district-tab.border-warning:hover {
            background: #ffe8a1;
            border-color: #ffb300;
        }

        .zone-modal .city-card {
            background: #ffffff;
            border: 1px solid #7aa0d6;
            color: #0b2f6a;
            font-size: 12px;
            padding: 3px 8px;
            border-radius: 2px;
            width: 100%;
            min-height: 26px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .zone-modal .dropdown-menu {
            min-width: 100%;
        }

        .zone-accordion .accordion-body {
            overflow: visible;
        }

        .zone-modal .dropdown-item {
            font-size: 12px;
        }

        .table-header {
            display: flex;
            gap: 20px;
            align-items: stretch;
            justify-content: space-between;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }

        .table-header-main {
            flex: 1 1 520px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .table-header-title-wrap {
            text-align: center;
            margin-bottom: 6px;
        }

        .table-header-left {
            padding-right: 16px;
        }

        .table-header-title {
            font-size: 28px;
            font-weight: 700;
            color: #2c4f92;
            margin: 0 0 2px 0;
        }

        .table-header-subtitle {
            font-size: 20px;
            font-weight: 700;
            color: #000000;
            margin: 0 0 6px 0;
        }

        .table-header-text {
            font-size: 15px;
            line-height: 1.4;
            color: #000000;
            margin: 0;
            text-align: justify
        }

        .table-header-right {
            flex: 0 0 220px;
            border: 1px solid #000000;
            padding: 8px 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .table-header-right h4 {
            font-size: 13px;
            font-weight: 700;
            margin: 0 0 6px 0;
        }

        .table-header-right a {
            display: block;
            font-size: 16px;
            color: #2c4f92;
            text-decoration: none;
            margin: 2px 0;
        }

        .feature-modal a {
            color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
            text-decoration: underline;
        }

        .feature-modal a:hover {
            --bs-link-color-rgb: var(--bs-link-hover-color-rgb);
        }

        .feature-modal .modal-content,
        .feature-modal .modal-body {
            background: #ffffff;
        }

        .feature-modal #style-gEUMW.style-gEUMW,
        .feature-modal #style-w1QBs.style-w1QBs {
            text-align: center;
        }

        .feature-modal #style-toVlt.style-toVlt,
        .feature-modal #style-56qcP.style-56qcP {
            text-align: center;
            font-size: 15px;
            font-style: italic;
        }

        .feature-modal #style-aEhkE.style-aEhkE,
        .feature-modal #style-hH4Ds.style-hH4Ds,
        .feature-modal #style-7J76Y.style-7J76Y {
            border-bottom: 2px solid #ccc;
            font-size: 18px !important;
            font-family: 'DM Sans', sans-serif;
            text-align: center;
        }

        .feature-modal .reorganize ul li {
            font-size: 13px;
            text-align: justify;
            font-family: 'Quicksand', sans-serif;
            list-style-position: outside !important;
            margin-left: 1em;
        }

        .feature-modal ul ul {
            margin-bottom: 0;
        }

        .feature-modal .live-cities .city-btn {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            padding: 4px 6px;
        }

        .feature-modal .live-cities .city-btn a {
            text-decoration: none;
            color: #000000;
        }

        .feature-modal #style-WWxjE.style-WWxjE,
        .feature-modal #style-GqsVF.style-GqsVF,
        .feature-modal #style-2sWRI.style-2sWRI,
        .feature-modal #style-SB9YH.style-SB9YH {
            cursor: pointer;
        }

        .language-tabs {
            margin-top: 16px;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 12px;
        }

        .coming-soon-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 16px 0 8px;
            color: #000000;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .coming-soon-divider::before,
        .coming-soon-divider::after {
            content: '';
            flex: 1 1 auto;
            height: 1px;
            background: #000000;
        }

        .language-tab {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid #0b2f6a;
            background: #ffffff;
            padding: 8px 6px;
            min-height: 64px;
        }

        .language-tab-title {
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            line-height: 1.1;
            font-family: 'Noto Sans', 'Segoe UI', Arial, sans-serif;
        }

        .language-tab-title.script {
            font-family: 'Brush Script MT', 'Segoe Script', cursive;
            font-weight: 600;
            font-size: 22px;
        }

        .language-tab-subtitle {
            margin-top: 2px;
            font-size: 15px;
            font-weight: 700;
            text-align: center;
            letter-spacing: 0.3px;
        }

        @media (max-width: 900px) {
            .language-tabs {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 520px) {
            .language-tabs {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        /* Flex */
        .container>.flex {
            box-shadow: 0px 0px 4px 2px #212529;
            padding-left: 10px;
            padding-right: 1px;
            padding-top: 10px;
            padding-bottom: 10px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 21px;
        }

        /* Auto */
        .container .flex .mx-auto {
            border-style: none !important;
        }

        /* Heading */
        .container .flex h2 {
            text-decoration: none !important;
            font-size: 28px;
            margin-bottom: 11px !important;
        }
    </style>
    <section class=" container mt-4">
        <div class="row">
            <div class="col-sm-8">
                <p class="mb-3">Prarang is open to Partnership in select 901+ Indian Markets & 195 World Markets. Each
                    Prarang Market is a unique Language Knowledge Web. Empowered with Prarang Content, Semiotics &
                    Analytics, Development and Market Planners our Partners can now create impact with their brands &
                    products.
                </p>
            </div>
            <div class="col-sm-4">
                <div class="rounded border p-2">
                    <p class="text-center h4">Partner Benefits</p>
                    <ul>
                        <li><a type="button" data-bs-toggle="modal" data-bs-target="#TheseMTw1">Product</a></li>
                        <li>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#TheseMTi1">Advertising</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <style>
        /* Button */
        .container .cirs a {
            padding-left: 57px;
            padding-right: 56px;
            position: relative;
            left: -80px;
            background-color: #0eb71d;
            color: #ffffff;
            transform: translatex(0px) translatey(0px);
            font-weight: 600;
            margin-bottom: 13px;
            border-color: #27e320 !important;
            padding-bottom: 3px;
        }

        /* Button (hover) */
        .container .cirs a:hover {
            background-color: #239d2e;
        }
    </style>
    <section class="text-center my-5 flex gap-3">
        <div class="border border-dark p-4 mx-auto">
            <h2 class="mb-4 text-decoration-underline no-underline">Partnership Login</h2>
            <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                <!-- Business Login Button -->
                <a class="btn btn-warning border border-dark px-4 py-2 fw-semibold" target="_blank"
                    href="https://b2b.prarang.in/login" style="min-width: 180px;">
                    Business Login
                </a>
                <!-- Govt & NGO Login Button -->
                <a class="btn btn-warning border border-dark px-4 py-2 fw-semibold" target="_blank"
                    href="https://b2b.prarang.in/login?lt=g2c" style="min-width: 180px;">
                    Govt. & NGO Login
                </a>
            </div>

        </div>
        <div class="border border-dark p-4 mx-auto flex justify-center items-center">
            <button class="btn btn-warning border border-dark px-4 py-2 fw-semibold" data-bs-toggle="modal"
                data-bs-target="#requestTomeet" style="min-width: 220px;">
                Create a New Partnership
            </button>
        </div>
    </section>
    <section class="px-5 max-w-7xl mx-auto bg-gray-50/30 rounded-3xl my-10">
        <div class="table-header-title-wrap">
            <h2 class="table-header-title">Prarang City Webs</h2>
            <div class="table-header-subtitle">Local Language Content</div>
        </div>

        <div class="overflow-x-auto">
            <table class="matrix-table ">
                <thead>
                    <tr>
                        <th class="matrix-left-title">INDIA</th>
                        <th class="matrix-head">City Ready</th>
                        <th class="matrix-head">City Lite</th>
                        <th class="matrix-head">City Plus</th>
                        <th class="matrix-head">City Prime</th>
                    </tr>
                    <tr>
                        <th class="matrix-subhead" style="min-width: 173px;">Prarang Content Posts</th>
                        <td class="text-center">Nil</td>
                        <td class="text-center">Weekly</td>
                        <td class="text-center">Alternate Day</td>
                        <td class="text-center">Daily</td>
                    </tr>
                </thead>
                <tbody class="matrix-bg">
                    <tr>
                        <td class="text-center">
                            <div class="text-2xl font-black">हिन्दी</div>
                            <div class="text-sm font-semibold">Hindi - 297 City Webs</div>
                        </td>
                        <td class="text-center">
                            <div class="text-sm font-bold">292 Knowledge Webs</div>
                            <div class="mt-2">

                                @foreach ($portal as $zone => $state)
                                    @if ($zone == 'Union Territories')
                                        @continue
                                    @endif
                                    <button type="button" class="matrix-pill" data-bs-toggle="modal"
                                        data-bs-target="#ZoneModal-{{ Str::slug($zone) }}">{{ $zone }} Zone
                                    </button>
                                @endforeach
                                @foreach ($portal as $zone => $state)
                                    @if ($zone != 'Union Territories')
                                        @continue
                                    @endif
                                    <button type="button" class="matrix-pill" data-bs-toggle="modal"
                                        data-bs-target="#ZoneModal-{{ Str::slug($zone) }}">{{ $zone }}
                                    </button>
                                @endforeach
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="flex flex-col gap-2 items-center">
                                <a href="/lucknow/all-posts" target="_blank" class="matrix-pill matrix-pill-lite"
                                    style="text-decoration: none">
                                    Lucknow
                                </a>
                                <a href="/rampur/all-posts" target="_blank" class="matrix-pill matrix-pill-lite"
                                    style="text-decoration: none">
                                    Rampur
                                </a>
                                <a href="/shahjahanpur/all-posts" target="_blank" class="matrix-pill matrix-pill-lite"
                                    style="text-decoration: none">
                                    Shahjahanpur
                                </a>

                            </div>
                        </td>
                        <td class="text-center">

                            <a href="/jaunpur/all-posts" target="_blank" class="matrix-pill matrix-pill-lite"
                                style="text-decoration: none">
                                Jaunpur
                            </a>
                        </td>
                        <td class="text-center">
                            @php
                                $meerutPortal = collect($portal)->flatten(2)->firstWhere('slug', 'meerut');
                                $meerutPortal =
                                    $meerutPortal ?: collect($portal)->flatten(2)->firstWhere('city_name', 'Meerut');
                            @endphp
                            @if ($meerutPortal && $meerutPortal->is_ext_url)
                                @php
                                    $dropdownId = 'portal-dropdown-meerut';
                                    $extUrls = is_string($meerutPortal->ext_urls)
                                        ? json_decode($meerutPortal->ext_urls, true)
                                        : $meerutPortal->ext_urls;
                                @endphp
                                <div class="dropdown w-100">
                                    <button type="button" class="matrix-pill matrix-pill-lite dropdown-toggle"
                                        id="{{ $dropdownId }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $meerutPortal->city_name ?? 'Meerut' }}
                                    </button>
                                    <ul class="dropdown-menu shadow border-0 py-2 w-100"
                                        aria-labelledby="{{ $dropdownId }}">
                                        <li>
                                            <a class="dropdown-item py-2 px-3" href="/{{ $meerutPortal->slug }}">
                                                Main Portal
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        @if (is_array($extUrls))
                                            @foreach ($extUrls as $extUrl)
                                                <li>
                                                    <a class="dropdown-item py-2 px-3"
                                                        href="{{ $extUrl['url'] ?? '#' }}" target="_blank"
                                                        rel="noopener">
                                                        {{ $extUrl['title'] ?? 'Link' }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            @else
                                <a href="/meerut/all-posts" target="_blank" class="matrix-pill matrix-pill-lite"
                                    style="text-decoration: none">
                                    Meerut
                                </a>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="text-2xl font-black">मराठी</div>
                            <div class="text-sm font-semibold">Marathi - 44 City Webs</div>
                        </td>
                        <td class="text-center">
                            <div class="city-meta">44 Knowledge Webs</div>
                            <div class="pune-stack">
                                <a href="/pune" target="_blank" class="matrix-pill matrix-pill-lite"
                                    style="text-decoration: none">
                                    Pune
                                </a>
                                <span class="matrix-pill matrix-pill-outline matrix-pill-block">+33 Coming Soon</span>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="matrix-pill matrix-pill-outline">Coming Soon</span>
                        </td>
                        <td class="text-center">
                            <span class="matrix-pill matrix-pill-outline" style="min-width: 100px;">Coming Soon</span>
                        </td>
                        <td class="text-center">
                            <span class="matrix-pill matrix-pill-outline">Coming Soon</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="coming-soon-divider"><span>Coming Soon</span></div>
        <div class="language-tabs">
            <div class="language-tab">
                <div class="language-tab-title script">English</div>
                <div class="language-tab-subtitle">English - 192 City Webs</div>
            </div>
            <div class="language-tab">
                <div class="language-tab-title">తెలుగు</div>
                <div class="language-tab-subtitle">Telugu - 67 City Webs</div>
            </div>
            <div class="language-tab">
                <div class="language-tab-title">اردو</div>
                <div class="language-tab-subtitle">Urdu - 51 City Webs</div>
            </div>
            <div class="language-tab">
                <div class="language-tab-title">தமிழ்</div>
                <div class="language-tab-subtitle">Tamil - 44 City Webs</div>
            </div>
            <div class="language-tab">
                <div class="language-tab-title">ગુજરાતી</div>
                <div class="language-tab-subtitle">Gujarati - 40 City Webs</div>
            </div>
            <div class="language-tab">
                <div class="language-tab-title">বাংলা</div>
                <div class="language-tab-subtitle">Bengali - 39 City Webs</div>
            </div>
            <div class="language-tab">
                <div class="language-tab-title">ਗੁਰਮੁਖੀ</div>
                <div class="language-tab-subtitle">Gurmukhi - 38 City Webs</div>
            </div>
            <div class="language-tab">
                <div class="language-tab-title">ಕನ್ನಡ</div>
                <div class="language-tab-subtitle">Kannada - 34 City Webs</div>
            </div>
            <div class="language-tab">
                <div class="language-tab-title">ଓଡ଼ିଆ</div>
                <div class="language-tab-subtitle">Odia - 21 City Webs</div>
            </div>
            <div class="language-tab">
                <div class="language-tab-title">অসমীয়া</div>
                <div class="language-tab-subtitle">Assamese - 15 City Webs</div>
            </div>
            <div class="language-tab">
                <div class="language-tab-title">മലയാളം</div>
                <div class="language-tab-subtitle">Malayalam - 19 City Webs</div>
            </div>
        </div>
    </section>

    @foreach ($portal as $zone => $states)
        @php
            $zoneId = Str::slug($zone);
        @endphp
        <div class="modal fade zone-modal" id="ZoneModal-{{ $zoneId }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-scrollable">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $zone }}
                            {{ $zone != 'Union Territories' ? 'Zone' : '' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-2">

                        <div class="accordion zone-accordion" id="ZoneAccordion-{{ $zoneId }}">
                            @foreach ($states as $state => $statePortals)
                                @php
                                    $stateId = Str::slug($zone . '-' . $state);
                                    $isFirst = $loop->first;
                                @endphp
                                <div class="accordion-item">
                                    @php
                                        $nonLiveCount = $statePortals->where('is_live', false)->count();
                                    @endphp
                                    <h2 class="accordion-header" id="{{ $stateId }}">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $stateId }}"
                                            aria-expanded="{{ $isFirst ? 'true' : 'false' }}">
                                            {{ $state }}
                                            {{-- <span class="zone-city-count">{{ count($statePortals) }}
                                        {{ Str::plural('City', count($statePortals)) }}</span> --}}
                                            @if ($nonLiveCount > 0)
                                                <span class="zone-city-count">
                                                    {{ $nonLiveCount }} {{ Str::plural('City', $nonLiveCount) }}
                                                </span>
                                            @endif
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $stateId }}" class="accordion-collapse collapse"
                                        data-bs-parent="#ZoneAccordion-{{ $zoneId }}">
                                        <div class="accordion-body">
                                            <div class="zone-district-tabs">
                                                @foreach ($statePortals as $portalItem)
                                                    {{-- @if ($portalItem->is_ext_url)
                                        @php
                                        $dropdownId =
                                        'portal-dropdown-' .
                                        Str::slug(
                                        $zone . '-' . $state . '-' . $portalItem->city_name,
                                        ) .
                                        '-' .
                                        $loop->index;
                                        @endphp
                                        <div class="dropdown w-100">
                                            <button type="button"
                                                class="city-card btn w-100 has-external dropdown-toggle"
                                                id="{{ $dropdownId }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ $portalItem->city_name }}
                                            </button>
                                            <ul class="dropdown-menu shadow border-0 py-2 w-100"
                                                aria-labelledby="{{ $dropdownId }}">
                                                <li>
                                                    <a class="dropdown-item py-2 px-3" href="/{{ $portalItem->slug }}">
                                                        Main Portal
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                @php
                                                $extUrls = is_string($portalItem->ext_urls)
                                                ? json_decode($portalItem->ext_urls, true)
                                                : $portalItem->ext_urls;
                                                @endphp
                                                @if (is_array($extUrls))
                                                @foreach ($extUrls as $extUrl)
                                                <li>
                                                    <a class="dropdown-item py-2 px-3"
                                                        href="{{ $extUrl['url'] ?? '#' }}" target="_blank"
                                                        rel="noopener">
                                                        {{ $extUrl['title'] ?? 'Link' }}
                                                    </a>
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <a href="/{{ $portalItem->slug }}" target="_blank"
                                            class="zone-district-tab {{ $portalItem->is_live ? 'border-warning border-2' : '' }}">
                                            {{ $portalItem->city_name }}
                                        </a>
                                        @endif --}}

                                                    @if (!$portalItem->is_live)
                                                        <a href="/{{ $portalItem->slug }}" target="_blank"
                                                            class="zone-district-tab">
                                                            {{ $portalItem->city_name }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach




    <div class="modal fade modal-xl feature-modal" id="TheseMT" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="TheseMTLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="container mt-4 top-main-div snipcss-E2e8t">
                        <p>Intra-City start-ups &amp; small business eco-system in local language for facilitating local
                            economics.</p>
                        <h3 class="text-primary">City Yellow-Pages<a href="https://yellowpages.prarang.in/"
                                target="_blank" contenteditable="false" id="style-Eqsoa" class="style-Eqsoa"><i
                                    class="bi bi-arrow-up-right-square"></i></a></h3>
                        <p>Free browsing of City retail, businesses, government offices &amp; entrepreneurs. Integrated
                            city employment listing &amp; related product/services listing. Secure password controlled
                            &amp; easy updation in local languages.</p>
                        <h3 class="text-primary">City e-Cards<a href="/vCard/" target="_blank"
                                contenteditable="false" id="style-o178n" class="style-o178n"><i
                                    class="bi bi-arrow-up-right-square"></i></a>
                        </h3>
                        <p>Free web-address to enable first step of digitization for informal sector workers &amp;
                            micro/small businesses with low literacy</p>
                        <div class="live-cities">
                            <div class="mt-5 row">
                                <div class="col-sm-2">
                                    <p class="live-heading">Live India Business -</p>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank"
                                            href="{{ route('city.show', ['city_name' => 'lucknow']) }}"
                                            contenteditable="false" id="style-9wwWF" class="style-9wwWF">Lucknow,
                                            U.P</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank" href="{{ route('city.show', ['city_name' => 'meerut']) }}"
                                            contenteditable="false" id="style-AOr3N" class="style-AOr3N">Meerut,
                                            U.P</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank" href="{{ route('city.show', ['city_name' => 'rampur']) }}"
                                            contenteditable="false" id="style-FWbYm" class="style-FWbYm">Rampur,
                                            U.P</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank"
                                            href="{{ route('city.show', ['city_name' => 'jaunpur']) }}"
                                            contenteditable="false" id="style-twSAO" class="style-twSAO">Jaunpur,
                                            U.P</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://b2c.prarang.in/assets/image/meerut-y.png" alt=""
                                width="100%">
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>





    <!-- Partnership Benefits Section -->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="requestTomeet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="requestTomeetLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="requestTomeetLabel"> New Partnership Request Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <form id="meetingRequest">
                        <div class="m-2">
                            <label for="meetingRequest-name">Name: </label>
                            <input id="meetingRequest-name" type="text" class="form-control w-100"
                                name='name'>
                        </div>
                        <div class="m-2">
                            <label for="meetingRequest-phone">Phone No:</label>
                            <input id="meetingRequest-phone" type="number" class="form-control w-100"
                                name='phone'>
                        </div>
                        <div class="m-2">
                            <label for="meetingRequest-email">Email</label>
                            <input id="meetingRequest-email" type="email" class="form-control w-100"
                                name='email'>
                        </div>
                        <div class="m-2 mt-4">
                            <textarea name="desc" id="" class="form-control" rows="2" placeholder="Say Something....."></textarea>
                        </div>
                        <p class="text-danger ps-3" id="request-error"></p>
                        <p class="text-end">

                            <button type="submit" class="btn btn-warning"><i
                                    class="fa fa-spinner fa-spin fa-fw d-none" id="loader"></i>Send</button>
                        </p>
                    </form>
                    <div id="mail-success"></div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-xl" id="TheseMTw1" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="TheseMTw1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="TheseMTLabel">Modal title</h1> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <section class="container my-5">
                        <div class="mb-4">
                            <h4 class="fw-bold mb-3">Partnership Benefits</h4>
                            <ul class="mb-4">
                                <li>Select a city and campaign date to book your advertisement</li>
                                <li>Upload creative assets (still or video)</li>
                                <li>Receive performance metrics on Day 5 and Day 31</li>
                                <li>View hyperlocal performance insights for each advertisement</li>
                                <li>Access in-depth city-level audience metrics</li>
                                <li>Explore Prarang City Analytics for planning, tracking, and optimization</li>
                            </ul>

                            <h5 class="fw-bold mb-3">Partnership Tiers -</h5>

                            <!-- Audience & Reach Table -->
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Audience & Reach</th>
                                            <th class="text-center">City Lite</th>
                                            <th class="text-center">City Plus</th>
                                            <th class="text-center">City Prime</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Minimum City Subscriber Base</td>
                                            <td class="text-center">300+</td>
                                            <td class="text-center">300+</td>
                                            <td class="text-center">10,000+</td>
                                        </tr>
                                        <tr>
                                            <td>Hyperlocal Reach per Post (within 7 days)</td>
                                            <td class="text-center">3,000+</td>
                                            <td class="text-center">3,000+</td>
                                            <td class="text-center">3,000+</td>
                                        </tr>
                                        <tr>
                                            <td>Total Monthly Reach</td>
                                            <td class="text-center">12,000+</td>
                                            <td class="text-center">45,000+</td>
                                            <td class="text-center">93,000+</td>
                                        </tr>
                                    </tbody>

                                    <thead class="table-light">
                                        <tr>
                                            <th>Content & Publishing</th>
                                            <th class="text-center">City Lite</th>
                                            <th class="text-center">City Plus</th>
                                            <th class="text-center">City Prime</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Posts per Month</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">15</td>
                                            <td class="text-center">31</td>
                                        </tr>
                                        <tr>
                                            <td>Creative Formats Included</td>
                                            <td class="text-center">3 Stills, 1 Video</td>
                                            <td class="text-center">13 Stills, 2 Video</td>
                                            <td class="text-center">27 Stills, 4 Videos</td>
                                        </tr>
                                        <tr>
                                            <td>Posting Frequency</td>
                                            <td class="text-center">Weekly</td>
                                            <td class="text-center">Alternate Day</td>
                                            <td class="text-center">Daily</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-xl" id="TheseMTi1" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="TheseMTi1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="TheseMTLabel">Modal title</h1> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-left test-start">
                    <section class="container mt-3">
                        <p>
                            The mobile internet provides a more targeted & cost-effective option vis-à-vis
                            traditional forms of
                            Advertising ( Newspapers, Outdoors, Radio/TV etc) . Yet, few hyperlocal digital
                            solutions have emerged for
                            advertisers thus far, as contextualized <span class="text-primary"> hyperlocal language
                                content </span>
                            continues to
                            be scarce, in an English language driven internet. With Prarang <span class="text-primary">
                                daily , local
                                language city content</span> creation, we attempt to fill that gap. Alongside, it
                            opens a <span class="text-primary"> new digital advertising </span> opportunity
                            Additionally, with the daily benefit
                            of unique
                            City semiotic insights, a quantum leap in advertising is now possible. With the <span
                                class="text-primary">
                                City Semiotics </span> detailed input , you can get to even understand the different
                            emotions,
                            interests, shapes, colours, fonts – everything which attributes various meanings, to
                            help you to construct
                            an advertisement that best promotes what you want to say.

                        </p>
                        <div>
                            <p>Prarang offers an exclusive Advertising opportunity for our City-Partners</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li>Zero Waste Advertisement</li>
                                        <ul>
                                            <li>Reach 20-70% (or more) of the internet-enabled population</li>
                                            <li>Save on paper and plastic</li>
                                            <li>Track competitive advertising across traditional media & industry
                                            </li>
                                        </ul>
                                        <li>Daily & Monthly City/District Metrics</li>
                                        <ul>
                                            <li>Measure as you grow</li>
                                            <li>Deep local data insights for sharper planning</li>
                                        </ul>

                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <ul>
                                        <li>Make Your City Beautiful and Safe
                                        </li>
                                        <ul>
                                            <li> No ugly billboards and hoardings</li>
                                        </ul>
                                        <li>City Event / Announcement</li>
                                        <ul>
                                            <li>Fastest Delivery across the city</li>
                                        </ul>
                                        <li>City Audience – Semiotic Insights</li>
                                        <ul>
                                            <li>Partner on deep engagement with local audiences</li>
                                        </ul>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <p class=""> Adscape - City Print & Outdoor Survey </p>


                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('meetingRequest').addEventListener('submit', function(event) {
            event.preventDefault();

            const loader = document.getElementById('loader');
            loader.classList.remove('d-none');

            const formData = new FormData(event.target);
            const requestData = Object.fromEntries(formData.entries());

            // Send POST request
            fetch('https://b2b.prarang.in/api/request-to-metting', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'auth-token': 'eb146cdf0c53ca9d738b4f473ad1712f'
                    },
                    body: JSON.stringify(requestData),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.done) {
                        loader.classList.add('d-none');
                        // Hide form
                        document.getElementById('meetingRequest').style.display = 'none';
                        // Show success message
                        document.getElementById('mail-success').textContent = 'Thanks for your request!';
                    } else {
                        document.getElementById('mail-success').textContent = 'Something went wrong!';
                    }
                })
                .catch(error => {
                    document.getElementById('request-error').innerHTML =
                        "Something went wrong please check your input fields and try again.";
                    loader.classList.add('d-none');
                });
        });
    </script>

</x-layout.main.base>
