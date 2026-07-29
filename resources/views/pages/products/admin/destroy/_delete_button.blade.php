<form action="{{ route('admin.products.destroy', $product) }}" method="POST">
    @csrf
    @method('DELETE')

    <button
        class="rounded-md bg-red-600 px-3 py-2 text-sm font-medium text-white transition hover:bg-red-700"
        type="submit"
        onclick="return confirm('Delete this product?')">
        Delete
    </button>
</form>