@props(['title', 'code'])

<div class="analytics-content"> <a data-bs-toggle="modal" data-bs-target="#cityAnalyticsModal{{ $code }}">
        <img src="https://www.prarang.in/matric-.JPG" class="img-fluid rounded shadow-sm mb-3 border">
    </a>

</div>

<!-- City Analytics Modal -->
<style>
    .analytics-grid {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 10px;
    }

    .analytics-row {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .analytics-box {
        background-color: #2196F3;
        color: white;
        padding: 20px 15px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 60px;
        font-weight: 500;
        flex: 1;
    }

    .analytics-box.full-width {
        width: 100%;
    }

    .analytics-box a {
        color: white;
        text-decoration: none;
    }

    .analytics-box:hover {
        background-color: #1976D2;
    }

    @media (max-width: 768px) {
        .analytics-row {
            flex-wrap: wrap;
        }

        .analytics-box {
            min-width: 45%;
        }
    }

    @media (max-width: 480px) {
        .analytics-box {
            min-width: 100%;
        }
    }
</style>

<div class="modal fade" id="cityAnalyticsModal{{ $code }}" tabindex="-1"
    aria-labelledby="cityAnalyticsModalLabel{{ $code }}" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content position-relative">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                aria-label="Close" style="z-index: 10;"></button>
            <div class="modal-body pt-5">
                <div class="text-center">
                    <strong class="text-primary fs-5">{{ $title }} Data by Ranks</strong>
                    @if($code == 'india')
                    <div class="analytics-grid">
                        <!-- Full width rows -->
                        <div class="analytics-row">
                            <div class="analytics-box full-width"><a target="_blank"
                                    href="https://g2c.prarang.in/india/culture">Culture</a></div>
                        </div>
                        <div class="analytics-row">
                            <div class="analytics-box full-width"><a target="_blank"
                                    href="https://g2c.prarang.in/india/nature">Nature</a></div>
                        </div>
                        <!-- 7 column row -->
                        <div class="analytics-row">
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/india/healths">Health</a></div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/india/wealths">Wealth</a></div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/india/edus">Education</a>
                            </div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/india/works">Work</a></div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/india/medias">Media</a></div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/india/uebs">Urbanization</a></div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/india/govs">Governance</a>
                            </div>
                        </div>
                        <!-- Full width rows -->
                        <div class="analytics-row">
                            <div class="analytics-box full-width"><a target="_blank"
                                    href="https://g2c.prarang.in/india/ints">Internet</a></div>
                        </div>
                        <div class="analytics-row">
                            <div class="analytics-box full-width"><a target="_blank"
                                    href="https://g2c.prarang.in/india/langs">Languages</a></div>
                        </div>
                        <div class="analytics-row">
                            <div class="analytics-box full-width"><a target="_blank"
                                    href="https://g2c.prarang.in/india/demos">Demography</a></div>
                        </div>
                    </div>
                    @else
                    <div class="analytics-grid">
                        <!-- Full width rows -->
                        <div class="analytics-row">
                            <div class="analytics-box full-width"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-cultures">Culture</a></div>
                        </div>
                        <div class="analytics-row">
                            <div class="analytics-box full-width"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-natures">Nature</a></div>
                        </div>
                        <!-- 7 column row -->
                        <div class="analytics-row">
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-healths">Health</a></div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-wealths">Wealth</a></div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-edus">Education</a>
                            </div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-works">Work</a></div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-medias">Media</a></div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-uebs">Urbanization</a></div>
                            <div class="analytics-box"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-govs">Governance</a>
                            </div>
                        </div>
                        <!-- Full width rows -->
                        <div class="analytics-row">
                            <div class="analytics-box full-width"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-ints">Internet</a></div>
                        </div>
                        <div class="analytics-row">
                            <div class="analytics-box full-width"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-langs">Languages</a></div>
                        </div>
                        <div class="analytics-row">
                            <div class="analytics-box full-width"><a target="_blank"
                                    href="https://g2c.prarang.in/{{ $code }}-demos">Demography</a></div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var cityModal = document.getElementById('cityAnalyticsModal{{ $code }}');
        if (cityModal) {
            document.body.appendChild(cityModal);
        }
    });
</script>