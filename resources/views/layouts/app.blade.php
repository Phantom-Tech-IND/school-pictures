<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <!-- Add the viewport meta tag below -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEOTools::generate() !!}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->addProperty('fb:page', 'https://www.facebook.com/people/ArtLine-Fotografie-AG/100063707163344/');
        SEOMeta::setRobots('index, follow');
    @endphp
</head>

@include('components.navbar')
@include('components.slide-over-cart')
<div class="pt-12">
    @yield('content')
</div>
</body>

@include('components.modal-right-click')
{{-- @include('components.images-footer') --}}
@include('components.footer')
</body>

</html>
