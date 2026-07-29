<x-layouts.admin>
    <div class="mx-auto w-full max-w-3xl px-4">
        @include('pages.products.admin._back_products_button')
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
            @include('pages.products.admin.edit._card_header')
            @include('pages.products.admin.edit._edit_form')
        </div>
    </div>
</x-layouts.admin>