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

    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }

    public function room_reservation(){
    	return $this->belongsTo('App\Room_Reservation');
    }
}
