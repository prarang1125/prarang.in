<div>
    <style>
        .custom-scroll .mt-4 .table-responsive {
            overflow: scroll;
            /* width: 426px; */
        }
    </style>
    {{-- Trigger link --}}
    <a href="javascript:void(0)" wire:click.prevent="getDhqData" wire:loading.class="dhq-link-loading"
        wire:target="getDhqData"
        style="text-decoration: underline; color: blue; cursor: pointer; display: inline-flex; align-items: center; gap: 5px;">

        {{-- Spinner: visible only while getDhqData() is running for THIS instance --}}
        <span wire:loading wire:target="getDhqData" class="dhq-spinner"></span>

        {{-- Title: hidden while loading --}}
        <span wire:loading.remove wire:target="getDhqData">{{ $title }}</span>
        <span wire:loading wire:target="getDhqData"
            style="color:#6b7280; font-style:italic; font-size:0.85em;">Loading...</span>
    </a>
    @once
    <style>
        @keyframes dhq-spin {
            to {
                transform: rotate(360deg);
            }
        }

        .dhq-spinner {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 2px solid #3b82f6;
            border-top-color: transparent;
            border-radius: 50%;
            animation: dhq-spin 0.6s linear infinite;
        }

        .dhq-link-loading {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>
    @endonce

    {{-- Modal --}}
    @if($showModal)
    <div style="position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center;">
        {{-- Backdrop --}}
        <div wire:click="closeModal" style="position: absolute; inset: 0; background: rgba(0,0,0,0.5);"></div>

        {{-- Modal Box --}}
        <div
            style="position: relative; background: #fff; border-radius: 8px; width: 800px; max-width: 95vw; box-shadow: 0 10px 40px rgba(0,0,0,0.3); z-index: 1;">
            {{-- Header --}}
            <div
                style="display: flex; align-items: center; justify-content: space-between; padding: 16px 20px; border-bottom: 1px solid #e5e7eb;">
                <h5 style="margin: 0; font-size: 16px; font-weight: 600; color: #111827;">

                </h5>
                <button wire:click="closeModal"
                    style="background: none; border: none; font-size: 20px; cursor: pointer; color: #6b7280; line-height: 1;">&times;</button>
            </div>

            {{-- Body (empty) --}}
            <div style="padding: 24px; min-height: 100px; max-height: 75vh; overflow-y: auto;" class="custom-scroll">
                <h6 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                    <!-- <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background-color:#2563eb;"></span> -->
                    {{ $title }} District SCEH Facilities:
                </h6>
                <p class="">SCEH Hospitals and Vision Centers located within this district are displayed below,
                    categorized by city and village locations. You may click the button below to visit the District
                    Capital's web page partnered with SCEH. <br>
                    Additionally, the district health metrics below are ranked from 1 to 756 across Indian districts and
                    state capitals based on government census and healthcare infrastructure data. These rankings provide
                    a relative comparison of healthcare resources and facilities available in the district.
                </p>
                {{-- SCEH Facilities Table --}}
                @if(!empty($data['sceh_list']))
                <div class="mt-4">

                    <div class="table-responsive shadow-sm border border-gray-200 rounded-lg">
                        <table class="table table-hover table-striped table-sm m-0 border-0 align-middle text-sm"
                            style="width:100%;">
                            <thead class="bg-blue-50 text-blue-900">
                                <tr>
                                    <th class="border-0 font-semibold py-2 px-3 text-center w-[50px]">#</th>
                                    <th class="border-0 font-semibold py-2 px-3">SCEH Eye Care Facilities</th>
                                    <th class="border-0 font-semibold py-2 px-3 text-center">Contacts</th>
                                    <th class="border-0 font-semibold py-2 px-3 text-center">Address</th>
                                    <th class="border-0 font-semibold py-2 px-3 text-center">GPS Coordinates</th>
                                    <th class="border-0 font-semibold py-2 px-3 text-center">Knowledge Web</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['sceh_list'] as $items)
                                @php
                                $kwsData = $data['state_code_kws'][$items['town_village_code']][0];
                                @endphp
                                <tr class="transition-colors hover:bg-blue-100">
                                    <td class="py-2 px-3 text-center text-gray-500">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-3 font-medium text-gray-800"><a target="_blank"
                                            href="{{ $items['h_link'] }}">{{ $items['sceh_eye_care'] }} &nbsp;({{
                                            $items['h_type'] }})</a></td>
                                    <td class="py-2 px-3 text-center text-gray-500">{{ $items['ph_no'] }}</td>
                                    <td class="py-2 px-3  text-gray-500">{{ $items['address'] }}</td>
                                    <td class="py-2 px-3 text-center text-gray-500"><a href="{{ $items['map_link'] }}"
                                            target="_blank">Click Here</a></td>
                                    <td class="py-2 px-3 text-gray-600">
                                        <a target="_blank" rel="noopener noreferrer"
                                            href="{{ url(($items['is_town']=='village'?'village':'city').'/'.url_encoder($kwsData['state_code'] . '-' . $items['dhq_code'] . '-' . $items['town_village_code']) . '/' . \Illuminate\Support\Str::slug($kwsData['town_village_name'])) }}">
                                            <span
                                                class="inline-flex items-center gap-1 bg-gray-100 px-2 py-1 rounded text-xs font-medium border border-gray-200">
                                                {{ $items['is_town'] }} - {{ $kwsData['town_village_name'] }}
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                {{-- Ranking Table --}}
                <h6 class="mt-3 font-bold text-gray-800 mb-3 flex items-center gap-2">
                    {{ $title }} District Healths Metrics:
                </h6>

                <div class="table-responsive shadow-sm border border-gray-200 rounded-lg mb-4">
                    <table class="table table-hover table-striped table-sm m-0 border-0 align-middle text-sm"
                        style="width:100%;">
                        <thead class="bg-gray-50 text-gray-700">
                            <tr>
                                <th class="border-0 font-semibold py-2 px-3 text-center w-[50px]">Sr.No</th>
                                <th class="border-0 font-semibold py-2 px-3">Fields</th>
                                <th class="border-0 font-semibold py-2 px-3 text-center">India Average</th>
                                <th class="border-0 font-semibold py-2 px-3 text-right">Rank out of 756</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['dhq-rank_data'] as $key=>$item)
                            <tr class="transition-colors hover:bg-gray-100">
                                <td class="py-2 px-3 text-center text-gray-500">{{ $loop->iteration }}</td>
                                <td class="py-2 px-3 font-medium text-gray-800">{{ $data['source'][$key][0]['name'] ??
                                    "---" }}</td>
                                <td class="py-2 px-3 text-center text-gray-600">{{
                                    number_format($data['avg_data'][$key], 1) }}</td>
                                <td class="py-2 px-3 text-right font-semibold text-gray-700">{!! getSuperScript($item)
                                    !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
@endif
<style>
    /* Division */
    .text-xs>div>div>div>div {
        max-height: 517px;
        overflow-y: scroll;
        padding-top: 5px !important;
    }
</style>
</div>
