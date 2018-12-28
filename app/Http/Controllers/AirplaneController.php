<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airplane;	
use Session;

class AirplaneController extends Controller
{
    public function rules(){
    	return
    	[
    		'capacity' => 'required|string',
    		'flight_id' => 'required|numeric'
    	];
    }

   public function index()
    {
    	$airplanes = Airplane::all();
    	return $airplanes;
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
        
        $airplanes = new \App\Airplane;
        $airplanes->capacity = $request->get('capacity');
        $airplanes->flight_id = $request->get('flight_id');
        $airplanes->save();
        return $airplanes;
    }

    public function show(Airplane $airplanes)
    {
    	return $airplanes;
    }

    public function edit(Airplane $airplanes)
    {
    	//
    }

    public function update(Request $request, Airplane $airplanes)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        $airplanes = new \App\Airplane;
        $airplanes->nombre = $request->get('nombre');
        $airplanes->airport_name = $request->get('airport_name');
        $airplanes->save();
        return $airplanes;
    }

    public function destroy(Airplane $airplanes)
    {
    	if($airplanes->es_valido){
            $airplanes->es_valido = false;
            $airplanes->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
