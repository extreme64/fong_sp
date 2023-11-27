<?php

namespace App\ProjectApps\DevGameWidget;

class Level
{

    /**
     * SCORE_THRESHOLDS
     *
     * @var array
     */
    const SCORE_THRESHOLDS = [0, 800, 1200, 1800, 2700, 4000, 6000, 9000, 15000, 23000, 35000];


    public static function checkNextLevel($score, $currentLevel)
    {
        $tmpLevel = 1;
        for ($level = 0; $level < 10; $level++) {
            if ($score >= self::SCORE_THRESHOLDS[$level] && $score < $level + self::SCORE_THRESHOLDS[$level + 1]) {
                $tmpLevel = $level+1;
            }
        }

        return $tmpLevel;
    }
}
