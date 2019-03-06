<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
    	'destination_id',
    	'begin_date',
    	'end_date',
    	'origin_id',
        'platform',
        'cost'
    ];

    protected $hidden=['created_at','updated_at'];


    public function states(){
        return $this->hasMany('App\State');
    }

    public function airplanes(){
    	return $this->hasMany('App\Airplane');
    }

    public function tickets(){
        return $this->hasMany('App\Ticket');
    }

    public function citie(){
        return $this->belongsTo('App\Citie');
    }
}
