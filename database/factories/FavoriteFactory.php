<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Favorite;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        //fake data for testing favorite
        'name' => $faker->randomElement(['ITEM','POST','USER']),
        'description'=>'testing',
        'code' => $faker->randomElement(['FAV','DISFAV']),
        'status'=>$faker->randomElement(['Active','Inactive']),
        'created_at'=>now(),
        'updated_at'=>now()
    ];
});
