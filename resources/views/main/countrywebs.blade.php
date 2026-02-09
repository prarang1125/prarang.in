<x-layout.main.base>
    <style>
        .scroll-hint {
            display: none;
            text-align: center;
            padding: 6px;
            background: linear-gradient(90deg, transparent, #e74c3c, transparent);
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

        .modern-table tbody td,
        .modern-table tbody th {
            padding: 6px 6px;
            vertical-align: middle;
            font-size: 13px;
        }

        .modern-table tbody tr:hover {
            background-color: rgba(231, 76, 60, 0.05);
        }

        .table-responsive {
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 8px;
            max-height: calc(100vh - 250px);
            overflow-y: auto;
        }

        @media (min-width: 769px) {
            .table-responsive {
                overflow-x: auto;
                overflow-y: auto;
            }
        }

        @media (max-width: 768px) {
            .modern-table {
                font-size: 11px;
            }

            .modern-table thead th {
                font-size: 9px;
                padding: 6px 3px;
            }

            .modern-table tbody td,
            .modern-table tbody th {
                padding: 6px 3px;
                font-size: 11px;
            }

            .table-responsive {
                border-radius: 4px;
                overflow-x: auto;
                max-height: calc(100vh - 200px);
            }

            /* Sticky first two columns (Sr. and Region) on mobile */
            .modern-table thead th:nth-child(1),
            .modern-table thead th:nth-child(2),
            .modern-table tbody tr th:nth-child(1),
            .modern-table tbody tr td:nth-child(1) {
                position: sticky;
                background-color: white;
                z-index: 5;
            }

            .modern-table thead th:nth-child(1),
            .modern-table tbody tr th:nth-child(1) {
                left: 0;
                box-shadow: 2px 0 4px rgba(0, 0, 0, 0.1);
            }

            .modern-table thead th:nth-child(2),
            .modern-table tbody tr td:nth-child(1) {
                left: 0px;
                box-shadow: 2px 0 4px rgba(0, 0, 0, 0.1);
            }

            .modern-table thead th:nth-child(1),
            .modern-table thead th:nth-child(2) {
                background-color: #e74c3c !important;
            }
        }

        /* Link Styling */
        .modern-table a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .modern-table a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Modal Enhancements */
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
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
            padding-top: 0px !important;
        }

        .modal-body table {
            width: 100%;
            font-size: 13px;
            border-collapse: separate;
            border-spacing: 0;
        }

        .modal-body table.table-bordered {
            border: 0;
        }

        .modal-body table thead th {
            background-color: #e74c3c;
            color: white;
            padding: 10px 8px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            border: 1px solid #c0392b;
            box-shadow: inset 0 -1px 0 #c0392b;
        }

        .modal-body table tbody tr:first-child td {
            border-top: 0;
        }

        .modal-body table tbody td {
            padding: 8px;
            border: 1px solid #dee2e6;
        }

        .modal-body table tbody tr:hover {
            background-color: rgba(231, 76, 60, 0.05);
        }

        /* Scroll Indicator for Mobile */
        @media (max-width: 768px) {
            .table-hori::after {
                content: '← Scroll horizontally →';
                display: block;
                text-align: center;
                padding: 6px;
                background: linear-gradient(90deg, transparent, #e74c3c, transparent);
                color: white;
                font-size: 10px;
                font-weight: 600;
                border-radius: 0 0 4px 4px;
            }
        }

        /* Link */
        .modern-table tr a {
            color: #0a5eb7;
        }

        /* Link (hover) */
        .modern-table tr a:hover {
            font-weight: 700;
        }

        /* Modal header */
        .container .modal .modal-header {
            display: grid;
            align-content: center;
            justify-content: center;
        }

        /* Modal header */
        .container .modal .modal-xl .modal-content .modal-header {
            /* transform: translatex(0px) translatey(0px) !important; */
            grid-template-columns: 89fr 10fr !important;
        }

        /* Modal title */
        .container .modal .modal-title {
            text-align: center;
        }
    </style>
    <style>
        /* Modal table header */
        .container .modal thead th {
            position: sticky;
            top: 0;
            z-index: 7;
            background-color: #e74c3c;
        }

        /* Modal table: sticky only Country column for horizontal scroll */
        .container .modal table th:nth-child(2),
        .container .modal table td:nth-child(2) {
            position: sticky;
            left: 0;
            z-index: 6;
            background-color: #fff;
            min-width: 180px;
            width: 180px;
        }

        .container .modal table thead th:nth-child(2) {
            background-color: #e74c3c;
            color: #fff;
            z-index: 8;
        }

        .container .modal table td:nth-child(2) {
            box-shadow: 2px 0 4px rgba(0, 0, 0, 0.08);
        }

        @media (max-width:576px) {

            /* Table Data */
            .container .modal tr td:nth-child(2) {
                position: sticky;
                left: 0;
                z-index: 6;
                background-color: #fff;
            }


        }

        @media (max-width:576px) {

            /* Table Data */


            /* Modern table */
            .container .mt-3 .modern-table {
                overflow: scroll;
            }

            /* Body Of Table */
            .table-responsive .modern-table tbody {
                overflow: scroll;

            }

            /* Table Data */
            .modern-table tr td:nth-child(2) {
                position: sticky;
                left: 0px !important;
                z-index: 100 !important;

            }

            /* Table Data */
            .container .mt-3 .table-responsive .modern-table tbody tr td {
                left: 2px !important;
            }

            /* Table Row */
            .modern-table tbody tr {
                overflow: scroll;
            }

        }
    </style>
    <style>
        /* Paragraph */
        .container section p {
            font-size: 13px;
        }

        /* Small */
        .container .modal .small {
            font-size: 12px;
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

        <h4 class=" flex text-danger  justify-center items-center text-center text-primary font-bold">
            <img class="h-10 w-10" src="{{ asset('assets/images/home/2.png') }}" alt="">
            World - 195 Country Webs
            <img class="h-10 w-10" src="{{ asset('assets/images/home/2.png') }}" alt="">
        </h4>
    </section>

    <small class="">All 195 countries are grouped into seven major regions/continents. The table below
        summarizes their combined demographic, literacy, internet access, and social media usage characteristics,
        providing a comparative view of global digital reach and knowledge connectivity.</small>


    <section class="mt-3 table-hori">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover table-bordered modern-table">
                <thead>
                    <tr class="bg-danger">
                        <th class="bg-danger text-white" id="sr">Sr.</th>
                        <th class="bg-danger text-white" id="Region">Region / Continents</th>
                        <th class="bg-danger text-white" id="Population">Population 2025 (in mil.)</th>
                        <th class="bg-danger text-white" id="Literacy">Literacy (%)</th>
                        <th class="bg-danger text-white" id="InternetAccess">Internet Access (%)</th>
                        <th class="bg-danger text-white" id="FacebookUsers">Facebook Users (%)</th>
                        <th class="bg-danger text-white" id="InstagramUsers">Instagram Users (%)</th>
                        <th class="bg-danger text-white" id="LinkedInUsers">LinkedIn Users (%)</th>
                        <th class="bg-danger text-white" id="TwitterUsers">X (Twitter) Users (%)</th>
                        <th class="bg-danger text-white" id="NumberOfCountries">No. of Countries</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>
                            <a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-1">Africa</a>

                        </td>
                        <td>1548</td>
                        <td>67%</td>
                        <td>38%</td>
                        <td>7%</td>
                        <td>6%</td>
                        <td>6%</td>
                        <td>1%</td>
                        <td><a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-1">54</a></td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td> <a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-2">Asia</a></td>
                        <td>4247</td>
                        <td>85%</td>
                        <td>68%</td>
                        <td>9%</td>
                        <td>18%</td>
                        <td>7%</td>
                        <td>3%</td>
                        <td><a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-2">37</a></td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td> <a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-3">Central America and the Caribbean</a></td>
                        <td>225</td>
                        <td>91%</td>
                        <td>73%</td>
                        <td>39%</td>
                        <td>34%</td>
                        <td>20%</td>
                        <td>7%</td>
                        <td><a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-3">21</a></td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td> <a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-4">Europe</a></td>
                        <td>600</td>
                        <td>99%</td>
                        <td>90%</td>
                        <td>36%</td>
                        <td>44%</td>
                        <td>44%</td>
                        <td>11%</td>
                        <td><a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-4">44</a></td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td> <a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-5">North America</a></td>
                        <td>387</td>
                        <td>87%</td>
                        <td>96%</td>
                        <td>45%</td>
                        <td>51%</td>
                        <td>77%</td>
                        <td>20%</td>
                        <td><a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-5">2</a></td>
                    </tr>
                    <tr>
                        <th>6</th>
                        <td> <a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-6">South America</a></td>
                        <td>438</td>
                        <td>95%</td>
                        <td>80%</td>
                        <td>37%</td>
                        <td>57%</td>
                        <td>39%</td>
                        <td>6%</td>
                        <td><a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-6">12</a></td>
                    </tr>
                    <tr>
                        <th>7</th>
                        <td> <a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-7">Oceania</a></td>
                        <td>746</td>
                        <td>94%</td>
                        <td>72%</td>
                        <td>32%</td>
                        <td>43%</td>
                        <td>16%</td>
                        <td>6%</td>
                        <td><a class="text-primary cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-7">25</a></td>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Total no of Knowledge Webs </th>
                        <td>8191</td>
                        <td>84%</td>
                        <td>67%</td>
                        <td>16%</td>
                        <td>24%</td>
                        <td>16%</td>
                        <td>4%</td>
                        <td>195</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <p class="small">
            Notes: Population (2025) figures are based on the UN Population Division Report (2024). Literacy rates
            are
            weighted averages derived from the CIA World Factbook (2022). Internet access data is sourced from UN
            ICT
            Data (2024). Social media usage percentages (Facebook, Instagram, LinkedIn, and X) are based on
            respective
            advertising modules as of December 2025.
        </p>
    </section>

    @foreach ($data as $key => $value)
        <div class="modal fade" id="modal-{{ $key }}" tabindex="-1"
            aria-labelledby="modal-{{ $key }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-{{ $key }}Label">
                            {{ config('countryweb.cid.' . $key) }} Digital Demography
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-sm table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th id="Country">Country</th>
                                    <th id="Population">Population 2025 (in mil.)</th>
                                    <th id="Literacy">Literacy (%)</th>
                                    <th id="InternetAccess">Internet Access (%)</th>
                                    <th id="FacebookUsers">Facebook Users (%)</th>
                                    <th id="InstagramUsers">Instagram Users (%)</th>
                                    <th id="LinkedInUsers">LinkedIn Users (%)</th>
                                    <th id="TwitterUsers">X (Twitter) Users (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($value as $v)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $v['country'] }}</td>
                                        <td>{{ $v['pop'] }}</td>
                                        <td>{{ $v['literacy'] }}</td>
                                        <td>{{ $v['internate'] }}</td>
                                        <td>{{ $v['facebook'] }}</td>
                                        <td>{{ $v['internate_user'] }}</td>
                                        <td>{{ $v['linkedin'] }}</td>
                                        <td>{{ $v['twitter'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <p class="small">
                            Notes: Population (2025) figures are based on the UN Population Division Report (2024).
                            Literacy rates are derived from the CIA World Factbook (2022). Internet access data is
                            sourced from UN ICT Data (2024). Social media usage percentages (Facebook, Instagram,
                            LinkedIn, and X) are based on respective advertising modules as of December 2025.

                        </p>
                    </div>
                    <div class="scroll-hint">&larr; Scroll horizontally &rarr;</div>
                </div>
            </div>
        </div>
    @endforeach

</x-layout.main.base>
