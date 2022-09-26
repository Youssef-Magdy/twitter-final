<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'parent_id',
        'base_id',
        'user_id',
    ];

    public function scopeposts(Builder $builder):void
    {
        $builder->whereNull('parent_id');
    }
    

    public function user()
    {
        return $this->hasOne(User::class , 'id' , 'user_id'); // assuming this is the path for User model
    }

    public function likedPost()
    {
        return $this->hasMany(LikedPosts::class , 'post_id' , 'id'); 
    }
    
    




    public function likedPostUser()
    {
        return $this->likedPost()->where('user_id' , auth()->id()); 
    }
    

    public function comment()
    {
         return $this->hasMany(Posts::class, 'parent_id', 'id');
    }


    public function countComment()
    {
        return $this->comment(); 
    }
}
