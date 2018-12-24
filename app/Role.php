<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
    	'type',
    	'description'
    ];

    public function users(){
    	
    }
}
