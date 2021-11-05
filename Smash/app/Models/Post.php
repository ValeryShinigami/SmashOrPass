<?php

namespace App\Models;

use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Rennokki\Befriended\Traits\Like;
use Rennokki\Befriended\Contracts\Liking;



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
