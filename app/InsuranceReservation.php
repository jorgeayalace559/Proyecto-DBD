<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceReservation extends Model
{
    protected $fillable = [
    	'cost',
    	'begin_date',
    	'end_date',
    	'purchase_order_id'
    ];

    protected $hidden=['updated_at'];


    public function purchase_order(){
        return $this->belongsTo('App\PurchaseOrder');
    }

    public function package(){
        return $this->hasMany('App\Package');
    }
    
    public function insurances(){
    	return $this->hasMany('App\Insurances');
    }
}
