@php
$metaData = [
'nav-heading' => 'INDIA KNOWLEDGE WEBS',
'nav-sub-heading' => '',
];
@endphp

<x-layout.main.base :metaData="$metaData">

    <section class="py-10" x-data="{ showModal: false }">

        <!-- Heading -->
        <div class="text-center mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                India Knowledge Webs
            </h1>
        </div>

        <!-- TOP 3 BOXES -->
        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 w-full max-w-2xl">

                <div
                    class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl p-6 text-center shadow-lg hover:scale-105 transition">
                    <h4 class="font-semibold uppercase text-sm">Villages</h4>
                    <h3 class="text-3xl font-bold mt-1">592,765</h3>
                </div>

                <div
                    class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl p-6 text-center shadow-lg hover:scale-105 transition">
                    <h4 class="font-semibold uppercase text-sm">Cities</h4>
                    <h3 class="text-3xl font-bold mt-1">6,331</h3>
                </div>

                <div
                    class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl p-6 text-center shadow-lg hover:scale-105 transition">
                    <h4 class="font-semibold uppercase text-sm">World-Bilateral</h4>
                    <h3 class="text-3xl font-bold mt-1">195</h3>
                </div>

            </div>
        </div>

        <!-- LANGUAGE BOXES -->
        <div class="flex justify-center mt-10">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4 w-full">

                <!-- ✅ Hindi (Link) -->
                <a href="#"
                    class="no-underline relative overflow-hidden block w-full text-center py-2 px-6 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
                    Hindi Webs
                </a>
                <a href="javascript:void(0)" @click="showModal = true"
                    class="no-underline relative overflow-hidden block w-full text-center py-2 px-6 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
                    Tamil Webs
                </a>


                <a href="javascript:void(0)" @click="showModal = true"
                    class="no-underline relative overflow-hidden block w-full text-center py-2 px-6 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
                    Tamil Webs
                </a>



                <a href="javascript:void(0)" @click="showModal = true"
                    class="no-underline relative overflow-hidden block w-full text-center py-2 px-6 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
                    Tamil Webs
                </a>


                <a href="javascript:void(0)" @click="showModal = true"
                    class="no-underline relative overflow-hidden block w-full text-center py-2 px-6 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
                    Tamil Webs
                </a>


                <a href="javascript:void(0)" @click="showModal = true"
                    class="no-underline relative overflow-hidden block w-full text-center py-2 px-6 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
                    Tamil Webs
                </a>


                <a href="javascript:void(0)" @click="showModal = true"
                    class="no-underline relative overflow-hidden block w-full text-center py-2 px-6 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
                    Tamil Webs
                </a>

            </div>
        </div>

        <!-- Coming Soon Modal -->
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-gray-900/40 backdrop-blur-sm"
            @click.self="showModal = false" x-cloak>
            <div
                class="bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full text-center transform transition-all border border-gray-100">
                <div
                    class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 border border-blue-100">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Coming Soon</h3>
                <p class="text-gray-500 mb-6">India Stack Language Localization
                </p>
                <button @click="showModal = false"
                    class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-all active:scale-95">
                    Close
                </button>
            </div>
        </div>

    </section>


    <section class="py-10"">

        <!-- Heading -->
        <div class="text-center mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                Understanding India: Analytics
            </h1>
        </div>

        <!-- TOP 3 BOXES -->
        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-6 w-full">

                <div
                    class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl p-6 text-center shadow-lg hover:scale-105 transition">
                    <h4 class="font-semibold uppercase text-sm">Villages</h4>
                    <h3 class="text-3xl font-bold mt-1">592,765</h3>
                </div>

                <div
                    class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl p-6 text-center shadow-lg hover:scale-105 transition">
                    <h4 class="font-semibold uppercase text-sm">Cities</h4>
                    <h3 class="text-3xl font-bold mt-1">6,331</h3>
                </div>

                <div
                    class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl p-6 text-center shadow-lg hover:scale-105 transition">
                    <h4 class="font-semibold uppercase text-sm">World-Bilateral</h4>
                    <h3 class="text-3xl font-bold mt-1">195</h3>
                </div>

                <div
                    class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl p-6 text-center shadow-lg hover:scale-105 transition">
                    <h4 class="font-semibold uppercase text-sm">World-Bilateral</h4>
                    <h3 class="text-3xl font-bold mt-1">195</h3>
                </div>

            </div>
        </div>


    </section>

</x-layout.main.base>
