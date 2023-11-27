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
        
        $product =                  new Product();
        $product->title =           ($request->title) ?? '';
        $product->description =     ($request->description) ?? '';
        // $product->status =          (int)$request->isPublic;
        $product->media_id =        ($request->mediaId) ?? 1;
        $product->image_url =       '';
        $product->affiliate_url =   ($request->affiliateLink) ?? '';
        $product->created_at =      now();
        $product->updated_at =      now();
        
        // $award->permalink = ($request->permalink) ?? preg_replace('/\s+/', '-', strtolower(trim($request->title)));

        $status = $product->save();

        $payload = [
            'status' => true
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    public function update (Request $request, $id)
    {
        $product =                  Product::find($id);
        $product->title =           ($request->title) ?? '';
        $product->description =     ($request->description) ?? '';
        // $product->status =          (int)$request->isPublic;
        $product->media_id =        ($request->mediaId) ?? 1;
        $product->affiliate_url =   ($request->affiliateLink) ?? '';
        $product->updated_at =      now();
        
        // $award->permalink = ($request->permalink) ?? preg_replace('/\s+/', '-', strtolower(trim($request->title)));

        $status = $product->save();

        $payload = [
            'status' => true
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    public function delete (Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], ApiResultHandler::NOT_FOUND );
        }

        $status = $product->delete();

        $payload = [
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    public function productRemoveAward (Request $request, $awardId) {
        
    }
}
