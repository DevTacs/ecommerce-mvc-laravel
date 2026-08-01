<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAllProducts(?string $search)
    {
        $query = Product::query();

        if($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->paginate(10);
    }

    public function getProductById(int $productId)
    {
        return Product::findOrFail($productId);
    }

    public function createProduct($path, array $validated)
    {
        Product::create([
            'image_url' => $path,
            'name' => $validated['name'],
            'stock' => $validated['stock'],
            'price' => $validated['price']
        ]);
    }

    public function updateProduct(int $productId, array $validated)
    {
        $product = Product::findOrFail($productId);
        $product->update($validated);
    }

    public function deleteProduct(int $productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();
    }
}