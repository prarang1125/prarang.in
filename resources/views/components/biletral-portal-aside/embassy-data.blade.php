<div class="embassy-card">
    @if (!empty($embassyLink))
    <a href="{{ $embassyLink }}" target="_blank"
        class="relative py-4 px-3 block {{ $side === 'left' ? 'bg-blue-50 hover:bg-blue-100 border-blue-200' : 'bg-orange-50 hover:bg-orange-100 border-orange-200' }} border rounded-lg transition-all text-center group">
        <div class="flex flex-col items-center gap-1">
            <i class="fa fa-building-o text-lg {{ $side === 'left' ? 'text-blue-600' : 'text-orange-600' }} mb-1"></i>
            <span class="text-xs font-bold {{ $side === 'left' ? 'text-blue-800' : 'text-orange-800' }}">{{
                $data->country_name }} Embassy</span>
            <span class="text-[10px] text-gray-500 font-medium flex items-center gap-1">
                Visit Website <i class="fa fa-external-link"></i>
            </span>
        </div>
    </a>
    @else
    <div class="relative py-4 px-3 bg-gray-50 border border-gray-200 rounded-lg text-center opacity-60">
        <div class="flex flex-col items-center gap-1">
            <i class="fa fa-building-o text-lg text-gray-400 mb-1"></i>
            <span class="text-xs font-bold text-gray-600">{{ $data->country_name }} Embassy</span>
            <span class="text-[10px] text-gray-400 font-medium">Link not available</span>
        </div>
    </div>
    @endif
</div>
