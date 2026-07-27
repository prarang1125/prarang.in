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
            <div class="bg-light shadow shadow mt-3 p-2 border rounded metricsdata">
                <h4 class="ps-2 text-dark text-center fw-bold">
                    <i class="me-2 fa fa-info-circle"></i>
                    {{ $data->country_name }} Info
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

                <div class="">
                    <div class="p-1 rounded-2xl overflow-hidden">
                        <table
                            class="[&_tr:nth-child(even)]:bg-gray-300/30 border border-gray-600 w-full text-sm border-collapse">

                            <tbody class="divide-y divide-gray-100">

                                {{-- Location --}}
                                <tr class="bg-gray-50">
                                    <td colspan="2"
                                        class="px-5 py-2 font-semibold text-gray-400 text-xs uppercase tracking-wider">
                                        📍 Location
                                    </td>
                                </tr>
                                @foreach ([['label' => 'Country Capital', 'key' => 'WMEMO14'], ['label' => 'Area (sq km)', 'key' => 'WMEMO22']] as $row)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-5 py-3 text-gray-600">{{ $row['label'] }}</td>
                                        <td class="px-5 py-3 font-medium text-gray-800">
                                            {{ $memo[$row['key']] ?? '—' }}
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- Terrain --}}
                                <tr class="bg-gray-50">
                                    <td colspan="2"
                                        class="px-5 py-2 font-semibold text-gray-400 text-xs uppercase tracking-wider">
                                        ⛰️ Terrain
                                    </td>
                                </tr>
                                @foreach ([['label' => 'Highest Point', 'key' => 'WMEMO15'], ['label' => 'Maximum Elevation', 'key' => 'WMEMO16'], ['label' => 'Lowest Point', 'key' => 'WMEMO17'], ['label' => 'Minimum Elevation', 'key' => 'WMEMO18']] as $row)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-5 py-3 text-gray-600">{{ $row['label'] }}</td>
                                        <td class="px-5 py-3 font-medium text-gray-800">
                                            {{ $memo[$row['key']] ?? '—' }}
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- Demographics --}}
                                <tr class="bg-gray-50">
                                    <td colspan="2"
                                        class="px-5 py-2 font-semibold text-gray-400 text-xs uppercase tracking-wider">
                                        👥 Demographics
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-5 py-3 text-gray-600">% of World Population</td>
                                    <td class="px-5 py-3 font-medium text-gray-800">
                                        {{ isset($memo['WMEMO24']) && $memo['WMEMO24'] !== '' ? $memo['WMEMO24'] . '%' : '—' }}
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-5 py-3 text-gray-600">Population Density</td>
                                    <td class="px-5 py-3 font-medium text-gray-800">
                                        {{ $memo['WDEM9'] ?? '—' }}
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-5 py-3 text-gray-600">Sex Ratio</td>
                                    <td class="px-5 py-3 font-medium text-gray-800">
                                        @if (isset($memo['WDEM10']) && is_numeric($memo['WDEM10']))
                                            {{ round((float) $memo['WDEM10'] * 1000) }} female / 1000 male
                                        @else
                                            —
                                        @endif
                                    </td>
                                </tr>

                                {{-- Logistics --}}
                                <tr class="bg-gray-50">
                                    <td colspan="2"
                                        class="px-5 py-2 font-semibold text-gray-400 text-xs uppercase tracking-wider">
                                        🚚 Logistics
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-5 py-3 text-gray-600">No. of Time Zones</td>
                                    <td class="px-5 py-3 font-medium text-gray-800">
                                        {{ $memo['WMEMO20'] ?? '—' }}
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-5 py-3 text-gray-600">Dialing Code</td>
                                    <td class="px-5 py-3 font-medium text-gray-800">
                                        {{ $memo['WMEMO19'] ?? '—' }}
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-5 py-3 text-gray-600">Currency</td>
                                    <td class="px-5 py-3 font-medium text-gray-800">
                                        @if (isset($memo['WMEMO12']) || isset($memo['WMEMO13']))
                                            {!! trim(
                                                ($memo['WMEMO12'] ?? '') . (isset($memo['WMEMO13']) && $memo['WMEMO13'] ? '<br>(' . $memo['WMEMO13'] . ')' : ''),
                                            ) !!}
                                        @else
                                            —
                                        @endif
                                    </td>
                                </tr>

                                {{-- World Wars --}}
                                <tr class="bg-gray-50">
                                    <td colspan="2"
                                        class="px-5 py-2 font-semibold text-gray-400 text-xs uppercase tracking-wider">
                                        ⚔️ World Wars
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-5 py-3 text-gray-600">Participated In</td>
                                    <td class="px-5 py-3">
                                        @forelse($activeWarNames as $war)
                                            <span
                                                class="inline-block bg-red-100 mr-1 px-3 py-1 rounded-full font-medium text-red-800 text-xs">
                                                {{ $war }}
                                            </span>
                                        @empty
                                            <span class="text-gray-400 italic">—</span>
                                        @endforelse
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- News Widget -->
            <div class="shadow-sm mb-4 border rounded widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background"
                id="{{ $side }}-news-widget">

                <h3 class="mb-3 ps-2 text-dark text-center widget__title widget__title--has-icon fw-bold">
                    <i class="me-2 fa fa-newspaper-o"></i>
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
            @php
                if ($side == 'left') {
                    $embassy_link = $main->primary_embassy_link;
                } else {
                    $embassy_link = $main->secondary_embassy_link;
                }
            @endphp

            <div class="shadow-sm mb-4 border-0 rounded card" id="{{ $side }}-embassy-card">
                <div class="text-center card-body">
                    <h5 class="mb-3 text-dark card-title fw-bold">
                        <i class="me-2 fa fa-building-o"></i>
                        Embassy of {{ $data->country_name ?? 'N/A' }}
                    </h5>
                    @if ($embassy_link)
                        <a href="{{ $embassy_link }}" target="_blank" class="w-100 btn btn-primary fw-semibold">
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


            <!-- Important Links Section -->
            <div
                class="bg-white shadow-sm p-2 border rounded widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background">

                <h5 class="mb-3 text-dark text-center card-title fw-bold">
                    <i class="me-2 fa fa-link"></i>Important Links
                </h5>
                <div id="{{ $side }}-links-widget"
                    style="overflow: hidden; max-height: 41px; transition: max-height 0.3s ease;">
                    @if (!empty($data->important_links) && is_array($data->important_links))

                        @foreach ($data->important_links as $key => $links)
                            <div class="">
                                <h6 class="text-dark text-capitalize fw-bold">
                                    {{ str_replace('_', ' ', $key) }}
                                </h6>

                                <ul class="list-unstyled">
                                    @foreach ($links as $link)
                                        <li>
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

                <!-- Toggle Button -->
                <!-- Toggle Button — id add kiya, tabhi dikhe jab scrollHeight > 241 ho -->
                <div class="mt-2 text-center">
                    <button type="button" id="{{ $side }}-links-toggle-btn"
                        class="btn-link h3 toggle-links-btn" aria-expanded="false"
                        onclick="toggleImportantLinks(this, '{{ $side }}-links-widget')">
                        <i class="me-1 fa fa-angle-double-down"></i>
                    </button>
                </div>
            </div>


            <div class="bg-white shadow-lg mt-4 p-0 border rounded-lg overflow-hidden">
                <div class="">

                    @php
                        if ($side == 'left') {
                            $ypData = explode('|', $main->primary_yp) ?? [];
                        } elseif ($side == 'right') {
                            $ypData = explode('|', $main->secondary_yp) ?? [];
                        }
                    @endphp

                    @if (isset($ypData) && count($ypData) > 1)
                        <a href="{{ $ypData[1] }}" target="_blank" class="group block relative overflow-hidden">


                            <img src="https://meerutrang.in/images/yellow-pages-row.png" alt="Yellow Pages"
                                class="w-full object-cover group-hover:scale-110 transition-transform duration-500"
                                style="height: 180px;" />

                            <!-- TEXT ON IMAGE -->
                            <div
                                class="z-10 absolute inset-0 flex flex-col justify-center items-center p-3 text-center">
                                <h2 class="mb-1 font-bold text-[24px] text-dark lg:text-[28px]"
                                    style="font-family: 'DM Sans', sans-serif; line-height: 1.2;">
                                    {{ $ypData[0] ?? '' }}
                                    <br>
                                </h2>
                                <h4 class="font-bold text-muted text-xs uppercase tracking-widest">
                                    Yellow Pages
                                </h4>
                            </div>
                        </a>
                    @else
                        <a href="javascript:void(0)" data-bs-toggle="modal"
                            data-bs-target="#yellowPagesModal_{{ $side }}"
                            class="group block relative overflow-hidden">


                            <img src="https://meerutrang.in/images/yellow-pages-row.png" alt="Yellow Pages"
                                class="w-full object-cover group-hover:scale-110 transition-transform duration-500"
                                style="height: 180px;" />

                            <!-- TEXT ON IMAGE -->
                            <div
                                class="z-10 absolute inset-0 flex flex-col justify-center items-center p-3 text-center">
                                <h2 class="mb-1 font-bold text-[24px] text-dark lg:text-[28px]"
                                    style="font-family: 'DM Sans', sans-serif; line-height: 1.2;">
                                    {{ $ypData[0] ?? '' }}
                                    <br>
                                </h2>
                                <h4 class="font-bold text-muted text-xs uppercase tracking-widest">
                                    Yellow Pages
                                </h4>
                            </div>
                        </a>

                        <!-- Yellow Pages Modal -->
                        <div class="modal fade" id="yellowPagesModal_{{ $side }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="rounded-xl modal-dialog modal-dialog-centered">
                                <div class="shadow border-0 rounded-xl modal-content">
                                    <div class="pb-0 border-0 modal-header">
                                        <h4 class="fw-bold">Yellow Pages</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="mt-1 p-2 px-4 pb-4 border-t text-justify modal-body">
                                        {{-- <div class="mb-4 text-warning">
                                        <i class="fa fa-book fa-3x"></i>
                                    </div> --}}
                                        {{-- <h4 class="mb-3 fw-bold">Yellow Pages</h4> --}}
                                        <p class="mb-4 text-muted">
                                            Free listing of products and services of {{ $ypData[0] ?? '' }}.
                                            <br>
                                            Thank you for
                                            your interest. However, the registration has not yet been activated. We
                                            await a
                                            business facilitation partner.
                                        </p>
                                        <div class="flex justify-between items-center gap-3">
                                            <a href="https://www.prarang.in/partners" target="_blank"
                                                class="shadow-sm px-4 rounded-pill text-xs btn btn-warning fw-bold">
                                                Prarang Country Partnerships
                                            </a>
                                             @if ($side == 'left')
                        <a href="https://www.prarang.in/yp/india" target="_blank"
                            class="shadow-sm px-4 rounded-pill text-xs btn btn-warning fw-bold">
                            Example - Czech Republic companies in India
                        </a>
                    @else
                        <a href="https://www.prarang.in/yp/czech-republic" target="_blank"
                            class="shadow-sm px-4 rounded-pill text-xs btn btn-warning fw-bold">
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