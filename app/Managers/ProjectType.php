<?php
namespace App\Managers;
use App\Models\Project;

interface ProjectType {
    public function generateProjectDescription(Project $project): array;
}