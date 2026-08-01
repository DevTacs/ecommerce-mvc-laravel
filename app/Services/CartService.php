<?php

namespace App\Services;

use App\Models\CartItem;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use DomainException;

class CartService
{
    public function __construct(private CartRepository $cartRepository, private ProductRepository $productRepository){}

    public function getUserCartDetails(int $userId)
    {
        $cartItems = $this->cartRepository->getCartItemsByUserId($userId);
        $cartTotal = $this->cartRepository->getCartItemsTotalByUserId($userId);

        return [
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
        ];
    }

    public function incrementCartItemQuantity(CartItem $cartItem)
    {
        if ($cartItem->quantity >= $cartItem->product->stock) throw new DomainException('Maximum stock reached.');
        $this->cartRepository->incrementCartItemQuantity($cartItem);
        $cartTotal = $this->cartRepository->getCartItemsTotalByUserId($cartItem->user_id);
        $cartCount = $this->cartRepository->getCartCountByUserId($cartItem->user_id);        

        return [
            'quantity' => $cartItem->quantity,
            'subTotal' => $cartItem->product->price * $cartItem->quantity,
            'cartTotal' => $cartTotal,
            'cartCount' => $cartCount
        ];
    }

    public function decrementCartItemQuantity(CartItem $cartItem)
    {
        if($cartItem->quantity <= 1) throw new DomainException('Quantity cannot be less than 1.'); 

        $this->cartRepository->decrementCartItemQuantity($cartItem);
        $cartTotal = $this->cartRepository->getCartItemsTotalByUserId($cartItem->user_id);
        $cartCount = $this->cartRepository->getCartCountByUserId($cartItem->user_id);

        return [
            'quantity' => $cartItem->quantity,
            'subTotal' => $cartItem->product->price * $cartItem->quantity,
            'cartTotal' => $cartTotal,
            'cartCount' => $cartCount
        ];
    }

    public function addToCart(int $userId, int $productId)
    {
        $product = $this->productRepository->getProductById($productId);
        if($product->stock <= 0 ) throw new DomainException('Product is out of stock.');

        $cartItem = $this->cartRepository->getCartItemByUserId($userId, $productId);

        if($cartItem) {
            if($cartItem->quantity >= $product->stock) throw new DomainException('Maximum stock reached.');
               $this->cartRepository->incrementCartItemQuantity($cartItem);
        }else {
            $this->cartRepository->addCartItemToCart($userId, $productId);
        }
        
        $cartCount = $this->cartRepository->getCartCountByUserId($userId);
        
        return [
            'message' => 'Added to cart',
            'cartCount' => $cartCount
        ];
    }

    public function removeCartItem(CartItem $cart, int $userId)
    {
        abort_if($cart->user_id !== $userId, 403);

        $this->cartRepository->removeCartItem($cart);
    }
}