<div>
    <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <p class="text-center main-title-heading">UPMANA - Knowledge By Comparison</p>
    <section class="container p-3 mt-4 border rounded">

        <div class="pr-ai-section">
            <section class="first-prompt">
                @if ($activeSection['firstPrompt'])
                    <div class="mb-3 text-center firstPrompt">
                        <h5>Comparative A.I. on any Geography</h5>
                        <br><br>
                        <div class="mb-3 firstPrompt">
                            <div class="main-button-area">
                                <div class="select-location">
                                    <div> <button type="button" class="btn btn-secondary btn-lg position-relative"
                                            data-bs-toggle="modal" data-bs-target="#geographyModal">
                                            Select Location<br><small>(2 to 5)</small>
                                        </button></div>
                                    <div>
                                        <span class="p-2 m-2 border count-box bg-light text-dark" id="citiesCount"
                                            wire:ignore>
                                            0
                                        </span>Selected
                                    </div>
                                </div>
                                <div class="arrow">
                                    <div>
                                        <p><i class='bx bx-down-arrow-alt'></i></p>
                                    </div>
                                    <div></div>
                                </div>
                                <div class="select-category">
                                    <div> <button type="button" class="btn btn-primary btn-lg position-relative"
                                            data-bs-toggle="modal" data-bs-target="#categoryModal">
                                            Select Metrics<br><small>(2 to 5)</small>
                                        </button></div>
                                    <div><span class="p-2 m-2 border count-box bg-light text-dark" id="category-count"
                                            wire:ignore>
                                            0
                                        </span>Selected
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
                                            <a wire:click="updatePromptFromState"
                                                class="rounded-pills btn text-ligt btn-primary">
                                                Generate AI Prompt</a>
                                        </div>
                                    </div>
                                    <div>
                                        <span wire:target="updatePromptFromState" wire:loading
                                            class="mr-2 spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        <img class="rounded-pills" wire:click="updatePromptFromState"
                                            src="{{ asset('assets/ai/images/byr-arrow-btn.png') }}" class="w-6 h-6"
                                            wire:loading.class="d-none">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endif

            </section>

            @if ($output)
                <div class="row">
                    <div class="col-sm-8">
                        <div class="p-3 m-1 border rounded">
                            <b>Prompt:</b> {{ $prompt }}
                            <p class="text-muted text-end"> <a style="text-decoration: none;" href="/ai/upmana">
                                    <small>Edit Prompt</small>
                                </a></p>
                        </div>
                        <section id="outChat">

                            <div class="p-3 h-100" id="dfggsgzrf">
                                @foreach ($output['warnings'] ?? [] as $warning)
                                    <p class="warning-chat">{{ $warning }}</p>
                                @endforeach
                                @isset($output['comparison_statement'])
                                    <p class="com-chat">{{ $output['comparison_statement'] }}</p>
                                @endisset

                                @isset($output['comparison_sentence']['sentence'])
                                    <p class="com-chat">{!! $output['comparison_sentence']['sentence'] !!}</p>
                                    <p class="com-chat">{!! $output['comparison_sentence']['compare'] !!}</p>
                                @endisset

                                @isset($output['api_sentence'])
                                    <div class="mb-2">
                                        @foreach ($output['api_sentence'] as $type => $sentence)
                                            @foreach ($sentence as $paragraph)
                                                @php
                                                    $pgx = highlightFirstOccurrence(
                                                        $paragraph,
                                                        $firstCity,
                                                        $type == 'city' ? 'city' : null,
                                                    );
                                                @endphp
                                                <p class="mb-2">{!! $pgx !!}</p>
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


                                {{-- @foreach ($output as $key => $data)
                            @if (is_numeric($key) && !empty($data['paragraphs']))
                                <div class="mb-2">
                                    @foreach ($data['paragraphs'] as $paragraph)
                                        <p class="mb-2">{!! $paragraph !!}</p>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach --}}
                                @if (!empty($output['city_comparison']))
                                    <div class="p-3 mt-4 border rounded border-info bg-light">
                                        <h6 class="text-info">City/District Comparison</h6>
                                        {!! $output['city_comparison'] !!}
                                    </div>
                                @endif
                                {{-- @if (!empty($output['state_comparison']))
                            <div class="p-3 mt-4 border rounded border-info bg-light">
                                <h6 class="text-info">State Comparison</h6>
                                {!! $output['state_comparison'] !!}
                            </div>
                            @endif --}}

                                {{-- Country Comparison Table --}}
                                @if (!empty($output['country_comparison']))
                                    <div class="p-3 mt-4 border rounded border-info bg-light">
                                        <h6 class="text-info">Country Comparison</h6>
                                        {!! $output['country_comparison'] !!}
                                    </div>
                                @endif
                                @if (!empty($output['continent_comparison']))
                                    <div class="p-3 mt-4 border rounded border-info bg-light">
                                        <h6 class="text-info">Continent Comparison</h6>
                                        {!! $output['continent_comparison'] !!}
                                    </div>
                                @endif


                                <section class="sourcedat">
                                    <h6 class="p-2">Sources:</h6>
                                    <ul class="list-group">
                                        @foreach ($output['source'] as $key => $ss)
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">

                                                <span class="text-small"> [{{ $key }}]
                                                    {{ $ss['source'] }}</span>
                                                <span class="badge rounded-pill text-small">{{ $ss['year'] }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </section>
                                <section class="mt-2 ExploreMoreInsites">
                                    <p class="fw-bold">Explore More Insights:</p>
                                    <ul class="row">
                                        @foreach ($cities as $geography => $tr)
                                            <li class="col-4"><a target="_blank" style="text-decoration: none;"
                                                    href="https://g2c.prarang.in/ai/{{ $geography }}">{{ $geography }}
                                                    Insights</a></li>
                                        @endforeach
                                    </ul>
                                </section>

                            </div>
                        </section>
                    </div>
                    <div class="col-sm-4">
                        <section class="id-selector">
                            <p>Compare UPMANA Response with other A.I.</p>
                            <form action="{{ route('ai.response') }}" method="POST" target="_blank">
                                @csrf
                                <input type="hidden" name="prompt" value="{{ $prompt }}">
                                <input type="hidden" name="content" id="content-input" />
                                <input type="hidden" name="model_sequence" id="selected-models-sequence" />
                                <div>
                                    <div class="space-y-4">
                                        <div class="flex items-center space-x-2">
                                            <!-- ChatGPT Option -->
                                            <label class="flex items-center space-x-2">
                                                <input type="checkbox" name="model[]" wire:model="selectedModels"
                                                    value="chatgpt">
                                                <img src="https://cdn.oaistatic.com/assets/favicon-miwirzcw.ico"
                                                    alt="ChatGPT Logo" class="w-6 h-6">
                                                <span>
                                                    <span>ChatGPT</span>
                                                    <span>Microsoft</span>
                                                </span>
                                            </label>

                                            <!-- Gemini Option -->
                                            <label class="flex items-center space-x-2">
                                                <input type="checkbox" name="model[]" wire:model="selectedModels"
                                                    value="gemini">
                                                <img src="https://i.ibb.co/cX86rhZB/gimini-removebg-preview.png"
                                                    alt="Gemini Logo" class="w-6 h-6">
                                                <span>
                                                    <span>Gemini</span>
                                                    <span>Google</span>
                                                </span>
                                            </label>


                                            <!-- Grok Option -->
                                            <label class="flex items-center space-x-2">
                                                <input type="checkbox" name="model[]" wire:model="selectedModels"
                                                    value="claude">
                                                <img src="https://claude.ai/images/claude_app_icon.png" alt=""
                                                    class="w-6 h-6">
                                                <span>
                                                    <span>Claude</span>
                                                    <span>Anthropic</span>
                                                </span>
                                            </label>
                                            <!-- Grok Option -->
                                            <label class="flex items-center space-x-2">
                                                <input type="checkbox" name="model[]" wire:model="selectedModels"
                                                    value="deepseek">
                                                <img src="https://chat.deepseek.com/favicon.svg" alt=""
                                                    class="w-6 h-6">
                                                <span>
                                                    <span>Deepseek</span>
                                                    <span>High-Flyer</span>
                                                </span>
                                            </label>
                                            <label class="flex items-center space-x-2">
                                                <input type="checkbox" name="model[]" wire:model="selectedModels"
                                                    value="meta">
                                                <img src="https://t0.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://ai.meta.com/&size=256"
                                                    alt="" class="w-6 h-6">
                                                <span>
                                                    <span>Meta Llama</span>
                                                    <span>Meta</span>
                                                </span>
                                            </label>
                                        </div>


                                    </div>
                                    <button class="btn btn-success" type="submit" onclick="return setContent()">
                                        Compare
                                    </button </div>
                            </form>
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

            @if ($activeSection['promptBox'])
                <section class="p-3 border border-2 prompt-section rounded-4 border-secondary">
                    <div>
                        <textarea oninput="autoResize(this)" disabled name="prompt" rows="3" class="w-100">{!! $prompt !!}</textarea>

                    </div>

                    <div>
                        @if (!empty($prompt))
                            <div wire:loading wire:target="generate" class="class="text-center ">
                        <span class=" spinner-border text-primary" role="status" aria-hidden="true"></span>

                    </div>
                    <a class="rounded" wire:click="generate" role="button" tabindex="0"
                        wire:loading.attr="disabled" wire:loading.class="d-none">
                        <img class="rounded-4" src="{{ asset('assets/ai/images/byr-arrow-btn.gif') }}"
                            alt="Generate">
                    </a>
 @endif
                            </div>

                </section>
                <p class="text-center"><small>Also compare with ChatGPT/Gemini/Claude</small></p>
            @endif

            <!-- Category Modal -->
            <div class="modal fade" id="categoryModal" wire:ignore tabindex="-1"
                aria-labelledby="categoryModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="categoryModalLabel"><small>
                                    <p class="mb-2 text-info">You can select up to 5 metrics.</p>
                                </small></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
                                                    {{ $subs }}
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
                                                    <!-- <strong
                                                    class="mb-3 d-block fs-6">{{ config('verticals.' . $main) }}
                                                    Options</strong> -->
                                                    <div class="row">
                                                        @php
                                                            $types = ['World (& India)', 'World', 'India'];
                                                        @endphp

                                                        @foreach ($types as $type)
                                                            @if (collect($subs)->contains('type', $type))
                                                                <div class="pb-3 col-12">
                                                                    <span
                                                                        class="text-muted fw-bold">{{ $type }}
                                                                        Metrics</span>
                                                                </div>
                                                            @endif
                                                            @foreach ($subs as $sub)
                                                                @if ($sub['type'] === $type)
                                                                    <div class="mb-2 col-12 col-sm-4 col-lg-3">
                                                                        <div class="form-check">
                                                                            <input wire:loading.attr="disabled"
                                                                                wire:model="subChecks.{{ $sub['type'] }}.{{ $sub['id'] }}"
                                                                                type="checkbox"
                                                                                class="form-check-input"
                                                                                id="sub-{{ $sub['type'] }}-{{ $sub['id'] }}"
                                                                                value="{{ $sub['id'] }}">
                                                                            <label class="form-check-label small"
                                                                                for="sub-{{ $sub['type'] }}-{{ $sub['id'] }}">
                                                                                {{ str_replace('# of', 'No. of', $sub['name']) }}
                                                                                <span
                                                                                    class="text-primary">{{ $sub['geo_type'] == 'in_dist' ? 'District' : '' }}</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            <hr>
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
                            <button id="resetAllBtn" class="btn btn-outline-warning" type="button">Reset</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                Done
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Geography Modal -->
            <div class="modal fade" id="geographyModal" tabindex="-1" aria-labelledby="geographyModalLabel"
                aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="categoryModalLabel"><small>
                                    <p class="mb-2 text-info">You can select 2 to 5 geographies.</p>
                                </small></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div id="selectesGeographyAll"></div>

                            @php use Illuminate\Support\Str; @endphp

                            <div class="accordion" id="accordionCitiesCountries">
                                <div class="row">

                                    {{-- World Countries --}}
                                    <div class="col-sm-6">
                                        <h5 class="mb-3">World - Countries</h5>
                                        @foreach ($citiesTOChose['country'] as $continent => $countries)
                                            @php $continentId = Str::slug($continent, '_'); @endphp
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading-{{ $continentId }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-{{ $continentId }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse-{{ $continentId }}">
                                                        {{ $continent }}
                                                    </button>
                                                </h2>
                                                <div id="collapse-{{ $continentId }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading-{{ $continentId }}"
                                                    data-bs-parent="#accordionCitiesCountries">
                                                    <div class="accordion-body">
                                                        <div>
                                                            <input type="checkbox"
                                                                wire:model="cities.{{ $continent }}"
                                                                id="group-{{ $continentId }}">
                                                            <label for="group-{{ $continentId }}">
                                                                {{ $continent }}
                                                            </label>
                                                        </div>
                                                        <div class="row">
                                                            @foreach ($countries as $country)
                                                                <div class="col-6">

                                                                    <input class="form-check-input me-1"
                                                                        type="checkbox"
                                                                        wire:model="cities.{{ $country['Country'] }}"
                                                                        value="{{ $country['id'] }}"
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
                                    {{-- Indian Cities --}}
                                    <div class="col-sm-6">
                                        <h5 class="mb-3">India - Districts/District Capitals</h5>

                                        @foreach ($citiesTOChose['city'] as $group => $cities)
                                            @php $groupId = Str::slug($group, '_'); @endphp
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading-city-{{ $groupId }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-city-{{ $groupId }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse-city-{{ $groupId }}">
                                                        {{ $group }}
                                                    </button>
                                                </h2>
                                                <div id="collapse-city-{{ $groupId }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading-city-{{ $groupId }}"
                                                    data-bs-parent="#accordionCitiesCountries">
                                                    <div class="accordion-body">
                                                        <!-- <div>
                                                        <input type="checkbox" wire:model="cities.{{ $group }}"
                                                            id="group-{{ $groupId }}">
                                                        <label for="group-{{ $groupId }}">
                                                            {{ $group }}
                                                        </label>
                                                    </div> -->
                                                        <div class="row">
                                                            @foreach ($cities as $city)
                                                                <div class="col-6">
                                                                    <input class="form-check-input me-1"
                                                                        type="checkbox"
                                                                        wire:model="cities.{{ $city['city'] }}"
                                                                        id="city-{{ $city['id'] }}">
                                                                    <label class="form-check-label"
                                                                        for="city-{{ $city['id'] }}">
                                                                        {{ $city['city'] }}
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="geoSelect()">Done</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
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

        function setContent() {
            const outChatElement = document.getElementById('outChat');
            if (!outChatElement) {
                console.error('Output container not found!');
                alert('Please generate Upmana content first!');
                return false;
            }

            const content = outChatElement.innerHTML.trim();
            if (!content) {
                console.warn('No content generated!');
                alert('Please generate Upmana content first!');
                return false;
            }

            const contentInput = document.getElementById('content-input');
            if (!contentInput) {
                console.error('Content input field not found!');
                alert('Error setting content!');
                return false;
            }

            contentInput.value = content;
            console.log('Upmana content set successfully:', content.substring(0, 100) + '...');
            return true;
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
            const maxLimit = 5;

            function updateCountAndToggle() {
                const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
                const checkedCount = checkedBoxes.length;
                if (countDisplay) {
                    countDisplay.textContent = checkedCount;
                }

                checkboxes.forEach(cb => {
                    if (!cb.checked) {
                        cb.disabled = checkedCount >= maxLimit;
                    } else {
                        cb.disabled = false; // Always allow unchecking
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

    var modelId={}
function setupModelSequenceScript() {
    const sequenceInput = document.getElementById("selected-models-sequence");
    console.log("Sequence Input Element:", sequenceInput);
    
    if (!sequenceInput) {
        console.warn("Missing hidden input with id='selected-models-sequence'");
        return; // Stop execution if not found
    }

    let selectedSequence = [];

    function updateNumbers() {
        const checkboxes = document.querySelectorAll('input[name="model[]"]');
        console.group("Model Sequence Tracking");
        console.log("All Model Checkboxes:", checkboxes);
        
        checkboxes.forEach(cb => {
            const label = cb.closest('label');
            const numberSpan = label.querySelector('.order-number');
            const index = selectedSequence.indexOf(cb.value);
            
            console.log("Checkbox:", cb);
            console.log("Checkbox Value:", cb.value);
            console.log("Current Sequence:", selectedSequence);
            console.log("Index in Sequence:", index);
            
            if (numberSpan) {
                numberSpan.textContent = index !== -1 ? (index + 1) : '';
            }
        });

        // Prepare JSON for storage
        const sequenceJson = JSON.stringify(selectedSequence);
        console.log("Sequence to Store:", sequenceJson);
        
        // Dispatch a custom event to trigger Livewire update
        const event = new CustomEvent('model-sequence-changed', { 
            detail: sequenceJson 
        });
        document.dispatchEvent(event);

        // Set value in hidden input
        sequenceInput.value = sequenceJson;
        console.log("Hidden Input Value:", sequenceInput.value);
        console.groupEnd();
    }

    document.addEventListener('change', function (e) {
        if (e.target.matches('input[name="model[]"]')) {
            const value = e.target.value;
            console.group("Checkbox Change");
            console.log("Changed Checkbox:", e.target);
            console.log("Checkbox Value:", value);
            console.log("Checked State:", e.target.checked);

            if (e.target.checked) {
                // Add to end if not already in sequence
                if (!selectedSequence.includes(value)) {
                    selectedSequence.push(value);
                }
            } else {
                // Remove from sequence
                selectedSequence = selectedSequence.filter(v => v !== value);
            }

            console.log("Updated Sequence:", selectedSequence);
            console.groupEnd();

            updateNumbers();
        }
    });

    // Listen for Livewire updates to reset sequence if needed
    document.addEventListener('livewire:update', setupModelSequenceScript);

    updateNumbers();
}

document.addEventListener("DOMContentLoaded", setupModelSequenceScript);
document.addEventListener("livewire:update", setupModelSequenceScript);
console.log(document.getElementById("selected-models-sequence"));

</script>