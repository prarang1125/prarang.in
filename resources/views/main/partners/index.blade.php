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
  <section class="">
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
          <a onclick="alert('Coming Soon.')"
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
          Products <span class="text-blue-600">Partnerships</span>
        </h4>

        <div class="flex  w-full gap-4 ">
          <a href="/"
            class="block w-full text-center py-2 px-2 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
            Content/Portals
          </a>
          <a href="/"
            class="block w-full text-center py-2 px-2 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
            Analytics/Planners
          </a>
          <a href="/"
            class="block w-full text-center py-2 px-2 rounded-xl font-semibold text-gray-800 bg-yellow-400 hover:bg-yellow-500 shadow-[0_4px_14px_0_rgba(250,204,21,0.39)] hover:shadow-[0_6px_20px_rgba(250,204,21,0.23)] hover:-translate-y-0.5 transition-all duration-300">
            Knowledge/Intelligence
          </a>
        </div>
      </div>

    </div>
  </section>




</x-layout.main.base>
