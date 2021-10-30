<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class favoris extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function saves()
    {
        return $this->belongsToMany(User::class);
    } 
}