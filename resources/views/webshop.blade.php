@extends('layouts.app')
@section('content')
    @include('components.secondary-banner', [
        'title' => 'Shop',
        'image' => '/coverbluzz.jpeg',
    ])

    @include('components.products-list-categories', [
        'products' => $products,
    ])
@endsection
