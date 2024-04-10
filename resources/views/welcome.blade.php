<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ArtLine Fotografie</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('components.navbar')
    <x-hero-banner />

    <div class="mt-24">
        @include('components.masonry-content')
    </div>
    <div class="my-24">
        @include('components.c-t-a', [
            'link' => 'kontakt',
            'button' => 'Warum ArtLine fotografie AG?',
            'title' => 'Warum ArtLine fotografie AG?',
            'description' =>
                'Lorem ipsum dolor sit amet, quaeque delectus consetetur ex sea. Legendos percipitur ne est. Cu sea epicurei pertinax voluptaria, quo an deleniti persequeris. Malis consequuntur definitionem no per, docendi honestatis an pro.',
            'background_image' => '/minimalistic-loft-photo-studio-scaled.jpg',
        ])
    </div>
    @include('components.homepage-team', [
        'teams' => [
            [
                'image' => '/coverbluzz.jpeg',
                'name' => 'Hans Muster',
                'text' => 'Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
            ],
            [
                'image' => '/coverbluzz.jpeg',
                'name' => 'Hans Muster',
                'text' => 'Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
            ],
            [
                'image' => '/coverbluzz.jpeg',
                'name' => 'Hans Muster',
                'text' => 'Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
            ],
        ],
    ])

    @include('components.popular-product', [
        'product' => [
            'image' => '/coverbluzz.jpeg',
            'name' => 'Photoshooting card',
            'description' => [
                '10 Shootings à 10 Minuten Fotoshooting',
                '1 Kind',
                'gültig 2 Jahre',
                'Angebot gültig bis 14 Jahren',
                'alle Bilder exkl',
            ],
        ],
    ])
    @include('components.centered-text')
    @include('components.footer')
</body>

</html>
