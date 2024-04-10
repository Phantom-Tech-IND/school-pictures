@extends('layouts.app')
@section('content')
    @php
        $title = request('code', 'Code Gallery');
    @endphp
    @include('components.secondary-banner', [
        'title' => $title,
        'image' => '/coverbluzz.jpeg',
    ])
    @include('components.product-overview')
@endsection
