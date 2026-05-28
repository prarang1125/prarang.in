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

    <div class="space-y-6 p-4 sm:p-6 lg:p-8">
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <div class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">State</div>
                <select wire:model.live="state"
                    class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-blue-500 focus:bg-white">
                    <option value="">Select a state</option>
                    @foreach ($states as $stateItem)
                        <option value="{{ $stateItem['id'] }}">{{ $stateItem['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <div class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">District</div>
                <select wire:model.live="district" @disabled(!$state)
                    class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-blue-500 focus:bg-white disabled:cursor-not-allowed disabled:bg-slate-100">
                    <option value="">Select a district</option>
                    @foreach ($districts as $districtItem)
                        <option value="{{ $districtItem['id'] }}">{{ $districtItem['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <div class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">Sub-district</div>
                <select wire:model.live="subDistrict" @disabled(!$district)
                    class="mt-2 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm font-medium text-slate-900 outline-none transition focus:border-blue-500 focus:bg-white disabled:cursor-not-allowed disabled:bg-slate-100">
                    <option value="">Select a sub-district</option>
                    @foreach ($subDistricts as $subDistrictItem)
                        <option value="{{ $subDistrictItem['id'] }}">{{ $subDistrictItem['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="rounded-3xl border border-blue-100 bg-gradient-to-b from-white to-blue-50/40 p-5 shadow-sm"
                wire:key="town-picker-{{ $state }}-{{ $district }}">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Cities / Towns</h3>
                        <p class="text-sm text-slate-500">Search and select multiple towns or cities.</p>
                    </div>
                    <div class="rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white">
                        {{ count($selectedTownIds) }} selected
                    </div>
                </div>

                <div class="mt-4" x-data="{ open: false, search: '' }">
                    <button type="button" @click="open = !open"
                        class="flex w-full items-center justify-between rounded-2xl border border-blue-200 bg-white px-4 py-3 text-left text-sm font-semibold text-slate-700 shadow-sm transition hover:border-blue-400 hover:shadow-md">
                        <span class="truncate">
                            @if (count($selectedTownIds))
                                {{ count($selectedTownIds) }} towns selected
                            @else
                                Search and add towns/cities
                            @endif
                        </span>
                        <svg class="h-4 w-4 text-blue-600 transition-transform" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-cloak x-show="open" @click.away="open = false"
                        class="mt-3 rounded-2xl border border-blue-100 bg-white p-3 shadow-xl">
                        <input type="text" x-model="search" placeholder="Search towns or cities"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:bg-white">

                        <div class="mt-3 max-h-72 space-y-2 overflow-y-auto pr-1">
                            @forelse ($towns as $townItem)
                                <button type="button"
                                    x-show="!search || @js($townItem['search']).includes(search.toLowerCase())"
                                    wire:click="toggleTownSelection('{{ $townItem['id'] }}')"
                                    class="flex w-full items-center justify-between rounded-xl border px-3 py-2.5 text-left text-sm transition {{ in_array($townItem['id'], $selectedTownIds, true) ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-slate-200 bg-white text-slate-700 hover:border-blue-300 hover:bg-slate-50' }}">
                                    <span class="pr-3">{{ $townItem['name'] }}</span>
                                    <span
                                        class="text-xs font-semibold {{ in_array($townItem['id'], $selectedTownIds, true) ? 'text-blue-700' : 'text-slate-400' }}">
                                        {{ in_array($townItem['id'], $selectedTownIds, true) ? 'Selected' : 'Add' }}
                                    </span>
                                </button>
                            @empty
                                <div
                                    class="rounded-xl border border-dashed border-slate-200 px-3 py-8 text-center text-sm text-slate-500">
                                    Select a state and district to load cities.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                @if (!empty($selectedTownItems ?? []))
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach ($selectedTownItems ?? [] as $selectedTown)
                            <span
                                class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-3 py-1 text-sm font-medium text-blue-700">
                                {{ $selectedTown['name'] }}
                                <button type="button" wire:click="removeTownSelection('{{ $selectedTown['id'] }}')"
                                    class="text-blue-500 transition hover:text-blue-800">&times;</button>
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="rounded-3xl border border-emerald-100 bg-gradient-to-b from-white to-emerald-50/40 p-5 shadow-sm"
                wire:key="village-picker-{{ $state }}-{{ $district }}-{{ $subDistrict }}">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Villages</h3>
                        <p class="text-sm text-slate-500">Search and select multiple villages.</p>
                    </div>
                    <div class="rounded-full bg-emerald-600 px-3 py-1 text-xs font-semibold text-white">
                        {{ count($selectedVillageIds) }} selected
                    </div>
                </div>

                <div class="mt-4" x-data="{ open: false, search: '' }">
                    <button type="button" @click="open = !open"
                        class="flex w-full items-center justify-between rounded-2xl border border-emerald-200 bg-white px-4 py-3 text-left text-sm font-semibold text-slate-700 shadow-sm transition hover:border-emerald-400 hover:shadow-md">
                        <span class="truncate">
                            @if (count($selectedVillageIds))
                                {{ count($selectedVillageIds) }} villages selected
                            @else
                                Search and add villages
                            @endif
                        </span>
                        <svg class="h-4 w-4 text-emerald-600 transition-transform" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-cloak x-show="open" @click.away="open = false"
                        class="mt-3 rounded-2xl border border-emerald-100 bg-white p-3 shadow-xl">
                        <input type="text" x-model="search" placeholder="Search villages"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm outline-none transition focus:border-emerald-500 focus:bg-white">

                        <div class="mt-3 max-h-72 space-y-2 overflow-y-auto pr-1">
                            @forelse ($villages as $villageItem)
                                <button type="button"
                                    x-show="!search || @js($villageItem['search']).includes(search.toLowerCase())"
                                    wire:click="toggleVillageSelection('{{ $villageItem['id'] }}')"
                                    class="flex w-full items-center justify-between rounded-xl border px-3 py-2.5 text-left text-sm transition {{ in_array($villageItem['id'], $selectedVillageIds, true) ? 'border-emerald-500 bg-emerald-50 text-emerald-700' : 'border-slate-200 bg-white text-slate-700 hover:border-emerald-300 hover:bg-slate-50' }}">
                                    <span class="pr-3">{{ $villageItem['name'] }}</span>
                                    <span
                                        class="text-xs font-semibold {{ in_array($villageItem['id'], $selectedVillageIds, true) ? 'text-emerald-700' : 'text-slate-400' }}">
                                        {{ in_array($villageItem['id'], $selectedVillageIds, true) ? 'Selected' : 'Add' }}
                                    </span>
                                </button>
                            @empty
                                <div
                                    class="rounded-xl border border-dashed border-slate-200 px-3 py-8 text-center text-sm text-slate-500">
                                    Select a state, district, and sub-district to load villages.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                @if (!empty($selectedVillageItems ?? []))
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach ($selectedVillageItems ?? [] as $selectedVillage)
                            <span
                                class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-sm font-medium text-emerald-700">
                                {{ $selectedVillage['name'] }}
                                <button type="button"
                                    wire:click="removeVillageSelection('{{ $selectedVillage['id'] }}')"
                                    class="text-emerald-500 transition hover:text-emerald-800">&times;</button>
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">Selection summary
                    </div>
                    <div class="mt-1 text-sm text-slate-700">
                        {{ count($selectedTownIds) }} cities/towns and {{ count($selectedVillageIds) }} villages
                        selected.
                    </div>
                </div>

                <button type="button" wire:click="confirmSelection"
                    class="inline-flex items-center justify-center rounded-2xl bg-slate-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                    Confirm selection
                </button>
            </div>
        </div>
    </div>

    @section('p-footer')
        <div class="flex justify-end items-center">
            <button type="button" wire:click="confirmSelection"
                class="rounded-lg bg-blue-600 px-8 py-2 text-lg font-medium text-white transition hover:bg-blue-700">
                Confirm
            </button>
        </div>
    @endsection
</x-partners.city-village-frame>
