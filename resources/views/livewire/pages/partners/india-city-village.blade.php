<x-partners.city-village-frame>
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold text-red-600 border-b-2 border-red-600 pb-1 mb-0 inline-block">
            1. Select Your Target KW Geographies
        </p>
        <p class="text-sm text-gray-600 m-0">
            (Select from 6,331 Indian Cities and 592,765 Indian Villages)

        </p>
    </div>
    @endsection

    <div class=" p-4 sm:p-6 lg:p-8">

        <!-- Towns / Cities Section -->
        <!-- Towns / Cities Section -->
        <div class="">
            <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2">
                <span
                    class="bg-blue-100 text-blue-700 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold shadow-sm ring-2 ring-blue-200">A</span>
                <span class="tracking-wide">Select Cities</span>
            </h3>

            <div class="grid gap-4 lg:grid-cols-4">
                <div
                    class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative hover:border-blue-300 hover:shadow-md transition-all duration-200">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400 flex justify-between items-center mb-1">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            State
                        </span>
                    </div>
                    <select wire:model.live="townState" wire:loading.attr="disabled"
                        class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 disabled:opacity-50 disabled:cursor-wait">
                        <option value="">Select a state</option>
                        @foreach ($states as $stateItem)
                        <option value="{{ $stateItem['id'] }}">{{ $stateItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative hover:border-blue-300 hover:shadow-md transition-all duration-200">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400 flex justify-between items-center mb-1">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            District
                        </span>
                        <div wire:loading wire:target="townState" class="spinner-border spinner-border-sm text-blue-500"
                            role="status" aria-hidden="true"></div>
                    </div>
                    <select wire:model.live="townDistrict" @disabled(!$townState) wire:loading.attr="disabled"
                        wire:target="townState, townDistrict"
                        class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 disabled:cursor-not-allowed disabled:bg-slate-100 disabled:opacity-50">
                        <option value="">Select a district</option>
                        @foreach ($townDistricts as $districtItem)
                        <option value="{{ $districtItem['id'] }}">{{ $districtItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative hover:border-blue-300 hover:shadow-md transition-all duration-200">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400 flex justify-between items-center mb-1">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Category
                        </span>
                    </div>
                    <select wire:model.live="townCityType" @disabled(empty($townState)) wire:loading.attr="disabled"
                        wire:target="townState, townCityType"
                        class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100 disabled:cursor-not-allowed disabled:bg-slate-100 disabled:opacity-50">
                        <option value="">All City Types</option>
                        <option value="is_sc">State Capital</option>
                        <option value="is_dhq">District Capital (DHQ)</option>
                        <option value="is_ua">Urban Agglomeration</option>
                        <option value="is_mcp">Municipal Corporation</option>
                        <option value="is_smc">Smart City</option>
                    </select>
                </div>

                <div class="rounded-2xl border border-blue-200 bg-gradient-to-b from-blue-50/30 to-blue-50/60 p-4 shadow-sm relative z-30"
                    wire:key="town-picker-{{ $townState }}-{{ $townDistrict }}-{{ $townCityType }}">
                    <div class="flex items-center justify-between gap-3">
                        <div
                            class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span>Cities</span>
                            <div wire:loading wire:target="townState, townDistrict, townCityType"
                                class="spinner-border spinner-border-sm text-blue-600" role="status" aria-hidden="true">
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-1.5 rounded-full bg-blue-600 px-3 py-1 text-[10px] font-bold text-white shadow-sm ring-2 ring-blue-200">
                            <span wire:loading wire:target="toggleTownSelection, removeTownSelection"
                                class="spinner-border spinner-border-sm"></span>
                            <span wire:loading.remove wire:target="toggleTownSelection, removeTownSelection"># {{
                                count($selectedTownIds) }}</span>
                        </div>
                    </div>

                    <div class="mt-2 relative" x-data="{ open: false, search: '' }">
                        <button type="button" @click="open = !open"
                            class="flex w-full items-center justify-between rounded-xl border border-blue-200 bg-white px-3 py-2.5 text-left text-sm font-semibold text-slate-700 shadow-sm transition hover:border-blue-400 hover:shadow-md active:scale-[0.99]">
                            <span class="truncate">
                                @if (count($selectedTownIds))
                                <span class="text-blue-700">{{ count($selectedTownIds) }} towns selected</span>
                                @else
                                <span class="text-slate-400 font-normal">Search towns/cities</span>
                                @endif
                            </span>
                            <svg class="h-4 w-4 text-blue-500 transition-transform duration-200 flex-shrink-0"
                                :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-cloak x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute z-50 top-full left-0 right-0 mt-2 rounded-2xl border border-blue-100 bg-white p-3 shadow-2xl origin-top">
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-slate-400 pointer-events-none"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <input type="text" x-model="search" placeholder="Search towns or cities"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 pl-8 pr-3 py-2 text-sm outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">
                            </div>

                            <div class="mt-3 max-h-56 space-y-1.5 overflow-y-auto pr-1">
                                @forelse ($towns as $townItem)
                                <button type="button" wire:key="town-btn-{{ $townItem['id'] }}"
                                    x-show="!search || @js($townItem['search']).includes(search.toLowerCase())"
                                    wire:click.prevent="toggleTownSelection('{{ $townItem['id'] }}')"
                                    class="flex w-full items-center justify-between rounded-xl border px-3 py-2 text-left text-sm transition-all duration-150 {{ in_array($townItem['id'], $selectedTownIds) ? 'border-blue-400 bg-blue-50 text-blue-700 shadow-sm' : 'border-slate-200 bg-white text-slate-700 hover:border-blue-300 hover:bg-blue-50/40' }}">
                                    <span class="pr-3 font-medium">{{ $townItem['name'] }}</span>
                                    <div
                                        class="flex items-center justify-center w-4 h-4 rounded border flex-shrink-0 transition-colors {{ in_array($townItem['id'], $selectedTownIds) ? 'bg-blue-500 border-blue-500 text-white' : 'border-slate-300 bg-white' }}">
                                        @if(in_array($townItem['id'], $selectedTownIds))
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        @endif
                                    </div>
                                </button>
                                @empty
                                <div
                                    class="rounded-xl border border-dashed border-slate-200 px-3 py-6 text-center text-xs text-slate-400">
                                    <svg class="w-6 h-6 mx-auto mb-2 text-slate-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5" />
                                    </svg>
                                    Select a state and district to load cities.
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    @if (!empty($selectedTownItems ?? []))
                    <div class="mt-3 flex flex-wrap gap-1.5 max-h-24 overflow-y-auto">
                        @foreach ($selectedTownItems ?? [] as $selectedTown)
                        <span
                            class="inline-flex items-center gap-1 rounded-lg border border-blue-200 bg-blue-50 px-2 py-0.5 text-xs font-semibold text-blue-700 shadow-sm">
                            {{ $selectedTown['name'] }}
                            <button type="button" wire:click="removeTownSelection('{{ $selectedTown['id'] }}')"
                                class="ml-0.5 flex items-center justify-center w-3.5 h-3.5 rounded-full text-blue-400 hover:bg-blue-200 hover:text-blue-700 transition">&times;</button>
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Villages Section -->
        <div class="mt-6 min-h-[350px]">
            <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2">
                <span
                    class="bg-emerald-100 text-emerald-700 w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold shadow-sm ring-2 ring-emerald-200">B</span>
                <span class="tracking-wide">Select Villages</span>
            </h3>

            <div class="grid gap-4 lg:grid-cols-4">
                <div
                    class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative hover:border-emerald-300 hover:shadow-md transition-all duration-200">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400 flex justify-between items-center mb-1">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            State
                        </span>
                    </div>
                    <select wire:model.live="villageState" wire:loading.attr="disabled"
                        class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-100 disabled:opacity-50 disabled:cursor-wait">
                        <option value="">Select a state</option>
                        @foreach ($states as $stateItem)
                        <option value="{{ $stateItem['id'] }}">{{ $stateItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative hover:border-emerald-300 hover:shadow-md transition-all duration-200">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400 flex justify-between items-center mb-1">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            District
                        </span>
                        <div wire:loading wire:target="villageState"
                            class="spinner-border spinner-border-sm text-emerald-500" role="status" aria-hidden="true">
                        </div>
                    </div>
                    <select wire:model.live="villageDistrict" @disabled(!$villageState) wire:loading.attr="disabled"
                        wire:target="villageState, villageDistrict"
                        class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-100 disabled:cursor-not-allowed disabled:bg-slate-100 disabled:opacity-50">
                        <option value="">Select a district</option>
                        @foreach ($villageDistricts as $districtItem)
                        <option value="{{ $districtItem['id'] }}">{{ $districtItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div
                    class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative hover:border-emerald-300 hover:shadow-md transition-all duration-200">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400 flex justify-between items-center mb-1">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            Sub-district
                        </span>
                        <div wire:loading wire:target="villageState, villageDistrict"
                            class="spinner-border spinner-border-sm text-emerald-500" role="status" aria-hidden="true">
                        </div>
                    </div>
                    <select wire:model.live="villageSubDistrict" @disabled(!$villageDistrict)
                        wire:loading.attr="disabled" wire:target="villageState, villageDistrict, villageSubDistrict"
                        class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-100 disabled:cursor-not-allowed disabled:bg-slate-100 disabled:opacity-50">
                        <option value="">Select a sub-district</option>
                        @foreach ($villageSubDistricts as $subDistrictItem)
                        <option value="{{ $subDistrictItem['id'] }}">{{ $subDistrictItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="rounded-2xl border border-emerald-200 bg-gradient-to-b from-emerald-50/30 to-emerald-50/60 p-4 shadow-sm relative z-20"
                    wire:key="village-picker-{{ $villageState }}-{{ $villageDistrict }}-{{ $villageSubDistrict }}">
                    <div class="flex items-center justify-between gap-3">
                        <div
                            class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>Villages</span>
                            <div wire:loading wire:target="villageState, villageDistrict, villageSubDistrict"
                                class="spinner-border spinner-border-sm text-emerald-600" role="status"
                                aria-hidden="true"></div>
                        </div>
                        <div
                            class="flex items-center gap-1.5 rounded-full bg-emerald-600 px-3 py-1 text-[10px] font-bold text-white shadow-sm ring-2 ring-emerald-200">
                            <span wire:loading wire:target="toggleVillageSelection, removeVillageSelection"
                                class="spinner-border spinner-border-sm"></span>
                            <span wire:loading.remove wire:target="toggleVillageSelection, removeVillageSelection"># {{
                                count($selectedVillageIds) }}</span>
                        </div>
                    </div>

                    <div class="mt-2 relative" x-data="{
        open: false,
        search: '',
        get selectedIds() { return $wire.selectedVillageIds ?? [] },
        isSelected(id) { return this.selectedIds.includes(String(id)) || this.selectedIds.includes(Number(id)) }
    }">
                        <button type="button" @click="open = !open"
                            class="flex w-full items-center justify-between rounded-xl border border-emerald-200 bg-white px-3 py-2.5 text-left text-sm font-semibold text-slate-700 shadow-sm transition hover:border-emerald-400 hover:shadow-md active:scale-[0.99]">
                            <span class="truncate">
                                <template x-if="selectedIds.length > 0">
                                    <span class="text-emerald-700"
                                        x-text="selectedIds.length + ' villages selected'"></span>
                                </template>
                                <template x-if="selectedIds.length === 0">
                                    <span class="text-slate-400 font-normal">Search villages</span>
                                </template>
                            </span>
                            <svg class="h-4 w-4 text-emerald-500 transition-transform duration-200 flex-shrink-0"
                                :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-cloak x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute z-50 top-full left-0 right-0 mt-2 rounded-2xl border border-emerald-100 bg-white p-3 shadow-2xl origin-top">
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-slate-400 pointer-events-none"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <input type="text" x-model="search" placeholder="Search villages"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 pl-8 pr-3 py-2 text-sm outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-100">
                            </div>

                            <div class="mt-3 max-h-56 space-y-1.5 overflow-y-auto pr-1">
                                @forelse ($villages as $villageItem)
                                <button type="button" wire:key="village-btn-{{ $villageItem['id'] }}"
                                    x-show="!search || '{{ strtolower($villageItem['search']) }}'.includes(search.toLowerCase())"
                                    @click.prevent="$wire.toggleVillageSelection('{{ $villageItem['id'] }}')" :class="isSelected('{{ $villageItem['id'] }}')
                        ? 'border-emerald-400 bg-emerald-50 text-emerald-700 shadow-sm'
                        : 'border-slate-200 bg-white text-slate-700 hover:border-emerald-300 hover:bg-emerald-50/40'"
                                    class="flex w-full items-center justify-between rounded-xl border px-3 py-2 text-left text-sm transition-all duration-150">
                                    <span class="pr-3 font-medium">{{ $villageItem['name'] }}</span>
                                    <div :class="isSelected('{{ $villageItem['id'] }}')
                            ? 'bg-emerald-500 border-emerald-500 text-white'
                            : 'border-slate-300 bg-white'"
                                        class="flex items-center justify-center w-4 h-4 rounded border flex-shrink-0 transition-colors">
                                        <svg x-show="isSelected('{{ $villageItem['id'] }}')" class="w-3 h-3" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </button>
                                @empty
                                <div
                                    class="rounded-xl border border-dashed border-slate-200 px-3 py-6 text-center text-xs text-slate-400">
                                    <svg class="w-6 h-6 mx-auto mb-2 text-slate-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Select a state, district, and sub-district to load villages.
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    @if (!empty($selectedVillageItems ?? []))
                    <div class="mt-3 flex flex-wrap gap-1.5 max-h-24 overflow-y-auto">
                        @foreach ($selectedVillageItems ?? [] as $selectedVillage)
                        <span
                            class="inline-flex items-center gap-1 rounded-lg border border-emerald-200 bg-emerald-50 px-2 py-0.5 text-xs font-semibold text-emerald-700 shadow-sm">
                            {{ $selectedVillage['name'] }}
                            <button type="button" wire:click="removeVillageSelection('{{ $selectedVillage['id'] }}')"
                                class="ml-0.5 flex items-center justify-center w-3.5 h-3.5 rounded-full text-emerald-400 hover:bg-emerald-200 hover:text-emerald-700 transition">&times;</button>
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="rounded-3xl mt-1 border border-slate-200 bg-white p-3 shadow-sm">
            <div class="flex flex-col gap-2">
                {{-- Header --}}
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-slate-100 pb-2">
                    <div>
                        <button type="button" wire:click="clearAll"
                            class="flex items-center gap-1 rounded bg-red-50 px-2 py-1 text-sm font-medium text-red-600 transition hover:bg-red-100 hover:text-red-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Clear All
                        </button>
                    </div>
                    <div class="mt-1 text-base font-bold text-slate-800">
                        @if(count($selectedTownIds) + count($selectedVillageIds) > 0)
                        {{ count($selectedTownIds) + count($selectedVillageIds) }} {{ Str::plural('Geography', count($selectedTownIds) + count($selectedVillageIds)) }} Selected

                        @endif
                    </div>
                </div>
            </div>

            @php
            $citiesByState = [];
            foreach ($selectedTownsList as $town) {
            $stateId = $town['state_id'] ?? null;
            $stateName = $stateId
            ? (collect($states)->firstWhere('id', $stateId)['name'] ?? 'Unknown State')
            : 'Unknown State';
            $citiesByState[$stateName][] = $town;
            }

            $villagesByState = [];
            foreach ($selectedVillagesList as $village) {
            $stateId = $village['state_id'] ?? null;
            $stateName = $stateId
            ? (collect($states)->firstWhere('id', $stateId)['name'] ?? 'Unknown State')
            : 'Unknown State';
            $villagesByState[$stateName][] = $village;
            }
            @endphp

            <div class="grid grid-cols-2 gap-4 mt-2">

                {{-- Cities Section --}}
                <div class="rounded-xl border border-slate-200 bg-white p-3">
                    <h3 class="text-sm font-semibold uppercase tracking-widest text-slate-500 mb-3">Cities</h3>

                    @forelse($citiesByState as $stateName => $towns)
                    <div class="mb-4 last:mb-0">
                        <div
                            class="text-xs font-semibold uppercase tracking-wider text-slate-400 border-b border-slate-100 pb-1 mb-2">
                            {{ $stateName }}
                        </div>
                        <div class="grid grid-cols-3 gap-1">
                            @foreach($towns as $town)
                            <span
                                class="inline-flex items-center justify-between gap-1 rounded-md border border-blue-200 bg-blue-50 px-1.5 py-0.5 text-xs font-medium text-blue-700 min-w-0">
                                <span class="truncate" title="{{ $town['name'] }}">{{ $town['name'] }}</span>
                                <button type="button" wire:click="removeTownSelection('{{ $town['id'] }}')"
                                    class="text-blue-400 hover:text-blue-800 shrink-0">&times;</button>
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @empty
                    <p class="text-xs text-slate-400 italic">No cities selected.</p>
                    @endforelse
                </div>

                {{-- Villages Section --}}
                <div class="rounded-xl border border-slate-200 bg-white p-3">
                    <h3 class="text-sm font-semibold uppercase tracking-widest text-slate-500 mb-3">Villages</h3>

                    @forelse($villagesByState as $stateName => $villages)
                    <div class="mb-4 last:mb-0">
                        <div
                            class="text-xs font-semibold uppercase tracking-wider text-slate-400 border-b border-slate-100 pb-1 mb-2">
                            {{ $stateName }}
                        </div>
                        <div class="grid grid-cols-3 gap-1">
                            @foreach($villages as $village)
                            <span
                                class="inline-flex items-center justify-between gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-1.5 py-0.5 text-xs font-medium text-emerald-700 min-w-0">
                                <span class="truncate" title="{{ $village['name'] }}">{{ $village['name'] }}</span>
                                <button type="button" wire:click="removeVillageSelection('{{ $village['id'] }}')"
                                    class="text-emerald-400 hover:text-emerald-800 shrink-0">&times;</button>
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @empty
                    <p class="text-xs text-slate-400 italic">No villages selected.</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>


    @section('p-footer')
    <div class="flex justify-end items-center">
        <button type="button" wire:click="confirmSelection" wire:loading.attr="disabled"
            class="flex items-center gap-2 rounded-lg bg-blue-600 px-8 py-2 text-lg font-medium text-white transition hover:bg-blue-700 disabled:opacity-50 disabled:cursor-wait">
            <div wire:loading wire:target="confirmSelection" class="spinner-border spinner-border-sm" role="status"
                aria-hidden="true"></div>
            <span>Next</span>
        </button>
    </div>
    @endsection

    @section('script')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('submit-partner-step-2', (data) => {
                const payload = data[0] || data;

                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/partners/step-2';

                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                form.appendChild(csrf);

                if (payload.cities && Array.isArray(payload.cities)) {
                    payload.cities.forEach(cityId => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'cities[]';
                        input.value = cityId;
                        form.appendChild(input);
                    });
                }

                if (payload.villages && Array.isArray(payload.villages)) {
                    payload.villages.forEach(villageId => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'villages[]';
                        input.value = villageId;
                        form.appendChild(input);
                    });
                }

                document.body.appendChild(form);
                form.submit();
            });
        });
    </script>
    @endsection
</x-partners.city-village-frame>
