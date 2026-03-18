<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Villages | Prarang</title>
    <link href="https://unpkg.com/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/villages-style.css') }}">
</head>

<body>
    <header class="py-3 bg-white/50 backdrop-blur-sm  top-0 z-40 border-b border-green-50">
        <div class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                <!-- Search Trigger -->
                <div class="lg:col-span-3">
                    <div class="inline-block">
                        <label class="block text-[10px] font-bold text-green-700 uppercase tracking-[0.2em] mb-1.5 ml-1">India Villages</label>
                        <div onclick="document.getElementById('locationModal').classList.remove('hidden')"
                            class="flex items-center gap-3 px-4 py-2.5 bg-white border border-green-100 rounded-2xl shadow-sm cursor-pointer hover:bg-green-50 hover:border-green-200 hover:shadow-md transition-all duration-300 group min-w-[180px]">
                            <div class="bg-green-100 p-1.5 rounded-lg group-hover:bg-green-600 transition-colors duration-300">
                                <svg class="w-3.5 h-3.5 text-green-700 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <span class="text-sm text-green-800/70 font-semibold">Change Village</span>
                        </div>
                    </div>
                </div>

                <!-- Main Branding -->
                <div class="lg:col-span-6 flex flex-col items-center">
                    <div class="flex items-center mb-3">
                        <div class="relative">
                            <div class="absolute inset-0  blur-xl opacity-30 animate-pulse"></div>
                            <img class="h-14 w-14 relative z-10 drop-shadow-sm" src="https://www.prarang.in/assets/images/home/Villages-1.png" alt="Prarang Logo">
                        </div>
                        <h1 class="text-3xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-green-900 to-green-700 ml-4 tracking-tight">Ramnagar Village</h1>
                    </div>
                    <div class="relative px-6 py-2.5 rounded-full bg-gradient-to-r from-green-50 to-white border border-green-100/50 shadow-sm overflow-hidden group">
                        <div class="absolute inset-0 bg-white/40 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                        <p class="text-center text-sm font-medium text-green-800 italic relative z-10">
                            "Capital of Panchalas - Ancient India Metropolis, now a serene Village."
                        </p>
                    </div>
                </div>

                <!-- Village Stats -->
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-2xl p-4 border border-green-50 shadow-sm">
                        <div class="grid grid-cols-2 gap-y-3 gap-x-4">
                            <div class="space-y-0.5">
                                <span class="text-[9px] font-semibold text-green-600/60  tracking-widest">District</span>
                                <p class="text-xs font-bold text-gray-800">Bareilly</p>
                            </div>
                            <div class="space-y-0.5">
                                <span class="text-[9px] font-semibold text-green-600/60  tracking-widest">State</span>
                                <p class="text-xs font-bold text-gray-800">Uttar Pradesh</p>
                            </div>
                            <div class="space-y-0.5 border-t border-green-500 pt-2">
                                <span class="text-[9px] font-semibold text-green-600/60  tracking-widest">Pop. (2026)</span>
                                <p class="text-xs font-extrabold text-green-700">12,450</p>
                            </div>
                            <div class="space-y-0.5 border-t border-green-500 pt-2">
                                <span class="text-[9px] font-semibold text-green-600/60  tracking-widest">Pop. (2011)</span>
                                <p class="text-xs font-bold text-gray-500 line-through decoration-red-300">9,820</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        {{ $slot }}
    </main>

    <!-- Location Search Modal -->
    <div id="locationModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-green-900/60 backdrop-blur-md"
            onclick="document.getElementById('locationModal').classList.add('hidden')"></div>
        <div
            class="relative w-full max-w-lg bg-white rounded-[32px] shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
            <div class="p-8">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-green-900">Select Village</h2>
                        {{-- <p class="text-sm text-green-600 font-medium">Find your village from India's database</p>
                        --}}
                    </div>
                    <button onclick="document.getElementById('locationModal').classList.add('hidden')"
                        class="p-2 hover:bg-green-50 rounded-full transition-colors text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-[11px] font-bold text-green-700 uppercase tracking-widest mb-2 ml-1">1.
                            Select State</label>
                        <select
                            class="w-full px-5 py-4 bg-green-50 border-2 border-transparent focus:border-green-500 focus:bg-white rounded-2xl outline-none text-green-900 font-semibold transition-all appearance-none cursor-pointer">
                            <option value="">Choose State</option>
                            <option>Uttar Pradesh</option>
                            <option>Bihar</option>
                            <option>Madhya Pradesh</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-green-700 uppercase tracking-widest mb-2 ml-1">2.
                            Select District</label>
                        <select
                            class="w-full px-5 py-4 bg-green-50 border-2 border-transparent focus:border-green-500 focus:bg-white rounded-2xl outline-none text-green-900 font-semibold transition-all appearance-none cursor-pointer">
                            <option value="">Choose District</option>
                            <option>Lucknow</option>
                            <option>Varanasi</option>
                            <option>Prayagraj</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-green-700 uppercase tracking-widest mb-2 ml-1">3.
                            Select Village</label>
                        <select
                            class="w-full px-5 py-4 bg-green-50 border-2 border-transparent focus:border-green-500 focus:bg-white rounded-2xl outline-none text-green-900 font-semibold transition-all appearance-none cursor-pointer">
                            <option value="">Choose Village</option>
                            <option>Ramnagar</option>
                            <option>Chandauli</option>
                            <option>Sarnath</option>
                            <option>Other Village</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
