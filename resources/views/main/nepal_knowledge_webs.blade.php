@php
$metaData = [
'nav-heading' => view('components.nav-heading', [
'text' => 'Nepal Knowledge Webs',
'leftImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
'rightImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
]),
'nav-sub-heading' => '',
];

$title = 'Nepal';
$code = 'nepal';
@endphp

<style>
    .modern-card {
        border-radius: 20px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: 0.3s;
        height: 100%;
    }

    .modern-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card-img-wrapper img {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .card-links a {
        display: block;
        padding: 10px;
        margin: 6px 0;
        border-radius: 10px;
        text-align: center;
        font-weight: 500;
        text-decoration: none;
        transition: 0.3s;
    }

    .blue-btn {
        background: #2361EB;
        color: #fff;
    }

    .yellow-btn {
        background:#FDDF02 ;
        color: #000;
    }

    .red-btn {
        background: #F00202;
        color: #fff;
    }

    .card-links a:hover {
        transform: scale(1.05);
    }

    /* hide image trigger */
    .nepal-webs .analytics-content {
        display: none !important;
    }

    .noanimation a {
        transition: none !important;
        pointer-events: none;
    }

    .noanime{
        transition: none !important;
        pointer-events: none;
    }
</style>

<x-layout.main.base :metaData="$metaData">

    <section class="bg-gray-50 py-4 nepal-webs">

        <div class="container">
            <div class="row g-4 justify-content-center">

                <h2 class="text-center text-primary">WORK IN PROGRESS</h2>


                <div class="col-md-6 col-lg-4">
                    <div class="modern-card">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('assets/images/webs1.png') }}">
                        </div>

                        <div class="p-3 card-links">
                            <a href="https://g2c.prarang.in/nepal?data=1" target="_blank" class="blue-btn">
                                MULTILATERAL DATA
                            </a>


                            <a href="javascript:void(0);" class="blue-btn" data-bs-toggle="modal"
                                data-bs-target="#cityAnalyticsModal{{ $code }}">
                                NATIONAL DATA
                            </a>

                            <a href="javascript:void(0);" class="blue-btn noanime">NEPAL LOCALISATION</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="modern-card">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('assets/images/webs2.png') }}">
                        </div>

                        <div class="p-3 card-links">
                            <a href="https://g2c.prarang.in/ai/nepal" target="_blank" class="yellow-btn">COUNTRY AI REPORT</a>

                            <a href="https://www.prarang.in/india-nepal/all-posts" target="_blank" class="yellow-btn">BILATERAL - INDIA</a>
                            <a href="javascript:void(0);" class="yellow-btn noanime">NEPAL LOCALISATION</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="modern-card">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('assets/images/webs3.png') }}">
                        </div>

                        <div class="p-3 card-links noanimation">
                            <a href="javascript:void(0);" class="red-btn">COUNTRY IMAGES</a>
                            <a href="javascript:void(0);" class="red-btn">CULTURE / NATURE IMAGES</a>
                            <a href="javascript:void(0);" class="red-btn">NEPAL LOCALISATION</a>
                        </div>
                    </div>
                </div>

            </div>


            <div class="widget__content text-center mt-3">
                <x-portal.cityanaytics :title="$title" :code="$code" />
            </div>

        </div>
    </section>

    <div class="modal fade" id="nepalRegionsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-top">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Nepal AI Reports</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                @php
                $czRegions = [
                    ['name' => 'Prague and Central Bohemia', 'url' => 'https://g2c.prarang.in/czech-republic/prague-and-central-bohemia'],
                    ['name' => 'South Bohemia', 'url' => 'https://g2c.prarang.in/czech-republic/south-bohemia'],
                    ['name' => 'Pilsen', 'url' => 'https://g2c.prarang.in/czech-republic/pilsen'],
                    ['name' => 'South Moravia', 'url' => 'https://g2c.prarang.in/czech-republic/south-moravia'],
                    ['name' => 'Vysocina', 'url' => 'https://g2c.prarang.in/czech-republic/vysocina'],
                    ['name' => 'Moravia-Silesia', 'url' => 'https://g2c.prarang.in/czech-republic/moravia--silesia'],
                    ['name' => 'Usti nad Labem', 'url' => 'https://g2c.prarang.in/czech-republic/usti-and-labem'],
                    ['name' => 'Olomouc', 'url' => 'https://g2c.prarang.in/czech-republic/olomouc'],
                    ['name' => 'Hradec Kralove', 'url' => 'https://g2c.prarang.in/czech-republic/hradec-kralove'],
                    ['name' => 'Pardubice', 'url' => 'https://g2c.prarang.in/czech-republic/pardubice'],
                    ['name' => 'Zlin', 'url' => 'https://g2c.prarang.in/czech-republic/zlin'],
                    ['name' => 'Karlovy Vary', 'url' => 'https://g2c.prarang.in/czech-republic/karlovy-vary'],
                    ['name' => 'Liberec', 'url' => 'https://g2c.prarang.in/czech-republic/liberec'],
                    ['name' => 'Czech Republic', 'url' => 'https://g2c.prarang.in/Czech Republic']
                ];
            @endphp


                <div class="modal-body text-center">

                    <p class="mb-3 text-muted">
                        The Czech Republic is divided into 14 regions, including Prague City, which falls within Central Bohemia.
                    </p>

                    <div class="row g-2">


                        @foreach($czRegions as $region)
                            <div class="col-6 col-sm-4">
                                <a target="_blank" href="{{ $region['url'] }}" class="btn btn-primary w-100">{{ $region['name'] }}</a>
                            </div>
                        @endforeach
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</x-layout.main.base>
