<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
    	'edad',
    	'type',
    	'city',
    	'name'
    ];

    public function insurance_reservation(){
    	return $this->belongsTo('App\Insurance_Reservation');
    }
}
