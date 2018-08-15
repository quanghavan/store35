<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'level' => 0,
        'password' => bcrypt('123456'), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'address' => $faker->city,
    ];
});
