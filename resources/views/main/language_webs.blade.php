@php
$metaData = [
'nav-heading' => 'PORTAL : LANGUAGE',
'nav-sub-heading' => 'Glocal For Hyperlocal',
];
@endphp
<x-layout.main.base :metaData="$metaData">
  <section>
    <p>Language Portals are designed to bridge the Digital-Divide of the specific Language, targeting the Mother-Tongue Netizens ( Literate & Internet enabled), in identified locations ( Cities & Countries) across the World. Prarang integrates all its relevant City/Village Portals & World Bilateral Portals, to create this Language Portal. Each of the City/Village & World Bilateral Portals is itself an aggregated curation of Prarang's solutions - Content, Analytics, Planners, Artificial Intelligence and Performance Metrics (under Partner Login).</p>
    <br>
    <div class="flex justify-center items-center">
      <div class="w-full max-w-6xl bg-white rounded-2xl border p-4 flex flex-col md:flex-row gap-4">

        <!-- LEFT: Hindi (Highlighted) -->
        <a href="https://humsabek.in/" target="_blank" class="flex flex-col items-center md:w-1/4 rounded-xl px-4 py-3 shadow-md transition hover:-translate-y-1 text-decoration-none">

          <span class="font-bold text-gray-900 text-sm text-center">
            Hindi Web
          </span>

          <!-- LIVE badge -->
          <span class="mt-1 md:mt-2 text-[10px] bg-green-600 text-white px-2 py-[2px] rounded-full font-semibold">
            LIVE
          </span>
        </a>

        <!-- RIGHT: Other Languages -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 w-full">

          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Bengali Web
          </a>
          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Marathi Web
          </a>
          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Telugu Web
          </a>
          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Tamil Web
          </a>
          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Urdu Web
          </a>
          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Gujarati Web
          </a>
          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Kannada Web
          </a>
          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Odia Web
          </a>
          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Malayalam Web
          </a>
          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Grumukhi Web
          </a>
          <a href="javascript:void(0)" @click="showModal = true" class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg  text-sm text-gray-800   shadow-sm transition hover:-translate-y-0.5">
            Assamese Web
          </a>

        </div>

      </div>
    </div>
    <br>
    <div class="flex p-1  justify-center mt-4 items-center gap-2">

      <a href="/lang-webs?q=digital-divide-languages" class="flex items-center gap-2 px-8 py-3 rounded-xl bg-blue-600 text-white font-semibold">
        Digital Divide
        <span class="px-2 py-0.5 text-xs rounded-full bg-white text-blue-600 font-bold">
          148
        </span>
      </a>

      <a href="/lang-webs?q=digital-balance-languages" class="flex items-center gap-2 px-8 py-3 rounded-xl bg-blue-600 text-white font-semibold">
        Digital Balance
        <span class="px-2 py-0.5 text-xs rounded-full bg-slate-700 text-white">
          30
        </span>
      </a>

    </div>

  </section>
</x-layout.main.base>
