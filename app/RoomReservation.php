<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    protected $fillable = [
    	'cost',
    	'begin_date',
    	'end_date',
    	'purchase_order_id',
        'day',
        'room_id'
    ];
    protected $hidden=['updated_at'];

    public function package(){
        return $this->belongsTo('App\Package');
    }

    public function purchase_order(){
        return $this->belongsTo('App\PurchaseOrder');
    }

    public function room(){
        return $this->belongsTo('App\Room');
    }
}
