<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="preload" href="{{ asset('/font/MaterialIcons-Regular.ttf') }}" as="font" type="font/ttf">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased safe-area-padding">
        <div class="flex flex-col min-h-screen bg-gray-300 bg-gradient-to-b from-gray-200 to-gray-500">
            @include('layouts.navigation')

            @if(isset($header))
                <!-- Page Heading -->
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @else
                <header class="bg-gray-700 w-full p-1 text-gray-200 text-center">
                    <p>✨ <strong>Localhost</strong>, il progetto eCommerce da 30 e lode! ✨</p>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>

            <footer class="bg-gray-900 text-gray-100 text-center text-xs p-2 py-4">
                <p class="text-white">Alma Mater Studiorum - Università di Bologna</p>
                <p class="text-white">Tecnologie Web A.A. 2021/2022</p>
                <p class="text-white italic">Progetto di: Ugo Baroncini e Alice Girolomini</p>
            </footer>
        </div>
    </body>
</html>
