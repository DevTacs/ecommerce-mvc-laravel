<div class="flex flex-row justify-between">
    <div class="flex flex-col items-start justify-between">
        <a href="{{ route('admin.orders.index') }}"
            class="text-sm font-medium text-amber-700 hover:text-amber-800">
            ← Back to Orders
        </a>
        <h1 class="mt-2 text-2xl font-bold text-gray-900">
            {{ $order->order_number }}
        </h1>
        <p class="mt-1 text-sm text-gray-500">
            Order Details
        </p>
    </div>
</div>