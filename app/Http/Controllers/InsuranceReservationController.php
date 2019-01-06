<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsuranceReservation;
use Validator;

class InsuranceReservationController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $insurance_reservations = InsuranceReservation::all();
        return $insurance_reservations;
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
        $verifyInsuranceReservation = InsuranceReservation::find($request->id);
        $insurance_reservations = new InsuranceReservation();

        if($verifyInsuranceReservation == null){

            $insurance_reservations->create([
                'cost' => $request->cost,
                'begin_date' => $request->begin_date,
                'end_date' => $request->end_date,
                'purchase_order_id' => $request->purchase_order_id,
                'package_id' => $request->package_id

            ]);
        }
        else{
            return "La reserva de seguro ingresada ya existe";
        }

        return InsuranceReservation::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return InsuranceReservation::find($id);
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
        $insurance_reservations = InsuranceReservation::find($id);
        $insurance_reservations->delete();
        return "Se ha eliminado una reserva de seguro";
    }
}

