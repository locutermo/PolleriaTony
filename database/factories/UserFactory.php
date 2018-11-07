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
        'lastname' => $faker->name,
        'dni' =>$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9),
        'dateOfBirth' => null,
        'cellphone'=>'9'.$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9),
        'email' => $faker->unique()->safeEmail,
        'office' => $faker->numberBetween(2,3),
        'photo' => null,
        'code' => str_random(9),
        'password' => bcrypt('admin'), // secret
        'remember_token' => str_random(10),
    ];
});

