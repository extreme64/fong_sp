<?php

namespace App\Http\Controllers\Api\DevGameWidget;

use App\ProjectApps\Quest;

use App\Models\ProjectQuest;
use Illuminate\Http\Request;
use App\Contracts\ApiResultHandler;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ProjectApps\DevGameWidget\Level;
use App\ProjectApps\DevGameWidget\Score;
use App\ProjectApps\DevGameWidget\Ability;
use App\ProjectApps\DevGameWidget\GameLogic;

class QuestApiController extends Controller
{



/**
     * [Description for createQuest]
     *
     * @param Request $request
     * @param mixed $title
     * @param mixed $project
     * 
     * @return [type]
     * 
     */
    public function store(Request $request, int $project) 
    {
        if(!$project) {
              return response()->json(['message' => 'Current project ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        $questIsForUser = Auth::user()->id;


        $rqs_title = $request->description;
        $score = 0.000;
        $level = 1;
        $created = now();
        $winStatus = false;
        $title = ($rqs_title) ? trim($rqs_title) : "Random title...";
        
        $newProjectQuest = new ProjectQuest();
        $newProjectQuest->user_id = $questIsForUser;
        $newProjectQuest->project_id = $project;
        $newProjectQuest->title = $title;
        $newProjectQuest->score = $score;
        $newProjectQuest->level = $level;
        $newProjectQuest->gifted_awards = "";
        $newProjectQuest->abilities_used = "";
        $newProjectQuest->created_at = now();
        $newProjectQuest->done_at = NULL;
        $newProjectQuest->status = $winStatus;
 
        $status = $newProjectQuest->save();
 
        if(!$status) {
            return response()->json(['message' => 'Not possible to create a quest.'], ApiResultHandler::DB_QUERY_ERROR );
        }


        $payload = [
            'project' => [
                'id' => $project
            ],
            'quest' => [
                'id' => $newProjectQuest->id,
                'name' => $title,
                'winStatus' => $winStatus, 
                'newScore' => $score, 
                'newLevel' => $level
            ]
        ];

        return response()->json(['message' => $payload], ApiResultHandler::CREATED );
    }

    /**
     * [Description for getProjectQuest]
     *
     * @param Request $request
     * @param int $project
     * @param int $quest
     * 
     * @return [type]
     * 
     */
    public function show(Request $request, int $project, int $quest) 
    {
        if(!$project) {
            return response()->json(['message' => 'Current project ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        if(!$quest) {
            return response()->json(['message' => 'Current quest ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }


        $quest_obj = ProjectQuest::findOrFail($quest);

        if(!$quest_obj) {
            return response()->json(['message' => 'Not possible to get the quest.'], ApiResultHandler::NOT_FOUND );
        }


        $payload = [
            'quest' => $quest_obj
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    /**
     * [Description for updateProjectQuest]
     *
     * @param Request $request
     * @param int $project
     * @param int $quest
     * 
     * @return [type]
     * 
     */
    public function update(Request $request, int $project, int $quest)
    {
        $newScore;
        $newLevel;
        $gameLogic;
        $questStatus;
        $status;
        $metrics;
        $isLevelUp = false;

        // If valid data
        // TODO: Unserials data, parse url
        $metrics = $request->metrics;
        if(!$metrics) {
            return response()->json(['message' => 'No tracking data provided.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }
        
        $current_user = Auth::user()->id;

        // Get questToUpdate info
        $questToUpdate = ProjectQuest::where('user_id', $current_user)
            ->where('project_id', $project)
            ->where('id', $quest)
            ->first();



        $currentScore = $questToUpdate->score;
        $currentLevel = $questToUpdate->level;
        $gameLogic = new GameLogic($currentScore, $currentLevel);
        
        // Calculate (Score)
        $score = new Score($metrics);
        $scoreModifierAmount = $score->calculate();
        
        // Set score        
        if( $scoreModifierAmount !== 0)
        {
            $newScore = $gameLogic->currentScore + $scoreModifierAmount;
        }
        
        // Set level (Level)
        if($scoreModifierAmount !== 0 ) 
        {
            $tmplLevel = $currentLevel;
            $newLevel = Level::checkNextLevel($newScore, $currentLevel);
            if($tmplLevel < $newLevel)
            {
                $isLevelUp = true;
            }
        }
        
        // Update questToUpdate
        if($gameLogic->currentScore !== $newScore || $gameLogic->currentLevel !== $newLevel)
        {
            $questToUpdate->score = $newScore;
            $questToUpdate->level = $newLevel; 
        }

        
        // Check won conditions {GameLogic}
        $gameLogic->runWinConditions();
        $questWon = $gameLogic->isQuestWon;
        if(is_bool($questWon)){
            $questToUpdate->status = $questWon;
        }else {
            return response()->json(['message' => 'Quest status check fail.'], ApiResultHandler::INTERNAL_SERVER_ERROR );
        }

        // Check done conditions {GameLogic}
        $gameLogic->runDoneConditions();
        $questDone = $gameLogic->isQuestDone;
        if(is_bool($questDone)){
            $questToUpdate->done_at = now();
        }else {
            return response()->json(['message' => 'Quest done check fail.'], ApiResultHandler::INTERNAL_SERVER_ERROR );
        }

        $status = $questToUpdate->save();
        
        $payload = [
            'winStatus' => $questWon, 
            'doneStatus' => $questDone, 
            'newLevel' => $newLevel,
            'newScore' => round($newScore, 1, PHP_ROUND_HALF_UP),
            'isLevelUp' => $isLevelUp,
            'abilitiesUsed' => $questToUpdate->abilities_used
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }



}
