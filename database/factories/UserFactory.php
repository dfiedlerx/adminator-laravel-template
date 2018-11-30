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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role_id' => 1
    ];
});


$factory->define(App\Cliente::class, function (Faker $faker) {

    return [
        'Name' => $faker->company,
        'Email' => $faker->unique()->safeEmail,
        'Stret' => $faker->streetName,
        'Number' => $faker->buildingNumber,
        'CEP' => $faker->postcode,
        'Phone' => $faker->tollFreePhoneNumber,
        'Cel' => $faker->tollFreePhoneNumber,
    ];
});