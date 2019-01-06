<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Citie;
use App\PackageReservation;
use Validator;

class PackageController extends Controller
{
/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $packages = Package::all();
        return $packages;
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
        $verifyPackage = Package::find($request->id);
        $package = new Package();
 
        if($verifyPackage == null){
            
            $quantity  = $request->quantity;
            $name = $request->name;
            $cost = $request->cost;
            $nights = $request->nights;
            $origin_id = Citie::find($request->origin_id);
            $destination_id = Citie::find($request->destination_id);
            $package_reservation_id = PackageReservation::find($request->package_reservation_id);

            if(is_numeric($quantity) and $quantity > 0
               and is_numeric($cost) and $cost > 0
               and is_numeric($nights) and $nights > 0
               and !(is_numeric($name))
               and $origin_id != null and $destination_id != null and $package_reservation_id != null){

                $package->create([

                    'quantity' => $quantity,
                    'name' => $name,
                    'cost' => $cost,
                    'nights' => $nights,
                    'origin_id' => $origin_id,
                    'destination_id' => $destination_id,
                    'package_reservation_id' => $package_reservation_id,
                    'room_reservation_id' => $room_reservation_id
    
                ]);

               }
            else{
                return "Error en los parametros ingresados";
            }
        }
        else{
             return "El paquete ingresado ya existe";
        }
 
         return Package::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Package::find($id);
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
        $package = Package::find($id);
        $package->delete();
        return "Se ha eliminado un paquete";
    }
}
