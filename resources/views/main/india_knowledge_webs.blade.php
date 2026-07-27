@php
$metaData = [
'nav-heading' => view('components.nav-heading', [
'text' => 'India Knowledge Webs',
'leftImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
'rightImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
]),
'nav-sub-heading' => '',
];


$language = [
['name'=>'Bengali','slug'=>'bengali'],
['name'=>'Marathi','slug'=>'marathi'],
['name'=>'Telugu','slug'=>'telugu'],
['name'=>'Tamil','slug'=>'tamil'],
['name'=>'Urdu','slug'=>'urdu'],
['name'=>'Gujarati','slug'=>'gujarati'],
['name'=>'Kannada','slug'=>'kannada'],
['name'=>'Odia','slug'=>'odisha'],
['name'=>'Malayalam','slug'=>'malayalam'],
['name'=>'Grumukhi','slug'=>'grumukhi'],
['name'=>'Assamese','slug'=>'assamese'],
];

$liveCity=[
['name'=>'Lucknow','slug'=>'lucknow'],
[
    'name' => 'Meerut',
    'slug' => 'meerut',
    'subUrl' => [
        [
            'name' => 'Prarang Domain',
            'url'  => 'https://prarang.in/meerut',
        ],
        [
            'name' => 'Hindi Domain',
            'url'  => 'https://meerutrang.in',
        ],
    ],
],

['name'=>'Rampur','slug'=>'rampur'],
['name'=>'Jaunpur','slug'=>'jaunpur'],
['name'=>'Shahjahanpur','slug'=>'shahjahanpur'],
];
@endphp
<style>
    /* Only kept what Tailwind utilities truly can't express */
    @keyframes shimmer-sweep {
        0% { left: -150%; }
        35% { left: 150%; }
        100% { left: 150%; }
    }
    .shimmer::after {
        content: '';
        position: absolute;
        inset: 0;
        left: -150%;
        width: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,.55), transparent);
        transform: skewX(-25deg);
        animation: shimmer-sweep 3.5s ease-in-out infinite;
        pointer-events: none;
    }
    @media (prefers-reduced-motion: reduce) {
        .shimmer::after { animation: none; display: none; }
    }
    /* Shimmer */
.container .py-6 .shimmer{
 text-decoration:none;
 background-color:rgba(235,243,88,0.45);
 width:207px;
 border-color:#c2db04;
 border-width:1px;
 padding-right:7px !important;
 padding-left:13px !important;
}

/* Tracking wide */
.container .py-6 .tracking-wide{
 text-decoration:none;
}

/* Span Tag */
.container .grid span{
 height:30px;
 border-top-left-radius:0px;
}

/* Division */
.container .py-6 .md\:items-start{
 flex-direction:column;
 justify-content:center;
 align-items:center;
 border-right-width:3px;
}

/* Division */
.md\:flex-row .md\:items-start .md\:justify-start{
 justify-content:center;
 align-items:center;
}

/* Hover */
.md\:items-start .md\:justify-start .hover\:shadow-lg{
 width:123px;
 text-align:center;
 text-decoration:none;
}

/* Hover */
.container .py-6 a.hover\:text-white{
 padding-top:3px !important;
 padding-bottom:3px !important;
 min-height:56px;
 display:flex;
 justify-content:center;
 align-items:center;
 text-decoration:none;
 border-color:rgba(15,74,153,0.49) !important;
}

/* Hover */
.items-stretch .relative .hover\:text-white{
 padding-top:1px !important;
 padding-bottom:6px !important;
}

/* Hover (hover) */
.container .py-6 a.hover\:text-white:hover{
 color:#0940b8;
}

/* Items center */
.hover\:shadow-xl > .items-center{
 padding-top:16px;
 padding-bottom:8px;
}

/* Column 2/12 */
.container .grid a{
 border-top-left-radius:2px;
 border-top-right-radius:0px;
 border-bottom-left-radius:0px;
 border-bottom-right-radius:0px;
 height:184px;
}

/* Image */
.container .py-6 .mx-auto .grid .hover\:shadow-xl .items-center .justify-center img{
 width:110px !important;
}

