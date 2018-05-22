<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'responsible' => $faker->name,
        'name' => $faker->company,
        'responsibleEmail' => $faker->email,
        'sectorEmail' => $faker->email,
        'sectorPhone' => $faker->phone
    ];
});
