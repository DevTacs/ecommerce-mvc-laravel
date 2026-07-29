<form
    action="{{ route('admin.products.update', $product) }}"
    method="POST"
    enctype="multipart/form-data"
    class="space-y-8 p-6 sm:p-8">

    @csrf
    @method('PUT')

    <!-- Current Image -->
    <div>

        <label class="mb-3 block text-sm font-semibold text-gray-700">
            Current Image
        </label>

        <div class="flex justify-center">

            <img
                src="{{ filter_var($product->image_url, FILTER_VALIDATE_URL)
                    ? $product->image_url
                    : asset('storage/' . $product->image_url) }}"
                alt="{{ $product->name }}"
                class="h-48 w-48 rounded-xl border border-gray-300 object-cover shadow">

        </div>

    </div>

    <!-- Upload -->
    <div>

        <label
            for="image_url"
            class="mb-2 block text-sm font-semibold text-gray-700">
            Replace Image
        </label>

        <input
            type="file"
            id="image_url"
            name="image_url"
            accept="image/*"
            class="block w-full rounded-xl border-2 border-dashed border-gray-300
                    px-4 py-3 text-sm transition
                    file:mr-4 file:rounded-lg file:border-0
                    file:bg-amber-700 file:px-4 file:py-2
                    file:font-medium file:text-white
                    hover:border-amber-400 hover:file:bg-amber-800">

        <p class="mt-2 text-xs text-gray-500">
            Leave empty if you don't want to change the image.
        </p>

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
            class="mb-2 block text-sm font-semibold text-gray-700">
            Product Name
        </label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $product->name) }}"
            placeholder="Enter product name"
            class="w-full rounded-xl border border-gray-300 px-4 py-3
                    focus:border-amber-700
                    focus:outline-none
                    focus:ring-4
                    focus:ring-amber-100">

        @error('name')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    <!-- Stock & Price -->
    <div class="grid gap-6 md:grid-cols-2">

        <div>

            <label
                for="stock"
                class="mb-2 block text-sm font-semibold text-gray-700">
                Stock
            </label>

            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock', $product->stock) }}"
                min="0"
                class="w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:border-amber-700
                        focus:outline-none
                        focus:ring-4
                        focus:ring-amber-100">

            @error('stock')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <div>

            <label
                for="price"
                class="mb-2 block text-sm font-semibold text-gray-700">
                Price
            </label>

            <input
                type="number"
                id="price"
                name="price"
                value="{{ old('price', $product->price) }}"
                min="0"
                step="0.01"
                class="w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:border-amber-700
                        focus:outline-none
                        focus:ring-4
                        focus:ring-amber-100">

            @error('price')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>

    <!-- Footer -->
    <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 sm:flex-row sm:justify-end">

        <a
            href="{{ route('admin.products.index') }}"
            class="rounded-xl border border-gray-300 px-6 py-3 text-center font-medium text-gray-700 transition hover:bg-gray-100">
            Cancel
        </a>

        <button
            type="submit"
            class="rounded-xl bg-amber-700 px-6 py-3 font-medium text-white shadow transition hover:bg-amber-800">
            Save Changes
        </button>

    </div>

</form>