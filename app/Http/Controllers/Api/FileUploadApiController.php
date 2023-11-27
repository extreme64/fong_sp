<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadApiController extends Controller
{
    public function uploadImages(Request $request) {
        $uploadedFiles = $request->file(); // Get all uploaded files

        $filePaths = [];
        $files = [];

        foreach ($uploadedFiles as $key => $file) {
            $fileName = $file->store('public/images'); // Store to public/images directory

            $name = basename($fileName);
            $memeType = $file->getMimeType();

            $files[] = [
               'name' => $name,
               'path' => 'images/' . $name,
               'memeType' => $memeType
            ];
        }

        return response()->json(['message' => 'Images uploaded successfully', 'files' => $files]);
    }
}