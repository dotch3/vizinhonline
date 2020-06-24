<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //
    protected $table = "images";
    protected $primaryKey = "id";
    public $timestamps = "false";

    //Criating the fillable for the factory
    protected $fillable = [
        'name', 'path_location', 'format_image', 'size_image'
    ];

}
