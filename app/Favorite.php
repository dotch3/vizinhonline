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


    //Criating the fillable for the factory
    protected $fillable = [
        'name', 'favorite_code', 'favorite_status'
    ];

    //Relationships with other entities:
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
