<div class="flex flex-col gap-4 border-b border-gray-200 px-6 py-5 lg:flex-row lg:items-center lg:justify-between">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">
            Orders
        </h1>
        <p class="mt-1 text-sm text-gray-500">
            View and manage customer orders.
        </p>
        <p class="mt-2 text-sm font-medium text-gray-700">
            Total: {{ $orders->total() }} orders
        </p>
    </div>
    <form
        action="{{ route('admin.orders.index') }}"
        method="GET"
        class="flex w-full max-w-md">
        <div class="relative flex-1">
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
                placeholder="Search order number..."
                class="w-full rounded-l-lg border border-gray-300 py-2 pl-10 pr-4 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500">
        </div>
        <button
            class="rounded-r-lg bg-amber-700 px-5 text-white transition hover:bg-amber-800">
            Search
        </button>
    </form>
</div>