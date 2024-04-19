@php
    use App\Constants\Constants;
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
    ];
@endphp

@extends('layouts.app')

@section('content')
    <x-image-selector :images="$images" :galleryId="'gallery1'" />
    <x-image-display :galleryId="'gallery1'" />
@endsection
