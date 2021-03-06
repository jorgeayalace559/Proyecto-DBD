<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Passenger;

class TicketPassengerController extends Controller
{
    /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index($id)
    {
        $ticket = Ticket::find($id);      
        if (!$ticket) {
        	return response()->json(['mensaje'=>'No se encuentra el hotel'],404);
        }
        $passenger = $ticket->passengers;
        return response()->json(['datos'=>$passenger],202);
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
    public function store(Request $request,$id)
    {
        if (!$request->get('rut') || !$request->get('name')) 
        {
            return response()->json(['mensaje'=>'Datos invalidos o incompletos'],404);
        }

        $ticket = Ticket::find($id);
        if (!$ticket) {
            return response()->json(['mensaje'=>'Ticket no existe'],404);
        }

        Passenger::create([
                'rut'=>$request->get('rut'),
                'name'=>$request->get('name'),
                'ticket_id'=>$id
        ]);

        return response()->json(['mensaje'=>'Passenger se a creado con exito'],201);
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
    public function destroy($idTicket,$idPassenger)
    {
        $ticket=Ticket::find($idTicket);
        if(!$ticket)
        {
            return response()->json(['mensaje'=>'Ticket no existe'],404);
        }
        $passenger =$ticket->passengers()->find($idPassenger);
        if (!$passenger) 
        {
            return response()->json(['mensaje'=>'Passenger no se encuentra asociada a Ticket'],404);
        }
        $passenger->delete();
        return response()->json(['mensaje'=>'Passenger a sido eliminada'],201);
    }
}
