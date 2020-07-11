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

}
