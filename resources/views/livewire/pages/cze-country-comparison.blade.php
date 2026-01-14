<div>
    <link rel="stylesheet" href="{{ asset('assets/ai/css/aichat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/portal/css/comparison.css') }}">



    <div class="container-fluid" id="toprint">

        <div class="row locale-font">
            <div class="@if ($output) col-12 @else  - @endif position-relative">
                <div class="pr-ai-section">
                    <section class="first-prompt">
                        @if ($activeSection['firstPrompt'])
                            <div class="mb-3 text-center firstPrompt">
                                <p class="text-end mt-3">
                                    <a javascript:void(0) class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#faqModal" data-bs-toggle="offcanvas">
                                        FAQ
                                    </a>
                                </p>
                                @if ($type === 'regional')
                                    <h2 class="flex justify-center items-center"><img class="mx-2"
                                            src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                                            alt="">Compare Czech Republic Regions (Kraje) with Indian Regions
                                        (Districts)

                                        <img class="mx-2"
                                            src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg"
                                            alt="">
                                    </h2>
                                    <p>(Powered by Prarang’s Comparative A.I.)</p>
                                @else
                                    <h2><img class="mx-2 cze-mapx"
                                            src="https://g2c.prarang.in/storage/images/world/195Counties/CZE_MAP.jpg"
                                            alt="">Compare Czech Republic with other Countries
                                    </h2>
                                    <p>(Powered by Prarang’s Comparative A.I.)

                                    </p>
                                @endif
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
                                                            @if ($type === 'regional')
                                                                Select Locations<br><small>(Up to 3
                                                                    Czech/3 India)</small>
                                                            @else
                                                                {{ $lables['select_location'] }}<br><small>(1 to
                                                                    3)</small>
                                                            @endif
                                                        </button>

                                                        @if (session()->has('cityerror'))
                                                            <br>
                                                            <small class="text-danger">
                                                                {{ session('cityerror') }}</small>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <span class="p-2 m-2 border count-box bg-light text-dark"
                                                            id="citiesCount"
                                                            @if ($type === 'regional') wire:ignore.self
                                                        @else wire:ignore @endif>
                                                            @if ($type === 'regional')
                                                                {{ $this->selectedCount }}
                                                            @else
                                                                0
                                                            @endif
                                                        </span>{{ $lables['selected'] ?? 'Selected' }}
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
                                                            {{ $lables['select_metrics'] }}<br><small>(1 to 5)</small>
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
                                                                wire:loading.attr="disabled" wire:target="generate">
                                                                <span class="spinner-border spinner-border-sm"
                                                                    wire:loading wire:target="generate">
                                                                </span>&nbsp;
                                                                Compare
                                                            </a>

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

                        {{-- Country Mode Output --}}
                        @php
                            $backUrl = '/czech-republic-' . $type . '-comparison';

                            // Use Czech region names directly (not IDs)
                            $regionValues = implode('-', $insCities['region'] ?? []);
                            $cityValues = implode('-', $insCities['city'] ?? []);
                            $czeMetrics =
                                implode('-', array_keys($subChecks['CZE'] ?? [])) .
                                '-' .
                                implode('-', array_keys($subChecks['World'] ?? []));
                            $concatenatedString = $regionValues . '-' . $cityValues . '@' . $czeMetrics;

                            $currentUrl = url($backUrl) . '?share=' . base64_encode($concatenatedString);
                        @endphp


                        <x-action-buttons :backUrl="$backUrl" :currentUrl="$currentUrl" />


                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-center main-title-heading locale-font" style="color: #0000ff">


                                    @if ($type === 'regional')
                                        <h2 class="flex justify-center items-center"><img class="mx-2"
                                                src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                                                alt="">India-Czech Comparisons<img class="mx-2"
                                                src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg"
                                                alt="">
                                        </h2>
                                    @else
                                        <h2>

                                            <img class="mx-2 cze-mapx " style="width: 50px; height: 50px;"
                                                src="https://g2c.prarang.in/storage/images/world/195Counties/CZE_MAP.jpg"
                                                alt="">Country Comparison
                                        </h2>
                                    @endif
                                </p>

                                <section id="outChat">
                                    <div class="p-3 h-100" id="dfggsgzrf">

                                        <p class="rounded border py-2 px-1 mb-3">
                                            {{ $prompt ?? '' }}
                                        </p>


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
                                                <br>
                                                {!! $output['comparison_sentence']['compare'] !!}
                                            @endisset
                                        </p>



                                        <div class="mb-2">
                                            @foreach (['cze', 'city', 'country'] as $key)
                                                @isset($output['api_sentence'][$key])
                                                    @foreach ($output['api_sentence'][$key] as $paragraph)
                                                        <p class="mb-2">{!! $paragraph !!}</p>
                                                    @endforeach
                                                @endisset
                                            @endforeach
                                        </div>

                                        @isset($output['sentences']['cze'])
                                            <div class="mb-2">
                                                <p class="mb-2">{!! $output['sentences']['cze'] !!}</p>
                                            </div>
                                        @endisset
                                        @isset($output['sentences']['country'])
                                            <div class="mb-2">
                                                <p class="mb-2">{!! $output['sentences']['country'] !!}</p>
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

                                        @isset($output['sentences']['continent'])
                                            <div class="mb-2">
                                                <p class="mb-2">{!! $output['sentences']['continent'] !!}</p>
                                            </div>
                                        @endisset

                                        @if (!empty($output['cze_comparison']))
                                            <div class="p-3 mt-4 border rounded border-info bg-light">
                                                <h6 class="text-info">Czech Republic Region (Kraj) Comparison</h6>
                                                {!! $output['cze_comparison'] !!}
                                            </div>
                                        @endif
                                        @if (!empty($output['city_comparison']))
                                            <div class="p-3 mt-4 border rounded border-info bg-light">
                                                <h6 class="text-info">India Region (City/District) Comparison
                                                </h6>
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
                                                            {{ $ss['local_source'] ?? $ss['source'] }}</span>
                                                        <span
                                                            class="badge rounded-pill text-small">{{ $ss['year'] }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </section>
                                        @if ($type === 'regional')
                                            <section class="mt-2 ExploreMoreInsites">
                                                <p class="fw-bold">{{ $lables['explore_more'] }}:</p>
                                                <ul class="row">

                                                    @foreach ($insCities as $key => $geographyx)
                                                        @foreach ($geographyx as $geography)
                                                            <li class="col-12  col-md-3"><a target="_blank"
                                                                    style="text-decoration: none;"
                                                                    href="https://g2c.prarang.in/{{ $key == 'city' ? 'ai/' : 'czech-republic/' }}{{ $geography }}">{{ $geography }}
                                                                    {{ $lables['insights'] }}</a></li>
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            </section>
                                        @else
                                            <section class="mt-2 ExploreMoreInsites">
                                                <p class="fw-bold">{{ $lables['explore_more'] }}:</p>
                                                <ul class="row">
                                                    @foreach ($cities as $geography)
                                                        <li class="col-12 col-md-3"><a target="_blank"
                                                                style="text-decoration: none;"
                                                                href="https://g2c.prarang.in/ai/{{ json_decode($geography)->name }}">{{ json_decode($geography)->name }}
                                                                {{ $lables['insights'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </section>
                                        @endif
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
            <div class="@if ($output) d-none @else col-lg-3 d-none @endif">
                <br><br>
                @if ($type === 'regional')
                    <div class="card shadow-sm border-0">

                        <div class="list-group list-group-flush">
                            <a javascript:void(0) class="list-group-item list-group-item-action"
                                data-bs-toggle="modal" data-bs-target="#faqModal">
                                India-Czech Comparison <small>(FAQ)</small>
                            </a>
                            <a href="https://g2c.prarang.in/czech-republic" target="_blank"
                                class="list-group-item list-group-item-action" target="_blank">
                                Czech Republic AI Report
                            </a>
                            <a href="https://g2c.prarang.in/india" class="list-group-item list-group-item-action"
                                target="_blank">
                                India AI Report
                            </a>
                            {{-- <a href="https://g2c.prarang.in/india/development-planners"
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
                        </button> --}}
                        </div>
                    </div>
                @else
                    <div class="card shadow-sm border-0">

                        <div class="list-group list-group-flush">

                            <a class="list-group-item list-group-item-action side-buttons" type="button"
                                href="javascript:void(0)" type="button" data-bs-toggle="offcanvas">Country
                                Comparison <small>(FAQ)</small></a>

                            <a href="https://g2c.prarang.in/czech-republic"
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
                            {{-- <a href="javascript:void(0)" class="list-group-item list-group-item-action"
                            target="_blank">
                            Czech Development Planner <small>(Coming Soon)</small>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item list-group-item-action" target="_blank">
                            Czech Market Planner <small>(Coming Soon)</small>
                        </a> --}}
                        </div>
                    </div>
                @endif
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
                    @if ($type === 'regional')
                        <div id="categoryTabsContent">

                            @foreach ($czeFields as $main => $subs)
                                <div class="rounded shadow px-2 mb-2">
                                    <h6 class="fw-bold mt-3">{{ __('metrics.' . $main) }}</h6>
                                    <div class="row">

                                        @foreach ($subs as $sub)
                                            <div class="mb-2 col-12 col-sm-4 col-lg-3">
                                                <div class="form-check">
                                                    <input wire:loading.attr="disabled"
                                                        wire:model="subChecks.{{ $sub['type'] }}.{{ $sub['id'] }}"
                                                        type="checkbox" class="form-check-input"
                                                        id="sub-{{ $sub['type'] }}-{{ $sub['id'] }}"
                                                        value="{{ $sub['id'] }}">
                                                    <label class="form-check-label small"
                                                        for="sub-{{ $sub['type'] }}-{{ $sub['id'] }}">
                                                        {{ $sub['name'] }}

                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
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
                                                        $types = ['World'];
                                                    @endphp
                                                    @foreach ($types as $typeIs)
                                                        @if (collect($subs)->contains('type', $typeIs))
                                                            <div class="pb-3 col-12">
                                                            </div>
                                                        @endif
                                                        @foreach ($subs as $sub)
                                                            @if ($sub['type'] === $typeIs)
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
                    @endif
                </div>

                <div class="modal-footer">
                    <p class="text-center me-5"><span id="metrics-selecte-alert">0</span>
                        {{ $lables['selected'] }}
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
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" wire:ignore.self>
            @if ($type === 'regional')
                <div class="modal-content" x-data="{
                    selectedCze: @entangle('selectedCzeRegions'),
                    selectedIndia: @entangle('selectedIndiaCities'),
                    maxCze: @js($maxCzeRegions ?? 3),
                    maxIndia: @js($maxIndiaCities ?? 3),
                    toggleCze(region) {
                        if (this.selectedCze.includes(region)) {
                            this.selectedCze = this.selectedCze.filter(r => r !== region);
                        } else {
                            if (this.selectedCze.length < this.maxCze) {
                                this.selectedCze.push(region);
                                $wire.set('errorMessage', '');
                            }
                        }
                    },
                    toggleIndia(id, city) {
                        let index = this.selectedIndia.findIndex(c => c.id == id);
                        if (index !== -1) {
                            this.selectedIndia.splice(index, 1);
                        } else {
                            if (this.selectedIndia.length < this.maxIndia) {
                                this.selectedIndia.push({ id: id, city: city });
                                $wire.set('errorMessage', '');
                            }
                        }
                    },
                    isCzeDisabled(region) {
                        return this.selectedCze.length >= this.maxCze && !this.selectedCze.includes(region);
                    },
                    isIndiaDisabled(id) {
                        return this.selectedIndia.length >= this.maxIndia && !this.selectedIndia.some(c => c.id == id);
                    }
                }">
                @else
                    <div class="modal-content">
            @endif
            <div class="modal-header">
                <h5 class="modal-title" id="geographyModalLabel"><small>
                        {{-- Debug: Type = {{ $type }} --}}
                        @if ($type === 'regional')
                            <p class="mb-2 ">Choose up to {{ $maxCzeRegions ?? 3 }} Czech regions (kraje)
                                and {{ $maxIndiaCities }} Indian
                                regions.</p>
                        @else
                            <p class="mb-2 text-info">You can select up to
                                3 Countries.</p>
                        @endif
                    </small></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" wire:ignore.self>
                @if ($type === 'regional')
                    <div>
                        {{-- Regional Mode: Czech Regions + Indian Cities --}}
                        <div class="row">
                            {{-- Czech Republic Regions --}}
                            <div class="col-md-5 border-end">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="fw-bold mb-0">
                                        Czech Republic – 13 Regions (Kraje)
                                    </h6>
                                    <span class="badge"
                                        :class="selectedCze.length >= maxCze ? 'bg-danger' : 'bg-success'">
                                        <span x-text="selectedCze.length"></span>/<span x-text="maxCze"></span>
                                    </span>
                                </div>
                                <div class="list-group" style="max-height: 450px; overflow-y: auto;">
                                    @foreach ($czechRegions as $id => $regionName)
                                        <label
                                            class="list-group-item d-flex font-bold align-items-center gap-3 border-0 py-2"
                                            style="cursor: pointer; transition: background-color 0.2s;"
                                            onmouseover="this.style.backgroundColor='#f8f9fa'"
                                            onmouseout="this.style.backgroundColor='transparent'">
                                            <input class="form-check-input flex-shrink-0 m-0" type="checkbox"
                                                value="{{ $regionName }}"
                                                @change="toggleCze('{{ $regionName }}')"
                                                :checked="selectedCze.includes('{{ $regionName }}')"
                                                :disabled="isCzeDisabled('{{ $regionName }}')">
                                            <span class="form-check-label">{{ $regionName }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Indian Cities --}}
                            <div class="col-md-7">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="fw-bold mb-0">
                                        India 768 Regions (Districts)
                                    </h6>
                                    <span class="badge"
                                        :class="selectedIndia.length >= maxIndia ? 'bg-danger' : 'bg-success'">
                                        <span x-text="selectedIndia.length"></span>/<span x-text="maxIndia"></span>
                                    </span>
                                </div>

                                <div class="accordion" id="indianStatesAccordion" wire:ignore.self
                                    style="max-height: 450px; overflow-y: auto;">
                                    @foreach ($indianStates as $stateName => $cities)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header"
                                                id="heading{{ str_replace(' ', '', $stateName) }}">
                                                <button class="accordion-button collapsed fw-semibold" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ str_replace(' ', '', $stateName) }}"
                                                    aria-expanded="false"
                                                    aria-controls="collapse{{ str_replace(' ', '', $stateName) }}">
                                                    {{ $stateName }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ str_replace(' ', '', $stateName) }}" wire:ignore.self
                                                class="accordion-collapse collapse"
                                                aria-labelledby="heading{{ str_replace(' ', '', $stateName) }}"
                                                data-bs-parent="#indianStatesAccordion">
                                                <div class="accordion-body" wire:ignore.self>
                                                    <div class="row g-2">
                                                        @foreach ($cities as $cityData)
                                                            <div class="col-md-6 col-12">
                                                                <label
                                                                    class="d-flex align-items-center gap-2 p-2 rounded"
                                                                    style="cursor: pointer; transition: background-color 0.2s;"
                                                                    onmouseover="this.style.backgroundColor='#f0f8ff'"
                                                                    onmouseout="this.style.backgroundColor='transparent'">
                                                                    <input class="form-check-input m-0 flex-shrink-0"
                                                                        type="checkbox"
                                                                        value="{{ $cityData['city'] }}"
                                                                        @change="toggleIndia('{{ $cityData['id'] }}', '{{ $cityData['city'] }}')"
                                                                        :checked="selectedIndia.some(c => c.id ==
                                                                            '{{ $cityData['id'] }}')"
                                                                        :disabled="isIndiaDisabled('{{ $cityData['id'] }}')">
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

                        {{-- Error Message Display --}}
                        @if ($errorMessage)
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ $errorMessage }}
                                <button type="button" class="btn-close"
                                    wire:click="$set('errorMessage', '')"></button>
                            </div>
                        @endif
                    </div>
                @else
                    {{-- Country Mode: Country Selection --}}
                    <div id="selectesGeographyAll"></div>

                    {{-- @php use Illuminate\Support\Str; @endphp --}}

                    <div class="accordion" id="accordionCitiesCountries">
                        <div class="row">

                            {{-- World Countries --}}
                            <div class="col-sm-12">
                                <h5 class="mb-3">Compare Czech Republic
                                    with ...</h5>
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
                @endif
            </div>
            <div class="modal-footer">
                @if ($type === 'regional')
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="text-muted small">
                            Selected:
                            <strong
                                x-text="selectedCze.length + selectedIndia.length">{{ $this->selectedCount }}</strong>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                wire:click="confirmSelection">
                                Done
                            </button>
                        </div>
                    </div>
                @else
                    <p class="text-center me-5"><span id="location-selecte-alert">0</span>
                        {{ $lables['selected'] }}
                    </p>
                    <button type="button" class="btn btn-primary"
                        onclick="geoSelect()">{{ $lables['done'] }}</button>
                @endif
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
                <h5 class="modal-title" id="faqModalLabel">
                    @if ($type === 'regional')
                        India-Czech Comparison Tool - FAQ
                    @else
                        Country Comparison Tool - FAQ
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($type === 'regional')
                    {{-- Regional Mode FAQs --}}
                    <p>The India-Czech Comparison Tool helps users create knowledge by comparison. It enables clear
                        and
                        structured comparisons between the Regions of the Czech Republic and India’s Regions
                        (Districts),
                        offering practical insights into region-level metrics.
                    </p>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingOnea">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseOnea" aria-expanded="true"
                                    aria-controls="faqCollapseOnea">
                                    What is Comparative A.I.?
                                </button>
                            </h2>
                            <div id="faqCollapseOnea" class="accordion-collapse collapse show"
                                aria-labelledby="faqHeadingOnea" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Information is not knowledge. Knowledge is not intelligence. Intelligence is
                                    not wisdom.
                                    <p>

                                        <span class="fw-bold">Information</span> structured and organized data and
                                        facts,
                                        which
                                        are useful.
                                        Understanding information and related concepts creates <span
                                            class="fw-bold">knowledge</span>. <br>
                                        Application of knowledge at the right time and place, is <span
                                            class="fw-bold">intelligence</span>. Application of intelligence. A
                                        broad
                                        understanding based on experience and acquired knowledge, used for the
                                        betterment of self and society, is <span class="fw-bold">wisdom</span>.
                                        <br>
                                        Generative Artificial Intelligence (GenAI), using LLMs (Large Language
                                        Models), is a method to reformat and restructure information using a layer of
                                        new sentences/language (based on word and word usage statistics on digitized
                                        content). It essentially seems to skip the step of creating knowledge from
                                        information. GenAI thus avoids "knowing". Instead, based on the
                                        query/prompt, it tries to answer promptly, even mimicking human “reasoning”
                                        to some extent.
                                        <br>
                                        <span class="fw-bold">Prarang’s Comparative AI</span> focuses on creating
                                        knowledge by comparison for its
                                        users. It is not a GenAI yet, although it mimics the GenAI input prompt and
                                        its output is comparable with GenAI outputs for the same prompt. Both GenAI
                                        and Upmana are still work in progress.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Q1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseOne" aria-expanded="true"
                                    aria-controls="faqCollapseOne">
                                    How do I compare regions using this tool?
                                </button>
                            </h2>
                            <div id="faqCollapseOne" class="accordion-collapse collapse"
                                aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <ul>
                                        <li>Select up to three regions (Kraje) in the Czech Republic and up to three
                                            regions in India that you wish to compare.</li>
                                        <li>In the next step, choose any metric from our multidimensional database
                                            on which you want the comparison to be performed.</li>
                                    </ul>
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
                                    <ul>
                                        <li>Czech Republic: You may select 1–3 regions (Kraje). Prague and Central
                                            Bohemia are treated as a single combined region in this tool.
                                        </li>
                                        <li>India: You may select 1–3 regions (districts) from the 768 districts
                                            included in the India analytics database.</li>
                                    </ul>
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
                                    <ul>
                                        <li>In the Czech Republic, The Czech Census - conducted at regular intervals
                                            since 1869 - is organized at the regional (Kraj) level. The data has
                                            historically recognized 13 regions, with Prague counted as a separate
                                            region.</li>
                                        <li>
                                            In India, the Census has been conducted since the 1880s, and the 2011
                                            Census officially recorded 640 districts. The next Census is expected in
                                            2026, and in the years between, the number of districts has increased to
                                            800+. In our analytics database, these have been standardized to 768
                                            districts to maintain consistency and enable meaningful comparison
                                            across regions.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Country Mode FAQs --}}
                    <p class="mb-4">
                        The Country Comparison Tool helps users create
                        knowledge through comparison. It enables
                        clear
                        and structured comparisons between the Czech
                        Republic and other countries, offering
                        practical
                        insights into country-level metrics, relative
                        advantages, and differences across multiple
                        analytical dimensions.
                    </p>

                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeadingOnea">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseOnea" aria-expanded="true"
                                    aria-controls="faqCollapseOnea">
                                    What is Comparative A.I?
                                </button>
                            </h2>
                            <div id="faqCollapseOnea" class="accordion-collapse collapse show"
                                aria-labelledby="faqHeadingOnea" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Information is not Knowledge. Knowledge is not Intelligence. Intelligence is
                                    not Wisdom.
                                    <p>

                                        <span class="fw-bold">Information </span> structured & organized data & facts,
                                        which
                                        are useful.
                                        Understanding information and related concepts creates <span
                                            class="fw-bold">Knowledge</span>. <br>
                                        Application of knowledge at the right time & place, is <span
                                            class="fw-bold">Intelligence</span>. Application of Intelligence. A
                                        broad
                                        understanding based on experience & acquired knowledge, used for the
                                        betterment of self & society, is<span class="fw-bold"> Wisdom</span>.
                                        <br>
                                        Generative Artificial Intelligence (GenAI), using LLMs (Large Language
                                        Models), is a method to reformat & restructure Information using a layer of
                                        new sentences/language (based on word & word usage statistics on digitized
                                        content). It essentially seems to skip the step of creating knowledge from
                                        Information. GenAI thus avoids "knowing". Instead, based on the
                                        query/prompt, it tries to answer promptly, even mimicking human “reasoning”
                                        to some extent.
                                        <br>
                                        <span class="fw-bold">Prarang’s Comparative AI
                                        </span> focuses on creating knowledge by comparison for its
                                        users. It is not a GenAI yet, although it mimics the GenAI input prompt &
                                        its output is comparable with GenAI outputs for the same prompt. Both GenAI
                                        & Upmana are still work in progress.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Q1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What does this comparison tool do?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The Tool enables users to compare the
                                    Czech Republic with one to three
                                    countries
                                    out
                                    of the 195 UN-recognized countries,
                                    using an analytical context. It allows
                                    meaningful comparison across geographies
                                    based on metrics drawn from our
                                    multidimensional data framework.
                                </div>
                            </div>
                        </div>

                        <!-- Q2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How do I compare countries using this
                                    tool?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <ol>
                                        <li><strong>Select the
                                                countries</strong> you wish
                                            to compare with the Czech
                                            Republic. You may choose 1–3
                                            countries.</li>
                                        <li><strong>Select any
                                                metric</strong> from our
                                            multidimensional database on
                                            which you want the comparison to
                                            be performed.</li>
                                        <li><strong>View results:</strong>
                                            The tool will then generate
                                            analytical
                                            insights based on the selected
                                            geographies and metrics.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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
