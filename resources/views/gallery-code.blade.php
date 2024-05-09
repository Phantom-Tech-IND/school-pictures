@php
    use App\Constants\Constants;
@endphp

@include('components.image-selector')

@extends('layouts.app')

@section('content')
    @php
        $galleryName = 'myGallery';
        $title = request('code', 'Code Gallery');

    @endphp

    {{-- @include('components.secondary-banner', [
        'title' => $title,
        'image' => '/coverbluzz.jpeg',
    ]) --}}

    {{-- student, student --}}
    {{-- <div class="student-info-json">
        <h2>Student Information (JSON)</h2>
        <pre>{{ json_encode($products, JSON_PRETTY_PRINT) }}</pre>
    </div> --}}

    {{-- @php
        dd($products);
    @endphp --}}


    <form onsubmit="handleSubmit()">
        @include('components.product-overview', [
            'products' => $products,
            'selectedProductId' => $products[0]['id'],
            'galleryName' => $galleryName,
            'student' => $student,
        ])
    </form>

    <script>
        function handleSubmit() {
            event.preventDefault();

            const galleryContainer = document.getElementById('{{ $galleryName }}');

            const selectedProductId = galleryContainer.getAttribute('data-selected-product-id');
            const selectedImages = galleryContainer.getAttribute('data-selected-images') ?? [];

            let alertMessage = `Selected Product ID: ${selectedProductId}\nSelected Images: ${selectedImages}`;

            alert(alertMessage);
        }
    </script>
@endsection
