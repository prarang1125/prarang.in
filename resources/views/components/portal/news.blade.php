<div class="news-widget-container overflow-hidden transition-shadow duration-300">
    <style>
        /* Widget Title */
        #left-news-widget h3 {
            margin-bottom: 0px !important;
            top: 10px;

        }

        /* Widget Title */
        #right-news-widget h3 {
            margin-bottom: 0px !important;
            top: 12px;
        }

        /* Widget */
        #right-news-widget {
            padding-bottom: 12px;
        }



        #left-news-list li {
            margin-bottom: 0px;
        }

        /* Items center */
        #left-news-list .block .items-center {
            margin-bottom: -10px !important;
        }

        /* Widget Title */
        .lsvr-grid .columns__sidebar .container-fluid #sidebar-left .sidebar-left__inner #left-news-widget h3 {
            margin-bottom: 15px !important;
        }



        #right-news-list li {
            margin-bottom: 0px;
        }

        /* Items center */
        #right-news-list .block .items-center {
            margin-bottom: -10px !important;
        }

        /* Widget Title */
        .lsvr-grid .columns__sidebar .container-fluid #sidebar-right .sidebar-right__inner #right-news-widget h3 {
            margin-bottom: 15px !important;
        }
    </style>
    @if ($error)
        <div class="p-3 text-center">
            <p class="text-[10px] text-gray-400 italic">{{ $error }}</p>
        </div>
    @else
        <div class="h-[400px] overflow-hidden relative group" id="{{ $side }}-news-viewport">
            <ul id="{{ $side }}-news-list"
                class="absolute top-0 left-0 w-full transition-transform duration-700 cubic-bezier(0.4, 0, 0.2, 1) list-none m-0 p-0">
                @foreach ($newsItems as $news)
                    <li
                        class="px-3 py-2 border-b border-gray-50 hover:bg-slate-50 transition-colors group/item relative">
                        <a class="block no-underline" href="{{ $news['link'] }}" target="_blank">
                            <div class="flex flex-col gap-0.5">
                                <h5
                                    class="text-[13px] font-bold text-slate-800 group-hover/item:text-blue-600 transition-colors leading-tight line-clamp-2">
                                    {{ $news['title'] }}
                                </h5>
                                <div class="flex items-center gap-2">
                                    <span class="text-[9px] font-medium text-slate-400 uppercase tracking-tighter">
                                        {{ $news['date'] }}
                                    </span>
                                </div>
                                @if (!empty($news['description']))
                                    <p
                                        class="text-[10px] text-slate-500 line-clamp-1 leading-tight mt-0.5 opacity-0 group-hover/item:opacity-100 transition-opacity duration-300">
                                        {{ \Illuminate\Support\Str::limit($news['description'], 100) }}
                                    </p>
                                @endif
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const viewport = document.getElementById("{{ $side }}-news-viewport");
            const newsList = document.getElementById("{{ $side }}-news-list");
            if (!newsList || newsList.children.length === 0) return;

            let isPaused = false;
            let currentPosition = 0;
            const scrollStep = newsList.children[0].offsetHeight;
            const viewportHeight = viewport.offsetHeight;
            const totalHeight = newsList.scrollHeight;

            // Pause on hover
            viewport.addEventListener('mouseenter', () => isPaused = true);
            viewport.addEventListener('mouseleave', () => isPaused = false);

            function autoScrollNews() {
                if (isPaused || totalHeight <= viewportHeight) return;

                currentPosition += scrollStep;

                if (currentPosition >= totalHeight - (scrollStep * 1)) {
                    // Smooth reset
                    newsList.style.transition = 'none';
                    currentPosition = 0;
                    newsList.style.transform = `translateY(0)`;
                    // Force reflow
                    newsList.offsetHeight;
                    newsList.style.transition = 'transform 700ms cubic-bezier(0.4, 0, 0.2, 1)';
                } else {
                    newsList.style.transform = `translateY(-${currentPosition}px)`;
                }
            }

            // Start auto-scrolling
            if (totalHeight > viewportHeight) {
                setInterval(autoScrollNews, 4500);
            }
        });
    </script>
</div>
