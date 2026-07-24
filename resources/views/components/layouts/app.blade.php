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
<div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:px-6 md:flex-row md:items-center md:justify-between">

    <a
        href="{{ route('products.index') }}"
        class="text-2xl font-bold text-amber-700 transition hover:text-amber-800">
        Ecommerce
    </a>

    <nav class="flex flex-col gap-4 md:flex-row md:items-center md:gap-8">

        <a href="{{ route('products.index') }}" class="text-sm font-medium transition {{ request()->routeIs('products.*')
                ? 'text-amber-700 border-b-2 border-amber-700 pb-1'
                : 'text-gray-700 hover:text-amber-700' }}">
                Products
        </a>
            <a href="{{ route('cart.index') }}" class="relative text-sm font-medium transition {{ request()->routeIs('cart.*')
                ? 'text-amber-700 border-b-2 border-amber-700 pb-1'
                : 'text-gray-700 hover:text-amber-700' }}">
                Cart
            <span id="cartCount" class="absolute -right-3 -top-2 flex h-5 w-5 items-center justify-center rounded-full bg-amber-700 text-xs font-semibold text-white {{ $cartCount > 0 ? '' : 'hidden' }}">
                {{ $cartCount }}
            </span>
        </a>

        <a href="{{route('orders.index')}}" class="text-sm font-medium transition {{ request()->routeIs('orders.*')
                ? 'text-amber-700 border-b-2 border-amber-700 pb-1'
                : 'text-gray-700 hover:text-amber-700' }}">
                Orders
        </a>


        <div class="flex items-center justify-between gap-4 border-t pt-4 md:border-l md:border-t-0 md:pl-6 md:pt-0">

            <div class="text-right">
                <p class="text-xs text-gray-500">
                    Signed in as
                </p>

                <p class="font-medium text-gray-900">
                    {{ auth()->user()->name }}
                </p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="rounded-lg bg-amber-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-amber-800">
                    Logout
                </button>
            </form>

        </div>

    </nav>

</div>
</header>

<main class="mx-auto min-h-[calc(100vh-73px)] w-full max-w-7xl px-4 py-8">
{{ $slot }}
</main>

</body>
</html>