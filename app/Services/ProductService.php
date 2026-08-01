<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function __construct(private ProductRepository $productRepository) {}

    public function getAllProducts(?string $search)
    {
        return $this->productRepository->getAllProducts($search);
    }

    public function createProduct($image, array $validated)
    {
        $path = $image->store('products', 'public');
        $this->productRepository->createProduct($path, $validated);
    }

    public function updateProduct(Product $product, $image, array $validated)
    {
        if ($image) {
            if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
                Storage::disk('public')->delete($product->image_url);
            }

            $validated['image_url'] = $image->store('products', 'public');
        }
        
        $this->productRepository->updateProduct($product->id, $validated);
    }

    public function deleteProduct(Product $product) 
    {
        Storage::disk('public')->delete($product->image_url);

        $this->productRepository->deleteProduct($product->id);
    }
}