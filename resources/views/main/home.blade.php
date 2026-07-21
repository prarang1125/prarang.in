<x-layout.main.base>
    <style>
        .divider {
            border-top: 1px solid #d6dae3;
        }

        .dots {
            display: flex;
            gap: 6px;
            margin-bottom: 8px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 9999px;
        }

        .dot-blue {
            background: #2563eb;
        }

        .dot-yellow {
            background: #facc15;
        }

        .dot-red {
            background: #ef4444;
        }

        a {
            text-decoration: none !important;
        }
    </style>
    <div class="aalu">

        <!-- Title -->
        <div class="py-3 text-center rounded-lg shadow-sm bg-slate-200">
            <h1 class="text-xl font-semibold tracking-wide text-slate-800">Country stack — knowledge webs</h1>
        </div>

        <!-- Country cards row -->
        <div class="grid items-start grid-cols-1 gap-5 mt-8 md:grid-cols-5">
            <!-- Nepal -->
            <div>
                <div class="flex justify-center mb-3">
                    <span class="text-sm font-semibold text-slate-700">Nepal <span class="font-normal text-slate-400">—
                            WIP</span></span>
                </div>
                <!-- <a href="" target="_blank" rel="noopener noreferrer"> -->
                <a href="https://www.prarang.in/nepal-knowledge-webs">
                    <div class="p-4 space-y-3 bg-white border shadow-sm border-slate-300 rounded-2xl">
                        <div class="dots"><span class="dot dot-blue"></span><span class="dot dot-yellow"></span><span
                                class="dot dot-red"></span></div>
                        <div class="grid grid-cols-7 gap-2">

                            <button
                                class="flex flex-col justify-center h-20 col-span-4 px-2 text-center transition bg-blue-600 rounded-md shadow-sm hover:bg-blue-700">
                                <div class="text-xs text-blue-100">Cities / towns</div>
                                <div class="text-xs font-semibold text-white">293</div>
                            </button>
                            <button
                                class="flex flex-col justify-center h-20 col-span-3 px-1 text-center transition bg-yellow-300 rounded-md shadow-sm hover:bg-yellow-400">
                                <div class="text-xs leading-tight text-yellow-900"> Rural mnpl.</div>
                                <div class="text-xs font-bold leading-none text-yellow-950">460</div>
                            </button>
                        </div>
                        <button class="w-full text-center transition bg-red-500 rounded-md shadow-sm hover:bg-red-600">
                            <div class="text-xs text-red-100">World bilateral</div>
                            <div class="text-lg font-semibold text-white">194</div>
                        </button>
                        <!-- </a> -->
                    </div>
                </a>
            </div>

            <!-- India -->
            <div>
                <div class="flex justify-center mb-3">
                    <span class="text-sm font-semibold px-2 py-0.5 rounded bg-yellow-300 text-slate-800">India —
                        live</span>
                </div>
                <a href="https://www.prarang.in/india-knowledge-webs">
                    <div
                        class="relative z-10 p-4 space-y-3 transform scale-110 bg-white border shadow-md border-slate-400 rounded-2xl ">
                        <div class="dots"><span class="dot dot-blue"></span><span class="dot dot-yellow"></span><span
                                class="dot dot-red"></span></div>
                        <div class="grid grid-cols-7 gap-2">
                            <button
                                class="flex flex-col justify-center h-20 col-span-4 px-2 text-center transition bg-blue-600 rounded-md shadow-sm hover:bg-blue-700">
                                <div class="text-xs text-blue-100">Cities / towns</div>
                                <div class="text-xs font-semibold text-white">6,331</div>
                            </button>
                            <button
                                class="no-underline flex flex-col justify-center h-20 col-span-3 px-1 text-center transition bg-yellow-300 rounded-md shadow-sm hover:bg-yellow-400">
                                <div class=" no-underline text-xs leading-tight text-yellow-900">Villages</div>
                                <div class=" no-underline text-xs font-bold leading-none text-yellow-950">592,765</div>
                            </button>
                        </div>
                        <button class="w-full text-center transition bg-red-500 rounded-md shadow-sm hover:bg-red-600">
                            <div class="text-xs text-red-100">World bilateral</div>
                            <div class="text-lg font-semibold text-white">194</div>
                        </button>
                    </div>
                </a>
            </div>

            <!-- Czech Republic -->
            <div>
                <div class="flex justify-center mb-3">
                    <span class="text-sm font-semibold text-slate-700">Czech Rep. <span
                            class="font-normal text-slate-400">— WIP</span></span>
                </div>
                <a href="https://www.prarang.in/czech-knowledge-webs">
                    <div class="p-4 space-y-3 bg-white border shadow-sm border-slate-300 rounded-2xl">
                        <div class="dots"><span class="dot dot-blue"></span><span class="dot dot-yellow"></span><span
                                class="dot dot-red"></span></div>
                        <div class="grid grid-cols-7 gap-2">
                            <button
                                class="flex flex-col justify-center h-20 col-span-4 px-2 text-center transition bg-blue-600 rounded-md shadow-sm hover:bg-blue-700">
                                <div class="text-xs text-blue-100">Cities / towns</div>
                                <div class="text-xs font-semibold text-white">843</div>
                            </button>
                            <button
                                class="flex flex-col justify-center h-20 col-span-3 px-1 text-center transition bg-yellow-300 rounded-md shadow-sm hover:bg-yellow-400">
                                <div class="text-xs leading-tight text-yellow-900">Villages / mil.</div>
                                <div class="text-xs font-bold leading-none text-yellow-950">5,415</div>
                            </button>
                        </div>
                        <button class="w-full text-center transition bg-red-500 rounded-md shadow-sm hover:bg-red-600">
                            <div class="text-xs text-red-100">World bilateral</div>
                            <div class="text-lg font-semibold text-white">194</div>
                        </button>
                    </div>
                </a>
            </div>

            <!-- Zimbabwe -->
            <div onclick="openOtherModal()">
                <div class="flex justify-center mb-3">
                    <span class="text-sm font-semibold text-slate-700">Zimbabwe <span
                            class="font-normal text-slate-400">— WIP</span></span>
                </div>
                <div class="p-4 space-y-3 bg-white border shadow-sm border-slate-300 rounded-2xl">
                    <div class="dots"><span class="dot dot-blue"></span><span class="dot dot-yellow"></span><span
                            class="dot dot-red"></span></div>
                    <div class="grid grid-cols-7 gap-2">
                        <button
                            class="flex flex-col justify-center h-20 col-span-4 px-2 text-center transition bg-blue-600 rounded-md shadow-sm hover:bg-blue-700">
                            <div class="text-xs text-blue-100">Cities / towns</div>
                            <div class="text-xs font-semibold text-white">300+</div>
                        </button>
                        <button
                            class="flex flex-col justify-center h-20 col-span-3 px-1 text-center transition bg-yellow-300 rounded-md shadow-sm hover:bg-yellow-400">
                            <div class="text-xs leading-tight text-yellow-900">Wards</div>
                            <div class="text-xs font-bold leading-none text-yellow-950">1,200</div>
                        </button>
                    </div>
                    <button class="w-full text-center transition bg-red-500 rounded-md shadow-sm hover:bg-red-600">
                        <div class="text-xs text-red-100">World bilateral</div>
                        <div class="text-lg font-semibold text-white">194</div>
                    </button>
                </div>
            </div>
            <!-- Other -->
            <div>


                <div class="p-4 space-y-3 bg-white border shadow-sm border-slate-300 rounded-2xl">


                    <div class="flex items-center justify-center h-[138px]">
                        <div class="flex items-center justify-center h-[138px]">
                            <button onclick="openOtherModal()"
                                class="flex items-center justify-center w-full h-full text-xl font-bold text-blue-600 transition border-slate-300 hover:border-blue-500 hover:bg-slate-50">
                                + 194 More
                            </button>
                        </div>
                    </div>
                    <!-- <button
                        onclick="openOtherModal()"
                        class="w-full py-3 text-center transition bg-gray-300 rounded-md hover:bg-gray-400">
                        Coming Soon
                    </button> -->
                </div>
            </div>
        </div>

        <!-- Other Countries Modal -->
        <div id="otherModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/40">
            <div class="w-[360px] bg-white rounded-2xl shadow-2xl p-8 text-center">
                <p class="mt-4 text-gray-600">
                    Coming Soon.
                </p>
                <button onclick="closeOtherModal()"
                    class="w-full py-1 mt-8 text-lg font-semibold text-white transition bg-blue-600 rounded-xl hover:bg-blue-700">
                    Close
                </button>
            </div>
        </div>
        <script>
            function openOtherModal() {
                document.getElementById('otherModal').classList.remove('hidden');
            }

            function closeOtherModal() {
                document.getElementById('otherModal').classList.add('hidden');
            }

            // Close when clicking outside the box
            document.getElementById('otherModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeOtherModal();
                }
            });
        </script>

        <!-- Section label 1 -->
        <div class="mt-8 mb-4 text-center">
            <span class="text-sm font-semibold text-slate-700">English <span class="font-normal text-slate-500">(Latin
                    alphabet)</span> language localised base-line</span>
        </div>
        <!-- <div class="divider"></div> -->

        <!-- Language row -->
        <div class="grid items-start grid-cols-1 gap-5 mt-6 md:grid-cols-5">
            <div class="flex justify-center">

                <div class="px-4 py-2 text-sm bg-white border rounded-md shadow-sm border-grey border-slate-300">
                    Nepali / Devanagari
                </div>
            </div>

            <div class="flex justify-center">
                <div class="w-full px-2 py-2 bg-white border rounded-md shadow-sm border-grey border-slate-300">
                    <div class="grid grid-cols-2 gap-3">
                        <!-- Left Column -->
                        <ol class="pl-5 text-xs leading-4 list-decimal text-slate-700">
                            <li>Hindi /<br>Devanagari</li>
                            <li>Bengali</li>
                            <li>Marathi</li>
                            <li>Telugu</li>
                            <li>Tamil</li>
                            <li>Gujarati</li>
                            <li>Urdu /<br>Perso-Arabic</li>
                        </ol>
                        <!-- Right Column -->
                        <ol start="8" class="pl-5 text-xs leading-4 list-decimal text-slate-700">
                            <li>Kannada</li>
                            <li>Odia</li>
                            <li>Malayalam</li>
                            <li>Punjabi</li>
                            <li>Assamese</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="px-4 py-2 text-sm bg-white border rounded-md shadow-sm border-grey border-slate-300">
                    Czech
                </div>
            </div>

            <div class="flex justify-center">
                <div class="px-4 py-2 text-sm bg-white border rounded-md shadow-sm border-grey border-slate-300">
                    Shona
                </div>
            </div>
        </div>

        <!-- Section label 2 -->
        <div class="mt-10 mb-4 text-center">
            <span class="text-sm font-semibold text-slate-700">Language knowledge (script) webs — written</span>
        </div>
        <!-- <div class="divider"></div> -->

        <!-- Federal / Scheduled / Primary / Official row -->

        <div class="grid items-start grid-cols-1 gap-5 mt-6 md:grid-cols-5">
            <!-- <div class="flex justify-center">
                <button class="flex flex-col items-center justify-center h-16 transition border-2 rounded-md shadow-sm border-grey w-36">
                    <div class="text-xs font-bold text-black-100">Federal</div>
                    <div class="text-base font-bold text-black">1</div>
                </button>
            </div> -->
            <div class="flex flex-col items-center">

                <div class="flex flex-col items-center">
                    <div class="">
                        <i class="bi bi-arrow-up"></i>
                    </div>

                </div>

                <button
                    class="flex flex-col items-center justify-center h-16 border-2 border-gray-400 rounded-md shadow-sm w-36">
                    <div class="text-xs font-bold">Federal</div>
                    <div class="text-base font-bold">1</div>
                </button>

            </div>
            <div class="flex justify-center flex-col ">
                <div class="flex flex-col ">
                    <div class=""><i class="bi bi-arrow-up"></i></div>

                </div>
                <button
                    class="flex flex-col items-center justify-center h-16 transition border-2 rounded-md shadow-sm border-grey w-36">
                    <div class="text-xs font-bold text-black-100">Scheduled</div>
                    <div class="text-base font-bold text-black">22</div>
                </button>
            </div>
            <div class="flex justify-center">
                <div class="flex flex-col ">
                    <div class=""><i class="bi bi-arrow-up"></i></div>

                </div>
                <button
                    class="flex flex-col items-center justify-center h-16 transition border-2 rounded-md shadow-sm border-grey w-36">
                    <div class="text-xs font-bold text-black-100">Primary</div>
                    <div class="text-base font-bold text-black">1</div>
                </button>
            </div>

            <div class="flex justify-center">
                <div class="flex flex-col ">
                    <div class=""><i class="bi bi-arrow-up"></i></div>

                </div>
                <button
                    class="flex flex-col items-center justify-center h-16 transition border-2 rounded-md shadow-sm border-grey w-36">
                    <div class="text-xs font-bold text-black-100">Official</div>
                    <div class="text-base font-bold text-black">16</div>
                </button>
            </div>
        </div>

        <!-- Section label 3 -->
        <div class="mt-8 text-center">
            <span class="text-sm font-semibold text-slate-700">Official languages <span
                    class="font-normal text-slate-500">(country constitution)</span> — spoken</span>
        </div>

    </div>

    <style>
        .aalu div .transform {
            height: 233px;
        }

        /* Items start */
        .container .aalu .items-start {
            min-height: 293px;
            align-content: center;
            justify-content: center;
            margin-top: 0px;
        }

        /* Font semibold */
        .aalu .items-start>div>.justify-center .font-semibold {
            margin-bottom: 18px;
        }

        /* Font semibold */
        .container .items-start div:nth-child(2) .font-semibold:nth-child(1) {
            margin-bottom: 3px;
        }

        .container div:nth-child(5) .border {
            margin-top: 96px;
        }

        /* Justify center */
        .aalu .items-start div .border>.justify-center {
            font-size: 12px;
        }

        /* Full */
        .aalu div .h-full {
            font-size: 14px;
        }

        /* List */
        .aalu .grid ol {
            padding-left: 11px;
        }

        /* Rounded */
        .container .aalu .rounded-lg {
            padding-top: 3px !important;
            padding-bottom: 7px !important;
            background-color: #e9ebeb;
            transform: translatex(0px) translatey(0px);
        }

        /* Heading */
        .aalu h1 {
            margin-bottom: 0px;
        }

        /* Items start */
        .container .aalu .items-start:nth-child(6) {
            min-height: 169px;
            height: 169px;
        }

        /* Items start */
        .container .aalu .items-start:nth-child(8) {
            min-height: 92px;
            height: 92px;
        }

        /* Text center */
        .container .aalu .text-center:nth-child(5) {
            margin-top: 14px;
            margin-bottom: 21px !important;
            padding-top: 0px;
            border-top-width: 0px;
            border-bottom-width: 2px;
            padding-bottom: 7px;
            border-bottom-color: #b0b1b4;
        }

        /* Text center */
        .container .aalu .text-center:nth-child(7) {
            border-bottom-width: 2px;
            border-bottom-color: #979a9f;
            padding-bottom: 5px;
            margin-top: 27px;
        }

        /* Justify center */
        .aalu .items-start>.justify-center {
            flex-direction: column;
        }

        /* Division */
        .aalu .justify-center .flex-col div {
            text-align: center;
        }

        /* Justify center */
        .container .aalu .items-start>.justify-center .justify-center {
            width: 100% !important;
        }

        /* Justify center */
        .container .aalu .items-start>.items-center .justify-center {
            width: 100% !important;
        }

        /* Font semibold */
        .aalu .w-full .font-semibold {
            font-size: 12px;
            height: 17px;
            position: relative;
            top: -8px;
        }

        /* Full */
        .aalu .items-start div .border .w-full {
            height: 30px;
        }

        /* Full */
        .aalu .transform .w-full {
            margin-top: 13px;
        }

        /* Column 3/12 */
        .container .aalu .items-start div .border .grid .justify-center {
            width: 100% !important;
        }

        /* Border */
        .aalu div .border {
            padding-right: 6px !important;
            padding-left: 4px !important;
            padding-top: 17px !important;
            padding-bottom: 15px !important;
        }

        /* Transform */
        .aalu div .transform {
            height: 217px !important;
        }

        /* Border */
        .container .aalu .items-start div:nth-child(5) .border {
            width: 68% !important;
        }

        /* Text center */
        .container .aalu .text-center:nth-child(5) {
            margin-bottom: 35px !important;
        }

        /* Items start */
        .container .aalu .items-start:nth-child(6) {
            margin-top: 34px;
        }

        /* Text center */
        #otherModal .text-center {
            width: 346px;
            box-shadow: 0px 0px 20px 3px #070707;
        }

        /* Paragraph */
        #otherModal p {
            font-weight: 700;
            font-size: 20px;
        }

        /* Font semibold */
        .container .aalu #otherModal .text-center .font-semibold {
            width: 45% !important;
        }

        /* Transform */
        .container .aalu .items-start div a .transform {
            height: 200px !important;
        }

        /* Text */
        .aalu .items-start>.justify-center .text-sm {
            text-align: center;
        }

        /* Justify center */
        .aalu .items-start>.items-center .justify-center {
            border-color: #e0dbdb;
        }

        /* List Item */
        .aalu .grid li {
            font-weight: 500;
            font-size: 13px;
        }

        /* Full */
        .container .aalu .items-start>.justify-center .w-full {
            width: 105% !important;
        }

        /* Full */
        .aalu .items-start>.justify-center .w-full {
            padding-left: 6px !important;
        }

        /* Text */
        .aalu .items-start>.justify-center .text-sm {
            font-weight: 500;
        }

        /* List */
        .aalu .grid ol {
            padding-left: 19px !important;
        }

        @media (max-width:576px) {

            /* Text */
            a .shadow-sm .grid .justify-center .text-xs {
                font-size: 14px;
            }

            /* Column 4/12 */
            div a .shadow-sm .grid .justify-center {
                flex-direction: column;
            }

            /* Column 4/12 */
            .transform .grid .justify-center {
                flex-direction: column;
            }

            /* Transform */
            .aalu a .transform {
                width: 393px;
                transform: translatex(13px) translatey(0px);
                box-shadow: 0px 0px 4px 0px #1647ce;
            }

            /* Justify center */
            .aalu .items-start>div>.justify-center {
                margin-bottom: 1px !important;
                height: 25px;
            }

            /* Column 4/12 */
            div>.shadow-sm .grid .justify-center {
                flex-direction: column;
            }

            /* Text */
            div>.shadow-sm .justify-center .text-xs {
                font-size: 14px;
            }

            /* Text */
            .transform .grid .text-xs {
                font-size: 14px;
            }

            /* Shadow */
            .aalu .items-start div a>.shadow-sm {
                width: 406px;
                transform: translatex(0px) translatey(0px);
            }

            /* Font semibold */
            .aalu .items-start>div>.justify-center .font-semibold {
                font-size: 14px;
            }

            /* Rounded */
            .container .aalu .rounded-lg {
                margin-top: 41px;
            }

            /* Shadow */
            .aalu .items-start>div>.shadow-sm {
                margin-top: 0px !important;
            }

            /* Text center */
            .container .aalu .text-center {
                margin-bottom: 11px !important;
            }

            /* Font semibold */
            .aalu .text-center span.font-semibold {
                margin-bottom: 24px;
            }

        }
    </style>

</x-layout.main.base>
