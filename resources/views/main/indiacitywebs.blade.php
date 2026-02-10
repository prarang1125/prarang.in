<x-layout.main.base>
    <style>
        .scroll-hint {
            display: none;
            text-align: center;
            padding: 6px;
            background: linear-gradient(90deg, transparent, #007bff, transparent);
            color: #ffffff;
            font-size: 10px;
            font-weight: 600;
            border-radius: 0 0 4px 4px;
        }

        @media (max-width: 768px) {
            .scroll-hint {
                display: block;
            }
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
            padding-right: 0px;
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
    </style>

    <section class="px-5 max-w-7xl mx-auto bg-gray-50/30 rounded-3xl my-10">
        <div class="table-header-title-wrap">
            <h2 class="table-header-title">City Webs</h2>
            <div class="table-header-subtitle">Local Language Content</div>
        </div>
        <div class="table-header">
            <div class="table-header-main">
                <div class="table-header-left">
                    <p class="table-header-text">
                        Prarang delivers hyper-local, city-wise content in local languages. The content is
                        picture-centric
                        and supports city planning with updated, reliable data covering cities across India and beyond.
                        It includes essential city information such as digital metrics, yellow pages, and e-cards, along
                        with useful widgets like date, time, maps, weather, news, and city cyber-risk indicators.
                    </p>
                </div>
            </div>
            <div class="table-header-right">
                <h4 style="text-decoration: underline">City Web Features</h4>

                <a href="#" data-bs-toggle="modal" data-bs-target="#TheseMTw1">Posts</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#TheseMTi1">Portals</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#TheseMT">City Business</a>
            </div>
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
                            <div class="text-sm font-semibold">Hindi - City Webs</div>
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
                                <a href="/lucknow" target="_blank" class="matrix-pill matrix-pill-lite"
                                    style="text-decoration: none">
                                    Lucknow
                                </a>
                                <a href="/rampur" target="_blank" class="matrix-pill matrix-pill-lite"
                                    style="text-decoration: none">
                                    Rampur
                                </a>
                                <a href="/shahjahanpur" target="_blank" class="matrix-pill matrix-pill-lite"
                                    style="text-decoration: none">
                                    Shahjahanpur
                                </a>

                            </div>
                        </td>
                        <td class="text-center">

                            <a href="/jaunpur" target="_blank" class="matrix-pill matrix-pill-lite"
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
                                <div class="dropdown w-100" data-bs-auto-close="false">
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
                                <a href="/meerut" target="_blank" class="matrix-pill matrix-pill-lite"
                                    style="text-decoration: none">
                                    Meerut
                                </a>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="text-2xl font-black">मराठी</div>
                            <div class="text-sm font-semibold">Marathi - City Webs</div>
                        </td>
                        <td class="text-center">

                            <a href="/pune" target="_blank" class="matrix-pill matrix-pill-lite"
                                style="text-decoration: none">
                                Pune
                            </a>
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
        <div class="scroll-hint">&larr; Scroll horizontally &rarr;</div>
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
                                                                id="{{ $dropdownId }}" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                {{ $portalItem->city_name }}
                                                            </button>
                                                            <ul class="dropdown-menu shadow border-0 py-2 w-100"
                                                                aria-labelledby="{{ $dropdownId }}">
                                                                <li>
                                                                    <a class="dropdown-item py-2 px-3"
                                                                        href="/{{ $portalItem->slug }}">
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
                                                                                href="{{ $extUrl['url'] ?? '#' }}"
                                                                                target="_blank" rel="noopener">
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

    <div class="modal fade modal-xl feature-modal" id="TheseMTw1" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="TheseMTw1Label" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="container mt-3 top-main-div snipcss-qZ3SC">
                        <p>Prarang creates text with context (not mere translations) in local languages for targeted
                            communities. Global knowledge, localized &amp; socially useful. Created by detailed primary
                            &amp; secondary research on the City/District Head Quarter &amp; its community ( Urban
                            Planning foundation - Work, Place, Citizenship).</p>
                        <div>
                            <p>
                                <strong class="text-primary">Daily City Posts - Free Subscription – </strong><a
                                    class="links style-TYdFv" href="https://www.facebook.com/prarang.in"
                                    target="_blank" contenteditable="false" id="style-TYdFv">FB Page</a>, <a
                                    class="links style-wDEqa"
                                    href="https://play.google.com/store/apps/details?id=com.riversanskiriti.prarang"
                                    target="_blank" contenteditable="false" id="style-wDEqa">Mobile App</a> ( Coming
                                soon – X, eMail, Instagram, Whatsapp, Sharechat )
                            </p>
                        </div>
                        <div class="live-cities">
                            <div class="mt-5 row">
                                <div class="col-sm-2">
                                    <h6 class="live-heading">Live India Content -</h6>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank" href="/lucknow/all-posts" contenteditable="false"
                                            id="style-itfDe" class="style-itfDe w-75">Lucknow, U.P</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank" href="/meerut/all-posts" contenteditable="false"
                                            id="style-MN296" class="style-MN296 w-75">Meerut, U.P</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank" href="/rampur/all-posts" contenteditable="false"
                                            id="style-OsSpX" class="style-OsSpX w-75">Rampur, U.P</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank" href="/jaunpur/all-posts" contenteditable="false"
                                            id="style-yHeTB" class="style-yHeTB w-75">Jaunpur, U.P</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 row">
                            <div class="col-md-4 col-xs-12">
                                <div class="col-md-12 col-xs-12 reorganize live-content">
                                    <h3 id="style-GkoKw" class="style-GkoKw">
                                        <span id="style-aEhkE" class="style-aEhkE">
                                            <strong> REACH </strong>
                                        </span>
                                    </h3>
                                    <p id="style-Qy8gD" class="style-Qy8gD"> Daily connect with 20% population </p>
                                    <img src="{{ asset('assets/images/reach-gif.gif') }}" class="img-responsive">
                                    <ul>
                                        <li> Daily Picture-Centric Content Curation for Netizens of each City (365 days/
                                            Year) </li>
                                        <li> Pushed to 10,000 (approx) Subscribers of the City's Netizens everyday
                                            through Social-Media, Subscriptions and SEO </li>
                                        <li> Customized for local interest, topical yet educative (Non News) </li>
                                        <ul>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="col-md-12 col-xs-12 reorganize live-content">
                                    <h3 id="style-gEUMW" class="style-gEUMW">
                                        <span id="style-hH4Ds" class="style-hH4Ds">
                                            <strong> REORGANIZE </strong>
                                        </span>
                                    </h3>
                                    <p id="style-toVlt" class="style-toVlt"> Balanced Nature &amp; Culture Knowledge
                                    </p>
                                    <img src="{{ asset('assets/images/reorganize-gif.gif') }}"
                                        class="img-responsive">
                                    <ul>
                                        <li> City-Centric classification of high volume content in local language -
                                            Unique 60 Point Culture-Nature Grid </li>
                                        <li> One-Stop Portal for the Netizen needs of the City - Weather, Maps, News,
                                            Cinema, Smart Services, Classifieds, B2B, B2C &amp; G2C integrated </li>
                                        <li> New &amp; localized visual iconography for new netizens &amp; first-time
                                            smartphone users. </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="col-md-12 col-xs-12 reorganize style-A23aK live-content" id="style-A23aK">
                                    <h3 id="style-w1QBs" class="style-w1QBs">
                                        <span id="style-7J76Y" class="style-7J76Y">
                                            <strong> RE-CONNECT </strong>
                                        </span>
                                    </h3>
                                    <p id="style-56qcP" class="style-56qcP"> Reminder of Roots and Relevance </p>
                                    <img src="{{ asset('assets/images/reconnect-gif.gif') }}" class="img-responsive">
                                    <ul>
                                        <li> Glocal Content - Content contextualized to local, through global learnings.
                                        </li>
                                        <li> A balance between Culture &amp; Nature towards a bio-regional &amp; healthy
                                            life. </li>
                                        <li> Decrease in digital noise - Focused content to reduce digital distractions
                                            &amp; negativity of news </li>
                                        <li> Adult Education - Work, Place, Citizenship </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-xl feature-modal" id="TheseMTi1" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="TheseMTi1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-left modal-body test-start">
                    <section class="container mt-3 mb-5 top-main-div snipcss-wzUkN">
                        <p><strong class="text-primary">Integrated Portal -</strong> Prarang B2C Products ( Daily
                            Content &amp; Business) + Useful Widgets &amp; Information for the City.</p>
                        <p><strong class="text-primary">Hyper-local -</strong> Contextualized text, pictures &amp; data
                            Updates in Local languages for <b>Smarter Citizenship</b> (not just G2C or B2B).</p>
                        <p><strong class="text-primary">For City Residents -</strong> Not for tourists/visitors.</p>
                        <div class="live-cities">
                            <div class="mt-5 row">
                                <div class="col-sm-2">
                                    <h6 class="live-heading">Live India Portals -</h6>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank" href="/lucknow/" contenteditable="false" id="style-WWxjE"
                                            class="style-WWxjE btn btn-sm w-75">Lucknow, U.P</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank" href="/meerut/" contenteditable="false" id="style-GqsVF"
                                            class="style-GqsVF btn btn-sm w-75">Meerut, U.P</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank" href="/rampur/" contenteditable="false" id="style-2sWRI"
                                            class="style-2sWRI btn btn-sm w-75">Rampur, U.P</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="city-btn">
                                        <a target="_blank" href="/jaunpur/" contenteditable="false" id="style-SB9YH"
                                            class="style-SB9YH btn btn-sm w-75">Jaunpur, U.P</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="img">
                            <img src="https://b2c.prarang.in/assets/image/rampur.png" alt="" width="100%">
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

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








</x-layout.main.base>
