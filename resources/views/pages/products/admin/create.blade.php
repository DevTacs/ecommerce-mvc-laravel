<x-layouts.admin>
    <div class="mx-auto w-full max-w-3xl px-4">
        <!-- Back Button -->
       @include('pages.products.admin.create._back_products_button')
        <!-- Card -->
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <!-- Header -->
           @include('pages.products.admin.create._card_header')

            <!-- Form -->
            @include('pages.products.admin.create._create_form')
        </div>
    </div>
</x-layouts.admin>