<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FavoriteUser extends Pivot
{
    protected $table = "favorite_user";

    protected $fillable =
        [
            'favorite_id',
            'user_id',
            'post_id',
            'item_id',
            'created_at',
            'updated_at',
            'deleted_at'
        ];


    public function posts($fav_post_id)
    {
        $posts = Post::where('id', $fav_post_id);

        return $posts;
    }

    public function users($fav_user_id)
    {
        $users = User::where('id', $fav_user_id);

        return $users;
    }
}
