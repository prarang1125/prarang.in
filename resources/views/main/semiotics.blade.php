<x-layout.main.base>

    <style>
        /* Top title */
        .top-title {
            margin-top: 0px !important;
            margin-bottom: 20px !important;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 28px;
        }

        /* Text primary */
        main p span {
            font-weight: 600;
        }

        /* Division */
        main .m-2 {
            text-align: center;
            color: #020202;
            background-color: #fad660;
        }

        /* Style  jeodn */
        #style-JeodN {
            color: #020202;
            text-decoration: none;
        }

        /* Col 2 */
        main .col-sm-2 {
            color: #020202;
        }

        /* Style wkidt */
        #style-WKIDT {
            color: #020202;
            text-decoration: none;
        }

        /* Style */
        #style-BUtYl {
            color: #020202;
            text-decoration: none;
        }

        /* Style */
        #style-KylBq {
            color: #020202;
            text-decoration: none;
        }

        /* Intro row with button */
        .semiotics-lead-row {
            display: flex;
            gap: 16px;
            align-items: flex-start;
            justify-content: space-between;
        }

        .semiotics-lead-row p {
            margin-bottom: 0;
        }

        .semiotics-action-btn {
            display: inline-flex;
            align-items: center;
            padding: 9px 22px;
            border: 1px solid #0b0b0b;
            background: #fad660;
            color: #111111;
            font-weight: 700;
            font-size: 13px;
            /* border-radius: 999px; */
            white-space: nowrap;
            min-width: 150px;
            justify-content: center;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
            transition: transform 150ms ease, box-shadow 150ms ease, filter 150ms ease;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            min-width: 18%;
            margin-top: 8px;
        }

        .semiotics-action-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.18);
            filter: brightness(1.02);
        }

        .semiotics-action-btn:active {
            transform: translateY(0);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        @media (max-width: 768px) {
            .semiotics-lead-row {
                flex-direction: column;
                align-items: stretch;
            }

            .semiotics-action-btn {
                width: 100%;
            }
        }

        .semiotics-modal-img {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
    <section class="bs5-top-heading">
        <p class="">Semiotics</p>
        <p>Cognitive Insights</p>
    </section>
    <section class="container mt-4">
        <div class="semiotics-lead-row">
            <p class="snipcss-9m8qz">Prarang has developed a unique model in <span class="text-primary">
                    City-Semiotics.</span> A select geography’s Content reading, rejecting, browsing &amp; watching
                trends
                are a reflection of its continuously changing <span class="text-primary"> Emotions &amp;
                    Interests.</span>
                Our City-Semiotics provides important insights into the City’s need vis-à-vis the City’s work &amp;
                education patterns. This is a continuous feedback loop useful for governance &amp; also for customizing
                products &amp; solutions.</p>
            <button type="button" class="semiotics-action-btn" data-bs-toggle="modal" data-bs-target="#semioticsModal">
                Semiotics features
            </button>
        </div>
        <p class="snipcss-9m8qz" style="margin-top: -35px;"> <br> <br> The Daily Content Posts of each City (in the
            Mother Tongue) is measured
            on the – <span class="text-primary"> Emotion, Culture/Nature, Education, Work &amp; Global/Local – </span>
            Two independent metrics of the Signifier <span class="text-primary"> ( Content Creator)</span> &amp; the
            Signified <span class="text-primary"> (Content Recipient) </span> constantly measured &amp; compared,
            without
            the impact of digital marketing ( i.e. paid boosting of content post), to compile an unbiased semiotic
            output on the City’s online reading/browsing patterns. The Western linguistic semiotics model of <span
                class="text-primary"> Signifier-Signified</span> is effectively synchronized with Indian philosophy’s
            <span class="text-primary"> Rasa-Bhava </span> to produce a unique output which provides cognitive insights
            into each City. The daily semiotics feed aggregate over time to become more &amp; more significant. <br><br>
            We have been continuously creating daily content for 4 Indian cities ( of different population sizes) for
            over 2000 days each. With approx. 10,000 subscribers in each City, here is a peep inside the live City
            Semiotics, until yesterday - <br>
        </p>
        <!-- Exported with SnipCSS extension (Ver 1.8.8) -->
        <section class="container mt-4 snipcss-6MyrJ"> <br>
            <div class="row">
                <div class="col-md-3">
                    <p class="h5">Live City Semiotics -</p>
                </div>
                <div class="col-sm-2">
                    <div class="m-2">
                        <a href=" https://b2b.prarang.in/semiotic/YzQ=" class="semiotic-btn style-WKIDT"
                            contenteditable="false" id="style-WKIDT"> Lucknow , U.P</a>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="m-2">
                        <a href=" https://b2b.prarang.in/semiotic/YzI=" class="semiotic-btn style-JeodN"
                            contenteditable="false" id="style-JeodN"> Meerut , U.P</a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="m-2">
                        <a href=" https://b2b.prarang.in/semiotic/YzM=" class="semiotic-btn style-BUtYl"
                            contenteditable="false" id="style-BUtYl"> Rampur , U.P</a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="m-2">
                        <a href=" https://b2b.prarang.in/semiotic/cjQ=" class="semiotic-btn style-KylBq"
                            contenteditable="false" id="style-KylBq"> Jaunpur , U.P</a>
                    </div>
                </div>
            </div>
        </section>

    </section>

    <div class="modal fade" id="semioticsModal" tabindex="-1" aria-labelledby="semioticsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-top-centered">
            <div class="modal-content modal-xl">
                <div class="modal-header">
                    <h5 class="modal-title" id="semioticsModalLabel">City-Semiotics Model</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('images/semiotic.png') }}" alt="City-Semiotics model"
                        class="semiotics-modal-img">
                </div>
            </div>
        </div>
    </div>


</x-layout.main.base>
