<div class="min-h-screen  py-2 px-4 sm:px-6 lg:px-8">
    <style>
        /* Label */
        .grid .space-y-3 label {
            font-size: 12px;
        }

        /* Justify center */
        .grid .space-y-3 .justify-center {
            font-size: 12px;
        }

        /* Hover */
        .grid .relative .hover\:bg-white {
            padding-top: 10px !important;
            padding-bottom: 10px !important;
        }

        /* Division */
        .min-h-screen .md\:p-12 {
            /* transform: translatex(0px) translatey(0px); */
            padding-bottom: 14px;
        }

        /* Border */
        .md\:p-12 div .border-t {
            margin-top: 17px;
            padding-top: 8px;
            /* transform: translatex(0px) translatey(0px); */
        }

        /* Link */
        .sm\:flex-row .transition-all a {
            height: 40px;
            display: flex;
            justify-content: flex-end;
            text-decoration: none;
        }

        /* Division */
        .md\:p-12 div .sm\:flex-row {
            align-items: center;
            justify-content: flex-end;
        }
    </style>
    <div class="rounded shadow-lg">

        <!-- Main Filter Card -->
        <div class="p-8 md:p-12 ">
            <!-- Decorative Background Element -->
            <!-- Header Section -->
            <div class="mb-3">
                <h2 class="text-xl md:text-xl font-black text-slate-800 tracking-tighter mb-2">
                    Find <span class="text-blue-600">Villages</span>
                </h2>

            </div>



            <div class="">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-3 md:gap-3">
                    <!-- Step 1: State Selection -->
                    <div class="space-y-3" x-data="{ open: false, search: '' }">
                        <div class="flex items-center gap-3 mb-2">
                            <span
                                class="flex items-center justify-center w-8 h-8 rounded-xl {{ $state ? 'bg-green-100 text-green-600' : 'bg-blue-100 text-blue-600' }} font-bold text-sm transition-colors duration-300">
                                @if($state)
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                @else
                                01
                                @endif
                            </span>
                            <label class="text-sm font-bold text-slate-500 uppercase tracking-widest">Select
                                State # {{ count($states) }}</label>
                        </div>

                        <div class="relative">
                            <button type="button" @click="open = !open"
                                class="w-full flex items-center justify-between px-5 py-4 bg-slate-50 border-2 {{ $state ? 'border-blue-200 bg-white' : 'border-slate-100' }} rounded-2xl hover:border-blue-400 hover:bg-white transition-all duration-300 group">
                                <span
                                    class="text-[15px] font-bold {{ $state ? 'text-slate-900' : 'text-slate-400' }} truncate">
                                    @php
                                    $sState = collect($states)->where('id', $state)->first();
                                    echo $sState ? (is_array($sState) ? ($sState['name'] ?? 'Selected') : ($sState->name
                                    ?? 'Selected')) : 'Choose a state...';
                                    @endphp
                                </span>
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 transition-transform duration-300"
                                    :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown -->
                            <div x-show="open" @click.away="open = false" x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-2xl shadow-2xl p-3 overflow-hidden">
                                <div class="relative mb-3">
                                    <input type="text" x-model="search" placeholder="Search states..."
                                        autocomplete="off"
                                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm font-semibold focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                                    <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <div class="max-h-60 overflow-y-auto custom-scrollbar-premium">
                                    @forelse($states as $item)
                                    @php $itemName = is_array($item) ? $item['name'] : $item->name; @endphp
                                    <button type="button"
                                        wire:key="state-{{ is_array($item) ? $item['id'] : $item->id }}"
                                        x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                        @click="$wire.set('state', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                        class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-bold text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200">
                                        {{ $itemName }}
                                    </button>
                                    @empty
                                    <div class="px-4 py-3 text-sm text-slate-400 font-medium">No states found</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: District Selection -->
                    <div class="space-y-3" x-data="{ open: false, search: '' }">
                        <div class="flex items-center gap-3 mb-2">
                            <span
                                class="flex items-center justify-center w-8 h-8 rounded-xl {{ $district ? 'bg-green-100 text-green-600' : ($state ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-300') }} font-bold text-sm transition-colors duration-300">
                                <div wire:loading wire:target="state">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                                <div wire:loading.remove wire:target="state">
                                    @if($district)
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    @else
                                    02
                                    @endif
                                </div>
                            </span>
                            <label class="text-sm font-bold text-slate-500 uppercase tracking-widest">Select
                                District {{ count($districts)!==0 ? "#".count($districts) : ' ' }}</label>
                        </div>

                        <div class="relative">
                            <button type="button" @click="if({{ $state ? 'true' : 'false' }}) open = !open" {{ !$state
                                ? 'disabled' : '' }}
                                class="w-full flex items-center justify-between px-5 py-2 bg-slate-50 border-2 {{ $district ? 'border-blue-200 bg-white' : ($state ? 'border-slate-100' : 'border-slate-50 opacity-50') }} rounded-2xl {{ $state ? 'hover:border-blue-400 hover:bg-white' : 'cursor-not-allowed' }} transition-all duration-300 group">
                                <span
                                    class="text-[15px] font-bold {{ $district ? 'text-slate-900' : 'text-slate-400' }} truncate">
                                    @php
                                    $sDistrict = collect($districts)->where('id', $district)->first();
                                    echo $sDistrict ? (is_array($sDistrict) ? ($sDistrict['name'] ?? 'Selected') :
                                    ($sDistrict->name ?? 'Selected')) : 'Choose a district...';
                                    @endphp
                                </span>
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 transition-transform duration-300"
                                    :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-2xl shadow-2xl p-3 overflow-hidden">
                                <div class="relative mb-3">
                                    <input type="text" x-model="search" placeholder="Search districts..."
                                        autocomplete="off"
                                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm font-semibold focus:ring-2 focus:ring-blue-100 outline-none">
                                    <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <div class="max-h-60 overflow-y-auto custom-scrollbar-premium">
                                    @forelse($districts as $item)
                                    @php $itemName = is_array($item) ? $item['name'] : $item->name; @endphp
                                    <button type="button"
                                        wire:key="district-{{ is_array($item) ? $item['id'] : $item->id }}"
                                        x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                        @click="$wire.set('district', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                        class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-bold text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200">
                                        {{ $itemName }}
                                    </button>
                                    @empty
                                    <div class="px-4 py-3 text-sm text-slate-400 font-medium">Select a state first</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Sub-District Selection -->
                    <div class="space-y-3" x-data="{ open: false, search: '' }">
                        <div class="flex items-center gap-3 mb-2">
                            <span
                                class="flex items-center justify-center w-8 h-8 rounded-xl {{ $subDistrict ? 'bg-green-100 text-green-600' : ($district ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-300') }} font-bold text-sm transition-colors duration-300">
                                <div wire:loading wire:target="district">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                                <div wire:loading.remove wire:target="district">
                                    @if($subDistrict)
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    @else
                                    03
                                    @endif
                                </div>
                            </span>
                            <label class="text-sm font-bold text-slate-500 uppercase tracking-widest">Select
                                Tehsil {{ count($subDistricts)!==0 ? "#".count($subDistricts) : ' ' }}</label>
                        </div>

                        <div class="relative">
                            <button type="button" @click="if({{ $district ? 'true' : 'false' }}) open = !open" {{
                                !$district ? 'disabled' : '' }}
                                class="w-full flex items-center justify-between px-5 py-2 bg-slate-50 border-2 {{ $subDistrict ? 'border-blue-200 bg-white' : ($district ? 'border-slate-100' : 'border-slate-50 opacity-50') }} rounded-2xl {{ $district ? 'hover:border-blue-400 hover:bg-white' : 'cursor-not-allowed' }} transition-all duration-300 group">
                                <span
                                    class="text-[15px] font-bold {{ $subDistrict ? 'text-slate-900' : 'text-slate-400' }} truncate">
                                    @php
                                    $sSubDistrict = collect($subDistricts)->where('id', $subDistrict)->first();
                                    echo $sSubDistrict ? (is_array($sSubDistrict) ? ($sSubDistrict['name'] ??
                                    'Selected') : ($sSubDistrict->name ?? 'Selected')) : 'Choose a tehsil...';
                                    @endphp
                                </span>
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 transition-transform duration-300"
                                    :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-2xl shadow-2xl p-3 overflow-hidden">
                                <div class="relative mb-3">
                                    <input type="text" x-model="search" placeholder="Search tehsil..."
                                        autocomplete="off"
                                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm font-semibold focus:ring-2 focus:ring-blue-100 outline-none">
                                    <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <div class="max-h-60 overflow-y-auto custom-scrollbar-premium">
                                    @forelse($subDistricts as $item)
                                    @php $itemName = is_array($item) ? $item['name'] : $item->name; @endphp
                                    <button type="button"
                                        wire:key="subDistrict-{{ is_array($item) ? $item['id'] : $item->id }}"
                                        x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                        @click="$wire.set('subDistrict', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                        class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-bold text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200">
                                        {{ $itemName }}
                                    </button>
                                    @empty
                                    <div class="px-4 py-3 text-sm text-slate-400 font-medium">Select a district first
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Village/Town Selection -->
                    <div class="space-y-3" x-data="{ open: false, search: '' }">
                        <div class="flex items-center gap-3 mb-2">
                            <span
                                class="flex items-center justify-center w-8 h-8 rounded-xl {{ ($type === 'town' ? $town : $village) ? 'bg-green-100 text-green-600' : ($subDistrict ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-300') }} font-bold text-sm transition-colors duration-300">
                                <div wire:loading wire:target="subDistrict">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                                <div wire:loading.remove wire:target="subDistrict">
                                    @if($type === 'town' ? $town : $village)
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    @else
                                    04
                                    @endif
                                </div>
                            </span>
                            <label class="text-sm font-bold text-slate-500 uppercase tracking-widest">Select {{
                                ucfirst($type) }} {{ count($type === 'town' ? $towns : $villages)!==0 ?
                                "#".count($type === 'town' ? $towns : $villages) : ' '
                                }}</label>
                        </div>

                        <div class="relative">
                            <button type="button" @click="if({{ $subDistrict ? 'true' : 'false' }}) open = !open" {{
                                !$subDistrict ? 'disabled' : '' }}
                                class="w-full flex items-center justify-between px-5 py-2 bg-slate-50 border-2 {{ ($type === 'town' ? $town : $village) ? 'border-blue-200 bg-white' : ($subDistrict ? 'border-slate-100' : 'border-slate-50 opacity-50') }} rounded-2xl {{ $subDistrict ? 'hover:border-blue-400 hover:bg-white' : 'cursor-not-allowed' }} transition-all duration-300 group">
                                <span
                                    class="text-[15px] font-bold {{ ($type === 'town' ? $town : $village) ? 'text-slate-900' : 'text-slate-400' }} truncate">
                                    @if($type === 'town')
                                    {{ $town ? (collect($towns)->where('id', $town)->first()->name ??
                                    (collect($towns)->where('id', $town)->first()['name'] ?? 'Selected')) : 'Choose a
                                    town...' }}
                                    @else
                                    {{ $village ? (collect($villages)->where('id', $village)->first()->name ??
                                    (collect($villages)->where('id', $village)->first()['name'] ?? 'Selected')) :
                                    'Choose a village...' }}
                                    @endif
                                </span>
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 transition-transform duration-300"
                                    :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-2xl shadow-2xl p-3 overflow-hidden">
                                <div class="relative mb-3">
                                    <input type="text" x-model="search" placeholder="Search location..."
                                        autocomplete="off"
                                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm font-semibold focus:ring-2 focus:ring-blue-100 outline-none">
                                    <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <div class="max-h-60 overflow-y-auto custom-scrollbar-premium">
                                    @php $items = ($type === 'town' ? $towns : $villages); @endphp
                                    @forelse($items as $item)
                                    @php $itemName = is_array($item) ? $item['name'] : $item->name; @endphp
                                    <button type="button"
                                        wire:key="{{ $type }}-{{ is_array($item) ? $item['id'] : $item->id }}"
                                        x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                        @click="$wire.set('{{ $type === 'town' ? 'town' : 'village' }}', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                        class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-bold text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200">
                                        {{ $itemName }}
                                    </button>
                                    @empty
                                    <div class="px-4 py-3 text-sm text-slate-400 font-medium">Select a tehsil first
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Confirm Button Section -->
                <div class="mt-12 pt-8 border-t border-slate-100">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-6">

                        <div
                            class="w-full sm:w-auto transition-all duration-500 {{ ($type === 'town' ? $town : $village) ? 'opacity-100 scale-100' : 'opacity-40 grayscale pointer-events-none' }}">
                            <a target="_blank" href="/village/{{url_encoder($state." -".$district."-".$village ??
                                $town)}}/{{ $this->selectedSlug }}"
                                class="inline-flex items-center justify-center w-full sm:w-auto px-10 py-4 bg-blue-600
                                text-white font-black text-sm tracking-[0.1em] uppercase rounded-2xl shadow-xl
                                shadow-blue-200 hover:bg-blue-700 hover:shadow-blue-300 hover:-translate-y-1
                                active:scale-95 transition-all duration-300 gap-3 group">
                                Confirm Selection
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-8 md:p-12  border-t border-slate-100 mt-3">
                    <h3 class="text-xl font-black text-slate-800 mb-8 tracking-tight flex items-center gap-3">
                        <span class=""></span>
                        Examples for Villages
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6  ">
                        <!-- Example Card: Ram Nagar -->
                        <div
                            class="rounded-2xl bg-gray-200 p-8 border-2 border-transparent hover:border-blue-200 hover:bg-white transition-all duration-500 shadow-sm hover:shadow-2xl hover:shadow-blue-100/50 hover:-translate-y-2">

                            <h4 class="text-2xl font-black text-slate-900 mb-2 tracking-tight">Ram Nagar</h4>
                            <small>Bareilly, Uttar Pradesh </small>


                            <div class="flex items-center justify-center mt-3">
                                <a href="village/OSAtMTMwLTEyOTgyMw/ram-nagar" target="_blank"
                                    class="inline-flex items-center gap-2.5 px-7 py-3 bg-white text-blue-600 font-bold text-sm rounded-2xl border border-blue-100 hover:bg-blue-600 hover:text-blue-700 hover:border-blue-600 transition-all duration-500 group/btn shadow-sm hover:shadow-lg hover:shadow-blue-200">
                                    View
                                    <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Examples Section -->


    <style>
        [x-cloak] {
            display: none !important;
        }

        .custom-scrollbar-premium::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar-premium::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar-premium::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .custom-scrollbar-premium::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }
    </style>
</div>