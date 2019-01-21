<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\TicketReservation;
use App\Flight;
use Validator;

class TicketController extends Controller
{
	 /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
    
        $tickets = Ticket::all();
        return $tickets;
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
        $verifyTicket = Ticket::find($request->id);
        $ticket = new Ticket();
 
        if($verifyTicket == null){
 
            $cost = $request->cost;
            $quantity_passengers  = $request->quantity_passengers;
            $flight_id  = Flight::find($request->flight_id);
            $ticket_reservation_id  = TicketReservation::find($request->ticket_reservation_id);

            if(is_numeric($cost) and $cost > 0
            and is_numeric($quantity_passengers) and $quantity_passengers > 0
            and $flight_id != null and $ticket_reservation_id != null){

                $ticket->updateOrCreate([
                    'cost' => $cost,
                    'quantity_passengers'  => $quantity_passengers,
                    'flight_id'  => $request->flight_id,
                    'ticket_reservation_id'  => $request->ticket_reservation_id
     
                ]);

            }

            else{
                return "Error en los parametros ingresados";
            }

        }
        else{
            $cost = $request->cost;
            $quantity_passengers  = $request->quantity_passengers;
            $flight_id  = $request->flight_id;
            $ticket_reservation_id  = $request->ticket_reservation_id;

            if(is_numeric($cost) and $cost > 0
            and is_numeric($quantity_passengers) and $quantity_passengers > 0
            and $flight_id != null and $ticket_reservation_id != null){

                $ticket->updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'cost' => $cost,
                    'quantity_passengers'  => $quantity_passengers,
                    'flight_id'  => $request->flight_id,
                    'ticket_reservation_id'  => $request->ticket_reservation_id
     
                ]);

            }

            else{
                return "Error en los parametros ingresados";
            }
        }
 
        return Ticket::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Ticket::find($id);
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
        $tickets = Ticket::find($id);
        $tickets->delete();
        return "Se ha eliminado un ticket";
    }
}
