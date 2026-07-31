<tbody class="divide-y divide-gray-100 bg-white">
    @forelse($orders as $order)
        @php
            $statusClasses = match($order->status) {
                'pending' => 'bg-yellow-100 text-yellow-700',
                'success' => 'bg-green-100 text-green-700',
                'failed' => 'bg-red-100 text-red-700',
                default => 'bg-gray-100 text-gray-700',
            };
        @endphp
        <tr class="transition hover:bg-amber-50">
            <td class="px-6 py-5 font-medium text-gray-900">
                {{ $order->order_number }}
            </td>
            <td class="px-6 py-5 text-gray-700">
                {{ $order->user->name }}
            </td>
            <td class="px-6 py-5 font-semibold text-gray-800">
                ₱{{ number_format($order->total, 2) }}
            </td>
            <td class="px-6 py-5">
                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $statusClasses }}">
                    {{ ucfirst($order->status) }}
                </span>
            </td>
            <td class="px-6 py-5 text-gray-600">
                {{ $order->created_at->format('M d, Y') }}
            </td>
            <td class="px-6 py-5">
                <div class="flex justify-center">
                    <a
                        href="{{ route('admin.orders.show', $order) }}"
                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700 hover:shadow">

                        View
                    </a>
                </div>
            </td>
        </tr>
    @empty
        @include('pages.orders.admin._empty_state')
    @endforelse
</tbody>