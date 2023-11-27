<?php

namespace App\Models;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

       protected $with = ['media'];

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'affiliate_url',
    ];

    public function awards()
    {
        return $this->hasMany(Award::class, 'product_id');
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