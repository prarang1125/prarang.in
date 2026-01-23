<x-layout.main.base>
    <section class="py-16 px-5 max-w-7xl mx-auto bg-gray-50/30 rounded-3xl my-10 ">
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
            <!-- City Webs Card -->
            <div
                class="group border-[2px] border-gray-200 rounded-[2.5rem] p-8 bg-gradient-to-br from-blue-50 via-blue-100/50 to-blue-200/30 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div
                    class="border-2 border-blue-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-blue-400 transition-colors">
                    <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition-opacity">
                        <i class="bi bi-buildings text-4xl"></i>
                    </div>
                    <div
                        class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('images/city-icon.png') }}" alt="City Icon"
                            class="w-20 h-20 object-contain drop-shadow-md">
                    </div>
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        City<br><span class="text-blue-600">Webs</span>
                    </h2>
                </div>
                <div class="flex gap-3">
                    <div
                        class="flex-1 border-2 border-blue-400 rounded-2xl py-3 px-4 bg-blue-600 text-white text-center text-sm font-bold shadow-md hover:bg-blue-700 hover:shadow-lg transition-all active:scale-95 cursor-pointer">
                        Total #1
                    </div>
                    <div
                        class="flex-1 border-2 border-blue-400 rounded-2xl py-3 px-4 bg-blue-600 text-white text-center text-sm font-bold shadow-md hover:bg-blue-700 hover:shadow-lg transition-all active:scale-95 cursor-pointer">
                        Live #2
                    </div>
                </div>
            </div>

            <!-- Arrow -->
            <div class="hidden lg:flex items-center justify-center text-4xl text-blue-400 opacity-60 animate-pulse">
                <i class="bi bi-arrow-right-circle-fill"></i>
            </div>

            <!-- Language Webs Card -->
            <div
                class="group border-[2px] border-gray-200 rounded-[2.5rem] p-8 bg-gradient-to-br from-yellow-50 via-yellow-100/50 to-yellow-200/30 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div
                    class="border-2 border-yellow-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-yellow-400 transition-colors">
                    <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition-opacity">
                        <i class="bi bi-translate text-4xl"></i>
                    </div>
                    <div
                        class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('images/language-icon.png') }}" alt="Language Icon"
                            class="w-20 h-20 object-contain drop-shadow-md">
                    </div>
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        Language<br><span class="text-yellow-600">webs</span>
                    </h2>
                </div>
                <div class="flex gap-3">
                    <div
                        class="flex-1 border-2 border-yellow-400 rounded-2xl py-3 px-4 bg-yellow-500 text-white text-center text-sm font-bold shadow-md hover:bg-yellow-600 hover:shadow-lg transition-all active:scale-95 cursor-pointer">
                        Total #1
                    </div>
                    <div
                        class="flex-1 border-2 border-yellow-400 rounded-2xl py-3 px-4 bg-yellow-500 text-white text-center text-sm font-bold shadow-md hover:bg-yellow-600 hover:shadow-lg transition-all active:scale-95 cursor-pointer">
                        Live #2
                    </div>
                </div>
            </div>

            <!-- Arrow -->
            <div class="hidden lg:flex items-center justify-center text-4xl text-red-400 opacity-60 animate-pulse">
                <i class="bi bi-arrow-left-circle-fill"></i>
            </div>

            <!-- Country Webs Card -->
            <div
                class="group border-[2px] border-gray-200 rounded-[2.5rem] p-8 bg-gradient-to-br from-red-50 via-red-100/50 to-red-200/30 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                <div
                    class="border-2 border-red-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-red-400 transition-colors">
                    <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition-opacity">
                        <i class="bi bi-globe2 text-4xl"></i>
                    </div>
                    <div
                        class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('images/country-icon.png') }}" alt="Country Icon"
                            class="w-20 h-20 object-contain drop-shadow-md">
                    </div>
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        Country<br><span class="text-red-600">Webs</span>
                    </h2>
                </div>
                <div class="flex gap-3">
                    <div
                        class="flex-1 border-2 border-red-400 rounded-2xl py-3 px-4 bg-red-600 text-white text-center text-sm font-bold shadow-md hover:bg-red-700 hover:shadow-lg transition-all active:scale-95 cursor-pointer">
                        Total #1
                    </div>
                    <div
                        class="flex-1 border-2 border-red-400 rounded-2xl py-3 px-4 bg-red-600 text-white text-center text-sm font-bold shadow-md hover:bg-red-700 hover:shadow-lg transition-all active:scale-95 cursor-pointer">
                        Live #2
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.main.base>
