<?php 
namespace App\Managers;
use App\Models\Project;

interface ProjectTypeFactoryInterface
{
    public function getProjectType(Project $project);
}
