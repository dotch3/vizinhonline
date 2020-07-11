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
        return $this->belongsToMany(User::class, 'favorite_user')
            ->withTimestamps();
    }

    public function posts()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->belongsTo(User::class);
    }



}
