<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
    ];


    public function following(){
        return $this->belongsToMany(User::class);
    }

    public function userMessages(){
        return $this->belongsToMany(User::class);
    }
}
