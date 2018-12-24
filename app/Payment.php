<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
    	'type',
    	'bank',
    	'count',
    	'quotas',
    	'purchase_order_id'
    ];

    public function purchase_orders(){
    	
    }
}
