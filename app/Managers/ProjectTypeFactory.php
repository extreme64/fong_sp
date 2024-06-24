<?php
namespace App\Managers;

use App\Models\Project;
use App\Managers\ProjectTypeFactoryInterface;

class ProjectTypeFactory implements ProjectTypeFactoryInterface
{
    protected $projectTypeMap = [
        1 => 'App\Managers\ProjectManagerBrowser',
        3 => 'App\Managers\ProjectManagerMobile',
        4 => 'App\Managers\ProjectManagerPlugin',
    ];

    public function getProjectType(Project $project)
    {
        return app()->make($this->projectTypeMap[$project->type_id]);
    }
}