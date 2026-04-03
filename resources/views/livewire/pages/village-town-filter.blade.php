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
    <style>
        /* Hover */
        .container .min-h-screen .shadow-lg .md\:p-12 div .border-t .grid .hover\:shadow-xl {
            width: 40% !important;
        }

        /* Hover */
        .shadow-lg div .hover\:shadow-xl {
            padding-left: 15px;
            height: 158px;
            background-color: #f0efef !important;
            box-shadow: 0px 0px 10px 3px #dfe1e1;
        }

        /* Tracking tight */
        .shadow-lg div h3.tracking-tight {
            margin-bottom: 14px;
        }
    </style>
    <div class="rounded shadow-lg">

        <!-- Main Filter Card -->



        <div class="p-3 md:p-12 ">
            <div class="pb-4 text-center ">
                <h2 class="text-xl md:text-xl  text-slate-800 tracking-tighter mb-2">
                    Explore <span class="font-black">594,204</span> Inhabited Villages across India
                </h2>

        </div>
            <!-- Decorative Background Element -->
            <!-- Header Section -->
            <div class="mb-3 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                <h2 class="text-xl md:text-xl font-black text-slate-800 tracking-tighter mb-2">
                    Find <span class="text-blue-600">{{ $type === 'town' ? 'City' : 'Villages' }}</span>
                </h2>

                <a href="/village-webs" target="_blank"
    class="inline-flex w-fit self-start md:self-auto items-center gap-2 rounded-md no-underline border border-blue-200 bg-blue-50 px-4 py-2 text-sm font-semibold text-blue-700 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-blue-600 hover:bg-blue-600 hover:text-white hover:shadow-md">
    Village Language Distribution
</a>

            </div>



            <div class="">
                <div
                    class="grid grid-cols-1 {{ $type === 'village' ? 'md:grid-cols-4' : 'md:grid-cols-3' }} gap-3 md:gap-3">
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

                    @if($type === 'village')
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
                                Block {{ count($subDistricts)!==0 ? "#".count($subDistricts) : ' ' }}</label>
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
                                    'Selected') : ($sSubDistrict->name ?? 'Selected')) : 'Choose a block...';
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
                    @endif

                    <!-- Step 4: Village/Town Selection -->
                    <div class="space-y-3" x-data="{ open: false, search: '' }">
                        <div class="flex items-center gap-3 mb-2">
                            <span
                                class="flex items-center justify-center w-8 h-8 rounded-xl {{ ($type === 'town' ? $town : $village) ? 'bg-green-100 text-green-600' : ($type === 'town' ? ($district ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-300') : ($subDistrict ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-300')) }} font-bold text-sm transition-colors duration-300">
                                <div wire:loading wire:target="{{ $type === 'town' ? 'district' : 'subDistrict' }}">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                                <div wire:loading.remove
                                    wire:target="{{ $type === 'town' ? 'district' : 'subDistrict' }}">
                                    @if($type === 'town' ? $town : $village)
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    @else
                                    {{ $type === 'town' ? '03' : '04' }}
                                    @endif
                                </div>
                            </span>
                            <label class="text-sm font-bold text-slate-500 uppercase tracking-widest">Select {{
                                ucfirst($type=="town"?"City":"Villages") }} {{ count($type === 'town' ? $towns :
                                $villages)!==0 ?
                                "#".count($type === 'town' ? $towns : $villages) : ' '
                                }}</label>
                        </div>

                        <div class="relative">
                            @php
                            $isStepActive = $type === 'town' ? $district : $subDistrict;
                            @endphp
                            <button type="button" @click="if({{ $isStepActive ? 'true' : 'false' }}) open = !open" {{
                                !$isStepActive ? 'disabled' : '' }}
                                class="w-full flex items-center justify-between px-5 py-2 bg-slate-50 border-2 {{ ($type === 'town' ? $town : $village) ? 'border-blue-200 bg-white' : ($isStepActive ? 'border-slate-100' : 'border-slate-50 opacity-50') }} rounded-2xl {{ $isStepActive ? 'hover:border-blue-400 hover:bg-white' : 'cursor-not-allowed' }} transition-all duration-300 group">
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
                                    <div class="px-4 py-3 text-sm text-slate-400 font-medium">Select a {{ $type ===
                                        'town' ? 'district' : 'tehsil' }} first
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
                            <a target="_blank" href="{{ url("/") }}/{{ $type }}/{{ url_encoder($state . '-' . $district
                                . '-' . ($type==='town' ? $town : $village)) }}/{{ $this->selectedSlug }}"
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
                <div class="p-8 md:p-12 border-t border-slate-100 mt-3">
                    <h3 class="text-xl font-black text-slate-800 mb-8 tracking-tight">
                        Example:-
                    </h3>
                    @if($type=="town")
                    <div class="grid grid-cols-1 gap-6">

                        <!-- Horizontal Card -->
                        <div class="group flex flex-col sm:flex-row items-center bg-white border border-slate-200
                    rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-500
                    hover:-translate-y-1">

                            <!-- Image -->
                            <div class="w-full sm:w-1/3 overflow-hidden">
                                <img src="https://www.prarang.in/assets/images/home/town-1.png" alt="Ram Nagar"
                                    class="w-full h-52 sm:h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>

                            <!-- Content -->
                            <div class="w-full sm:w-2/3 p-6 flex flex-col justify-between">

                                <!-- Text -->
                                <div>
                                    <h4
                                        class="text-2xl font-black text-slate-900 mb-2 tracking-tight group-hover:text-blue-600 transition">
                                        Aonla (NPP)
                                    </h4>

                                    <p class="text-slate-500 text-sm">
                                        Bareilly, Uttar Pradesh
                                    </p>
                                </div>

                                <!-- Button -->
                                <div class="mt-4">
                                    <a href="https://prarang.in/town/OS02MjctODAwODYz/aonla-npp" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white
                              font-semibold text-sm rounded-xl hover:bg-blue-700 transition">
                                        View
                                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                    @else
                    <div class="grid grid-cols-1 gap-6">

                        <!-- Horizontal Card -->
                        <div class="group flex flex-col sm:flex-row items-center bg-white border border-slate-200
                    rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-500
                    hover:-translate-y-1">

                            <!-- Image -->
                            <div class="w-full sm:w-1/3 overflow-hidden">
                                <img src="https://www.prarang.in/assets/images/home/Villages-1.png" alt="Ram Nagar"
                                    class="w-full h-52 sm:h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>

                            <!-- Content -->
                            <div class="w-full sm:w-2/3 p-6 flex flex-col justify-between">

                                <!-- Text -->
                                <div>
                                    <h4
                                        class="text-2xl font-black text-slate-900 mb-2 tracking-tight group-hover:text-blue-600 transition">
                                        Ram Nagar
                                    </h4>

                                    <p class="text-slate-500 text-sm">
                                        Bareilly, Uttar Pradesh
                                    </p>
                                </div>

                                <!-- Button -->
                                <div class="mt-4">
                                    <a href="https://prarang.in/village/OSAtMTMwLTEyOTgyMw/ram-nagar" target="_blank"
                                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white
                              font-semibold text-sm rounded-xl hover:bg-blue-700 transition">
                                        View
                                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                    @endif
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
