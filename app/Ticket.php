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
        'ticket_reservation_id'
    ];
    protected $hidden=['created_at','updated_at'];

    public function passengers(){
        return $this->hasMany('App\Passenger');
    }

    public function ticket_reservation(){
        return $this->hasMany('App\TicketReservation');
    }

    public function seats(){
	   return $this->hasMany('App\Seat');
    }

    public function flight(){
        return $this->belongsTo('App\Flight');
    }
}
