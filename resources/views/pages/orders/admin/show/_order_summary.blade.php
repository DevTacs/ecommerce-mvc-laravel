<div class="grid gap-4 md:grid-cols-3">
    <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
        <p class="text-sm text-gray-500">Order Number</p>
        <p class="mt-1 font-semibold text-gray-900">
            {{ $order->order_number }}
        </p>
    </div>
    <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
        <p class="text-sm text-gray-500">Total</p>
        <p class="mt-1 font-semibold text-gray-900">
            ₱{{ number_format($order->total, 2) }}
        </p>
    </div>
    <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
        <p class="text-sm text-gray-500">Status</p>
        @php
            $statusClasses = match ($order->status) {
                'pending' => 'bg-yellow-100 text-yellow-800',
                'success' => 'bg-green-100 text-green-800',
                'failed' => 'bg-red-100 text-red-800',
                default => 'bg-gray-100 text-gray-800',
            };
        @endphp
        <span class="mt-2 inline-flex rounded-full px-3 py-1 text-sm font-medium {{ $statusClasses }}">
            {{ ucfirst($order->status) }}
        </span>
    </div>
</div>