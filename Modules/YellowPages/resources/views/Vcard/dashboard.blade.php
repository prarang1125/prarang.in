@extends('yellowpages::layout.vcard.vcard')
@section('title', 'YellowPages')
@section('content')
<div class="page-content">
    <!-- Cards Section -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <a href="#">
            <div class="card radius-10 bg-gradient-deepblue">
                 <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">100</h5> <!-- Static Total Scans -->
                        <div class="ms-auto">
                            <i class='bx bx-scan fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">TOTAL SCANS</p>
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
                        <h5 class="mb-0 text-white">50</h5> <!-- Static Total Categories -->
                        <div class="ms-auto">
                            <i class='bx bx-world fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">TOTAL CATEGORIES</p>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <!-- Other Static Cards -->
    </div>

    <!-- Chart Section -->
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <canvas id="scanChart" style="height: 200px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Integration -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('scanChart').getContext('2d');
    const scanChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                '01 Dec', '03 Dec', '05 Dec', '07 Dec', '09 Dec', 
                '11 Dec', '13 Dec', '15 Dec', '17 Dec', '19 Dec', 
                '21 Dec', '23 Dec', '25 Dec', '27 Dec', '30 Dec'
            ], // Static Dates
            datasets: [{
                label: 'Scans',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0], // Static Scan Counts
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
@endsection
