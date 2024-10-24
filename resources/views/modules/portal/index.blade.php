@extends('portal::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('portal.name') !!}</p>
@endsection
