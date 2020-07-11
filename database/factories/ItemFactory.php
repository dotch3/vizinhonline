<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Items;
use Faker\Generator as Faker;

$factory->define(Items::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['furadeira', 'guardasol', 'mala', 'mergulho', 'muffin', 'pesca']),
        'description' => 'item para emprestimo',
        'tax_fee' => 0,
        'internal_notes' => $faker->randomElement(['Active', 'Inactive']),
        'feedback_score' => $faker->numberBetween(1, 5),
        'units' => $faker->numberBetween(1, 10),
        'replacement_cost' => $faker->numberBetween(1, 100),
        'itemstatus_id' => $faker->numberBetween(1, 3),
        'loan_start_date' => $faker->dateTimeBetween('now', '+2 days'),
        'loan_end_date' => $faker->dateTimeBetween('now', '+20 days'),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
