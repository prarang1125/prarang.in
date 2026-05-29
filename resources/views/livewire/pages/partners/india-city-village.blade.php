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
                        <div wire:loading wire:target="townState" class="spinner-border spinner-border-sm text-blue-600"
                            role="status" aria-hidden="true"></div>
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
                        <div
                            class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500 flex items-center gap-2">
                            <span>Cities</span>
                            <div wire:loading wire:target="townState, townDistrict, townCityType"
                                class="spinner-border spinner-border-sm text-blue-600" role="status" aria-hidden="true">
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-1.5 rounded-full bg-blue-600 px-3 py-1 text-[10px] font-semibold text-white shadow-sm">
                            <span wire:loading wire:target="toggleTownSelection, removeTownSelection"
                                class="spinner-border spinner-border-sm"></span>
                            <span wire:loading.remove wire:target="toggleTownSelection, removeTownSelection">#{{
                                count($selectedTownIds) }}
                            </span>
                            {{-- <span wire:loading wire:target="toggleTownSelection, removeTownSelection"></span> --}}
                        </div>
                    </div>

                    <div class="mt-2 relative" x-data="{ open: false, search: '' }">
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
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute z-50 top-full left-0 right-0 mt-2 rounded-2xl border border-blue-100 bg-white p-3 shadow-xl origin-top">
                            <input type="text" x-model="search" placeholder="Search towns or cities"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm outline-none transition focus:border-blue-500 focus:bg-white">

                            <div class="mt-3 max-h-56 space-y-2 overflow-y-auto pr-1">
                                @forelse ($towns as $townItem)
                                <button type="button"
                                    x-show="!search || @js($townItem['search']).includes(search.toLowerCase())"
                                    wire:click="toggleTownSelection('{{ $townItem['id'] }}')"
                                    class="flex w-full items-center justify-between rounded-xl border px-3 py-2 text-left text-sm transition {{ in_array($townItem['id'], $selectedTownIds, true) ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-slate-200 bg-white text-slate-700 hover:border-blue-300 hover:bg-slate-50' }}">
                                    <span class="pr-3">{{ $townItem['name'] }}</span>
                                    <div
                                        class="flex items-center justify-center w-4 h-4 rounded border transition-colors {{ in_array($townItem['id'], $selectedTownIds, true) ? 'bg-blue-500 border-blue-500 text-white' : 'border-slate-300 bg-white group-hover:border-blue-400' }}">
                                        @if(in_array($townItem['id'], $selectedTownIds, true))
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        @endif
                                    </div>
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
                        <div wire:loading wire:target="villageState"
                            class="spinner-border spinner-border-sm text-blue-600" role="status" aria-hidden="true">
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
                        <div wire:loading wire:target="villageState, villageDistrict"
                            class="spinner-border spinner-border-sm text-blue-600" role="status" aria-hidden="true">
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
                        <div
                            class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500 flex items-center gap-2">
                            <span>Villages</span>
                            <div wire:loading wire:target="villageState, villageDistrict, villageSubDistrict"
                                class="spinner-border spinner-border-sm text-emerald-600" role="status"
                                aria-hidden="true"></div>
                        </div>
                        <div
                            class="flex items-center gap-1.5 rounded-full bg-emerald-600 px-3 py-1 text-[10px] font-semibold text-white shadow-sm">
                            <span wire:loading wire:target="toggleVillageSelection, removeVillageSelection"
                                class="spinner-border spinner-border-sm"></span>
                            <span wire:loading.remove wire:target="toggleVillageSelection, removeVillageSelection">#{{
                                count($selectedVillageIds) }}
                            </span>
                            <span wire:loading wire:target="toggleVillageSelection, removeVillageSelection"></span>
                        </div>
                    </div>

                    <div class="mt-2 relative" x-data="{ open: false, search: '' }">
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
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute z-50 top-full left-0 right-0 mt-2 rounded-2xl border border-emerald-100 bg-white p-3 shadow-xl origin-top">
                            <input type="text" x-model="search" placeholder="Search villages"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm outline-none transition focus:border-emerald-500 focus:bg-white">

                            <div class="mt-3 max-h-56 space-y-2 overflow-y-auto pr-1">
                                @forelse ($villages as $villageItem)
                                <button type="button"
                                    x-show="!search || @js($villageItem['search']).includes(search.toLowerCase())"
                                    wire:click="toggleVillageSelection('{{ $villageItem['id'] }}')"
                                    class="flex w-full items-center justify-between rounded-xl border px-3 py-2 text-left text-sm transition {{ in_array($villageItem['id'], $selectedVillageIds, true) ? 'border-emerald-500 bg-emerald-50 text-emerald-700' : 'border-slate-200 bg-white text-slate-700 hover:border-emerald-300 hover:bg-slate-50' }}">
                                    <span class="pr-3">{{ $villageItem['name'] }}</span>
                                    <div
                                        class="flex items-center justify-center w-4 h-4 rounded border transition-colors {{ in_array($villageItem['id'], $selectedVillageIds, true) ? 'bg-emerald-500 border-emerald-500 text-white' : 'border-slate-300 bg-white group-hover:border-emerald-400' }}">
                                        @if(in_array($villageItem['id'], $selectedVillageIds, true))
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        @endif
                                    </div>
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

        <div class="rounded-3xl mt-1 border border-slate-200 bg-white p-3 shadow-sm">
            <div class="flex flex-col gap-2">
                {{-- Header --}}
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-slate-100 pb-2">
                    <div>
                    </div>
                    <div class="mt-1 text-base font-bold text-slate-800">
                        {{ count($selectedTownIds) + count($selectedVillageIds) }} Geography Selected
                    </div>
                </div>
                <button type="button" wire:click="confirmSelection" wire:loading.attr="disabled"
                    class="mt-2 sm:mt-0 inline-flex items-center justify-center gap-2 rounded-2xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800 disabled:opacity-50 disabled:cursor-wait shrink-0">
                    <span wire:loading wire:target="confirmSelection"
                        class="spinner-border spinner-border-sm text-white"></span>
                    <span>Confirm selection</span>
                </button>
            </div>

            {{-- Group towns and villages separately by state --}}
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
