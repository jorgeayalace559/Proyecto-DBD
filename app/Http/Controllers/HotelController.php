<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use Validator;

class HotelController extends Controller
{
	 public function rules(){
    	return
    	[
    		'stars' => 'required|numeric',
    		'capacity' => 'required|numeric',
    		'type' => 'required|string'
    	];
    }

    public function index()
    {
    	$hotels = Hotel::all();
    	return $hotels;
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
        
        $hotels = new \App\Hotel;
        $hotels->stars = $request->get('stars');
        $hotels->capacity = $request->get('capacity');
        $hotels->type = $request->get('type');
        $hotels->save();
        return $hotels;
    }

    public function show(Hotel $hotels)
    {
    	return $hotels;
    }

    public function edit(Hotel $Hotel)
    {
    	//
    }

    public function update(Request $request, Hotel $hotels)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $hotels = new \App\Hotel;
        $hotels->stars = $request->get('stars');
        $hotels->capacity = $request->get('capacity');
        $hotels->type = $request->get('type');
        $hotels->save();
        return $hotels;
    }

    public function destroy(Hotel $hotels)
    {
    	if($hotels->es_valido){
            $hotels->es_valido = false;
            $hotels->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
