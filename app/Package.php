<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
    	'quantity',
    	'name',
    	'cost',
    	'nights',
    	'origin_id',
    	'destination_id',
        'room_reservation_id',
        'package_reservation_id'
    ];
    protected $hidden=['created_at','updated_at'];

    public function car_reservations(){
        return $this->hasMany('App\CarReservation');
    }

    public function package_reservations(){
        return $this->hasMany('App\PackageReservation');
    }

    public function ticket_reservations(){
        return $this->hasMany('App\TicketReservation');
    }

    public function room_reservations(){
    	return $this->belongsTo('App\RoomReservation');
    }
}
