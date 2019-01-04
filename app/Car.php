<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
    	'capacity',
    	'city_id',
    	'patent',
        'car_reservation_id'
    ];

    public function car_reservations(){
        return $this->hasMany('App\CarReservation');
    }

    public function citie(){
    	return $this->belongsTo('App\Citie');
    }
}
