<x-layouts.app>
    <div class="space-y-8">

        <div>
            <a
                href="{{ route('orders.index') }}"
                class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:border-amber-700 hover:text-amber-700">
                ← Back to Orders
            </a>
        </div>

        @php
            $statusClasses = match (ucfirst($order->status)) {
                'Pending' => 'bg-yellow-100 text-yellow-800',
                'Success' => 'bg-green-100 text-green-800',
                'Failed' => 'bg-red-100 text-red-800',
                default => 'bg-gray-100 text-gray-700',
            };
        @endphp

        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Order Number
                    </p>

                    <h1 class="mt-1 text-3xl font-bold text-gray-900">
                        {{ $order->order_number }}
                    </h1>

                    <p class="mt-2 text-sm text-gray-500">
                        Placed on {{ $order->created_at->format('F d, Y \a\t h:i A') }}
                    </p>
                </div>

                <div class="text-left md:text-right">

                    <p class="text-sm text-gray-500">
                        Total Amount
                    </p>

                    <p class="mt-1 text-3xl font-bold text-amber-700">
                        ₱{{ number_format($order->total, 2) }}
                    </p>

                    <span class="mt-3 inline-flex rounded-full px-3 py-1 text-sm font-semibold {{ $statusClasses }}">
                        {{ ucfirst($order->status) }}
                    </span>

                </div>

            </div>

        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="text-lg font-semibold text-gray-900">
                    Order Items
                </h2>
            </div>

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-amber-700 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">
                            Product
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider">
                            Price
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider">
                            Quantity
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider">
                            Subtotal
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 bg-white">

                    @forelse ($orderItems as $item)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $item->product_name }}
                            </td>

                            <td class="px-6 py-4 text-right text-gray-700">
                                ₱{{ number_format($item->product_price, 2) }}
                            </td>

                            <td class="px-6 py-4 text-center text-gray-700">
                                {{ $item->quantity }}
                            </td>

                            <td class="px-6 py-4 text-right font-semibold text-gray-900">
                                ₱{{ number_format($item->product_price * $item->quantity, 2) }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                No items found for this order.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
</x-layouts.app>