<tbody class="divide-y divide-gray-200 bg-white">
    @forelse($orderItems as $item)
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4">
                <img
                    src="{{ asset($item->image_url) }}"
                    alt="{{ $item->name }}"
                    class="h-16 w-16 rounded-lg border object-cover">
            </td>

            <td class="px-6 py-4 font-medium text-gray-900">
                {{ $item->product_name }}
            </td>

            <td class="px-6 py-4 text-gray-600">
                {{ $item->quantity }}
            </td>

            <td class="px-6 py-4 font-semibold text-gray-900">
                ₱{{ number_format($item->product_price, 2) }}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                No order items found.
            </td>
        </tr>
    @endforelse
</tbody>