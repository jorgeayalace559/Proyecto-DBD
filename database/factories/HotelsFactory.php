<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {

    return [

        'name' => $faker->lastName,
        'stars' => rand(1,5),
        'capacity' => rand(30,80)

    ];

});
