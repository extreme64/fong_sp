<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Constants\Media AS MediaConstants;
use App\Traits\MediaPathTrait;
use Illuminate\Support\Facades\Storage;

class FilesDashboardController extends Controller
{
    use MediaPathTrait;

    public function index()
    {
        $user = auth()->user();
        
        $files = Media::all()->sortByDesc('id');
        
        return view('admin.medias.files-dashboard', compact('files', 'user'))
            ->with(['mediaPath' => $this->craftPath(MediaConstants::PATH_ROOT)]);
    }

    /**
     * Turn into a method for folder file listing
     * 
     * @depricated
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index_folder_list()
    {
        $user = auth()->user();

        // TODO: Get media files from DB, not folder file list.
        $files = Storage::files('public/images');        
        $fileNames = array_map('basename', $files);
        $fileInfo = NULL;

        foreach($fileNames as $index => $file) {
            $filePath = public_path(MediaConstants::PATH_ROOT . $file);
            
            $mime = mime_content_type($filePath);
            
            $fileInfo = pathinfo($filePath);
            $fileName = $fileInfo['filename'];
            $fileExtension = $fileInfo['extension'];
            
            $fileInfoArr[] = (object) [
                'id' => ++$index,
                'fullName' => $file,
                'name' => $fileName,
                'memeType' => $mime
            ];

        }
        
        $fileInfo = (object) $fileInfoArr;
        
        return view('admin.medias.files-dashboard', compact('fileInfo', 'user'));
    }

    public function create()
    {
        $user = auth()->user();

        $new_file = [];
        $new_file['id'] = false; 
        $new_file['full_name'] = 'New File';
        $new_file['type'] = '';
        $new_file['description'] = '';
        $new_file['wrap'] = ''; 
        $new_file['meme_type'] = ''; 
        
        $file =  (object)$new_file;

        return view('admin.medias.files-new-dashboard', compact('file', 'user'));
    }

    public function edit($id)
    {
        $user = auth()->user();

        $file = Media::find($id);

        return view('admin.medias.files-new-dashboard', compact('file', 'user'))
            ->with(['mediaPath' => $this->craftPath(MediaConstants::PATH_ROOT)]);
    }
}
