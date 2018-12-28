<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insurance;
use Validator;

class InsuranceController extends Controller
{
	 public function rules(){
    	return
    	[
    		'age' => 'required|numeric',
    		'type' => 'required|string',
    		'city' => 'required|string'
    	];
    }

    public function index()
    {
    	$insurances = Insurance::all();
    	return $insurances;
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
        
        $insurances = new \App\Insurance;
        $insurances->age = $request->get('age');
        $insurances->type = $request->get('type');
        $insurances->city = $request->get('city');
        $insurances->save();
        return $insurances;
    }

    public function show($id)
    {
    	$insurances = Insurance::findOrFail($id);
        return $insurances;
    }

    public function edit(Insurance $Insurance)
    {
    	//
    }

    public function update(Request $request, Insurance $insurances)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $insurances = new \App\Insurance;
        $insurances->age = $request->get('age');
        $insurances->type = $request->get('type');
        $insurances->city = $request->get('city');
        $insurances->save();
        return $insurances;
    }

    public function destroy(Insurance $insurances)
    {
    	if($insurances->es_valido){
            $insurances->es_valido = false;
            $insurances->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}

