<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarReservation extends Model
{
   	protected $fillable = [
    	'cost',
    	'begin_date',
    	'end_date',
    	'purchase_order_id',
    	'package_id'
    ];

    protected $hidden=['updated_at'];

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
