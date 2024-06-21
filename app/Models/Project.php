<?php

namespace App\Models;

use App\Models\Media;
use App\Models\ProjectMedias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

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
}
