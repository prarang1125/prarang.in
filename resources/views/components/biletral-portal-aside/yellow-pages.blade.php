<div class="yellow-pages-card">
    @if(count($ypData) > 1)
        <a href="{{ $ypData[1] }}" target="_blank"
            class="flex flex-col items-center justify-center py-4 px-3 bg-yellow-50 hover:bg-yellow-100 border border-yellow-200 rounded-lg transition-colors text-center gap-1.5 shadow-sm"
            style="background-image: url('https://meerutrang.in/images/yellow-pages-row.png'); background-repeat: no-repeat; background-size: cover;">
            <div class="text-[11px] font-bold text-yellow-900 leading-tight uppercase tracking-tight">{{ $ypData[0] }}</div>
            <div class="text-[9px] text-yellow-700/70 font-semibold">Yellow Pages</div>
        </a>
    @else
        <x-ui.modal id="yellow-pages-{{ $side }}-modal">
            <x-slot name="title">Yellow Pages</x-slot>
            <x-slot name="button">
                <div class="w-full flex flex-col items-center justify-center py-4 px-3 bg-yellow-50 hover:bg-yellow-100 border border-yellow-200 rounded-lg transition-colors text-center gap-1.5 shadow-sm"
                    style="background-image: url('https://meerutrang.in/images/yellow-pages-row.png'); background-repeat: no-repeat; background-size: cover;">
                    <div class="text-[11px] font-bold text-yellow-900 leading-tight uppercase tracking-tight">{{ $ypData[0] ?? 'Yellow Pages' }}</div>
                    <div class="text-[9px] text-yellow-700/70 font-semibold">Yellow Pages</div>
                </div>
            </x-slot>
            <div class="p-2">
                 <p class="text-sm text-gray-600 mb-6 text-center">
                    Free listing of products and services of <strong>{{ $ypData[0] ?? "" }}</strong>.
                    <br><br>
                    Thank you for your interest. However, the registration has not yet been activated. We await a business facilitation partner.
                </p>
                <div class="flex flex-col gap-3">
                    <a href="https://www.prarang.in/partners" target="_blank"
                        class="block w-full py-3 px-4 bg-amber-400 hover:bg-amber-500 text-black font-bold rounded-lg shadow transition-all text-center text-xs">
                        Prarang Country Partnerships
                    </a>
                    <a href="https://www.prarang.in/yp/czech-republic" target="_blank"
                        class="block w-full py-3 px-4 bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold rounded-lg border transition-all text-center text-xs">
                        Example - Czech Republic companies in India
                    </a>
                </div>
            </div>
        </x-ui.modal>
    @endif
</div>
