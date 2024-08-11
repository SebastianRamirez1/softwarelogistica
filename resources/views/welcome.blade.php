<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>{{ config('app.name', 'Logística de Surtidores') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased bg-gray-100">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar Sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1 class="text-5xl font-bold text-gray-800">Logística de Surtidores</h1>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M13 16h-1v-4h-1m4 4h1V7H7v9h3m4 0h3M5 20h14v2H5v-2z"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('/dashboard') }}" class="underline text-gray-900 dark:text-white">Gestión de Inventario</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Administra y controla tu inventario de productos con eficiencia. Accede al módulo de gestión de inventario para ver y actualizar el estado de tus existencias.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9 17v-2H5v-2H3v-4h2V7h4V5h4v2h4v4h2v4h-2v2h-4v2H9zm-2 4h4v2H7v-2zm6 0h4v2h-4v-2z"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('/pedidos') }}" class="underline text-gray-900 dark:text-white">Gestión de Pedidos</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Maneja tus pedidos de manera efectiva, rastrea su progreso, y garantiza la satisfacción del cliente. Accede al módulo de gestión de pedidos para comenzar.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 20V10m0 0H8.8a.8.8 0 0 1-.8-.8V7.6a.8.8 0 0 1 .8-.8H12m0 0h3.2a.8.8 0 0 1 .8.8v1.6a.8.8 0 0 1-.8.8H12z"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('/ubicaciones') }}" class="underline text-gray-900 dark:text-white">Ubicación en Tiempo Real</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Rastrear la ubicación de tus productos en tiempo real te permite tomar decisiones informadas. Visita el módulo de ubicación para más detalles.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M4 4v2h2v14h12V6h2V4H4z"></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('/informes') }}" class="underline text-gray-900 dark:text-white">Generación de Informes</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Genera informes detallados sobre el estado de inventarios, pedidos, y ubicación. Accede al módulo de generación de informes para empezar.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-400" viewBox="0 0 24 24">
                            <path d="M3 7h18M3 12h18M3 17h18"></path>
                        </svg>
                        <a href="https://laravel.com/docs" class="ml-1 underline">
                            Laravel Documentation
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Powered by Laravel & Tailwind CSS
                </div>
            </div>
        </div>
    </div>
</body>
</html>
