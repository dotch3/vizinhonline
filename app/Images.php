<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //
    protected $table = "images";
    protected $primaryKey = "id";

    //Criating the fillable for the factory
    protected $fillable = [
        'name',
        'slug',
        'path_location',
        'format_image',
        'size_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
