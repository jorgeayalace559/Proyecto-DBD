<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luggage extends Model
{
    protected $fillable = [
    	'weight',
    	'cost',
    	'type',
    	'passenger_id'
    ];

    public function passenger(){
    	return $this->belongsTo('App\Passenger');
    }
}
