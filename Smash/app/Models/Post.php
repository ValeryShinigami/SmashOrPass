<?php

namespace App\Models;

use Rennokki\Befriended\Traits\Like;
use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Rennokki\Befriended\Contracts\Liking;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Post extends Model implements Liking
{
    use HasFactory, Commentable, like;

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //public function likes()
    //{
      // return $this->hasMany(like::class);
    //}

    //public function likeUser()
    //{
      //  return $this->likes->where('user_id', auth()->user()->id)->isEmpty() ? false : true;
//    }
}
