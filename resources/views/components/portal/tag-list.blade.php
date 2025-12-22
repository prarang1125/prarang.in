<div>
    <section class="py-6 px-1">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- CULTURE (संस्कृति) SECTION --}}
            <div class="space-y-4">
                {{-- Main Category Card --}}
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col items-center py-6">
                    <h2 class="text-2xl font-black text-gray-800 mb-2">{{ $locale['culture'] ?? 'संस्कृति' }}</h2>
                    <div class="bg-[#2563eb] text-white text-lg font-bold px-8 py-1.5 rounded-md shadow-sm mb-4">
                        {{ $tagCounts['culture_count'] }}
                    </div>
                    {{-- Color Bars --}}
                    <div class="flex w-3/4 h-8">
                        <div class="flex-1 bg-[#ef4444]"></div>
                        <div class="flex-1 bg-[#fef08a]"></div>
                        <div class="flex-1 bg-[#0000ff]"></div>
                    </div>
                </div>

                {{-- Sub Tags List (Culture) --}}
                <div class="space-y-3">
                    @php
                        $cultureTags = [
                            [
                                'icon' => 'samay-sima.png',
                                'label' => $locale['categories']['1'] ?? 'समय - सीमा',
                                'count' => $tagCounts['timeline_count'],
                                'target' => 'tagModaltag_1',
                            ],
                            [
                                'icon' => 'manav-wa-indirya.png',
                                'label' =>
                                    $locale['categories']['2'] ??
                                    'मानव व उनकी
                    इन्द्रियाँ',
                                'count' => $tagCounts['man_senses_count'],
                                'target' => 'tagModaltag_2',
                            ],
                            [
                                'icon' => 'manav-wa-awishkar.png',
                                'label' => $locale['categories']['3'] ?? 'मानव व उसके आविष्कार',
                                'count' => $tagCounts['man_inventions_count'],
                                'target' => 'tagModaltag_3',
                            ],
                        ];
                    @endphp
                    @foreach ($cultureTags as $t)
                        <div onclick="openTagModal('{{ $t['target'] }}')"
                            class="bg-white rounded-xl border border-gray-100 shadow-sm p-3 flex items-center gap-4 cursor-pointer hover:bg-gray-50 transition-colors">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                                <img src="{{ asset('assets/images/icons/culture/' . $t['icon']) }}"
                                    class="w-7 h-7 object-contain opacity-70">
                            </div>
                            <span
                                class="flex-grow font-bold text-gray-700 text-sm md:text-base">{{ $t['label'] }}</span>
                            <div
                                class="bg-[#2563eb] text-white text-sm font-bold w-16 py-2 rounded-md text-center shadow-sm">
                                {{ $t['count'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- NATURE (प्रकृति) SECTION --}}
            <div class="space-y-4">
                {{-- Main Category Card --}}
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col items-center py-6">
                    <h2 class="text-2xl font-black text-gray-800 mb-2">{{ $locale['nature'] ?? 'प्रकृति' }}</h2>
                    <div class="bg-[#2563eb] text-white text-lg font-bold px-8 py-1.5 rounded-md shadow-sm mb-4">
                        {{ $tagCounts['nature_count'] }}
                    </div>
                    {{-- Color Bars --}}
                    <div class="flex w-3/4 h-8">
                        <div class="flex-1 bg-[#fef08a]"></div>
                        <div class="flex-1 bg-[#bef264]"></div>
                        <div class="flex-1 bg-[#22c55e]"></div>
                    </div>
                </div>

                {{-- Sub Tags List (Nature) --}}
                <div class="space-y-3">
                    @php
                        $natureTags = [
                            [
                                'icon' => 'bhugol.png',
                                'label' => $locale['categories']['4'] ?? 'भूगोल',
                                'count' => $tagCounts['geography_count'],
                                'target' => 'tagModaltag_4',
                            ],
                            [
                                'icon' => 'jiw-jantu.png',
                                'label' => $locale['categories']['5'] ?? 'जीव - जन्तु',
                                'count' => $tagCounts['fauna_count'],
                                'target' => 'tagModaltag_5',
                            ],
                            [
                                'icon' => 'vanaspati.png',
                                'label' => $locale['categories']['6'] ?? 'वनस्पति',
                                'count' => $tagCounts['flora_count'],
                                'target' => 'tagModaltag_6',
                            ],
                        ];
                    @endphp
                    @foreach ($natureTags as $t)
                        <div onclick="openTagModal('{{ $t['target'] }}')"
                            class="bg-white rounded-xl border border-gray-100 shadow-sm p-3 flex items-center gap-4 cursor-pointer hover:bg-gray-50 transition-colors">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                                <img src="{{ asset('assets/images/icons/nature/' . $t['icon']) }}"
                                    class="w-7 h-7 object-contain opacity-70">
                            </div>
                            <span
                                class="flex-grow font-bold text-gray-700 text-sm md:text-base">{{ $t['label'] }}</span>
                            <div
                                class="bg-[#2563eb] text-white text-sm font-bold w-16 py-2 rounded-md text-center shadow-sm">
                                {{ $t['count'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    @foreach ($tagSubCounts as $tagid => $tagCArray)
        <!-- Modal -->
        <div id="tagModal{{ $tagid }}"
            class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4 overflow-y-auto"
            onclick="if(event.target == this) closeTagModal('tagModal{{ $tagid }}')">

            <div
                class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all animate__animated animate__zoomIn animate__faster my-auto">
                <div class="border-b border-gray-100 px-8 py-6 flex items-center justify-between">
                    <h5 class="font-black text-2xl text-gray-800">
                        {{ $locale['categories'][$tagid] ?? '' }}
                    </h5>
                    <button type="button" onclick="closeTagModal('tagModal{{ $tagid }}')"
                        class="text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
                </div>
                <div class="p-1 bg-gray-50/50">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-1">
                        @foreach ($tagCArray as $tag)
                            <a target="_blank"
                                href="{{ route('post-archive', ['ids' => $tag->tagId, 'catg' => 'tags', 'name' => str_replace('/', ', ', $locale['tags'][$tag->tagId]), 'cityCode' => $citySlug]) }}"
                                class="group bg-white  border border-gray-100 shadow-sm flex items-center gap-4 no-underline hover:border-blue-400 hover:shadow-md transition-all">
                                <div
                                    class="w-14 h-14 rounded-full bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors overflow-hidden">
                                    @if ($tag->tagIcon)
                                        <img src="{{ Storage::url($tag->tagIcon) }}" class="w-10 h-10 object-contain"
                                            alt="{{ $tag->tagInEnglish }}">
                                    @else
                                        <i class="fa fa-tags text-blue-400 text-xl"></i>
                                    @endif
                                </div>
                                <div class="flex-grow">
                                    <h6
                                        class="font-bold text-gray-800 m-0 group-hover:text-blue-600 transition-colors uppercase tracking-wide text-sm">
                                        {{ $locale['tags'][$tag->tagId] ?? $tag->tagInUnicode }}
                                    </h6>
                                </div>
                                <div
                                    class="bg-[#2563eb] text-white text-xs font-black min-w-[50px] py-1.5 px-2 rounded-lg text-center shadow-sm">
                                    {{ $tag->count }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="border-t border-gray-100 px-8 py-4 flex justify-end">
                    <button type="button" onclick="closeTagModal('tagModal{{ $tagid }}')"
                        class="bg-white hover:bg-gray-100 text-gray-700 font-bold px-8 py-2.5 rounded-xl transition-all shadow-sm border border-gray-200 uppercase text-xs tracking-widest">
                        {{ $locale['ui']['close'] ?? 'बंद करें' }}
                    </button>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function openTagModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeTagModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }
        }
    </script>
</div>
