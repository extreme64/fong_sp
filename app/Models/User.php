<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Media;
use App\Models\UserProfile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $with = ['userProfile', 'media'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function awards()
    {
        return $this->belongsToMany(Award::class, 'user_awards', 'user_id', 'award_id')
            ->withPivot('unlocked_at');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    
    /**
     * Media upladed by who
     *
     * @return Collection
     * 
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'uploaded_user_id');
    }

    /**
     * Accessor method - media:full_name
     *
     * @return string|null
     * 
     */
    public function getFullNameAttribute()
    {
        if ($this->userProfile && $this->userProfile->file_id) {
            $media = Media::find($this->userProfile->file_id);
            return $media ? $media->full_name : null;
        }

        return null;
    }
}
