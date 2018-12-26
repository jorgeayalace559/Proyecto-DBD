<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
    	'capacity',
    	'city',
    	'patent',
    	'ticket_reservation_id'
    ];

    public function car_reservation(){
    	return $this->belongsTo('App\Car_Reservation');
    }
}
