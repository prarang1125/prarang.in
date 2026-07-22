<x-layout.main.base>

    <style>
        :root {
            --ink: #12151c;
            --muted: #6b7280;
            --line: #e3e6ec;
            --canvas: #f5f6f9;
            --blue: #0000ff;
            --yellow: yellow;
            --red: red;
        }




        body {
            font-family: "Inter", "Helvetica Neue", Arial, sans-serif;
            background: var(--canvas);
            color: var(--ink);
            /* background-image: radial-gradient(circle at 1px 1px,
                    #e5e8ee 1px,
                    transparent 0); */
            background: white;
            background-size: 28px 28px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* .mono {
        font-family: "IBM Plex Mono", ui-monospace, monospace;
      } */

        /* ---------- Page header ---------- */
        .page-title {
            font-size: 1.35rem;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .section-label {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .section-label .accent {
            color: #94a3b8;
            font-weight: 500;
            text-transform: none;
            letter-spacing: normal;
        }

        /* ---------- Custom country-column widths ----------
         Order: Nepal, India, Czech Rep., Zimbabwe, +194
         India gets a wider column, +194 gets a narrower one. */
        .country-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        @media (min-width: 640px) {
            .country-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
            .country-grid {
                grid-template-columns: 0.85fr 1.55fr 0.85fr 0.85fr 0.55fr;
            }
        }

        /* ---------- Status dots ---------- */
        .dots {
            display: flex;
            gap: 5px;
            margin-bottom: 6px;
        }

        .dot {
            width: 7px;
            height: 7px;
            border-radius: 9999px;
        }

        .dot-blue {
            background: var(--blue);
        }

        .dot-yellow {
            background: var(--yellow);
        }

        .dot-red {
            background: var(--red);
        }

        .dot-1 {
            background: #fef08a;
        }

        .dot-2 {
            background: #bef264;
        }

        .dot-3 {
            background: #22c55e;
        }


        /* ---------- Country card shell ---------- */
        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .country-unit {
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
            align-items: stretch;
        }

        .country-name {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -0.01em;
        }

        .badge {
            font-size: 0.58rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            padding: 0.08rem 0.45rem;
            border-radius: 999px;
        }

        .badge-wip {
            background: #eef0f4;
            color: #8a93a3;
        }

        .badge-live {
            background: #dcfce7;
            color: #15803d;
        }

        .card {
            border-radius: 0.8rem;
            padding: 0.65rem;
            display: flex;
            flex-direction: column;
            gap: 0.45rem;
            transition:
                transform 0.18s ease,
                box-shadow 0.18s ease,
                border-color 0.18s ease;
        }

        /* .card-link:hover .card {
            transform: translateY(-2px);
        } */

        /* WIP card: quiet, monochrome, outlined */
        .card--wip {
            background: #ffffff;
            border: 1px solid var(--line);
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .card-link:hover .card--wip {
            border-color: #c7cdd8;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.07);
        }

        .stat-wip {
            border-radius: 0.5rem;
            padding: 0.4rem 0.35rem;
            text-align: center;
            background: #f8f9fb;
            border: 1px solid var(--line);
        }

        .stat-wip .stat-label {
            font-size: 0.58rem;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .stat-wip .stat-value {
            font-size: 0.95rem;
            font-weight: 700;
            color: #374151;
            margin-top: 1px;
        }

        .stat-wip.tick-blue {
            border-top: 3px solid var(--blue);
        }

        .stat-wip.tick-yellow {
            border-top: 3px solid var(--yellow);
        }

        .stat-wip.tick-red {
            border-top: 3px solid var(--red);
        }

        .card--live {
            background: #ffffff;
            border: 1px solid #1d4ed8;
            box-shadow: 0 8px 22px rgba(37, 99, 235, 0.18);
            position: relative;
            overflow: hidden;
        }

        .card--live::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg,
                    rgba(37, 99, 235, 0.06),
                    rgba(245, 183, 0, 0.05) 55%,
                    rgba(226, 55, 68, 0.06));
            pointer-events: none;
        }

        .card-link:hover .card--live {
            box-shadow: 0 14px 30px rgba(37, 99, 235, 0.26);
        }

        .stat-live {
            border-radius: 0.5rem;
            padding: 0.5rem 0.35rem;
            text-align: center;
            color: #fff;
            position: relative;
            z-index: 1;
            box-shadow: inset 0 -2px 0 rgba(0, 0, 0, 0.08);
        }

        .stat-live.blue {
            background: #0000ff
        }

        .stat-live.yellow {
            background: yellow;
            color: #3b2c02;
        }

        .stat-live.red {
            background: red;
        }

        .stat-live .stat-label {
            font-size: 0.58rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            opacity: 0.9;
        }

        .stat-live .stat-value {
            font-size: 1.05rem;
            font-weight: 800;
            margin-top: 1px;
        }

        /* ---------- Connector arrow + language box ---------- */
        .connector {
            text-align: center;
            color: #b6bccb;
            line-height: 1;
            font-size: 1rem;
        }

        .connector--lg {
            font-size: 1.4rem;
            color: #0000ff;
            font-weight: 700;
        }

        .lang-box {
            border: 1px solid var(--line);
            border-radius: 0.5rem;
            padding: 0.4rem 0.6rem;
            background: #ffffff;
            font-size: 0.7rem;
            font-weight: 600;
            color: #374151;
            text-align: center;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .lang-box ol {
            list-style: decimal;
            list-style-position: inside;
            text-align: left;
            font-weight: 500;
            color: #4b5563;
        }

        .lang-box ol li {
            padding: 0px 0;
            font-size: 0.65rem;
            line-height: 1.25;
        }

        /* India's language list: 2 columns so it stays compact */
        .lang-box--cols2 ol {
            column-count: 2;
            column-gap: 0.75rem;
        }

        .lang-box--cols2 ol li {
            break-inside: avoid;
        }

        /* ---------- Add-country tile ---------- */
        .add-tile {
            border: 2px dashed #cbd5e1;
            border-radius: 0.8rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-weight: 700;
            color: #9aa3b2;
            height: 100%;
            min-height: 70px;
            font-size: 0.7rem;
            gap: 1px;
            transition:
                border-color 0.18s ease,
                color 0.18s ease,
                background 0.18s ease;
        }

        .card-link:hover .add-tile {
            border-color: #94a3b8;
            color: #64748b;
            background: #ffffff;
        }

        /* ---------- Bottom summary buttons ---------- */
        .summary-btn {
            border-radius: 0.6rem;
            padding: 0.4rem 1rem;
            text-align: center;
            background: #ffffff;
            border: 1px solid var(--line);
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
            min-width: 100px;
        }

        .summary-btn .stat-label {
            font-size: 0.58rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: var(--muted);
        }

        .summary-btn .stat-value {
            font-size: 0.9rem;
            font-weight: 800;
            color: var(--ink);
        }

        /* ---------- Modal ---------- */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 50;
            backdrop-filter: blur(2px);
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal-box {
            background: #ffffff;
            border-radius: 0.9rem;
            padding: 1.75rem 2.25rem;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            max-width: 320px;
        }

        #labelBaseline {
            width: 100%;
            clear: both;
        }

        .section-wrapper {
            position: relative;
            z-index: 1;
            padding: 1.5rem 0;
            overflow: visible;
        }

        .bgic-backdrop {
            position: absolute;
            top: 90%;
            left: 15%;
            transform: translate(-50%, -50%);
            width: min(350px, 80%);
            height: auto;
            opacity: 0.07;
            pointer-events: none;
            z-index: 0;
            display: none;

            /* position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: min(350px, 80%);
            height: auto;
            opacity: 0.08; */
            /* Low opacity for background effect */
            /* pointer-events: none; */
            /* Allows clicks to pass through to elements beneath */
            /* z-index: 0; */
        }

        /* Bottom - Center - Right */
        .bgic-backdrop-bottom-right {
            position: absolute;
            bottom: 60%;
            right: 25%;
            transform: translate(50%, 50%);
            width: min(350px, 80%);
            height: auto;
            opacity: 0.05;
            pointer-events: none;
            z-index: 0;
            display: none;
        }

        .section-content {
            position: relative;
            z-index: 2;
        }

        /* Card  live */
        .container div .card--live:hover {
            box-shadow: 0px 0px 8px 2px #7c98d3;
        }

        /* Stat label */
        .container .card--wip .grid .stat-label {
            text-transform: capitalize;
            font-size: 11px;
            color: #000000;
        }

        /* Stat label */
        .container .card--wip .w-full .stat-label {
            text-transform: capitalize;
            font-size: 11px;
            color: #000000;
        }
    </style>
    <div class="hidden md:block">
        <!-- Country Stack Section Wrapper -->
        <div class="section-wrapper">
            <img src="https://www.prarang.in/assets/images/home/2.png" alt="Country stack background"
                class="bgic-backdrop">
            <div class="section-content">
                <!-- Country cards row -->
                <div class="grid country-grid gap-3 mt-3 items-start">
                    <!-- Nepal (WIP) -->
                    <div class="country-unit">
                        <a href="#nepal" class="card-link" aria-label="Open Nepal knowledge web">

                            <div class="card card--wip">
                                <div class="flex justify-between items-center">
                                    <div class="dots">
                                        <span class="dot dot-blue"></span>
                                        <span class="dot dot-yellow"></span>
                                        <span class="dot dot-red"></span>
                                    </div>
                                    <div class="flex justify-center items-center gap-2 mb-1.5">
                                        <span class="country-name">Nepal</span>
                                        <span class="badge badge-wip">WIP</span>
                                    </div>
                                    <div class="dots">
                                        <span class="dot dot-1"></span>
                                        <span class="dot dot-2"></span>
                                        <span class="dot dot-3"></span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="stat-wip tick-blue">
                                        <div class="stat-label">Cities / towns</div>
                                        <div class="stat-value mono">293</div>
                                    </div>
                                    <div class="stat-wip tick-yellow">
                                        <div class="stat-label">Rural mnpl.</div>
                                        <div class="stat-value mono">460</div>
                                    </div>
                                </div>
                                <div class="stat-wip tick-red w-full">
                                    <div class="stat-label">World bilateral</div>
                                    <div class="stat-value mono">194</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- India (LIVE) — wider column -->
                    <div class="country-unit">
                        <a href="#india" class="card-link" aria-label="Open India knowledge web">

                            <div class="card card--live">
                                <div class="flex justify-between items-center">
                                    <div class="dots">
                                        <span class="dot dot-blue"></span>
                                        <span class="dot dot-yellow"></span>
                                        <span class="dot dot-red"></span>
                                    </div>
                                    <div class="border-1 border-yellow-200 flex justify-center items-center gap-2 mb-1.5 group relative overflow-hidden rounded-full p-1 px-3 animate-pulseGlow
           transition-transform duration-200 ease-out">
                                        <span class="country-name font-bold">INDIA</span>
                                        <span class="badge badge-live star-animation">LIVE</span>
                                        <span class="flash-sweep pointer-events-none absolute inset-y-0 left-0 w-1/3
                                        bg-gradient-to-r from-transparent via-white to-transparent
                                        animate-flash"></span>
                                    </div>
                                    <div class="dots">
                                        <span class="dot dot-1"></span>
                                        <span class="dot dot-2"></span>
                                        <span class="dot dot-3"></span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2" style="position: relative; z-index: 1">
                                    <div class="stat-live blue">
                                        <div class="stat-label">Cities / towns</div>
                                        <div class="stat-value mono">6,331</div>
                                    </div>
                                    <div class="stat-live yellow">
                                        <div class="stat-label">Villages</div>
                                        <div class="stat-value mono">592,765</div>
                                    </div>
                                </div>
                                <div class="stat-live red w-full" style="position: relative; z-index: 1">
                                    <div class="stat-label">World bilateral</div>
                                    <div class="stat-value mono">194</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Czech Republic (WIP) -->
                    <div class="country-unit">
                        <a href="#czech-republic" class="card-link" aria-label="Open Czech Republic knowledge web">

                            <div class="card card--wip">
                                <div class="flex justify-between items-center">
                                    <div class="dots">
                                        <span class="dot dot-blue"></span>
                                        <span class="dot dot-yellow"></span>
                                        <span class="dot dot-red"></span>
                                    </div>
                                    <div class="flex justify-center items-center gap-2 mb-1.5">
                                        <span class="country-name">Czech Rep.</span>
                                        <span class="badge badge-wip">WIP</span>
                                    </div>
                                    <div class="dots">
                                        <span class="dot dot-1"></span>
                                        <span class="dot dot-2"></span>
                                        <span class="dot dot-3"></span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="stat-wip tick-blue">
                                        <div class="stat-label">Cities / towns</div>
                                        <div class="stat-value mono">843</div>
                                    </div>
                                    <div class="stat-wip tick-yellow">
                                        <div class="stat-label">Villages / mun.</div>
                                        <div class="stat-value mono">5,415</div>
                                    </div>
                                </div>
                                <div class="stat-wip tick-red w-full">
                                    <div class="stat-label">World bilateral</div>
                                    <div class="stat-value mono">194</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Zimbabwe (WIP) -->
                    <div class="country-unit">
                        <a href="#zimbabwe" class="card-link" aria-label="Open Zimbabwe knowledge web" onclick="
              event.preventDefault();
              openComingSoon('Coming Soon...');
            ">

                            <div class="card card--wip">
                                <div class="flex justify-between items-center">
                                    <div class="dots">
                                        <span class="dot dot-blue"></span>
                                        <span class="dot dot-yellow"></span>
                                        <span class="dot dot-red"></span>
                                    </div>
                                    <div class="flex justify-center items-center gap-2 mb-1.5">
                                        <span class="country-name">Zimbabwe</span>
                                        <span class="badge badge-wip">WIP</span>
                                    </div>
                                    <div class="dots">
                                        <span class="dot dot-1"></span>
                                        <span class="dot dot-2"></span>
                                        <span class="dot dot-3"></span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="stat-wip tick-blue">
                                        <div class="stat-label">Cities / towns</div>
                                        <div class="stat-value mono">300+</div>
                                    </div>
                                    <div class="stat-wip tick-yellow">
                                        <div class="stat-label">Wards</div>
                                        <div class="stat-value mono">1,200</div>
                                    </div>
                                </div>
                                <div class="stat-wip tick-red w-full">
                                    <div class="stat-label">World bilateral</div>
                                    <div class="stat-value mono">194</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Add country — narrower column -->
                    <div class="country-unit">
                        <a href="" class="card-link" aria-label="Add another country" onclick="
              event.preventDefault();
              openComingSoon('Contact us: \n query@prarang.in ');
            ">
                            <div class="flex justify-center items-center gap-2 mb-1.5">
                                <span class="text-transparent select-none" style="font-size: 0.55rem">placeholder</span>
                            </div>
                            <div class="add-tile">
                                <span style="font-size: 1.1rem; line-height: 1">+</span>
                                <span>191</span>
                                <span>more</span>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Section label 1: block-level, sits between the two grids above,
           so it is guaranteed to render after the cards row and before
           the arrows row on every breakpoint (mobile, tablet, desktop). -->
                <div class="text-center mt-2 mb-1" id="labelBaseline">
                    <span class="section-labelx text-lg font-semibold">Country Stack: English
                        <span class="font-light">(Latin alphabet)</span> language localised
                        base-line</span>
                </div>
            </div>
        </div>

        <!-- Languages Section Wrapper -->
        <div class="section-wrapper">
            <img src="https://www.prarang.in/assets/images/home/1.png" alt="Language stack background"
                class="bgic-backdrop-bottom-right">
            <div class="section-content">
                <!-- Arrow + language boxes row (aligned under the cards above) -->
                <div class="grid country-grid gap-3 items-start">
                    <div class="country-unit">
                        <div class="connector connector--lg">&#8593;</div>
                        <div class="lang-box">Nepali / Devanagari</div>
                    </div>

                    <div class="country-unit">
                        <div class="connector connector--lg">&#8593;</div>
                        <div class="lang-box lang-box--cols2">
                            <ol>
                                <li>Hindi / Devanagari</li>
                                <li>Bengali</li>
                                <li>Marathi</li>
                                <li>Telugu</li>
                                <li>Tamil</li>
                                <li>Gujarati</li>
                                <li>Urdu / Perso-Arabic</li>
                                <li>Kannada</li>
                                <li>Odia</li>
                                <li>Malayalam</li>
                                <li value="12">Punjabi</li>
                                <li>Assamese</li>
                            </ol>
                        </div>
                    </div>

                    <div class="country-unit">
                        <div class="connector connector--lg">&#8593;</div>
                        <div class="lang-box">Czech</div>
                    </div>

                    <div class="country-unit">
                        <div class="connector connector--lg">&#8593;</div>
                        <div class="lang-box">Shona</div>
                    </div>

                    <div class="country-unit">
                        <!-- <div class="connector connector--lg">&#8593;</div>
          <div class="lang-box" style="color: #9aa3b2">More languages soon</div> -->
                    </div>
                </div>

                <!-- Section label 2 -->
                <div class="text-center mt-6 mb-4">
                    <span class="section-labelx text-lg font-semibold">Language knowledge (<span
                            class="font-light">script</span>) webs — written</span>
                </div>

                <!-- Federal / Scheduled / Primary / Official row -->
                <div class="grid country-grid gap-3 mt-1">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <div class="connector connector--lg">&#8593;</div>
                        <div class="summary-btn border-[#0000ff] border-4">
                            <div class="stat-labelx text-black">Federal</div>
                            <div class="stat-value mono">1</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-1">
                        <div class="connector connector--lg">&#8593;</div>
                        <div class="summary-btn border-[#0000ff] border-4">
                            <div class="stat-labelx text-black">Scheduled</div>
                            <div class="stat-value mono">22</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-1">
                        <div class="connector connector--lg">&#8593;</div>
                        <div class="summary-btn border-[#0000ff] border-4">
                            <div class="stat-labelx text-black">Primary</div>
                            <div class="stat-value mono">1</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-1">
                        <div class="connector connector--lg">&#8593;</div>
                        <div class="summary-btn border-[#0000ff] border-4">
                            <div class="stat-labelx">Official</div>
                            <div class="stat-value mono">16</div>
                        </div>
                    </div>
                    <div class="hidden lg:block"></div>
                </div>

                <!-- Section label 3 -->
                <div class="text-center mt-5">
                    <span class="section-labelx text-lg font-semibold">Official languages
                        <span class="font-light">(country constitution)</span> — spoken</span>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Mobile Version -->
    <div class="block md:hidden px-2">
        <!-- India -->
        <div class="mobile-country-block">
            {{-- <img src="https://www.prarang.in/assets/images/home/2.png" alt="" class="mobile-bg-image-1">
            <img src="https://www.prarang.in/assets/images/home/1.png" alt="" class="mobile-bg-image-2"> --}}

            <div style="position: relative; z-index: 2;">
                <!-- India Card -->
                <div class="country-unit mb-3">
                    <a href="#india" class="card-link" aria-label="Open India knowledge web">

                        <div class="card card--live">
                            <div class="flex justify-between items-center">
                                <div class="dots">
                                    <span class="dot dot-blue"></span>
                                    <span class="dot dot-yellow"></span>
                                    <span class="dot dot-red"></span>
                                </div>
                                <div class="flex justify-center items-center gap-2 mb-1.5">
                                    <span class="country-name">India</span>
                                    <span class="badge badge-live">Live</span>
                                </div>
                                <div class="dots">
                                    <span class="dot dot-1"></span>
                                    <span class="dot dot-2"></span>
                                    <span class="dot dot-3"></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="stat-live blue">
                                    <div class="stat-label">Cities / towns</div>
                                    <div class="stat-value mono">6,331</div>
                                </div>
                                <div class="stat-live yellow">
                                    <div class="stat-label">Villages</div>
                                    <div class="stat-value mono">592,765</div>
                                </div>
                            </div>
                            <div class="stat-live red w-full">
                                <div class="stat-label">World bilateral</div>
                                <div class="stat-value mono">194</div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Label 1 -->
                <div class="text-center mt-3 mb-1">
                    <span class="mobile-section-label">Country Stack: English
                        <span class="font-light">(Latin alphabet)</span> language localised
                        base-line</span>
                </div>

                <!-- Arrow + Language Box -->
                <div class="flex flex-col items-center gap-1 mb-3">
                    <div class="connector connector--lg">&#8593;</div>
                    <div class="lang-box lang-box--cols2 w-full">
                        <ol>
                            <li>Hindi / Devanagari</li>
                            <li>Bengali</li>
                            <li>Marathi</li>
                            <li>Telugu</li>
                            <li>Tamil</li>
                            <li>Gujarati</li>
                            <li>Urdu / Perso-Arabic</li>
                            <li>Kannada</li>
                            <li>Odia</li>
                            <li>Malayalam</li>
                            <li value="12">Punjabi</li>
                            <li>Assamese</li>
                        </ol>
                    </div>
                </div>

                <!-- Label 2 -->
                <div class="text-center mt-3 mb-2">
                    <span class="mobile-section-label">Language knowledge (<span class="font-light">script</span>) webs
                        — written</span>
                </div>

                <!-- Arrow + Stat Box -->
                <div class="flex flex-col items-center gap-1 mb-2">
                    <div class="connector connector--lg">&#8593;</div>
                    <div class="summary-btn border-[#0000ff] border-4 w-full">
                        <div class="stat-labelx text-black">Scheduled</div>
                        <div class="stat-value mono">22</div>
                    </div>
                </div>

                <!-- Label 3 -->
                <div class="text-center mt-3">
                    <span class="mobile-section-label">Official languages
                        <span class="font-light">(country constitution)</span> — spoken</span>
                </div>
            </div>
        </div>

        <!-- Nepal -->
        <div class="mobile-country-block">
            {{-- <img src="https://www.prarang.in/assets/images/home/2.png" alt="" class="mobile-bg-image-1">
            <img src="https://www.prarang.in/assets/images/home/1.png" alt="" class="mobile-bg-image-2"> --}}

            <div style="position: relative; z-index: 2;">
                <!-- Nepal Card -->
                <div class="country-unit mb-3">
                    <a href="#nepal" class="card-link" aria-label="Open Nepal knowledge web">

                        <div class="card card--wip">
                            <div class="flex justify-between items-center">
                                <div class="dots">
                                    <span class="dot dot-blue"></span>
                                    <span class="dot dot-yellow"></span>
                                    <span class="dot dot-red"></span>
                                </div>
                                <div class="flex justify-center items-center gap-2 mb-1.5">
                                    <span class="country-name">Nepal</span>
                                    <span class="badge badge-wip">WIP</span>
                                </div>
                                <div class="dots">
                                    <span class="dot dot-1"></span>
                                    <span class="dot dot-2"></span>
                                    <span class="dot dot-3"></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="stat-wip tick-blue">
                                    <div class="stat-label">Cities / towns</div>
                                    <div class="stat-value mono">293</div>
                                </div>
                                <div class="stat-wip tick-yellow">
                                    <div class="stat-label">Rural mnpl.</div>
                                    <div class="stat-value mono">460</div>
                                </div>
                            </div>
                            <div class="stat-wip tick-red w-full">
                                <div class="stat-label">World bilateral</div>
                                <div class="stat-value mono">194</div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Label 1 -->
                <div class="text-center mt-3 mb-1">
                    <span class="mobile-section-label">Country Stack: English
                        <span class="font-light">(Latin alphabet)</span> language localised
                        base-line</span>
                </div>

                <!-- Arrow + Language Box -->
                <div class="flex flex-col items-center gap-1 mb-3">
                    <div class="connector connector--lg">&#8593;</div>
                    <div class="lang-box w-full">Nepali / Devanagari</div>
                </div>

                <!-- Label 2 -->
                <div class="text-center mt-3 mb-2">
                    <span class="mobile-section-label">Language knowledge (<span class="font-light">script</span>) webs
                        — written</span>
                </div>

                <!-- Arrow + Stat Box -->
                <div class="flex flex-col items-center gap-1 mb-2">
                    <div class="connector connector--lg">&#8593;</div>
                    <div class="summary-btn border-[#0000ff] border-4 w-full">
                        <div class="stat-labelx text-black">Federal</div>
                        <div class="stat-value mono">1</div>
                    </div>
                </div>

                <!-- Label 3 -->
                <div class="text-center mt-3">
                    <span class="mobile-section-label">Official languages
                        <span class="font-light">(country constitution)</span> — spoken</span>
                </div>
            </div>
        </div>

        <!-- Czech Republic -->
        <div class="mobile-country-block">
            {{-- <img src="https://www.prarang.in/assets/images/home/2.png" alt="" class="mobile-bg-image-1">
            <img src="https://www.prarang.in/assets/images/home/1.png" alt="" class="mobile-bg-image-2"> --}}

            <div style="position: relative; z-index: 2;">
                <!-- Czech Republic Card -->
                <div class="country-unit mb-3">
                    <a href="#czech-republic" class="card-link" aria-label="Open Czech Republic knowledge web">

                        <div class="card card--wip">
                            <div class="flex justify-between items-center">
                                <div class="dots">
                                    <span class="dot dot-blue"></span>
                                    <span class="dot dot-yellow"></span>
                                    <span class="dot dot-red"></span>
                                </div>
                                <div class="flex justify-center items-center gap-2 mb-1.5">
                                    <span class="country-name">Czech Rep.</span>
                                    <span class="badge badge-wip">WIP</span>
                                </div>
                                <div class="dots">
                                    <span class="dot dot-1"></span>
                                    <span class="dot dot-2"></span>
                                    <span class="dot dot-3"></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="stat-wip tick-blue">
                                    <div class="stat-label">Cities / towns</div>
                                    <div class="stat-value mono">843</div>
                                </div>
                                <div class="stat-wip tick-yellow">
                                    <div class="stat-label">Villages / mun.</div>
                                    <div class="stat-value mono">5,415</div>
                                </div>
                            </div>
                            <div class="stat-wip tick-red w-full">
                                <div class="stat-label">World bilateral</div>
                                <div class="stat-value mono">194</div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Label 1 -->
                <div class="text-center mt-3 mb-1">
                    <span class="mobile-section-label">Country Stack: English
                        <span class="font-light">(Latin alphabet)</span> language localised
                        base-line</span>
                </div>

                <!-- Arrow + Language Box -->
                <div class="flex flex-col items-center gap-1 mb-3">
                    <div class="connector connector--lg">&#8593;</div>
                    <div class="lang-box w-full">Czech</div>
                </div>

                <!-- Label 2 -->
                <div class="text-center mt-3 mb-2">
                    <span class="mobile-section-label">Language knowledge (<span class="font-light">script</span>) webs
                        — written</span>
                </div>

                <!-- Arrow + Stat Box -->
                <div class="flex flex-col items-center gap-1 mb-2">
                    <div class="connector connector--lg">&#8593;</div>
                    <div class="summary-btn border-[#0000ff] border-4 w-full">
                        <div class="stat-labelx text-black">Primary</div>
                        <div class="stat-value mono">1</div>
                    </div>
                </div>

                <!-- Label 3 -->
                <div class="text-center mt-3">
                    <span class="mobile-section-label">Official languages
                        <span class="font-light">(country constitution)</span> — spoken</span>
                </div>
            </div>
        </div>

        <!-- Zimbabwe -->
        <div class="mobile-country-block">
            {{-- <img src="https://www.prarang.in/assets/images/home/2.png" alt="" class="mobile-bg-image-1">
            <img src="https://www.prarang.in/assets/images/home/1.png" alt="" class="mobile-bg-image-2"> --}}

            <div style="position: relative; z-index: 2;">
                <!-- Zimbabwe Card -->
                <div class="country-unit mb-3">
                    <a href="#zimbabwe" class="card-link" aria-label="Open Zimbabwe knowledge web" onclick="
              event.preventDefault();
              openComingSoon('Coming Soon...');
            ">

                        <div class="card card--wip">
                            <div class="flex justify-between items-center">
                                <div class="dots">
                                    <span class="dot dot-blue"></span>
                                    <span class="dot dot-yellow"></span>
                                    <span class="dot dot-red"></span>
                                </div>
                                <div class="flex justify-center items-center gap-2 mb-1.5">
                                    <span class="country-name">Zimbabwe</span>
                                    <span class="badge badge-wip">WIP</span>
                                </div>
                                <div class="dots">
                                    <span class="dot dot-1"></span>
                                    <span class="dot dot-2"></span>
                                    <span class="dot dot-3"></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="stat-wip tick-blue">
                                    <div class="stat-label">Cities / towns</div>
                                    <div class="stat-value mono">300+</div>
                                </div>
                                <div class="stat-wip tick-yellow">
                                    <div class="stat-label">Wards</div>
                                    <div class="stat-value mono">1,200</div>
                                </div>
                            </div>
                            <div class="stat-wip tick-red w-full">
                                <div class="stat-label">World bilateral</div>
                                <div class="stat-value mono">194</div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Label 1 -->
                <div class="text-center mt-3 mb-1">
                    <span class="mobile-section-label">Country Stack: English
                        <span class="font-light">(Latin alphabet)</span> language localised
                        base-line</span>
                </div>

                <!-- Arrow + Language Box -->
                <div class="flex flex-col items-center gap-1 mb-3">
                    <div class="connector connector--lg">&#8593;</div>
                    <div class="lang-box w-full">Shona</div>
                </div>

                <!-- Label 2 -->
                <div class="text-center mt-3 mb-2">
                    <span class="mobile-section-label">Language knowledge (<span class="font-light">script</span>) webs
                        — written</span>
                </div>

                <!-- Arrow + Stat Box -->
                <div class="flex flex-col items-center gap-1 mb-2">
                    <div class="connector connector--lg">&#8593;</div>
                    <div class="summary-btn border-[#0000ff] border-4 w-full">
                        <div class="stat-labelx text-black">Official</div>
                        <div class="stat-value mono">16</div>
                    </div>
                </div>

                <!-- Label 3 -->
                <div class="text-center mt-3">
                    <span class="mobile-section-label">Official languages
                        <span class="font-light">(country constitution)</span> — spoken</span>
                </div>
            </div>
        </div>

        <!-- More Countries -->
        <div class="mobile-country-block py-4">
            <a href="" class="card-link" aria-label="Add another country" onclick="
              event.preventDefault();
              openComingSoon('Contact us: \n query@prarang.in ');
            ">
                <div class="add-tile" style="margin-top: 0px !important;">
                    <span style="font-size: 1.1rem; line-height: 1">+</span>
                    <span>191</span>
                    <span>more</span>
                </div>
            </a>
        </div>
    </div>

    <!-- Coming soon modal -->
    <div class="modal fade" id="comingSoonModal" tabindex="-1" aria-labelledby="comingSoonTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-3 shadow">
                <div class="modal-body text-center p-4">
                    <h5 class="modal-title text-slate-800 fw-semibold mb-4" id="comingSoonTitle">
                        Hi
                    </h5>

                    <button type="button" class="btn btn-primary px-4" onclick="closeComingSoon()">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* List Item */
        div ol li {
            font-size: 11px !important;
            font-weight: 600;
        }

        /* Container */


        .container:nth-child(2) {
            margin-top: -26px;
        }

        /* Text center */
        .container div .text-center:nth-child(4) {
            margin-bottom: 3px !important;
            margin-top: 11px;
        }

        /* Text center */
        .container div .text-center:nth-child(6) {
            margin-top: 7px !important;
        }

        /* Summary */
        .container div .summary-btn {
            height: 55px;
            padding-top: 2px;
        }

        /* Summary */
        .container div .summary-btn {
            border-color: #0000ff;
        }

        /* Add tile */
        .container div .add-tile {
            margin-top: 53px;
        }

        /* Section labelx */
        #labelBaseline .section-labelx {
            text-transform: capitalize;
        }

        /* Section labelx */
        .container div .section-labelx {
            text-transform: capitalize;
        }

        /* Text center */
        .container .section-wrapper .text-center {
            margin-top: 10px !important;
            margin-bottom: 3px !important;
        }

        /* Section wrapper */
        .container div .section-wrapper {

            padding-bottom: 3px;
            padding-top: 0px;
        }

        /* Stat label */
        .card--live .w-full .stat-label {
            font-size: 12px;
            color: #ffffff;
            text-transform: capitalize;
        }

        /* Stat label */
        .card--live .grid .stat-label {
            text-transform: capitalize;
            color: #ffffff;
            font-size: 11px;
        }

        /* Stat label */
        .container .stat-live:nth-child(2) .stat-label {
            color: #000000;
        }

        /* Stat live */
        .card--live .grid .stat-live {
            transform: translatex(0px) translatey(0px);
        }

        /* Stat value */
        .card--live .w-full .stat-value {
            font-size: 14px;
        }

        /* Full */
        .container .card--live .w-full {
            padding-top: 5px;
            padding-bottom: 7px;
            height: 46px;
        }

        /* Card  live */
        .container div .card--live {
            padding-bottom: 15px;
        }

        @media (max-width: 767px) {
            .mobile-country-block {
                background: #ffffff;
                border: 1px solid #e3e6ec;
                border-radius: 1rem;
                padding: 1.25rem;
                margin-bottom: 2.5rem;
                position: relative;
                z-index: 1;
                box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
            }

            .mobile-bg-image-1 {
                position: absolute;
                top: 25%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 240px;
                opacity: 0.06;
                pointer-events: none;
                z-index: 0;
            }

            .mobile-bg-image-2 {
                position: absolute;
                bottom: 25%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 240px;
                opacity: 0.06;
                pointer-events: none;
                z-index: 0;
            }

            .mobile-section-label {
                font-size: 0.85rem;
                font-weight: 700;
                color: #4b5563;
                text-transform: capitalize;
                letter-spacing: 0.03em;
                line-height: 1.4;
            }

            .country-name {
                font-size: 1.1rem !important;
            }

            .badge {
                font-size: 0.68rem !important;
            }

            /* Stat labels inside cards */
            .card .stat-label {
                font-size: 0.72rem !important;
            }

            /* Stat values inside cards */
            .card .stat-value {
                font-size: 1.25rem !important;
            }

            /* Language Box Text */
            .lang-box {
                font-size: 0.85rem !important;
            }

            .lang-box ol li {
                font-size: 0.8rem !important;
            }

            /* Summary buttons */
            .summary-btn .stat-labelx {
                font-size: 0.85rem !important;
            }

            .summary-btn .stat-value {
                font-size: 1.25rem !important;
            }
        }

        @media (max-width:576px) {

            /* Mobile country block */
            .container .md\:hidden .mobile-country-block {
                margin-top: 47px;
            }

            /* Image */
            .container .d-block img {
                visibility: hidden;
            }

            /* Badge live */
            .md\:hidden div .badge-live {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* Badge wip */
            .md\:hidden div .badge-wip {
                display: flex;
                align-items: center;
            }

        }

        /* Country grid */
        .container .section-wrapper:nth-child(1) .country-grid {
            margin-top: 35px !important;
        }

        /* Division */
        .container .section-wrapper:nth-child(2) .country-unit:nth-child(2) div:nth-child(2) {
            border-style: solid;
            border-color: #b2adad;
        }

        /* Division */
        .container .section-wrapper:nth-child(2) .country-unit:nth-child(3) div:nth-child(2) {
            border-color: #b2adad;
        }

        /* Division */
        .container .section-wrapper:nth-child(2) .country-unit:nth-child(4) div:nth-child(2) {
            border-color: #b2adad;
        }

        /* Division */
        .container .section-wrapper:nth-child(2) .country-unit:nth-child(1) div:nth-child(2) {
            border-color: #b2adad;
        }
        /* Card  live */
.md\:block .card-link .card--live{
 padding-bottom:8px;
 padding-top:9px;
}


    </style>
    <script>
        //     function openComingSoon(label) {
    //     document.getElementById("comingSoonTitle").textContent =
    //       label + " ";
    //     document.getElementById("comingSoonModal").classList.add("open");
    //   }

    //   function closeComingSoon() {
    //     document.getElementById("comingSoonModal").classList.remove("open");
    //   }

    //   document.addEventListener("keydown", function (e) {
    //     if (e.key === "Escape") closeComingSoon();
    //   });
    function openComingSoon(title = "Coming Soon") {
    document.getElementById("comingSoonTitle").innerHTML = title;

    const modal = new bootstrap.Modal(document.getElementById("comingSoonModal"));
    modal.show();
}

function closeComingSoon() {
    const modal = bootstrap.Modal.getInstance(document.getElementById("comingSoonModal"));
    if (modal) {
        modal.hide();
    }
}
    </script>

</x-layout.main.base>
