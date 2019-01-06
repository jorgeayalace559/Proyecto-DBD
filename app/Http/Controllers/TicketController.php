<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
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
    public function store(Request $request)
    {
         $verifyTicket = Ticket::find($request->id);
         $ticket = new Ticket();
 
         if($verifyTicket == null){
 
             $ticket->create([
                'cost' => $request->cost,
                'quantity_passengers'  => $request->cost,
                'flight_id'  => $request->cost,
                'ticket_reservation_id'  => $request->cost
 
             ]);
         }
         else{
             return "El ticket ingresado ya existe";
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
