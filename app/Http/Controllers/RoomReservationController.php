<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomReservation;
use App\PurchaseOrder;
use App\Package;
use Validator;

class RoomReservationController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $roomReservations = RoomReservation::all();
        return $roomReservations;
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
        $verifyRoomReservation = RoomReservation::find($request->id);
        $roomReservation = new RoomReservation();
 
        if($verifyRoomReservation == null){
 
            $cost = $request->cost;
            $begin_date = $request->begin_date;
            $end_date = $request->end_date;
            $purchase_order_id = PurchaseOrder::find($request->purchase_order_id);
            $package_id = Package::find($request->package_id);

            if(is_numeric($cost) and $cost > 0
               and $end_date > $begin_date
               and $purchase_order_id != null and $package_id != null){

                $roomReservation->create([
                    'cost' => $cost,
                    'begin_date' => $begin_date,
                    'end_date' => $end_date,
                    'day' => $day,
                    'room_id' => $room_id,
                    'purchase_order_id' => $request->purchase_order_id    
                ]);

            }

            else{
                return "Error en los parametros ingresados";
            }
            
        }
         else{
            return "La reserva de habitación ingresada ya existe";
        }
 
        return RoomReservation::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RoomReservation::find($id);
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
        $roomReservation = RoomReservation::find($id);
        $roomReservation->delete();
        return "Se ha eliminado una reserva de habitacion";
    }
}
