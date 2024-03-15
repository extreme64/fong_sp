<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectQuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $title = 'Profile - Store Forward Creating';

        $user = Auth::user();
        $userProjects = Project::all();

        $projectId = 1;

        $projectsQuests = ProjectQuest::select(
            'title',
            'score',
            'level',
            'status',
            'created_at',
            DB::raw('IFNULL(done_at, "NA") as done_at'),
            'abilities_used',
            DB::raw('(SELECT AVG(score) FROM project_quests) as sumScore'),
            DB::raw('(SELECT AVG(level) FROM project_quests) as sumLevel'),
            DB::raw('(SELECT ROUND((SUM(status) / COUNT(*)) * 100, 2) FROM project_quests) as winRatePercentage')
        )
        ->where('project_id', $projectId)
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

        $questCount = count($projectsQuests);
        // $avrScore =
        // $avrLevel =
        // $winRate =

        forEach($projectsQuests as $quest) {
            $avrScore = round($quest->sumScore, 1);
            $avrLevel = round($quest->sumLevel, 1);
            $winRate = $quest->winRatePercentage;
        }


        return view('profile.index', compact('title', 'userProjects', 'projectsQuests', 'user', 'avrScore', 'avrLevel', 'winRate'));
    }
}
