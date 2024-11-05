<div>
 
         <style>
        /* Set fixed height and enable overflow */
        .news-container {
            height: 400px;
            overflow: hidden;
            position: relative;
            border: 1px solid #ccc;
            padding: 10px;
        }

        /* Style for list inside the container */
        .news-container ul {
            /* list-style-type: none; */
            padding: 0;
            margin: 0;
            position: absolute;
            top: 0;
            transition: top 1s linear;
            font-weight: 600;
            font-size:12px;
        }

        .news-container li {
            margin-bottom: 10px;
        }
        .news-li:hover{
            background: #ed8c8c;
            color: darkblue;
        }
    </style>
  <div class="news-container">
    <ul id="news-list">
        @foreach ($newsItems as $news)
            <li class="border-bottom news-li ps-1">
                <a class="text-dark" href="{{ $news['link'] }}" target="_blank">{{ $news['title'] }}</a><br>
                <small>{{ \Illuminate\Support\Str::limit($news['description'], 150) }}</small>

            </li>
        @endforeach
    </ul>
</div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const newsList = document.getElementById("news-list");
            const listItemHeight = newsList.children[0].offsetHeight; // Height of one item
            const visibleItems = 4;
            const scrollStep = listItemHeight;
            let currentPosition = 0;

            function autoScrollNews() {
                const maxScrollHeight = newsList.scrollHeight - (listItemHeight * visibleItems);

                // Reset to the top if we’ve reached the end
                if (currentPosition >= maxScrollHeight) {
                    currentPosition = 0;
                } else {
                    // Scroll up by one item height
                    currentPosition += scrollStep;
                }

                newsList.style.top = `-${currentPosition}px`;
            }

            // Start auto-scrolling every 2 seconds
            setInterval(autoScrollNews, 4000);
        });
    </script>
</div>