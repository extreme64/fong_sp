<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProjectAttribute extends Model
{
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function award()
    {
        return $this->belongsTo(Award::class, 'attribute_value', 'id');
    }
}