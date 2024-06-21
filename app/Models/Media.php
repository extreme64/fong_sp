<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    public function user()
    {
        return $this->belongsTo(User::class, 'uploaded_user_id');
    }


    public function award()
    {
        return $this->belongsTo(Award::class, 'image');
    }


    public function project()
    {
        return $this->belongsTo(Project::class, 'feature_id');
    }
}
