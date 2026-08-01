<?php

namespace App\Repositories;

use App\Models\CartItem;
use App\Models\User;

class CartRepository
{
    public function getCartItemsByUserId(int $userId) 
    {
        $cartItems = User::find($userId)
            ->cartItems()
            ->with('product')
            ->paginate(10);
            
        return $cartItems;
    }

    public function getCartItemsTotalByUserId(int $userId) 
    {
        $cartTotal = User::find($userId)
            ->cartItems()
            ->with('product')
            ->get()
            ->sum(function($item) {
                return $item->product->price * $item->quantity;
            });
        
        return $cartTotal;
    }

    public function incrementCartItemQuantity(CartItem $cartItem)
    {
        $cartItem->increment('quantity');
    }

    public function getCartCountByUserId(int $userId)
    {
        $cartCount = User::find($userId)
            ->cartItems()
            ->sum('quantity');
        
        return $cartCount;
    }

    public function decrementCartItemQuantity(CartItem $cartItem)
    {
        $cartItem->decrement('quantity');
    }

    public function getCartItemByUserId(int $userId, int $productId)
    {
        $cartItem = CartItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
            
        return $cartItem;
    }

    public function addCartItemToCart(int $userId, int $productId)
    {
        User::find($userId)
            ->cartItems()
            ->create([
                'product_id' => $productId,
                'quantity' => 1
            ]);
    }

    public function removeCartItem(CartItem $cartItem)
    {
        $cartItem->delete();
    }
}