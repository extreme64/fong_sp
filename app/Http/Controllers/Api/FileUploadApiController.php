<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FileUploadApiController extends Controller
{
    public function store(Request $request)
    {
        $uploadedFiles = $request->file(); // Get all uploaded files

        $filePaths = [];
        $files = [];

        if (empty($uploadedFiles)) {
            return response()->json(
                [
                    "message" => "Save files to disk failed.",
                    "error" => "No file names proveded."
                ],
                500
            );
        }

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

        return response()->json(['message' => 'Images uploaded successfully', 'files' => $files], 200);
    }
}