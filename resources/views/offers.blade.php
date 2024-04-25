@extends('layouts.app')
@section('content')
    <div class="flex flex-wrap -mx-2">
        @foreach ($offers as $offer)
            <div class="p-2 mx-auto md:w-1/2">
                @include('components.offer', [
                    'image' => $offer->image,
                    'title' => $offer->title,
                    'link' => route('offer', ['id' => $offer->id]),
                ])
            </div>
        @endforeach
    </div>
@endsection
