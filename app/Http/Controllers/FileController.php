<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    public function showImage( $filename ) {
         
        $path = storage_path('app/public/images/' . $filename);

        if (!File::exists($path)) {
            return false;
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = response($file, 200);
        $response->header('Content-Type', $type);

        return $response;
    }
}
