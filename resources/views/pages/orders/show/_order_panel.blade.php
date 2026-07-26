@php
    $statusClasses = match (ucfirst($order->status)) {
        'Pending' => 'bg-yellow-100 text-yellow-800',
        'Completed' => 'bg-green-100 text-green-800',
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