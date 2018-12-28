<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countrie;
use Validator;

class CountrieController extends Controller
{
	 public function rules(){
    	return
    	[
    		'name' => 'required|string'
    	];
    }

    public function index()
    {
    	$countries = Countrie::all();
    	return $countries;
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
        
        $countries = new \App\Countrie;
        $countries->name = $request->get('name');
        $countries->save();
        return $countries;
    }

    public function show($id)
    {
    	$countries = Countrie::findOrFail($id);
        return $countries;
    }

    public function edit(Car $car)
    {
    	//
    }

    public function update(Request $request, Car $countries)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $countries = new \App\Countrie;
        $countries->name = $request->get('name');
        $countries->save();
        return $countries;
    }

    public function destroy(Car $countries)
    {
    	if($countries->es_valido){
            $countries->es_valido = false;
            $countries->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
