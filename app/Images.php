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
        'size_image',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
