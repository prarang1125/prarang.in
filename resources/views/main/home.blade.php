<x-layout.main.base>

    <section class="px-5 max-w-7xl mx-auto bg-gray-50/30 rounded-3xl my-10 " x-data="{ showOthersModal: false }">
        <style>
            /* Image */
            .mx-auto>div>img {
                width: 230px;
                position: absolute;
                top: -222px;
                left: -52px;
            }

            /* Division */
            .container .mx-auto>div {
                transform: translatex(0px) translatey(0px);
            }

            @media (max-width:1005px) {

                /* Image */
                .container .mx-auto>div>img {
                    transform: translatex(-19px) translatey(170px) !important;
                }
            }

            @media (max-width:576px) {

                /* Auto */
                .container .mx-auto {
                    padding-top: 54px;
                }

                /* Image */
                .mx-auto>div>img {
                    top: -272px;
                    left: 121px;
                }

                /* Image */
                .container .mx-auto>div>img {
                    transform: translatex(-46px) translatey(168px) !important;
                }

            }



            /* Table Data */
            .container .mx-auto .flex-wrap div .border .justify-center .border-separate tbody tr .py-1 {
                width: 100% !important;
            }

            /* Link */
            .flex-wrap .py-1 a {
                width: 299px;
                border-top-left-radius: 6px;
                border-top-right-radius: 6px;
                border-bottom-left-radius: 6px;
                border-bottom-right-radius: 6px;
                text-decoration: none;
            }

            /* Border */
            .flex-wrap div .border {
                padding-right: 0px !important;
                padding-left: 1px !important;
            }

            /* Link */
            .flex-wrap .px-2 a {
                margin-left: 0px;
                width: 140px;
                text-decoration: none;
            }

            /* Heading */
            .flex-wrap .country-s h5 {
                color: #020202 !important;
            }

            /* City */
            .flex-wrap div .city-s {
                padding-right: 0px !important;
                padding-left: 0px !important;
            }

            /* Division */
            .flex-wrap div .mt-2 {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }

            /* Link */
            .city-s .px-2 a {
                border-top-left-radius: 6px;
                border-top-right-radius: 6px;
                border-bottom-left-radius: 6px;
                border-bottom-right-radius: 6px;
            }

            /* Link */
            .flex-wrap .mt-2 .px-2 a {
                border-top-left-radius: 6px;
                border-top-right-radius: 6px;
                border-bottom-left-radius: 6px;
                border-bottom-right-radius: 6px;
            }

            /* Link */
            .city-s .py-1 a {
                width: 150px !important;
            }

            /* Link */
            .city-s .px-2 a {
                display: flex;
                flex-direction: column;
                height: 45px;
                padding-top: 6px !important;
            }

            /* Span Tag */
            .city-s tr span {
                font-size: 11px;
            }

            /* Span Tag */
            .flex-wrap tr:nth-child(1) span:nth-child(2) {
                font-size: 14px;
            }

            /* Span Tag */
            .flex-wrap tr:nth-child(3) span:nth-child(2) {
                font-size: 14px;
            }

            /* Justify items center */
            .city-s tr .justify-items-center {
                justify-content: center;
                height: 15px;
                padding-left: 0px;
                padding-top: 1px;
            }

            /* Image */
            .city-s .justify-items-center img {
                max-width: 100px;
                height: 20px;
                top: 0px !important;
            }

            /* Image */
            .city-s .justify-center .border-separate tbody tr td .justify-items-center img {
                min-height: 0px !important;
                left: 0px !important;
            }

            /* Image */
            .container .mx-auto .flex-wrap div .city-s .justify-center .border-separate tbody tr td .justify-items-center img {
                height: 20px !important;
            }

            /* Link */
            .flex-wrap div .city-s .justify-center .border-separate tbody tr .py-1 a {
                width: 140px !important;
            }

            /* Link */
            .city-s .py-1 a {
                height: 45px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* Table Data */
            .city-s tr .py-1 {
                padding-left: 8px;
                padding-right: 8px;
            }
        </style>
        <style>
            /* Full */
            .desktop-grid .box .w-full {
                padding-top: 10px;
                padding-bottom: 1px;
            }

            /* Tracking tight */
            .desktop-grid .box .tracking-tight {
                font-size: 20px;
            }

            /* City webs card */
            #cityWebsCard {
                padding-top: 8px;
                padding-bottom: 9px;
            }

            /* Country webs card */
            #countryWebsCard {
                padding-top: 7px;
                padding-bottom: 11px;
            }

            /* Language webs card */
            #languageWebsCard {
                padding-top: 9px;
                padding-bottom: 6px;
            }

            /* Auto */
            .container .mx-auto {
                margin-top: 1px;
            }
        </style>
        <style>
            /* Justify center */
            .desktop-grid .box a.justify-center {
                font-size: 22px;
                padding-left: 20px;
                padding-right: 20px;
                padding-top: 20px;
                padding-bottom: 20px;
                border-color: #3e3737;
                border-width: 2px;
                min-height: 165px;
            }

            /* Justify center */
            .desktop-grid .box a.justify-center {
                text-align: center;
                text-decoration: none;
                border-top-left-radius: 12px;
                border-top-right-radius: 12px;
                border-bottom-left-radius: 12px;
                border-bottom-right-radius: 12px;
            }

            /* Box */
            .container .desktop-grid .box:nth-child(11) {
                padding-right: 22px;
                padding-left: 22px;
                /* transform:translatex(0px) translatey(0px); */
                height: 165px;
            }

            /* Justify center */
            .desktop-grid .box:nth-child(11) .justify-center:nth-child(3) {
                max-width: 213px;
            }

            .desktop-grid .box:nth-child(8) .bi {
                margin-left: 35px;
            }

            /* Box */
            .container .desktop-grid .box:nth-child(13) {
                padding-left: 27px;
                padding-right: 0px;
                height: 165px;
            }

            /* Box */
            .container .desktop-grid .box:nth-child(12) {
                height: 165px;
            }

            /* Desktop grid */
            .container .mx-auto .desktop-grid {
                height: 532px;
            }

            /* Transition all */
            .desktop-grid .box .transition-all {
                height: 279px;
            }

            /* Link */
            .desktop-grid .box a {
                padding-bottom: 2px !important;
                padding-top: 5px !important;
                padding-left: 8px !important;
                padding-right: 5px !important;
            }

            /* Box */
            .mx-auto .desktop-grid .box {
                padding-left: 4px !important;
                /* transform:translatex(0px) translatey(0px); */
            }

            /* Justify between */
            .desktop-grid .box:nth-child(13) .justify-between:nth-child(3) {
                max-width: 123px;
            }

            /* Transition all */
            .desktop-grid .box .transition-all {
                background-color: rgba(0, 0, 0, 0) !important;
                border-top-left-radius: 20px !important;
                border-top-right-radius: 20px !important;
                border-bottom-left-radius: 20px !important;
                border-bottom-right-radius: 20px !important;
            }

            /* Transition all */
            .desktop-grid .box:nth-child(1) .transition-all {
                background-color: blue !important;
                color: #ffffff;
            }

            /* Heading */
            /* .desktop-grid .box h2 {
                transform: translatex(0px) translatey(0px);
            } */

            /* Tracking tight */
            .desktop-grid .box:nth-child(1) .tracking-tight {
                color: #ffffff;
            }

            /* Transition all */
            .desktop-grid .box:nth-child(3) .transition-all {
                background-color: yellow !important;
            }

            /* Transition all */
            .desktop-grid .box:nth-child(5) .transition-all {
                background-color: #f33434 !important;
                /* transform:translatex(0px) translatey(0px); */
            }

            /* Tracking tight */
            .desktop-grid .box:nth-child(5) .tracking-tight {
                color: #ffffff;
            }

            /* Justify between */
            .desktop-grid .box .justify-between:nth-child(5) {
                width: 306px;
            }

            /* Box */
            .mx-auto .desktop-grid .box {
                padding-right: 0px !important;
            }

            /* Justify between */
            .container .mx-auto .desktop-grid .box:nth-child(11) .justify-center .justify-between:nth-child(3) {
                width: 27% !important;
            }

            /* Italic Tag */
            .desktop-grid .box>.justify-center>.bi {
                margin-left: 0px !important;
            }

            /* Link (hover) */
            .desktop-grid .box a:hover {
                /* border-width:4px !important; */
                border-right-color: red;
                border-bottom-color: black;
                border-left-color: blue;
                border-top-color: gray;
                border-top-width: 2px !important;
                /* font-weight: 700 !important; */
                color: blue !important;

                transition: border-width 0.2s ease, border-color 0.2s ease;
            }

            /* Full */
            .desktop-grid .box:nth-child(14) .w-full {
                /* transform:translatex(0px) translatey(0px); */
                padding-top: 0px;
                padding-bottom: 4px;
            }

            /* Full */
            .desktop-grid .box:nth-child(16) .w-full {
                padding-top: 0px;
                padding-bottom: 5px;
            }

            /* Link */
            .desktop-grid .w-full a {
                text-decoration: none;
            }

            /* Link (hover) */
            .desktop-grid .w-full a:hover {
                color: #ebedee !important;
            }

            /* Justify between */
            .desktop-grid .box .justify-between:nth-child(5) {
                margin-right: 23px;
            }
        </style>

        <!-- DESKTOP -->
        <div class="desktop-grid">

            <div class="box rounded b1">
                <div
                    class="group border-[2px] border-gray-200 rounded p-8 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        City/Village Webs
                    </h2>
                    <div id="cityWebsCard"
                        class="border-2 border-blue-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-blue-400 transition-colors">

                        <div onclick="showImage('{{ asset('assets/images/home/city-portal.jpg') }}')"
                            class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('assets/images/home/3.png') }}" alt="City Icon"
                                class=" object-contain drop-shadow-md">
                        </div>

                    </div>
                </div>
            </div>
            <div class="box b2">
                <div class=" hidden lg:flex items-center justify-center text-4xl text-dark ">
                    <i class=" bi bi-arrow-right-circle-fill"></i>
                </div>
            </div>
            <div class="box rounded  b3">
                <div
                    class="group border-[2px] border-gray-200 rounded-[2.5rem] p-8 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        Country Webs
                    </h2>
                    <div id="countryWebsCard"
                        class="border-2 border-red-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-red-400 transition-colors">
                        <div onclick="showImage('{{ asset('assets/images/home/country-portal.jpg') }}')"
                            class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('assets/images/home/2.png') }}" alt="Country Icon"
                                class="object-contain drop-shadow-md">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box b4">
                <div class=" hidden lg:flex items-center justify-center text-4xl text-dark ">
                    <i class=" bi bi-arrow-left-circle-fill"></i>
                </div>
            </div>
            <div class="box b5">
                <div style="background: #FFFF00;"
                    class="group border-[2px] border-gray-200 rounded-[2.5rem] p-8 w-full sm:w-80 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <h2 class="text-2xl font-black text-gray-800 tracking-tight text-center uppercase">
                        Language Webs
                    </h2>
                    <div id="languageWebsCard"
                        class="border-2 border-yellow-200 rounded-3xl p-10 mb-8 bg-white shadow-inner relative overflow-hidden group-hover:border-yellow-400 transition-colors">

                        <div onclick="showImage('{{ asset('assets/images/home/language-portal.jpg') }}')"
                            class="flex justify-center mb-6 transform group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('assets/images/home/1.png') }}" alt="Language Icon"
                                class=" object-contain drop-shadow-md">
                        </div>
                    </div>

                </div>
            </div>
            <div class="box b6"></div>
            <div class="box b7"></div>
            <div class="box  b8">
                <div class=" hidden lg:flex items-center justify-center text-4xl text-dark ">
                    <i class=" bi bi-arrow-down-circle-fill"></i>
                </div>
            </div>
            <div class="box b9"></div>
            <div class="box b10"></div>
            <div class="box  b11">
                <div class="flex gap-4  items-center justify-center">
                    <a href="javascript:void(0)"
   @click="showOthersModal = true"
                        class="hidden lg:flex items-center justify-center  text-4xl text-dark flex-col  justify-between">
                        <div class="flex items-center justify-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-blue-600"></div>
                            <div class="w-6 h-6 rounded-full bg-yellow-400"></div>
                            <div class="w-6 h-6 rounded-full bg-red-600"></div>
                        </div>
                        Others<br> <br>
                    </a>
                    <div class="hidden lg:flex items-center justify-center text-xl text-dark">
                        <i class="bi bi-plus-circle-fill"></i>
                    </div>
                    <a href=""
                        class="hidden lg:flex items-center justify-center flex-col justify-between text-4xl text-dark">
                        <div class="flex items-center justify-center gap-4">
                            <div class="w-6 h-6 rounded-full bg-blue-600"></div>
                            <div class="w-6 h-6 rounded-full bg-yellow-400"></div>
                            <div class="w-6 h-6 rounded-full bg-red-600"></div>
                        </div>
                        Nepal <br> Knowladge Webs <br><br>
                    </a>
                    <div class="hidden lg:flex items-center justify-center text-xl text-dark">
                        <i class="bi bi-plus-circle-fill"></i>
                    </div>
                    <a href="/india-knowledge-webs"
                        class="hidden lg:flex items-center justify-center flex-col justify-between text-4xl text-dark">
                        <div class="flex items-center justify-center gap-4">
                            <div class="w-6 h-6 rounded-full bg-blue-600"></div>
                            <div class="w-6 h-6 rounded-full bg-yellow-400"></div>
                            <div class="w-6 h-6 rounded-full bg-red-600"></div>
                        </div>
                        India <br> Knowladge Webs <br> <br>
                    </a>
                </div>
            </div>
            <div class="box b12"></div>
            <div class="box b13">
                <div class="flex gap-4  items-center justify-center">


                    <a href="https://indiaczech.com" target="_blank"
                        class="hidden lg:flex flex-col items-center justify-center justify-between text-4xl text-dark">
                        <div class="flex items-center justify-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-blue-600"></div>
                            <div class="w-6 h-6 rounded-full bg-yellow-400"></div>
                            <div class="w-6 h-6 rounded-full bg-red-600"></div>
                        </div>
                        Czech Knowladge Webs
                    </a>
                    <div class="hidden lg:flex items-center justify-center text-xl text-dark">
                        <i class="bi bi-plus-circle-fill"></i>
                    </div>
                    <a href="javascript:void(0)"
   @click="showOthersModal = true"
                        class="hidden lg:flex  flex-col items-center justify-center justify-between text-4xl text-dark">
                        <div class="flex items-center justify-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-blue-600"></div>
                            <div class="w-6 h-6 rounded-full bg-yellow-400"></div>
                            <div class="w-6 h-6 rounded-full bg-red-600"></div>
                        </div>
                        Others<br> <br>
                    </a>
                </div>
            </div>
            <div class="box b14">
                <div class="flex gap-4  items-center justify-center  bg-blue-600 w-full">
                    <a href="/lang-webs?q=digital-divide-languages" class="text-light">Digital Divide 148</a>
                </div>
            </div>
            <div class="box b15"></div>
            <div class="box b16">
                <div class="flex gap-4  items-center justify-center bg-blue-600 w-full">
                    <a href="/lang-webs?q=digital-balance-languages" class="text-light">Digital Balance 30</a>
                </div>
            </div>
        </div>


        <!-- MOBILE -->
        <div class="mobile-grid">
            <div class="box rounded m1">1</div>
            <div class="box m2">2</div>
            <div class="box rounded yellow m3">3</div>
            <div class="box yellow m8">8</div>
            <div class="box yellow m11">11</div>
            <div class="box rounded m5">5</div>
            <div class="box m4">4</div>
            <div class="box m6">6</div>
            <div class="box m7">7</div>
            <div class="box m10">10</div>
            <div class="box m9">9</div>
            <div class="box m13">13</div>
            <div class="box m12">12</div>
            <div class="box m14">14</div>
            <div class="box m15">15</div>
        </div>


         <!-- Others Coming Soon Modal -->
