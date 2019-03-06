<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
    	'cost',
    	'date',
    	'user_id'
    ];
    protected $hidden=['updated_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function package_reservations(){
        return $this->hasMany('App\Package_Reservation');
    }

    public function room_reservations(){
        return $this->hasMany('App\Room_Reservation');
    }

    public function ticket_reservations(){
        return $this->hasMany('App\Ticket_Reservation');
    }

    public function insurance_reservations(){
        return $this->hasMany('App\InsuranceReservation');
    }

    public function car_reservations(){
        return $this->hasMany('App\Car_Reservation');
    }

    public function payment(){
        return $this->belongsTo('App\Payment');
    }
}
