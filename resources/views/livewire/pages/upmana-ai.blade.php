<div>
    <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="{{ asset('js/ai-response.js') }}"></script>
    {{-- <x-locale.font-style/> --}}

    <button class="@if ($output) d-none @endif btn btn-primary side-button" type="button"
        data-bs-toggle="offcanvas" data-bs-target="#openFaqExample" aria-controls="openFaqExample">
        &nbsp;&nbsp;FAQ &nbsp;&nbsp;
    </button>

    <div class="container-fluid">
        <div class="text-center">

            <p class="text-end w-25">
                <span wire:loading wire:target="changeLanguage" class="spinner-border spinner-border-sm ms-3 mt-2"
                    role="status" aria-hidden="true"></span>
                {{-- <label for="select-lang"><small>Select Language</small></label> --}}
                <select id="select-lang" name="change_language" id="change_language" wire:model="selectedLanguage"
                    wire:change="changeLanguage" class="form-select form-sm ">

                    <option value="hi">हिन्दी</option>
                    <option value="en">English</option>
                </select>

            </p>
        </div>

        <p class="text-center main-title-heading locale-font {{ !empty($output) ? 'd-none' : '' }}"
            style="color: #0000ff">
            {{ $lables['upamana_title'] }}
        </p>

        <div class="row locale-font">
            <div
                class="@if ($output) col-12 @else  col-lg-9 col-md-9 col-sm-12 @endif position-relative">

                <div class="pr-ai-section">
                    <section class="first-prompt">
                        @if ($activeSection['firstPrompt'])
                            <div class="mb-3 text-center firstPrompt">
                                <h5>{{ $lables['upmana_sub_title'] }}</h5>
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
                                                            {{ $lables['select_location'] }}<br><small>{{ $lables['2_to_5'] }}</small>
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
                                                            <a wire:click="updatePromptFromState"
                                                                class="rounded-pills btn text-ligt btn-primary">
                                                                {{ $lables['generate_ai_prompt'] }}</a>
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
                                <p class="text-center main-title-heading locale-font" style="color: #0000ff">
                                    {{ $lables['upamana_title'] }}
                                </p>

                                <div class="p-3 m-1 border rounded">
                                    <b>{{ $lables['prompt'] }}:</b> {{ $prompt }}
                                    <p class="text-muted text-end"> <a style="text-decoration: none;" href="/ai/upmana">
                                            <small>{{ __('messages.edit_prompt') }}</small>
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
                                                    <li class="col-4"><a target="_blank"
                                                            style="text-decoration: none;"
                                                            href="https://g2c.prarang.in/ai/{{ json_decode($geography)->name }}">{{ json_decode($geography)->name }}
                                                            {{ $lables['insights'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </section>
                                    </div>
                                </section>
                            </div>
                            <div class="col-sm-4">
                                <section class="id-selector">
                                    <p>{{ $lables['compare_response'] }}</p>
                                    <form action="{{ route('ai.generate.response') }}" method="POST"
                                        target="_blank">
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
                                                    {{ $lables['compare'] }}
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
                        <p class="text-center"><small>{{ $lables['also_compare_with'] }}</small></p>
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
                                                    $types = [
                                                        'World (& India)',
                                                        'World Only',
                                                        'World',
                                                        'India Only',
                                                        'India',
                                                    ];
                                                @endphp
                                                @foreach ($types as $type)
                                                    @if (collect($subs)->contains('type', $type))
                                                        <div class="pb-3 col-12">
                                                            <span
                                                                class="text-muted fw-bold">{{ $lables[strtolower($type) . '_metrics'] }}
                                                            </span>
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
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel"><small>
                            <p class="mb-2 text-info">{{ $lables['geo_select_message'] }}.</p>
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
                                <h5 class="mb-3">{{ $lables['geo_select_world'] }}</h5>
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
                                                <div>
                                                    <input type="checkbox" wire:model="cities"
                                                        id="group-{{ $continentId }}" value="{{ json_encode(['name' => __('location.' . str_replace(' ', '_', strtolower($continent))), 'real_name' => $continent]) }}">

                                                    <label for="group-{{ $continentId }}">
                                                        {{ __('location.' . str_replace(' ', '_', strtolower($continent))) ?? $continent }}
                                                    </label>


                                                </div>
                                                <div class="row">
                                                    @foreach ($countries as $country)
                                                        <div class="col-6">

                                                            <input class="form-check-input me-1" type="checkbox"
                                                                wire:model="cities"
                                                                value="{{ json_encode(['name' => $country['name'], 'real_name' => $country['Country']]) }}"
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
                                <h5 class="mb-3">{{ $lables['geo_select_ind'] }}</h5>

                                @foreach ($citiesTOChose['city'] as $group => $cities)
                                    @php $groupId = Str::slug($group, '_'); @endphp
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-city-{{ $groupId }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-city-{{ $groupId }}"
                                                aria-expanded="false"
                                                aria-controls="collapse-city-{{ $groupId }}">
                                                {{ __('location.' . str_replace(' ', '_', strtolower($group))) ?? $group }}
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
                                                                wire:model="cities"
                                                                value="{{ json_encode(['name' => $city['name'], 'real_name' => $city['city']]) }}"
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
                    <p class="text-center me-5"><span id="location-selecte-alert">0</span> {{ $lables['selected'] }}
                    </p>
                    <button type="button" class="btn btn-primary"
                        onclick="geoSelect()">{{ $lables['done'] }}</button>
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

                        {{ __('faq.comparison_ai.modal.title') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! __('faq.comparison_ai.modal.body') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('faq.close') }}</button>
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
                    <h5 class="modal-title" id="aiVsAgiLabel">{{ __('faq.prompt.modal.title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! __('faq.prompt.modal.body') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('faq.close') }}</button>
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
                    <h5 class="text-center modal-title" id="upmanaBenefitsLabel">
                        {{ __('faq.com_ai_agi.modal.title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! __('faq.com_ai_agi.modal.body') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('faq.close') }}</button>
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
            const locationSelecteAlert = document.getElementById('location-selecte-alert');
            const maxLimit = 5;

            function updateCountAndToggle() {
                const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
                const checkedCount = checkedBoxes.length;
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
</div>
