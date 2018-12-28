<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
    	'capacity',
    	'city_id',
    	'patent',
    ];

    public function car_reservation(){
    	return $this->belongsTo('App\Car_Reservation');
    }

    public function citie(){
    	return $this->belongsTo('App\Citie');
    }
}
