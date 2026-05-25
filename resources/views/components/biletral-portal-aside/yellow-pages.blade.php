<div class="yellow-pages-card">
    @if(count($ypData) > 1)
        <a href="{{ $ypData[1] }}" target="_blank"
            class="flex flex-col items-center justify-center py-4 px-3 border rounded-lg transition-colors text-center gap-1.5"
            style="background-color: #fefce8; border-color: #d97706; background-image: url('https://meerutrang.in/images/yellow-pages-row.png'); background-repeat: no-repeat; background-size: cover;">
            <div class="text-[13px] font-medium leading-tight tracking-wide" style="color: #78350f;">{{ $ypData[0] }}</div>
            <div class="text-[11px] font-medium" style="color: #92400e;">Yellow Pages</div>
            <div class="text-[10px] font-medium flex items-center gap-1" style="color: #b45309;">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                Visit listing
            </div>
        </a>
    @else
        <x-ui.modal id="yellow-pages-{{ $side }}-modal">
            <x-slot name="title">Yellow Pages</x-slot>
            <x-slot name="button">
                <div class="w-full flex flex-col items-center justify-center py-4 px-3 border rounded-lg transition-colors text-center gap-1.5"
                    style="background-color: #fefce8; border-color: #d97706; background-image: url('https://meerutrang.in/images/yellow-pages-row.png'); background-repeat: no-repeat; background-size: cover;">
                    <div class="text-[13px] font-medium leading-tight tracking-wide" style="color: #78350f;">{{ $ypData[0] ?? 'Yellow Pages' }}</div>
                    <div class="text-[11px] font-medium" style="color: #92400e;">Yellow Pages</div>
                </div>
            </x-slot>

            <div class="p-4">
                <p class="text-[13px] leading-relaxed text-gray-900 mb-1 text-center">
                    Free listing of products and services of <strong class="font-medium" style="color: #78350f;">{{ $ypData[0] ?? '' }}</strong>.
                </p>
                <p class="text-[12px] leading-relaxed text-gray-600 mb-5 text-center">
                    Registration not yet activated — we await a business facilitation partner.
                </p>

                <div class="flex flex-col gap-3">
                    <a href="https://www.prarang.in/partners" target="_blank"
                        class="flex items-center justify-center gap-2 w-full py-3 px-4 rounded-lg text-[13px] font-medium text-center transition-all"
                        style="background-color: #f59e0b; color: #1c1917;">

                        Prarang country partnerships
                    </a>
                    <a href="https://www.prarang.in/yp/czech-republic" target="_blank"
                        class="flex items-center justify-center gap-2 w-full py-3 px-4 bg-gray-100 hover:bg-gray-200 text-gray-900 rounded-lg border border-gray-300 text-[13px] font-medium text-center transition-all">

                        Example — Czech Republic companies
                    </a>
                </div>
            </div>
        </x-ui.modal>
    @endif
</div>
