<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function cities(){
        return $this->hasMany('App\Citie');
    }
}
