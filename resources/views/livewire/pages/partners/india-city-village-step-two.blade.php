<x-partners.city-village-frame>


    @if(count($cityData) > 0 && $step == 2)
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold text-red-600 border-b-2 border-red-600 pb-1 inline-block mb-0">
            1.B. Market Size & Language
        </p>
        <p class="text-sm text-gray-600 m-0">
            (Compute Geographic Target Market (Population Size) & related Language for Digital Marketing)
        </p>
    </div>
    @endsection
    <section class="mb-8">
        <div class=" p-2 overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 border-collapse">
                <thead class="text-xs text-gray-700  bg-gray-50 border-b">
                    <tr>
                        <th class="px-2 py-1 text-xs border text-center">Sr.</th>
                        <th class="px-2 py-1 text-xs border text-center">City Name</th>
                        <th class="px-2 py-1 text-xs border text-center">State</th>
                        <th class="px-2 py-1 text-xs border text-center">
                            Population 2011
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Population - Census 2011</span>
                            </span>
                            <br> (in '000)
                        </th>
                        <th class="px-2 py-1 text-xs border text-center">
                            Population 2026
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Estimate - Population based on District Growth Rate -
                                    Census 2011</span>
                            </span>
                            <br> (in '000)
                        </th>
                        <th class="px-2 py-1 text-xs border text-center">
                            Literacy (%)
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">This refers to the percentage of people in a district who
                                    can read and write with understanding in any Language (Script) - Census 2011</span>
                            </span>
                        </th>
                        <th class="px-2 py-1 text-xs border text-center">
                            Internet Users
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Estimate - Population ratio of State Urban Internet Users
                                    - TRAI QTR Report</span>
                            </span>
                            <br> (in '000)
                        </th>
                        <th class="px-2 py-1 text-xs border text-center">
                            Facebook Users (%)
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Percentage of Internet Users using Facebook - TRAI QTR
                                    Report, FB Ad Module</span>
                            </span>
                        </th>
                        <th class="px-2 py-1 text-xs border text-center">
                            Instagram Users (%)
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Percentage of Internet Users using Instagram - TRAI QTR
                                    Report, Instagram Ad Module</span>
                            </span>
                        </th>
                        <th class="px-2 py-1 text-xs border text-center">
                            LinkedIn Users (%)
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Percentage of Internet Users using LinkedIn - TRAI QTR
                                    Report, LinkedIn Ad Module</span>
                            </span>
                        </th>
                        <th class="px-2 py-1 text-xs border text-center">
                            X (Twitter) Users (%)
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Percentage of Internet Users using X - TRAI QTR Report, X
                                    Ad Module</span>
                            </span>
                        </th>
                        <th class="px-2 py-1 text-xs border text-center hover:text-blue-800 hover:font-bold cursor-pointer text-blue-600"
                            onclick="window.open('/cirus','_blank')">
                            Cyber Risk Index
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Cyber Risk Score - ranked across 756+ State/District
                                    Capitals on 12 metrics, standardised 0-10 scale</span>
                            </span>
                        </th>
                        <th class="px-2 py-1 text-xs border text-center">
                            Top 3 Languages &nbsp;<span class="text-blue-600"><a href="#language-star">*</a></span><br>
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Top 3 Languages by Script, Census 2011 (121 languages
                                    clubbed into 13 scripts; English includes multilingual speakers)</span>
                            </span>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @php $sr = 1; @endphp
                    @foreach($cityData as $distId => $group)
                    @php
                    $dhq = $group['dhq'];
                    $towns = $group['towns'];
                    $villages = $group['villages'];
                    $rowspan = ($dhq ? 1 : 0) + count($towns) + count($villages);
                    $hasDhq = !is_null($dhq);
                    $firstRow = true;
                    $subCharCode = 65; // A
                    @endphp

                    @if($hasDhq)
                    <tr class="bg-white border-b hover:bg-gray-50 text-gray-900">
                        <td class="px-2 py-1 text-sm border text-center font-bold text-black">{{ $sr }}</td>
                        <td class="px-2 py-1 text-sm border font-bold text-black">{{ $dhq['city_name'] ?? '' }}
                            (District Capital)</td>

                        <td rowspan="{{ $rowspan }}"
                            class="px-2 py-1 text-sm border font-medium text-black align-middle text-center">{{
                            $dhq['demo']['MSTR1'] ?? '-' }}</td>

                        <td class="px-2 py-1 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $dhq['demo']['MSTR3'] ?? 0) / 1000) }}</td>
                        <td class="px-2 py-1 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $dhq['internet']['city_population'] ?? 0) / 1000) }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            isset($dhq['demo']['LAN1']) ? round((float)($dhq['demo']['LAN1'] ?? 0), 1) . '%' : '-' }}
                        </td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            round((float)($dhq['internet']['internet_users'] ?? 0)) }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            isset($dhq['internet']['facebook_users']) ? round((float)($dhq['internet']['facebook_users']
                            ?? 0)) . '%' : '-' }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            isset($dhq['internet']['instagram_users']) ?
                            round((float)($dhq['internet']['instagram_users'] ?? 0)) . '%' : '-' }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            isset($dhq['internet']['linkedin_users']) ? round((float)($dhq['internet']['linkedin_users']
                            ?? 0)) . '%' : '-' }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            isset($dhq['internet']['twitter_users']) ? round((float)($dhq['internet']['twitter_users']
                            ?? 0)) . '%' : '-' }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black hover:text-blue-600 hover:font-bold cursor-pointer"
                            onclick="window.open('/cirus','_blank')">
                            {{ round((float)($cirusData[$dhq['city_id']]['risk_index'] ?? 0),1) }}
                        </td>

                        <td rowspan="{{ $rowspan }}" class="px-2 py-1 text-sm border min-w-[250px] align-middle">
                            @if(isset($dhq['languages']) && is_array($dhq['languages']))
                            @php
                            $topLangs = array_slice($dhq['languages'], 0, 3, true);
                            @endphp
                            <div class="flex flex-col gap-2 justify-center h-full">
                                @foreach($topLangs as $langCode => $langData)
                                @php
                                $langName = isset($lang_titles[$langCode]) ? $lang_titles[$langCode] : $langCode;
                                @endphp
                                <label class="flex items-center gap-2 cursor-pointer w-fit">
                                    <input type="checkbox" wire:key="dist-{{$distId}}-{{$langCode}}"
                                        wire:model="selectedLanguages.{{ $distId }}-{{ $langCode }}"
                                        value="{{ $distId }}-{{ $langCode }}"
                                        class="w-4 h-4 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 cursor-pointer">
                                    <span class="text-sm text-gray-700 font-medium">{{ $langName }} <span
                                            class="text-xs text-gray-500 font-normal">({{
                                            number_format($langData['percentage'],1) }}%)</span></span>
                                </label>
                                @endforeach
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endif

                    @foreach($towns as $town)
                    <tr class="bg-white border-b hover:bg-gray-50 text-gray-900">
                        <td class="px-2 py-1 text-sm border text-center font-bold text-black">{{ $sr }} ({{
                            chr($subCharCode++) }})</td>
                        <td class="px-2 py-1 text-sm border font-bold text-black">{{ $town['city_name'] ?? '' }} (City)
                        </td>
                        @if(!$hasDhq && $firstRow)
                        <td rowspan="{{ $rowspan }}"
                            class="px-2 py-1 text-sm border font-medium text-black align-middle text-center">-</td>
                        @endif
                        <td class="px-2 py-1 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $town['demo']['MSTR3'] ?? 0) / 1000) }}</td>
                        <td class="px-2 py-1 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $town['internet']['city_population'] ?? 0) / 1000) }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            round((float)($town['internet']['internet_users'] ?? 0)) }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        @if(!$hasDhq && $firstRow)
                        <td rowspan="{{ $rowspan }}" class="px-2 py-1 text-sm border min-w-[250px] align-middle">-</td>
                        @endif
                    </tr>
                    @php $firstRow = false; @endphp
                    @endforeach

                    @foreach($villages as $village)
                    <tr class="bg-white border-b hover:bg-gray-50 text-gray-900">
                        <td class="px-2 py-1 text-sm border text-center font-bold text-black">{{ $sr }} ({{
                            chr($subCharCode++) }})</td>
                        <td class="px-2 py-1 text-sm border font-bold text-black">{{ $village['city_name'] ?? '' }}
                            (Village)</td>
                        @if(!$hasDhq && $firstRow)
                        <td rowspan="{{ $rowspan }}"
                            class="px-2 py-1 text-sm border font-medium text-black align-middle text-center">-</td>
                        @endif
                        <td class="px-2 py-1 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $village['demo']['MSTR3'] ?? 0) / 1000) }}</td>
                        <td class="px-2 py-1 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $village['internet']['city_population'] ?? 0) / 1000) }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            round((float)($village['internet']['internet_users'] ?? 0)) }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">-</td>
                        @if(!$hasDhq && $firstRow)
                        <td rowspan="{{ $rowspan }}" class="px-2 py-1 text-sm border min-w-[250px] align-middle">-</td>
                        @endif
                    </tr>
                    @php $firstRow = false; @endphp
                    @endforeach

                    @php $sr++; @endphp
                    @endforeach
                </tbody>
            </table>
            <div id="language-star" class="flex flec-col justify-end items-end mt-1 text-xs">
                <p>* Only Mother Tongue is considered for all languages except for English, where multilingual netizens
                    (2<sup>nd</sup> + 3<sup>rd</sup> known language) have also been included. </p>
            </div>

        </div>
    </section>
    @section('p-footer')
    <div class="mt-4 flex justify-between border-t pt-4">
        <button wire:click="changeStep('back')" wire:loading.attr="disabled" wire:target="changeStep"
            class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex flex-col items-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
            <span wire:loading.remove wire:target="changeStep">Back</span>
            <span wire:loading wire:target="changeStep" class="flex items-center gap-2">
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>

            </span>
        </button>
        <div class="flex gap-4">
            <button wire:click="createShareLink" wire:loading.attr="disabled"
                class="text-white   border-blue-600 bg-blue-600 hover:bg-blue-500 transition-colors px-6 py-2 rounded-lg font-medium shadow-sm flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                    </path>
                </svg>
                <span>Share</span>
            </button>
            <button wire:click="confirmLanguageSelection" wire:loading.attr="disabled"
                wire:target="confirmLanguageSelection"
                class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex flex-col items-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="confirmLanguageSelection">Confirm</span>
                <span wire:loading wire:target="confirmLanguageSelection" class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>

                </span>
            </button>
        </div>
    </div>
    @endsection
    @endif

    @if(count($cityData) > 0 && $step == 3)
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold text-red-600 border-b-2 border-red-600 pb-1 inline-block mb-0">
            2.A. Select Web Hosting Location
        </p>
        <p class="text-sm text-gray-600 m-0">
            (Compute Geographic Target Market & Pick Plan)
        </p>
    </div>
    @endsection
    <section class="mb-8" x-data="{ showPlanDetails: false, showProcessingModal: false }">

        <div class="p-2 overflow-x-auto">

            <div class="flex justify-end items-end mb-2">
                <button type="button" data-bs-toggle="modal" data-bs-target="#TheseMTw1"
                    class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg text-sm font-semibold transition-colors flex items-center gap-1.5 border border-blue-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Compare Plans
                </button>
            </div>


            <table class="w-full text-sm text-left text-gray-700 border-collapse border border-gray-300"
                x-data="{ showSocial: false }" :class="showSocial ? 'show-social' : ''">
                <thead class="text-xs bg-gray-50 border-b border-gray-300">
                    <tr>
                        <th rowspan="2" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">S. No.
                        </th>
                        <th rowspan="2" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">City
                        </th>
                        <th rowspan="2" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">State
                        </th>
                        <th rowspan="2" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">
                            Population (2026)<br>('000)
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Estimate - Population based on District Growth Rate -
                                    Census 2011</span>
                            </span>
                        </th>
                        <th rowspan="2" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">
                            Literacy (%)
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">This refers to the percentage of people in a district who
                                    can read and write with understanding in any Language (Script) - Census 2011</span>
                            </span>
                        </th>
                        <th rowspan="2" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">
                            Internet Users<br>('000)
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Estimate - Population ratio of State Urban Internet Users
                                    - TRAI QTR Report</span>
                            </span>
                            <br>
                            {{-- <button @click="showSocial = !showSocial"
                                class="mt-1 text-[10px] font-semibold px-2 py-0.5 rounded border transition-colors"
                                :class="showSocial ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-blue-600 border-blue-400 hover:bg-blue-50'"
                                x-text="showSocial ? '▲ fold' : '▶ social'">
                            </button> --}}
                        </th>

                        <th rowspan="2" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">
                            Selected Language
                            <span class="src-tooltip">
                                <svg class="w-3.5 h-3.5 text-gray-400 cursor-help" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="src-tooltip-box">Top 3 Languages by Script, Census 2011 (121 languages
                                    clubbed into 13 scripts; English includes multilingual speakers)</span>
                            </span>
                        </th>
                        <th colspan="3" class="px-2 py-2 border text-center font-bold text-gray-800 bg-indigo-100">
                            Select Host Location</th>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-2 border text-center font-bold text-gray-800 bg-indigo-50">
                            Prarang.in<br>
                            <span
                                class="text-[10px] text-gray-500 font-normal normal-case block mt-1 leading-tight">Subdomain<br>(e.g.
                                prarang.in/partner/yourco)</span>
                        </th>
                        <th class="px-2 py-2 border text-center font-bold text-gray-800 bg-indigo-50">
                            Your Website<br>
                            <span
                                class="text-[10px] text-gray-500 font-normal normal-case block mt-1 leading-tight">Subdomain</span>
                        </th>
                        <th class="px-2 py-2 border text-center font-bold text-gray-800 bg-indigo-50">
                            New Website<br>
                            <span
                                class="text-[10px] text-gray-500 font-normal normal-case block mt-1 leading-tight">Homepage</span>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center"></td>

                        <td></td>
                        <td class="text-center text-indigo-700 font-semibold text-xs">₹1,000</td>
                        <td class="text-center text-indigo-700 font-semibold text-xs">₹2,000</td>
                        <td class="text-center text-indigo-700 font-semibold text-xs">₹2,000</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $srNo = 1;
                    $totalPop2026 = 0;
                    $totalInternetUsers = 0;
                    $countWithLanguage = 0;

                    $liteTotal = 0;
                    $plusTotal = 0;
                    $primeTotal = 0;
                    if(isset($selectedPlans) && is_array($selectedPlans)) {
                    foreach($selectedPlans as $key => $planValue) {
                    if (str_ends_with($planValue, '-prarang')) {
                    $liteTotal += 1000;
                    } elseif (str_ends_with($planValue, '-yourwebsite')) {
                    $plusTotal += 2000;
                    } elseif (str_ends_with($planValue, '-newwebsite')) {
                    $primeTotal += 2000;
                    }
                    }
                    }
                    @endphp
                    @foreach($cityData as $distId => $group)
                    @php
                    $dhq = $group['dhq'];
                    $towns = $group['towns'];
                    $villages = $group['villages'];

                    $cityHasSelectedLangs = false;
                    $selectedLangsForCity = [];
                    if($dhq && isset($dhq['languages']) && is_array($dhq['languages'])){
                    $topLangs = array_slice($dhq['languages'], 0, 3, true);
                    foreach($topLangs as $langCode => $langData) {
                    if(!empty($selectedLanguages["{$distId}-{$langCode}"])) {
                    $cityHasSelectedLangs = true;
                    $selectedLangsForCity[$langCode] = $langData;
                    }
                    }
                    }
                    @endphp

                    @if($cityHasSelectedLangs)
                    @php
                    $langCount = count($selectedLangsForCity);
                    $subAlphaCharCode = 65; // ASCII 'A'
                    $hasDhq = !is_null($dhq);

                    $locations = [];
                    if($dhq) $locations[] = $dhq;
                    foreach($towns as $town) $locations[] = $town;
                    foreach($villages as $village) $locations[] = $village;

                    $totalRows = count($locations) * $langCount;
                    $isFirstLocation = true;
                    @endphp

                    @foreach($locations as $locIdx => $loc)
                    @php
                    // Stats calculation
                    $pop2026Raw = str_replace(',', '', $loc['demo']['MSTR3'] ?? '0');
                    $pop2026 = (float)$pop2026Raw;
                    // Formatting to '000s
                    $pop2026InThousands = $pop2026 / 1000;
                    $internetUsersInThousands = (float)($loc['internet']['internet_users'] ?? 0);

                    $totalPop2026 += $pop2026InThousands;
                    $totalInternetUsers += $internetUsersInThousands;
                    $totalInternetUsersper = $totalPop2026 > 0 ? ($totalInternetUsers/$totalPop2026)*100 : 0;

                    $firstLang = true;
                    @endphp

                    @foreach($selectedLangsForCity as $langCode => $langData)
                    @php
                    $langName = isset($lang_titles[$langCode]) ? $lang_titles[$langCode] : $langCode;
                    @endphp
                    <tr class="bg-white border-b hover:bg-gray-50">
                        @if($firstLang)
                        <td rowspan="{{ $langCount }}"
                            class="px-2 py-2 text-sm border text-center font-medium align-middle">
                            {{ $srNo }} @if($locIdx > 0 || !$hasDhq) ({{ chr($subAlphaCharCode++) }}) @endif
                        </td>

                        <td rowspan="{{ $langCount }}"
                            class="px-2 py-2 text-sm border font-semibold text-gray-900 align-middle">
                            {{ $loc['city_name'] ?? '' }} ({{ $loc['location_type'] === 'City' ? 'City' :
                            ($loc['location_type'] === 'District Capital' ? 'District Capital' : 'Village') }})
                        </td>

                        @if($isFirstLocation)
                        <td rowspan="{{ $totalRows }}" class="px-2 py-2 text-sm border align-middle text-center">
                            {{ $dhq['demo']['MSTR1'] ?? '-' }}
                        </td>
                        @endif

                        <td rowspan="{{ $langCount }}" class="px-2 py-2 text-sm border text-center align-middle">
                            {{ number_format($pop2026InThousands, 0) }}
                        </td>

                        @if($isFirstLocation)
                        <td rowspan="{{ $totalRows }}" class="px-2 py-2 text-sm border text-center align-middle">
                            {{ isset($dhq['demo']['LAN1']) ? $dhq['demo']['LAN1'] . '%' : '-' }}
                        </td>
                        @endif

                        <td rowspan="{{ $langCount }}" class="px-2 py-2 text-sm border text-center align-middle">
                            {{ number_format($internetUsersInThousands, 0) }}
                        </td>

                        @endif

                        <td class="px-2 py-2 text-sm border align-middle">
                            <span class="text-gray-800 font-medium">{{ $langName }}</span>
                        </td>

                        <td class="px-2 py-2 text-sm border text-center align-middle bg-indigo-50/30">
                            <input type="radio" name="plan_{{ $loc['city_id'] }}_{{ $langCode }}"
                                wire:model.live="selectedPlans.{{ $loc['city_id'] }}-{{ $langCode }}"
                                value="{{ $loc['city_id'] }}-{{ $langCode }}-prarang"
                                class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        </td>
                        <td class="px-2 py-2 text-sm border text-center align-middle bg-indigo-50/30">
                            <input type="radio" name="plan_{{ $loc['city_id'] }}_{{ $langCode }}"
                                wire:model.live="selectedPlans.{{ $loc['city_id'] }}-{{ $langCode }}"
                                value="{{ $loc['city_id'] }}-{{ $langCode }}-yourwebsite"
                                class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        </td>
                        <td class="px-2 py-2 text-sm border text-center align-middle bg-indigo-50/30">
                            <input type="radio" name="plan_{{ $loc['city_id'] }}_{{ $langCode }}"
                                wire:model.live="selectedPlans.{{ $loc['city_id'] }}-{{ $langCode }}"
                                value="{{ $loc['city_id'] }}-{{ $langCode }}-newwebsite"
                                class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        </td>
                    </tr>
                    @php
                    $firstLang = false;
                    $countWithLanguage++;
                    @endphp
                    @endforeach
                    @php $isFirstLocation = false; @endphp
                    @endforeach

                    @php $srNo++; @endphp
                    @endif
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-100 border-t-2 border-gray-400 font-bold text-gray-800">
                    <tr>
                        <td class="px-2 py-2 border text-left text-sm">Total</td>
                        <td colspan="2">{{ $countWithLanguage }}</td>
                        <td class="px-2 py-2 border text-center text-sm">{{ number_format($totalPop2026, 0) }}</td>
                        <td class="px-2 py-2 border text-center text-sm"></td>
                        <td class="px-2 py-2 border text-center text-sm">{{ number_format($totalInternetUsers, 0) }}
                        </td>

                        <td class="px-2 py-2 border text-center text-sm font-semibold text-gray-700 bg-gray-50">Monthly
                            Hosting Cost</td>
                        <td class="px-2 py-2 border text-center text-sm text-indigo-700 font-bold">₹{{
                            number_format($liteTotal) }}
                        </td>
                        <td class="px-2 py-2 border text-center text-sm text-indigo-700 font-bold">₹{{
                            number_format($plusTotal) }}
                        </td>
                        <td class="px-2 py-2 border text-center text-sm text-indigo-700 font-bold">₹{{
                            number_format($primeTotal) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td class="text-center">
                            {{ number_format($totalInternetUsersper,0) }}%
                            <br>
                            <span class="text-xs">(% of Population 2026)</span>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="mt-4 flex justify-between border-t pt-4">
                <button wire:click="changeStep('back')" wire:loading.attr="disabled" wire:target="changeStep"
                    class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                    <span wire:loading.remove wire:target="changeStep">Back</span>
                    <span wire:loading wire:target="changeStep" class="flex items-center gap-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span>
                </button>
                <div class="flex gap-4">
                    <button wire:click="createShareLink" wire:loading.attr="disabled"
                        class="text-white border border-blue-600 bg-blue-600 hover:bg-blue-500 transition-colors px-6 py-2 rounded-lg font-medium shadow-sm flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                            </path>
                        </svg>
                        <span>Share</span>
                    </button>
                    <!-- Confirm Hosting Button -->
                    <button type="button" @click="showProcessingModal = true"
                        class="bg-indigo-600 hover:bg-indigo-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2">
                        <span>Confirm Hosting</span>
                    </button>
                </div>
                <!-- Processing Modal -->
                <div x-show="showProcessingModal" x-cloak
                    class="fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                    <div class="bg-white p-8 rounded-2xl shadow-2xl flex flex-col items-center max-w-sm w-full mx-4"
                        @click.outside="showProcessingModal = false">
                        <!-- Title -->
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 text-center">Please Note</h3>

                        <!-- Message -->
                        <p class="text-lg text-gray-600 text-center leading-relaxed mb-6">
                            Except for <span class="font-medium text-gray-800">English</span> and
                            <span class="font-medium text-gray-800">Hindi</span>, Prarang requires you to select a
                            minimum of <span class="font-medium text-gray-800">5 cities</span> to enroll for any
                            other
                            language.
                        </p>
                        <style>
                            [x-cloak] {
                                display: none !important;
                            }
                        </style>
                        <!-- Buttons -->
                        <div class="flex gap-3 w-full">
                            <button type="button" @click="showProcessingModal = false"
                                class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition-colors text-sm font-medium">
                                Cancel
                            </button>
                            <button type="button" @click="showProcessingModal = false; $wire.confirmPlanSelection()"
                                class="flex-1 px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition-colors text-sm font-medium">
                                Proceed
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Plan Details Modal (Bootstrap 5) -->
        <div class="modal fade" id="TheseMTw1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="TheseMTw1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="TheseMTw1Label">Plan Inclusions & Deliverables</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-8 pt-6 border-t border-gray-200">

                            <div class="overflow-hidden border border-gray-200 rounded-lg">
                                <table class="inclusions-table">
                                    <thead>
                                        <tr>
                                            <th>Feature</th>
                                            <th>City Lite</th>
                                            <th class="">City Plus </th>
                                            <th>City Prime</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="section-row">
                                            <td colspan="4">Reach & base</td>
                                        </tr>

                                        <tr>
                                            <td>Min. city subscriber base</td>
                                            <td>300+</td>
                                            <td class="featured-col">300+</td>
                                            <td>10,000+</td>
                                        </tr>
                                        <tr>
                                            <td>Hyperlocal reach per post (7 days)</td>
                                            <td>3,000+</td>
                                            <td class="featured-col">3,000+</td>
                                            <td>3,000+</td>
                                        </tr>
                                        <tr>
                                            <td>Total monthly reach</td>
                                            <td>12,000+</td>
                                            <td class="featured-col">45,000+</td>
                                            <td>93,000+</td>
                                        </tr>

                                        <tr class="section-row">
                                            <td colspan="4">Content & posting</td>
                                        </tr>

                                        <tr>
                                            <td>Posts per month</td>
                                            <td>4</td>
                                            <td class="featured-col">15</td>
                                            <td>31</td>
                                        </tr>
                                        <tr>
                                            <td>Monthly posting frequency</td>
                                            <td>Weekly</td>
                                            <td class="featured-col">Alternate day</td>
                                            <td>Daily</td>
                                        </tr>
                                        <tr>
                                            <td>Creative formats included</td>
                                            <td>3 stills, 1 video</td>
                                            <td class="featured-col">13 stills, 2 videos</td>
                                            <td>27 stills, 4 videos</td>
                                        </tr>

                                        <tr class="section-row">
                                            <td colspan="4">Advanced features</td>
                                        </tr>

                                        <tr>
                                            <td>Monthly topic discussion</td>
                                            <td><span class="no">–</span></td>
                                            <td class="featured-col"><span class="no">–</span></td>
                                            <td><span class="yes">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td>City analytics data</td>
                                            <td><span class="no">–</span></td>
                                            <td class="featured-col"><span class="no">–</span></td>
                                            <td><span class="yes">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td>Boost posts – collaboration</td>
                                            <td><span class="no">–</span></td>
                                            <td class="featured-col"><span class="no">–</span></td>
                                            <td><span class="yes">✓</span></td>
                                        </tr>
                                        <tr>
                                            <td>Subscriber meet / research / focus group / product testing</td>
                                            <td><span class="no">–</span></td>
                                            <td class="featured-col"><span class="no">–</span></td>
                                            <td><span class="yes">✓</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @endif

    @if(count($cityData) > 0 && $step == 4)
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold text-red-600 border-b-2 border-red-600 pb-1 inline-block mb-0">
            2.B. Select City Interaction Plans
        </p>
    </div>
    @endsection
    <section class="mb-8">
        <div class="p-2 overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 border-collapse border border-gray-300">
                <thead class="text-xs bg-gray-50 border-b border-gray-300">
                    <tr>
                        <th rowspan="3" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">S. No.
                        </th>
                        <th rowspan="3" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">City
                        </th>
                        <th rowspan="3" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">State
                        </th>
                        <th rowspan="3" class="px-2 py-2 border text-center align-middle font-bold text-gray-800">
                            Selected Host Location</th>
                        <th colspan="6" class="px-2 py-2 border text-center font-bold text-gray-800 bg-green-100">
                            Standard Solutions</th>
                        <th colspan="9" class="px-2 py-2 border text-center font-bold text-gray-800 bg-blue-100">City
                            Interaction Solutions</th>
                    </tr>
                    <tr>
                        <th rowspan="2"
                            class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-green-50">
                            Content<br><span class="font-normal">(Automated Text Headlines)</span></th>
                        <th rowspan="2"
                            class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-green-50">
                            Enrollment<br><span class="font-normal">(City-e-Cards, City Yellow Pages)</span></th>
                        <th rowspan="2"
                            class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-green-50">
                            Planners<br><span class="font-normal">(Market Development, Cyber Risk Analysis)</span></th>
                        <th rowspan="2"
                            class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-green-50">District
                            Analytics<br><span class="font-normal">(Ranks Only)</span></th>
                        <th rowspan="2"
                            class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-green-50">
                            Widgets<br><span class="font-normal">(Time, News, Weather, Maps)</span></th>
                        <th rowspan="2"
                            class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-green-50">Comparison
                            AI</th>

                        <th colspan="3" class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            City Posts</th>

                        <th rowspan="2" class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            City Yellow Pages<br><span class="font-normal">(Digital Marketing)</span></th>
                        <th rowspan="2" class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            City Outdoor Ad Analytics<br><span class="font-normal">(Monthly)</span></th>
                        <th rowspan="2" class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            District Analytics</th>
                        <th rowspan="2" class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            Semiotics</th>
                        <th rowspan="2" class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            Partner Metrics</th>
                    </tr>
                    <tr>
                        <th class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            Weekly<br><span class="font-normal">(₹14,000)</span></th>
                        <th class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-blue-50">Alternate
                            Day<br><span class="font-normal">(₹45,000)</span></th>
                        <th class="px-2 py-2 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            Daily<br><span class="font-normal">(₹5,00,000)</span></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $srNo4 = 1;
                    $weeklyTotal = 0;
                    $alternateDayTotal = 0;
                    $dailyTotal = 0;
                    @endphp
                    @foreach($cityData as $distId => $group)
                    @php
                    $dhq = $group['dhq'];
                    $towns = $group['towns'];
                    $villages = $group['villages'];

                    $cityHasSelectedLangs4 = false;
                    $selectedLangsForCity4 = [];
                    if($dhq && isset($dhq['languages']) && is_array($dhq['languages'])){
                    $topLangs = array_slice($dhq['languages'], 0, 3, true);
                    foreach($topLangs as $langCode => $langData) {
                    if(!empty($selectedLanguages["{$distId}-{$langCode}"])) {
                    $cityHasSelectedLangs4 = true;
                    $selectedLangsForCity4[$langCode] = $langData;
                    }
                    }
                    }
                    @endphp

                    @if($cityHasSelectedLangs4)
                    @php
                    $langCount4 = count($selectedLangsForCity4);
                    $subAlpha4 = 65;
                    $hasDhq4 = !is_null($dhq);
                    $locations4 = [];
                    if($dhq) $locations4[] = $dhq;
                    foreach($towns as $t4) $locations4[] = $t4;
                    foreach($villages as $v4) $locations4[] = $v4;
                    $totalRows4 = count($locations4) * $langCount4;
                    $isFirstLoc4 = true;
                    @endphp

                    @foreach($locations4 as $locIdx4 => $loc4)
                    @php
                    $firstLang4 = true;
                    $locAlpha4 = '';
                    if($locIdx4 > 0 || !$hasDhq4) {
                    $locAlpha4 = ' (' . chr($subAlpha4++) . ')';
                    }
                    @endphp

                    @foreach($selectedLangsForCity4 as $lc4 => $ld4)
                    @php
                    $langName4 = isset($lang_titles[$lc4]) ? $lang_titles[$lc4] : $lc4;
                    $planKey4 = $loc4['city_id'] . '-' . $lc4;
                    $selHosting = $selectedPlans[$planKey4] ?? null;
                    $hostingType4 = null;
                    $hostingLabel4 = '-';
                    $enrollCost4 = 0;
                    if ($selHosting) {
                    if (str_ends_with((string)$selHosting, '-prarang')) {
                    $hostingType4 = 'prarang'; $hostingLabel4 = 'Prarang.in'; $enrollCost4 = 1000;
                    } elseif (str_ends_with((string)$selHosting, '-yourwebsite')) {
                    $hostingType4 = 'yourwebsite'; $hostingLabel4 = 'Your Website'; $enrollCost4 = 2000;
                    } elseif (str_ends_with((string)$selHosting, '-newwebsite')) {
                    $hostingType4 = 'newwebsite'; $hostingLabel4 = 'New Website'; $enrollCost4 = 2000;
                    }
                    }
                    @endphp
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-2 py-2 text-sm border text-center font-medium align-middle">
                            {{ $srNo4 }}{{ $locAlpha4 }} - {{ $langName4 }}
                        </td>
                        @if($firstLang4)
                        <td rowspan="{{ $langCount4 }}"
                            class="px-2 py-2 text-sm border font-semibold text-gray-900 align-middle">
                            {{ $loc4['city_name'] ?? '' }}
                            <br><span class="text-xs font-normal text-gray-500">({{ $loc4['location_type'] === 'City' ?
                                'City' : ($loc4['location_type'] === 'District Capital' ? 'District Capital' :
                                'Village') }})</span>
                        </td>
                        @if($isFirstLoc4)
                        <td rowspan="{{ $totalRows4 }}" class="px-2 py-2 text-sm border align-middle text-center">
                            {{ $dhq['demo']['MSTR1'] ?? '-' }}
                        </td>
                        @endif
                        @endif

                        {{-- Selected Host Location --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle font-medium
                            @if($hostingType4 == 'prarang') text-indigo-700
                            @elseif($hostingType4 == 'yourwebsite') text-green-700
                            @elseif($hostingType4 == 'newwebsite') text-purple-700
                            @else text-gray-400 @endif">
                            {{ $hostingLabel4 }}
                        </td>

                        {{-- Standard Solutions: Content --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4) <span class="text-green-600">✓</span> @else <span
                                class="text-gray-300">-</span> @endif
                        </td>
                        {{-- Enrollment --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-green-50/40">
                            @if($enrollCost4 > 0)
                            <span class="text-green-700 font-semibold">✓ ₹{{ number_format($enrollCost4) }}</span>
                            @else <span class="text-gray-300">-</span> @endif
                        </td>
                        {{-- Planners --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4) <span class="text-green-600">✓</span> @else <span
                                class="text-gray-300">-</span> @endif
                        </td>
                        {{-- District Analytics --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4) <span class="text-green-600">✓</span> @else <span
                                class="text-gray-300">-</span> @endif
                        </td>
                        {{-- Widgets --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4) <span class="text-green-600">✓</span> @else <span
                                class="text-gray-300">-</span> @endif
                        </td>
                        {{-- Comparison AI --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4) <span class="text-green-600">✓</span> @else <span
                                class="text-gray-300">-</span> @endif
                        </td>

                        {{-- City Posts: Weekly --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="radio" name="citypost_{{ $loc4['city_id'] }}_{{ $lc4 }}"
                                wire:model.live="selectedCityPosts.{{ $planKey4 }}" value="{{ $planKey4 }}-weekly"
                                class="w-4 h-4 text-blue-600 cursor-pointer">
                        </td>
                        {{-- City Posts: Alternate Day --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="radio" name="citypost_{{ $loc4['city_id'] }}_{{ $lc4 }}"
                                wire:model.live="selectedCityPosts.{{ $planKey4 }}" value="{{ $planKey4 }}-alternateday"
                                class="w-4 h-4 text-blue-600 cursor-pointer">
                        </td>
                        {{-- City Posts: Daily --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="radio" name="citypost_{{ $loc4['city_id'] }}_{{ $lc4 }}"
                                wire:model.live="selectedCityPosts.{{ $planKey4 }}" value="{{ $planKey4 }}-daily"
                                class="w-4 h-4 text-blue-600 cursor-pointer">
                        </td>
                        {{-- City Yellow Pages --}}
                        {{-- <td class="px-2 py-2 text-xs border text-center align-middle bg-blue-50/30"><span
                                class="text-gray-300">-</span></td> --}}
                        {{-- City Yellow Pages --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="checkbox" wire:model.live="selectedYellowPages.{{ $planKey4 }}" value="50000"
                                class="w-4 h-4 text-blue-600 rounded cursor-pointer">
                        </td>
                        {{-- City Outdoor Ad Analytics --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="checkbox" wire:model.live="selectedOutdoorAds.{{ $planKey4 }}" value="50000"
                                class="w-4 h-4 text-blue-600 rounded cursor-pointer">
                        </td>
                        {{-- District Analytics --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="checkbox" wire:model.live="selectedDistrictAnalytics.{{ $planKey4 }}" value="1"
                                class="w-4 h-4 text-blue-600 rounded cursor-pointer">
                        </td>
                        {{-- Semiotics --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="checkbox" wire:model.live="selectedSemiotics.{{ $planKey4 }}" value="1"
                                class="w-4 h-4 text-blue-600 rounded cursor-pointer">
                        </td>
                        {{-- Partner Metrics --}}
                        <td class="px-2 py-2 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="checkbox" wire:model.live="selectedPartnerMetrics.{{ $planKey4 }}" value="1"
                                class="w-4 h-4 text-blue-600 rounded cursor-pointer">
                        </td>
                    </tr>
                    @php $firstLang4 = false; @endphp
                    @endforeach
                    @php $isFirstLoc4 = false; @endphp
                    @endforeach
                    @php $srNo4++; @endphp
                    @endif
                    @endforeach
                </tbody>
                @php
                $weeklyTotalCalc = collect($selectedCityPosts)->filter(fn($val) => str_ends_with($val,
                '-weekly'))->count() * 14000;
                $alternateDayTotalCalc = collect($selectedCityPosts)->filter(fn($val) => str_ends_with($val,
                '-alternateday'))->count() * 45000;
                $dailyTotalCalc = collect($selectedCityPosts)->filter(fn($val) => str_ends_with($val,
                '-daily'))->count() * 500000;
                $yellowPagesTotalCalc = collect($selectedYellowPages)->filter()->count() * 50000;
                $outdoorAdTotalCalc = collect($selectedOutdoorAds)->filter()->count() * 50000;
                @endphp
                <tfoot class="bg-gray-100 border-t-2 border-gray-400 font-bold text-gray-800">
                    <tr>
                        <td colspan="4" class="px-2 py-2 border text-left text-sm">Total</td>
                        <td colspan="6" class="px-2 py-2 border text-center text-xs text-gray-400">Standard Solutions
                            Included</td>
                        <td class="px-2 py-2 border text-center text-sm text-blue-700">₹{{
                            number_format($weeklyTotalCalc) }}</td>
                        <td class="px-2 py-2 border text-center text-sm text-blue-700">₹{{
                            number_format($alternateDayTotalCalc) }}</td>
                        <td class="px-2 py-2 border text-center text-sm text-blue-700">₹{{
                            number_format($dailyTotalCalc) }}</td>
                        <td class="px-2 py-2 border text-center text-sm text-blue-700">₹{{
                            number_format($yellowPagesTotalCalc) }}</td>
                        <td class="px-2 py-2 border text-center text-sm text-blue-700">₹{{
                            number_format($outdoorAdTotalCalc) }}</td>
                        <td class="px-2 py-2 border text-center text-sm"></td>
                        <td class="px-2 py-2 border text-center text-sm"></td>
                        <td class="px-2 py-2 border text-center text-sm"></td>
                    </tr>
                </tfoot>
            </table>
            <p class="text-xs text-gray-500 mt-2">*Only District Capital pricing included above. Other cities and
                villages within each district expected to be priced similarly. Please reconfirm.</p>

            <div class="mt-4 flex justify-between border-t pt-4">
                <button wire:click="changeStep('back')" wire:loading.attr="disabled" wire:target="changeStep"
                    class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                    <span wire:loading.remove wire:target="changeStep">Back</span>
                    <span wire:loading wire:target="changeStep" class="flex items-center gap-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span>
                </button>
                <div class="flex gap-4">
                    <button wire:click="createShareLink" wire:loading.attr="disabled"
                        class="text-white border border-blue-600 bg-blue-600 hover:bg-blue-500 transition-colors px-6 py-2 rounded-lg font-medium shadow-sm flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                            </path>
                        </svg>
                        <span>Share</span>
                    </button>
                    <button wire:click="confirmCityPostsSelection"
                        class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2">
                        <span>Confirm Plan</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    @endif
</x-partners.city-village-frame>
