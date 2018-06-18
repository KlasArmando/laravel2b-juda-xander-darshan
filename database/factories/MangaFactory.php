<?php

use Faker\Generator as Faker;

$factory->define(App\Manga::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'chapters' => $faker->randomNumber($nbDigits = 3),
        'volumes' => $faker->randomNumber($nbDigits = 2),
        'description' => str_random(10),
        'published' =>$faker->date
    ];
});
