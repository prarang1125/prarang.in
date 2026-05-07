@php
$metaData = [
'nav-heading' => 'PRARANG PARTNERSHIP',
'nav-sub-heading' => '',
];
@endphp
<x-layout.main.base :metaData="$metaData">
  <style>
    /* Link */
    .grid .w-full a {
      text-decoration: none;
    }
  </style>
  <section class="" x-data="{ showModal: false }">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
      <!-- Digital Marketing Partnership Card -->
      <div
        class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-500 p-8 lg:p-10 border border-gray-100 flex flex-col items-center group hover:-translate-y-2 relative overflow-hidden">
        <!-- Background decorative blob -->
        <div
          class="absolute -top-16 -right-16 w-32 h-32 bg-blue-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700 ease-in-out">
        </div>
        <h4 class="text-gray-900 font-bold text-center uppercase text-xl sm:text-xl tracking-wide mb-8">
          Digital Marketing <span class="text-blue-600">Partnerships</span>
        </h4>
        <div class="flex w-full gap-4 ">
          <a href="{{ route('partners.india-city') }}"
            class="relative overflow-hidden block w-full text-center py-2 px-6 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
            India - City
          </a>
          <a href="javascript:void(0)" @click="showModal = true"
            class="relative overflow-hidden block w-full text-center py-2 px-6 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
            World Bilateral
          </a>
        </div>
      </div>

      <!-- Products Partnership Card -->
      <div
        class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-500 p-8 lg:p-10 border border-gray-100 flex flex-col items-center group hover:-translate-y-2 relative overflow-hidden">
        <!-- Background decorative blob -->
        <div
          class="absolute -top-16 -right-16 w-32 h-32 bg-blue-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700 ease-in-out">
        </div>


        <h4 class="text-gray-900 font-bold text-center uppercase text-xl sm:text-xl tracking-wide mb-8">
          Product <span class="text-blue-600">Partnerships</span>
        </h4>

        <div class="flex  w-full gap-4 ">
          <a href="javascript:void(0)" @click="showModal = true"
            class="block w-full text-center py-2 px-2 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
            Content/Portals
          </a>
          <a href="javascript:void(0)" @click="showModal = true"
            class="block w-full text-center py-2 px-2 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
            Analytics/Planners
          </a>
          <a href="javascript:void(0)" @click="showModal = true"
            class="block w-full text-center py-2 px-2 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
            Knowledge/Intelligence
          </a>
        </div>
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
        {{-- <p class="text-gray-500 mb-6">This partnership feature is currently under development. Stay tuned!</p> --}}
        <button @click="showModal = false"
          class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-all active:scale-95">
          Close
        </button>
      </div>
    </div>
  </section>




</x-layout.main.base>
