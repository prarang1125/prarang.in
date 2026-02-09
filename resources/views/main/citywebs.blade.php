<x-layout.main.base>
    <style>
        /* Modern Table Styling */
        .modern-table {
            font-size: 13px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .modern-table thead {
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .modern-table thead th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
            padding: 8px 6px;
            white-space: nowrap;
            border-bottom: 2px solid #dee2e6;
        }

        .modern-table tbody td {
            padding: 6px 6px;
            vertical-align: middle;
            font-size: 13px;
        }

        /* Remove hover animation */
        .modern-table tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }

        .table-responsive {
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
            max-height: calc(100vh - 250px);
            overflow-y: auto;
        }

        /* PC - Fit in window */
        @media (min-width: 769px) {
            .table-responsive {
                overflow-x: hidden;
                overflow-y: auto;
            }
        }

        /* Mobile Optimizations with Sticky State Column */
        @media (max-width: 768px) {
            .modern-table {
                font-size: 11px;
            }

            .modern-table thead th {
                font-size: 9px;
                padding: 6px 3px;
            }

            .modern-table tbody td {
                padding: 6px 3px;
                font-size: 11px;
            }

            .table-responsive {
                border-radius: 4px;
                overflow-x: auto;
                max-height: calc(100vh - 200px);
            }

            /* Sticky first two columns (# and State) on mobile */
            .modern-table thead th:nth-child(1),
            .modern-table thead th:nth-child(2),
            .modern-table tbody td:nth-child(1),
            .modern-table tbody td:nth-child(2) {
                position: sticky;
                background-color: white;
                z-index: 5;
            }

            .modern-table thead th:nth-child(1),
            .modern-table tbody td:nth-child(1) {
                left: 0;
                box-shadow: 2px 0 4px rgba(0, 0, 0, 0.1);
            }

            .modern-table thead th:nth-child(2),
            .modern-table tbody td:nth-child(2) {
                left: 40px;
                box-shadow: 2px 0 4px rgba(0, 0, 0, 0.1);
            }

            .modern-table thead th:nth-child(1),
            .modern-table thead th:nth-child(2) {
                background-color: #007bff !important;
            }
        }

        /* Button Styling */
        .modern-table .btn-sm {
            padding: 3px 10px;
            font-size: 11px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .modern-table .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 6px rgba(0, 123, 255, 0.3);
        }

        /* Modal Enhancements */
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 16px 20px;
        }

        .modal-header .modal-title {
            font-weight: 600;
            font-size: 18px;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-body {
            padding: 20px;
            max-height: 400px;
            overflow-y: auto;
        }

        .modal-body .list-group-item {
            border-left: 3px solid #007bff;
            margin-bottom: 8px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .modal-body .list-group-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
            border-left-color: #0056b3;
        }

        /* Scroll Indicator for Mobile */
        @media (max-width: 768px) {
            .table-responsive::after {
                content: '← Scroll horizontally →';
                display: block;
                text-align: center;
                padding: 6px;
                background: linear-gradient(90deg, transparent, #007bff, transparent);
                color: white;
                font-size: 10px;
                font-weight: 600;
                border-radius: 0 0 4px 4px;
            }
        }

        /* Modal body */
        .container .modal .modal-xl .modal-content .modal-body {
            height: 100vh !important;
        }

        /* Modal body */
        .container .modal .modal-body {
            max-height: 100vh;
        }

        /* Text white */
        .modern-table thead tr {
            position: sticky !important;
            top: 1px;
        }

        /* Head Of Table */
        .table-responsive .modern-table thead {
            position: sticky;
            z-index: 11;
            top: -1px;
        }

        /* Primary */
        .modern-table thead>.bg-primary {
            position: sticky;
            z-index: 138;
        }

        /* Enhanced Sticky Header for Main Table */
        .table-responsive .modern-table thead th {
            position: sticky;
            top: 0;
            z-index: 100;
            background-color: #007bff !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .table-responsive .modern-table thead tr {
            position: sticky;
            top: 0;
            z-index: 100;
        }

        /* Heading */
        .container .modal h6 {
            border-style: none;
            text-align: center;
        }

        @media (min-width:769px) {

            /* Heading */
            .container .modal h6 {
                font-size: 16px;
            }

        }

        /* Modal header */
        .container .modal .modal-header {
            display: grid;
        }

        /* Modal header */
        .container .modal .modal-xl .modal-content .modal-header {
            grid-template-columns: 89% 9% !important;
            /* transform: translatex(0px) translatey(0px) !important; */
        }

        /* Modal title */
        .container .modal .modal-title {
            text-align: center;
        }

        /* Text white */
        .modern-table thead .text-white {
            position: sticky;
            z-index: 1000 !important;
        }

        /* Text white */
        .container .mt-3 .table-responsive .modern-table thead .bg-primary .text-white {
            background-color: #3084dd !important;
        }

        /* Head Of Table */
        .table-responsive .modern-table thead {
            position: sticky;
            top: 1px !important;
            z-index: 1000 !important;
        }

        /* Modern table */
        .container .mt-3 .modern-table {
            overflow: scroll;
        }
    </style>
    <style>
        /* Paragraph */
        .container section p {
            font-size: 13px;
        }

        /* Bold */
        .container section .fw-bold {
            margin-bottom: 3px;
        }

        @media (min-width:769px) {

            /* Table Data */
            .modern-table tr td {
                font-size: 14px !important;
            }

        }
    </style>
    <p class="text-start mt-2">
        <a href="/" class="btn btn-dark btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
    </p>
    <section class="flex flex-col justify-center items-center">
        <h4 class=" flex  justify-center items-center text-center text-primary font-bold">
            <img class="h-10 w-10" src="{{ asset('assets/images/home/3.png') }}" alt="">
            India - 520 City Webs
            <img class="h-10 w-10" src="{{ asset('assets/images/home/3.png') }}" alt="">
        </h4>
    </section>
    <section>
        <p>India has 9,389 towns as per Census 2011. Of these, 7,933 are Statutory/Census Towns, 475 are Urban
            Agglomerations, and 985 are Outgrowths. Among them, 36 are State/UT capitals and 800+ are District capitals.
        </p>
        <p>
            Only 520 State/District capitals in India have a population base of 30,000 or more literate netizens in a
            script. For effective digital communication with these netizens across India, there is an opportunity to
            create 901 City Knowledge Webs.
        </p>
    </section>
    <section class="mt-3">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover table-bordered modern-table">
                <thead>
                    <tr class="bg-primary">
                        @foreach (config('cityweb.header') as $header)
                            <th class="bg-primary text-white">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach (config('cityweb.data') as $data)
                        <tr>

                            <td>{{ $data['#'] ?? '' }}</td>
                            <td>
                                <a class="text-primary cursor-pointer text-decoration-none" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $data['#'] ?? '' }}">
                                    {{ $data['state'] ?? '' }}
                                </a>

                            </td>
                            <td>{{ $data['Assamese'] ?? '' }}</td>
                            <td>{{ $data['Bengali'] ?? '' }}</td>
                            <td>{{ $data['Devanagari'] ?? '' }}</td>
                            <td>{{ $data['Gurumukhi'] ?? '' }}</td>
                            <td>{{ $data['Kannada'] ?? '' }}</td>
                            <td>{{ $data['Malayalam'] ?? '' }}</td>
                            <td>{{ $data['Marathi'] ?? '' }}</td>
                            <td>{{ $data['Gujarati'] ?? '' }}</td>
                            <td>{{ $data['Odia'] ?? '' }}</td>
                            <td>{{ $data['Urdu'] ?? '' }}</td>
                            <td>{{ $data['Tamil'] ?? '' }}</td>
                            <td>{{ $data['Telugu'] ?? '' }}</td>
                            <td>{{ $data['English'] ?? '' }}</td>
                            <td>{{ $data['Other Scripts'] ?? '' }}</td>
                            <td>{{ $data['All 13 Scripts'] ?? '' }}</td>
                            <td><a class="text-primary cursor-pointer text-decoration-none" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $data['#'] ?? '' }}">
                                    {{ $data['No. of Cities'] ?? '' }}
                                </a></td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div>
    </section>
    <section>
        <p class="fw-bold">
            Notes:
        </p>
        <p class="p-0 m-0"> 1. Source : Census 2011 (Language Data, 2018)</p>
        <p class="p-0 m-0">2. 22 Official Languages are written in 13 Scripts</p>
        <p class="p-0 m-0"> 3. Of the 121 Indian Languages with more than 10,000 speakers (Census 2011), there are 13
            primary scripts.
            Also
            there are 9 other minor scripts (totaling to approx. ~6.69% of Indian Population). It is noteworthy that
            Konkani is a multiscript language (3) and two languages – Santhali and Gondhi – do not have a script.</p>



    </section>

    @foreach ($popData as $key => $value)
        <div class="modal fade" id="modal-{{ $key }}" tabindex="-1"
            aria-labelledby="modal-{{ $key }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-{{ $key }}Label">City Webs of {{ $state[$key] }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="table-container">
                                    <h6 class="mb-3 text-primary fw-bold">
                                        List of Cities with more than 30K Literate Netizens in any one Script /
                                        Language.

                                    </h6>
                                    <div class="table-wrapper">
                                        <table
                                            class="table table-sm table-striped table-bordered table-hover modal-city-table">
                                            <thead class="sticky-top">
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>City</th>
                                                    <th>Language/Script</th>
                                                    <th>State Capital</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $counter = 1; @endphp
                                                @foreach ($value as $item)
                                                    @if ($item['30k'] == '0')
                                                        @continue
                                                    @endif
                                                    <tr>
                                                        <td>{{ $counter++ }}</td>
                                                        <td>{{ $item['City'] }}</td>
                                                        <td>{{ $item['script'] }}</td>
                                                        <td>{{ $item['sc'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-container">
                                    <h6 class="mb-3 text-secondary fw-bold">
                                        List of Cities with less than 30K Literate Netizens in any one Script /
                                        Language.

                                    </h6>
                                    <div class="table-wrapper">
                                        <table
                                            class="table table-sm table-striped table-bordered table-hover modal-city-table">
                                            <thead class="sticky-top">
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>City</th>
                                                    <th>Language/Script</th>
                                                    <th>State Capital</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $counter = 1; @endphp
                                                @foreach ($value as $items)
                                                    @if ($items['30k'] == '1')
                                                        @continue
                                                    @endif
                                                    <tr>
                                                        <td>{{ $counter++ }}</td>
                                                        <td>{{ $items['City'] }}</td>
                                                        <td>{{ $items['script'] }}</td>
                                                        <td>{{ $items['sc'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (!isset($value) || !is_array($value))
                            <p class="text-muted text-center mt-3">No cities available for this state.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <style>
        /* Modal Table Enhancements */
        .table-wrapper {
            max-height: 400px;
            overflow-y: auto;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-city-table {
            margin-bottom: 0;
            font-size: 13px;
        }

        .modal-city-table thead {
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .modal-city-table thead th {
            background-color: #007bff;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            padding: 10px 8px;
            border: 1px solid #0056b3;
            white-space: nowrap;
        }

        .modal-city-table tbody td {
            padding: 8px;
            vertical-align: middle;
            border: 1px solid #dee2e6;
        }

        .modal-city-table tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.08);
        }

        .table-container h6 {
            font-size: 14px;
            padding: 8px 12px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 6px;
            border-left: 4px solid #007bff;
        }

        .table-container h6 i {
            margin-right: 6px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .table-wrapper {
                max-height: 300px;
            }

            .modal-city-table {
                font-size: 11px;
            }

            .modal-city-table thead th {
                font-size: 9px;
                padding: 6px 4px;
            }

            .modal-city-table tbody td {
                padding: 6px 4px;
            }

            .table-container h6 {
                font-size: 12px;
            }
        }
    </style>
</x-layout.main.base>
