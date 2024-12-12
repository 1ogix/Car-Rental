<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('build/assets/css/app.css') }}" rel="stylesheet">

    <!-- fullcalendar CDN -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar Component -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-grow p-6">
            @yield('content')
        </div>
    </div>
    @yield('scripts')
</body>

</html>
