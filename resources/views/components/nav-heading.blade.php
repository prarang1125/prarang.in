@props([
    'text' => '',
    'rightImg' => '',
    'leftImg' => '',
])

<section class="bs5-top-heading mt-2 mb-4 flex gap-2 justify-center items-center">

    @if ($leftImg)
        <img class="h-8 w-8" src="{{ $leftImg }}" alt="">
    @endif
    <div class="text-dark text-xl md:text-2xl font-bold uppercase text-blue-500">
        {{ $text }}
    </div>
    @if ($rightImg)
        <img class="h-8 w-8" src="{{ $rightImg }}" alt="">
    @endif

</section>
