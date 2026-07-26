<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Override;

#[Fillable(['name', 'stock', 'price', 'image_url'])]
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    #[Override]
    protected function casts()
    {
        return [
            'stock' => 'integer',
            'quantity' => 'decimal:2'
        ];
    }

    function cartItems() 
    {
        return $this->hasMany(CartItem::class);
    }
}