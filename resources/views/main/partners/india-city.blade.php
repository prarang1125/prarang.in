@php
$metaData = [
'nav-heading' => 'PRARANG PARTNERSHIP',
'nav-sub-heading' => '',
];
@endphp
<x-layout.main.base :metaData="$metaData">
  <style>
    .grid .w-full a {
      text-decoration: none;
    }

    /* Hover */
    .container section .hover\:shadow-md {
      flex-direction: column;
      padding-top: 2px !important;
      padding-bottom: 2px !important;
    }

    /* Transition all */
    .container section .transition-all {
      padding-top: 4px !important;
      padding-bottom: 2px !important;
      max-width: 149px;
      min-height: 82px;
    }

    /* Division */
    .items-stretch .transition-all .sm\:text-base {
      font-size: 12px;
      width: 20px;
      height: 20px;
    }

    /* Transition all */
    .container section .items-stretch .transition-all {
      width: 0px !important;
    }

    /* Hover */
    .container section .hover\:shadow-md {
      cursor: pointer;
    }
  </style>
  <section class="mb-5">
    <h4 class="text-center text-blue-600 font-bold text-xl sm:text-xl tracking-wide mb-1">India - Cities: Digital
      Marketing </h4>

    <div class="flex w-full justify-center">
      <small class="text-center text-gray-800 text-md mb-4">Four Steps to go Live.</small>
    </div>
    <div class="flex flex-row w-full justify-center items-stretch gap-2 sm:gap-3 px-4 max-w-5xl mx-auto">
      <!-- Step 1 -->
      <div
        class="flex-1 flex flex-col justify-center items-center py-4 px-2 rounded-xl font-bold text-gray-800 bg-white border-2 border-yellow-500 shadow-md transition-all duration-300 h-full">
        <div
          class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center font-bold mb-2 sm:mb-3 border border-yellow-300 shadow-sm text-sm sm:text-base">
          1</div>
        <div class="text-xs sm:text-sm text-center leading-tight">
          <span class="block">Digital Marketing</span>
          <span class="block mt-1">Plan</span>
        </div>
      </div>

      <div class="flex-shrink-0 text-blue-400 flex flex-col justify-center">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
        </svg>
      </div>

      <!-- Step 2 -->
      <div
        class="flex-1 flex flex-col justify-center items-center py-4 px-2 rounded-xl font-semibold text-gray-600 bg-white border-2 border-blue-400 hover:border-yellow-400 hover:shadow-md transition-all duration-300 h-full">
        <div
          class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center font-bold mb-2 sm:mb-3 border border-blue-200 shadow-sm text-sm sm:text-base">
          2</div>
        <div class="text-xs sm:text-sm text-center leading-tight">
          <span class="block">Digital Marketing</span>
          <span class="block mt-1">Budget</span>
        </div>
      </div>

      <div class="flex-shrink-0 text-blue-400 flex flex-col justify-center">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
        </svg>
      </div>

      <!-- Step 3 -->
      <div
        class="flex-1 flex flex-col justify-center items-center py-4 px-2 rounded-xl font-semibold text-gray-600 bg-white border-2 border-blue-400 hover:border-yellow-400 hover:shadow-md transition-all duration-300 h-full">
        <div
          class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center font-bold mb-2 sm:mb-3 border border-blue-200 shadow-sm text-sm sm:text-base">
          3</div>
        <div class="text-xs sm:text-sm text-center leading-tight">
          <span class="block">Enroll</span>
        </div>
      </div>

      <div class="flex-shrink-0 text-blue-400 flex flex-col justify-center">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
        </svg>
      </div>

      <!-- Step 4 -->
      <div
        class="flex-1 flex flex-col justify-center items-center py-4 px-2 rounded-xl font-semibold text-gray-600 bg-white border-2 border-blue-400 hover:border-yellow-400 hover:shadow-md transition-all duration-300 h-full">
        <div
          class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center font-bold mb-2 sm:mb-3 border border-blue-200 shadow-sm text-sm sm:text-base">
          4</div>
        <div class="text-xs sm:text-sm text-center leading-tight">
          <span class="block">Act</span>
        </div>
      </div>
    </div>
  </section>
  <section>
    <!-- CTA Block Component -->
    <div
      class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-2 lg:p-4 shadow-lg border border-blue-100 max-w-6xl mx-auto relative overflow-hidden">
      <div class="flex justify-center items-center flex-col">
        <h4 class="font-semibold mb-0">Select Capital (State/District) </h4>
        <small class="text-center text-gray-700 mb-2"> Cities > 30,000 Netigens</small>
      </div>

      <div class="flex justify-end items-end">
        <button class="bg-blue-500 p-2 rounded-lg text-white">Confirm</button>
      </div>
    </div>
    </div>
  </section>



</x-layout.main.base>
