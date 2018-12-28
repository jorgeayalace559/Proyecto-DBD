<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = [
    	'capacity',
    	'flight_id'
    ];

    public function flight(){
    	return $this->belongsTo('App\Flight');
    }

    public function seats(){
    	return $this->hasMany('App\Seat');
    }
}
