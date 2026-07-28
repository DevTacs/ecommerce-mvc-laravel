<tbody class="divide-y divide-gray-100 bg-white">
    @forelse ($orders as $order)
        @php
            $statusClasses = match (ucfirst($order->status)) {
                'Pending' => 'bg-yellow-100 text-yellow-800',
                'Completed' => 'bg-green-100 text-green-800',
                'Failed' => 'bg-red-100 text-red-800',
                default => 'bg-gray-100 text-gray-700',
            };
        @endphp

        <tr class="hover:bg-gray-50">

            <td class="px-6 py-4 font-medium">
                {{ $order->order_number }}
            </td>

            <td class="px-6 py-4">
                ₱{{ number_format($order->total, 2) }}
            </td>

            <td class="px-6 py-4">
                <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClasses }}">
                    {{ ucfirst($order->status) }}
                </span>
            </td>

            <td class="px-6 py-4">
                {{ $order->created_at->format('M d, Y h:i A') }}
            </td>

            <td class="px-6 py-4 text-right">
                <a
                    href="{{ route('orders.show', $order) }}"
                    class="font-medium text-amber-700 hover:text-amber-800">
                    View
                </a>
            </td>

        </tr>

    @empty
    @include('pages.orders.customer.index._empty_state')
    @endforelse
</tbody>