<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = [
    	'rut',
    	'name',
    	'ticket_id',
    ];
    protected $hidden=['created_at','updated_at'];

    public function luggages(){
        return $this->hasMany('App\Luggage');
    }

    public function ticket(){
    	return $this->belongsTo('App\Ticket');
    }
}
