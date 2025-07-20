<!DOCTYPE html>
<html lang="en" class="h-full" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Knowledge Base') }}</title>
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">


    {{-- Include Tailwind via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 dark:bg-gray-900/10 text-gray-900 dark:text-gray-100">

    {{-- Navbar (optional) --}}
    <x-navbar />

    {{-- Main Content --}}
    <main class="py-6">
        @yield('content')
    </main>

    

</body>

</html>
