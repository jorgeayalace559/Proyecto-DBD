<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance_Reservation extends Model
{
    protected $fillable = [
    	'cost',
    	'date',
    	'begin_date',
    	'end_date',
    	'purchase_order_id'
    ];

    public function purchase_order(){
        return $this->belongsTo('App\Purchase_Order');
    }

    public function insurances(){
    	return $this->hasMany('App\Insurances');
    }
}
