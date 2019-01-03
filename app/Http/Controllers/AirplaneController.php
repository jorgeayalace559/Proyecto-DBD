<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airplane;	
use Session;

class AirplaneController extends Controller
{
   /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
   public function index()
   {
	   $airplanes = Airplane::all();
	   return $airplanes;
   }

   /**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
   public function create()
   {
	   //
   }

   /**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
   public function store(Request $request)
   {
		$verifyAirplane = Airplane::find($request->id);
		$airplane = new Airplane();

		if($verifyAirplane == null){

			$airplane->create([
				'name' => $request->name,
				'capacity' => $request->capacity,
				'flight_id' => $request->flight_id

			]);
		}
		else{
			return "El avión ingresado ya existe";
		}

		return Airplane::all();
   }

   /**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
   public function show($id)
   {
	   return Airplane::find($id);
   }

   /**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
   public function edit($id)
   {
	   //
   }

   /**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
   public function update(Request $request, $id)
   {
	   //
   }

   /**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
   public function destroy($id)
   {
	   $airplanes = Airplane::find($id);
	   $airplanes->delete();
	   return "Se ha eliminado un avion";
   }
}
