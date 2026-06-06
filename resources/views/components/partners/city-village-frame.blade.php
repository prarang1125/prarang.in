{{-- layouts/partner-filter.blade.php --}}
@props(['step' => 1])
<section id="cities-village-filter-main">
    <link rel="stylesheet" href="{{ asset('assets/css/partner-filter.css') }}">

    {{-- Step Stepper --}}
    <div class="pf-stepper mb-2" id="pf-stepper">

        {{-- Step 1: Red --}}
        <div class="pf-step pf-step--red pf-step--first {{ $step >= 1 ? 'active' : '' }}" data-step="1">
            <div class="pf-step__num">1</div>
            <div class="pf-step__label">Select Geography</div>
        </div>

        {{-- Step 2: Amber --}}
        <div class="pf-step pf-step--amber {{ $step >= 2 ? 'active' : '' }}" data-step="2">
            <div class="pf-step__num">2</div>
            <div class="pf-step__label">Market Size</div>
        </div>

        {{-- Step 3: Light Green --}}
        <div class="pf-step pf-step--light-green {{ $step >= 3 ? 'active' : '' }}" data-step="3">
            <div class="pf-step__num">3</div>
            <div class="pf-step__label">Web Hosting</div>
        </div>

        {{-- Step 4: Dark Green --}}
        <div class="pf-step pf-step--dark-green  {{ $step >= 4 ? 'active' : '' }}" data-step="4">
            <div class="pf-step__num">4</div>
            <div class="pf-step__label">Select Solutions</div>
        </div>
        {{-- Step 5: Light Blue --}}
        <div class="pf-step pf-step--light-blue {{ $step >= 5 ? 'active' : '' }}" data-step="5">
            <div class="pf-step__num">5</div>
            <div class="pf-step__label">Est. Budget</div>
        </div>

        {{-- Step 6: Dark Blue --}}
        <div class="pf-step pf-step--dark-blue pf-step--last {{ $step >= 6 ? 'active' : '' }}" data-step="6">
            <div class="pf-step__num">6</div>
            <div class="pf-step__label">Partnership Request</div>
        </div>

    </div>

    <div class="pf-panel">
        {{-- Sticky Header --}}
        <div class="pf-header flex flex-col items-center justify-center">
            <div class="grid grid-cols-6">
                <div class="col-span-1">

                </div>
                <div class="col-span-4">
                    @yield('p-header')
                </div>
                <div class="col-span-1 flex items-end justify-end">
                    @if ($step == 1)
                    <div
                        class="flex flex-col justify-center items-center border-2 p-2 border-gray-300 rounded-lg shadow">
                        <span class="text-sm font-bold text-blue-600 uppercase tracking-wider">
                            <i class="ti ti-map-pin text-xs"></i> Analyse India
                        </span>
                        <div
                            class="flex divide-x divide-gray-200 border border-gray-300 rounded-lg overflow-hidden">
                            <a href="https://www.prarang.in/city-webs" target="_blank"
                                class="flex items-center gap-1 px-3 py-1.5 text-sm text-white bg-blue-600 hover:bg-blue-800 hover:text-white transition">
                                <i class="ti ti-building-community text-sm"></i> District
                            </a>
                            <a href="https://www.prarang.in/town-webs" target="_blank"
                                class="flex items-center gap-1 px-3 py-1.5 text-sm text-white bg-blue-600 hover:bg-blue-800 hover:text-white transition">
                                <i class="ti ti-buildings text-sm"></i> Cities
                            </a>
                            <a href="https://www.prarang.in/india-rural" target="_blank"
                                class="flex items-center gap-1 px-3 py-1.5 text-sm text-white bg-blue-600 hover:bg-blue-800 hover:text-white transition">
                                <i class="ti ti-home text-sm"></i> Villages
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex justify-end items-end mt-1 px-4 gap-4">
            @if ($step == 2 )
            <button type="button" data-bs-toggle="modal" data-bs-target="#source"
                class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg text-sm font-semibold transition-colors flex items-center gap-1.5 border border-blue-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Sources
            </button>
            @endif
            @if ($step >= 1 && $step <= 6)
                <button type="button" data-bs-toggle="modal" data-bs-target="#TheseMTw1"
                class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg text-sm font-semibold transition-colors flex items-center gap-1.5 border border-blue-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                FAQ
                </button>
                @endif
        </div>

        {{-- Scrollable Body --}}
        <div class="pf-body">
            {{ $slot }}
        </div>
        <div class="w-full px-4 pt-2">
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
        {{-- Sticky Footer --}}
        <div class="pf-footer">
            @yield('p-footer')
        </div>

    </div>

    @yield('p-modals')

    <!-- Plan Details Modal (Bootstrap 5) -->
    <div class="modal fade" id="TheseMTw1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="TheseMTw1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="TheseMTw1Label">Frequently Asked Questions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @switch($step)
                    @case(1)
                    <ol>
                        <li><strong>Q. How do I select my target KW Geographies?</strong></li>
                    </ol>
                    <p>Choose the cities and/or villages where you want Prarang to build and operate Knowledge Web (KW) portals. These locations define the geographic scope of your partnership.</p>
                    <ul>
                        <li><strong><strong>Cities</strong></strong>(Section A) &mdash; Urban settlements including District Capitals, Municipal Corporations, Urban Agglomerations, and Smart Cities. Select via State &rarr; District &rarr; Category (optional) &rarr; Cities.</li>
                        <li><strong><strong>Villages</strong></strong>(Section B) &mdash; Rural settlements. Select via State &rarr; District &rarr; Sub-District &rarr; Villages. You must pick a Sub-District before villages appear.</li>
                    </ul>
                    <p>Both can be combined in one plan. Use the <strong><strong>Analyse India</strong></strong>&nbsp;panel (top right) to research District, City, and Village data before making your selection.</p>
                    <ol>
                        <li><strong><strong>Q. What is the "Analyse India" panel?</strong></strong></li>
                    </ol>
                    <p>It links to Prarang's analytics tools so you can research geographies before making your selection.</p>
                    <ul>
                        <li><strong><strong>Districts</strong></strong>&mdash; Analysis of all 766 Indian districts (up from 640 in 2011), each with a District Capital. Useful for understanding district-level language, script, and population profiles before selecting your target geographies.</li>
                        <li><strong><strong>Cities</strong></strong>&mdash; Analysis of 6,331 cities and towns across India, including 768 State/District Capitals, 301 Urban Agglomerations, 278 Municipal Corporations, and 100 Smart Cities.</li>
                        <li><strong><strong>Villages</strong></strong>&mdash; Analysis of 592,765 inhabited villages, cross-referenced between Census 2011 and the Panchayat Raj LGD database (March 2026).</li>
                    </ul>
                    <p>&nbsp;</p>
                    @break

                    @case(2)
                    <p><strong>Q. How to interpret the data?</strong><br />Thedata tableis generated for every location you selected, showing Population (2011 and projected 2026), Literacy %, Internet Users, Social Media platform penetration &mdash; so you can evaluate the actual digital market size before committing to a plan along with the District&rsquo;s Cyber Risk Index.</p>
                    <p><strong>Q. How&nbsp;</strong><strong>to further define the KW Geography</strong><strong>?</strong></p>
                    <p>Select at least one language for each District Capital row. Language checkboxes appear in the last column ("Top 3 Languages"). You must tick at least one language per capital to proceed.&nbsp;</p>
                    <p><strong><strong>Q. Why do </strong></strong><strong><strong>L</strong></strong><strong><strong>anguage checkboxes and several data columns appear blank for N</strong></strong><strong><strong>o</strong></strong><strong><strong>n-</strong></strong><strong><strong>C</strong></strong><strong><strong>apital </strong></strong><strong><strong>C</strong></strong><strong><strong>ities and </strong></strong><strong><strong>V</strong></strong><strong><strong>illages?</strong></strong><br />Language selection operates at the district group level &mdash; the language(s) you choose for a District Capital automatically apply to all other cities and villages within the same district, so no separate selection is needed for them. Similarly, metrics like Literacy %, Social Media penetration, and the Cyber Risk Index are available at the District Capital level and are not shown for non-capital cities or villages.</p>
                    <p>&nbsp;</p>
                    @break

                    @case(3)
                    <p><strong>Q. What is a Hosting Location?</strong><strong><br /></strong>A Hosting Location determines where the Knowledge Web (KW) of city and village portals will be published and accessed by users.</p>
                    <p><strong><strong>Hosting Options</strong></strong></p>
                    <p><strong><strong>Prarang.in - Sub-Domain:</strong></strong></p>
                    <p>Your portal is hosted on Prarang under a dedicated partner directory (e.g.&nbsp;<a href="http://prarang.in/partner/xyz"><u>prarang.in/partner/xyz</u></a>).</p>
                    <p>&nbsp;</p>
                    <p><strong><strong>Your Website&nbsp;- Sub-Domain:</strong></strong></p>
                    <p>If you already have a website, Prarang can provide APIs and integration support to make the portal content and apps available on your own domain.</p>
                    <p>&nbsp;</p>
                    <p><strong><strong>New Website - Homepage:</strong></strong></p>
                    <p>If you need a separate website, Prarang can assist in setting up and deploying the portal on a new website.</p>
                    <p><strong><strong>Hosting Cost</strong></strong></p>
                    <table>
                        <tbody>
                            <tr>
                                <td width="159">
                                    <p><strong><strong>Hosting Location</strong></strong></p>
                                </td>
                                <td width="140">
                                    <p><strong><strong>One-Time Cost</strong></strong></p>
                                </td>
                                <td width="124">
                                    <p><strong><strong>Monthly Cost</strong></strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="159">
                                    <p>Prarang.in</p>
                                </td>
                                <td width="140">
                                    <p>₹0</p>
                                </td>
                                <td width="124">
                                    <p>₹1,000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="159">
                                    <p>Your Website</p>
                                </td>
                                <td width="140">
                                    <p>₹10,000</p>
                                </td>
                                <td width="124">
                                    <p>₹2,000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="159">
                                    <p>New Website</p>
                                </td>
                                <td width="140">
                                    <p>₹10,000</p>
                                </td>
                                <td width="124">
                                    <p>₹2,000</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><strong><strong>&nbsp;</strong></strong></p>
                    <p><strong><strong>Q. Why does Prarang.in show "Free" for some District Capital rows?</strong></strong></p>
                    <p>If your selected district contains at least one other city or village (beyond the District Capital itself), the District Capital's Standard Solution hosting on Prarang.in is provided free of cost to you. This free hosting applies only to Prarang.in &mdash; not to Your Website or New Website options.</p>
                    <p>&nbsp;</p>
                    @break

                    @case(4)
                    <p><strong>Q. What is a Standard Solution?</strong><strong><br /></strong>The Standard Solution is the base package included with every selected location. It provides the essential portal, content, analytics, and enrolment capabilities required to establish a digital presence for a city or village.</p>
                    <p>The Standard Solution is automatically included for all locations and cannot be removed.</p>
                    <p><strong><strong>What's Included?</strong></strong></p>
                    <ul>
                        <li><strong><strong>Automated City/Village Portal Content</strong></strong></li>
                        <li><strong><strong>Enrollment</strong></strong></li>
                    </ul>
                    <ul>
                        <li>City e-Cards &mdash; Free digital business and personal cards containing contact details, address, social links, and QR-code sharing.</li>
                        <li>City Yellow Pages &mdash; Free business listings showcasing products, services, and contact information.
                            <ul>
                                <li><strong><strong>Planners</strong></strong></li>
                            </ul>
                        </li>
                        <li>Market Planner &mdash; Identifies the most suitable districts and markets for business expansion across India.</li>
                        <li>Development Planner &mdash; Compares districts and states using ranked indicators to support development-focused decisions.</li>
                        <li>Cyber Risk Analyser &mdash; Identifies locations with elevated cyber-risk based on digital activity and potential fake-ID exposure.
                            <ul>
                                <li><strong><strong>District Analytics</strong></strong></li>
                            </ul>
                        </li>
                        <li>Rank-Based Insights &mdash; Shows how a district ranks against India's other 755 districts across multiple development categories.
                            <ul>
                                <li><strong><strong>Utility Widgets</strong></strong></li>
                            </ul>
                        </li>
                        <li>Time Widget &mdash; Displays the current local time for the selected location.</li>
                        <li>News Widget &mdash; Displays location-specific news and updates.</li>
                        <li>Weather Widget &mdash; Displays current weather conditions and forecasts for the location.</li>
                        <li>Maps Widget &mdash; Displays the location on an interactive map.
                            <ul>
                                <li><strong><strong>Comparison AI</strong></strong>&mdash; Compares selected districts, cities, villages, states, or countries across multiple indicators and datasets.</li>
                            </ul>
                        </li>
                    </ul>
                    <p><strong><strong>Note:</strong></strong>&nbsp;Standard Solutions are mandatory for all selected locations. Additional City Interaction Solutions may be added separately to enhance engagement, visibility, and local market intelligence.</p>
                    <p>&nbsp;</p>
                    <p><strong><strong>Q. What are City Interaction Solutions?</strong></strong><strong><strong><br /></strong></strong>City Interaction Solutions are optional add-on services designed to increase visibility, engagement, market intelligence, and performance measurement for a selected city or village. Digital marketing costs are expensive and dependent on the social media popular in the city or village which you have mutually selected with us.<br />Unlike the Standard Solution, these services can be added based on your objectives and budget.</p>
                    <p><strong><strong>Available Solutions</strong></strong><strong><strong><br /></strong></strong><strong><strong>City Posts</strong></strong><strong><strong><br /></strong></strong>Regular city-focused content published across Prarang's digital ecosystem to improve local visibility and audience engagement.</p>
                    <ul>
                        <li><strong><strong>Weekly</strong></strong>&mdash; One curated city post every week.</li>
                        <li><strong><strong>Alternate Day</strong></strong>&mdash; One city post every alternate day.</li>
                        <li><strong><strong>Daily</strong></strong>&mdash; One city post every day for maximum reach and engagement.</li>
                    </ul>
                    <p><strong><strong>City Yellow Pages Promotion</strong></strong><strong><strong><br /></strong></strong>Enhanced visibility and digital promotion for businesses listed in the City Yellow Pages.</p>
                    <p><strong><strong>City Outdoor Ad Analytics</strong></strong><strong><strong><br /></strong></strong>Monthly tracking of outdoor advertisements across the city, including brands, industries, and advertising formats. Provides visibility into local advertising activity and competitor presence.</p>
                    <p><strong><strong>District Analytics</strong></strong><strong><strong><br /></strong></strong>Access district-level intelligence built from 140+ indicators across demographic, socio-economic, and culture-nature categories, standardized across India's 756 districts.</p>
                    <p><strong><strong>Semiotics</strong></strong><strong><strong><br /></strong></strong>Insights into the city's mood, interests, occupations, educational preferences, and local versus foreign cultural orientation.</p>
                    <p><strong><strong>Partner Metrics</strong></strong><strong><strong><br /></strong></strong>A comprehensive performance dashboard designed to measure engagement, audience growth, and digital visibility. It includes the following:</p>
                    <ul>
                        <li><strong><strong>Content Metrics</strong></strong>&mdash; Reach and engagement reporting across Facebook, WhatsApp, Mobile Apps, Email Campaigns, and Google (SEO).</li>
                        <li><strong><strong>CTR Analytics</strong></strong>&mdash; City-level click-through-rate analysis with tag-wise performance insights.</li>
                        <li><strong><strong>Subscriber Profile</strong></strong>&mdash; Growth and reach tracking across all supported digital channels.</li>
                        <li><strong><strong>Internet Trends</strong></strong>&mdash; Population, language, internet penetration, social media usage, and digital adoption insights for the city.</li>
                    </ul>
                    <p><strong><strong>Important Notes</strong></strong></p>
                    <ul>
                        <li>City Interaction Solutions are optional and may be selected individually.</li>
                        <li>Some solutions automatically enable related analytics and reporting features.</li>
                        <li>Pricing for each solution is displayed during budget estimation.</li>
                    </ul>
                    <p><strong><strong>City Interaction Solution Pricing</strong></strong></p>
                    <table>
                        <tbody>
                            <tr>
                                <td width="223">
                                    <p><strong><strong>Feature</strong></strong></p>
                                </td>
                                <td width="189">
                                    <p><strong><strong>City Posts (Weekly)</strong></strong></p>
                                </td>
                                <td width="177">
                                    <p><strong><strong>City Posts (Alternate Day)</strong></strong></p>
                                </td>
                                <td width="224">
                                    <p><strong><strong>City Posts (Daily)</strong></strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Monthly Cost</p>
                                </td>
                                <td width="189">
                                    <p>₹14,000</p>
                                </td>
                                <td width="177">
                                    <p>₹45,000</p>
                                </td>
                                <td width="224">
                                    <p>₹5,00,000</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Includes</p>
                                </td>
                                <td width="189">
                                    <p>City Posts, Semiotics, Partner Metrics</p>
                                </td>
                                <td width="177">
                                    <p>City Posts,</p>
                                    <p>Semiotics,</p>
                                    <p>Partner Metrics</p>
                                </td>
                                <td width="224">
                                    <p>City Posts, District Analytics, Semiotics, Partner Metrics</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Posts per Month</p>
                                </td>
                                <td width="189">
                                    <p>4</p>
                                </td>
                                <td width="177">
                                    <p>15</p>
                                </td>
                                <td width="224">
                                    <p>31</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Posting Frequency</p>
                                </td>
                                <td width="189">
                                    <p>Weekly</p>
                                </td>
                                <td width="177">
                                    <p>Alternate Day</p>
                                </td>
                                <td width="224">
                                    <p>Daily</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Minimum Subscriber Base</p>
                                </td>
                                <td width="189">
                                    <p>300+</p>
                                </td>
                                <td width="177">
                                    <p>300+</p>
                                </td>
                                <td width="224">
                                    <p>10,000+</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Hyperlocal Reach per Post (7 Days)</p>
                                </td>
                                <td width="189">
                                    <p>3,000+</p>
                                </td>
                                <td width="177">
                                    <p>3,000+</p>
                                </td>
                                <td width="224">
                                    <p>3,000+</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Estimated Monthly Reach</p>
                                </td>
                                <td width="189">
                                    <p>12,000+</p>
                                </td>
                                <td width="177">
                                    <p>45,000+</p>
                                </td>
                                <td width="224">
                                    <p>93,000+</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Creative Formats Included</p>
                                </td>
                                <td width="189">
                                    <p>3 Stills, 1 Video</p>
                                </td>
                                <td width="177">
                                    <p>13 Stills, 2 Videos</p>
                                </td>
                                <td width="224">
                                    <p>27 Stills, 4 Videos</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Monthly Topic Discussion</p>
                                </td>
                                <td width="189">
                                    <p>&mdash;</p>
                                </td>
                                <td width="177">
                                    <p>&mdash;</p>
                                </td>
                                <td width="224">
                                    <p>✓</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>District Analytics</p>
                                </td>
                                <td width="189">
                                    <p>&mdash;</p>
                                </td>
                                <td width="177">
                                    <p>&mdash;</p>
                                </td>
                                <td width="224">
                                    <p>✓</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Boost Posts / Collaborations</p>
                                </td>
                                <td width="189">
                                    <p>&mdash;</p>
                                </td>
                                <td width="177">
                                    <p>&mdash;</p>
                                </td>
                                <td width="224">
                                    <p>✓</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>Subscriber Research &amp; Focus Groups</p>
                                </td>
                                <td width="189">
                                    <p>&mdash;</p>
                                </td>
                                <td width="177">
                                    <p>&mdash;</p>
                                </td>
                                <td width="224">
                                    <p>✓</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><strong><strong>Other City Interaction Solutions</strong></strong></p>
                    <table>
                        <tbody>
                            <tr>
                                <td width="223">
                                    <p><strong><strong>Solution</strong></strong></p>
                                </td>
                                <td width="140">
                                    <p><strong><strong>Monthly Cost</strong></strong></p>
                                </td>
                                <td width="438">
                                    <p><strong><strong>Includes</strong></strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>City Yellow Pages Promotion</p>
                                </td>
                                <td width="140">
                                    <p>₹50,000</p>
                                </td>
                                <td width="438">
                                    <p>Digital promotion and visibility enhancement for City Yellow Pages listings</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="223">
                                    <p>City Outdoor Ad Analytics</p>
                                </td>
                                <td width="140">
                                    <p>₹50,000</p>
                                </td>
                                <td width="438">
                                    <p>Monthly outdoor advertising intelligence report covering brands, industries, and ad formats across the city</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><strong><strong>Note:</strong></strong>&nbsp;Semiotics and Partner Metrics are automatically included with all City Posts plans. District Analytics is automatically included with the Daily City Posts plan.</p>
                    @break

                    @case(5)
                    <p><strong>Q. How should I read the budget table, and can I still make changes?</strong></p>
                    <p>The budget table summarises your full plan. For each KW Geography&nbsp;:</p>
                    <ul>
                        <li><strong><strong>One-Time Cost</strong></strong>&mdash; Setup fee charged once (₹10,000 for Your Website or New Website; ₹&ndash; for Prarang.in).</li>
                        <li><strong><strong>Monthly Cost</strong></strong>&mdash; Recurring charge for hosting + all selected solutions combined.</li>
                    </ul>
                    <p>These are <strong><strong>estimates</strong></strong>&nbsp;&mdash; Prarang&nbsp;Sales will revert to you with an optimal Pricing Offer, with applicable taxes (e.g. GST) added. To adjust your plan, click <strong><strong>Revise Plan</strong></strong>.</p>
                    @break
                    @case(6)
                    <p><strong><strong>Q. What happens when I submit this form?</strong></strong><strong><strong><br /></strong></strong>Your full plan (geographies, languages, hosting choices, and solutions selected) is sent to Prarang's sales team along with your contact details. Prarang will respond with a formal Pricing Offer and next steps for onboarding. Please note that GST has not been included and digital marketing costs of social media are subject to continuous change.</p>
                    <p><strong><strong>Q. Can I still change my plan after submitting?</strong></strong><br />Once submitted, your plan cannot be edited. To make changes, either start a new plan from Step 1 or contact Prarang Sales directly. Please note that this is not a binding contract &mdash; we will revert to you based on your inputs.</p>
                    <p><strong>Q. What if I want to share my plan with a colleague before submitting?</strong></p>
                    <p>Use the Share button on any earlier screen (steps 2&ndash;5). It generates a link that saves your current plan state and can be shared with anyone. They can open it and see or continue your plan.</p>
                    <p>&nbsp;</p> @break

                    @default

                    @endswitch
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="source" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="sourceLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sourceLabel">Sources</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-sm align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width:30%;">Fields</th>
                                <th>Source / Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Population 2011</strong> <span class="text-muted small">(in '000)</span>
                                </td>
                                <td>Population — Census 2011</td>
                            </tr>
                            <tr>
                                <td><strong>Population 2026</strong> <span class="text-muted small">(in '000)</span>
                                </td>
                                <td>Estimate — Population based on District Growth Rate, Census 2011</td>
                            </tr>
                            <tr>
                                <td><strong>Literacy (%)</strong></td>
                                <td>The Literacy Rate amongst the people who use a particular Script for their Mother
                                    Tongue Language.</td>
                            </tr>
                            <tr>
                                <td><strong>Internet Users</strong> <span class="text-muted small">(in '000)</span>
                                </td>
                                <td>Estimate — Population ratio of State Internet Users, TRAI QTR Report</td>
                            </tr>
                            <tr>
                                <td><strong>Facebook Users (%)</strong></td>
                                <td>Percentage of Internet Subscribers using Facebook.</td>
                            </tr>
                            <tr>
                                <td><strong>Instagram Users (%)</strong></td>
                                <td>Percentage of Internet Subscribers using Instagram.</td>
                            </tr>
                            <tr>
                                <td><strong>LinkedIn Users (%)</strong></td>
                                <td>Percentage of Internet Subscribers using LinkedIn.</td>
                            </tr>
                            <tr>
                                <td><strong>X (Twitter) Users (%)</strong></td>
                                <td>Percentage of Internet Subscribers using X (Twitter).</td>
                            </tr>
                            <tr>
                                <td><strong>Cyber Risk Index</strong></td>
                                <td>Cyber Risk Score — ranked across 756+ State / District Capitals on 12 metrics,
                                    standardised on a 0–10 scale.</td>
                            </tr>
                            <tr>
                                <td><strong>Top 3 Languages</strong></td>
                                <td>Top 3 Languages by Script, Census 2011 (121 languages clubbed into 13 scripts;
                                    English includes multilingual speakers).</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Table Data */
        #cities-village-filter-main .modal td {
            border-style: solid;
            border-width: 2px;
        }
    </style>

</section>
