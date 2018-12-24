<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = [
    	'rut',
    	'name',
    	'ticket_id'
    ];

    public function luggages(){

    }

    public function tickets(){
    	
    }
}
