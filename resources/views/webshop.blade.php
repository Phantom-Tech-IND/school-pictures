@extends('layouts.app')
@section('content')
    @include('components.secondary-banner', [
        'title' => 'Webshop',
        'image' => '/coverbluzz.jpeg',
    ])
@endsection
