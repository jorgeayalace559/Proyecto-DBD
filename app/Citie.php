<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{
    protected $fillable = [
    	'name',
    	'airport_name'
    ];

    public function flights(){
        return $this->hasMany('App\Flight');
    }

    public function countrie(){
        return $this->belongsTo('App\Countrie');
    }
}
