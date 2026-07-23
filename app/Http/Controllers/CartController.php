<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()
            ->cartItems()
            ->with('product')
            ->paginate(10);

        $cartTotal = Auth::user()
            ->cartItems()
            ->with('product')
            ->get()
            ->sum(function($item) {
                return $item->product->price * $item->quantity;
            });


        return view('cart.index', compact('cartItems', 'cartTotal'));
    }

    public function increment(CartItem $cartItem)
    {
        $cartItem->increment('quantity');
        
        $cartTotal = Auth::user()
            ->cartItems()
            ->with('product')
            ->get()
            ->sum(function($item) {
                return $item->product->price * $item->quantity;
            });
            
        $cartCount = Auth::user()
            ->cartItems()
            ->sum('quantity');
            
        return response()->json([
            'quantity' => $cartItem->quantity,
            'cartTotal' => $cartTotal,
            'cartCount' => $cartCount
        ]);
    }


    public function decrement(CartItem $cartItem) 
    {
        if($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            
            $cartTotal = Auth::user()
                ->cartItems()
                ->with('product')
                ->get()
                ->sum(function($item) {
                    return $item->product->price * $item->quantity;
            });       
        }
        $cartCount = Auth::user()
            ->cartItems()
            ->sum('quantity');
                
        return response()->json([
            'quantity' => $cartItem->quantity,
            'cartTotal' => $cartTotal,
            'cartCount' => $cartCount
        ]);
    }
    
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        
        $cartItem = Auth::user()
            ->cartItems()
            ->where('product_id', $product->id)
            ->first();
        
        if($cartItem) {
            $cartItem->increment('quantity');
        }else {
            Auth::user()->cartItems()->create([
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }
        $cartCount = Auth::user()->cartItems()->sum('quantity');

        return response()->json([
            'message' => 'Added to cart',
            'cartCount' => $cartCount
        ]);
    }

    public function destroy(CartItem $cart)
    {
        abort_if($cart->user_id !== Auth::id(), 403);

        $cart->delete();
        return back();
    }
}