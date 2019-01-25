<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{

    protected $table = 'airplanes'; 

    protected $fillable = [
        'name',
        'capacity',
        'remaining',
    	'flight_id'
    ];

    protected $hidden=['created_at','updated_at'];

    public function flight(){
    	return $this->belongsTo('App\Flight');
    }

    public function seats(){
    	return $this->hasMany('App\Seat');
    }
}
