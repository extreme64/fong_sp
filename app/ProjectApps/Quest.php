<?php
namespace App\ProjectApps;

abstract class Quest 
{
    private Intiger $project_id;
    private Intiger $user_id;
    private String $name;
    private String $created_at;
    private String $done_at;
    private Number $score;
    private Intiger $level;

    public function __construct(String $taskTitle, Intiger $user, Intiger $project) 
    {
        $super->project_id = $project;
        $super->user_id = $user;
        $super->name = $taskTitle;
    }
}