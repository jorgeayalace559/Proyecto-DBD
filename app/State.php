<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
    	'condition',
        'flight_id'
    ];
    protected $hidden=['created_at','updated_at'];

    public function flight(){
    	return $this->belongsTo('App\Flight');
    }
}
