<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cylinder;
use Faker\Generator as Faker;

$factory->define(Cylinder::class, function (Faker $faker) {
    return [
        'serial_number' => $faker->randomNumber(6),
        'weight' => $faker->randomNumber(2),
        'manufacture_date' => $faker->randomNumber(6),
        'shelf_life' => $faker->randomNumber(2),
        'country_of_origin' => $faker->text(20),
        'source' => $faker->text(10),
        'source_address' => $faker->text(20),
        'current_location' => $faker->text(10),
    ];
});