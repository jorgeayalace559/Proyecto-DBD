<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passenger;
use Validator;

class PassengerController extends Controller
{
	 public function rules(){
    	return
    	[
    		'rut' => 'required|string',
    		'name' => 'required|string',
    		'ticket_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$passengers = Passenger::all();
    	return $passengers;
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
        
        $passengers = new \App\Passenger;
        $passengers->rut = $request->get('rut');
        $passengers->name = $request->get('name');
        $passengers->ticket_id = $request->get('ticket_id');
        $passengers->save();
        return $passengers;
    }

    public function show(Passenger $passengers)
    {
    	return $passengers;
    }

    public function edit(Passenger $passengers)
    {
    	//
    }

    public function update(Request $request, Passenger $passengers)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $passengers = new \App\Passenger;
        $passengers->rut = $request->get('rut');
        $passengers->name = $request->get('name');
        $passengers->ticket_id = $request->get('ticket_id');
        $passengers->save();
        return $passengers;
    }

    public function destroy(Passenger $passengers)
    {
    	if($passengers->es_valido){
            $passengers->es_valido = false;
            $passengers->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
