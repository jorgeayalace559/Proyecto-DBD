<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Validator;

class RoleController extends Controller
{
	 public function rules(){
    	return
    	[
    		'type' => 'required|numeric',
    		'description' => 'required|string'
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
        $roles->type = $request->get('type');
        $roles->description = $request->get('description');
        $roles->save();
        return $roles;
    }

    public function show($id)
    {
    	$roles = Role::findOrFail($id);
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
        $roles->type = $request->get('type');
        $roles->description = $request->get('description');
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
