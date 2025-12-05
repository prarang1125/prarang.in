<x-layout.main.base>

    <style>
        /* Partner */
        main .be-partner {
            display: flex;
            justify-content: normal;
            align-items: center;
            flex-wrap: wrap;
        }

        /* Division */
        main .be-partner div {
            background-color: yellow;
            border: 1px solid gray;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 30px;
            padding-bottom: 30px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            margin-left: 58px;
            margin-bottom: 20px;
            margin-top: 10px;
            font-weight: 600;
        }

        /* Column 6/12 */
        main .col-md-6 {
            font-size: 14px;
        }

        @media (max-width:950px) {

            /* Division */
            main .be-partner div {
                display: none;
            }

        }

        @media (max-width:1200px) {

            /* Button */
            main .d-md-block {
                width: 200px;
            }

        }

        /* Request tomeet */
        #requestTomeet {
            background-color: rgba(255, 255, 0, 0);
        }

        /* Label */
        #meetingRequest .m-2 label {
            font-size: 14px;
            font-weight: 600;
            margin-left: 9px;
        }

        /* Modal content */
        #requestTomeet .modal-dialog .modal-content {
            height: 94vh;
            margin-top: -3px;
        }

        /* Request tomeet */
        #requestTomeet {
            margin-top: -12px;
            height: 100vh;
        }

        /* Modal body */
        main #requestTomeet .modal-dialog .modal-content .modal-body {
            height: 472px !important;
        }

        /* Modal content */
        #requestTomeet .modal-dialog .modal-content {
            height: 499px !important;
            transform: translatex(0px) translatey(0px);
            margin-top: 0px !important;
        }

        /* Request tomeet */
        #requestTomeet {
            margin-top: 12px !important;
        }

        /* Mail success */
        #mail-success {
            text-align: center;
            position: relative;
            top: 16px;
            left: -1px;
        }

        main .btn-warning {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
            padding-left: 0px;
            padding-right: 0px;
            padding-top: 0px;
            padding-bottom: 0px;
        }
    </style>
    <section class="bs5-top-heading">
        <p class=""> City Knowledge Web</p>
        <p>Market Partners</p>
    </section>
    <section class=" container">
        <div class="row">
            <div class="col-sm-8">
                <p class="mb-3">Prarang is now open to exclusive <span class="text-primary">– One City, One Language,
                        One Partnership –</span> a select 923+ Indian Markets & 2428+ World Markets. Each<a
                        target="_blank" href="https://www.prarang.in/market"> Prarang Market</a> is a unique City-Language
                    Knowledge Web. Empowered with Prarang city <span class="text-primary">Content, Semiotics &
                        Analytics</span>, our City Partners can now create a hyper-local impact with their brands &
                    products towards the growth of the City through daily messaging & regular meetings with City
                    citizens <span class="text-primary">(B2B2C)</span>, and also undertake meaningful & informed
                    projects with local governments <span class="text-primary">(B2G2C)</span>.</p>

            </div>
            <div class="col-sm-4">
                <div class="rounded border p-2">
                    <p class="text-center h4">Partner Benefits</p>
                    <ul>

                        <li><a type="button" data-bs-toggle="modal" data-bs-target="#TheseMTw1">Product</a></li>
                        <li>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#TheseMTi1">Advertising</a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>

        <style>
            /* Button */
            .container .cirs a {
                padding-left: 57px;
                padding-right: 56px;
                position: relative;
                left: -80px;
                background-color: #0eb71d;
                color: #ffffff;
                transform: translatex(0px) translatey(0px);
                font-weight: 600;
                margin-bottom: 13px;
                border-color: #27e320 !important;
                padding-bottom: 3px;
            }

            /* Button (hover) */
            .container .cirs a:hover {
                background-color: #239d2e;
            }
        </style>

        <section class="text-center">
            <div class="row">
                <div class="col-sm-6">
                    <div class="text-center mb-4">
                        <a class="btn btn-lg btn-warning border border-danger w-50" target="_blank"
                            href="https://b2b.prarang.in/login">Partnership (B2B) Login</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="btn btn-warning d-none d-xl-block w-50 btn-lg" data-bs-toggle="modal"
                        data-bs-target="#requestTomeet"> New Partnership Request</div>
                </div>
            </div>
            <div class="cirs">
                <a class="btn btn-lg btn-warning border border-danger" href="/cirus">CIRUS <br> Cyber
                    Intelligence & Risk Unified System</a>
            </div>
            </div>
            <p class="h5 text-start">Live City Knowledge Webs - Reach & Market Size :</h3>
            <div class="row mb-2">
                <div class="col-sm-2 text-center">
                    <b>City Monthly Metrics</b>
                </div>
                <div class="col-sm-2 ">
                    <a href="https://b2b.prarang.in/ads/YzQ=" target="_blank"
                        class="btn btn-sm btn-warning w-75 ">Lucknow</a>
                </div>
                <div class="col-sm-2">
                    <a href="https://b2b.prarang.in/ads/YzI=" target="_blank"
                        class="btn btn-sm btn-warning w-75">Meerut</a>
                </div>
                <div class="col-sm-2">
                    <a href="https://b2b.prarang.in/ads/YzM=" target="_blank"
                        class="btn btn-sm btn-warning w-75">Rampur</a>
                </div>
                <div class="col-sm-2">
                    <a href="https://b2b.prarang.in/ads/cjQ=" target="_blank"
                        class="btn btn-sm btn-warning w-75">Jaunpur</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 text-center">
                    <b>City Daily ( Day 5 & Day 31) Metrics</b>
                </div>
                <div class="col-sm-2 ">
                    <a href="https://b2b.prarang.in/ads/content/YzQ=" target="_blank"
                        class="btn btn-sm btn-warning w-75 ">Lucknow</a>
                </div>
                <div class="col-sm-2">
                    <a href="https://b2b.prarang.in/ads/content/YzI=" target="_blank"
                        class="btn btn-sm btn-warning w-75">Meerut</a>
                </div>
                <div class="col-sm-2">
                    <a href="https://b2b.prarang.in/ads/content/YzM=" target="_blank"
                        class="btn btn-sm btn-warning w-75">Rampur</a>
                </div>
                <div class="col-sm-2">
                    <a href="https://b2b.prarang.in/ads/content/cjQ=" target="_blank"
                        class="btn btn-sm btn-warning w-75">Jaunpur</a>
                </div>
            </div>
        </section>


        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="requestTomeet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="requestTomeetLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="requestTomeetLabel"> New Partnership Request Form</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        <form id="meetingRequest">
                            <div class="m-2">
                                <label for="meetingRequest-name">Name: </label>
                                <input id="meetingRequest-name" type="text" class="form-control w-100"
                                    name='name'>
                            </div>
                            <div class="m-2">
                                <label for="meetingRequest-phone">Phone No:</label>
                                <input id="meetingRequest-phone" type="number" class="form-control w-100"
                                    name='phone'>
                            </div>
                            <div class="m-2">
                                <label for="meetingRequest-email">Email</label>
                                <input id="meetingRequest-email" type="email" class="form-control w-100"
                                    name='email'>
                            </div>
                            <div class="m-2 mt-4">
                                <textarea name="desc" id="" class="form-control" rows="2" placeholder="Say Something....."></textarea>
                            </div>
                            <p class="text-danger ps-3" id="request-error"></p>
                            <p class="text-end">

                                <button type="submit" class="btn btn-warning"><i
                                        class="fa fa-spinner fa-spin fa-fw d-none" id="loader"></i>Send</button>
                            </p>
                        </form>
                        <div id="mail-success"></div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-xl" id="TheseMTw1" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="TheseMTw1Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h1 class="modal-title fs-5" id="TheseMTLabel">Modal title</h1> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-primary h6">Standard City Partner Product -</p>
                                <ol>
                                    <li><b>City Partner Exclusive Login Access </b>- 5 Employee/Biz Partner Ids - For
                                        the duration of Partnership</li>
                                    <li><b>City Subscribers & City Portal -</b> Live 10,000+ FB & Mobile App Subscribers
                                        + City Portal with 60+ Posts</li>
                                    <li><b> Exclusive Ad insert in Daily Post -</b> Prarang FB Page/Mobile App - Upto 27
                                        Still & 4 Videos, Per Month</li>
                                    <li><b> Sponsored Ad - </b> FB Page - Upto 27 Still & 4 Videos, Per Month</li>
                                    <li><b> Exclusive Partnership on City Portal & Prarang.in - </b> Partnership Ad
                                        Placement - For the duration of Partnership</li>
                                    <li><b> Analytics -</b>
                                        <ul>
                                            <li>(a) City Digital Demographics </li>
                                            <li>(b) Prarang Monthly Performance Analytics & Daily Post Analytics </li>
                                            <li>(c) City Metrics & City Planners - Exclusive access to Updated
                                                Socio-Economic & Culture-Nature metrics</li>
                                        </ul>
                                    </li>
                                    <li> <b>Semiotics -</b>
                                        <ul>
                                            <li>(a) Exclusive daily insights on Readership - City Mood </li>
                                            <li>(b) Exclusive daily insights on Readership - Culture-Nature, Work,
                                                Education & Global-Local</li>
                                        </ul>
                                    </li>
                                    <li><b> Impact -</b>
                                        <ul>
                                            <li>(a) Monthly Top 3 Readers</li>
                                            <li>(b) Monthly Top 3 Posts</li>
                                            <li>(c) Monthly City Subscriber FB Profile Clicks</li>
                                        </ul>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6 ">
                                <p class="text-primary h6">Add On Products (Optional) – Based on request for Activation
                                    :</p>
                                <ol>
                                    <li> <b>City Subscriber Increase Request -</b>
                                        <div class="be-partner">
                                            <ul>
                                                <li>(a) Meta - FB</li>
                                                <li>(b) Meta - Instagram</li>
                                                <li>(c) Meta - Whatsapp</li>
                                                <li>(d) eMail</li>
                                                <li>(e) Mobile App</li>
                                                <li>(f) Microsoft - Linked-In</li>
                                                <li>(g) X - Twitter</li>
                                                <li>(h) Sharechat</li>
                                                <li>(i) Daily Post</li>
                                            </ul>

                                    </li>
                                    <li><b>Twin City Content Portal (Additional domain) -</b> For better Branding &
                                        better SEO</li>
                                    <li><b> Change request</b> for Monthly 27 Stills & 4 Video Ads for Daily Posts</li>
                                    <li><b>Adscape City Print & Outdoor Survey - </b>/Year Activation</li>
                                    <li><b>city Subscriber Meet/Presentation/Survey -</b> Month/Year ; Frequency</li>
                                    <li><b>Content Usage -</b> Images & Text Usage Purchase request</li>
                                    <li><b> Business Survey -</b> Yellow Pages & e-Cards Activation Project - Month/Year
                                        ; Frequency</li>
                                </ol>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-xl" id="TheseMTi1" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="TheseMTi1Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h1 class="modal-title fs-5" id="TheseMTLabel">Modal title</h1> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-left test-start">
                        <section class="container mt-3">
                            <p>
                                The mobile internet provides a more targeted & cost-effective option vis-à-vis
                                traditional forms of
                                Advertising ( Newspapers, Outdoors, Radio/TV etc) . Yet, few hyperlocal digital
                                solutions have emerged for
                                advertisers thus far, as contextualized <span class="text-primary"> hyperlocal language
                                    content </span>
                                continues to
                                be scarce, in an English language driven internet. With Prarang <span
                                    class="text-primary"> daily , local
                                    language city content</span> creation, we attempt to fill that gap. Alongside, it
                                opens a <span class="text-primary"> new digital advertising </span> opportunity
                                Additionally, with the daily benefit
                                of unique
                                City semiotic insights, a quantum leap in advertising is now possible. With the <span
                                    class="text-primary">
                                    City Semiotics </span> detailed input , you can get to even understand the different
                                emotions,
                                interests, shapes, colours, fonts – everything which attributes various meanings, to
                                help you to construct
                                an advertisement that best promotes what you want to say.

                            </p>
                            <div>
                                <p>Prarang offers an exclusive Advertising opportunity for our City-Partners</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            <li>Zero Waste Advertisement</li>
                                            <ul>
                                                <li>Reach 20-70% (or more) of the internet-enabled population</li>
                                                <li>Save on paper and plastic</li>
                                                <li>Track competitive advertising across traditional media & industry
                                                </li>
                                            </ul>
                                            <li>Daily & Monthly City/District Metrics</li>
                                            <ul>
                                                <li>Measure as you grow</li>
                                                <li>Deep local data insights for sharper planning</li>
                                            </ul>

                                        </ul>
                                    </div>

                                    <div class="col-md-6">
                                        <ul>
                                            <li>Make Your City Beautiful and Safe
                                            </li>
                                            <ul>
                                                <li> No ugly billboards and hoardings</li>
                                            </ul>
                                            <li>City Event / Announcement</li>
                                            <ul>
                                                <li>Fastest Delivery across the city</li>
                                            </ul>
                                            <li>City Audience – Semiotic Insights</li>
                                            <ul>
                                                <li>Partner on deep engagement with local audiences</li>
                                            </ul>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <p class=""> Adscape - City Print & Outdoor Survey </p>


                        </section>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('meetingRequest').addEventListener('submit', function(event) {
                event.preventDefault();

                const loader = document.getElementById('loader');
                loader.classList.remove('d-none');

                const formData = new FormData(event.target);
                const requestData = Object.fromEntries(formData.entries());

                // Send POST request
                fetch('https://b2b.prarang.in/api/request-to-metting', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'auth-token': 'eb146cdf0c53ca9d738b4f473ad1712fd'
                        },
                        body: JSON.stringify(requestData),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.done) {
                            loader.classList.add('d-none');
                            // Hide form
                            document.getElementById('meetingRequest').style.display = 'none';
                            // Show success message
                            document.getElementById('mail-success').textContent = 'Thanks for your request!';
                        } else {
                            document.getElementById('mail-success').textContent = 'Something went wrong!';
                        }
                    })
                    .catch(error => {
                        document.getElementById('request-error').innerHTML =
                            "Something went wrong please check your input fields and try again.";
                        loader.classList.add('d-none');
                    });
            });
        </script>

</x-layout.main.base>
