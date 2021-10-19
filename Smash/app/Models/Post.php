<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(like::class);
    }

    public function likeUser()
    {
        return $this->likes->where('user_id', auth()->user()->id)->isEmpty() ? false : true;
    }
}
