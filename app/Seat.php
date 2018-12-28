<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
    	'number',
    	'type',
    	'remaining',
    	'ticket_id',
        'airplane_id',
    ];

    public function ticket(){
    	return $this->belongsTo('App\Ticket');
    }

    public function airplane(){
    	return $this->belongsTo('App\Airplane');
    }
}
