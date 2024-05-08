@extends('layouts.app')
@section('content')

    @include('components.products-list-categories', [
        'products' => $products,
    ])
@endsection
