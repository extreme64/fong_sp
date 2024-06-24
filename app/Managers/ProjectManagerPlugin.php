<?php
namespace App\Managers;

use App\Traits\ProjectRequirementTrait;
use App\Models\Project;
use App\Managers\ProjectManager;
use InvalidArgumentException;

/**
 * Class ProjectManagerPlugin
 *
 * This class extends the ProjectManager and is responsible for generating 
 * a project description based of Project model.
 *
 * @package App\Managers
 */
class ProjectManagerPlugin extends ProjectManager
{
    use ProjectRequirementTrait;

    /**
     * Method to generate a project description based on 
     * software requirements, hardware requirements, license, 
     * and downloads of a given project.
     *
     * @param Project $project The project for which to generate the description
     * @return array The project description containing software, hardware, license, and downloads
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
        // $downloads = $project->getProjectLinks();

        return [
            'Software' => $softwareRequirements,
            'Hardware' => $hardwareRequirements,
            // 'License' => $license,
            // 'Downloads' => $downloads
        ];
    }
}