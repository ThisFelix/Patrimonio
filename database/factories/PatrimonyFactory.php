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

$factory->define(App\Patrimony::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category' => $faker->text($maxNbChars = 20),
        'model' => $faker->company,
        'description' => $faker->colorName,
        'image' => $faker->imageUrl,
        'location' => $faker->buildingNumber,
        'sector' => $faker->company
    ];
});
