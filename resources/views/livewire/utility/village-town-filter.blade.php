<div>
    <style>
        #locationModal {
            background-color: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(12px);
        }

        #locationModal .modal-container {
            box-shadow: 0 40px 80px -20px rgba(0, 0, 0, 0.35);
            border-radius: 32px;
            background: white;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #2563eb;
            border-radius: 10px;
        }

        /* Justify center */
        .md\:p-10 .items-center .justify-center {
            height: 48px;
        }

        /* Justify center */
        header .mx-auto .items-center .lg\:col-span-3 div #locationModal .max-w-lg .md\:p-10 .relative .relative .items-center .justify-center {
            width: 100% !important;
        }

        /* Tracking wide */
        .md\:p-10 .relative .tracking-wide {
            color: #56569d;
        }

        /* Select */
        .md\:p-10 .relative select {
            border-color: #4487fd;
        }

        /* Cursor not allowed */
        .md\:p-10 .relative .cursor-not-allowed {
            border-color: #d6d0d0;
        }

        /* Label */
        #locationModal .relative label {
            font-size: 14px;
            color: #74828f;
            text-transform: capitalize;
            font-weight: 500;
        }

        /* Justify between */
        .modal-container>.relative>.justify-between {
            margin-bottom: 25px;
        }

        .flex-grow>.relative>.w-full {
            z-index: 13;
        }

        /* Modal container */
        #locationModal .modal-container {
            width: 740px;
        }

        /* Heading */
        .modal-container .relative h2 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Image */
        .modal-container .relative img {
            width: 30px;
            height: 30px !important;
            margin-right: 5px;
        }

        /* Rounded full */
        .modal-container .relative .rounded-full {
            visibility: hidden;
        }
    </style>

    <!-- Trigger Button -->
    <div class="inline-block group">
        <button type="button" @click="document.getElementById('locationModal').classList.remove('hidden')"
            class="flex items-center gap-4 py-4 px-6 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-xl hover:border-gray-300 transition-all duration-500 min-w-[260px] relative overflow-hidden group/btn">

            <div
                class="absolute inset-0 bg-gradient-to-br from-blue-50/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-700">
            </div>

            <div
                class="relative flex items-center justify-center w-10 h-10 bg-blue-50 rounded-xl group-hover:bg-blue-100 transition-all duration-500">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>

            <div class="relative flex flex-col items-start text-left">
                <span class="text-[10px] text-blue-600 font-black tracking-widest mb-0.5 uppercase">India {{
                    $type === 'town' ? 'City' : 'Village' }}</span>
                <span class="text-[15px] text-gray-900 font-black flex items-center gap-1.5 leading-tight">
                    @php
                    $displayName = 'Find a ' . ucfirst($type=="town"?"City":"Village");
                    if ($type === 'village' && $village) {
                    $selectedItem = collect($villages)->where('id', $village)->first();
                    } elseif ($type === 'town' && $town) {
                    $selectedItem = collect($towns)->where('id', $town)->first();
                    }

                    if (isset($selectedItem)) {
                    $displayName = is_array($selectedItem) ? ($selectedItem['name'] ?? 'Selected') :
                    ($selectedItem->name ?? 'Selected');
                    }
                    @endphp
                    {{ $displayName }}
                    <svg class="w-4 h-4 text-gray-400 group-hover/btn:text-blue-500 transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </div>
        </button>
    </div>

    <!-- Modal -->
    <div id="locationModal" class="fixed inset-0 z-[9999] hidden flex items-center justify-center p-4 overflow-y-auto"
        wire:ignore.self>

        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-900/70"
            @click="document.getElementById('locationModal').classList.add('hidden')"></div>

        <!-- Modal Content -->
        <div
            class="relative w-[96%] max-w-lg md:max-w-5xl modal-container transform transition-all border border-gray-100 p-8 md:p-12 md:px-12">

            <div class="relative">
                <!-- Header -->
                <div class="flex justify-between items-center mb-8">
                    <div class="flex flex-col">
                        <h2 class="text-xl font-black text-gray-900 tracking-tight ">
                            <img src="https://www.prarang.in/assets/images/home/{{ $type=="
                                town"?"town-1.png":"Villages-1.png" }}" class="h-6" alt="">Change Location
                        </h2>
                        <div class="w-10 h-1 bg-blue-600 rounded-full mt-1"></div>
                    </div>

                    <button @click="document.getElementById('locationModal').classList.add('hidden')"
                        class="p-2 bg-gray-50 hover:bg-gray-100 rounded-xl transition-all text-gray-400 hover:text-gray-900">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- 2x2 Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-7 relative z-20">

                    <!-- Step 1 (State) -->
                    <div class="flex gap-3 relative z-[90]">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-7 h-7 border-2 {{ $state ? 'border-gray-900 bg-gray-900 text-white' : 'border-gray-100 text-gray-300' }} rounded-lg flex items-center justify-center font-black text-[10px] transition-all duration-300 relative z-10">
                                @if($state)
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                @else
                                01
                                @endif
                            </div>
                        </div>

                        <div class="flex-grow" x-data="{ open: false, search: '' }">
                            <label
                                class="block text-[10px] font-black text-[#56569d] mb-1.5 ml-0.5 tracking-wide uppercase">Select
                                State</label>
                            <div class="relative">
                                <button type="button" @click="open = !open"
                                    class="w-full flex items-center justify-between pl-3 pr-8 py-2.5 text-[13px] font-black text-gray-900 bg-gray-50 border border-[#4487fd] rounded-xl hover:bg-gray-100/50 transition-all outline-none">
                                    <span class="truncate">
                                        @php
                                        $sState = collect($states)->where('id', $state)->first();
                                        $stateTitle = $sState ? (is_array($sState) ? ($sState['name'] ?? 'Selected') :
                                        ($sState->name ?? 'Selected')) : 'Select State';
                                        @endphp
                                        {{ $stateTitle }}
                                    </span>
                                    <svg class="w-3.5 h-3.5 text-blue-600 transform transition-transform"
                                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    class="absolute z-[100] left-0 w-full mt-1 bg-white border border-gray-100 rounded-xl shadow-2xl p-3 space-y-2"
                                    x-cloak>
                                    <div class="relative">
                                        <input type="text" x-model="search" placeholder="Search..."
                                            class="w-full pl-8 pr-3 py-1.5 bg-gray-50 border-none rounded-lg text-[12px] font-bold focus:ring-1 focus:ring-blue-100 outline-none">
                                        <svg class="absolute left-2.5 top-2 w-3.5 h-3.5 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <div class="max-h-36 overflow-y-auto custom-scrollbar space-y-0.5">
                                        @foreach($states as $item)
                                        @php $itemName = is_array($item) ? $item['name'] : $item->name; @endphp
                                        <button type="button"
                                            wire:key="state-{{ is_array($item) ? $item['id'] : $item->id }}"
                                            x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                            @click="$wire.set('state', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                            class="w-full text-left px-2.5 py-1.5 rounded-lg text-[12px] font-bold text-gray-700 hover:bg-blue-600 hover:text-white transition-all">
                                            {{ $itemName }}
                                        </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 (District) -->
                    <div class="flex gap-3 relative z-[80]">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-7 h-7 border-2 {{ $district ? 'border-gray-900 bg-gray-900 text-white' : 'border-gray-100 text-gray-300 shadow-inner bg-gray-50/50' }} rounded-lg flex items-center justify-center font-black text-[10px] transition-all duration-300 relative z-10">
                                <div wire:loading wire:target="state">
                                    <svg class="w-4 h-4 animate-spin text-blue-600" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="3"></circle>
                                        <path class="opacity-100" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                                <div wire:loading.remove wire:target="state">
                                    @if($district)
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    @else
                                    02
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="flex-grow" x-data="{ open: false, search: '' }">
                            <label
                                class="block text-[10px] font-black text-[#56569d] mb-1.5 ml-0.5 tracking-wide uppercase">Select
                                District</label>
                            <div class="relative">
                                <button type="button" @click="if ({{ !$state ? 'false' : 'true' }}) open = !open" {{
                                    !$state ? 'disabled' : '' }}
                                    class="w-full flex items-center justify-between pl-3 pr-8 py-2.5 text-[13px] font-black text-gray-900 {{ !$state ? 'bg-gray-50/30 cursor-not-allowed text-gray-400 border-[#d6d0d0] opacity-60' : 'bg-gray-50 border-[#4487fd] hover:bg-gray-100/50' }} border rounded-xl transition-all outline-none">
                                    <span class="truncate">
                                        @php
                                        $sDistrict = collect($districts)->where('id', $district)->first();
                                        $districtTitle = $sDistrict ? (is_array($sDistrict) ? ($sDistrict['name'] ??
                                        'Selected') : ($sDistrict->name ?? 'Selected')) : 'Select District';
                                        @endphp
                                        {{ $districtTitle }}
                                    </span>
                                    <svg class="w-3.5 h-3.5 text-blue-600 transform transition-transform"
                                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    class="absolute z-[100] left-0 w-full mt-1 bg-white border border-gray-100 rounded-xl shadow-2xl p-3 space-y-2"
                                    x-cloak>
                                    <div class="relative">
                                        <input type="text" x-model="search" placeholder="Search..."
                                            class="w-full pl-8 pr-3 py-1.5 bg-gray-50 border-none rounded-lg text-[12px] font-bold focus:ring-1 focus:ring-blue-100 outline-none">
                                        <svg class="absolute left-2.5 top-2 w-3.5 h-3.5 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <div class="max-h-36 overflow-y-auto custom-scrollbar space-y-0.5">
                                        @foreach($districts as $item)
                                        @php $itemName = is_array($item) ? $item['name'] : $item->name; @endphp
                                        <button type="button"
                                            wire:key="district-{{ is_array($item) ? $item['id'] : $item->id }}"
                                            x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                            @click="$wire.set('district', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                            class="w-full text-left px-2.5 py-1.5 rounded-lg text-[12px] font-bold text-gray-700 hover:bg-blue-600 hover:text-white transition-all">
                                            {{ $itemName }}
                                        </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($type === 'village')
                    <!-- Step 3 (Tehsil/Sub-District) -->
                    <div class="flex gap-3 relative z-[70]">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-7 h-7 border-2 {{ $subDistrict ? 'border-gray-900 bg-gray-900 text-white' : 'border-gray-100 text-gray-300 shadow-inner bg-gray-50/50' }} rounded-lg flex items-center justify-center font-black text-[10px] transition-all duration-300 relative z-10">
                                <div wire:loading wire:target="district">
                                    <svg class="w-4 h-4 animate-spin text-blue-600" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="3"></circle>
                                        <path class="opacity-100" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                                <div wire:loading.remove wire:target="district">
                                    @if($subDistrict)
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    @else
                                    03
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="flex-grow" x-data="{ open: false, search: '' }">
                            <label
                                class="block text-[10px] font-black text-[#56569d] mb-1.5 ml-0.5 tracking-wide uppercase">Select
                                Block</label>
                            <div class="relative">
                                <button type="button" @click="if ({{ !$district ? 'false' : 'true' }}) open = !open" {{
                                    !$district ? 'disabled' : '' }}
                                    class="w-full flex items-center justify-between pl-3 pr-8 py-2.5 text-[13px] font-black text-gray-900 {{ !$district ? 'bg-gray-50/30 cursor-not-allowed text-gray-400 border-[#d6d0d0] opacity-60' : 'bg-gray-50 border-[#4487fd] hover:bg-gray-100/50' }} border rounded-xl transition-all outline-none">
                                    <span class="truncate">
                                        @php
                                        $sSubDistrict = collect($subDistricts)->where('id', $subDistrict)->first();
                                        $subDistrictTitle = $sSubDistrict ? (is_array($sSubDistrict) ?
                                        ($sSubDistrict['name'] ?? 'Selected') : ($sSubDistrict->name ?? 'Selected')) :
                                        'Select Block...';
                                        @endphp
                                        {{ $subDistrictTitle }}
                                    </span>
                                    <svg class="w-3.5 h-3.5 text-blue-600 transform transition-transform"
                                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    class="absolute z-[100] left-0 w-full mt-1 bg-white border border-gray-100 rounded-xl shadow-2xl p-3 space-y-2"
                                    x-cloak>
                                    <div class="relative">
                                        <input type="text" x-model="search" placeholder="Search..."
                                            class="w-full pl-8 pr-3 py-1.5 bg-gray-50 border-none rounded-lg text-[12px] font-bold focus:ring-1 focus:ring-blue-100 outline-none">
                                        <svg class="absolute left-2.5 top-2 w-3.5 h-3.5 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <div class="max-h-36 overflow-y-auto custom-scrollbar space-y-0.5">
                                        @foreach($subDistricts as $item)
                                        @php $itemName = is_array($item) ? $item['name'] : $item->name; @endphp
                                        <button type="button"
                                            wire:key="subDistrict-{{ is_array($item) ? $item['id'] : $item->id }}"
                                            x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                            @click="$wire.set('subDistrict', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                            class="w-full text-left px-2.5 py-1.5 rounded-lg text-[12px] font-bold text-gray-700 hover:bg-blue-600 hover:text-white transition-all">
                                            {{ $itemName }}
                                        </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Step 4 (Village) -->
                    <div class="flex gap-3 relative z-[60]">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-7 h-7 border-2 {{ ($type === 'town' ? $town : $village) ? 'border-gray-900 bg-gray-900 text-white' : 'border-gray-100 text-gray-300 shadow-inner bg-gray-50/50' }} rounded-lg flex items-center justify-center font-black text-[10px] transition-all duration-300 relative z-10">
                                <div wire:loading wire:target="{{ $type === 'town' ? 'district' : 'subDistrict' }}">
                                    <svg class="w-4 h-4 animate-spin text-blue-600" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="3"></circle>
                                        <path class="opacity-100" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                                <div wire:loading.remove
                                    wire:target="{{ $type === 'town' ? 'district' : 'subDistrict' }}">
                                    @if($type === 'town' ? $town : $village)
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    @else
                                    {{ $type === 'town' ? '03' : '04' }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="flex-grow" x-data="{ open: false, search: '' }">
                            <label
                                class="block text-[10px] font-black text-[#56569d] mb-1.5 ml-0.5 tracking-wide uppercase">Select
                                {{ ucfirst($type=="town"?"City":"Villages") }}</label>
                            <div class="relative">
                                @php $isStepActive = $type === 'town' ? $district : $subDistrict; @endphp
                                <button type="button" @click="if ({{ !$isStepActive ? 'false' : 'true' }}) open = !open"
                                    {{ !$isStepActive ? 'disabled' : '' }}
                                    class="w-full flex items-center justify-between pl-3 pr-8 py-2.5 text-[13px] font-black text-gray-900 {{ !$isStepActive ? 'bg-gray-50/30 cursor-not-allowed text-gray-400 border-[#d6d0d0] opacity-60' : 'bg-gray-50 border-[#4487fd] hover:bg-gray-100/50' }} border rounded-xl transition-all outline-none">
                                    <span class="truncate">
                                        @if($type === 'town')
                                        {{ $town ? (collect($towns)->where('id', $town)->first()->name ??
                                        (collect($towns)->where('id', $town)->first()['name'] ?? 'Selected')) : 'Select
                                        Town' }}
                                        @else
                                        {{ $village ? (collect($villages)->where('id', $village)->first()->name ??
                                        (collect($villages)->where('id', $village)->first()['name'] ?? 'Selected')) :
                                        'Select Village' }}
                                        @endif
                                    </span>
                                    <svg class="w-3.5 h-3.5 text-blue-600 transform transition-transform"
                                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    class="absolute z-[100] left-0 w-full mt-1 bg-white border border-gray-100 rounded-xl shadow-2xl p-3 space-y-2"
                                    x-cloak>
                                    <div class="relative">
                                        <input type="text" x-model="search" placeholder="Search..."
                                            class="w-full pl-8 pr-3 py-1.5 bg-gray-50 border-none rounded-lg text-[12px] font-bold focus:ring-1 focus:ring-blue-100 outline-none">
                                        <svg class="absolute left-2.5 top-2 w-3.5 h-3.5 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <div class="max-h-36 overflow-y-auto custom-scrollbar space-y-0.5">
                                        @php $items = ($type === 'town' ? $towns : $villages); @endphp
                                        @foreach($items as $item)
                                        @php $itemName = is_array($item) ? $item['name'] : $item->name; @endphp
                                        <button type="button"
                                            wire:key="{{ $type }}-{{ is_array($item) ? $item['id'] : $item->id }}"
                                            x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                            @click="$wire.set('{{ $type === 'town' ? 'town' : 'village' }}', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                            class="w-full text-left px-2.5 py-1.5 rounded-lg text-[12px] font-bold text-gray-700 hover:bg-blue-600 hover:text-white transition-all">
                                            {{ $itemName }}
                                        </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Confirm Button Area -->
                <div
                    class="mt-8 relative z-10 transition-all duration-300 {{ ($type === 'town' ? $town : $village) ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none' }}">
                    <a href="/{{$type==='town' ? 'city' : 'village'}}/{{url_encoder($state."-".$district."-".(($type==='town' ? $town : $village)))}}/{{ $this->selectedSlug }}"
                        class="relative group/btn block w-full py-4 bg-gray-900 border-none rounded-xl overflow-hidden
                        transition-all duration-300 hover:shadow-2xl hover:shadow-blue-100 active:scale-[0.98]
                        text-center">
                        <div
                            class="absolute inset-0 bg-blue-600 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300">
                        </div>
                        <span
                            class="relative text-white text-sm font-black tracking-widest flex items-center justify-center gap-2">
                            Confirm Location
                            <svg class="w-4 h-4 transition-transform group-hover/btn:translate-x-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
