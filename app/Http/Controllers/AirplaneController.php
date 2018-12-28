<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    public function rules(){
    	return
    	[
    		'capacity' => 'required|string',
    		'flight_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	return view('airplanes.index');
    }

    public function create(Request $request){

    }

    public function store(Request $request){
    	//$validator =  
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
