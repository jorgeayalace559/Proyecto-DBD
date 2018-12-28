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
        return $this->hasMany('App\Car_Reservation');
    }

    public function package_reservations(){
        return $this->hasMany('App\Package_Reservation');
    }

    public function ticket_reservations(){
        return $this->hasMany('App\Ticket_Reservation');
    }

    public function room_reservations(){
    	return $this->hasMany('App\Room_Reservation');
    }
}
