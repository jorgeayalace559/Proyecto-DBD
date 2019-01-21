<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seat;
use App\Airplane;
use App\Ticket;
use Validator;

class SeatController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $seat = Seat::all();
        return $seat;
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
        $verifySeat = Seat::find($request->id);
        $seat = new Seat();
 
        if($verifySeat == null){
 
            $number = $request->number;
            $type = $request->type;
            return $type;
            $remaining = $request->remaining;
            $ticket_id = $request->ticket_id;
            $airplane_id = $request->airplane_id;

            if(is_numeric($number) and $number > 0
               and !(is_numeric($type))
               and is_numeric($remaining) and $remaining > 0
               and $ticket_id != null and $airplane_id != null){

                $seat->updateOrCreate([

                    'number' => $number,
                    'type' => $type,
                    'remaining' => $remaining,
                    'ticket_id' => $request->ticket_id,
                    'airplane_id' => $request->airplane_id
     
                ]);

            }

            else{
                return "Error en los parametros ingresados";
            }
            
        }
        else{
            $number = $request->number;
            $type = $request->type;
            $remaining = $request->remaining;
            $ticket_id = $request->ticket_id;
            $airplane_id = $request->airplane_id;

            if(is_numeric($number) and $number > 0
               and !(is_numeric($type))
               and is_numeric($remaining) and $remaining > 0
               and $ticket_id != null and $airplane_id != null){

                $seat->updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'number' => $number,
                    'type' => $type,
                    'remaining' => $remaining,
                    'ticket_id' => $request->ticket_id,
                    'airplane_id' => $request->airplane_id
     
                ]);

            }

            else{
                return "Error en los parametros ingresados";
            }
        }
 
        return Seat::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Seat::find($id);
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
        $seat = Seat::find($id);
        $seat->delete();
        return "Se ha eliminado un asiento";
    }
}
