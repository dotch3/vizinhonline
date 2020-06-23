<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    public $table = "feedbacks";
    public $primaryKey = "id_feedback";

    protected $fillable = [
        'title', 'score', 'comment', 'created_at', 'update_at'
    ];

};
