<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
    	'origin',
    	'destination',
    	'begin_date',
    	'end_date',
    	'condition'
    ];

    public function flights(){
    	
    }
}
