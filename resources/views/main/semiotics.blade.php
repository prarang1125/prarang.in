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
            min-width: 103px;
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
            <h2 class="table-header-title">Semiotics
            </h2>
            <div class="table-header-subtitle">Cognitive Insights
            </div>
        </div>
        <div class="table-header">
            <div class="table-header-main">
                <div class="table-header-left">
                    <p class="table-header-text">
                        Prarang has developed a unique model in City-Semiotics. A select geography’s Content reading,
                        rejecting, browsing & watching trends are a reflection of its continuously changing Emotions &
                        Interests. Our City-Semiotics provides important insights into the City’s need vis-à-vis the
                        City’s work & education patterns. This is a continuous feedback loop useful for governance &
                        also for customizing products & solutions.


                    </p>
                </div>
            </div>
            <div class="table-header-right">
                <a class="feature-card" href="#" data-bs-toggle="modal" data-bs-target="#TheseMTw1">
                    <span class="feature-card-title">Semiotics features</span>
                </a>
            </div>

            <p class="snipcss-9m8qz" style="margin-top: -35px;"> <br> <br> The Daily Content Posts of each City (in the
                Mother Tongue) is measured
                on the – <span class="text-primary"> Emotion, Culture/Nature, Education, Work &amp; Global/Local –
                </span>
                Two independent metrics of the Signifier <span class="text-primary"> ( Content Creator)</span> &amp; the
                Signified <span class="text-primary"> (Content Recipient) </span> constantly measured &amp; compared,
                without
                the impact of digital marketing ( i.e. paid boosting of content post), to compile an unbiased semiotic
                output on the City’s online reading/browsing patterns. The Western linguistic semiotics model of <span
                    class="text-primary"> Signifier-Signified</span> is effectively synchronized with Indian
                philosophy’s
                <span class="text-primary"> Rasa-Bhava </span> to produce a unique output which provides cognitive
                insights
                into each City. The daily semiotics feed aggregate over time to become more &amp; more significant.
                <br><br>
                We have been continuously creating daily content for 4 Indian cities ( of different population sizes)
                for
                over 2000 days each. With approx. 10,000 subscribers in each City, here is a peep inside the live City
                Semiotics, until yesterday - <br>
            </p>
        </div>

        <div class="city-tabs">
            <div class="city-tabs-label">Live City Semiotics:</div>
            <div class="city-tabs-list">
                <a class="city-tab" href=" https://b2b.prarang.in/semiotic/YzQ=" class="semiotic-btn style-WKIDT"
                    contenteditable="false" id="style-WKIDT"> Lucknow </a>
                <a class="city-tab" href=" https://b2b.prarang.in/semiotic/YzI=" class="semiotic-btn style-JeodN"
                    contenteditable="false" id="style-JeodN"> Meerut </a>
                <a class="city-tab" href=" https://b2b.prarang.in/semiotic/YzM=" class="semiotic-btn style-BUtYl"
                    contenteditable="false" id="style-BUtYl"> Rampur</a>
                <a class="city-tab" href=" https://b2b.prarang.in/semiotic/cjQ=" class="semiotic-btn style-KylBq"
                    contenteditable="false" id="style-KylBq"> Jaunpur </a>

            </div>
        </div>



        <div class="modal fade modal-xl feature-modal" id="TheseMTw1" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="TheseMTw1Label" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content modal-xl">
                    <div class="modal-header">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('images/semiotic.png') }}" alt="City-Semiotics model"
                            class="semiotics-modal-img">
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
