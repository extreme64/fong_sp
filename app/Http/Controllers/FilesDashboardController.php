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
        
        $files = Media::all(['id', 'full_name', 'wrap', 'updated_at'])->sortByDesc('id');
        
        return view('admin.medias.files-dashboard', compact('files', 'user'))
            ->with(['mediaPath' => $this->craftPath(MediaConstants::PATH_ROOT)]);
    }

    public function create()
    {
        $user = auth()->user();

        $new_file = [];
        $new_file['id'] = null; 
        $new_file['full_name'] = 'New File';
        $new_file['type'] = '';
        $new_file['description'] = '';
        $new_file['wrap'] = ''; 
        $new_file['meme_type'] = ''; 
        
        $file =  null;
            
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
