<?php
namespace App\ProjectApps;

abstract class Quest 
{
    private Integer $project_id;
    private ingiger $user_id;
    private String $name;
    private String $created_at;
    private String $done_at;
    private Number $score;
    private Integer $level;

    public function __construct(String $taskTitle, Intiger $user, Intiger $project) 
    {
        $super->project_id = $project;
        $super->user_id = $user;
        $super->name = $taskTitle;
    }
}