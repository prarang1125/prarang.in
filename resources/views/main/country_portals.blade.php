@php
$metaData = [
'nav-heading' => 'PORTAL : WORLD BILATERAL',
'nav-sub-heading' => 'Glocal For Hyperlocal',
];
@endphp
<x-layout.main.base :resetMainMinHeight="true" :metaData="$metaData">

    <style>
        /* Link */
        .relative .absolute a {
            font-size: 12px;
            padding-right: 4px !important;
            padding-left: 9px !important;

        }
    </style>
    <section class=" parent-portal ">
        <p>World Bilateral Portals are integrated digital platforms that facilitate interaction between two countries — connecting their shared history, cultural ties, and bilateral opportunities through local updates in English & the primary languages of both countries. <br>The portals are an aggregated curation of Prarang's solutions for the two Countries - Content, Analytics, Planners, Artificial Intelligence and Performance Metrics (under Partner Login). These portals can also be launched on our Corporate and Government partner's websites (using our APIs).</p>
        <br><br>
        <div>
            <h4 class="text-sm  text-slate-900  tracking-wide mb-3 text-center">
                Ready for World Bilateral Interactions

            </h4>
            <h4 class="text-sm font-black text-slate-900 uppercase tracking-wide mb-3 ">
                INDIA – BILATERAL


            </h4>
            <div class="flex flex-wrap gap-3">


                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="group flex items-center gap-3 bg-white border border-slate-200 px-4 py-3 rounded-2xl hover:shadow-lg hover:border-blue-300 transition-all duration-300 no-underline cursor-pointer">
                        <div class="w-10 h-10 rounded-full overflow-hidden  group-hover:border-blue-200 transition-colors duration-300 flex-shrink-0">
                            <img src="https://www.prarang.in/assets/images/World.png" alt="Meerut" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <span class="text-sm font-bold text-blue-600 group-hover:text-blue-600 transition-colors whitespace-nowrap">
                            India - Czech
                        </span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 transition-all duration-300 flex-shrink-0" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition="" class="absolute left-0 mt-2 w-48 bg-white border border-slate-100 rounded-2xl shadow-2xl p-2 z-[100]" style="display: none;">
                        <!--[if BLOCK]><![endif]--> <a href="https://www.prarang.in/india-czech-republic/" target="_blank" class="block w-full text-left px-4 py-2.5 rounded-xl text-[.8125rem] font-bold text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200 no-underline">
                            Indo-Czech (Prarang Domain)
                        </a>
                        <a href="https://indiaczech.com/" target="_blank" class="block w-full text-left px-4 py-2.5 rounded-xl text-[.4125rem] font-bold text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200 no-underline">
                            Indo-Czech (External Domain)
                        </a>

                        <!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
                <a href="https://www.prarang.in/india-nepal" target="_blank" class="group flex items-center gap-3 bg-white border border-slate-200 px-4 py-3 rounded-2xl hover:shadow-lg hover:border-blue-300 transition-all duration-300 no-underline cursor-pointer">
                    <div class="w-10 h-10 rounded-full overflow-hidden  group-hover:border-blue-200 transition-colors duration-300 flex-shrink-0">
                        <img src="https://www.prarang.in/assets/images/World.png" alt="Lucknow" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <span class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors whitespace-nowrap">
                        India - Nepal
                    </span>
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>

            </div>
        </div>
    </section>
    <div class="flex justify-center items-center gap-8 mt-5">
        <a href="https://www.prarang.in/country-webs-filter">
            <div class="flex flex-col justify-center items-center border-1 border-blue-600 rounded-xl shadow-sm bg-slate-50 px-5 py-2 ">

                <img class="max-h-20 mb-2" src="https://www.prarang.in/assets/images/World.png" alt="">
                <h4 class="text-sm  text-slate-800  tracking-wide mb-3 text-center ">
                    Explore All <b>194</b> India-Bilateral
                </h4>

            </div>
        </a>
    </div>

</x-layout.main.base>
