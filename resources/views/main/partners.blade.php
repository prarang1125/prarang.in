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
    <style>
        /* Heading */
        .container .flex h2 {
            font-size: 22px;
            text-decoration: none !important;
        }
    </style>
    <section class=" container mt-4">
        <div class="row">
            <div class="col-sm-8">
                <p class="mb-3">Prarang is open to Partnership in select 901+ Indian Markets & 195 World Markets. Each
                    Prarang Market is a unique Language Knowledge Web. Empowered with Prarang Content, Semiotics &
                    Analytics, Development and Market Planners our Partners can now create impact with their brands &
                    products.
                </p>

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

        <section class="text-center my-5 flex gap-3">
            <div class="border border-dark p-4 mx-auto">
                <h2 class="mb-4 text-decoration-underline no-underline">Partnership Login</h2>
                <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                    <!-- Business Login Button -->
                    <a class="btn btn-warning border border-dark px-4 py-2 fw-semibold" target="_blank"
                        href="https://b2b.prarang.in/login" style="min-width: 180px;">
                        Business Login
                    </a>

                    <!-- Govt & NGO Login Button -->
                    <a class="btn btn-warning border border-dark px-4 py-2 fw-semibold" target="_blank"
                        href="https://b2b.prarang.in/login?lt=g2c" style="min-width: 180px;">
                        Govt. & NGO Login
                    </a>



                    <!-- Create New Partnership Button -->

                </div>
            </div>
            <div class="border border-dark p-4 mx-auto flex justify-center items-center">
                <button class="btn btn-warning border border-dark px-4 py-2 fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#requestTomeet" style="min-width: 220px;">
                    Create a New Partnership
                </button>
            </div>
        </section>

        <!-- Partnership Benefits Section -->

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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <section class="container my-5">
                            <div class="mb-4">
                                <h4 class="fw-bold mb-3">Partnership Benefits</h4>
                                <ul class="mb-4">
                                    <li>Select a city and campaign date to book your advertisement</li>
                                    <li>Upload creative assets (still or video)</li>
                                    <li>Receive performance metrics on Day 5 and Day 31</li>
                                    <li>View hyperlocal performance insights for each advertisement</li>
                                    <li>Access in-depth city-level audience metrics</li>
                                    <li>Explore Prarang City Analytics for planning, tracking, and optimization</li>
                                </ul>

                                <h5 class="fw-bold mb-3">Partnership Tiers -</h5>

                                <!-- Audience & Reach Table -->
                                <div class="table-responsive mb-4">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Audience & Reach</th>
                                                <th class="text-center">City Lite</th>
                                                <th class="text-center">City Plus</th>
                                                <th class="text-center">City Prime</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Minimum City Subscriber Base</td>
                                                <td class="text-center">300+</td>
                                                <td class="text-center">300+</td>
                                                <td class="text-center">10,000+</td>
                                            </tr>
                                            <tr>
                                                <td>Hyperlocal Reach per Post (within 7 days)</td>
                                                <td class="text-center">3,000+</td>
                                                <td class="text-center">3,000+</td>
                                                <td class="text-center">3,000+</td>
                                            </tr>
                                            <tr>
                                                <td>Total Monthly Reach</td>
                                                <td class="text-center">12,000+</td>
                                                <td class="text-center">45,000+</td>
                                                <td class="text-center">93,000+</td>
                                            </tr>
                                        </tbody>

                                        <thead class="table-light">
                                            <tr>
                                                <th>Content & Publishing</th>
                                                <th class="text-center">City Lite</th>
                                                <th class="text-center">City Plus</th>
                                                <th class="text-center">City Prime</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Posts per Month</td>
                                                <td class="text-center">4</td>
                                                <td class="text-center">15</td>
                                                <td class="text-center">31</td>
                                            </tr>
                                            <tr>
                                                <td>Creative Formats Included</td>
                                                <td class="text-center">3 Stills, 1 Video</td>
                                                <td class="text-center">13 Stills, 2 Video</td>
                                                <td class="text-center">27 Stills, 4 Videos</td>
                                            </tr>
                                            <tr>
                                                <td>Posting Frequency</td>
                                                <td class="text-center">Weekly</td>
                                                <td class="text-center">Alternate Day</td>
                                                <td class="text-center">Daily</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>


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
                            'auth-token': 'eb146cdf0c53ca9d738b4f473ad1712f'
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
