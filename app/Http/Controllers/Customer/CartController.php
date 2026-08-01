<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use App\Services\CartService;
use DomainException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct(private CartService $cartService) {}
    public function index()
    {
       $cartDetails = $this->cartService->getUserCartDetails(Auth::id());
        
        return view('pages.cart.customer.index', $cartDetails);
    }

    public function increment(CartItem $cartItem)
    {
        try {
            $results = $this->cartService->incrementCartItemQuantity($cartItem);
            return response()->json($results);
        } catch (DomainException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function decrement(CartItem $cartItem) 
    {
        try {
            $results = $this->cartService->decrementCartItemQuantity($cartItem);
            return response()->json($results);
        } catch (DomainException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
    public function store(Request $request)
    {
        try {
            $results = $this->cartService->addToCart(Auth::id(), $request->product_id);
            return response()->json($results);
        } catch (DomainException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy(CartItem $cart)
    {
        $this->cartService->removeCartItem($cart, Auth::id());
        return back();
    }
}