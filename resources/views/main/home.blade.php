<x-layout.main.base>
    <style>
        /* Image */
        .container img {
            bottom: auto !important;

        }

        /* Image */
        .container:nth-child(2)>img:nth-child(1) {
            height: 170px;

        }

        @media (min-width:768px) {

            /* Image */
            .container img {
                top: 181px;
            }

        }
    </style>
    <img class="bs5-semiotics" src="{{ asset('assets/upmana.svg') }}" onclick="semiotic()" class="anime-svg"
        alt="India's 1st City Semiotics.">
    <section class="mt-5 bs5-shapes">
        <div class="d-none d-md-none d-lg-block d-xl-block">
            <img class="img-fluid" src="https://prarang.in/home-assets/image/home.png" alt="">
        </div>
        <div class="d-md-block d-lg-none d-xl-none">
            <img class="img-fluid" src="https://prarang.in/home-assets/image/homem.png" alt="">
        </div>
    </section>
</x-layout.main.base>
