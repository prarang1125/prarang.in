@php
$metaData = [
'nav-heading' => 'PORTAL : CITY/VILLAGE',
'nav-sub-heading' => 'Glocal For Hyperlocal',
];
@endphp
<x-layout.main.base :resetMainMinHeight="true" :metaData="$metaData">

    <style>
        /* Tracking wide */
        .parent-portal a .tracking-wide {
            color: #020202;
            text-decoration: none;
        }

        /* Flex col (hover) */
        .parent-portal a .flex-col:hover {
            color: #3783f5;
        }

        /* Tracking wide (hover) */
        .parent-portal a .tracking-wide:hover {
            color: #156ef3;
        }
    </style>
    <section class=" parent-portal ">
        <p>Portals are an aggregator of Content, Analytics, Planners, Artificial Intelligence and Performance Metrics (under Partner Login). City/Village Portals are integrated digital platforms that combine Prarang’s content and business information with relevant City/Village specific tools delivered through hyperlocal City/Village-level updates in regional languages.
        </p>
        <div class="space-y-6">

            <div>
                <h4 class="text-sm  text-slate-900  tracking-wide mb-3 text-center">
                    Live City/Village Interaction

                </h4>
                <h4 class="text-sm font-black text-slate-900 uppercase tracking-wide mb-3 ">
                    HINDI – INDIA – UTTAR PRADESH

                </h4>
                <div class="flex flex-wrap gap-3">

                    <a href="https://prarang.in/lucknow" target="_blank" class="group flex items-center gap-3 bg-white border border-slate-200 px-4 py-3 rounded-2xl hover:shadow-lg hover:border-blue-300 transition-all duration-300 no-underline cursor-pointer">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-100 group-hover:border-blue-200 transition-colors duration-300 flex-shrink-0">
                            <img src="https://www.prarang.in/assets/images/home/town-1.png" alt="Lucknow" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <span class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors whitespace-nowrap">
                            Lucknow
                        </span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]-->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="group flex items-center gap-3 bg-white border border-slate-200 px-4 py-3 rounded-2xl hover:shadow-lg hover:border-blue-300 transition-all duration-300 no-underline cursor-pointer">
                            <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-100 group-hover:border-blue-200 transition-colors duration-300 flex-shrink-0">
                                <img src="https://www.prarang.in/assets/images/home/town-1.png" alt="Meerut" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            </div>
                            <span class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors whitespace-nowrap">
                                Meerut
                            </span>
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 transition-all duration-300 flex-shrink-0" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition="" class="absolute left-0 mt-2 w-48 bg-white border border-slate-100 rounded-2xl shadow-2xl p-2 z-[100]" style="display: none;">
                            <!--[if BLOCK]><![endif]--> <a href="https://prarang.in/meerut" target="_blank" class="block w-full text-left px-4 py-2.5 rounded-xl text-[.8125rem] font-bold text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200 no-underline">
                                Main Portal
                            </a>
                            <a href="https://meerutrang.in" target="_blank" class="block w-full text-left px-4 py-2.5 rounded-xl text-[.8125rem] font-bold text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200 no-underline">
                                English Domain
                            </a>
                            <a href="https://मेरठरंग.भारत/" target="_blank" class="block w-full text-left px-4 py-2.5 rounded-xl text-[.8125rem] font-bold text-slate-700 hover:bg-blue-600 hover:text-white transition-all duration-200 no-underline">
                                Hindi Domain
                            </a>
                            <!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--> <a href="https://prarang.in/rampur" target="_blank" class="group flex items-center gap-3 bg-white border border-slate-200 px-4 py-3 rounded-2xl hover:shadow-lg hover:border-blue-300 transition-all duration-300 no-underline cursor-pointer">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-100 group-hover:border-blue-200 transition-colors duration-300 flex-shrink-0">
                            <img src="https://www.prarang.in/assets/images/home/town-1.png" alt="Rampur" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <span class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors whitespace-nowrap">
                            Rampur
                        </span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--> <a href="https://prarang.in/jaunpur" target="_blank" class="group flex items-center gap-3 bg-white border border-slate-200 px-4 py-3 rounded-2xl hover:shadow-lg hover:border-blue-300 transition-all duration-300 no-underline cursor-pointer">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-100 group-hover:border-blue-200 transition-colors duration-300 flex-shrink-0">
                            <img src="https://www.prarang.in/assets/images/home/town-1.png" alt="Jaunpur" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <span class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors whitespace-nowrap">
                            Jaunpur
                        </span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--> <a href="https://prarang.in/shahjahanpur" target="_blank" class="group flex items-center gap-3 bg-white border border-slate-200 px-4 py-3 rounded-2xl hover:shadow-lg hover:border-blue-300 transition-all duration-300 no-underline cursor-pointer">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-100 group-hover:border-blue-200 transition-colors duration-300 flex-shrink-0">
                            <img src="https://www.prarang.in/assets/images/home/town-1.png" alt="Shahjahanpur" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <span class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors whitespace-nowrap">
                            Shahjahanpur
                        </span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <!--[if ENDBLOCK]><![endif]--> <!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div>
                <h4 class="text-sm  text-slate-900  tracking-wide mb-3 text-center">
                    Ready for City/Village Interaction

                </h4>
                <h4 class="text-sm font-black text-slate-900 uppercase tracking-wide mb-3 ">
                    HINDI – INDIA – UTTARAKHAND

                </h4>
                <div class="flex flex-wrap gap-3">
                    <!--[if BLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--> <a href="https://prarang.in/haridwar" target="_blank" class="group flex items-center gap-3 bg-white border border-slate-200 px-4 py-3 rounded-2xl hover:shadow-lg hover:border-blue-300 transition-all duration-300 no-underline cursor-pointer">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-100 group-hover:border-blue-200 transition-colors duration-300 flex-shrink-0">
                            <img src="https://www.prarang.in/assets/images/home/town-1.png" alt="Haridwar" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <span class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors whitespace-nowrap">
                            Haridwar
                        </span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--> <a href="https://prarang.in/pithoragarh" target="_blank" class="group flex items-center gap-3 bg-white border border-slate-200 px-4 py-3 rounded-2xl hover:shadow-lg hover:border-blue-300 transition-all duration-300 no-underline cursor-pointer">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-100 group-hover:border-blue-200 transition-colors duration-300 flex-shrink-0">
                            <img src="https://www.prarang.in/assets/images/home/town-1.png" alt="Pithoragarh" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <span class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors whitespace-nowrap">
                            Pithoragarh
                        </span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <!--[if ENDBLOCK]><![endif]--> <!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div>
                <h4 class="text-sm font-black text-slate-900 uppercase tracking-wide mb-3">
                    MARATHI – INDIA – MAHARASHTRA
                </h4>
                <div class="flex flex-wrap gap-3">
                    <!--[if BLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--> <a href="https://prarang.in/pune" target="_blank" class="group flex items-center gap-3 bg-white border border-slate-200 px-4 py-3 rounded-2xl hover:shadow-lg hover:border-blue-300 transition-all duration-300 no-underline cursor-pointer">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-100 group-hover:border-blue-200 transition-colors duration-300 flex-shrink-0">
                            <img src="https://www.prarang.in/assets/images/home/town-1.png" alt="Pune" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <span class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors whitespace-nowrap">
                            Pune
                        </span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <!--[if ENDBLOCK]><![endif]--> <!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="flex justify-center items-center gap-8">
            <a href="https://www.prarang.in/webs/filter/villages">
                <div class="flex flex-col justify-center items-center border-1 border-blue-600 rounded-xl shadow-sm bg-slate-50 px-5 py-2 ">

                    <img class="max-h-20 mb-2" src="https://www.prarang.in/assets/images/Villages1.png" alt="">
                    <h4 class="text-sm  text-slate-800  tracking-wide mb-3 text-center ">
                        Explore All <b>6,331</b> Cities of <br>India
                    </h4>

                </div>
            </a>
            <a href="">
                <div class="flex flex-col justify-center items-center border-1 border-blue-600 rounded-xl shadow-sm bg-slate-50 px-5 py-2 ">

                    <img class="max-h-20 mb-2" src="https://www.prarang.in/assets/images/town1.png" alt="">
                    <h4 class="text-sm  text-slate-800  tracking-wide mb-3 text-center">
                        Explore All <b>592,765</b> Inhabited <br>Villages of India
                    </h4>
                </div>
            </a>
        </div>

    </section>











</x-layout.main.base>
