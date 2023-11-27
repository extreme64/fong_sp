<?php

namespace App\ProjectApps\DevGameWidget;

class GameLogic
{

    /**
     * Is unit won.
     *
     * @var Boolean
     */
    public $isQuestWon;

    /**
     * Is unit completed.
     *
     * @var Boolean
     */
    public $isQuestDone;

    /**
     *  Quest current score
     *
     * @var [type]
     */
    public $currentScore;

    /**
     * [Description for $currentLevel]
     *
     * @var [type]
     */
    public $currentLevel;

    /**
     * Max level for a quest.
     *
     * @var int
     */
    public $maxLevel = 11;

    /**
     * Level needed to win a quest.
     *
     * @var int
     */
    public $winLevel = 7;

    /**
     * [Description for __construct]
     *
     * @param mixed $score
     * @param mixed $level
     * 
     */
    public function __construct($score, $level)
    {
        $this->currentScore = $score;
        $this->currentLevel = $level;
    }

    /**
     * Check quest is won.
     *
     * @return boolean
     * 
     */
    public function runWinConditions()
    {
        if ($this->currentLevel >= $this->winLevel) {
            $this->isQuestWon = true;
            return true;
        }

        $this->isQuestWon = false;
        return false;
    }

    /**
     * Check quest is done.
     *
     * @return boolean
     * 
     */
    public function runDoneConditions()
    {
        if ($this->currentLevel === $this->maxLevel) {
            $this->isQuestDone = true;
            return true;
        }

        $this->isQuestDone = false;
        return false;
    }
}