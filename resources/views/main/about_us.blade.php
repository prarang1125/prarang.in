@php
$metaData = ['nav-heading' => 'About us', 'nav-sub-heading' => ''];
@endphp
<x-layout.main.base :metaData="$metaData">
    <main class="bg-white">
        {{-- Signature strip: the three "basic colours" the whole brand is named after --}}
        <div class="flex h-1.5 w-full">
            <div class="flex-1 bg-blue-600"></div>
            <div class="flex-1 bg-yellow-300"></div>
            <div class="flex-1 bg-red-500"></div>
        </div>
        <!-- <section>
            <div class="flex items-center justify-center gap-2 mt-2 ">
                <img src="{{ asset('assets/images/filter/elephant.png') }}" alt="Prarang"
                    class="w-auto h-4 mb-1 sm:h-20">
                <h1 class="mt-3 font-serif text-3xl font-bold">
                    About
                    <span class="text-blue-600">Pra</span><span class="text-yellow-300">ra</span><span class="text-red-500">ng</span>
                </h1>
            </div>
        </section> -->
        <div class="max-w-6xl px-4 mx-auto sm:px-8">
            <section class="py-4 sm:py-20">
                <p class="mb-2 text-center text-xs font-semibold uppercase tracking-[0.3em] text-blue-600">
                    Where the name comes from
                </p>
                <h2 class="mb-8 font-serif text-3xl font-bold text-center text-slate-900 sm:text-4xl">
                    The Meaning of
                    <span class="text-blue-600">Pra</span><span class="text-yellow-400">ra</span><span class="text-red-500">ng</span>
                </h2>
                <div class="max-w-3xl mx-auto space-y-4 text-sm leading-relaxed text-slate-700 sm:text-base">
                    <p>
                        <strong class="text-slate-900">Pra Rang</strong> means Colours, and the prefix
                        <strong class="text-slate-900">Pra</strong> refers to its origin, or base. Together,
                        Prarang (प्राथमिक रंग) is a lesser-used Sanskrit name that translates to the
                        <em>Basics of Colours</em>. Blue, yellow and red are the base colours from which every
                        other colour originates &mdash; and that idea sits at the heart of our logo, representing
                        the colours of diversity within the unity of India.
                    </p>
                    <p>
                        The elephant has, allegorically, long stood for India itself &mdash; not the modern
                        political map, but a borderless idea that reaches beyond it. With over six hundred
                        thousand villages and nine thousand towns and cities, no single person could ever hope to
                        see all of India in one lifetime. The old parable of the blind men and the elephant
                        reminds us of the danger of fragmented knowledge, and the need to balance subjectivity
                        with objectivity.
                    </p>
                </div>
                <div class="flex items-center justify-center w-full max-w-3xl gap-2 mx-auto mt-10 sm:gap-6">
                    <img
                        src="{{ asset('http://prarang.in/images/prarang-3.jpg') }}"
                        alt="Prarang elephant motif"
                        class="flex-1 h-auto min-w-0 p-2 border max-h-56 rounded-2xl border-slate-200 sm:p-4">
                    <!-- <img
                        src="{{ asset('assets/images/arrow.png') }}"
                        alt="Arrow"
                        class="w-5 h-5 shrink-0 sm:h-8 sm:w-8"> -->
                    <div></div>
                    <img
                        src="{{ asset('http://prarang.in/images/prarang-4.jpg.png') }}"
                        alt="Prarang elephant motif"
                        class="flex-1 h-auto min-w-0 p-2 border max-h-56 rounded-2xl border-slate-200 sm:p-4">
                </div>
                <p class="max-w-3xl mx-auto mt-8 text-sm italic leading-relaxed text-slate-600 sm:text-base">
                    Seeing the entire elephant, in all his colours and splendour, is true unity in diversity.
                    That can only be achieved through borderless, meta-disciplinary and holistic education.
                    Prarang is that Basic-Colours Elephant &mdash; as it walks across the cities, towns and
                    villages of India spreading its many colours, it means to transform everyone who sees it
                    into Smarter Citizens.
                </p>
            </section>
            <section class="border-t border-slate-200 py-14 sm:py-20">
                <p class="mb-2 text-center text-xs font-semibold uppercase tracking-[0.3em] text-red-500">
                    What we believe
                </p>
                <h2 class="mb-10 font-serif text-3xl font-bold text-center text-slate-900 sm:text-4xl">
                    Mission &amp; Vision
                </h2>
                <!-- <div class="grid grid-cols-1 gap-6 lg:grid-cols-2"> -->
                <div>
                    {{-- Mission --}}
                    <!-- <div class="border shadow-sm rounded-2xl border-slate-200 p-7"> -->
                    <div>
                        <h2 class="mb-2 text-xl font-bold text-center text-slate-900">Mission</h2>
                        <p class="mb-4 flex flex-wrap justify-center gap-x-1.5 gap-y-1 text-center text-base font-semibold text-blue-700">
                            <span class="inline-flex items-center gap-1.5">
                                Think Global
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-blue-600">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M2 12h20"></path>
                                    <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                </svg>
                            </span>
                            <span>, Act Local</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-red-500">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </p>
                        <p class="text-sm leading-relaxed text-center text-slate-600">
                            To create Smarter Citizens by bridging the Digital Divide through innovative internet
                            technologies and hyperlocal content, city by city, in its own local language.
                        </p>
                        <!-- </div>
                    {{-- Vision --}}
                    <div class="border shadow-sm rounded-2xl border-slate-200 p-7"> -->
                        <h2 class="mb-2 text-xl font-bold text-center text-slate-900">Vision</h2>
                        <p class="mb-4 flex flex-wrap items-center justify-center gap-x-1.5 gap-y-1 text-center text-sm font-semibold text-slate-700">
                            <span class="inline-flex items-center gap-1.5">
                                Citizenship based on Respect for Diversity
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="w-4 h-4 text-blue-600 shrink-0">
                                    <circle cx="12" cy="7" r="3"></circle>
                                    <path d="M6 21v-2a6 6 0 0 1 12 0v2"></path>
                                    <circle cx="5" cy="10" r="2"></circle>
                                    <path d="M1 21v-1a4 4 0 0 1 6-3.46"></path>
                                    <circle cx="19" cy="10" r="2"></circle>
                                    <path d="M23 21v-1a4 4 0 0 0-6-3.46"></path>
                                </svg>
                            </span>
                            <span>&amp;</span>
                            <span class="inline-flex items-center gap-1.5">
                                a Belief in Unity
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="w-4 h-4 text-red-500 shrink-0">
                                    <circle cx="12" cy="6" r="3"></circle>
                                    <circle cx="5" cy="12" r="3"></circle>
                                    <circle cx="19" cy="12" r="3"></circle>
                                    <circle cx="12" cy="18" r="3"></circle>
                                    <path d="M9.8 7.8 7.2 10"></path>
                                    <path d="M14.2 7.8 16.8 10"></path>
                                    <path d="M7.8 14.2 10 16.2"></path>
                                    <path d="M16.2 14.2 14 16.2"></path>
                                </svg>
                            </span>
                        </p>
                        <p class="mb-4 text-sm font-semibold text-center text-slate-900">
                            Cities&nbsp;/&nbsp;Villages <span class="text-blue-700">I&nbsp;-&nbsp;RULE</span>
                        </p>
                        <ul class="space-y-3 text-xs sm:text-sm">
                            <li class="flex gap-3 p-3 rounded-xl bg-blue-50">
                                <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-blue-600 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="currentColor">
                                        <circle cx="12" cy="18" r="1.5" />
                                        <path d="M9.17 15.17a4 4 0 0 1 5.66 0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M6.34 12.34a8 8 0 0 1 11.32 0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M3.51 9.51a12 12 0 0 1 16.98 0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <span class="text-slate-700">
                                    <strong class="text-blue-700">I &ndash; Internet:</strong>
                                    Localized, socially-responsible internet content for each city in its local language.
                                </span>
                            </li>
                            <li class="flex gap-3 p-3 rounded-xl bg-yellow-50">
                                <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-yellow-400 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <circle cx="11.5" cy="14.5" r="2.5"></circle>
                                        <line x1="13.3" y1="16.3" x2="16" y2="19"></line>
                                    </svg>
                                </span>
                                <span class="text-slate-700">
                                    <strong class="text-yellow-600">R &ndash; Research:</strong>
                                    Research grounded in evolutionary data and science, focused on economic
                                    geography and employment &mdash; not political history or dynasties.
                                </span>
                            </li>
                            <li class="flex gap-3 p-3 rounded-xl bg-red-50">
                                <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-red-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2 22h20"></path>
                                        <path d="M6 18v-5"></path>
                                        <path d="M10 18v-9"></path>
                                        <path d="M14 18V6"></path>
                                        <path d="M18 18v-2"></path>
                                        <path d="M6 13h4v5H6z"></path>
                                        <path d="M10 9h4v9h-4z"></path>
                                        <path d="M14 6h4v12h-4z"></path>
                                    </svg>
                                </span>
                                <span class="text-slate-700">
                                    <strong class="text-red-600">U &ndash; Urbanization:</strong>
                                    Bio-regional city planning &mdash; the interdependence of culture and nature.
                                </span>
                            </li>
                            <li class="flex gap-3 p-3 rounded-xl bg-blue-50">
                                <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-blue-600 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 4h11v8H7l-3 3v-3H3Z"></path>
                                        <path d="M6 7h5"></path>
                                        <path d="M6 9.5h3"></path>
                                        <path d="M21 10H10v8h7l3 3v-3h1Z"></path>
                                        <path d="M13 13h5"></path>
                                        <path d="M13 15.5h3"></path>
                                    </svg>
                                </span>
                                <span class="text-slate-700">
                                    <strong class="text-blue-700">L &ndash; Language:</strong>
                                    Diversity prioritized by language, not by political geography or ethnicity.
                                </span>
                            </li>
                            <li class="flex gap-3 p-3 rounded-xl bg-yellow-50">
                                <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-yellow-400 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2 8l10-5 10 5-10 5-10-5z"></path>
                                        <path d="M6 12v4c0 1.5 2.7 2.5 6 2.5s6-1 6-2.5v-4"></path>
                                        <path d="M18 9v5a1 1 0 0 0 1 1h1"></path>
                                    </svg>
                                </span>
                                <span class="text-slate-700">
                                    <strong class="text-yellow-600">E &ndash; Education:</strong>
                                    Trans-disciplinary, value-embedding and holistic education.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            {{-- ============ SECTION: KNOWLEDGE WEB ============ --}}
            <section class="border-t border-slate-200 py-14 sm:py-20">
                <p class="mb-2 text-center text-xs font-semibold uppercase tracking-[0.3em] text-blue-600">
                    What we do
                </p>
                <h2 class="mb-3 font-serif text-3xl font-bold text-center text-slate-900 sm:text-4xl">
                    Knowledge Web
                </h2>
                <p class="max-w-2xl mx-auto mb-10 text-sm text-center text-slate-600 sm:text-base">
                    Contextualized content, localized globally &mdash; an integrated B2C, B2B and G2C approach
                    delivered hyperlocally through the World Wide Web, to guide the journey from
                    <strong class="text-slate-900">information</strong> to <strong class="text-slate-900">knowledge</strong>,
                    and eventually to <strong class="text-slate-900">wisdom</strong>.
                </p>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="p-6 border rounded-2xl border-slate-200">
                        <span class="inline-block w-8 h-2 mb-3 bg-blue-600 rounded-full"></span>
                        <h3 class="mb-2 font-serif text-lg font-bold text-blue-700">Content</h3>
                        <p class="text-sm leading-relaxed text-slate-600">
                            Prarang gets to the DNA of content through its unique
                            <span class="font-semibold text-slate-900"><a href="https://www.shabdachitra.com/" class="hover:underline">Shabdachitra</a></span> model &mdash;
                            databases of text, images, data and maps for the culture and nature of each
                            geography, built around Work, Place and Citizenship in the bio-regional Geddesian
                            model. This is the <span style="font-weight: bold; font-size: medium;"> &nbsp; <a type="button" class=""
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Prarang Way
                                </a></span>
                            <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" style="displaynone;">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Prarang Ways</h1> -->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <p class="text-center h2">Prarang Way</p>
                                        <p><br><b>The Prarang R&amp;D Process Reach. Reorganize. Re-Connect</b></p>
                                        <p>Prarang has a unique research methodology which relies on a thorough analysis
                                            of each City/Town selected, in terms of (i) the evolution of the City, (ii)
                                            what <b>Work</b>/occupations of the people of the City currently work in,
                                            (iii)the co-relation between each type of Work &amp; the <b>Natural</b>
                                            surroundings &amp; the historical evolution of the City, (iv) and the
                                            diversity of the <b>Citizens</b> living in the City. A complete review of
                                            <b>Work, Place</b> &amp; <b>Citizenship</b> results in defining a
                                            bio-regional focus for the City. Next, a dedicated Researcher &amp; Daily
                                            Content Writer is assigned to the City, and Advisors are appointed on a City
                                            Councilto advise &amp; quarterly review the City Content Calendarused by the
                                            Researcher of the City, to create Daily Knowledge &amp; Topical Postsof
                                            Global Knowledge, localized for the City &amp; shared daily through social
                                            media &amp; the android App.<br>The selection of the Knowledge posts on
                                            different streams/disciplines is a balance that is achieved keeping the
                                            bio-regional focus of the location &amp; following a 7 step methodology
                                            leading to the eventual Daily Knowledge post. The daily post is tagged &amp;
                                            classified into the City:s knowledge repository of Culture &amp; Nature, a
                                            60 section store-house designed to support intelligent retrieval for the
                                            future needs of Smarter Citizens.
                                        </p>
                                        <p>This 7 step Process has Step-4 in the middle, as the heart of the process We
                                            actually create the content of each Knowledge Post from 3 distinct
                                            components - Data, Images &amp; Text ( Books &amp; Digital) sources. The
                                            bio-regional focus document &amp; the <br>City Council advisors then assist
                                            in defining the 4th component i.e. Intent, before the content-writer creates
                                            the daily post.</p>
                                        <img class="img-fluid"
                                            src="https://prarang.in/images/Process_Chart_Prarang_1-2.jpg"
                                            alt="About US">
                                        <img class="img-fluid"
                                            src="https://prarang.in/images/Process_Chart_Prarang_2.jpg"
                                            alt="About US">
                                        <img class="img-fluid"
                                            src="https://prarang.in/images/Process_Chart_Prarang_3.jpg"
                                            alt="About US">
                                        <img class="img-fluid"
                                            src="https://prarang.in/images/Process_Chart_Prarang_4.jpg"
                                            alt="About US">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                    <div class="p-6 border rounded-2xl border-slate-200">
                        <span class="inline-block w-8 h-2 mb-3 bg-red-500 rounded-full"></span>
                        <h3 class="mb-2 font-serif text-lg font-bold text-red-600">Semiotics</h3>
                        <p class="text-sm leading-relaxed text-slate-600">
                            Our <span class="font-semibold text-slate-900">City-Semiotics</span> model reads
                            what a geography's content trends &mdash; reading, rejecting, browsing and watching
                            &mdash; reveal about its changing emotions and interests, feeding a continuous loop
                            useful for governance and for customizing products and solutions.
                        </p>
                    </div>
                    <div class="p-6 border rounded-2xl border-slate-200">
                        <span class="inline-block w-8 h-2 mb-3 bg-yellow-400 rounded-full"></span>
                        <h3 class="mb-2 font-serif text-lg font-bold text-yellow-600">Analytics</h3>
                        <p class="text-sm leading-relaxed text-slate-600">
                            We estimate and update country and world data from government, UN and reliable
                            public sources, building our own internet and social-media reach estimates.
                            Alongside daily content, we track readership metrics against socio-economic,
                            cultural and natural data.
                        </p>
                    </div>
                    <div class="p-6 border rounded-2xl border-slate-200">
                        <span class="inline-block w-8 h-2 mb-3 bg-blue-600 rounded-full"></span>
                        <h3 class="mb-2 font-serif text-lg font-bold text-blue-700">Languages</h3>
                        <p class="text-sm leading-relaxed text-slate-600">
                            Access to the web varies by literacy in the language of both creator and reader.
                            On Prarang Knowledge Webs, we build on the scripts of
                            <span class="font-semibold text-slate-900">mother-tongue languages</span> as the
                            foundational layer of everything we do on the web.
                        </p>
                    </div>
                </div>
                <p class="max-w-xl mx-auto mt-10 font-serif text-lg font-bold text-center text-blue-800">
                    There is a lot of knowledge outside the web too &mdash; we love books.
                </p>
            </section>
            {{-- ============ SECTION: MUSEUM OF KNOWLEDGE ============ --}}
            <section class="border-t border-slate-200 py-14 sm:py-20">
                <p class="mb-2 text-center text-xs font-semibold uppercase tracking-[0.3em] text-red-500">
                    Beyond the screen
                </p>
                <h2 class="mb-8 font-serif text-3xl font-bold text-center text-slate-900 sm:text-4xl">
                    Museum of Knowledge
                </h2>
                <div class="max-w-3xl mx-auto">
                    <blockquote class="pl-5 mb-8 font-serif text-lg italic border-l-4 border-yellow-400 text-slate-800 sm:text-xl">
                        &ldquo;I have always imagined that paradise will be a kind of library.&rdquo;
                        <footer class="mt-1 font-sans text-sm not-italic text-slate-500">&mdash; Jorge Luis Borges</footer>
                    </blockquote>
                    <div class="space-y-4 text-sm leading-relaxed text-slate-700 sm:text-base">
                        <p>
                            Can all the knowledge of the world be contained in one place? Borges imagines just
                            such a place in <em>The Library of Babel</em> &mdash; an endless library holding not
                            only every book ever made, but books yet to be made. In <em>The Aleph</em>, he pushes
                            the idea further still: complete knowledge of the universe is impossible for anyone
                            to collect or curate.
                        </p>
                        <!-- <a href="https://sarganga.org/" target="_blank" rel="noopener noreferrer">
                            <img src="https://sarganga.org/assets/main/images/logo.jpg" alt="Sarganga Logo"
                                class="w-auto h-auto p-4 mx-auto border max-h-56 rounded-2xl border-slate-200">
                        </a> -->
                        <div class="max-w-sm mx-auto my-4">
                            <a
                                href="https://sarganga.org/" target="_blank" rel="noopener noreferrer"
                                class="group flex items-center gap-5 rounded-2xl border border-slate-100 bg-white p-3 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md no-underline">

                                <div class="flex items-center justify-center w-40 overflow-hidden bg-white h-36 shrink-0 rounded-xl">
                                    <img
                                        src="https://sarganga.org/assets/main/images/logo.jpg"
                                        alt="Sarganga Logo"
                                        class="object-contain w-full h-full">
                                </div>
                                
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-2xl font-bold leading-tight text-black ">
                                        Saraswati<br>
                                        by Ganga<br>
                                        Museum
                                    </h4>
                                    <p class="mt-2 text-sm text-slate-600">
                                        sarganga.org
                                    </p>
                                </div>

                                <div class="px-2 shrink-0">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="w-5 h-5 transition-transform duration-300 text-slate-300 group-hover:translate-x-1 group-hover:text-slate-500">
                                        <path d="M5 12h14"></path>
                                        <path d="m13 6 6 6-6 6"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>

                        <p>
                            We aim to curate a <strong class="text-slate-900">Prarang Museum</strong> showcasing
                            the story of Indian civilization through the evolution of its cities and towns,
                            along its rivers. This river-civilization museum will be built on the outskirts of
                            New Delhi, along the <strong class="text-slate-900">River Ganga</strong>. While the
                            building itself will take years, the library it will house &mdash; books, coins,
                            statues, maps, comics, stamps, posters, carpets, furniture, textiles, fossils, stones
                            and other collectibles relating to Indian cities &mdash; has already been gathered by
                            Prarang's founding team over the past 25 years, and forms the backbone of our daily
                            knowledge posts.
                        </p>
                        <p>
                            We do not recycle information already available online. We research with the intent
                            of writing for a specific city's reader, aware of their linguistic level, education
                            level and economic need &mdash; because mere translation is not what Prarang does.
                        </p>
                    </div>
                </div>
            </section>
            {{-- ============ SECTION: OUR TEAM ============ --}}
            <!-- <section class="border-t border-slate-200 py-14 sm:py-20">
                <p class="mb-2 text-center text-xs font-semibold uppercase tracking-[0.3em] text-yellow-600">
                    Who's behind it
                </p>
                <h2 class="mb-2 font-serif text-3xl font-bold text-center text-slate-900 sm:text-4xl">
                    Our Team
                </h2>
                <p class="mb-10 text-sm text-center text-slate-600">
                    Prarang is an 8+ year old venture, funded and incubated by Indoeuropeans (India) Pvt. Ltd.
                </p>
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7">
                    @forelse($team as $member)
                    <div class="p-4 text-center transition-shadow border group rounded-2xl border-slate-200 hover:shadow-md">
                        <img src="{{ Storage::url($member['profile_image']) }}" alt="{{ $member['display_name'] }}"
                            class="object-cover w-16 h-16 mx-auto mb-3 rounded-full ring-2 ring-slate-100 group-hover:ring-blue-200">
                        <h5 class="text-sm font-semibold text-slate-900">{{ $member['display_name'] }}</h5>
                        <p class="mt-0.5 text-xs text-slate-500">{{ $member['role'] }}</p>
                        <a href="{{ $member['linkedin_link'] }}" target="_blank" rel="noopener noreferrer"
                            class="inline-block mt-2">
                            <img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn" class="w-5 h-5 transition-opacity opacity-70 hover:opacity-100">
                        </a>
                    </div>
                    @empty
                    <p class="text-sm text-center col-span-full text-slate-500">
                        No team members found.
                    </p>
                    @endforelse
                </div>
            </section> -->
            <section class="border-t border-slate-200 py-14 sm:py-20">
                <p class="mb-2 text-center text-xs font-semibold uppercase tracking-[0.3em] text-yellow-600">
                    Who's behind it
                </p>
                <h2 class="mb-2 font-serif text-3xl font-bold text-center text-slate-900 sm:text-4xl">
                    Our Team
                </h2>
                <p class="mb-10 text-sm text-center text-slate-600">
                    Prarang is an 8+ year old venture, funded and incubated by
                    Indoeuropeans (India) Pvt. Ltd.
                </p>
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7">
                    @forelse($team as $member)
                    <div
                        class="flex flex-col items-center h-full min-w-0 p-4 text-center transition-shadow border group rounded-2xl border-slate-200 hover:shadow-md">
                        <!-- Profile Image -->
                        <div class="flex items-center justify-center w-16 h-16 mb-3 shrink-0">
                            <img
                                src="{{ Storage::url($member['profile_image']) }}"
                                alt="{{ $member['display_name'] }}"
                                class="object-cover w-16 h-16 transition rounded-full shrink-0 ring-2 ring-slate-100 group-hover:ring-blue-200">
                        </div>
                        <!-- Name -->
                        <h5 class="w-full text-sm font-semibold truncate text-slate-900">
                            {{ $member['display_name'] }}
                        </h5>
                        <!-- Role -->
                        <p class="mt-0.5 w-full truncate text-xs text-slate-500">
                            {{ $member['role'] }}
                        </p>
                        <!-- LinkedIn -->
                        <a
                            href="{{ $member['linkedin_link'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-2 shrink-0">
                            <img
                                src="https://cdn-icons-png.flaticon.com/512/174/174857.png"
                                alt="LinkedIn"
                                class="w-5 h-5 transition-opacity opacity-70 hover:opacity-100">
                        </a>
                    </div>
                    @empty
                    <p class="text-sm text-center col-span-full text-slate-500">
                        No team members found.
                    </p>
                    @endforelse
                </div>
            </section>
            {{-- ============ SECTION: CONTACT & FOLLOW ============ --}}
            <section class="border-t border-slate-200 py-14 sm:py-20">
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">
                    <div class="lg:col-span-2">
                        <p class="mb-2 text-xs font-semibold uppercase tracking-[0.3em] text-blue-600">
                            Get in touch
                        </p>
                        <h2 class="mb-6 font-serif text-3xl font-bold text-slate-900 sm:text-4xl">
                            Contact Us
                        </h2>
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <p class="text-sm text-slate-600">
                                    <strong class="text-slate-900">Hours:</strong>
                                    Monday&ndash;Saturday, 9:00 AM&ndash;6:00 PM
                                    <span class="block text-xs text-slate-400">(excluding national holidays)</span>
                                </p>
                                <ul class="mt-4 space-y-2 text-sm text-slate-700">
                                    <li>
                                        <span class="font-semibold text-slate-900">E-mail:</span>
                                        <a href="mailto:query@prarang.in" class="text-blue-600 hover:underline">query@prarang.in</a>
                                    </li>
                                    <li>
                                        <span class="font-semibold text-slate-900">Phone:</span>
                                        <a href="tel:+911204561284" class="text-blue-600 hover:underline">+91-1204561284</a>
                                    </li>
                                </ul>
                                <p class="mt-4 text-sm text-slate-700">
                                    <strong class="text-slate-900">Address:</strong><br>
                                    Office 1125, 11th floor, The i-Thum,<br>
                                    A-40 Sector 62, Noida (U.P), India 201309
                                </p>
                            </div>
                            <div class="overflow-hidden border rounded-2xl border-slate-200">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2476.346822157996!2d77.37068314198369!3d28.62726225389863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5b1e8eb3efd%3A0xb0b7ceccf9d23b6c!2sPrarang!5e0!3m2!1sen!2sin!4v1691140181153!5m2!1sen!2sin"
                                    class="w-full h-64" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="mb-2 text-xs font-semibold uppercase tracking-[0.3em] text-red-500">
                            Stay connected
                        </p>
                        <h2 class="mb-6 font-serif text-3xl font-bold text-slate-900 sm:text-4xl">
                            Follow Us
                        </h2>
                        <div class="flex gap-3">
                            <a href="https://www.facebook.com/prarang.in/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="flex items-center justify-center transition-shadow border rounded-full h-11 w-11 border-slate-200 hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22" height="22">
                                    <circle cx="256" cy="256" r="256" fill="#1877F2" />
                                    <path d="M273.5 416V277.5h46.5l7-54h-53.5v-34.5c0-15.5 4.3-26.2 26.7-26.2H329v-48.3c-5.2-.7-23.2-2.2-44.2-2.2-43.8 0-73.8 26.8-73.8 76V223.5h-46.7v54h46.7V416h62.5z" fill="#FFFFFF" />
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/prarang_in/?hl=en" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="flex items-center justify-center transition-shadow border rounded-full h-11 w-11 border-slate-200 hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22" height="22">
                                    <defs>
                                        <radialGradient id="ig-grad-core" cx="20%" cy="100%" r="135%" fx="20%" fy="100%">
                                            <stop offset="0%" stop-color="#FFDD55" />
                                            <stop offset="15%" stop-color="#FF543E" />
                                            <stop offset="40%" stop-color="#DE1D7E" />
                                            <stop offset="70%" stop-color="#9127B7" />
                                            <stop offset="100%" stop-color="#3748D1" />
                                        </radialGradient>
                                    </defs>
                                    <rect width="512" height="512" rx="115" fill="url(#ig-grad-core)" />
                                    <path d="M256 109.3c47.8 0 53.4.2 72.3 1 17.4.8 26.9 3.7 33.2 6.2 8.4 3.2 14.3 7.1 20.6 13.4 6.3 6.3 10.1 12.2 13.4 20.6 2.5 6.3 5.4 15.8 6.2 33.2.9 18.9 1 24.5 1 72.3s-.2 53.4-1 72.3c-.8 17.4-3.7 26.9-6.2 33.2-3.2 8.4-7.1 14.3-13.4 20.6-6.3 6.3-12.2 10.1-20.6 13.4-6.3 2.5-15.8 5.4-33.2 6.2-18.9.9-24.5 1-72.3 1s-53.4-.2-72.3-1c-17.4-.8-26.9-3.7-33.2-6.2-8.4-3.2-14.3-7.1-20.6-13.4-6.3-6.3-10.1-12.2-13.4-20.6-2.5-6.3-5.4-15.8-6.2-33.2-.9-18.9-1-24.5-1-72.3s.2-53.4 1-72.3c.8-17.4 3.7-26.9 6.2-33.2 3.2-8.4 7.1-14.3 13.4-20.6 6.3-6.3 12.2-10.1 20.6-13.4 6.3-2.5 15.8-5.4 33.2-6.2 18.9-.9 24.5-1 72.3-1zm0-36.6c-48.6 0-54.7.2-73.8 1.1-19 1-32 4-43.4 8.5-11.8 4.5-21.8 10.7-31.7 20.6-9.9 9.9-16.1 19.9-20.6 31.7-4.4 11.4-7.4 24.4-8.5 43.4-.9 19.1-1.1 25.2-1.1 73.8 0 48.6.2 54.7 1.1 73.8 1 19 4 32 8.5 43.4 4.5 11.8 10.7 21.8 20.6 31.7 9.9 9.9 19.9 16.1 31.7 20.6 11.4 4.4 24.4 7.4 43.4 8.5 19.1.9 25.2 1.1 73.8 1.1s54.7-.2 73.8-1.1c19-1 32-4 43.4-8.5 11.8-4.5 21.8-10.7 31.7-20.6 9.9-9.9 16.1-19.9 20.6-31.7 4.4-11.4 7.4-24.4 8.5-43.4.9-19.1 1.1-25.2 1.1-73.8s-.2-54.7-1.1-73.8c-1-19-4-32-8.5-43.4-4.5-11.8-10.7-21.8-20.6-31.7-9.9-9.9-19.9-16.1-31.7-20.6-11.4-4.4-24.4-7.4-43.4-8.5-19.1-.9-25.2-1.1-73.8-1.1zm0 110.1c-40.4 0-73.2 32.7-73.2 73.2s32.7 73.2 73.2 73.2 73.2-32.7 73.2-73.2-32.7-73.2-73.2-73.2zm0 109.8c-20.2 0-36.6-16.4-36.6-36.6 0-20.2 16.4-36.6 36.6-36.6s36.6 16.4 36.6 36.6c0 20.2-16.4 36.6-36.6 36.6zm113-146.4c0 14.5-11.8 26.3-26.3 26.3s-26.3-11.8-26.3-26.3 11.8-26.3 26.3-26.3 26.3 11.8 26.3 26.3z" fill="#FFFFFF" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/company/indeur-prarang/home/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="flex items-center justify-center transition-shadow border rounded-full h-11 w-11 border-slate-200 hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22" height="22">
                                    <rect width="512" height="512" rx="72" fill="#0A66C2" />
                                    <path d="M150 196h60v200h-60V196zm30-28c-19.3 0-35-15.7-35-35s15.7-35 35-35 35 15.7 35 35-15.7 35-35 35zM246 196h57v27h1c8-15 27-31 57-31 61 0 72 40 72 93v111h-60V290c0-25-1-57-35-57-35 0-40 27-40 55v108h-60V196z" fill="#FFFFFF" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="flex h-1.5 w-full">
            <div class="flex-1 bg-blue-600"></div>
            <div class="flex-1 bg-yellow-300"></div>
            <div class="flex-1 bg-red-500"></div>
        </div>
    </main>
</x-layout.main.base>
