<div class="">
    <style>
        /* Modal Styling */
        .modal.show {
            display: block !important;
        }

        .modal-backdrop {
            display: none;
        }

        /* Custom Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeInUp 0.5s ease-out;
        }

        /* Enhanced Button Styles */
        .btn-check:checked+.btn-outline-light {
            background: rgba(255, 255, 255, 0.3) !important;
            border-color: white !important;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
        }

        .btn-link:hover {
            color: #0366a3 !important;
            transform: translateX(3px);
        }

        /* Table Enhancements */
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transform: translateY(-1px);
            transition: all 0.2s ease;
        }

        .table thead th {
            position: sticky;
            top: 0;
            background: #f8f9fa !important;
            z-index: 10;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        /* Checkbox Styling */
        .form-check-input:checked {
            background-color: #0488cd;
            border-color: #0488cd;
        }

        .form-check-input:focus {
            border-color: #0488cd;
            box-shadow: 0 0 0 0.25rem rgba(4, 136, 205, 0.25);
        }

        /* Badge Animations */
        @keyframes pulseGlow {

            0%,
            100% {
                box-shadow: 0 0 5px rgba(4, 136, 205, 0.5);
            }

            50% {
                box-shadow: 0 0 20px rgba(4, 136, 205, 0.8);
            }
        }

        .badge {
            animation: pulseGlow 2s infinite;
        }

        /* Loading States */
        .spinner-border {
            animation: spinner-border 0.75s linear infinite;
        }

        * {
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
            transition-timing-function: ease-in-out;
        }

        /* Responsive Typography */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem !important;
            }

            h2 {
                font-size: 1.5rem !important;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #0488cd;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0366a3;
        }

        /* Expanded Row Background */
        .bg-light {
            background: linear-gradient(to bottom, #f8f9fa 0%, #ffffff 100%) !important;
        }

        /* Button Hover Effects */
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(4, 136, 205, 0.4) !important;
        }

        .btn-outline-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Sticky Column Hover Effects */
        .table-hover tbody tr:hover .sticky-name-column {
            background-color: rgba(4, 136, 205, 0.12) !important;
        }

        .table-striped tbody tr:nth-of-type(odd) .sticky-name-column {
            background-color: rgba(4, 136, 205, 0.03);
        }


        /* Sticky Column Hover Effects */
        .table-hover tbody tr:hover .sticky-name-column {
            background-color: rgba(4, 136, 205, 0.12) !important;
        }

        .table-striped tbody tr:nth-of-type(odd) .sticky-name-column {
            background-color: rgba(4, 136, 205, 0.03);
        }

        /* Container */
        .container div .container-lg {
            padding-top: 5px !important;
            transform: translatex(0px) translatey(0px);
            border-bottom-left-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
            padding-bottom: 3px !important;
        }

        /* Card */
        .container div .card {
            border-top-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
            border-bottom-left-radius: 0px !important;
        }

        /* Container */
        .container div div .container-lg {
            margin-bottom: 0px !important;
        }

        /* Flex */
        .container div .d-flex {
            padding-bottom: 13px;
        }

        /* Form check */
        .border-top div .form-check {
            margin-right: 23px;
            position: relative;
            left: 0px;
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        /* Text start */
        .container tbody .text-start {
            padding-top: 1px !important;
            padding-bottom: 0px !important;
        }

        /* Medium */
        .container tr .fw-medium {
            padding-bottom: 0px !important;
            padding-top: 5px !important;
        }

        /* Heading */
        .border-top div h6 {
            margin-bottom: 4px !important;
        }

        /* Border top */
        .container tr .border-top {
            padding-top: 8px !important;
        }

        /* Button */
        .container tr .fw-semibold {
            text-align: left;
        }

        /* Text muted */
        .container tr .text-muted {
            max-width: 0px;
            min-width: 0px;
        }

        /* Table Data */
        .container div div .container-lg .card .card-body .table-responsive .table-striped tbody tr .p-0 {
            width: 183px !important;
        }

        /* Border top */
        .container tr .border-top {
            width: 1188px;
        }

        /* Text start */
        .container tbody .text-start {
            position: relative;
            transform: translatex(0px) translatey(0px);
        }

        /* Text start */
        .container tr:nth-child(2) .text-start:nth-child(1) {
            position: sticky;
            left: 9px;
        }

        /* Alpine.js cloak */
        [x-cloak] {
            display: none !important;
        }

        /* Button */
        .container tr .btn-link {
            display: flex;
        }

        /* Button */
        .container tr .btn-link {
            flex-direction: row;
            justify-content: normal;
            align-items: center;
        }

        /* Form check */
        .border-top div .form-check {
            border-style: none !important;
        }

        /* Label (hover) */
        .border-top div label:hover {
            color: #0456a9;
        }
    </style>

    <div x-data="districtComparison()" @districts-synced.window="syncDistrictData($event.detail)">
        {{-- Header --}}
        <div class="container-lg mb-5 pt-5 text-center pb-4 px-5"
            style="background: linear-gradient(135deg, #0488cd 0%, #0366a3 100%); border-radius: 0 0 24px 24px; box-shadow: 0 4px 20px rgba(4, 136, 205, 0.3);">
            <div class="mb-4 pt-3">
                <h3 class="fw-bold text-light mb-3" style="font-size: 2.5rem; letter-spacing: -0.5px;">
                    <i class="bi bi-shield-lock-fill me-2" style="font-size: 2.2rem;"></i>
                    CIRUS: Cyber Intelligence & Risk
                    Unified System
                </h3>

                <p class="text-light opacity-90 mb-0 mx-auto" style="max-width: 700px; font-size: 0.95rem;">A Social
                    Media Geo-Risk Identifier that highlights geographies of cyber-risk where there is high digital
                    activity and potential of Fake IDs.</p>
            </div>
            <div class="d-flex justify-content-center">
                <div class="btn-group shadow-lg" role="group"
                    style="border-radius: 50px; overflow: hidden; backdrop-filter: blur(10px); background: rgba(255, 255, 255, 0.1);">
                    <input type="radio" class="btn-check" name="view" id="india-tab" autocomplete="off"
                        wire:click="$set('view','india')" {{ $view == 'india' ? 'checked' : '' }}>
                    <label class="btn btn-outline-light btn-lg px-5" for="india-tab"
                        style="border: none; transition: all 0.3s ease;">
                        <i class="bi bi-map me-2"></i>India
                    </label>

                    <input type="radio" class="btn-check" name="view" id="world-tab" autocomplete="off"
                        wire:click="$set('view','world')" {{ $view == 'world' ? 'checked' : '' }}>
                    <label class="btn btn-outline-light btn-lg px-5" for="world-tab"
                        style="border: none; transition: all 0.3s ease;">
                        <i class="bi bi-globe-americas me-2"></i>World
                    </label>
                </div>
            </div>
        </div>

        {{-- INDIA VIEW --}}
        @if ($view == 'india')

            {{-- TOP 10 DHQ --}}
            <div class="container-lg mb-5" wire:ignore.self>
                <div class="card border-0 shadow-lg"
                    style="border-radius: 16px; overflow: hidden; border-top: 4px solid #0488cd;">
                    <div class="card-body p-4">
                        <div class="">
                            <h2 class="card-title fs-4 fw-bold mb-0" style="color: #1a2332;">
                                High Risk State/District Capitals
                            </h2>
                            <p class="text-muted m-0 p-0">Top 10 district capitals by cyber risk.</p>

                        </div>

                        <div wire:ignore.self
                            wire:target="toggleStateExpanded,toggleDistrictSelect,nextIndia,resetIndia">
                            @include('livewire.partials.simple-table', [
                                'rows' => $topDhqRows,
                                'showSerial' => true,
                                'viewType' => 'india',
                                'columnOrder' => [
                                    'state_district_capital',
                                    'state_ut',
                                    'risk_index',
                                    'internet_penetration',
                                    'internet_audience_literate',
                                    'facebook_audience_literate',
                                    'facebook_audience_internet',
                                    'linkedin_audience_literate',
                                    'linkedin_audience_internet',
                                    'linkedin_audience_formal_employment',
                                    'twitter_audience_literate',
                                    'twitter_audience_internet',
                                    'cyber_crime_rate_per_1000',
                                    // 'cyber_risk_rank',
                                ],
                            ])
                        </div>
                    </div>
                </div>
            </div>

            {{-- STATES TABLE --}}
            <div class="container-lg mb-5">
                <div class="card border-0 shadow-lg"
                    style="border-radius: 16px; overflow: hidden; border-top: 4px solid #0488cd;">
                    <div class="card-body p-4">
                        <div class="">
                            <h2 class="card-title fs-4 fw-bold mb-0" style="color: #1a2332;">
                                Select & Compare State/District Capitals
                            </h2>
                            <span wire:loading wire:target="toggleStateExpanded">
                                <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                                <span class="ms-2 text-muted small">Loading...</span>
                            </span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-sm mb-0 border">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-start fw-bold sticky-name-column"
                                            style="cursor: help; position: sticky; left: 0; z-index: 30; background-color: #f8f9fa; box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);"
                                            title="Click to view districts">State / UT</th>
                                        @php
                                            $stateColumns = [
                                                'internet_penetration',
                                                'internet_audience_literate',
                                                'facebook_audience_literate',
                                                'linkedin_audience_literate',
                                                'twitter_audience_literate',
                                                'internet_audience_literate',
                                                'facebook_audience_literate',
                                                'linkedin_audience_literate',
                                            ];
                                            $labels = config('cirus.india.field_labels', []);
                                            $tooltips = config('cirus.india.tooltips', []);
                                        @endphp
                                        @foreach ($stateColumns as $col)
                                            <th class="text-start fw-bold"
                                                @if ($tooltips[$col] ?? false) title="{{ $tooltips[$col] }}"
                                                    data-bs-toggle="tooltip"
                                                    style="cursor: help;" @endif>
                                                {{ $labels[$col] ?? str_replace('_', ' ', ucwords($col, '_')) }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($stateTableData as $index => $state)
                                        @php $name = $state['state']; @endphp
                                        <tr style="transition: all 0.2s ease;">
                                            <td class="text-start sticky-name-column"
                                                style="position: sticky; left: 0; z-index: 20; background-color: #ffffff; box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);">
                                                <button class="btn btn-link text-decoration-none p-0 fw-semibold"
                                                    style="color: #0488cd; transition: all 0.2s ease;"
                                                    wire:click="toggleStateExpanded('{{ $name }}')">
                                                    <i class="bi {{ in_array($name, $expandedStates) ? 'bi-chevron-down' : 'bi-chevron-right' }} me-2"
                                                        style="transition: transform 0.3s ease; font-size: 1.1rem;"></i>
                                                    {{ $name }}
                                                    <span wire:loading
                                                        wire:target="toggleStateExpanded('{{ $name }}')"
                                                        class="spinner-border spinner-border-sm ms-2"></span>
                                                </button>
                                            </td>
                                            @foreach ($stateColumns as $col)
                                                <td class="text-start">{{ $state[$col] ?? '-' }}</td>
                                            @endforeach
                                        </tr>
                                        @if (in_array($name, $expandedStates))
                                            <tr>
                                                <td colspan="{{ count($stateColumns) + 1 }}" class="p-0">
                                                    <div class="p-3 bg-light border-top">
                                                        <div wire:loading
                                                            wire:target="toggleStateExpanded('{{ $name }}')"
                                                            class="text-center py-3">
                                                            <div class="spinner-border spinner-border-sm text-primary">
                                                            </div>
                                                            <span class="ms-2">Loading districts...</span>
                                                        </div>
                                                        <div wire:loading.remove
                                                            wire:target="toggleStateExpanded('{{ $name }}')">
                                                            @php $districts = $stateDistrictsMap[$name] ?? []; @endphp
                                                            @if (count($districts) > 0)
                                                                <h6 class="fw-bold mb-3">Districts in
                                                                    {{ $name }}:</h6>
                                                                <div class="row g-2">
                                                                    @foreach ($districts as $d)
                                                                        <div class="col-12 col-md-6 col-lg-3">
                                                                            <div class="form-check p-2 border rounded"
                                                                                style="background-color: #fff;">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    id="district_{{ $index }}_{{ $loop->index }}"
                                                                                    @change="toggleSelect('{{ $d['id'] ?? $d['state_district_capital'] }}')"
                                                                                    :checked="selectedDistrictIds.includes(
                                                                                        '{{ $d['id'] ?? $d['state_district_capital'] }}'
                                                                                    )">
                                                                                <label
                                                                                    class="form-check-label ms-2 small"
                                                                                    for="district_{{ $index }}_{{ $loop->index }}">
                                                                                    {{ $d['state_district_capital'] ?? 'District' }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <p class="text-muted fst-italic mb-0">No districts
                                                                    available</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="{{ count($stateColumns) + 1 }}" class="text-center py-4">
                                                <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                                                <p class="mt-2 text-muted">No states available</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Actions --}}
                        <div class="mt-4 p-3 bg-light rounded-3">
                            <div class="d-flex gap-3 flex-wrap align-items-center">
                                <button @click="compareDistricts()" wire:loading.attr="disabled"
                                    class="btn btn-primary btn-lg shadow-sm"
                                    :disabled="selectedDistrictIds.length === 0"
                                    style="background: linear-gradient(135deg, #0488cd 0%, #0366a3 100%); border: none; border-radius: 12px; transition: all 0.3s ease;">
                                    <i class="bi bi-bar-chart-fill me-2"></i>
                                    <span wire:loading.remove wire:target="syncDistrictSelectionAndCompare">
                                        Compare Selected Districts (<span x-text="selectedDistrictIds.length">0</span>)
                                    </span>
                                    <span wire:loading wire:target="syncDistrictSelectionAndCompare">
                                        <span class="spinner-border spinner-border-sm me-2"></span>Comparing...
                                    </span>
                                </button>
                                <button @click="resetSelection()" class="btn btn-outline-secondary btn-lg shadow-sm"
                                    style="border-radius: 12px; transition: all 0.3s ease;">
                                    <i class="bi bi-arrow-counterclockwise me-2"></i>Reset Selection
                                </button>
                                <span class="ms-auto badge bg-info bg-gradient px-3 py-2"
                                    x-show="selectedDistrictIds.length > 0" style="font-size: 0.9rem;" x-cloak>
                                    <i class="bi bi-check2-circle me-1"></i><span
                                        x-text="selectedDistrictIds.length">0</span> Selected
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- COMPARISON MODAL --}}
            @if ($showCompareIndia)
                <div class="modal fade show d-block" id="indiaComparisonModal" tabindex="-1"
                    style="background-color: rgba(0,0,0,0.5);">
                    <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title">
                                    <i class="bi bi-diagram-3 me-2"></i>
                                    District Comparison
                                </h5>
                                <span class="badge bg-light text-success">{{ count($indiaComparisonRows) }}
                                    selected</span>
                            </div>
                            <div class="modal-body">
                                <div wire:loading wire:target="syncDistrictSelectionAndCompare"
                                    class="alert alert-info mb-3">
                                    <div class="spinner-border spinner-border-sm" role="status"></div>
                                    <span class="ms-2">Loading comparison data...</span>
                                </div>
                                <div wire:loading.remove wire:target="syncDistrictSelectionAndCompare">
                                    @if (count($indiaComparisonRows) > 0)
                                        @include('livewire.partials.simple-table', [
                                            'rows' => $indiaComparisonRows,
                                            'showSerial' => true,
                                            'viewType' => 'india',
                                            'columnOrder' => [
                                                'state_district_capital',
                                                'state_ut',
                                                'risk_index',
                                                'internet_penetration',
                                                'internet_audience_literate',
                                                'facebook_audience_literate',
                                                'facebook_audience_internet',
                                                'linkedin_audience_literate',
                                                'linkedin_audience_internet',
                                                'linkedin_audience_formal_employment',
                                                'twitter_audience_literate',
                                                'twitter_audience_internet',
                                                'cyber_crime_rate_per_1000',
                                                // 'cyber_risk_rank',
                                            ],
                                        ])
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <i class="bi bi-exclamation-triangle me-2"></i>
                                            No data available for comparison
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info"
                                    onclick="printModalTable('indiaComparisonModal')">
                                    <i class="bi bi-printer me-2"></i>Print
                                </button>
                                <button type="button" class="btn btn-success" wire:click="downloadDistrictExcel">
                                    <i class="bi bi-file-earmark-excel me-2"></i>Download Excel
                                </button>
                                <button type="button" class="btn btn-secondary" wire:click="resetIndia"
                                    @click="resetSelection()">
                                    <i class="bi bi-x-circle me-2"></i>Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        @endif


        {{-- WORLD VIEW --}}
        @if ($view == 'world')

            {{-- TOP 5 COUNTRIES --}}
            <div class="container-lg mb-5">
                <div class="card border-0 shadow-lg"
                    style="border-radius: 16px; overflow: hidden; border-top: 4px solid #0488cd;">
                    <div class="card-body p-4">
                        <div class="align-items-center justify-content-between ">
                            <h2 class="card-title fs-4 fw-bold mb-0" style="color: #1a2332;">

                                High Risk Countries
                            </h2>
                            <p class="text-muted">Top 5 countries by cyber risk.</p>

                        </div>
                        {{-- <div wire:target="toggleContinentExpanded,toggleCountrySelect,nextWorld,resetWorld"
                            class="alert alert-info mb-3" role="alert">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <span class="ms-2">Loading countries...</span>
                        </div> --}}
                        <div wire:loading.initial.remove wire:loading.remove.delay
                            wire:target="toggleContinentExpanded,toggleCountrySelect,nextWorld,resetWorld">
                            @include('livewire.partials.simple-table', [
                                'rows' => $topCountries,
                                'showSerial' => true,
                                'viewType' => 'world',
                                'columnOrder' => [
                                    'country',
                                    'continent',
                                    'risk_index',
                                    'internet_subscribers_pop',
                                    'internet_subscribers_literate',
                                    'facebook_literate',
                                    'facebook_internet',
                                    'linkedin_literate',
                                    'linkedin_internet',
                                    'twitter_literate',
                                    'twitter_internet',
                                    // 'cyber_risk_rank',
                                ],
                            ])
                        </div>
                    </div>
                </div>
            </div>

            {{-- CONTINENTS --}}
            <div class="container-lg mb-5">
                <div class="card border-0 shadow-lg"
                    style="border-radius: 16px; overflow: hidden; border-top: 4px solid #0488cd;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between ">
                            <h2 class="card-title fs-4 fw-bold mb-0" style="color: #1a2332;">

                                Select & Compare Countries
                            </h2>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-sm mb-0 border">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-start fw-bold sticky-name-column"
                                            style="cursor: help; position: sticky; left: 0; z-index: 30; background-color: #f8f9fa; box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);"
                                            title="Click to view countries">Continent</th>
                                        @php
                                            $continentColumns = [
                                                'internet_subscribers_pop',
                                                'facebook_internet',
                                                'linkedin_internet',
                                                'twitter_internet',
                                            ];
                                            $worldLabels = config('cirus.world.field_labels', []);
                                            $worldTooltips = config('cirus.world.tooltips', []);
                                        @endphp
                                        @foreach ($continentColumns as $col)
                                            <th class="text-start fw-bold"
                                                @if ($worldTooltips[$col] ?? false) title="{{ $worldTooltips[$col] }}"
                                                    data-bs-toggle="tooltip"
                                                    style="cursor: help;" @endif>
                                                {{ $worldLabels[$col] ?? str_replace('_', ' ', ucwords($col, '_')) }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($continents as $index => $c)
                                        @php $name = $c['continent'] ?? $c['name']; @endphp
                                        <tr style="transition: all 0.2s ease;">
                                            <td class="text-start sticky-name-column"
                                                style="position: sticky; left: 0; z-index: 20; background-color: #ffffff; box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);">
                                                <button class="btn btn-link text-decoration-none p-0 fw-semibold"
                                                    style="color: #0488cd; transition: all 0.2s ease;"
                                                    wire:click="toggleContinentExpanded('{{ $name }}')">
                                                    <i class="bi {{ in_array($name, $expandedContinents) ? 'bi-chevron-down' : 'bi-chevron-right' }} me-2"
                                                        style="transition: transform 0.3s ease; font-size: 1.1rem;"></i>
                                                    {{ $name }}
                                                    <span wire:loading
                                                        wire:target="toggleContinentExpanded('{{ $name }}')"
                                                        class="spinner-border spinner-border-sm ms-2"></span>
                                                </button>
                                            </td>
                                            @foreach ($continentColumns as $col)
                                                <td class="text-start">{{ $c[$col] ?? '-' }}</td>
                                            @endforeach
                                        </tr>
                                        @if (in_array($name, $expandedContinents))
                                            <tr>
                                                <td colspan="{{ count($continentColumns) + 1 }}" class="p-0">
                                                    <div class="p-3 bg-light border-top">
                                                        <div wire:loading
                                                            wire:target="toggleContinentExpanded('{{ $name }}')"
                                                            class="text-center py-3">
                                                            <div class="spinner-border spinner-border-sm text-primary">
                                                            </div>
                                                            <span class="ms-2">Loading countries...</span>
                                                        </div>
                                                        <div wire:loading.remove
                                                            wire:target="toggleContinentExpanded('{{ $name }}')">
                                                            @php $list = $continentCountriesMap[$name] ?? []; @endphp
                                                            @if (count($list) > 0)
                                                                <h6 class="fw-bold mb-3">Countries in
                                                                    {{ $name }}:</h6>
                                                                <div class="row g-2">
                                                                    @foreach ($list as $cc)
                                                                        <div class="col-12 col-md-6 col-lg-3">
                                                                            <div class="form-check p-2 border rounded"
                                                                                style="background-color: #fff;">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    id="country_{{ $index }}_{{ $loop->index }}"
                                                                                    @change="toggleCountry('{{ $cc['id'] ?? $cc['country'] }}')"
                                                                                    :checked="selectedCountryIds.includes(
                                                                                        '{{ $cc['id'] ?? $cc['country'] }}'
                                                                                    )">
                                                                                <label
                                                                                    class="form-check-label ms-2 small"
                                                                                    for="country_{{ $index }}_{{ $loop->index }}">
                                                                                    {{ $cc['country'] ?? 'Country' }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <p class="text-muted fst-italic mb-0">No countries
                                                                    available</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="{{ count($continentColumns) + 1 }}"
                                                class="text-center py-4">
                                                <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                                                <p class="mt-2 text-muted">No continents available</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4 p-3 bg-light rounded-3">
                            <div class="d-flex gap-3 flex-wrap align-items-center">
                                <button @click="compareCountries()" wire:loading.attr="disabled"
                                    class="btn btn-primary btn-lg shadow-sm"
                                    :disabled="selectedCountryIds.length === 0"
                                    style="background: linear-gradient(135deg, #0488cd 0%, #0366a3 100%); border: none; border-radius: 12px; transition: all 0.3s ease;">
                                    <i class="bi bi-bar-chart-fill me-2"></i>
                                    <span wire:loading.remove wire:target="syncCountrySelectionAndCompare">
                                        Compare Selected Countries (<span x-text="selectedCountryIds.length">0</span>)
                                    </span>
                                    <span wire:loading wire:target="syncCountrySelectionAndCompare">
                                        <span class="spinner-border spinner-border-sm me-2"></span>Comparing...
                                    </span>
                                </button>
                                <button @click="resetCountrySelection()"
                                    class="btn btn-outline-secondary btn-lg shadow-sm"
                                    style="border-radius: 12px; transition: all 0.3s ease;">
                                    <i class="bi bi-arrow-counterclockwise me-2"></i>Reset Selection
                                </button>
                                <span class="ms-auto badge bg-info bg-gradient px-3 py-2"
                                    x-show="selectedCountryIds.length > 0" style="font-size: 0.9rem;" x-cloak>
                                    <i class="bi bi-check2-circle me-1"></i><span
                                        x-text="selectedCountryIds.length">0</span> Selected
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- WORLD COMPARISON MODAL --}}
            @if ($showCompareWorld)
                <div class="modal fade show d-block" id="worldComparisonModal" tabindex="-1"
                    style="background-color: rgba(0,0,0,0.5);">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title">
                                    <i class="bi bi-diagram-3 me-2"></i>
                                    Country Comparison
                                </h5>
                                <span class="badge bg-light text-success">{{ count($worldComparisonRows) }}
                                    selected</span>
                            </div>
                            <div class="modal-body">
                                <div wire:loading wire:target="syncCountrySelectionAndCompare"
                                    class="alert alert-info mb-3" role="alert">
                                    <div class="spinner-border spinner-border-sm" role="status"></div>
                                    <span class="ms-2">Comparing countries...</span>
                                </div>
                                <div wire:loading.remove wire:target="syncCountrySelectionAndCompare">
                                    @if (count($worldComparisonRows) > 0)
                                        @include('livewire.partials.simple-table', [
                                            'rows' => $worldComparisonRows,
                                            'showSerial' => true,
                                            'viewType' => 'world',
                                            'columnOrder' => [
                                                'country',
                                                'continent',
                                                'risk_index',
                                                'internet_subscribers_pop',
                                                'internet_subscribers_literate',
                                                'facebook_literate',
                                                'facebook_internet',
                                                'linkedin_literate',
                                                'linkedin_internet',
                                                'twitter_literate',
                                                'twitter_internet',
                                                // 'cyber_risk_rank',
                                            ],
                                        ])
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            <i class="bi bi-exclamation-triangle me-2"></i>
                                            No data available for comparison
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info"
                                    onclick="printModalTable('worldComparisonModal')">
                                    <i class="bi bi-printer me-2"></i>Print
                                </button>
                                <button type="button" class="btn btn-success" wire:click="downloadCountryExcel">
                                    <i class="bi bi-file-earmark-excel me-2"></i>Download Excel
                                </button>
                                <button type="button" class="btn btn-secondary" wire:click="resetWorld"
                                    @click="resetCountrySelection()">
                                    <i class="bi bi-x-circle me-2"></i>Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('districtComparison', () => ({
                selectedDistrictIds: [],
                selectedCountryIds: [],

                toggleSelect(id) {
                    console.log('Toggle district:', id);
                    if (this.selectedDistrictIds.includes(id)) {
                        this.selectedDistrictIds = this.selectedDistrictIds.filter(x => x !== id);
                    } else {
                        if (this.selectedDistrictIds.length < 10) {
                            this.selectedDistrictIds.push(id);
                        } else {
                            alert('Maximum 10 districts can be selected');
                        }
                    }
                    console.log('Selected districts:', this.selectedDistrictIds);
                    // Sync to Livewire
                    this.$wire.set('selectedDistrictIds', this.selectedDistrictIds);
                },

                toggleCountry(id) {
                    console.log('Toggle country:', id);
                    if (this.selectedCountryIds.includes(id)) {
                        this.selectedCountryIds = this.selectedCountryIds.filter(x => x !== id);
                    } else {
                        if (this.selectedCountryIds.length < 5) {
                            this.selectedCountryIds.push(id);
                        } else {
                            alert('Maximum 5 countries can be selected');
                        }
                    }
                    console.log('Selected countries:', this.selectedCountryIds);
                    // Sync to Livewire
                    this.$wire.set('selectedCountryIds', this.selectedCountryIds);
                },

                compareDistricts() {
                    console.log('Comparing districts:', this.selectedDistrictIds);
                    if (this.selectedDistrictIds.length > 0) {
                        this.$wire.syncDistrictSelectionAndCompare();
                    }
                },

                compareCountries() {
                    console.log('Comparing countries:', this.selectedCountryIds);
                    if (this.selectedCountryIds.length > 0) {
                        this.$wire.syncCountrySelectionAndCompare();
                    }
                },

                resetSelection() {
                    console.log('Resetting district selection');
                    this.selectedDistrictIds = [];
                    this.$wire.set('selectedDistrictIds', []);
                },

                resetCountrySelection() {
                    console.log('Resetting country selection');
                    this.selectedCountryIds = [];
                    this.$wire.set('selectedCountryIds', []);
                }
            }))
        });

        // Print function for modal tables
        function printModalTable(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) {
                console.error('Modal not found:', modalId);
                return;
            }

            // Get the modal title and table
            const modalTitle = modal.querySelector('.modal-title')?.innerText || 'Comparison Report';
            const modalBody = modal.querySelector('.modal-body');
            const table = modalBody?.querySelector('table');

            if (!table) {
                console.error('Table not found in modal');
                return;
            }

            // Create a new window for printing
            const printWindow = window.open('', '', 'height=600,width=1000');

            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>${modalTitle}</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                    <style>
                        @media print {
                            body {
                                margin: 20px;
                            }
                            .no-print {
                                display: none !important;
                            }
                            table {
                                page-break-inside: auto;
                            }
                            tr {
                                page-break-inside: avoid;
                                page-break-after: auto;
                            }
                            thead {
                                display: table-header-group;
                            }
                            tfoot {
                                display: table-footer-group;
                            }
                        }
                        body {
                            font-family: Arial, sans-serif;
                            padding: 20px;
                        }
                        h1 {
                            color: #0488cd;
                            margin-bottom: 20px;
                            font-size: 24px;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 20px;
                        }
                        th, td {
                            border: 1px solid #dee2e6;
                            padding: 8px;
                            text-align: left;
                            font-size: 12px;
                        }
                        th {
                            background-color: #f8f9fa;
                            font-weight: bold;
                        }
                        tr:nth-child(even) {
                            background-color: #f8f9fa;
                        }
                        .print-header {
                            margin-bottom: 20px;
                            border-bottom: 2px solid #0488cd;
                            padding-bottom: 10px;
                        }
                        .print-date {
                            color: #6c757d;
                            font-size: 12px;
                            margin-top: 5px;
                        }
                    </style>
                </head>
                <body>
                    <div class="print-header">
                        <h1>${modalTitle}</h1>
                        <div class="print-date">Generated on: ${new Date().toLocaleString()}</div>
                    </div>
                    ${table.outerHTML}
                    <script>
                        window.onload = function() {
                            window.print();
                            window.onafterprint = function() {
                                window.close();
                            };
                        };
                    <\/script>
                </body>
                </html>
            `);

            printWindow.document.close();
        }
    </script>
</div>
