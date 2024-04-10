@extends('layouts.app')
@section('content')
    <div class="flex flex-wrap gap-4 p-2 lg:flex-nowrap">
        @include('components.offer', [
            'image' => '/coverbluzz.jpeg',
            'title' => 'Unsere Angebote',
            'link' => 'shop',
        ])
        @include('components.offer', [
            'image' => '/coverbluzz.jpeg',
            'title' => 'Unsere Angebote',
            'link' => 'shop',
        ])
    </div>
@endsection
