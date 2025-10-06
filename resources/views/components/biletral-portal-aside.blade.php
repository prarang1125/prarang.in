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
            <!-- Weather Widget -->

            <div class="widg">
                @if (!empty($data->weather))
                    <div class="weather-widgetx">{!! $data->weather !!}</div>
                @else
                    <p class="text-muted small mb-0">Weather data not available</p>
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

            <!-- Analytics Widget -->
            {{-- place here --}}


            <!-- Important Links Widget -->
            <div class="widget lsvr-townpress-embassy-widget lsvr-townpress-embassy-widget--has-background shadow-sm border rounded"
                id="{{ $side }}-links-widget">
                <div class="widget__inner p-3">
                    <h3 class="widget__title widget__title--has-icon ps-2 mb-3 text-center fw-bold text-danger">
                        <i class="fa fa-link me-2"></i>
                        Important Links for {{ $data->country_name ?? 'N/A' }}
                    </h3>

                    <div class="widget__content">

                        @if (!empty($data->important_links) && is_array($data->important_links))
                            <ul class="list-unstyled mb-0">
                                @foreach ($data->important_links as $key => $link)
                                    @foreach ($link as $value)
                                        <li class="mb-2">
                                            <a href="{{ $value['key'] }}" target="_blank"
                                                class="fw-semibold text-decoration-none text-secondary">
                                                <i class="fa fa-external-link me-1"></i>
                                                {{ $value['value'] ?? 'Link' }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>
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
