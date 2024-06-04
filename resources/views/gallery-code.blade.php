@php
    use App\Constants\Constants;
@endphp
@extends('layouts.app')

@section('content')
    {{-- @include('components.secondary-banner', [
        'title' => $student->name,
        'image' => '/minimalistic-loft-photo-studio-scaled.jpg',
    ]) --}}
    <div class="px-6 pt-12 bg-white sm:py-8 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Fotoshooting
                im Kindergarten Buttisholz</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Herzlich willkommen in Ihrer privaten Online Galerie. Besten
                Dank, dass wir Ihr Kind fotografieren durften. Viel Spass beim Betrachten der Bilder..</p>
        </div>
    </div>

    <div class="px-6 mx-auto mb-6 max-w-7xl lg:px-8">
        <div class="grid grid-cols-3 gap-3 py-6 mx-auto max-w-7xl xs:grid-cols-4 lg:grid-cols-5">
            @foreach ($student->photos as $photo)
                <div class="relative bg-black break-inside-avoid group aspect-square" style="margin-top: 0">
                    <a href="{{ asset('storage/' . $photo->photo_path) }}" data-fslightbox="gallery">
                        <img src="{{ asset('storage/' . $photo->photo_path) }}" alt=""
                            class="object-cover w-full h-full transition-opacity duration-300 bg-black group-hover:opacity-50">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="py-8 text-white bg-accent ">
        <div class="px-6 mx-auto max-w-7xl lg:px-8">
            <div class="max-w-4xl mx-auto lg:mx-0">
                <h2 class="text-4xl font-bold tracking-tight ">ENTDECKEN SIE HIER DAS PASSENDE
                    PRODUKT FÜR IHRE WÜNSCHE. </h2>
                <p class="mt-6 text-lg leading-8 ">Alle Preise exkl. MwSt. Die Steuer wird im Warenkorb
                    berechnet und angezeigt.</p>
            </div>
        </div>
    </div>


    <div class="max-w-2xl px-4 mx-auto mt-16 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Produkte</h2>
        <div class="grid grid-cols-1 mt-8 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            @foreach ($products as $product)
                <div class="relative">
                    <a href="{{ route('product', ['id' => $product->id]) }}"
                        class="relative block overflow-hidden rounded-lg h-60 sm:h-72 group">
                        <img src="{{ $product->images && count($product->images) > 0 ? asset('storage/' . $product->images[0]) : asset('images/no-image.jpg') }}"
                            alt="{{ $product->type }}"
                            class="object-contain object-center w-full h-full transition duration-300 ease-in-out bg-[#726765] group-hover:opacity-75">
                        <div
                            class="absolute inset-0 flex items-center justify-center transition duration-300 ease-in-out bg-black bg-opacity-0 group-hover:bg-opacity-50">
                            <span class="text-lg text-white opacity-0 group-hover:opacity-100">Produkt ansehen</span>
                        </div>

                    </a>
                    <div class="flex items-baseline justify-between mx-2 mt-4">
                        <h3 class="font-medium text-gray-900 truncate ">
                            {{ $product->name }}
                        </h3>
                        <h5 class="font-light text-gray-900 whitespace-nowrap">{{ $product->price }} CHF</h5>
                    </div>
                    <div class="px-2">
                        <p class="h-[3.75rem] text-sm text-gray-800 break-words line-clamp-3">
                            {{ $product->short_description }}
                        </p>
                    </div>

                </div>
            @endforeach
            <!-- More products... -->
        </div>
    </div>
@endsection

