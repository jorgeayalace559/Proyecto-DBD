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
    protected $hidden=['created_at','updated_at'];

    public function purchase_orders(){
    	return $this->hasMany('App\PurchaseOrder');
    }
}
