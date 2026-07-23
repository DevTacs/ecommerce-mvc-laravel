<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Ecommerce') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900">

    <header class="border-b bg-white shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <h1 class="text-2xl font-bold text-amber-700">
                Ecommerce
            </h1>
        </div>
    </header>

    <main class="flex min-h-[calc(100vh-73px)] items-center justify-center px-4 py-8">
        {{ $slot }}
    </main>

</body>
</html>