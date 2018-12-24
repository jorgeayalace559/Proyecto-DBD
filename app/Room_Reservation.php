<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room_Reservation extends Model
{
    protected $fillable = [
    	'cost',
    	'date',
    	'begin_date',
    	'end_date',
    	'purchase_order_id',
    	'package_id'
    ];

    public function packages(){

    }

    public function purchase_orders(){

    }

    public function rooms(){

    }
}
