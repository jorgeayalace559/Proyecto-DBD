<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
    	'destination',
    	'begin_date',
    	'end_date',
    	'origin',
    	'state_id'
    ];

    public function states(){

    }

    public function airplanes(){
    	
    }
}
