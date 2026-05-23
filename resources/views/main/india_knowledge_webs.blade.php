@php
$metaData = [
    'nav-heading' => 'INDIA KNOWLEDGE WEBS',
    'nav-sub-heading' => '',
];

$language = [
    ['name'=>'Tamil','slug'=>'tamil'],
    ['name'=>'English','slug'=>'english'],
    ['name'=>'Bengali','slug'=>'bengali'],
    ['name'=>'Marathi','slug'=>'marathi'],
    ['name'=>'Telugu','slug'=>'telugu'],
    ['name'=>'Gujarati','slug'=>'gujarati'],
    ['name'=>'Kannada','slug'=>'kannada'],
    ['name'=>'Odia','slug'=>'odisha'],
    ['name'=>'Malayalam','slug'=>'malayalam'],
    ['name'=>'Punjabi','slug'=>'punjabi'],
    ['name'=>'Assamese','slug'=>'assamese'],
    ['name'=>'Urdu','slug'=>'urdu'],
];
@endphp

<style>
    .top-card-section {
        padding: 8px 0;
    }

    /* Optimized Card */
    .custom-card {
        position: relative;
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        background: #ffffff;
        overflow: hidden;
        transition: transform .25s ease, box-shadow .25s ease;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
        height: 100%;
    }

    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.12);
    }

    /* Icon */
    .icon-circle {
        width: 90px;
        height: 90px;
        margin: 0 auto 18px;
        /* border-radius: 50%; */
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform .2s ease;
    }

    .custom-card:hover .icon-circle {
        transform: scale(1.05);
    }

    .icon-circle img {
        width: 90px;
        height: 90px;
        object-fit: contain;
    }

    .card-title-small {
        font-size: 20px;
        letter-spacing: 1px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .card-number {
        font-size: 16px;
        font-weight: 500;
        color: #222;
    }

    /* Dropdown */
    .dropdown-icon {
        font-size: 20px;
        display: inline-flex;
        align-items: center;
        transition: transform .25s ease;
    }

    .dropdown-icon.rotate {
        transform: rotate(180deg);
    }

    .dropdownss {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        left: 45;
        top: 29px;
        background-color: #fff;
        min-width: 180px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 18px rgba(0,0,0,0.12);
        z-index: 99;
    }

    .dropdown-content a {
        color: #222;
        padding: 12px 14px;
        text-decoration: none;
        display: block;
        transition: background .2s ease;
    }

    .dropdown-content a:hover {
        background-color: #f3f4f6;
    }

    .show {
        display: block;
    }

    .analytics-card {
        /* padding: 24px; */
        border-radius: 18px;
        /* background: #3f69bd; */
        text-align: center;
        color: #0d6efd;
        /* box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        transition: transform .2s ease, box-shadow .2s ease; */
        font-size: 22px;
        text-decoration: underline
    }

    /* .analytics-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    } */

    .blue{
        background: #0d6efd;
    }

    .yellow{
        background: yellow;
    }

    .red{
        background: rgb(220 38 38);
    }
</style>

<x-layout.main.base :metaData="$metaData">

<section class="py-8 bg-gray-50" x-data="{ showModal: false }">

    <!-- Heading -->
    <div class="text-center mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
            Enter India Knowledge Webs
        </h1>
    </div>

    <!-- TOP CARDS -->
    <div class="container top-card-section">
        <div class="row justify-content-center g-4">

            <!-- Villages -->
            <div class="col-md-6 col-lg-4">
                <a href="{{ url('webs/filter/villages') }}" class="text-decoration-none">
                    <div class="custom-card">

                        <div class="flex items-center justify-center gap-5 mb-3">
                            <div class="w-8 h-8 rounded-full blue"></div>
                            <div class="w-8 h-8 rounded-full yellow"></div>
                            <div class="w-8 h-8 rounded-full red"></div>
                        </div>

                        <div class="icon-circle" >
                            <img loading="lazy"
                                 src="{{ asset('assets/images/Villages1.png') }}"
                                 alt="Villages">
                        </div>

                        <div class="card-title-small text-success">
                            Villages
                        </div>

                        <div class="card-number">
                            592,765
                        </div>

                    </div>
                </a>
            </div>

            <!-- Cities -->
            <div class="col-md-6 col-lg-4">
                <a href="{{ url('webs/filter/cities') }}" class="text-decoration-none">
                    <div class="custom-card">

                        <div class="flex items-center justify-center gap-5 mb-3">
                            <div class="w-8 h-8 rounded-full blue"></div>
                            <div class="w-8 h-8 rounded-full yellow"></div>
                            <div class="w-8 h-8 rounded-full red"></div>
                        </div>

                        <div class="icon-circle" >
                            <img loading="lazy"
                                 src="{{ asset('assets/images/town1.png') }}"
                                 alt="Cities">
                        </div>

                        <div class="card-title-small text-primary">
                            Cities
                        </div>

                        <div class="card-number">
                            6,331
                        </div>

                    </div>
                </a>
            </div>

            <!-- World -->
            <div class="col-md-6 col-lg-4">
                <a href="{{ url('/country-webs-filter') }}" class="text-decoration-none">
                    <div class="custom-card">
                        <div class="flex items-center justify-center gap-5 mb-3">
                            <div class="w-8 h-8 rounded-full blue"></div>
                            <div class="w-8 h-8 rounded-full yellow"></div>
                            <div class="w-8 h-8 rounded-full red"></div>
                        </div>

                        <div class="icon-circle" >
                            <img loading="lazy"
                                 src="{{ asset('assets/images/World.png') }}"
                                 alt="World Bilateral" style="border: 1px solid orangered; border-radius: 50%;">
                        </div>

                        <div class="card-title-small text-warning">
                            World-Bilateral
                        </div>

                        <div class="card-number">
                            195
                        </div>

                    </div>
                </a>
            </div>

        </div>
    </div>

    <!-- LANGUAGE BUTTONS -->
    <div class="flex justify-center mt-4 px-3">
    <div class="w-full max-w-6xl bg-white rounded-2xl shadow-lg p-4 flex flex-col md:flex-row gap-4">

        <!-- LEFT: Hindi (Highlighted) -->
        <a href="https://humsabek.in/" target="_blank"
            class="flex flex-col justify-center items-center md:w-1/4 bg-yellow-400 hover:bg-yellow-500 rounded-xl px-4 py-3 shadow-md transition hover:-translate-y-1 text-decoration-none">

            <span class="font-bold text-gray-900">Hindi Webs</span>

            <!-- LIVE badge -->
            <span class="mt-1 text-[10px] bg-green-600 text-white px-2 py-[2px] rounded-full font-semibold">
                LIVE
            </span>
        </a>

        <!-- RIGHT: Other Languages -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 w-full">

            @foreach($language as $value)
            <a href="javascript:void(0)" @click="showModal = true"
                class="flex items-center justify-center text-center text-decoration-none py-2 px-3 rounded-lg font-semibold text-sm text-gray-800  hover:bg-yellow-400 shadow-sm transition hover:-translate-y-0.5">
                {{ $value['name'] }} Webs
            </a>
            @endforeach

        </div>

    </div>
</div>

    <!-- Modal -->
    <div x-show="showModal"
         x-transition
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
         @click.self="showModal = false">

        <div class="bg-white rounded-2xl p-6 w-80 text-center shadow-xl">

            <h3 class="text-xl font-bold mb-2">
                Coming Soon
            </h3>

            <p class="text-gray-500 mb-4">
                India Stack Language Localization
            </p>

            <button @click="showModal = false"
                    class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Close
            </button>

        </div>
    </div>

    <!-- Analytics Heading -->
    <div class="text-center mb-6 mt-12">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
            Understanding India: Analytics
        </h1>
    </div>

    <!-- ANALYTICS -->
    <div class="flex justify-center px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 w-full max-w-5xl">

            <a href="{{ url('/india-rural') }}" class="analytics-card ">

                    Rural

            </a>

            <a href="{{ url('/town-webs') }}" class="analytics-card ">

                    Urban

            </a>

            <a href="{{ url('/city-webs') }}" class="analytics-card ">

                    Districts

            </a>

            <div class="analytics-card">

                <div class="dropdownss">

                    <button type="button" class="city-tab dropbtn whitespace-nowrap analytics-card">

                        Language Distribution

                        <span id="dropdownIcon" class="dropdown-icon">
                            <i class="bi bi-chevron-down"></i>
                        </span>

                    </button>

                    <div id="myDropdown" class="dropdown-content">

                        <a href="https://www.prarang.in/yp/india" target="_blank">
                            Cities
                        </a>

                        <a href="https://www.prarang.in/yp/czech-republic" target="_blank">
                            Villages
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const dropbtn = document.querySelector('.dropbtn');
        const dropdownMenu = document.getElementById('myDropdown');
        const dropdownIcon = document.getElementById('dropdownIcon');

        if (dropbtn) {

            dropbtn.addEventListener('click', function (e) {

                e.preventDefault();

                dropdownMenu.classList.toggle('show');
                dropdownIcon.classList.toggle('rotate');

            });

            window.addEventListener('click', function (event) {

                if (!event.target.closest('.dropdownss')) {

                    dropdownMenu.classList.remove('show');
                    dropdownIcon.classList.remove('rotate');

                }

            });

        }

    });
</script>

</x-layout.main.base>
