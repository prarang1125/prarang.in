<x-partners.city-village-frame>
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold text-red-600 border-b-2 border-red-600 pb-1 inline-block">
            Step 1: Select Your Target Geographies
        </p>
        <p class="text-sm text-gray-600 m-0">
            Select from 6,331 Indian Cities and 592,765 Indian Villages
        </p>
    </div>
    @endsection

    <div class=" p-4 sm:p-6 lg:p-8">

        <!-- Towns / Cities Section -->
        <div class=" ">
            <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2">
                <span
                    class="bg-blue-100 text-blue-700 w-8 h-8 rounded-full flex items-center justify-center text-sm">A</span>
                Select Cities
            </h3>

            <div class="grid gap-6 lg:grid-cols-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500 flex justify-between items-center">
                        <span>State</span>
                    </div>
                    <select wire:model.live="townState" wire:loading.attr="disabled"
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-blue-500 focus:bg-white disabled:opacity-50 disabled:cursor-wait">
                        <option value="">Select a state</option>
                        @foreach ($states as $stateItem)
                        <option value="{{ $stateItem['id'] }}">{{ $stateItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500 flex justify-between items-center">
                        <span>District</span>
                        <div wire:loading wire:target="townState" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></div>
                    </div>
                    <select wire:model.live="townDistrict" @disabled(!$townState) wire:loading.attr="disabled"
                        wire:target="townState, townDistrict"
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-blue-500 focus:bg-white disabled:cursor-not-allowed disabled:bg-slate-100 disabled:opacity-50 disabled:cursor-wait">
                        <option value="">Select a district</option>
                        @foreach ($townDistricts as $districtItem)
                        <option value="{{ $districtItem['id'] }}">{{ $districtItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500 flex justify-between items-center">
                        <span>Category</span>

                    </div>
                    <select wire:model.live="townCityType" wire:loading.attr="disabled"
                        wire:target="townState, townCityType"
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-blue-500 focus:bg-white disabled:cursor-not-allowed disabled:bg-slate-100 disabled:opacity-50 disabled:cursor-wait">
                        <option value="">All City Types</option>
                        <option value="is_sc">State Capital</option>
                        <option value="is_dhq">District Capital (DHQ)</option>
                        <option value="is_ua">Urban Agglomeration</option>
                        <option value="is_mcp">Municipal Corporation</option>
                        <option value="is_smc">Smart City</option>
                    </select>
                </div>

                <div class="rounded-2xl border border-blue-100 bg-gradient-to-b from-blue-50/20 to-blue-50/40 p-4 shadow-sm relative z-30"
                    wire:key="town-picker-{{ $townState }}-{{ $townDistrict }}-{{ $townCityType }}">
                    <div class="flex items-center justify-between gap-3">
                        <div class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                            Cities
                        </div>
                        <div
                            class="flex items-center gap-1.5 rounded-full bg-blue-600 px-3 py-1 text-[10px] font-semibold text-white shadow-sm">
                            <span wire:loading wire:target="toggleTownSelection, removeTownSelection"
                                class="animate-spin h-3.5 w-3.5 border-2 border-white border-t-transparent rounded-full"></span>
                            <span wire:loading.remove wire:target="toggleTownSelection, removeTownSelection">#{{
                                count($selectedTownIds) }}
                            </span>
                            {{-- <span wire:loading wire:target="toggleTownSelection, removeTownSelection"></span> --}}
                        </div>
                    </div>

                    <div class="mt-2" x-data="{ open: false, search: '' }">
                        <button type="button" @click="open = !open"
                            class="flex w-full items-center justify-between rounded-xl border border-blue-200 bg-white px-3 py-2.5 text-left text-sm font-semibold text-slate-700 shadow-sm transition hover:border-blue-400 hover:shadow-md">
                            <span class="truncate">
                                @if (count($selectedTownIds))
                                {{ count($selectedTownIds) }} towns selected
                                @else
                                Search towns/cities
                                @endif
                            </span>
                            <svg class="h-4 w-4 text-blue-600 transition-transform" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-cloak x-show="open" @click.away="open = false"
                            class="relative left-0 right-0 mt-2 rounded-2xl border border-blue-100 bg-white p-3 shadow-xl">
                            <input type="text" x-model="search" placeholder="Search towns or cities"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm outline-none transition focus:border-blue-500 focus:bg-white">

                            <div class="mt-3 max-h-56 space-y-2 overflow-y-auto pr-1">
                                @forelse ($towns as $townItem)
                                <button type="button"
                                    x-show="!search || @js($townItem['search']).includes(search.toLowerCase())"
                                    wire:click="toggleTownSelection('{{ $townItem['id'] }}')"
                                    class="flex w-full items-center justify-between rounded-xl border px-3 py-2 text-left text-sm transition {{ in_array($townItem['id'], $selectedTownIds, true) ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-slate-200 bg-white text-slate-700 hover:border-blue-300 hover:bg-slate-50' }}">
                                    <span class="pr-3">{{ $townItem['name'] }}</span>
                                    <span
                                        class="text-[10px] uppercase tracking-wider font-bold {{ in_array($townItem['id'], $selectedTownIds, true) ? 'text-blue-700' : 'text-slate-400' }}">
                                        {{ in_array($townItem['id'], $selectedTownIds, true) ? 'Selected' : 'Add' }}
                                    </span>
                                </button>
                                @empty
                                <div
                                    class="rounded-xl border border-dashed border-slate-200 px-3 py-6 text-center text-xs text-slate-500">
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
                            class="inline-flex items-center gap-1 rounded-md border border-blue-200 bg-blue-50 px-2 py-0.5 text-xs font-medium text-blue-700">
                            {{ $selectedTown['name'] }}
                            <button type="button" wire:click="removeTownSelection('{{ $selectedTown['id'] }}')"
                                class="text-blue-500 transition hover:text-blue-800">&times;</button>
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Villages Section -->
        <div class="mt-4 min-h-[350px]">
            <h3 class=" text-sm font-bold text-slate-900 mb-4 flex items-center gap-2">
                <span class="bg-blue-100 text-blue-700 w-8 h-8 rounded-full flex items-center justify-center text-sm">
                    B</span>
                Select Villages
            </h3>

            <div class="grid gap-6 lg:grid-cols-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500 flex justify-between items-center">
                        <span>State</span>
                        <div wire:loading wire:target="villageState"
                            class="flex items-center gap-1.5 text-blue-600 font-bold">
                            <span
                                class="animate-spin h-4 w-4 border-2 border-blue-600 border-t-transparent rounded-full"></span>
                        </div>
                    </div>
                    <select wire:model.live="villageState" wire:loading.attr="disabled"
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-emerald-500 focus:bg-white disabled:opacity-50 disabled:cursor-wait">
                        <option value="">Select a state</option>
                        @foreach ($states as $stateItem)
                        <option value="{{ $stateItem['id'] }}">{{ $stateItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500 flex justify-between items-center">
                        <span>District</span>
                        <div wire:loading wire:target="villageDistrict, villageState"
                            class="flex items-center gap-1.5 text-blue-600 font-bold">
                            <span
                                class="animate-spin h-4 w-4 border-2 border-blue-600 border-t-transparent rounded-full"></span>
                        </div>
                    </div>
                    <select wire:model.live="villageDistrict" @disabled(!$villageState) wire:loading.attr="disabled"
                        wire:target="villageState, villageDistrict"
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-emerald-500 focus:bg-white disabled:cursor-not-allowed disabled:bg-slate-100 disabled:opacity-50 disabled:cursor-wait">
                        <option value="">Select a district</option>
                        @foreach ($villageDistricts as $districtItem)
                        <option value="{{ $districtItem['id'] }}">{{ $districtItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm relative">
                    <div
                        class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500 flex justify-between items-center">
                        <span>Sub-district</span>
                        <div wire:loading wire:target="villageSubDistrict, villageDistrict, villageState"
                            class="flex items-center gap-1.5 text-blue-600 font-bold">
                            <span
                                class="animate-spin h-4 w-4 border-2 border-blue-600 border-t-transparent rounded-full"></span>
                        </div>
                    </div>
                    <select wire:model.live="villageSubDistrict" @disabled(!$villageDistrict)
                        wire:loading.attr="disabled" wire:target="villageState, villageDistrict, villageSubDistrict"
                        class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-emerald-500 focus:bg-white disabled:cursor-not-allowed disabled:bg-slate-100 disabled:opacity-50 disabled:cursor-wait">
                        <option value="">Select a sub-district</option>
                        @foreach ($villageSubDistricts as $subDistrictItem)
                        <option value="{{ $subDistrictItem['id'] }}">{{ $subDistrictItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="rounded-2xl border border-emerald-100 bg-gradient-to-b from-emerald-50/20 to-emerald-50/40 p-4 shadow-sm relative z-20"
                    wire:key="village-picker-{{ $villageState }}-{{ $villageDistrict }}-{{ $villageSubDistrict }}">
                    <div class="flex items-center justify-between gap-3">
                        <div class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                            Villages
                        </div>
                        <div
                            class="flex items-center gap-1.5 rounded-full bg-emerald-600 px-3 py-1 text-[10px] font-semibold text-white shadow-sm">
                            <span wire:loading wire:target="toggleVillageSelection, removeVillageSelection"
                                class="animate-spin h-3.5 w-3.5 border-2 border-white border-t-transparent rounded-full"></span>
                            <span wire:loading.remove wire:target="toggleVillageSelection, removeVillageSelection">#{{
                                count($selectedVillageIds) }}
                            </span>
                            <span wire:loading wire:target="toggleVillageSelection, removeVillageSelection"></span>
                        </div>
                    </div>

                    <div class="mt-2" x-data="{ open: false, search: '' }">
                        <button type="button" @click="open = !open"
                            class="flex w-full items-center justify-between rounded-xl border border-emerald-200 bg-white px-3 py-2.5 text-left text-sm font-semibold text-slate-700 shadow-sm transition hover:border-emerald-400 hover:shadow-md">
                            <span class="truncate">
                                @if (count($selectedVillageIds))
                                {{ count($selectedVillageIds) }} villages selected
                                @else
                                Search villages
                                @endif
                            </span>
                            <svg class="h-4 w-4 text-emerald-600 transition-transform" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-cloak x-show="open" @click.away="open = false"
                            class="absolute z-50 left-0 right-0 mt-2 rounded-2xl border border-emerald-100 bg-white p-3 shadow-xl">
                            <input type="text" x-model="search" placeholder="Search villages"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm outline-none transition focus:border-emerald-500 focus:bg-white">

                            <div class="mt-3 max-h-56 space-y-2 overflow-y-auto pr-1">
                                @forelse ($villages as $villageItem)
                                <button type="button"
                                    x-show="!search || @js($villageItem['search']).includes(search.toLowerCase())"
                                    wire:click="toggleVillageSelection('{{ $villageItem['id'] }}')"
                                    class="flex w-full items-center justify-between rounded-xl border px-3 py-2 text-left text-sm transition {{ in_array($villageItem['id'], $selectedVillageIds, true) ? 'border-emerald-500 bg-emerald-50 text-emerald-700' : 'border-slate-200 bg-white text-slate-700 hover:border-emerald-300 hover:bg-slate-50' }}">
                                    <span class="pr-3">{{ $villageItem['name'] }}</span>
                                    <span
                                        class="text-[10px] uppercase tracking-wider font-bold {{ in_array($villageItem['id'], $selectedVillageIds, true) ? 'text-emerald-700' : 'text-slate-400' }}">
                                        {{ in_array($villageItem['id'], $selectedVillageIds, true) ? 'Selected' : 'Add'
                                        }}
                                    </span>
                                </button>
                                @empty
                                <div
                                    class="rounded-xl border border-dashed border-slate-200 px-3 py-6 text-center text-xs text-slate-500">
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
                            class="inline-flex items-center gap-1 rounded-md border border-emerald-200 bg-emerald-50 px-2 py-0.5 text-xs font-medium text-emerald-700">
                            {{ $selectedVillage['name'] }}
                            <button type="button" wire:click="removeVillageSelection('{{ $selectedVillage['id'] }}')"
                                class="text-emerald-500 transition hover:text-emerald-800">&times;</button>
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                <div class="flex-1">
                    <div class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">Selection summary
                    </div>
                    <div class="mt-1 text-sm text-slate-700">
                        {{ count($selectedTownIds) }} cities/towns and {{ count($selectedVillageIds) }} villages
                        selected.
                    </div>

                    @if (count($selectedTownsList) > 0 || count($selectedVillagesList) > 0)
                    <div class="mt-4 flex flex-wrap gap-1.5 max-h-32 overflow-y-auto">
                        @foreach ($selectedTownsList as $town)
                        <span
                            class="inline-flex items-center gap-1 rounded-md border border-blue-200 bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700">
                            {{ $town['name'] }}
                            <button type="button" wire:click="removeTownSelection('{{ $town['id'] }}')"
                                class="text-blue-500 transition hover:text-blue-800">&times;</button>
                        </span>
                        @endforeach

                        @foreach ($selectedVillagesList as $village)
                        <span
                            class="inline-flex items-center gap-1 rounded-md border border-emerald-200 bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700">
                            {{ $village['name'] }}
                            <button type="button" wire:click="removeVillageSelection('{{ $village['id'] }}')"
                                class="text-emerald-500 transition hover:text-emerald-800">&times;</button>
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>

                <button type="button" wire:click="confirmSelection" wire:loading.attr="disabled"
                    class="mt-4 sm:mt-0 inline-flex items-center justify-center gap-2 rounded-2xl bg-slate-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800 disabled:opacity-50 disabled:cursor-wait shrink-0">
                    <span wire:loading wire:target="confirmSelection"
                        class="animate-spin h-4 w-4 border-2 border-white border-t-transparent rounded-full"></span>
                    <span>Confirm selection</span>
                </button>
            </div>
        </div>
    </div>

    @section('p-footer')
    <div class="flex justify-end items-center">
        <button type="button" wire:click="confirmSelection" wire:loading.attr="disabled"
            class="flex items-center gap-2 rounded-lg bg-blue-600 px-8 py-2 text-lg font-medium text-white transition hover:bg-blue-700 disabled:opacity-50 disabled:cursor-wait">
            <div wire:loading wire:target="confirmSelection" class="spinner-border spinner-border-sm" role="status"
                aria-hidden="true"></div>
            <span>Confirm</span>
        </button>
    </div>
    @endsection
</x-partners.city-village-frame>
