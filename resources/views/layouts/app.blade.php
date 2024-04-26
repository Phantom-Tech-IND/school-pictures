<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <!-- Add the viewport meta tag below -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('components.navbar')
    <div class="pt-12">
        @yield('content')
    </div>
</body>

@include('components.modal-right-click')
@include('components.images-footer')
@include('components.footer')
</body>

</html>
