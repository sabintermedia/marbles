<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Color;
use Faker\Generator as Faker;

$factory->define(App\Color::class, function (Faker\Generator $faker) {
    return [
        'color'   =>  $faker->safeColorName
    ];
});
