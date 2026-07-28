<x-layouts.admin>
<<<<<<< HEAD
    @include('pages.products.admin.index._product_header')
    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                @include('pages.products.admin.index._table_head')
                @include('pages.products.admin.index._table_body')
=======
    @include('pages.products.admin._product_header')
    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                @include('pages.products.admin._table_head')
                @include('pages.products.admin._table_body')
>>>>>>> b98bfc0aa2c6812f59f6d2e25d83ed2a3d543d20
            </table>
        </div>
    </div>
    <div class="bg-gray-50 px-6 py-4">
        {{ $products->links() }}
    </div>
</x-layouts.admin>