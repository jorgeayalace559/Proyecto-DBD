<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
    	'cost',
    	'quantity_passengers',
    	'ticket_reservation_id',
    	'flight_id'
    ];

    public function passengers(){

    }

    public function reservation_tickets(){

    }

    public function seats(){
    	
    }
}
