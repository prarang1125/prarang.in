<div>
    <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/portal/css/comparison.css') }}">

    <style>
        .first-prompt .firstPrompt>small {
            position: relative;
            top: -26px;
        }

        .first-prompt .firstPrompt h2 {
            padding-right: 35px;
        }
    </style>

    <div class="container-fluid" id="toprint">
        <div class="row locale-font">
            <div class="{{ $output ? 'col-12' : '' }} position-relative">
                <div class="pr-ai-section">

                    {{-- ── First Prompt Section ── --}}
                    <section class="first-prompt">
                        @if ($activeSection['firstPrompt'])
                            <div class="mb-3 text-center firstPrompt">
                                <p class="text-end mt-3">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#faqModal">
                                        FAQ
                                    </a>
                                </p>

                                <h2>Country Comparison</h2>
                                <p>Compare {{ $country1 }} and {{ $country2 }} with other Countries</p>
                                <small>(Powered by Prarang's Comparative A.I.)</small>

                                @if (session()->has('message'))
                                    <p class="text-success" style="font-size:14px;margin:0;padding:0;">
                                        {{ session('message') }}
                                    </p>
                                @endif

                                <br><br>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3 firstPrompt">
                                            <div class="main-button-area">

                                                {{-- Select Location --}}
                                                <div class="select-location">
                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-secondary btn-lg position-relative"
                                                            data-bs-toggle="modal" data-bs-target="#geographyModal">
                                                            {{ $lables['select_location'] }}<br>
                                                            <small>(1 to 5)</small>
                                                        </button>

                                                        @if (session()->has('cityerror'))
                                                            <br>
                                                            <small
                                                                class="text-danger">{{ session('cityerror') }}</small>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <span class="p-2 m-2 border count-box bg-light text-dark"
                                                            id="citiesCount" wire:ignore>0</span>
                                                        {{ $lables['selected'] ?? 'Selected' }}
                                                    </div>
                                                </div>

                                                <div class="arrow">
                                                    <div>
                                                        <p><i class='bx bx-down-arrow-alt'></i></p>
                                                    </div>
                                                    <div></div>
                                                </div>

                                                {{-- Select Metrics --}}
                                                <div class="select-category">
                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-primary btn-lg position-relative"
                                                            data-bs-toggle="modal" data-bs-target="#categoryModal">
                                                            {{ $lables['select_metrics'] }}<br>
                                                            <small>(1 to 5)</small>
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <span class="p-2 m-2 border count-box bg-light text-dark"
                                                            id="category-count" wire:ignore>0</span>
                                                        {{ $lables['selected'] }}
                                                    </div>
                                                </div>

                                                <div class="arrow">
                                                    <div>
                                                        <p><i class='bx bx-down-arrow-alt'></i></p>
                                                    </div>
                                                    <div></div>
                                                </div>

                                                {{-- Compare Button --}}
                                                <div class="select-prompt">
                                                    <div>
                                                        <div class="text-center">
                                                            <a class="btn btn-primary" wire:click="generate"
                                                                role="button" tabindex="0"
                                                                wire:loading.attr="disabled" wire:target="generate">
                                                                <span class="spinner-border spinner-border-sm"
                                                                    wire:loading wire:target="generate"></span>&nbsp;
                                                                Compare
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </section>

                    {{-- ── Output Section ── --}}
                    @if ($output)
                        @php
                            #/India/Canada%20/country-comparison/157/63
                            $backUrl = $country1
                                ? url("/{$country1}/{$country2}/country-comparison/{$code1}/{$code2}")
                                : url('/');
                            $cityValues = implode('-', array_map(fn($c) => json_decode($c)->name, $cities));
                            $metrics = implode('-', array_keys($subChecks['World'] ?? []));
                            $shareStr = $cityValues . '@' . $metrics;
                            $currentUrl = url($backUrl) . '?share=' . base64_encode($shareStr);
                        @endphp

                        <x-action-buttons :backUrl="$backUrl" :currentUrl="$currentUrl" />

                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-center main-title-heading locale-font" style="color:#0000ff">
                                <h2>

                                    Country Comparison
                                </h2>
                                </p>

                                <section id="outChat">
                                    <div class="p-3 h-100" id="dfggsgzrf">

                                        <p class="rounded border py-2 px-1 mb-3">{{ $prompt ?? '' }}</p>

                                        @foreach ($output['warnings'] ?? [] as $warning)
                                            <p class="warning-chat">{{ $warning }}</p>
                                        @endforeach

                                        @isset($output['comparison_statement'])
                                            <p class="com-chat">{{ $output['comparison_statement'] }}</p>
                                        @endisset

                                        @isset($output['comparison_sentence']['sentence'])
                                            <p class="com-chat">
                                                {!! $output['comparison_sentence']['sentence'] !!}
                                                <br>
                                                {!! $output['comparison_sentence']['compare'] !!}
                                            </p>
                                        @endisset

                                        {{-- API Sentences --}}
                                        @foreach (['city', 'country'] as $key)
                                            @isset($output['api_sentence'][$key])
                                                <div class="mb-2">
                                                    @foreach ($output['api_sentence'][$key] as $paragraph)
                                                        <p class="mb-2">{!! $paragraph !!}</p>
                                                    @endforeach
                                                </div>
                                            @endisset
                                        @endforeach

                                        {{-- Sentences --}}
                                        @foreach (['country', 'city', 'state', 'continent'] as $key)
                                            @isset($output['sentences'][$key])
                                                <div class="mb-2">
                                                    <p class="mb-2">{!! $output['sentences'][$key] !!}</p>
                                                </div>
                                            @endisset
                                        @endforeach

                                        {{-- Country Comparison Table --}}
                                        @if (!empty($output['country_comparison']))
                                            <div class="p-3 mt-4 border rounded border-info bg-light">
                                                <h6 class="text-info">{{ $lables['counrty_table_title'] }}</h6>
                                                {!! $output['country_comparison'] !!}
                                            </div>
                                        @endif

                                        {{-- Continent Comparison Table --}}
                                        @if (!empty($output['continent_comparison']))
                                            <div class="p-3 mt-4 border rounded border-info bg-light">
                                                <h6 class="text-info">{{ $lables['continent_table_title'] }}</h6>
                                                {!! $output['continent_comparison'] !!}
                                            </div>
                                        @endif

                                        {{-- Sources --}}
                                        <section class="sourcedat">
                                            <h6 class="p-2">{{ $lables['source'] }}:</h6>
                                            <ul class="list-group">
                                                @foreach ($output['source'] as $key => $ss)
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="text-small">[{{ $key }}]
                                                            {{ $ss['local_source'] ?? $ss['source'] }}</span>
                                                        <span
                                                            class="badge rounded-pill text-small">{{ $ss['year'] }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </section>

                                        {{-- Explore More --}}
                                        <section class="mt-2 ExploreMoreInsites">
                                            <p class="fw-bold">{{ $lables['explore_more'] }}:</p>
                                            <ul class="row">
                                                @foreach ($cities as $geography)
                                                    <li class="col-12 col-md-3">
                                                        <a target="_blank" style="text-decoration:none;"
                                                            href="https://g2c.prarang.in/ai/{{ json_decode($geography)->name }}">
                                                            {{ json_decode($geography)->name }}
                                                            {{ $lables['insights'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </section>

                                    </div>
                                </section>
                            </div>
                        </div>
                    @endif

                    {{-- Validation Errors --}}
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
        </div>
    </div>

    {{-- ── Category Modal ── --}}
    <div class="modal fade" id="categoryModal" wire:ignore tabindex="-1" aria-labelledby="categoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">
                        <small>
                            <p class="mb-2 text-info">{{ $lables['metrics_select_message'] }}</p>
                        </small>
                    </h5>
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
                                                @foreach ($subs as $sub)
                                                    @if ($sub['type'] === 'World')
                                                        <div class="mb-2 col-12 col-sm-4 col-lg-4">
                                                            <div class="form-check">
                                                                <input wire:loading.attr="disabled"
                                                                    wire:model="subChecks.{{ $sub['type'] }}.{{ $sub['id'] }}"
                                                                    type="checkbox" class="form-check-input"
                                                                    id="sub-{{ $sub['type'] }}-{{ $sub['id'] }}"
                                                                    value="{{ $sub['id'] }}">
                                                                <label class="form-check-label small"
                                                                    for="sub-{{ $sub['type'] }}-{{ $sub['id'] }}">
                                                                    {{ $sub['local'] }}
                                                                    <span class="text-primary">
                                                                        {{ $sub['geo_type'] == 'in_dist' ? 'District' : '' }}
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endif
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
                    <p class="text-center me-5">
                        <span id="metrics-selecte-alert">0</span> {{ $lables['selected'] }}
                    </p>
                    <button type="button" id="resetAllBtn" class="btn btn-outline-secondary">Reset</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        {{ $lables['done'] }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Geography Modal ── --}}
    <div class="modal fade" id="geographyModal" tabindex="-1" aria-labelledby="geographyModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="geographyModalLabel">
                        <small>
                            <p class="mb-2 text-info">Select up to 5 countries.</p>
                        </small>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" wire:ignore.self>
                    <div id="selectesGeographyAll"></div>

                    <h5 class="mb-3">Compare with…</h5>

                    <div class="accordion" id="accordionCitiesCountries">
                        <div class="row">
                            <div class="col-sm-12">
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
                                                        <div class="col-6 col-md-4 mb-2">
                                                            <input class="form-check-input me-1" type="checkbox"
                                                                wire:model="cities"
                                                                value="{{ json_encode(['name' => $country['name'], 'real_name' => $country['Country']]) }}"
                                                                @if ($country['Country'] == $country1 || $country['Country'] == $country2) checked disabled @endif
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
                    <p class="text-center me-5">
                        <span id="location-selecte-alert">0</span> {{ $lables['selected'] }}
                    </p>
                    <button type="button" class="btn btn-primary" onclick="geoSelect()">
                        {{ $lables['done'] }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ── FAQ Modal ── --}}
    <div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="faqModalLabel">Country Comparison Tool – FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-4">
                        The Country Comparison Tool helps users create knowledge through comparison. It enables
                        clear and structured comparisons between the selected countries, offering practical
                        insights into country-level metrics, relative advantages, and differences across
                        multiple analytical dimensions.
                    </p>

                    <div class="accordion" id="faqAccordion">

                        {{-- What is Comparative A.I.? --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingAI">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseAI" aria-expanded="true"
                                    aria-controls="faqCollapseAI">
                                    What is Comparative A.I.?
                                </button>
                            </h2>
                            <div id="faqCollapseAI" class="accordion-collapse collapse show"
                                aria-labelledby="faqHeadingAI" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="mb-2">Information is not Knowledge. Knowledge is not Intelligence.
                                        Intelligence is not Wisdom.</p>
                                    <p class="mb-2">
                                        <strong>Information</strong> — structured &amp; organized data &amp; facts,
                                        which are useful. Understanding information and related concepts creates
                                        <strong>Knowledge</strong>.
                                    </p>
                                    <p class="mb-2">
                                        Application of knowledge at the right time &amp; place is
                                        <strong>Intelligence</strong>. A broad understanding based on experience
                                        &amp; acquired knowledge, used for the betterment of self &amp; society,
                                        is <strong>Wisdom</strong>.
                                    </p>
                                    <p class="mb-2">
                                        Generative Artificial Intelligence (GenAI), using LLMs (Large Language Models),
                                        is a method to reformat &amp; restructure Information using a layer of new
                                        sentences/language (based on word &amp; word usage statistics on digitized
                                        content). It essentially skips the step of creating knowledge from Information.
                                        GenAI thus avoids "knowing". Instead, based on the query/prompt, it tries to
                                        answer promptly, even mimicking human "reasoning" to some extent.
                                    </p>
                                    <p class="mb-0">
                                        <strong>Prarang's Comparative AI</strong> focuses on creating knowledge by
                                        comparison for its users. It is not a GenAI yet, although it mimics the GenAI
                                        input prompt &amp; its output is comparable with GenAI outputs for the same
                                        prompt. Both GenAI &amp; Upmana are still work in progress.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- What does this tool do? --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingWhat">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseWhat" aria-expanded="false"
                                    aria-controls="faqCollapseWhat">
                                    What does this comparison tool do?
                                </button>
                            </h2>
                            <div id="faqCollapseWhat" class="accordion-collapse collapse"
                                aria-labelledby="faqHeadingWhat" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The tool enables users to compare up to 5 countries out of the
                                    195 UN-recognized countries, using an analytical context. It allows
                                    meaningful comparison across geographies based on metrics drawn from
                                    our multidimensional data framework.
                                </div>
                            </div>
                        </div>

                        {{-- How do I compare? --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingHow">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseHow" aria-expanded="false"
                                    aria-controls="faqCollapseHow">
                                    How do I compare countries using this tool?
                                </button>
                            </h2>
                            <div id="faqCollapseHow" class="accordion-collapse collapse"
                                aria-labelledby="faqHeadingHow" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <ol class="mb-0">
                                        <li class="mb-1">
                                            <strong>Select the countries</strong> you wish to compare.
                                            You may choose 2–5 countries.
                                        </li>
                                        <li class="mb-1">
                                            <strong>Select any metric</strong> from our multidimensional
                                            database on which you want the comparison to be performed.
                                        </li>
                                        <li>
                                            <strong>View results:</strong> The tool will then generate
                                            analytical insights based on the selected geographies and metrics.
                                        </li>
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

    {{-- ── Scripts ── --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ── Geography checkbox counter (max 5, country1 & country2 always locked) ──
            const accordion = document.getElementById('accordionCitiesCountries');
            const countDisplay = document.getElementById('citiesCount');
            const locationAlert = document.getElementById('location-selecte-alert');
            const maxLimit = 5;

            function updateGeoCount() {
                const checkboxes = Array.from(accordion.querySelectorAll('input[type="checkbox"]'));
                const checked = checkboxes.filter(cb => cb.checked);
                const count = checked.length;

                if (countDisplay) countDisplay.textContent = count;
                if (locationAlert) locationAlert.textContent = count;

                checkboxes.forEach(cb => {
                    if (!cb.disabled) {
                        cb.disabled = !cb.checked && count >= maxLimit;
                    }
                });
            }

            accordion.addEventListener('change', updateGeoCount);
            updateGeoCount();

            // ── Metrics checkbox counter (max 5) ──
            const categoryContent = document.getElementById('categoryTabsContent');
            const categoryBadge = document.getElementById('category-count');
            const metricsAlert = document.getElementById('metrics-selecte-alert');
            const resetBtn = document.getElementById('resetAllBtn');

            function updateMetricsCount() {
                const checkboxes = Array.from(categoryContent.querySelectorAll('input[type="checkbox"]'));
                const count = checkboxes.filter(cb => cb.checked).length;

                if (categoryBadge) categoryBadge.textContent = count;
                if (metricsAlert) metricsAlert.textContent = count;

                checkboxes.forEach(cb => {
                    if (!cb.checked) cb.disabled = count >= 5;
                    else cb.disabled = false;
                });
            }

            categoryContent.addEventListener('change', updateMetricsCount);
            updateMetricsCount();

            if (resetBtn) {
                resetBtn.addEventListener('click', () => {
                    categoryContent.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                        cb.checked = false;
                        cb.disabled = false;
                    });
                    updateMetricsCount();
                });
            }

            // ── FAQ button in sidebar ──
            const faqBtn = document.querySelector('.side-buttons');
            if (faqBtn) {
                faqBtn.addEventListener('click', function() {
                    new bootstrap.Modal(document.getElementById('faqModal')).show();
                });
            }
        });

        function geoSelect() {
            const modalEl = document.getElementById('geographyModal');
            const instance = bootstrap.Modal.getInstance(modalEl);
            if (instance) instance.hide();
        }

        function setContents() {
            const outChat = document.getElementById('outChat');
            if (!outChat || !outChat.innerHTML.trim()) {
                alert('Please generate comparison content first!');
                return false;
            }
            const input = document.getElementById('content-input');
            if (!input) {
                alert('Error setting content!');
                return false;
            }
            input.value = outChat.innerHTML.trim();
            return true;
        }
    </script>
</div>
