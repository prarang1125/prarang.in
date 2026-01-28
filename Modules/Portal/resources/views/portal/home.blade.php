<x-layout.portal.base :portal="$portal">

    <section class="w-full px-4 py-8">
        <div class="container mx-auto flex flex-col lg:flex-row gap-8">
            {{-- Left Sidebar --}}
            <div class="w-full lg:w-3/12 bg-white/10 rounded order-2 lg:order-1">
                <nav aria-label="Main Menu" class="hidden lg:block bg-white rounded overflow-hidden">

                    <ul role="menu" class="flex flex-col  p-4 text-gray-800  bg-[#d83a1f]">

                        {{-- HOME --}}
                        <li role="presentation">
                            <a target="_blank" href="{{ route('portal', ['portal' => $portal->slug]) }}" role="menuitem"
                                class="flex items-center px-4 text-white  transition group">
                                <span class="uppercase tracking-wide">
                                    {{ $locale['ui']['home'] ?? 'HOME' }}
                                </span>
                            </a>
                        </li>

                        {{-- SEE ALL POSTS --}}
                        <li role="presentation">
                            <a target="_blank" href="{{ route('posts.city', ['city' => $portal->slug]) }}"
                                role="menuitem" class="flex items-center px-4  text-white  transition group">
                                <span class="uppercase tracking-wide">
                                    {{ $locale['ui']['see_all_posts'] ?? 'See All Posts' }}
                                </span>
                            </a>
                        </li>

                        {{-- DISTRICT METRICS --}}
                        <li role="presentation">
                            <a target="_blank" href="https://hindi.prarang.in/{{ $portal->city_name }}" role="menuitem"
                                class="flex items-center px-4  text-white  transition group">
                                <span class="uppercase tracking-wide">
                                    {{ $locale['ui']['district_metrics'] ?? 'District Metrics' }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="mt-6 px-4 bg-white p-3 rounded">
                    <h3 class="text-xl font-bold text-black mb-2">
                        <i class="fa fa-newspaper-o"></i>
                        {{-- {{ $portal->city_name }} NEWS/ {{ $portal->city_name_local }} --}}
                        {{-- {{ $locale['ui']['news_section'] ?? 'समाचार' }} --}}{{ $portal->city_name_local }} के
                        समाचार
                    </h3>
                    <x-portal.widgets.news :url="$portal->news_widget_code" />
                </div>

                <div class=" mt-6 bg-white rounded">

                    <x-portal.ai-pages />

                </div>

                <div class="mt-6 px-4 bg-white p-3 rounded">
                    @livewire('portal.books-links', ['books' => $portal->books, 'links' => $portal->links, 'cityName' => $portal->city_name, 'cityNameLocal' => $portal->city_name_local])
                </div>
            </div>

            {{-- Main Content --}}
            <div class="w-full lg:w-6/12 order-1 lg:order-2 space-y-6">
                <div class="relative overflow-hidden rounded-lg shadow-xl group">
                    <img src="{{ Storage::url($portal->header_image) }}" alt="Header Image" class="w-full h-auto ">
                    {{-- <div class="absolute bottom-0 left-0 w-full backdrop-blur py-1 text-center">
                        <h1 class="text-white text-sm md:text-sm font-extrabold px-6 drop-shadow-lg">
                            {!! $portal->city_slogan !!}
                        </h1>
                    </div> --}}
                </div>

                {{-- <div class="text-center py-5 rounded bg-black/50 text-2xl text-white font-bold shadow-md">
                    {!! $portal->city_slogan !!}
                </div> --}}
                {{-- MOBILE MENU --}}
                <nav aria-label="Main Menu" id="header-mobile-menu"
                    class="lg:hidden block bg-[#d83a1f] rounded overflow-hidden shadow-lg">
                    <ul role="menu" class="divide-y divide-white/10 text-white font-semibold text-base">
                        {{-- HOME --}}
                        <li role="presentation">
                            <a target="_blank" href="{{ route('portal', ['portal' => $portal->slug]) }}" role="menuitem"
                                class="block px-6 py-1 uppercase tracking-wide hover:bg-black/10 transition">
                                {{ $locale['ui']['home'] ?? 'HOME' }}
                            </a>
                        </li>

                        {{-- SEE ALL POSTS --}}
                        <li role="presentation">
                            <a target="_blank" href="{{ route('posts.city', ['city' => $portal->slug]) }}"
                                role="menuitem"
                                class="block px-6 py-1  uppercase tracking-wide hover:bg-black/10 transition">
                                {{ $locale['ui']['see_all_posts'] ?? 'See All Posts' }}
                            </a>
                        </li>

                        {{-- DISTRICT METRICS --}}
                        <li role="presentation">
                            <a target="_blank" href="https://hindi.prarang.in/{{ $portal->city_name }}" role="menuitem"
                                class="block px-6 py-1 uppercase tracking-wide hover:bg-black/10 transition">
                                {{ $locale['ui']['district_metrics'] ?? 'District Metrics' }}
                            </a>
                        </li>
                    </ul>
                </nav>

                {{-- END MOBILE MENU --}}
                <div class="bg-white p-2 rounded">
                    <x-portal.posts-carousel :cityId="$cityCode" :cityCode="$cityCode" :locale="$locale" />
                    <!-- TOWNPRESS SITEMAP : begin -->
                    <x-portal.tag-list :cityId="$cityCode" :cityCode="$cityCode" :citySlug="$portal->slug" :locale="$locale" />
                </div>


                <div class="flex gap-6 mt-2 mb-3 text-black">
                    <a target="_blank" href="https://hindi.prarang.in/{{ $portal->city_name }}"
                        class="flex-1 text-center bg-blue-500 text-white font-bold py-3 rounded-lg
               hover:bg-blue-600 transition-colors duration-200">
                        {{ $portal->city_name_local }}
                        {{ $locale['ui']['statistics'] ?? 'Statistics' }}
                    </a>

                    <a target="_blank" href="https://hindi.prarang.in/ai/{{ $portal->city_name }}"
                        class="flex-1 text-center bg-blue-500 text-white font-bold py-3 rounded-lg
               hover:bg-blue-600 transition-colors duration-200">
                        {{ $portal->city_name_local }} ए.आई. रिपोर्ट
                    </a>
                </div>


                <div class="py-3 bg-white p-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div
                            class="group relative bg-blue-500 p-8 shadow-xl hover:shadow-2xl transition-all duration-500  overflow-hidden">
                            <div class="absolute inset-0 opacity-30">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full blur-3xl opacity-50">
                                </div>
                                <div
                                    class="absolute bottom-0 left-0 w-24 h-24 bg-white rounded-full blur-2xl opacity-50">
                                </div>
                            </div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-center mb-6">
                                    <div>
                                        <h5 class="text-3xl text-center md:text-4xl font-extrabold text-white mb-2 ">
                                            बिज़नेस
                                            का यंत्र</h5>
                                        <p class="text-blue-50 text-sm md:text-base font-medium text-center">अपने
                                            बिज़नेस के
                                            लिए नए अवसर
                                            खोजें</p>
                                    </div>
                                </div>
                                <div class="space-y-4 mb-6">
                                    <a href="https://hindi.prarang.in/india/market-planner/states?city=-{{ $portal->city_id }}"
                                        target="_blank"
                                        class="block p-4 bg-white/20 backdrop-blur-sm rounded-xl hover:bg-white/30 transition-all duration-300 group/link border border-white/30 hover:border-white/50">
                                        <div class="flex items-center justify-between"><span
                                                class="text-white font-bold text-base md:text-lg group-hover/link:translate-x-1 transition-transform ">भारत
                                                में नए अवसर खोजें</span><span
                                                class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                        </div>
                                        <small>(शहरों का चयन करें)</small>
                                    </a><a href="https://hindi.prarang.in/world/market-planner?country=63"
                                        target="_blank"
                                        class="block p-4 bg-white/20 backdrop-blur-sm rounded-xl hover:bg-white/30 transition-all duration-300 group/link border border-white/30 hover:border-white/50">
                                        <div class="flex items-center justify-between"><span
                                                class="text-white font-bold text-base md:text-lg group-hover/link:translate-x-1 transition-transform">विश्व
                                                में नए अवसर खोजें</span><span
                                                class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                        </div>
                                        <small>(देशों का चयन करें)</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="group relative bg-green-600 p-8 shadow-xl hover:shadow-2xl transition-all duration-500  overflow-hidden">
                            <div class="absolute inset-0 opacity-30">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full blur-3xl opacity-50">
                                </div>
                                <div
                                    class="absolute bottom-0 left-0 w-24 h-24 bg-white rounded-full blur-2xl opacity-50">
                                </div>
                            </div>
                            <div class="relative z-10">
                                <div class="flex items-center justify-center mb-6">
                                    <div>
                                        <h5
                                            class="text-3xl md:text-4xl font-extrabold text-white mb-2 tracking-tight text-center">
                                            विकास
                                            का यंत्र</h5>
                                        <p class="text-green-50 text-sm md:text-base text-center font-medium">अपने
                                            शहर/देश
                                            की प्रगति की
                                            तुलना करें </p>
                                    </div>
                                </div>
                                <div class="space-y-4 mb-6">
                                    <a href="https://hindi.prarang.in/india/development-planners?city=-{{ $portal->city_id }}"
                                        target="_blank"
                                        class="block p-4 bg-white/20 backdrop-blur-sm rounded-xl hover:bg-white/30 transition-all duration-300 group/link border border-white/30 hover:border-white/50">
                                        <div class="flex items-center justify-between"><span
                                                class="text-white font-bold text-base md:text-lg group-hover/link:translate-x-1 transition-transform">भारत
                                                में विकास की तुलना</span><span
                                                class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                        </div>
                                        <small>(शहरों का चयन करें)</small>
                                    </a><a href="https://hindi.prarang.in/world/development-planner?country=63"
                                        target="_blank"
                                        class="block p-4 bg-white/20 backdrop-blur-sm rounded-xl hover:bg-white/30 transition-all duration-300 group/link border border-white/30 hover:border-white/50">
                                        <div class="flex items-center justify-between"><span
                                                class="text-white font-bold text-base md:text-lg group-hover/link:translate-x-1 transition-transform">विश्व
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
            <div class="w-full lg:w-3/12 order-3 lg:order-3">
                <div class="w-full bg-white border-t border-b border-gray-200 px-4 shadow-sm">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex items-center justify-center gap-8 md:gap-12">
                            <a href="https://www.facebook.com/prarang.in" target="_blank" rel="noopener noreferrer"
                                title="Facebook"
                                class="flex items-center justify-center transition-all duration-300 p-2 rounded-lg text-blue-600 hover:text-blue-700 hover:bg-blue-50">
                                <i class="fa fa-facebook-f text-2xl md:text-3xl"></i>
                            </a>
                            <a href="https://chat.whatsapp.com/HpjFX0qe7Du7q9fi3DQR7P" target="_blank"
                                rel="noopener noreferrer" title="WhatsApp"
                                class="flex items-center justify-center transition-all duration-300 p-2 rounded-lg text-green-500 hover:text-green-600 hover:bg-green-50">
                                <i class="fa fa-whatsapp text-2xl md:text-3xl"></i>
                            </a>
                            <a href="https://www.indusappstore.com/apps/news-and-magazines/prarang/com.riversanskiriti.prarang?page=details&amp;id=com.riversanskiriti.prarang"
                                target="_blank" rel="noopener noreferrer" title="Google Play"
                                class="flex items-center justify-center transition-all duration-300 p-2 rounded-lg text-red-600 hover:text-red-700 hover:bg-red-50">
                                <i class="fa fa-play-circle-o text-2xl md:text-3xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <livewire:portal.internate-data :city_code="$portal->city_code" :city_id="$portal->city_id" :city_name="$portal->city_name_local" />
                <div class="flex justify-center items-center p-2 w-full ">
                    {!! $portal->weather_widget_code !!}
                </div>
                <!-- Wrapper -->
                <div class="flex justify-center items-center p-2 w-full">
                    <!-- Open Button -->
                    <button type="button" onclick="openMapModal()"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded">
                        <i class="fa fa-map"></i> शहर का नक्शा
                    </button>
                </div>

                <!-- Modal Overlay -->
                <div id="mapModal"
                    class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                    <!-- Modal Box -->
                    <div class="bg-white w-full max-w-lg rounded-lg shadow-lg">
                        <!-- Header -->
                        <div class="flex justify-between items-center px-4 py-3 border-b">
                            <h3 class="text-lg font-semibold">Map</h3>
                            <button onclick="closeMapModal()"
                                class="text-gray-500 hover:text-gray-700 text-xl leading-none">
                                &times;
                            </button>
                        </div>

                        <!-- Body -->
                        <div class="p-4">
                            <div class=" bg-gray-100 flex items-center justify-center">
                                {!! $portal->map_link !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    @if (session('back_error'))
                        <div class="alert alert-warning shadow-lg">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.25L18.75 8.25L21.75 11.75L8.25 18.25Z" />
                                </svg>
                                <span>{{ session('back_error') }}</span>
                            </div>
                        </div>
                        @php
                            session()->forget('back_error');
                        @endphp
                        <a href="https://prarang.in/yp/{{ $portal->slug }}?p={{ $portal->slug }}" target="_blank"
                            class="relative block overflow-hidden rounded-lg group">

                            <!-- IMAGE -->
                            <img src="https://meerutrang.in/images/yellow-pages-row.png" alt="Login"
                                class="w-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" />

                            <!-- OVERLAY -->
                            <div class="absolute inset-0 "></div>

                            <!-- TEXT ON IMAGE -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-center z-10">
                                <h2 class="text-[36px] font-bold text-black drop-shadow-md">
                                    {{ $portal->city_name_local }} व्यवसाय
                                </h2>
                                <h4 class="text-sm font-semibold text-black mt-1 drop-shadow">
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
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
                {{-- About Section --}}
                <div class="space-y-4">
                    <h4 class="text-xl font-bold border-b-2 border-red-500 pb-2 inline-block md:block">
                        {{ $locale['ui']['about_prarang'] ?? 'About Prarang' }}
                    </h4>
                    <p class="text-sm leading-relaxed opacity-90">
                        {{ $locale['ui']['about_description'] ?? 'Prarang' }}
                    </p>
                </div>

                {{-- Social Links Section --}}
                <div class="space-y-6">
                    <h4 class="text-xl font-bold border-b-2 border-red-500 pb-2 inline-block md:block text-center">
                        Follow Us
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-xs mx-auto md:mx-0">
                        <a href="https://www.facebook.com/prarang.in" target="_blank"
                            class="flex items-center justify-center md:justify-start gap-3 p-3 bg-white/20 hover:bg-white/40 rounded-xl transition-all group backdrop-blur-sm border border-white/30 no-underline text-gray-800">
                            <i class="fa fa-facebook text-xl group-hover:scale-110 transition-transform"></i>
                            <span class="font-bold text-sm">Facebook</span>
                        </a>
                        {{-- <a href="javascript:void(0)" onclick="showComingSoon(event)"
                            class="flex items-center justify-center md:justify-start gap-3 p-3 bg-white/20 hover:bg-white/40 rounded-xl transition-all group backdrop-blur-sm border border-white/30 no-underline text-gray-800">
                            <img width="20"
                                src="https://images.freeimages.com/image/grids/9fe/x-twitter-light-grey-logo-5694251.png"
                                class="group-hover:scale-110 transition-transform">
                            <span class="font-bold text-sm text-gray-800">Twitter</span>
                        </a> --}}
                        <a href="https://www.instagram.com/prarang_in/?hl=en" target="_blank"
                            class="flex items-center justify-center md:justify-start gap-3 p-3 bg-white/20 hover:bg-white/40 rounded-xl transition-all group backdrop-blur-sm border border-white/30 no-underline text-gray-800">
                            <i class="fa fa-instagram text-xl group-hover:scale-110 transition-transform"></i>
                            <span class="font-bold text-sm">Instagram</span>
                        </a>
                        <a href="https://www.linkedin.com/company/indeur-prarang/" target="_blank"
                            class="flex items-center justify-center md:justify-start gap-3 p-3 bg-white/20 hover:bg-white/40 rounded-xl transition-all group backdrop-blur-sm border border-white/30 no-underline text-gray-800">
                            <i class="fa fa-linkedin text-xl group-hover:scale-110 transition-transform"></i>
                            <span class="font-bold text-sm">LinkedIn</span>
                        </a>
                    </div>
                </div>

                {{-- Address Section --}}
                <div class="space-y-4">
                    <h4 class="text-xl font-bold border-b-2 border-red-500 pb-2 inline-block md:block">
                        <i class="fa fa-map-marker me-2"></i> {{ $locale['ui']['address'] ?? 'Address' }}
                    </h4>
                    <div class="space-y-2 text-sm opacity-90">
                        <p class="flex items-start gap-2 justify-center md:justify-start">
                            <span class="font-bold text-red-600">Office:</span>
                            {{ $locale['ui']['office'] ?? 'Office' }}
                        </p>
                        <p class="flex items-start gap-2 justify-center md:justify-start">
                            <span class="font-bold text-red-600">Sector:</span>
                            {{ $locale['ui']['sector'] ?? 'Sector' }}
                        </p>
                        <p class="flex items-start gap-2 justify-center md:justify-start">
                            <span class="font-bold text-red-600">Phone:</span>
                            {{ $locale['ui']['phone'] ?? 'Phone' }}
                        </p>
                        <p class="flex items-start gap-2 justify-center md:justify-start">
                            <span class="font-bold text-red-600">Email:</span>
                            <a href="mailto:query@prarang.in"
                                class="hover:text-red-700 underline decoration-red-400">query@prarang.in</a>
                        </p>
                    </div>
                </div>
            </div>

            {{-- Copyright Section --}}
            <div class="mt-12 pt-8 border-t border-black/10 text-center">
                <p class="text-sm font-medium opacity-80">
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
