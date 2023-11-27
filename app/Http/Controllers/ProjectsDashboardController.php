<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Award;
use App\Models\Media;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Contracts\ApiResultHandler;

class ProjectsDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $projects = Project::all();
        $awards = Award::all();
        $users = User::all();
        
        // TODO: Create files array in the controller
        $files = Media::all()->sortByDesc('id');;

        return view('admin.dashboard', compact('projects', 'awards', 'users', 'files', 'user'));
    }

    public function list()
    {
        $projects = Project::all();

        foreach($projects as $index=>$pr){
            $awards = Award::where('project_id', $pr->id )->select('id')->get();
            $projects[$index]['count'] =  count($awards);
        }

        $user = auth()->user();

        return view('admin.projects.projects-dashboard', compact('projects', 'user'));
    }

    public function new()
    {

        $user = auth()->user();

        $project;
        $project['id'] = false; 
        $project['title'] = 'New'; 
        $project['status'] = 0; 
        $project['body'] = ''; 
        $project['description'] = ''; 
        $project['permalink'] = ''; 
        $project =  (object)$project;

        $awards = []; 
        $awardsCount = 0;

        return view('admin.projects.projects-new-dashboard', compact(['user', 'project', 'awards', 'awardsCount']));
    }

    public function edit($id)
    {
        $project = Project::find($id);

        $awards = Award::where('project_id', $id )
            ->select('id', 'product_id', 'type', 'title', 'media_id', 'status')
            ->orderby('updated_at', 'desc')
            ->get();
        
        $awardsCount = count($awards);       

        return view('admin.projects.projects-new-dashboard', compact('project', 'awards', 'awardsCount'));
    }

    public function setting()
    {
        $projects = Project::all();


        return view('admin.projects.projects-dashboard', compact('projects'));
    }

}