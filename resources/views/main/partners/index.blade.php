@php

$metaData = [

'nav-heading' => 'PRARANG PARTNERSHIP',

'nav-sub-heading' => '',

];

@endphp

<x-layout.main.base :metaData="$metaData">
  <style>
    /* Link */
    .container .justify-end a {
      text-decoration: none;

    }
  </style>
  <div class="flex justify-end items-center">
    <a class="bg-black text-white p-2 rounded-lg hover:bg-zinc-800 hover:text-gray-300" href="https://b2b.prarang.in/login?lt=partner" target="_blank">Partner Login</a>
  </div>

  <!-- Start of Partner Banner UI -->

  <div class="w-full flex flex-col items-center pt-8 pb-10">

    <h2 class="text-[#0070C0] text-2xl font-normal text-center mb-1">Partner with Prarang and build your brand by Bridging the Digital Divide</h2>

    <h3 class="text-black text-[1.1rem] font-normal text-center mb-2">Select Knowledge-Web Geographies (India & Export Markets) and Estimate Digital Marketing Budget</h3>

    <div class="mb-4 text-center leading-none">

      <i class="bi bi-arrow-down text-[50px] text-black" style="-webkit-text-stroke: 4px black; line-height: 0.5;"></i>

    </div>

    <!-- Main Grid Container -->

    <style>
      .partner-wrap {
        width: 100%;
        font-family: var(--font-sans);
        padding: 1rem 0;
      }

      .top-section {
        background: #f2f2f2;
        padding: 2rem 1rem 1rem;
        display: flex;
        flex-direction: row;
        align-items: flex-end;
        justify-content: center;
        gap: 30px;
        width: 100%;
        box-sizing: border-box;
      }

      .col-side {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 220px;
      }

      .col-center {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 340px;
      }

      .plus-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #222;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        font-weight: 400;
        margin-bottom: 12px;
        flex-shrink: 0;
        align-self: center;
        margin-bottom: 40px;
      }

      .dots {
        display: flex;
        gap: 10px;
        margin-bottom: 14px;
      }

      .dot {
        width: 22px;
        height: 22px;
        border-radius: 50%;
      }

      .country-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        background: #e8eef3;
        border: 2px solid transparent;
        border-radius: 6px;
        padding: 10px 14px;
        width: 100%;
        box-sizing: border-box;
        cursor: pointer;
      }

      .country-box:hover {
        background: #d0d8e0;
      }

      .country-box.featured {
        border: 2px solid #9bc4ff;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 12px rgba(146, 197, 255, 0.4);
        padding: 10px;
      }

      .flag-bar {
        display: flex;
        width: 100%;
        height: 38px;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 10px;
      }

      .flag-seg {
        flex: 1;
      }

      .country-name {
        font-size: 28px;
        font-weight: 600;
        color: #1a56d6;
      }

      .country-name.lg {
        font-size: 36px;
      }

      .country-sub {
        font-size: 12px;
        font-weight: 600;
        color: #3b63a8;
      }

      .bottom-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        width: 100%;
        margin-top: 8px;
        gap: 30px;
      }

      .bottom-box {
        display: flex;
        border: 1px solid #8cb4f5;
        background: #ececec;
        height: 60px;
      }

      .bottom-box.side {
        width: 220px;
      }

      .bottom-box.center {
        width: 340px;
      }

      .bottom-cell {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        color: #111;
        text-align: center;
        padding: 4px;
        border-right: 1px solid #8cb4f5;
        cursor: pointer;
        line-height: 1.3;
      }

      .bottom-cell:last-child {
        border-right: none;
      }

      .bottom-cell:hover {
        background: #d8d8d8;
      }

      .plus-spacer {
        width: 36px;
        height: 60px;
        background: #f2f2f2;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      /* Top section */
      .flex-col .partner-wrap .top-section {
        align-items: center;
        /* transform: translatex(0px) translatey(0px); */
        padding-top: 2px;
        background-color: rgba(242, 242, 242, 0);
      }

      /* Font normal */
      .container .flex-col h2.font-normal {
        color: #0c70d4;
      }

      /* Font normal */
      .container .flex-col h3.font-normal {
        font-size: 18px;
      }

      /* Italic Tag */
      .flex-col i {
        position: relative;
        top: 7px;
      }

      /* Flex col */
      .container .flex-col {
        padding-top: 0px;
      }

      /* Link */
      .partner-wrap .col-side a {
        text-decoration: none;
        font-weight: 500;
      }

      /* Link */
      .partner-wrap .col-center a {
        text-decoration: none;
        font-weight: 600;
      }

      /* Link (hover) */
      .partner-wrap .col-center a:hover {
        color: #1623de;
      }
    </style>
    <div class="partner-wrap" x-data="{ showModal: false, modalTitle: '' }">
      <div class="top-section">
        <!-- Nepal -->
        <div class="col-side">
          <div class="dots">
            <div class="dot" style="background:#2563eb"></div>
            <div class="dot" style="background:#facc15"></div>
            <div class="dot" style="background:#ef4444"></div>
          </div>
          <div class="country-box">
            <span class="country-name">Nepal</span>
            <span class="country-sub">Knowledge Webs</span>
          </div>
          <div class="flex gap-1 mt-3">
            <button
              type="button"
              @click="modalTitle='Coming: TBD'; showModal = true"
              class="w-52 rounded-lg bg-blue-400 px-4 py-3 text-center font-semibold text-white shadow-md transition hover:bg-blue-500">
              Cities &amp; Villages
            </button>

            <button
              type="button"
              @click="modalTitle='Coming: TBD'; showModal = true"
              class="w-52 rounded-lg bg-blue-400 px-4 py-3 text-center font-semibold text-white shadow-md transition hover:bg-blue-500">
              World Bilateral
            </button>
          </div>
        </div>



        <!-- India (featured/highlighted) -->
        <div class="col-center">
          <div class="country-box featured">
            <div class="flag-bar">
              <div class="flag-seg" style="background:#2563eb"></div>
              <div class="flag-seg" style="background:#facc15"></div>
              <div class="flag-seg" style="background:#ef4444"></div>
              <div class="flag-seg" style="background:#fef08a"></div>
              <div class="flag-seg" style="background:#bef264"></div>
              <div class="flag-seg" style="background:#22c55e"></div>
            </div>
            <div style="background:#e8eef3;width:100%;border-radius:6px;padding:10px;display:flex;flex-direction:column;align-items:center;">
              <span class="country-name lg">India</span>
              <span class="country-sub">Knowledge Webs</span>
            </div>
            <div class="flex gap-1 mt-3">
              <a href="{{ route('partners.india-town') }}"
                class="w-52 rounded-lg bg-blue-600 px-4 py-3 text-center font-semibold text-white shadow-md transition hover:bg-blue-700">
                Cities &amp; Villages
              </a>

              <button
                type="button"
                @click="modalTitle='Coming Soon'; showModal = true"
                class="w-52 rounded-lg bg-blue-400 px-4 py-3 text-center font-semibold text-white shadow-md transition hover:bg-blue-500">
                World Bilateral
              </button>
            </div>
          </div>
        </div>

        <!-- No plus between India and Czech per image -->

        <!-- Czech -->
        <div class="col-side" style="margin-left:8px;">
          <div class="dots">
            <div class="dot" style="background:#2563eb"></div>
            <div class="dot" style="background:#facc15"></div>
            <div class="dot" style="background:#ef4444"></div>
          </div>
          <div class="country-box">
            <span class="country-name">Czech</span>
            <span class="country-sub">Knowledge Webs</span>
          </div>
          <div class="flex gap-1 mt-3">
            <button
              type="button"
              @click="modalTitle='Coming: TBD'; showModal = true"
              class="w-52 rounded-lg bg-blue-400 px-4 py-3 text-center font-semibold text-white shadow-md transition hover:bg-blue-500">
              Cities &amp; Villages
            </button>

            <button
              type="button"
              @click="modalTitle='Coming: TBD'; showModal = true"
              class="w-52 rounded-lg bg-blue-400 px-4 py-3 text-center font-semibold text-white shadow-md transition hover:bg-blue-500">
              World Bilateral
            </button>
          </div>
        </div>
      </div>


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

          <h3 class="text-xl font-bold text-gray-900 mb-2" x-text="modalTitle"></h3>

          <button @click="showModal = false"

            class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-all active:scale-95">

            Close

          </button>

        </div>

      </div>
    </div>


  </div>


  <section class="w-full py-12 px-4 text-center">

    <p class=" uppercase text-blue-600 mb-8 flex items-center justify-center gap-3 font-bold text-xl">

      Our Partners

    </p>

    <div class="flex flex-wrap items-center justify-center gap-6">
      <!-- <div>
        <p class="text-center">
          Indoeuropeans India Pvt. Ltd.
        </p>
        <a href="javascript:void(0)"
          class="flex items-center justify-center bg-white border border-gray-200 rounded-xl px-8 py-1 min-w-[160px] min-h-[90px] hover:border-gray-400 hover:bg-gray-50 transition-all duration-200">
          <img src="https://i.ibb.co/RGVNrCbR/IEU-Logo.gif" alt="IEU Logo" class=" max-w-[200px] object-contain">
          <p class="font-bold text-xs">Respect for Diversity, A Belief in Unity</p>
        </a>
      </div> -->

      <div>
        <p>Dr. Shroff’s Charity Eye Hospital</p>
        <a href="javascript:void(0)"
          class="flex items-center justify-center bg-white border border-gray-200 rounded-xl px-8 py-1 min-w-[160px] min-h-[90px] hover:border-gray-400 hover:bg-gray-50 transition-all duration-200">
          <img src="https://i.ibb.co/zHr5Wq7G/SCEH.png" alt="SCEH" class=" max-w-[340px] object-contain">
        </a>
      </div>

      <div>
        <p>Story Design</p>
        <a href="javascript:void(0)"
          class="flex items-center justify-center bg-white border border-gray-200 rounded-xl px-8 py-1 min-w-[160px] min-h-[90px] hover:border-gray-400 hover:bg-gray-50 transition-all duration-200">
          <img src="https://i.ibb.co/G3TCxxD8/Story-Design.png" alt="Story Design" class=" max-w-[340px] object-contain">
        </a>
      </div>

    </div>

  </section>
  <style>
    /* Justify center */
    .container .flex-wrap .justify-center {
      width: 260px;
      background-color: #e7dede !important;
      height: 137px;
    }

    /* Object contain */
    .container .justify-center:nth-child(1) .object-contain {
      width: 95px;
    }



    /* Paragraph */
    .flex-wrap .justify-center p {
      margin-bottom: 0px;
    }

    .container div:nth-child(1) .object-contain {
      width: 103px;
    }

    /* Text center */
    .flex-wrap div .text-center {
      font-weight: 700;
    }

    /* Paragraph */
    .flex-wrap div p {
      font-weight: 700;
    }

    /* Font semibold */
    .partner-wrap .justify-center .font-semibold {
      padding-left: 0px !important;
      padding-right: 0px !important;
      width: 130px;
      font-size: 14px;
    }

    /* Justify center */
    .flex-col .partner-wrap>.justify-center {
      align-items: center;
    }

    /* Font semibold */
    .partner-wrap .justify-center a.font-semibold {
      width: 167px;
    }

    /* Font semibold */
    .partner-wrap .justify-center .font-semibold:nth-child(4) {
      width: 167px;
    }

    @media (max-width:576px) {

      /* Top section */
      .flex-col .partner-wrap .top-section {
        flex-direction: column;
      }

      /* Justify center */
      .container .flex-col .justify-center:nth-child(2) {
        display: grid;
        align-content: center;
        row-gap: 10px !important;
        column-gap: 18px !important;
      }

      /* Justify center */
      .container .flex-col .partner-wrap .justify-center:nth-child(2) {
        grid-template-columns: auto 1fr !important;
      }

    }

    /* Col side */
    .partner-wrap .top-section .col-side {
      width: 260px;
    }

    /* Font semibold */
    .top-section .col-side .font-semibold {
      padding-left: 0px !important;
      padding-right: 0px !important;
      padding-top: 10px !important;
      padding-bottom: 10px !important;
      font-size: 14px;
      width: 128px;
    }

    /* Font semibold */
    .col-center .flex .font-semibold {
      padding-left: 0px !important;
      padding-right: 0px !important;
      padding-top: 11px !important;
      padding-bottom: 11px !important;
      font-size: 15px;
      width: 155px;
    }

    /* Top section */
    .flex-col .partner-wrap .top-section {
      align-items: flex-end !important;
    }

    /* Country box */
    .top-section .col-center .country-box {
      position: relative;
      top: 11px;
    }

    @media (max-width:576px) {

      /* Top section */
      .container .flex-col .partner-wrap .top-section {
        align-items: center !important;
      }

      /* Flex col */
      .container .flex-col {
        padding-bottom: 8px;
      }

      /* Full */
      .container>.w-full {
        padding-top: 4px !important;
      }

    }
  </style>


</x-layout.main.base>
