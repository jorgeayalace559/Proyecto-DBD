<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
    	'number',
    	'capacity',
    	'type',
    	'cost',
    	'hotel_id'
    ];

    public function hotels(){

    }

    public function room_reservations(){
    	
    }
}
