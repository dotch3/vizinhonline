<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['furadeira', 'guardasol', 'mala', 'mergulho', 'muffin', 'pesca']),
        'description' => 'item de teste',
        'code' => $faker->md5(),
        'tax_fee' => 0,
        'internal_notes' => $faker->randomElement(['Active', 'Inactive']),
        'feedback_score' => $faker->numberBetween(1, 5),
        'units' => $faker->numberBetween(1, 10),
        'replacement_cost' => $faker->numberBetween(1, 100),
        'item_status_id' => $faker->numberBetween(1,4),
        'loan_start_date' => $faker->dateTimeBetween('now', '+2 days'),
        'loan_end_date' => $faker->dateTimeBetween('now', '+30 days'),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
