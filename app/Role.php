<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
    	'type',
    	'description'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
