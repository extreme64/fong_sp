<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Models\Media;
use App\Models\UserProfile;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

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
     * 
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
