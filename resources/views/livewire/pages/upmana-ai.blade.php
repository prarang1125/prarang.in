<div>
    <link rel="stylesheet" href="{{asset('assets/ai/css/aichat.css'}}">
    <p class="text-center main-title-heading">UPMANA - Knowledge By Comparision</p>
    <section class="container p-3 mt-4 border rounded">

        <div class="pr-ai-section">
            <section class="first-prompt">
                @if ($activeSection['firstPrompt'])
                <div class="mb-3 text-center firstPrompt">
                    <h5>Comparative A.I on any Geography</h5>
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
                        <p class="text-muted text-end"> <a style="text-decoration: none;" href="/">
                                <small>Modify Prompt</small>
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

                            @foreach ($output as $key => $data)
                            @if (is_numeric($key) && !empty($data['api_sentence']))
                            <div class="mb-2">
                                @foreach ($data['api_sentence'] as $sentence)
                                <p class="mb-2">{!! $sentence !!}</p>
                                @endforeach
                            </div>
                            @endif
                            @endforeach


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
                                            <img src="https://claude.ai/images/claude_app_icon.png"
                                                alt="Grok Logo" class="w-6 h-6">
                                            <span>
                                                <span>Claude</span>
                                                <span>Anthropic</span>
                                            </span>
                                        </label>
                                    </div>


                                </div>
                                <button class="btn btn-success" type="submit" onclick="setContent()">
                                    Compare
                                </button>

                            </div>
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
                    <small>Also compare with ChatGPT/Gemini/Claude</small>
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
                                <div class="mb-3 col-12 col-md-2" id="categoryTabsContainer">
                                    <ul class="nav nav-pills flex-column" id="categoryTabs" role="tablist">
                                        @foreach ($mainChecks as $main => $subs)
                                        <li class="mb-1 nav-item" role="presentation">
                                            <button
                                                class="nav-link w-100 text-start @if ($loop->first) active @endif"
                                                id="tab-{{ $main }}" data-bs-toggle="tab"
                                                data-bs-target="#content-{{ $main }}" type="button"
                                                role="tab" aria-controls="content-{{ $main }}"
                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                {{ config('verticals.' . $main) }}
                                            </button>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-12 col-md-10">
                                    <div class="tab-content" id="categoryTabsContent">
                                        @foreach ($mainChecks as $main => $subs)
                                        <div class="tab-pane fade @if ($loop->first) show active @endif"
                                            id="content-{{ $main }}" role="tabpanel"
                                            aria-labelledby="tab-{{ $main }}">
                                            <div class="p-3 border rounded shadow-sm">
                                                <strong
                                                    class="mb-3 d-block fs-6">{{ config('verticals.' . $main) }}
                                                    Options</strong>
                                                <div class="row">
                                                    @foreach ($subs as $sub)
                                                    <div class="mb-2 col-6 col-sm-4 col-lg-3">
                                                        <div class="form-check">
                                                            <input wire:loading.attr="disabled"
                                                                wire:model="subChecks.{{ $main }}.{{ $sub['id'] }}"
                                                                type="checkbox" class="form-check-input"
                                                                id="sub-{{ $sub['id'] }}"
                                                                value="{{ $sub['id'] }}">
                                                            <label class="form-check-label small"
                                                                for="sub-{{ $sub['id'] }}">
                                                                {{ str_replace('# of', 'No. of', $sub['name']) }}
                                                                <span
                                                                    class="text-primary">{{ $sub['type'] }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
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
                                    {{-- Indian Cities --}}
                                    <div class="col-sm-6">
                                        <h5 class="mb-3">India</h5>

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
                                                    {{-- <div>
                                                    <input type="checkbox" wire:model="cities.{{ $group }}"
                                                    id="group-{{ $groupId }}">
                                                    <label for="group-{{ $groupId }}">
                                                        {{ $group }}
                                                    </label>
                                                </div> --}}
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

                                {{-- World Countries --}}
                                <div class="col-sm-6">
                                    <h5 class="mb-3">World</h5>
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
</div>

<script>
    function setContent() {
        const content = document.getElementById('outChat').innerHTML;
        document.getElementById('content-input').value = content;
    }


    window.addEventListener('closemodal', () => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('categoryModal'));
        if (modal) {
            modal.hide();
        }
    });
    window.addEventListener('showCategorymodal', () => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('categoryModal'));
        if (modal) {
            modal.hide();
        }
    });


    function autoResize(textarea) {
        const lines = textarea.value.split('\n').length;
        const newRows = Math.min(Math.max(lines, 2), 5);
        textarea.rows = newRows;
    }
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

            // Update the count in the display
            if (countDisplay) {
                countDisplay.textContent = checkedCount;
            }

            // Enable/disable checkboxes based on count
            checkboxes.forEach(cb => {
                // Disable unchecked boxes if 5 are selected
                if (!cb.checked) {
                    cb.disabled = checkedCount >= maxLimit;
                } else {
                    cb.disabled = false; // Always allow unchecking
                }
            });
        }

        // Attach change listener to each checkbox
        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateCountAndToggle);
        });

        // Initial check (in case of pre-checked boxes)
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