<div x-show="showOthersModal"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95"
     class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-gray-900/40 backdrop-blur-sm"
     @click.self="showOthersModal = false"
     x-cloak>

    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full text-center border border-gray-100">

        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 border border-blue-100">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>

        <h3 class="text-xl font-bold text-gray-900 mb-2">
            Coming Soon 🚀
        </h3>

        <p class="text-gray-500 mb-6">
            Country stack to be Activated
        </p>

        <button @click="showOthersModal = false"
                class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-all active:scale-95">
            Close
        </button>

    </div>
</div>


    </section>



    <!-- Custom Tooltips -->
    <div id="cityTooltip" class="custom-tooltip tooltip-blue">
        <h1 class="text-center">City Portal</h1>
        <img class="w-100 h-100 rounded" src="{{ asset('assets/images/home/city-portal.jpg') }}" alt="">
    </div>

    <div id="languageTooltip" class="custom-tooltip tooltip-yellow">
        <h1 class="text-center">Language Portal</h1>
        <img class="w-100 h-100 rounded" src="{{ asset('assets/images/home/language-portal.jpg') }}" alt="">
    </div>

    <div id="countryTooltip" class="custom-tooltip tooltip-red">
        <h1 class="text-center">Country Portal</h1>
        <img class="w-100 h-100 rounded" src="{{ asset('assets/images/home/country-portal.jpg') }}" alt="">
    </div>

    <style>
        .box {

            display: flex;
            align-items: center;
            justify-content: center;

        }

        .yellow {
            background: #FFE500;
        }

        .rounded {
            border-radius: 20px;
        }

        /* ── DESKTOP GRID ── */
        /* 5 columns: equal big | thin | equal big | thin | equal big */
        /* 4 rows:    big | thin | medium | thin */
        .desktop-grid {
            display: grid;
            gap: 6px;
            width: 100%;
            height: calc(100vh - 20px);
            grid-template-columns: 1fr 36px 1fr 36px 1fr;
            grid-template-rows: 2fr 44px 1.5fr 44px;
        }

        .b1 {
            grid-column: 1;
            grid-row: 1;
        }

        .b2 {
            grid-column: 2;
            grid-row: 1;
        }

        .b3 {
            grid-column: 3;
            grid-row: 1;
        }

        .b4 {
            grid-column: 4;
            grid-row: 1;
        }

        .b5 {
            grid-column: 5;
            grid-row: 1;
        }

        .b6 {
            grid-column: 1;
            grid-row: 2;
        }

        .b7 {
            grid-column: 2;
            grid-row: 2;
        }

        .b8 {
            grid-column: 3;
            grid-row: 2;
        }

        .b9 {
            grid-column: 4;
            grid-row: 2;
        }

        .b10 {
            grid-column: 5;
            grid-row: 2;
        }

        .b11 {
            grid-column: 1 / 4;
            grid-row: 3;
        }

        .b12 {
            grid-column: 4;
            grid-row: 3;
        }

        .b13 {
            grid-column: 5;
            grid-row: 3;
        }

        .b14 {
            grid-column: 1 / 4;
            grid-row: 4;
        }

        .b15 {
            grid-column: 4;
            grid-row: 4;
        }

        .b16 {
            grid-column: 5;
            grid-row: 4;
        }

        /* ── MOBILE GRID ── */
        .mobile-grid {
            display: none;
        }

        @media (max-width: 600px) {
            .desktop-grid {
                display: none;
            }

            .mobile-grid {
                display: grid;
                gap: 5px;
                width: 100%;
                height: calc(100vh - 20px);
                grid-template-columns: 1fr 36px;
                grid-template-rows: 2fr 44px 2fr 44px 1.5fr 44px 2fr 1.5fr 44px;
            }

            .m1 {
                grid-column: 1;
                grid-row: 1;
            }

            .m2 {
                grid-column: 2;
                grid-row: 1;
            }

            .m3 {
                grid-column: 1 / 3;
                grid-row: 2;
            }

            .m8 {
                grid-column: 1 / 3;
                grid-row: 3;
            }

            .m11 {
                grid-column: 1 / 3;
                grid-row: 4;
            }

            .m5 {
                grid-column: 1;
                grid-row: 5;
            }

            .m4 {
                grid-column: 2;
                grid-row: 5;
            }

            .m6 {
                grid-column: 1;
                grid-row: 6;
            }

            .m7 {
                grid-column: 2;
                grid-row: 6;
            }

            .m10 {
                grid-column: 1;
                grid-row: 7;
            }

            .m9 {
                grid-column: 2;
                grid-row: 7;
            }

            .m13 {
                grid-column: 1;
                grid-row: 8;
            }

            .m12 {
                grid-column: 2;
                grid-row: 8;
            }

            .m14 {
                grid-column: 1;
                grid-row: 9;
            }

            .m15 {
                grid-column: 2;
                grid-row: 9;
            }
        }
    </style>

    <style>
        /* Link */
        .city-s .px-2 a {
            justify-content: center;
            align-items: center;
        }

        .custom-tooltip {
            position: fixed;
            display: none;
            color: white;
            padding: 18px 24px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3),
                0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            pointer-events: none;
            max-width: 320px;
            opacity: 0;
            transform: scale(0.85);
            transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                left 0.08s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                top 0.08s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            will-change: left, top, transform, opacity;
        }

        .custom-tooltip.show {
            display: block;
            opacity: 1;
            transform: scale(1);
        }

        .custom-tooltip h1 {
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 10px 0;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .custom-tooltip p {
            font-size: 15px;
            margin: 0;
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.6;
        }

        /* Speech bubble arrow */
        .custom-tooltip::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 24px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            filter: drop-shadow(0 -2px 3px rgba(0, 0, 0, 0.1));
            transition: all 0.2s ease;
        }

        .custom-tooltip.tooltip-blue::before {
            border-bottom: 10px solid #667eea;
        }

        .custom-tooltip.tooltip-yellow::before {
            border-bottom: 10px solid #f7dc6f;
        }

        .custom-tooltip.tooltip-red::before {
            border-bottom: 10px solid #ef4444;
        }

        .custom-tooltip.arrow-bottom::before {
            top: auto;
            bottom: -10px;
            border-bottom: none;
            filter: drop-shadow(0 2px 3px rgba(0, 0, 0, 0.1));
        }

        .custom-tooltip.tooltip-blue.arrow-bottom::before {
            border-top: 10px solid #764ba2;
        }

        .custom-tooltip.tooltip-yellow.arrow-bottom::before {
            border-top: 10px solid #f0c419;
        }

        .custom-tooltip.tooltip-red.arrow-bottom::before {
            border-top: 10px solid #dc2626;
        }

        .custom-tooltip.arrow-left::before {
            left: 24px;
        }

        .custom-tooltip.arrow-right::before {
            left: auto;
            right: 24px;
        }

        /* Blue Tooltip (City Webs) */
        .tooltip-blue {
            background: linear-gradient(135deg, #255fec 0%, #1e4fd9 100%);
            box-shadow: 0 15px 40px rgba(37, 95, 236, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Yellow Tooltip (Language Webs) */
        .tooltip-yellow {
            background: linear-gradient(135deg, #ffd700 0%, #ffb700 100%);
            box-shadow: 0 15px 40px rgba(255, 215, 0, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Red Tooltip (Country Webs) */
        .tooltip-red {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            box-shadow: 0 15px 40px rgba(231, 76, 60, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Reusable tooltip handler function
            function initTooltip(cardId, tooltipId) {
                const card = document.getElementById(cardId);
                const tooltip = document.getElementById(tooltipId);

                if (!card || !tooltip) return;

                let tooltipOffset = 20;
                let isHovering = false;
                let animationFrameId = null;

                const mediaQuery = window.matchMedia("(min-width: 768px)");
                if (mediaQuery.matches) {
                    card.addEventListener('mouseenter', function() {
                        isHovering = true;
                        tooltip.classList.add('show');
                    });
                }

                card.addEventListener('mousemove', function(e) {
                    if (!isHovering) return;

                    // Cancel any pending animation frame
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                    }

                    // Use requestAnimationFrame for smooth updates
                    animationFrameId = requestAnimationFrame(() => {
                        const viewportWidth = window.innerWidth;
                        const viewportHeight = window.innerHeight;
                        const tooltipRect = tooltip.getBoundingClientRect();

                        let x = e.clientX + tooltipOffset;
                        let y = e.clientY + tooltipOffset;
                        let arrowPositionRight = false;

                        // Check if tooltip would overflow right edge
                        if (x + tooltipRect.width > viewportWidth - 10) {
                            x = e.clientX - tooltipRect.width - tooltipOffset;
                            arrowPositionRight = true;
                        }

                        // Check if tooltip would overflow bottom edge
                        if (y + tooltipRect.height > viewportHeight - 10) {
                            y = e.clientY - tooltipRect.height - tooltipOffset;
                            tooltip.classList.add('arrow-bottom');
                        } else {
                            tooltip.classList.remove('arrow-bottom');
                        }

                        // Ensure tooltip doesn't go off left edge
                        if (x < 10) {
                            x = 10;
                            arrowPositionRight = false;
                        }

                        // Ensure tooltip doesn't go off top edge
                        if (y < 10) {
                            y = 10;
                        }

                        // Update arrow position classes
                        if (arrowPositionRight) {
                            tooltip.classList.add('arrow-right');
                            tooltip.classList.remove('arrow-left');
                        } else {
                            tooltip.classList.add('arrow-left');
                            tooltip.classList.remove('arrow-right');
                        }

                        tooltip.style.left = x + 'px';
                        tooltip.style.top = y + 'px';
                    });
                });

                card.addEventListener('mouseleave', function() {
                    isHovering = false;
                    tooltip.classList.remove('show');

                    // Cancel any pending animation frame
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                        animationFrameId = null;
                    }
                });
            }

            // Initialize tooltips for all three cards
            initTooltip('cityWebsCard', 'cityTooltip');
            initTooltip('languageWebsCard', 'languageTooltip');
            initTooltip('countryWebsCard', 'countryTooltip');
        });



        const showImage = (image) => {

            const url = new URL(image, window.location.origin);
            window.open(url.toString(), '_blank');
        }
    </script>
</x-layout.main.base>
