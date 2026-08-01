@if($products->isNotEmpty() > 0) 
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
        @foreach ($products as $product)
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="h-56 w-full object-cover" loading='lazy'>

                <div class="p-4">
                    <h2 class="mb-2 line-clamp-2 text-lg font-semibold text-gray-900">
                        {{ $product->name }}
                    </h2>

                    <div class="mb-3 flex items-center justify-between">
                        <span class="text-sm text-gray-500">
                            Stock: {{ $product->stock }}
                        </span>

                        <span class="rounded-full px-2 py-1 text-xs font-medium {{$product->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}}">
                            {{$product->stock > 0 ? 'Available' : 'Out of Stock'}}
                        </span>
                    </div>
                </div>

                <div class="px-4 mb-4">
                    <span class="text-2xl font-bold text-amber-700">
                        ₱{{ number_format($product->price, 2) }}
                    </span>
                </div>

                <button @disabled($product->stock <= 0)
                    onclick="addToCart({{ $product->id }})"
                    id="btn-cart"
                    class="w-full rounded-lg bg-amber-700 py-2.5 font-medium text-white transition
                    hover:bg-amber-800
                    disabled:bg-gray-400
                    disabled:text-gray-200
                        disabled:cursor-not-allowed
                    disabled:hover:bg-gray-400
                        disabled:opacity-60">
                    Add to Cart
                </button>
            </div>
        @endforeach
    </div>
@else 
    @include('pages.products.customer.index._empty_state')
@endif

<script>
async function addToCart(product_id) {
    try {
        const response = await fetch(`/cart`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                product_id: product_id
            })
        })
        const data = await response.json()

        if (!response.ok) {
            alert(data.error || 'An error occurred while adding the product to the cart.');
            return;
        }

        const badge = document.getElementById('cartCount');
        badge.textContent = data.cartCount;

        if (data.cartCount > 0) {
            badge.classList.remove('hidden');
        } else {
            badge.classList.add('hidden');
        }
    } 
    catch (error) {
        alert('An error occurred while adding the product to the cart.');
        console.log(error);
        return;
    }
}    
</script>