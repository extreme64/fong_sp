<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Contracts\ApiResultHandler;
use App\Http\Controllers\Controller;

class ProductApiController extends Controller
{
    public function create (Request $request)
    {
        
        $productObj =                  new Product();
        $productObj->title =           ($request->title) ?? '';
        $productObj->description =     ($request->description) ?? '';
        // $productObj->status =          (int)$request->isPublic;
        $productObj->media_id =        ($request->mediaId) ?? 1;
        $productObj->image_url =       '';
        $productObj->affiliate_url =   ($request->affiliateLink) ?? '';
        $productObj->created_at =      now();
        $productObj->updated_at =      now();
        
        // $award->permalink = ($request->permalink) ?? preg_replace('/\s+/', '-', strtolower(trim($request->title)));

        $status = $productObj->save();

        $payload = [
            'status' => true
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    public function update (Request $request, $product)
    {
        $productObj =                  Product::find($product);
        $productObj->title =           ($request->title) ?? '';
        $productObj->description =     ($request->description) ?? '';
        // $productObj->status =          (int)$request->isPublic;
        $productObj->media_id =        ($request->mediaId) ?? 1;
        $productObj->affiliate_url =   ($request->affiliateLink) ?? '';
        $productObj->updated_at =      now();
        
        // $award->permalink = ($request->permalink) ?? preg_replace('/\s+/', '-', strtolower(trim($request->title)));

        $status = $productObj->save();

        $payload = [
            'status' => true
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    public function destroy (Request $request, $product)
    {
        $productObj = Product::find($product);

        if (!$productObj) {
            return response()->json(['message' => 'Product not found'], ApiResultHandler::NOT_FOUND );
        }

        $status = $productObj->delete();

        $payload = [
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

}
