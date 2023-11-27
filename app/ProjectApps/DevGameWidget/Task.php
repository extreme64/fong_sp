<?php

namespace App\ProjectApps\DevGameWidget;

use App\ProjectApps\Quest;

class Task extends Quest
{
    private Array $gifted_awards;
    private Array $abilities_used;

    public function __construct(String $taskTitle, Intiger $user, Intiger $project) 
    {
        $super->__construct($taskTitle, $user, $projec);
    }

    public function addAwardGifter($award_id)
    {
        $this->gifted_awards[] = $award_id;
    }

    public function addAbilitiesUsed($ability_id)
    {
        $this->abilities_used[] = $ability_id;
    }

    public function prepForSaving($value) 
    {
        return serialize($value);
    }
}