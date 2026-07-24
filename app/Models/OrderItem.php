<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Override;

#[Fillable(['product_name', 'product_price', 'quantity'])]
class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    #[Override]
    protected function casts()
    {
        return [
            'product_price' => 'decimal:2',
            'quantity' => 'integer'
        ];
    }

    public function order() 
    {
        return $this->belongsTo(Order::class);
    }
}