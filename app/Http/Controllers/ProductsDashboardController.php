<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsDashboardController extends Controller
{

    public function list()
    {
        $products = Product::all();

        return view('admin.products.products-dashboard', compact('products'));
    }

    public function new()
    {
        // $awards = Award::all();

        $files = Media::all();

        $product = new Product();
        $product['id'] = false; 
        $product['title'] = 'New'; 
        $product['status'] = 0; 
        $product['description'] = ''; 
        $product['permalink'] = ''; 
        $product['affiliate_url'] = ''; 
        $product =  (object)$product;


        return view('admin.products.products-new-dashboard', compact(['product', 'files']));
    }

    public function edit($id)
    {
        $product = Product::find($id);    
        
        $files = Media::all();

        foreach($files as $file) {
            $file->isChecked = ($file->id === $product->media_id) ? 'checked="checked"' : '';
        }


        return view('admin.products.products-new-dashboard', compact('product', 'files'));
    }

    public function setting()
    {
        // return view('', compact(''));
    }
}
