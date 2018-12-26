<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_Reservation extends Model
{
    protected $fillable = [
    	'cost',
    	'date',
    	'purchase_order_id',
    	'package_id'
    ];

    public function package(){
        return $this->belongsTo('App\Package');
    }

    public function purchase_order(){
        return $this->belongsTo('App\Purchase_Order');
    }

    public function tickets(){
    	return $this->hasMany('App\Ticket');
    }
}
