<x-layout.main.base>
    <style>
        /* Overflow hidden */
        .flex-wrap .w-full .overflow-hidden {
            padding-top: 10px;
            padding-bottom: 4px;
            padding-right: 0px;
            padding-left: 0px;
            /* transform: translatex(0px) translatey(0px); */
            height: 266px;
            margin-bottom: 19px;
        }

        /* Image */
        .flex-wrap .w-full img {
            padding-bottom: 6px;
            min-height: 258px;
            height: 258px;
            margin-bottom: 20px;
        }

        /* Full */
        .mx-auto .flex-wrap .w-full {
            padding-top: 16px;
            padding-bottom: 28px;
        }

        .flex-wrap div .w-full {
            margin-top: 2px;
        }

        /* Heading */
        .flex-wrap div h2 {
            font-size: 16px;
        }

        /* Transition all */
        .flex-wrap div:nth-child(1) .transition-all {
            background-color: #255eed;
        }

        /* Tracking tight */
        .flex-wrap div:nth-child(1) .transition-all .tracking-tight {
            color: #ffffff;
        }

        /* Transition all */
        .flex-wrap div:nth-child(5) .transition-all {
            background-color: #e10e0e;
        }

        .flex-wrap div:nth-child(5) .tracking-tight {
            color: #ffffff;
        }

        /* Italic Tag */
        .flex-wrap .lg\:flex i {
            position: relative;
            top: -60px;
        }

        /* Cursor pointer (hover) */
        .flex-wrap a .cursor-pointer:hover {
            color: #00327f;
        }

        /* Text base (hover) */
        .flex-wrap a .text-base:hover {
            color: #2977e4;
        }

        /* Flex wrap */
        .container .mx-auto .flex-wrap {
            align-items: normal;
        }

        /* Font black */
        .flex-wrap .cursor-pointer .font-black {
            font-weight: 700;
            font-size: 16px;
        }

        /* Justify start */
        .flex-wrap div .justify-start {
            justify-content: center;
            align-items: center;
            padding-left: 2px !important;
        }
    </style>
    <section class="px-5 max-w-7xl mx-auto bg-gray-50/30 rounded-3xl my-10 ">


        <!-- Cards Section -->
        <div class="flex flex-wrap justify-center items-center gap-4 lg:gap-6">
            <div>
                <!-- City Webs Card -->
                <div
                    class="group border-[2px] border-gray-200 rounded p-8 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        City Webs
                    </h2>
                    <div id="cityWebsCard"
                        class="border-2 border-blue-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-blue-400 transition-colors">

                        <div onclick="showImage('{{ asset('assets/images/home/city-portal.jpg') }}')"
                            class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('assets/images/home/3.png') }}" alt="City Icon"
                                class=" object-contain drop-shadow-md">
                        </div>

                    </div>
                </div>
                <div class="flex w-full mt-6 text-center">
                    <a href="/city-webs" class="no-underline">
                        <div class="flex-1 cursor-pointer group/stat px-2"> <span
                                class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] block mb-1 group-hover/stat:text-blue-600 transition-colors">
                                Total</span>
                            <span class="text-base font-bold text-gray-800">India - 520</span>

                        </div>
                    </a>
                    <div class="w-px h-8 bg-gray-200 self-center"></div>
                    <div class="flex-1 cursor-pointer group/stat px-2">
                        <span
                            class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] block mb-1 group-hover/stat:text-blue-600 transition-colors">Live
                        </span>
                        {{-- <span class="text-2xl font-black text-blue-600">298</span> --}}
                        <a style="text-decoration: none" href="{{ route('home.india-city-webs') }}"> <span
                                class="text-2xl font-black text-blue-600">298</span></a>
                    </div>
                </div>
            </div>
            <!-- Arrow -->
            <div class="hidden lg:flex items-center justify-center text-4xl text-dark ">
                <i class="bi bi-arrow-right-circle-fill"></i>
            </div>

            <!-- Language Webs Card -->
            <div>
                <div style="background: #FFFF00;"
                    class="group border-[2px] border-gray-200 rounded-[2.5rem] p-8 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        Language Webs
                    </h2>
                    <div id="languageWebsCard"
                        class="border-2 border-yellow-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-yellow-400 transition-colors">

                        <div onclick="showImage('{{ asset('assets/images/home/language-portal.jpg') }}')"
                            class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('assets/images/home/1.png') }}" alt="Language Icon"
                                class=" object-contain drop-shadow-md">
                        </div>

                    </div>

                </div>
                <div class="flex w-full mt-6 text-center">
                    <a class="no-underline " href="/lang-webs">
                        <div class="flex-1 cursor-pointer group/stat px-2">
                            <span
                                class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] block mb-1 group-hover/stat:text-blue-600 transition-colors">Total</span>
                            <span class="text-base font-bold text-gray-800">178</span>
                        </div>
                    </a>
                    <div class="w-px h-8 bg-gray-200 self-center"></div>
                    <div class="flex-1 cursor-pointer group/stat px-2">
                        <span
                            class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] block mb-1 group-hover/stat:text-blue-600 transition-colors">Live
                        </span>
                        <div class="flex flex-col justify-start items-start ps-5">
                            <a class="no-underline" href="https://humsabek.in" target="_blank"><span
                                    class="text-md font-black text-blue-600">Hindi</span></a>
                            <a class="no-underline" href="/analytics" target="_blank"><span
                                    class="text-md font-black text-blue-600">English</span></a>
                            {{-- <span class="text-md font-black text-blue-600">Marathi</span> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Arrow -->
            <div class="hidden lg:flex items-center justify-center text-4xl text-dark">
                <i class="bi bi-arrow-left-circle-fill"></i>
            </div>

            <!-- Country Webs Card -->
            <div>
                <div
                    class="group border-[2px] border-gray-200 rounded-[2.5rem] p-8 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        Country Webs
                    </h2>
                    <div id="countryWebsCard"
                        class="border-2 border-red-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-red-400 transition-colors">
                        <div onclick="showImage('{{ asset('assets/images/home/country-portal.jpg') }}')"
                            class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('assets/images/home/2.png') }}" alt="Country Icon"
                                class="object-contain drop-shadow-md">
                        </div>
                    </div>
                </div>
                <div class="flex w-full mt-6 text-center">
                    <a href="/country-webs" class="no-underline">
                        <div class="flex-1 cursor-pointer group/stat px-2">
                            <span
                                class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] block mb-1 group-hover/stat:text-blue-600 transition-colors">Total</span>
                            <span class="text-base font-bold text-gray-800">195</span>
                        </div>
                    </a>
                    <div class="w-px h-8 bg-gray-200 self-center"></div>
                    <div class="flex-1 cursor-pointer group/stat px-2">
                        <span
                            class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] block mb-1 group-hover/stat:text-blue-600 transition-colors">Live
                        </span>
                        <div class="flex flex-col justify-start items-start ps-5">
                            <a class="no-underline" href="https://indiaczech.com" target="_blank"><span
                                    class="text-md font-black text-blue-600">Czech Rep.</span></a>
                            <span
                                onclick="setTimeout(() => {document.getElementById('nepal-click').innerHTML='Coming Soon'}, 1000)"
                                class="text-md font-black text-blue-600" id="nepal-click">Nepal</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Tooltips -->
    <div id="cityTooltip" class="custom-tooltip tooltip-blue">
        <h1 class="text-center">City Portal</h1>
        <img class="w-100 h-100 rounded" src="{{ asset('assets/images/home/city-portal.jpg') }}" alt="">
    </div>

    <div id="languageTooltip" class="custom-tooltip tooltip-yellow">
        <h1 class="text-center">Language Portal</h1>
        <img class="w-100 h-100 rounded" src="{{ asset('assets/images/home/language-portal.jpg') }}" alt="">
    </div>

    <div id="countryTooltip" class="custom-tooltip tooltip-red">
        <h1 class="text-center">Country Portal</h1>
        <img class="w-100 h-100 rounded" src="{{ asset('assets/images/home/country-portal.jpg') }}" alt="">
    </div>

    <style>
        .custom-tooltip {
            position: fixed;
            display: none;
            color: white;
            padding: 18px 24px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3),
                0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            pointer-events: none;
            max-width: 320px;
            opacity: 0;
            transform: scale(0.85);
            transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                left 0.08s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                top 0.08s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            will-change: left, top, transform, opacity;
        }

        .custom-tooltip.show {
            display: block;
            opacity: 1;
            transform: scale(1);
        }

        .custom-tooltip h1 {
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 10px 0;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .custom-tooltip p {
            font-size: 15px;
            margin: 0;
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.6;
        }

        /* Speech bubble arrow */
        .custom-tooltip::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 24px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            filter: drop-shadow(0 -2px 3px rgba(0, 0, 0, 0.1));
            transition: all 0.2s ease;
        }

        .custom-tooltip.tooltip-blue::before {
            border-bottom: 10px solid #667eea;
        }

        .custom-tooltip.tooltip-yellow::before {
            border-bottom: 10px solid #f7dc6f;
        }

        .custom-tooltip.tooltip-red::before {
            border-bottom: 10px solid #ef4444;
        }

        .custom-tooltip.arrow-bottom::before {
            top: auto;
            bottom: -10px;
            border-bottom: none;
            filter: drop-shadow(0 2px 3px rgba(0, 0, 0, 0.1));
        }

        .custom-tooltip.tooltip-blue.arrow-bottom::before {
            border-top: 10px solid #764ba2;
        }

        .custom-tooltip.tooltip-yellow.arrow-bottom::before {
            border-top: 10px solid #f0c419;
        }

        .custom-tooltip.tooltip-red.arrow-bottom::before {
            border-top: 10px solid #dc2626;
        }

        .custom-tooltip.arrow-left::before {
            left: 24px;
        }

        .custom-tooltip.arrow-right::before {
            left: auto;
            right: 24px;
        }

        /* Blue Tooltip (City Webs) */
        .tooltip-blue {
            background: linear-gradient(135deg, #255fec 0%, #1e4fd9 100%);
            box-shadow: 0 15px 40px rgba(37, 95, 236, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Yellow Tooltip (Language Webs) */
        .tooltip-yellow {
            background: linear-gradient(135deg, #ffd700 0%, #ffb700 100%);
            box-shadow: 0 15px 40px rgba(255, 215, 0, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Red Tooltip (Country Webs) */
        .tooltip-red {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            box-shadow: 0 15px 40px rgba(231, 76, 60, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Reusable tooltip handler function
            function initTooltip(cardId, tooltipId) {
                const card = document.getElementById(cardId);
                const tooltip = document.getElementById(tooltipId);

                if (!card || !tooltip) return;

                let tooltipOffset = 20;
                let isHovering = false;
                let animationFrameId = null;

                card.addEventListener('mouseenter', function() {
                    isHovering = true;
                    tooltip.classList.add('show');
                });

                card.addEventListener('mousemove', function(e) {
                    if (!isHovering) return;

                    // Cancel any pending animation frame
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                    }

                    // Use requestAnimationFrame for smooth updates
                    animationFrameId = requestAnimationFrame(() => {
                        const viewportWidth = window.innerWidth;
                        const viewportHeight = window.innerHeight;
                        const tooltipRect = tooltip.getBoundingClientRect();

                        let x = e.clientX + tooltipOffset;
                        let y = e.clientY + tooltipOffset;
                        let arrowPositionRight = false;

                        // Check if tooltip would overflow right edge
                        if (x + tooltipRect.width > viewportWidth - 10) {
                            x = e.clientX - tooltipRect.width - tooltipOffset;
                            arrowPositionRight = true;
                        }

                        // Check if tooltip would overflow bottom edge
                        if (y + tooltipRect.height > viewportHeight - 10) {
                            y = e.clientY - tooltipRect.height - tooltipOffset;
                            tooltip.classList.add('arrow-bottom');
                        } else {
                            tooltip.classList.remove('arrow-bottom');
                        }

                        // Ensure tooltip doesn't go off left edge
                        if (x < 10) {
                            x = 10;
                            arrowPositionRight = false;
                        }

                        // Ensure tooltip doesn't go off top edge
                        if (y < 10) {
                            y = 10;
                        }

                        // Update arrow position classes
                        if (arrowPositionRight) {
                            tooltip.classList.add('arrow-right');
                            tooltip.classList.remove('arrow-left');
                        } else {
                            tooltip.classList.add('arrow-left');
                            tooltip.classList.remove('arrow-right');
                        }

                        tooltip.style.left = x + 'px';
                        tooltip.style.top = y + 'px';
                    });
                });

                card.addEventListener('mouseleave', function() {
                    isHovering = false;
                    tooltip.classList.remove('show');

                    // Cancel any pending animation frame
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                        animationFrameId = null;
                    }
                });
            }

            // Initialize tooltips for all three cards
            initTooltip('cityWebsCard', 'cityTooltip');
            initTooltip('languageWebsCard', 'languageTooltip');
            initTooltip('countryWebsCard', 'countryTooltip');
        });

        get

        const showImage = (image) => {

            const url = new URL(image, window.location.origin);
            window.open(url.toString(), '_blank');
        }
    </script>
</x-layout.main.base>
