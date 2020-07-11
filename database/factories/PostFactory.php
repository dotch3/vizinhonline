<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'comment' => $faker->sentence,
        'user_id'=>$faker->numberBetween(2,7),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
