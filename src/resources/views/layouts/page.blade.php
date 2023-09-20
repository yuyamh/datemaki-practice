<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}&nbsp;-&nbsp;{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('/favicons/favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('favicons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('favicons/android-chrome-192x192.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="grid min-h-screen grid-cols-1 font-sans antialiased bg-gray-100">
        <div class="sticky top-0 z-50">
            @include('layouts.navigation')
        </div>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow md:z-40">
                <div class="p-6 mx-auto text-xl font-semibold leading-tight text-gray-800">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="w-full row-auto">
            @if (Request::routeIs('page.*'))
            <div class="block max-w-5xl p-10 mx-auto text-lg bg-white rounded-md shadow-md md:w-3/4 my-14">
                <h1 class="pb-2 text-2xl font-bold border-b border-gray-300 mb-7">{{ $title }}</h1>
                {{ $slot }}
            </div>
            @else
            {{ $slot }}
            @endif
        </main>
        <x-footer class="sticky bottom-0"/>
    </body>
</html>
