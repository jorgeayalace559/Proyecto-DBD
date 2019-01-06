<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
    	'stars',
    	'capacity',
    	'name'
    ];

    protected $hidden=['created_at','updated_at'];


    public function rooms(){
    	return $this->hasMany('App\Room');
    }
}
