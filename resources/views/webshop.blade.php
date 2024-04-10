@extends('layouts.app')
@section('content')
    @include('components.secondary-banner', [
        'title' => 'Webshop',
        'image' => '/coverbluzz.jpeg',
    ])

    @include('components.products-list-categories', [
        'products' => $products,
    ])
@endsection
