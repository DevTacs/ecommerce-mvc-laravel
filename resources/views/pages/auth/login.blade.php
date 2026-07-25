<x-layouts.guest>
        <form action="{{ route('login') }}" method="POST"
            class="w-full max-w-md bg-white border rounded-xl shadow-md p-8">

            @csrf

            <h1 class="text-3xl font-bold text-center mb-2">Welcome Back</h1>
            <p class="text-center text-gray-500 mb-8">
                Sign in to your account
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
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
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
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember me --}}
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center gap-2 text-sm">
                    <input
                        type="checkbox"
                        name="remember"
                        class="rounded border-gray-300 text-amber-600 focus:ring-amber-500">
                    Remember me
                </label>

                <a href="#" class="text-sm text-amber-700 hover:underline">
                    Forgot Password?
                </a>
            </div>

            <button
                type="submit"
                class="w-full rounded-lg bg-amber-700 py-3 text-white font-medium hover:bg-amber-800 transition duration-200">
                Sign In
            </button>
            @error('login')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror

            <p class="mt-6 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}"
                    class="font-medium text-amber-700 hover:underline">
                    Register
                </a>
            </p>
        </form>
</x-layouts.guest>