<div class="px-2 container-fluid">

    <style>
        /* Division */
        #sidebar-left div .weather-widgetx>div {
            padding-left: 0px !important;
            padding-right: 0px !important;
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }



        /* Widget Title */
        #left-time-widget h3 {
            color: #ffffff !important;
            margin-bottom: 0px !important;
            transform: translatex(0px) translatey(0px);
            padding-top: 17px;
            padding-bottom: 8px;
        }

        /* Widget Title */
        #right-time-widget h3 {
            color: #ffffff !important;
            margin-bottom: 1px !important;
            transform: translatex(0px) translatey(0px);
            padding-top: 15px;
            padding-bottom: 10px;
        }

        /* Left date */
        #left-date {
            color: rgba(255, 255, 255, 0.75) !important;
        }

        /* Right date */
        #right-date {
            color: rgba(255, 255, 255, 0.75) !important;
        }

        /* Paragraph */
        .hentry .main__header p {
            margin-bottom: 13px;
            padding-bottom: 3px;
        }

        /* Right time */
        #right-time {
            color: #afcfbe !important;
        }

        /* Left time */
        #left-time {
            color: #b4d9c9 !important;
        }

        /* Heading */
        .hentry .main__header h1 {
            padding-top: 16px;
            margin-bottom: 7px !important;
        }

        /* Column 6/12 */
        #wrapper #core .core__inner #columns .columns__inner .lsvr-container .lsvr-grid .columns__main {
            margin-top: 15px !important;
        }

        /* Header */
        #main .hentry header {
            background-color: rgba(0, 0, 0, 0.62);
        }

        /* Widget  inner */
        #left-time-widget .widget__inner {
            background-color: rgba(51, 51, 51, 0.68);
        }

        /* Widget  inner */
        #right-time-widget .widget__inner {
            background-color: rgba(51, 51, 51, 0.69);
        }

        /* Link */
        #left-links-widget li a {
            flex-direction: row;
            justify-content: normal;
        }

        /* Font Icon */
        #left-links-widget li .fa-external-link {
            margin-right: 7px !important;
            position: relative;
            top: 2px;
        }

        /* Font Icon */
        #right-links-widget li .fa-external-link {
            position: relative;
            top: 2px;
        }

        /* Heading */
        #right-links-widget div h6 {
            margin-bottom: 3px;
        }

        /* Link */
        #right-links-widget li a {
            padding-left: 6px;
            color: rgba(49, 137, 225, 0.75) !important;

        }

        #right-links-widget li a:hover {
            padding-left: 8px;
            color: rgba(49, 137, 225, 0.75) !important;
            font-weight: 600;
        }

        /* Widget  content */
        #right-links-widget .widget__content {
            /* transform: translatex(0px) translatey(0px); */
        }

        /* Widget Title */
        #right-links-widget h3 {
            margin-bottom: 0px !important;
        }

        /* Widget Title */
        #left-links-widget h3 {
            margin-bottom: 0px !important;
        }

        /* Link (hover) */
        #left-links-widget li a:hover {
            color: rgba(22, 13, 185, 0.75) !important;
            font-weight: 600;
            padding-left: 8px;
        }

        #left-links-widget li a {
            color: rgba(22, 13, 185, 0.75) !important;
            padding-left: 6px;
        }
    </style>
    <aside id="sidebar-{{ $side }}" class="mt-3">
        <div class="sidebar-{{ $side }}__inner">

            <!-- Time Widget -->
            <div class="shadow-sm mb-4 border rounded widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                id="{{ $side }}-time-widget">
                <div class="p-3 widget__inner">
                    <h3 class="mb-3 ps-2 text-primary text-center widget__title widget__title--has-icon fw-bold">
                        <i class="me-2 fa fa-clock-o"></i>
                        {{ $data->country_name ?? 'N/A' }} Time
                    </h3>
                    <div class="text-center widget__content">
                        <div id="{{ $side }}-time" class="mb-1 text-success h4 fw-semibold">Loading...</div>
                        <div id="{{ $side }}-date" class="text-muted small"></div>
                    </div>
                </div>
            </div>

            <!-- Weather Widget -->

            <div class="widg">
                @if (!empty($data->weather))
                    <div class="weather-widgetx">{!! $data->weather !!}</div>
                @else
                    <p class="mb-0 text-muted small">Weather data not available</p>
                @endif
            </div>
            <div class="bg-light shadow shadow mt-3 p-2 border rounded">
                <h4 class="ps-2 text-dark text-center h5">
                    <i class="me-2 fa fa-analysis-o"></i>
                    {{ $data->country_name }} Local Metrics
                </h4>
                @php
                    $decoded = json_decode($data->local_metrics, true);
                    // If still a string, decode again
                    $metrics = is_string($decoded) ? json_decode($decoded, true) : $decoded;
                @endphp

                @if (is_array($metrics))
                    <table class="table table-bordered">

                        <tbody>
                            @foreach ($metrics as $row)
                                <tr>
                                    <td>{{ $row['key'] ?? '' }}</td>
                                    <td>{{ $row['value'] ?? '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-danger">Invalid JSON format in <code>local_metrics</code>.</p>
                    <pre>{{ $data->local_metrics }}</pre>
                @endif
            </div>



            <!-- News Widget -->
            <div class="shadow-sm mb-4 border rounded widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background"
                id="{{ $side }}-news-widget">
                <div class="p-3 widget__inner">
                    <h3 class="mb-3 ps-2 text-info text-center widget__title widget__title--has-icon fw-bold">
                        <i class="me-2 fa fa-newspaper-o"></i>
                        {{ $data->country_name ?? 'N/A' }} News
                    </h3>
                    <div class="widget__content">

                        <div class="bg-light p-3 border rounded text-center">
                            @if (!empty($data->news))
                                <a href="{{ str_replace(' ', '"', $data->news) }}" target="_blank"
                                    class="text-primary text-decoration-none fw-semibold">
                                    <i class="me-1 fa fa-external-link"></i>
                                    {{ $data->country_name ?? ' N/A' }} News </a>
                            @else
                                <p class="mb-0 text-muted small">No news available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Embassy Section -->
            <div class="shadow-sm mb-4 border-0 rounded card" id="{{ $side }}-embassy-card">
                <div class="text-center card-body">
                    <h5 class="mb-3 text-primary card-title fw-bold">
                        <i class="me-2 fa fa-building-o"></i>
                        Embassy of {{ $data->country_name ?? 'N/A' }}
                    </h5>

                    @if (!empty($data->embassy_link))
                        <a href="{{ $data->embassy_link }}" class="w-100 btn btn-primary fw-semibold" target="_blank">
                            <i class="me-1 fa fa-external-link"></i> Visit Embassy Website
                        </a>
                    @else
                        <span class="text-danger small">Embassy link not available.</span>
                    @endif
                </div>
            </div>
            <!-- Analytics Widget -->
            {{-- place here --}}


            <!-- Important Links Widget -->
            <div class="shadow-sm border rounded widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background"
                id="{{ $side }}-links-widget">
                <div class="p-3 widget__inner">
                    <h3 class="mb-3 ps-2 text-danger text-center widget__title widget__title--has-icon fw-bold">
                        <i class="me-2 fa fa-link"></i>
                        Important Links of {{ $data->country_name ?? 'N/A' }}
                    </h3>

                    <div class="widget__content">
                        @if (!empty($data->important_links) && is_array($data->important_links))

                            @foreach ($data->important_links as $key => $links)
                                <div class="">
                                    <h6 class="text-primary text-capitalize fw-bold">
                                        {{ str_replace('_', ' ', $key) }}
                                    </h6>
                                    <ul class="list-unstyled">
                                        @foreach ($links as $link)
                                            <li class="">
                                                <a href="{{ $link['url'] }}" target="_blank"
                                                    class="d-flex align-items-center hover-shadow rounded text-muted text-decoration-none">
                                                    <i class="me-2 text-secondary fa fa-external-link"></i>
                                                    <span>{{ $link['name'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="mb-0 text-muted small">No important links available</p>
                        @endif
                    </div>
                </div>
            </div>


            <div class="bg-light shadow shadow mt-3 p-2 border rounded">
                <div class="mt-3">
                    <a href="https://prarang.in/yp/" target="_blank"
                        class="group block relative rounded-lg overflow-hidden">

                        <!-- IMAGE -->
                        <img src="https://meerutrang.in/images/yellow-pages-row.png" alt="Login"
                            class="w-full object-cover group-hover:scale-[1.02] transition-transform duration-300" />

                        <!-- OVERLAY -->
                        <div class="absolute inset-0"></div>

                        <!-- TEXT ON IMAGE -->
                        <div class="z-10 absolute inset-0 flex flex-col justify-center items-center text-center">
                            <h2 class="drop-shadow-md font-bold text-[36px] text-black">
                                @if ($side == 'left')
                                    Indian Companies In Czech Republic
                                @else
                                    Czech Republic Companies In India
                                @endif
                            </h2>
                            <h4 class="drop-shadow mt-1 font-semibold text-black text-sm">
                                हिंदी येलो पेज (Yellow Pages)
                            </h4>
                        </div>

                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- JS for Time Display -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateTime() {
                const timezone = '{{ $data->timezone ?? 'UTC' }}';
                const side = '{{ $side ?? 'right' }}';

                try {
                    const now = new Date();
                    const options = {
                        timeZone: timezone,
                        hour12: true,
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    };

                    const dateOptions = {
                        timeZone: timezone,
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };

                    const timeString = now.toLocaleTimeString('en-US', options);
                    const dateString = now.toLocaleDateString('en-US', dateOptions);

                    const timeElement = document.getElementById(side + '-time');
                    const dateElement = document.getElementById(side + '-date');

                    if (timeElement && dateElement) {
                        timeElement.textContent = timeString;
                        timeElement.classList.add('updated');
                        dateElement.textContent = dateString;
                        setTimeout(() => timeElement.classList.remove('updated'), 600);
                    }
                } catch (error) {
                    console.error('Error updating time for ' + side + ':', error);
                    const timeElement = document.getElementById(side + '-time');
                    if (timeElement) timeElement.textContent = 'Time unavailable';
                }
            }

            updateTime();
            setInterval(updateTime, 1000);
        });
    </script>
</div>
