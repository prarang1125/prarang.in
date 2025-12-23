<div class="p-2 m-1">
    <style>
        /* Heading */
        .m-1 .relative h2 {
            margin-bottom: 14px;
        }


        /* White */
        .w-full:nth-child(2) .lg\:flex-row .w-full:nth-child(1)>.bg-white:nth-child(4) {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* transform: translatex(0px) translatey(0px); */
            padding-top: 33px;
            height: 176px;
        }
    </style>
    {{-- Main Content --}}
    <div class="relative z-10">
        <h2 class="text-xl md:text-xl font-bold mb-8 text-center text-gray-800 tracking-tight">
            {{ $cityNameLocal }} का ज्ञानकोष
        </h2>

        {{-- Buttons --}}
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-12">
            @php
            $hasBooks = !empty($books) || !empty($e_books);
            $hasLinks = !empty($links);
            @endphp

            @if ($hasBooks)
            {{-- Books Button --}}
            <button onclick="openModal('booksModal')"
                class="group relative px-10 py-5 bg-blue-600 text-white font-bold text-lg rounded-2xl shadow-lg    overflow-hidden w-full">
                <div class="relative flex items-center justify-center gap-3">
                    <i class="fa fa-book text-2xl"></i>
                    <span>किताबें</span>
                    <i class="fa fa-arrow-right group-hover:translate-x-1 transition-transform "></i>
                </div>
            </button>
            @endif

            @if ($hasLinks)
            {{-- Links Button --}}
            <button onclick="openModal('linksModal')"
                class="group relative px-10 py-5 bg-yellow-500 text-white font-bold text-lg rounded-2xl shadow-lg    overflow-hidden w-full">
                <div class="relative flex items-center justify-center gap-3">
                    <i class="fa fa-link text-2xl"></i>
                    <span>वेबसाइट</span>
                    <i class="fa fa-arrow-right group-hover:translate-x-1 transition-transform "></i>
                </div>
            </button>
            @endif

            @if (!$hasBooks && !$hasLinks)
            <div
                class="text-center py-6 text-gray-500 italic bg-gray-50 rounded-xl w-full border border-dashed border-gray-200">
                ज्ञानकोश उपलब्ध नहीं है
            </div>
            @endif
        </div>
    </div>

    {{-- ================= BOOKS MODAL ================= --}}
    <div id="booksModal"
        class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-[9999] p-4"
        onclick="closeModal(event, 'booksModal')">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl h-[90vh] flex flex-col"
            onclick="event.stopPropagation()">

            {{-- Header --}}
            <div
                class="px-8 py-5 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-t-2xl flex items-center justify-between relative">
                <h3 class="text-2xl font-bold text-white text-center w-full">
                    {{ $cityNameLocal }} की किताबें
                </h3>
                <button onclick="closeModalDirect('booksModal')"
                    class="absolute right-6 text-white text-xl hover:rotate-90 transition">
                    ✕
                </button>
            </div>

            {{-- Content --}}
            <div class="px-8 py-6 overflow-y-auto flex-1 custom-scrollbar">
                @php $allBooks = array_merge($e_books, $books); @endphp
                @if (count($allBooks) > 0)
                <div class="space-y-8">
                    {{-- E-Books Section --}}
                    @if (count($e_books) > 0)
                    <div>
                        <h4 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-blue-200">डिजिटल
                            किताबें</h4>
                        <div class="space-y-3">
                            @foreach ($e_books as $index => $book)
                            <div
                                class="bg-white rounded-lg p-5 border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all duration-200">
                                <h5 class="font-bold text-lg text-gray-800 mb-3">{{ $index + 1 }}.
                                    {{ $book['name'] ?? '' }}</h5>
                                <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm text-gray-600">
                                    @if ($book['author'] ?? null)
                                    <span><span class="font-semibold text-gray-900">Author:</span>
                                        {{ $book['author'] }}</span>
                                    @endif
                                    @if ($book['publisher'] ?? null)
                                    <span><span class="font-semibold text-gray-900">Publisher:</span>
                                        {{ $book['publisher'] }}</span>
                                    @endif
                                    @if ($book['year'] ?? null)
                                    <span><span class="font-semibold text-gray-900">Year:</span>
                                        {{ $book['year'] }}</span>
                                    @endif
                                    @if ($book['tag'] ?? null)
                                    <span><span class="font-semibold text-gray-900">Tags:</span>
                                        {{ $book['tag'] }}</span>
                                    @endif
                                    @if ($book['link'] ?? null)
                                    <a href="{{ $book['link'] }}" target="_blank" rel="noopener noreferrer"
                                        class="text-blue-600 hover:text-blue-700 font-bold transition-all duration-200 flex items-center gap-1 hover:translate-x-1">
                                        <span class="hover:underline">पढ़ें</span>
                                        <i class="fa fa-external-link text-[10px]"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Physical Books Section --}}
                    @if (count($books) > 0)
                    <div class="mt-8">
                        <h4 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-blue-200">
                            प्रकाशित किताबें</h4>
                        <div class="space-y-3">
                            @foreach ($books as $index => $book)
                            <div
                                class="bg-white rounded-lg p-5 border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all duration-200">
                                <h5 class="font-bold text-lg text-gray-800 mb-3">{{ $index + 1 }}.
                                    {{ $book['name'] ?? '' }}</h5>
                                <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm text-gray-600">
                                    @if ($book['author'] ?? null)
                                    <span><span class="font-semibold text-gray-900">Writer:</span>
                                        {{ $book['author'] }}</span>
                                    @endif
                                    @if ($book['publisher'] ?? null)
                                    <span><span class="font-semibold text-gray-900">Publisher:</span>
                                        {{ $book['publisher'] }}</span>
                                    @endif
                                    @if ($book['publishing_year'] ?? null)
                                    <span><span class="font-semibold text-gray-900">Year:</span>
                                        {{ $book['publishing_year'] }}</span>
                                    @endif
                                    @if ($book['tag'] ?? null)
                                    <span><span class="font-semibold text-gray-900">Tags:</span>
                                        <span class="italic">{{ $book['tag'] }}</span></span>
                                    @endif
                                    @if ($book['link'] ?? null)
                                    <a href="{{ $book['link'] }}" target="_blank" rel="noopener noreferrer"
                                        class="text-blue-600 hover:text-blue-700 font-bold transition-all duration-200 flex items-center gap-1 hover:translate-x-1">
                                        <span class="hover:underline">पढ़ें</span>
                                        <i class="fa fa-external-link text-[10px]"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                @else
                <div class="text-center py-20 text-gray-400">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa fa-book text-4xl text-gray-300"></i>
                    </div>
                    <p class="text-lg font-medium tracking-tight">कोई पुस्तक उपलब्ध नहीं है</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ================= LINKS MODAL ================= --}}
    <div id="linksModal"
        class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-[9999] p-4"
        onclick="closeModal(event, 'linksModal')">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl h-[90vh] flex flex-col"
            onclick="event.stopPropagation()">

            {{-- Header --}}
            <div
                class="px-8 py-5 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-t-2xl flex items-center justify-between relative">
                <h3 class="text-2xl font-bold text-white text-center w-full">
                    {{ $cityNameLocal }} की वेबसाइट्स
                </h3>
                <button onclick="closeModalDirect('linksModal')"
                    class="absolute right-6 text-white text-xl hover:rotate-90 transition">
                    ✕
                </button>
            </div>

            <div class="px-8 py-6 overflow-y-auto flex-1 custom-scrollbar">
                @if (count($links) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($links as $category => $items)
                    @php $catIndex = $loop->index; @endphp
                    <div
                        class="group flex flex-col shadow-sm hover:shadow-md p-5 rounded-xl bg-gray-50/50 border border-gray-100 transition-all duration-200">
                        <div class="flex items-center gap-3 mb-4">
                            <div
                                class="w-1.5 h-8 rounded-full bg-gradient-to-b {{ $catIndex % 4 === 0 ? 'from-blue-500 to-blue-600' : ($catIndex % 4 === 1 ? 'from-green-500 to-green-600' : ($catIndex % 4 === 2 ? 'from-purple-500 to-purple-600' : 'from-orange-500 to-orange-600')) }}">
                            </div>
                            <h4
                                class="font-black text-lg uppercase tracking-tight {{ $catIndex % 4 === 0 ? 'text-blue-700' : ($catIndex % 4 === 1 ? 'text-green-700' : ($catIndex % 4 === 2 ? 'text-purple-700' : 'text-orange-700')) }}">
                                {{ $category }}
                            </h4>
                        </div>

                        <div class="space-y-2">
                            @foreach ($items as $item)
                            <div class="flex items-start gap-2 p-1.5 rounded-lg group/item transition-all duration-200">
                                @if ($item['url'] ?? null)
                                <a href="{{ $item['url'] }}" target="_blank" rel="noopener noreferrer"
                                    class="text-gray-700 hover:text-blue-600 font-bold transition-all duration-200 flex items-center gap-2 text-sm">
                                    <i class="fa fa-circle text-[6px] text-gray-400"></i>
                                    <span class="hover:underline">{{ $item['name'] }}</span>
                                    <i
                                        class="fa fa-external-link text-[10px] opacity-0 group-hover/item:opacity-100 transition-opacity"></i>
                                </a>
                                @else
                                <span class="text-gray-700 font-bold text-sm flex items-center gap-2">
                                    <i class="fa fa-circle text-[6px] text-gray-400"></i>
                                    {{ $item['name'] }}
                                </span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-20 text-gray-400">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa fa-link text-4xl text-gray-300"></i>
                    </div>
                    <p class="text-lg font-medium tracking-tight">कोई वेबसाइट उपलब्ध नहीं है</p>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>

{{-- ================= JS (ONLY THIS) ================= --}}
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal(event, id) {
        if (event.target.id === id) {
            closeModalDirect(id);
        }
    }

    function closeModalDirect(id) {
        document.getElementById(id).classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>