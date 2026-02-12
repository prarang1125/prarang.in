<x-layout.main.base :resetMainMinHeight="true">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Source+Sans+3:wght@300;400;600;700&display=swap");

        :root {
            --pm-green: #15a34a;
            --pm-green-dark: #0f7a36;
            --pm-yellow: #f6c21c;
            --pm-yellow-dark: #d9a614;
            --pm-ink: #1e1e1e;
            --pm-muted: #1e1e1e;
            --pm-border: #cfd8cf;
            --pm-card: #f9fff9;
        }

        .pm-page {
            padding: 32px 16px 40px;
        }

        .pm-wrap {
            max-width: 980px;
            margin: 0 auto;
            text-align: left;
            color: var(--pm-ink);
            font-family: "Source Sans 3", "Segoe UI", sans-serif;
        }

        .pm-title {
            font-family: "DM Serif Display", "Times New Roman", serif;
            font-size: 36px;
            letter-spacing: 0.5px;
            color: var(--pm-green);
            text-align: center;
            margin: 6px 0 6px;
        }

        .pm-subtitle {
            font-size: 14px;
            line-height: 1.6;
            color: var(--pm-muted);
        }

        .pm-metric {
            display: grid;
            grid-template-columns: 29px 1fr;
            column-gap: 0px;
            align-items: flex-start;
            padding: 12px;
            border-radius: 8px;
            background: transparent;
            margin-bottom: 8px;
        }

        .pm-metric img {
            width: 25px;
            height: 25px;
            display: block;
            object-fit: contain;
            margin-top: -3px
        }

        .pm-icon {
            width: 100%;
            height: auto;
            color: var(--pm-green);
        }

        .pm-metric h3 {
            font-size: 16px;
            margin: 0 0 4px;
            color: var(--pm-green);
            font-weight: 700;
            text-decoration: underline
        }

        .pm-metric p {
            font-size: 13px;
            margin: 0;
            color: var(--pm-muted);
            line-height: 1.55;
        }

        .pm-actions {
            margin: 22px auto 0;
            max-width: 780px;
            border: 1px solid var(--pm-border);
            background: #ffffff;
            display: grid;
            grid-template-columns: 1fr;
            gap: 8px;
            padding: 8px;
        }

        .pm-actions>div {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            border: 1px solid var(--pm-border);
            border-radius: 6px;
        }

        .pm-actions .pm-note {
            font-size: 13px;
            color: var(--pm-muted);
            text-align: center;
            margin: 0;
        }

        .pm-buttons {
            display: grid;
            gap: 8px;
        }

        .pm-buttons.two-btn {
            grid-template-columns: 1fr;
        }

        .pm-buttons.one-btn {
            grid-template-columns: 1fr;
        }

        .pm-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--pm-yellow-dark);
            background: var(--pm-yellow);
            color: #1b1b1b;
            font-weight: 700;
            padding: 8px 10px;
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 0.4px;
            box-shadow: 0 2px 0 #f0b600;
        }

        .pm-btn:hover {
            background: #ffd24a;
        }

        @media (min-width: 768px) {
            .pm-title {
                font-size: 38px;
            }

            .pm-subtitle {
                font-size: 14.5px;
            }

            .pm-metric {
                grid-template-columns: 29px 1fr;
                column-gap: 0px;
                padding: 12px;
            }

            .pm-actions {
                grid-template-columns: 1fr 1fr;
            }

            .pm-buttons.two-btn {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>

    <section class="pm-page">
        <div class="pm-wrap">
            <h1 class="pm-title">Partner Metrics</h1>
            <p class="pm-subtitle">
                A unified intelligence dashboard delivering cross-platform reach analytics, dynamic CTR insights,
                and deep audience demography insights to power precision targeting and data-driven campaign strategy.
            </p>

            <div class="pm-metric">
                <img src="{{ asset('images/partner1.png') }}" alt="">
                <div>
                    <h3>City Knowledge Posts / Content Metrics</h3>
                    <p>
                        Track performance with structured milestone reporting, including Day 5 and Day 31 reach across
                        Facebook, WhatsApp, Mobile App, Email Campaigns, and Google (SEO). Our unified analytics layer
                        gives partners a clear, consolidated view of how content performs across major digital
                        touchpoints
                        within the city ecosystem.
                    </p>
                </div>
            </div>

            <div class="pm-metric">
                <img src="{{ asset('images/partner2.png') }}" alt="">
                <div>
                    <h3>City CTR%</h3>
                    <p>
                        Gain access to dynamic CTR% insights at the city reader level, including performance breakdowns
                        for individual content tags. Instantly identify which tags are driving engagement and which are
                        underperforming, enabling smarter precision targeting and sharper campaign strategy built on
                        measurable outcomes.
                    </p>
                </div>
            </div>

            <div class="pm-metric">
                <img src="{{ asset('images/partner3.png') }}" alt="">
                <div>
                    <h3>City Subscriber Profile</h3>
                    <p>
                        Monitor subscriber growth across Facebook, WhatsApp, Mobile App, Email, and Google (SEO)
                        while measuring comprehensive cross-platform portal reach. This provides a holistic
                        understanding
                        of audience expansion and digital penetration within the city.
                    </p>
                </div>
            </div>

            <div class="pm-metric">
                <img src="{{ asset('images/partner4.png') }}" alt="">
                <div>
                    <h3>City Internet Trends</h3>
                    <p>
                        Access city-wide demographic intelligence including total population, adult population,
                        local-language-speaking audiences, internet penetration, and social media usage across Facebook,
                        LinkedIn, and X (Twitter). These insights allow partners to align communication strategies with
                        the
                        true digital profile of the city.
                    </p>
                </div>
            </div>

            <div class="pm-actions">
                <div>
                    <div class="pm-note">Explore Your Partner Performance Metrics</div>
                    <div class="pm-buttons two-btn">
                        <a class="pm-btn" href="https://b2b.prarang.in/login" target="_blank">Business Login</a>
                        <a class="pm-btn" href="https://b2b.prarang.in/login?lt=g2c" target="_blank">Govt. &amp; NGO
                            Login</a>
                    </div>
                </div>

                <div>
                    <div class="pm-note">New here? Register Now!</div>
                    <div class="pm-buttons one-btn">
                        <button class="pm-btn" data-bs-toggle="modal" data-bs-target="#requestTomeet">Create a New
                            Partnership</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnership Request Modal -->
    <div class="modal fade" id="requestTomeet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="requestTomeetLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="requestTomeetLabel">New Partnership Request Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <form id="meetingRequest">
                        <div class="m-2">
                            <label for="meetingRequest-name">Name: </label>
                            <input id="meetingRequest-name" type="text" class="form-control w-100" name='name'>
                        </div>
                        <div class="m-2">
                            <label for="meetingRequest-phone">Phone No:</label>
                            <input id="meetingRequest-phone" type="number" class="form-control w-100" name='phone'>
                        </div>
                        <div class="m-2">
                            <label for="meetingRequest-email">Email</label>
                            <input id="meetingRequest-email" type="email" class="form-control w-100" name='email'>
                        </div>
                        <div class="m-2 mt-4">
                            <textarea name="desc" id="" class="form-control" rows="2" placeholder="Say Something....."></textarea>
                        </div>
                        <p class="text-danger ps-3" id="request-error"></p>
                        <p class="text-end">
                            <button type="submit" class="btn btn-warning"><i class="fa fa-spinner fa-spin fa-fw d-none"
                                    id="loader"></i>Send</button>
                        </p>
                    </form>
                    <div id="mail-success"></div>
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
