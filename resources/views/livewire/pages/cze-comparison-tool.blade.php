<div>
    {{-- Header Section --}}
    <style>
        /* Paragraph */
        .comparison-tool-container section p {
            text-align: justify;
        }

        /* Img click */
        .img-click {
            display: grid;
            align-self: center;
        }

        /* Img click */
        .container div .comparison-tool-container .row .col-12 section .img-click {
            display: grid !important;
        }


        /* Img click */
        .img-click {
            grid-template-columns: 48% 48% !important;
        }

        /* Image */
        .img-click a img {
            width: 350px;
        }

        /* Flex column */
        .comparison-tool-container .img-click {
            display: block !important;
            justify-content: center;

        }

        /* Link */
        .comparison-tool-container .img-click a {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transform: translatex(0px) translatey(0px);
            margin-bottom: 19px;
        }

        /* Heading */
        .img-click a h3 {
            background-color: #0d6efd;
            color: #ffffff;
            padding-left: 20px;
            padding-right: 20px;
        }

        /* Badge */
        .flex-column .d-flex .badge {
            border-top-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
            border-bottom-left-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
            background-color: rgba(13, 202, 240, 0) !important;
            color: #000000 !important;
            font-weight: 400;
            font-size: 16px !important;
            border-style: solid;
            border-width: 1px;
            padding-top: 12px !important;
            transform: translatex(0px) translatey(0px);
            padding-bottom: 12px !important;
        }

        /* Button */
        .flex-column .d-flex .btn-primary {
            padding-top: 7px !important;
            padding-bottom: 8px !important;
        }

        /* Small Tag */
        .flex-column .d-flex small {
            font-size: 14px;
        }

        /* Location modal */
        #locationModal {
            transform: translatex(0px) translatey(0px);
        }

        /* Button */
        .flex-column .d-flex .btn-primary {
            font-size: 16px;
        }

        /* Button */
        .col-lg-9 .flex-column .btn-primary {
            border-top-left-radius: 6px !important;
            border-top-right-radius: 6px !important;
            border-bottom-left-radius: 6px !important;
            border-bottom-right-radius: 6px !important;
            position: relative;
            left: 0px;
        }

        /* Svg */
        .flex-column .bi {
            position: relative;
            left: -70px;
        }

        /* Button */
        .container div .btn-primary:nth-child(3) {
            left: -76px;
            padding-right: 17px !important;
            padding-left: 43px !important;
        }

        /* Bold */
        .flex-column .d-flex .fw-bold {
            font-weight: 400 !important;
            font-size: 16px !important;
        }

        /* Button */
        .container div .btn-primary:nth-child(3) {
            left: -69px !important;
        }

        /* Button */
        .container div .comparison-tool-container .row .col-lg-9 .flex-column .btn-primary:nth-child(3) {
            right: auto !important;
        }

        /* Paragraph */
        .comparison-tool-container section p {
            color: #000000;
        }

        /* Span Tag */


        /* Paragraph */
        .comparison-tool-container section p {
            margin-bottom: 5px;
        }

        /* Img click */
        .comparison-tool-container section .img-click {
            margin-top: 30px;
        }

        /* Button */
        .container div .comparison-tool-container .row .col-lg-9 .flex-column .btn-primary {
            padding-right: 26px !important;
            padding-left: 26px !important;
        }
    </style>

    <div class="comparison-tool-container mt-2">
        <div class="row">
            @if ($isConfirmed)
                <a href="/czech-republic-regional-comparison " class="btn btn-dark btn-sm" style="width: 100px"><i
                        class="bx bi-arrow-left "></i>Back</a>
            @endif
            <div class="@if ($isConfirmed) col-12 @else col-lg-9 col-md-7 @endif">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-dark mb-2">Regional Comparison</h3>
                    <p class="text-dark opacity-90 mb-0">Compare Czech Republic Regions with Indian Districts</p>
                </div>
                @if (!$isConfirmed)
                    {{-- Selection Mode --}}
                    <section class="d-flex flex-column align-items-center gap-4">
                        {{-- Selection Button & Counter --}}
                        <div class="d-flex align-items-center gap-3">
                            <button type="button" class="btn btn-primary btn-lg shadow-sm" data-bs-toggle="modal"
                                data-bs-target="#locationModal" style="border-radius: 12px; padding: 12px 24px;">
                                Select Locations<br>
                                <small class="opacity-75">(1 Czech + up to {{ $maxIndiaCities }} Indian)</small>
                            </button>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-info text-white px-3 py-2"
                                    style="font-size: 1.5rem; border-radius: 8px;">
                                    {{ $this->selectedCount }}
                                </span>
                                <span class="fw-bold" style="font-size: 1.1rem;">Selected</span>
                            </div>
                        </div>
                        {{-- Arrow Indicator --}}
                        <div class="text-center">
                            <i class="bi bi-arrow-down text-primary" style="font-size: 2rem;"></i>
                        </div>

                        {{-- Compare Button with Loading State --}}
                        <button class="btn btn-primary btn-lg px-5 py-3 fw-bold shadow"
                            style="border-radius: 12px; font-size: 1.1rem;" wire:click="confirmSelection"
                            wire:loading.attr="disabled" wire:target="confirmSelection">
                            <span wire:loading.remove wire:target="confirmSelection">
                                Compare Regions
                            </span>
                            <span wire:loading wire:target="confirmSelection">
                                <span class="spinner-border spinner-border-sm me-2"></span>Loading...
                            </span>
                        </button>

                        {{-- Error Message Display --}}
                        @if ($errorMessage)
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ $errorMessage }}
                                <button type="button" class="btn-close" wire:click="$set('errorMessage', '')"></button>
                            </div>
                        @endif
                    </section>
                @else
                    <section>
                        @if ($output)
                            @foreach ($output['cze'] as $czesen)
                                {{-- <p><span style="color: #0000ff" class="fw-bold"> {!! $this->czeRegionName !!}, </span><br> --}}
                                {!! $czesen !!}</p>
                            @endforeach
                            @foreach ($output['india'] as $indiasen)
                                <p> {!! $indiasen !!}</p>
                            @endforeach

                        @endif
                    </section>
                    {{-- Comparison Results --}}
                    <section class="">

                        <div class="img-click">
                            <a href="https://g2c.prarang.in/czech-republic/{{ Str::slug($this->czeRegionName) }}?data=1"
                                target="_blank">
                                <h3>{{ $this->czeRegionName }}</h3>
                                <img src="https://www.prarang.in/matric-.JPG" alt="Czech - India Comparison Data"
                                    class="img-fluid rounded shadow-sm border">
                            </a>
                            @foreach ($selectedIndiaCities as $cityData)
                                <a href="https://g2c.prarang.in/{{ $cityData['city'] }}?data=1" target="_blank">
                                    <h3>{{ $cityData['city'] }}</h3>
                                    <img src="https://www.prarang.in/matric-.JPG" alt="Czech - India Comparison Data"
                                        class="img-fluid rounded shadow-sm border">
                                </a>
                            @endforeach
                        </div>
                    </section>
                @endif

                {{-- Location Selection Modal --}}
                <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel"
                    aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <div>
                                    <h5 class="modal-title fw-bold" id="locationModalLabel">
                                        Select Locations for Comparison
                                    </h5>
                                    <small class="text-muted">Choose 1 Czech region and up to {{ $maxIndiaCities }}
                                        Indian cities</small>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    {{-- Czech Republic Regions --}}
                                    <div class="col-md-5 border-end">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="fw-bold mb-0">
                                                Czech Republic Regions
                                            </h6>
                                            <!-- <span class="badge bg-primary">
                                                {{ $selectedCzeRegion ? '1' : '0' }}/1
                                            </span> -->
                                        </div>

                                        <!-- <div wire:loading wire:target="toggleCzeRegion" class="text-center py-2">
                                            <div class="spinner-border spinner-border-sm text-primary"></div>
                                            <span class="ms-2 text-muted small">Updating...</span>
                                        </div> -->

                                        <div class="list-group" style="max-height: 450px; overflow-y: auto;">
                                            @foreach ($czechRegions as $id => $regionName)
                                                <label
                                                    class="list-group-item d-flex align-items-center gap-3 border-0 py-2"
                                                    style="cursor: pointer; transition: background-color 0.2s;"
                                                    onmouseover="this.style.backgroundColor='#f8f9fa'"
                                                    onmouseout="this.style.backgroundColor='transparent'">
                                                    <input class="form-check-input flex-shrink-0 m-0" type="radio"
                                                        name="czechRegion" value="{{ $id }}"
                                                        wire:click="toggleCzeRegion({{ $id }})"
                                                        @checked($selectedCzeRegion == $id)>
                                                    <span class="form-check-label">{{ $regionName }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    {{-- Indian Cities --}}
                                    <div class="col-md-7">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="fw-bold mb-0">
                                                Indian Cities
                                            </h6>
                                            <span class="badge"
                                                :class="count($selectedIndiaCities) >= $maxIndiaCities ? 'bg-danger' :
                                                    'bg-success'">
                                                {{ count($selectedIndiaCities) }}/{{ $maxIndiaCities }}
                                            </span>
                                        </div>

                                        <!-- <div wire:loading wire:target="toggleIndiaCity" class="text-center py-2">
                                            <div class="spinner-border spinner-border-sm text-success"></div>
                                            <span class="ms-2 text-muted small">Updating...</span>
                                        </div> -->

                                        <div class="accordion" id="indianStatesAccordion"
                                            style="max-height: 450px; overflow-y: auto;" wire:ignore.self>
                                            @foreach ($indianStates as $stateName => $cities)
                                                <div class="accordion-item" wire:ignore.self>
                                                    <h2 class="accordion-header"
                                                        id="heading{{ str_replace(' ', '', $stateName) }}">
                                                        <button class="accordion-button collapsed fw-semibold"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ str_replace(' ', '', $stateName) }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapse{{ str_replace(' ', '', $stateName) }}">
                                                            {{ $stateName }}
                                                            <!-- <span
                                                                class="badge bg-secondary ms-2">{{ count($cities) }}</span> -->
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ str_replace(' ', '', $stateName) }}"
                                                        wire:ignore.self class="accordion-collapse collapse"
                                                        aria-labelledby="heading{{ str_replace(' ', '', $stateName) }}"
                                                        data-bs-parent="#indianStatesAccordion">
                                                        <div class="accordion-body">
                                                            <div class="row g-2">
                                                                @foreach ($cities as $cityData)
                                                                    @php
                                                                        $isSelected = in_array(
                                                                            $cityData['id'],
                                                                            array_column($selectedIndiaCities, 'id'),
                                                                        );
                                                                    @endphp
                                                                    <div class="col-md-6 col-12">
                                                                        <label
                                                                            class="d-flex align-items-center gap-2 p-2 rounded"
                                                                            style="cursor: pointer; transition: background-color 0.2s;"
                                                                            onmouseover="this.style.backgroundColor='#f0f8ff'"
                                                                            onmouseout="this.style.backgroundColor='transparent'">
                                                                            <input
                                                                                class="form-check-input m-0 flex-shrink-0"
                                                                                type="checkbox"
                                                                                value="{{ $cityData['id'] }}"
                                                                                wire:click="toggleIndiaCity({{ $cityData['id'] }}, '{{ $cityData['city'] }}')"
                                                                                @checked($isSelected)
                                                                                @disabled(count($selectedIndiaCities) >= $maxIndiaCities && !$isSelected)>
                                                                            <span
                                                                                class="form-check-label">{{ $cityData['city'] }}</span>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer bg-light">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="text-muted small">
                                        Selected: <strong>{{ $this->selectedCount }}</strong>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                            Done
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-3 col-md-5" @if ($isConfirmed) style="display: none;" @endif>
                <br><br>
                <div class="card shadow-sm border-0">

                    <div class="list-group list-group-flush">
                        <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal"
                            data-bs-target="#faqModal">
                            <span class="">Regional Comparison</span>
                        </button>
                        <a href="https://g2c.prarang.in/ai/czech-republic" target="_blank"
                            class="list-group-item list-group-item-action" target="_blank">
                            Czech Republic AI Report
                        </a>
                        <a href="https://g2c.prarang.in/ai/India" class="list-group-item list-group-item-action"
                            target="_blank">
                            India AI Report
                        </a>
                        <a href="https://g2c.prarang.in/india/development-planners"
                            class="list-group-item list-group-item-action" target="_blank">
                            India Development Planner
                        </a>
                        <a href="https://g2c.prarang.in/india/market-planner/states"
                            class="list-group-item list-group-item-action" target="_blank">
                            India Market Planner
                        </a>
                        <button type="button" class="list-group-item list-group-item-action text-muted"
                            onclick="showComingSoonToast()">
                            Czech Development Planner <small>(Coming Soon)</small>
                        </button>
                        <button type="button" class="list-group-item list-group-item-action text-muted"
                            onclick="showComingSoonToast()">
                            Czech Market Planner <small>(Coming Soon)</small>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        {{-- Toast Notifications --}}
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999">
            {{-- Coming Soon Toast --}}
            <div id="comingSoonToast" class="toast align-items-center border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <strong>This feature is coming soon!</strong>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>

            {{-- Dynamic Toast for Livewire Events --}}
            <div id="dynamicToast" class="toast align-items-center border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body" id="dynamicToastBody">
                        <!-- Dynamic content here -->
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>

    </div>

    <!-- FAQ Modal -->
    <div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="faqModalLabel">Frequently Asked Questions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="faqAccordion">
                        <!-- Q1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseOne" aria-expanded="true"
                                    aria-controls="faqCollapseOne">
                                    What does this comparison tool do?
                                </button>
                            </h2>
                            <div id="faqCollapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    This tool allows users to compare any region (Kraj) of the Czech Republic with
                                    up to
                                    three districts from India. It provides informative statements about the
                                    selected
                                    regions and links directly to their detailed data pages in our database, where
                                    each
                                    region is presented in ranked form for easier interpretation.
                                </div>
                            </div>
                        </div>
                        <!-- Q2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseTwo" aria-expanded="false"
                                    aria-controls="faqCollapseTwo">
                                    How many regions can I compare?
                                </button>
                            </h2>
                            <div id="faqCollapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <strong>Czech Republic:</strong> You can select one of the 13 traditional
                                    regions
                                    (Kraj). Prague and Central Bohemia are treated as a single combined region in
                                    this
                                    tool.<br><br>
                                    <strong>India:</strong> You may select 1–3 districts from a total of 768
                                    districts
                                    included in our analytics database.
                                </div>
                            </div>
                        </div>
                        <!-- Q3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseThree" aria-expanded="false"
                                    aria-controls="faqCollapseThree">
                                    Why does the tool use 13+1 Czech regions and 768 Indian districts?
                                </button>
                            </h2>
                            <div id="faqCollapseThree" class="accordion-collapse collapse"
                                aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    In the Czech Republic, population censuses have been conducted at regular intervals
                                    since 1869. In recent decades, data is typically reported at the level of the 14
                                    current regions (kraje) - 13 regions plus the capital city of Prague as a separate
                                    region. <br><br>
                                    In India, the Census has been conducted since the 1880s, and the 2011 Census
                                    officially recorded 640 districts. The next Census is expected in 2027, and in the
                                    years between, the number of districts has increased to 800+. In our analytics
                                    database, these have been standardized to 768 districts as of now, to maintain
                                    consistency and enable meaningful comparison across regions.

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Show "Coming Soon" toast
            function showComingSoonToast() {
                const toastEl = document.getElementById('comingSoonToast');
                const toast = new bootstrap.Toast(toastEl, {
                    delay: 3000
                });
                toast.show();
            }

            // Listen for Livewire toast events
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('show-toast', (event) => {
                    const data = event[0] || event;
                    const type = data.type || 'info';
                    const message = data.message || 'Notification';

                    const toastEl = document.getElementById('dynamicToast');
                    const toastBody = document.getElementById('dynamicToastBody');

                    toastBody.innerHTML = `<strong>${message}</strong>`;

                    const toast = new bootstrap.Toast(toastEl, {
                        delay: 3000
                    });
                    toast.show();
                });
            });
        </script>
    @endpush
</div>
