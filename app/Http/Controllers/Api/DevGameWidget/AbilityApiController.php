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

class AbilityApiController extends Controller
{
    
    /**
     * [Description for ...]
     *
     * @param Request $request
     * @param int $project_id
     * @param int $quest_id
     * @param int $ability_id
     * 
     * @return [type]
     * 
     */
    public function update(Request $request, $project, $quest, $ability)
    {
        if(!$project) {
            return response()->json(['message' => 'Current project ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        if(!$quest) {
            return response()->json(['message' => 'Current quest ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        if(!$ability) {
            return response()->json(['message' => 'Ability to add ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        $newScore;
        $newLevel;
        $gameLogic;
        $questStatus;
        $status;

        $current_user = Auth::user()->id;

        // Get questToUpdate info
        $questToAddAbility = ProjectQuest::where('id', $quest)
            ->where('project_id', $project)
            ->where('user_id', $current_user)
            ->first();

        if(!$questToAddAbility) {
            return response()->json(['message' => 'Getting info on quest, to add ability, failed.'], ApiResultHandler::DB_QUERY_ERROR );
        }

        if(Ability::isUsedUp((int)$ability, $questToAddAbility->abilities_used )) {
            return response()->json(['message' => 'Ability used. Can\'t use it more then once.'], ApiResultHandler::BAD_REQUEST );
        }

        // Update ablities with new ability for the quest
        $newAbilitiesUsed = $questToAddAbility->abilities_used . ';' . $ability;
        $questToAddAbility->abilities_used = $newAbilitiesUsed;
        
        // Add used ability score
        $abilityInfo = Ability::getAbilityById($ability);
        $abilityScoreAmount = $abilityInfo['score'];
        
        // Check new score for level change
        $currentScore = $questToAddAbility->score;
        $currentLevel = $questToAddAbility->level;
        if($abilityScoreAmount !== 0 ) 
        {
            $newScore = $currentScore + $abilityScoreAmount;
            $newLevel = Level::checkNextLevel($newScore, $currentLevel);
        }
        
        // Update score and level
        if($currentScore !== $abilityScoreAmount || $currentLevel !== $newLevel)
        {
            $questToAddAbility->score = $newScore;
            $questToAddAbility->level = $newLevel; 
        }

        // Check won conditions {GameLogic}
        $gameLogic = new GameLogic($newScore, $newLevel); // FIXME: Remove values from class, focus on logic not storing!
        $gameLogic->runWinConditions();
        $questWon = $gameLogic->isQuestWon;
        if(is_bool($questWon)){
            $questToAddAbility->status = $questWon;
        }else {
            return response()->json(['message' => 'Quest status check fail.'], ApiResultHandler::INTERNAL_SERVER_ERROR );
        }

        // Check done conditions {GameLogic}
        $gameLogic->runDoneConditions();
        $questDone = $gameLogic->isQuestDone;
        if(is_bool($questDone)){
            $questToAddAbility->done_at = now();
        }else {
            return response()->json(['message' => 'Quest done check fail.'], ApiResultHandler::INTERNAL_SERVER_ERROR );
        }

        $status = $questToAddAbility->save();
        
        if(!$status) {
            return response()->json(['message' => 'Adding abilty to the quest failed.'], ApiResultHandler::DB_QUERY_ERROR );
        }
    
        $payload = [
            'winStatus' => $questWon, 
            'doneStatus' => $questDone,
            'newScore' => round($newScore, 1, PHP_ROUND_HALF_UP), 
            'newLevel' => $newLevel
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }


    public function index(Request $request, $project, $quest)
    {
        if(!$project) {
            return response()->json(['message' => 'Current project ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        if(!$quest) {
            return response()->json(['message' => 'Current quest ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }


        $current_user = Auth::user()->id;

        $questHeroType =  $request->questHeroType;


        if($questHeroType === '') {
            return response()->json(['message' => 'Quest hero type not selected'], ApiResultHandler::BAD_REQUEST );
        }

        $payload = [
            'abilitiesObj' => Ability::ABILITES_DICTIONARY
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );

    }


    
    /**
     * [Description for destroy]
     *
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     * 
     */
    public function destroy(Request $request, $quest, $ability): Response|ResponseFactory
    {
        # code...
    }

}
