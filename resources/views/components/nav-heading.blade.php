@props([
    'text' => '',
    'rightImg' => '',
    'leftImg' => '',
    'imageclass'=>null
])

<section class="bs5-top-heading mt-2 mb-4 flex gap-2 justify-center items-center {{ $imageclass ? 'mobile-align-center' : '' }}">

    @if ($leftImg)
        <img class="{{ $imageclass ?? 'h-8 w-8' }}" src="{{ $leftImg }}" alt="">
    @endif
    <div class="text-dark text-xl md:text-2xl font-bold uppercase text-blue-500">
        {{ $text }}
    </div>
    @if ($rightImg)
        <img class="{{ $imageclass ?? 'h-8 w-8' }}" src="{{ $rightImg }}" alt="">
    @endif

</section>
