<div x-data="{
    modal: null,
    openSection: null
}" class="w-full">
    <style>
        /* Hover */
        .w-full .p-2 .hover\:shadow-xl {
            padding-top: 6px;
            padding-bottom: 6px;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Link */
        .w-full .overflow-hidden .overflow-y-auto a {
            display: flex;
            justify-content: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        /* Link (hover) */
        .w-full .overflow-hidden .blhover {
            background-color: #0663d4;
            color: #ffffff;
            transition: 3ms;
        }

        /* Hover */


        /* Link */
        .w-full .overflow-hidden .overflow-y-auto a {
            padding-left: 5px;
            padding-right: 5px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-weight: 500;
            font-size: 15px;
        }

        /* Tracking wider */
        .sm\:p-8 .mx-auto .tracking-wider {
            top: 0px;
        }

        /* Tracking wider */
        .w-full .overflow-hidden:nth-child(2) .tracking-wider {
            transform: translatex(-3px) translatey(-23px);
        }

        /* Transition transform */
        .w-full .sm\:p-8 .overflow-hidden:nth-child(2) .transition-transform {
            height: 118px;
            width: 110px;
        }
    </style>
    <div class="p-2">


        <div class="bg-white overflow-hidden rounded-xl bg-gradient-to-b from-amber-200 to-amber-50">
            <div class="p-2 sm:p-8">

                <!-- Heading -->
                <h3
                    class="mb-6 bg-gradient-to-r from-blue-700 via-indigo-700 to-blue-700 bg-clip-text text-transparent drop-shadow-sm">
                    <span class="block text-left text-lg px-6 tracking-wide font-medium">
                        प्रारंग ए.आई. (A.I.)
                    </span>
                    <span class="block text-center text-2xl font-extrabold tracking-wider mt-1">
                        विश्वकोश
                    </span>
                </h3>

                <!-- Buttons -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">

                    <!-- INDIA -->
                    <button @click="modal = 'india'"
                        class="
          group relative overflow-hidden
          rounded-2xl h-48
          bg-gradient-to-br from-blue-600 to-blue-700
          text-white
          shadow-lg hover:shadow-blue-500/30
          transition-all duration-300
          transform hover:-translate-y-1 hover:scale-[1.02]
          flex flex-col items-center justify-center
          border border-white/20
        ">
                        <div
                            class="absolute top-0 right-0 -mr-8 -mt-8 w-24 h-24 rounded-full bg-white/10 blur-xl group-hover:bg-white/20 transition-all">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 -ml-8 -mb-8 w-24 h-24 rounded-full bg-black/10 blur-xl group-hover:bg-black/20 transition-all">
                        </div>

                        <img src="https://cdn.pixabay.com/photo/2023/08/26/05/23/india-map-8214176_1280.png"
                            alt="India Map"
                            class="w-[70px] h-auto relative z-10 mb-3 drop-shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3" />

                        <span class="relative z-10 text-2xl font-bold tracking-wider">
                            भारत
                        </span>
                    </button>

                    <!-- WORLD -->
                    <button @click="modal = 'world'"
                        class="
          group relative overflow-hidden
          rounded-2xl h-48
          bg-gradient-to-br from-blue-500 to-sky-600
          text-white
          shadow-lg hover:shadow-blue-500/30
          transition-all duration-300
          transform hover:-translate-y-1 hover:scale-[1.02]
          flex flex-col items-center justify-center
          border border-white/20
        ">
                        <div
                            class="absolute top-0 right-0 -mr-8 -mt-8 w-24 h-24 rounded-full bg-white/10 blur-xl group-hover:bg-white/20 transition-all">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 -ml-8 -mb-8 w-24 h-24 rounded-full bg-black/10 blur-xl group-hover:bg-black/20 transition-all">
                        </div>

                        <img src="https://i.ibb.co/7Jc2hpBZ/Untitled-design-2-removebg-preview.png" alt="World Map"
                            class="w-full h-[200px] relative z-10 mb-3 drop-shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3" />

                        <span class="relative z-10 text-2xl font-bold tracking-wider">
                            अन्य देश
                        </span>
                    </button>

                </div>
            </div>
        </div>
    </div>
    {{-- MODAL --}}
    <template x-if="modal">
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4"
            @click.self="modal = null">
            <div class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl flex flex-col overflow-hidden"
                style="max-height:85vh">

                {{-- HEADER --}}
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-5 text-white flex justify-between">
                    <h3 class="font-bold text-xl">
                        <span
                            x-text="modal === 'india' ? 'प्रारंग ए.आई. विश्वकोश - भारत' : 'प्रारंग ए.आई. विश्वकोश - विश्व'"></span>
                    </h3>
                    <button @click="modal = null">✕</button>
                </div>

                {{-- CONTENT --}}
                <div class="p-6 overflow-y-auto bg-gray-50 space-y-2">
                    @foreach ($indiaData as $group)
                        <template x-if="modal === 'india'">
                            @include('components.portal.partials.accordion', [
                                'group' => $group,
                                'type' => 'india',
                            ])
                        </template>
                    @endforeach

                    @foreach ($worldData as $group)
                        <template x-if="modal === 'world'">
                            @include('components.portal.partials.accordion', [
                                'group' => $group,
                                'type' => 'world',
                            ])
                        </template>
                    @endforeach
                </div>

                {{-- FOOTER --}}
                <div class="p-4 bg-gray-50 border-t text-right">
                    <button class="px-6 py-2 bg-white border rounded-lg" @click="modal = null">
                        बंद करें
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
