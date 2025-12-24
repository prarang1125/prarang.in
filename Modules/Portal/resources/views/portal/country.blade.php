<x-layout.portal.country-base :portal="$main">

    <div id="wrapper" class="relative">
        {{-- Header Section --}}
        <header class="w-full bg-white/90 backdrop-blur-sm shadow-md sticky top-0 z-[1000] px-6 py-3">
            <div class="container mx-auto flex items-center justify-between">
                <div class="header-logo">
                    <a aria-label="Site logo" class="block" href="{{ url()->current() }}">
                        <img alt="TownPress" class="h-16 w-auto" src="{{ asset('assets/images/logo2x.png') }}" />
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <a class="bg-[#d93a1e] text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-[#b22e18] transition font-bold"
                        href="{{ url($main->slug) }}/all-posts">
                        <i class="fa fa-map-marker"></i>
                        <span>All Posts</span>
                    </a>
                    <button type="button" class="lg:hidden text-gray-800 text-2xl" id="mobile-menu-toggle">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
        </header>

        {{-- Hero Background --}}
        <div class="fixed inset-0 z-[-1]">
            <div class="w-full h-full bg-cover bg-center bg-fixed"
                style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ Storage::url($main->header_image) }}');">
            </div>
        </div>

        {{-- Map Modal --}}
        <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-2xl shadow-2xl border-none">
                    <div class="modal-header bg-[#d93a1e] text-white border-none rounded-t-2xl px-6 py-4">
                        <h5 class="modal-title font-bold flex items-center gap-2" id="mapModalLabel">
                            <i class="fa fa-map-marker"></i> Country Maps
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <div class="mb-6">
                            <label class="block text-gray-700 font-bold mb-3 text-lg text-center">Select
                                Country:</label>
                            <div class="flex justify-center gap-8">
                                <label class="flex items-center gap-2 cursor-pointer group">
                                    <input class="form-check-input w-5 h-5 accent-[#d93a1e]" type="radio"
                                        name="countrySelect" id="countryPrimary" value="primary">
                                    <span class="text-gray-800 font-semibold group-hover:text-[#d93a1e] transition">{{
                                        $primary->country_name ?? 'Primary Country' }}</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer group">
                                    <input class="form-check-input w-5 h-5 accent-[#d93a1e]" type="radio"
                                        name="countrySelect" id="countrySecondary" value="secondary">
                                    <span class="text-gray-800 font-semibold group-hover:text-[#d93a1e] transition">{{
                                        $secondary->country_name ?? 'Secondary Country' }}</span>
                                </label>
                            </div>
                        </div>
                        <div id="mapContainer"
                            class="w-full aspect-video rounded-xl border border-gray-200 shadow-inner overflow-hidden">
                            {!! $primary->maps ?? '' !!}
                            {!! $secondary->maps ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Layout Structure --}}
        <section class="w-full px-4 py-12">
            <div class="container mx-auto flex flex-col lg:flex-row gap-8">

                {{-- Left Sidebar --}}
                <div class="w-full lg:w-3/12 order-2 lg:order-1 space-y-6">
                    <x-biletral-portal-aside :data="$primary" side="left" />
                </div>

                {{-- Main Content --}}
                <div class="w-full lg:w-6/12 order-1 lg:order-2 space-y-8">
                    {{-- Page Header --}}
                    <header
                        class="text-center py-10 px-6 bg-black/60 backdrop-blur-md rounded-2xl shadow-2xl border border-white/20">
                        <h1
                            class="text-3xl md:text-5xl font-black text-white m-0 drop-shadow-2xl tracking-tight uppercase">
                            {{ $main->title ?? 'India-Pakistan' }}
                        </h1>
                        <p class="text-lg md:text-xl text-gray-200 mt-4 font-medium italic">
                            {{ $main->slogan ?? 'India & Pakistan Relations' }}
                        </p>
                    </header>

                    {{-- Carousel and Tags --}}
                    <div class="bg-white p-6 rounded-2xl shadow-xl overflow-hidden ring-1 ring-black/5">
                        <x-portal.posts-carousel cityId="{{ $main->content_country_code ?? 'CON24' }}"
                            cityCode="{{ $main->content_country_code ?? 'CON24' }}" :locale="$locale" />
                        <div class="mt-6 border-t pt-6">
                            <x-portal.tag-list :cityId="$main->content_country_code"
                                :cityCode="$main->content_country_code" :citySlug="$main->slug" :locale="$locale" />
                        </div>
                    </div>

                    {{-- Comparison Links Section --}}
                    <div class="bg-white p-6 rounded-2xl shadow-xl space-y-6 ring-1 ring-black/5">
                        <h3
                            class="text-center text-2xl font-black text-gray-900 border-b-4 border-[#d93a1e] pb-2 inline-block mx-auto w-full italic uppercase">
                            Knowledge By Comparison
                        </h3>
                        <div class="grid grid-cols-1 gap-4">
                            <a target="_blank" href="/czech-republic-country-comparison"
                                class="flex flex-col md:flex-row items-center justify-between p-4 bg-blue-50 border-2 border-blue-200 rounded-xl hover:bg-blue-600 hover:border-blue-600 group transition-all duration-300 shadow-sm hover:shadow-lg">
                                <strong class="text-blue-900 group-hover:text-white transition-colors">Country
                                    Comparison:</strong>
                                <span class="text-blue-800 group-hover:text-white/90 transition-colors">Compare Czech
                                    with Other Countries</span>
                            </a>
                            <a target="_blank" href="/czech-republic-regional-comparison"
                                class="flex flex-col md:flex-row items-center justify-between p-4 bg-green-50 border-2 border-green-200 rounded-xl hover:bg-green-600 hover:border-green-600 group transition-all duration-300 shadow-sm hover:shadow-lg">
                                <strong class="text-green-900 group-hover:text-white transition-colors">Indo-Czech
                                    Comparison:</strong>
                                <span class="text-green-800 group-hover:text-white/90 transition-colors">Compare Czech
                                    with Indian Regions</span>
                            </a>
                        </div>
                    </div>

                    {{-- AI Reports --}}
                    <div class="rounded-2xl shadow-xl overflow-hidden ring-1 ring-black/5">
                        <x-portal.ai-reports :primary="$primary" :secondary="$secondary" :cities="$indianCities"
                            :zone="$stateZones" />
                    </div>

                    {{-- Data Analytics Grid --}}
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-white rounded-2xl shadow-xl p-6 ring-1 ring-black/5 border-t-4 border-gray-400">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center border-b pb-3 uppercase italic">
                                {{ $primary->country_name ?? 'N/A' }} Data Analytics
                            </h3>
                            <x-portal.cityanaytics :title="$primary->country_name ?? 'N/A'"
                                :code="$primary->analytics_slug ?? 'country'" />
                        </div>
                        <div class="bg-white rounded-2xl shadow-xl p-6 ring-1 ring-black/5 border-t-4 border-gray-400">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center border-b pb-3 uppercase italic">
                                {{ $secondary->country_name ?? 'N/A' }} Data Analytics
                            </h3>
                            <x-portal.cityanaytics :title="$secondary->country_name ?? 'N/A'"
                                :code="$secondary->analytics_slug ?? 'country'" />
                        </div>
                    </section>
                </div>

                {{-- Right Sidebar --}}
                <div class="w-full lg:w-3/12 order-3 lg:order-3 space-y-6">
                    <x-biletral-portal-aside :data="$secondary" side="right" />
                </div>
            </div>
        </section>

        {{-- Footer Section --}}
        <footer class="mt-20 px-6 py-16 text-white relative overflow-hidden"
            style="background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('{{ Storage::url($main->footer_image) }}'); background-size: cover; background-position: center;">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                    {{-- About Section --}}
                    <div class="space-y-6">
                        <h4 class="text-2xl font-bold border-l-4 border-[#d93a1e] pl-4 uppercase tracking-wider">About
                            Prarang</h4>
                        <p class="text-gray-300 text-base leading-relaxed text-justify italic">
                            Prarang provides integrated digital solutions and unique insights to understand the
                            cities of India and the World. Through our composite methodology of traditional
                            research from rare books, maps and images, a Big database of India and World
                            Metrics, an in-house LLM based on Indian Linguistics...
                        </p>
                    </div>

                    {{-- Social Links --}}
                    <div class="space-y-6 text-center">
                        <h4 class="text-2xl font-bold uppercase tracking-wider">Follow Us</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="#" onclick="showComingSoon(event)"
                                class="bg-white/10 hover:bg-blue-600 p-4 rounded-xl transition group border border-white/20">
                                <i class="fa fa-facebook text-3xl mb-2 block group-hover:scale-110 transition"></i>
                                <span class="text-sm font-bold uppercase tracking-tight">Facebook</span>
                            </a>
                            <a href="#" onclick="showComingSoon(event)"
                                class="bg-white/10 hover:bg-sky-500 p-4 rounded-xl transition group border border-white/20">
                                <img width="30"
                                    src="https://images.freeimages.com/image/grids/9fe/x-twitter-light-grey-logo-5694251.png"
                                    class="mx-auto mb-2 group-hover:scale-110 transition">
                                <span class="text-sm font-bold uppercase tracking-tight text-white">Twitter</span>
                            </a>
                            <a href="https://www.instagram.com/prarang_in/?hl=en" target="_blank"
                                class="bg-white/10 hover:bg-pink-600 p-4 rounded-xl transition group border border-white/20">
                                <i class="fa fa-instagram text-3xl mb-2 block group-hover:scale-110 transition"></i>
                                <span class="text-sm font-bold uppercase tracking-tight">Instagram</span>
                            </a>
                            <a href="https://www.linkedin.com/company/indeur-prarang/" target="_blank"
                                class="bg-white/10 hover:bg-blue-800 p-4 rounded-xl transition group border border-white/20">
                                <i class="fa fa-linkedin text-3xl mb-2 block group-hover:scale-110 transition"></i>
                                <span class="text-sm font-bold uppercase tracking-tight">LinkedIn</span>
                            </a>
                        </div>
                    </div>

                    {{-- Address Section --}}
                    <div class="space-y-6">
                        <h4
                            class="text-2xl font-bold border-r-4 border-[#d93a1e] pr-4 uppercase tracking-wider text-right">
                            Contact</h4>
                        <div class="space-y-3 text-right text-gray-300">
                            <p class="flex items-center justify-end gap-2"><span
                                    class="font-bold text-white">Office:</span> #25, 11th Floor, The I-Thum, A40</p>
                            <p class="flex items-center justify-end gap-2"><span
                                    class="font-bold text-white">Location:</span> Sector 62, Noida, India</p>
                            <p class="flex items-center justify-end gap-2"><span
                                    class="font-bold text-white">Phone:</span> 0120-4561284</p>
                            <p class="flex items-center justify-end gap-2"><span
                                    class="font-bold text-white">Email:</span> <a href="mailto:query@prarang.in"
                                    class="hover:text-[#d93a1e] underline">query@prarang.in</a></p>
                        </div>
                    </div>
                </div>

                {{-- Copyright --}}
                <div class="mt-16 pt-8 border-t border-white/10 text-center text-sm text-gray-400 italic">
                    <p>© {{ date('Y') }} Indoeuropeans India Pvt. Ltd. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    {{-- Coming Soon Modal Script --}}
    <script>
        function showComingSoon(event) {
            event.preventDefault();
            const modalHTML = `
                <div class="modal fade show" id="comingSoonModal" tabindex="-1" style="display: block; background: rgba(0,0,0,0.7); backdrop-filter: blur(5px); z-index: 9999;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-3xl shadow-2xl border-none overflow-hidden">
                            <div class="bg-gradient-to-br from-[#d93a1e] to-[#764ba2] p-8 text-center text-white">
                                <h5 class="text-2xl font-black uppercase tracking-widest mb-4">
                                    <i class="fa fa-clock-o mr-2 animate-pulse"></i> Coming Soon
                                </h5>
                                <p class="text-white/80 text-lg italic">We are working hard to bring this feature to you.</p>
                                <button type="button" class="mt-8 bg-white text-gray-900 px-8 py-2 rounded-full font-bold hover:bg-gray-100 transition shadow-lg" onclick="closeComingSoon()">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            document.body.style.overflow = 'hidden';
        }

        function closeComingSoon() {
            const modal = document.getElementById('comingSoonModal');
            if (modal) {
                modal.remove();
                document.body.style.overflow = 'auto';
            }
        }

        document.addEventListener('click', function(event) {
            const modal = document.getElementById('comingSoonModal');
            if (modal && event.target === modal) closeComingSoon();
        });
    </script>

    {{-- Assets Scripts --}}
    <script id="jquery-core-js" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {!! $portal['footer_scripts'] ?? '' !!}

    {{-- Map Switcher Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="countrySelect"]');
            const mapContainer = document.getElementById('mapContainer');
            if (!mapContainer) return;
            const primaryMap = mapContainer.children[0];
            const secondaryMap = mapContainer.children[1];

            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'primary') {
                        primaryMap.style.display = 'block';
                        secondaryMap.style.display = 'none';
                    } else {
                        primaryMap.style.display = 'none';
                        secondaryMap.style.display = 'block';
                    }
                });
            });

            document.getElementById('countrySecondary').checked = true;
            if (primaryMap) primaryMap.style.display = 'none';
            if (secondaryMap) secondaryMap.style.display = 'block';
        });
    </script>
</x-layout.portal.country-base>