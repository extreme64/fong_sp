<?php

namespace App\ProjectApps\DevGameWidget;

class Ability
{

    const ABILITES_DICTIONARY = [
        [
            'id'=> 1,
            'title'=> "I had a vision!",
            'desc'=> "Plan before code, thing before write.",
            'icon' => "🔮",
            'img' => "http://localhost:8000/images/abilities/coder/had-vision.svg",
            'score' => 60
        ],
        [
            'id' => 2,
            'title' => "I chat with bud GPT!",
            'desc' => "It is a good tool use it to a full extent.",
            'icon' => "🔎",
            'img' => "http://localhost:8000/images/abilities/coder/chat-gpt.svg",
            'score' => 110
        ],
        [
            'id' => 3,
            'title' => "I been monitoring!",
            'desc' => "Abserve and note, seeing clearly is important.",
            'icon' => "📈",
            'img' => "http://localhost:8000/images/abilities/coder/monitoring.svg",
            'score' => 140
        ],
        [
            'id' => 4,
            'title' => "I removed/fixed big bugs!",
            'desc' => "It is hard, but there is no way around. Longer they linger, harder they become.",
            'icon' => "🔫",
            'img' => "http://localhost:8000/images/abilities/coder/fixed-bugs.svg",
            'score' => 180
        ],
        [
            'id'=> 5,
            'title' => "I have less to worry now!",
            'desc' => "Less code is beautiful.",
            'icon' => "✂️",
            'img' => "http://localhost:8000/images/abilities/coder/have-less.svg",
            'score' => 200
        ],
        [
            'id' => 6,
            'title' => "I refactor many!",
            'desc' => "It is an art form, practise it daily.",
            'icon' => "💡",
            'img' => "http://localhost:8000/images/abilities/coder/much-refactoring.svg",
            'score' => 200
        ],
        [
            'id' => 7,
            'title' => "I did epic code!",
            'desc' => "Epic feature are nice milestones to be proud of.",
            'icon' => "💎",
            'img' => "http://localhost:8000/images/abilities/coder/epic-code.svg",
            'score' => 300
        ]
    ];

    public static function getAbilityById($id) 
    {
        foreach (self::ABILITES_DICTIONARY as $ability) {
            if ($ability['id'] === (int)$id) {
                return $ability;
            }
        }

        return null;
    }

    /**
     * @brief Check if ability is used-up for the quest
     *
     * @param int $ability_id_to_check
     * @param string $abilities_serialized
     * 
     * @return bool
     * 
     */
    public static function isUsedUp(int $ability_id_to_check, string $abilities_serialized) :bool
    {
        $abilitiesIDs = explode(";", $abilities_serialized);
        return (array_search((int)$ability_id_to_check, $abilitiesIDs) === FALSE) ? FALSE : TRUE;
    }


}