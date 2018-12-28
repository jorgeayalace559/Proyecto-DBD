<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Validator;

class PackageController extends Controller
{
	 public function rules(){
    	return
    	[
    		'quantity' => 'required|numeric',
	    	'name' => 'required|string',
	    	'cost' => 'required|numeric',
	    	'nights' => 'required|numeric',
	    	'origin_id' => 'required|numeric',
	    	'destination_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$packages = Package::all();
    	return $packages;
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
        
        $packages = new \App\Package;
        $packages->quantity = $request->get('quantity');
        $packages->name = $request->get('name');
        $packages->cost = $request->get('cost');
        $packages->nights = $request->get('nights');
        $packages->origin_id = $request->get('origin_id');
        $packages->destination_id = $request->get('destination_id');
        $packages->save();
        return $packages;
    }

    public function show(Package $packages)
    {
    	return $packages;
    }

    public function edit(Package $packages)
    {
    	//
    }

    public function update(Request $request, Package $packages)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $packages = new \App\Package;
        $packages->quantity = $request->get('quantity');
        $packages->name = $request->get('name');
        $packages->cost = $request->get('cost');
        $packages->nights = $request->get('nights');
        $packages->origin_id = $request->get('origin_id');
        $packages->destination_id = $request->get('destination_id');
        $packages->save();
        return $packages;
    }

    public function destroy(Package $packages)
    {
    	if($packages->es_valido){
            $packages->es_valido = false;
            $packages->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
