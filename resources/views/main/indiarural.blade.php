@php
$metaData = [
'nav-heading' => view('components.nav-heading', [
'text' => 'India : Rural - 594,204 Villages',
'text_class'=>'text-sm',
'leftImg' => asset('assets/images/home/Villages-1.png'),
'rightImg' => asset('assets/images/home/Villages-1.png'),
]),
'nav-sub-heading' => '',
'headerClass' => 'custom-header-width',
];
@endphp
<x-layout.main.base :metaData="$metaData">
    <style>
        /* Modern Table Styling */
        .modern-table {
            font-size: 13px;
            min-width: max-content;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            border-collapse: separate;
            border-spacing: 0;
        }

        .modern-table thead {
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .modern-table thead th {
            font-weight: 600;
            text-transform: none;
            font-size: 14px;
            letter-spacing: 0.5px;
            padding: 8px 6px;
            white-space: nowrap;
            border-bottom: 1px solid #dee2e6;
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
            overflow-x: auto;
            overflow-y: auto;
        }

        /* PC - Fit in window */
        @media (min-width: 769px) {
            .table-responsive {
                overflow-x: auto;
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
            font-size: 15px;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
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
        /* .container .modal .modal-xl .modal-content .modal-body {
            height: 100vh !important;
        } */

        /* Modal body */
        /* .container .modal .modal-body {
            max-height: 100vh;
        } */

        /* Stable two-row sticky header without scroll artifacts */
        .table-hori .modern-table thead {
            position: static;
        }

        .table-hori .modern-table thead tr {
            position: static;
        }

        .table-hori .modern-table thead th {
            position: sticky;
            background-color: #007bff !important;
            box-shadow: none !important;
            background-clip: padding-box;
        }

        .table-hori .modern-table thead tr:first-child th {
            top: 0;
            z-index: 210;
            height: 40px;
        }

        .table-hori .modern-table thead tr:nth-child(2) th {
            top: 40px;
            z-index: 209;
        }

        @media (max-width: 768px) {
            .table-hori .modern-table thead tr:first-child th {
                height: 34px;
            }

            .table-hori .modern-table thead tr:nth-child(2) th {
                top: 34px;
            }
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
            text-align: left;
        }

        /* Text white */
        /* .modern-table thead .text-white {
            position: sticky;
            z-index: 1000 !important;
        } */

        /* Text white */
        .container .mt-3 .table-responsive .modern-table thead .bg-primary .text-white {
            background-color: #3084dd !important;
        }

        /* Head Of Table */
        .table-responsive .modern-table thead {
            position: sticky;
            top: 0px !important;
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
    <style>
        /* Modal header */
        .container .table-hori .table-responsive .modal .modal-dialog .modal-content .modal-header {
            grid-template-columns: 90% 1fr !important;
        }

        /* Modal header */
        .container .modal .modal-dialog .modal-content .modal-header {
            grid-template-columns: 90% 1fr !important;
        }

        /* Modal dialog */


        /* Modal content */
        /* .container .modal .modal-dialog .modal-content {
            height: 90vh !important;
        } */

        /* Table Data */
        .table-responsive td:nth-child(2) {
            position: sticky;
            left: 1px;
        }

        /* Text white */
        .head-forstic .text-white:nth-child(2) {
            left: 1px;
            z-index: 1000;
        }

        .head-forstic .text-white:nth-child(3) {
            z-index: 1;
        }

        /* Head forstic */
        .table-hori .table-striped .head-forstic {
            z-index: 64 !important;
        }

        /* Text white */
        .head-forstic .text-white:nth-child(2) {
            z-index: 1000;
            left: 2px !important;
        }

        /* Text white */
        .head-forstic .text-white:not(:nth-child(2)) {
            z-index: 174 !important;
        }

        /* Text white */
        /* .head-forstic .text-white:nth-child(2) {
            width: 176px;
        } */

        /* Text start */
        .container .text-start {
            position: absolute;
            top: 130px;
        }

        @media (max-width:576px) {

            /* Button */
            .container .text-start a {
                position: relative;
                top: -52px;
            }

        }

        /* Modal body */
        /* .container .modal .modal-body {
            max-height: 105px !important;
        } */

        /* Modal body */
        /* .container .modal .modal-dialog .modal-content .modal-body {
            height: 153px !important;
        } */

        /* Modal content */
        /* .container .modal .modal-dialog .modal-content {
            height: 191px !important;
        } */

        /* Modal content */
        /* .container .modal .modal-content {
            min-width: 0px;
            min-height: 0px;
            max-height: 209px;
        } */

        .table-hori .table-responsive .modern-table tbody tr td:nth-child(n+3) {
            text-align: right !important;
        }

        .table-hori .table-responsive {
            position: relative;
        }

        .table-hori .table-responsive .modern-table tfoot .india-total-row td {
            position: sticky;
            bottom: 0;
            z-index: 120;
            /* background: #dfe5ee !important; */
            font-weight: 700;
            border: 1px solid #dee2e6;
            text-align: center !important;
        }

        .table-hori .table-responsive .modern-table tfoot .india-total-row td:nth-child(2) {
            left: 0px;
            z-index: 121;
        }

        .statewidth {
            width: 243px !important;
        }

        @media (max-width: 576px) {
            .statewidth {
                width: 100px !important;
            }
        }
    </style>


    <section>
        <p>India had a total of 640,932 villages in 2011 (Census) including 43,326 which were uninhabited. These
            effectively reduce to 594,204 inhabited villages in 2026. <br>India had a total of <b>640,932</b> villages
            in 2011 ( Census) including 43,326 which were uninhabited.
        </p>
        <p>The Ministry of Panchayat Raj maintains an updated Indian Village database LGD ( Local Government Directory),
            with the latest Block/Tehsil, Sub-District, District & State mappings however this LGD does Not provide any
            estimates on Population, at any point of time including when they recognize a new village ( not in the
            Census 2011 list). </p>

        <p>
            We have deduplicated the India Village Census 2011 list of Villages to the LGD India Villages (as of 12
            March, 2026). The Panchayati Raj LGD India village database has grown to <b>676,260</b> villages. Of these
            <b>87.9% </b> match off to the Census, <b>5.9%</b> are New villages ( which didn't exist in 2011),
            <b>6.2%</b> appear to have been re-populated ( since census 2011). Also, we can identify <b>3,402</b>
            villages of Census 2011 which are Missing in the LGD - an anomaly which may indicate that these have since
            become uninhabited.
        </p>
    </section>



    <section class="mt-3 table-hori">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover table-bordered modern-table">
                <thead class="head-forstic">

                    <tr class="bg-primary">
                        <th class="bg-primary text-white" rowspan="2">#</th>
                        <th class="bg-primary text-white text-center statewidth" rowspan="2">State / UT</th>
                        <th class="bg-primary text-white text-center" colspan="4"
                            style="background: #2c4f92 !important">Census 2011</th>
                        <th class="bg-primary text-white text-center" colspan="9">Panchayat Raj - March 2026</th>
                    </tr>


                    <tr class="bg-primary">
                        <th class="bg-primary text-white text-center" style="background: #2c4f92 !important"># Villages
                        </th>
                        <th class="bg-primary text-white text-center" style="background: #2c4f92 !important">%</th>
                        <th class="bg-primary text-white text-center" style="background: #2c4f92 !important"># Inhabited
                        </th>
                        <th class="bg-primary text-white text-center" style="background: #2c4f92 !important">%</th>
                        <th class="bg-primary text-white text-center"># Villages</th>
                        <th class="bg-primary text-white text-center">%</th>
                        <th class="bg-primary text-white text-center"># Inhabited<br>(Cen. 2011)</th>
                        <th class="bg-primary text-white text-center">%</th>
                        <th class="bg-primary text-white text-center"># Re-Pop.<br>(Cen. 2011)</th>
                        <th class="bg-primary text-white text-center">%</th>
                        <th class="bg-primary text-white text-center"># New<br>Villages</th>
                        <th class="bg-primary text-white text-center">%</th>
                        <th class="bg-primary text-white text-center"># Missing<br>(Cen. 2011)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stateSummaryRaw ?? [] as $row)
                    <tr>
                        <td>{{ $row['id'] ?? '-' }}</td>

                        <td>{{ $row['state'] ?? '-' }}</td>

                        <td>{{ number_format((int) ($row['census_2011_villages'] ?? 0)) }}</td>

                        <td>{{ isset($row['census_2011_villages_pct']) ? number_format((float)
                            $row['census_2011_villages_pct'], 1) : '-' }}</td>

                        <td>{{ number_format((int) ($row['census_2011_inhabited'] ?? 0)) }}</td>

                        <td>{{ isset($row['census_2011_inhabited_pct']) ? number_format((float)
                            $row['census_2011_inhabited_pct'], 1) : '-' }}</td>

                        <td>{{ (int) ($row['panchayat_2026_villages'] ?? 0) > 0 ? number_format((int)
                            $row['panchayat_2026_villages']) : '-' }}</td>

                        <td>{{ isset($row['panchayat_2026_villages_pct']) ? number_format((float)
                            $row['panchayat_2026_villages_pct'], 1) : '-' }}</td>

                        <td>{{ (int) ($row['panchayat_2026_inhabited'] ?? 0) > 0 ? number_format((int)
                            $row['panchayat_2026_inhabited']) : '-' }}</td>

                        <td>{{ isset($row['panchayat_2026_inhabited_pct']) ? number_format((float)
                            $row['panchayat_2026_inhabited_pct'], 1) : '-' }}</td>

                        <td>
                            @if(($row['repop_villages'] ?? null) == null)
                            -
                            @else
                            <a href="javascript:void(0)" class="text-primary village-detail-trigger"
                                data-state-code="{{ $row['state_code'] }}" data-type="repo">
                                {{ number_format((float) $row['repop_villages']) }}
                            </a>
                            @endif
                        </td>

                        <td>{{ isset($row['repop_villages_pct']) ? number_format((float) $row['repop_villages_pct'], 1)
                            : '-' }}</td>

                        <td>
                            @if(($row['new_villages'] ?? null) == null)
                            -
                            @else
                            <a href="javascript:void(0)" class="text-primary village-detail-trigger"
                                data-state-code="{{ $row['state_code'] }}" data-type="new">
                                {{ number_format((float) $row['new_villages']) }}
                            </a>
                            @endif
                        </td>

                        <td>{{ isset($row['new_villages_pct']) ? number_format((float) $row['new_villages_pct'], 1) :
                            '-' }}</td>

                        <td>
                            @if(($row['missing_villages'] ?? null) == null)
                            -
                            @else
                            <a href="javascript:void(0)" class="text-primary village-detail-trigger"
                                data-state-code="{{ $row['state_code'] }}" data-type="missing">
                                {{ number_format((float) $row['missing_villages']) }}
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="15" class="text-center">No data available.</td>
                    </tr>
                    @endforelse

                </tbody>

                <tfoot>
                    <tr class="india-total-row">

                        <td colspan="2">INDIA - TOTAL</td>
                        <td>6,40,932</td>
                        <td>100.0</td>
                        <td>5,97,606</td>
                        <td>93.2</td>
                        <td>6,76,260</td>
                        <td>100</td>
                        <td>5,94,204</td>
                        <td>87.9</td>
                        <td>41,981</td>
                        <td>6.2</td>
                        <td>40,075</td>
                        <td>5.9</td>
                        <td>3,402</td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </section>


    {{-- Generic Village Detail Modal --}}
    <div class="modal fade" id="villageDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="villageModalTitle">
                        Village Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p id="villageModalDescription" style="font-size: 14px;"></p>
                    <div class="table-wrapper">
                        <table class="table table-sm table-striped table-bordered table-hover modal-city-table">
                            <thead class="sticky-top">
                                <tr>
                                    <th class="text-white">#</th>
                                    <th class="text-white">District</th>
                                    <th class="text-white">Village</th>
                                </tr>
                            </thead>
                            <tbody id="villageModalBody">
                                <!-- Data will be loaded here -->
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const villageModal = new bootstrap.Modal(document.getElementById('villageDetailModal'));
            const modalTitle = document.getElementById('villageModalTitle');
            const modalDescription = document.getElementById('villageModalDescription');
            const modalBody = document.getElementById('villageModalBody');

            document.querySelectorAll('.village-detail-trigger').forEach(trigger => {
                trigger.addEventListener('click', function() {
                    const stateCode = this.getAttribute('data-state-code');
                    const type = this.getAttribute('data-type');

                    // Show loading state or clear previous data
                    modalBody.innerHTML = '<tr><td colspan="3" class="text-center">Loading...</td></tr>';
                    modalTitle.innerText = 'Loading...';
                    modalDescription.innerText = '';
                    villageModal.show();

                    fetch(`/get-village-details/${stateCode}/${type}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                modalBody.innerHTML = `<tr><td colspan="3" class="text-center text-danger">${data.error}</td></tr>`;
                                return;
                            }

                            modalTitle.innerHTML = `${data.title} <br> <span style="font-size: 18px">${data.state_name}</span>`;
                            modalDescription.innerText = data.description;

                            let rows = '';
                            data.villages.forEach((village, index) => {
                                rows += `
                                    <tr>
                                        <td>${index + 1}</td>
                                        <td>${village.district}</td>
                                        <td>${village.village}</td>
                                    </tr>
                                `;
                            });
                            modalBody.innerHTML = rows;
                        })
                        .catch(error => {
                            console.error('Error fetching village details:', error);
                            modalBody.innerHTML = '<tr><td colspan="3" class="text-center text-danger">Failed to load data.</td></tr>';
                        });
                });
            });
        });
    </script>







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
            font-size: 13px;
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
