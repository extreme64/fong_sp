<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Media;

use App\Models\Project;
use App\Models\ProjectQuest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Constants\ProjectFrontThemes;
use App\Constants\ProjectAttributeKeys;
use App\Http\Controllers\AwardController;

class DashController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($projectId=1)
    {
        $place_holder_id = 1;
        
        $user = Auth::user();

        $userAPIaccessToken = $user->api_token;
        $showingProjectId = $projectId;
        $userProjects = Project::all();
        
        
        $projectUserSetup = [];

        $project = Project::findOrFail($projectId);
        $userProjectAttributes = $project->attributes()
            ->where('user_id', $user->id)
            ->get();
        
        foreach ($userProjectAttributes as $attribute) 
        {    
            $awardId = $attribute->attribute_value;
            $awardAsAttrInfo = Award::find($awardId);
            $awardFileName = $awardAsAttrInfo->image_path;

            $attributeKey = $attribute->attribute_key;
            
            switch($attributeKey) {
                case ProjectAttributeKeys::AVATAR_ID :
                    $projectUserSetup['avatarId'] = $awardId;
                    $projectUserSetup['avatarTitle'] = $awardAsAttrInfo->title;
                    $projectUserSetup['avatarImg'] = $awardFileName;
                    break;
                case ProjectAttributeKeys::TERMINAL_ID :
                    $projectUserSetup['terminalId'] = $awardId;
                    $projectUserSetup['terminalTitle'] = $awardAsAttrInfo->title;
                    $projectUserSetup['terminalImg'] = $awardFileName;
                    break;
                case ProjectAttributeKeys::BACKGROUND_ID :
                    $projectUserSetup['backgroundId'] = $awardId;
                    $projectUserSetup['backgroundTitle'] = $awardAsAttrInfo->title;
                    $projectUserSetup['backgroundImg'] = $awardFileName;
                    break;
                case ProjectAttributeKeys::THEME_ID :
                    $projectUserSetup['theme'] = $awardId;
                    break;
            }
        }


        $themesUIOptions = '';
        
        $themesData = ProjectFrontThemes::THEMES;
        foreach ($themesData as $keyTheme => $valueTheme) 
        {
            $isSelected = ($keyTheme == $projectUserSetup['theme']) ? "selected" : '';
            $themesUIOptions .= "<option value='{$keyTheme}' ${isSelected} >{$valueTheme['title']}</option>";
        }
        

        $projectsQuests = ProjectQuest::select('title', 'score', 'level', 'status', 'created_at', DB::raw('IFNULL(done_at, "NA") as done_at'), 'abilities_used')
            ->where('project_id', $projectId)
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('account.dash', compact('user', 'userProjects', 'userProjectAttributes', 'projectUserSetup', 'showingProjectId', 'userAPIaccessToken', 'themesUIOptions', 'projectsQuests' ));
    }

    /**
     * Show the awards
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function awards()
    {
        $userAwards = auth()->user()->awards;
        
        return view('user-awards', compact('userAwards'));
    }


}
