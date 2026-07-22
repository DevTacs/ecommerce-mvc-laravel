<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Override;

#[Fillable([
    'product_id',
    'quantity'
])]
class CartItem extends Model
{
    use HasFactory;

    #[Override]
    protected function casts()
    {
        return [
            'quantity' => 'integer'
        ];
    }
    
    function user()
    {
        return $this->belongsTo(User::class);
    }

    function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}