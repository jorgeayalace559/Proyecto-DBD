<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    protected $fillable = [
    	'name'
    ];
    protected $hidden=['created_at','updated_at'];

    public function cities(){
        return $this->hasMany('App\Citie');
    }
}
