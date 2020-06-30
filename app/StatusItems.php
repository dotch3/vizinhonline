<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusItems extends Model
{
    protected $table = "status_items";
    protected $primaryKey = "id_status_item";

    protected $fillable = [
        'name_status', 'code_status',
    ];

    public function items()
    {
        return $this->hasMany(Items::class);

    }
}
