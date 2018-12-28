<?php

use Faker\Generator as Faker;

$factory->define(App\Insurance::class, function (Faker $faker) {
   
    $roleType = array(['Seguro1' => 'Viaje',
                       'Seguro2' => 'Vida', 
                       'Seguro3' => 'Catastrofe']);

    $insurance = '';
    $aux = rand(1,3);
    
    if($aux == 1){
        $insurance = implode("|",array_column($roleType, 'Seguro1'));
    }
    
    if($aux == 2){
        $insurance = implode("|",array_column($roleType, 'Seguro2'));
    }

    if($aux == 3){
        $insurance = implode("|",array_column($roleType, 'Seguro3'));
    }

    return [
        
        'edad' => rand(1,100) ,
    	'type' => $insurance,
    	'city' => $faker->city

    ];
});
