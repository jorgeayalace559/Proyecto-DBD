<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
    	'stars',
    	'capacity',
    	'name',
    	'citie_id'
    ];

    protected $hidden=['created_at','updated_at'];


    public function rooms(){
    	return $this->hasMany('App\Room');
    }

    public function citie(){
    	return $this->belongsTo('App\Citie');
    }
}
