@extends('layouts.app')
@section('content')
    <div class="flex flex-wrap -mx-2">
        @foreach ($offers as $offer)
            <div class="w-1/2 p-2"> <!-- Adjusted line: wrapping each offer in a div with w-1/2 and p-2 for padding -->
                @include('components.offer', [
                    'image' => $offer->image,
                    'title' => $offer->title,
                    'link' => 'offer',
                ])
            </div>
        @endforeach
    </div>
@endsection
