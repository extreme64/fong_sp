<?php
namespace App\Traits;

use App\Models\Project;
use Illuminate\Support\Collection;

/**
 * Trait ProjectRequirementTrait
 *
 * This trait provides functionality to retrieve project requirements based on a given project ID.
 * It joins the project table with the requirement table and requirement types table to fetch
 * specific columns such as the requirement name, project title, and requirement type name.
 *
 * @package App\Traits
 */
trait ProjectRequirementTrait
{
    /**
     * Retrieves Project requirements based on the provided project ID, project table name, and requirement table name.
     *
     * @param int $project_id The ID of the project to retrieve requirements for.
     * @param string $projectTableName The name of the project table to join.
     * @param string $requirementTableName The name of the requirement table to join.
     * @return Collection A collection of project requirements with specific columns selected.
     */
    public function getProjectRequirements(int $project_id, string $projectTableName, string $requirementTableName): Collection
    {
        return Project::join($projectTableName, 'projects.id', '=', $projectTableName . '.project_id')
            ->join($requirementTableName, $projectTableName . '.requirement_id', '=', $requirementTableName . '.id')
            ->join('requirement_types', $projectTableName . '.type_id', '=', 'requirement_types.id')
            ->select($requirementTableName . '.name as name', 'projects.title as project_title', 'requirement_types.name as requirement_type_name')
            ->where($projectTableName . '.project_id', '=', $project_id)
            ->get();
    }
}