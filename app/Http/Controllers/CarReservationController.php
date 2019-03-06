<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarReservation;
use App\PurchaseOrder;
use App\Package;
use Validator;

class CarReservationController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $carReservations = CarReservation::all();
        return $carReservations;
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
        $verifyCarReservation = CarReservation::find($request->id);
        $carReservations = new CarReservation();

        if($verifyCarReservation == null){

            $cost = $request->cost;
            $begin_date = $request->begin_date;
            $end_date = $request->end_date;
            $purchase_order_id = PurchaseOrder::find($request->purchase_order_id);
            $package_id = Package::find($request->package_id);

            if($cost > 0 and $purchase_order_id != null and $package_id != null){

                $carReservations->create([
                    'cost' => $request->cost,
                    'begin_date' => $request->begin_date,
                    'end_date' => $request->end_date,
                    'purchase_order_id' => $request->purchase_order_id,
                    'package_id' => $request->package_id

                ]);
            }
            else{
                return "Error en los parametros ingresados";
            }
        }
        else{
            return "La reserva ingresada ya existe";
        }

        return CarReservation::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CarReservation::find($id);
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
        $carReservations = CarReservation::find($id);
        $carReservations->delete();
        return "Se ha eliminado una reserva de auto";
    }
}
