<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Luggage;
use App\Passenger;
use Validator;

class LuggageController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $luggages = Luggage::all();
        return $luggages;
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
    public function storeOrUpdate(Request $request)
    {
        $verifyLuggage = Luggage::find($request->id);
        $luggages = new Luggage();

        if($verifyLuggage == null){

            $weight = $request->weight;
            $cost = $request->cost;
            $type = $request->type;
            $passenger_id = Passenger::find($request->passenger_id);

            if($weight > 0 and $weight < 50 and $cost > 0 and !(is_numeric($type)) and $passenger_id != null){

                $luggages->updateOrCreate([
                    'weight' => $request->weight,
                    'cost' => $request->cost,
                    'type' => $request->type,
                    'passenger_id' => $request->passenger_id

                ]);
            }
            else{
                return "Error en el ingreso de parametros"; 
            }
        }
        else{

            $weight = $request->weight;
            $cost = $request->cost;
            $type = $request->type;
            $passenger_id = Passenger::find($request->passenger_id);

            if($weight > 0 and $weight < 50 and $cost > 0 and !(is_numeric($type)) and $passenger_id != null){

                $luggages->updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'weight' => $request->weight,
                    'cost' => $request->cost,
                    'type' => $request->type,
                    'passenger_id' => $request->passenger_id

                ]);
            }
            else{
                return "Error en el ingreso de parametros"; 
            }
        }

        return Luggage::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Luggage::find($id);
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
        $luggages = Luggage::find($id);
        $luggages->delete();
        return "Se ha eliminado un equipaje";
    }
}