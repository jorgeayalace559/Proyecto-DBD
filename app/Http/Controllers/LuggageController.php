<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Luggage;
use Validator;

class LuggageController extends Controller
{
	 public function rules(){
    	return
    	[
    		'weight' => 'required|numeric',
    		'cost' => 'required|numeric',
    		'type' => 'required|string',
    		'passenger_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$luggages = Luggage::all();
    	return $luggages;
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
        
        $luggages = new \App\Luggage;
        $luggages->weight = $request->get('weight');
        $luggages->cost = $request->get('cost');
        $luggages->type = $request->get('type');
        $luggages->passenger_id = $request->get('passenger_id');
        $luggages->save();
        return $luggages;
    }

    public function show($id)
    {
    	$luggages = Luggage::findOrFail($id);
    	return $luggages;
    }

    public function edit(Luggage $luggages)
    {
    	//
    }

    public function update(Request $request, Luggage $luggages)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $luggages = new \App\Luggage;
        $luggages->weight = $request->get('weight');
        $luggages->cost = $request->get('cost');
        $luggages->type = $request->get('type');
        $luggages->passenger_id = $request->get('passenger_id');
        $luggages->save();
        return $luggages;
    }

    public function destroy(Luggage $luggages)
    {
    	if($luggages->es_valido){
            $luggages->es_valido = false;
            $luggages->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
