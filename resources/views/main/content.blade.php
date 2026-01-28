<x-layout.main.base>
    <style>
        /* Link */
        .rounded ul a {
            font-size: 12px !important;
            font-weight: 600 !important;
            color: #0d6efd !important;
            text-decoration: none !important;
        }

        .rounded ul a:hover {
            text-decoration: underline !important;

        }

        /* Link */
        .table-main-lang tr a:hover {
            color: #0d6efd !important;
        }



        #style-gEUMW.style-gEUMW {
            text-align: center;
        }

        #style-toVlt.style-toVlt {
            text-align: center;
            font-size: 15px;
            font-style: italic;
        }

        #style-w1QBs.style-w1QBs {
            text-align: center;
        }

        #style-56qcP.style-56qcP {
            text-align: center;
            font-size: 15px;
            font-style: italic;
        }

        .live-cities .city-btn a {
            text-decoration: none;
            color: #000000;
        }

        #style-aEhkE.style-aEhkE {
            border-bottom: 2px solid #ccc;
            font-size: 18px !important;
            font-family: 'DM Sans', sans-serif;
            text-align: center;
        }



        .reorganize ul li {
            font-size: 16px;
            text-align: justify;
            font-family: 'Quicksand', sans-serif;
            list-style-position: outside !important;
            margin-left: 1em;
        }

        .reorganize ul li {
            font-size: 13px;
            text-align: justify;
            font-family: 'Quicksand', sans-serif;
            list-style-position: outside !important;
            margin-left: 1em;
        }

        ul ul {
            margin-bottom: 0;
        }

        #style-hH4Ds.style-hH4Ds {
            border-bottom: 2px solid #ccc;
            font-size: 18px !important;
            font-family: 'DM Sans', sans-serif;
            text-align: center;
        }

        #style-7J76Y.style-7J76Y {
            border-bottom: 2px solid #ccc;
            font-size: 18px !important;
            font-family: 'DM Sans', sans-serif;
            text-align: center;
        }

        .live-cities .city-btn {
            background-color: yellow;
            text-decoration: none;
            text-align: center;
        }

        a {
            color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
            text-decoration: underline;
        }

        .live-cities .city-btn a {
            text-decoration: none;
            color: #000000;
        }

        a:hover {
            --bs-link-color-rgb: var(--bs-link-hover-color-rgb);
        }


        /* These were inline style tags. Uses id+class to override almost everything */
        #style-WWxjE.style-WWxjE {
            cursor: pointer;
        }

        #style-GqsVF.style-GqsVF {
            cursor: pointer;
        }

        #style-2sWRI.style-2sWRI {
            cursor: pointer;
        }

        #style-SB9YH.style-SB9YH {
            cursor: pointer;
        }

        /* --- India Portals Minimal Yellow Design --- */

        /* Trigger Row Styles */
        .portal-trigger-row {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .portal-label {
            font-size: 13px;
            color: #adb5bd;
            font-weight: 700;
            margin-bottom: 12px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Minimal Yellow Buttons (Zone Pills) */
        .zone-pill {
            border-radius: 50px;
            padding: 8px 24px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border: 1px solid #ffc107;
        }

        .zone-pill:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Modal Minimal Styling */
        .portal-modal .modal-content {
            background: #fff !important;
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .portal-modal .modal-header {
            background: #ffc107;
            color: #000;
            padding: 20px 30px;
            border: none;
        }

        .portal-modal .modal-title {
            font-weight: 700;
            text-transform: none;
            letter-spacing: 0;
        }

        .portal-modal .btn-close {
            filter: none;
        }

        /* Minimal Accordion */
        .portal-accordion .accordion-item {
            background: #fff;
            border: 1px solid #eee;
            margin-bottom: 8px;
            border-radius: 10px !important;
            overflow: hidden;
        }

        .portal-accordion .accordion-button {
            background: #fdfdfd !important;
            padding: 18px 25px;
            font-weight: 600 !important;
            color: #444 !important;
            box-shadow: none !important;
            border: none;
        }

        .portal-accordion .accordion-button:not(.collapsed) {
            background: #fff !important;
            color: #856404 !important;
            border-bottom: 1px solid #fff3cd;
        }

        /* Simple City Grid */
        .city-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 10px;
            padding: 15px 5px;
        }

        .city-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 10px 15px;
            text-align: center;
            font-size: 14px;
            font-weight: 500;
            color: #555;
            text-decoration: none;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 45px;
        }

        .city-card:hover {
            border-color: #ffc107;
            background: #fffdf5;
            color: #856404;
            text-decoration: none;
        }

        .city-card.has-external {

            border: 2px solid #ffc107;
            border-left: 10px solid #ffc107;

        }

        .city-count-badge {
            font-size: 11px;
            font-weight: 600;
            background: #eee;
            color: #777;
            padding: 3px 8px;
            border-radius: 6px;
            margin-left: auto;
        }

        .accordion-button:not(.collapsed) .city-count-badge {
            background: #fff3cd;
            color: #856404;
        }
    </style>
    <style>
        /* Button */
        .container .flex-wrap a.btn-warning {
            font-size: 16px;
            width: 200px;
        }

        /* Button */
        .px-0 .flex-wrap .btn-warning {
            width: 200px !important;
        }

        /* Span Tag */
        .px-0 span {
            margin-bottom: 4px;
        }

        /* Accordion button */
        .container .container .container .modal-md .modal-content .modal-body .accordion-item .accordion-button {
            background-color: #f8fae9 !important;
            /* transform: translatex(0px) translatey(0px) !important; */
        }

        /* Accordion button */
        .accordion-button {
            display: grid;
        }

        /* Accordion button */
        .container .container .container .modal-md .modal-content .modal-body .accordion-item .accordion-button {
            grid-template-columns: 70% 20fr 10fr !important;
        }
    </style>
    <section class="bs5-top-heading">
        <p class="">Content</p>
        <p>Glocal for Hyperlocal</p>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-sm-8">
                <p>
                    The DNA of Content is Text/Scripts, Pictures/Images & Data/Numbers.Good content creation requires
                    research using books, journals & online sources.

                </p>
                <p>
                    For each identified Market, Prarang creates a Knowledge Web with a single address ( Portal - URL)
                    and adds meaningful & hyper-localized Content ( Daily Posts) for its netizens, alongside providing a
                    self-updation local Business ( Yellow-Pages & e-Cards) platform.
                    <br>
                    Prarang City Knowledge Webs are thus updated with Content daily, continuously.

                </p>
                <p class="mt-3"><b>Live City Knowledge Webs :</b></p>

            </div>
            <div class="col-sm-4">
                <div class="p-2 border rounded">
                    <p class="text-center h4">Content Benefits</p>
                    <ul>

                        <li><a type="button" data-bs-toggle="modal" data-bs-target="#TheseMTw1">Daily Posts</a></li>
                        <li>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#TheseMTi1">City Portals</a>
                        </li>
                        <li>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#TheseMT">City Business</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <!-- Daily Posts -->
            <div class="row align-items-center mb-3 portal-trigger-row shadow-sm">
                <div class="col-md-2 text-md-right text-center">
                    <h6 class="mb-0 font-weight-bold">Daily Posts:</h6>
                </div>
                <div class="col-md-10">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="/lucknow/all-posts" target="_blank" class="btn btn-sm btn-warning m-1">Lucknow</a>
                        <a href="/meerut/all-posts" target="_blank" class="btn btn-sm btn-warning m-1">Meerut</a>
                        <a href="/rampur/all-posts" target="_blank" class="btn btn-sm btn-warning m-1">Rampur</a>
                        <a href="/jaunpur/all-posts" target="_blank" class="btn btn-sm btn-warning m-1">Jaunpur</a>
                    </div>
                </div>
            </div>
            <!-- Business -->
            <div class="row align-items-center mb-3 portal-trigger-row shadow-sm">
                <div class="col-md-2 text-md-right text-center">
                    <h6 class="mb-0 font-weight-bold">Business:</h6>
                </div>
                <div class="col-md-10">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('city.show', ['city_name' => 'lucknow']) }}" target="_blank"
                            class="btn btn-sm btn-warning m-1">Lucknow</a>
                        <a href="{{ route('city.show', ['city_name' => 'meerut']) }}" target="_blank"
                            class="btn btn-sm btn-warning m-1">Meerut</a>
                        <a href="{{ route('city.show', ['city_name' => 'rampur']) }}" target="_blank"
                            class="btn btn-sm btn-warning m-1">Rampur</a>
                        <a href="{{ route('city.show', ['city_name' => 'jaunpur']) }}" target="_blank"
                            class="btn btn-sm btn-warning m-1">Jaunpur</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 px-0">
                    <div class="portal-trigger-row shadow-sm">
                        <span class="portal-label">INDIA PORTALS</span>

                        <!-- Hindi Webs Section -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-2">
                                <h6 class="mb-0 font-weight-bold">Hindi Webs</h6>
                            </div>
                            <div class="col-md-10">
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($portal as $zone => $states)
                                        <button class="zone btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#zoneModal-{{ Str::slug($zone) }}">
                                            {{ $zone }} Zone
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Marathi Webs Section -->
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <h6 class="mb-0 font-weight-bold">Marathi Webs</h6>
                            </div>
                            <div class="col-md-10">
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="/pune" target="_blank" class=" btn btn-warning text-decoration-none">
                                        Pune
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @foreach ($portal as $zone => $states)
                @php
                    $zoneId = Str::slug($zone);
                @endphp

                <div class="modal fade portal-modal" id="zoneModal-{{ $zoneId }}" tabindex="-1">
                    <div class="modal-dialog modal-md modal-dialog-scrollable ">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $zone }} Zone </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body p-4 bg-light">
                                <div class="accordion portal-accordion" id="accordion-{{ $zoneId }}">

                                    @foreach ($states as $state => $statePortals)
                                        @php
                                            $stateId = Str::slug($zone . '-' . $state);
                                            $isFirst = $loop->first;
                                        @endphp

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-{{ $stateId }}">
                                                <button
                                                    class="accordion-button {{ $isFirst ? 'collapsed' : 'collapsed' }}"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{ $stateId }}"
                                                    aria-expanded="{{ $isFirst ? 'false' : 'false' }}">
                                                    {{ $state }}
                                                    <span class="city-count-badge">
                                                        {{ count($statePortals) }} Cities
                                                    </span>
                                                </button>
                                            </h2>

                                            <div id="collapse-{{ $stateId }}"
                                                class="accordion-collapse collapse {{ $isFirst ? '' : '' }}"
                                                data-bs-parent="#accordion-{{ $zoneId }}">

                                                <div class="accordion-body">
                                                    <div class="city-grid">

                                                        @foreach ($statePortals as $portalItem)
                                                            @if ($portalItem->is_ext_url)
                                                                <div class="btn-group w-100">
                                                                    <button
                                                                        class="city-card btn w-100 has-external dropdown-toggle"
                                                                        data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        {{ $portalItem->city_name }}
                                                                    </button>

                                                                    <ul
                                                                        class="dropdown-menu shadow border-0 py-2 w-100">
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
                                                                                ? json_decode(
                                                                                    $portalItem->ext_urls,
                                                                                    true,
                                                                                )
                                                                                : $portalItem->ext_urls;
                                                                        @endphp

                                                                        @if (is_array($extUrls))
                                                                            @foreach ($extUrls as $extUrl)
                                                                                <li>
                                                                                    <a class="dropdown-item py-2 px-3"
                                                                                        href="{{ $extUrl['url'] ?? '#' }}"
                                                                                        target="_blank"
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
                                                                    class="city-card border {{ $portalItem->is_live ? 'border-warning border-2' : '' }}">
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



            <!-- Bilateral Portals -->
            <div class="row align-items-center mb-3 portal-trigger-row shadow-sm">
                <div class="col-md-2 text-md-right text-center">
                    <h6 class="mb-0 font-weight-bold">Country Portals:</h6>
                </div>
                <div class="col-md-10">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="https://www.indiaczech.com" target="_blank" class="btn btn-sm btn-warning m-1">
                            India Czech Portal
                        </a>
                        {{-- @foreach ($biletrals as $bilateral)
                        <a href="/{{ $bilateral->slug }}" target="_blank" class="btn btn-sm btn-warning m-1">
                            {{ ucwords(str_replace('-', ' ', $bilateral->slug)) }}
                        </a>
                        @endforeach --}}

                    </div>
                </div>
            </div>
            <div class="row align-items-center mb-3 portal-trigger-row shadow-sm">
                <div class="col-md-2 text-md-right text-center">
                    <h6 class="mb-0 font-weight-bold">World Portals:</h6>
                </div>
                <div class="col-md-10">
                    <div class="d-flex flex-wrap gap-2">

                        <div class="btn-group">
                            <a type="button" class="btn btn-sm btn-warning m-1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Hindi Web
                            </a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" target="_blank" href="https://humsabek.in">English
                                        Domain</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" target="_blank"
                                        href="https://xn--v1bm1eh4ce.xn--h2brj9c/">Devanagari
                                        Domain</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>



    <div class="modal fade modal-xl" id="TheseMTw1" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="TheseMTw1Label" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="TheseMTLabel">Modal title</h1> -->
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
                                    <img src="/imgs/reach-gif.gif" class="img-responsive">
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
                                    <img src="/imgs/reorganize-gif.gif" class="img-responsive">
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
                                    <img src="/imgs/reconnect-gif.gif" class="img-responsive">
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
    <div class="modal fade modal-xl" id="TheseMTi1" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="TheseMTi1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="TheseMTLabel">Modal title</h1> -->
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



    <div class="modal fade modal-xl" id="TheseMT" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="TheseMTLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="TheseMTLabel">Modal title</h1> -->
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
