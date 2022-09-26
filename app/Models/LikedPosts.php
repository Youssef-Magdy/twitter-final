<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Posts;

class LikedPosts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
    ];

    public function user(){

        return $this->hasOne(User::class , 'id' , 'user_id');

    }
    public function post(){

        return $this->hasOne(Posts::class , 'id' , 'post_id');

    }
}
