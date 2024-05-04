@php
    use App\Constants\Constants;
@endphp

@include('components.image-selector')

@extends('layouts.app')

@section('content')
    @php
        $galleryName = 'myGallery';
        $title = request('code', 'Code Gallery');

        $images = [
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7321-6607.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7219-8137-9257.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7157-8475-4031.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7321-7038.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7333-8904-7425.jpg',
        ];
    @endphp

    @include('components.secondary-banner', [
        'title' => $title,
        'image' => '/coverbluzz.jpeg',
    ])

    {{-- student, student --}}
    <div class="student-info-json">
        <h2>Student Information (JSON)</h2>
        <pre>{{ json_encode($products, JSON_PRETTY_PRINT) }}</pre>
    </div>

    
    <form onsubmit="handleSubmit()">
        @include('components.product-overview', [
            'products' => $products,
            'selectedProductId' => $products[0]['id'],
            'galleryName' => $galleryName,
             compact('images'),
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
