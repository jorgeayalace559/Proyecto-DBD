<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Validator;

class CarController extends Controller
{
	 public function rules(){
    	return
    	[
    		'name' => 'required|string',
    		'airport_name' => 'required|string'
    	];
    }

    public function index()
    {
    	$cars = Car::all();
    	return $cars;
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
        
        $cars = new \App\Car;
        $cars->nombre = $request->get('nombre');
        $cars->airport_name = $request->get('airport_name');
        $cars->save();
        return $cars;
    }

    public function show(Car $cars)
    {
    	return $cars;
    }

    public function edit(Car $cars)
    {
    	//
    }

    public function update(Request $request, Car $cars)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        $cars = new \App\Car;
        $cars->nombre = $request->get('nombre');
        $cars->airport_name = $request->get('airport_name');
        $cars->save();
        return $cars;
    }

    public function destroy(Car $cars)
    {
    	if($cars->es_valido){
            $cars->es_valido = false;
            $cars->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
