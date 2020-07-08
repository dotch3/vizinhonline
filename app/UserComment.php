<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserComment extends Pivot
{
    protected $table = "user_comments";

    protected $fillable =
        [
            'comment',
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
}
