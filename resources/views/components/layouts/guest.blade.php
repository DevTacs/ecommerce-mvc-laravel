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

            <nav class="flex items-center gap-6 text-sm">
                <a href="/" class="hover:text-amber-700 transition">
                    Home
                </a>

                <a href="{{ route('login') }}" class="hover:text-amber-700 transition">
                    Login
                </a>

                <a href="{{ route('register') }}"
                    class="rounded-lg bg-amber-700 px-4 py-2 text-white hover:bg-amber-800 transition">
                    Register
                </a>
            </nav>
        </div>
    </header>

    <main class="flex min-h-[calc(100vh-73px)] items-center justify-center px-4 py-8">
        {{ $slot }}
    </main>

</body>
</html>