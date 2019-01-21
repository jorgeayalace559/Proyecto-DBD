<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Citie;
use Validator;
class FlightController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $flights = Flight::all();
        return $flights;
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
        $verifyFlight = Flight::find($request->id);
        $flights = new Flight();

        if($verifyFlight == null){

            $destination_id = Citie::find($request->origin_id);
            $begin_date = $request->begin_date;
            $end_date = $request->end_date;
            $origin_id = Citie::find($request->origin_id);
            $platform = $request->platform;

            if(is_numeric($platform) and $destination_id != null and $origin_id != null){

                $flights->updateOrCreate([
                    'destination_id' => $request->destination_id,
                    'begin_date' => $request->begin_date,
                    'end_date' => $request->end_date,
                    'origin_id' => $request->origin_id,
                    'platform' => $request->platform

                ]);
            }
            else{
                return "Error en el ingreso de parametros";
            }
        }
        else{

            $destination_id = Citie::find($request->origin_id);
            $begin_date = $request->begin_date;
            $end_date = $request->end_date;
            $origin_id = Citie::find($request->origin_id);
            $platform = $request->platform;

            if(is_numeric($platform) and $destination_id != null and $origin_id != null){

                $flights->updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'destination_id' => $request->destination_id,
                    'begin_date' => $request->begin_date,
                    'end_date' => $request->end_date,
                    'origin_id' => $request->origin_id,
                    'platform' => $request->platform

                ]);
            }

            else{
                return "Error en los parametros ingresados";
            }
        }

        return Flight::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Flight::find($id);
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
        $flights = Flight::find($id);
        $flights->delete();
        return "Se ha eliminado un vuelo";
    }
}
