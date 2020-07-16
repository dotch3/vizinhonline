<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        $latestResponse = UserResponse::where('post_id', $post->id)->orderBy('created_at', 'DESC')->get()->first();

        return $latestResponse;

    }

    public function isFavorite($post_id, $user_id)
    {
        $favorite = FavoriteUser::where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->get()
            ->first();


        return $favorite;
    }

    public static function lastResponse($replier)
    {
        $post = Post::find($replier->pivot->post_id);
        $latestResponse = UserResponse::where('post_id', $post->id)->orderBy('created_at', 'DESC')->get()->first();
        $response = DB::table('user_responses')
            ->where('id', $latestResponse->id)
            ->get()->first();
        return $response;

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
