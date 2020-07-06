<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $primaryKey = "id";

    //Criating the fillable for the factory
    protected $fillable = [
        'comment',
        'title',
        'comment',
        'image_id',
        'created_at',
        'updated_at',
    ];

    //Relationship many-many user-> posts
    // Using the pivot user_post

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_post', 'post_id', 'user_id')
            ->using(UserPost::class)
            ->withTimestamps();

        //A user can be associated to a post:
        //post->users()->attach($users);
    }

    public function image()
    {
        return $this->hasOne(Images::class);
    }

}
