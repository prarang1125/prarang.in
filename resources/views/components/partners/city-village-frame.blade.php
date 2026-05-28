{{-- layouts/partner-filter.blade.php --}}
<section id="cities-village-filter-main">
    <link rel="stylesheet" href="{{ asset('assets/css/partner-filter.css') }}">

    <div class="pf-panel">

        {{-- Sticky Header --}}
        <div class="pf-header flex flex-col items-center justify-center">
            @yield('p-header')
        </div>

        {{-- Scrollable Body --}}
        <div class="pf-body">
            {{ $slot }}
        </div>

        {{-- Sticky Footer --}}
        <div class="pf-footer">
            @yield('p-footer')
        </div>

    </div>
</section>
