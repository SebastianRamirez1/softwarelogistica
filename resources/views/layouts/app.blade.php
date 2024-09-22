<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Logística de Surtidores')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    @include('layouts.navigation')

    @include('layouts.header')

    <div class="container mx-auto mt-4">
        <div class="flex">
            <div class="w-1/4">
                @include('layouts.sidebar')
            </div>
            <div class="w-3/4">
                @yield('content')
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>