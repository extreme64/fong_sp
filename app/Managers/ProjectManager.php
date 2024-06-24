<?php
namespace App\Managers;

use App\Models\Project;

/**
 * Abstract class ProjectManager that implements the ProjectType interface.
 * It contains an abstract method generateProjectDescription.
 */
abstract class ProjectManager implements ProjectType
{

    /**
     * Abstract method generateProjectDescription that takes a 
     * Project object and returns it's description in form of an array.
     */
    abstract public function generateProjectDescription(Project $project): array;
}