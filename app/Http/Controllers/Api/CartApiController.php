<?php

namespace App\Http\Controllers\Api;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    public function addToCart(Request $request)
{
    $request->validate([
        'user_id' => 'required',
        'product_id' => 'required',
        'quantity' => 'required|integer|min:1',
    ]);

    $existingCartItem = Cart::where('user_id', $request->user_id)
        ->where('product_id', $request->product_id)
        ->first();

    if ($existingCartItem) {
        $existingCartItem->update(['qty' => $request->qty]);
    } else {
        Cart::create($request->all());
    }

    return response()->json(['message' => 'Item added to cart'], 200);
}
}
