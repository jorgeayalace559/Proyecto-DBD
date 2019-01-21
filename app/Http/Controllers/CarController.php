<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Citie;
use App\CarReservation;
use Validator;

class CarController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $cars = Car::all();
        return view('car.show',['cars'=> $cars]);
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
        $verifyCar = Car::find($request->id);
        $cars = new Car();

        if($verifyCar == null){

            $capacity = $request->capacity;
            $city_id = Citie::find($request->city_id);
            $patent = $request->patent;
            $car_reservation_id = CarReservation::find($request->car_reservation_id);

            if($city_id != null and $car_reservation_id != null and $patent != null and $capacity > 1 and $capacity < 9){

                $cars->updateOrCreate([
                    'capacity' => $request->capacity,
                    'city_id' => $request->city_id,
                    'patent' => $request->patent,
                    'car_reservation_id' => $request->car_reservation_id

                ]);
            }
            else{
                return "Error en los parametros ingresados";
            }
        }
        else{

            $capacity = $request->capacity;
            $city_id = Citie::find($request->city_id);
            $patent = $request->patent;
            $car_reservation_id = CarReservation::find($request->car_reservation_id);

            if($city_id != null and $car_reservation_id != null and $patent != null and $capacity > 1 and $capacity < 9){

                $cars->updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'capacity' => $request->capacity,
                    'city_id' => $request->city_id,
                    'patent' => $request->patent,
                    'car_reservation_id' => $request->car_reservation_id

                ]);
            }
            else{
                return "Error en los parametros ingresados";
            }
        }

        return Car::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Car::find($id);
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
        $cars = Car::find($id);
        $cars->delete();
        return "Se ha eliminado un auto";
    }
}
