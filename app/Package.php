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
        'package_reservation_id',
        'car_reservation_id',
        'insurance_reservation_id',
        'ticket_reservation_id' 
    ];
    protected $hidden=['created_at','updated_at'];

    public function car_reservations(){
        return $this->belongsTo('App\CarReservation');
    }

    public function package_reservations(){
        return $this->belongsTo('App\PackageReservation');
    }

    public function ticket_reservations(){
        return $this->belongsTo('App\TicketReservation');
    }

    public function room_reservations(){
    	return $this->belongsTo('App\RoomReservation');
    }

    public function insurance_reservations(){
        return $this->belongsTo('App\InsuranceReservation');
    }
}
