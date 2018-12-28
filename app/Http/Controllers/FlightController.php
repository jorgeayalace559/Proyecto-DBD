<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use Validator;
class FlightController extends Controller
{
	 public function rules(){
    	return
    	[
    		'destination_id' => 'required|numeric',
    		'begin_date' => 'required|string',
    		'end_date' => 'required|string',
    		'origin_id' => 'required|numeric',
    		'platform' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$flights = Flight::all();
    	return $flights;
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
        
        $flights = new \App\Flight;
        $flights->destination_id = $request->get('destination_id');
        $flights->begin_date = $request->get('begin_date');
        $flights->end_date = $request->get('end_date');
        $flights->origin_id = $request->get('origin_id');
        $flights->platform = $request->get('platform');
        $flights->save();
        return $flights;
    }

    public function show($id)
    {
    	$flights = Flight::findOrFail($id);
        return $flights;
    }

    public function edit(Flight $Flight)
    {
    	//
    }

    public function update(Request $request, Flight $flights)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $flights = new \App\Flight;
        $flights->cost = $request->get('cost');
        $flights->date = $request->get('date');
        $flights->begin_date = $request->get('begin_date');
        $flights->end_date = $request->get('end_date');
        $flights->purchase_order_id = $request->get('purchase_order_id');
        $flights->package_id = $request->get('package_id');
        $flights->save();
        return $flights;
    }

    public function destroy(Flight $flights)
    {
    	if($flights->es_valido){
            $flights->es_valido = false;
            $flights->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
