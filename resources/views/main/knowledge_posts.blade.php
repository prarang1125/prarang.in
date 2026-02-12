<x-layout.main.base>
    <style>
        .mx-auto .table-header-title-wrap h2 {
            font-size: 35px;
        }

        .table-header {
            display: flex;
            gap: 20px;
            align-items: stretch;
            justify-content: space-between;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }

        .table-header-main {
            flex: 1 1 520px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .table-header-title-wrap {
            text-align: center;
            margin-bottom: 26px;
            margin-top: 30px;
        }

        .table-header-left {
            padding-right: 0px;
        }

        .table-header-title {
            font-size: 20px;
            font-weight: 700;
            color: #2c4f92;
            margin: 0 0 2px 0;
        }

        .table-header-subtitle {
            font-size: 17px;
            font-weight: 700;
            color: #000000;
            margin: 0 0 6px 0;
        }

        .table-header-text {
            font-size: 15px;
            line-height: 1.4;
            color: #000000;
            margin: 0;
            text-align: justify
        }

        /* .table-header-right {
            flex: 0 0 240px;
            display: flex;
            align-items: stretch;
        } */

        .feature-card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 4px;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #2c4f92;
            border-radius: 6px;
            background: #f6f8ff;
            text-align: left;
            text-decoration: none;
            color: #1b2a4a;
            box-shadow: 0 2px 0 rgba(11, 47, 106, 0.12);
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .feature-card:hover {
            border-color: #1f3f7a;
            box-shadow: 0 4px 10px rgba(11, 47, 106, 0.18);
            transform: translateY(-1px);
            color: #1b2a4a;
        }

        .feature-card-title {
            font-size: 13px;
            font-weight: 700;
            color: #2c4f92;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .feature-card-text {
            font-size: 14px;
            font-weight: 600;
            color: #0b2f6a;
        }

        .city-tabs {
            margin-top: 16px;
        }

        .city-tabs-label {
            font-size: 15px;
            font-weight: 700;
            color: #000000;
            margin-bottom: 19px;
        }

        .city-tabs-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .city-tab {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 26px;
            padding: 2px 16px;
            background: #3f69bd;
            border: 1px solid #2c4f92;
            border-radius: 6px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            min-width: 100px;
        }

        .city-tab:hover {
            background: #2f5ab0;
            color: #ffffff;
            text-decoration: none;
        }

        .tooltip-wrap {
            position: relative;
            display: inline-flex;
        }

        .tooltip-bubble {
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background: #111111;
            color: #ffffff;
            font-size: 11px;
            padding: 4px 8px;
            border-radius: 4px;
            white-space: nowrap;
            display: none;
            z-index: 10;
        }

        .tooltip-bubble::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            border-width: 6px 6px 0 6px;
            border-style: solid;
            border-color: #111111 transparent transparent transparent;
        }

        .tooltip-bubble.is-visible {
            display: block;
        }

        .feature-modal ul {
            padding-left: 0 !important;
        }

        @media (max-width: 575.98px) {
            .table-header-title {
                font-size: 32px !important;
            }



            .table-header-text {
                font-size: 14px;
            }
        }
    </style>

    <section class="px-5 max-w-7xl mx-auto bg-gray-50/30 rounded-3xl my-1">
        <div class="table-header-title-wrap">
            <h2 class="table-header-title">Knowledge Posts
            </h2>
            <div class="table-header-subtitle">Glocal For Hyperlocal
            </div>
        </div>
        <div class="table-header">
            <div class="table-header-main">
                <div class="table-header-left">
                    <p class="table-header-text">
                        The DNA of content is Text/Scripts, Pictures/Images & Data/Numbers. Good post creation requires
                        research using books, journals & online sources. For each identified Market, Prarang creates a
                        Knowledge Web with a single address ( Portal - URL) and adds meaningful & hyper-localized
                        Content (Knowledge Posts) for its netizens. The knowledge posts are shared on social media and
                        mobile app for respective city subscribers. The onboarding numbers and social media reach for
                        each city is jointly agreed on with Prarang city partners

                    </p>
                </div>
            </div>
            <div class="table-header-right">
                <a class="feature-card" href="#" data-bs-toggle="modal" data-bs-target="#TheseMTw1">
                    <span class="feature-card-title">Features</span>
                    <span class="feature-card-text">Reach, Reorganize, Re-Connect</span>
                </a>
            </div>
        </div>

        <div class="city-tabs">
            <div class="city-tabs-label">India-Cities-Hindi :</div>
            <div class="city-tabs-list">
                <a class="city-tab" href="https://www.prarang.in/lucknow/all-posts" target="_blank">Lucknow</a>
                <a class="city-tab" href="https://www.prarang.in/meerut/all-posts" target="_blank">Meerut</a>
                <a class="city-tab" href="https://www.prarang.in/rampur/all-posts" target="_blank">Rampur</a>
                <a class="city-tab" href="https://www.prarang.in/jaunpur/all-posts" target="_blank">Jaunpur</a>
                <a class="city-tab" href="https://www.prarang.in/shahjahanpur/all-posts"
                    target="_blank">Shahjahanpur</a>

            </div>
        </div>

        <div class="city-tabs">
            <div class="city-tabs-label">India-Cities-Marathi:</div>
            <div class="city-tabs-list">
                <a class="city-tab" href="https://www.prarang.in/pune/all-posts" target="_blank">Pune</a>


            </div>
        </div>

        <div class="city-tabs">
            <div class="city-tabs-label">Country :</div>
            <div class="city-tabs-list">
                <a class="city-tab" href="https://www.indiaczech.com/india-czech-republic/all-posts"
                    target="_blank">India-Czech</a>
                {{-- <a class="city-tab" href="#" target="_blank">India-Nepal</a> --}}
                <span class="tooltip-wrap">
                    <button type="button" class="btn btn-secondary city-tab" data-tooltip="Coming soon">
                        India-Nepal
                    </button>
                    <span class="tooltip-bubble" role="status">Coming soon</span>
                </span>
            </div>
        </div>


        <div class="modal fade modal-xl feature-modal" id="TheseMTw1" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="TheseMTw1Label" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <section class="container mt-3 top-main-div snipcss-qZ3SC">
                            <p>Prarang creates text with context (not mere translations) in local languages for targeted
                                communities. Global knowledge, localized & socially useful. Created by detailed primary
                                & secondary research on the State/District Capital & its community (Urban Planning
                                foundation - Work, Place, Citizenship).
                            </p>
                            <div>
                                <p>
                                    <strong>Knowledge Posts - Free Subscription —</strong> FB Page,
                                    Mobile App, WhatsApp
                                    (X, Email,
                                    Instagram, Others — jointly selected with city partner)
                                </p>
                            </div>
                            <div class="mt-4 row">
                                <div class="col-md-4 col-xs-12">
                                    <div class="col-md-12 col-xs-12 reorganize live-content">
                                        <h5 id="style-GkoKw" class="style-GkoKw">
                                            <span id="style-aEhkE" class="style-aEhkE">
                                                <strong> REACH </strong>
                                            </span>
                                        </h5>
                                        <p id="style-Qy8gD" class="style-Qy8gD"> Daily connect with 20% population
                                        </p>
                                        <img src="{{ asset('assets/images/reach-gif.gif') }}" class="img-responsive">
                                        <ul style="padding-left: 0px !important">
                                            <li> Daily Picture-Centric Content Curation for Netizens of each City
                                                (365
                                                days/
                                                Year) </li>
                                            <li> Pushed to 10,000 (approx) Subscribers of the City's Netizens
                                                everyday
                                                through Social-Media, Subscriptions and SEO </li>
                                            <li> Customized for local interest, topical yet educative (Non News)
                                            </li>
                                            <ul>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="col-md-12 col-xs-12 reorganize live-content">
                                        <h5 id="style-gEUMW" class="style-gEUMW">
                                            <span id="style-hH4Ds" class="style-hH4Ds">
                                                <strong> REORGANIZE </strong>
                                            </span>
                                        </h5>
                                        <p id="style-toVlt" class="style-toVlt"> Balanced Nature &amp; Culture Knowledge
                                        </p>
                                        <img src="{{ asset('assets/images/reorganize-gif.gif') }}"
                                            class="img-responsive">
                                        <ul>
                                            <li> City-Centric classification of high volume content in local language -
                                                Unique 60 Point Culture-Nature Grid </li>
                                            <li> One-Stop Portal for the Netizen needs of the City - Weather, Maps,
                                                News,
                                                Cinema, Smart Services, Classifieds, B2B, B2C &amp; G2C integrated </li>
                                            <li> New &amp; localized visual iconography for new netizens &amp;
                                                first-time
                                                smartphone users. </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="col-md-12 col-xs-12 reorganize style-A23aK live-content"
                                        id="style-A23aK">
                                        <h5 id="style-w1QBs" class="style-w1QBs">
                                            <span id="style-7J76Y" class="style-7J76Y">
                                                <strong> RE-CONNECT </strong>
                                            </span>
                                        </h5>
                                        <p id="style-56qcP" class="style-56qcP"> Reminder of Roots and Relevance </p>
                                        <img src="{{ asset('assets/images/reconnect-gif.gif') }}"
                                            class="img-responsive">
                                        <ul>
                                            <li> Glocal Content - Content contextualized to local, through global
                                                learnings.
                                            </li>
                                            <li> A balance between Culture &amp; Nature towards a bio-regional &amp;
                                                healthy
                                                life. </li>
                                            <li> Decrease in digital noise - Focused content to reduce digital
                                                distractions
                                                &amp; negativity of news </li>
                                            <li> Adult Education - Work, Place, Citizenship </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </section>






    <script>
        document.querySelectorAll('.tooltip-wrap').forEach(function(wrap) {
            var button = wrap.querySelector('button');
            var bubble = wrap.querySelector('.tooltip-bubble');

            if (!button || !bubble) {
                return;
            }

            button.addEventListener('click', function(event) {
                event.preventDefault();
                bubble.classList.add('is-visible');
                window.clearTimeout(bubble._hideTimer);
                bubble._hideTimer = window.setTimeout(function() {
                    bubble.classList.remove('is-visible');
                }, 2000);
            });

            document.addEventListener('click', function(event) {
                if (!wrap.contains(event.target)) {
                    bubble.classList.remove('is-visible');
                }
            });
        });
    </script>




</x-layout.main.base>
