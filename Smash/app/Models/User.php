<?php

namespace App\Models;

use App\Models\favoris;
use Laravel\Sanctum\HasApiTokens;
use Laravelista\Comments\Commenter;
use Rennokki\Befriended\Traits\Follow;
use Illuminate\Notifications\Notifiable;
use Rennokki\Befriended\Contracts\Following;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Rennokki\Befriended\Traits\Like;
use Rennokki\Befriended\Contracts\Liking;




class User extends Authenticatable implements Following, Liking
{
    use HasApiTokens, HasFactory, Notifiable, Follow, Commenter, Like;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //retour du champ par lequel on veut faire la requete
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    //public function likes2()
    //{
      //  return $this->hasMany(like::class);
    //}

    public function saves()
    {
        return $this->belongsToMany(profiles::class);
    }
    
}
