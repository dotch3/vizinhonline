<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => "Post title_demo_".$faker->unique()->word,
        'comment' => "Post comment_demo_" . $faker->numberBetween(),
        'user_id' => $faker->numberBetween(4, 7),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
