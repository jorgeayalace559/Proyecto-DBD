<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
    	'number',
    	'ticket_id',
        'airplane_id'
    ];
    protected $hidden=['created_at','updated_at'];

    public function ticket(){
    	return $this->belongsTo('App\Ticket');
    }

    public function airplane(){
    	return $this->belongsTo('App\Airplane');
    }
}
