<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
    	'number',
    	'type',
    	'remaining',
    	'ticket_id'
    ];

    public function tickets(){
    	
    }

    public function airplane(){
    	return $this->hasMany('App\Airplane');
    }
}
