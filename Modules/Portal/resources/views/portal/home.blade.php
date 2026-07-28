<x-layout.portal.base :portal="$portal" :isAdsEnable="$isAdsEnable">

    <section class="px-4 py-8 w-full">
        @if (session('back_error') || session('success') || session('error'))
        <div class="toast-top z-[9999] flex justify-center items-center m-5 p-3 toast toast-center" id="portal-toast">
            @if (session('back_error'))
            <div class="bg-yellow-400 shadow-2xl px-6 py-4 border-none min-w-[300px] font-bold text-black alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current w-6 h-6 shrink-0" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>{{ session('back_error') }}</span>
            </div>
            @endif

            @if (session('success'))
            <div class="bg-green-500 shadow-2xl px-6 py-4 border-none min-w-[300px] font-bold text-white alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current w-6 h-6 shrink-0" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            @if (session('error'))
            <div class="bg-red-500 shadow-2xl px-6 py-4 border-none min-w-[300px] font-bold text-white alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current w-6 h-6 shrink-0" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
            @endif
        </div>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('portal-toast');
                if (toast) {
                    toast.style.transition = 'all 0.5s ease';
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(-20px)';
                    setTimeout(() => toast.remove(), 500);
                }
            }, 5000);
        </script>
        @endif
        <div class="flex lg:flex-row flex-col gap-8 mx-auto container">
            {{-- Left Sidebar --}}
            <div class="order-2 lg:order-1 bg-white/10 rounded w-full lg:w-3/12">
                <nav aria-label="Main Menu" class="hidden lg:block bg-white rounded overflow-hidden">

                    <ul role="menu" class="flex flex-col bg-[#d83a1f] p-4 text-gray-800">

                        {{-- HOME --}}
                        <li role="presentation">
                            <a target="_blank" href="{{ route('portal', ['portal' => $portal->slug]) }}" role="menuitem"
                                class="group flex items-center px-4 text-white transition">
                                <span class="uppercase tracking-wide">
                                    {{ $locale['ui']['home'] ?? 'HOME' }}
                                </span>
                            </a>
                        </li>

                        {{-- SEE ALL POSTS --}}
                        <li role="presentation">
                            <a target="_blank" href="{{ route('posts.city', ['city' => $portal->slug]) }}"
                                role="menuitem" class="group flex items-center px-4 text-white transition">
                                <span class="uppercase tracking-wide">
                                    {{ $locale['ui']['see_all_posts'] ?? 'See All Posts' }}
                                </span>
                            </a>
                        </li>

                        {{-- DISTRICT METRICS --}}
                        <li role="presentation">
                            <a target="_blank" href="https://hindi.prarang.in/{{ $portal->analytics_name }}"
                                role="menuitem" class="group flex items-center px-4 text-white transition">
                                <span class="uppercase tracking-wide">
                                    {{ $locale['ui']['district_metrics'] ?? 'District Metrics' }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="bg-white mt-6 p-3 px-4 rounded">
                    <h3 class="mb-2 font-bold text-black text-xl">
                        <i class="fa fa-newspaper-o"></i>
                        {{ $locale['ui']['news_section'] ?? 'समाचार' }}
                    </h3>
                    <x-portal.widgets.news :url="$portal->news_widget_code" />
                </div>

                <div class="bg-white mt-6 rounded">

                    <x-portal.ai-pages />

                </div>

                <div class="bg-white mt-6 p-3 px-4 rounded">
                    @livewire('portal.books-links', ['books' => $portal->books, 'links' => $portal->links, 'cityName' =>
                    $portal->city_name, 'cityNameLocal' => $portal->city_name_local])
                </div>
            </div>

            {{-- Main Content --}}
            <div class="space-y-6 order-1 lg:order-2 w-full lg:w-6/12">
                <div class="group relative shadow-xl rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($portal->header_image) }}" alt="Header Image" class="w-full h-auto">
                    {{-- <div class="bottom-0 left-0 absolute backdrop-blur py-1 w-full text-center">
                        <h1 class="drop-shadow-lg px-6 font-extrabold text-white text-sm md:text-sm">
                            {!! $portal->city_slogan !!}
                        </h1>
                    </div> --}}
                </div>
                @if($isAdsEnable)
                <div class="">
                    <a href="{{ config('portal.ads.interaction.' . $portal->slug . '.url') }}" target="_blank">
                        <img

                            class="rounded"
                            src="{{ config('portal.ads.interaction.' . $portal->slug . '.image') }}"
                            alt="">
                    </a>
                </div>
                @endif
                {{-- <div class="bg-black/50 shadow-md py-5 rounded font-bold text-white text-2xl text-center">
                    {!! $portal->city_slogan !!}
                </div> --}}
                {{-- MOBILE MENU --}}
                <nav aria-label="Main Menu" id="header-mobile-menu"
                    class="lg:hidden block bg-[#d83a1f] shadow-lg rounded overflow-hidden">
                    <ul role="menu" class="divide-y divide-white/10 font-semibold text-white text-base">
                        {{-- HOME --}}
                        <li role="presentation">
                            <a target="_blank" href="{{ route('portal', ['portal' => $portal->slug]) }}" role="menuitem"
                                class="block hover:bg-black/10 px-6 py-1 uppercase tracking-wide transition">
                                {{ $locale['ui']['home'] ?? 'HOME' }}
                            </a>
                        </li>

                        {{-- SEE ALL POSTS --}}
                        <li role="presentation">
                            <a target="_blank" href="{{ route('posts.city', ['city' => $portal->slug]) }}"
                                role="menuitem"
                                class="block hover:bg-black/10 px-6 py-1 uppercase tracking-wide transition">
                                {{ $locale['ui']['see_all_posts'] ?? 'See All Posts' }}
                            </a>
                        </li>

                        {{-- DISTRICT METRICS --}}
                        <li role="presentation">
                            <a target="_blank" href="https://hindi.prarang.in/{{ $portal->analytics_name }}"
                                role="menuitem"
                                class="block hover:bg-black/10 px-6 py-1 uppercase tracking-wide transition">
                                {{ $locale['ui']['district_metrics'] ?? 'District Metrics' }}
                            </a>
                        </li>
                    </ul>
                </nav>

                {{-- END MOBILE MENU --}}
                <div class="bg-white p-2 rounded">
                    <x-portal.posts-carousel :cityId="$cityCode" :cityCode="$cityCode" :locale="$locale" />
                    <!-- TOWNPRESS SITEMAP : begin -->
                    <x-portal.tag-list :cityId="$cityCode" :cityCode="$cityCode" :citySlug="$portal->slug"
                        :locale="$locale" />
                </div>


                <div class="flex gap-6 mt-2 mb-3 text-black">
                    <a target="_blank" href="https://hindi.prarang.in/{{ $portal->analytics_name }}" class="flex-1 bg-blue-500 hover:bg-blue-600 py-3 rounded-lg font-bold text-white text-center transition-colors duration-200">
                        {{ $portal->city_name_local }}
                        {{ $locale['ui']['statistics'] ?? 'Statistics' }}
                    </a>

                    <a target="_blank" href="https://hindi.prarang.in/ai/{{ $portal->analytics_name }}" class="flex-1 bg-blue-500 hover:bg-blue-600 py-3 rounded-lg font-bold text-white text-center transition-colors duration-200">
                        {{ $portal->city_name_local }} ए.आई. रिपोर्ट
                    </a>
                </div>


                <div class="bg-white p-3 py-3">
                    <div class="gap-8 grid grid-cols-1 md:grid-cols-2">
                        <div
                            class="group relative bg-blue-500 shadow-xl hover:shadow-2xl p-8 overflow-hidden transition-all duration-500">
                            <div class="absolute inset-0 opacity-30">
                                <div class="top-0 right-0 absolute bg-white opacity-50 blur-3xl rounded-full w-32 h-32">
                                </div>
                                <div
                                    class="bottom-0 left-0 absolute bg-white opacity-50 blur-2xl rounded-full w-24 h-24">
                                </div>
                            </div>
                            <div class="z-10 relative">
                                <div class="flex justify-center items-center mb-6">
                                    <div>
                                        <h5 class="mb-2 font-extrabold text-white text-3xl md:text-4xl text-center">
                                            बिज़नेस
                                            का यंत्र</h5>
                                        <p class="font-medium text-blue-50 text-sm md:text-base text-center">अपने
                                            बिज़नेस के
                                            लिए नए अवसर
                                            खोजें</p>
                                    </div>
                                </div>
                                <div class="space-y-4 mb-6">
                                    <a href="https://hindi.prarang.in/india/market-planner/states?city=-{{ $portal->city_id }}"
                                        target="_blank"
                                        class="group/link block bg-white/20 hover:bg-white/30 backdrop-blur-sm p-4 border border-white/30 hover:border-white/50 rounded-xl transition-all duration-300">
                                        <div class="flex justify-between items-center"><span
                                                class="font-bold text-white text-base md:text-lg transition-transform group-hover/link:translate-x-1">भारत
                                                में नए अवसर खोजें</span><span
                                                class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                        </div>
                                        <small>(शहरों का चयन करें)</small>
                                    </a><a href="https://hindi.prarang.in/world/market-planner?country=63"
                                        target="_blank"
                                        class="group/link block bg-white/20 hover:bg-white/30 backdrop-blur-sm p-4 border border-white/30 hover:border-white/50 rounded-xl transition-all duration-300">
                                        <div class="flex justify-between items-center"><span
                                                class="font-bold text-white text-base md:text-lg transition-transform group-hover/link:translate-x-1">विश्व
                                                में नए अवसर खोजें</span><span
                                                class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                        </div>
                                        <small>(देशों का चयन करें)</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="group relative bg-green-600 shadow-xl hover:shadow-2xl p-8 overflow-hidden transition-all duration-500">
                            <div class="absolute inset-0 opacity-30">
                                <div class="top-0 right-0 absolute bg-white opacity-50 blur-3xl rounded-full w-32 h-32">
                                </div>
                                <div
                                    class="bottom-0 left-0 absolute bg-white opacity-50 blur-2xl rounded-full w-24 h-24">
                                </div>
                            </div>
                            <div class="z-10 relative">
                                <div class="flex justify-center items-center mb-6">
                                    <div>
                                        <h5
                                            class="mb-2 font-extrabold text-white text-3xl md:text-4xl text-center tracking-tight">
                                            विकास
                                            का यंत्र</h5>
                                        <p class="font-medium text-green-50 text-sm md:text-base text-center">अपने
                                            शहर/देश
                                            की प्रगति की
                                            तुलना करें </p>
                                    </div>
                                </div>
                                <div class="space-y-4 mb-6">
                                    <a href="https://hindi.prarang.in/india/development-planners?city=-{{ $portal->city_id }}"
                                        target="_blank"
                                        class="group/link block bg-white/20 hover:bg-white/30 backdrop-blur-sm p-4 border border-white/30 hover:border-white/50 rounded-xl transition-all duration-300">
                                        <div class="flex justify-between items-center"><span
                                                class="font-bold text-white text-base md:text-lg transition-transform group-hover/link:translate-x-1">भारत
                                                में विकास की तुलना</span><span
                                                class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                        </div>
                                        <small>(शहरों का चयन करें)</small>
                                    </a><a href="https://hindi.prarang.in/world/development-planner?country=63"
                                        target="_blank"
                                        class="group/link block bg-white/20 hover:bg-white/30 backdrop-blur-sm p-4 border border-white/30 hover:border-white/50 rounded-xl transition-all duration-300">
                                        <div class="flex justify-between items-center"><span
                                                class="font-bold text-white text-base md:text-lg transition-transform group-hover/link:translate-x-1">विश्व
                                                में विकास की तुलना</span><span
                                                class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                        </div>
                                        <small>(देशों का चयन करें)</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Sidebar --}}
            <div class="order-3 lg:order-3 w-full lg:w-3/12">
                <div class="bg-white shadow-sm px-4 border-gray-200 border-t border-b w-full">
                    <div class="mx-auto max-w-7xl">
                        <div class="flex justify-center items-center gap-8 md:gap-12">
                            <a href="https://www.facebook.com/prarang.in" target="_blank" rel="noopener noreferrer"
                                title="Facebook"
                                class="flex justify-center items-center hover:bg-blue-50 p-2 rounded-lg text-blue-600 hover:text-blue-700 transition-all duration-300">
                                <i class="text-2xl md:text-3xl fa fa-facebook-f"></i>
                            </a>
                            <a href="https://chat.whatsapp.com/HpjFX0qe7Du7q9fi3DQR7P" target="_blank"
                                rel="noopener noreferrer" title="WhatsApp"
                                class="flex justify-center items-center hover:bg-green-50 p-2 rounded-lg text-green-500 hover:text-green-600 transition-all duration-300">
                                <i class="text-2xl md:text-3xl fa fa-whatsapp"></i>
                            </a>
                            <a href="https://www.indusappstore.com/apps/news-and-magazines/prarang/com.riversanskiriti.prarang?page=details&amp;id=com.riversanskiriti.prarang"
                                target="_blank" rel="noopener noreferrer" title="Google Play"
                                class="flex justify-center items-center hover:bg-red-50 p-2 rounded-lg text-red-600 hover:text-red-700 transition-all duration-300">
                                <i class="text-2xl md:text-3xl fa fa-play-circle-o"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <livewire:portal.internate-data :city_code="$portal->city_code" :city_id="$portal->city_id"
                    :city_name="$portal->city_name_local" :city_slug="$portal->slug" />
                <div class="flex justify-center items-center p-2 w-full">
                    {!! $portal->weather_widget_code !!}
                </div>
                <!-- Wrapper -->
                <div class="flex justify-center items-center p-2 w-full">
                    <!-- Open Button -->
                    <button type="button" onclick="openMapModal()"
                        class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded font-medium text-white">
                        <i class="fa fa-map"></i> शहर का नक्शा
                    </button>
                </div>

                <!-- Modal Overlay -->
                <div id="mapModal" class="hidden z-50 fixed inset-0 justify-center items-center bg-black bg-opacity-50">
                    <!-- Modal Box -->
                    <div class="bg-white shadow-lg rounded-lg w-full max-w-lg">
                        <!-- Header -->
                        <div class="flex justify-between items-center px-4 py-3 border-b">
                            <h3 class="font-semibold text-lg">Map</h3>
                            <button onclick="closeMapModal()"
                                class="text-gray-500 hover:text-gray-700 text-xl leading-none">
                                &times;
                            </button>
                        </div>

                        <!-- Body -->
                        <div class="p-4">
                            <div class="flex justify-center items-center bg-gray-100">
                                {!! $portal->map_link !!}
                            </div>
                        </div>
                    </div>
                </div>

                @if (session('back_error') || session('success') || session('error'))
                <div class="toast-top z-[9999] toast toast-center" id="portal-toast">
                    @if (session('back_error'))
                    <div
                        class="bg-yellow-400 shadow-2xl px-6 py-4 border-none min-w-[300px] font-bold text-black alert">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current w-6 h-6 shrink-0" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>{{ session('back_error') }}</span>
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="bg-green-500 shadow-2xl px-6 py-4 border-none min-w-[300px] font-bold text-white alert">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current w-6 h-6 shrink-0" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="bg-red-500 shadow-2xl px-6 py-4 border-none min-w-[300px] font-bold text-white alert">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current w-6 h-6 shrink-0" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                    @endif
                </div>

                <script>
                    setTimeout(() => {
                        const toast = document.getElementById('portal-toast');
                        if (toast) {
                            toast.style.transition = 'all 0.5s ease';
                            toast.style.opacity = '0';
                            toast.style.transform = 'translateY(-20px)';
                            setTimeout(() => toast.remove(), 500);
                        }
                    }, 5000);
                </script>
                @endif

                <a href="https://prarang.in/yp/{{ $portal->slug }}?p={{ $portal->slug }}" target="_blank"
                    class="group block relative rounded-lg overflow-hidden">

                    <!-- IMAGE -->
                    <img src="https://meerutrang.in/images/yellow-pages-row.png" alt="Login"
                        class="w-full object-cover group-hover:scale-[1.02] transition-transform duration-300" />

                    <!-- OVERLAY -->
                    <div class="absolute inset-0"></div>

                    <!-- TEXT ON IMAGE -->
                    <div class="z-10 absolute inset-0 flex flex-col justify-center items-center text-center">
                        <h2 class="drop-shadow-md font-bold text-[36px] text-black">
                            {{ $portal->city_name_local }} व्यवसाय
                        </h2>
                        <h4 class="drop-shadow mt-1 font-semibold text-black text-sm">
                            हिंदी येलो पेज (Yellow Pages)
                        </h4>
                    </div>

                </a>
            </div>

        </div>
        </div>
    </section>

    <footer class="mt-32 px-6 py-12 text-gray-800"
        style="background-color: #FFB1A3; background-image: url('{{ Storage::url($portal->footer_image) }}'); background-size: cover; background-position: center;">
        <div class="mx-auto container">
            <div class="gap-12 grid grid-cols-1 md:grid-cols-3 md:text-left text-center">
                {{-- About Section --}}
                <div class="space-y-4">
                    <h4 class="md:block inline-block pb-2 border-red-500 border-b-2 font-bold text-xl">
                        {{ $locale['ui']['about_prarang'] ?? 'About Prarang' }}
                    </h4>
                    <p class="opacity-90 text-sm leading-relaxed">
                        {{ $locale['ui']['about_description'] ?? 'Prarang' }}
                    </p>
                </div>

                {{-- Social Links Section --}}
                <div class="space-y-6">
                    <h4 class="md:block inline-block pb-2 border-red-500 border-b-2 font-bold text-xl text-center">
                        Follow Us
                    </h4>
                    <div class="gap-4 grid grid-cols-1 md:grid-cols-2 mx-auto md:mx-0 max-w-xs">
                        <a href="https://www.facebook.com/prarang.in" target="_blank"
                            class="group flex justify-center md:justify-start items-center gap-3 bg-white/20 hover:bg-white/40 backdrop-blur-sm p-3 border border-white/30 rounded-xl text-gray-800 no-underline transition-all">
                            <i class="text-xl group-hover:scale-110 transition-transform fa fa-facebook"></i>
                            <span class="font-bold text-sm">Facebook</span>
                        </a>
                        {{-- <a href="javascript:void(0)" onclick="showComingSoon(event)"
                            class="group flex justify-center md:justify-start items-center gap-3 bg-white/20 hover:bg-white/40 backdrop-blur-sm p-3 border border-white/30 rounded-xl text-gray-800 no-underline transition-all">
                            <img width="20"
                                src="https://images.freeimages.com/image/grids/9fe/x-twitter-light-grey-logo-5694251.png"
                                class="group-hover:scale-110 transition-transform">
                            <span class="font-bold text-gray-800 text-sm">Twitter</span>
                        </a> --}}
                        <a href="https://www.instagram.com/prarang_in/?hl=en" target="_blank"
                            class="group flex justify-center md:justify-start items-center gap-3 bg-white/20 hover:bg-white/40 backdrop-blur-sm p-3 border border-white/30 rounded-xl text-gray-800 no-underline transition-all">
                            <i class="text-xl group-hover:scale-110 transition-transform fa fa-instagram"></i>
                            <span class="font-bold text-sm">Instagram</span>
                        </a>
                        <a href="https://www.linkedin.com/company/indeur-prarang/" target="_blank"
                            class="group flex justify-center md:justify-start items-center gap-3 bg-white/20 hover:bg-white/40 backdrop-blur-sm p-3 border border-white/30 rounded-xl text-gray-800 no-underline transition-all">
                            <i class="text-xl group-hover:scale-110 transition-transform fa fa-linkedin"></i>
                            <span class="font-bold text-sm">LinkedIn</span>
                        </a>
                    </div>
                </div>

                {{-- Address Section --}}
                <div class="space-y-4">
                    <h4 class="md:block inline-block pb-2 border-red-500 border-b-2 font-bold text-xl">
                        <i class="me-2 fa fa-map-marker"></i> {{ $locale['ui']['address'] ?? 'Address' }}
                    </h4>
                    <div class="space-y-2 opacity-90 text-sm">
                        <p class="flex justify-center md:justify-start items-start gap-2">
                            <span class="font-bold text-red-600">Office:</span>
                            {{ $locale['ui']['office'] ?? 'Office' }}
                        </p>
                        <p class="flex justify-center md:justify-start items-start gap-2">
                            <span class="font-bold text-red-600">Sector:</span>
                            {{ $locale['ui']['sector'] ?? 'Sector' }}
                        </p>
                        <p class="flex justify-center md:justify-start items-start gap-2">
                            <span class="font-bold text-red-600">Phone:</span>
                            {{ $locale['ui']['phone'] ?? 'Phone' }}
                        </p>
                        <p class="flex justify-center md:justify-start items-start gap-2">
                            <span class="font-bold text-red-600">Email:</span>
                            <a href="mailto:query@prarang.in"
                                class="hover:text-red-700 decoration-red-400 underline">query@prarang.in</a>
                        </p>
                    </div>
                </div>
            </div>

            {{-- Copyright Section --}}
            <div class="mt-12 pt-8 border-black/10 border-t text-center">
                <p class="opacity-80 font-medium text-sm">
                    {{ str_replace('{year}', date('Y'), $locale['ui']['copyright'] ?? 'All rights reserved') }}
                </p>
            </div>
        </div>
    </footer>
    <script>
        function openMapModal() {
            const modal = document.getElementById('mapModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeMapModal() {
            const modal = document.getElementById('mapModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

</x-layout.portal.base>
