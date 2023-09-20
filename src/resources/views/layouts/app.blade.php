<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}&nbsp;-&nbsp;{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="/css/github-markdown.css">

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
        @if (session('successMessage'))
            <div class="p-4 m-3 bg-green-100 rounded-lg shadow max-w-7xl">
                <p class="text-green-700">{{ session('successMessage') }}</p>
            </div>
        @endif

        <main class="w-full row-auto px-4 mx-auto">
            <div class="block w-full py-12 lg:px-4 lg:grid-cols-12 lg:grid">
                <div class="lg:col-span-9">
                    {{ $slot }}
                </div>
                <div class="block px-6 lg:col-span-3">
                    <x-search-form />
                </div>
            </div>
        </main>
        <x-footer class="sticky bottom-0"/>
    </body>
</html>
