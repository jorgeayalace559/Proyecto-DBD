<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insurance;
use App\Citie;
use App\InsuranceReservation;
use Validator;

class InsuranceController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $insurances = Insurance::all();
        return $insurances;
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
        $verifyInsurance = Insurance::find($request->id);
        $insurance = new Insurance();

        if($verifyInsurance == null){

            $age = $request->age;
            $type = $request->type;
            $city = Citie::find($request->city);
            $insurance_reservation_id = InsuranceReservation::find($request->insurance_reservation_id);

             if($age > 17 and $age < 100 and !(is_numeric($type)) and $city != null and $insurance_reservation_id != null){

                $insurance->updateOrCreate([
                    'age' => $request->age,
                    'type' => $request->type,
                    'city' => $request->city,
                    'insurance_reservation_id' => $request->insurance_reservation_id

                ]);
            }
            else{
                return "Error en el ingreso de parametros";
            }
        }
        else{
            $age = $request->age;
            $type = $request->type;
            $city = $request->city;
            $insurance_reservation_id = InsuranceReservation::find($request->insurance_reservation_id);

             if($age > 17 and $age < 100 and !(is_numeric($type)) and $city != null and $insurance_reservation_id != null){

                $insurance->updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'age' => $request->age,
                    'type' => $request->type,
                    'city' => $request->city,
                    'insurance_reservation_id' => $request->insurance_reservation_id

                ]);
            }
            else{
                return "Error en el ingreso de parametros";
            }
        }

        return Insurance::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Insurance::find($id);
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
        $insurances = Insurance::find($id);
        $insurances->delete();
        return "Se ha eliminado un seguro";
    }
}

