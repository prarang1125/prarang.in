<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Business vCard for {{ $user->name ?? 'User' }}">
    <title>{{ $user->name ?? 'User' }} {{ $user->surname ?? '' }} | प्रारंग {{ $user->city->name ?? '' }} पेज </title>
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $user->name ?? 'User' }} | प्रारंग {{ $user->city->name ?? '' }} पेज ">
    <meta property="og:description" content="Business vCard for {{ $user->name ?? 'User' }}.">
    <meta property="og:image"
        content="{{ !empty($user->profile) && Storage::exists($user->profile) ? Storage::url($user->profile) : asset('assets/images/yplogo.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Prarang">
    <meta property="og:locale" content="en_IN">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="Prarang">
    <meta name="twitter:title" content="{{ $user->name ?? 'User' }} | प्रारंग {{ $user->city->name ?? '' }} पेज ">
    <meta name="twitter:description" content="Business vCard for {{ $user->name ?? 'User' }}.">
    <meta name="twitter:image"
        content="{{ !empty($user->profile) && Storage::exists($user->profile) ? Storage::url($user->profile) : asset('assets/images/yplogo.jpg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

</head>
<style>
    /* Text */
    .max-w-xl .items-center .text-lg {
        font-weight: 700;
        font-size: 22px;
    }

    /* Linkx */
    .linkx {
        font-weight: 700;
        margin-top: 0px !important;
    }

    /* Paragraph */
    .justify-between div p {
        font-size: 13px;
        text-shadow: none !important;
    }



    .max-w-xl .flex-col h2.font-semibold {
        text-shadow: rgb(0, 0, 0) 0px 1px 1px, rgb(0, 0, 0) 0px -1px 1px, rgb(0, 0, 0) 1px 0px 1px, rgb(0, 0, 0) -1px 0px 1px;
    }

    /* Paragraph */
    .max-w-xl .flex-col p {
        text-shadow: rgb(0, 0, 0) 0px 1px 1px, rgb(0, 0, 0) 0px -1px 1px, rgb(0, 0, 0) 1px 0px 1px, rgb(0, 0, 0) -1px 0px 1px;
    }

    /* Social icones */
    .justify-between div .social-icones {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        margin-top: 6px;
    }

    /* Italic Tag */
    .justify-between a i {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-left: 5px;
        padding-right: 5px;
        padding-top: 5px;
        padding-bottom: 5px;
        border-style: solid;
        border-width: 1px;
        border-color: #412929;
        margin-right: 12px;
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        border-bottom-left-radius: 50%;
        border-bottom-right-radius: 50%;
    }

    /* Paragraph */
    .justify-between div p {
        margin-top: 7px !important;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #my-vcard,
        #my-vcard * {
            visibility: visible;
        }

    }

    .flex-wrap .w-full {
        padding-right: 2px;
        display: flex;
        justify-content: center;
        align-items: center;
        transform: translatex(0px) translatey(0px);
    }

    /* Italic Tag */
    .social-icon .transition i {
        height: 35px;
    }

    /* Items center */
    .justify-between .space-y-3 .items-center {
        flex-direction: row;
        margin-top: -1px;
    }

    /* Division */
    .space-y-3 .items-center div {
        display: flex;
        flex-direction: column;
    }

    /* Font semibold */
    .space-y-3 div .font-semibold {
        padding-top: -13px;
        position: relative;
        top: -1px;
    }

    /* Mtdclass */
    .space-y-3 div .mtdclass {
        font-size: 12px;
    }

    /* Font semibold */
    .space-y-3 div .font-semibold {
        top: -3px;
    }

    /* Heading */
    .justify-between div h3 {
        margin-top: 6px;
    }

    /* Italic Tag */
    .justify-between div .bx {
        font-size: 18px !important;
        font-weight: 600 !important;
        width: 25px;
        height: 25px;
        margin-right: 0px;
    }

    /* Youtube */
    .justify-center #my-vcard .justify-between div .flex .social-icon .transition .bxl-youtube {
        width: 25px !important;
        height: 25px !important;
    }

    /* Heading */
    .justify-between div h3 {
        font-size: 12px;
        font-weight: 700;
        color: #5c6065;
        font-style: normal;
    }

    /* Justify center */
    .justify-center .justify-center {
        padding-left: 0px;
        padding-right: 0px;
        padding-top: 0px;
        padding-bottom: 0px;
    }

    /* Image */
    .justify-center a img {
        font-size: 24px;
    }

    /* Image */
    .justify-center .justify-center .w-full a img {
        width: 340px !important;
    }

    /* Justify center */
    .justify-center {
        margin-top: 1px;
        padding-top: 0px;
    }

    /* Import Google Fonts */
    @import url("//fonts.googleapis.com/css2?family=TimesNewRoman:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

    /* Justify center */
    .justify-center {
        padding-top: 2px !important;
    }

    /* Heading */
    .justify-center h4 {
        font-weight: 700;
        font-family: 'TimesNewRoman', 'Times New Roman', Times, Baskerville, Georgia, serif;
        font-size: 16px;
    }


    @media (max-width:576px) {

        /* Image */
        .justify-center .justify-center .w-full a img {
            width: 164px !important;
        }

        /* Justify center */
        #my-vcard .justify-center {
            padding-bottom: 9px;
            transform: translatex(0px) translatey(0px);
            padding-top: 13px !important;
        }

        /* Justify center */
        .justify-center #my-vcard .justify-center {
            width: 100% !important;
        }

        /* Image */
        .justify-center #my-vcard .justify-center .overflow-hidden img {
            width: 115% !important;
        }

        /* Overflow hidden */
        #my-vcard .justify-center .overflow-hidden {
            width: 130px;
            height: 130px;
        }

    }

    /* Italic Tag */
    .bg-success small i {
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 3px;
        padding-bottom: 3px;
        font-size: 14px;
        border-top-left-radius: 23px;
        border-top-right-radius: 23px;
        border-bottom-left-radius: 23px;
        border-bottom-right-radius: 23px;
        background-color: #049933;
        color: #ffffff;
    }
