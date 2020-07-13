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

    public function repliers()
    {
        return $this->belongsToMany(User::class, 'user_responses')
            ->withPivot('reply')
            ->withTimestamps();

        //A user can be associated to a post:
        //post->users()->attach($users);
    }

    public function latestResponse($id)
    {
        $post = Post::find($id);
//        $latestResponse= UserResponse::with('posts')->where('post_id',$post->id)->orderBy('created_at','DESC')->first();
        $latestResponse = UserResponse::where('post_id', $post->id)->orderBy('created_at', 'DESC')->first();

        //        dd('LatestResponse:',$latestResponse);
        return $latestResponse;

    }

    public function user()
    {
        return $this->belongsTo(User::class)
            ->withDefault(['name' => 'GuestUser']);
    }

    public function image()
    {
        return $this->hasOne(Images::class);
    }

}
