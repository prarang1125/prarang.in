@php
$metaData = [
'nav-heading' => view('components.nav-heading', [
'text' => 'India : Urban - 7,933 Cities',
'leftImg' => asset('assets/images/home/town-1.png'),
'rightImg' => asset('assets/images/home/town-1.png'),
]),
'nav-sub-heading' => '',
];
@endphp
<x-layout.main.base :metaData="$metaData">
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
            margin-bottom: 8px;
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
            .modern-table thead th:nth-child(2),
            .modern-table tbody td:nth-child(2) {
                position: sticky;
                background-color: white;
                z-index: 5;
            }

            /* .modern-table thead th:nth-child(1),
            .modern-table tbody td:nth-child(1) {
                left: 0;
                box-shadow: 2px 0 4px rgba(0, 0, 0, 0.1);
            } */

            .modern-table thead th:nth-child(2),
            .modern-table tbody td:nth-child(2) {
                left: 0px;
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
            .table-hori::after {
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

        .table-wrapper {
    max-height: 400px;
    overflow-y: auto;
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
    </style>
    <style>
        /* Paragraph */
        .container section p {
            font-size: 15px;
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
        /* Text start */
.container .text-start{
 position:absolute;
 top:125px;
}

@media (max-width:576px){

 /* Text start */
 .container .text-start{
  top:78px;
 }

}
/* Primary */
.modern-table thead .bg-primary .bg-primary{
 text-align:center;
}


    </style>



    <section>

        <p >India has 9,389 towns (Census 2011). Of these, 7933 are Statutory/Census Towns, 475 are Urban Agglomerations, and 985 are Outgrowths
        </p>
        <p>
            India has 121 languages (which have more than 10,000 speakers in India). These <b> 121 languages have 23 related scripts</b>. For effective digital communication across the country, these can be grouped into <b> 13 main scripts</b>. Do note that the India Census 2011 was unique in its focus on Multilingualism. For all 7933 Statutory/Census Towns, the primary tongue ( i.e. Mother Tongue) data for each of the 121 languages, was opened out for public use in 2018.
        </p>
        <p>
The Language % in the Table below shows the "Percentage of the State/UTs Total Cities which have <b> at least 100 or more Mother-Tongue speakers </b>( from the 121 Primary Indian Languages), of the respective language". This is Not the "Percent of the State/UT's Total Population who speak that Language". To see the Multilingualism i.e. "Percent of the State/UT's Population who speak a Second or Third language ( apart from their Mother Tongue)", please - <a href="https://g2c.prarang.in/script-language-data" target="_blank">Click here</a>
        </p>
    </section>
    <section class="mt-3 table-hori">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover table-bordered modern-table">
                <thead>
                    <tr class="bg-primary">
                        <th class="bg-primary text-white">#</th>
                        <th class="bg-primary text-white">State</th>
                        <th class="bg-primary text-white">Assamese</th>
                        <th class="bg-primary text-white">Bengali</th>
                        <th class="bg-primary text-white">Hindi</th>
                        <th class="bg-primary text-white">Punjabi</th>
                        <th class="bg-primary text-white">Kannada</th>
                        <th class="bg-primary text-white">Malayalam</th>
                        <th class="bg-primary text-white">Marathi</th>
                        <th class="bg-primary text-white">Gujarati</th>
                        <th class="bg-primary text-white">Odia</th>
                        <th class="bg-primary text-white">Urdu</th>
                        <th class="bg-primary text-white">Tamil</th>
                        <th class="bg-primary text-white">Telugu</th>
                        <th class="bg-primary text-white">English</th>
                        <th class="bg-primary text-white">Others</th>
                           <th class="bg-primary text-white"> Language <br> (Cities #)</th>
                            <th class="bg-primary text-white">Scripts # </th>
                             <th class="bg-primary text-white"> Main Script #</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($tableData as $row)
                    @php
                         $intSum = $stateTotal[$row['state_code']];
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucwords(strtolower($row['state_name'])) }}</td>
                        <td>{{ number_format(($row['Assamese']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Bengali']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Hindi']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Punjabi']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Kannada']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Malayalam']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Marathi']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Gujarati']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Odia']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Urdu']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Tamil']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>{{ number_format(($row['Telugu']/$intSum)*100, 0) ?? 0 }}% </td>
                        <td>{{ number_format(($row['English']/$intSum)*100, 0) ?? 0 }}%</td>
                        <td>
                            <a  class="text-primary cursor-pointer " data-bs-toggle="modal"
                                data-bs-target="#exampleModal-{{ Str::slug($row['state_name']) }}">
                                {{ number_format(($row['other_script']/$intSum)*100, 0) ?? 0 }}%
                            </a>
                        </td>
                        <td class="text-end">
                            {{ $intSum ? number_format($intSum) : 0 }}
                        </td>
                         <td class="text-end">
                           {{ number_format($row['scripts_count']) ?? 'N/A' }}
                        </td>
                           <td class="text-end">
                            {{ number_format($row['main_script_count']) ?? 'N/A' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    {{-- @dd($totalData); --}}
 @foreach($modalData as $state => $languages)

    <div class="modal fade" id="exampleModal-{{ Str::slug($state) }}" tabindex="-1"
        aria-labelledby="exampleModalLabel-{{ Str::slug($state) }}" aria-hidden="true">

        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered ">

            <div class="modal-content">

                <div class="modal-header bg-primary text-white">

                    <h5 class="modal-title" id="exampleModalLabel-{{ Str::slug($state) }}" style="font-size: 14px !important;" >
                       {{ $state }} - Other Mother Tongue
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                        <p class="small">In this state, {{ count($languages) }} out of the 121 languages have at least 100 mother-tongue speakers.</p>
                    <div class="table-wrapper">

                        <table class="table table-sm table-striped table-bordered table-hover modal-city-table">

                            <thead class="sticky-top">
                                <tr>
                                    <th>#</th>
                                    <th>Language</th>
                                    <th>Script</th>
                                    <th class="text-end">Language
(Cities %)</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($languages as $lang => $value)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lang }}</td>
                                    <td>{{$value['script']?? "" }}</td>
                                    <td class="text-end">{{ number_format(($value['value']), 0) ?? "0.00" }}%</td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="2" class="text-center text-muted py-3">
                                        No other language data available
                                    </td>
                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="modal-footer py-2">

                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>

    @endforeach

    <style>
        /* Modal table redesign */
        .language-modal .modal-dialog {
            max-width: 860px;
        }

        .language-modal .modal-content {
            border-radius: 14px;
            overflow: hidden;
            background: #ffffff;
        }

        .language-modal .modal-header {
            padding: 14px 18px;
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 55%, #084298 100%);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            border: 0;
        }

        .language-modal .modal-title {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.2px;
            margin: 0;
        }

        .language-modal .modal-body {
            padding: 0;
            background: #f7faff;
            overflow: hidden;
        }

        .language-modal .btn-close {
            margin: 0;
            opacity: 0.95;
        }

        .modal-table-wrap {
            max-height: min(62vh, 520px);
            overflow: auto;
            border-top: 1px solid #d9e6ff;
        }

        .modal-city-table {
            width: 100%;
            font-size: 13px;
            border-collapse: separate;
            border-spacing: 0;
        }

        .modal-city-table thead th {
            position: sticky;
            top: 0;
            z-index: 2;
            padding: 11px 10px;
            font-size: 10px;
            letter-spacing: 0.7px;
            text-transform: uppercase;
            color: #fff;
            background: #007bff;
            /* border-bottom: 1px solid #c7dbff; */
            white-space: nowrap;
        }

        .modal-city-table tbody td {
            padding: 10px;
            border-bottom: 1px solid #e7eefc;
            color: #1f2937;
            background: #ffffff;
            vertical-align: middle;
        }

        .modal-city-table th:last-child,
        .modal-city-table td:last-child {
            min-width: 130px;
        }

        .modal-city-table tbody tr:nth-child(even) td {
            background: #f9fbff;
        }

        .modal-city-table tbody tr:hover td {
            background: #edf4ff;
        }

        .modal-city-table .state-cell {
            font-weight: 600;
            color: #0b4aa3;
            white-space: nowrap;
        }

        .modal-city-table .population-cell {
            font-weight: 700;
            color: #123b7c;
            font-variant-numeric: tabular-nums;
        }

        .language-modal .modal-footer {
            border-top: 1px solid #d9e6ff;
            background: #f5f9ff;
        }

        @media (max-width: 768px) {
            .language-modal .modal-dialog {
                margin: 0.6rem;
            }

            .language-modal .modal-title {
                font-size: 14px;
            }

            .modal-table-wrap {
                max-height: 55vh;
            }

            .modal-city-table {
                font-size: 11px;
            }

            .modal-city-table thead th {
                font-size: 9px;
                padding: 8px 6px;
            }

            .modal-city-table tbody td {
                padding: 7px 6px;
            }
        }
    </style>
</x-layout.main.base>
