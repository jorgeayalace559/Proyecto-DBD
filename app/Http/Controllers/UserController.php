<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
	 public function rules(){
    	return
    	[
    		'name' => 'required|string', 
	        'email' => 'required|string', 
	        'password' => 'required|string',
	        'email_verified_at' => 'required|string',
	        'miles' => 'required|numeric',
	        'rut' => 'required|string',
	        'role_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$users = User::all();
    	return $users;
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
        
        $users = new \App\User;
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = $request->get('password');
        $users->email_verified_at = $request->get('email_verified_at');
        $users->miles = $request->get('miles');
        $users->rut = $request->get('rut');
        $users->rol_id = $request->get('rol_id');
        $users->save();
        return $users;
    }

    public function show($id)
    {
    	$users = User::findOrFail($id);
    	return $users;
    }

    public function edit(User $users)
    {
    	//
    }

    public function update(Request $request, User $users)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $users = new \App\User;
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = $request->get('password');
        $users->email_verified_at = $request->get('email_verified_at');
        $users->miles = $request->get('miles');
        $users->rut = $request->get('rut');
        $users->rol_id = $request->get('rol_id');
        $users->save();
        return $users;
    }

    public function destroy(User $users)
    {
    	if($users->es_valido){
            $users->es_valido = false;
            $users->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
