<?php

use Faker\Generator as Faker;
use App\InsuranceReservation;
use App\PackageReservation;
use App\RoomReservation;
use App\TicketRservation;
use App\CarReservation;

$factory->define(App\PurchaseOrder::class, function (Faker $faker) {
    
    $date = $faker->dateTimeBetween('this week','+ 15 days');
    
    return [

        'cost' => rand(15000,20000),
        'date' => $date,
        'user_id' => App\User::all()->random()->id,

    ];
});
