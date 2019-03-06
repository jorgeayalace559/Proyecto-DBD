<?php

use Faker\Generator as Faker;
use App\Citie;
use App\Flight;
use App\Ticket;
use App\Luggage;
use App\Car;
use App\CarReservation;
use App\Hotel;
use App\RoomReservation;
use App\Room;

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
        'quantity_passengers'	=> rand(1,4),
        'flight_id'				=> App\Flight::all()->random()->id,
        'ticket_reservation_id'             => App\TicketReservation::all()->random()->id,
    ];
});

$factory->define(App\Flight::class, function (Faker $faker) {

    $beginDate = $faker->dateTimeBetween('now', '+ 14 days');
    $endDate = $faker->dateTimeBetween($beginDate,'+ 15 days');
    $numeroCiudades= Citie::all()->count();
    $origen = rand(1,$numeroCiudades);
    $destino = rand(1,$numeroCiudades);
    while($origen == $destino){
        $destino = rand(1,$numeroCiudades);
    } 

        return [
            'end_date'          =>  $endDate,
            'begin_date'        =>  $beginDate,
            'origin_id'         => $origen,
            'destination_id'    => $destino, //Corregir que no se repitan
            'platform'          => rand(1,10),
    
        ];
    
});

$factory->define(App\Hotel::class, function (Faker $faker) {
    $numeroCiudades= Citie::all()->count();
    return [

        'name' => $faker->lastName,
        'stars' => rand(1,5),
        'capacity' => rand(30,80),
        'citie_id' => rand(1,$numeroCiudades)

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
    $origen = Citie::all()->random()->id;
    $destino = Citie::all()->random()->id;
    while($origen == $destino){
        $destino = Citie::all()->random()->id;
    } 


    return [
        'quantity'                     => rand(1,6),
        'name'                         => $faker->text(20),
        'cost'                         => rand(100000,2000000),
        'nights'                       => rand(2,6),
        'origin_id'                    => $origen,
        'destination_id'               => $destino,
        'package_reservation_id'       => App\PackageReservation::all()->random()->id,
        'room_reservation_id'          => App\RoomReservation::all()->random()->id,
        'car_reservation_id'           => App\CarReservation::all()->random()->id,
        'insurance_reservation_id'     => App\InsuranceReservation::all()->random()->id,
        'ticket_reservation_id'        => App\TicketReservation::all()->random()->id,
    ];
});

$factory->define(App\Passenger::class, function (Faker $faker) {
    return [
        'rut'                  => rand(15000000,22000000),
        'name'                 => $faker->name,
        'ticket_id'            => App\Ticket::all()->random()->id,

    ];
});

$factory->define(App\Seat::class, function (Faker $faker) {
    
    $seatType = array(['Asiento1' => 'Economy',
                       'Asiento2' => 'Premium Economy', 
                       'Asiento3' => 'Premium Business']);

    $seat = '';
    $aux = rand(1,3);
    
    if($aux == 1){
        $seat = implode("|",array_column($seatType, 'Asiento1'));
    }
    
    if($aux == 2){
        $seat = implode("|",array_column($seatType, 'Asiento2'));
    }

    if($aux == 3){
        $seat = implode("|",array_column($seatType, 'Asiento3'));
    }

    return [
        'number'             => rand(1,100),
        'type'               => $seat,
        'ticket_id'          => App\Ticket::all()->random()->id,
        'airplane_id'        => App\Airplane::all()->random()->id,
    ];
});

$factory->define(App\Airplane::class, function (Faker $faker) {

    $capacity = rand(144,379);
    $remaining = $capacity - rand(144,379);
    
    return [
        'name'             => $faker->name,
        'capacity'         => $capacity,
        'remaining'        => $remaining,
        'flight_id'        => App\Flight::all()->random()->id,
    ];
});

$factory->define(App\CarReservation::class, function (Faker $faker) {

    $beginDate = $faker->dateTimeBetween('this day', '+ 6 days');
    $endDate = $faker->dateTimeBetween($beginDate,'+ 15 days');

    return [
        'begin_date'                    => $beginDate,
        'end_date'                      => $endDate,
        'cost'                          => rand(30000,1500),
        'purchase_order_id'             => App\PurchaseOrder::all()->random()->id,
        'car_id'                        => Car::all()->random()->id
    ];
});

$factory->define(App\InsuranceReservation::class, function (Faker $faker) {

    $beginDate = $faker->dateTimeBetween('this day', '+ 6 days');
    $endDate = $faker->dateTimeBetween($beginDate,'+ 15 days');

    return [
        'begin_date'                    => $beginDate,
        'end_date'                      => $endDate,
        'cost'                          => rand(30000,150000),
        'purchase_order_id'             => App\PurchaseOrder::all()->random()->id
    ];
});

$factory->define(App\PackageReservation::class, function (Faker $faker) {

    $beginDate = $faker->dateTimeBetween('this day', '+ 6 days');
    $endDate = $faker->dateTimeBetween($beginDate,'+ 15 days');

    return [
        'begin_date'                    => $beginDate,
        'end_date'                      => $endDate,
        'cost'                          => rand(30000,150000),
        'purchase_order_id'             => App\PurchaseOrder::all()->random()->id,
    ];
});

$factory->define(App\RoomReservation::class, function (Faker $faker) {
    $days = rand(1,5);
    $room = App\Room::all()->random()->id;
    $habitacionCosto = App\Room::find($room)->cost;
    $costo = $habitacionCosto * $days;
    
    $beginDate = $faker->dateTimeBetween('this day', '+ 6 days');
    $endDate = $faker->dateTimeBetween($beginDate,'+ 15 days');

    return [
        'begin_date'                    => $beginDate,
        'end_date'                      => $endDate,
        'day'                           => $days,
        'cost'                          => $costo,
        'purchase_order_id'             => App\PurchaseOrder::all()->random()->id,
        'room_id'                       => $room
    ];
});

$factory->define(App\TicketReservation::class, function (Faker $faker) {
    
    return [
        'cost'                          => rand(30000,150000),
        'purchase_order_id'             => App\PurchaseOrder::all()->random()->id
    ];

});

