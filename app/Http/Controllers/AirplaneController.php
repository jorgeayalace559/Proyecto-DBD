<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airplane;	
use App\Flight;
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
		$airplanes = new Airplane();

		if($verifyAirplane == null){

			//Se guarda el nombre ingresado en una variable.
			$name = $request->name;
			//Se guarda la capacidad ingresada en una variable.
			$capacity = $request->capacity;
			//Se busca si la id ingresada existe en la tabla flight.
			//Da null si la id no existe.
			$flight_id = Flight::find($request->flight_id);

			if($flight_id != null and !(is_numeric($name)) and $capacity > 50 and $capacity < 80){

				$airplanes->create([
					
					'name' => $name,
					'capacity' => $capacity,
					'flight_id' => $request->flight_id
	
				]);

			}
			else{
				return "Error en los parametros ingresados";
			}
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
