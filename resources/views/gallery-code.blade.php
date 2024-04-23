@php
    use App\Constants\Constants;
@endphp

@include('components.image-selector')

@extends('layouts.app')

@section('content')
    @php
        $title = request('code', 'Code Gallery');
        $products = [
            ['id' => '1', 'image' => 'https://i.stack.imgur.com/Qm0J3.png'],
            [
                'id' => '2',
                'image' =>
                    'https://d33wubrfki0l68.cloudfront.net/ffc8680b2f5adb262369c4d103e05c08fa978651/3468e/images/2021-01/2021-01-05-tailwind-colors.jpg',
            ],
            [
                'id' => '3',
                'image' =>
                    'https://opengraph.githubassets.com/a591251d899d10c5c953d04d12e2970da3d98da599bad7bc11c412e498fc2857/enjidev/tailwindcss-accent',
            ],
            [
                'id' => '4',
                'image' =>
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4jKeIAHo1GzikU9ZrNKUflbkRiAA8F3wZcxVkht_pjA&s',
            ],
            [
                'id' => '5',
                'image' =>
                    'https://assets.newatlas.com/dims4/default/06c4449/2147483647/strip/true/crop/800x533+0+33/resize/1200x800!/quality/90/?url=http%3A%2F%2Fnewatlas-brightspot.s3.amazonaws.com%2Farchive%2F2016-year-in-ai-art-2.jpg',
            ],
            ['id' => '6', 'image' => 'https://i.stack.imgur.com/Qm0J3.png'],
            [
                'id' => '7',
                'image' =>
                    'https://d33wubrfki0l68.cloudfront.net/ffc8680b2f5adb262369c4d103e05c08fa978651/3468e/images/2021-01/2021-01-05-tailwind-colors.jpg',
            ],
            [
                'id' => '8',
                'image' =>
                    'https://opengraph.githubassets.com/a591251d899d10c5c953d04d12e2970da3d98da599bad7bc11c412e498fc2857/enjidev/tailwindcss-accent',
            ],
            [
                'id' => '9',
                'image' =>
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4jKeIAHo1GzikU9ZrNKUflbkRiAA8F3wZcxVkht_pjA&s',
            ],
            [
                'id' => '10',
                'image' =>
                    'https://assets.newatlas.com/dims4/default/06c4449/2147483647/strip/true/crop/800x533+0+33/resize/1200x800!/quality/90/?url=http%3A%2F%2Fnewatlas-brightspot.s3.amazonaws.com%2Farchive%2F2016-year-in-ai-art-2.jpg',
            ],
            // Add more products as needed
        ];
        $selectedProductId = '1';

        $images = [
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7321-6607.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7219-8137-9257.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7157-8475-4031.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7321-7038.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7333-8904-7425.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7326-8999-3821.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-2115-6516-2.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7333-8904-7433.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7336-9040-8250.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7325-8963-3080.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7157-8475-4033.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7326-8999-3828.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'IMG_9936-1.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7321-8492-6640.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'D5A7060.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7321-8884-6851.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-1700-2376-1.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7150-8063-0840-2.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'MG_1665.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-2408-2572_-1.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7325-8963-3073.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7385-9689-8014.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7219-8137-9260.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7333-8904-7433.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7336-9040-8250.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7325-8963-3080.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7157-8475-4033.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7321-6607.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7219-8137-9257.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7157-8475-4031.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7321-7038.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7333-8904-7425.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7326-8999-3821.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-2115-6516-2.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7333-8904-7433.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7336-9040-8250.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7325-8963-3080.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7157-8475-4033.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7326-8999-3828.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'IMG_9936-1.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7321-8492-6640.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'D5A7060.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7321-8884-6851.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-1700-2376-1.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7150-8063-0840-2.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'MG_1665.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-2408-2572_-1.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7325-8963-3073.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7385-9689-8014.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7219-8137-9260.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7333-8904-7433.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7336-9040-8250.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'SH-7325-8963-3080.jpg',
            Constants::KINDERGARDEN_IMAGE_URL . 'KG-7157-8475-4033.jpg',
        ];
    @endphp

    @include('components.secondary-banner', [
        'title' => $title,
        'image' => '/coverbluzz.jpeg',
    ])

    @include('components.product-overview', [
        'products' => $products,
        'selectedProductId' => $selectedProductId,
        compact('images'),
    ])
@endsection
