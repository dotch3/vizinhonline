<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
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
        'itemstatus_id',
        'loan_start_date',
        'loan_end_date'
    ];

    public function status()
    {
        return $this->belongsTo(StatusItems::class, 'id_status');

    }

    //Relationship with user_favorites
    public function favorites()
    {
        return $this->belongsToMany(Favorite::class, 'users_favorites', 'id_item', 'id_user_favorite');
    }

    public function getFavorite()
    {
        $fav = Favorite::find(2);
        return $fav;
    }

    public function images() {
        return $this->belongsToMany(Images::class, 'image_item');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'item_user');
    }
}
