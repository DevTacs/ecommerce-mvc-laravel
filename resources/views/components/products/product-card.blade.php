<div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

    <img
        src="{{ $product->image_url }}"
        alt="{{ $product->name }}"
        class="h-56 w-full object-cover"
        loading='lazy'>

    <div class="p-4">

        <h2 class="mb-2 line-clamp-2 text-lg font-semibold text-gray-900">
            {{ $product->name }}
        </h2>

        <div class="mb-3 flex items-center justify-between">
            <span class="text-sm text-gray-500">
                Stock: {{ $product->stock }}
            </span>

            <span class="rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                Available
            </span>
        </div>

        <div class="mb-4">
            <span class="text-2xl font-bold text-amber-700">
                ₱{{ number_format($product->price, 2) }}
            </span>
        </div>

        <button
            class="w-full rounded-lg bg-amber-700 py-2.5 font-medium text-white transition hover:bg-amber-800">
            Add to Cart
        </button>

    </div>
</div>