@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Manage VCard')
@section('content')
    <style>
        /* Color value */
#color_value{
 width:100px !important;
}
/* Span Tag */
.card .d-inline-block span{
 width:30px;
 height:30px;
}

    </style>
    <div class="container my-5">
        @livewire('yellow-pages.elements.edit-vcard')
    </div>

@endsection
