<div class="space-y-4 p-4 md:hidden">
    @forelse ($orderItems as $item)
        <div class="rounded-lg border border-gray-200 p-4">
            <div class="flex gap-4">
                <img
                    src="{{asset($item->image_url)}}"
                    alt="{{ $item->product_name }}"
                    class="h-20 w-20 rounded-lg object-cover border"
                >
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-900">
                        {{ $item->product_name }}
                    </h3>
                    <div class="mt-3 space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500">
                                Price
                            </span>

                            <span>
                                ₱{{ number_format($item->product_price, 2) }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">
                                Quantity
                            </span>
                            <span>
                                {{ $item->quantity }}
                            </span>
                        </div>

                        <div class="flex justify-between border-t pt-2 font-semibold">
                            <span>
                                Subtotal
                            </span>
                            <span>
                                ₱{{ number_format($item->product_price * $item->quantity, 2) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="py-12 text-center text-gray-500">
            No items found for this order.
        </div>
    @endforelse
        <div class="w-full mb-8">
            {{$orderItems->links()}}
        </div>
</div