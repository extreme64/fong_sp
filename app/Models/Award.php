<?php

namespace App\Models;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Award extends Model
{
    use HasFactory;

    protected $table = 'awards';

    protected $with = ['media'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_awards', 'award_id', 'user_id')
            ->withPivot('unlocked_at');
    }


    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
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
