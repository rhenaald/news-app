<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('dist/assets/css/main/app-dark.css')}}">
        <link rel="stylesheet" href="{{asset('dist/assets/css/main/app.css')}}">
        <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/favicon.svg')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/favicon.png')}}" type="image/png">
        
        <link rel="stylesheet" href="{{asset('dist/assets/css/shared/iconly.css')}}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <!-- <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts -->

    <script src="{{asset('dist/assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('dist/assets/js/app.js')}}"></script>
    
    <!-- Need: Apexcharts -->
    <script src="{{asset('dist/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('dist/assets/js/pages/dashboard.js')}}"></script>
    </body>
</html>
