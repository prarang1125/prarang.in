<div class="border border-gray-200 rounded-xl bg-white overflow-hidden">

    <button class="w-full px-5 py-3 font-semibold flex justify-between items-center hover:bg-gray-50"
        @click="openSection = openSection === '{{ $group['name'] }}' ? null : '{{ $group['name'] }}'">
        <div>
            <span>{{ $group['name'] }}</span>
            <div class="text-[11px] text-gray-400">
                {{ $type === 'india' ? 'शहर' : 'देश' }}: {{ count($group['items']) }}
            </div>
        </div>
        ▼
    </button>

    <div x-show="openSection === '{{ $group['name'] }}'" class="p-4 bg-gray-50 border-t">
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
            @foreach ($group['items'] as $item)
                <a target="_blank"
                    href="https://hindi.prarang.in/ai/{{ urlencode($type === 'india' ? $item['city_slug'] : $item['country_slug']) }}"
                    class="p-2  border border-blue-500 rounded-pill ">
                    {{ $type === 'india' ? $item['city'] : $item['country'] }}
                </a>
            @endforeach
        </div>
    </div>
</div>
