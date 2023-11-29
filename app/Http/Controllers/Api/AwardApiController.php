<?php

namespace App\Http\Controllers\Api;

use App\Models\Award;
use Illuminate\Http\Request;
use App\Contracts\ApiResultHandler;
use App\Http\Controllers\Controller;

class AwardApiController extends Controller
{

    public function createAward (Request $request) {
    
        $award = new Award();
        $award->project_id = $request->projectId;
        $award->title = ($request->title) ?? '';
        $award->description = ($request->description) ?? '';
        $award->type = ($request->awardType) ?? '';
        // $award->permalink = ($request->permalink) ?? preg_replace('/\s+/', '-', strtolower(trim($request->title)));
        $award->status = (int)$request->isPublic;
        $award->media_id = ($request->mediaId) ?? 1;
        $award->product_id = $request->productId;
        $award->updated_at = now();

        $status = $award->save();
        
        $payload = [
            'status' => true
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }
    
    public function updateAward (Request $request, $id)
    {
        $award = Award::find($id);

        $award->project_id = $request->projectId;
        $award->title = ($request->title) ?? '';
        $award->description = ($request->description) ?? '';
        $award->type = ($request->awardType) ?? '';
        // $award->permalink = ($request->permalink) ?? preg_replace('/\s+/', '-', strtolower(trim($request->title)));
        $award->status = (int)$request->isPublic;
        $award->media_id = ($request->mediaId) ?? 1;
        $award->product_id = $request->productId;
        $award->updated_at = now();

        $status = $award->save();

        $payload = [
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    public function deleteAward (Request $request, $id)
    {
        $award = Award::find($id);

        if (!$award) {
            return response()->json(['message' => 'Award not found'], ApiResultHandler::NOT_FOUND );
        }

        $status = $award->delete();

        $payload = [
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }
}
