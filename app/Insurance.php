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

    protected $hidden=['created_at','updated_at'];


    public function insurance_reservation(){
    	return $this->hasMany('App\InsuranceReservation');
    }
}
