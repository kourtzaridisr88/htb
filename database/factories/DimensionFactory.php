<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dimension;
use Faker\Generator as Faker;

$factory->define(Dimension::class, function (Faker $faker) {
    return [
        'name' => strtoupper($faker->randomLetter) . '-' . rand(0, 9999),
    ];
});
