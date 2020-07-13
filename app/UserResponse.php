<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserResponse extends Pivot
{
    protected $table = "user_responses";

    protected $fillable =
        [
            'reply',
            'user_id',
            'post_id',
            'created_at',
            'updated_at',
        ];


    public static function boot()
    {
        parent::boot();

        static::created(function ($comment) {
//            dd('create event', $postItem);
        });

        static::deleted(function ($comment) {
//            dd('delete event:',$postItem);
        });
    }

    public function posts()
    {
        $posts=Post::where('post_id',$this->post_id);
        return $posts;
    }
}
