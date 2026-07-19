<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cartItems = Auth::user()
            ->cartItems()
            ->with('product')
            ->paginate(10);

        return view('cart.index', compact('cartItems'));
    }

    public function increment(CartItem $cartItem)
    {
        $cartItem->increment('quantity');
        
        return response()->json([
            'quantity' => $cartItem->quantity
        ]);
    }


    public function decrement(CartItem $cartItem) 
    {
        if($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        }

        return response()->json([
            'quantity' => $cartItem->quantity
        ]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Cart $cart)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Cart $cart)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Cart $cart)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Cart $cart)
    // {
    //     //
    // }
}