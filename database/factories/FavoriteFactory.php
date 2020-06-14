<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Favorite;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        //fake data for Favorite
        //ToDo: Review if are needed the 3 fields? seems like not :/

        'name' => $faker->unique()->randomElement(['favored','disfavored']),
        'favorite_code' => $faker->unique()->randomElement(['FAV','DISFAV']),
        'favorite_status'=>$faker->unique()->boolean
    ];
});
