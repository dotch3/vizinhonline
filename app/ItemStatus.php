<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemStatus extends Model
{
    protected $table = "item_status";
    protected $fillable = [
        'name_status',
        'description',
        'code',
        'created_at',
        'updated_at',
        'deleted_at'

    ];

    public function items()
    {
        return $this->hasMany(Item::class);

    }

}
