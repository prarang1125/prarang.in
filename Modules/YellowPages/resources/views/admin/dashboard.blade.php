@extends('yellowpages::layout.admin.admin')
@section('title', 'Prarang Admin Home')
@section('content')
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        @foreach ([
            ['title' => 'उपयोगकर्ता', 'value' => $totalUser, 'icon' => 'bx-user', 'bgClass' => 'bg-gradient-deepblue'],
            ['title' => 'कुल श्रेणियाँ', 'value' => $totalCategory, 'icon' => 'bx-category', 'bgClass' => 'bg-gradient-ohhappiness'],
            ['title' => 'कुल शहर', 'value' => $totalcitys, 'icon' => 'bx-buildings', 'bgClass' => 'bg-gradient-orange'],
            ['title' => 'कुल व्यापार सूची', 'value' => $totallisting, 'icon' => 'bx-list-ul', 'bgClass' => 'bg-gradient-ohhappiness'],
            ['title' => 'कुल रिपोर्ट', 'value' => $report, 'icon' => 'bx-bar-chart', 'bgClass' => 'bg-gradient-orange'],
            ['title' => 'कुल योजना ग्राहक', 'value' => $Subscribers, 'icon' => 'bx-user-check', 'bgClass' => 'bg-gradient-deepblue']
        ] as $card)
            <div class="col">
                <a href="#">
                    <div class="card radius-10 {{ $card['bgClass'] }}">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $card['value'] }}</h5>
                                <div class="ms-auto">
                                    <i class='bx {{ $card['icon'] }} fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">{{ $card['title'] }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
