<?php

use Faker\Generator as Faker;

$factory->define(App\Insurance_Reservation::class, function (Faker $faker) {
    
    $startingDate = $faker->dateTimeBetween('this week','+6 days');
    $endingDate = $faker->dateTimeBetween($startingDate, strtotime('+ 6 days'));
    
    return [
        
        'date' => $faker->dateTime(),
        'begin_date' => $startingDate,
        'end_date' => $endingDate,
        'purchase_order_id' => rand(0,5)

    ];
});
