<tbody class="divide-y divide-gray-200 bg-white">
    @forelse($products as $product)
        <tr class="transition hover:bg-amber-50">
            <td class="px-6 py-4">
                <img
                    src="{{ asset($product->image_url) }}"
                    alt="{{ $product->name }}"
                    class="h-16 w-16 rounded-lg border object-cover">
            </td>
            <td class="px-6 py-4">
                <div class="font-medium text-gray-900">
                    {{ $product->name }}
                </div>
            </td>
            <td class="px-6 py-4">
                @if($product->stock > 20)
                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                        {{ $product->stock }}
                    </span>
                @elseif($product->stock > 0)
                    <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                        {{ $product->stock }}
                    </span>
                @else
                    <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                        Out of Stock
                    </span>
                @endif
            </td>
            <td class="px-6 py-4 font-medium text-gray-700">
                ₱{{ number_format($product->price, 2) }}
            </td>
            <td class="px-6 py-4">
                <div class="flex justify-center gap-2">
                    <a
                        href="{{ route('admin.products.edit', $product) }}"
                        class="rounded-md bg-blue-600 px-3 py-2 text-sm font-medium text-white transition hover:bg-blue-700">
                        Edit
                    </a>     
                    <button
                        type="submit"
                        onclick="return confirm('Delete this product?')"
                        class="rounded-md bg-red-600 px-3 py-2 text-sm font-medium text-white transition hover:bg-red-700">
                        Delete
                    </button>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-6 py-16 text-center text-gray-500">
                <svg
                    class="mx-auto mb-4 h-12 w-12 text-gray-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M20 13V7a2 2 0 00-2-2h-3V3H9v2H6a2 2 0 00-2 2v6m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4">
                    </path>
                </svg>
                <p class="text-lg font-medium">
                    No products found
                </p>
                <p class="mt-1 text-sm text-gray-400">
                    Try changing your search or add a new product.
                </p>
            </td>
        </tr>
    @endforelse
</tbody>