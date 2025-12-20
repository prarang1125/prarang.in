<x-layout.portal.base :portal="$portal">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif !important;
            background-color: #474747 !important;
            color: #ffffff !important;
            margin: 0;
        }

        #wrapper {
            background-color: #474747 !important;
        }

        .header-top {
            background-color: #1a1a1a;
            border-bottom: 2px solid #333;
            padding: 10px 0;
        }

        .time-box {
            background-color: #000;
            border: 1px solid #444;
            padding: 5px 15px;
            border-radius: 4px;
            min-width: 160px;
        }

        .blue-banner {
            background-color: #0001FE;
            padding: 15px;
            border-radius: 8px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .stats-box {
            background-color: #000;
            border: 1px solid #444;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 11px;
            color: #ddd;
        }

        .btn-yellow {
            background-color: #FFCB05;
            color: #000;
            font-weight: bold;
            font-size: 12px;
            padding: 4px 12px;
            border-radius: 4px;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-yellow:hover {
            background-color: #e5b604;
        }

        /* Sidebar Left Styles */
        .nav-red {
            background-color: #D32F2F;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .nav-red a {
            display: block;
            padding: 12px 15px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-red a:hover {
            background-color: #B71C1C;
        }

        .widget-box {
            background-color: #ffffff;
            border-radius: 4px;
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .widget-header {
            background-color: #F5F5F5;
            padding: 8px 12px;
            border-bottom: 1px solid #ddd;
            color: #333;
            font-weight: bold;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .widget-content {
            padding: 10px;
            color: #333;
        }

        .gyankosh-box {
            background-color: #E0E0E0;
            padding: 20px;
            border-radius: 4px;
            text-align: center;
            color: #333;
        }

        .btn-blue-rounded {
            background-color: #2196F3;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .btn-yellow-rounded {
            background-color: #FFC107;
            color: #333;
            padding: 10px 20px;
            border-radius: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            text-decoration: none;
        }

        /* Main Content Styles */
        .whatsapp-banner {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            color: #333;
        }

        .stat-card {
            background-color: #ffffff;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            color: #333;
        }

        .bar-container {
            display: flex;
            height: 12px;
            border-radius: 2px;
            overflow: hidden;
            margin-top: 10px;
        }

        .metric-row {
            background-color: #ffffff;
            padding: 8px 15px;
            border-radius: 8px;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .pill-blue {
            background-color: #2196F3;
            color: white;
            padding: 2px 10px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 12px;
        }

        .yantra-box {
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            border-bottom: 4px solid rgba(0, 0, 0, 0.3);
        }

        /* Right Sidebar Styles */
        .social-bar {
            background-color: #ffffff;
            padding: 10px 20px;
            border-radius: 4px;
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .math-box {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 4px;
            color: #333;
            margin-bottom: 20px;
        }

        .weather-box {
            background-color: #FFC107;
            padding: 15px;
            border-radius: 4px;
            color: #333;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Precision Polish */
        .tracking-tighter {
            letter-spacing: -0.05em;
        }

        .font-black {
            font-weight: 900;
        }

        .transition-all {
            transition: all 0.3s ease-in-out;
        }

        .hover-lift:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }

        .glass-link {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.2s;
        }

        .glass-link:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .metric-row {
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.2s;
        }

        .metric-row:hover {
            background: #f9f9f9;
        }

        .metric-row:last-child {
            border-bottom: none;
        }
    </style>
    <div id="wrapper">
        <!-- HEADER TOP : begin -->
        <div class="header-top">
            <div class="container-fluid px-4">
                <div class="row align-items-center">
                    <!-- Logo Section -->
                    <div class="col-lg-2">
                        <div class="flex flex-col items-center">
                            <a href="{{ url()->current() }}">
                                <img src="{{ asset('assets/images/logo2x.png') }}" alt="Prarang Logo" class="h-14">
                            </a>
                            <div class="text-[9px] text-gray-400 mt-1 uppercase tracking-widest">कार्य • स्थान •
                                नागरिकता</div>
                        </div>
                    </div>

                    <!-- Time Section -->
                    <div class="col-lg-2">
                        <div class="time-box">
                            <div class="text-[10px] text-gray-400 font-bold mb-1">{{ $portal->city_name_local }} का समय
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa fa-clock-o text-white text-sm"></i>
                                <span class="text-xl font-bold tracking-tight" id="header-clock">--:--:--</span>
                            </div>
                            <div class="text-[9px] text-gray-500 mt-1 flex items-center gap-1">
                                <i class="fa fa-calendar"></i> {{ now()->translatedFormat('l, d F Y') }}
                            </div>
                        </div>
                    </div>

                    <!-- Banner Section -->
                    <div class="col-lg-5">
                        <div class="blue-banner flex-grow shadow-2xl">
                            <span class="text-white font-black tracking-tighter text-2xl uppercase">प्रारंग के
                                {{ $portal->city_name_local }} रंग:</span>
                            <span class="text-[#FFCB05] font-black tracking-tighter text-2xl uppercase ml-2">नॉलेज
                                वेब</span>
                        </div>
                    </div>

                    <!-- Stats & Logins Section -->
                    <div class="col-lg-3 flex flex-col items-end gap-2">
                        <div class="stats-box w-full max-w-[200px]">
                            <div class="flex justify-between border-b border-gray-800 pb-1 mb-1">
                                <span>{{ $portal->city_name_local }} स्थानीय सब्सक्राइबर:</span>
                                <span class="text-[#FFCB05] font-bold">12,802</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-800 pb-1 mb-1">
                                <span>मासिक {{ $portal->city_name_local }} वेबपेज व्यू:</span>
                                <span class="text-[#FFCB05] font-bold">3.2 लाख</span>
                            </div>
                            <div class="flex justify-between">
                                <span>आज के {{ $portal->city_name_local }} पाठक:</span>
                                <span class="text-[#FFCB05] font-bold">2,221</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="https://b2b.prarang.in/login" class="btn-yellow">Partner Login</a>
                            <a href="https://g2c.prarang.in/login" class="btn-yellow">Government Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function updateHeaderClock() {
                const now = new Date();
                const options = {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: true
                };
                document.getElementById('header-clock').textContent = now.toLocaleTimeString('en-US', options).toLowerCase();
            }
            setInterval(updateHeaderClock, 1000);
            updateHeaderClock();
        </script>
        <!-- HEADER TOP : end -->

        <!-- CORE : begin -->
        <div id="core">
            <div class="core__inner">
                <!-- COLUMNS : begin -->
                <div id="columns">
                    <div class="columns__inner">
                        <div class="lsvr-container px-2">
                            <div class="row g-3 d-flex flex-wrap">
                                <!-- MAIN CONTENT : begin -->
                                <main id="main" class="col-lg-6 order-lg-2">
                                    <div class="main__inner">
                                        <!-- WhatsApp Banner -->
                                        <div class="whatsapp-banner">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/images/wa_graphic.png') }}" alt="WhatsApp"
                                                    class="h-24"
                                                    onerror="this.src='https://img.icons8.com/color/144/whatsapp--v1.png'">
                                            </div>
                                            <div>
                                                <h3 class="font-bold text-lg mb-1 leading-tight text-[#0001FE]">प्रारंग
                                                    के {{ $portal->city_name_local }} दैनिक पोस्ट (Post) को प्रतिदिन
                                                    WhatsApp पर पाए</h3>
                                                <a href="https://chat.whatsapp.com/HpjFX0qe7Du7q9fi3DQR7P"
                                                    class="bg-red-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase">सब्स्क्राइब
                                                    (Subscribe) करें</a>
                                            </div>
                                        </div>

                                        <!-- City Headline -->
                                        <div class="text-center mb-6">
                                            <h1
                                                class="text-4xl font-black tracking-tighter text-white uppercase drop-shadow-lg">
                                                {{ $portal->city_name_local }} -
                                                {{ $portal->city_slogan_local ??
                                                    'लघु
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                उद्योग \'क्रांति\' का शहर' }}
                                            </h1>
                                        </div>

                                        <!-- Carousel -->
                                        <div class="mb-8 rounded-lg overflow-hidden shadow-2xl border-4 border-[#333]">
                                            <x-portal.posts-carousel :cityId="$cityCode" :cityCode="$cityCode"
                                                :locale="$locale" />
                                        </div>

                                        <!-- Stats Grid -->
                                        <div class="row g-4 mb-8">
                                            <div class="col-md-6">
                                                <div class="stat-card">
                                                    <h3 class="font-bold text-lg mb-2">संस्कृति</h3>
                                                    <div class="pill-blue inline-block mb-3">2151</div>
                                                    <div class="bar-container">
                                                        <div class="w-1/3 h-full bg-[#FF0000]"></div>
                                                        <div class="w-1/3 h-full bg-[#FFFF00]"></div>
                                                        <div class="w-1/3 h-full bg-[#0001FE]"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="stat-card">
                                                    <h3 class="font-bold text-lg mb-2">प्रकृति</h3>
                                                    <div class="pill-blue inline-block mb-3">794</div>
                                                    <div class="bar-container">
                                                        <div class="w-1/3 h-full bg-[#E6FF00]"></div>
                                                        <div class="w-1/3 h-full bg-[#66FF00]"></div>
                                                        <div class="w-1/3 h-full bg-[#008000]"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Metric Rows -->
                                        <div class="row g-3 mb-8">
                                            @php
                                                $metrics = [
                                                    ['icon' => 'clock-o', 'label' => 'समय - सीमा', 'count' => '282'],
                                                    ['icon' => 'globe', 'label' => 'भूगोल', 'count' => '237'],
                                                    [
                                                        'icon' => 'users',
                                                        'label' => 'मानव और उनकी इंद्रियाँ',
                                                        'count' => '1046',
                                                    ],
                                                    ['icon' => 'bug', 'label' => 'जीव-जंतु', 'count' => '308'],
                                                    [
                                                        'icon' => 'lightbulb-o',
                                                        'label' => 'मानव और उनके अविष्कार',
                                                        'count' => '823',
                                                    ],
                                                    ['icon' => 'leaf', 'label' => 'वनस्पति', 'count' => '228'],
                                                ];
                                            @endphp
                                            @foreach ($metrics as $m)
                                                <div class="col-md-6">
                                                    <div class="metric-row">
                                                        <span class="flex items-center gap-2 font-medium">
                                                            <i class="fa fa-{{ $m['icon'] }} text-gray-500"></i>
                                                            {{ $m['label'] }}
                                                        </span>
                                                        <span class="pill-blue">{{ $m['count'] }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Gyan-Kosh Section -->
                                        <div class="gyankosh-box">
                                            <h3 class="font-black text-lg mb-4 tracking-tight uppercase">शहर का ज्ञानकोष
                                            </h3>
                                            <a href="#"
                                                class="btn-blue-rounded shadow-lg transition-all hover-lift">
                                                <span class="flex items-center gap-2 font-bold"><i
                                                        class="fa fa-book"></i> किताबें</span>
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                            <a href="#"
                                                class="btn-yellow-rounded shadow-lg transition-all hover-lift">
                                                <span class="flex items-center gap-2 font-bold"><i
                                                        class="fa fa-globe"></i> वेबसाइट</span>
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>

                                        <div class="text-center mb-6">
                                            <h2 class="text-2xl font-bold uppercase border-t-2 border-gray-600 pt-4">
                                                {{ $portal->city_name_local }} के आंकड़े</h2>
                                        </div>

                                        <!-- Yantra Boxes -->
                                        <div class="row g-4 mb-12">
                                            <div class="col-md-6">
                                                <div
                                                    class="yantra-box bg-gradient-to-b from-[#448AFF] to-[#2979FF] text-white">
                                                    <h2 class="text-4xl font-black mb-1">बिज़नेस का यंत्र</h2>
                                                    <p class="text-sm opacity-90 mb-6">अपने बिज़नेस के लिए नए अवसर खोजें
                                                    </p>
                                                    <div class="space-y-3">
                                                        <a href="https://hindi.prarang.in/india/market-planner/states?city=667"
                                                            class="glass-link block p-3 rounded text-left text-xs font-bold flex justify-between items-center">
                                                            <span>भारत में नए अवसर खोजें <small
                                                                    class="opacity-70">(शहरों का चयन
                                                                    करें)</small></span>
                                                            <i class="fa fa-arrow-right"></i>
                                                        </a>
                                                        <a href="https://hindi.prarang.in/world/market-planner?city=667"
                                                            class="glass-link block p-3 rounded text-left text-xs font-bold flex justify-between items-center">
                                                            <span>विश्व में नए अवसर खोजें <small
                                                                    class="opacity-70">(देशों का चयन
                                                                    करें)</small></span>
                                                            <i class="fa fa-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="yantra-box bg-gradient-to-b from-[#00C853] to-[#00A344] text-white">
                                                    <h2 class="text-4xl font-black mb-1">विकास का यंत्र</h2>
                                                    <p class="text-sm opacity-90 mb-6">अपने शहर/देश की प्रगति की तुलना
                                                        करें</p>
                                                    <div class="space-y-3">
                                                        <a href="https://hindi.prarang.in/india/development-planners?city=667"
                                                            class="glass-link block p-3 rounded text-left text-xs font-bold flex justify-between items-center">
                                                            <span>भारत में विकास की तुलना <small
                                                                    class="opacity-70">(शहरों का चयन
                                                                    करें)</small></span>
                                                            <i class="fa fa-arrow-right"></i>
                                                        </a>
                                                        <a href="https://hindi.prarang.in/world/development-planner?city=667"
                                                            class="glass-link block p-3 rounded text-left text-xs font-bold flex justify-between items-center">
                                                            <span>विश्व में विकास की तुलना <small
                                                                    class="opacity-70">(देशों का चयन
                                                                    करें)</small></span>
                                                            <i class="fa fa-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                                <!-- MAIN CONTENT : end -->
                                <!-- LEFT SIDEBAR : begin -->
                                <aside id="sidebar-left" class="col-lg-3 order-lg-1">
                                    <div class="sidebar-left__inner">
                                        <div class="widget lsvr-townpress-menu-widget" id="lsvr_townpress_menu-2">
                                            <div class="widget__inner">
                                                <div class="widget__content">
                                                    <nav aria-label="Main Menu"
                                                        class="lsvr-townpress-menu-widget__nav lsvr-townpress-menu-widget__nav--expanded-active"
                                                        data-label-collapse-submenu="Collapse submenu"
                                                        data-label-expand-submenu="Expand submenu">
                                                        <ul class="lsvr-townpress-menu-widget__list"
                                                            id="menu-main-menu-1" role="menu">
                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-207 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children"
                                                                id="lsvr-townpress-menu-widget__item-226-251"
                                                                role="presentation">
                                                                <a aria-controls="lsvr-townpress-menu-widget__submenu-226-251"
                                                                    aria-expanded="false" aria-haspopup="true"
                                                                    aria-owns="lsvr-townpress-menu-widget__submenu-226-251"
                                                                    class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                    href="{{ route('portal', ['portal' => $portal->slug]) }}"
                                                                    id="lsvr-townpress-menu-widget__item-link-226-251"
                                                                    role="menuitem">
                                                                    <span
                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                        {{ $locale['ui']['home'] }}
                                                                    </span>
                                                                </a>


                                                            </li>
                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                                                id="lsvr-townpress-menu-widget__item-222-830"
                                                                role="presentation">
                                                                <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                    href="{{ route('posts.city', ['city' => $portal->slug]) }}"
                                                                    id="lsvr-townpress-menu-widget__item-link-222-830"
                                                                    role="menuitem">
                                                                    <span
                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                        {{ $locale['ui']['see_all_posts'] ??
                                                                            'See
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                All Posts' }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                                                id="lsvr-townpress-menu-widget__item-222-830"
                                                                role="presentation">
                                                                <a target="_blank"
                                                                    class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                    href="https://hindi.prarang.in/{{ $portal->city_name }}"
                                                                    id="lsvr-townpress-menu-widget__item-link-222-830"
                                                                    role="menuitem">
                                                                    <span
                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                        {{ $locale['ui']['district_metrics'] ?? 'District Metrics' }}
                                                                    </span>
                                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </aside>
                                <!-- LEFT SIDEBAR : end -->

                                <!-- SIDEBAR RIGHT : begin -->
                                <aside id="sidebar-right" class="col-lg-3 order-lg-3">
                                    <div class="sidebar-right__inner">
                                        <!-- Social Icons -->
                                        <div class="social-bar shadow-sm border">
                                            <a href="https://www.facebook.com/prarang.in" target="_blank"
                                                class="text-[#1877F2] text-2xl"><i class="fa fa-facebook"></i></a>
                                            <a href="https://chat.whatsapp.com/HpjFX0qe7Du7q9fi3DQR7P" target="_blank"
                                                class="text-[#25D366] text-2xl"><i class="fa fa-whatsapp"></i></a>
                                            <a href="https://www.youtube.com/@prarang" target="_blank"
                                                class="text-[#FF0000] text-2xl"><i class="fa fa-play-circle"></i></a>
                                        </div>

                                        <!-- Internet Math -->
                                        <div class="math-box shadow-md border-2 border-gray-100 p-0 overflow-hidden">
                                            <div class="bg-gray-50 p-3 border-b">
                                                <h3
                                                    class="font-black text-center text-sm text-[#333] uppercase tracking-tighter">
                                                    {{ $portal->city_name_local }} का इंटरनेट गणित</h3>
                                                <div class="text-[9px] text-end text-gray-400 mt-1 uppercase">नवीनतम
                                                    अपडेट : नवंबर 2025</div>
                                            </div>
                                            <div class="p-3 space-y-0 font-medium text-xs">
                                                <div class="metric-row flex items-center justify-between p-2">
                                                    <span class="flex items-center gap-2"><i
                                                            class="fa fa-users text-[#9C27B0] text-sm"></i> जनसंख्या
                                                        (2025)</span>
                                                    <span class="font-bold">16,05,532</span>
                                                </div>
                                                <div class="metric-row flex items-center justify-between p-2">
                                                    <span class="flex items-center gap-2"><i
                                                            class="fa fa-globe text-[#2196F3] text-sm"></i> इंटरनेट
                                                        उपयोगकर्ता</span>
                                                    <span class="font-bold">19,99,141</span>
                                                </div>
                                                <div class="metric-row flex items-center justify-between p-2">
                                                    <span class="flex items-center gap-2"><i
                                                            class="fa fa-facebook-square text-[#1877F2] text-sm"></i>
                                                        फेसबुक उपयोगकर्ता</span>
                                                    <span class="font-bold">5,42,000</span>
                                                </div>
                                                <div class="metric-row flex items-center justify-between p-2">
                                                    <span class="flex items-center gap-2"><i
                                                            class="fa fa-linkedin-square text-[#0A66C2] text-sm"></i>
                                                        लिंकडिन उपयोगकर्ता</span>
                                                    <span class="font-bold">7,80,000</span>
                                                </div>
                                                <div class="metric-row flex items-center justify-between p-2">
                                                    <span class="flex items-center gap-2"><i
                                                            class="fa fa-times-circle text-[#000000] text-sm"></i>
                                                        ट्विटर उपयोगकर्ता</span>
                                                    <span class="font-bold">9,82,350</span>
                                                </div>
                                                <div class="metric-row flex items-center justify-between p-2">
                                                    <span class="flex items-center gap-2"><i
                                                            class="fa fa-instagram text-[#E4405F] text-sm"></i>
                                                        इंस्टाग्राम उपयोगकर्ता</span>
                                                    <span class="font-bold">3,48,900</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Cyber Security -->
                                        <div class="math-box shadow-md border-2 border-gray-100 p-4">
                                            <div class="flex items-center gap-2 text-[#D32F2F] font-bold mb-3">
                                                <i class="fa fa-shield text-lg"></i> {{ $portal->city_name_local }}
                                                में
                                                साइबर सुरक्षा
                                            </div>
                                            <div class="flex justify-between items-center text-xs">
                                                <span class="font-semibold">साइबर जोख़िम सूचकांक:</span>
                                                <span class="font-black text-[#D32F2F] text-sm">6.47</span>
                                            </div>
                                            <div class="text-end mt-2 leading-none">
                                                <a href="#"
                                                    class="text-[10px] text-blue-600 font-bold border-b border-blue-600 pb-0.5">अधिक
                                                    देखें और समझे</a>
                                            </div>
                                        </div>

                                        <!-- Weather -->
                                        <div class="weather-box shadow-lg">
                                            <div class="flex flex-col">
                                                <span class="text-sm font-black">{{ $portal->city_name }}, IN</span>
                                                <img src="https://openweathermap.org/themes/openweathermap/assets/vendor/owm/img/widgets/logo_black.png"
                                                    class="h-4 w-12 mt-1 grayscale opacity-50">
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <i class="fa fa-cloud text-3xl opacity-80"></i>
                                                <span class="text-3xl font-black">19°C</span>
                                            </div>
                                        </div>

                                        <!-- Map Button -->
                                        <a href="#"
                                            class="bg-[#D32F2F] text-white w-full py-3 rounded mb-4 font-black uppercase text-sm flex items-center justify-center gap-3 shadow-xl hover:bg-[#B71C1C] transition-all">
                                            <i class="fa fa-map-marker text-lg"></i> शहर का नक्शा
                                        </a>

                                        <!-- Ad Section -->
                                        <div
                                            class="relative group cursor-pointer rounded-lg overflow-hidden shadow-2xl border-2 border-[#555]">
                                            <a
                                                href="{{ $yellowPages ? route('city.show', ['city_name' => $yellowPages->name]) : '#' }}">
                                                <img src="{{ asset('assets/images/yellowpages_ad.jpg') }}"
                                                    alt="Yellow Pages" class="w-full"
                                                    onerror="this.src='https://placehold.co/300x450?text=YELLOW+PAGES+AD'">
                                                <div
                                                    class="absolute inset-0 bg-black bg-opacity-40 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                                    <span
                                                        class="text-white font-black text-2xl tracking-tighter">YELLOW
                                                        PAGES</span>
                                                    <span
                                                        class="bg-[#FFCB05] text-black px-3 py-1 mt-2 font-black rounded text-xs">VISIT
                                                        NOW</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </aside>
                                <!-- SIDEBAR RIGHT : end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #wrapper footer .row .col p {
            margin-bottom: 5px !important;
        }
    </style>

    <!-- FOOTER : begin -->
    <footer class="bg-[#0f0f0f] text-white py-16 px-8 mt-20 border-t-8 border-[#FFCB05] relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none"
            style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
        <div class="container mx-auto relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 border-b border-gray-800 pb-16 mb-12">
                <!-- About Section -->
                <div>
                    <h4 class="text-[#448AFF] font-black mb-8 text-2xl uppercase tracking-tighter shadow-sm">प्रारंग के
                        बारे में</h4>
                    <p class="text-gray-400 text-sm leading-relaxed font-medium">
                        प्रारंग प्रदान करता है, देश-विदेश के शहरों को समझने हेतु संपूर्ण जानकारी। जिसमें शामिल है
                        स्थानीय भाषा में शहर की प्रकृति-संस्कृति के नॉलेज वेब, शहर की व्यवसाय सूची के येलो पेज, शहर के
                        मैट्रिक्स या आंकड़ों का विस्तृत विश्लेषण, तथा AI द्वारा संचालित शहरवासियों से प्राप्त विशिष्ट
                        सांकेतिकता।
                    </p>
                </div>

                <!-- Social Section -->
                <div class="text-center">
                    <h4 class="text-white font-black mb-8 text-lg uppercase tracking-widest opacity-50">Social Presence
                    </h4>
                    <div class="grid grid-cols-2 gap-8 max-w-[220px] mx-auto">
                        <a href="https://www.facebook.com/prarang.in" target="_blank"
                            class="flex flex-col items-center gap-3 group">
                            <i
                                class="fa fa-facebook bg-[#1877F2] p-4 rounded-full h-16 w-16 flex items-center justify-center text-2xl group-hover:scale-110 transition-all shadow-lg"></i>
                            <span
                                class="text-[10px] font-bold uppercase tracking-widest text-gray-500 group-hover:text-white transition-colors">Facebook</span>
                        </a>
                        <a href="#" class="flex flex-col items-center gap-3 group">
                            <i
                                class="fa fa-twitter bg-[#000000] p-4 rounded-full h-16 w-16 flex items-center justify-center text-2xl group-hover:scale-110 transition-all shadow-lg border border-gray-800"></i>
                            <span
                                class="text-[10px] font-bold uppercase tracking-widest text-gray-500 group-hover:text-white transition-colors">Twitter</span>
                        </a>
                        <a href="https://www.instagram.com/prarang_in/?hl=en" target="_blank"
                            class="flex flex-col items-center gap-3 group">
                            <i
                                class="fa fa-instagram bg-gradient-to-tr from-[#f9ce34] via-[#ee2a7b] to-[#6228d7] p-4 rounded-full h-16 w-16 flex items-center justify-center text-2xl group-hover:scale-110 transition-all shadow-lg"></i>
                            <span
                                class="text-[10px] font-bold uppercase tracking-widest text-gray-500 group-hover:text-white transition-colors">Instagram</span>
                        </a>
                        <a href="https://www.linkedin.com/company/indeur-prarang/" target="_blank"
                            class="flex flex-col items-center gap-3 group">
                            <i
                                class="fa fa-linkedin bg-[#0077b5] p-4 rounded-full h-16 w-16 flex items-center justify-center text-2xl group-hover:scale-110 transition-all shadow-lg"></i>
                            <span
                                class="text-[10px] font-bold uppercase tracking-widest text-gray-500 group-hover:text-white transition-colors">LinkedIn</span>
                        </a>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="flex flex-col gap-6 text-sm font-medium">
                    <h4
                        class="text-[#00C853] font-black mb-2 text-2xl uppercase tracking-tighter flex items-center gap-3">
                        <i class="fa fa-map-marker text-[#D32F2F]"></i> हमारा संपर्क
                    </h4>
                    <div class="text-gray-400 space-y-3">
                        <div class="flex gap-4">
                            <i class="fa fa-building mt-1 text-gray-600"></i>
                            <p>ऑफिस #25, 11th फ्लोर, द आई-थम, A40, सेक्टर 62, नॉएडा (U.P), इंडिया 201309</p>
                        </div>
                        <p class="pl-8"><i class="fa fa-phone mr-3 text-gray-600"></i> 0120-4561284</p>
                        <p class="pl-8"><i class="fa fa-envelope mr-3 text-gray-600"></i> <a
                                href="mailto:query@prarang.in"
                                class="hover:text-white transition">Query@prarang.in</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center text-gray-600 text-[10px] font-bold uppercase tracking-[0.2em]">
                <p>© 2025 प्रारंग. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- FOOTER : end -->

    </div>
    <script>
        function showComingSoon(event) {
            event.preventDefault();

            // Create modal HTML
            const modalHTML = `
                            <div class="modal fade show" id="comingSoonModal" tabindex="-1" style="display: block; background: rgba(0,0,0,0.5);">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                                        <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                                            <h5 class="modal-title text-white fw-bold">
                                                <i class="fa fa-clock-o me-2"></i>Coming Soon
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" onclick="closeComingSoon()"></button>
                                        </div>
                                        <div class="modal-body text-center p-5">
                                            <p class="text-muted" style="font-size: 1.1rem;">
                                                Coming Soon...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

            // Append modal to body
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            document.body.style.overflow = 'hidden';
        }

        function closeComingSoon() {
            const modal = document.getElementById('comingSoonModal');
            if (modal) {
                modal.classList.remove('show');
                setTimeout(() => {
                    modal.remove();
                    document.body.style.overflow = 'auto';
                }, 150);
            }
        }

        // Close modal on backdrop click
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('comingSoonModal');
            if (modal && event.target === modal) {
                closeComingSoon();
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hash = window.location.hash;

            if (hash === '#subscribeModal') {
                modal.classList.add("show");
            }
        });
    </script>
    <script>
        // Wait for the DOM to load
        document.addEventListener("DOMContentLoaded", function() {
            // Select the parent element with the class 'header-map'
            const headerMapElement = document.querySelector('.header-map');

            if (headerMapElement) {
                // Find the iframe inside the 'header-map' element
                const iframe = headerMapElement.querySelector('iframe');

                if (iframe) {
                    // Apply the desired classes to the iframe
                    iframe.classList.add('header-map__canvas', 'header-map__canvas--loading');
                    console.log("Classes added to the iframe inside header-map.");
                } else {
                    console.warn("No iframe found inside the 'header-map' element.");
                }
            } else {
                console.error("The 'header-map' element is not found in the DOM.");
            }
        });
    </script>

</x-layout.portal.base>
