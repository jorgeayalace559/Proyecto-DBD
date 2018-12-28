<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Citie;
use Validator;	

class CitieController extends Controller
{
	 public function rules(){
    	return
    	[
    		'name' => 'required|string',
    		'airport_name' => 'required|string'
    	];
    }

    public function index()
    {
    	$cities = Citie::all();
    	return $cities;
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
        
        $cities = new \App\Citie;
        $cities->nombre = $request->get('nombre');
        $cities->airport_name = $request->get('airport_name');
        $cities->save();
        return $cities;
    }

    public function show(Citie $cities)
    {
    	return $cities;
    }

    public function edit(Citie $cities)
    {
    	//
    }

    public function update(Request $request, Citie $cities)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        $cities = new \App\Citie;
        $cities->nombre = $request->get('nombre');
        $cities->airport_name = $request->get('airport_name');
        $cities->save();
        return $cities;
    }

    public function destroy(Citie $cities)
    {
    	if($cities->es_valido){
            $cities->es_valido = false;
            $cities->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
