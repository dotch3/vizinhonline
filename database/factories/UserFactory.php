<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
//Using portuguese:
$faker = Factory::create('pt_BR');

$factory->define(User::class, function () use ($faker) {

//$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->email,
        'email_verified_at' => now(),
        'password' => $faker->unique()->password,
        'cellphone'=>$faker->phoneNumber,
        'rg'=>$faker->unique()->rg,
        'cpf'=>$faker->unique()->cpf,
        'age'=>$faker->numberBetween(18, 80),
        'ranking'=>$faker->numberBetween(1, 5),
        'created_at'=>now(),
        'updated_at'=>now(),
        'remember_token' => Str::random(10)

    ];
});
