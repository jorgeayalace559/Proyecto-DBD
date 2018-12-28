<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarReservation
use Validator;

class CarReservationController extends Controller
{
	 public function rules(){
    	return
    	[
    		'cost' => 'required|numeric',
    		'date' => 'required|string',
    		'begin_date' => 'required|string',
    		'end_date' => 'required|string',
    		'purchase_order_id' => 'required|numeric',
    		'package_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$carreservations = CarReservation::all();
    	return $carreservations;
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
        
        $carreservations = new \App\CarReservation;
        $carreservations->cost = $request->get('cost');
        $carreservations->date = $request->get('date');
        $carreservations->begin_date = $request->get('begin_date');
        $carreservations->end_date = $request->get('end_date');
        $carreservations->purchase_order_id = $request->get('purchase_order_id');
        $carreservations->package_id = $request->get('package_id');
        $carreservations->save();
        return $carreservations;
    }

    public function show(CarReservation $carreservations)
    {
    	return $carreservations;
    }

    public function edit(CarReservation $carreservations)
    {
    	//
    }

    public function update(Request $request, CarReservation $carreservations)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $carreservations = new \App\CarReservation;
        $carreservations->cost = $request->get('cost');
        $carreservations->date = $request->get('date');
        $carreservations->begin_date = $request->get('begin_date');
        $carreservations->end_date = $request->get('end_date');
        $carreservations->purchase_order_id = $request->get('purchase_order_id');
        $carreservations->package_id = $request->get('package_id');
        $carreservations->save();
        return $carreservations;
    }

    public function destroy(CarReservation $carreservations)
    {
    	if($carreservations->es_valido){
            $carreservations->es_valido = false;
            $carreservations->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
