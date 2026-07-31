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
                <div class="relative">
                    <svg
                        class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                    </svg>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search products..."
                        class="w-64 rounded-l-lg border border-gray-300 py-2 pl-10 pr-4 focus:border-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-200">
                </div>
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