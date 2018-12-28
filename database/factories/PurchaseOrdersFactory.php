<?php

use Faker\Generator as Faker;

$factory->define(App\PurchaseOrder::class, function (Faker $faker) {
    return [

        'cost' => rand(15000,20000),
        'date' => today(),
        'user_id' => rand(1,5)

    ];
});
