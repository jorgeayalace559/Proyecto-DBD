<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
    	'edad',
    	'type',
    	'city',
    	'insurance_reservation_id'
    ];

    public function insurance_reservation(){
    	return $this->hasMany('App\InsuranceReservation');
    }
}
