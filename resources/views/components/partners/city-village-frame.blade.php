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
            @if ($step == 2 || $step == 3)
            <button type="button" data-bs-toggle="modal" data-bs-target="#source"
                class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg text-sm font-semibold transition-colors flex items-center gap-1.5 border border-blue-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Sources
            </button>
            @endif
            @if ($step >= 3 && $step <= 5)
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
                    <div class="accordion" id="faqAccordion">

                        <!-- Q1: Hosting Location -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    Q1. What is a Hosting Location?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Hosting Location determines where your city and village portals will be published
                                        and accessed by users.</p>

                                    <h6 class="fw-bold mt-3">Hosting Options</h6>

                                    <p><strong>Prarang.in – Sub-Domain:</strong><br>
                                        Your portal is hosted on Prarang under a dedicated partner directory (e.g.
                                        prarang.in/partner/xyz). You can display your own advertisements and promotional
                                        content within the portal.</p>

                                    <p><strong>Your Website – Sub-Domain:</strong><br>
                                        If you already have a website, Prarang can provide APIs and integration support
                                        to make the portal available on your own domain.</p>

                                    <p><strong>New Website – Homepage:</strong><br>
                                        If you need a separate website, Prarang can assist in setting up and deploying
                                        the portal on a new website, subject to feasibility and availability.</p>

                                    <h6 class="fw-bold mt-3">Hosting Cost</h6>
                                    <table class="table table-bordered table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Hosting Location</th>
                                                <th>One-Time Cost</th>
                                                <th>Monthly Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Prarang.in</td>
                                                <td>₹0</td>
                                                <td>₹1,000</td>
                                            </tr>
                                            <tr>
                                                <td>Your Website</td>
                                                <td>₹10,000</td>
                                                <td>₹2,000</td>
                                            </tr>
                                            <tr>
                                                <td>New Website</td>
                                                <td>₹10,000</td>
                                                <td>₹2,000</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <p class="text-muted small"><strong>Note:</strong> When a district includes both
                                        its
                                        District Capital and at least one selected city or village from the same
                                        district, the District Capital receives free Standard Solution hosting on
                                        Prarang.in. This benefit is not available when the District Capital is the only
                                        selected location in the district, when hosting is moved to another website, or
                                        when paid City Interaction Solutions are selected for the District Capital.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Q2: Standard Solution -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    Q2. What is a Standard Solution?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>The Standard Solution is the base package included with every selected location.
                                        It provides the essential portal, content, analytics, and enrollment
                                        capabilities required to establish a digital presence for a city or village.</p>
                                    <p>The Standard Solution is <strong>automatically included</strong> for all
                                        locations and <strong>cannot be removed</strong>.</p>

                                    <h6 class="fw-bold mt-3">What's Included?</h6>

                                    <p><strong>Automated City/Village Portal Content</strong></p>

                                    <p><strong>Enrollment</strong></p>

                                    <p><strong>City e-Cards</strong> — Free digital business and personal cards
                                        containing contact details, address, social links, and QR-code sharing.</p>

                                    <p><strong>City Yellow Pages</strong> — Free business listings showcasing products,
                                        services, and contact information.</p>

                                    <p><strong>Planners</strong></p>
                                    <ul>
                                        <li><strong>Market Planner</strong> — Identifies the most suitable districts and
                                            markets for business expansion across India.</li>
                                        <li><strong>Development Planner</strong> — Compares districts and states using
                                            ranked indicators to support development-focused decisions.</li>
                                        <li><strong>Cyber Risk Analyser</strong> — Identifies locations with elevated
                                            cyber-risk based on digital activity and potential fake-ID exposure.</li>
                                    </ul>

                                    <p><strong>District Analytics</strong></p>
                                    <ul>
                                        <li><strong>Rank-Based Insights</strong> — Shows how a district ranks against
                                            India's other 755 districts across multiple development categories.</li>
                                    </ul>

                                    <p><strong>Utility Widgets</strong></p>
                                    <ul>
                                        <li><strong>Time Widget</strong> — Displays the current local time for the
                                            selected location.</li>
                                        <li><strong>News Widget</strong> — Displays location-specific news and updates.
                                        </li>
                                        <li><strong>Weather Widget</strong> — Displays current weather conditions and
                                            forecasts for the location.</li>
                                        <li><strong>Maps Widget</strong> — Displays the location on an interactive map.
                                        </li>
                                    </ul>

                                    <p><strong>Comparison AI</strong> — Compares selected districts, cities, villages,
                                        states, or countries across multiple indicators and datasets.</p>

                                    <p class="text-muted small"><strong>Note:</strong> Additional City Interaction
                                        Solutions may be added separately to enhance engagement, visibility, and local
                                        market intelligence.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Q3: City Interaction Solutions -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3">
                                    Q3. What are City Interaction Solutions?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>City Interaction Solutions are <strong>optional</strong> add-on services designed
                                        to increase visibility, engagement, market intelligence, and performance
                                        measurement for a selected city or village. Unlike the Standard Solution, these
                                        services can be added based on your objectives and budget.</p>

                                    <h6 class="fw-bold mt-3">Available Solutions</h6>

                                    <p><strong>City Posts</strong><br>
                                        Regular city-focused content published across Prarang's digital ecosystem to
                                        improve local visibility and audience engagement.</p>

                                    <table class="table table-bordered table-sm">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Feature</th>
                                                <th>Weekly</th>
                                                <th>Alternate Day</th>
                                                <th>Daily</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Monthly Cost</td>
                                                <td>₹14,000</td>
                                                <td>₹45,000</td>
                                                <td>₹5,00,000</td>
                                            </tr>
                                            <tr>
                                                <td>Includes</td>
                                                <td>City Posts, Semiotics, Partner Metrics</td>
                                                <td>City Posts, Semiotics, Partner Metrics</td>
                                                <td>City Posts, District Analytics, Semiotics, Partner Metrics</td>
                                            </tr>
                                            <tr>
                                                <td>Posts per Month</td>
                                                <td>4</td>
                                                <td>15</td>
                                                <td>31</td>
                                            </tr>
                                            <tr>
                                                <td>Minimum Subscriber Base</td>
                                                <td>300+</td>
                                                <td>300+</td>
                                                <td>10,000+</td>
                                            </tr>
                                            <tr>
                                                <td>Hyperlocal Reach per Post (7 Days)</td>
                                                <td>3,000+</td>
                                                <td>3,000+</td>
                                                <td>3,000+</td>
                                            </tr>
                                            <tr>
                                                <td>Estimated Monthly Reach</td>
                                                <td>12,000+</td>
                                                <td>45,000+</td>
                                                <td>93,000+</td>
                                            </tr>
                                            <tr>
                                                <td>Creative Formats Included</td>
                                                <td>3 Stills, 1 Video</td>
                                                <td>13 Stills, 2 Videos</td>
                                                <td>27 Stills, 4 Videos</td>
                                            </tr>
                                            <tr>
                                                <td>Monthly Topic Discussion</td>
                                                <td>—</td>
                                                <td>—</td>
                                                <td>✓</td>
                                            </tr>
                                            <tr>
                                                <td>District Analytics</td>
                                                <td>—</td>
                                                <td>—</td>
                                                <td>✓</td>
                                            </tr>
                                            <tr>
                                                <td>Boost Posts / Collaborations</td>
                                                <td>—</td>
                                                <td>—</td>
                                                <td>✓</td>
                                            </tr>
                                            <tr>
                                                <td>Subscriber Research &amp; Focus Groups</td>
                                                <td>—</td>
                                                <td>—</td>
                                                <td>✓</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <p><strong>City Yellow Pages Promotion</strong><br>
                                        Enhanced visibility and digital promotion for businesses listed in the City
                                        Yellow Pages.<br>
                                        <span class="text-muted small">Monthly Cost: ₹50,000</span>
                                    </p>

                                    <p><strong>City Outdoor Ad Analytics</strong><br>
                                        Monthly tracking of outdoor advertisements across the city, including brands,
                                        industries, and advertising formats. Provides visibility into local advertising
                                        activity and competitor presence.<br>
                                        <span class="text-muted small">Monthly Cost: ₹50,000</span>
                                    </p>

                                    <p><strong>District Analytics</strong><br>
                                        Access district-level intelligence built from 140+ indicators across
                                        demographic, socio-economic, and culture-nature categories, standardized across
                                        India's 756 districts.</p>

                                    <p><strong>Semiotics</strong><br>
                                        Insights into the city's mood, interests, occupations, educational preferences,
                                        and local versus foreign cultural orientation.</p>

                                    <p><strong>Partner Metrics</strong><br>
                                        A comprehensive performance dashboard designed to measure engagement, audience
                                        growth, and digital visibility. Includes:</p>
                                    <ul>
                                        <li><strong>Content Metrics</strong> — Reach and engagement reporting across
                                            Facebook, WhatsApp, Mobile Apps, Email Campaigns, and Google (SEO).</li>
                                        <li><strong>CTR Analytics</strong> — City-level click-through-rate analysis with
                                            tag-wise performance insights.</li>
                                        <li><strong>Subscriber Profile</strong> — Growth and reach tracking across all
                                            supported digital channels.</li>
                                        <li><strong>Internet Trends</strong> — Population, language, internet
                                            penetration, social media usage, and digital adoption insights for the city.
                                        </li>
                                    </ul>

                                    <p class="text-muted small"><strong>Note:</strong> Semiotics and Partner Metrics
                                        are
                                        automatically included with all City Posts plans. District Analytics is
                                        automatically included with the Daily City Posts plan. City Interaction
                                        Solutions are optional and may be selected individually.</p>
                                </div>
                            </div>
                        </div>

                    </div>
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

</section>
