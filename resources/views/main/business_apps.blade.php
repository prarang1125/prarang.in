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
            font-size: 28px;
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

        .table-header-right {
            flex: 0 0 220px;
            border: 1px solid #000000;
            padding: 8px 10px;
            text-align: left;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .table-header-right h4 {
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 6px 0;
            color: #000000;
        }

        .table-header-right a {
            display: block;
            font-size: 13px;
            color: #2c4f92;
            text-decoration: none;
            margin: 2px 0;
            white-space: nowrap;
        }

        .table-header-right ol {
            list-style: disc;
            padding-left: 18px;
            margin: 0;
            white-space: nowrap;
        }

        .table-header-right li {
            margin: 2px 0;
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

        .feature-modal .modal-dialog {
            max-width: 900px;
        }

        .feature-modal .modal-body img {
            max-width: 100%;
            max-height: 70vh;
            margin: 0 auto;
        }
    </style>

    <section class="px-5 max-w-7xl mx-auto bg-gray-50/30 rounded-3xl my-1">
        <div class="table-header-title-wrap">
            <h2 class="table-header-title">Business Apps

            </h2>
            <div class="table-header-subtitle">Glocal For Hyperlocal
            </div>
        </div>
        <div class="table-header">
            <div class="table-header-main">
                <div class="table-header-left">
                    <p class="table-header-text">
                        Prarang Business Apps enable easy discovery of businesses and the products or services they
                        offer. It provides a structured, reliable space for visibility and customer access. City/country
                        based businesses can login and upload their products and services in local languages. Any local
                        citizen can create his digital identity on respective city portal by creating a personalized
                        e-card.


                    </p>
                </div>
            </div>
            <div class="table-header-right">
                <h4>Features</h4>
                <ol>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#TheseMTw1">City Yellow Pages,
                            e-Cards</a>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#TheseMTw2">Country Yellow Pages, Web
                            Page</a>
                    </li>
                </ol>
            </div>
        </div>

        <div class="city-tabs">
            <div class="city-tabs-label">India-Cities :</div>
            <div class="city-tabs-list">
                <a class="city-tab" href="https://www.prarang.in/yp/lucknow?p=lucknow" target="_blank">Lucknow</a>
                <a class="city-tab" href="https://www.prarang.in/yp/meerut?p=meerut" target="_blank">Meerut</a>
                <a class="city-tab" href="https://www.prarang.in/yp/rampur?p=rampur" target="_blank">Rampur</a>
                <a class="city-tab" href="https://www.prarang.in/yp/jaunpur?p=jaunpur" target="_blank">Jaunpur</a>
                <a class="city-tab" href="https://www.prarang.in/yp/shahjahanpur?p=shahjahanpur"
                    target="_blank">Shahjahanpur</a>
                <a class="city-tab" href="https://www.prarang.in/yp/haridwar?p=haridwar" target="_blank">Haridwar
                </a>
                <a class="city-tab" href="https://www.prarang.in/yp/pithoragarh?p=pithoragarh"
                    target="_blank">Pithoragarh
                </a>
            </div>
        </div>

        <div class="city-tabs">
            <div class="city-tabs-label">Country :</div>
            <div class="city-tabs-list">
                <a class="city-tab" href="https://www.prarang.in/yp/czech-republic" target="_blank">India-Czech</a>
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
                        <img src="{{ asset('images/Presentation1.png') }}" alt="City Portals"
                            style="height: auto; display: block;">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-xl feature-modal" id="TheseMTw2" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="TheseMTw2Label" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('images/Presentation2.png') }}" alt="Country Portals"
                            style="height: auto; display: block;">
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
