<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use Validator;

class StateController extends Controller
{
	 public function rules(){
    	return
    	[
    		'condition' => 'required|string',
       		'flight_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$states = State::all();
    	return $states;
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
        
        $states = new \App\State;
        $states->condition = $request->get('condition');
        $states->flight_id = $request->get('flight_id');
        $states->save();
        return $states;
    }

    public function show($id)
    {
    	$states = State::findOrFail($id);
    	return $states;
    }

    public function edit(State $states)
    {
    	//
    }

    public function update(Request $request, State $states)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $states = new \App\State;
        $states->condition = $request->get('condition');
        $states->flight_id = $request->get('flight_id');
        $states->save();
        return $states;
    }

    public function destroy(State $states)
    {
    	if($states->es_valido){
            $states->es_valido = false;
            $states->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
