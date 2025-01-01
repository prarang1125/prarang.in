@extends('yellowpages::layout.vcard.vcard')
@section('title', 'YellowPages')
@section('content')
<div class="page-content">
   
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <a href="#">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $totalscan ? $totalscan->scan_count : 0 }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-scan fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">कुल स्कैन</p>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <!-- Other Cards -->
        <div class="col">
            <a href="#">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ is_object($plan) ? $plan->name : 'No Plan Active' }}</h5>
                            <!-- Static Total Categories -->
                            <div class="ms-auto">
                                <i class='bx bx-user fs-3 text-white'></i> <!-- Updated icon -->
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">सदस्यता</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- Other Static Cards -->
    </div>

    <!-- Chart Section -->
    {{-- <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <canvas id="scanChart" style="height: 200px;"></canvas>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<!-- Chart.js Integration -->
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('scanChart').getContext('2d');
    const scanChart = new Chart(ctx, {
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
</script> --}}
@endsection
