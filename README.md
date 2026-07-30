@if ($type === 'village')
<div class="flex items-center justify-center gap-3">

    <div class="relative w-16 h-16 shrink-0">
        <img
            src="{{ asset('assets/images/sticker.png') }}"
            alt="Sticker"
            class="w-full h-full">

        <span class="absolute inset-0 flex items-center justify-center text-xs font-extrabold text-red-700">
            592,765
        </span>
    </div>

    <h2 class="text-xl font-semibold tracking-tighter text-blue-800 md:text-xl">
        Rural India - Website of Websites
    </h2>

</div>
@else
<div class="flex items-center justify-center gap-3">

    <div class="relative w-16 h-16 shrink-0">
        <img
            src="{{ asset('assets/images/sticker.png') }}"
            alt="Sticker"
            class="w-full h-full">

        <span class="absolute inset-0 flex items-center justify-center text-xs font-extrabold text-red-700">
            6,331
        </span>
    </div>

    <h2 class="text-xl font-semibold tracking-tighter text-blue-800 md:text-xl">
        Urban India - Website of Websites
    </h2>

</div>
@endif






  <div class="relative">
                    <!-- Sticker -->
                    <div class="absolute z-20 -top-10 -right-8">
                        <div class="relative w-24 h-24">
                            <img
                                src="{{ asset('assets/images/sticker.png') }}"
                                alt="Sticker"
                                class="w-full h-full">

                            <!-- Number -->
                            @if ($type === 'town')
                            <div class="absolute inset-0 flex items-center justify-center -mt-3">
                                <span class="text-sm font-extrabold text-red-700">
                                    6,331
                                </span>
                            </div>
                            @else
                            <div class="absolute inset-0 flex items-center justify-center -mt-3">
                                <span class="text-sm font-extrabold text-red-700">
                                    592,765
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if ($type === 'village')
                    <div class="text-center ">
                        <h2 class="mt-1 text-xl font-semibold tracking-tighter text-blue-800 md:text-xl">
                            Rural India - Website of Websites

                        </h2>
                    </div>
                    @else

                    <div class="text-center ">

                        <h2 class="mt-2 text-xl font-semibold tracking-tighter text-blue-800 md:text-xl">
                            Urban India - Website of Websites

                        </h2>
                    </div>
                    @endif
                </div>
