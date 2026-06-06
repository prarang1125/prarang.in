<x-partners.city-village-frame :step="$step">


    @if(count($cityData) > 0 && $step == 2)
    <style>
        .pf-header p {
            color: #FFC000;
            border-color: #FFC000;
        }
    </style>
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold  border-b-2 pb-1 inline-block mb-0">
            2. Market Size & Language
        </p>
        <p class="text-sm text-black m-0">
            (Please Select ✔️ Language(s) for each Capital)
        </p>
    </div>
    @endsection
    <section class="mb-8">
        <div class=" p-2 overflow-x-auto">
            <table class="compact-table w-full text-sm text-left text-gray-500 border-collapse">
                <thead class="text-xs text-gray-700  bg-gray-50 border-b">
                    <tr>
                        <th class="px-1 py-0.5 text-xs border text-center">Sr.</th>
                        <th class="px-1 py-0.5 text-xs border text-center">City Name</th>
                        <th class="px-1 py-0.5 text-xs border text-center">State</th>
                        <th class="px-1 py-0.5 text-xs border text-center">
                            Population 2011

                            <br> (in '000)
                        </th>
                        <th class="px-1 py-0.5 text-xs border text-center">
                            Population 2026

                            <br> (in '000)
                        </th>
                        <th class="px-1 py-0.5 text-xs border text-center">
                            Literacy (%)

                        </th>
                        <th class="px-1 py-0.5 text-xs border text-center">
                            Internet Users

                            <br> (in '000)
                        </th>
                        <th class="px-1 py-0.5 text-xs border text-center">
                            Facebook Users (%)

                        </th>
                        <th class="px-1 py-0.5 text-xs border text-center">
                            Instagram Users (%)

                        </th>
                        <th class="px-1 py-0.5 text-xs border text-center">
                            LinkedIn Users (%)

                        </th>
                        <th class="px-1 py-0.5 text-xs border text-center">
                            X (Twitter) Users (%)

                        </th>
                        <th class="px-1 py-0.5 text-xs border text-center hover:text-blue-800 hover:font-bold cursor-pointer text-blue-600"
                            onclick="window.open('/cirus','_blank')">
                            Cyber Risk Index

                        </th>
                        <th class="px-1 py-0.5 text-xs border text-center">
                            Top 3 Languages &nbsp;<span class="text-blue-600"><a href="#language-star">*</a></span><br>

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
                    <tr class="bg-white border-b hover:bg-gray-50 odd:bg-gray-50 text-gray-900">
                        <td class="px-1 py-0.5 text-sm border text-center font-bold text-black">{{ $sr }}</td>
                        <td class="px-1 py-0.5 text-sm border font-bold text-black">{{ $dhq['city_name'] ?? '' }}
                            <br><span class="text-xs font-normal">(District Capital)</span>
                        </td>

                        <td rowspan="{{ $rowspan }}"
                            class="px-1 py-0.5 text-sm border font-medium text-black align-middle text-center">{{
                            $dhq['demo']['MSTR1'] ?? '-' }}</td>

                        <td class="px-1 py-0.5 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $dhq['demo']['MSTR3'] ?? 0) / 1000) }}</td>
                        <td class="px-1 py-0.5 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $dhq['internet']['city_population'] ?? 0) / 1000) }}</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">{{
                            isset($dhq['demo']['LAN1']) ? round((float)($dhq['demo']['LAN1'] ?? 0), 1) . '%' : '-' }}
                        </td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">{{
                            round((float)($dhq['internet']['internet_users'] ?? 0)) }}</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">{{
                            isset($dhq['internet']['facebook_users']) ? round((float)($dhq['internet']['facebook_users']
                            ?? 0)) . '%' : '-' }}</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">{{
                            isset($dhq['internet']['instagram_users']) ?
                            round((float)($dhq['internet']['instagram_users'] ?? 0)) . '%' : '-' }}</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">{{
                            isset($dhq['internet']['linkedin_users']) ? round((float)($dhq['internet']['linkedin_users']
                            ?? 0)) . '%' : '-' }}</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">{{
                            isset($dhq['internet']['twitter_users']) ? round((float)($dhq['internet']['twitter_users']
                            ?? 0)) . '%' : '-' }}</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black hover:text-blue-600 hover:font-bold cursor-pointer"
                            onclick="window.open('/cirus','_blank')">
                            {{ round((float)($cirusData[$dhq['city_id']]['risk_index'] ?? 0),1) }}
                        </td>

                        <td rowspan="{{ $rowspan }}" class="px-1 py-0.5 text-sm border min-w-[250px] align-middle">
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
                    <tr class="bg-white border-b hover:bg-gray-50 odd:bg-gray-50 text-gray-900">
                        <td class="px-1 py-0.5 text-sm border text-center font-bold text-black">{{ $sr }}.{{
                            chr($subCharCode++) }}</td>
                        <td class="px-1 py-0.5 text-sm border font-normal text-black">{{ $town['city_name'] ?? '' }}
                            <br><span class="text-xs font-normal">(City)</span>
                        </td>
                        @if(!$hasDhq && $firstRow)
                        <td rowspan="{{ $rowspan }}"
                            class="px-1 py-0.5 text-sm border font-medium text-black align-middle text-center">-</td>
                        @endif
                        <td class="px-1 py-0.5 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $town['demo']['MSTR3'] ?? 0) / 1000) }}</td>
                        <td class="px-1 py-0.5 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $town['internet']['city_population'] ?? 0) / 1000) }}</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">{{
                            round((float)($town['internet']['internet_users'] ?? 0)) }}</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        @if(!$hasDhq && $firstRow)
                        <td rowspan="{{ $rowspan }}" class="px-1 py-0.5 text-sm border min-w-[250px] align-middle">-
                        </td>
                        @endif
                    </tr>
                    @php $firstRow = false; @endphp
                    @endforeach

                    @foreach($villages as $village)
                    <tr class="bg-white border-b hover:bg-gray-50 odd:bg-gray-50 text-gray-900">
                        <td class="px-1 py-0.5 text-sm border text-center font-bold text-black">{{ $sr }}.{{
                            chr($subCharCode++) }}</td>
                        <td class="px-1 py-0.5 text-sm border font-normal text-black">{{ $village['city_name'] ?? '' }}
                            <br><span class="text-xs font-normal">(Village)</span>
                        </td>
                        @if(!$hasDhq && $firstRow)
                        <td rowspan="{{ $rowspan }}"
                            class="px-1 py-0.5 text-sm border font-medium text-black align-middle text-center">-</td>
                        @endif
                        <td class="px-1 py-0.5 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $village['demo']['MSTR3'] ?? 0) / 1000) }}</td>
                        <td class="px-1 py-0.5 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $village['internet']['city_population'] ?? 0) / 1000) }}</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">{{
                            round((float)($village['internet']['internet_users'] ?? 0)) }}</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        <td class="px-1 py-0.5 text-sm border text-center font-medium text-black">-</td>
                        @if(!$hasDhq && $firstRow)
                        <td rowspan="{{ $rowspan }}" class="px-1 py-0.5 text-sm border min-w-[250px] align-middle">-
                        </td>
                        @endif
                    </tr>
                    @php $firstRow = false; @endphp
                    @endforeach

                    @php $sr++; @endphp
                    @endforeach
                </tbody>
            </table>


        </div>
    </section>
    <div class="p-1 border border-gray-200 rounded-md text-justify">
        <h4 class="text-sm font-bold mb-1 ps-1">Note:</h4>
        <ol class="list-decimal pl-5 space-y-1 text-xs">
            <li>Internet Users data for cities and villages is available but all other metrics (Literacy, Social Media
                %, Cyber Risk Index) are District Capital level only.</li>
            <li>Language profile is based on the District Capital's recorded data. Only Mother Tongue is considered for
                all languages except English, where multilingual netizens (2nd + 3rd known language) have also been
                included.</li>
        </ol>
    </div>
    @section('p-footer')
    <div class="flex justify-between ">
        <button wire:click="changeStep('back')" wire:loading.attr="disabled" wire:target="changeStep"
            class="bg-gray-600 hover:bg-gray-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex flex-col items-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
            <span wire:loading.remove wire:target="changeStep"><i class="bi bi-arrow-left"></i> Back</span>
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
        <button wire:click="createShareLink" wire:loading.attr="disabled" wire:target="createShareLink"
            class="text-white   border-blue-600 bg-blue-600 hover:bg-blue-500 transition-colors px-6 py-2 rounded-lg font-medium shadow-sm flex items-center justify-center gap-2">
            <span wire:loading.remove wire:target="createShareLink" class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                    </path>
                </svg>
                <span>Share</span>
            </span>
            <span wire:loading wire:target="createShareLink" class="flex items-center gap-2">
                <svg class="animate-spin w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
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

            <!-- Trigger Modal Button -->
            <button type="button" data-bs-toggle="modal" data-bs-target="#languageAlertModal"
                class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex flex-col items-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                <span>Next <i class="bi bi-arrow-right"></i></span>
            </button>

            <!-- Alert Modal (moved to p-modals) -->
        </div>
    </div>
    @endsection

    @section('p-modals')
    <div class="modal fade" id="languageAlertModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pt-2 pb-4">
                    <p class="mb-0 text-gray-800 text-lg">We recommend selecting at least 5 Knowledge Web Geographies for each language, for optimal budgeting.</p>
                </div>
                <div class="modal-footer border-0 justify-content-center gap-3">
                    <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition-colors" data-bs-dismiss="modal">Revise plan</button>
                    <button type="button" x-on:click="window.scrollTo({ top: 30, behavior: 'smooth' })"
                        wire:click="confirmLanguageSelection" data-bs-dismiss="modal" wire:loading.attr="disabled"
                        wire:target="confirmLanguageSelection" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center gap-2">
                        <span wire:loading.remove wire:target="confirmLanguageSelection">Next</span>
                        <span wire:loading wire:target="confirmLanguageSelection" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @endif

    @if(count($cityData) > 0 && $step == 3)
    <style>
        .pf-header p {
            color: #92D050;
            border-color: #92D050;
        }
    </style>
    @section('p-header')

    <div class="text-center space-y-2">
        <p class="text-xl font-semibold border-b-2 pb-1 inline-block mb-0">
            3. Select Web Hosting Location for each KW Geography
        </p>
    </div>
    @endsection
    <section class="mb-8" x-data="{ showPlanDetails: false, showProcessingModal: false }">

        <div class="p-2 overflow-x-auto">
            <table class="compact-table w-full text-sm text-left text-gray-700 border-collapse border border-gray-300"
                x-data="{ showSocial: false }" :class="showSocial ? 'show-social' : ''">
                <thead class="text-xs bg-gray-50 border-b border-gray-300">
                    <tr>
                        <th rowspan="2" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">S.
                            No.
                        </th>
                        <th rowspan="2" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">City
                        </th>
                        <th rowspan="2" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">
                            State
                        </th>
                        <th rowspan="2" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">
                            Population (2026)<br>('000)

                        </th>
                        <th rowspan="2" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">
                            Literacy (%)

                        </th>
                        <th rowspan="2" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">
                            Internet Users<br>('000)
                        </th>
                        <th rowspan="2" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">
                            Selected Language
                        </th>
                        <th colspan="3" class="px-1 py-0.5 border text-center font-bold text-gray-800 bg-indigo-100">
                            Select Host Location</th>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-1 py-0.5 border text-center font-bold text-gray-800 bg-indigo-50">
                            Prarang.in<br>
                            <span
                                class="text-[10px] text-gray-500 font-normal normal-case block mt-1 leading-tight">Subdomain<br>(e.g.
                                prarang.in/partner/yourco)</span>
                        </th>
                        <th class="px-1 py-0.5 border text-center font-bold text-gray-800 bg-indigo-50">
                            Your Website<br>
                            <span
                                class="text-[10px] text-gray-500 font-normal normal-case block mt-1 leading-tight">Subdomain</span>
                        </th>
                        <th class="px-1 py-0.5 border text-center font-bold text-gray-800 bg-indigo-50">
                            New Website<br>
                            <span
                                class="text-[10px] text-gray-500 font-normal normal-case block mt-1 leading-tight">Homepage</span>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center"></td>

                        <td></td>
                        @foreach($pricing['base'] as $key => $value)
                        <td class="text-center text-indigo-700 font-semibold text-xs">₹{{ $value['monthly'] }}</td>
                        @endforeach

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

                    foreach($cityData as $distId => $group) {
                    $dhq = $group['dhq'];
                    $towns = $group['towns'] ?? [];
                    $villages = $group['villages'] ?? [];
                    $hasSubLocations = (count($towns) > 0 || count($villages) > 0);

                    $selectedLangsForCity = [];
                    if($dhq && isset($dhq['languages']) && is_array($dhq['languages'])){
                    $topLangs = array_slice($dhq['languages'], 0, 3, true);
                    foreach($topLangs as $langCode => $langData) {
                    if(!empty($selectedLanguages["{$distId}-{$langCode}"])) {
                    $selectedLangsForCity[$langCode] = $langData;
                    }
                    }
                    }

                    if(count($selectedLangsForCity) > 0) {
                    $locations = [];
                    if($dhq) $locations[] = $dhq;
                    foreach($towns as $town) $locations[] = $town;
                    foreach($villages as $village) $locations[] = $village;

                    foreach($locations as $loc) {
                    $locId = $loc['city_id'];
                    $locType = $loc['location_type'] ?? '';
                    $isFree = ($locType === 'District Capital' && $hasSubLocations);

                    foreach($selectedLangsForCity as $langCode => $langData) {
                    $planKey = "{$locId}-{$langCode}";
                    $planValue = $selectedPlans[$planKey] ?? "{$locId}-{$langCode}-prarang";

                    if (str_ends_with($planValue, '-prarang')) {
                    $liteTotal += $isFree ? 0 : $pricing['base']['Prarang.in']['monthly'];
                    } elseif (str_ends_with($planValue, '-yourwebsite')) {
                    $plusTotal += $pricing['base']['Your Website']['monthly'];
                    } elseif (str_ends_with($planValue, '-newwebsite')) {
                    $primeTotal += $pricing['base']['New Website']['monthly'];
                    }
                    }
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
                    <tr class="bg-white border-b hover:bg-gray-50 odd:bg-gray-50">
                        @if($firstLang)
                        <td rowspan="{{ $langCount }}"
                            class="px-1 py-0.5 text-sm border text-center font-medium align-middle">
                            {{ $srNo }}@if($locIdx > 0 || !$hasDhq).{{ chr($subAlphaCharCode++) }}
                            @endif
                        </td>

                        <td rowspan="{{ $langCount }}"
                            class="px-1 py-0.5 text-sm border font-semibold text-gray-900 align-middle">
                            {{ $loc['city_name'] ?? '' }} <br><span class="text-xs font-normal">({{
                                $loc['location_type'] === 'City' ? 'City' : ($loc['location_type'] ===
                                'District Capital' ? 'District Capital' : 'Village') }})</span>
                        </td>

                        @if($isFirstLocation)
                        <td rowspan="{{ $totalRows }}" class="px-1 py-0.5 text-sm border align-middle text-center">
                            {{ $dhq['demo']['MSTR1'] ?? '-' }}
                        </td>
                        @endif

                        <td rowspan="{{ $langCount }}" class="px-1 py-0.5 text-sm border text-center align-middle">
                            {{ number_format($pop2026InThousands, 0) }}
                        </td>

                        @if($isFirstLocation)
                        <td rowspan="{{ $totalRows }}" class="px-1 py-0.5 text-sm border text-center align-middle">
                            {{ isset($dhq['demo']['LAN1']) ? $dhq['demo']['LAN1'] . '%' : '-' }}
                        </td>
                        @endif

                        <td rowspan="{{ $langCount }}" class="px-1 py-0.5 text-sm border text-center align-middle">
                            {{ number_format($internetUsersInThousands, 0) }}
                        </td>

                        @endif

                        <td class="px-1 py-0.5 text-sm border align-middle">
                            <span class="text-gray-800 font-medium">{{ $langName }}</span>
                        </td>

                        @php
                        $isFreeDistrictCapital = ($loc['location_type'] === 'District Capital' && (count($towns) > 0 ||
                        count($villages) > 0));
                        @endphp
                        <td class="px-1 py-0.5 text-sm border text-center align-middle bg-indigo-50/30">
                            <div class="flex flex-col items-center justify-center">
                                <input type="radio" name="plan_{{ $loc['city_id'] }}_{{ $langCode }}"
                                    wire:model.live="selectedPlans.{{ $loc['city_id'] }}-{{ $langCode }}"
                                    value="{{ $loc['city_id'] }}-{{ $langCode }}-prarang"
                                    class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                                @if($isFreeDistrictCapital)
                                <span class="text-[10px] text-green-600 font-bold mt-0.5">Free</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-1 py-0.5 text-sm border text-center align-middle bg-indigo-50/30">
                            <div class="flex flex-col items-center justify-center">
                                <input type="radio" name="plan_{{ $loc['city_id'] }}_{{ $langCode }}"
                                    wire:model.live="selectedPlans.{{ $loc['city_id'] }}-{{ $langCode }}"
                                    value="{{ $loc['city_id'] }}-{{ $langCode }}-yourwebsite"
                                    class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                            </div>
                        </td>
                        <td class="px-1 py-0.5 text-sm border text-center align-middle bg-indigo-50/30">
                            <div class="flex flex-col items-center justify-center">
                                <input type="radio" name="plan_{{ $loc['city_id'] }}_{{ $langCode }}"
                                    wire:model.live="selectedPlans.{{ $loc['city_id'] }}-{{ $langCode }}"
                                    value="{{ $loc['city_id'] }}-{{ $langCode }}-newwebsite"
                                    class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                            </div>
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
                        <td class="px-1 py-0.5 border text-left text-sm">Total</td>
                        <td colspan="2">{{ $countWithLanguage }}</td>
                        <td class="px-1 py-0.5 border text-center text-sm">{{ number_format($totalPop2026, 0) }}</td>
                        <td class="px-1 py-0.5 border text-center text-sm"></td>
                        <td class="px-1 py-0.5 border text-center text-sm">{{ number_format($totalInternetUsers, 0) }}
                        </td>

                        <td class="px-1 py-0.5 border text-center text-sm font-semibold text-gray-700 bg-gray-50">
                            Monthly
                            Hosting Cost</td>
                        <td class="px-1 py-0.5 border text-center text-sm text-indigo-700 font-bold">₹{{
                            number_format($liteTotal) }}
                        </td>
                        <td class="px-1 py-0.5 border text-center text-sm text-indigo-700 font-bold">₹{{
                            number_format($plusTotal) }}
                        </td>
                        <td class="px-1 py-0.5 border text-center text-sm text-indigo-700 font-bold">₹{{
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

            @section('p-footer')
            <div class="flex justify-between">
                <button wire:click="changeStep('back')" wire:loading.attr="disabled" wire:target="changeStep"
                    class="bg-gray-600 hover:bg-gray-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                    <span wire:loading.remove wire:target="changeStep"><i class="bi bi-arrow-left mr-2"></i> Back</span>
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
                <button wire:click="createShareLink" wire:loading.attr="disabled" wire:target="createShareLink"
                    class="text-white   border-blue-600 bg-blue-600 hover:bg-blue-500 transition-colors px-6 py-2 rounded-lg font-medium shadow-sm flex items-center justify-center gap-2">
                    <span wire:loading.remove wire:target="createShareLink" class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                            </path>
                        </svg>
                        <span>Share</span>
                    </span>
                    <span wire:loading wire:target="createShareLink" class="flex items-center gap-2">
                        <svg class="animate-spin w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
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

                    <!-- Confirm Hosting Button -->
                    <button type="button" wire:click="confirmPlanSelection" wire:loading.attr="disabled"
                        x-on:click="window.scrollTo({ top: 30, behavior: 'smooth' })"
                        class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2 min-w-[160px]">
                        <span wire:loading.remove wire:target="confirmPlanSelection">
                            Next <i class="bi bi-arrow-right ms-2"></i>
                        </span>
                        <span wire:loading wire:target="confirmPlanSelection" class="flex items-center gap-2">
                            <svg class="animate-spin w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>

                        </span>
                    </button>
                </div>

            </div>
            @endsection

        </div>

    </section>
    @endif

    @if(count($cityData) > 0 && $step == 4)

    <style>
        /* Paragraph */
        .pf-header p {
            color: #00B050;
            border-color: #00B050;
        }
    </style>
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold pb-1 border-b-2 inline-block mb-0">
            4. Go Beyond Standard Solution & activate KW-Interaction <br>Solution (Including Social Media Marketing)
        </p>
    </div>
    @endsection
    <section class="mb-8">
        <div class="p-2 overflow-x-auto">
            <table class="compact-table w-full text-sm text-left text-gray-700 border-collapse border border-gray-300">
                <thead class="text-xs bg-gray-50 border-b border-gray-300">
                    <tr>
                        <th rowspan="3" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">S.
                            No.
                        </th>
                        <th rowspan="3" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">City
                        </th>
                        <th rowspan="3" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">
                            State
                        </th>
                        <th rowspan="3" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">
                            Selected Languages</th>
                        <th rowspan="3" class="px-1 py-0.5 border text-center align-middle font-bold text-gray-800">
                            Selected Host Location</th>
                        <th colspan="6" class="px-1 py-0.5 border text-center font-bold text-gray-800 bg-green-100">
                            Standard Solutions</th>
                        <th colspan="9" class="px-1 py-0.5 border text-center font-bold text-gray-800 bg-blue-100">KW (City)-Interaction Solution*</th>
                    </tr>
                    <tr>
                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-green-50">
                            Content<br><span class="font-normal">(Automated Text Headlines)</span></th>
                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-green-50">
                            Enrollment<br><span class="font-normal">(City-e-Cards, City Yellow Pages)</span></th>
                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-green-50">
                            Planners<br><span class="font-normal">(Market Development, Cyber Risk Analysis)</span></th>
                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-green-50">District
                            Analytics<br><span class="font-normal">(Ranks Only)</span></th>
                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-green-50">
                            Widgets<br><span class="font-normal">(Time, News, Weather, Maps)</span></th>
                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-green-50">
                            Comparison
                            AI</th>

                        <th colspan="3"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            City Posts</th>

                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            City Yellow Pages<br><span class="font-normal">(Digital Marketing)</span></th>
                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            City Outdoor Ad Analytics<br><span class="font-normal">(Monthly)</span></th>
                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            District Analytics</th>
                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            Semiotics</th>
                        <th rowspan="2"
                            class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            Partner Metrics</th>
                    </tr>
                    <tr>
                        <th class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            Weekly<br><span class="font-normal">(₹{{
                                number_format($pricing['optional_solutions']['Weekly Posts']['monthly']) }})</span>
                        </th>
                        <th class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-blue-50">Alternate
                            Day<br><span class="font-normal">(₹{{
                                number_format($pricing['optional_solutions']['Alternate Day Posts']['monthly'])
                                }})</span></th>
                        <th class="px-1 py-0.5 border text-center font-bold text-xs text-gray-800 bg-blue-50">
                            Daily<br><span class="font-normal">(₹{{ number_format($pricing['optional_solutions']['Daily Posts']['monthly']) }})</span>
                        </th>
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

                    $validLocations4 = [];
                    $totalRows4 = 0;
                    $hasDhq4 = !is_null($dhq);

                    if ($cityHasSelectedLangs4) {
                    $tempLocations = [];
                    if($dhq) $tempLocations[] = $dhq;
                    foreach($towns as $t4) $tempLocations[] = $t4;
                    foreach($villages as $v4) $tempLocations[] = $v4;

                    foreach($tempLocations as $tLoc4) {
                    $langsWithPlan = [];
                    foreach($selectedLangsForCity4 as $lc4 => $ld4) {
                    $planKey = $tLoc4['city_id'] . '-' . $lc4;
                    // ONLY ADD TO STEP 4 IF A PLAN WAS SELECTED IN STEP 3!
                    if (!empty($selectedPlans[$planKey])) {
                    $langsWithPlan[$lc4] = $ld4;
                    }
                    }
                    if (count($langsWithPlan) > 0) {
                    $validLocations4[] = [
                    'loc' => $tLoc4,
                    'langs' => $langsWithPlan
                    ];
                    $totalRows4 += count($langsWithPlan);
                    }
                    }
                    }
                    @endphp

                    @if($totalRows4 > 0)
                    @php
                    $subAlpha4 = 65;
                    $isFirstLoc4 = true;
                    @endphp

                    @foreach($validLocations4 as $locIdx4 => $item4)
                    @php
                    $loc4 = $item4['loc'];
                    $langsWithPlan = $item4['langs'];
                    $langCount4 = count($langsWithPlan);

                    $firstLang4 = true;
                    $locAlpha4 = '';
                    if($locIdx4 > 0 || !$hasDhq4) {
                    $locAlpha4 = '.' . chr($subAlpha4++);
                    }
                    @endphp

                    @foreach($langsWithPlan as $lc4 => $ld4)
                    @php
                    $langName4 = isset($lang_titles[$lc4]) ? $lang_titles[$lc4] : $lc4;
                    $planKey4 = $loc4['city_id'] . '-' . $lc4;
                    $selHosting = $selectedPlans[$planKey4] ?? null;
                    $hostingType4 = null;
                    $hostingLabel4 = '-';
                    $enrollCost4 = 0;
                    $hasSubLocations4 = (count($towns) > 0 || count($villages) > 0);
                    $isFreeDistrictCapital4 = ($loc4['location_type'] === 'District Capital' && $hasSubLocations4);
                    if ($selHosting) {
                    if (str_ends_with((string)$selHosting, '-prarang')) {
                    $hostingType4 = 'prarang';
                    $hostingLabel4 = 'Prarang.in';
                    $enrollCost4 = $isFreeDistrictCapital4 ? 0 : $pricing['base']['Prarang.in']['monthly'];;
                    } elseif (str_ends_with((string)$selHosting, '-yourwebsite')) {
                    $hostingType4 = 'yourwebsite';
                    $hostingLabel4 = 'Your Website';
                    $enrollCost4 = $pricing['base']['Your Website']['monthly'];
                    } elseif (str_ends_with((string)$selHosting, '-newwebsite')) {
                    $hostingType4 = 'newwebsite';
                    $hostingLabel4 = 'New Website';
                    $enrollCost4 = $pricing['base']['New Website']['monthly'];
                    }
                    }
                    @endphp
                    <tr class="bg-white border-b hover:bg-gray-50 odd:bg-gray-50">
                        <td class="px-1 py-0.5 text-sm border font-medium align-middle text-start">
                            {{ $srNo4 }}{{ $locAlpha4 }}
                        </td>


                        @if($firstLang4)
                        <td rowspan="{{ $langCount4 }}"
                            class="px-1 py-0.5 text-sm border font-semibold text-gray-900 align-middle">
                            {{ $loc4['city_name'] ?? '' }}
                            <br><span class="text-xs font-normal text-gray-500">({{ $loc4['location_type'] === 'City' ?
                                'City' : ($loc4['location_type'] === 'District Capital' ? 'District Capital' :
                                'Village') }})</span>
                        </td>
                        @if($isFirstLoc4)
                        <td rowspan="{{ $totalRows4 }}" class="px-1 py-0.5 text-sm border align-middle text-center">
                            {{ $dhq['demo']['MSTR1'] ?? '-' }}
                        </td>
                        @endif
                        @endif
                        <td class="px-1 py-0.5 text-xs border text-center align-middle font-medium">
                            {{ $langName4 }}
                        </td>
                        {{-- Selected Host Location --}}
                        <td class="px-1 py-0.5 text-xs border text-center align-middle font-medium
                            @if($hostingType4 == 'prarang') text-indigo-700
                            @elseif($hostingType4 == 'yourwebsite') text-green-700
                            @elseif($hostingType4 == 'newwebsite') text-purple-700
                            @else text-gray-400 @endif">
                            {{ $hostingLabel4 }}
                        </td>

                        {{-- Standard Solutions: Content --}}
                        {{-- <td class="px-1 py-0.5 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4) <span class="text-green-600">✓</span> @else <span
                                class="text-gray-300">-</span> @endif
                        </td> --}}
                        {{-- Enrollment --}}
                        <td colspan="6" class="px-1 py-0.5 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4)
                            @if($enrollCost4 == 0)
                            <span class="text-green-700 font-semibold">✓ ₹0</span>
                            @else
                            <span class="text-green-700 font-semibold">✓ ₹{{ number_format($enrollCost4) }}</span>
                            @endif
                            @else
                            <span class="text-gray-300">-</span>
                            @endif
                        </td>
                        {{-- Planners --}}
                        {{-- <td class="px-1 py-0.5 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4) <span class="text-green-600">✓</span> @else <span
                                class="text-gray-300">-</span> @endif
                        </td>
                        {{-- District Analytics --}}
                        {{-- <td class="px-1 py-0.5 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4) <span class="text-green-600">✓</span> @else <span
                                class="text-gray-300">-</span> @endif
                        </td> --}}
                        {{-- Widgets --}}
                        {{-- <td class="px-1 py-0.5 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4) <span class="text-green-600">✓</span> @else <span
                                class="text-gray-300">-</span> @endif
                        </td> --}}
                        {{-- Comparison AI --}}
                        {{-- <td class="px-1 py-0.5 text-xs border text-center align-middle bg-green-50/40">
                            @if($hostingType4) <span class="text-green-600">✓</span> @else <span
                                class="text-gray-300">-</span> @endif
                        </td> --}}

                        {{-- City Posts: Weekly --}}
                        <td class="px-1 py-0.5 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="radio" name="citypost_{{ $loc4['city_id'] }}_{{ $lc4 }}"
                                wire:model.live="selectedCityPosts.{{ $planKey4 }}" value="{{ $planKey4 }}-weekly"
                                wire:change="applyPlanDefaults('{{ $planKey4 }}', 'weekly')"
                                class="w-4 h-4 text-blue-600 cursor-pointer">
                        </td>
                        {{-- City Posts: Alternate Day --}}
                        <td class="px-1 py-0.5 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="radio" name="citypost_{{ $loc4['city_id'] }}_{{ $lc4 }}"
                                wire:model.live="selectedCityPosts.{{ $planKey4 }}" value="{{ $planKey4 }}-alternateday"
                                wire:change="applyPlanDefaults('{{ $planKey4 }}', 'alternateday')"
                                class="w-4 h-4 text-blue-600 cursor-pointer">
                        </td>
                        {{-- City Posts: Daily --}}
                        <td class="px-1 py-0.5 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="radio" name="citypost_{{ $loc4['city_id'] }}_{{ $lc4 }}"
                                wire:model.live="selectedCityPosts.{{ $planKey4 }}" value="{{ $planKey4 }}-daily"
                                wire:change="applyPlanDefaults('{{ $planKey4 }}', 'daily')"
                                class="w-4 h-4 text-blue-600 cursor-pointer">
                        </td>
                        {{-- City Yellow Pages --}}
                        {{-- <td class="px-1 py-0.5 text-xs border text-center align-middle bg-blue-50/30"><span
                                class="text-gray-300">-</span></td> --}}
                        {{-- City Yellow Pages --}}
                        <td class="px-1 py-0.5 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="checkbox" wire:model.live="selectedYellowPages.{{ $planKey4 }}" value="50000"
                                class="w-4 h-4 text-blue-600 rounded cursor-pointer">
                        </td>
                        {{-- City Outdoor Ad Analytics --}}
                        <td class="px-1 py-0.5 text-xs border text-center align-middle bg-blue-50/30">
                            <input type="checkbox" wire:model.live="selectedOutdoorAds.{{ $planKey4 }}" value="50000"
                                class="w-4 h-4 text-blue-600 rounded cursor-pointer">
                        </td>
                        {{-- District Analytics --}}
                        <td class="px-1 py-0.5 text-xs border text-center align-middle bg-blue-50/30">
                            <input disabled type="checkbox" wire:model="selectedDistrictAnalytics.{{ $planKey4 }}"
                                value="1" class="w-4 h-4 text-blue-600 rounded cursor-pointer">
                        </td>
                        {{-- Semiotics --}}
                        <td class="px-1 py-0.5 text-xs border text-center align-middle bg-blue-50/30">
                            <input disabled type="checkbox" wire:model.live="selectedSemiotics.{{ $planKey4 }}"
                                value="1" class="w-4 h-4 text-blue-600 rounded cursor-pointer">
                        </td>
                        {{-- Partner Metrics --}}
                        <td class="px-1 py-0.5 text-xs border text-center align-middle bg-blue-50/30">
                            <input disabled type="checkbox" wire:model.live="selectedPartnerMetrics.{{ $planKey4 }}"
                                value="1" class="w-4 h-4 text-blue-600 rounded cursor-pointer">
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
                '-weekly'))->count() * $pricing['optional_solutions']['Weekly Posts']['monthly'];
                $alternateDayTotalCalc = collect($selectedCityPosts)->filter(fn($val) => str_ends_with($val,
                '-alternateday'))->count() * $pricing['optional_solutions']['Alternate Day Posts']['monthly'];
                $dailyTotalCalc = collect($selectedCityPosts)->filter(fn($val) => str_ends_with($val,
                '-daily'))->count() * $pricing['optional_solutions']['Daily Posts']['monthly'];
                $yellowPagesTotalCalc = collect($selectedYellowPages)->filter()->count() * $pricing['optional_solutions']['City Yellow Pages (DM)']['monthly'];
                $outdoorAdTotalCalc = collect($selectedOutdoorAds)->filter()->count() * $pricing['optional_solutions']['City Outdoor Ad Analytics']['monthly'];

                $totalRowsCount = 0;
                $totalHostingCost = 0;
                foreach($cityData as $distId => $group) {
                $dhq = $group['dhq'];
                $towns = $group['towns'] ?? [];
                $villages = $group['villages'] ?? [];
                $hasSubLocations = (count($towns) > 0 || count($villages) > 0);

                if($dhq && isset($dhq['languages']) && is_array($dhq['languages'])){
                $topLangs = array_slice($dhq['languages'], 0, 3, true);
                foreach($topLangs as $langCode => $langData) {
                if(!empty($selectedLanguages["{$distId}-{$langCode}"])) {
                $tempLocations = [];
                if($dhq) $tempLocations[] = $dhq;
                foreach($towns as $t) $tempLocations[] = $t;
                foreach($villages as $v) $tempLocations[] = $v;
                foreach($tempLocations as $tLoc) {
                $planKey = $tLoc['city_id'] . '-' . $langCode;
                if (!empty($selectedPlans[$planKey])) {
                $totalRowsCount++;
                $selHosting = $selectedPlans[$planKey];
                $isFree = ($tLoc['location_type'] === 'District Capital' && $hasSubLocations);

                if (str_ends_with((string)$selHosting, '-prarang')) {
                $totalHostingCost += $isFree ? 0 : $pricing['base']['Prarang.in']['monthly'];
                } elseif (str_ends_with((string)$selHosting, '-yourwebsite') || str_ends_with((string)$selHosting,
                '-newwebsite')) {
                $totalHostingCost += $pricing['base']['Your Website']['monthly'];
                }
                }
                }
                }
                }
                }
                }
                @endphp
                <tfoot class="bg-gray-100 border-t-2 border-gray-400 font-bold text-gray-800">
                    <tr>
                        <td colspan="3" class="px-1 py-0.5 border text-left text-sm">Total: </td>
                        <td colspan="2" class="px-1 py-0.5 border text-left text-sm">{{ $totalRowsCount }} </td>
                        <td colspan="6" class="px-1 py-0.5 border text-center text-sm text-green-700">₹{{
                            number_format($totalHostingCost) }}</td>

                        <td class="px-1 py-0.5 border text-center text-sm text-blue-700">₹{{
                            number_format($weeklyTotalCalc) }}</td>
                        <td class="px-1 py-0.5 border text-center text-sm text-blue-700">₹{{
                            number_format($alternateDayTotalCalc) }}</td>
                        <td class="px-1 py-0.5 border text-center text-sm text-blue-700">₹{{
                            number_format($dailyTotalCalc) }}</td>
                        <td class="px-1 py-0.5 border text-center text-sm text-blue-700">₹{{
                            number_format($yellowPagesTotalCalc) }}</td>
                        <td class="px-1 py-0.5 border text-center text-sm text-blue-700">₹{{
                            number_format($outdoorAdTotalCalc) }}</td>
                        <td class="px-1 py-0.5 border text-center text-sm"></td>
                        <td class="px-1 py-0.5 border text-center text-sm"></td>
                        <td class="px-1 py-0.5 border text-center text-sm"></td>
                    </tr>
                </tfoot>
            </table>
            <p class="text-xs text-gray-500 mt-2">*Only District-Capital pricing for City-Interaction Solutions included above. Other Cities (Non-Capital) and Villages Interaction pricing are expected to be similar.</p>

            @section('p-footer')
            <div class="flex justify-between">
                <button wire:click="changeStep('back')" wire:loading.attr="disabled" wire:target="changeStep"
                    class="bg-gray-600 hover:bg-gray-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                    <span wire:loading.remove wire:target="changeStep"><i class="bi bi-arrow-left mr-2"></i> Back</span>
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
                <button wire:click="createShareLink" wire:loading.attr="disabled" wire:target="createShareLink"
                    class="text-white   border-blue-600 bg-blue-600 hover:bg-blue-500 transition-colors px-6 py-2 rounded-lg font-medium shadow-sm flex items-center justify-center gap-2">
                    <span wire:loading.remove wire:target="createShareLink" class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                            </path>
                        </svg>
                        <span>Share</span>
                    </span>
                    <span wire:loading wire:target="createShareLink" class="flex items-center gap-2">
                        <svg class="animate-spin w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
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

                    <button wire:click="confirmCityPostsSelection" wire:loading.attr="disabled"
                        x-on:click="window.scrollTo({ top: 30, behavior: 'smooth' })"
                        class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2 min-w-[160px]">
                        <span wire:loading.remove wire:target="confirmCityPostsSelection">
                            Next <i class="bi bi-arrow-right ms-2"></i>
                        </span>
                        <span wire:loading wire:target="confirmCityPostsSelection" class="flex items-center gap-2">
                            <svg class="animate-spin w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
            @endsection
        </div>
    </section>
    @endif
    <!-- Share Modal (Bootstrap 5) -->
    @if($shareUrl)
    <div class="modal fade show" tabindex="-1"
        style="z-index: 99999; display: block; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="bg-white p-8 rounded-2xl shadow-2xl flex flex-col items-center max-w-md w-full mx-auto"
                    x-data="{ copied: false }" @click.away="$wire.set('shareUrl', null)">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Share your Plan</h3>
                    <p class="text-gray-500 text-center text-sm mb-6">Copy the link below to share this planner
                        configuration
                        with others.</p>

                    <div class="w-full flex items-center gap-2 bg-gray-50 p-3 rounded-xl border border-gray-200 mb-6">
                        <input type="text" readonly value="{{ $shareUrl }}" x-ref="shareInput"
                            class="bg-transparent border-none focus:ring-0 text-sm flex-1 text-gray-600 font-medium">
                        <button @click="
                                $refs.shareInput.select();
                                document.execCommand('copy');
                                copied = true;
                                setTimeout(() => copied = false, 2000);
                            " :class="copied ? 'bg-green-600' : 'bg-blue-600'"
                            class="text-white px-4 py-2 rounded-lg text-sm font-bold transition-all active:scale-95 min-w-[80px]">
                            <span x-show="!copied">Copy</span>
                            <span x-show="copied" x-cloak>Copied!</span>
                        </button>
                    </div>
                    @php
                    $shareTitle = urlencode('India Knowledge Webs for Partnerships');
                    @endphp

                    <div class="mt-6 flex items-center justify-center gap-3">

                        <!-- WhatsApp -->
                        <a href="https://wa.me/?text={{ $shareTitle }}%20{{ urlencode($shareUrl) }}"
                            target="_blank"
                            class="flex h-11 w-11 items-center justify-center rounded-full bg-green-100 text-green-600 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:text-white">
                            <i class="bi bi-whatsapp text-xl"></i>
                        </a>

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}"
                            target="_blank"
                            class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 text-blue-600 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:bg-blue-600 hover:text-white">
                            <i class="bi bi-facebook text-xl"></i>
                        </a>

                        <!-- X -->
                        <a href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&url={{ urlencode($shareUrl) }}"
                            target="_blank"
                            class="flex h-11 w-11 items-center justify-center rounded-full bg-gray-100 text-gray-800 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:bg-black hover:text-white">
                            <i class="bi bi-twitter-x text-xl"></i>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($shareUrl) }}"
                            target="_blank"
                            class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 text-black shadow-sm transition-all duration-200 hover:-translate-y-1 hover:bg-sky-700 hover:text-white">
                            <i class="bi bi-linkedin text-xl"></i>
                        </a>



                    </div>
                    <button wire:click="$set('shareUrl', null)"
                        class="text-gray-400 hover:text-gray-600 text-sm mt-2 font-medium transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Scroll containers — 3x wider min-width */
        .overflow-y-auto.max-h-\[80vh\] {
            min-width: 0;
        }

        /* Custom scrollbar — 15px wide */
        .custom-scrollbar::-webkit-scrollbar {
            width: 18px;
            height: 15px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #9ca3af;
            border-radius: 10px;
            border: 3px solid #f3f4f6;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }

        .custom-scrollbar::-webkit-scrollbar-corner {
            background: #f3f4f6;
        }
    </style>
</x-partners.city-village-frame>
