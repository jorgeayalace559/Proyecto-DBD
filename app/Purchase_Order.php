<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_Order extends Model
{
    protected $fillable = [
    	'cost',
    	'date',
    	'user_id'
    ];

    public function users(){

    }

    public function package_reservations(){

    }

    public function room_reservations(){

    }

    public function ticket_reservations(){

    }

    public function insurance_reservations(){

    }

    public function car_reservations(){

    }
}
