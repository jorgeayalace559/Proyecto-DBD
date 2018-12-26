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
        return $this->hasMany('App\Luggage');
    }

    public function ticket(){
    	return $this->belongsTo('App\Ticket');
    }
}
