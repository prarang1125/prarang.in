@extends('yellowpages::layout.auth')
@section('title', __('yp.register_congratulations'))
@section('content')
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
<style>
    /* Justify center */
    .justify-center {
        display: flex;
        justify-content: center;
        flex-wrap: nowrap;
        align-items: center;
    }

    /* Column 4/12 */
    .justify-center div .col-4 {
        background-color: #030a4e;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    /* Column 8/12 */
    .justify-center div .col-8 {
        background-color: #ffffff;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    /* Justify center */
    .justify-center {
        background-color: #eeebeb;
        /* transform:translatex(0px) translatey(0px); */
    }

    /* Side bar */
    .side-bar {
        min-height: 89mm;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    /* Italic Tag */
    .side-bar div i {
        color: #ffffff;
        font-size: 55px;
    }

    /* Profile img */
    .side-bar div .profile-img {
        width: 40mm;
        height: 40mm;
        /* transform: translatex(0px) translatey(0px); */
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        border-bottom-left-radius: 50%;
        border-bottom-right-radius: 50%;
        border-color: #ffffff;
        border-style: solid;
        border-width: 4px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Image */
    .side-bar div img {
        width: 100px;
        height: 100px;
        padding-left: 8px;
        padding-right: 8px;
        padding-top: 8px;
        padding-bottom: 8px;
        background-color: #ffffff;
        margin-top: 36px;
    }

    /* Textsata */
    .justify-center .mt-3 .textsata {
        display: flex;
        align-items: center;
    }

    /* Division */
    .mt-3 .textsata div {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: normal;
        /* transform: translatex(0px) translatey(0px); */
    }

    /* Italic Tag */
    .textsata div i {
        padding-right: 12px;
    }

    /* Font semibold */
    .textsata div .font-semibold {
        padding-left: 5px;
        font-size: 21px;
        font-weight: 500;
    }

    /* Font semibold */
    .textsata div .font-semibold {
        padding-top: -1px;
        position: relative;
        top: -4px;
    }

    /* Italic Tag */
    .textsata div i {
        font-size: 18px;
    }

    /* Text muted */
    .textsata div .text-muted {
        padding-bottom: -3px;
    }

    /* Justify center */
    .justify-center {
        flex-direction: column;
        /* transform: translatex(0px) translatey(0px); */
    }

    /* Button */
    .justify-center div a {
        margin-top: 15px;
        font-weight: 700;
    }

    /* Body */
    body {
        background-color: #eeebeb;
    }

    /* Static backUnknown */
    #staticBackdrop {
        background-color: rgba(255, 255, 255, 0);
    }

    /* Modal dialog bottom */
    #staticBackdrop .modal-dialog-bottom {
        position: absolute;
        bottom: -4px;
        padding-left: 12px;
        margin-bottom: 146px;
    }

    @media (max-width:576px) {

        /* Row */
        .justify-center div .rounded {
            width: 521px !important;
        }

        /* Font semibold */
        .mt-3 div .font-semibold {
            font-size: 18px !important;
        }

    }

    /* Modal header */
    .modal-dialog-bottom .modal-header {
        border-style: none;
    }

    /* Heading */
    .modal-body section h1 {
        text-align: center;
        font-weight: 700;
        color: #048a16;
        letter-spacing: 2.9px;
    }

    /* Paragraph */
    .modal-body section p {
        text-align: center;
        font-weight: 600;
        font-size: 19px;
        margin-bottom: 8px;
    }

    /* Section */
    .modal-dialog-bottom .modal-body section {
        text-align: center;
        /* transform:translatex(0px) translatey(0px); */
    }

    /* Btnx */
    .modal-body section .btnx {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btnx p .btn-success {
        margin-right: 24px;
    }

    /* Column 4/12 */
    .justify-center div .col-4 {
        background-color: #e6c72d !important;
    }

    /* Modal dialog bottom */
    #staticBackdrop .modal-dialog-bottom {
        margin-bottom: 65px !important;
    }

    @media (max-width:576px) {

        /* Modal dialog bottom */
        #staticBackdrop .modal-dialog-bottom {
            margin-bottom: 56px !important;
            /* transform:translatex(-3px) translatey(26px); */
        }

    }

    @media (max-width:576px) {

        /* Profile img */
        .side-bar div .profile-img {
            width: 79px !important;
            height: 79px !important;
        }

        /* Column 4/12 */
        .justify-center div .col-sm-4 {
            width: 109px;
        }

        /* Row */
        .justify-center div .rounded {
            padding-left: 56px;
            padding-right: 24px;
            min-height: 2px !important;
            height: auto !important;
        }

        /* Image */
        .side-bar div img {
            width: 62px !important;
            height: 45px !important;
        }

        /* Font semibold */
        .justify-center div .rounded .col-sm-8 .mt-3 .textsata div .font-semibold {
            font-size: 14px !important;
        }

    }

    /* Division */
    .min-h-screen .md\:flex-row {
        background-color: rgba(255, 255, 255, 0) !important;
        border-style: none !important;
    }

    /* Transform */
    .min-h-screen .md\:flex-row .transform {
        background-color: rgba(255, 255, 255, 0) !important;
    }

    /* Division */
    .space-y-2 .justify-center>div {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>
<div class="fixed inset-0 flex items-center justify-center min-h-screen bg-gray-100">
    <!-- Content Wrapper -->
    <div
        class="relative flex flex-col max-w-md p-4 mx-auto transition duration-300 ease-in-out bg-white border border-gray-300 rounded-lg shadow-md md:flex-row hover:border-indigo-500">

        <!-- Logo at the top center -->
        <div
            class="absolute top-0 p-2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-full shadow-md left-1/2">
            <img src="{{ asset('path-to-your-logo.png') }}" alt="Logo" class="w-12 h-12">
        </div>

        <!-- Information Section -->
        <div class="flex-1 space-y-2">
            <h5 class="mb-2 text-2xl font-bold text-gray-800">{{ ucfirst($vcard->name) }} {{ __('yp.page') }}</h5>

            <section class="flex items-center justify-center" style="height: 70vh;">
                <div class="">
                    <div class="rounded shadow row" style="max-height: 90mm; min-height: 90mm; width: 170mm;">
                        <div class="col-4 col-sm-4">
                            <div class="side-bar">
                                <div>
                                    <div class="profile-img"><i class="bx bxs-camera"></i></div>
                                </div>
                                <div>
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ route('vCard.view', ['slug' => $vcard->slug, 'city_arr' => $vcard->city_arr]) }}"
                                        alt="">
                                </div>

                            </div>
                        </div>
                        <div class="col-8 col-sm-8">
                            <div class="p-2 mt-3">
                                <div class="textsata">
                                    <div><i class="bx bxs-user"></i></div>
                                    <div>
                                        <span class="text-muted mtdclass">{{ __('formyp.name_label') }}:</span>
                                        <span class="font-semibold text-gray-800"> {{ ucfirst($vcard->name ?? '') }}
                                            {{ ucfirst($user->surname ?? '') }}</span>
                                    </div>
                                </div>
                                <div class="textsata">
                                    <div><i class="bx bxs-phone"></i></div>
                                    <div>
                                        <span class="text-muted mtdclass">{{ __('formyp.phone_number_label') }}:</span>
                                        <span class="font-semibold text-gray-800"> +91 {{ $vcard->phone }}</span>
                                    </div>
                                </div>
                                <div class="textsata">
                                    <div><i class="bx bxs-envelope"></i></div>
                                    <div>
                                        <span class="text-muted mtdclass">{{ __('yp.email') }}:</span>
                                        <span class="font-semibold text-gray-800">example@gmail.com</span>
                                    </div>
                                </div>
                                <div class="textsata">
                                    <div><i class="bx bxs-map"></i></div>
                                    <div>
                                        <span class="text-muted mtdclass">{{ __('formyp.address_label') }}:</span>
                                        <span class="font-semibold text-gray-800"> ?? ?? </span>
                                    </div>
                                </div>
                                <hr>
                                <p class="text-center"><small class="text-center">
                                        {{ url()->current() }}
                                    </small></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div>

                    <a class="btn btn-primary text-center"
                        href="{{ route('vCard.createCard', ['slug' => $vcard->slug, 'city_arr' => $vcard->city_arr]) }}">{{
                        __('yp.add_your_image_add') }}
                    </a>
                    <p class=""><small>{{ __('yp.compleate_process') }}</small></p>

                </div>
            </section>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-bottom">
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <h5 class="modal-title" id="staticBackdropLabel">अपने कार्ड की तस्वीर और पता जोड़े</h5>
                            --}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <section>
                                <h1>{{ __('yp.congratulations') }}</h1>
                                <p>{{ __('yp.webpage_open_msg') }}</p>
                                <br>
                                <a href="{{ url()->current() }}">{{ url()->current() }}</a>
                                <p> <small>{{ __('yp.remember_website_msg') }}</small>
                                </p>
                                <div class="btnx">
                                    <p>
                                        <a href="https://wa.me/?text={{ urlencode('*मेरा वेब पेज देखें*- %0a' . url()->current()) }}"
                                            class="mb-2 btn btn-success btn-block" target="_blank"
                                            rel="noopener noreferrer">
                                            <i class="fab fa-whatsapp"></i> {{ __('yp.share_whatsapp') }}
                                        </a>
                                    </p>
                                    <p>
                                        <a href="sms:?body={{ urlencode('मेरा वेब पेज देखें\n' . url()->current()) }}"
                                            class="mb-2 btn btn-primary btn-block" target="_blank"
                                            rel="noopener noreferrer">
                                            <i class="fas fa-sms"></i> {{ __('yp.share_sms') }}
                                        </a>
                                    </p>

                                </div>

                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{
                                __('yp.close_btn') }}</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));

                        // Function to get a cookie value
                        function getCookie(name) {
                            let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                            return match ? match[2] : null;
                        }

                        // Function to set a cookie
                        function setCookie(name, value, days) {
                            let expires = "";
                            if (days) {
                                let date = new Date();
                                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                                expires = "; expires=" + date.toUTCString();
                            }
                            document.cookie = name + "=" + value + "; path=/" + expires;
                        }

                        // Check if the modal has been shown before
                        if (!getCookie("modalShowns")) {
                            myModal.show(); // Show modal

                            // Set cookie so it doesn't show again
                            setCookie("modalShown", "true", 1); // Expires in 1 day
                        }

                        // Copy to clipboard functionality
                        var copyBtns = document.querySelectorAll('[id^="copyBtn"]');

                        copyBtns.forEach(function(copyBtn) {
                            copyBtn.addEventListener('click', function() {
                                var textToCopy = this.getAttribute('data-clipboard-text');
                                navigator.clipboard.writeText(textToCopy)
                                    .then(function() {
                                        console.log('Copied to clipboard: ' + textToCopy);
                                        {
                                            {
                                                --alert('Copied to clipboard: ' + textToCopy);
                                                --
                                            }
                                        }
                                    })
                                    .catch(function(err) {
                                        console.error('Failed to copy: ', err);
                                    });
                            });
                        });

                    });
            </script>


            @endsection

            <!-- Modal Structure -->
            <div class="modal" id="modal">
                <div class="modal__content">
                    <span class="modal__close" onclick="closeModal()">&times;</span>
                    <h1>🎉 {{ __('yp.congratulations') }}! 🎉</h1>
                    <p>{{ __('yp.webpage_open_msg') }}
                        <strong>WhatsApp</strong> {{ __('yp.or') }} <strong>SMS</strong> {{ __('yp.share_action_msg') }}
                    </p>
                </div>
            </div>