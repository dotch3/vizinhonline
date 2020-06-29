<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    public $table = "feedbacks";
    public $primaryKey = "id";

    protected $fillable =
        [
            'title',
            'score',
            'comment',
        ];

}
