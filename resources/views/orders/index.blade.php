<x-layouts.app>
    <div class="space-y-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                My Orders
            </h1>

            <p class="mt-2 text-gray-600">
                View your previous purchases and track their current status.
            </p>
        </div>

        {{-- Desktop Table --}}
        <div class="hidden overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm md:block">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-amber-700 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">
                            Order #
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">
                            Total
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">
                            Status
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase">
                            Ordered On
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 bg-white">

                    @forelse ($orders as $order)

                        @php
                            $statusClasses = match (ucfirst($order->status)) {
                                'Pending' => 'bg-yellow-100 text-yellow-800',
                                'Success' => 'bg-green-100 text-green-800',
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

                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">

                                <div class="space-y-3">

                                    <div class="text-5xl">
                                        📦
                                    </div>

                                    <h3 class="text-lg font-semibold">
                                        No orders yet
                                    </h3>

                                    <p class="text-gray-500">
                                        Looks like you haven't placed any orders.
                                    </p>

                                    <a
                                        href="{{ route('products.index') }}"
                                        class="inline-flex rounded-lg bg-amber-700 px-5 py-2.5 text-white hover:bg-amber-800">
                                        Start Shopping
                                    </a>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Mobile Cards --}}
        <div class="space-y-4 md:hidden">

            @forelse ($orders as $order)

                @php
                    $statusClasses = match (ucfirst($order->status)) {
                        'Pending' => 'bg-yellow-100 text-yellow-800',
                        'Success' => 'bg-green-100 text-green-800',
                        'Failed' => 'bg-red-100 text-red-800',
                        default => 'bg-gray-100 text-gray-700',
                    };
                @endphp

                <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-xs uppercase text-gray-500">
                                Order #
                            </p>

                            <p class="font-semibold text-gray-900">
                                {{ $order->order_number }}
                            </p>
                        </div>

                        <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $statusClasses }}">
                            {{ ucfirst($order->status) }}
                        </span>

                    </div>

                    <div class="mt-4 space-y-2 text-sm">

                        <div class="flex justify-between">
                            <span class="text-gray-500">Total</span>
                            <span class="font-medium">
                                ₱{{ number_format($order->total, 2) }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Ordered</span>
                            <span>
                                {{ $order->created_at->format('M d, Y h:i A') }}
                            </span>
                        </div>

                    </div>

                    <a
                        href="{{ route('orders.show', $order) }}"
                        class="mt-5 block rounded-lg bg-amber-700 py-2 text-center font-medium text-white hover:bg-amber-800">
                        View Order
                    </a>

                </div>

            @empty

                <div class="rounded-xl border border-gray-200 bg-white py-16 text-center shadow-sm">

                    <div class="space-y-3">

                        <div class="text-5xl">
                            📦
                        </div>

                        <h3 class="text-lg font-semibold">
                            No orders yet
                        </h3>

                        <p class="text-gray-500">
                            Looks like you haven't placed any orders.
                        </p>

                        <a
                            href="{{ route('products.index') }}"
                            class="inline-flex rounded-lg bg-amber-700 px-5 py-2.5 text-white hover:bg-amber-800">
                            Start Shopping
                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>
</x-layouts.app>