<?php

namespace App\Http\Controllers\Api;

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

class ActivityApiController extends Controller
{
    /**
     * [Description for createQuest]
     *
     * @param Request $request
     * @param mixed $title
     * @param mixed $project_id
     * 
     * @return [type]
     * 
     */
    public function createProjectQuest(Request $request, int $project_id) 
    {
        if(!$project_id) {
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
        $newProjectQuest->project_id = $project_id;
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
                'id' => $project_id
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
     * @param int $project_id
     * @param int $quest_id
     * 
     * @return [type]
     * 
     */
    public function getProjectQuest(Request $request, int $project_id, int $quest_id) 
    {
        if(!$project_id) {
            return response()->json(['message' => 'Current project ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        if(!$quest_id) {
            return response()->json(['message' => 'Current quest ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }


        $quest = ProjectQuest::findOrFail($quest_id);

        if(!$quest) {
            return response()->json(['message' => 'Not possible to get the quest.'], ApiResultHandler::NOT_FOUND );
        }


        $payload = [
            'quest' => $quest
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    /**
     * [Description for updateProjectQuest]
     *
     * @param Request $request
     * @param int $project_id
     * @param int $quest_id
     * 
     * @return [type]
     * 
     */
    public function updateProjectQuest(Request $request, int $project_id, int $quest_id)
    {
        $newScore;
        $newLevel;
        $gameLogic;
        $questStatus;
        $status;
        $metrics;

        // If valid data
        // TODO: Unserials data, parse url
        $metrics = $request->metrics;
        if(!$metrics) {
            return response()->json(['message' => 'No tracking data provided.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }
        
        $current_user = Auth::user()->id;

        // Get questToUpdate info
        $questToUpdate = ProjectQuest::where('user_id', $current_user)
            ->where('project_id', $project_id)
            ->where('id', $quest_id)
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
            $newLevel = Level::checkNextLevel($newScore, $currentLevel);
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
            'abilitiesUsed' => $questToUpdate->abilities_used
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    /**
     * [Description for updateProjectQuestAddAbility]
     *
     * @param Request $request
     * @param int $project_id
     * @param int $quest_id
     * @param int $ability_id
     * 
     * @return [type]
     * 
     */
    public function updateProjectQuestAddAbility(Request $request, $project_id, $quest_id, $ability_id)
    {
        if(!$project_id) {
            return response()->json(['message' => 'Current project ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        if(!$quest_id) {
            return response()->json(['message' => 'Current quest ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        if(!$ability_id) {
            return response()->json(['message' => 'Ability to add ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        $newScore;
        $newLevel;
        $gameLogic;
        $questStatus;
        $status;

        $current_user = Auth::user()->id;

        // Get questToUpdate info
        $questToAddAbility = ProjectQuest::where('id', $quest_id)
            ->where('project_id', $project_id)
            ->where('user_id', $current_user)
            ->first();

        if(!$questToAddAbility) {
            return response()->json(['message' => 'Getting info on quest, to add ability, failed.'], ApiResultHandler::DB_QUERY_ERROR );
        }

        if(Ability::isUsedUp((int)$ability_id, $questToAddAbility->abilities_used )) {
            return response()->json(['message' => 'Ability used. Can\'t use it more then once.'], ApiResultHandler::BAD_REQUEST );
        }

        // Update ablities with new ability for the quest
        $newAbilitiesUsed = $questToAddAbility->abilities_used . ';' . $ability_id;
        $questToAddAbility->abilities_used = $newAbilitiesUsed;
        
        // Add used ability score
        $abilityInfo = Ability::getAbilityById($ability_id);
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





    public function getProjectQuestAddAbilitiesInfo(Request $request, $project_id, $quest_id)
    {
        if(!$project_id) {
            return response()->json(['message' => 'Current project ID not supplied.'], ApiResultHandler::UNPROCESSABLE_ENTITY );
        }

        if(!$quest_id) {
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


}
