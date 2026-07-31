<x-layouts.admin>
    @include('pages.orders.admin.index._orders_header')
    <div class="overflow-x-auto">
        <table class="min-w-full">
            @include('pages.orders.admin.index._table_header')           
            @include('pages.orders.admin.index._table_body')
        </table>
    </div>
    <div class="border-t bg-gray-50 px-6 py-4">
        {{ $orders->withQueryString()->links() }}
    </div>
</x-layouts.admin>