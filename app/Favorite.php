<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    // using Laravel standards
    protected $table = "favorites";
    protected $primaryKey = "id";


    //Creating the fillable for the factory
    protected $fillable = [
        'name',
        'description',
        'code',
        'status',
        'created_at',
        'updated_at'
    ];

    //Relationships with other entities:
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function posts()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->belongsTo(User::class);
    }

    public function update_user_favorites($user_id, $fav_id)
    {
        $user = User::find($user_id);
        $fav = Favorite::find($fav_id);

        $fav->users()->attach($user->id_user);


    }

}
