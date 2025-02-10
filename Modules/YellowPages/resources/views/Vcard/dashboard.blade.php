@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Dashboard')
@section('content')
<div class="page-content">
    <!-- Dynamic Card Section -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <!-- Total Scans -->
        <div class="col">
            <a href="#">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $totalscan->scan_count ?? 0 }}</h5>
                            <div class="ms-auto">
                                <i class="bx bx-scan fs-3 text-white"></i>
                            </div>
                        </div>
                        <p class="mb-0 text-white">कुल स्कैन</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total User Views -->
        <div class="col">
            <a href="#">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $viewcount }}</h5>
                            <div class="ms-auto">
                                <i class="bx bx-show fs-3 text-white"></i>
                            </div>
                        </div>
                        <p class="mb-0 text-white">कुल उपयोगकर्ता दृश्य</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Subscription Plan -->
        <div class="col">
            <a href="#">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $plan->name ?? 'कोई योजना सक्रिय नहीं' }}</h5>
                            <div class="ms-auto">
                                <i class="bx bx-user fs-3 text-white"></i>
                            </div>
                        </div>
                        <p class="mb-0 text-white">सदस्यता</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Additional Cards -->
        <!-- Add more cards here as needed -->
    </div>

    <!-- Optional Chart Section -->
    @if(isset($labels) && isset($data))
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <canvas id="scanChart" style="height: 200px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Chart.js Integration -->
@if(isset($labels) && isset($data))
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('scanChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels), // Dynamic Dates
            datasets: [{
                label: 'Scans',
                data: @json($data), // Dynamic Scan Counts
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 0, 255, 0.1)',
                pointBorderColor: 'blue',
                pointBackgroundColor: 'white',
                pointRadius: 5,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endif
@endsection
