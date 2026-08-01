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
}