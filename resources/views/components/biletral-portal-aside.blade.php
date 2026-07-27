<div class="px-2 container-fluid">

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

        .metricsdata table tbody td {
            padding: 0 5px !important;
        }

        /* Important Links Scrollbar */
        .important-links-content::-webkit-scrollbar {
            width: 6px;
        }

        /* Modal header */
        #yellowPagesModal_left .modal-dialog .modal-header {
            padding-bottom: 2px !important;
            display: grid;
            grid-template-columns: 90% 10%;
        }

        /* Modal header */
        #core .lsvr-container .lsvr-grid .left-section .container-fluid #sidebar-left .sidebar-left__inner .overflow-hidden div #yellowPagesModal_left .modal-dialog .modal-content .modal-header {
            grid-template-columns: 90% 10% !important;
        }

        #yellowPagesModal_left .modal-dialog h4 {
            text-align: center;
        }
    </style>
    <aside id="sidebar-{{ $side }}" class="mt-3">
        <div class="sidebar-{{ $side }}__inner">
            <!-- Exchange Widget -->
            <div class="bg-white shadow mb-4 p-3 border exchange-widget">

                <h3 class="mb-1 font-bold text-[16px] text-black text-center fw-bold">
                    <i class="me-2 fa fa-exchange"></i>
                    Currency exchange
                </h3>

                <div class="d-flex flex-column gap-1">
                    @foreach ($exchange as $item)
                        @php
                            $parts = explode(' = ', $item);
                            $from = $parts[0] ?? '';
                            $to = $parts[1] ?? '';
                        @endphp
                        <div class="d-flex align-items-center justify-content-between bg-[#F5F4ED] px-3 py-2 rounded-3">
                            <span style="font-size: 13px; font-weight: 500;">{{ $from }}</span>
                            <i class="text-success fa fa-exchange" style="font-size: 12px;"></i>
                            <span style="font-size: 13px; font-weight: 500;">{{ $to }}</span>
                        </div>
                    @endforeach
                    <div class="m-0 text-end">
                        <a href="https://www.xe.com/currencycharts/?from={{ $side == 'left' ? $main->primary_currency : $main->secondary_currency }}&to={{ $side == 'left' ? $main->secondary_currency : $main->primary_currency }}"
                            target="_blank" class="text-blue-900 hover:text-blue-800 text-xs">
                            <img class="inline-block w-4 h-4" src="https://www.xe.com/favicon-32x32.png" alt="">
                            Corporation Inc <i class="fa fa-external-link"></i></a>
                    </div>
                </div>

            </div>

            <!-- Time Widget -->
            <div class="shadow-sm mb-4 border rounded widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                id="{{ $side }}-time-widget">
                <div class="p-3 widget__inner">
                    <h3 class="mb-3 ps-2 text-primary text-center widget__title widget__title--has-icon fw-bold">
                        <i class="me-2 fa fa-clock-o"></i>
                        {{ $data->country_name ?? 'N/A' }} Time
                    </h3>
                    <div class="text-center widget__content">
                        <div id="{{ $side }}-time" class="mb-1 text-success h4 fw-semibold">Loading...</div>
                        <div id="{{ $side }}-date" class="text-muted small"></div>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow mb-4 p-3 border rounded">
                <h6 class="ps-2 text-dark text-center h5">
                    <i class="me-2 fa fa-globe"></i>
                    {{ $data->country_name }} Internet Data
                </h6>
                <div class="d-flex justify-content-end mb-3">
                    <span class="text-dark fw-normal" style="font-size: 0.9rem;">Last Update :
                        {{ \Carbon\Carbon::now()->subMonth()->format('F Y') }}</span>
                </div>
                <div class="internate-data-list">
                    <table class="table table-hover table-sm table-striped mb-0 align-middle"
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
                                <th class="text-muted text-end fw-semibold" style="width: 30%; white-space: nowrap;">
                                    People </th>
                                <th class="text-muted text-end fw-semibold" style="width: 20%;">World Rank</th>
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
                                    <td class="text-dark text-end fw-semibold">
                                        {{ number_format($intData['value']) ?? '-' }}
                                    </td>
                                    {{-- Rank First --}}
                                    <td class="text-muted text-end fw-semibold">
                                        {{ getSuperScript($intData['rank']) ?? '' }}
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cyber Crime Index Widget -->
            <div class="bg-white shadow mb-3 p-2 border rounded">
                <h6 class="mb-2 text-dark text-center" style="font-weight: 700; font-size: 13px;">
                    <i class="me-1 fa fa-shield" style="color: #e74c3c;"></i>
                    Cyber Crime Index
                </h6>

                <div class="d-flex align-items-center justify-content-around bg-[#F5F4ED] px-2 py-1 rounded"
                    style="font-size: 11px;">
                    <div class="text-center">
                        <span class="text-muted">Index:</span>
                        <span class="ms-1 text-dark fw-bold">{{ $cirusData['risk_index'] ?? '-' }}</span>
                    </div>
                    <div class="mx-2 vr" style="height: 15px; opacity: 0.1;"></div>
                    <div class="text-center">
                        <span class="text-muted">Rank:</span>
                        <span
                            class="ms-1 text-danger fw-bold">{{ getSuperScript($cirusData['cyber_risk_rank']) }}</span>
                    </div>
                    <div class="ms-2">
                        <a href="https://www.prarang.in/cirus/world" target="_blank" class="text-primary">
                            <i class="fa fa-external-link" style="font-size: 10px;"></i>
                        </a>
                    </div>
                </div>
            </div>


            <!-- Language Section -->
            <div class="bg-white shadow mb-4 p-3 border rounded">
                <h6 class="mt-2 mb-3 ps-2 text-dark text-center" style="font-weight:700; letter-spacing:0.5px;">
                    <i class="me-2 fa fa-language"></i>
                    {{ $data->country_name }} Language
                </h6>
                <table class="language-data-table table table-bordered mb-0 align-middle"
                    style="background:transparent; font-size:0.78rem;">
                    <tbody>
                        @if ($language && isset($language['languages']))
                            <tr>
                                <td class="text-dark">Language</td>
                                <td>Speakers</td>
                                <td class="text-end">World Rank</td>
                            </tr>
                            @if (isset($language['english']['value']) && $language['english']['value'] > 0)
                                <td>{{ $language['english']['name'] ?? '' }} <span style="cursor:pointer;"
                                        onmouseover="showToolTip('lit-src', '{{ $language['english']['source'] }}')">
                                        <i class="fa fa-info-circle" style="color: #fd7e14;"></i>
                                    </span>
                                </td>
                                <td class="text-end">{{ $language['english']['value'] ?? '-' }}
                                </td>
                                <td class="text-end">{{ getSuperScript($language['english']['rank']) ?? '' }}
                                </td>
                            @endif
                            @foreach ($language['languages'] as $row)
                                <tr>
                                    <td>{{ $row['name'] ?? '' }} <span style="cursor:pointer;"
                                            onmouseover="showToolTip('lit-src', '{{ $row['source'] }}')">
                                            <i class="fa fa-info-circle" style="color: #fd7e14;"></i>
                                        </span></td>
                                    <td class="text-end">{{ $row['value'] ?? '-' }}
                                    </td>
                                    <td class="text-end">{{ getSuperScript($row['rank']) ?? '' }}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" class="text-center">No language data available</td>
                            </tr>
                        @endif
                    </tbody>

                </table>
                <div class="mt-3 text-center" style="font-size:12px;">
                    <span class="fw-bold">
                        {{ $data->country_name }} Literacy Rate



                        <span style="cursor:pointer;"
                            onmouseover="showToolTip('lit-src', 'World FactBook CIA, 2022 – % of Literate Population')">
                            <i class="fa fa-info-circle" style="color: #fd7e14;"></i>
                        </span>: {{ $language['literacy'] ?? 0 }}%
                    </span>
                    <span class="ms-2 fw-bold">

                    </span>
                </div>
                <div class="mt-1 pt-1 border-t text-center" style="font-size:12px;">
                    <a class="font-semibold hover:font-bold text-blue-500 text-md hover:text-blue-800"
                        href="https://g2c.prarang.in/world/communication-planner/q/{{ $data->anlytics_code }}"
                        target="_blank">World
                        Communication
                        Planner</a>
                </div>
            </div>
            <!-- Weather Widget -->

            <div class="widg">
                @if (!empty($data->weather))
                    <div class="weather-widgetx">{!! $data->weather !!}</div>
                @else
                    <p class="mb-0 text-muted small">Weather data not available</p>
                @endif
            </div>
            <div class="bg-light shadow shadow mt-3 p-2 border rounded">
                <h4 class="ps-2 text-dark text-center h5">
                    <i class="me-2 fa fa-analysis-o"></i>
                    {{ $data->country_name }} Local Metrics
                </h4>
                @php
                    $source = (array) $memo['source'] ?? [];
                    $memo = (array) $memo['memo'] ?? [];

                    // World Wars
                    $wars = [
                        'WMEMO10' => 'WW1',
                        'WMEMO11' => 'WW2',
                    ];

                    // Active wars
                    $activeWars = array_keys(
                        array_filter($wars, fn($k) => !empty($memo[$k]) && $memo[$k] == 1, ARRAY_FILTER_USE_KEY),
                    );
                    $activeWarNames = array_map(fn($k) => $wars[$k], $activeWars);
                @endphp

                @if (is_array($metrics))
                    <table class="table table-bordered">

                        <tbody>
                            @foreach ($metrics as $row)
                                <tr>
                                    <td>{{ $row['key'] ?? '' }}</td>
                                    <td>{{ $row['value'] ?? '' }}</td>
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
            <div class="shadow-sm mb-4 border rounded widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background"
                id="{{ $side }}-news-widget">
                <div class="p-3 widget__inner">
                    <h3 class="mb-3 ps-2 text-info text-center widget__title widget__title--has-icon fw-bold">
                        <i class="me-2 fa fa-newspaper-o"></i>
                        {{ $data->country_name ?? 'N/A' }} News
                    </h3>
                    <div class="widget__content">

                        <div class="bg-light p-3 border rounded text-center">
                            @if (!empty($data->news))
                                <a href="{{ str_replace(' ', '"', $data->news) }}" target="_blank"
                                    class="text-primary text-decoration-none fw-semibold">
                                    <i class="me-1 fa fa-external-link"></i>
                                    {{ $data->country_name ?? ' N/A' }} News </a>
                            @else
                                <p class="mb-0 text-muted small">No news available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <style>
                /* Text primary */
                #sidebar-left .widget h5.text-primary {
                    font-size: 16px;
                    text-align: center;
                }
            </style>
            <!-- Embassy Section -->
            <div class="shadow-sm mb-4 border-0 rounded card" id="{{ $side }}-embassy-card">
                <div class="text-center card-body">
                    <h5 class="mb-3 text-primary card-title fw-bold">
                        <i class="me-2 fa fa-building-o"></i>
                        Embassy of {{ $data->country_name ?? 'N/A' }}
                    </h5>

                    @if (!empty($data->embassy_link))
                        <a href="{{ $data->embassy_link }}" class="w-100 btn btn-primary fw-semibold" target="_blank">
                            <i class="me-1 fa fa-external-link"></i> Visit Embassy Website
                        </a>
                    @else
                        <button disabled class="w-100 btn btn-primary fw-semibold">
                            <i class="me-1 fa fa-external-link"></i> Visit Embassy Website
                        </button>
                        <span class="m-0 p-0 text-[10px] text-danger">Embassy link not available</span>
                    @endif

                </div>
            </div>

            <!-- Analytics Widget -->
            {{-- place here --}}


            <!-- Important Links Widget -->
            <div class="shadow-sm border rounded widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background"
                id="{{ $side }}-links-widget">
                <div class="p-3 widget__inner">
                    <h3 class="mb-3 ps-2 text-danger text-center widget__title widget__title--has-icon fw-bold">
                        <i class="me-2 fa fa-link"></i>
                        Important Links of {{ $data->country_name ?? 'N/A' }}
                    </h3>

                    <div class="widget__content">
                        @if (!empty($data->important_links) && is_array($data->important_links))

                            @foreach ($data->important_links as $key => $links)
                                <div class="">
                                    <h6 class="text-primary text-capitalize fw-bold">
                                        {{ str_replace('_', ' ', $key) }}
                                    </h6>
                                    <ul class="list-unstyled">
                                        @foreach ($links as $link)
                                            <li class="">
                                                <a href="{{ $link['url'] }}" target="_blank"
                                                    class="d-flex align-items-center hover-shadow rounded text-muted text-decoration-none">
                                                    <i class="me-2 text-secondary fa fa-external-link"></i>
                                                    <span>{{ $link['name'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="mb-0 text-muted small">No important links available</p>
                        @endif
                    </div>
                </div>
            </div>


            <div class="bg-light shadow shadow mt-3 p-2 border rounded">
                <div class="mt-3">
                    <a href="https://prarang.in/yp/" target="_blank"
                        class="group block relative rounded-lg overflow-hidden">

                        <!-- IMAGE -->
                        <img src="https://meerutrang.in/images/yellow-pages-row.png" alt="Login"
                            class="w-full object-cover group-hover:scale-[1.02] transition-transform duration-300" />

                        <!-- OVERLAY -->
                        <div class="absolute inset-0"></div>

                        <!-- TEXT ON IMAGE -->
                        <div class="z-10 absolute inset-0 flex flex-col justify-center items-center text-center">
                            <h2 class="drop-shadow-md font-bold text-[36px] text-black">
                                @if ($side == 'left')
                                    Indian Companies In Czech Republic
                                @else
                                    Czech Republic Companies In India
                                @endif
                            </h2>
                            <h4 class="drop-shadow mt-1 font-semibold text-black text-sm">
                                हिंदी येलो पेज (Yellow Pages)
                            </h4>
                        </div>
                    @endif


                </div>
            </div>

            <!-- Toast Element -->
            <div id="comingSoonToast" class="custom-toast">
                <i class="me-2 fa fa-info-circle"></i> Coming Soon.
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

        {{-- JS --}}

        function toggleImportantLinks(btn, id) {
            const container = document.getElementById(id);
            if (!container) return;

            const collapsedHeight = 100;
            if (container.classList.contains('expanded')) {
                container.classList.remove('expanded');
                container.style.maxHeight = collapsedHeight + 'px';
                btn.setAttribute('aria-expanded', 'false');
                btn.innerHTML = '<i class="me-1 fa fa-angle-double-down"></i>';
            } else {
                container.classList.add('expanded');
                container.style.maxHeight = container.scrollHeight + 'px';
                btn.setAttribute('aria-expanded', 'true');
                btn.innerHTML = '<i class="me-1 fa fa-angle-double-up"></i>';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const linksContainer = document.getElementById('{{ $side }}-links-widget');
            const toggleBtn = document.getElementById('{{ $side }}-links-toggle-btn');
            if (!linksContainer || !toggleBtn) return;

            linksContainer.style.maxHeight = '100px';
            linksContainer.style.overflow = 'hidden';

            // ✅ Button tabhi dikhe jab content bada ho
            if (linksContainer.scrollHeight <= 100) {
                toggleBtn.style.display = 'none';
            }

            window.addEventListener('resize', function() {
                if (linksContainer.classList.contains('expanded')) {
                    linksContainer.style.maxHeight = linksContainer.scrollHeight + 'px';
                }
            });
        });
    </script>
</div>

                        <!-- Yellow Pages Modal -->
                        <div class="modal fade" id="yellowPagesModal_{{ $side }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered rounded-xl">
                                <div class="modal-content border-0 shadow rounded-xl">
                                    <div class="modal-header border-0 pb-0">
                                        <h4 class="fw-bold">Yellow Pages</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-justify px-4 p-2  pb-4 border-t mt-1">
                                        {{-- <div class="mb-4 text-warning">
                                        <i class="fa fa-book fa-3x"></i>
                                    </div> --}}
                                        {{-- <h4 class="fw-bold mb-3">Yellow Pages</h4> --}}
                                        <p class="text-muted mb-4">
                                            Free listing of products and services of {{ $ypData[0] ?? '' }}.
                                            <br>
                                            Thank you for
                                            your interest. However, the registration has not yet been activated. We
                                            await a
                                            business facilitation partner.
                                        </p>
                                        <div class="flex justify-between items-center gap-3">
                                            <a href="https://www.prarang.in/partners" target="_blank"
                                                class="btn btn-warning fw-bold px-4 rounded-pill shadow-sm text-xs">
                                                Prarang Country Partnerships
                                            </a>
                                             @if ($side == 'left')
                        <a href="https://www.prarang.in/yp/india" target="_blank"
                            class="btn btn-warning fw-bold px-4 rounded-pill shadow-sm text-xs">
                            Example - Czech Republic companies in India
                        </a>
                    @else
                        <a href="https://www.prarang.in/yp/czech-republic" target="_blank"
                            class="btn btn-warning fw-bold px-4 rounded-pill shadow-sm text-xs">
                            Example - Indian companies in Czech Republic
                        </a>
                    @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


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

        {{-- JS --}}

        function toggleImportantLinks(btn, id) {
            const container = document.getElementById(id);
            if (!container) return;

            const collapsedHeight = 100;
            if (container.classList.contains('expanded')) {
                container.classList.remove('expanded');
                container.style.maxHeight = collapsedHeight + 'px';
                btn.setAttribute('aria-expanded', 'false');
                btn.innerHTML = '<i class="fa fa-angle-double-down me-1"></i>';
            } else {
                container.classList.add('expanded');
                container.style.maxHeight = container.scrollHeight + 'px';
                btn.setAttribute('aria-expanded', 'true');
                btn.innerHTML = '<i class="fa fa-angle-double-up me-1"></i>';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const linksContainer = document.getElementById('{{ $side }}-links-widget');
            const toggleBtn = document.getElementById('{{ $side }}-links-toggle-btn');
            if (!linksContainer || !toggleBtn) return;

            linksContainer.style.maxHeight = '100px';
            linksContainer.style.overflow = 'hidden';

            // ✅ Button tabhi dikhe jab content bada ho
            if (linksContainer.scrollHeight <= 100) {
                toggleBtn.style.display = 'none';
            }

            window.addEventListener('resize', function() {
                if (linksContainer.classList.contains('expanded')) {
                    linksContainer.style.maxHeight = linksContainer.scrollHeight + 'px';
                }
            });
        });
    </script>
</div>
