<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
    	'quantity',
    	'name',
    	'cost',
    	'nights',
    	'origin_id',
    	'destination_id'
    ];

    public function car_reservations(){

    }

    public function package_reservations(){

    }

    public function ticket_reservations(){

    }

    public function room_reservations(){
    	
    }
}
