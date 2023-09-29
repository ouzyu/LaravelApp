<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     * @property string $screen_name
     * @property string $name
     * @property string $profile_image
     * @property string $email
     * @property string $password
     */
    protected $fillable = [
        'screen_name',
        'name',
        'profile_image',
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

    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'followed_id', 'following_id');
    }

    public function followings()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_id', 'followed_id');
    }

    public function getAllUsers(Int $user_id) {
        return $this->where('id', '<>', $user_id)->paginate(5);
    }

    public function follow(Int $user_id)
    {
        return $this->followings()->attach($user_id);
    }

    public function unfollow(Int $user_id)
    {
        return $this->followings()->detach($user_id);
    }

    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->followings()->where('followed_id', $user_id)->first(['id']);
    }

    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }
}
