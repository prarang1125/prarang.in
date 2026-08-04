{{-- livewire/pages/country-filter.blade.php --}}
<div>
    <div class="text-center ">
        <div class="flex items-center justify-center ">
            <div class="relative w-24 h-24 shrink-0">
                <img
                    src="{{ asset('assets/images/sticker.png') }}"
                    alt="Sticker"
                    class="w-full h-full">
                <span class="absolute inset-0 flex items-center pl-8 text-xs font-extrabold text-black md:mt-1">
                    194 <br>Webs
                </span>
            </div>
            <h2 class="pt-3 text-xl font-semibold tracking-tighter text-blue-800 md:text-xl">
                India Bilateral - Website of Websites
            </h2>
        </div>
    </div>
    {{-- cards --}}
    <div class="flex justify-center">
        <div class="w-full lg:w-[90%] xl:w-[95%]">
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-4">
                <div class="hidden xl:block"></div>
                {{-- ── Step 1 : Continent ── --}}
                <div class="space-y-1" x-data="{ open: false, search: '' }">
                    <div
                        class="w-full p-2 transition-all duration-300 bg-white border-yellow-300 border-1 shadow-400 rounded-2xl hover:border-yellow-400 hover:shadow-md">
                        <div class="flex flex-col items-center w-full">
                            <img src="{{ asset('assets/images/filter/continent.png') }}"
                                class="object-contain w-16 h-16 transition-all duration-300 group-hover:scale-110">
                            <h3 class="text-sm font-bold text-center text-slate-800">
                                Select Continent
                            </h3>
                            <p class="text-xs font-semibold">
                                Total : {{ count($continents) }}
                            </p>
                            {{-- Trigger button --}}
                            <!-- <div class="relative w-full "> -->
                            <div class="relative w-40 mb-1">
                                <button
                                    type="button"
                                    @click="open = !open"
                                    class="flex items-center justify-between w-full overflow-hidden bg-white border border-yellow-400 rounded-md">
                                    <!-- Selected Text -->
                                    <span class="flex-1 px-3 py-1.5 text-xs font-medium text-left truncate
        {{ $selectedContinent ? 'text-slate-700' : 'text-slate-400' }}">
                                        {{ $selectedContinent ?? 'Choose...' }}
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
                                {{-- Dropdown --}}
                                <div x-show="open" @click.away="open = false" x-cloak
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    class="absolute left-0 z-50 w-full overflow-hidden bg-white border shadow-2xl top-full border-slate-100 rounded-2xl">
                                    {{-- Search --}}
                                    <div class="relative mb-1">
                                        <input type="text" x-model="search" placeholder="Search continent..."
                                            autocomplete="off"
                                            class="w-full py-1 pl-10 pr-4 text-sm font-semibold transition-all border-none outline-none bg-slate-50 rounded-xl focus:ring-2 focus:ring-blue-100">
                                        <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <div class="overflow-y-auto max-h-40 custom-scrollbar-premium">
                                        @forelse($continents as $continent)
                                        <button type="button"
                                            wire:key="continent-{{ $continent }}"
                                            x-show="'{{ strtolower($continent) }}'.includes(search.toLowerCase())"
                                            @click="$wire.set('selectedContinent', '{{ $continent }}'); open = false; search = ''"
                                            class="w-full px-4 py-1 text-sm font-bold text-left transition-all duration-200 rounded-xl text-slate-700 hover:bg-blue-600 hover:text-white">
                                            {{ $continent }}
                                            <span class="ml-1 text-xs font-normal opacity-60">
                                                ({{ count($data[$continent]) }})
                                            </span>
                                        </button>
                                        @empty
                                        <div class="px-4 py-3 text-sm font-medium text-slate-400">No continents found</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ── Step 2 : Country ── --}}
                <div class="space-y-1" x-data="{ open: false, search: '' }">
                    <div
                        class="w-full p-2 transition-all duration-300 bg-white border-yellow-300 border-1 shadow-400 rounded-2xl hover:border-yellow-400 hover:shadow-md">
                        <div class="flex flex-col items-center w-full">
                            <img src="{{ asset('assets/images/filter/country.png') }}"
                                class="object-contain w-16 h-16 transition-all duration-300 group-hover:scale-110">
                            <h3 class="text-sm font-bold text-center text-slate-800">
                                Select Country
                            </h3>
                            <p class="text-xs font-semibold">
                                Total : {{ count($filteredCountries) }}
                            </p>
                            {{-- Trigger button --}}
                            <!-- <div class="relative w-full "> -->
                            <div class="relative w-40 mb-1">
                                <button
                                    type="button"
                                    @click="if({{ $selectedContinent ? 'true' : 'false' }}) open = !open"
                                    {{ !$selectedContinent ? 'disabled' : '' }}
                                    class="flex items-center justify-between w-full overflow-hidden bg-white border border-yellow-400 rounded-md {{ !$selectedContinent ? 'opacity-60 cursor-not-allowed bg-slate-100' : '' }}">
                                    <!-- Selected Country -->
                                    <span class="flex-1 px-3 py-1.5 text-xs font-medium text-left truncate {{ $selectedCountryId ? 'text-slate-700' : 'text-slate-400' }}">
                                        @php
                                        $selectedCountry = collect($filteredCountries)
                                        ->firstWhere('id', $selectedCountryId);
                                        @endphp
                                        {{ $selectedCountry ? $selectedCountry['Country'] : 'Choose...' }}
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
                                {{-- Dropdown --}}
                                <div x-show="open" @click.away="open = false" x-cloak
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    class="absolute left-0 z-50 w-full overflow-hidden bg-white border shadow-2xl top-full border-slate-100 rounded-2xl">
                                    {{-- Search --}}
                                    <div class="relative mb-1">
                                        <input type="text" x-model="search" placeholder="Search country..."
                                            autocomplete="off"
                                            class="w-full py-1 pl-10 pr-4 text-sm font-semibold transition-all border-none outline-none bg-slate-50 rounded-xl focus:ring-2 focus:ring-blue-100">
                                        <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <div class="h-40 overflow-y-auto custom-scrollbar-premium">
                                        @forelse($filteredCountries as $country)
                                        <button type="button"
                                            wire:key="country-{{ $country['id'] }}"
                                            x-show="'{{ strtolower($country['Country']) }}'.includes(search.toLowerCase())"
                                            @click="$wire.set('selectedCountryId', {{ $country['id'] }}); open = false; search = ''"
                                            class="w-full px-4 py-1 text-sm font-bold text-left transition-all duration-200 rounded-xl text-slate-700 hover:bg-blue-600 hover:text-white">
                                            {{ $country['Country'] }}
                                        </button>
                                        @empty
                                        <div class="px-4 py-3 text-sm font-medium text-slate-400">
                                            Select a continent first
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden xl:block"></div>
            </div>
            {{-- Confirm Button  --}}
            @if($selectedCountryId)
            <div class="mt-2 border-t border-slate-100">
                <div class="grid justify-center mt-2">
                    <div class="w-full transition-all duration-500 scale-100 opacity-100 sm:w-auto">
                        <a
                            target="_blank"
                            href="{{ url('/') }}/{{ $selectedIs }}"
                            class="inline-flex items-center justify-center px-2 py-1 text-sm font-black text-white no-underline transition-all bg-blue-600 rounded-xl hover:bg-blue-700">
                            Confirm Selection
                            <svg class="w-5 h-5 transition-transform group-hover:translate-x-1"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
