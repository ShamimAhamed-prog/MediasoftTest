<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Fetch all products from the database
        
        $products->transform(function ($product) {
            $product->image_url = asset('images/products/' . $product->image);
            return $product;
        });
        return response()->json(['products' => $products], 200);
    }
}
