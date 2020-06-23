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
        'rg'=>$faker->rg,
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
//        'username'=>$faker->unique()->userName,
        'password' => $faker->unique()->password, // password
        'email' => $faker->unique()->email,
        'email_verified_at' => now(),
        'cpf'=>$faker->unique()->cpf,
        'age'=>$faker->numberBetween(18, 80),
        'ranking'=>$faker->numberBetween(1, 5),
        'cellphone'=>$faker->phoneNumber,
        'remember_token' => Str::random(10),
        'created_at'=>now()

    ];
});
