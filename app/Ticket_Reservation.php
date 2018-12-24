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

    public function packages(){

    }

    public function purchase_orders(){

    }

    public function tickets(){
    	
    }
}
