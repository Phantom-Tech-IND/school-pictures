@php
    use App\Constants\Constants;
@endphp
@extends('layouts.app')

@section('content')
    @include('components.secondary-banner', [
        'title' => $student->name,
        'image' => '/minimalistic-loft-photo-studio-scaled.jpg',
    ])
    <div class="bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-4xl text-center">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Fotoshooting
                im Kindergarten Buttisholz</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Herzlich willkommen in Ihrer privaten Online Galerie. Besten
                Dank, dass wir Ihr Kind fotografieren durften. Viel Spass beim Betrachten der Bilder..</p>
        </div>
    </div>

    <div class="px-6 mx-auto max-w-7xl lg:px-8">
        <div class="gap-3 mx-auto space-y-3 columns-2 xs:columns-3 max-w-7xl pb-28">
            @foreach ($student->photos as $photo)
                <div class="bg-black break-inside-avoid group">
                    <a href="{{ asset('storage/' . $photo->photo_path) }}" data-fslightbox="gallery">
                        <img src="{{ asset('storage/' . $photo->photo_path) }}" alt=""
                            class="transition-opacity duration-300 bg-black group-hover:opacity-50">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="bg-accent text-white py-14 ">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-4xl lg:mx-0">
                <h2 class="text-4xl font-bold tracking-tight  ">ENTDECKEN SIE HIER DAS PASSENDE
                    PRODUKT FÜR IHRE WÜNSCHE. </h2>
                <p class="mt-6 text-lg leading-8 ">Alle Preise exkl. MwSt. Die Steuer wird im Warenkorb
                    berechnet und angezeigt.</p>
            </div>
        </div>
    </div>

    <div class="bg-white mt-12">
        <div class="mx-auto max-w-2xl px-4  sm:px-6  lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Products</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)
                    <a href="{{ route('product', ['id' => $product->id]) }}" class="group">
                        <div
                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            @if (count($product->images) > 0)
                                <!-- Check if there are images -->
                                <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}"
                                    class="h-full w-full object-cover object-center group-hover:opacity-75">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Default Image"
                                    class="h-full w-full object-cover object-center group-hover:opacity-75">
                            @endif
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">{{ $product->name }}</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">${{ number_format($product->price, 2) }}</p>
                    </a>
                @endforeach


                <!-- More products... -->
            </div>
        </div>
    </div>
@endsection
