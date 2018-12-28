<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TicketReservation;
use Validator;

class TicketReservationController extends Controller
{
	 public function rules(){
    	return
    	[
    		'cost' => 'required|numeric',
    		'date' => 'required|string',
    		'purchase_order_id' => 'required|numeric',
    		'package_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$ticketreservations = TicketReservation::all();
    	return $ticketreservations;
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
        
        $ticketreservations = new \App\TicketReservation;
        $ticketreservations->cost = $request->get('cost');
        $ticketreservations->date = $request->get('date');
        $ticketreservations->purchase_order_id = $request->get('purchase_order_id');
        $ticketreservations->package_id = $request->get('package_id');
        $ticketreservations->save();
        return $ticketreservations;
    }

    public function show(TicketReservation $ticketreservations)
    {
    	return $ticketreservations;
    }

    public function edit(TicketReservation $ticketreservations)
    {
    	//
    }

    public function update(Request $request, TicketReservation $ticketreservations)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $ticketreservations = new \App\TicketReservation;
        $ticketreservations->cost = $request->get('cost');
        $ticketreservations->date = $request->get('date');
        $ticketreservations->purchase_order_id = $request->get('purchase_order_id');
        $ticketreservations->package_id = $request->get('package_id');
        $ticketreservations->save();
        return $ticketreservations;
    }

    public function destroy(TicketReservation $ticketreservations)
    {
    	if($ticketreservations->es_valido){
            $ticketreservations->es_valido = false;
            $ticketreservations->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
