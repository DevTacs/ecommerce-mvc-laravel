<div class="space-y-4 md:hidden">
    @forelse ($orders as $order)
        @php
            $statusClasses = match (ucfirst($order->status)) {
                'Pending' => 'bg-yellow-100 text-yellow-800',
                'Completed' => 'bg-green-100 text-green-800',
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
        @include('pages.orders.index._empty_state')
    @endforelse
</div>