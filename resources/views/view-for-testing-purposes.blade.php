@php
    use App\Constants\Constants;
@endphp

{{--
    Din articolele citite sunt 2 modalitati de
    a importa si folosi functiile in laravel + vite

    1. @vite(['resources/js/image-selection.js']) sau cu script module
    Dar trebuie sa pui:
        window.selectImage = selectImage;
    ca sa fie accesibila global in html cea ce nu-i cel mai convenabil

    2. Il importi in app.js si o folosesti global
        import { selectImage } from '/@resources/js/image-selection.js';
--}}
<head>
    @vite(['resources/js/image-selection.js'])
</head>
@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-4 gap-4 mt-20">
        @forelse ($images as $image)
            <div
                class="border cursor-pointer hover:border-blue-500 focus:border-blue-700 focus:outline-none"
                onclick="selectImage('{{ $image }}')"
                style="outline-offset: 2px;">
                <img
                    src="{{ $image }}"
                    alt="{{ \App\Constants\Constants::KINDERGARDEN_ALT_TEXT }}"
                    class="object-cover w-full h-48 transition duration-300 ease-in-out transform rounded-lg hover:scale-105"
                >
            </div>
        @empty
            <div>No images found.</div>
        @endforelse
    </div>
        
    <div id="selectedImagesList" class="flex flex-row flex-wrap justify-start gap-4 mt-8"></div>

@endsection
