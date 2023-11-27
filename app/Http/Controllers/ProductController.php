<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product', compact('product'));
    }

    public function redirect($id)
    {
        $product = Product::findOrFail($id);

        // TODO: Perform any additional logic here (e.g., tracking clicks, etc.)
        
        return redirect()->away($product->affiliate_url);
    }
}
