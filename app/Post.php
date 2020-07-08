<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $primaryKey = "id";

    //Criating the fillable for the factory
    protected $fillable = [
        'title',
        'comment',
        'user_id',
        'created_at',
        'updated_at',
    ];

    //Relationship many-many user-> posts
    // Using the pivot user_post

    public function user_comments()
    {
        return $this->belongsToMany(User::class, 'user_comments', 'post_id', 'user_id')
            ->withTimestamps();

        //A user can be associated to a post:
        //post->users()->attach($users);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasOne(Images::class);
    }

}
