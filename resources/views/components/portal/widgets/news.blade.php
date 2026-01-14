<div class="news-widget">
    {{-- Modern News Container --}}
    <div class="h-[500px] overflow-hidden relative border border-gray-100 rounded-xl bg-white shadow-sm p-1">
        <ul id="news-list"
            class="absolute top-0 left-0 w-full transition-all duration-1000 ease-in-out list-none m-0 p-0">
            @foreach ($newsItems as $news)
                <li
                    class="p-4 border-b border-gray-50 hover:bg-blue-50/50 transition-colors cursor-pointer group last:border-0">
                    <a class="block no-underline" href="{{ $news['link'] }}" target="_blank">
                        <h5
                            class="text-sm font-bold text-gray-900 group-hover:text-blue-600 transition-colors leading-snug mb-1">
                            {{ $news['title'] }}
                        </h5>
                        <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">
                            {{ \Illuminate\Support\Str::limit($news['description'], 150) }}
                        </p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const newsList = document.getElementById("news-list");
            if (!newsList || newsList.children.length === 0) return;

            const firstItem = newsList.children[0];
            const listItemHeight = firstItem.offsetHeight;
            const visibleHeight = 400;
            let currentPosition = 0;

            function autoScrollNews() {
                const totalHeight = newsList.scrollHeight;

                // If the list is shorter than container, don't scroll
                if (totalHeight <= visibleHeight) return;

                // Adjust positioning
                if (currentPosition + visibleHeight >= totalHeight) {
                    currentPosition = 0;
                } else {
                    currentPosition += listItemHeight;
                }

                newsList.style.transform = `translateY(-${currentPosition}px)`;
            }

            // Start auto-scrolling every 4 seconds
            setInterval(autoScrollNews, 4000);
        });
    </script>
</div>
