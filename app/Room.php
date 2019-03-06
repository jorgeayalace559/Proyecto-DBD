<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
    	'number',
    	'capacity',
        'cost',
        'type',
    	'hotel_id'
    ];
    protected $hidden=['created_at','updated_at'];

    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }

    public function room_reservation(){
    	return $this->hasMany('App\RoomReservation');
    }
}
