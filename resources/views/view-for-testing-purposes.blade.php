@php
    use App\Constants\Constants;
@endphp
<head>
        @vite(['resources/js/image-selection.ts']) 
</head>
@extends('layouts.app')

@section('content')
<div id="gallery1" data-product-images="{{ json_encode($productImages) }}"><h1>her are some items</h1></div>
    <x-image-selector :images="$images" :galleryId="'gallery1'" />
    <x-image-display :galleryId="'gallery1'" />
@endsection
