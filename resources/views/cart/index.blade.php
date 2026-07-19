<x-layouts.app>
<div class="w-full max-w-6xl">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            My Cart
        </h1>

        <p class="mt-2 text-gray-500">
            Review and manage the items in your cart.
        </p>
    </div>

    <div class="space-y-4">

        @forelse($cartItems as $item)
            <div class="flex flex-col gap-4 rounded-xl border border-gray-200 bg-white p-4 shadow-sm md:flex-row md:items-center">
                <img
                    src="{{ $item->product->image_url }}"
                    alt="{{ $item->product->name }}"
                    class="h-32 w-full rounded-lg object-cover md:w-32"
                    loading="lazy">

                <div class="flex-1">

                    <h2 class="text-lg font-semibold text-gray-900">
                        {{ $item->product->name }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Unit Price: ₱{{ number_format($item->product->price, 2) }}
                    </p>

                    <p class="mt-2 text-lg font-bold text-amber-700">
                        ₱{{ number_format($item->product->price * $item->quantity, 2) }}
                    </p>

                </div>

            <div class="flex items-center gap-3">
                <button type="submit" 
                class="flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 text-lg font-semibold hover:bg-gray-100"
                onclick="decrement({{$item->id}})">
                    −
                </button>

                <span id="quantity-{{$item->id}}" class="min-w-[40px] text-center text-lg font-semibold">
                    {{ $item->quantity }}
                </span>

                
                <button type="submit" 
                class="flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 text-lg font-semibold hover:bg-gray-100"
                onclick="increment({{$item->id}})">
                    +
                </button>

            </div>

            </div>

        @empty
            <div class="rounded-xl border border-dashed border-gray-300 bg-white p-10 text-center">
                <p class="text-gray-500">
                    Your cart is empty.
                </p>
            </div>
        @endforelse
        <div class="mt-8">
            {{ $cartItems->links() }}
        </div>
    </div>
</div>

<script>
    async function increment(itemId) {
        const response = await fetch(`/cart/${itemId}/increment`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        const data = await response.json();
        document.getElementById(`quantity-${itemId}`).textContent = data.quantity
    }

    async function decrement(itemId) {
        console.log(itemId)
        const response = await fetch(`/cart/${itemId}/decrement`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })

        const data = await response.json()
        document.getElementById(`quantity-${itemId}`).textContent = data.quantity
    }
</script>
</x-layouts.app>