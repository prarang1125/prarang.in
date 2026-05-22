<x-layout.portal.country_base :portal="$main">

  <link rel="stylesheet" href="https://indiaczech.com/assets/css/mobile.css">

<style>
    /* Primary language */
#primary-language{
 color:#ffffff !important;
}

/* Secondary language */
#secondary-language{
 color:#020202 !important;
}


</style>
  <main class="max-w-md mx-auto px-3 pb-10">

    {{-- ===== HEADER: Logo + Language Toggle ===== --}}
    <section id="header" class="pt-4 pb-2">
      <div class="flex flex-col items-center gap-3">
        <div class="flex items-center gap-5">
          <img src="https://i.ibb.co/TDKtQQrd/prarang-logo-dark.png" alt="Prarang Logo" class="h-[90px] w-auto">
          <div class="flex flex-col gap-2">
            <div class="flex items-center bg-gray-100 p-1 rounded-full border">
                            <button id="primary-language"
                                class="px-4 py-1 rounded-full text-xs font-bold bg-blue-600 text-white shadow-sm">{{ strtoupper(substr($primary->locale_lang ?? '', 0, 2)) }}
                            </button>
                            <button id="secondary-language"
                                onclick="showComingSoonToast(' Coming Soon.')"
                                class="px-4 py-1 rounded-full text-xs font-bold text-gray-500 hover:bg-gray-200 transition-colors">{{ strtoupper(substr($secondary->locale_lang ?? '', 0, 2)) }}</button>
                        </div>
          </div>
        </div>

        @if($main->is_active)
        <div
          class="bg-slate-900 text-white px-3 py-1.5 rounded-lg border border-slate-700 shadow-inner w-full max-w-[280px]">
          <div class="grid grid-cols-1 text-[10px] gap-1">
            <div class="flex justify-between items-center gap-4">
              <span class="opacity-80 text-[11px]">Subscribers:</span>
              <span class="font-mono font-bold text-green-400" id="city-subscriber-count">12</span>
            </div>
            <div class="flex justify-between items-center gap-4 border-t border-slate-800 pt-1">
              <span class="opacity-80 text-[11px]">Monthly Website Reach:</span>
              <span class="font-mono font-bold text-blue-400" id="city-monthly-count">32</span>
            </div>
            <div class="flex justify-between items-center gap-4 border-t border-slate-800 pt-1">
              <span class="opacity-80 text-[11px]">Daily Readers:</span>
              <span class="font-mono font-bold text-amber-400" id="city-daily-count">8</span>
            </div>
          </div>
        </div>
        @endif
      </div>
    </section>
    {{-- ===== 1. COUNTRY TIME ===== --}}
    <section class="mb-4">
      <div class="px-4 py-3 grid grid-cols-2 gap-3">
        {{-- CZE Time --}}
        <x-ui.modal id="time-cze-modal">
          <x-slot name="title">
            <div class="flex items-center gap-2">
              <img src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg"
                class="w-5 h-3 object-cover rounded-sm" alt="CZ">
              {{ $primary->country_name }} Time
            </div>
          </x-slot>
          <x-slot name="button">
            <div
              class="w-full py-3 px-3 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-lg transition-colors text-center relative overflow-hidden group">
              <div class="absolute top-0 right-0 p-1 opacity-20 group-hover:opacity-40 transition-opacity">
                {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg" class="w-8 h-auto"
                  alt="CZ"> --}}
              </div>
              <div class="text-xs font-bold text-blue-800 mb-1"> {{ $primary->country_name }} Time</div>
              <div id="mobile-cze-time" class="text-sm font-mono font-bold text-blue-600">Loading...
              </div>
              <div id="mobile-cze-date" class="text-[10px] text-gray-500 mt-0.5">—</div>
            </div>
          </x-slot>
          <div class="text-center py-6">
            <div class="mb-4 flex justify-center">
              {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg"
                class="w-20 h-auto rounded border shadow-sm" alt="CZ"> --}}
            </div>
            <div class="text-3xl font-mono font-bold text-blue-600 mb-2" id="modal-cze-time">Loading...
            </div>
            <div class="text-sm text-gray-500" id="modal-cze-date"></div>
            <div class="mt-3 text-xs text-gray-400">Timezone: {{ $primary->timezone ?? 'Europe/Prague' }}
            </div>
          </div>
        </x-ui.modal>

        {{-- India Time --}}
        <x-ui.modal id="time-ind-modal">
          <x-slot name="title">
            <div class="flex items-center gap-2">
              {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                class="w-5 h-3 object-cover rounded-sm" alt="IN"> --}}
              {{ $secondary->country_name ?? 'India' }} Time
            </div>
          </x-slot>
          <x-slot name="button">
            <div
              class="w-full py-3 px-3 bg-orange-50 hover:bg-orange-100 border border-orange-200 rounded-lg transition-colors text-center relative overflow-hidden group">
              <div class="absolute top-0 right-0 p-1 opacity-20 group-hover:opacity-40 transition-opacity">
                {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg" class="w-8 h-auto"
                  alt="IN"> --}}
              </div>
              <div class="text-xs font-bold text-orange-800 mb-1"> {{ $secondary->country_name }} Time</div>
              <div id="mobile-ind-time" class="text-sm font-mono font-bold text-orange-600">Loading...
              </div>
              <div id="mobile-ind-date" class="text-[10px] text-gray-500 mt-0.5">—</div>
            </div>
          </x-slot>
          <div class="text-center py-6">
            <div class="mb-4 flex justify-center">
              {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                class="w-20 h-auto rounded border shadow-sm" alt="IN"> --}}
            </div>
            <div class="text-3xl font-mono font-bold text-orange-600 mb-2" id="modal-ind-time">
              Loading...</div>
            <div class="text-sm text-gray-500" id="modal-ind-date"></div>
            <div class="mt-3 text-xs text-gray-400">Timezone: {{ $secondary->timezone ?? 'Asia/Kolkata' }}
            </div>
          </div>
        </x-ui.modal>
      </div>
    </section>

    {{-- ===== HERO IMAGE + LOGIN ===== --}}
    <section id="hero-login" class="mb-4">
      <div class="rounded-xl overflow-hidden shadow-md mb-3">
        <img class="w-full" src="{{ Storage::url($main->header_image) }}" alt="Banner">
      </div>
      <div class="flex gap-2">
        <a target="_blank" href="https://b2b.prarang.in/login?lt=partner"
          class="flex-1 text-center bg-amber-400 hover:bg-amber-500 text-black text-xs font-bold py-2.5 rounded-lg shadow hover:shadow-md transition-all">
          Business Login
        </a>
        <a target="_blank" href="https://b2b.prarang.in/login?lt=g2c"
          class="flex-1 text-center bg-amber-400 hover:bg-amber-500 text-black text-xs font-bold py-2.5 rounded-lg shadow hover:shadow-md transition-all">
          Govt./NGO Login
        </a>
      </div>
      <div class="flex-grow flex items-center justify-center my-1 w-full">
        @if($main->is_active)
        @livewire('portal.subscribe')
        @else
        @livewire('portal.join-us-box')
        @endif
      </div>
    </section>

    {{-- ===== DESCRIPTION: SLM Sentences ===== --}}
    @if(!empty($pageSlm) && isset($pageSlm['sentences']))
    <section class="mb-4">
      <div
        class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 text-sm text-gray-700 text-justify leading-relaxed">
        <p>
          @foreach($pageSlm['sentences'] as $sentence)
          {!! $sentence !!}
          @endforeach
        </p>
      </div>
    </section>
    @endif

    {{-- ===== POSTS & COUNTRY TAGS ===== --}}
    @if($main->is_active)
    <section class="mb-4">
      <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-4 py-3 border-b border-gray-100">
          <div class="flex items-center gap-2 mb-1">

            <h2 class="text-base font-semibold text-gray-900"> {{ $primary->country_name }} - {{
              $secondary->country_name
              }} Connections</h2>

          </div>

        </div>
        <div>
          <x-portal.posts-carousel cityId="{{ $main->content_country_code ?? 'CON24' }}"
            cityCode="{{ $main->content_country_code ?? 'CON24' }}" :locale="$locale" />
        </div>
        <div class="px-4 py-4">
          <x-ui.modal id="cn-tags-modal">
            <x-slot name="title">{{ $primary->country_name }} - {{ $secondary->country_name
              }} Connections</x-slot>
            <x-slot name="button">
              <div class="grid grid-cols-2 gap-4 w-full">
                <!-- Culture Card -->
                <div
                  class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex flex-col items-center justify-center transition-all active:scale-95 hover:border-blue-200">
                  <span class="text-xl font-black text-slate-800 mb-4 tracking-tighter">Culture</span>
                  <div class="flex w-full h-10 rounded-sm overflow-hidden shadow-inner">
                    <div class="flex-1 bg-[#ff0000]"></div>
                    <div class="flex-1 bg-[#f7f601]"></div>
                    <div class="flex-1 bg-[#0000ff]"></div>
                  </div>
                </div>
                <!-- Nature Card -->
                <div
                  class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex flex-col items-center justify-center transition-all active:scale-95 hover:border-green-200">
                  <span class="text-xl font-black text-slate-800 mb-4 tracking-tighter">Nature</span>
                  <div class="flex w-full h-10 rounded-sm overflow-hidden">
                    <div class="flex-1 bg-[#fef08a]"></div>
                    <div class="flex-1 bg-[#bef264]"></div>
                    <div class="flex-1 bg-[#22c55e]"></div>
                  </div>
                </div>
              </div>
            </x-slot>
            <div class="page__content">

              <x-portal.nep-tag-list :cityId="$main->content_country_code" :cityCode="$main->content_country_code"
                :citySlug="$main->slug" :locale="$locale" />
            </div>
          </x-ui.modal>
        </div>
      </div>
    </section>
    @else
    <section class="mb-4">
      <x-portal.connection-box :main="$main" :primary="$primary" :secondary="$secondary" :locale="$locale" />
    </section>
      @endif
      {{-- ===== 8. INDO-CZECH COMPARATIVE AI ===== --}}
      <section class="mb-4">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
          <div class="px-4 py-3 border-b border-gray-100">
            <h2 class="text-base font-semibold text-gray-900 text-center">
              <i class="fa fa-magic mr-1.5 text-violet-600"></i> {{ $primary->country_name }} - {{
              $secondary->country_name
              }} Comparative AI
            </h2>
          </div>
          <div class="px-4 py-4 grid grid-cols-2 gap-4">
            <a href="{{ url('/' . $primary->country_name .'/'. $secondary->country_name . " /country-comparison/" .
              $secondary->anlytics_code . '/' . $primary->anlytics_code) }}" target="_blank"
              class="relative overflow-hidden block py-5 px-3 bg-gradient-to-br from-blue-600 via-blue-500 to-blue-400
              rounded-2xl shadow-lg border border-blue-400 group active:scale-95 transition-all text-center
              hover:shadow-2xl ">
              <div class="absolute inset-0 bg-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity">
              </div>

              <div class="text-sm font-black text-white drop-shadow-sm uppercase tracking-tight">{{
                $primary->country_name }} - {{
                $secondary->country_name
                }} Comparison</div>

            </a>

            <a href="https://www.prarang.in/ai/upmana" target="_blank"
              class="relative overflow-hidden block py-5 px-3 bg-gradient-to-br from-blue-700 via-blue-600 to-blue-400 rounded-2xl shadow-lg border border-blue-500 group active:scale-95 transition-all text-center">
              <div class="absolute inset-0 bg-white/5 opacity-0 group-hover:opacity-100 transition-opacity">
              </div>
              <div class="text-xl font-bold mb-1 drop-shadow-sm flex justify-center">🌍</div>
              <div class="text-sm font-black text-white drop-shadow-sm uppercase tracking-tight">UPMANA AI</div>

            </a>
          </div>
          {{-- AI Reports --}}
          <div class="px-4 pb-3">
            <x-portal.ai-reports :primary="$primary" :secondary="$secondary" :cities="$indianCities"
              :zone="$stateZones" />
          </div>
        </div>
      </section>

      {{-- ===== 2. INTERNET TRENDS ===== --}}
      <section class="mb-4">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
          <div class="px-4 py-3 border-b border-gray-100">
            <h2 class="text-base font-semibold text-gray-900 text-center">
              <i class="fa fa-globe mr-1.5 text-green-600"></i> Internet Trends
            </h2>
          </div>
          <div class="px-4 py-3 grid grid-cols-2 gap-3">
            <x-ui.modal id="internet-cze-modal">
              <x-slot name="title">
                <div class="flex items-center gap-2">
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="CZ"> --}}
                  {{ $primary->country_name ?? 'CZE' }} Internet Data
                </div>
              </x-slot>
              <x-slot name="button">
                <div
                  class="w-full py-3 px-3 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-lg transition-colors text-sm font-semibold text-blue-800">
                  {{ $primary->country_name }}
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="CZ"> {{ $primary->country_name }} --}}
                </div>
              </x-slot>

              <x-biletral-portal-aside.internet-data :data="$primary" />
            </x-ui.modal>

            <x-ui.modal id="internet-ind-modal">
              <x-slot name="title">
                <div class="flex items-center gap-2">
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="IN"> --}}
                  {{ $secondary->country_name ?? 'India' }} Internet Data
                </div>
              </x-slot>
              <x-slot name="button">
                <div
                  class="w-full py-3 px-3 bg-orange-50 hover:bg-orange-100 border border-orange-200 rounded-lg transition-colors text-sm font-semibold text-orange-800">
                  {{ $secondary->country_name }}
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="IN"> --}}
                </div>
              </x-slot>

              <x-biletral-portal-aside.internet-data :data="$secondary" />
            </x-ui.modal>
          </div>
        </div>
      </section>

      {{-- ===== 3. LANGUAGES ===== --}}
      <section class="mb-4">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
          <div class="px-4 py-3 border-b border-gray-100">
            <h2 class="text-base font-semibold text-gray-900 text-center">
              <i class="fa fa-language mr-1.5 text-purple-600"></i> Languages
            </h2>
          </div>
          <div class="px-4 py-3 grid grid-cols-2 gap-3">
            <x-ui.modal id="lang-cze-modal">
              <x-slot name="title">
                <div class="flex items-center gap-2">
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="CZ"> --}}
                  {{ $primary->country_name ?? 'CZE' }} Languages
                </div>
              </x-slot>
              <x-slot name="button">
                <div
                  class="w-full py-3 px-3 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-lg transition-colors text-sm font-semibold text-blue-800">
                  {{ $primary->country_name }}
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="CZ"> CZE --}}
                </div>
              </x-slot>


              <x-biletral-portal-aside.language-data :data="$primary" />
            </x-ui.modal>

            <x-ui.modal id="lang-ind-modal">
              <x-slot name="title">
                <div class="flex items-center gap-2">
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="IN"> --}}
                  {{ $secondary->country_name ?? 'India' }} Languages
                </div>
              </x-slot>
              <x-slot name="button">
                <div
                  class="w-full py-3 px-3 bg-orange-50 hover:bg-orange-100 border border-orange-200 rounded-lg transition-colors text-sm font-semibold text-orange-800">
                  {{ $secondary->country_name }}
                </div>
              </x-slot>

              <x-biletral-portal-aside.language-data :data="$secondary" />
            </x-ui.modal>
          </div>
        </div>
      </section>



      {{-- ===== 5. COUNTRY METRICS ===== --}}
      <section class="mb-4">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
          <div class="px-4 py-3 border-b border-gray-100">
            <h2 class="text-base font-semibold text-gray-900 text-center">
              <i class="fa fa-bar-chart mr-1.5 text-indigo-600"></i> Country Metrics
            </h2>
          </div>
          <div class="px-4 py-3 grid grid-cols-2 gap-3">
            <x-ui.modal id="metrics-cze-modal">
              <x-slot name="title">
                <div class="flex items-center gap-2">
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="CZ"> --}}
                  {{ $primary->country_name ?? 'CZE' }} Metrics
                </div>
              </x-slot>
              <x-slot name="button">
                <div
                  class="w-full py-3 px-3 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-lg transition-colors text-sm font-semibold text-blue-800">
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/CZE__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="CZ"> --}}
                  {{ $primary->country_name }}
                </div>
              </x-slot>
              <x-biletral-portal-aside.metrics-data :data="$primary" />
            </x-ui.modal>

            <x-ui.modal id="metrics-ind-modal">
              <x-slot name="title">
                <div class="flex items-center gap-2">
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="IN"> --}}
                  {{ $secondary->country_name ?? 'India' }} Metrics
                </div>
              </x-slot>
              <x-slot name="button">
                <div
                  class="w-full py-3 px-3 bg-orange-50 hover:bg-orange-100 border border-orange-200 rounded-lg transition-colors text-sm font-semibold text-orange-800">
                  {{-- <img src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                    class="w-5 h-3 object-cover rounded-sm" alt="IN"> --}}
                  {{ $secondary->country_name }}
                </div>
              </x-slot>
              <x-biletral-portal-aside.metrics-data :data="$secondary" />
            </x-ui.modal>
          </div>
        </div>
      </section>

      {{-- ===== 5.5. CURRENCY EXCHANGE ===== --}}
      <section class="mb-4">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
          <div class="px-4 py-3 border-b border-gray-100">
            <h2 class="text-base font-semibold text-gray-900 text-center">
              <i class="fa fa-exchange mr-1.5 text-green-600"></i> Currency Exchange
            </h2>
          </div>
          <div class="px-4 py-3 grid grid-cols-2 gap-3">
            @php
                $rates = \Illuminate\Support\Facades\Cache::remember('exchange-rates-usd', now()->addHours(12), function () {
                    return \Illuminate\Support\Facades\Http::get('https://v6.exchangerate-api.com/v6/e1d88a31b3bf6bb1e7a3f27f/latest/USD')->json('conversion_rates') ?? [];
                });

                $primaryCurrency = strtoupper($main->primary_currency);
                $secondaryCurrency = strtoupper($main->secondary_currency);

                $exchangeCze = [];
                $exchangeInd = [];

                if (isset($rates[$primaryCurrency]) && isset($rates[$secondaryCurrency])) {
                    $fromRate = $rates[$primaryCurrency];
                    $toRate   = $rates[$secondaryCurrency];

                    $exchangeCze = [
                        "1 {$primaryCurrency} = " . round($toRate / $fromRate, 2) . " {$secondaryCurrency}",
                        "1 USD = " . round($toRate, 2) . " {$secondaryCurrency}",
                    ];

                    $exchangeInd = [
                        "1 {$secondaryCurrency} = " . round($fromRate / $toRate, 2) . " {$primaryCurrency}",
                        "1 USD = " . round($fromRate, 2) . " {$primaryCurrency}",
                    ];
                }
            @endphp
            <x-ui.modal id="exchange-cze-modal">
              <x-slot name="title">{{ $primary->country_name ?? 'CZE' }} Exchange</x-slot>
              <x-slot name="button">
                <div
                  class="w-full py-3 px-3 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-lg transition-colors text-sm font-semibold text-blue-800 text-center">
                  {{ $primary->country_name }}
                </div>
              </x-slot>
              <div class="p-3 bg-white rounded">
                <div class="d-flex flex-column gap-1">
                    @foreach ($exchangeCze as $item)
                    @php
                    $parts = explode(' = ', $item);
                    $from = $parts[0] ?? '';
                    $to = $parts[1] ?? '';
                    @endphp
                    <div class="d-flex align-items-center justify-content-between px-3 py-2 rounded-3 bg-[#F5F4ED]">
                        <span style="font-size: 13px; font-weight: 500;">{{ $from }}</span>
                        <i class="text-success fa fa-exchange" style="font-size: 12px;"></i>
                        <span style="font-size: 13px; font-weight: 500;">{{ $to }}</span>
                    </div>
                    @endforeach
                    <div class="text-end m-0 mt-2">
                        <a href="https://www.xe.com/currencycharts/?from={{ $main->primary_currency }}&to={{ $main->secondary_currency }}" target="_blank" class="text-xs text-blue-900 hover:text-blue-800">
                            <img class="inline-block h-4 w-4" src="https://www.xe.com/favicon-32x32.png" alt=""> Corporation Inc <i class="fa fa-external-link"></i></a>
                    </div>
                </div>
              </div>
            </x-ui.modal>

            <x-ui.modal id="exchange-ind-modal">
              <x-slot name="title">{{ $secondary->country_name ?? 'India' }} Exchange</x-slot>
              <x-slot name="button">
                <div
                  class="w-full py-3 px-3 bg-orange-50 hover:bg-orange-100 border border-orange-200 rounded-lg transition-colors text-sm font-semibold text-orange-800 text-center">
                  {{ $secondary->country_name }}
                </div>
              </x-slot>
              <div class="p-3 bg-white rounded">
                <div class="d-flex flex-column gap-1">
                    @foreach ($exchangeInd as $item)
                    @php
                    $parts = explode(' = ', $item);
                    $from = $parts[0] ?? '';
                    $to = $parts[1] ?? '';
                    @endphp
                    <div class="d-flex align-items-center justify-content-between px-3 py-2 rounded-3 bg-[#F5F4ED]">
                        <span style="font-size: 13px; font-weight: 500;">{{ $from }}</span>
                        <i class="text-success fa fa-exchange" style="font-size: 12px;"></i>
                        <span style="font-size: 13px; font-weight: 500;">{{ $to }}</span>
                    </div>
                    @endforeach
                    <div class="text-end m-0 mt-2">
                        <a href="https://www.xe.com/currencycharts/?from={{ $main->secondary_currency }}&to={{ $main->primary_currency }}" target="_blank" class="text-xs text-blue-900 hover:text-blue-800">
                            <img class="inline-block h-4 w-4" src="https://www.xe.com/favicon-32x32.png" alt=""> Corporation Inc <i class="fa fa-external-link"></i></a>
                    </div>
                </div>
              </div>
            </x-ui.modal>
          </div>
        </div>
      </section>
      {{-- ===== 11. PLANNERS & TOOLS ===== --}}
      <section class="mb-4">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
          <div class="px-4 py-3 border-b border-gray-100">
            <h2 class="text-base font-semibold text-gray-900 text-center">
              <i class="fa fa-wrench mr-1.5 text-gray-700"></i> Planners & Tools
            </h2>
          </div>
          <div class="px-4 py-4">
            {{-- Development Planners --}}
            <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Development Planners</h3>
            <div class="grid grid-cols-2 gap-2 mb-4">
              <a href="https://g2c.prarang.in/world/development-planner" target="_blank"
                class="block py-2.5 px-3 bg-slate-800 hover:bg-slate-700 text-white rounded-lg transition-colors text-center text-xs font-semibold">
                🌍 World
              </a>
              <a href="https://g2c.prarang.in/india/development-planners" target="_blank"
                class="flex items-center justify-center gap-2 py-2.5 px-3 bg-slate-800 hover:bg-slate-700 text-white rounded-lg transition-colors text-center text-xs font-semibold">
                <img src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                  class="h-3 w-5 rounded-sm object-cover" alt="IN">
                India
              </a>
            </div>
            {{-- Market Planners --}}
            <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Market Planners</h3>
            <div class="grid grid-cols-2 gap-2">
              <a href="https://g2c.prarang.in/world/market-planner" target="_blank"
                class="block py-2.5 px-3 bg-emerald-700 hover:bg-emerald-600 text-white rounded-lg transition-colors text-center text-xs font-semibold">
                🌍 World
              </a>
              <a href="https://g2c.prarang.in/india/market-planner/states" target="_blank"
                class="flex items-center justify-center gap-2 py-2.5 px-3 bg-emerald-700 hover:bg-emerald-600 text-white rounded-lg transition-colors text-center text-xs font-semibold">
                <img src="https://g2c.prarang.in/storage/images/world/195Counties/IND__flag.jpg"
                  class="h-3 w-5 rounded-sm object-cover" alt="IN">
                India
              </a>
            </div>
          </div>
        </div>
        </section>
        {{-- ===== 7. DATA ANALYTICS ===== --}}
        <section class="mb-4">
          <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-100">
              <h2 class="text-base font-semibold text-gray-900 text-center">
                <i class="fa fa-line-chart mr-1.5 text-teal-600"></i> Country Data Analytics
              </h2>
            </div>
            <div class="px-4 py-3 grid grid-cols-2 gap-3">
              <x-ui.modal id="analytics-cze-modal">
                <x-slot name="title">{{ $primary->country_name ?? 'CZE' }} Analytics</x-slot>
                <x-slot name="button">
                  <div
                    class="w-full py-3 px-3 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-lg transition-colors text-sm font-semibold text-blue-800">
                    {{ $primary->country_name }}
                  </div>
                </x-slot>
                <x-biletral-portal-aside.analytics-data :data="$primary" side="left" />
              </x-ui.modal>

              <x-ui.modal id="analytics-ind-modal">
                <x-slot name="title">{{ $secondary->country_name ?? 'India' }} Analytics</x-slot>
                <x-slot name="button">
                  <div
                    class="w-full py-3 px-3 bg-orange-50 hover:bg-orange-100 border border-orange-200 rounded-lg transition-colors text-sm font-semibold text-orange-800">
                    {{ $secondary->country_name }}
                  </div>
                </x-slot>
                <x-biletral-portal-aside.analytics-data :data="$secondary" side="right" />
              </x-ui.modal>
            </div>
          </div>
        </section>

        {{-- ===== 12. YELLOW PAGES ===== --}}
        <section class="mb-4">
          <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-100">
              <h2 class="text-base font-semibold text-gray-900 text-center">
                <img src="https://miro.medium.com/v2/resize:fit:1100/format:webp/1*oq4ZLXKWnsDKys5DV-iEgw.png"
                  class="w-5 h-5 inline-block mr-1.5" alt=""> Yellow Pages
              </h2>
            </div>
            <div class="px-4 py-3 grid grid-cols-2 gap-3">
              <x-biletral-portal-aside.yellow-pages :data="$primary" side="left" :main="$main" />
              <x-biletral-portal-aside.yellow-pages :data="$secondary" side="right" :main="$main" />
            </div>
          </div>
        </section>

        {{-- ===== 4. WEATHER ===== --}}
        <section class="mb-4">
          <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-100">
              <h2 class="text-base font-semibold text-gray-900 text-center">
                <i class="fa fa-cloud mr-1.5 text-cyan-600"></i> Weather
              </h2>
            </div>
            <div class="px-4 py-3 grid grid-cols-2 gap-3">
              <div class="p-3 bg-blue-50/30 rounded-xl border border-blue-50">
                @if (!empty($primary->weather))
                <div class="weather-content scale-90 origin-top">
                  {!! $primary->weather !!}
                </div>
                @else
                <p class="text-gray-400 text-[10px] text-center italic py-4">Weather unavailable</p>
                @endif
              </div>
              <div class="p-3 bg-orange-50/30 rounded-xl border border-orange-50">
                @if (!empty($secondary->weather))
                <div class="weather-content scale-90 origin-top">
                  {!! $secondary->weather !!}
                </div>
                @else
                <p class="text-gray-400 text-[10px] text-center italic py-4">Weather unavailable</p>
                @endif
              </div>
            </div>
          </div>
        </section>

        {{-- ===== 6. LATEST NEWS ===== --}}
        <section class="mb-4">
          <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-100">
              <h2 class="text-base font-semibold text-gray-900 text-center">
                <i class="fa fa-newspaper-o mr-1.5 text-red-600"></i> Latest News
              </h2>
            </div>
            <div class="px-4 py-3 grid grid-cols-2 gap-3">
              <x-ui.modal id="news-cze-modal">
                <x-slot name="title">{{ $primary->country_name ?? 'CZE' }} News</x-slot>
                <x-slot name="button">
                  <div
                    class="w-full py-3 px-3 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-lg transition-colors text-sm font-semibold text-blue-800">
                    {{ $primary->country_name }}
                  </div>
                </x-slot>
                <x-portal.news :url="$primary->news" side="left" />
              </x-ui.modal>

              <x-ui.modal id="news-ind-modal">
                <x-slot name="title">{{ $secondary->country_name ?? 'India' }} News</x-slot>
                <x-slot name="button">
                  <div
                    class="w-full py-3 px-3 bg-orange-50 hover:bg-orange-100 border border-orange-200 rounded-lg transition-colors text-sm font-semibold text-orange-800">
                    {{ $secondary->country_name }}
                  </div>
                </x-slot>
                <x-portal.news :url="$secondary->news" side="right" />
              </x-ui.modal>
            </div>
          </div>
        </section>

        {{-- ===== 9. EMBASSY ===== --}}
        <section class="mb-4">
          <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-100">
              <h2 class="text-base font-semibold text-gray-900 text-center">
                <i class="fa fa-building-o mr-1.5 text-blue-700"></i> Embassy
              </h2>
            </div>
            <div class="px-4 py-3 grid grid-cols-2 gap-3">
              <x-biletral-portal-aside.embassy-data :data="$primary" side="left" :main="$main" />
              <x-biletral-portal-aside.embassy-data :data="$secondary" side="right" :main="$main" />
            </div>
          </div>
        </section>

        {{-- ===== 10. IMPORTANT LINKS ===== --}}
        <section class="mb-4">
          <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-100">
              <h2 class="text-base font-semibold text-gray-900 text-center">
                <i class="fa fa-link mr-1.5 text-gray-600"></i> Important Links
              </h2>
            </div>
            <div class="px-4 py-3 grid grid-cols-2 gap-3">
              <x-ui.modal id="links-cze-modal">
                <x-slot name="title">{{ $primary->country_name ?? 'CZE' }} Links</x-slot>
                <x-slot name="button">
                  <div
                    class="w-full py-3 px-3 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-lg transition-colors text-sm font-semibold text-blue-800">
                    {{ $primary->country_name }}
                  </div>
                </x-slot>
                <x-biletral-portal-aside.important-links :data="$primary" side="left" />
              </x-ui.modal>

              <x-ui.modal id="links-ind-modal">
                <x-slot name="title">{{ $secondary->country_name ?? 'India' }} Links</x-slot>
                <x-slot name="button">
                  <div
                    class="w-full py-3 px-3 bg-orange-50 hover:bg-orange-100 border border-orange-200 rounded-lg transition-colors text-sm font-semibold text-orange-800">
                    {{ $secondary->country_name }}
                  </div>
                </x-slot>
                <x-biletral-portal-aside.important-links :data="$secondary" side="right" />
              </x-ui.modal>
            </div>
          </div>
        </section>
  </main>

  <style>
    #wrapper footer .row .col p {
      margin-bottom: 5px !important;
    }
  </sty>

  <footer class="portal-footer">
    <div class="container py-5">
      <div class="row g-4">
        {{-- About Section --}}
        <div class="col-lg-5 col-md-6 pe-lg-5">
          <h5 class="footer-title text-start">About Prarang</h5>
          <p class="footer-text text-start text-white-50">
            Prarang provides integrated digital solutions and unique insights to understand
            the
            cities of India and the World. Through our composite methodology of traditional
            research from rare books, maps and images, a Big database of India and World
            Metrics, our own SLM Model based on Indian Linguistics, we provide in depth city
            -
            hyperlocal knowledge, comprehensive knowledge by comparison between cities of
            the
            world, through our content, analytics, and semiotics solutions, for governance &
            corporate communication, while being localisation ready for any language/script.
          </p>
        </div>

        {{-- Social Connect --}}
        <div class="col-lg-3 col-md-6 text-center">
          <h5 class="footer-title">Connect With Us</h5>
          <div class="social-grid justify-content-center mt-3">
            <a href="https://www.facebook.com/IndiaCzech/" target="_blank" class="social-btn" title="Facebook">
              <i class="fa fa-facebook"></i>
            </a>
            <a href="https://x.com/IndiaCzech" target="_blank" class="social-btn" title="X (Twitter)">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                style="display: inline-block; vertical-align: middle;">
                <path
                  d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
              </svg>
            </a>
            <a href="https://www.linkedin.com/company/india-czech" target="_blank" class="social-btn" title="LinkedIn">
              <i class="fa fa-linkedin"></i>
            </a>
          </div>
        </div>

        {{-- Address Section --}}
        <div class="col-lg-4 col-md-12">
          <h5 class="footer-title text-start text-md-center text-lg-start">Contact Us</h5>
          <ul class="list-unstyled footer-text text-white-50 text-start text-md-center text-lg-start">
            <li class="mb-2">
              <i class="fa fa-map-marker me-2 text-primary"></i>
              Office #25, 11th Floor, The I-Thum, A40, Sector 62<br>
              Noida (U.P), India 201309
            </li>
            <li class="mb-2">
              <i class="fa fa-phone me-2 text-primary"></i>
              +91-1204561284
            </li>
            <li>
              <i class="fa fa-envelope me-2 text-primary"></i>
              <a href="mailto:ask_me@prarang.in" class="text-white-50 text-decoration-none hover-white">
                ask_me@prarang.in
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    {{-- Bottom Copyright --}}
    <div class="footer-bottom">
      <div class="container text-center">
        <p class="mb-0 text-white-50 small">
          © 2017 - {{ date('Y') }} Indoeuropeans India Pvt. Ltd. | All
          rights reserved.
        </p>
        <p class="mb-0 text-white-50 x-small mt-1 opacity-50">
          Content protected by international copyright laws.
        </p>
      </div>
    </div>
  </footer>

  <style>
    .portal-footer {
      background-color: #1a1a1a;
      background-image: linear-gradient(rgba(26, 26, 26, 0.60), rgba(26, 26, 26, 0.75)),
      url('{{ Storage::url($main->footer_image) }}');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      color: #ffffff;
      margin-top: 100px;
      position: relative;
      z-index: 10;
    }

    .footer-title {
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      position: relative;
      padding-bottom: 0.75rem;
      color: #ffffff;
    }



    .col-md-6.text-center .footer-title::after,
    .text-md-center .footer-title::after {
      left: 50%;
      transform: translateX(-50%);
    }

    <blade media|%20(min-width%3A%20992px)%20%7B>.text-lg-start .footer-title::after {
      left: 0;
      transform: none;
    }
    }

    .footer-text {
      font-size: 0.95rem;
      line-height: 1.6;
      margin-bottom: 0;
    }

    .social-grid {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .social-btn {
      width: 45px;
      height: 45px;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.05);
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 1px solid rgba(255, 255, 255, 0.1);
      font-size: 1.1rem;
    }

    .social-btn:hover {
      background: #2563eb;
      color: #ffffff;
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(37, 99, 235, 0.25);
      border-color: #2563eb;
    }

    .footer-bottom {
      background: #000000;
      padding: 1.5rem 0;
      border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .hover-white:hover {
      color: #ffffff !important;
    }

    .x-small {
      font-size: 0.75rem;
    }
  </style>
  <style>
    /* Tracking wider */
    .max-w-md .mb-4 h3.tracking-wider {
      color: #020202 !important;
    }

    /* Font semibold */
    .max-w-md .px-4 .grid .font-semibold {
      color: #ffffff !important;
    }

    /* Justify center */
    .max-w-md .cursor-pointer .justify-center {
      background-size: contain !important;
      padding-top: 23px !important;
      padding-bottom: 6px !important;
      height: 105px;
    }

    /* Font semibold */
    .max-w-md .cursor-pointer .justify-center .font-semibold {
      position: relative;
      top: -31px;
      padding-top: 1px !important;
      color: #935600;
    }

    .max-w-md .embassy-card a {
      min-height: 115px;
    }

    /* Universal Tooltip Styles */
    .universal-tooltip {
      position: fixed;
      background-color: rgba(0, 0, 0, 0.9);
      color: #ffffff;
      padding: 12px 10px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 500;
      white-space: normal;
      max-width: 250px;
      word-wrap: break-word;
      pointer-events: none;
      /* Make click-through so it doesn't block interactions */
      z-index: 10000;
      transform: translateX(-50%) translateY(-10px);
      opacity: 0;
      transition: opacity 0.3s ease, transform 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(4px);
      text-align: center;
      line-height: 1.4;
    }

    .universal-tooltip::after {
      content: '';
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      border-left: 6px solid transparent;
      border-right: 6px solid transparent;
      border-top: 6px solid rgba(0, 0, 0, 0.9);
    }

    .universal-tooltip.show {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }
  </style>
  {{-- ===== TIME UPDATE SCRIPT ===== --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
            const czTimezone = '{{ $primary->timezone ?? 'Europe/Prague' }}';
            const indTimezone = '{{ $secondary->timezone ?? 'Asia/Kolkata' }}';

            function updateMobileTime() {
                const now = new Date();
                const timeOpts = {
                    hour12: true,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                };
                const dateOpts = {
                    weekday: 'short',
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                };

                try {
                    // CZE
                    const czTime = now.toLocaleTimeString('en-US', {
                        ...timeOpts,
                        timeZone: czTimezone
                    });
                    const czDate = now.toLocaleDateString('en-US', {
                        ...dateOpts,
                        timeZone: czTimezone
                    });
                    ['mobile-cze-time', 'modal-cze-time'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.textContent = czTime;
                    });
                    ['mobile-cze-date', 'modal-cze-date'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.textContent = czDate;
                    });

                    // India
                    const indTime = now.toLocaleTimeString('en-US', {
                        ...timeOpts,
                        timeZone: indTimezone
                    });
                    const indDate = now.toLocaleDateString('en-US', {
                        ...dateOpts,
                        timeZone: indTimezone
                    });
                    ['mobile-ind-time', 'modal-ind-time'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.textContent = indTime;
                    });
                    ['mobile-ind-date', 'modal-ind-date'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.textContent = indDate;
                    });
                } catch (e) {
                    console.error('Time update error:', e);
                }
            }

            updateMobileTime();
            setInterval(updateMobileTime, 1000);
        });
    function showToolTip(arg1, arg2, arg3) {
        let eventObj, key, text;
        if (typeof arg1 === 'object' && arg1 !== null) {
            eventObj = arg1;
            key = arg2;
            text = arg3;
        } else {
            eventObj = window.event;
            key = arg1;
            text = arg2;
        }

        if (!text) return;

        // Remove any existing tooltip with the same key
        const existingTooltip = document.getElementById(`tooltip-${key}`);
        if (existingTooltip) {
            existingTooltip.remove();
        }

        // Create tooltip container
        const tooltip = document.createElement('div');
        tooltip.id = `tooltip-${key}`;
        tooltip.className = 'universal-tooltip';
        // Replace \n with <br> for multiline support
        tooltip.innerHTML = text.replace(/\n/g, '<br>');
        document.body.appendChild(tooltip);

        // Get the element that triggered the tooltip
        const triggerElement = eventObj ? (eventObj.currentTarget || eventObj.target) : null;
        if (!triggerElement) return;

        const rect = triggerElement.getBoundingClientRect();

        // Position the tooltip above the element
        const tooltipHeight = tooltip.offsetHeight;
        const topPosition = rect.top - tooltipHeight - 10; // 10px gap
        const leftPosition = rect.left + rect.width / 2;

        tooltip.style.top = topPosition + 'px';
        tooltip.style.left = leftPosition + 'px';

        // Add show class for animation
        requestAnimationFrame(() => {
            tooltip.classList.add('show');
        });

        // Hide tooltip on mouseout
        function hideTooltip() {
            tooltip.classList.remove('show');
            setTimeout(() => {
                if (tooltip.parentNode) {
                    tooltip.remove();
                }
            }, 200);
            triggerElement.removeEventListener('mouseout', hideTooltip);
        }

        triggerElement.addEventListener('mouseout', hideTooltip);
    }
        function showComingSoonToast(message = "Coming Soon...") {
            const modalHTML = `
                <div class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-black/50" id="comingSoonModal" onclick="if(event.target===this){this.remove();document.body.style.overflow=''}">
                    <div class="bg-white rounded-xl shadow-xl max-w-sm w-full p-6 text-center">
                        <div class="text-4xl mb-3">ℹ️</div>
                        <p class="text-gray-700 font-medium">${message}</p>
                        <button onclick="this.closest('#comingSoonModal').remove();document.body.style.overflow=''" class="mt-4 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm font-medium transition-colors">OK</button>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            document.body.style.overflow = 'hidden';
        }
  </script>

        <script id="jquery-core-js" src="https://preview.lsvr.sk/townpress/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
            type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        {!! $portal['footer_scripts'] ?? '' !!}
</x-layout.portal.country_base>
