<x-layouts.app>
<div class="space-y-8">
    <div>
        <a
            href="{{ route('orders.index') }}"
            class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:border-amber-700 hover:text-amber-700">
            ← Back to Orders
        </a>
    </div>
    @include('pages.orders.customer.show._order_panel')

    <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="border-b border-gray-200 px-6 py-4">
            <h2 class="text-lg font-semibold text-gray-900">
                Order Items
            </h2>
        </div>
        {{-- Desktop Table --}}
        @include('pages.orders.customer.show._desktop_table')
        
        {{-- Mobile Cards --}}
        @include('pages.orders.customer.show._mobile_table')
    </div>
</div>
</x-layouts.app>