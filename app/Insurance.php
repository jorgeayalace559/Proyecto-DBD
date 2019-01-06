<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
    	'age',
    	'type',
    	'city',
    	'insurance_reservation_id'
    ];

    public function insurance_reservation(){
    	return $this->hasMany('App\InsuranceReservation');
    }
}
