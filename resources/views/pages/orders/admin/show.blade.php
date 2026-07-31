<x-layouts.admin>
    <div class="space-y-6">        
        @include('pages.orders.admin.show._order_header')
        @include('pages.orders.admin.show._order_summary')
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                @include('pages.orders.admin.show._table_header')
                @include('pages.orders.admin.show._table_body')
            </table>
            <div class="border-t border-gray-200 px-6 py-4">
                {{ $orderItems->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin>