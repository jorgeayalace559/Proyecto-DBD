<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package_Reservation extends Model
{
    protected $fillable = [
    	'cost',
    	'date',
    	'begin_date',
    	'end_date',
    	'purchase_order_id',
    	'package_id'
    ];

    public function package(){
        return $this->belongsTo('App\Package');
    }

    public function purchase_order(){
    	return $this->belongsTo('App\PurchaseOrder');
    }
}
