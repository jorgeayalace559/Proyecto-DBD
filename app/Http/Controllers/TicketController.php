<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Validator;

class TicketController extends Controller
{
	 public function rules(){
    	return
    	[
    		'cost' => 'required|numeric',
    		'quantity_passengers' => 'required|numeric',
    		'flight_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$tickets = Ticket::all();
    	return $tickets;
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
        
        $tickets = new \App\Ticket;
        $tickets->cost = $request->get('cost');
        $tickets->quantity_passengers = $request->get('quantity_passengers');
        $tickets->flight_id = $request->get('flight_id');
        $tickets->save();
        return $tickets;
    }

    public function show($id)
    {
    	$tickets = Ticket::findOrFail($id);
    	return $tickets;
    }

    public function edit(Ticket $tickets)
    {
    	//
    }

    public function update(Request $request, Ticket $tickets)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $tickets = new \App\Ticket;
        $tickets->cost = $request->get('cost');
        $tickets->quantity_passengers = $request->get('quantity_passengers');
        $tickets->flight_id = $request->get('flight_id');
        $tickets->save();
        return $tickets;
    }

    public function destroy(Ticket $tickets)
    {
    	if($tickets->es_valido){
            $tickets->es_valido = false;
            $tickets->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
