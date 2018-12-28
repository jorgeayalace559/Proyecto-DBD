<?php

namespace App\Http\Controllers;

use App\Airplane;	
use Illuminate\Http\Request;
use Session;

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
    	$airplanes = Airplane::paginate(5);
    	return view('airplanes.index',compact('airplanes'));
    }

    public function create(Request $request)
    {
    	return view('airplanes.create');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'capacity' => 'required',
    		'flight_id' => 'required'
    	]);

    	Airplane::create($request->all());

    	Session::flash('message','Se agrego correctamente');
    	return redirect()->route('airplanes.index');
    }

    public function show(Airplane $airplane){
    	$airplane = Airplane::find($airplane);
    	return $airplane;
    }

    public function edit(Airplane $airplane)
    {
    	return view('airplanes.edit',compact('airplane'));
    }

    public function update(Request $request, Airplane $airplane)
    {
    	$request->validate([
    		'capacity' => 'required',
    		'flight_id' => 'required'
    	]);

    	$airplane->update($request->all());
    	Session::flash('message','Se actualizo correctamente');
    	return redirect()->route('airplanes.index');
    }

    public function destroy(Airplane $airplane)
    {
    	$airplane->delete();
    	Session::flash('message','Se elimino correctamente');
    	return redirect()->route('airplanes.index');
    }
}
