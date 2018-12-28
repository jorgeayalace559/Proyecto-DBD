<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackageReservation;
use Validator;

class PackageReservationController extends Controller
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
    	$packagereservations = PackageReservation::all();
    	return $packagereservations;
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
        
        $packagereservations = new \App\PackageReservation;
        $packagereservations->cost = $request->get('cost');
        $packagereservations->date = $request->get('date');
        $packagereservations->begin_date = $request->get('begin_date');
        $packagereservations->end_date = $request->get('end_date');
        $packagereservations->purchase_order_id = $request->get('purchase_order_id');
        $packagereservations->package_id = $request->get('package_id');
        $packagereservations->save();
        return $packagereservations;
    }

    public function show($id)
    {
    	$packagereservations = PackageReservation::findOrFail($id);
    	return $packagereservations;
    }

    public function edit(PackageReservation $packagereservations)
    {
    	//
    }

    public function update(Request $request, PackageReservation $packagereservations)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $packagereservations = new \App\PackageReservation;
        $packagereservations->cost = $request->get('cost');
        $packagereservations->date = $request->get('date');
        $packagereservations->begin_date = $request->get('begin_date');
        $packagereservations->end_date = $request->get('end_date');
        $packagereservations->purchase_order_id = $request->get('purchase_order_id');
        $packagereservations->package_id = $request->get('package_id');
        $packagereservations->save();
        return $packagereservations;
    }

    public function destroy(PackageReservation $packagereservations)
    {
    	if($packagereservations->es_valido){
            $packagereservations->es_valido = false;
            $packagereservations->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
