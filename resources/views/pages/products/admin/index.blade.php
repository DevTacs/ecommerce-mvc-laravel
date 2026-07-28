<x-layouts.admin>
    @include('pages.products.admin.index._product_header')
    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                @include('pages.products.admin.index._table_head')
                @include('pages.products.admin.index._table_body')
            </table>
        </div>
    </div>
    <div class="bg-gray-50 px-6 py-4">
        {{ $products->links() }}
    </div>
</x-layouts.admin>