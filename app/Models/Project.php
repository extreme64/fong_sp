<?php

namespace App\Models;

use App\Models\Media;
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
        return $this->belongsTo(Media::class, 'media_id');
    }

    /**
     * Accessor method - award:image_path
     *
     * @return string|null
     * 
     */
    public function getImagePathAttribute()
    {
        if ($this->media) {
            return $this->media->full_name;
        }

        return null;
    }
}
