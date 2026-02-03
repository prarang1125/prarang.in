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
    </style>
    <section class="px-5 max-w-7xl mx-auto bg-gray-50/30 rounded-3xl my-10 ">
        <!-- Header Section (Optional, keeping it simple as per current state) -->
        {{-- <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                Prarang Knowledge Webs
            </h1>
            <div class="h-1.5 w-24 bg-blue-500 mx-auto rounded-full mb-6"></div>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Bridge the digital divide city wise and language content through our innovative knowledge networks.
            </p>
        </div> --}}

        <!-- Cards Section -->
        <div class="flex flex-wrap justify-center items-center gap-4 lg:gap-6">
            <div>
                <!-- City Webs Card -->
                <div
                    class="group border-[2px] border-gray-200 rounded p-8 bg-gradient-to-br from-blue-500 via-blue-300 to-blue-500 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        City Webs
                    </h2>
                    <div
                        class="border-2 border-blue-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-blue-400 transition-colors">

                        <div
                            class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('assets/images/home/3.png') }}" alt="City Icon"
                                class=" object-contain drop-shadow-md">
                        </div>

                    </div>

                </div>
                <div class="flex w-full mt-6 text-center">
                    <div class="flex-1 cursor-pointer group/stat px-2"
                        onclick="openModal('City Webs - Total Portfolio', 'Our network covers 525 key cities across India, bridging the digital divide with localized knowledge.')">
                        <span
                            class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] block mb-1 group-hover/stat:text-blue-600 transition-colors">Total</span>
                        <span class="text-base font-bold text-gray-800">India - 525</span>
                    </div>
                    <div class="w-px h-8 bg-gray-200 self-center"></div>
                    <div class="flex-1 cursor-pointer group/stat px-2"
                        onclick="openModal('City Webs - Live Portals', 'Currently, 298 specialized city portals are live and serving the community.')">
                        <span
                            class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] block mb-1 group-hover/stat:text-blue-600 transition-colors">Live
                        </span>
                        <span class="text-2xl font-black text-blue-600">298</span>
                    </div>
                </div>
            </div>
            <!-- Arrow -->
            <div class="hidden lg:flex items-center justify-center text-4xl text-blue-400 opacity-60 animate-pulse">
                <i class="bi bi-arrow-right-circle-fill"></i>
            </div>

            <!-- Language Webs Card -->
            <div>
                <div style="background: #FFFF00;"
                    class="group border-[2px] border-gray-200 rounded-[2.5rem] p-8 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        Language Webs
                    </h2>
                    <div
                        class="border-2 border-yellow-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-yellow-400 transition-colors">

                        <div
                            class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('assets/images/home/1.png') }}" alt="Language Icon"
                                class=" object-contain drop-shadow-md">
                        </div>

                    </div>

                </div>
                <div class="flex w-full mt-6 text-center">
                    <div class="flex-1 cursor-pointer group/stat px-2"
                        onclick="openModal('City Webs - Total Portfolio', 'Our network covers 525 key cities across India, bridging the digital divide with localized knowledge.')">
                        <span
                            class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] block mb-1 group-hover/stat:text-blue-600 transition-colors">Total</span>
                        <span class="text-base font-bold text-gray-800">178</span>
                    </div>
                    <div class="w-px h-8 bg-gray-200 self-center"></div>
                    <div class="flex-1 cursor-pointer group/stat px-2"
                        onclick="openModal('City Webs - Live Portals', 'Currently, 298 specialized city portals are live and serving the community.')">
                        <span
                            class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em] block mb-1 group-hover/stat:text-blue-600 transition-colors">Live
                        </span>
                        <div class="flex flex-col justify-start items-start ps-5">
                            <span class="text-md font-black text-blue-600">Hindi</span>
                            <span class="text-md font-black text-blue-600">English</span>
                            <span class="text-md font-black text-blue-600">Marathi</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Arrow -->
            <div class="hidden lg:flex items-center justify-center text-4xl text-red-400 opacity-60 animate-pulse">
                <i class="bi bi-arrow-left-circle-fill"></i>
            </div>

            <!-- Country Webs Card -->
            <div
                class="group border-[2px] border-gray-200 rounded-[2.5rem] p-8 bg-gradient-to-br from-red-500 via-red-300 to-red-500 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                    Country Webs
                </h2>
                <div
                    class="border-2 border-red-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-red-400 transition-colors">

                    <div
                        class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('assets/images/home/2.png') }}" alt="Country Icon"
                            class="object-contain drop-shadow-md">
                    </div>

                </div>

            </div>
        </div>
    </section>
</x-layout.main.base>
