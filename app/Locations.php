<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table = "locations";
    protected $primaryKey = "id";

    protected $fillable = [
        'building',
        'apartment_number',
        'intercom_branch',
        'address',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