@media (max-width:576px){

 /* Division */
 .container .py-6 .md\:items-start{
  border-bottom-width:2px;
  padding-bottom:10px;
  border-right-style:none;
 }
 
}
@media (max-width:576px){

 /* Section */
 .container > .py-6{
  padding-top:0px;
  transform:translatex(0px) translatey(0px);
  position:relative;
  top:-41px;
 }
 
 /* Flex */
 .navbar .d-flex{
  height:67px;
 }
 
 /* Grid */
 .container .py-6 .mx-auto .grid{
  grid-template-columns:1fr 1fr !important;
  grid-template-rows:1fr 1fr !important;
 }
 
 /* Grid */
 .container .py-6 .grid{
  align-content:center;
  justify-content:center;
  transform:translatex(0px) translatey(0px);
 }
 
 /* Shimmer */
 .container .py-6 .shimmer{
  width:128px;
  font-size:10px;
 }
 
 /* Tracking wide */
 .container .py-6 .tracking-wide{
  font-size:10px;
 }
 
 /* Link */
 .container .grid a{
  height:178px;
 }
 
}
</style>

<x-layout.main.base :metaData="$metaData">

    <section class="bg-gray-50 py-6" x-data="{ showModal: false }">

        <!-- TOP CARDS -->
        <div class="mx-auto px-4 max-w-6xl">
            <div class="gap-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">

                <!-- Villages -->
                <a href="{{ url('webs/filter/villages') }}"
                   class="group block bg-white shadow-md hover:shadow-xl border border-blue-100 hover:border-blue-300 rounded-3xl overflow-hidden transition hover:-translate-y-1 duration-300">
                    <div class="flex h-2">
                        <span class="flex-1 bg-blue-600"></span>
                        <span class="flex-1 bg-yellow-300"></span>
                        <span class="flex-1 bg-red-600"></span>
                    </div>

                    <div class="flex flex-col items-center gap-2 px-4 py-6">
                        <div class="flex justify-center items-center bg-slate-50 group-hover:bg-blue-50 rounded-full w-14 h-14 transition">
                            <img loading="lazy" src="{{ asset('assets/images/Villages1.png') }}" alt="Villages" class="w-9 h-9 object-contain">
                        </div>
                        <div class="relative bg-yellow-100/60 shadow-sm px-4 py-2 rounded-full overflow-hidden shimmer">
                            <div class="font-bold text-blue-700 text-sm text-center uppercase tracking-wide">Villages</div>
                            <div class="font-semibold text-slate-600 text-sm text-center">592,765</div>
                        </div>
                    </div>

                    <div class="flex h-2">
                        <span class="flex-1 bg-yellow-200"></span>
                        <span class="flex-1 bg-lime-400"></span>
                        <span class="flex-1 bg-green-500"></span>
                    </div>
                </a>

                <!-- Cities -->
                <a href="{{ url('webs/filter/cities') }}"
                   class="group block bg-white shadow-md hover:shadow-xl border border-blue-100 hover:border-blue-300 rounded-3xl overflow-hidden transition hover:-translate-y-1 duration-300">
                    <div class="flex h-2">
                        <span class="flex-1 bg-blue-600"></span>
                        <span class="flex-1 bg-yellow-300"></span>
                        <span class="flex-1 bg-red-600"></span>
                    </div>

                    <div class="flex flex-col items-center gap-2 px-4 py-6">
                        <div class="flex justify-center items-center bg-slate-50 group-hover:bg-blue-50 rounded-full w-14 h-14 transition">
                            <img loading="lazy" src="{{ asset('assets/images/town1.png') }}" alt="Cities" class="w-9 h-9 object-contain">
                        </div>
                        <div class="relative bg-yellow-100/60 shadow-sm px-4 py-2 rounded-full overflow-hidden shimmer">
                            <div class="font-bold text-blue-700 text-sm text-center uppercase tracking-wide">Cities</div>
                            <div class="font-semibold text-slate-600 text-sm text-center">6,331</div>
                        </div>
                    </div>

                    <div class="flex h-2">
                        <span class="flex-1 bg-yellow-200"></span>
                        <span class="flex-1 bg-lime-400"></span>
                        <span class="flex-1 bg-green-500"></span>
                    </div>
                </a>

                <!-- World -->
                <a href="{{ url('/country-webs-filter') }}"
                   class="group block sm:col-span-2 lg:col-span-1 bg-white shadow-md hover:shadow-xl border border-blue-100 hover:border-blue-300 rounded-3xl overflow-hidden transition hover:-translate-y-1 duration-300">
                    <div class="flex h-2">
                        <span class="flex-1 bg-blue-600"></span>
                        <span class="flex-1 bg-yellow-300"></span>
                        <span class="flex-1 bg-red-600"></span>
                    </div>

                    <div class="flex flex-col items-center gap-2 px-4 py-6">
                        <div class="flex justify-center items-center bg-slate-50 group-hover:bg-blue-50 rounded-full w-14 h-14 transition">
                            <img loading="lazy" src="{{ asset('assets/images/World.png') }}" alt="World Bilateral" class="w-9 h-9 object-contain">
                        </div>
                        <div class="relative bg-yellow-100/60 shadow-sm px-5 py-2 rounded-full overflow-hidden shimmer">
                            <div class="font-bold text-blue-700 text-sm text-center uppercase tracking-wide">World-Bilateral</div>
                            <div class="font-semibold text-slate-600 text-sm text-center">194</div>
                        </div>
                    </div>

                    <div class="flex h-2">
                        <span class="flex-1 bg-yellow-200"></span>
                        <span class="flex-1 bg-lime-400"></span>
                        <span class="flex-1 bg-green-500"></span>
                    </div>
                </a>

            </div>
        </div>

        <!-- LANGUAGE BUTTONS -->
        <div class="mx-auto mt-8 px-4 max-w-6xl">
            <div class="flex md:flex-row flex-col gap-6 bg-white shadow-lg p-5 rounded-2xl">

                <div class="flex flex-col items-center md:items-start w-full md:w-auto md:min-w-[220px]">
                    <div class="flex items-center gap-2 mb-3 font-bold text-gray-500 text-sm uppercase tracking-wider">
                        Hindi
                        <span class="inline-flex items-center gap-1.5 bg-green-50 px-2 py-0.5 rounded-full font-bold text-[10px] text-green-700 uppercase">
                            <span class="bg-green-600 rounded-full w-1.5 h-1.5 animate-pulse"></span>
                            Live
                        </span>
                    </div>
                    <div class="flex flex-wrap justify-center md:justify-start gap-2 w-full">
                        @foreach ($liveCity as $ct)
                        @isset($ct['subUrl'])
                        <div x-data="{ open: false }" @click.outside="open = false" class="relative">
                            <button type="button" @click="open = !open"
                                    class="bg-gradient-to-br from-blue-600 to-blue-800 shadow-md hover:shadow-lg px-4 py-2 rounded-full font-semibold text-white text-sm transition hover:-translate-y-0.5">
                                {{ $ct['name'] }}
                                <i class="text-sm transition-transform bi bi-chevron-down" :class="open && 'rotate-180'"></i>
                            </button>
                            <div x-show="open" x-transition x-cloak
                                 class="top-[calc(100%+6px)] left-0 z-10 absolute bg-white shadow-xl rounded-xl w-full overflow-hidden">
                                @foreach ($ct['subUrl'] as $sub)
                                <a href="{{ $sub['url'] }}" target="_blank"
                                   class="block hover:bg-blue-50 px-4 py-2.5 text-gray-700 hover:text-blue-700 text-sm text-left transition">
                                    {{ $sub['name'] }}
                                </a>
                                @endforeach
                            </div>
                        </div>                         
                      @else
                        <a href="/{{ $ct['slug'] }}"
                           class="bg-gradient-to-br from-blue-600 to-blue-800 shadow-md hover:shadow-lg px-4 py-2 rounded-full font-semibold text-white text-sm transition hover:-translate-y-0.5">
                            {{ $ct['name'] }}
                        </a>
                          @endisset
                        @endforeach
                        <a href="https://humsabek.in/"
                           class="bg-gradient-to-br from-blue-600 to-blue-800 shadow-md hover:shadow-lg px-4 py-2 rounded-full font-semibold text-white text-sm transition hover:-translate-y-0.5">
                            All
                        </a>
                    </div>
                </div>

                <div class="gap-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 w-full">
                    @foreach($language as $value)
                    <button type="button" @click="showModal = true"
                       class="bg-slate-100 hover:bg-white shadow-sm hover:shadow-md px-3 py-2 border border-transparent hover:border-blue-300 rounded-full font-medium text-slate-700 hover:text-blue-700 text-sm transition hover:-translate-y-0.5">
                        {{ $value['name'] }} Web
                    </button>
                    @endforeach
                </div>

            </div>
        </div>

        <!-- MODAL -->
        <div x-show="showModal" x-transition x-cloak
             class="z-50 fixed inset-0 flex justify-center items-center bg-black/40 p-4"
             @click.self="showModal = false">
            <div class="bg-white shadow-2xl p-6 rounded-2xl w-full max-w-xs text-center">
                <h3 class="mb-2 font-bold text-xl">Coming Soon</h3>
                <p class="mb-4 text-gray-500">India Stack Language Localization</p>
                <button @click="showModal = false"
                        class="bg-blue-600 hover:bg-blue-700 py-2 rounded-lg w-full text-white transition">
                    Close
                </button>
            </div>
        </div>

        <!-- ANALYTICS HEADING -->
        <div class="mt-12 mb-6 text-center">
            <h1 class="font-bold text-gray-800 text-xl md:text-2xl">Understanding India: Analytics</h1>
        </div>

        <!-- ANALYTICS -->
        <div class="mx-auto px-4 max-w-5xl">
            <div class="flex flex-wrap justify-center items-stretch gap-4">

                <a href="{{ url('/india-rural') }}"
                   class="flex-1 bg-white hover:bg-blue-600 shadow-sm hover:shadow-lg px-5 py-3 border border-blue-100 rounded-xl min-w-[140px] sm:min-w-[180px] max-w-[240px] font-semibold text-blue-600 hover:text-white text-center transition hover:-translate-y-1">
                    Rural
                </a>

                <a href="{{ url('/town-webs') }}"
                   class="flex-1 bg-white hover:bg-blue-600 shadow-sm hover:shadow-lg px-5 py-3 border border-blue-100 rounded-xl min-w-[140px] sm:min-w-[180px] max-w-[240px] font-semibold text-blue-600 hover:text-white text-center transition hover:-translate-y-1">
                    Urban
                </a>

                <a href="{{ url('/city-webs') }}"
                   class="flex-1 bg-white hover:bg-blue-600 shadow-sm hover:shadow-lg px-5 py-3 border border-blue-100 rounded-xl min-w-[140px] sm:min-w-[180px] max-w-[240px] font-semibold text-blue-600 hover:text-white text-center transition hover:-translate-y-1">
                    Districts
                </a>

                <div class="relative flex-1 min-w-[140px] sm:min-w-[180px] max-w-[240px]"
                     x-data="{ open: false }" @click.outside="open = false">
                    <button type="button" @click="open = !open"
                            class="flex justify-center items-center gap-1 bg-white hover:bg-blue-600 shadow-sm hover:shadow-lg px-5 py-3 border border-blue-100 rounded-xl w-full font-semibold text-blue-600 hover:text-white transition hover:-translate-y-1">
                        Language Distribution
                        <i class="text-sm transition-transform bi bi-chevron-down" :class="open && 'rotate-180'"></i>
                    </button>

                    <div x-show="open" x-transition x-cloak
                         class="top-[calc(100%+6px)] left-0 z-10 absolute bg-white shadow-xl rounded-xl w-full overflow-hidden">
                        <a href="/town-webs-in" target="_blank" class="block hover:bg-blue-50 px-4 py-2.5 text-gray-700 hover:text-blue-700 text-sm text-left transition">Cities</a>
                        <a href="/village-webs" target="_blank" class="block hover:bg-blue-50 px-4 py-2.5 text-gray-700 hover:text-blue-700 text-sm text-left transition">Villages</a>
                    </div>
                </div>

            </div>
        </div>

    </section>

</x-layout.main.base>


