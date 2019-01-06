<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackageReservation;
use Validator;

class PackageReservationController extends Controller
{
	 /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $packageReservations = PackageReservation::all();
        return $packageReservations;
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
         $verifyPackageReservation = PackageReservation::find($request->id);
         $packageReservation = new PackageReservation();
 
         if($verifyPackageReservation == null){
 
             $packageReservation->create([
                 'cost' => $request->cost,
    	         'begin_date' => $request->begin_date,
    	         'end_date' => $request->end_date,
    	         'purchase_order_id'=> $request->purchase_order_id
 
             ]);
         }
         else{
             return "La reserva de paquete ya existe";
         }
 
         return PackageReservation::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PackageReservation::find($id);
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
        $packageReservation = PackageReservation::find($id);
        $packageReservation->delete();
        return "Se ha eliminado una reserva de paquete";
    }
}
