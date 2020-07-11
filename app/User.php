<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Favorite;
use App\Locations;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = "users";
    protected $primaryKey = "id";

//    public $timestamps = "false";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'email_verified_at',
        'password',
        'cellphone',
        'address',
        'building',
        'apartment_number',
        'intercom',
        'rg',
        'cpf',
        'age',
        'ranking',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Start the section for the relationships among User and other objects
    public function favorites()
    {
        return $this->belongsToMany(Favorite::Class, 'favorite_user')
            ->withTimestamps();
    }

    public function selected_favorites()
    {
        return $this->hasMany(FavoriteUser::class);
    }
//    public function favorite_user($id_user)
//    {
//        $fav = Favorite::find($id_user)->favorites;
//        dd($fav);
//        return $fav;
//    }

    public function image()
    {
        return $this->hasOne(Images::class);
    }

    public function location()
    {
        return $this->hasOne(Locations::class);
    }

    //Relationship many-many user-> posts
    // Using the pivot user_post

//    public function posts()
//    {
//        return $this->belongsToMany(Post::class, 'user_post', 'user_id', 'post_id');
//
//        //A user can be associated to a post:
//        //$user->posts()->attach($posts);
//    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function responses()
    {
        return $this->belongsToMany(Post::class, 'user_responses')
            ->withTimestamps();
    }

    public function items()
    {
        return $this->belongsToMany(Items::class, 'item_user');
    }

}
