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

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'stock' =>$faker->numberBetween(1,20),
        'price'=>$faker->numberBetween(1,40),

        'description' =>  $faker->paragraph(1),
        'image' => null,
        'waitTime' => $faker->numberBetween(1,20),
    ];
});

