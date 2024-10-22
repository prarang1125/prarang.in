@extends('the::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('the.name') !!}</p>
@endsection
