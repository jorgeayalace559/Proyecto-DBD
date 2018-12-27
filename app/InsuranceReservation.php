<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceReservation extends Model
{
    protected $fillable = [
    	'cost',
    	'date',
    	'begin_date',
    	'end_date',
    	'purchase_order_id'
    ];

    public function purchase_order(){
        return $this->belongsTo('App\PurchaseOrder');
    }

    public function insurances(){
    	return $this->hasMany('App\Insurances');
    }
}
