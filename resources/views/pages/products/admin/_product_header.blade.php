<div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
<div>
    <h1 class="text-3xl font-bold text-gray-900">
        Products
    </h1>
    <p class="mt-1 text-sm text-gray-500">
        Manage your product inventory.
    </p>
</div>
    <div class="flex flex-col gap-3 sm:flex-row">
        <form action="{{ route('admin.products.index') }}" method="GET">
            <div class="flex">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search products..."
                    class="w-64 rounded-l-lg border border-gray-300 px-4 py-2 focus:border-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-200">
                <button
                    type="submit"
                    class="rounded-r-lg bg-amber-700 px-5 text-white transition hover:bg-amber-800">
                    Search
                </button>
            </div>
        </form>
        <a
            href="{{ route('admin.products.create') }}"
            class="rounded-lg bg-amber-700 px-5 py-2 text-sm font-medium text-white transition hover:bg-amber-800">
            + Add Product
        </a>
    </div>
</div>