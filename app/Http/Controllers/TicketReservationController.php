<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TicketReservation;
use App\PurchaseOrder;
use App\Package;
use Validator;

class TicketReservationController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $ticketReservation = TicketReservation::all();
        return $ticketReservation;
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
        $verifyTicketReservation = TicketReservation::find($request->id);
        $ticketReservation = new TicketReservation();
 
        if($verifyTicketReservation == null){
 
            $cost = $request->cost;
            $date = $request->date;
            $purchase_order_id = PurchaseOrder::find($request->purchase_order_id);
            $package_id = Package::find($request->package_id);

            if(is_numeric($cost) and $cost > 0
               and $purchase_order_id != null and $package_id != null){

                $ticketReservation->create([
                    'cost' => $cost,
                    'date' => $date,
                    'purchase_order_id' => $request->purchase_order_id,
                    'package_id' => $request->package_id
     
                ]);

            }

            else{
                return "Error en los parametros ingresados";
            }
           
        }
        else{
            return "La reserva del ticket ingresado ya existe";
        }
 
        return TicketReservation::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TicketReservation::find($id);
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
        $ticketReservation = TicketReservation::find($id);
        $ticketReservation->delete();
        return "Se ha eliminado una reserva de ticket";
    }
}
