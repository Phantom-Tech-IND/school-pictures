@php
    use App\Constants\Constants;
@endphp

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
        'lightbox_name' => 'kindergarden and school',
        'images' => [
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7321-6607.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7219-8137-9257.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'KG-7157-8475-4031.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7321-7038.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7333-8904-7425.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7326-8999-3821.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'KG-2115-6516-2.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7333-8904-7433.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7336-9040-8250.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7325-8963-3080.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'KG-7157-8475-4033.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7326-8999-3828.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'IMG_9936-1.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7321-8492-6640.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'D5A7060.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7321-8884-6851.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'KG-1700-2376-1.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'KG-7150-8063-0840-2.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'MG_1665.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'KG-2408-2572_-1.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7325-8963-3073.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'KG-7385-9689-8014.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
            [
                'url' => KINDERGARDEN_IMAGE_URL . 'SH-7219-8137-9260.jpg',
                'alt' => KINDERGARDEN_ALT_TEXT,
            ],
        ],
    ])
@endsection
