<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    
    $userName = array(['Usuario1' => 'Lorenzo Delgado',
                       'Usuario2' => 'Carlos Guzman', 
                       'Usuario3' => 'Claudia Guzman',
                       'Usuario4' => 'Julio Gonzalez',
                       'Usuario5' => 'Nicolas Ayala']);

    $user = '';
    $aux = rand(1,5);
    
    if($aux == 1){
        $user = implode("|",array_column($userName, 'Usuario1'));
    }
    
    if($aux == 2){
        $user = implode("|",array_column($userName, 'Usuario2'));
    }

    if($aux == 3){
        $user = implode("|",array_column($userName, 'Usuario3'));
    }

    if($aux == 4){
        $user = implode("|",array_column($userName, 'Usuario4'));
    }

    if($aux == 5){
        $user = implode("|",array_column($userName, 'Usuario5'));
    }

    return [
        'name' => $user,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'miles' => rand(500,600),
        'rut' => $faker->realText,
        'role_id' => rand(2,3),
    ];
});
