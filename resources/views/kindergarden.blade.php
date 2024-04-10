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
    ])
@endsection
