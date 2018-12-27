<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    
    $roomType = array(['Tipo1' => 'Economico',
                       'Tipo2' => 'Vacaciones', 
                       'Tipo3' => 'Premium',]);

    $type = '';
    $cost = 0;
    $aux = rand(1,3);

    if($aux == 1){
        $type = implode("|",array_column($roomType, 'Tipo1'));
        $cost = rand(5000,10000);
    }
    
    if($aux == 2){
        $type = implode("|",array_column($roomType, 'Tipo2'));
        $cost = rand(15000,20000);
    }

    if($aux == 3){
        $type = implode("|",array_column($roomType, 'Tipo3'));
        $cost = rand(25000,30000);
    }

    return [

        'number' => rand(1,100),
        'capacity' => rand(1,4),
        'cost' => $cost,
        'type' => $type,
        'hotel_id' => rand(1,5)

    ];
});
