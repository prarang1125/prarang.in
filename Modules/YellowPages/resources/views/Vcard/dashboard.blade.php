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
                        <h5 class="mb-0 text-white"></h5>
                        <div class="ms-auto">
                            <i class='bx bx-user fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">User </p>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col">
            <a href="#">
            <div class="card radius-10 bg-gradient-deepblue">
                 <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white"></h5>
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
        <div class="col">
            <a href="#">
            <div class="card radius-10 bg-gradient-orange">
                 <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white"></h5>
                        <div class="ms-auto">
                            <i class='bx bx-world fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">TOTAL CITIES</p>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col">
            <a href="#">
            <div class="card radius-10 bg-gradient-ohhappiness">
                 <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white"></h5>
                        <div class="ms-auto">
                            <i class='bx bx-world fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">TOTAL BUSINESS LISTING</p>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>
@endsection
