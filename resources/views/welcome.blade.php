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
                    'fotoshooting-card/AK9-0030-0668-2.jpg',
                    'fotoshooting-card/KC-0276-8633.jpg',
                    'fotoshooting-card/BackgroundKC24-0302-3917.jpg',
                    'fotoshooting-card/GR20-6782-6952.jpg',
                    'fotoshooting-card/KC-0302-7297.jpg',
                    'fotoshooting-card/KI18-6046-3785.jpg',
                    'fotoshooting-card/KC-0298-7925-2.jpg',
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
    <div class="mt-8">
        @include('components.our-offers', [
            'title' => 'Unsere Angebote',
            'subtitle' => 'FINDE DEIN PASSENDES ANGEBOT FÜR DEINE WÜNSCHE',
            'description' => 'Erleben Sie die Vielfalt der Fotografie – ob im Studio oder im Freien, ArtLine Fotografie AG
        bietet Ihnen die perfekte Kulisse für unvergessliche Aufnahmen. Tauchen Sie ein in unsere
        kreative Welt und lassen Sie sich von der Schönheit jeder Umgebung inspirieren. Mit
        einem breiten Angebot an Studio- und Outdoor-Shootings stehen wir bereit, um Ihre
        einzigartige Persönlichkeit zum Strahlen zu bringen. Entdecken Sie die Möglichkeiten mit
        ArtLine Fotografie AG und lassen Sie uns gemeinsam Ihre Visionen verwirklichen.',
            'offers' => [
                [
                    'title' => 'FAMILY MEDIUMM MOST POPULAR',
                    'price' => '298',
                    'badge' => 'Most popular',
                    'offer_url' => '#',
                    'features' => [
                        '60 Minuten Fotoshooting',
                        'Gruppenbilder, nur Kinder, nur Eltern',
                        'alle Bilder in kleiner Auflösung (900×600 px)',
                        '5 Bilder bearbeitet und in der vollen Auflösung',
                        'Outdoor zusätzlich CHF 95.00',
                    ],
                ],
                [
                    'title' => 'SCHWANGERSCHAFT MEDIUM MOST POPULAR',
                    'price' => '398',
                    'badge' => 'Most popular',
                    'offer_url' => '#',
                    'features' => [
                        '60 Minuten Fotoshooting',
                        'Mama, Papa und Geschwister',
                        'Bilder alleine und zusammen',
                        'alle Bilder in kleiner Auflösung (900×600 px)',
                        '5 Bilder bearbeitet und in der vollen Auflösung',
                    ],
                ],
                [
                    'title' => 'KINDERSHOOTING',
                    'price' => '248',
                    'offer_url' => '#',
                    'features' => [
                        '30 Minuten Fotoshooting',
                        '1 Kind',
                        'alle Bilder in kleiner Auflösung (900×600 px)',
                        '5 Bilder bearbeitet und in der vollen Auflösung',
                    ],
                ],
            ],
        ])
    </div>
@endsection
