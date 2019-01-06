<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luggage extends Model
{

	protected $table = 'luggages'; 

    protected $fillable = [
    	'weight',
    	'cost',
    	'type',
    	'passenger_id',
    ];
    protected $hidden=['created_at','updated_at'];

    public function passenger(){
    	return $this->belongsTo('App\Passenger');
    }
}
