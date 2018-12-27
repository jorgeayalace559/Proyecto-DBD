<?php

use Faker\Generator as Faker;
use App\Citie;
use App\Flight;
use App\Ticket;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        'capacity'				=> $faker-> randomDigit,
        'city_id'				=> App\Citie::all()->random()->id,
        'patent'				=> $faker-> bothify($string = '##????'),
    ];
});

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'cost'					=> rand(20000,30000),
        'quantity_passengers'	=> rand(100,150),
        'flight_id'				=> App\Flight::all()->random()->id,
    ];
});

$factory->define(App\Flight::class, function (Faker $faker) {
    return [
        'end_date'          => date("Y-m-d H:i:s"),
        'begin_date'        => date("Y-m-d H:i:s"),
        'origin_id'         => App\Citie::all()->random()->id,
        'destination_id'    => App\Citie::all()->random()->id, //Corregir que no se repitan
        'platform'          => $faker-> randomDigit,

    ];
});