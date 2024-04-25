@extends('layouts.app')
@section('content')
    <x-hero-banner />
    <div class="mt-8 md:mt-24">
        @include('components.masonry-content')
    </div>
    <div class="mt-8 md:mt-24">
        @include('components.c-t-a', [
            'link' => 'contact',
            'button' => 'Warum ArtLine fotografie AG?',
            'title' => 'Warum ArtLine fotografie AG?',
            'description' => 'Die ArtLine Fotografie AG ist Ihr perfekter Partner für alle fotografischen Bedürfnisse.Unserengagiertes Team kombiniert jahrelange Erfahrung mit einem einzigartigen künstlerischen Ansatz, um Ihre Momente in zeitlose Kunstwerke zu verwandeln. Bei uns steht Qualität anerster Stelle, und wir sind stolz darauf, jedem Kunden ein individuelles Erlebnis zu bieten.<br/>
            <br/>
            Entdecken Sie die ArtLine Fotografie AG – wo jedes Bild eine Geschichte erzählt und jede Aufnahme ein Kunstwerk ist.',
            'background_image' => '/minimalistic-loft-photo-studio-scaled.jpg',
        ])
    </div>
    <div class="mt-8 md:mt-24">
        @include('components.team', ['teamMembers' => \App\Constants\Constants::TEAM_MEMBERS])
    </div>
    <div class="mt-8 md:mt-24">
        @include('components.popular-product', [
            'product' => [
                'bg-image' => 'gr20-6782-7121.jpg',
                'images' => [
                    'kc-0287-5607-2.jpg',
                    'kc-0173-0564-1.jpg',
                    'gr17-5575-7039.jpg',
                    'ak9-0009-9795.jpg',
                    'kc-0283-1085-1.jpg',
                    'gr20-6782-6987.jpg',
                ],
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
