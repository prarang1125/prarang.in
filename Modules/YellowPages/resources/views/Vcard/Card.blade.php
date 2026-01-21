@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Manage VCard')
@section('content')
    <style>
        /* Color value */
        #color_value {
            width: 100px !important;
        }

        /* Span Tag */
        .card .d-inline-block span {
            width: 30px;
            height: 30px;
        }

        /* Card body */
        .page-wrapper .card>.card-body {
            padding-top: 4px;
            margin-top: 6px;
        }

        /* Card body */
        .card .card-body .card-body {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        /* Heading */
        .card .card-body h5 {
            margin-bottom: 0px !important;
            color: #020202;
            font-weight: 700;
            text-align: center;
        }

        /* Text center */
        .card form .text-center {
            padding-bottom: 10px !important;
            padding-top: 11px !important;
            border-bottom-left-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
            border-top-left-radius: 8px !important;
            border-top-right-radius: 8px !important;
        }

        /* Form Division */
        .card .card-body form {
            transform: translatex(0px) translatey(0px);
        }

        /* Column 6/12 */
        .card form .mb-3 {
            margin-bottom: 4px !important;
        }

        /* Label */
        .card .mb-3 label {
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 0px;
        }

        /* Input */
        .card .mb-3 input[type=text] {
            padding-left: 6px;
            padding-right: 6px;
            padding-top: 3px;
            padding-bottom: 3px;
        }

        /* Button */
        .card form .btn-warning {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        /* Card body */
        .page-wrapper .card>.card-body {
            box-shadow: 0px 0px 46px -14px #262b2b;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* Card */
        .page-wrapper .card {
            box-shadow: 0px 4.8px 0px -50px rgba(0, 0, 0, 0.12);
            background-color: rgba(255, 255, 255, 0);
        }


        .card-body .position-absolute label {
            text-shadow: rgb(255, 255, 255) 0px 1px 1px, rgb(255, 255, 255) 0px -1px 1px, rgb(255, 255, 255) 1px 0px 1px, rgb(255, 255, 255) -1px 0px 1px;
        }

        /* Dropdown item */
        .card-body li .dropdown-item {
            cursor: pointer;
        }

        /* Dropdown item (hover) */
        .card-body li .dropdown-item:hover {
            font-weight: 500;
            background-color: #f3e7e7;
        }

        /* Link */
        .card-body .d-flex a {
            transform: translatex(0px) translatey(12px);
        }

        /* Italic Tag */
        .card-body .text-danger .bx {
            font-size: 17px;
        }

        /* Italic Tag */
        .card-body .text-danger .bx {
            cursor: progress;
        }

        /* Italic Tag */
        .card-body .text-danger .bx {
            position: relative;
            top: -2px;
            left: -1px;
        }

        /* Button */
        .card-body form .btn-secondary {
            font-size: 13px;
            margin-top: 4px;
        }


        /* Column 6/12 */
        .card-body form .col-md-6 {
            margin-bottom: 4px;
        }

        /* Form label */
        .container form .row .col-md-6 .form-label {
            margin-bottom: 0px;
            font-weight: 600;
        }

        /* Label */
        .container form .row .col-md-12 label {
            margin-bottom: 0px;
        }

        /* Label */
        .container form .row .col-md-12 label {
            font-weight: 600;
        }
    </style>
    <div class="container my-5">
        @livewire('yellow-pages.elements.edit-vcard')
    </div>

@endsection
