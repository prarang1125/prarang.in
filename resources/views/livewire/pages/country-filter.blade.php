{{-- livewire/pages/country-filter.blade.php --}}
<div class="pb-4 text-center">

    {{-- ── Header ── --}}
    <h2 class="text-xl md:text-xl text-slate-800 tracking-tighter mb-2">
        Explore India's Connection with
        <span class="text-blue-700 font-extrabold text-[20px] md:text-[22px]">
            {{ collect($data)->flatten(1)->count() }}
        </span>
        Countries of the World
    </h2>

    {{-- ── 2-Step Filter Grid ── --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4 mt-6">

        {{-- ── Step 1 : Continent ── --}}
        <div class="space-y-3" x-data="{ open: false, search: '' }">

            {{-- Step badge + label --}}
            <div class="flex items-center gap-3 mb-2">
                <span class="flex items-center justify-center w-8 h-8 rounded-xl
                    {{ $selectedContinent ? 'bg-green-100 text-green-600' : 'bg-blue-100 text-blue-600' }}
                    font-bold text-sm transition-colors duration-300">
                    @if($selectedContinent)
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    @else
                        01
                    @endif
                </span>
                <label class="text-sm font-bold text-slate-500 uppercase tracking-widest">
                    Select Continent
                    @if(count($continents))
                        <span class="text-blue-600">#{{ count($continents) }}</span>
                    @endif
                </label>
            </div>

            {{-- Trigger button --}}
            <div class="relative">
                <button type="button" @click="open = !open"
                    class="w-full flex items-center justify-between px-5 py-4 bg-slate-50 border-2
                        {{ $selectedContinent ? 'border-blue-200 bg-white' : 'border-slate-100' }}
                        rounded-2xl hover:border-blue-400 hover:bg-white transition-all duration-300 group">
                    <span class="text-[15px] font-bold
                        {{ $selectedContinent ? 'text-slate-900' : 'text-slate-400' }} truncate">
                        {{ $selectedContinent ?? 'Choose a continent...' }}
                    </span>
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 transition-transform duration-300"
                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                {{-- Dropdown --}}
                <div x-show="open" @click.away="open = false" x-cloak
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-2xl shadow-2xl p-3 overflow-hidden">

                    {{-- Search --}}
                    <div class="relative mb-3">
                        <input type="text" x-model="search" placeholder="Search continent..."
                            autocomplete="off"
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm
                                   font-semibold focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                        <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <div class="max-h-60 overflow-y-auto custom-scrollbar-premium">
                        @forelse($continents as $continent)
                            <button type="button"
                                wire:key="continent-{{ $continent }}"
                                x-show="'{{ strtolower($continent) }}'.includes(search.toLowerCase())"
                                @click="$wire.set('selectedContinent', '{{ $continent }}'); open = false; search = ''"
                                class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-bold
                                       text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200">
                                {{ $continent }}
                                <span class="text-xs font-normal opacity-60 ml-1">
                                    ({{ count($data[$continent]) }})
                                </span>
                            </button>
                        @empty
                            <div class="px-4 py-3 text-sm text-slate-400 font-medium">No continents found</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Step 2 : Country ── --}}
        <div class="space-y-3" x-data="{ open: false, search: '' }">

            {{-- Step badge + label --}}
            <div class="flex items-center gap-3 mb-2">
                <span class="flex items-center justify-center w-8 h-8 rounded-xl
                    {{ $selectedCountryId
                        ? 'bg-green-100 text-green-600'
                        : ($selectedContinent ? 'bg-blue-100 text-blue-600' : 'bg-slate-100 text-slate-300') }}
                    font-bold text-sm transition-colors duration-300">

                    {{-- Spinner while continent loads --}}
                    <div wire:loading wire:target="selectedContinent">
                        <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2
                                   5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824
                                   3 7.938l3-2.647z"></path>
                        </svg>
                    </div>

                    <div wire:loading.remove wire:target="selectedContinent">
                        @if($selectedCountryId)
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        @else
                            02
                        @endif
                    </div>
                </span>

                <label class="text-sm font-bold text-slate-500 uppercase tracking-widest">
                    Select Country
                    @if(count($filteredCountries))
                        <span class="text-blue-600">#{{ count($filteredCountries) }}</span>
                    @endif
                </label>
            </div>

            {{-- Trigger button --}}
            <div class="relative">
                <button type="button"
                    @click="if({{ $selectedContinent ? 'true' : 'false' }}) open = !open"
                    {{ !$selectedContinent ? 'disabled' : '' }}
                    class="w-full flex items-center justify-between px-5 py-4 bg-slate-50 border-2
                        {{ $selectedCountryId
                            ? 'border-blue-200 bg-white'
                            : ($selectedContinent ? 'border-slate-100' : 'border-slate-50 opacity-50') }}
                        rounded-2xl
                        {{ $selectedContinent ? 'hover:border-blue-400 hover:bg-white' : 'cursor-not-allowed' }}
                        transition-all duration-300 group">
                    <span class="text-[15px] font-bold
                        {{ $selectedCountryId ? 'text-slate-900' : 'text-slate-400' }} truncate">
                        @php
                            $selectedCountry = collect($filteredCountries)
                                ->firstWhere('id', $selectedCountryId);
                        @endphp
                        {{ $selectedCountry ? $selectedCountry['Country'] : 'Choose a country...' }}
                    </span>
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500 transition-transform duration-300"
                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                {{-- Dropdown --}}
                <div x-show="open" @click.away="open = false" x-cloak
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="absolute z-50 w-full mt-2 bg-white border border-slate-100 rounded-2xl shadow-2xl p-3 overflow-hidden">

                    {{-- Search --}}
                    <div class="relative mb-3">
                        <input type="text" x-model="search" placeholder="Search country..."
                            autocomplete="off"
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm
                                   font-semibold focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                        <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <div class="max-h-60 overflow-y-auto custom-scrollbar-premium">
                        @forelse($filteredCountries as $country)
                            <button type="button"
                                wire:key="country-{{ $country['id'] }}"
                                x-show="'{{ strtolower($country['Country']) }}'.includes(search.toLowerCase())"
                                @click="$wire.set('selectedCountryId', {{ $country['id'] }}); open = false; search = ''"
                                class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-bold
                                       text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200">
                                {{ $country['Country'] }}
                            </button>
                        @empty
                            <div class="px-4 py-3 text-sm text-slate-400 font-medium">
                                Select a continent first
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- /grid --}}

    {{-- ── Confirm Button (shows after country selected) ── --}}
    @if($selectedCountryId)
        <div class="mt-12 pt-8 border-t border-slate-100">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="text-sm text-slate-500 font-medium">

                </div>

                <div class="w-full sm:w-auto transition-all duration-500 opacity-100 scale-100">
                    <a target="_blank"
                        href="{{ url('/') }}/{{ $selectedIs }}"
                        class="inline-flex items-center justify-center w-full sm:w-auto px-10 py-4
                               bg-blue-600 text-white font-black text-sm tracking-[0.1em] uppercase
                               rounded-2xl shadow-xl shadow-blue-200 hover:bg-blue-700 hover:shadow-blue-300
                               hover:-translate-y-1 active:scale-95 transition-all duration-300 gap-3 group">
                        Confirm Selection
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    @endif

</div>
