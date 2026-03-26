@php
$metaData[]="";
@endphp

<x-layout.pages.village :metaData="$metaData">


    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
        <div class="lg:col-span-3 space-y-4">
            <div class="bg-white rounded-2xl p-6 border border-green-50 shadow-sm transition-all hover:shadow-md">
                <h3 class="text-[10px] font-bold text-green-700 uppercase tracking-[0.2em] text-center mb-4">Village
                    Speak</h3>
                <div class="space-y-3 pb-4">
                    <p class="text-sm text-gray-600 leading-relaxed ">
                        Ramnager is a quaint village nestled in the heart of Uttar Pradesh, India. With a population of
                        around 12,450 as of 2026, it offers a serene rural lifestyle.
                    </p>
                </div>

                <hr class="border-green-50 mb-6">

                <div class="space-y-6">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-3">
                            <h5 class="text-[11px] font-bold text-green-800 uppercase tracking-widest text-center">
                                Culture</h5>
                            <div class="grid grid-cols-2 gap-2">
                                @for($i=201; $i<=206; $i++) <div
                                    class="aspect-square rounded-lg overflow-hidden border border-green-50">
                                    <img src="https://picsum.photos/{{$i}}" alt="culture"
                                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                            </div>
                            @endfor
                        </div>
                    </div>
                    <div class="space-y-3">
                        <h5 class="text-[11px] font-bold text-green-800 uppercase tracking-widest text-center">Nature
                        </h5>
                        <div class="grid grid-cols-2 gap-2">
                            @for($i=207; $i<=212; $i++) <div
                                class="aspect-square rounded-lg overflow-hidden border border-green-50">
                                <img src="https://picsum.photos/{{$i}}" alt="nature"
                                    class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="bg-green-50/30 rounded-xl p-4 border border-green-100/50">
                <h5 class="text-[11px] font-bold text-green-800 uppercase tracking-widest text-center mb-3">Village
                    Contributes</h5>
                <ul class="space-y-2">
                    @for($i=0; $i<4; $i++) <li class="flex items-start gap-2">
                        <svg class="w-3 h-3 text-red-500 mt-1 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 4-8 4z" />
                        </svg>
                        <a href="https://youtube.com"
                            class="text-[11px] text-gray-600 hover:text-green-700 transition-colors line-clamp-1">Village
                            Video Link #{{$i+1}}</a>
                        </li>
                        @endfor
                </ul>
            </div>
        </div>
    </div>
    </div>
    <div class="lg:col-span-6 space-y-4">
        <div class="bg-white rounded-2xl p-6 border border-green-50 shadow-sm">
            <div class="space-y-4 text-justify">
                <p class="text-sm text-gray-700 leading-relaxed">
                    Ramnager is a quaint village nestled in the heart of Uttar Pradesh, India. With a population of
                    around 12,450 as of 2026, it offers a serene rural lifestyle while being rich in culture and
                    tradition. The village is surrounded by lush green fields and is known for its vibrant community and
                    agricultural practices.
                </p>
                <p class="text-sm text-gray-700 leading-relaxed">
                    Ramnager is a quaint village nestled in the heart of Uttar Pradesh, India. With a population of
                    around 12,450 as of 2026, it offers a serene rural lifestyle while being rich in culture and
                    tradition. The village is surrounded by lush green fields and is known for its vibrant community and
                    agricultural practices.
                </p>
                <p class="text-sm text-gray-700 leading-relaxed">
                    Despite its small size, Ramnager boasts a strong sense of community and is a testament to the
                    enduring spirit of rural India. It remains a focal point for traditional crafts and seasonal
                    festivals that draw visitors from neighboring districts.
                </p>
                 <p class="text-sm text-gray-700 leading-relaxed">
                    Despite its small size, Ramnager boasts a strong sense of community and is a testament to the
                    enduring spirit of rural India. It remains a focal point for traditional crafts and seasonal
                    festivals that draw visitors from neighboring districts.
                </p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-green-50 shadow-sm">
            <h3 class="text-[10px] font-bold text-green-700 uppercase tracking-[0.2em] text-center mb-6">Ramnagar
                Analytics</h3>
            <div class="grid grid-cols-2 gap-4 items-center justify-center">
                <div class="p-4 bg-green-500 rounded-xl border border-green-100/50">
                    <h4 class="text-xs font-bold text-white mb-3 uppercase text-center tracking-wider">Compare District</h4>
                    <div class="flex flex-wrap gap-2 items-center justify-center">
                        <a href="/"
                            class="px-4 py-1.5 bg-white border border-green-200 text-[11px] font-bold text-green-800 rounded-lg hover:bg-green-600 hover:text-white hover:border-green-600 transition-all shadow-sm">Market</a>
                        <a href="/"
                            class="px-4 py-1.5 bg-white border border-green-200 text-[11px] font-bold text-green-800 rounded-lg hover:bg-green-600 hover:text-white hover:border-green-600 transition-all shadow-sm">Development</a>
                    </div>
                </div>

                <div class="p-4 bg-green-500 rounded-xl border border-green-100/50 flex flex-col justify-between">
                    <h4 class="text-xs font-bold text-white text-center mb-3 uppercase tracking-wider">District Summary</h4>
                    <button
                        class="w-full py-2 bg-white border border-green-200 text-green-800 text-[11px] font-black rounded-lg hover:bg-green-800 transition-colors shadow-lg shadow-green-100 tracking-widest">
                        12 ELEPHANTS
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="lg:col-span-3 space-y-4">
        <div class="bg-white rounded-2xl p-6 border border-green-50 shadow-sm">
            <h3 class="text-[10px] font-bold text-green-700 uppercase tracking-[0.2em] text-center mb-6">Location
                Details</h3>

            <div class="space-y-4">
                @php
                $details = [
                ['label' => 'Gram Panchayat', 'value' => 'Ramnagar'],
                ['label' => 'Tehsil', 'value' => 'Aonla'],
                ['label' => 'Block', 'value' => 'Ramnagar']
                ];
                @endphp
                @foreach($details as $detail)
                <div class="flex justify-between items-center text-sm py-1">
                    <span class="text-gray-400 font-medium text-[11px] uppercase tracking-wider">{{ $detail['label']
                        }}</span>
                    <span class="text-gray-900 font-bold tracking-tight">{{ $detail['value'] }}</span>
                </div>
                @if(!$loop->last) <div class="h-px bg-green-50"></div> @endif
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-green-50 shadow-sm">
            <h3 class="text-[10px] font-bold text-green-700 uppercase tracking-[0.2em] text-center mb-6">International
                Trends</h3>

            <div class="space-y-4">
                @php
                $trends = [
                ['label' => 'Village Users', 'value' => '9,898'],
                ['label' => 'District Users', 'value' => '989,897'],
                ['label' => 'State Users', 'value' => '98,989,890']
                ];
                @endphp
                @foreach($trends as $trend)
                <div class="flex justify-between items-center text-sm py-1">
                    <span class="text-gray-400 font-medium text-[11px] uppercase tracking-wider">{{ $trend['label']
                        }}</span>
                    <span class="text-green-800 font-extrabold tracking-tight tabular-nums">{{ $trend['value'] }}</span>
                </div>
                @if(!$loop->last) <div class="h-px bg-green-50"></div> @endif
                @endforeach
            </div>
        </div>
    </div>
    </div>
</x-layout.pages.village>
