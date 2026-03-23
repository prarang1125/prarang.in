@php
// Icon color map for info icons
$iconColors = [
'en-in' => '#007bff', // blue
'hi-in' => '#28a745', // green
'bn-in' => '#ffc107', // yellow
'en-cz' => '#007bff', // blue
'cz-cz' => '#e83e8c', // pink
'sk-cz' => '#17a2b8', // cyan
'lit-src' => '#fd7e14', // orange
];
@endphp
<div class="container-fluid px-2">
    <style>
        /* Division */
        #sidebar-left div .weather-widgetx>div {
            padding-left: 0px !important;
            padding-right: 0px !important;
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        /* Widget Title */
        #left-time-widget h3 {
            color: #ffffff !important;
            margin-bottom: 0px !important;
            transform: translatex(0px) translatey(0px);
            padding-top: 17px;
            padding-bottom: 8px;
        }

        /* Widget Title */
        #right-time-widget h3 {
            color: #ffffff !important;
            margin-bottom: 1px !important;
            transform: translatex(0px) translatey(0px);
            padding-top: 15px;
            padding-bottom: 10px;
        }

        /* Left date */
        #left-date {
            color: rgba(255, 255, 255, 0.75) !important;
        }

        /* Right date */
        #right-date {
            color: rgba(255, 255, 255, 0.75) !important;
        }

        /* Paragraph */
        .hentry .main__header p {
            margin-bottom: 13px;
            padding-bottom: 3px;
        }

        /* Right time */
        #right-time {
            color: #afcfbe !important;
        }

        /* Left time */
        #left-time {
            color: #b4d9c9 !important;
        }

        /* Heading */
        .hentry .main__header h1 {
            padding-top: 16px;
            margin-bottom: 7px !important;
        }

        /* Column 6/12 */
        #wrapper #core .core__inner #columns .columns__inner .lsvr-container .lsvr-grid .columns__main {
            margin-top: 15px !important;
        }

        /* Header */
        #main .hentry header {
            background-color: rgba(0, 0, 0, 0.62);
        }

        /* Widget  inner */
        #left-time-widget .widget__inner {
            background-color: rgba(51, 51, 51, 0.68);
        }

        /* Widget  inner */
        #right-time-widget .widget__inner {
            background-color: rgba(51, 51, 51, 0.69);
        }

        /* Link */
        #left-links-widget li a {
            flex-direction: row;
            justify-content: normal;
        }

        /* Font Icon */
        #left-links-widget li .fa-external-link {
            margin-right: 7px !important;
            position: relative;
            top: 2px;
        }

        /* Font Icon */
        #right-links-widget li .fa-external-link {
            position: relative;
            top: 2px;
        }

        /* Heading */
        #right-links-widget div h6 {
            margin-bottom: 3px;
        }

        /* Link */
        #right-links-widget li a {
            padding-left: 6px;
            color: rgba(49, 137, 225, 0.75) !important;

        }

        #right-links-widget li a:hover {
            padding-left: 8px;
            color: rgba(49, 137, 225, 0.75) !important;
            font-weight: 600;
        }

        /* Widget  content */
        #right-links-widget .widget__content {
            /* transform: translatex(0px) translatey(0px); */
        }

        /* Widget Title */
        #right-links-widget h3 {
            margin-bottom: 0px !important;
        }

        /* Widget Title */
        #left-links-widget h3 {
            margin-bottom: 0px !important;
        }

        /* Link (hover) */
        #left-links-widget li a:hover {
            color: rgba(22, 13, 185, 0.75) !important;
            font-weight: 600;
            padding-left: 8px;
        }

        #left-links-widget li a {
            color: rgba(22, 13, 185, 0.75) !important;
            padding-left: 6px;
        }

        /* Toast Styling */
        .custom-toast {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.5);
            background: rgba(0, 0, 0, 0.85);
            color: white;
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 600;
            z-index: 9999;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            opacity: 0;
            pointer-events: none;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .custom-toast.show {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }

        /* User Requested Styling for Internate Data */
        .lsvr-grid .columns__sidebar .container-fluid #sidebar-left .sidebar-left__inner .bg-white .internate-data-list .d-flex .d-flex .d-flex .fw-bold {
            font-size: 14px !important;
        }

        #sidebar-left .d-flex .d-flex .fw-bold {
            font-weight: 600 !important;
        }

        #sidebar-left .text-end .fw-bold {
            font-size: 14px;
        }

        #sidebar-right .d-flex .d-flex .fw-bold {
            font-size: 14px !important;
            font-weight: 600 !important;
        }




        #sidebar-right .text-end .fw-bold {
            font-size: 14px;
        }

        /* Text center */
        #sidebar-left h6.text-center {
            font-size: 16px;
            font-weight: 700;
        }

        /* Text center */
        #sidebar-right h6.text-center {
            font-size: 16px;
            font-weight: 700;
        }

        /* Normal */
        #sidebar-left .d-flex .fw-normal {
            font-size: 12px;
        }

        /* Normal */
        #core .core__inner #columns .columns__inner .lsvr-container .lsvr-grid .columns__sidebar .container-fluid #sidebar-left .sidebar-left__inner .bg-white .d-flex .fw-normal {
            font-size: 12px !important;
        }

        /* Normal */
        #sidebar-right .d-flex .fw-normal {
            font-size: 12px !important;
        }

        /* Flex */
        #sidebar-right .d-flex {
            margin-bottom: 2px !important;
        }

        /* Flex */
        #sidebar-left .d-flex {
            margin-bottom: 4px !important;
        }

        /* Table Data */
        #sidebar-left .table-striped td {
            padding-top: 2px;
            padding-bottom: 3px;
        }

        /* Table Data */
        #sidebar-right .table-striped td {
            padding-top: 3px;
            padding-bottom: 2px;
        }

        /* Universal Tooltip Styles */
        .universal-tooltip {
            position: fixed;
            background-color: rgba(0, 0, 0, 0.9);
            color: #ffffff;
            padding: 12px 10px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            white-space: normal;
            max-width: 250px;
            word-wrap: break-word;
            pointer-events: auto;
            z-index: 10000;
            transform: translateX(-50%) translateY(-10px);
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(4px);
            text-align: center;
            line-height: 1.4;
        }

        .universal-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid rgba(0, 0, 0, 0.9);
        }

        .universal-tooltip.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    </style>
    <style>
        /* Text dark */
        #sidebar-left td .text-dark {
            font-size: 11px;
        }

        /* Text dark */
        #sidebar-right td .text-dark {
            font-size: 11px;
        }

        /* Text end */
        #sidebar-right tr .text-end {
            font-size: 12px;
        }

        /* Text end */
        #sidebar-left tr .text-end {
            font-size: 12px;
        }

        /* Semibold */
        #sidebar-right .bg-white .internate-data-list .table-striped .table-light tr .fw-semibold {
            color: rgba(2, 2, 2, 0.75) !important;
            font-weight: 700 !important;
            font-size: 12px;
        }

        /* Semibold */
        #sidebar-left .bg-white .internate-data-list .table-striped .table-light tr .fw-semibold {
            font-size: 12px;
        }

        /* Table Data */
        #core .core__inner #columns .columns__inner .lsvr-container .lsvr-grid .columns__sidebar .container-fluid #sidebar-right .sidebar-right__inner .bg-white .internate-data-list .table-striped tbody tr:nth-child(1) td:nth-child(1) {
            width: 128px !important;
        }

        /* Table Data */
        .sidebar-right__inner .table-striped tr:nth-child(1) td:nth-child(1) {
            min-width: 149px;
        }

        /* Table Data */
        .sidebar-left__inner .table-striped tr:nth-child(1) td:nth-child(1) {
            min-width: 152px;
        }

        /* Text dark */
        #sidebar-left td .text-dark {
            font-size: 12px !important;
        }

        /* Text dark */
        #sidebar-right td .text-dark {
            font-size: 12px !important;
        }

        /* Table Data */
        #sidebar-right .table-striped td {
            position: relative;
            left: -9px;
        }

        .language-data-table tbody td {
            padding: 0 5px !important;
        }

        .important-links-content {
            max-height: 241px;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .metricsdata table tbody td{
                padding: 0 5px !important;
        }

         /* Important Links Scrollbar */
         .important-links-content::-webkit-scrollbar {
            width: 6px;
        }
    </style>
    <aside id="sidebar-{{ $side }}" class="mt-3">
        <div class="sidebar-{{ $side }}__inner">

            <!-- Time Widget -->
            <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background shadow-sm mb-4 border rounded"
                id="{{ $side }}-time-widget">
                <div class="widget__inner p-3">
                    <h3 class="widget__title widget__title--has-icon ps-2 mb-3 text-center text-primary fw-bold">
                        <i class="fa fa-clock-o me-2"></i>
                        {{ $data->country_name ?? 'N/A' }} Time
                    </h3>
                    <div class="widget__content text-center">
                        <div id="{{ $side }}-time" class="h4 text-success fw-semibold mb-1">Loading...</div>
                        <div id="{{ $side }}-date" class="text-muted small"></div>
                    </div>
                </div>
            </div>
            <div class="p-3 shadow bg-white rounded border mb-4">
                <h6 class=" ps-2 text-center  text-dark h5">
                    <i class="fa fa-globe me-2"></i>
                    {{ $data->country_name }} Internet Data
                </h6>
                <div class="d-flex justify-content-end mb-3">
                    <span class="text-dark fw-normal" style="font-size: 0.9rem;">Last Update :
                        {{ \Carbon\Carbon::now()->subMonth()->format('F Y') }}</span>
                </div>
                <div class="internate-data-list">
                    <table class="table table-sm table-hover table-striped align-middle mb-0"
                        style="font-size: 0.82rem;">
                        <style>
                            /* Table Data */
                            table .table-striped td {
                                padding-top: 2px;
                                padding-bottom: 2px;
                            }
                        </style>
                        <thead class="table-light">
                            <tr>
                                <th class="text-muted fw-semibold" style="width: 50%;"></th>
                                <th class="text-muted fw-semibold text-end" style="width: 30%; white-space: nowrap;">People </th>
                                <th class="text-muted fw-semibold text-end" style="width: 20%;">World Rank</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($internateData as $key => $intData)
                            @php
                            $name = $intData['name'];

                            $replacements = [
                            'जनसंख्या' => 'Population',
                            'इंटरनेट उपयोगकर्ता' => 'Internet Users',
                            'फेसबुक उपयोगकर्ता' => 'Facebook Users',
                            'लिंक्डइन उपयोगकर्ता' => 'LinkedIn Users',
                            'ट्विटर उपयोगकर्ता' => 'X (Twitter) Users',
                            'इन्स्टाग्राम उपयोगकर्ता' => 'Instagram Users',
                            'उपयोगकर्ता' => 'Users',
                            ];

                            $name = str_replace(array_keys($replacements), array_values($replacements), $name);

                            $icon = 'fa-globe';
                            $color = '#3498db';

                            if (Str::contains($name, ['Population'])) {
                            $icon = 'fa-users';
                            $color = '#8e44ad';
                            } elseif (Str::contains($name, ['Internet'])) {
                            $icon = 'fa-globe';
                            $color = '#3498db';
                            } elseif (Str::contains($name, ['Facebook'])) {
                            $icon = 'fa-facebook-square';
                            $color = '#3b5998';
                            } elseif (Str::contains($name, ['LinkedIn'])) {
                            $icon = 'fa-linkedin-square';
                            $color = '#0077b5';
                            } elseif (Str::contains($name, ['Twitter', 'X'])) {
                            $icon = 'fa-twitter';
                            $color = '#000000';
                            } elseif (Str::contains($name, ['Instagram'])) {
                            $icon = 'fa-instagram';
                            $color = '#e1306c';
                            }
                            @endphp

                            <tr>
                                <td>
                                    <span class="me-2"
                                        style="display:inline-block; width:18px; text-align:center;">
                                        <i class="fa {{ $icon }}" style="color: {{ $color }};"></i>
                                    </span>
                                    <span class="text-dark">{{ $name }}</span>
                                    <span>
                                        <i onmouseover="showToolTip('{{ $key }}','{{ $intData['source'] }}')"
                                            class="fa fa-info-circle" style="color: {{ $color }};"></i>
                                    </span>
                                </td>



                                {{-- Value After --}}
                                <td class="text-end fw-semibold text-dark">
                                    {{ number_format($intData['value']) ?? '-' }}
                                </td>
                                {{-- Rank First --}}
                                <td class="text-end text-muted fw-semibold">
                                    {{ getSuperScript($intData['rank']) ?? '' }}
                                </td>
                            </tr>
                            @endforeach

                            <tr>
                                <td>
                                    <span class="me-2" style="display:inline-block; width:18px; text-align:center;">
                                        <i class="fa fa-shield" style="color: red;"></i>
                                    </span>
                                    <span class="text-dark">Cyber Crime Index</span>
                                    <span>

                                    </span>
                                </td>




                                {{-- Rank First --}}
                                <td class="text-end text-muted fw-semibold">
                                    {{ $cirusData['risk_index'] ?? '' }}
                                </td>
                                {{-- Value After --}}
                                <td class="text-end fw-semibold text-dark">
                                    {{ getSuperScript($cirusData['cyber_risk_rank']) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="https://www.prarang.in/cirus/world" target="_blank">
                        <p class="text-end text-muted small mb-0" style=" font-size: 12px;">See More</p>
                    </a>
                </div>

                <h6 class="ps-2 text-center text-dark mt-3 mb-3" style="font-weight:700; letter-spacing:0.5px;">
                    <i class="fa fa-language me-2"></i>
                    {{ $data->country_name }} Language
                </h6>
                <table class="table table-bordered align-middle mb-0 language-data-table"
                    style="background:transparent; font-size:0.78rem;">
                    <tbody>
                        <tr>
                            <td class="text-start fw-bold">Language</td>
                            <td class="text-start fw-bold">Speakers</td>
                            <td class="text-start fw-bold">Rank</td>
                        </tr>
                        @if (strtolower($data->country_name) == 'india')
                        <tr>
                            <td class="text-start">
                                English
                                <span style="cursor:pointer;"
                                    onmouseover="showToolTip('en-in', 'India Census 2011 – Aggregated English Population (Mother Tongue + Multilingual Population)')">
                                    <i class="fa fa-info-circle" style="color: {{ $iconColors['en-in'] }};"></i>
                                </span>
                            </td>
                            <td class="text-start" style="text-align: end !important;">12,84,86,592</td>
                            <td class="text-start" style="text-align: end !important;">{{ getSuperScript(4) }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">
                                Hindi
                                <span style="cursor:pointer;"
                                    onmouseover="showToolTip('hi-in', 'India Census 2011 – Aggregated Hindi Population (Mother Tongue + Multilingual Population)')">
                                    <i class="fa fa-info-circle" style="color: {{ $iconColors['hi-in'] }};"></i>
                                </span>
                            </td>
                            <td class="text-start" style="text-align: end !important;">69,45,94,173</td>
                            <td class="text-start" style="text-align: end !important;">{{ getSuperScript(1) }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">
                                Bengali
                                <span style="cursor:pointer;"
                                    onmouseover="showToolTip('bn-in', 'India Census 2011 – Aggregated Bengali Population (Mother Tongue + Multilingual Population)')">
                                    <i class="fa fa-info-circle" style="color: {{ $iconColors['bn-in'] }};"></i>
                                </span>
                            </td>
                            <td class="text-start" style="text-align: end !important;">10,74,08,642</td>
                            <td class="text-start" style="text-align: end !important;">{{ getSuperScript(2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-center p-2">

                                <a href="https://g2c.prarang.in/india/multilingualism" target="_blank">
                                    <p class="text-end text-muted small mb-0">See More</p>
                                </a>

                            </td>
                        </tr>
                        @elseif (strtolower($data->country_name) == 'nepal')
                        <tr>
                            <td class="text-start">
                                English
                                <span style="cursor:pointer;"
                                    onmouseover="showToolTip('en-cz', 'Nepal Stastical Year Book 2023 – English Mother Tongue population\n*Nepal Multilingualism data unavailable')">
                                    <i class="fa fa-info-circle" style="color: {{ $iconColors['en-cz'] }};"></i>
                                </span>
                            </td>
                            <td class="text-start" style="text-align: end !important;">1,323</td>
                            <td class="text-start" style="text-align: end !important;">{{ getSuperScript(55) }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">
                                Nepali
                                <span style="cursor:pointer;"
                                    onmouseover="showToolTip('cz-cz', 'Nepal Stastical Year Book 2023 – Nepali Mother Tongue population\n*Nepal Multilingualism data unavailable')">
                                    <i class="fa fa-info-circle" style="color: {{ $iconColors['cz-cz'] }};"></i>
                                </span>
                            </td>
                            <td class="text-start" style="text-align: end !important;">1,30,84,457</td>
                            <td class="text-start" style="text-align: end !important;">{{ getSuperScript(1) }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">
                                Urdu
                                <span style="cursor:pointer;"
                                    onmouseover="showToolTip('sk-cz', 'Nepal Stastical Year Book 2023 – Urdu Mother Tongue population\n*Nepal Multilingualism data unavailable')">
                                    <i class="fa fa-info-circle" style="color: {{ $iconColors['sk-cz'] }};"></i>
                                </span>
                            </td>
                            <td class="text-start" style="text-align: end !important;">4,13,785</td>
                            <td class="text-start" style="text-align: end !important;">{{ getSuperScript(4) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-center p-2">

                                <a href="https://g2c.prarang.in/nepal-langs" target="_blank">
                                    <p class="text-end text-muted small mb-0">See More</p>
                                </a>

                            </td>
                        </tr>
                        @endif

                    </tbody>
                </table>
                <div class="mt-3 text-center" style="font-size:12px;">
                    <span class="fw-bold">
                        @if (strtolower($data->country_name) == 'india')
                        India Literacy Rate:
                        @elseif (strtolower($data->country_name) == 'nepal')
                        Nepal Literacy Rate:
                        @else
                        N/A
                        @endif


                        @php
                        $litSource = '';
                        if (strtolower($data->country_name) == 'india') {
                        $countname=strtolower($data->country_name);
                        $litSource = 'World FactBook CIA, 2022 – % of Literate Population';
                        } elseif (strtolower($data->country_name) == 'nepal') {
                        $litSource = 'World FactBook CIA, 2022 – % of Literate Population';
                        } else {
                        $litSource = 'Source not available';
                        }
                        @endphp
                        <span style="cursor:pointer;" onmouseover="showToolTip('lit-src', '{{ $litSource }}')">
                            <i class="fa fa-info-circle" style="color: {{ $iconColors['lit-src'] }};"></i>
                        </span>
                    </span>
                    <span class="fw-bold ms-2">
                        @if (strtolower($data->country_name) == 'india')
                        74.40%
                        @elseif (strtolower($data->country_name) == 'nepal')
                        67.90%
                        @else
                        N/A
                        @endif
                    </span>
                </div>
            </div>
            <!-- Weather Widget -->

            <div class="widg">
                @if (!empty($data->weather))
                <div class="weather-widgetx">{!! $data->weather !!}</div>
                @else
                <p class="text-muted small mb-0">Weather data not available</p>
                @endif
            </div>
            <div class="border shadow p-2 mt-3 shadow bg-light rounded metricsdata">
                <h4 class=" ps-2 text-center  text-dark h5">
                    <i class="fa fa-analysis-o me-2"></i>
                    {{ $data->country_name }} Metrics
                </h4>
                @php
                $decoded = json_decode($data->local_metrics, true);
                // If still a string, decode again
                $metrics = is_string($decoded) ? json_decode($decoded, true) : $decoded;
                @endphp

                @if (is_array($metrics))
                <table class="table table-bordered ">

                    <tbody>
                        @foreach ($metrics as $row)
                        <tr>
                            <td>{{ $row['key'] ?? '' }}</td>
                            <td>{{ $row['value'] ?? '' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="text-danger">Invalid JSON format in <code>local_metrics</code>.</p>
                <pre>{{ $data->local_metrics }}</pre>
                @endif
            </div>



            <!-- News Widget -->
            <div class="widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background shadow-sm mb-4 border rounded"
                id="{{ $side }}-news-widget">

                <h3 class="widget__title widget__title--has-icon ps-2 mb-3 text-center text-dark fw-bold">
                    <i class="fa fa-newspaper-o me-2"></i>
                    {{ $data->country_name ?? 'N/A' }} News
                </h3>


                <x-portal.news :url="$data->news" :side="$side" class="p-2" />



            </div>
            <style>
                /* Text primary */
                #sidebar-left .widget h5.text-primary {
                    font-size: 16px;
                    text-align: center;
                }
            </style>
            <!-- Embassy Section -->
            <div class="card shadow-sm mb-4 border-0 rounded" id="{{ $side }}-embassy-card">
                <div class="card-body text-center">
                    <h5 class="card-title mb-3 fw-bold text-dark ">
                        <i class="fa fa-building-o me-2"></i>
                        Embassy of {{ $data->country_name ?? 'N/A' }}
                    </h5>

                    @if (!empty($data->embassy_link))
                    <a href="{{ $data->embassy_link }}" class="btn btn-primary w-100 fw-semibold"
                        target="_blank">
                        <i class="fa fa-external-link me-1"></i> Visit Embassy Website
                    </a>
                    @else
                    <span class="text-danger small">Embassy link not available.</span>
                    @endif
                </div>
            </div>
            <!-- Analytics Widget -->
            {{-- place here --}}


            <!-- Important Links Section -->
            <div
                class="widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background  bg-white p-2 shadow-sm border rounded">

                <h5 class="card-title mb-3 fw-bold text-dark text-center">
                    <i class="fa fa-link me-2"></i>Important Links
                </h5>
                <div class="widget__content important-links-content collapsed" id="{{ $side }}-links-widget">
                    @if (!empty($data->important_links) && is_array($data->important_links))

                    @foreach ($data->important_links as $key => $links)
                    <div class="">
                        <h6 class="fw-bold text-dark text-capitalize">
                            {{ str_replace('_', ' ', $key) }}
                        </h6>

                        <ul class="list-unstyled">
                            @foreach ($links as $link)
                            <li>
                                <a href="{{ $link['url'] }}" target="_blank"
                                    class="text-muted text-decoration-none d-flex align-items-center rounded hover-shadow">
                                    <i class="fa fa-external-link me-2 text-secondary"></i>
                                    <span>{{ $link['name'] }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                    @else
                    <p class="text-muted small mb-0">No important links available</p>
                    @endif
                </div>

                <!-- Toggle Button -->
                <div class="text-center mt-2">
                    <button type="button" class="btn-link  h3 toggle-links-btn"
                        onclick="toggleImportantLinks(this, '{{ $side }}-links-widget')">
                        <i class="fa fa-angle-double-down me-1"></i>
                    </button>
                </div>
            </div>
            <div class="border shadow-lg p-0 mt-4 bg-white rounded-lg overflow-hidden">
                <div class="">

                        {{-- href="{{ $side == 'left' ? 'https://www.prarang.in/yp/india' : 'https://www.prarang.in/yp/czech-republic' }}" --}}
                        <a
                        href="javascript:void(0);"  onclick="showComingSoonToast()"
                        class="relative block overflow-hidden group">

                        <!-- IMAGE -->
                        <img src="https://meerutrang.in/images/yellow-pages-row.png" alt="Yellow Pages"
                            class="w-full object-cover transition-transform duration-500 group-hover:scale-110"
                            style="height: 180px;" />

                        <!-- TEXT ON IMAGE -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center z-10 p-3">
                            <h2 class="text-[24px] lg:text-[28px] font-bold text-dark mb-1"
                                style="font-family: 'DM Sans', sans-serif; line-height: 1.2;">
                                @if ($side == 'left')
                                Nepal Companies In India
                                @else
                                Indian Companies In Nepal
                                @endif
                            </h2>
                            <h4 class="text-xs uppercase tracking-widest font-bold text-muted">
                                Yellow Pages
                            </h4>

                            {{-- <div
                                class="mt-3 px-3 py-1 bg-dark/10 backdrop-blur-sm rounded-full text-[10px] text-dark font-bold border border-dark/20 uppercase tracking-tighter">
                                Coming Soon
                            </div> --}}
                        </div>

                    </a>
                </div>
            </div>

            <!-- Toast Element -->
            <div id="comingSoonToast" class="custom-toast">
                <i class="fa fa-info-circle me-2"></i> Coming Soon.
            </div>
        </div>
    </aside>

    <!-- JS for Time Display -->
    <script>
        // Universal Tooltip Function
        function showToolTip(key, text) {
            // Remove any existing tooltip with the same key
            const existingTooltip = document.getElementById(`tooltip-${key}`);
            if (existingTooltip) {
                existingTooltip.remove();
            }

            // Create tooltip container
            const tooltip = document.createElement('div');
            tooltip.id = `tooltip-${key}`;
            tooltip.className = 'universal-tooltip';
            // Replace \n with <br> for multiline support
            tooltip.innerHTML = text.replace(/\n/g, '<br>');
            document.body.appendChild(tooltip);

            // Get the element that triggered the tooltip
            const triggerElement = event.target;
            const rect = triggerElement.getBoundingClientRect();

            // Position the tooltip above the element
            const tooltipHeight = tooltip.offsetHeight;
            const topPosition = rect.top - tooltipHeight - 10; // 10px gap
            const leftPosition = rect.left + rect.width / 2;

            tooltip.style.top = topPosition + 'px';
            tooltip.style.left = leftPosition + 'px';

            // Add show class for animation
            setTimeout(() => {
                tooltip.classList.add('show');
            }, 10);

            // Hide tooltip on mouseout
            triggerElement.addEventListener('mouseout', function hideTooltip() {
                tooltip.classList.remove('show');
                setTimeout(() => {
                    if (tooltip.parentNode) {
                        tooltip.remove();
                    }
                }, 300);
                triggerElement.removeEventListener('mouseout', hideTooltip);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            function updateTime() {
                const timezone = '{{ $data->timezone ??
                '
                UTC ' }}';
                const side = '{{ $side ??
                '
                right ' }}';

                try {
                    const now = new Date();
                    const options = {
                        timeZone: timezone,
                        hour12: true,
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    };

                    const dateOptions = {
                        timeZone: timezone,
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };

                    const timeString = now.toLocaleTimeString('en-US', options);
                    const dateString = now.toLocaleDateString('en-US', dateOptions);

                    const timeElement = document.getElementById(side + '-time');
                    const dateElement = document.getElementById(side + '-date');

                    if (timeElement && dateElement) {
                        timeElement.textContent = timeString;
                        timeElement.classList.add('updated');
                        dateElement.textContent = dateString;
                        setTimeout(() => timeElement.classList.remove('updated'), 600);
                    }
                } catch (error) {
                    console.error('Error updating time for ' + side + ':', error);
                    const timeElement = document.getElementById(side + '-time');
                    if (timeElement) timeElement.textContent = 'Time unavailable';
                }
            }

            updateTime();
            setInterval(updateTime, 1000);
        });

        function showComingSoonToast() {
            const toast = document.getElementById('comingSoonToast');
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        function toggleImportantLinks(btn, id) {
            const container = document.getElementById(id);
            if (!container) return;

            const collapsedHeight = 241;
            if (container.classList.contains('expanded')) {
                container.classList.remove('expanded');
                container.style.maxHeight = collapsedHeight + 'px';
                btn.setAttribute('aria-expanded', 'false');
                btn.innerHTML = ' <i class="fa fa-angle-double-down me-1"></i>';
            } else {
                container.classList.add('expanded');
                container.style.maxHeight = container.scrollHeight + 'px';
                btn.setAttribute('aria-expanded', 'true');
                btn.innerHTML = ' <i class="fa fa-angle-double-up me-1"></i>';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const linksContainer = document.getElementById('{{ $side }}-links-widget');
            if (!linksContainer) return;

            linksContainer.style.maxHeight = '241px';

            window.addEventListener('resize', function() {
                if (linksContainer.classList.contains('expanded')) {
                    linksContainer.style.maxHeight = linksContainer.scrollHeight + 'px';
                }
            });
        });
    </script>
</div>
