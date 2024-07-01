<?php
namespace App\Managers;

use App\Models\Project;
use App\Managers\ProjectManager;
use App\Traits\ProjectRequirementTrait;
use InvalidArgumentException;

/**
 * Class ProjectManagerBrowser
 *
 * This class extends the ProjectManager and is responsible for generating 
 * a project description based of Project model.
 *
 * @package App\Managers
 */
class ProjectManagerBrowser extends ProjectManager
{
    use ProjectRequirementTrait; // move to model

    /**
     * Method to generate a project description based on 
     * software requirements, hardware requirements, license, 
     * and links of a given project.
     *
     * @param Project $project The project for which to generate the description
     * @return array The project description containing browsers, hardware, license, and links
     * @throws InvalidArgumentException if project id is not present.
     */
    public function generateProjectDescription(
        Project $project
    ): array {

        if ($project === null) {
            throw new InvalidArgumentException("No project value", 1);
        }

        $softwareRequirements = $project->getProjectSoftwareRequierments();
        $hardwareRequirements = $project->getProjectHardwareRequierments();
        // $license = $project->getProjectLicense();
        // $links = $project->getProjectLinks();

        return [
            'Browsers' => $softwareRequirements,
            'Hardware' => $hardwareRequirements,
            // 'License' => $license,
            // 'Links' => $links
        ];
    }
}