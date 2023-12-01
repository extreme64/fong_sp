<?php

namespace App\Http\Controllers\Api;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Contracts\ApiResultHandler;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MediaApiController extends Controller
{

    public function store (Request $request) {
    
        $fileNamesRaw           = explode(",", $request->dragDropUploadFiles);
        $batchFilesAlt          = $request->fileAlt;
        $batchFilesDescription  = $request->fileDescription; 
        
        
        $fileNames = array_filter($fileNamesRaw, function ($value) {
            return $value !== '' && $value !== ' ';
        });
        
        $new_media_ids = [];
      
        foreach ($fileNames as $key => $file_name_string) {
            
            $name_meme_parts    = explode('|', $file_name_string);
            $name_ext_string    = $name_meme_parts[0];
            $wrap               = $name_meme_parts[1];
            
            $name_parts     = explode('.', $name_ext_string);
            $name           = $name_parts[0];
            $extension      = $name_parts[1];
            
            $type = match(true) {
                str_starts_with($wrap, 'image') => 'image',
                str_starts_with($wrap, 'video') => 'video',
                default => 'other'
            };

            // TODO: Escape strings for new media entry.
            $mediaObj                      = new Media;
            $mediaObj->uploaded_user_id    = auth()->user()->id;
            $mediaObj->full_name           = trim($name) . '.' . $extension;
            $mediaObj->extension           = trim($extension);
            $mediaObj->wrap                = trim($wrap);
            $mediaObj->type                = $type;
            $mediaObj->description         = trim($batchFilesDescription);
            $mediaObj->created_at          = now();
            $mediaObj->updated_at          = now();

            $mediaObj->save();            
            $new_media_ids[] = $mediaObj->id;
        }

        $payload = [
            'ids' => $new_media_ids
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS);
    }

    public function index (Request $request) {

        $medias = Media::all();

        $payload = [
            'medias' => $medias
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS);
    }

    public function update (Request $request, $medium) {

        if (!$medium) {
            return response()->json([
                'message' => 'Item ID has not benn supplied.'
            ], ApiResultHandler::BAD_REQUEST );
        }

        // TODO: Escape strings for new media entry.
        $mediaObj                  = Media::find($medium);
        $mediaObj->description     = trim($request->fileDescription);
        $mediaObj->updated_at      = now();
        // $mediaObj->alt     = $request->fileAlt;

        $status = $mediaObj->save();            

        $payload = [
            'id' => $media,
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS);
    }

    public function destroy (Request $request, $medium) {

        $in_storage = true;
        $status_storage = false;

        if (!$medium) {
            return response()->json([
                'message' => 'Item ID has not benn supplied.'
            ], ApiResultHandler::BAD_REQUEST );
        }
        
        $mediaObj = Media::find($medium);

        if (!$mediaObj) {
            return response()->json([
                'message' => 'Item not found in database.'
            ], ApiResultHandler::NOT_FOUND );
        }

        $path_file_to_remove = storage_path("app\public\images\\") . $mediaObj->full_name;
        
        try {
            if(!file_exists($path_file_to_remove)) {
                // return response()->json([
                //     'message' => 'File dose not exists on server.'
                // ], ApiResultHandler::NOT_FOUND);
                $in_storage = false;
            } else {
                $status_storage = unlink(storage_path('app/public/images/' . $mediaObj->full_name));
                
                if(!$status_storage) {
                    return response()->json([
                        'message' => 'Media can not be removed from server.'
                    ], ApiResultHandler::INTERNAL_SERVER_ERROR);
                }
            }

        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e
            ], ApiResultHandler::INTERNAL_SERVER_ERROR);
        }

        $status = $media->delete();

        $payload = [
            'id' => $media,
            'inStorage' => $in_storage,
            'statusStorageRemoved' => $status_storage,
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS);
    }
}
