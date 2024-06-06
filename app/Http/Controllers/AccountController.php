<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Award;
use App\Models\Project;
use App\Models\ProjectQuest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Constants\ProjectFrontThemes;
use App\Constants\ProjectAttributeKeys;

class AccountController extends Controller
{
    public function index()
    {
        $projectId = 1;
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
        

        $projectUserSetup = [
            'avatarId' => 0,
            'avatarTitle' => 'Default Title',
            'avatarImg' => 'default.png',
            'terminalId' => 0,
            'terminalTitle' => 'Default Title',
            'terminalImg' => 'default.png',
            'backgroundId' => 0,
            'backgroundTitle' => 'Default Title',
            'backgroundImg' => 'default.png',
            'theme' => 1
        ];

        foreach ($userProjectAttributes as $attribute) 
        {    
            $awardId = $attribute->attribute_value;
            $awardAsAttrInfo = Award::find($awardId);
            $awardFileName = $awardAsAttrInfo->full_name;

            $attributeKey = $attribute->attribute_key;
    
            switch($attributeKey) {
                case ProjectAttributeKeys::AVATAR_ID :
                    if (isset($awardAsAttrInfo)) {
                        $projectUserSetup['avatarId'] = $awardId;
                        $projectUserSetup['avatarTitle'] = $awardAsAttrInfo->title ?? 'Default Title';
                        $projectUserSetup['avatarImg'] = $awardFileName ?? 'default.png';
                    }
                    break;
                case ProjectAttributeKeys::TERMINAL_ID :
                    if (isset($awardAsAttrInfo)) {
                        $projectUserSetup['terminalId'] = $awardId;
                        $projectUserSetup['terminalTitle'] = $awardAsAttrInfo->title ?? 'Default Title';
                        $projectUserSetup['terminalImg'] = $awardFileName ?? 'default.png';
                    }
                    break;
                case ProjectAttributeKeys::BACKGROUND_ID :
                    if (isset($awardAsAttrInfo)) {
                        $projectUserSetup['backgroundId'] = $awardId;
                        $projectUserSetup['backgroundTitle'] = $awardAsAttrInfo->title ?? 'Default Title';
                        $projectUserSetup['backgroundImg'] = $awardFileName ?? 'default.png';
                    }
                    break;
                case ProjectAttributeKeys::THEME_ID :
                    if (isset($awardId)) {
                        $projectUserSetup['theme'] = $awardId ?? 1;
                    }
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


        return view('account.account-show', compact('user', 'userProjects', 'userProjectAttributes', 'projectUserSetup', 'showingProjectId', 'userAPIaccessToken', 'themesUIOptions', 'projectsQuests' ));
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
