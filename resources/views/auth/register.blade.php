<x-layouts.guest>
    <form action="{{ route('register') }}" method="POST"
        class="w-full max-w-md bg-white border rounded-xl shadow-md p-8">

        @csrf

        <h1 class="text-3xl font-bold text-center mb-2">Create Account</h1>
        <p class="text-center text-gray-500 mb-8">
            Register to start shopping
        </p>

        {{-- Username --}}
        <div class="mb-5">
            <label for="username" class="block text-sm font-medium mb-2">
                Username
            </label>

            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                placeholder="Enter your username"
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-amber-600 focus:ring-2 focus:ring-amber-200 outline-none transition">

            @error('username')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
          <div class="mb-5">
            <label for="email" class="block text-sm font-medium mb-2">
                Email
            </label>

            <input
                type="text"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-amber-600 focus:ring-2 focus:ring-amber-200 outline-none transition">

            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-5">
            <label for="password" class="block text-sm font-medium mb-2">
                Password
            </label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-amber-600 focus:ring-2 focus:ring-amber-200 outline-none transition">

            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="w-full rounded-lg bg-amber-700 py-3 text-white font-medium hover:bg-amber-800 transition duration-200">
            Create Account
        </button>

        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}"
                class="font-medium text-amber-700 hover:underline">
                Login
            </a>
        </p>
    </form>
</x-layouts.guest>