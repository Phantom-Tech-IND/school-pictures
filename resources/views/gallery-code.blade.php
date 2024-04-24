@php
    use App\Constants\Constants;
@endphp

@include('components.image-selector')

@extends('layouts.app')

@section('content')
    @php
        $galleryName = 'myGallery';
        $title = request('code', 'Code Gallery');
        $products = [
            ['id' => '1', 'min' => 1, 'max' => 3, 'image' => 'https://i.stack.imgur.com/Qm0J3.png'],
            ['id' => '2', 'min' => 1, 'max' => 4, 'image' => 'https://d33wubrfki0l68.cloudfront.net/ffc8680b2f5adb262369c4d103e05c08fa978651/3468e/images/2021-01/2021-01-05-tailwind-colors.jpg'],
            ['id' => '3', 'min' => 1, 'max' => 5, 'image' => 'https://opengraph.githubassets.com/a591251d899d10c5c953d04d12e2970da3d98da599bad7bc11c412e498fc2857/enjidev/tailwindcss-accent'],
            ['id' => '4', 'min' => 1, 'max' => 6, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4jKeIAHo1GzikU9ZrNKUflbkRiAA8F3wZcxVkht_pjA&s'],
            ['id' => '5', 'min' => 1, 'max' => 3, 'image' => 'https://assets.newatlas.com/dims4/default/06c4449/2147483647/strip/true/crop/800x533+0+33/resize/1200x800!/quality/90/?url=http%3A%2F%2Fnewatlas-brightspot.s3.amazonaws.com%2Farchive%2F2016-year-in-ai-art-2.jpg'],
            ['id' => '6', 'min' => 1, 'max' => 2, 'image' => 'https://i.stack.imgur.com/Qm0J3.png'],
            ['id' => '7', 'min' => 1, 'max' => 4, 'image' => 'https://d33wubrfki0l68.cloudfront.net/ffc8680b2f5adb262369c4d103e05c08fa978651/3468e/images/2021-01/2021-01-05-tailwind-colors.jpg'],
            ['id' => '8', 'min' => 1, 'max' => 5, 'image' => 'https://opengraph.githubassets.com/a591251d899d10c5c953d04d12e2970da3d98da599bad7bc11c412e498fc2857/enjidev/tailwindcss-accent'],
            ['id' => '9', 'min' => 1, 'max' => 6, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4jKeIAHo1GzikU9ZrNKUflbkRiAA8F3wZcxVkht_pjA&s'],
            ['id' => '10', 'min' => 1, 'max' => 4, 'image' => 'https://assets.newatlas.com/dims4/default/06c4449/2147483647/strip/true/crop/800x533+0+33/resize/1200x800!/quality/90/?url=http%3A%2F%2Fnewatlas-brightspot.s3.amazonaws.com%2Farchive%2F2016-year-in-ai-art-2.jpg'],
            // Add more products as needed
        ];

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

    
    <form onsubmit="handleSubmit()">
        @include('components.product-overview', [
            'products' => $products,
            'selectedProductId' => '3',
            'galleryName' => $galleryName,
             compact('images'),
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
