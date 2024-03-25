<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ArtLine Fotografie</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('components.navbar')
    <div class="container mx-auto">
        @yield('content')
    </div>


    <div class="container h-screen mx-auto text-center">
        <h1 class="my-12 text-5xl font-bold uppercase text-primary">ArtLine Fotografie AG</h1>
        <p class="text-xl text-gray-600">Ihr Fotograf in der Region Zürich</p>
    </div>
    @include('components.footer')
</body>

</html>
