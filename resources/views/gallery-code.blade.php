@extends('layouts.app')

@section('content')
    @php
        $title = request('code', 'Code Gallery');
        $products = [
            ['id' => '1', 'image' => 'https://i.stack.imgur.com/Qm0J3.png'],
            ['id' => '2', 'image' => 'https://d33wubrfki0l68.cloudfront.net/ffc8680b2f5adb262369c4d103e05c08fa978651/3468e/images/2021-01/2021-01-05-tailwind-colors.jpg'],
            ['id' => '3', 'image' => 'https://opengraph.githubassets.com/a591251d899d10c5c953d04d12e2970da3d98da599bad7bc11c412e498fc2857/enjidev/tailwindcss-accent'],
            ['id' => '4', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4jKeIAHo1GzikU9ZrNKUflbkRiAA8F3wZcxVkht_pjA&s'],
            ['id' => '5', 'image' => 'https://assets.newatlas.com/dims4/default/06c4449/2147483647/strip/true/crop/800x533+0+33/resize/1200x800!/quality/90/?url=http%3A%2F%2Fnewatlas-brightspot.s3.amazonaws.com%2Farchive%2F2016-year-in-ai-art-2.jpg'],
            ['id' => '6', 'image' => 'https://i.stack.imgur.com/Qm0J3.png'],
            ['id' => '7', 'image' => 'https://d33wubrfki0l68.cloudfront.net/ffc8680b2f5adb262369c4d103e05c08fa978651/3468e/images/2021-01/2021-01-05-tailwind-colors.jpg'],
            ['id' => '8', 'image' => 'https://opengraph.githubassets.com/a591251d899d10c5c953d04d12e2970da3d98da599bad7bc11c412e498fc2857/enjidev/tailwindcss-accent'],
            ['id' => '9', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4jKeIAHo1GzikU9ZrNKUflbkRiAA8F3wZcxVkht_pjA&s'],
            ['id' => '10', 'image' => 'https://assets.newatlas.com/dims4/default/06c4449/2147483647/strip/true/crop/800x533+0+33/resize/1200x800!/quality/90/?url=http%3A%2F%2Fnewatlas-brightspot.s3.amazonaws.com%2Farchive%2F2016-year-in-ai-art-2.jpg'],
            // Add more products as needed
        ];
        $selectedProductId = '1';
    @endphp

    @include('components.secondary-banner', [
        'title' => $title,
        'image' => '/coverbluzz.jpeg',
    ])

    @include('components.product-overview', ['products' => $products, 'selectedProductId' => $selectedProductId])
@endsection
