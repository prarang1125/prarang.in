<div class="container-fluid px-2">

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
            <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background shadow-sm mb-4 border rounded"
                id="{{ $side }}-time-widget">
                <div class="widget__inner p-3">
                    <h3 class="widget__title widget__title--has-icon ps-2 mb-3 text-center text-primary fw-bold">
                        <i class="fa fa-clock-o me-2"></i>
                        {{ $data->country_name ?? 'N/A' }} Time
                    </h3>
                    <div class="widget__content text-center">
                        <div id="{{ $side }}-time" class="h4 text-success fw-semibold mb-1">Loading...</div>
                        <div id="{{ $side }}-date" class="text-muted small"></div>
                    </div>
                </div>
            </div>

            <!-- Weather Widget -->

            <div class="widg">
                @if (!empty($data->weather))
                    <div class="weather-widgetx">{!! $data->weather !!}</div>
                @else
                    <p class="text-muted small mb-0">Weather data not available</p>
                @endif
            </div>
<div class="border shadow p-2 mt-3 shadow bg-light rounded">
    <h4 class=" ps-2 text-center  text-dark h5">
                        <i class="fa fa-analysis-o me-2"></i>
                       {{$data->country_name}} Local Metrics
                    </h4>
    @php
        $decoded = json_decode($data->local_metrics, true);
        // If still a string, decode again
        $metrics = is_string($decoded) ? json_decode($decoded, true) : $decoded;
    @endphp

    @if (is_array($metrics))
        <table class="table table-bordered ">

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
            <div class="widget lsvr-townpress-news-widget lsvr-townpress-news-widget--has-background shadow-sm mb-4 border rounded"
                id="{{ $side }}-news-widget">
                <div class="widget__inner p-3">
                    <h3 class="widget__title widget__title--has-icon ps-2 mb-3 text-center text-info fw-bold">
                        <i class="fa fa-newspaper-o me-2"></i>
                        {{ $data->country_name ?? 'N/A' }} News
                    </h3>
                    <div class="widget__content">
                        <div class="rounded p-3 bg-light border text-center">
                            @if (!empty($data->news))
                                <a href="{{ $data->news }}" target="_blank"
                                    class="fw-semibold text-decoration-none text-primary">
                                    <i class="fa fa-external-link me-1"></i>
                                    {{ $data->country_name ?? 'N/A' }} News
                                </a>
                            @else
                                <p class="text-muted small mb-0">No news available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Embassy Section -->
            <div class="card shadow-sm mb-4 border-0 rounded" id="{{ $side }}-embassy-card">
                <div class="card-body text-center">
                    <h5 class="card-title mb-3 fw-bold text-primary">
                        <i class="fa fa-building-o me-2"></i>
                        Embassy of {{ $data->country_name ?? 'N/A' }}
                    </h5>

                    @if (!empty($data->embassy_link))
                        <a href="{{ $data->embassy_link }}" class="btn btn-primary w-100 fw-semibold" target="_blank">
                            <i class="fa fa-external-link me-1"></i> Visit Embassy Website
                        </a>
                    @else
                        <span class="text-danger small">Embassy link not available.</span>
                    @endif
                </div>
            </div>
            <!-- Analytics Widget -->
            {{-- place here --}}


            <!-- Important Links Widget -->
            <div class="widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background shadow-sm border rounded"
                id="{{ $side }}-links-widget">
                <div class="widget__inner p-3">
                    <h3 class="widget__title widget__title--has-icon ps-2 mb-3 text-center fw-bold text-danger">
                        <i class="fa fa-link me-2"></i>
                        Important Links of {{ $data->country_name ?? 'N/A' }}
                    </h3>

                    <div class="widget__content">
                        @if (!empty($data->important_links) && is_array($data->important_links))

                            @foreach ($data->important_links as $key => $links)
                                <div class="">
                                    <h6 class="fw-bold text-primary text-capitalize">
                                        {{ str_replace('_', ' ', $key) }}
                                    </h6>
                                    <ul class="list-unstyled">
                                        @foreach ($links as $link)
                                            <li class="">
                                                <a href="{{ $link['url'] }}" target="_blank"
                                                    class="text-muted text-decoration-none d-flex align-items-center rounded hover-shadow">
                                                    <i class="fa fa-external-link me-2 text-secondary"></i>
                                                    <span>{{ $link['name'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted small mb-0">No important links available</p>
                        @endif
                    </div>
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
