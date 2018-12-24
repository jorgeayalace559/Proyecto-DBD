<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = [
    	'capacity',
    	'flight_id'
    ];

    public function flights(){
    	
    }
}
