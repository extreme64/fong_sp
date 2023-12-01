<?php

namespace App\Http\Controllers\Api;

use App\Models\Award;
use Illuminate\Http\Request;
use App\Contracts\ApiResultHandler;
use App\Http\Controllers\Controller;

class AwardApiController extends Controller
{

    public function store (Request $request) {
    
        $awardObj = new Award();
        $awardObj->project_id = $request->projectId;
        $awardObj->title = ($request->title) ?? '';
        $awardObj->description = ($request->description) ?? '';
        $awardObj->type = ($request->awardType) ?? '';
        // $awardObj->permalink = ($request->permalink) ?? preg_replace('/\s+/', '-', strtolower(trim($request->title)));
        $awardObj->status = (int)$request->isPublic;
        $awardObj->media_id = ($request->mediaId) ?? 1;
        $awardObj->product_id = $request->productId;
        $awardObj->updated_at = now();

        $status = $awardObj->save();
        
        $payload = [
            'status' => true
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }
    
    public function update (Request $request, $award)
    {
        $awardObj = Award::find($award);

        $awardObj->project_id = $request->projectId;
        $awardObj->title = ($request->title) ?? '';
        $awardObj->description = ($request->description) ?? '';
        $awardObj->type = ($request->awardType) ?? '';
        // $awardObj->permalink = ($request->permalink) ?? preg_replace('/\s+/', '-', strtolower(trim($request->title)));
        $awardObj->status = (int)$request->isPublic;
        $awardObj->media_id = ($request->mediaId) ?? 1;
        $awardObj->product_id = $request->productId;
        $awardObj->updated_at = now();

        $status = $awardObj->save();

        $payload = [
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    public function destroy (Request $request, $award)
    {
        $awardObj = Award::find($award);

        if (!$awardObj) {
            return response()->json(['message' => 'Award not found'], ApiResultHandler::NOT_FOUND );
        }

        $status = $awardObj->delete();

        $payload = [
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }
}
