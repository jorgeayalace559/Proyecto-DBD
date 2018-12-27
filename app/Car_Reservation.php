<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_Reservation extends Model
{
   	protected $fillable = [
    	'cost',
    	'date',
    	'begin_date',
    	'end_date',
    	'purchase_order_id',
    	'package_id'
    ];

    public function cars(){
        return $this->hasMany('App\Car');
    }

    public function purchase_order(){
        return $this->belongsTo('App\PurchaseOrder');
    }

    public function package(){
    	return $this->belongsTo('App\Package');
    }

}
