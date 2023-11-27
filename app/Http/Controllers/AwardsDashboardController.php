<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Award;
use App\Models\Media;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Contracts\ApiResultHandler;
use Illuminate\Support\Facades\Storage;


class AwardsDashboardController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        $awards = Award::all();


        return view('admin.awards.awards-dashboard', compact('awards', 'user'));
    }

    public function edit($id)
    {
        $user = auth()->user();

        $award = Award::find($id);

        $projects = Project::all();

        $files = Media::all();

        $award_type_options = [
            (object) ['value' => '-1',           'text' => 'Pick type...',  'selected' => ''],
            (object) ['value' => 'achievement',  'text' => 'Achievement',   'selected' => ''],
            (object) ['value' => 'item',         'text' => 'Item',          'selected' => '']
        ];

        foreach($award_type_options as $at_option) {
           if(strtolower($at_option->text) === $award->type) {
                $at_option->selected = 'selected="true"';
            }
        }

        foreach($projects as $project) {
            $project->isChecked = ($project->id === $award->project_id) ? 'checked="checked"' : '';
        }

        foreach($files as $index => $file) {
            $file->isChecked = ( $award->media_id === $file->id ) ? 'checked="checked"' : '';
        }

        return view('admin.awards.awards-new-dashboard', compact('award', 'projects', 'files', 'user', 'award_type_options'));
    }


    public function create()
    {

        $projects = Project::all();

        $files = Media::all();

        $award_type_options = [
            (object) ['value' => '-1',           'text' => 'Pick type...',  'selected' => ''],
            (object) ['value' => 'achievement',  'text' => 'Achievement',   'selected' => ''],
            (object) ['value' => 'item',         'text' => 'Item',          'selected' => '']
        ];

        $award;
        $award['id'] = false; 
        $award['project_id'] = null;
        $award['product_id'] = null;
        $award['type'] = ''; 
        $award['title'] = 'New'; 
        $award['status'] = 0; 
        $award['body'] = ''; 
        $award['description'] = ''; 
        // $award['permalink'] = ''; 
        $award =  (object)$award;

        return view('admin.awards.awards-new-dashboard', compact(['award', 'projects', 'files', 'award_type_options']));
    }

    public function setting()
    {
        $user = auth()->user();

        $awards = Awards::all();

        return view('awards.projects-dashboard', compact(['awards', 'user']));
    }

}