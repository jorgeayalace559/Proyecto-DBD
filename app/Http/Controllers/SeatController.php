<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seats;
use Validator;

class SeatController extends Controller
{
	 public function rules(){
    	return
    	[
    		'number' => 'required|numeric',
    		'type' => 'required|string',
    		'remaining' => 'required|numeric',
    		'ticket_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$seats = Seat::all();
    	return $seats;
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
        
        $seats = new \App\Seat;
        $seats->number = $request->get('number');
        $seats->type = $request->get('type');
        $seats->remaining = $request->get('remaining');
        $seats->ticket_id = $request->get('ticket_id');
        $seats->save();
        return $seats;
    }

    public function show(Seat $seats)
    {
    	return $seats;
    }

    public function edit(Seat $seats)
    {
    	//
    }

    public function update(Request $request, Seat $seats)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $seats = new \App\Seat;
        $seats->number = $request->get('number');
        $seats->type = $request->get('type');
        $seats->remaining = $request->get('remaining');
        $seats->ticket_id = $request->get('ticket_id');
        $seats->save();
        return $seats;
    }

    public function destroy(Seat $seats)
    {
    	if($seats->es_valido){
            $seats->es_valido = false;
            $seats->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
