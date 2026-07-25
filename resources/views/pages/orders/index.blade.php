<x-layouts.app>
    <div class="space-y-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                My Orders
            </h1>

            <p class="mt-2 text-gray-600">
                View your previous purchases and track their current status.
            </p>
        </div>
            {{-- Desktop Table --}}
            @include('pages.orders.index._desktop_table')
            {{-- Mobile Cards --}}
            @include('pages.orders.index._mobile_table')
        <div class="w-full mt-8">
            {{ $orders->links() }}
        </div>
    </div>
</x-layouts.app>