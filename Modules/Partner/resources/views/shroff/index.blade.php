@php
$metaData = [
'nav-heading' => 'PRARANG PARTNER:',
'nav-sub-heading' => '<span class="text-primary">Dr. <span class="text-black">S</span>hroff\'s <span
        class="text-black">C</span>harity <span class="text-black">E</span>ye <span class="text-black">H</span>ospital
    (<span class="text-black">SCEH</span>)</span>',
];
@endphp
<style>
    body {
        background-color: white !important;
    }

    .pr_bg {
        background-color: #a1d4f1 !important;
    }

    .sceh_bg {
        background-color: rgba(213, 46, 63, 0.58) !important;
    }

    /* Flex grow 1 */
    .container section .row .col-xl-12 .overflow-hidden .flex-grow-1 {
        height: 100% !important;
    }

    /* Flex grow 1 */
    .container section .flex-grow-1 {
        max-height: 100% !important;
    }

    /* Text */
    .container tbody .text-xs {
        float: none !important;
    }

    /* Table Data */
    .container tr td {
        font-size: 14px;
    }

    /* Font bold */
    .container section .font-bold {
        position: sticky;
        top: -2px;
        background-color: #ffffff;
        z-index: 451;
    }
</style>
<x-layout.main.base :metaData="$metaData">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .container-fluid {
            padding: 30px;
        }

        .col-lg-2 .text-center {
            width: 100%;
            max-width: 260px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .side-panel {
            display: grid;
            grid-template-rows: 120px 170px 80px;
            gap: 30px;
            justify-items: center;
            align-items: center;
        }

        .logo-box {
            width: 100%;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .row-box {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hospital-logo {
            width: 220px;
            object-fit: contain;
        }

        .elephant-logo {
            width: 120px;
            object-fit: contain;
        }

        .social-box {
            width: 100%;
            background: #fff;
            border: 2px solid #ddd;
            border-radius: 16px;
            padding: 18px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
        }

        .map-image {
            width: 100%;
            max-width: 680px;
            background: #fff;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        h2 {
            color: #1e3a8a;
            font-size: 38px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 35px;
        }

        .btn {
            border-radius: 45px;
            padding: 14px 24px;
            font-size: 16px;
            font-weight: 600;
            transition: .25s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, .12);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, .18);
        }

        .btn-danger {
            background: #b22222;
            border: none;
        }

        .btn-primary {
            background: #0d6efd;
            border: none;
        }

        .btn-success {
            background: #198754;
            border: none;
        }

        .social-box {
            background: #ffffff;
            border: 2px solid #d9d9d9;
            border-radius: 15px;
            padding: 18px;
            margin-top: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
        }

        .social_link {
            background: #FFD54F;
            text-align: center;
            border-radius: 10px;
            padding: 8px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 35px;
            margin-top: 10px;
        }

        .social-icons a {
            font-size: 42px;
        }

        .facebook {
            color: #1877F2;
        }

        .whatsapp {
            color: #25D366;
        }

        .social-icons a:hover {
            transform: scale(1.15);
        }

        @media(max-width:992px) {

            .col-lg-2,
            .col-lg-8 {
                margin-bottom: 40px;
            }

            h2 {
                font-size: 28px;
            }

            .map-image {
                max-width: 100%;
            }

            .container-fluid {
                padding: 40px 40px 60px;
            }

            .main-map {
                max-height: 370px;
                object-fit: contain;
                background: #fff;
                padding: 15px;
                border-radius: 15px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            }
        }
    </style>

    <div class="py-4 container-fluid">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-2">
                <div class="side-panel">
                    <div class="logo-box">
                        <img src="https://i.ibb.co/Rkwbw5nN/Logo-850x300.png" class="hospital-logo">
                    </div>
                    <div class="row-box">
                        <a href="https://sceh.net/" target="_blank" class="btn btn-danger w-100">
                            SCEH Website
                        </a>
                    </div>
                    <div class="row-box">
                        <a href="https://g2c.prarang.in/india/health" class="btn btn-primary w-100">
                            India Healthcare<br>
                            Snapshot
                        </a>
                    </div>
                </div>
            </div>

            <!-- Center -->
            <div class="text-center col-lg-8">
                <h2 class="mb-5">
                    SCEH's Geographic Span
                </h2>
                <img class="img-fluid main-map" src="{{ asset('modules/partner/images/shroff/mapx.png') }}" alt="Map">
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-2">
                <div class="side-panel">
                    <div class="logo-box">
                        <img src="https://www.prarang.in/home-assets/image/logo.png" class="elephant-logo">
                    </div>
                    <div class="row-box w-100">
                        <div class="social-box">
                            <div class="social_link">
                                Partnership Social Media
                            </div>
                            <div class="social-icons">
                                <a href="https://www.facebook.com/prarang.in" class="facebook" target="_blank">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://wa.me/9319701249" class="whatsapp" target="_blank">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row-box">
                        <a href="https://b2b.prarang.in/login?lt=partner" class="btn btn-success w-100">
                            Partner Login
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <section class="p-3 mb-4 text-sm leading-relaxed text-gray-700 bg-white border border-gray-100 rounded shadow-sm">
        {!! $sentence !!}
    </section>
    <section>
        <div class="row g-4">
            {{-- City Interaction Webs --}}
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="p-2 text-xl font-bold text-center ">City/Village: Prarang Interaction Webs</div>
                <div class="flex flex-col overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="table-responsive flex-grow-1" style="max-height: 500px;">
                        <table class="table table-border table-bordered table-sm">
                            <thead class="shadow-sm sticky-top bg-light" style="z-index: 1;">
                                <tr>
                                    <td colspan="4" class="text-xs font-bold text-center pr_bg"></td>
                                    <td colspan="3" class="text-xs font-bold text-center sceh_bg">Shroff Hospital /
                                        Vision Centre</td>
                                    <td colspan="3" class="text-xs font-bold text-center pr_bg">Prarang</td>
                                </tr>
                                <tr>
                                    <th
                                        class="text-center pr_bg border-0 text-gray-600 text-xs py-2 text-center w-[30px]">
                                        #</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">City</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">District</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">State</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 sceh_bg">Hospital /
                                        Vision<br> Centre</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 sceh_bg"> Contacts</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 sceh_bg"> Address</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">POP. 2026</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">City KW</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">Language</th>
                                </tr>
                            </thead>
                            @php
                            $groupedCities = collect($hData['City_Interaction'])->groupBy('city');
                            @endphp
                            <tbody>
                                @foreach($groupedCities as $city => $rows)

                                @php
                                $rowspan = count($rows);
                                $first = $rows->first();
                                @endphp
                                @foreach($rows as $index => $item)
                                <tr>

                                    @if($index == 0)
                                    <td rowspan="{{ $rowspan }}" class="text-center">
                                        {{ $loop->parent->iteration }}
                                    </td>

                                    <td rowspan="{{ $rowspan }}">
                                        {{ $first['city'] }}
                                    </td>


                                    <td rowspan="{{ $rowspan }}">
                                        <livewire:modules.partner.util.show-dhq-ranks :title="$first['district_name']"
                                            :code="$first['dhq_code']" />
                                    </td>

                                    <td rowspan="{{ $rowspan }}">
                                        {{ $first['state_name'] }}
                                    </td>
                                    @endif

                                    <td>{{ $item['facility_type'] }}</td>

                                    <td>{{ $item['ph_no'] }}</td>

                                    <td>{{ $item['address'] }}
                                        @if($item['map_link']) &nbsp;&nbsp;
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <a class="cursor-pointer text-primary decoration-none" target="_blank"
                                            href="{{ $item['map_link'] }}">Map
                                        </a>
                                        @endif
                                    </td>
                                    @if($index == 0)
                                    <td rowspan="{{ $rowspan }}" class="text-end">
                                        {{ number_format(
                                        $cityPop[$first['dhq_code']] *
                                        pow(1 + (str_replace('%','',$first['AEGR_pct']) / 100),15)
                                        ) }}
                                    </td>

                                    <td rowspan="{{ $rowspan }}" class="text-center">
                                        <a target="_blank"
                                            href="https://www.prarang.in/{{ strtolower($first['city']) }}"
                                            class="font-bold">
                                            Click <br> Here
                                        </a>
                                    </td>
                                    <td rowspan="{{ $rowspan }}">
                                        {{ $first['language'] }}
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- City Webs --}}
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="p-2 text-xl font-bold text-center ">City: Prarang Webs</div>
                <div class="flex flex-col overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">

                    <div class="table-responsive flex-grow-1" style="max-height: 500px;">
                        <table class="table table-border table-bordered table-sm">
                            <thead class="shadow-sm sticky-top bg-light table-bordered" style="z-index: 1;">
                                <tr>
                                    <td colspan="4" class="text-xs font-bold text-center pr_bg"></td>
                                    <td colspan="3" class="text-xs font-bold text-center sceh_bg">Shroff Hospital /
                                        Vision Centre</td>
                                    <td colspan="3" class="text-xs font-bold text-center pr_bg">Prarang</td>
                                </tr>
                                <tr>
                                    <th
                                        class="text-center pr_bg border-0 text-gray-600 text-xs py-2 text-center w-[30px]">
                                        #</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">City</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">District</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">State</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 sceh_bg">Hospital /
                                        Vision Centre</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 sceh_bg"> Contacts</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 sceh_bg"> Address</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">POP. 2026</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">City KW</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">Language</th>
                                </tr>
                            </thead>
                            @php
                            $groupedTowns = collect($hData['City'])->groupBy('town_village_code');
                            @endphp
                            <tbody>
                                @foreach($groupedTowns as $townCode => $rows)

                                @php
                                $rowspan = $rows->count();
                                $first = $rows->first();
                                @endphp

                                @foreach($rows as $index => $item)
                                <tr class="transition-colors hover:bg-indigo-50">

                                    @if($index == 0)
                                    <td rowspan="{{ $rowspan }}" class="text-xs text-center text-gray-500">
                                        {{ $loop->parent->iteration }}
                                    </td>

                                    <td rowspan="{{ $rowspan }}" class="text-xs font-medium text-gray-800">
                                        {{ $first['town_village_name'] }}
                                    </td>



                                    <td rowspan="{{ $rowspan }}" class="text-xs">
                                        <livewire:modules.partner.util.show-dhq-ranks :title="$first['district_name']"
                                            :code="$first['dhq_code']" />
                                    </td>

                                    <td rowspan="{{ $rowspan }}" class="text-xs text-gray-600">
                                        {{ $first['state_name'] }}
                                    </td>
                                    @endif

                                    <td class="text-xs text-gray-600">
                                        {{ $item['facility_type'] }}
                                    </td>

                                    <td class="text-xs text-gray-600">
                                        {{ $item['ph_no'] }}
                                    </td>

                                    <td class="text-xs text-gray-600">
                                        {{ $item['address'] }} @if($item['map_link']) &nbsp;&nbsp;
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <a class="cursor-pointer text-primary decoration-none" target="_blank"
                                            href="{{ $item['map_link'] }}">Map
                                        </a>
                                        @endif
                                    </td>



                                    @if($index == 0)
                                    <td rowspan="{{ $rowspan }}" class="text-xs font-medium text-right text-gray-700">
                                        {{
                                        number_format(
                                        $townPop[$first['town_village_code']] *
                                        pow(1 + (str_replace('%','',$first['AEGR_pct']) / 100), 15)
                                        )
                                        }}
                                    </td>

                                    <td rowspan="{{ $rowspan }}" class="text-xs text-center">
                                        <a target="_blank"
                                            href="{{ url('/') }}/city/{{ url_encoder($first['state_LGD_code'].'-'.$first['dhq_code'].'-'.$first['town_village_code']) }}/{{ strtolower($first['town_village_name']) }}"
                                            class="inline-block  text-blue-700 px-2 py-1 rounded text-[10px] font-semibold hover:bg-indigo-200 transition-colors whitespace-nowrap">
                                            Click<br>Here
                                        </a>
                                    </td>
                                    <td rowspan="{{ $rowspan }}" class="text-xs font-medium text-gray-800">
                                        {{ $first['language'] }}
                                    </td>
                                    @endif

                                </tr>
                                @endforeach

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Village Webs --}}
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="p-2 text-sm text-xl font-bold tracking-wide text-center">Village: Prarang Webs
                </div>
                <div class="flex flex-col overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm h-100">

                    <div class="table-responsive flex-grow-1" style="max-height: 500px;">
                        <table class="table table-border table-bordered table-sm">
                            <thead class="shadow-sm sticky-top bg-light" style="z-index: 1;">
                                <tr>
                                    <td colspan="4" class="text-xs font-bold text-center pr_bg"></td>
                                    <td colspan="3" class="text-xs font-bold text-center sceh_bg">Shroff Hospital /
                                        Vision Centre</td>
                                    <td colspan="3" class="text-xs font-bold text-center pr_bg">Prarang</td>
                                </tr>
                                <tr>
                                    <th
                                        class="text-center pr_bg border-0 text-gray-600 text-xs py-2 text-center w-[30px]">
                                        #</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">Village</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">District</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">State</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 sceh_bg">Hospital /
                                        Vision <br> Centre</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 sceh_bg"> Contacts</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 sceh_bg"> Address</th>
                                    <th class="py-2 text-xs text-center text-right text-gray-600 border-0 pr_bg">POP.
                                        2026</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">Village KW</th>
                                    <th class="py-2 text-xs text-center text-gray-600 border-0 pr_bg">Language</th>
                                </tr>
                            </thead>
                            @php
                            $groupedVillages = collect($hData['Village'])->groupBy('town_village_code');
                            @endphp
                            <tbody>
                                @foreach($groupedVillages as $villageCode => $rows)

                                @php
                                $rowspan = $rows->count();
                                $first = $rows->first();
                                @endphp

                                @foreach($rows as $index => $item)
                                <tr class="transition-colors hover:bg-emerald-50">

                                    @if($index == 0)
                                    <td rowspan="{{ $rowspan }}" class="text-xs text-center text-gray-500">
                                        {{ $loop->parent->iteration }}
                                    </td>

                                    <td rowspan="{{ $rowspan }}" class="text-xs font-medium text-gray-800">
                                        {{ $first['town_village_name'] }}
                                    </td>



                                    <td rowspan="{{ $rowspan }}" class="text-xs">
                                        <livewire:modules.partner.util.show-dhq-ranks :title="$first['district_name']"
                                            :code="$first['dhq_code']" />
                                    </td>

                                    <td rowspan="{{ $rowspan }}" class="text-xs text-gray-600">
                                        {{ $first['state_name'] }}
                                    </td>
                                    @endif

                                    <td class="text-xs text-gray-600">
                                        {{ $item['facility_type'] }}
                                    </td>

                                    <td class="text-xs text-gray-600">
                                        {{ $item['ph_no'] }}
                                    </td>

                                    <td class="text-xs text-gray-600">
                                        {{ $item['address'] }} @if($item['map_link']) &nbsp;&nbsp;
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <a class="cursor-pointer text-primary decoration-none" target="_blank"
                                            href="{{ $item['map_link'] }}">Map
                                        </a>
                                        @endif
                                    </td>



                                    @if($index == 0)
                                    <td rowspan="{{ $rowspan }}" class="text-xs font-medium text-right text-gray-700">
                                        {{
                                        number_format(
                                        $villagePop[$first['town_village_code']] *
                                        pow(
                                        1 + (str_replace('%', '', $first['AEGR_pct']) / 100),
                                        15
                                        )
                                        )
                                        }}
                                    </td>

                                    <td rowspan="{{ $rowspan }}" class="text-xs text-center">
                                        <a target="_blank"
                                            href="{{ url('/') }}/village/{{ url_encoder($first['state_LGD_code'].'-'.$first['district_LGD_code'].'-'.$first['town_village_code']) }}/{{ strtolower($first['town_village_name']) }}"
                                            class="inline-block bg-emerald-100 text-emerald-700 px-2 py-1 rounded text-[10px] font-semibold hover:bg-emerald-200 transition-colors whitespace-nowrap">
                                            Click<br>Here
                                        </a>
                                    </td>
                                    <td rowspan="{{ $rowspan }}" class="text-xs font-medium text-gray-800">
                                        {{ $first['language'] }}
                                    </td>
                                    @endif

                                </tr>
                                @endforeach

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Custom Scrollbar for tables */
        .table-responsive::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</x-layout.main.base>
