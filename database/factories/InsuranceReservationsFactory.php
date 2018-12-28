<?php

use Faker\Generator as Faker;

$factory->define(App\InsuranceReservation::class, function (Faker $faker) {
    
    $startingDate = $faker->dateTimeBetween('this week','+6 days');
    $endingDate = $faker->dateTimeBetween($startingDate, strtotime('+ 6 days'));
    
    return [
        
        'cost' => rand(10000,15000),
        'date' => today(),
        'begin_date' => $startingDate,
        'end_date' => $endingDate,
        'purchase_order_id' => rand(1,5)

    ];
});
