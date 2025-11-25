<div>
    <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    <style>
        /* Heading */
        .first-prompt .firstPrompt h2 {
            font-weight: 600;
        }

        /* Paragraph */
        .first-prompt .firstPrompt>p {
            font-size: 14px !important;
            margin-top: 0px !important;
            margin-bottom: 0px;
        }

        /* Heading */
        .first-prompt .firstPrompt h2 {
            margin-bottom: 0px;
        }

        /* Heading */
        .first-prompt .firstPrompt h2 {
            font-size: 28px;
            font-weight: 700 !important;
        }

        /* Paragraph */
        .container div .container-fluid .row .position-relative .pr-ai-section .first-prompt .firstPrompt>p {
            font-size: 16px !important;
        }

        /* Paragraph */
        .first-prompt .firstPrompt>p {
            line-height: 1.2em;
        }

        /* Column 12/12 */
        .first-prompt .firstPrompt .col-12 {
            transform: translatex(0px) translatey(0px);
        }

        /* First prompt */
        .container div .first-prompt {
            transform: translatex(0px) translatey(0px);
        }

        /* First prompt */
        .container div .container-fluid .row .position-relative .pr-ai-section .first-prompt>.firstPrompt {
            top: 5px !important;
            bottom: auto !important;
        }

        /* Link */
        .card .list-group-flush a {
            transform: translatex(0px) translatey(0px);
        }

        /* List group item */
        .card .list-group-flush .list-group-item:nth-child(5) {
            color: #6f7276;
        }

        /* List group item */
        .card .list-group-flush .list-group-item:nth-child(6) {
            color: #707579;
        }
    </style>

    <div class="container-fluid">
        <div class="row locale-font">
            <div
                class="@if ($output) col-12 @else  col-lg-9 col-md-9 col-sm-12 @endif position-relative">

                <div class="pr-ai-section">
                    <section class="first-prompt">
                        @if ($activeSection['firstPrompt'])
                            <div class="mb-3 text-center firstPrompt">
                                <h2>Country Comparison</h2>
                                <p>Compare Czech Republic with other Countries</p>
                                @if (session()->has('message'))
                                    <p class="text-success"
                                        style="font-size: 14px!important; margin: 0px; padding: 0px;">
                                        {{ session('message') }}</p>
                                @endif
                                <br><br>

                                <div class="row">

                                    <div class="col-12">
                                        <div class="mb-3 firstPrompt">
                                            <div class="main-button-area">
                                                <div class="select-location">
                                                    <div> <button type="button"
                                                            class="btn btn-secondary btn-lg position-relative"
                                                            data-bs-toggle="modal" data-bs-target="#geographyModal">
                                                            {{ $lables['select_location'] }}<br><small>(1 to 3)</small>
                                                        </button>

                                                        @if (session()->has('cityerror'))
                                                            <br>
                                                            <small class="text-danger">
                                                                {{ session('cityerror') }}</small>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <span class="p-2 m-2 border count-box bg-light text-dark"
                                                            id="citiesCount" wire:ignore>
                                                            0
                                                        </span>{{ $lables['selected'] }}
                                                    </div>

                                                </div>
                                                <div class="arrow">
                                                    <div>
                                                        <p><i class='bx bx-down-arrow-alt'></i></p>
                                                    </div>
                                                    <div></div>
                                                </div>
                                                <div class="select-category">
                                                    <div> <button type="button"
                                                            class="btn btn-primary btn-lg position-relative"
                                                            data-bs-toggle="modal" data-bs-target="#categoryModal">
                                                            {{ $lables['select_metrics'] }}<br><small>{{ $lables['2_to_5'] }}</small>
                                                        </button></div>
                                                    <div><span class="p-2 m-2 border count-box bg-light text-dark"
                                                            id="category-count" wire:ignore>
                                                            0
                                                        </span>{{ $lables['selected'] }}
                                                    </div>
                                                </div>
                                                <div class="arrow">
                                                    <div>
                                                        <p><i class='bx bx-down-arrow-alt'></i></p>
                                                    </div>
                                                    <div></div>

                                                </div>
                                                <div class="select-prompt">
                                                    <div>
                                                        <div class="text-center">
                                                            <a class="btn btn-primary" wire:click="generate"
                                                                role="button" tabindex="0"
                                                                wire:loading.attr="disabled"><span
                                                                    class="spinner-border spinner-border-sm"
                                                                    wire:loading> </span>&nbsp; Compare</a>

                                                        </div>
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </section>
                    @if ($output)
                        <a href="/czech-republic-country-comparison " class="btn btn-dark btn-sm"><i
                                class="bx bi-arrow-left"></i>Back</a>
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-center main-title-heading locale-font" style="color: #0000ff">
                                    Country Comparison
                                </p>



                                <section id="outChat">
                                    <div class="p-3 h-100" id="dfggsgzrf">
                                        @foreach ($output['warnings'] ?? [] as $warning)
                                            <p class="warning-chat">{{ $warning }}</p>
                                        @endforeach
                                        <p class="com-chat">
                                            @isset($output['comparison_statement'])
                                                {{ $output['comparison_statement'] }}
                                            @endisset
                                        </p>
                                        <p class="com-chat">
                                            @isset($output['comparison_sentence']['sentence'])
                                                {!! $output['comparison_sentence']['sentence'] !!}
                                                {!! $output['comparison_sentence']['compare'] !!}
                                            @endisset
                                        </p>
                                        @isset($output['api_sentence'])
                                            <div class="mb-2">
                                                @foreach ($output['api_sentence'] as $type => $sentence)
                                                    @foreach ($sentence as $paragraph)
                                                        {{-- @php
                                                            $pgx = highlightFirstOccurrence(
                                                                $paragraph,
                                                                $firstCity,
                                                                $type == 'city' ? 'city' : null,
                                                            );
                                                        @endphp --}}
                                                        <p class="mb-2">{!! $paragraph !!}</p>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        @endisset

                                        @isset($output['sentences']['city'])
                                            <div class="mb-2">
                                                <p class="mb-2">{!! $output['sentences']['city'] !!}</p>
                                            </div>
                                        @endisset
                                        @isset($output['sentences']['state'])
                                            <div class="mb-2">
                                                <p class="mb-2">{!! $output['sentences']['state'] !!}</p>
                                            </div>
                                        @endisset
                                        @isset($output['sentences']['country'])
                                            <div class="mb-2">
                                                <p class="mb-2">{!! $output['sentences']['country'] !!}</p>
                                            </div>
                                        @endisset
                                        @isset($output['sentences']['continent'])
                                            <div class="mb-2">
                                                <p class="mb-2">{!! $output['sentences']['continent'] !!}</p>
                                            </div>
                                        @endisset

                                        @if (!empty($output['city_comparison']))
                                            <div class="p-3 mt-4 border rounded border-info bg-light">
                                                <h6 class="text-info">{{ $lables['city_district_table_title'] }}</h6>
                                                {!! $output['city_comparison'] !!}
                                            </div>
                                        @endif


                                        {{-- Country Comparison Table --}}
                                        @if (!empty($output['country_comparison']))
                                            <div class="p-3 mt-4 border rounded border-info bg-light">
                                                <h6 class="text-info">{{ $lables['counrty_table_title'] }}</h6>
                                                {!! $output['country_comparison'] !!}
                                            </div>
                                        @endif
                                        @if (!empty($output['continent_comparison']))
                                            <div class="p-3 mt-4 border rounded border-info bg-light">
                                                <h6 class="text-info">
                                                    {{ $lables['continent_table_title'] }}
                                                </h6>
                                                {!! $output['continent_comparison'] !!}
                                            </div>
                                        @endif


                                        <section class="sourcedat">
                                            <h6 class="p-2">{{ $lables['source'] }}:</h6>
                                            <ul class="list-group">
                                                @foreach ($output['source'] as $key => $ss)
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">

                                                        <span class="text-small"> [{{ $key }}]
                                                            {{ $ss['local_source'] }}</span>
                                                        <span
                                                            class="badge rounded-pill text-small">{{ $ss['year'] }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </section>
                                        <section class="mt-2 ExploreMoreInsites">
                                            <p class="fw-bold">{{ $lables['explore_more'] }}:</p>
                                            <ul class="row">
                                                @foreach ($cities as $geography)
                                                    <li class="col-4"><a target="_blank" style="text-decoration: none;"
                                                            href="https://g2c.prarang.in/ai/{{ json_decode($geography)->name }}">{{ json_decode($geography)->name }}
                                                            {{ $lables['insights'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </section>
                                    </div>
                                </section>
                            </div>

                        </div>
                    @endif
                    <section id="error-section">
                        @if ($errors->has('cities'))
                            <h6 class="text-danger">{{ $errors->first('cities') }}</h6>
                        @endif
                        @if ($errors->has('subChecks'))
                            <h6 class="text-danger">{{ $errors->first('subChecks') }}</h6>
                        @endif
                    </section>
                </div>
            </div>


            <!-- 4 Column (Sidebar as Offcanvas on mobile) -->
            <div class="@if ($output) d-none @else col-lg-3 d-none d-lg-block @endif">
                <br><br>
                <div class="card shadow-sm border-0">

                    <div class="list-group list-group-flush">

                        <a class="list-group-item list-group-item-action side-buttons" type="button"
                            href="javascript:void(0)" type="button" data-bs-toggle="offcanvas">Country
                            Comparison</a>

                        <a href="https://g2c.prarang.in/ai/czech-republic"
                            class="list-group-item list-group-item-action" target="_blank">
                            Czech Republic AI Report
                        </a>
                        <a href="https://g2c.prarang.in/world/development-planner"
                            class="list-group-item list-group-item-action" target="_blank">
                            World Development Planner
                        </a>
                        <a href="https://g2c.prarang.in/world/market-planner"
                            class="list-group-item list-group-item-action" target="_blank">
                            World Market Planner
                        </a>
                        <a href="javascript:void(0)" class="list-group-item list-group-item-action" target="_blank">
                            Czech Development Planner <small>(Coming Soon)</small>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item list-group-item-action" target="_blank">
                            Czech Market Planner <small>(Coming Soon)</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category Modal -->
    <div class="modal fade" id="categoryModal" wire:ignore tabindex="-1" aria-labelledby="categoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel"><small>
                            <p class="mb-2 text-info">{{ $lables['metrics_select_message'] }}</p>
                        </small></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-4 col-md-2" id="categoryTabsContainer">
                            <ul class="nav nav-pills flex-column" id="categoryTabs" role="tablist">
                                @foreach (config('verticals') as $main => $subs)
                                    <li class="mb-1 nav-item" role="presentation">
                                        <button
                                            class="nav-link w-100 text-start @if ($loop->first) active @endif"
                                            id="tab-{{ $main }}" data-bs-toggle="tab"
                                            data-bs-target="#content-{{ $main }}" type="button"
                                            role="tab" aria-controls="content-{{ $main }}"
                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                            {{ __('metrics.' . $subs) }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-8 col-md-10">
                            <div class="tab-content" id="categoryTabsContent">
                                @foreach ($mainChecks as $main => $subs)
                                    <div class="tab-pane fade @if ($loop->first) show active @endif"
                                        id="content-{{ $main }}" role="tabpanel"
                                        aria-labelledby="tab-{{ $main }}">
                                        <div class="p-3 border rounded shadow-sm">

                                            <div class="row">
                                                @php
                                                    $types = ['World (& India)', 'World Only', 'World'];
                                                @endphp
                                                @foreach ($types as $type)
                                                    @if (collect($subs)->contains('type', $type))
                                                        <div class="pb-3 col-12">

                                                        </div>
                                                    @endif
                                                    @foreach ($subs as $sub)
                                                        @if ($sub['type'] === $type)
                                                            <div class="mb-2 col-12 col-sm-4 col-lg-3">
                                                                <div class="form-check">
                                                                    <input wire:loading.attr="disabled"
                                                                        wire:model="subChecks.{{ $sub['type'] }}.{{ $sub['id'] }}"
                                                                        type="checkbox" class="form-check-input"
                                                                        id="sub-{{ $sub['type'] }}-{{ $sub['id'] }}"
                                                                        value="{{ $sub['id'] }}">
                                                                    <label class="form-check-label small"
                                                                        for="sub-{{ $sub['type'] }}-{{ $sub['id'] }}">
                                                                        {{ $sub['local'] }}
                                                                        <span
                                                                            class="text-primary">{{ $sub['geo_type'] == 'in_dist' ? 'District' : '' }}</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <p class="text-center me-5"><span id="metrics-selecte-alert">0</span> {{ $lables['selected'] }}
                    </p>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        {{ $lables['done'] }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Geography Modal -->
    <div class="modal fade" id="geographyModal" tabindex="-1" aria-labelledby="geographyModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel"><small>
                            <p class="mb-2 text-info">You can select up to 3 Countries.</p>
                        </small></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div id="selectesGeographyAll"></div>

                    @php use Illuminate\Support\Str; @endphp

                    <div class="accordion" id="accordionCitiesCountries">
                        <div class="row">

                            {{-- World Countries --}}
                            <div class="col-sm-12">
                                <h5 class="mb-3">Compare Czech Republic with ...</h5>
                                @foreach ($citiesTOChose['country'] as $continent => $countries)
                                    @php $continentId = Str::slug($continent, '_'); @endphp
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-{{ $continentId }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $continentId }}" aria-expanded="false"
                                                aria-controls="collapse-{{ $continentId }}">
                                                {{ __('location.' . str_replace(' ', '_', strtolower($continent))) ?? $continent }}
                                            </button>
                                        </h2>
                                        <div id="collapse-{{ $continentId }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading-{{ $continentId }}"
                                            data-bs-parent="#accordionCitiesCountries">
                                            <div class="accordion-body">

                                                <div class="row">
                                                    @foreach ($countries as $country)
                                                        <div class="col-4 col-md-3 mb-2">

                                                            <input class="form-check-input me-1" type="checkbox"
                                                                wire:model="cities"
                                                                value="{{ json_encode(['name' => $country['name'], 'real_name' => $country['Country']]) }}"
                                                                @if ($country['id'] == 122) checked disabled @endif
                                                                id="country-{{ $country['id'] }}">
                                                            <label class="form-check-label"
                                                                for="country-{{ $country['id'] }}">
                                                                {{ $country['Country'] }}
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
                <div class="modal-footer">
                    <p class="text-center me-5"><span id="location-selecte-alert">0</span> {{ $lables['selected'] }}
                    </p>
                    <button type="button" class="btn btn-primary"
                        onclick="geoSelect()">{{ $lables['done'] }}</button>
                </div>
            </div>

        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {


            // Debugging logs
            console.log('Upmana AI page loaded');

            // Log the output content
            const outputElement = document.getElementById('outChat');
            if (outputElement) {
                console.log('Output Content:', outputElement.innerHTML.trim());
            } else {
                console.error('Output element #outChat not found!');
            }
        });

        function setContents() {

            const outChatElement = document.getElementById('outChat');


            if (!outChatElement) {
                alert('Please generate Upmana content first!');
                return false;
            }

            const content = outChatElement.innerHTML.trim();
            if (!content) {
                alert('Please generate Upmana content first!');
                return false;
            }

            const contentInput = document.getElementById('content-input');
            if (!contentInput) {
                alert('Error setting content!');
                return false;
            }

            contentInput.value = content;


            return true; // Allow form to submit
        }

        // Ensure content is set before form submission
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[data-parallel="true"]');
            if (form) {
                form.addEventListener('submit', function(event) {
                    if (!setContent()) {
                        event.preventDefault();
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accordion = document.getElementById('accordionCitiesCountries');
            const checkboxes = accordion.querySelectorAll('input[type="checkbox"]');
            const countDisplay = document.getElementById('citiesCount');
            const locationSelecteAlert = document.getElementById('location-selecte-alert');
            const maxLimit = 3;

            function updateCountAndToggle() {
                const czechRepublicCheckbox = document.getElementById('country-122');
                if (czechRepublicCheckbox.checked === false) {
                    czechRepublicCheckbox.checked = true;
                }

                const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
                const checkedCount = checkedBoxes.length - 1; // Exclude Czech Republic
                if (countDisplay) {
                    countDisplay.textContent = checkedCount;
                }
                if (locationSelecteAlert) {
                    locationSelecteAlert.textContent = checkedCount;
                }

                checkboxes.forEach(cb => {
                    if (!cb.checked) {
                        cb.disabled = checkedCount >= maxLimit;
                    } else {
                        cb.disabled = false;
                    }
                });
            }
            checkboxes.forEach(cb => {
                cb.addEventListener('change', updateCountAndToggle);
            });
            updateCountAndToggle();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('#categoryTabsContent input[type="checkbox"]');
            const resetButton = document.getElementById('resetAllBtn');
            const categoryBadges = document.getElementById('category-count');
            const metricsSelecteAlert = document.getElementById('metrics-selecte-alert');

            function updateCheckboxStates() {
                const selectedCheckboxes = document.querySelectorAll(
                    '#categoryTabsContent input[type="checkbox"]:checked');
                const selectedCount = selectedCheckboxes.length;

                if (selectedCount >= 5) {
                    checkboxes.forEach(cb => {
                        if (!cb.checked) {
                            cb.disabled = true;
                        }
                    });
                } else {
                    checkboxes.forEach(cb => cb.disabled = false);
                }

                if (selectedCount > 0) {
                    // categoryBadges.classList.remove('d-none');/
                    categoryBadges.innerHTML = `${selectedCount}`
                }
                if (metricsSelecteAlert) {
                    metricsSelecteAlert.innerHTML = `${selectedCount}`
                }
            }

            checkboxes.forEach(cb => {
                cb.addEventListener('change', function() {
                    updateCheckboxStates();
                });
            });

            resetButton.addEventListener('click', () => {
                checkboxes.forEach(cb => {
                    cb.checked = false;
                    cb.disabled = false;
                });
                updateCheckboxStates();
            });

            updateCheckboxStates();
        });
    </script>

    <script>
        function geoSelect() {

            // Close Bootstrap modal
            const modalEl = document.getElementById('geographyModal');
            const modalInstance = bootstrap.Modal.getInstance(modalEl);
            if (modalInstance) modalInstance.hide();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const registerModal = new bootstrap.Modal(document.getElementById('popupregister'));
            // registerModal.show();

            window.addEventListener('show-register-modal', () => {
                registerModal.show();
            });
            window.addEventListener('close-register-modal', () => {
                registerModal.hide();
            });
        });
    </script>

    <script>
        let selectedSequence = [];
        document.addEventListener('DOMContentLoaded', function() {

            function updateOrderNumbers() {

                document.querySelectorAll('.order-number').forEach(span => {
                    span.textContent = '';
                    span.classList.remove('d-inline-block');
                });
                selectedSequence.forEach((model, index) => {
                    const checkbox = document.querySelector(`input[name="model[]"][data-ai="${model}"]`);
                    if (checkbox && checkbox.checked) {
                        const orderSpan = checkbox.closest('label').querySelector('.order-number'); // SAFER
                        if (orderSpan) {
                            let mainModal = checkbox.getAttribute('data-ai');
                            checkbox.value = mainModal + '-' + (index + 1);
                            orderSpan.textContent = index + 1;
                            orderSpan.classList.add('d-inline-block');
                        }
                    }
                });
            }
            document.querySelectorAll('input[name="model[]"]:checked').forEach(checkbox => {
                const value = checkbox.getAttribute('data-ai');
                if (!selectedSequence.includes(value)) {
                    selectedSequence.push(value);
                }
            });
            updateOrderNumbers();

            document.addEventListener('change', function(e) {
                if (e.target.matches('input[name="model[]"]')) {
                    const value = e.target.getAttribute('data-ai');
                    if (e.target.checked) {
                        if (!selectedSequence.includes(value)) {
                            selectedSequence.push(value);
                        }
                    } else {
                        selectedSequence = selectedSequence.filter(v => v !== value);
                    }
                    updateOrderNumbers();
                }
            });
        });
    </script>

    <!-- FAQ Modal -->
    <div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="faqModalLabel">Country Comparison Tool - FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-4">
                        The Country Comparison Tool helps users create knowledge through comparison. It enables clear
                        and structured comparisons between the Czech Republic and other countries, offering practical
                        insights into country-level metrics, relative advantages, and differences across multiple
                        analytical dimensions.
                    </p>

                    <div class="accordion" id="faqAccordion">
                        <!-- Q1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What does this comparison tool do?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The Tool enables users to compare the Czech Republic with one to three countries out
                                    of the 195 UN-recognized countries, using an analytical context. It allows
                                    meaningful comparison across geographies based on metrics drawn from our
                                    multidimensional data framework.
                                </div>
                            </div>
                        </div>

                        <!-- Q2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How do I compare countries using this tool?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <ol>
                                        <li><strong>Select the countries</strong> you wish to compare with the Czech
                                            Republic. You may choose 1–3 countries.</li>
                                        <li><strong>Select any metric</strong> from our multidimensional database on
                                            which you want the comparison to be performed.</li>
                                        <li><strong>View results:</strong> The tool will then generate analytical
                                            insights based on the selected geographies and metrics.</li>
                                    </ol>
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

    <script>
        // Open FAQ modal when FAQ button is clicked
        document.addEventListener('DOMContentLoaded', function() {
            const faqButton = document.querySelector('.side-buttons');
            if (faqButton) {
                faqButton.addEventListener('click', function() {
                    const faqModal = new bootstrap.Modal(document.getElementById('faqModal'));
                    faqModal.show();
                });
            }
        });
    </script>
</div>
