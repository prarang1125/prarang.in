@php
$metaData = [
'nav-heading' => 'INDIA KNOWLEDGE WEBS',
'nav-sub-heading' => '',
];
@endphp


<style>
    .shadowbox {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background: #3f69bd;
        transition: all 0.3s ease;
        padding: 10px;
        text-decoration: none;
        color: #fff;


    }

    .shadowbox:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
        transform: translateY(-5px);
        color: black;
        text-decoration: underline;
    }

    .hoverbox {
        text-decoration: none
    }

    .hoverbox:hover {
        color: black text-decoration: underline
    }
</style>
<style>
    /* Block */
.bg-gray-50\/30 .grid .block{
 height:75px;
 padding-top:17px;
}

/* Font bold */
.bg-gray-50\/30 .block .font-bold{
 font-size:20px;
 height:26px;
 position:relative;
 top:-4px;
}

/* Heading */
.bg-gray-50\/30 .block h4{
 margin-bottom:0px;
}

/* Justify center */
.bg-gray-50\/30 .grid a.justify-center{
 height:47px;
 transform:translatex(0px) translatey(0px);
 padding-top:5px !important;
 position:relative;
 top:0px;
}

/* Heading */
.bg-gray-50\/30 .grid .justify-center h4{
 margin-bottom:0px !important;
 padding-top:10px;
}

/* Gray 50/30 */
.container .bg-gray-50\/30{
 padding-top:4px;
 padding-bottom:30px;
}


</style>
<x-layout.main.base :metaData="$metaData">

    <section class="py-10 bg-gray-50/30" x-data="{ showModal: false }">

        <!-- Heading -->
        <div class="text-center mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                India Knowledge Webs
            </h1>
        </div>

        <!-- TOP 3 BOXES -->
        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 w-full max-w-2xl">

                <a href="webs/filter/villages"
                    class="text-decoration-none block bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl p-6 text-center shadow-lg hover:scale-105 transition">

                    <h4 class="font-semibold uppercase text-sm">Villages</h4>
                    <h3 class="text-3xl font-bold mt-1">592,765</h3>
                </a>

                <a href="webs/filter/cities"
                    class="text-decoration-none block bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl p-6 text-center shadow-lg hover:scale-105 transition">

                    <h4 class="font-semibold uppercase text-sm">Cities</h4>
                    <h3 class="text-3xl font-bold mt-1">6,331</h3>
                </a>

                <a href="/country-webs-filter"
                    class="text-decoration-none block bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-2xl p-6 text-center shadow-lg hover:scale-105 transition">

                    <h4 class="font-semibold uppercase text-sm">World-Bilateral</h4>
                    <h3 class="text-3xl font-bold mt-1">195</h3>
                </a>

            </div>
        </div>

        @php
        $language=[
        ['name'=>'Tamil','slug'=>'tamil'],
        ['name'=>'English','slug'=>'english'],
        ['name'=>'Bengali','slug'=>'bengali'],
        ['name'=>'Marathi','slug'=>'marathi'],
        ['name'=>'Telugu','slug'=>'telugu'],
        ['name'=>'Gujarati','slug'=>'gujarati'],
        ['name'=>'Kannada','slug'=>'kannada'],
        ['name'=>'Odia','slug'=>'odisha'],
        ['name'=>'Malayalam','slug'=>'malayalam'],
        ['name'=>'Punjabi','slug'=>'punjabi'],
        ['name'=>'Assamese','slug'=>'assamese'],
        ['name'=>'Urdu','slug'=>'urdu'],
        ]
        @endphp

        <!-- LANGUAGE BOXES -->
        <div class="flex justify-center mt-10">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4 w-full">

                <a href="https://humsabek.in/" target="_blank"
                    class="flex items-center justify-center whitespace-nowrap text-center py-2 px-4 h-12 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
                    Hindi Webs
                </a>

                @foreach($language as $key => $value)

                <a href="javascript:void(0)" @click="showModal = true"
                    class="flex items-center justify-center whitespace-nowrap text-center py-2 px-4 h-12 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
                    {{ $value['name'] }} Webs
                </a>

                @endforeach

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



        <!-- Heading -->
        <div class=" text-center mb-6 mt-5">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                Understanding India: Analytics
            </h1>
        </div>

        <div class="flex justify-center px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 w-full max-w-5xl">

                <a href="/india-rural"
                    class="flex flex-col items-center justify-center text-center shadowbox group rounded-2xl border border-emerald-100 min-h-[140px] sm:min-h-[160px]">

                    <h4
                        class="text-xs sm:text-sm font-bold uppercase tracking-[0.2em] sm:tracking-[0.24em] text-emerald-700">
                        Rural
                    </h4>
                    <div class="mt-2 sm:mt-3 h-px w-12 sm:w-16 bg-emerald-200/80"></div>
                </a>

                <a href="/town-webs"
                    class="flex flex-col items-center justify-center text-center shadowbox group rounded-2xl border border-sky-100 min-h-[140px] sm:min-h-[160px]">

                    <h4
                        class="text-xs sm:text-sm font-bold uppercase tracking-[0.2em] sm:tracking-[0.24em] text-sky-700">
                        Urban
                    </h4>
                    <div class="mt-2 sm:mt-3 h-px w-12 sm:w-16 bg-sky-200/80"></div>
                </a>

                <a href="/city-webs"
                    class="flex flex-col items-center justify-center text-center shadowbox group rounded-2xl border border-amber-100 min-h-[140px] sm:min-h-[160px]">

                    <h4
                        class="text-xs sm:text-sm font-bold uppercase tracking-[0.2em] sm:tracking-[0.24em] text-amber-700">
                        Districts
                    </h4>
                    <div class="mt-2 sm:mt-3 h-px w-12 sm:w-16 bg-amber-200/80"></div>
                </a>

                <div"
                    class="flex flex-col items-center justify-center flex-wrap text-center shadowbox group rounded-2xl border border-violet-100 min-h-[140px] sm:min-h-[160px] px-3">

                    <h4
                        class="text-xs sm:text-sm font-bold uppercase tracking-[0.2em] sm:tracking-[0.24em] text-violet-700 mb-2 sm:mb-3">
                        Language Distribution
                    </h4>

                    <div class="flex justify-center gap-2 flex-wrap">

                        <a href="/town-webs-in"
                            class="hoverbox rounded-full bg-white px-3 sm:px-4 py-1 text-sm sm:text-base font-semibold text-slate-700 shadow-md ring-1 ring-slate-200 hover:bg-slate-50 hover:shadow-lg transition">
                            Cities
                        </a>

                        <a href="/village-webs"
                            class="hoverbox rounded-full bg-white px-3 sm:px-4 py-1 text-sm sm:text-base font-semibold text-slate-700 shadow-md ring-1 ring-slate-200 hover:bg-slate-50 hover:shadow-lg transition">
                            Villages
                        </a>

                    </div>
            </div>

        </div>
        </div>

    </section>



</x-layout.main.base>
