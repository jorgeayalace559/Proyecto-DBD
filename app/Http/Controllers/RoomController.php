<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Validator;

class RoomController extends Controller
{
	 public function rules(){
    	return
    	[
    		'number' => 'required|numeric',
	    	'capacity' => 'required|numeric',
	        'cost' => 'required|numeric',
	        'type' => 'required|string',
	    	'hotel_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$roles = Role::all();
    	return $roles;
    }

    public function create(Request $request)
    {
    	//
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages(); 
        }
        
        $roles = new \App\Role;
        $roles->number = $request->get('number');
        $roles->capacity = $request->get('capacity');
        $roles->cost = $request->get('cost');
        $roles->type = $request->get('type');
        $roles->hotel_id = $request->get('hotel_id');
        $roles->save();
        return $roles;
    }

    public function show(Role $roles)
    {
    	return $roles;
    }

    public function edit(Role $roles)
    {
    	//
    }

    public function update(Request $request, Role $roles)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $roles = new \App\Role;
        $roles->number = $request->get('number');
        $roles->capacity = $request->get('capacity');
        $roles->cost = $request->get('cost');
        $roles->type = $request->get('type');
        $roles->hotel_id = $request->get('hotel_id');
        $roles->save();
        return $roles;
    }

    public function destroy(Role $roles)
    {
    	if($roles->es_valido){
            $roles->es_valido = false;
            $roles->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}