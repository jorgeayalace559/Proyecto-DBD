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

    public function purchase_orders(){

    }

    public function insurances(){
    	
    }
}
