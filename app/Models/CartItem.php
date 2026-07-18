<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Override;

#[Fillable(['quantity'])]
class CartItem extends Model
{
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