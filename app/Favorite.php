<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $table = "favorites";
    protected $primaryKey = "id_favorite";
    // check if we will use this and then create migrations
//    public $timestamps = "false";


    //Creating the fillable for the factory
    protected $fillable = [
        'name', 'favorite_code', 'favorite_status'
    ];

    //Relationships with other entities:
    public function users()
    {
        return $this->belongsToMany('App\User', 'users_favorites', 'id_favorite', 'id_user');
    }

    public function update_user_favorites($user_id, $fav_id)
    {
        $user = User::find($user_id);
        $fav = Favorite::find($fav_id);

        $fav->users()->attach($user->id_user);


    }

    public function posts()
    {
        return $this->belongsTo('App\User');
    }

    public function items()
    {
        return $this->belongsTo('App\User');
    }


}
