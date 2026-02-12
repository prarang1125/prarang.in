<x-layout.main.base :resetMainMinHeight="true">
    <style>
        .parent-portal {
            max-width: 100%;
            margin: auto
        }

        .city-portal-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            touch-action: manipulation;
        }
    </style>

    <section class=" parent-portal ">

        <img class="city-portal-image" src="{{ asset('images/city-portals.png') }}" alt="City Portals">

    </section>











</x-layout.main.base>
