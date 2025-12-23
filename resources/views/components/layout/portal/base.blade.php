<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en_IN" />
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="article" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:site_name" content="{{ $portal->city_name ?? 'Prarang' }} Portal | Prarang" />

    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $portal->city_name ?? 'Default Title' }} Portal | Prarang" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ asset('assets/images/portal_meta_image.webp') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:description" content="{{ $portal->city_slogan ?? '' }}" />
    <title>{{ $portal->city_name ?? '' }} Portal | Prarang</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('assets/portal/css/style.css') }}" id="lsvr-townpress-demo-style-css" media="all"
        rel="stylesheet" type="text/css" />
    <link
        href="//fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C400italic%2C600%2C600italic%2C700%2C700italic&amp;ver=6.4.5"
        id="lsvr-townpress-google-fonts-css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {!! $portal->header_scripts ?? '' !!}
</head>

<body class="bg-no-repeat bg-fixed bg-cover bg-center"
    style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8) 100%)">
    <header class="px-5 py-4 ">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-4">

            <!-- Logo Section -->
            <div class="flex flex-col items-center">

                <img src="https://i.ibb.co/6c4JQSpJ/Prarang-logox.png" alt="Prarang Logo" class="h-[130px] w-[130px]">
            </div>

            <!-- Time Box -->
            <div
                class="hidden md:flex flex-col items-center justify-center bg-black text-white p-3 rounded-md border border-gray-700 w-48 shadow-lg">
                <div class="text-sm font-medium mb-1">{{ $portal->city_name_local ?? 'मेरठ' }} का समय</div>
                <div class="flex items-center gap-2 mb-1">
                    <i class="fa fa-clock-o text-white"></i>
                    <span class="text-lg font-bold" id="current-time">--:--:-- --</span>
                </div>
                <div class="flex items-center gap-2 text-[10px] opacity-80">
                    <i class="fa fa-calendar text-white text-[10px]"></i>
                    <span>{{ now()->translatedFormat('l, d F Y') }}</span>
                </div>
            </div>

            <!-- Title Box -->
            <div class="flex-grow flex items-center justify-center">
                <div class="bg-blue-600 text-white px-8 py-4 rounded-sm shadow-md text-center max-w-2xl">
                    <h2
                        class="text-xl md:text-2xl font-bold flex flex-wrap items-center justify-center gap-2 tracking-wide">
                        <sup><span class="text-sm font-normal">प्रारंग के</span></sup>
                        <span class="text-yellow-300">{{ $portal->city_name_local ?? '' }} रंग:</span>
                        <span>{{ $portal->city_name_local ?? '' }}वासियों की अपनी वेबसाइट</span>
                    </h2>
                </div>
            </div>

            <!-- Stats & Login Box -->
            <div class="flex flex-col gap-2 w-full md:w-72">
                <!-- Stats -->
                <div class="bg-black text-white p-1 px-2 rounded-md border border-gray-700 text-[11px] ">
                    <div class="flex justify-between">
                        <span>{{ $portal->city_name_local ?? 'मेरठ' }} स्थानीय सब्सक्राइबर:</span>
                        <span class="font-bold" id="city-subscriber-count">0</span>
                    </div>
                    <div class="flex justify-between border-t border-gray-800">
                        <span>मासिक {{ $portal->city_name_local ?? 'मेरठ' }} वेबपेज व्यू:</span>
                        <span class="font-bold " id="city-monthly-count">0</span>
                    </div>
                    <div class="flex justify-between border-t border-gray-800 ">
                        <span>आज के {{ $portal->city_name_local ?? 'मेरठ' }} पाठक:</span>
                        <span class="font-bold" id="city-daily-count">0</span>
                    </div>
                </div>
                <!-- Login Buttons -->
                <div class="flex gap-2 justify-center items-center">
                    <a target="_blank" href="https://b2b.prarang.in/login?lt=partner"
                        class="btn btn-yellow w-full bg-amber-400 p-1 rounded-sm shadow-md">Business Login</a>
                    <a target="_blank" href="https://b2b.prarang.in/login?lt=g2c"
                        class="btn btn-yellow w-full bg-amber-400 p-1 rounded-sm shadow-md">Govt. & NGO Login</a>
                </div>
            </div>
        </div>

        <script>
            function updateTime() {
                const now = new Date();
                const options = {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: true
                };
                document.getElementById('current-time').innerText = now.toLocaleTimeString('en-US', options).toLowerCase();
            }
            setInterval(updateTime, 1000);
            updateTime();
        </script>
    </header>


    {{ $slot }}

    {!! $portal->footer_scripts ?? ' ' !!}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const citySubscriberPlaceHolder = document.getElementById('city-subscriber-count');
            const cityMonthlyPlaceHolder = document.getElementById('city-monthly-count');
            const cityDailyPlaceHolder = document.getElementById('city-daily-count');

            // ---- Subscribers Count ----
            fetch('https://b2b.prarang.in/api/readers?city_code={{ $portal->city_code }}')
                .then(response => response.json())
                .then(data => {
                    const totalSubscribers =
                        Number(data.data.reader_info.a1) +
                        Number(data.data.reader_info.a2) +
                        Number(data.data.reader_info.a3);

                    animateCounter(citySubscriberPlaceHolder, totalSubscribers, 1500);
                })
                .catch(error => {
                    console.error('Error fetching portal stats:', error);
                });

            // ---- Daily Viewership ----
            const cityCode = @json($portal->city_code);

            const params = new URLSearchParams({
                client: "aarogya",
                language: "hi",
                location: cityCode,
                per_page: 10
            });

            fetch(`https://www.prarang.in/api/v1/daily-posts/list?${params.toString()}`, {
                    method: "GET",
                    headers: {
                        "Accept": "application/json"
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    const dailyViews = Number(data.data.viewership || 0);
                    animateCounter(cityDailyPlaceHolder, dailyViews, 1200);
                    animateCounter(cityMonthlyPlaceHolder, dailyViews * 78, 1400);
                })
                .catch(error => {
                    console.error("Error fetching daily posts:", error);
                });

            // ---- Monthly (example static / API later) ----
            // animateCounter(cityMonthlyPlaceHolder, 48230, 1400);
        });

        function animateCounter(element, target, duration = 1200) {
            let start = 0;
            const startTime = performance.now();

            function update(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const value = Math.floor(progress * target);
                element.textContent = value.toLocaleString('en-IN');

                if (progress < 1) {
                    requestAnimationFrame(update);
                }
            }

            requestAnimationFrame(update);
        }
    </script>

</body>


</html>
