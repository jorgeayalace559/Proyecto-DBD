<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReservation extends Model
{
    protected $fillable = [
    	'cost',
    	'date',
    	'purchase_order_id',
    	'package_id'
    ];
    protected $hidden=['created_at','updated_at'];

    public function package(){
        return $this->belongsTo('App\Package');
    }

    public function purchase_order(){
        return $this->belongsTo('App\PurchaseOrder');
    }

    public function tickets(){
    	return $this->hasMany('App\Ticket');
    }
}