</style>

<body class="bg-gray-100">
    <br>
    <section class="flex items-center justify-center">
        <section class="flex items-center justify-center p-4">
            <div class="w-full md:w-1/2 p-2">
                <a href="https://www.prarang.in" target="_blank">
                    <img src="{{ asset('assets/images/logo/yellow_logo.png') }}" alt="Prarang Logo" class="w-48">
                </a>

            </div>

        </section>
    </section>
    <div class="flex items-center justify-center">
        <h4>प्रारंग {{ $user->city->name }} पेज </h4>
    </div>

    @if ($vcard->is_active == 1)
        <section class="flex items-center justify-center p-4">

            <div id="my-vcard"
                class="flex flex-col md:flex-row w-full max-w-xl overflow-hidden bg-white border border-gray-200 rounded-lg shadow-lg">

                <!-- Profile & QR (Upar in Mobile, Left in Desktop) -->
                <div class="flex flex-col items-center justify-center w-full md:w-1/3 p-6 text-center bg-gradient-to-r from-indigo-500 to-purple-500"
                    style="background:{{ $vcard->color_code ?? 'black' }}">
                    <div class="w-24 h-24 md:w-32 md:h-32 overflow-hidden border-4 border-white rounded-full shadow-lg">
                        <img src="{{ $user->profile ? Storage::url($user->profile) : 'https://via.placeholder.com/150' }}"
                            alt="{{ $user->name ?? 'User' }}'s Profile" class="object-cover w-full h-full">
                    </div>
                    {{-- <h2 class="mt-3 text-lg md:text-xl font-semibold text-white">{{ ucfirst($user->name ?? 'User') }}
                        {{ ucfirst($user->surname ?? '') }}</h2>
                    <p class="text-sm text-white opacity-80">+91-{{ $user->phone ?? 'Category' }}</p> --}}

                    <!-- QR Code -->
                    <div class="w-20 h-20 md:w-24 md:h-24 p-2 mt-4 bg-gray-100 rounded-lg shadow-md">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ route('vCard.scan', ['slug' => $vcard->slug]) }}"
                            alt="QR Code" class="w-full h-full">
                    </div>
                </div>

                <!-- Contact & Social (Neeche in Mobile, Right in Desktop) -->
                <div class="flex flex-col justify-between w-full md:w-2/3 p-6">

                    <!-- Contact Details -->
                    <div class="space-y-3">
                        @if (!empty($user->name))
                            <div class="flex items-center space-x-3">
                                <div><i class="text-lg md:text-xl text-blue-500 bx bxs-user"></i></div>
                                <div>
                                    <span class="text-gray-500 mtdclass">नाम(Name)</span>

                                    <span class="text-gray-800 font-semibold"> {{ ucfirst($user->name ?? '') }}
                                        {{ ucfirst($user->surname ?? '') }}</span>
                                </div>
                            </div>
                        @endif

                        @if (!empty($user->email))
                            <div class="flex items-center space-x-3">
                                <div><i class="text-lg md:text-xl text-indigo-500 bx bxs-envelope"></i></div>
                                <div>
                                    <span class="text-gray-500 mtdclass"> ईमेल (Email):</span>
                                    <span class="text-gray-800 font-semibold">{{ $user->email }}</span>
                                </div>
                            </div>
                        @endif

                        @if (!empty($user->phone))
                            <div class="flex items-center space-x-3">
                                <div><i class="text-lg md:text-xl text-green-500 bx bxs-phone"></i></div>
                                <div>
                                    <span class="text-gray-500 mtdclass">फ़ोन (Phone):</span>
                                    <span class="text-gray-800 font-semibold">{{ $user->phone }}</span>
                                </div>
                            </div>
                        @endif

                        @if (!empty($user->address))
                            @php
                                $addressParts = array_filter([
                                    $user->address->house_number ?? '',
                                    $user->address->street ?? '',
                                    $user->address->area_name ?? '',
                                    $user->address->city_name ?? '',
                                ]);
                            @endphp

                            @if (!empty($addressParts))
                                <div class="flex items-center space-x-3">
                                    <div><i class="text-lg text-red-500 md:text-xl bx bxs-map"></i></div>
                                    <div>
                                        <span class="text-gray-500 mtdclass">पता (Address):</span>
                                        <span class="font-semibold text-gray-800">
                                            {{ isset($addressParts) && is_array($addressParts) ? implode(',', $addressParts) : '' }}
                                            @php
                                                $cityName = $user->address->city_name ?? '';
                                                $state = $user->address->state ?? '';
                                                $postalCode = $user->address->postal_code ?? '';
                                                $isHindi = preg_match('/[\p{Devanagari}]/u', $cityName);

                                                // Handle state formatting safely
                                                $stateParts = explode('(', $state);
                                                $formattedState =
                                                    count($stateParts) > 1
                                                        ? str_replace(')', '', $stateParts[1])
                                                        : $stateParts[0] ?? '';

                                            @endphp
                                            ,{{ $isHindi ? $stateParts[0] ?? '' : $formattedState }},
                                            {{ $isHindi ? 'भारत' : 'India' }},
                                            {{ $isHindi ? 'पिन' : 'Pin' }} - {{ $postalCode }}
                                        </span>

                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>



                    <!-- Social Media -->
                    <div>
                        @if (
                            !empty($vcard->dynamicFields) &&
                                collect($vcard->dynamicFields)->filter(fn($social) => !empty($social->data))->isNotEmpty())
                            <hr>
                            <h3 class="font-semibold text-gray-800 text-md">सोशल मीडिया</h3>
                            <div class="flex space-x-3 social-icones">
                                @foreach ($vcard->dynamicFields as $social)
                                    @php $socialData = $social->data; @endphp
                                    @if (!empty($socialData))
                                        <div class="social-icon">
                                            <a href="{{ filter_var($socialData, FILTER_VALIDATE_URL) ? $socialData : '#' }}"
                                                target="_blank" class="text-gray-700 transition hover:text-blue-500">
                                                <i class="{{ $social->icon ?? 'bx bx-link' }} text-2xl"></i>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        <hr class="mt-2">
                        <p class="mt-2 text-sm text-center linkx">
                            {{ route('vCard.view', ['city_arr' => $user->city->city_arr, 'slug' => $vcard->slug]) }}
                        </p>
                    </div>
                </div>
            </div>

        </section>
    @endif
    <div class="text-center">
        <p class="text-center p-1 bg-success"><small id="shareIt"><i class="bx bxs-share"></i></small></p>
        @if ($vcard->is_active != 1)
            <span class="text-center text-red-500"> {{ $user->name }} {{ $user->surname ?? '' }} का कार्ड स्वीकृति
                की
                प्रक्रिया में है।</span>
        @endif
    </div>


    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     let printArea = document.getElementById("my-vcard");

        //     html2canvas(printArea, {
        //         useCORS: true
        //     }).then(canvas => {
        //         canvas.toBlob(blob => {
        //             let formData = new FormData();
        //             formData.append("image", blob, "screenshot.png");
        //             printArea.appendChild(imgElement);
        //         }, "image/png");
        //     });
        // });


        if (navigator.share) {
            const shareIt=document.getElementById('shareIt').addEventListener('click',()=>{
                navigator.share({
                    title:document.title,
                    text:document.text,
                    url:window.location.href
            })
            .then(()=> console.log('Successfuly Share Prompt Opened!'))
            .catch((error)=>console.error(error))
            });
        }





        function shareVCard() {
            const shareData = {
                title: "{{ $user->name ?? 'VCard' }}",
                text: " ",
                url: "{{ route('vCard.view', ['city_arr' => $city_arr, 'slug' => $vcard->slug]) }}"
            };

            if (navigator.share) {
                navigator.share(shareData)
                    .then(() => console.log("Shared successfully!"))
                    .catch(error => console.error("Sharing failed:", error));
            } else {
                alert("Sharing is not supported on this device.");
            }
        }
    </script>

</body>

</html>
