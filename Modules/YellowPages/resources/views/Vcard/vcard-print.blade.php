<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}_my_vcard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        .a4-page {
            width: 210mm;
            height: 297mm;
            background: #f8f9fa;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            padding: 20px;
            box-sizing: border-box;
        }

        .card-x {
            width: 100%;
            height: 54mm;
            /* border: 1px solid #c6bdbd; */
            /* background: white; */
            /* padding: 10px; */
            /* display: flex; */
            /* align-items: center; */
            /* justify-content: space-between; */
            /* border-radius: 8px; */
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-img {
            width: 24mm;
            height: 24mm;
            border-radius: 50%;
            border: 2px solid #000;
        }

        .qr-code {
            width: 50px;
            height: 50px;
        }

        .name-sec {
            max-height: 10mm !important;
        }




        .a4-page .card-x {
            display: grid;
            grid-template-columns: 35% 65% !important;
        }

        /* Column 4/12 */
        .a4-page .card-x .card-col-4 {
            /* min-height:54mm; */
            max-height: 54mm;
            background-color: #3f2020;
        }

        /* Column 8/12 */
        .a4-page .card-x .card-col-8 {
            padding-left: 2mm;
            padding-top: 2mm;

        }

        /* Column 4/12 */
        .a4-page .card-x .card-col-4 {
            /* height:204px; */
            min-height: 60mm;
            max-height: 60mm;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Name sec */
        .a4-page .card-x .name-sec {
            line-height: 1em;
            font-weight: 500;
            text-transform: capitalize;
            text-shadow: rgb(0, 0, 0) 0px 1px 1px, rgb(0, 0, 0) 0px -1px 1px, rgb(0, 0, 0) 1px 0px 1px, rgb(0, 0, 0) -1px 0px 1px;
            color: #ffffff;
            letter-spacing: -0.1px;
            word-spacing: -1.9px;
            text-align: center;
        }

        /* Heading */
        .a4-page .name-sec h6 {
            margin-bottom: 0px;
        }

        /* Paragraph */
        .a4-page .name-sec p {
            font-size: 12px;
            font-weight: 400;
        }

        /* Division */
        .a4-page .card-x .card-col-4 div {
            margin-bottom: 5px;
        }


        /* Maing */
        .a4-page .topx .maing {
            display: flex;
            align-items: center;
        }

        /* Valuex */
        .topx .maing .valuex {
            display: flex;
            flex-direction: column;
            padding-left: 8px;
            line-height: 0.9em;
        }

        /* Text muted */
        .maing .valuex .text-muted {
            font-size: 3mm;
        }

        /* Valued */
        .maing .valuex .valued {
            font-size: 4mm;
            font-weight: 600;
        }


        /* Maing */
        .a4-page .topx .maing {
            margin-bottom: 6px;
        }

        /* Maing */
        .a4-page .midx .maing {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding-top: 4px;
        }

        /* Valuex */
        .midx .maing .valuex {
            display: flex;
            flex-direction: column;
            padding-left: 8px;
        }

        /* Valued */
        .midx .maing .valued {
            font-size: 12px;
        }


        /* Bottomx */
        .a4-page .card-x .bottomx {
            font-size: 12px;
            padding-top: 6px;
        }

        /* Maing */
        .a4-page .midx .maing {
            min-height: 46px;
        }

        /* Valued */
        .topx .maing .valued {
            font-size: 14px;
        }

        /* Maing */
        .a4-page .topx .maing {
            margin-bottom: 4px;
        }

        /* Maing */
        .a4-page .midx .maing {
            padding-top: 0px;
        }

        /* Page */
        .a4-page {
            padding-right: 0px;
            padding-left: 0px;
        }

        /* Column 8/12 */
        .a4-page .card-x .card-col-8 {
            padding-right: 7px;
        }

        /* Bottomx */
        .a4-page .card-x .bottomx {
            padding-bottom: 3px;
        }

        /* Link */
        .a4-page .card-x a {
            position: relative;
            top: -1px;
        }


        /* Link */
        .a4-page .card-x a {
            text-decoration: none;
        }



        /* Bottomx */
        .a4-page .card-x .bottomx {
            border-top-style: solid;
            padding-top: 0px;
            margin-top: 3px;
            position: relative;
            top: 2px;
        }

        /* Bottomx */
        .a4-page .card-x .card-col-8 .bottomx {
            border-top-width: 0.2px !important;
        }

        /* Column 8/12 */
        .a4-page .card-x .card-col-8 {
            padding-top: 10px;
            height: 200px;
        }

        /* Card */
        .a4-page .card-x {
            height: 201px;
        }

        /* Topx */
        .a4-page .card-x .topx {
            padding-left: 4px;
        }

        /* Profile img */
        .a4-page div .profile-img {
            border-color: #ffffff;
        }

        /* Link */
        .a4-page .card-x a {
            color: #000000;
        }

        /* Bottomx */
        .a4-page .card-x .bottomx {
            text-align: center;
        }

        /* Division */
        .a4-page .card-x .card-col-4 div {
            width: 133px;
            height: 103px;
            display: inline-block;
            transform: translatex(0px) translatey(0px) !important;
        }

        /* Profile img */
        .a4-page div .profile-img {
            margin-right: 0px;
            width: 120px;
            height: 120px;
            margin-left: 6px;
        }

        /* Light */
        .a4-page .card-x .bg-light {
            width: 75px !important;
            height: 73px !important;
            margin-top: 26px !important;
            display: flex !important;
            transform: translatex(0px) translatey(0px) !important;
            justify-content: center;
            align-items: center;
        }

        /* Image */
        .a4-page .card-x .card-col-4 .bg-light img {
            width: 60px !important;
            height: 60px;
        }

        /* Column 4/12 */
        .a4-page .card-x .card-col-4 {
            transform: translatex(0px) translatey(0px);
        }


        @media print {
            body * {
                visibility: hidden;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }


            .a4-page,
            .a4-page * {
                visibility: visible;
            }

            .a4-page {
                position: absolute;
                left: 0;
                top: 0;
            }

            .a4-page .card-x .card-col-4 {
                /* min-height:54mm; */
                max-height: 54mm;

            }
        }

        /* Column 8/12 */
        .a4-page .card-x .card-col-8 {
            padding-top: 6px;
            transform: translatex(0px) translatey(0px);
            display: inline-block;
        }

        /* Column 8/12 */
        .a4-page .card-x .card-col-8 {
            min-height: 227px;
            transform: translatex(0px) translatey(0px);
            background-color: #ffffff;
            padding-top: 18px;
            display: inline-block;
        }

        /* Text muted */
        .a4-page .midx .text-muted {
            margin-top: 6px;
        }
    </style>
</head>

<body>
    <a href="{{ url()->previous() }}" class="m-3 btn btn-primary"><i class="bx bx-arrow-back"></i></a>
    <button onclick="window.print()" class="m-3 btn btn-primary">Print</button>

    <div class="a4-page">
        @for ($i = 0; $i < 8; $i++)
            <div class="card-x">
                <div class="card-col-4" style="background: {{$vcard->color_code}}">
                    <div><img class="profile-img"
                            src="{{ $user->profile ? Storage::url($user->profile) : 'https://via.placeholder.com/150' }}"
                            alt=""></div>

                    <div class="p-2 mt-2 rounded bg-light">
                        <img class="qr-code"
                            src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ route('vCard.scan', ['slug' => $vcard->slug]) }}"
                            alt="">
                    </div>
                </div>
                <div class="card-col-8">
                    <div class="topx">
                        <div class="maing">
                            <div class="iconex"> <i class="bx bxs-user"></i></div>
                            <div class="valuex">
                                <span class="slugs text-muted">Name:</span>
                                <span class="valued">{{ ucfirst($user->name ?? '') }}
                                    {{ ucfirst($user->surname ?? '') }}</span>
                            </div>
                        </div>
                        <div class="maing">
                            <div class="iconex"> <i class="bx bxs-phone"></i></div>
                            <div class="valuex">
                                <span class="slugs text-muted">Mobile:</span>
                                <span class="valued">+91 {{ $user->phone }}</span>
                            </div>
                        </div>
                        @if (!empty($user->email))
                            <div class="maing">
                                <div class="iconex"> <i class="bx bxs-envelope"></i></div>
                                <div class="valuex">
                                    <span class="slugs text-muted">Email:</span>
                                    <span class="valued">{{ $user->email }}</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if (!empty($user->address))
                        <div class="midx">
                            <div class="maing">
                                <div class="iconex"><i class="bx bxs-map"></i></div>
                                <div class="valuex">
                                    <span class="slugs text-muted">Address:</span>
                                    @php
                                        $addressParts = array_filter([
                                            $user->address->house_number ?? '',
                                            $user->address->street ?? '',
                                            $user->address->area_name ?? '',
                                            $user->address->city_name ?? '',
                                            $user->address->state ?? '',
                                            $user->address->country ?? '',
                                            $user->address->postal_code ?? '',
                                        ]);
                                    @endphp
                                    @if (!empty($addressParts))
                                        <span class="valued">{{ implode(', ', $addressParts) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="bottomx">
                        <a
                            href="">{{ route('vCard.view', ['city_arr' => $user->city->city_arr, 'slug' => $vcard->slug]) }}</a>
                    </div>
                </div>
            </div>
        @endfor

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.print();
        });
    </script>

</body>

</html>
