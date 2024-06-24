<?php

namespace App\Models;

use App\Models\Media;
use App\Models\ProjectMedias;

use App\Traits\ProjectRequirementTrait;
use App\Traits\RequirementTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use ProjectRequirementTrait;
    protected $with = ['media'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attributes()
    {
        return $this->hasMany(UserProjectAttribute::class);
    }


    public function media()
    {
        return $this->belongsTo(Media::class, 'feature_id');
    }

    public function projectMedias()
    {
        return $this->hasMany(ProjectMedias::class, 'project_id');
    }

    /**
     * Accessor method - award:full_name
     *
     * @return string|null
     * 
     */
    public function getFullNameAttribute()
    {
        if ($this->media) {
            return $this->media->full_name;
        }

        return null;
    }

    /**
     * Retrieve the project software requirements for the current project instance.
     *
     * @return object
     */
    public function getProjectSoftwareRequierments(): object
    {
        return $this->getProjectRequirements($this->id, 'project_software_requirements', 'software_requirements');
    }

    /**
     * Retrieve the hardware requirements for the current project instance.
     *
     * @return object
     */
    public function getProjectHardwareRequierments(): object
    {
        return $this->getProjectRequirements($this->id, 'project_hardware_requirements', 'hardware_requirements');
    }

    /**
     * Retrieve the project license for the current project instance.
     *
     * @return object
     */
    public function getProjectLicense(): object
    {
        return (object) [['name' => 'Propritory']];
    }

    /**
     * Retrieve the project links for the current project instance.
     *
     * @return object
     */
    public function getProjectLinks(): object
    {
        return (object) [
            ['name' => 'https://ww.exem1.com'],
            ['name' => 'https://ww.exem2.com']
        ];
    }
}

