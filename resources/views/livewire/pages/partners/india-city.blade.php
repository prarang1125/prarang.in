<div x-data="{ step: @entangle('step') }"
    x-init="$watch('step', value => window.scrollTo({top: 100, behavior: 'smooth'}))">
    <style>
        .grid .w-full a {
            text-decoration: none;
        }

        /* Hover */
        .container section .hover\:shadow-md {
            flex-direction: column;
            padding-top: 2px !important;
            padding-bottom: 2px !important;
        }

        /* Transition all */
        .container section .transition-all {
            padding-top: 4px !important;
            padding-bottom: 2px !important;
            max-width: 149px;
            min-height: 82px;
        }

        /* Division */
        .items-stretch .transition-all .sm\:text-base {
            font-size: 12px;
            width: 20px;
            height: 20px;
        }

        /* Transition all */
        .container section .items-stretch .transition-all {
            width: 0px !important;
        }

        /* Hover */
        .container section .hover\:shadow-md {
            cursor: pointer;
        }

        /* Overflow auto */
        .md\:flex-row .w-full .overflow-y-auto {
            overflow: scroll !important;
            max-height: 68vh !important;
        }

        /* Flex col */
        .mb-8 .mx-auto .md\:flex-row>.flex-col {
            background-color: #efeff0;
        }

        .md\:flex-row .relative input[type=text] {
            width: 437px;
        }

        /* Transition all */
        .mb-5 .items-stretch .transition-all {
            max-width: 215px;
        }

        /* Flex col */
        .container div .mb-8 .overflow-x-auto .text-sm tbody .bg-white .border .flex-col {
            width: 100% !important;
        }

        /* Border */
        .overflow-x-auto .border:nth-child(13) {
            padding-top: 2px !important;
            padding-right: 1px !important;
            padding-left: 7px !important;
            padding-bottom: 5px !important;
        }

        /* Font medium */
        .overflow-x-auto .w-fit .font-medium {
            font-size: 13px;
        }

        /* Input */
        .container div .mb-8 .overflow-x-auto .text-sm tbody .bg-white .border .flex-col .w-fit input[type=checkbox] {
            width: 16px !important;
        }

        /* Label */
        .overflow-x-auto tbody label {
            display: grid;
        }

        /* Label */
        .container div .mb-8 .overflow-x-auto .text-sm tbody .bg-white .border .flex-col label {
            grid-template-columns: 8% auto auto !important;
        }

        /* Overflow auto */
        .container div .mb-8 .overflow-x-auto {
            grid-template-columns: 8% auto auto;
        }

        /* Small Tag */
        .container div small:nth-child(3) {
            font-size: 11px;
            color: #505457;
        }

        /* Small Tag */
        .md\:flex-row .text-md small {
            font-size: 13px;
        }

        /* Heading */
        .md\:flex-row .w-full h5 {
            font-size: 16px;
            font-weight: 600;
        }

        /* Social columns toggle for Step 3 table */
        .social-col {
            display: none !important;
        }

        .show-social .social-col {
            display: table-cell !important;
        }

        /* Source tooltip */
        .src-tooltip {
            position: relative;
            display: inline-block;
            vertical-align: middle;
        }

        .src-tooltip .src-tooltip-box {
            display: none;
            position: absolute;
            bottom: calc(100% + 6px);
            left: 50%;
            transform: translateX(-50%);
            background: #1f2937;
            color: #fff;
            font-size: 11px;
            font-weight: 400;
            white-space: normal;
            min-width: 200px;
            max-width: 200px;
            width: max-content;
            padding: 7px 12px;
            border-radius: 4px;
            z-index: 9999;
            pointer-events: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
            line-height: 1.4;
        }

        .src-tooltip .src-tooltip-box::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            /* transform: translateX(-50%); */
            border: 5px solid transparent;
            border-top-color: #1f2937;
        }

        .src-tooltip:hover .src-tooltip-box {
            display: block;
        }
    </style>
    <style>
        .inclusions-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            border: 1px solid #e5e7eb;
        }

        .inclusions-table thead tr {
            background: #f9fafb;
        }

        .inclusions-table th {
            padding: 10px 12px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            border: 1px solid #e5e7eb;
        }

        .inclusions-table th:first-child {
            width: 40%;
        }

        .inclusions-table th.featured {
            color: #1d4ed8;
            background: #eff6ff;
        }

        .inclusions-table td {
            padding: 8px 12px;
            font-size: 13px;
            color: #4b5563;
            border: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        .inclusions-table td:first-child {
            color: #1f2937;
            font-weight: 500;
        }

        /* Striped rows */
        .inclusions-table tbody tr:nth-child(even) {
            background-color: #fcfcfd;
        }

        .inclusions-table tr:hover td {
            background-color: #f3f4f6;
        }

        .inclusions-table .section-row td {
            background: #f3f4f6;
            font-weight: 700;
            color: #111827;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.025em;
        }

        .plan-badge {
            display: inline-block;
            font-size: 10px;
            font-weight: 500;
            background: #e0f2fe;
            color: #0369a1;
            padding: 2px 8px;
            border-radius: 20px;
            margin-left: 6px;
            vertical-align: middle;
        }

        .yes {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            background: #dcfce7;
            color: #166534;
            border-radius: 50%;
            font-size: 12px;
        }

        .no {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            background: #f3f4f6;
            color: #9ca3af;
            border-radius: 50%;
            font-size: 14px;
        }

        .featured-col {
            background: rgba(29, 78, 216, 0.02) !important;
        }
    </style>
    <style>
        /* Transition all */
        .container div .transition-all {
            max-width: 221px !important;
        }

        /* Font bold */
        .overflow-hidden tbody .font-bold {
            font-weight: 400;
        }

        /* Font medium */
        .overflow-x-auto tbody .font-medium {
            text-align: center;
        }

        /* Flex col */
        .overflow-x-auto tbody .flex-col {
            justify-content: flex-start;
            align-items: flex-start;
        }

        /* Font medium */
        .overflow-x-auto .w-fit .font-medium {
            text-align: left;
            padding-left: 8px;
        }

        /* Paragraph */
        .border-b .justify-start p {
            text-align: left;
            /* transform: translatex(0px) translatey(0px); */
            margin-bottom: 7px;
        }

        /* Font medium */
        /* .container div .font-medium {
            visibility: hidden;
        } */
    </style>
    <section class="mb-3">

        <div
            class="flex flex-row w-full justify-center items-stretch gap-2 sm:gap-3 px-4 max-w-5xl mx-auto print:hidden">
            <!-- Step 1 -->
            <div
                class="flex-1 flex flex-col justify-center items-center py-4 px-2 rounded-xl transition-all duration-300 h-full {{ $step >= 1 ? 'font-bold text-gray-800 bg-white border-2 border-yellow-500 shadow-md' : 'font-semibold text-gray-600 bg-white border-2 border-blue-400 hover:border-yellow-400 hover:shadow-md' }}">
                <div
                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center font-bold mb-2 sm:mb-3 shadow-sm text-sm sm:text-base border {{ $step >= 1  ? 'bg-yellow-100 text-yellow-600 border-yellow-300' : 'bg-blue-50 text-blue-500 border-blue-200' }}">
                    1</div>
                <div class="text-xs sm:text-sm text-center leading-tight">
                    <span class="block">Digital Marketing</span>
                    <span class="block mt-1">Plan</span>
                </div>
            </div>

            <div
                class="flex-shrink-0 flex flex-col justify-center {{ $step >= 1 ? 'text-yellow-500' : 'text-blue-400' }}">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>

            <!-- Step 2 -->
            <div
                class="flex-1 flex flex-col justify-center items-center py-4 px-2 rounded-xl transition-all duration-300 h-full {{ $step >= 4 ? 'font-bold text-gray-800 bg-white border-2 border-yellow-500 shadow-md' : 'font-semibold text-gray-600 bg-white border-2 border-blue-400 hover:border-yellow-400 hover:shadow-md' }}">
                <div
                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center font-bold mb-2 sm:mb-3 shadow-sm text-sm sm:text-base border {{ $step >= 4 ? 'bg-yellow-100 text-yellow-600 border-yellow-300' : 'bg-blue-50 text-blue-500 border-blue-200' }}">
                    2</div>
                <div class="text-xs sm:text-sm text-center leading-tight">
                    <span class="block">Digital Marketing</span>
                    <span class="block mt-1">Budget</span>
                </div>
            </div>

            <div
                class="flex-shrink-0 flex flex-col justify-center {{ $step >= 4 ? 'text-yellow-500' : 'text-blue-400' }}">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>

            <!-- Step 3 -->
            <div
                class="flex-1 flex flex-col justify-center items-center py-4 px-2 rounded-xl transition-all duration-300 h-full {{ $step >= 5 ? 'font-bold text-gray-800 bg-white border-2 border-yellow-500 shadow-md' : 'font-semibold text-gray-600 bg-white border-2 border-blue-400 hover:border-yellow-400 hover:shadow-md' }}">
                <div
                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center font-bold mb-2 sm:mb-3 shadow-sm text-sm sm:text-base border {{ $step >= 5 ? 'bg-yellow-100 text-yellow-600 border-yellow-300' : 'bg-blue-50 text-blue-500 border-blue-200' }}">
                    3</div>
                <div class="text-xs sm:text-sm text-center leading-tight">
                    <span class="block">Enroll</span>
                </div>
            </div>

            <div
                class="flex-shrink-0 flex flex-col justify-center {{ $step > 5 ? 'text-yellow-500' : 'text-blue-400' }}">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>

            <!-- Step 4 -->
            <div
                class="flex-1 flex flex-col justify-center items-center py-4 px-2 rounded-xl transition-all duration-300 h-full {{ $step >= 5 ? 'font-bold text-gray-800 bg-white border-2 border-yellow-500 shadow-md' : 'font-semibold text-gray-600 bg-white border-2 border-blue-400 hover:border-yellow-400 hover:shadow-md' }}">
                <div
                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center font-bold mb-2 sm:mb-3 shadow-sm text-sm sm:text-base border {{ $step > 5 ? 'bg-yellow-100 text-yellow-600 border-yellow-300' : 'bg-blue-50 text-blue-500 border-blue-200' }}">
                    4</div>
                <div class="text-xs sm:text-sm text-center leading-tight">
                    <span class="block">Act</span>
                </div>
            </div>




        </div>
        {{-- <div class="flex w-full justify-center">
            <p class="text-center text-gray-800 text-sm mb-1 font-bold mt-1">Four Steps to go Live.</p>
        </div> --}}
    </section>
    @if($step == 1)
    <section class="mb-8">
        <!-- CTA Block Component -->
        @php $totalSelectedCities = collect($selectedCities)->sum(fn($c) => count($c)); @endphp
        <div class="bg-white rounded-2xl p-4 shadow-lg flex flex-col">
            <!-- Header with Confirm Button -->
            <div class="flex justify-center items-center shrink-0 mb-3 border-b border-gray-100 pb-3">
                <div class="flex flex-col justify-center items-center">
                    <h4 class="font-semibold text-xl text-gray-800 mb-2">1 (A). Digital Marketing Planner</h4>
                    <h6 class="font-normal text-sm">Select Capitals (Country/State/District)</h6>
                    <span class="text-black font-semibold text-sm">Cities > 30,000 Netizens (Literate, Web-Enabled in
                        One
                        Language)</span>
                </div>
            </div>

            <!-- Content Area -->
            <div class="flex flex-col md:flex-row gap-4">

                <!-- Left column: States vertical tabs & Cities list -->
                <div class="w-full md:w-2/3 flex flex-row gap-2">

                    <!-- Vertical tabs for states -->
                    <div class="w-1/3 flex flex-col gap-1 overflow-y-auto max-h-[80vh] pr-1 custom-scrollbar">
                        @foreach($states as $state)
                        <button wire:key="state-{{ $state->id }}"
                            wire:click="selectState('{{ $state->id }}', '{{ addslashes($state->name) }}')"
                            class="text-left px-3 py-2 rounded-lg transition-colors font-medium text-sm {{ $selectedState == $state->id ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-gray-100' }}">
                            {{ $state->name }}
                        </button>
                        @endforeach
                    </div>

                    <!-- Cities checkboxes -->
                    <div class="w-2/3 flex flex-col overflow-y-auto max-h-[80vh] pl-2 custom-scrollbar"
                        x-data="{ search: '' }" wire:key="cities-list-{{ $selectedState }}">
                        <div class="sticky top-0 bg-white z-10 pb-2">
                            <div class="flex justify-between">
                                <h5 class=" text-gray-800 py-1 text-md">
                                    {!! $selectedStateName ? ' Capitals <br><small>(Country/State/District) </small>'
                                    :
                                    'Select
                                    a State'
                                    !!}
                                </h5>
                                <div class="flex justify-end pe-4 text-sm">Count > 30,000 Cities : {{ count($cities) }}
                                </div>
                            </div>
                            @if(count($cities) > 0)
                            <div class="relative mt-1">
                                <input x-model="search" type="text" placeholder="Search city..."
                                    class="w-full pl-8 pr-3 py-1.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:bg-white transition-colors">
                                <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            @endif
                        </div>

                        @if(count($cities) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 pb-2">
                            @foreach($cities as $city)
                            @php
                            $isSelected = isset($selectedCities[$selectedStateName][$city->id]);
                            $isDisabled = $totalSelectedCities >= 25 && !$isSelected;
                            @endphp
                            <label
                                x-show="search === '' || '{{ strtolower(addslashes($city->name)) }}'.includes(search.toLowerCase())"
                                wire:key="city-{{ $selectedState }}-{{ $city->id }}"
                                class="flex items-center gap-2 p-2 rounded-lg transition-colors
                                    {{ $isSelected ? 'bg-blue-50 text-blue-700' : ($isDisabled ? 'opacity-40 cursor-not-allowed text-gray-400' : 'hover:bg-gray-50 text-gray-700 cursor-pointer') }}">
                                <input type="checkbox" @if(!$isDisabled)
                                    wire:click="toggleCity('{{ $city->id }}', '{{ addslashes($city->name) }}')" @endif
                                    class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500 {{ $isDisabled ? 'cursor-not-allowed' : 'cursor-pointer' }}"
                                    {{ $isSelected ? 'checked' : '' }} {{ $isDisabled ? 'disabled' : '' }}>
                                <span class="text-sm font-medium leading-tight truncate" title="{{ $city->name }}">
                                    {{ $city->name }}
                                </span>
                            </label>
                            @endforeach
                        </div>
                        @elseif($selectedState)
                        <div class="flex flex-col items-center justify-center py-8 text-gray-400">
                            <span class="text-sm italic">No district capitals found.</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Right column: Selected Cities Stream -->
                <div class="w-full md:w-1/3 bg-gray-50 rounded-xl p-3 flex flex-col max-h-[80vh]">
                    <h4 class="font-bold text-gray-800 mb-3 flex items-center justify-between shrink-0">
                        <div class="flex items-center gap-2">
                            <span class="text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-sm">Selected Cities</span>
                        </div>
                        @php $totalSelectedCities = collect($selectedCities)->sum(fn($c) => count($c)); @endphp
                        <span
                            class="text-xs py-0.5 px-2 rounded-full font-bold {{ $totalSelectedCities >= 25 ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-800' }}">
                            {{ $totalSelectedCities }} / 25
                        </span>
                    </h4>
                    @if($totalSelectedCities >= 25)
                    <div
                        class="mb-2 shrink-0 flex items-center gap-1.5 text-xs font-semibold text-red-600 bg-red-50 border border-red-200 px-3 py-1.5 rounded-lg">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Maximum 25 cities reached. Deselect a city to add another.
                    </div>
                    @endif

                    <div class="overflow-y-auto flex-1 custom-scrollbar pr-1">
                        @forelse($selectedCities as $sName => $sCities)
                        <div class="mb-3 last:mb-0">
                            <h6 class="font-bold text-gray-700 text-xs mb-1.5 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                {{ $sName }}
                            </h6>
                            <div class="flex flex-col gap-1 pl-3">
                                @foreach($sCities as $cId => $cName)
                                <div wire:key="selected-city-{{ $sName }}-{{ $cId }}"
                                    class="group flex items-center justify-between text-sm bg-white px-2 py-1.5 rounded-md shadow-sm transition-colors">
                                    <span class="text-gray-700 truncate" title="{{ $cName }}">{{ $cName }}</span>
                                    <button wire:click="removeCity('{{ addslashes($sName) }}', '{{ $cId }}')"
                                        class="text-gray-400 hover:text-red-500 transition-colors p-0.5 rounded focus:outline-none"
                                        title="Remove {{ $cName }}">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @empty
                        <div class="flex flex-col items-center justify-center h-full text-gray-400 gap-2">
                            <span class="text-sm font-medium">No cities selected</span>
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>

            <div class="flex  justify-between border-t pt-4 mt-2 gap-4">
                <button onclick="window.open('/webs/filter/cities','_blank')"
                    class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex flex-col disabled:opacity-70 disabled:cursor-not-allowed text-sm">
                    List of India Cities <br><small>Including < 30,000 Netizens</small>
                </button>
                <button wire:click="confirmSelection" wire:loading.attr="disabled" wire:target="confirmSelection"
                    class="h-full bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex flex-col items-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                    <span wire:loading.remove wire:target="confirmSelection">Confirm</span>
                    <span wire:loading wire:target="confirmSelection" class="flex items-center gap-2">
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
    </section>
    @endif

    @if(count($cityData) > 0 && $step == 2)
    <section class="mb-8">

        <div class="bg-white rounded-2xl p-4 shadow-lg max-w-full mx-auto overflow-x-auto">
            <div class="flex justify-center items-center shrink-0 mb-3 border-b border-gray-100 pb-3">
                <div class="flex flex-col justify-center items-center">
                    <h4 class="font-semibold text-xl text-gray-800 mb-2">1 (B). Digital Marketing Planner</h4>
                    <h6 class="font-normal text-sm">Select at least 1 Language (Script) for each City.</h6>

                </div>
            </div>
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
                        <th class="px-2 py-1 text-xs border text-center hover:text-blue-600 hover:font-bold cursor-pointer"
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
                            Top 3 Languages <br>
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
                    @foreach($cityData as $index => $city)
                    <tr class="bg-white border-b hover:bg-gray-50 text-gray-900">
                        <td class="px-2 py-1 text-sm border text-center font-bold text-black">{{ $index + 1 }}</td>
                        <td class="px-2 py-1 text-sm border font-bold text-black">{{ $city['city_name'] ?? '' }}
                        </td>
                        <td class="px-2 py-1 text-sm border font-medium text-black">{{ $city['demo']['MSTR1'] }}
                        </td>
                        <td class="px-2 py-1 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $city['demo']['MSTR3'] ?? 0) / 1000) }}
                        </td>
                        <td class="px-2 py-1 text-sm border font-medium text-black">{{ round((int)str_replace(',', '',
                            $city['internet']['city_population'] ?? 0) / 1000) }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            round((float)($city['demo']['LAN1'] ?? 0), 1) }}%</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            round((float)($city['internet']['internet_users'] ?? 0)) }}</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            round((float)($city['internet']['facebook_users'] ?? 0)) }}%</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            round((float)($city['internet']['instagram_users'] ?? 0)) }}%</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            round((float)($city['internet']['linkedin_users'] ?? 0)) }}%</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black">{{
                            round((float)($city['internet']['twitter_users'] ?? 0)) }}%</td>
                        <td class="px-2 py-1 text-sm border text-center font-medium text-black  hover:text-blue-600 hover:font-bold cursor-pointer"
                            onclick="window.open('/cirus','_blank')">
                            {{
                            round((float)($cirusData[$city['city_id']]['risk_index'] ?? 0),1) }}</td>
                        <td class="px-2 py-1 text-sm border min-w-[250px]">
                            @if(isset($city['languages']) && is_array($city['languages']))
                            @php
                            $topLangs = array_slice($city['languages'], 0, 3, true);
                            @endphp
                            <div class="flex flex-col gap-2">
                                @foreach($topLangs as $langCode => $langData)
                                @php
                                $langName = isset($lang_titles[$langCode]) ? $lang_titles[$langCode] : $langCode;
                                @endphp
                                <label class="flex items-center gap-2 cursor-pointer w-fit">
                                    <input type="checkbox" wire:key="city-{{$city['city_id']}}-{{$langCode}}"
                                        wire:model="selectedLanguages.{{ $city['city_id'] }}-{{ $langCode }}"
                                        value="{{ $city['city_id'] }}-{{ $langCode }}"
                                        class="w-4 h-4 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 cursor-pointer">
                                    <span class="text-sm text-gray-700 font-medium">{{ $langName }} <span
                                            class="text-xs text-gray-500 font-normal">({{
                                            number_format($langData['percentage'],1)
                                            }}%)</span></span>
                                </label>
                                @endforeach
                            </div>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
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
    </section>
    @endif

    @if(count($cityData) > 0 && $step == 3)
    <section class="mb-8" x-data="{ showPlanDetails: false }">

        <div class="bg-white rounded-2xl p-4 shadow-lg max-w-full mx-auto overflow-x-auto">
            <div class="flex justify-center items-center shrink-0 mb-3 border-b border-gray-100 pb-3">
                <div class="flex flex-col justify-center items-center">
                    <h4 class="font-semibold text-xl text-gray-800 mb-2">1 (C). Digital Marketing Planner</h4>
                    <h6 class="font-normal text-sm">Pick just one plan for each city - language combination.</h6>

                </div>
            </div>
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
                        <th rowspan="2"
                            class="social-col px-2 py-2 border text-center align-middle font-bold text-gray-800 bg-blue-50">
                            FB (%)
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
                        <th rowspan="2"
                            class="social-col px-2 py-2 border text-center align-middle font-bold text-gray-800 bg-blue-50">
                            Instagram (%)
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
                        <th rowspan="2"
                            class="social-col px-2 py-2 border text-center align-middle font-bold text-gray-800 bg-blue-50">
                            LinkedIn (%)
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
                        <th rowspan="2"
                            class="social-col px-2 py-2 border text-center align-middle font-bold text-gray-800 bg-blue-50">
                            X (Twitter) (%)
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
                        <th colspan="3" class="px-2 py-2 border text-center font-bold text-gray-800 bg-gray-100">Monthly
                            Charges</th>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-2 border text-center font-bold text-gray-800">
                            City Lite<br>
                            <span
                                class="text-[10px] text-gray-500 font-normal normal-case block mt-1 leading-tight">12,000+
                                Monthly Reach<br>4 Posts / Month</span>
                        </th>
                        <th class="px-2 py-2 border text-center font-bold text-gray-800">
                            City Plus<br>
                            <span
                                class="text-[10px] text-gray-500 font-normal normal-case block mt-1 leading-tight">45,000+
                                Monthly Reach<br>15 Posts / Month</span>
                        </th>
                        <th class="px-2 py-2 border text-center font-bold text-gray-800">
                            City Prime<br>
                            <span
                                class="text-[10px] text-gray-500 font-normal normal-case block mt-1 leading-tight">93,000+
                                Monthly Reach<br>31 Posts / Month</span>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center"></td>
                        <td class="social-col text-center text-[10px] text-blue-600 bg-blue-50 py-1 font-semibold"
                            colspan="4">Social Media Penetration (%)</td>
                        <td></td>
                        <td class="text-center">Rs. 14,000</td>
                        <td class="text-center">Rs. 45,000</td>
                        <td class="text-center">Rs. 5,00,000</td>
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
                    if (str_ends_with($planValue, '-Lite')) {
                    $liteTotal += 14000;
                    } elseif (str_ends_with($planValue, '-plus')) {
                    $plusTotal += 45000;
                    } elseif (str_ends_with($planValue, '-prime')) {
                    $primeTotal += 500000;
                    }
                    }
                    }
                    @endphp
                    @foreach($cityData as $index => $city)
                    @php
                    $cityHasSelectedLangs = false;
                    $selectedLangsForCity = [];
                    if(isset($city['languages']) && is_array($city['languages'])){
                    $topLangs = array_slice($city['languages'], 0, 3, true);
                    foreach($topLangs as $langCode => $langData) {
                    if(!empty($selectedLanguages["{$city['city_id']}-{$langCode}"])) {
                    $cityHasSelectedLangs = true;
                    $selectedLangsForCity[$langCode] = $langData;
                    }
                    }
                    }
                    @endphp

                    @if($cityHasSelectedLangs)
                    @php
                    $rowspan = count($selectedLangsForCity);
                    $firstLang = true;
                    $subAlphaCharCode = 65; // ASCII 'A'

                    // Stats calculation
                    $pop2026Raw = str_replace(',', '', $city['demo']['MSTR3'] ?? '0');
                    $pop2026 = (float)$pop2026Raw;
                    // Formatting to '000s
                    $pop2026InThousands = $pop2026 / 1000;
                    $internetUsersInThousands = (float)($city['internet']['internet_users'] ?? 0);

                    $totalPop2026 += $pop2026InThousands;
                    $totalInternetUsers += $internetUsersInThousands;

                    $totalInternetUsersper =($totalInternetUsers/$totalPop2026)*100;

                    @endphp

                    @foreach($selectedLangsForCity as $langCode => $langData)
                    @php
                    $langName = isset($lang_titles[$langCode]) ? $lang_titles[$langCode] : $langCode;
                    @endphp
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-2 py-2 text-sm border text-center font-medium align-middle">
                            {{ $srNo }} @if($rowspan > 1) ({{ chr($subAlphaCharCode++) }}) @endif
                        </td>

                        @if($firstLang)
                        <td rowspan="{{ $rowspan }}"
                            class="px-2 py-2 text-sm border font-semibold text-gray-900 align-middle">
                            {{ $city['city_name'] ?? '' }}
                        </td>
                        <td rowspan="{{ $rowspan }}" class="px-2 py-2 text-sm border align-middle">
                            {{ $city['demo']['MSTR1'] ?? '' }}
                        </td>
                        <td rowspan="{{ $rowspan }}" class="px-2 py-2 text-sm border text-center align-middle">
                            {{ number_format($pop2026InThousands, 0) }}
                        </td>
                        <td rowspan="{{ $rowspan }}" class="px-2 py-2 text-sm border text-center align-middle">
                            {{ $city['demo']['LAN1'] ?? '' }}%
                        </td>
                        <td rowspan="{{ $rowspan }}" class="px-2 py-2 text-sm border text-center align-middle">
                            {{ number_format($internetUsersInThousands, 0) }}
                        </td>
                        <td rowspan="{{ $rowspan }}"
                            class="social-col px-2 py-2 text-sm border text-center align-middle bg-blue-50/30">
                            {{ round((float)($city['internet']['facebook_users'] ?? 0)) }}%
                        </td>
                        <td rowspan="{{ $rowspan }}"
                            class="social-col px-2 py-2 text-sm border text-center align-middle bg-blue-50/30">
                            {{ round((float)($city['internet']['instagram_users'] ?? 0)) }}%
                        </td>
                        <td rowspan="{{ $rowspan }}"
                            class="social-col px-2 py-2 text-sm border text-center align-middle bg-blue-50/30">
                            {{ round((float)($city['internet']['linkedin_users'] ?? 0)) }}%
                        </td>
                        <td rowspan="{{ $rowspan }}"
                            class="social-col px-2 py-2 text-sm border text-center align-middle bg-blue-50/30">
                            {{ round((float)($city['internet']['twitter_users'] ?? 0)) }}%
                        </td>
                        @endif

                        <td class="px-2 py-2 text-sm border align-middle">
                            <span class="text-gray-800">{{ $langName }}</span> <span class="text-xs text-gray-500">({{
                                number_format($langData['percentage'],1) }}%)</span>
                        </td>

                        <td class="px-2 py-2 text-sm border text-center align-middle">
                            <input type="radio" name="plan_{{ $city['city_id'] }}_{{ $langCode }}"
                                wire:model.live="selectedPlans.{{ $city['city_id'] }}-{{ $langCode }}"
                                value="{{ $city['city_id'] }}-{{ $langCode }}-Lite"
                                class="w-5 h-5 text-blue-600 focus:ring-blue-500 cursor-pointer">
                        </td>
                        <td class="px-2 py-2 text-sm border text-center align-middle">
                            <input type="radio" name="plan_{{ $city['city_id'] }}_{{ $langCode }}"
                                wire:model.live="selectedPlans.{{ $city['city_id'] }}-{{ $langCode }}"
                                value="{{ $city['city_id'] }}-{{ $langCode }}-plus"
                                class="w-5 h-5 text-blue-600 focus:ring-blue-500 cursor-pointer">
                        </td>
                        <td class="px-2 py-2 text-sm border text-center align-middle">
                            <input type="radio" name="plan_{{ $city['city_id'] }}_{{ $langCode }}"
                                wire:model.live="selectedPlans.{{ $city['city_id'] }}-{{ $langCode }}"
                                value="{{ $city['city_id'] }}-{{ $langCode }}-prime"
                                class="w-5 h-5 text-blue-600 focus:ring-blue-500 cursor-pointer">
                        </td>
                    </tr>
                    @php
                    $firstLang = false;
                    $countWithLanguage++;
                    @endphp
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
                        <td class="social-col px-2 py-2 border text-center text-sm text-gray-400 text-xs">FB</td>
                        <td class="social-col px-2 py-2 border text-center text-sm text-gray-400 text-xs">Insta</td>
                        <td class="social-col px-2 py-2 border text-center text-sm text-gray-400 text-xs">LinkedIn</td>
                        <td class="social-col px-2 py-2 border text-center text-sm text-gray-400 text-xs">Twitter</td>
                        <td class="px-2 py-2 border text-center text-sm bg-gray-50"></td>
                        <td class="px-2 py-2 border text-center text-sm text-blue-700">₹{{ number_format($liteTotal) }}
                        </td>
                        <td class="px-2 py-2 border text-center text-sm text-blue-700">₹{{ number_format($plusTotal) }}
                        </td>
                        <td class="px-2 py-2 border text-center text-sm text-blue-700">₹{{ number_format($primeTotal) }}
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
                <button wire:click="confirmPlanSelection" wire:loading.attr="disabled"
                    wire:target="confirmPlanSelection"
                    class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                    <span wire:loading.remove wire:target="confirmPlanSelection">Confirm Plan</span>
                    <span wire:loading wire:target="confirmPlanSelection" class="flex items-center gap-2">
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
        </div>
    </section>
    @endif

    @if($step == 4)
    <section class="mb-12 flex flex-col items-center">
        <!-- Budget Plan Document -->
        <div id="invoice-section"
            class="w-full mx-auto max-w-4xl border border-gray-300 p-4 mb-4 shadow-lg bg-white rounded-lg">
            <!-- Header -->
            <div
                class="mb-4 pb-2 border-b border-gray-200 text-center relative flex justify-center items-center min-h-[40px]">
                <img src="https://www.prarang.in/home-assets/image/logo.png"
                    class="print-logo absolute left-0 h-10 object-contain" style="display: none;" alt="Prarang">
                <h4 class="font-bold text-lg text-gray-800">2. Digital Marketing Budget Estimation</h4>
            </div>

            <div class="mb-2">
                <table class="w-full text-sm text-left border-collapse border border-gray-300">
                    <thead class="bg-gray-100 border-b border-gray-300">
                        <tr>
                            <th
                                class="px-2 py-1.5 font-semibold text-gray-700 border-r border-gray-300 text-center w-1/4">
                                City</th>
                            <th
                                class="px-2 py-1.5 font-semibold text-gray-700 border-r border-gray-300 text-center w-1/4">
                                Language</th>
                            <th
                                class="px-2 py-1.5 font-semibold text-gray-700 border-r border-gray-300 text-center w-1/4">
                                Selected Plan</th>
                            <th class="px-2 py-1.5 font-semibold text-gray-700 text-center w-1/4">Monthly Investment
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @php
                        $totalPrice = 0;
                        $planPrices = [
                        'Lite' => 14000,
                        'plus' => 45000,
                        'prime' => 500000,
                        ];
                        @endphp
                        @foreach($cityData as $city)
                        @php
                        $citySelectedPlans = [];
                        foreach($selectedPlans as $key => $planVal) {
                        if(str_starts_with($key, $city['city_id'] . '-')) {
                        $parts = explode('-', $planVal);
                        $planType = end($parts);
                        $langCode = $parts[1];
                        $citySelectedPlans[$langCode] = $planType;
                        }
                        }
                        @endphp

                        @if(count($citySelectedPlans) > 0)
                        @php $firstLang = true; $rowspan = count($citySelectedPlans); @endphp
                        @foreach($citySelectedPlans as $lCode => $pType)
                        @php
                        $price = $planPrices[$pType] ?? 0;
                        $totalPrice += $price;

                        $badgeClass = '';
                        if($pType == 'Lite') $badgeClass = 'text-black';
                        elseif($pType == 'plus') $badgeClass = 'text-black';
                        elseif($pType == 'prime') $badgeClass = 'text-black';
                        @endphp
                        <tr class="hover:bg-gray-50">
                            @if($firstLang)
                            <td rowspan="{{ $rowspan }}"
                                class="px-2 py-1.5 border-r border-gray-300 align-top bg-white">
                                <div class="font-semibold text-gray-800">{{ $city['city_name'] }}</div>
                                <div class="text-[10px] text-gray-500">{{ count($citySelectedPlans) }} Language(s)</div>
                            </td>
                            @endif
                            <td class="px-2 py-1.5 border-r border-gray-300 align-middle">
                                <span class="text-gray-800">{{ $lang_titles[$lCode] ?? $lCode }}</span>
                            </td>
                            <td class="px-2 py-1.5 border-r border-gray-300 text-center align-middle">
                                <span class="inline-block px-1.5 py-0.5 rounded text-[11px] {{ $badgeClass }}">
                                    City {{ ucfirst($pType) }}
                                </span>
                            </td>
                            <td class="px-2 py-1.5 text-right align-middle text-gray-800">
                                ₹ {{ number_format($price) }}
                            </td>
                        </tr>
                        @php $firstLang = false; @endphp
                        @endforeach
                        @endif
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-100 border-t border-gray-300">
                        <tr>
                            <td colspan="3"
                                class="px-2 py-2 text-right font-semibold text-gray-800 border-r border-gray-300">
                                Total Est. Budget (1 Month)
                            </td>
                            <td class="px-2 py-2 text-right font-bold text-gray-900">
                                ₹ {{ number_format($totalPrice) }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Plan Inclusions (Printed with the Budget) -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <h4 class="font-bold text-gray-800 mb-4 text-lg">Plan Inclusions & Deliverables</h4>
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

            <!-- Footer / Terms -->
            <div class="mt-6 pt-4 border-t border-gray-200 flex justify-between items-start">
                <div>
                    <h4 class="font-semibold text-gray-700 mb-1 text-sm">Note:</h4>
                    <ul class="list-disc pl-5 space-y-1 text-xs text-gray-500">
                        <li>This is merely an estimated budget for a 1-month subscription. Enroll to convert the
                            estimate to a Prarang pricing offer.</li>
                        <li>Applicable taxes (e.g., GST) will be added to the pricing offer.</li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 flex justify-between border-t border-gray-200 pt-6 print:hidden">
                <button wire:click="changeStep('back')" wire:loading.attr="disabled" wire:target="changeStep"
                    class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                    <span wire:loading.remove wire:target="changeStep">Back- Revise Plan</span>
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
                <button onclick="window.print()"
                    class="bg-blue-600 hover:bg-blue-700 transition-colors px-6 py-2 rounded-lg text-white font-medium shadow-sm flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Print / Save
                </button>
                <button wire:click="goToStepFive"
                    class="bg-yellow-500 hover:bg-yellow-600 transition-colors px-6 py-2 rounded-lg text-white font-bold shadow-sm flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    Enroll Now
                </button>
            </div>
        </div>
    </section>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #invoice-section,
            #invoice-section * {
                visibility: visible;
            }

            #invoice-section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 0;
                box-shadow: none;
            }

            .print\:hidden {
                display: none !important;
            }

            .print-logo {
                display: block !important;
            }
        }

        /* Paragraph */
        .border-b .justify-start p {
            text-align: left;
            /* transform: translatex(0px) translatey(0px); */
            margin-bottom: 13px;
            margin-top: 3px;
        }

        /* Bold Tag */
        .justify-start p b {
            margin-bottom: 16px;
        }
    </style>
    @endif
    @if($step == 5)
    <section class="mb-12 flex flex-col items-center">
        <div class="bg-white max-w-2xl w-full mx-auto border border-gray-200 p-6 sm:p-8 rounded-lg shadow-sm">
            @if(!$isSubmitted)
            <!-- Form Header -->
            <div class="mb-6 pb-4 border-b border-gray-200 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">3. Prarang Indian Cities Enrolment</h2>
                <div
                    class="mt-2 flex justify-start items-start flex-col rounded shadow p-2 text-sm border border-gray-400 bg-gray-50">
                    <p><b>Your message:</b> <br><br> We are interested in enrolling for a digital marketing plan as
                        estimated below. Please revert to us with your
                        final pricing.
                        <br>Thanks<br>
                    </p>

                </div>
            </div>
            @endif

            <div>
                @if($isSubmitted)
                <div class="py-8 text-center">
                    <div
                        class="w-16 h-16 bg-green-50 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 border border-green-200">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Submission Successful!</h3>
                    <p class="text-gray-600 text-sm mb-6">Thank you for your interest. Our sales team will shortly
                        connect with you.</p>
                    {{-- <button
                        class="px-6 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded transition-colors text-sm border border-gray-300">

                    </button> --}}
                </div>
                @else
                <form wire:submit.prevent="sendEnrolment" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Name -->
                        <div class="space-y-1">
                            <label for="name" class="block text-sm font-semibold text-gray-700">Full Name</label>
                            <input type="text" id="name" wire:model.defer="name" placeholder="E.g. John Doe"
                                class="w-full px-3 py-2 bg-white border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 text-sm transition-colors">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <!-- Mobile -->
                        <div class="space-y-1">
                            <label for="mobile" class="block text-sm font-semibold text-gray-700">Mobile Number</label>
                            <input type="text" id="mobile" wire:model.defer="mobile" placeholder="+91 XXXXX XXXXX"
                                class="w-full px-3 py-2 bg-white border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 text-sm transition-colors">
                            @error('mobile') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-semibold text-gray-700">Business Email</label>
                        <input type="email" id="email" wire:model.defer="email" placeholder="name@company.com"
                            class="w-full px-3 py-2 bg-white border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 text-sm transition-colors">
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Company Name -->
                    <div class="space-y-1">
                        <label for="company_name" class="block text-sm font-semibold text-gray-700">Company Name</label>
                        <input type="text" id="company_name" wire:model.defer="company_name"
                            placeholder="Your organization name"
                            class="w-full px-3 py-2 bg-white border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 text-sm transition-colors">
                        @error('company_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Website -->
                    <div class="space-y-1">
                        <label for="website" class="block text-sm font-semibold text-gray-700">Website URL <span
                                class="text-gray-400 font-normal">(Optional)</span></label>
                        <input type="text" id="website" wire:model.defer="website"
                            placeholder="https://www.yourwebsite.com"
                            class="w-full px-3 py-2 bg-white border border-gray-300 rounded focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-800 text-sm transition-colors">
                        @error('website') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-4 flex items-center justify-between gap-4 mt-2">
                        <button type="button" wire:click="$set('step', 4)"
                            class="px-5 py-2 text-gray-600 bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded font-medium text-sm transition-colors">
                            Back
                        </button>
                        <button type="submit" wire:loading.attr="disabled"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded shadow-sm text-sm transition-colors flex items-center gap-2 disabled:opacity-70">
                            <span wire:loading.remove wire:target="sendEnrolment">Act</span>
                            <span wire:loading wire:target="sendEnrolment" class="flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Processing...
                            </span>
                        </button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </section>
    @endif

    <style>
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
</div>
