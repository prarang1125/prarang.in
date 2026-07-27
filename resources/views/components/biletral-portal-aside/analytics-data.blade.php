@php
$items = [
['label' => 'Culture', 'type' => 'culture'],
['label' => 'Nature', 'type' => 'nature'],
['label' => 'Health', 'type' => 'health'],
['label' => 'Wealth', 'type' => 'wealth'],
['label' => 'Education', 'type' => 'edu'],
['label' => 'Work', 'type' => 'work'],
['label' => 'Media', 'type' => 'media'],
['label' => 'Urbanization', 'type' => 'urb'],
['label' => 'Governance', 'type' => 'gov'],
['label' => 'Internet', 'type' => 'int'],
['label' => 'Languages', 'type' => 'lang'],
['label' => 'Demography', 'type' => 'demo'],
];
@endphp

<div class="analytics-grid grid grid-cols-2 gap-2">
    @foreach($items as $item)
    <a href="{{ $getUrl($item['type']) }}" target="_blank"
        class="flex items-center justify-center py-3 px-2 bg-white hover:bg-teal-50 border border-gray-100 rounded-xl transition-all shadow-sm active:scale-95 group">
        <div class="flex flex-col items-center">
            <span class="text-xs font-bold text-gray-800 group-hover:text-teal-700 transition-colors">{{ $item['label']
                }}</span>
        </div>
    </a>
    @endforeach
</div>
