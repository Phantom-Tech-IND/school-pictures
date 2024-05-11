@extends('layouts.app')
@section('content')
    @include('components.secondary-banner', [
        'title' => $offer->title,
        'image' => 'storage/'.$offer->image,
    ])

    <div class="py-24 bg-white sm:py-32">
        <div class="px-6 mx-auto max-w-7xl lg:px-8">
            <div class="gap-3 mx-auto space-y-3 columns-2 xs:columns-3 max-w-7xl pb-28">
                @foreach ($offer->photo_gallery as $image)
                    <div class="overflow-hidden bg-black border-2 border-gray-300 rounded break-inside-avoid group">
                        <a href="{{ asset('storage/'.$image) }}" data-fslightbox="offer-gallery">
                            <img src="{{ asset('storage/'.$image) }}" alt="" class="transition-opacity duration-300 bg-black group-hover:opacity-50">
                        </a>
                    </div>
                @endforeach
            </div>

            @php
                $itemCount = count($offer->offerItems);
                $columnsClass = match($itemCount) {
                    1 => 'grid-cols-3',
                    2 => 'grid-cols-2',
                    3 => 'grid-cols-3',
                    4 => 'grid-cols-4',
                    default => 'grid-cols-3'
                };
            @endphp

            <div class="grid max-w-7xl grid-cols-1 {{($itemCount != 1) ? 'xs:grid-cols-2' : ''}} gap-8 mx-auto my-auto mt-10 isolate lg:mx-0 lg:{{ $columnsClass }}">
                @foreach ($offer->offerItems as $item)
                @if ($itemCount == 1)
                    <div class="lg:col-start-2">
                @endif
                    @include('components.plan-card', [
                        'offerId' => $item->id,
                        'offer_url' => null, // TODO: fix this
                        'title' => $item->name,
                        'badge' => $item->is_popular ? 'most popular' : null,
                        'price' => $item->price,
                        'features' => $item->custom_attributes,
                    ])
                @if ($itemCount == 1)
                    </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

