
<script>
async function addToCart(product_id) {
    const response = await fetch(`/cart`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            product_id: product_id
        })
    })
    const data = await response.json()
    const badge = document.getElementById('cartCount');
    badge.textContent = data.cartCount;

    if (data.cartCount > 0) {
        badge.classList.remove('hidden');
    } else {
        badge.classList.add('hidden');
    }
}    
</script>