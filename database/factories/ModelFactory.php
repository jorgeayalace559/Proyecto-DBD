<?php

use Faker\Generator as Faker;
use App\Citie;
use App\Flight;
use App\Ticket;
use App\Luggage;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        'capacity'				=> rand(5,8),
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
        'origin_id'         => rand(1,5),
        'destination_id'    => rand(1,5), //Corregir que no se repitan
        'platform'          => $faker-> randomDigit,

    ];
});

$factory->define(App\Hotel::class, function (Faker $faker) {

    return [

        'name' => $faker->lastName,
        'stars' => rand(1,5),
        'capacity' => rand(30,80)

    ];

});

$factory->define(App\Luggage::class, function (Faker $faker) {
    return [
        'weight'              => rand(0,50),
        'cost'                => App\Luggage::all()->weight*1500,
        'type'                => $faker->text(20),
        'passenger_id'        => App\Passenger::all()->random()->id,
    ];
});

$factory->define(App\Package::class, function (Faker $faker) {
    return [
        'quantity'                     => rand(1,6),
        'name'                         => $faker->text(20),
        'cost'                         => rand(100000,2000000),
        'nights'                       => rand(2,6),
        'origin_id'                    => App\Citie::all()->random()->id,
        'destination_id'               => App\Citie::all()->random()->id,
    ];
});

$factory->define(App\Passenger::class, function (Faker $faker) {
    return [
        'rut'                  => rand(15000000,22000000),
        'name'                 => $faker->name,
        'ticket_id'            => App\Ticket::all()->random()->id,

    ];
});
