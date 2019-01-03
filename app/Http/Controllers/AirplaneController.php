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

<<<<<<< Updated upstream
   public function index()
    {
    	$airplanes = Airplane::all();
    	return $airplanes;
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
        
        $airplanes = new \App\Airplane;
        $airplanes->capacity = $request->get('capacity');
        $airplanes->flight_id = $request->get('flight_id');
        $airplanes->save();
        return $airplanes;
    }

    public function show(Airplane $airplanes)
    {
    	return $airplanes;
    }

    public function edit(Airplane $airplanes)
    {
    	//
    }

    public function update(Request $request, Airplane $airplanes)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        $airplanes = new \App\Airplane;
        $airplanes->nombre = $request->get('nombre');
        $airplanes->airport_name = $request->get('airport_name');
        $airplanes->save();
        return $airplanes;
    }

    public function destroy(Airplane $airplanes)
    {
    	if($airplanes->es_valido){
            $airplanes->es_valido = false;
            $airplanes->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
=======
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
	   return Airplane::create($request->all());
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
>>>>>>> Stashed changes
}
