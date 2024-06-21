<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMedias extends Model
{
    use HasFactory;
    protected $table = 'project_medias';
    protected $fillable = [
        'project_id',
        'media_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
