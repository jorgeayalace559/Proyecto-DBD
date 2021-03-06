<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passenger;
use App\Ticket;
use App\Countrie;
use Validator;

class PassengerController extends Controller
{
	 /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $passengers = Passenger::all();
        $countries = Countrie::all();
        return view('passenger.show',['passengers'=> $passengers,'countries' => $countries]);
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
        $verifyPassenger = Passenger::find($request->id);
        $passenger = new Passenger();
 
        if($verifyPassenger == null){
 
            $rut = $request->rut;
            $name = $request->name;
            $ticket_id = Ticket::find($request->ticket_id);

            if(!(is_numeric($name))
               and $ticket_id != null){

                $passenger->updateOrCreate([

                    'rut' => $rut,
                    'name' => $name,
                    'ticket_id' => $request->ticket_id
    
                ]);
            }
            else{
                return "Error en los parametros ingresados";
            }
        }
        else{

            $rut = $request->rut;
            $name = $request->name;
            $ticket_id = Ticket::find($request->ticket_id);

            if(!(is_numeric($name))
               and $ticket_id != null){

                $passenger->updateOrCreate([
                    'id' => $request->id
                ],
                [

                    'rut' => $rut,
                    'name' => $name,
                    'ticket_id' => $request->ticket_id
    
                ]);
            }
            else{
                return "Error en los parametros ingresados";
            }
        }
 
         return Passenger::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Passenger::find($id);
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
        $passenger = Passenger::find($id);
        $passenger->delete();
        return "Se ha eliminado un pasajero";
    }
}
