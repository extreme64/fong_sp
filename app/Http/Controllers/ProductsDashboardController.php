<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Product;
use App\Traits\MediaPathTrait;
use App\Constants\Media AS MediaConstants;

class ProductsDashboardController extends Controller
{
    use MediaPathTrait;

    public function list()
    {
        $products = Product::all();

        return view('admin.products.products-dashboard', compact('products'))
            ->with(['mediaPath' => $this->craftPath(MediaConstants::PATH_ROOT)]);
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


        return view('admin.products.products-new-dashboard', compact(['product', 'files']))
            ->with(['mediaPath' => $this->craftPath(MediaConstants::PATH_ROOT)]);
    }

    public function edit($id)
    {
        $product = Product::find($id);    
        
        $files = Media::all();

        foreach($files as $file) {
            $file->isChecked = ($file->id === $product->media_id) ? 'checked="checked"' : '';
        }


        return view('admin.products.products-new-dashboard', compact('product', 'files'))
            ->with(['mediaPath' => $this->craftPath(MediaConstants::PATH_ROOT)]);
    }

    public function setting()
    {
        // return view('', compact(''));
    }
}
