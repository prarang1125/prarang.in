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

  <div class="flex  justify-center items-center gap-20">
    <img class="h-16 object-contain" src="https://i.ibb.co/Rkwbw5nN/Logo-850x300.png" alt="">
    <div class="flex flex-col items-center py-1">
      <h4 class="text-center m-0 p-0 font-bold text-xl text-blue-900 tracking-wide">SCEH’s Geographic Span</h4>
      <a class="p-0 mt-1 text-blue-600 hover:text-blue-800 font-medium transition-colors text-sm"
        href="https://sceh.net/" target="_blank">https://sceh.net/</a>
    </div>
    <img class="h-20 object-contain" src="https://www.prarang.in/home-assets/image/logo.png" alt="">



  </div>

  <section class="row my-4 align-items-center">
    <div class="col-12 col-md-3 flex justify-center mb-3 mb-md-0">
      <a href="https://g2c.prarang.in/india/health" target="_blank"
        class="btn btn-primary shadow-sm rounded-pill px-4 py-2 font-semibold transition-all hover:-translate-y-1 w-full max-w-[220px]">India
        Healthcare Snapshot</a>
    </div>
    <div class="col-12 col-md-6 flex justify-center mb-3 mb-md-0">
      <img class="img-fluid " src="{{ asset('modules/partner/images/shroff/mapx.png') }}" alt="Map"
        style="max-height: 350px; object-fit: contain; background: white; padding: 10px;">
    </div>
    <div class="col-12 col-md-3 flex justify-center">
      <a href="https://b2b.prarang.in/login?lt=partner"
        class="btn btn-success shadow-sm rounded-pill px-4 py-2 font-semibold transition-all hover:-translate-y-1 w-full max-w-[220px]">Partner
        Login</a>
    </div>
  </section>

  <section class="p-3 bg-white rounded shadow-sm mb-4 border border-gray-100 text-gray-700 leading-relaxed text-sm">
    {!! $sentence !!}
  </section>

  <section>
    <div class="row g-4">
      {{-- City Interaction Webs --}}
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="text-xl p-2 text-center font-bold ">City/Village: Prarang Interaction Webs</div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden flex flex-col">

          <div class="table-responsive flex-grow-1" style="max-height: 500px;">
            <table class="table table-border table-bordered table-sm">
              <thead class="sticky-top bg-light shadow-sm" style="z-index: 1;">
                <tr>
                  <td colspan="4" class="font-bold pr_bg text-center text-xs"></td>
                  <td colspan="3" class="font-bold sceh_bg text-center text-xs">Shroff Hospital / Vision Centre</td>
                  <td colspan="3" class="font-bold pr_bg text-center text-xs">Prarang</td>
                </tr>
                <tr>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2 text-center w-[30px]">#</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">City</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">District</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">State</th>
                  <th class="text-center sceh_bg border-0 text-gray-600 text-xs py-2">Hospital / Vision<br> Centre</th>
                  <th class="text-center sceh_bg border-0 text-gray-600 text-xs py-2"> Contacts</th>
                  <th class="text-center sceh_bg border-0 text-gray-600 text-xs py-2"> Address</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">POP. 2026</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2 text-center">City KW</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">Language</th>
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
                    <a class="text-primary  decoration-none cursor-pointer" target="_blank"
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
                    <a target="_blank" href="https://www.prarang.in/{{ strtolower($first['city']) }}" class="font-bold">
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
        <div class="text-xl p-2 text-center font-bold ">City: Prarang Webs</div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden  flex flex-col">

          <div class="table-responsive flex-grow-1" style="max-height: 500px;">
            <table class="table table-border table-bordered  table-sm">
              <thead class="sticky-top bg-light table-bordered shadow-sm" style="z-index: 1;">
                <tr>
                  <td colspan="4" class="font-bold pr_bg text-center text-xs"></td>
                  <td colspan="3" class="font-bold sceh_bg text-center text-xs">Shroff Hospital / Vision Centre</td>
                  <td colspan="3" class="font-bold pr_bg text-center text-xs">Prarang</td>
                </tr>
                <tr>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2 text-center w-[30px]">#</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">City</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">District</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">State</th>
                  <th class="text-center sceh_bg border-0 text-gray-600 text-xs py-2">Hospital / Vision Centre</th>
                  <th class="text-center sceh_bg border-0 text-gray-600 text-xs py-2"> Contacts</th>
                  <th class="sceh_bg text-center border-0 text-gray-600 text-xs py-2"> Address</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">POP. 2026</th>
                  <th class="pr_bg border-0 text-gray-600 text-xs py-2 text-center">City KW</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">Language</th>
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
                    <a class="text-primary  decoration-none cursor-pointer" target="_blank"
                      href="{{ $item['map_link'] }}">Map
                    </a>
                    @endif
                  </td>



                  @if($index == 0)
                  <td rowspan="{{ $rowspan }}" class="text-xs text-right font-medium text-gray-700">
                    {{
                    number_format(
                    $townPop[$first['town_village_code']] *
                    pow(1 + (str_replace('%','',$first['AEGR_pct']) / 100), 15)
                    )
                    }}
                  </td>

                  <td rowspan="{{ $rowspan }}" class="text-xs text-center">
                    <a target="_blank"
                      href="{{ url('/') }}/city/{{ url_encoder($first['state_LGD_code'].'-'.$first['district_LGD_code'].'-'.$first['town_village_code']) }}/{{ strtolower($first['town_village_name']) }}"
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
        <div class="p-2 text-center font-bold text-sm tracking-wide text-xl">Village: Prarang Webs
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden h-100 flex flex-col">

          <div class="table-responsive flex-grow-1" style="max-height: 500px;">
            <table class="table table-border table-bordered  table-sm">
              <thead class="sticky-top bg-light shadow-sm" style="z-index: 1;">
                <tr>
                  <td colspan="4" class="font-bold pr_bg text-center text-xs"></td>
                  <td colspan="3" class="font-bold sceh_bg text-center text-xs">Shroff Hospital / Vision Centre</td>
                  <td colspan="3" class="font-bold pr_bg text-center text-xs">Prarang</td>
                </tr>
                <tr>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2 text-center w-[30px]">#</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">Village</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">District</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">State</th>
                  <th class="text-center sceh_bg border-0 text-gray-600 text-xs py-2">Hospital / Vision <br> Centre</th>
                  <th class="text-center sceh_bg border-0 text-gray-600 text-xs py-2"> Contacts</th>
                  <th class="text-center sceh_bg border-0 text-gray-600 text-xs py-2"> Address</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2 text-right">POP. 2026</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2 text-center">Village KW</th>
                  <th class="text-center pr_bg border-0 text-gray-600 text-xs py-2">Language</th>
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
                    <a class="text-primary  decoration-none cursor-pointer" target="_blank"
                      href="{{ $item['map_link'] }}">Map
                    </a>
                    @endif
                  </td>



                  @if($index == 0)
                  <td rowspan="{{ $rowspan }}" class="text-xs text-right font-medium text-gray-700">
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
