<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    
    $roleType = array(['Rol1' => 'Gerente',
                       'Rol2' => 'Administrador', 
                       'Rol3' => 'Trabajador']);

    $role = '';
    $aux = rand(1,3);
    
    if($aux == 1){
        $role = implode("|",array_column($roleType, 'Rol1'));
    }
    
    if($aux == 2){
        $role = implode("|",array_column($roleType, 'Rol2'));
    }

    if($aux == 3){
        $role = implode("|",array_column($roleType, 'Rol3'));
    }

    return [
        
        'type' => $role,
        'description' => $faker->realText()

    ];
});
