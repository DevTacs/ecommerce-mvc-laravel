<x-layouts.admin>
    <div class="mx-auto w-full max-w-3xl px-4">
        <!-- Back Button -->
        <div class="mb-6">
            <a
                href="{{ route('admin.products.index') }}"
                class="inline-flex items-center text-sm font-medium text-amber-700 transition hover:text-amber-800">
                ← Back to Products
            </a>
        </div>

        <!-- Card -->
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

            <!-- Header -->
            <div class="border-b border-gray-200 px-6 py-5">
                <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                    Create Product
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Add a new product to your inventory.
                </p>
            </div>

            <!-- Form -->
            <form
                action="{{ route('admin.products.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6 p-6 sm:p-8">

                @csrf

                <!-- Image -->
                <div>
                    <label
                        for="image_url"
                        class="mb-2 block text-sm font-medium text-gray-700">
                        Product Image
                    </label>

                    <input
                        type="file"
                        id="image_url"
                        name="image_url"
                        accept="image/*"
                        class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm
                               file:mr-4 file:rounded-md file:border-0
                               file:bg-amber-700 file:px-4 file:py-2
                               file:text-white hover:file:bg-amber-800">

                    @error('image_url')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Name -->
                <div>
                    <label
                        for="name"
                        class="mb-2 block text-sm font-medium text-gray-700">
                        Product Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter product name"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2
                               focus:border-amber-700 focus:outline-none
                               focus:ring-2 focus:ring-amber-200">

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Stock & Price -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                    <!-- Stock -->
                    <div>
                        <label
                            for="stock"
                            class="mb-2 block text-sm font-medium text-gray-700">
                            Stock
                        </label>

                        <input
                            type="number"
                            id="stock"
                            name="stock"
                            value="{{ old('stock', 1) }}"
                            min="0"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2
                                   focus:border-amber-700 focus:outline-none
                                   focus:ring-2 focus:ring-amber-200">

                        @error('stock')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label
                            for="price"
                            class="mb-2 block text-sm font-medium text-gray-700">
                            Price
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price', 0) }}"
                            min="0"
                            step="0.01"
                            placeholder="0.00"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2
                                   focus:border-amber-700 focus:outline-none
                                   focus:ring-2 focus:ring-amber-200">

                        @error('price')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <!-- Buttons -->
                <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="rounded-lg border border-gray-300 px-5 py-2 text-center text-sm font-medium text-gray-700 transition hover:bg-gray-100">
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="rounded-lg bg-amber-700 px-5 py-2 text-sm font-medium text-white transition hover:bg-amber-800">
                        Create Product
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layouts.admin>