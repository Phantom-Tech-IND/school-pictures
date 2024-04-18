@extends('layouts.app')
@section('content')
    <x-hero-banner />
    @include('components.stepper-kindergarden')
    @include('components.c-t-a', [
        'link' => 'kontakt',
        'button' => 'Warum ArtLine fotografie AG?',
        'title' => 'Warum ArtLine fotografie AG?',
        'description' =>
            'Lorem ipsum dolor sit amet, quaeque delectus consetetur ex sea. Legendos percipitur ne est. Cu sea epicurei pertinax voluptaria, quo an deleniti persequeris. Malis consequuntur definitionem no per, docendi honestatis an pro.',
        'background_image' => '/minimalistic-loft-photo-studio-scaled.jpg',
    ])
    @include('components.gallery', [
        'title' => 'SCHUL-UND KINDERGARTENFOTOGRAFIE',
        'description' => 'Entdecken sie hier unsere musterbilder der schul-und kindergartenfotografie.
                Möchte ihre klasse, ihr schulhaus auch eine schöne erinnerung an die schulzeit? Dann melden sie sich noch heute bei uns!',
        'images' => [
            '/content/kindergarden-and-school/SH-7321-6607.jpg',
            '/content/kindergarden-and-school/SH-7219-8137-9257.jpg',
            '/content/kindergarden-and-school/KG-7157-8475-4031.jpg',
            '/content/kindergarden-and-school/SH-7321-7038.jpg',
            '/content/kindergarden-and-school/SH-7333-8904-7425.jpg',
            '/content/kindergarden-and-school/SH-7326-8999-3821.jpg',
            '/content/kindergarden-and-school/KG-2115-6516-2.jpg',
            '/content/kindergarden-and-school/SH-7333-8904-7433.jpg',
            '/content/kindergarden-and-school/SH-7336-9040-8250.jpg',
            '/content/kindergarden-and-school/SH-7325-8963-3080.jpg',
            '/content/kindergarden-and-school/KG-7157-8475-4033.jpg',
            '/content/kindergarden-and-school/SH-7326-8999-3828.jpg',
            '/content/kindergarden-and-school/IMG_9936-1.jpg',
            '/content/kindergarden-and-school/SH-7321-8492-6640.jpg',
            '/content/kindergarden-and-school/D5A7060.jpg',
            '/content/kindergarden-and-school/SH-7321-8884-6851.jpg',
            '/content/kindergarden-and-school/KG-1700-2376-1.jpg',
            '/content/kindergarden-and-school/KG-7150-8063-0840-2.jpg',
            '/content/kindergarden-and-school/MG_1665.jpg',
            '/content/kindergarden-and-school/KG-2408-2572_-1.jpg',
            '/content/kindergarden-and-school/SH-7325-8963-3073.jpg',
            '/content/kindergarden-and-school/KG-7385-9689-8014.jpg',
            '/content/kindergarden-and-school/SH-7219-8137-9260.jpg',
        ],
    ])
@endsection
