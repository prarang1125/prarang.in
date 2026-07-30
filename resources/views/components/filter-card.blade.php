@props([
'title',
'image',
'model',
'selected' => null,
'options' => [],
'placeholder' => 'Choose...',
'disabled' => false,
'count' => null,
])
<div class="flex flex-col w-full p-1 transition-all duration-300 bg-white border-yellow-500 shadow-md border-1 rounded-xl group hover:-translate-y-1 hover:border-yellow-300 hover:shadow-2xl">
    <div class="flex flex-col items-center">
        <img
            src="{{ asset($image) }}"
            alt="{{ $title }}"
            class="object-contain transition-all duration-300 h-14 w-15 group-hover:scale-110">
        <h3 class="text-xs font-bold text-center leading-2 text-slate-800">
            {{ $title }}
        </h3>
        @if(!is_null($count))
        <p class="text-xs font-bold ">
            Total : {{ $count }}
        </p>
        @endif
        <div class="relative w-40 mb-1">
            <div
                x-data="{ open:false, search:'' }"
                class="relative w-full">
                <button
                    type="button"
                    @click="if(!{{ $disabled ? 'true':'false' }}) open=!open"
                    class="flex w-full items-center justify-between overflow-hidden rounded-md border border-yellow-400 bg-white transition {{ $disabled ? 'opacity-70 cursor-not-allowed bg-slate-100' : '' }}">
                    <span class="flex-1 px-3 py-1.5 text-xs font-medium text-left truncate text-slate-700">
                        {{ $selected ?: $placeholder }}
                    </span>
                    <span class="flex items-center self-stretch justify-center w-8 bg-yellow-400 border-l border-yellow-400">
                        <svg
                            class="w-4 h-4 transition-transform duration-200 text-slate-800"
                            :class="open ? 'rotate-180' : ''"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2.5"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div
                    x-show="open"
                    @click.away="open=false"
                    x-cloak
                    class="absolute z-50 w-full mt-1 overflow-hidden bg-white border border-yellow-300 rounded-md shadow-lg">
                    <div class="relative ">
                        <input
                            x-model="search"
                            type="text"
                            placeholder="Search..."
                            class="w-full py-2 pr-4 text-sm font-medium transition-all duration-200 border-none outline-none bg-slate-50 pl-9 focus:bg-white focus:ring-2 focus:ring-blue-100">
                    </div>
                    <div class="overflow-y-auto max-h-40 custom-scrollbar-premium">
                        @foreach($options as $item)
                        <button
                            type=" button"
                            x-show="'{{ strtolower($item->name) }}'.includes(search.toLowerCase())"
                            @click="$wire.set('{{ $model }}','{{ $item->id }}');open=false;search=''"
                            class="flex items-center w-full px-2 py-1 text-xs font-semibold text-left transition-all duration-200 border text-slate-700 hover:translate-x-1 hover:bg-blue-50 hover:text-blue-700">
                            {{ $item->name }}
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
