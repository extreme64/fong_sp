<?php
namespace App\ProjectApps;

abstract class Quest 
{
    private int $project_id;
    private int $user_id;
    private String $name;
    private String $created_at;
    private String $done_at;
    private float $score;
    private int $level;

    public function __construct(String $taskTitle, int $user, int $project) 
    {
        // FIXME: Move all data into child class
        $this->project_id = $project;
        $this->user_id = $user;
        $this->name = $taskTitle;
    }
}