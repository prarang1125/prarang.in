<div class="important-links-list space-y-4">
    @if (!empty($data->important_links) && is_array($data->important_links))
        @foreach ($data->important_links as $key => $links)
            <div class="link-group">
                <h4 class="font-bold text-xs {{ $side === 'left' ? 'text-blue-700 border-blue-100' : 'text-orange-700 border-orange-100' }} uppercase tracking-wider mb-2 border-b pb-1">
                    {{ str_replace('_', ' ', $key) }}
                </h4>
                <ul class="grid grid-cols-1 gap-1">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link['url'] }}" target="_blank"
                                class="flex items-center gap-2 text-sm text-gray-700 hover:{{ $side === 'left' ? 'text-blue-600 bg-blue-50' : 'text-orange-600 bg-orange-50' }} p-2 rounded-lg transition-colors">
                                <i class="fa fa-external-link text-[10px] text-gray-400"></i>
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    @else
        <p class="text-gray-500 text-sm italic text-center py-4">No links available</p>
    @endif
</div>
