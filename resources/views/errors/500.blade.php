<x-layout.main.base :metaData="['title' => 'Unexpected Turn | Prarang']">
    <div class="error-wrapper d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-7 col-md-10">
                    <div class="error-content-box">
                        <div class="illustration-container mb-5">
                            <div class="floating-shapes">
                                <div class="shape shape-1"></div>
                                <div class="shape shape-2"></div>
                                <div class="shape shape-3"></div>
                            </div>
                            <div class="main-icon-wrapper">
                                <i class="bi bi-exclamation-triangle-fill display-1 text-primary"></i>
                            </div>
                        </div>

                        <h1 class="display-4 font-bold text-dark mb-3">Something Went Astray</h1>
                        <p class="lead text-muted mb-5 px-md-5">
                            We've encountered an unexpected turn while processing your request.
                            Our team has been notified and we're working to restore the knowledge web as quickly as
                            possible.
                        </p>

                        <div class="action-buttons d-flex flex-column flex-sm-row justify-content-center gap-3">
                            <button onclick="window.location.reload()"
                                class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm transition-all hover-lift">
                                <i class="bi bi-arrow-clockwise me-2"></i> Try Again
                            </button>
                            <a href="{{ url('/') }}"
                                class="btn btn-outline-dark btn-lg px-5 py-3 rounded-pill transition-all hover-lift">
                                <i class="bi bi-house-door me-2"></i> Back to Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('css')
    <style>
        .error-wrapper {
            min-height: 70vh;
            padding: 80px 0;
            background: radial-gradient(circle at top right, rgba(13, 110, 253, 0.05) 0%, transparent 40%),
                radial-gradient(circle at bottom left, rgba(13, 110, 253, 0.05) 0%, transparent 40%);
        }

        .error-content-box {
            position: relative;
            z-index: 10;
        }

        .illustration-container {
            position: relative;
            display: inline-block;
            padding: 40px;
        }

        .main-icon-wrapper {
            position: relative;
            z-index: 2;
            animation: floating 3s ease-in-out infinite;
        }

        .floating-shapes .shape {
            position: absolute;
            background: linear-gradient(135deg, #0d6efd 0%, #00d2ff 100%);
            border-radius: 50%;
            opacity: 0.1;
            z-index: 1;
        }

        .shape-1 {
            width: 100px;
            height: 100px;
            top: 0;
            left: -20px;
            animation: morphing 10s infinite alternate;
        }

        .shape-2 {
            width: 60px;
            height: 60px;
            bottom: 10px;
            right: -10px;
            animation: morphing 8s infinite alternate-reverse;
        }

        .shape-3 {
            width: 40px;
            height: 40px;
            top: 40px;
            right: -30px;
            filter: blur(2px);
            animation: floating 4s ease-in-out infinite reverse;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        @keyframes morphing {
            0% {
                border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            }

            100% {
                border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%;
            }
        }

        .font-bold {
            font-weight: 700;
        }

        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        @media (max-width: 576px) {
            .display-4 {
                font-size: 2.2rem;
            }

            .lead {
                font-size: 1.1rem;
            }
        }
    </style>
    @endpush
</x-layout.main.base>
