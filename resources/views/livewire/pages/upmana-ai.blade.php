<div>
    <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="{{ asset('js/ai-response.js') }}"></script>
    <button class="@if ($output) d-none @endif btn btn-primary side-button" type="button"
        data-bs-toggle="offcanvas" data-bs-target="#openFaqExample" aria-controls="openFaqExample">
        &nbsp;&nbsp;FAQ &nbsp;&nbsp;

    </button>
    <div class="container-fluid">
        <p class="text-center main-title-heading">UPMANA - Knowledge By Comparison</p>
        <div class="row">
            <!-- 8 Column (Main content) -->
            <div
                class="@if ($output) col-12 @else  col-lg-9 col-md-9 col-sm-12 @endif position-relative">


                <div class="pr-ai-section">
                    <section class="first-prompt">
                        @if ($activeSection['firstPrompt'])
                            <div class="mb-3 text-center firstPrompt">
                                <h5>Comparative A.I. on any Geography</h5>
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
                                                            Select Location<br><small>(2 to 5)</small>
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
                                                    <div> <button type="button"
                                                            class="btn btn-primary btn-lg position-relative"
                                                            data-bs-toggle="modal" data-bs-target="#categoryModal">
                                                            Select Metrics<br><small>(2 to 5)</small>
                                                        </button></div>
                                                    <div><span class="p-2 m-2 border count-box bg-light text-dark"
                                                            id="category-count" wire:ignore>
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
                                                            src="{{ asset('assets/ai/images/byr-arrow-btn.png') }}"
                                                            class="w-6 h-6" wire:loading.class="d-none">
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
                                                        <span
                                                            class="badge rounded-pill text-small">{{ $ss['year'] }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </section>
                                        <section class="mt-2 ExploreMoreInsites">
                                            <p class="fw-bold">Explore More Insights:</p>
                                            <ul class="row">
                                                @foreach ($cities as $geography)
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
                                    <form action="{{ route('ai.generate.response') }}" method="POST" target="_blank">
                                        @csrf
                                        <input type="hidden" name="prompt" value="{{ $prompt }}">
                                        <input type="hidden" name="content" id="content-input" />
                                        <input type="hidden" name="selected_models_sequence"
                                            id="selected-models-sequence" />
                                        <div>
                                            <div class="space-y-4">
                                                <div class="flex items-center space-x-2">

                                                    <!-- Meta Option -->
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox" name="model[]" value="meta"
                                                            data-ai="meta">
                                                        <img src="https://t0.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://ai.meta.com/&size=256"
                                                            alt="" class="w-6 h-6">
                                                        <span>
                                                            <span>Meta Llama</span>
                                                            <span>Meta</span>
                                                        </span>
                                                        <span
                                                            class="px-2 py-1 ml-6 text-xs bg-blue-600 rounded-full order-number d-inline-block"></span>
                                                    </label>

                                                    <!-- Gemini Option -->
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox" name="model[]" value="gemini"
                                                            data-ai="gemini">
                                                        <img src="https://i.ibb.co/cX86rhZB/gimini-removebg-preview.png"
                                                            alt="Gemini Logo" class="w-6 h-6">
                                                        <span>
                                                            <span>Gemini</span>
                                                            <span>Google</span>
                                                        </span>
                                                        <span
                                                            class="px-2 py-1 ml-6 text-xs bg-blue-600 rounded-full order-number d-inline-block"></span>
                                                    </label>
                                                    <!-- deepseek Option -->
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox" name="model[]" value="deepseek"
                                                            data-ai="deepseek">
                                                        <img src="https://chat.deepseek.com/favicon.svg"
                                                            alt="" class="w-6 h-6">
                                                        <span>
                                                            <span>Deepseek</span>
                                                            <span>High-Flyer</span>
                                                        </span>
                                                        <span
                                                            class="px-2 py-1 ml-6 text-xs bg-blue-600 rounded-full order-number d-inline-block"></span>
                                                    </label>
                                                    <!-- ChatGPT Option -->
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox" name="model[]" value="chatgpt"
                                                            data-ai="chatgpt">
                                                        <img src="https://cdn.oaistatic.com/assets/favicon-miwirzcw.ico"
                                                            alt="ChatGPT Logo" class="w-6 h-6">
                                                        <span>
                                                            <span>ChatGPT</span>
                                                            <span>Microsoft</span>
                                                        </span>
                                                        <span
                                                            class="px-2 py-1 ml-6 text-xs bg-blue-600 rounded-full order-number d-inline-block"></span>
                                                    </label>
                                                    <!-- Upmana Option -->
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox" name="model[]" value="upmana"
                                                            data-ai="upmana">
                                                        <img src="{{ asset('assets/ai/images/byr-btn.png') }}"
                                                            alt="Upmana Logo" class="w-6 h-6">
                                                        <span>
                                                            <span>Upmana</span>
                                                            <span>Prarang</span>
                                                        </span>
                                                        <span
                                                            class="px-2 py-1 ml-6 text-xs bg-blue-600 rounded-full order-number d-inline-block"></span>
                                                    </label>

                                                    <!-- Claude Option -->
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox" name="model[]" value="claude"
                                                            data-ai="claude">
                                                        <img src="https://claude.ai/images/claude_app_icon.png"
                                                            alt="" class="w-6 h-6">
                                                        <span>
                                                            <span>Claude</span>
                                                            <span>Anthropic</span>
                                                        </span>
                                                        <span
                                                            class="px-2 py-1 ml-6 text-xs bg-blue-600 rounded-full order-number d-inline-block"></span>
                                                    </label>
                                                </div>
                                                <button class="btn btn-success" type="submit"
                                                    onclick="return setContents()">
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


                </div>
            </div>

            <!-- 4 Column (Sidebar as Offcanvas on mobile) -->
            <div class="@if ($output) d-none @else col-lg-3 d-none d-lg-block @endif">
                @livewire('utility.upman-sidebar')
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
                            <p class="mb-2 text-info">You can select up to 5 metrics.</p>
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
                                                            <span class="text-muted fw-bold">{{ $type }}
                                                                Metrics</span>
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
                                                                        {{ str_replace('# of', 'No. of', $sub['name']) }}
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                data-bs-target="#collapse-{{ $continentId }}" aria-expanded="false"
                                                aria-controls="collapse-{{ $continentId }}">
                                                {{ $continent }}
                                            </button>
                                        </h2>
                                        <div id="collapse-{{ $continentId }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading-{{ $continentId }}"
                                            data-bs-parent="#accordionCitiesCountries">
                                            <div class="accordion-body">
                                                <div>
                                                    <input type="checkbox" wire:model="cities"
                                                        id="group-{{ $continentId }}" value="{{ $continent }}">

                                                    <label for="group-{{ $continentId }}">
                                                        {{ $continent }}
                                                    </label>


                                                </div>
                                                <div class="row">
                                                    @foreach ($countries as $country)
                                                        <div class="col-6">

                                                            <input class="form-check-input me-1" type="checkbox"
                                                                wire:model="cities" value="{{ $country['Country'] }}"
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

                                                <div class="row">
                                                    @foreach ($cities as $city)
                                                        <div class="col-6">
                                                            <input class="form-check-input me-1" type="checkbox"
                                                                wire:model="cities" value="{{ $city['city'] }}"
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


    <!-- Modal -->
    <div class="modal fade" id="aiFaqModal" tabindex="-1" aria-labelledby="aiFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="aiFaqModalLabel">FAQ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    @livewire('utility.popupreg')

    <!-- What is Upmana Modal -->
    <div class="modal fade" id="whatIsUpmanaModal" tabindex="-1" aria-labelledby="whatIsUpmanaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="pr1c">●</span><span class="pr2c">●</span><span class="pr3c">●</span>
                    <h5 class="text-center modal-title" id="whatIsUpmanaLabel">

                        Comparison A.I.
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section>
                        <p>
                            Knowledge is gained from understanding and using Information (data/facts). All Knowledge
                            can be classified on the basis of its Information sources – Evidence (Pramana) based,
                            Estimation (Anumana) based, and Comparison (Upmana) based. Indian logic (Tarkashastra)
                            classifies Knowledge (Gyana) as – Pramana, Anumana, Upmana, and additionally, a
                            Non-Apparent (Apratyaksh) form of Knowledge known as Shabda-Gyan (Word Power).
                        </p>
                        <p>
                            Prarang’s <strong>Upmana</strong> is a tool to gain Knowledge by Comparison. Underlying
                            the tool is Prarang’s Analytics with Information classified (Evidence) and designed
                            (Estimated) from reliable World & Country data providers. Prarang does no surveys
                            itself.
                        </p>
                        <p>
                            Upmana offers new insights through four dependent layers of Comparisons:
                        </p>

                        <ul style="list-style: none;">
                            <li>
                                <h5>a. Comparison between Geographies</h5>
                                <p>
                                    Countries, States, Districts and Cities can be compared. It can even be used to
                                    do unconventional (“Apples and Oranges comparison” in English phrase!)
                                    geographic comparisons. For example – Cities/Districts vs Countries. A maximum
                                    of 5 Geographies can be simultaneously selected.
                                </p>
                            </li>

                            <li>
                                <h5>b. Comparison by Ranks</h5>
                                <p>
                                    A unique ranking system is the DNA of Prarang’s Analytics. All conventional
                                    Metrics of 195 Countries are ranked from top to bottom, as well as ranked for
                                    deviation from Average (Samana). Similarly, all conventional metrics of
                                    approximately 800 cities/districts of India are also ranked in this manner.
                                </p>
                            </li>

                            <li>
                                <h5>c. Comparison of Metrics (Anything Measurable)</h5>
                                <p>
                                    Unconventional comparisons create new insights. Upmana allows you to actually
                                    compare Apple production in one country with Orange production in another and/or
                                    Gold production in a third! A maximum of 5 different Metrics can be
                                    simultaneously selected.
                                </p>
                            </li>

                            <li>
                                <h5>d. Comparison with AGI Prompts</h5>
                                <p>
                                    The Comparison output generated by Prarang’s Upmana can also be compared (on the
                                    same Prompt instruction) with AGI (Artificial General Intelligence) outputs from
                                    Meta’s Llama, Google’s Gemini, Microsoft’s ChatGPT, and others, on a single
                                    click.
                                </p>
                            </li>
                        </ul>

                        <p>
                            Your research using Upmana’s Comparison outputs can be easily saved and/or shared with
                            others.
                        </p>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AI vs AGI Comparison Modal -->
    <div class="modal fade" id="aiVsAgiModal" tabindex="-1" aria-labelledby="aiVsAgiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header"> <span class="pr1c">●</span><span class="pr2c">●</span><span
                        class="pr3c">●</span>
                    <h5 class="modal-title" id="aiVsAgiLabel">Prompt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section>
                        <p>
                            A prompt is a question, command, or statement used to interact between a human and an
                            AGI (Artificial General Intelligence) model that allows the model to produce the
                            intended output. An AGI model can provide several outputs based on how the prompt is
                            phrased. The purpose of the prompt is to provide the AGI model with enough information
                            so that it can produce output relevant to the prompt.
                        </p>
                        <p>
                            Upmana assists you in generating a more precise and meaningful prompt for AGIs by
                            helping select some geographies and some measurable aspect (from a vast array of world
                            and country metrics).
                        </p>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Upmana Benefits Modal -->
    <div class="modal fade" id="upmanabenefitsModal" tabindex="-1" aria-labelledby="upmanaBenefitsLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header"> <span class="pr1c">●</span><span class="pr2c">●</span><span
                        class="pr3c">●</span>
                    <h5 class="text-center modal-title" id="upmanaBenefitsLabel">Comparison A.I & Artificial
                        General
                        Intelligence (AGI)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section>


                        <p>Information is not Knowledge. Knowledge is not Intelligence. Intelligence is not
                            Wisdom.</p>

                        <p>
                            <b>Information</b> is structured & organized data & facts, which are useful.
                            Understanding
                            information and related concepts creates <b>Knowledge</b>. Application of knowledge at
                            the
                            right time & place, is <b>Intelligence</b>. A broad understanding based on experience &
                            acquired knowledge, used for the betterment of self & society, is <b>Wisdom</b>.
                        </p>

                        <p>
                            Artificial General Intelligence (A.G.I.), using LLMs (Large Language Models), is a
                            method to reformat & restructure Information using a layer of new sentences/language
                            (based on word & word usage statistics on digitized content). It essentially seems to
                            skip the step of creating knowledge from Information. A.G.I. thus avoids "knowing".
                            Instead, based on the query/prompt, it tries to answer promptly, even mimicking human
                            “reasoning” to some extent.
                        </p>

                        <p>
                            Using brute computation power, A.G.I. is fast approaching a state of memorising all
                            known digitized Information & all known Languages of Mankind, with a man-designed
                            ability of connecting the two. This code/algorithms (man-designed) is where biases &
                            errors are coming in.
                        </p>

                        <p>
                            <strong>Prarang’s Upmana</strong> focuses on creating knowledge by comparison for its
                            users. It is not an A.G.I. yet, although it mimics the AGI input prompt & its output is
                            comparable with AGI outputs for the same prompt. Both AGI & Upmana are still work in
                            progress. The difference is as follows:
                        </p>
                    </section>
                    <section>

                        <table style="width: 100%; border-collapse: collapse; text-align: left;">
                            <thead>
                                <tr style="background-color: #f2f2f2;">
                                    <th style="border: 1px solid #ddd; padding: 8px;"></th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">AGI <br><small>(Artificial
                                            General Intelligence)</small></th>
                                    <th style="border: 1px solid #ddd; padding: 8px;">Upmana <br><small>(Knowledge
                                            by Comparison)</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Prompt Input</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Can write &
                                        ask any question</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Must select some Geographical
                                        & some Metric (any Measured) for Upmana to generate text</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;" rowspan="3">Prompt Output
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Text, data &
                                        images content, as instructed</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Text & data content, as
                                        instructed</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Hallucinations / errors
                                        sometimes in text & data</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">No hallucinations</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Does not provide clear
                                        sources for its data</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Always cites specific data
                                        source & year</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;" rowspan="6">Architecture
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Generative AI
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Traditional AI</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Large Language Model (LLM)
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Small Language Model
                                        (Language Localisation design)</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Data sources –
                                        Screen-Scraping without citations</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Large data Aggregation from
                                        reliable sources</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">LLM – Natural Language
                                        Processing (NLP) based on Western Linguistics</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Analytics – Indian
                                        Linguistics (Tarkashastra) based</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Word as Token – Extraordinary
                                        processing power for computation</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Phoneme as Token – Under
                                        development, Unknown computation need</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Photos – Recognition &
                                        Production: GANS (Generative Adversarial Network) and Diffusion Models</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">Photos – Under development
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </section>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Offcanvas Component -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="openFaqExample" aria-labelledby="openFaqExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="openFaqExampleLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @livewire('utility.upman-sidebar')
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
</div>
