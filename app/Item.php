<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "items";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'code',
        'description',
        'tax_fee',
        'internal_notes',
        'feedback_score',
        'units',
        'replacement_cost',
        'item_status_id',
        'loan_start_date',
        'loan_end_date'
    ];

    public function status()
    {
        return $this->belongsTo(ItemStatus::class, 'item_status_id');

    }

    //Relationship with user_favorites
    public function favorites()
    {
        return $this->belongsToMany(Favorite::class, 'favorite_user', 'item_id', 'favorite_id')
            ->withTimestamps;
    }

    public function images()
    {
        return $this->belongsToMany(Images::class, 'image_item');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'item_user')
            ->withTimestamps();
    }
}
