<?php

use Faker\Generator as Faker;

$factory->define(App\Anime::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'episodes' => $faker->randomNumber(($nbDigits = 3)),
        'description' => str_random(30),
        'aired' => $faker->date,
    ];
});
