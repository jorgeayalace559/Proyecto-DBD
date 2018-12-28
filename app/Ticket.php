<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;

class Ticket extends Model
{
    protected $fillable = [
    	'cost',
    	'quantity_passengers',
    	'flight_id',
    ];

    public function passengers(){
        return $this->hasMany('App\Passenger');
    }

    public function ticket_reservation(){
        return $this->belongsTo('App\Ticket_Reservation');
    }

    public function seats(){
	   return $this->hasMany('App\Seat');
    }

    public function flight(){
        return $this->belongsTo('App\Flight');
    }
}
