@php
$metaData = [
'nav-heading' => 'PRARANG PARTNER:',
'nav-sub-heading' => '<span class="text-primary">Dr. <span class="text-black">S</span>hroff\'s <span class="text-black">C</span>harity <span class="text-black">E</span>ye <span class="text-black">H</span>ospital (<span class="text-black">SCEH</span>)</span>',
];
@endphp
<style>
  body {
    background-color: white !important;
  }
</style>
<x-layout.main.base :metaData="$metaData">
  <div class="flex flex-col items-center py-1">
    <h4 class="text-center m-0 p-0 font-bold text-xl text-blue-900 tracking-wide">SCEH’s Geographic Span</h4>
    <a class="p-0 mt-1 text-blue-600 hover:text-blue-800 font-medium transition-colors text-sm" href="https://sceh.net/" target="_blank">https://sceh.net/</a>
  </div>

  <section class="row my-4 align-items-center">
    <div class="col-12 col-md-3 flex justify-center mb-3 mb-md-0">
      <a href="https://g2c.prarang.in/india/health" target="_blank" class="btn btn-primary shadow-sm rounded-pill px-4 py-2 font-semibold transition-all hover:-translate-y-1 w-full max-w-[220px]">India Healthcare Snapshot</a>
    </div>
    <div class="col-12 col-md-6 flex justify-center mb-3 mb-md-0">
      <img class="img-fluid " src="{{ asset('modules/partner/images/shroff/mapx.png') }}" alt="Map" style="max-height: 350px; object-fit: contain; background: white; padding: 10px;">
    </div>
    <div class="col-12 col-md-3 flex justify-center">
      <a href="https://b2b.prarang.in/login?lt=partner" class="btn btn-success shadow-sm rounded-pill px-4 py-2 font-semibold transition-all hover:-translate-y-1 w-full max-w-[220px]">Partner Login</a>
    </div>
  </section>

  <section class="p-3 bg-white rounded shadow-sm mb-4 border border-gray-100 text-gray-700 leading-relaxed text-sm">
    {!! $sentence !!}
  </section>

  <section>
    <div class="row g-4">
      {{-- City Interaction Webs --}}
      <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden h-100 flex flex-col">
          <div class="bg-blue-600 text-white p-2 text-center font-bold text-sm tracking-wide uppercase">City Interaction Webs</div>
          <div class="table-responsive flex-grow-1" style="max-height: 500px;">
            <table class="table table-hover table-striped table-sm m-0 border-0 align-middle">
              <thead class="sticky-top bg-light shadow-sm" style="z-index: 1;">
                <tr>
                  <th class="border-0 text-gray-600 text-xs py-2 text-center w-[30px]">#</th>
                  <th class="border-0 text-gray-600 text-xs py-2">City</th>
                  <th class="border-0 text-gray-600 text-xs py-2">District</th>
                  <th class="border-0 text-gray-600 text-xs py-2">State</th>
                  <th class="border-0 text-gray-600 text-xs py-2">Facility Type</th>
                  <th class="border-0 text-gray-600 text-xs py-2 text-right">POP. 2026</th>
                  <th class="border-0 text-gray-600 text-xs py-2 text-center">City KW</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($hData['City_Interaction'] as $item)
                <tr class="transition-colors hover:bg-blue-50">
                  <td class="text-xs text-center text-gray-500">{{ $loop->iteration }}</td>
                  <td class="text-xs font-medium text-gray-800">{{ $item['city'] }}</td>
                  <td class="text-xs"><livewire:modules.partner.util.show-dhq-ranks :title="$item['district_name']" :code="$item['dhq_code']" /></td>
                  <td class="text-xs text-gray-600">{{ $item['state_name'] }}</td>
                  <td class="text-xs text-gray-600">{{$item['facility_type']}}</td>
                  <td class="text-xs text-right font-medium text-gray-700">{{number_format($cityPop[$item['dhq_code']]* pow(1 + (str_replace('%','',$item['AEGR_pct']) / 100), 15)) ?? 0}}</td>
                  <td class="text-xs text-center">
                    <a target="_blank" href="https://www.prarang.in/{{strtolower($item['city'])}}" class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded text-[8px]  hover:bg-blue-200 transition-colors whitespace-nowrap">Click <br> Here</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- City Webs --}}
      <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden h-100 flex flex-col">
          <div class="bg-blue-600 text-white p-2 text-center font-bold text-sm tracking-wide uppercase">City Webs</div>
          <div class="table-responsive flex-grow-1" style="max-height: 500px;">
            <table class="table table-hover table-striped table-sm m-0 border-0 align-middle">
              <thead class="sticky-top bg-light shadow-sm" style="z-index: 1;">
                <tr>
                  <th class="border-0 text-gray-600 text-xs py-2 text-center w-[30px]">#</th>
                  <th class="border-0 text-gray-600 text-xs py-2">City</th>
                  <th class="border-0 text-gray-600 text-xs py-2">District</th>
                  <th class="border-0 text-gray-600 text-xs py-2">State</th>
                  <th class="border-0 text-gray-600 text-xs py-2">Facility Type</th>
                  <th class="border-0 text-gray-600 text-xs py-2 text-right">POP. 2026</th>
                  <th class="border-0 text-gray-600 text-xs py-2 text-center">City KW</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($hData['City'] as $item)
                <tr class="transition-colors hover:bg-indigo-50">
                  <td class="text-xs text-center text-gray-500">{{ $loop->iteration }}</td>
                  <td class="text-xs font-medium text-gray-800">{{ $item['town_village_name'] }}</td>
                  <td class="text-xs"><livewire:modules.partner.util.show-dhq-ranks :title="$item['district_name']" :code="$item['dhq_code']" /></td>
                  <td class="text-xs text-gray-600">{{ $item['state_name'] }}</td>
                  <td class="text-xs text-gray-600">{{$item['facility_type']}}</td>
                  <td class="text-xs text-right font-medium text-gray-700">{{ number_format($townPop[$item['town_village_code']] * pow(1 + (str_replace('%','',$item['AEGR_pct']) / 100), 15)) ?? 0}}</td>
                  <td class="text-xs text-center">
                    <a target="_blank" href="{{ url('/') }}/city/{{ url_encoder($item['state_LGD_code'] . '-' . $item['district_LGD_code'] . '-' . $item['town_village_code']) }}/{{strtolower($item['town_village_name'])}}" class="inline-block bg-indigo-100 text-indigo-700 px-2 py-1 rounded text-[10px] font-semibold hover:bg-indigo-200 transition-colors whitespace-nowrap">Click <br> Here</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Village Webs --}}
      <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden h-100 flex flex-col">
          <div class="bg-blue-600 text-white p-2 text-center font-bold text-sm tracking-wide uppercase">Village Webs</div>
          <div class="table-responsive flex-grow-1" style="max-height: 500px;">
            <table class="table table-hover table-striped table-sm m-0 border-0 align-middle">
              <thead class="sticky-top bg-light shadow-sm" style="z-index: 1;">
                <tr>
                  <th class="border-0 text-gray-600 text-xs py-2 text-center w-[30px]">#</th>
                  <th class="border-0 text-gray-600 text-xs py-2">Village</th>
                  <th class="border-0 text-gray-600 text-xs py-2">District</th>
                  <th class="border-0 text-gray-600 text-xs py-2">State</th>
                  <th class="border-0 text-gray-600 text-xs py-2">Facility Type</th>
                  <th class="border-0 text-gray-600 text-xs py-2 text-right">POP. 2026</th>
                  <th class="border-0 text-gray-600 text-xs py-2 text-center">Village KW</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($hData['Village'] as $item)
                <tr class="transition-colors hover:bg-emerald-50">
                  <td class="text-xs text-center text-gray-500">{{ $loop->iteration }}</td>
                  <td class="text-xs font-medium text-gray-800">{{ $item['town_village_name'] }}</td>
                  <td class="text-xs"><livewire:modules.partner.util.show-dhq-ranks :title="$item['district_name']" :code="$item['dhq_code']" /></td>
                  <td class="text-xs text-gray-600">{{ $item['state_name'] }}</td>
                  <td class="text-xs text-gray-600">{{$item['facility_type']}}</td>
                  <td class="text-xs text-right font-medium text-gray-700">{{ number_format($villagePop[$item['town_village_code']] * pow(1 + (str_replace('%','',$item['AEGR_pct']) / 100), 15)) ?? 0}}</td>
                  <td class="text-xs text-center">
                    <a target="_blank" href="{{ url('/') }}/village/{{ url_encoder($item['state_LGD_code'] . '-' . $item['district_LGD_code'] . '-' . $item['town_village_code']) }}/{{strtolower($item['town_village_name'])}}" class="inline-block bg-emerald-100 text-emerald-700 px-2 py-1 rounded text-[10px] font-semibold hover:bg-emerald-200 transition-colors whitespace-nowrap">Click <br> Here</a>
                  </td>
                </tr>
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
