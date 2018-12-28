<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomReservation;
use Validator;

class RoomReservationController extends Controller
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
    	$roomreservations = RoomReservation::all();
    	return $roomreservations;
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
        
        $roomreservations = new \App\RoomReservation;
        $roomreservations->cost = $request->get('cost');
        $roomreservations->date = $request->get('date');
        $roomreservations->begin_date = $request->get('begin_date');
        $roomreservations->end_date = $request->get('end_date');
        $roomreservations->purchase_order_id = $request->get('purchase_order_id');
        $roomreservations->package_id = $request->get('package_id');
        $roomreservations->save();
        return $roomreservations;
    }

    public function show($id)
    {
    	$roomreservations = RoomReservation::findOrFail($id);
    	return $roomreservations;
    }

    public function edit(RoomReservation $roomreservations)
    {
    	//
    }

    public function update(Request $request, RoomReservation $roomreservations)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $roomreservations = new \App\RoomReservation;
        $roomreservations->cost = $request->get('cost');
        $roomreservations->date = $request->get('date');
        $roomreservations->begin_date = $request->get('begin_date');
        $roomreservations->end_date = $request->get('end_date');
        $roomreservations->purchase_order_id = $request->get('purchase_order_id');
        $roomreservations->package_id = $request->get('package_id');
        $roomreservations->save();
        return $roomreservations;
    }

    public function destroy(RoomReservation $roomreservations)
    {
    	if($roomreservations->es_valido){
            $roomreservations->es_valido = false;
            $roomreservations->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
