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

$factory->define(App\Table::class, function (Faker $faker) {
    return [
        'number' => $faker->unique->numberBetween(0,48),
        'capacity' => $faker->numberBetween(0,5),
        'state' => 1 ,
    ];
});

