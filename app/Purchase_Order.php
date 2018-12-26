<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_Order extends Model
{
    protected $fillable = [
    	'cost',
    	'date',
    	'user_id'
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function package_reservations(){
        return $this->hasMany('App\Package_Reservation');
    }

    public function room_reservations(){
        return $this->hasMany('App\RoomReservation');
    }

    public function ticket_reservations(){
        return $this->hasMany('App\Ticket_Reservation');
    }

    public function insurance_reservations(){
        return $this->hasMany('App\Insurance_Reservation');
    }

    public function car_reservations(){
        return $this->hasMany('App\Car_Reservation');
    }
}
