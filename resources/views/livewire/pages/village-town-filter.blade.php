<div class="page-wrapper">
    <div class="grid grid-cols-1 gap-6 content-wrapper xl:grid-cols-5 xl:items-start">
        <div class="main-content xl:col-span-5">
            <section class="section-one">
                <div class="grid items-center grid-cols-1 gap-4 lg:grid-cols-3">
                    <div class="hidden lg:block"></div>
                    @if ($type === 'village')
                    <div class="flex flex-col items-center justify-center text-center sm:flex-row lg:gap-1">
                        <div class="relative w-20 h-20 shrink-0 sm:w-24 sm:h-24">
                            <img
                                src="{{ asset('assets/images/sticker.png') }}"
                                alt="Sticker"
                                class="w-full h-full">
                            <span class="absolute inset-0 flex items-center pl-5 text-xs font-extrabold text-black md:mt-1">
                                592,765 <br> Webs
                            </span>
                        </div>
                        <h2 class="pt-3 text-xl font-semibold tracking-tighter text-blue-800 md:text-xl">
                            Rural India - Website of Websites
                        </h2>
                    </div>
                    @else
                    <div class="flex flex-col items-center justify-center text-center sm:flex-row lg:gap-1">
                        <div class="relative w-16 h-16 shrink-0 sm:w-20 sm:h-20">
                            <img
                                src="{{ asset('assets/images/sticker.png') }}"
                                alt="Sticker"
                                class="w-full h-full">
                            <span class="absolute inset-0 flex items-center pl-4 text-xs font-bold text-black md:mt-1 ">
                                6,331 <br> Webs
                            </span>
                        </div>
                        <h2 class="pt-3 text-lg font-semibold tracking-tight text-center text-blue-800 sm:text-xl lg:text-xl">
                            Urban India - Website of Websites
                        </h2>
                    </div>
                    @endif
                    <div class="flex justify-center lg:justify-end">
                        <div class="w-full max-w-sm p-2 border-yellow-400 border-1 rounded-xl lg:w-auto">
                            <p class="text-xs font-bold text-center uppercase tracking-[0.2em] text-blue-700">
                                Analyse India
                            </p>
                            <div class="grid grid-cols-2 gap-0.5 lg:grid-cols-4">
                                <a href="https://www.prarang.in/city-webs" target="_blank"
                                    class="flex items-center justify-center gap-1 px-2 py-2 text-white no-underline bg-blue-500 rounded sm:px-1 sm:py-1">
                                    <i class="text-base ti ti-building-community"></i>
                                    <span class="text-xs">District</span>
                                </a>
                                <a href="https://www.prarang.in/town-webs" target="_blank"
                                    class="flex items-center justify-center gap-1 px-2 py-2 text-white no-underline bg-yellow-300 rounded sm:px-1 sm:py-1">
                                    <i class="text-base ti ti-buildings"></i>
                                    <span class="text-xs">Cities</span>
                                </a>
                                <a href="https://www.prarang.in/india-rural" target="_blank"
                                    class="flex items-center justify-center gap-1 px-2 py-2 text-white no-underline bg-red-500 rounded sm:px-1 sm:py-1">
                                    <i class="text-base ti ti-home"></i>
                                    <span class="text-xs">Villages</span>
                                </a>
                                <a href="https://www.prarang.in/language-webs" target="_blank"
                                    class="flex flex-col items-center justify-center gap-1 px-2 py-2 text-white no-underline bg-green-500 rounded sm:px-1 sm:py-1">
                                    <i class="text-base ti ti-language"></i>
                                    <span class="text-xs">Language</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-two">
                <div class="flex justify-center ">
                    <div class="mt-1 w-full lg:w-[90%] xl:w-[95%] mx-auto grid gap-3  {{ $type === 'village' ? 'grid-cols-1 sm:grid-cols-2 xl:grid-cols-4' : 'grid-cols-1 sm:grid-cols-2 xl:grid-cols-3' }}">
                        {{-- ── Step 1: State ──────────────────────────────────────────── --}}
                        <div
                            class="flex flex-col items-center w-full p-1 transition-all duration-300 bg-white border-yellow-300 shadow-md border-1 rounded-2xl hover:-translate-y-1 hover:border-yellow-400 hover:shadow-xl">
                            <div class="flex flex-col items-center">
                                <div class="space-y-1" x-data="{ open: false, search: '' }">
                                    <div class="flex items-center justify-between ">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="flex items-center justify-center w-8 h-8 rounded-xl shadow-sm {{ $state ? 'bg-emerald-100 text-emerald-600' : 'bg-blue-100 text-blue-600' }} font-bold transition-all duration-300">
                                                @if ($state)
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                                </svg>
                                                @else
                                                01
                                                @endif
                                            </span>
                                            <img class="object-contain w-20 h-20 transition-transform duration-300 group-hover:scale-105"
                                                src="{{ asset('assets/images/filter/state.png') }}" />
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="mt-1 text-xs font-bold text-center text-slate-800">
                                            Select State / UT
                                        </h4>
                                        <p class="mb-2 text-xs text-center text-slate-500">
                                            {{ count($states) }} States / UT Available
                                        </p>
                                    </div>
                                    <div class="relative w-40 mb-1">
                                        <button
                                            type="button"
                                            @click="open = !open"
                                            class="flex items-center justify-between w-full overflow-hidden bg-white border border-yellow-400 rounded-md">
                                            <!-- Selected State -->
                                            <span class="flex-1 px-3 py-1.5 text-xs font-medium text-left truncate {{ $state ? 'text-slate-700' : 'text-slate-400' }}">
                                                @php
                                                $sState = collect($states)->where('id', $state)->first();
                                                echo $sState
                                                ? (is_array($sState)
                                                ? $sState['name'] ?? 'Selected'
                                                : $sState->name ?? 'Selected')
                                                : 'Choose...';
                                                @endphp
                                            </span>
                                            <!-- Yellow Arrow -->
                                            <span class="flex items-center self-stretch justify-center w-8 bg-yellow-400 border-l border-yellow-400 shrink-0">
                                                <svg
                                                    class="w-4 h-4 transition-transform duration-200 text-slate-800"
                                                    :class="open ? 'rotate-180' : ''"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2.5"
                                                        d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </span>
                                        </button>
                                        <div x-show="open" @click.away="open = false" x-cloak
                                            x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            class="absolute z-50 w-full mt-1 overflow-hidden bg-white border shadow-2xl border-slate-100 rounded-2xl">
                                            <div class="relative mb-1">
                                                <input type="text" x-model="search" placeholder="Search states..."
                                                    autocomplete="off"
                                                    class="w-full py-2 pl-10 text-sm font-semibold transition-all border-none outline-none bg-slate-50 rounded-xl focus:ring-2 focus:ring-blue-100">
                                                <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                            </div>
                                            <div class="overflow-y-auto max-h-48 custom-scrollbar-premium">
                                                @forelse($states as $item)
                                                @php $itemName = is_array($item) ? $item['name'] : $item->name; @endphp
                                                <button type="button"
                                                    wire:key="state-{{ is_array($item) ? $item['id'] : $item->id }}"
                                                    x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                                    @click="$wire.set('state', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                                    class="flex items-center justify-between w-full px-2 py-1 text-sm font-semibold text-left transition-all text-slate-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl">
                                                    {{ $itemName }}
                                                </button>
                                                @empty
                                                <div class="px-3 py-2 text-xs font-medium text-slate-400">
                                                    No states found</div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ── Step 2: District ───────────────────────────────────────── --}}
                        <div class="flex flex-col items-center w-full p-1 transition-all duration-300 bg-white border-yellow-300 shadow-md border-1 rounded-2xl hover:-translate-y-1 hover:border-yellow-400 hover:shadow-xl">
                            <div class="flex flex-col items-center">
                                <div class="space-y-1" x-data="{ open: false, search: '' }">
                                    <div class="flex items-center justify-between ">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="flex items-center justify-center w-8 h-8 rounded-xl shadow-sm {{ $district ? 'bg-emerald-100 text-emerald-600' : ($state ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-400') }}">
                                                <div wire:loading wire:target="state">
                                                    <svg class="w-5 h-5 animate-spin" fill="" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4">
                                                        </circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div wire:loading.remove wire:target="state">
                                                    @if($district)
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    @else
                                                    02
                                                    @endif
                                                </div>
                                            </span>
                                            <img class="object-contain w-20 h-20 transition-all duration-300 group-hover:scale-110"
                                                src="{{ asset('assets/images/filter/district.png') }}" />
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="mt-1 text-xs font-bold text-center text-slate-800">
                                            Select District
                                        </h4>
                                        <p class="mb-2 text-xs text-center text-slate-500">
                                            {{ count($districts) }} Districts Available
                                            @if ($type === 'town' && $state && !$district)
                                            <span class="text-blue-400 ">
                                                (Opt.)
                                            </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="relative w-40 mb-1">
                                        <div
                                            x-data="{ open:false, search:'' }"
                                            class="relative w-full">
                                            <button
                                                type="button"
                                                @click="if({{ $state ? 'true' : 'false' }}) open = !open"
                                                {{ !$state ? 'disabled' : '' }}
                                                class="flex w-full items-center justify-between overflow-hidden rounded-md border border-yellow-400 bg-white {{ !$state ? 'opacity-60 cursor-not-allowed bg-slate-100' : '' }}">
                                                <!-- Left Text -->
                                                <span class="flex-1 px-3 py-1.5 text-xs font-medium text-left truncate {{ $district ? 'text-slate-700' : 'text-slate-400' }}">
                                                    @php
                                                    $sDistrict = collect($districts)->where('id', $district)->first();
                                                    echo $sDistrict
                                                    ? (is_array($sDistrict)
                                                    ? $sDistrict['name'] ?? 'Selected'
                                                    : $sDistrict->name ?? 'Selected')
                                                    : ($type === 'town' && $state
                                                    ? 'All Districts...'
                                                    : 'Choose...');
                                                    @endphp
                                                </span>
                                                <!-- Yellow Arrow -->
                                                <span class="flex items-center self-stretch justify-center w-8 bg-yellow-400 border-l border-yellow-400 shrink-0">
                                                    <svg
                                                        class="w-4 h-4 transition-transform duration-200 text-slate-800"
                                                        :class="open ? 'rotate-180' : ''"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2.5"
                                                            d="M19 9l-7 7-7-7" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <div x-show="open" @click.away="open = false" x-cloak
                                                x-transition:enter="transition ease-out duration-200"
                                                x-transition:enter-start="opacity-0 translate-y-2"
                                                x-transition:enter-end="opacity-100 translate-y-0"
                                                class="absolute z-50 w-full mt-1 overflow-hidden bg-white border shadow-2xl border-slate-100 rounded-2xl">
                                                <div class="relative mb-1 ">
                                                    <input type="text" x-model="search" placeholder="Search districts..."
                                                        autocomplete="off"
                                                        class="w-full py-2 pl-10 text-sm font-semibold transition-all border-none outline-none bg-slate-50 rounded-xl focus:ring-2 focus:ring-blue-100">
                                                    <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2.5"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </div>
                                                <div class="overflow-y-auto max-h-48 custom-scrollbar-premium">
                                                    @forelse($districts as $item)
                                                    @php
                                                    $itemName = is_array($item) ? $item['name'] : $item->name;
                                                    @endphp
                                                    <button type="button"
                                                        wire:key="district-{{ is_array($item) ? $item['id'] : $item->id }}"
                                                        x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                                        @click="$wire.set('district', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                                        class="flex items-center justify-between w-full px-2 py-1 text-sm font-semibold text-left transition-all rounded-xl text-slate-700 hover:bg-blue-50 hover:text-blue-700">
                                                        {{ $itemName }}
                                                    </button>
                                                    @empty
                                                    <div class="px-3 py-2 text-xs font-medium text-slate-400">
                                                        Select a state first
                                                    </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ── Step 3 (Village Only): Block ───────────────────────── --}}
                        @if ($type === 'village')
                        <div class="flex flex-col items-center w-full p-1 transition-all duration-300 bg-white border-yellow-300 shadow-md border-1 rounded-2xl hover:-translate-y-1 hover:border-yellow-400 hover:shadow-xl">
                            <div class="flex flex-col items-center">
                                <div class="space-y-1" x-data="{ open: false, search: '' }">
                                    <div class="flex items-center justify-between ">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="flex items-center justify-center w-8 h-8 rounded-xl shadow-sm  {{ $subDistrict ? 'bg-emerald-100 text-emerald-600' : ($district ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-400') }}">
                                                <div wire:loading wire:target="district">
                                                    <svg class="w-5 h-5 animate-spin" fill="" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                            stroke-width="4">
                                                        </circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0  5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
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
                                            <img
                                                class="object-contain w-20 h-20 transition-all duration-300 group-hover:scale-110"
                                                src="{{ asset('assets/images/filter/block.png') }}" />
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="mt-1 text-xs font-bold text-center text-slate-800">
                                            Select Block
                                        </h4>
                                        <p class="mb-2 text-xs text-center text-slate-500">
                                            {{ count($subDistricts) }} Blocks Available
                                        </p>
                                    </div>
                                    <div class="relative w-40 mb-1">
                                        <button
                                            type="button"
                                            @click="if({{ $district ? 'true' : 'false' }}) open = !open"
                                            {{ !$district ? 'disabled' : '' }}
                                            class="flex w-full items-center justify-between overflow-hidden rounded-md border border-yellow-400 bg-white {{ !$district ? 'opacity-60 cursor-not-allowed bg-slate-100' : '' }}">
                                            <!-- Selected Block -->
                                            <span class="flex-1 px-3 py-1.5 text-xs font-medium text-left truncate {{ $subDistrict ? 'text-slate-700' : 'text-slate-400' }}">
                                                @php
                                                $sSubDistrict = collect($subDistricts)->where('id', $subDistrict)->first();
                                                echo $sSubDistrict
                                                ? (is_array($sSubDistrict)
                                                ? $sSubDistrict['name'] ?? 'Selected'
                                                : $sSubDistrict->name ?? 'Selected')
                                                : 'Choose...';
                                                @endphp
                                            </span>
                                            <!-- Yellow Arrow -->
                                            <span class="flex items-center self-stretch justify-center w-8 bg-yellow-400 border-l border-yellow-400 shrink-0">
                                                <svg
                                                    class="w-4 h-4 transition-transform duration-200 text-slate-800"
                                                    :class="open ? 'rotate-180' : ''"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2.5"
                                                        d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </span>
                                        </button>
                                        <div x-show="open" @click.away="open = false" x-cloak
                                            x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            class="absolute z-50 w-full mt-1 overflow-hidden bg-white border shadow-2xl border-slate-100 rounded-2xl">
                                            <div>
                                                <div class="relative mb-1">
                                                    <input type="text" x-model="search" placeholder="Search blocks..."
                                                        autocomplete="off"
                                                        class="w-full py-2 pl-10 text-sm font-semibold transition-all border-none outline-none bg-slate-50 rounded-xl focus:ring-2 focus:ring-blue-100">
                                                    <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="overflow-y-auto max-h-48 custom-scrollbar-premium">
                                                @forelse($subDistricts as $item)
                                                @php
                                                $itemName = is_array($item) ? $item['name'] : $item->name;
                                                @endphp
                                                <button type="button"
                                                    wire:key="subDistrict-{{ is_array($item) ? $item['id'] : $item->id }}"
                                                    x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                                    @click="$wire.set('subDistrict', '{{ is_array($item) ? $item['id'] : $item->id }}'); open = false; search = ''"
                                                    class="flex items-center justify-between w-full px-2 py-1 text-sm font-semibold text-left transition-all rounded-xl text-slate-700 hover:bg-blue-50 hover:text-blue-700">
                                                    {{ $itemName }}
                                                </button>
                                                @empty
                                                <div class="px-3 py-2 text-sm text-slate-400">
                                                    Select a District first
                                                </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- ── Step 3/4 : Village / City ───────────────────────────── --}}
                        <div class="flex flex-col items-center w-full p-1 transition-all duration-300 bg-white border-yellow-300 shadow-md border-1 rounded-2xl hover:-translate-y-1 hover:border-yellow-400 hover:shadow-xl">
                            <div class="flex flex-col items-center">
                                <div class="space-y-1 " x-data=" { open: false, search: '' }">
                                    @php
                                    // For town mode: active once state is selected (district optional)
                                    $stepActive = $type === 'town' ? $state : $subDistrict;
                                    $stepDone = $type === 'town' ? $town : $village;
                                    @endphp
                                    <div class="flex items-center justify-between ">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="flex items-center justify-center w-8 h-8 rounded-xl shadow-sm {{ $stepDone ? 'bg-emerald-100 text-emerald-600' : ($stepActive ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-400') }}">
                                                <div wire:loading
                                                    wire:target="{{ $type === 'town' ? 'state' : 'subDistrict' }}">
                                                    <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div wire:loading.remove
                                                    wire:target="{{ $type === 'town' ? 'state' : 'subDistrict' }}">
                                                    @if($stepDone)
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    @else
                                                    {{ $type === 'town' ? '03' : '04' }}
                                                    @endif
                                                </div>
                                            </span>
                                            <img
                                                class="object-contain w-20 h-20 transition-all duration-300 group-hover:scale-110"
                                                src=" {{ asset($type === 'town' ? 'assets/images/filter/city.png' : 'assets/images/filter/village.png') }}"
                                                alt="{{ $type === 'town' ? 'City' : 'Village' }}">
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="mt-1 text-xs font-bold text-center text-slate-800">
                                            Select
                                            {{ $type === 'town' ? 'City' : 'Village' }}
                                        </h4>
                                        <p class="mb-2 text-xs text-center text-slate-500">
                                            {{ count($type === 'town' ? $towns : $villages) }}
                                            {{ $type === 'town' ? 'Cities' : 'Villages' }}
                                            Available
                                        </p>
                                    </div>
                                    <div class="relative w-40 mb-1">
                                        <button
                                            type="button"
                                            @click="if({{ $stepActive ? 'true' : 'false' }}) open = !open"
                                            {{ !$stepActive ? 'disabled' : '' }}
                                            class="flex w-full items-center justify-between overflow-hidden rounded-md border border-yellow-400 bg-white {{ !$stepActive ? 'opacity-60 cursor-not-allowed bg-slate-100' : '' }}">
                                            <!-- Selected City / Village -->
                                            <span class="flex-1 px-3 py-1.5 text-xs font-medium text-left truncate {{ $stepDone ? 'text-slate-700' : 'text-slate-400' }}">
                                                @if ($type === 'town')
                                                @php
                                                $selectedTown = collect($towns)->where('id', (string)$town)->first();
                                                echo $selectedTown
                                                ? (is_array($selectedTown)
                                                ? $selectedTown['name'] ?? 'Selected'
                                                : $selectedTown->name ?? 'Selected')
                                                : 'Choose...';
                                                @endphp
                                                @else
                                                @php
                                                $selectedVillage = collect($villages)->where('id',(string)$village)->first();
                                                echo $selectedVillage
                                                ? (is_array($selectedVillage)
                                                ? $selectedVillage['name'] ?? 'Selected'
                                                : $selectedVillage->name ?? 'Selected')
                                                : 'Choose...';
                                                @endphp
                                                @endif
                                            </span>
                                            <!-- Yellow Arrow -->
                                            <span class="flex items-center self-stretch justify-center w-8 bg-yellow-400 border-l border-yellow-400 shrink-0">
                                                <svg
                                                    class="w-4 h-4 transition-transform duration-200 text-slate-800"
                                                    :class="open ? 'rotate-180' : ''"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2.5"
                                                        d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </span>
                                        </button>
                                        <div x-show="open" @click.away="open = false" x-cloak
                                            x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            class="absolute z-50 w-full mt-1 overflow-hidden bg-white border shadow-2xl border-slate-100 rounded-2xl">
                                            <div class="border-b border-slate-100 bg-slate-50">
                                                <div class="relative mb-1">
                                                    <input type="text" x-model="search"
                                                        placeholder="Search {{ $type === 'town' ? 'cities' : 'villages' }}..."
                                                        autocomplete="off"
                                                        class="w-full py-2 pl-10 pr-4 text-sm font-semibold bg-white border-none outline-none rounded-xl focus:ring-2 focus:ring-blue-100">
                                                    <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2.5"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="overflow-y-auto max-h-48 custom-scrollbar-premium">
                                                @php
                                                $items = $type === 'town' ? $towns : $villages;
                                                @endphp
                                                @forelse($items as $item)
                                                @php
                                                $itemId = is_array($item) ? $item['id'] : $item->id;
                                                $itemName = is_array($item) ? $item['name'] : $item->name;
                                                $parts = explode('|', $itemName);
                                                @endphp
                                                <button type="button" wire:key="{{ $type }}-{{ $itemId }}"
                                                    x-show="'{{ strtolower($itemName) }}'.includes(search.toLowerCase())"
                                                    @click="$wire.set('{{ $type === 'town' ? 'town' : 'village' }}','{{ $itemId }}'); open = false; search = ''"
                                                    class="flex items-center justify-between w-full px-2 py-1 text-sm font-semibold text-left transition-all rounded-xl text-slate-700 hover:bg-blue-50 hover:text-blue-700">
                                                    <span>{{ $parts[0] }}</span>
                                                    @if(isset($parts[1]))
                                                    <span class="text-xs text-slate-400">
                                                        {{ $parts[1] }}
                                                    </span>
                                                    @endif
                                                </button>
                                                @empty
                                                <div class="px-3 py-2 text-sm font-medium text-slate-400">
                                                    @if($type === 'town')
                                                    Select a state first
                                                    @else
                                                    Select a block first
                                                    @endif
                                                </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ── Confirm Selection ───────────────────────────────────────── --}}
                @if (
                ($type === 'town' ? $town : $village) &&
                !($selected_sc || $selected_dhq || $selected_ua || $selected_mcp || $selected_smc)
                )
                @php
                // Build URL segment — handle composite town key "districtId-townId"
                if ($type === 'town' && $town && str_contains($town, '-')) {
                [$urlDistrict, $urlTown] = explode('-', $town, 2);
                } else {
                $urlDistrict = $district;
                $urlTown = $town;
                }
                $confirmUrl =
                url('/') .
                '/' .
                ($type === 'town' ? 'city' : 'village') .
                '/' .
                url_encoder(
                $state . '-' . $urlDistrict . '-' . ($type === 'town' ? $urlTown : $village),
                ) .
                '/' .
                $this->selectedSlug;
                $selectedState = collect($states)->firstWhere('id', $state);
                $selectedDistrict = collect($districts)->firstWhere('id', $district);
                $selectedBlock = collect($subDistricts)->firstWhere('id', $subDistrict);
                $selectedLocation = $type === 'town'
                ? collect($towns)->firstWhere('id', (string) $town)
                : collect($villages)->firstWhere('id', (string) $village);
                $stateName = is_array($selectedState)
                ? ($selectedState['name'] ?? '-')
                : ($selectedState->name ?? '-');
                $districtName = is_array($selectedDistrict)
                ? ($selectedDistrict['name'] ?? '-')
                : ($selectedDistrict->name ?? '-');
                $blockName = is_array($selectedBlock)
                ? ($selectedBlock['name'] ?? '-')
                : ($selectedBlock->name ?? '-');
                $locationName = is_array($selectedLocation)
                ? ($selectedLocation['name'] ?? '-')
                : ($selectedLocation->name ?? '-');
                @endphp
                <div class="flex justify-end mt-2">
                    <div class="w-full transition-all duration-500 scale-100 opacity-100 sm:w-auto">
                        <a target="_blank" href="{{ $confirmUrl }}"
                            class="inline-flex items-center justify-center px-2 py-1 text-sm font-black text-white no-underline transition-all bg-blue-600 rounded hover:bg-blue-700">
                            @if($type === 'town')
                            Enter City Web
                            @else
                            Enter Village Web
                            @endif
                        </a>
                    </div>
                </div>
                @endif
            </section>
            <hr>
            <section class=" section-three">
                @if ($type === 'town')
                <div class="flex items-center justify-center gap-1">
                    <div class="relative w-20 h-20 shrink-0">
                        <img
                            src="{{ asset('assets/images/sticker.png') }}"
                            alt="Sticker"
                            class="w-full h-full">
                        <span class="absolute inset-0 flex items-center pl-6 text-xs font-bold text-black ">
                            &nbsp;756 <br>Webs
                        </span>
                    </div>
                    <h2 class="pt-3 text-lg font-semibold tracking-tight text-center text-blue-800 sm:text-xl lg:text-xl">
                        State & District Capital
                    </h2>
                </div>
                <div class="space-y-2" x-data="{ open: false, search: '' }">
                    <div class="relative w-full border-yellow-500 sm:w-56 border-1 rounded-xl">
                        <button
                            type="button"
                            @click="open = !open"
                            class="relative w-full overflow-hidden transition-all duration-300 bg-white border group rounded-xl border-slate-200 hover:border-yellow-500 hover:shadow-md">
                            <div class="flex items-center justify-between px-3 py-2">
                                <div class="flex items-center">
                                    <div class="text-left">
                                        <div class="text-xs tracking-wider uppercase text-slate-400">
                                            State / UT
                                        </div>
                                        <div class="font-semibold {{ $cat_state ? 'text-slate-800' : 'text-slate-400' }}">
                                            {{ $cat_state ? collect($states)->where('id', $cat_state)->first()->name ?? 'Selected' : 'Choose State...' }}
                                        </div>
                                    </div>
                                </div>
                                <svg
                                    class="w-5 h-5 text-black transition-transform duration-300 "
                                    :class="open ? 'rotate-180' : ''"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2.5"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </button>
                        <div x-show="open" @click.away="open = false" x-cloak x-transition
                            class="absolute z-50 w-full mt-1 overflow-hidden bg-white border shadow-2xl rounded-2xl border-slate-200 ring-1 ring-black/5 backdrop-blur-sm">
                            <div class="relative ">
                                <input type="text" x-model="search" placeholder="Search..."
                                    class="w-full py-2 pr-4 text-sm font-medium transition-all duration-200 border-none outline-none rounded-xl bg-slate-50 pl-9 focus:bg-white focus:ring-2 focus:ring-blue-100">
                                <svg class="absolute left-2.5 top-2 w-3.5 h-3.5 text-slate-400"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2.5"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <div class="overflow-y-auto max-h-48 custom-scrollbar-premium">
                                @foreach ($states as $item)
                                <button type="button"
                                    x-show="'{{ strtolower($item->name) }}'.includes(search.toLowerCase())"
                                    @click="$wire.set('cat_state', '{{ $item->id }}'); open = false; search = ''"
                                    class="flex items-center w-full px-2 py-1 text-sm font-semibold text-left transition-all duration-200 rounded-xl text-slate-700 hover:translate-x-1 hover:bg-blue-50 hover:text-blue-700">
                                    {{ $item->name }}
                                </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <span class="pt-2 text-sm text-slate-400">Select <span class="text-red-700" text-semibold>One</span> (out of 5) Categories</span>
                <div class="grid grid-cols-1 gap-2 mt-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                    <x-filter-card title="01. State Capital" image="assets/images/filter/state-capital.png"
                        model="selected_sc" :selected="$selected_sc ? collect($sc)->where('id', $selected_sc)->first()->name ?? null : null" :options="$sc" placeholder="Choose..."
                        :disabled="!$cat_state" :count="count($sc)" />
                    <x-filter-card title="02. District Capital (DHQ)" image="assets/images/filter/district-hq.png"
                        model="selected_dhq" :selected="$selected_dhq ? collect($dhq)->where('id', $selected_dhq)->first()->name ?? null : null" :options="$dhq" placeholder="Choose..."
                        :disabled="!$cat_state" :count="count($dhq)" />
                    <x-filter-card title="03. Urban Agglomeration" image="assets/images/filter/urban-agglomeration.png"
                        model="selected_ua" :selected="$selected_ua ? collect($ua)->where('id', $selected_ua)->first()->name ?? null : null" :options="$ua" placeholder="Choose..."
                        :disabled="!$cat_state" :count="count($ua)" />
                    <x-filter-card title="04. Municipal Corporation" image="assets/images/filter/municipal-corporation.png"
                        model="selected_mcp" :selected="$selected_mcp ? collect($mcp)->where('id', $selected_mcp)->first()->name ?? null : null" :options="$mcp" placeholder="Choose..."
                        :disabled="!$cat_state" :count="count($mcp)" />
                    <x-filter-card title="05. Smart City" image="assets/images/filter/smart-city.png" model="selected_smc"
                        :selected="$selected_smc ? collect($smc)->where('id', $selected_smc)->first()->name ?? null : null" :options="$smc" placeholder="Choose..." :disabled="!$cat_state" :count="count($smc)" />
                </div>
                {{-- Confirm button for category selection --}}
                @php
                // Categorised selections always carry district embedded in $town
                if ($town && str_contains($town, '-')) {
                [$catDistrict, $catTown] = explode('-', $town, 2);
                } else {
                $catDistrict = $district;
                $catTown = $town;
                }
                @endphp
                @if($cat_state &&
                ($selected_sc || $selected_dhq || $selected_ua || $selected_mcp || $selected_smc)
                )
                <div class="flex justify-end mt-2">
                    <a
                        target="_blank"
                        href="{{ url('/') }}/city/{{ url_encoder($cat_state . '-' . $catDistrict . '-' . $catTown) }}/{{ $this->selectedSlug }}"
                        class="inline-flex items-center justify-center px-2 py-1 text-sm font-black text-white no-underline transition-all bg-blue-600 rounded-xl no-underlinerounded hover:bg-blue-700">
                        Confirm Selection
                    </a>
                </div>
                @endif
                @endif
            </section>
        </div>
    </div>
    @if ($type === 'town')
    <div class="pt-4 text-center">
        <h2 class="text-xl tracking-tighter text-blue-700 md:text-xl">
            List of <span
                class="text-red-700 font-extrabold text-[1.25rem] md:text-[1.375rem]">114</span>
            Non-State/District Capital Cities of India
            <span class="text-black">(with Population 100K+)
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#box25l"
                    class="inline-block px-1 text-sm text-white no-underline bg-red-500 border border-red-500 rounded hover:text-blue-800">
                    Click Here</a>
            </span>
        </h2>
    </div>
    @endif
    <div class="modal fade" id="box25l" tabindex="-1" aria-labelledby="box25lLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="box25Label">India-Big non District Capital Cities
                        >1 Lakh
                        Population</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        There are more than 800 districts in India as of 2026. A District Headquarters,
                        also known as a
                        District Capital, is the main administrative centre of a district. Each district
                        has its own
                        headquarters, serving as the administrative centre for the district. </p>
                    <p>According to the Prarang database, there are 756 District Capitals, of which 373
                        have a
                        population greater than 1 lakh. This data is based on estimates for 2023,
                        derived from the 2011
                        Census by the Government of India and population growth rates. </p>
                    <p>As per the 2011 Census by the Government of India, there were 640 districts in
                        India, and of
                        these, 593 districts had a population of more than 1 lakh.</p>
                    <p>
                        Here is a list of those cities that have a population of more than 1 Lakh, but
                        they are neither
                        District Capitals nor State Capitals.
                    </p>
                    <img class="m-3 responsive img-fluid "
                        src="https://prarang.s3.amazonaws.com/posts-2017-24/abc_cropped_page-0001.jpg">
                    <img class=" responsive img-fluid"
                        src="https://prarang.s3.amazonaws.com/posts-2017-24/abc_cropped_page-0002.jpg">
                    <img class=" responsive img-fluid"
                        src="https://prarang.s3.amazonaws.com/posts-2017-24/abc_cropped_page-0003.jpg">
                </div>
                <div class="ps-3">
                    <ul>
                        <li><b>Mother Tongue</b> is the most widely spoken language in the city.</li>
                        <li><b>Language 1</b> is the second most spoken language, following the Mother
                            Tongue.
                        </li>
                        <li> <b>Language 2</b> ranks third in terms of the number of speakers, after
                            Language 1.
                        </li>
                        <li><b>Language 3</b> is the fourth most spoken language, coming after Language
                            2.
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div> <!-- page-wrapper -->
