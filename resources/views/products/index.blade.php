<x-layouts.app>
    <div class="mx-auto w-full max-w-7xl">

    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                Products
            </h1>

            <p class="mt-2 text-gray-500">
                Browse our available products.
            </p>
        </div>

        <form action="{{ route('products.index') }}" method="GET" class="w-full md:w-auto">
            <div class="flex gap-2">

                <input
                    type="text"
                    name="search"
                    id="search"
                    value="{{ request('search') }}"
                    placeholder="Search products..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-amber-600 focus:ring-2 focus:ring-amber-200 md:w-72">

                <button
                    type="submit"
                    class="rounded-lg bg-amber-700 px-5 py-2.5 font-medium text-white transition hover:bg-amber-800">
                    Search
                </button>

            </div>
        </form>
    </div>
        
        @if($products->count() > 0) 
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            @foreach ($products as $product)
                <x-products.product-card :product='$product'/>
            @endforeach  
            @if($products->count() > 0)
                <div class="w-full mt-8">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
               
        @else 
            <div class="p-10 text-center">
                <p class="text-gray-500">
                Products is empty.
                </p>
            </div>
        @endif
        
    </div>
</x-layouts.app>