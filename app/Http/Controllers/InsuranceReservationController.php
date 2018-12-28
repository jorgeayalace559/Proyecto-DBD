<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsuranceReservation;
use Validator;

class InsuranceReservationController extends Controller
{
	 public function rules(){
    	return
    	[
    		'cost' => 'required|numeric',
    		'date' => 'required|string',
    		'begin_date' => 'required|string',
    		'end_date' => 'required|string',
    		'purchase_order_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$insurancereservations = InsuranceReservation::all();
    	return $insurancereservations;
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
        
        $insurancereservations = new \App\InsuranceReservation;
        $insurancereservations->cost = $request->get('cost');
        $insurancereservations->date = $request->get('date');
        $insurancereservations->begin_date = $request->get('begin_date');
        $insurancereservations->end_date = $request->get('end_date');
        $insurancereservations->purchase_order_id = $request->get('purchase_order_id');
        $insurancereservations->save();
        return $insurancereservations;
    }

    public function show($id)
    {
    	$insurancereservations = InsuranceReservation::findOrFail($id);
    	return $insurancereservations;
    }

    public function edit(InsuranceReservation $insurancereservations)
    {
    	//
    }

    public function update(Request $request, InsuranceReservation $insurancereservations)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $insurancereservations = new \App\InsuranceReservation;
        $insurancereservations->cost = $request->get('cost');
        $insurancereservations->date = $request->get('date');
        $insurancereservations->begin_date = $request->get('begin_date');
        $insurancereservations->end_date = $request->get('end_date');
        $insurancereservations->purchase_order_id = $request->get('purchase_order_id');
        $insurancereservations->save();
        return $insurancereservations;
    }

    public function destroy(InsuranceReservation $insurancereservations)
    {
    	if($insurancereservations->es_valido){
            $insurancereservations->es_valido = false;
            $insurancereservations->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}

