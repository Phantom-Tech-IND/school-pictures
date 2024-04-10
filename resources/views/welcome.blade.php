@extends('layouts.app')
@section('content')
    <x-hero-banner />

    <div class="mt-8 md:mt-24">
        @include('components.masonry-content')
    </div>
    <div class="mt-8 md:mt-24">
        @include('components.c-t-a', [
            'link' => 'kontakt',
            'button' => 'Warum ArtLine fotografie AG?',
            'title' => 'Warum ArtLine fotografie AG?',
            'description' =>
                'Lorem ipsum dolor sit amet, quaeque delectus consetetur ex sea. Legendos percipitur ne est. Cu sea epicurei pertinax voluptaria, quo an deleniti persequeris. Malis consequuntur definitionem no per, docendi honestatis an pro.',
            'background_image' => '/minimalistic-loft-photo-studio-scaled.jpg',
        ])
    </div>
    <div class="mt-8 md:mt-24">
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
    </div>
    <div class="mt-8 md:mt-24">
        @include('components.popular-product', [
            'product' => [
                'image' => '/coverbluzz.jpeg',
                'name' => 'Photoshooting card',
                'type' => 'Pro shooting',
                'description' => [
                    '10 Shootings à 10 Minuten Fotoshooting',
                    '1 Kind',
                    'gültig 2 Jahre',
                    'Angebot gültig bis 14 Jahren',
                    'alle Bilder exkl',
                ],
            ],
        ])
    </div>
    <div class="mt-8 md:mt-24">
        @include('components.our-offers', [
            'title' => 'Unsere Angebote',
            'subtitle' => 'FINDE DEIN PASSENDES ANGEBOT FÜR DEINE WÜNSCHE',
            'description' =>
                'Aenean vehicula tempus orci non molestie. Sed egestas commodo porta. Praesent consectetur sollicitudin scelerisque. Nullam ornare elit interdum posuere facilisis. Donec consequat pretium pretium. Nullam imperdiet varius dignissim. Mauris at interdum turpis. Sed ex massa, vestibulum quis viverra at, dapibus facilisis risus. In ac volutpat justo, et pretium risus. Quisque semper sed orci vel porta. Etiam quis lobortis justo, ut pharetra libero. Aliquam ac nisl eget.',
            'offers' => [
                [
                    'icon' => 'heroicon-o-academic-cap',
                    'title' => 'This is the heading',
                    'description' =>
                        'Mauris imperdiet tempor ex quis consectetur. Morbi rhoncus velit non orci viverra, ac sollicitudin orci pellentesque.',
                ],
                [
                    'icon' => 'heroicon-o-academic-cap',
                    'title' => 'This is the heading',
                    'description' =>
                        'Mauris imperdiet tempor ex quis consectetur. Morbi rhoncus velit non orci viverra, ac sollicitudin orci pellentesque.',
                ],
                [
                    'icon' => 'heroicon-o-academic-cap',
                    'title' => 'This is the heading',
                    'description' =>
                        'Mauris imperdiet tempor ex quis consectetur. Morbi rhoncus velit non orci viverra, ac sollicitudin orci pellentesque.',
                ],
            ],
        ])
    </div>
@endsection
