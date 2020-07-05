<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPost extends Pivot
{
    protected $table = "user_post";


    public static function boot()
    {
        parent::boot();

//        static::created(function ($postItem) {
//            dd('create event', $postItem);
//        });

        static::deleted(function ($postItem) {
            $postItem->images()->delete();
            $postItem->post()->delete();
            $postItem->delete();
            dd('delete event:',$postItem);
        });
    }
}
