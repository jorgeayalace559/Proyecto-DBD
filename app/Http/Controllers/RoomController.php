<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Hotel;
use App\RoomReservation;
use Validator;

class RoomController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $room = Room::all();
        return $room;
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
        $verifyRoom = Room::find($request->id);
        $room = new Room();
 
        if($verifyRoom == null){
 
            $number = $request->number;
            $capacity = $request->capacity;
            $cost = $request->cost;
            $type = $request->type;
            $hotel_id = Hotel::find($request->hotel_id);
            $room_reservation_id = RoomReservation::find($request->room_reservation_id);

            if(is_numeric($number) and $number > 0
               and is_numeric($capacity) and $capacity > 0 and $capacity < 8
               and is_numeric($cost) and $cost > 0
               and !(is_numeric($type))
               and $hotel_id != null and $room_reservation_id != null){

                $room->create([
                    'number' => $number,
                    'capacity' => $capacity,
                    'cost' => $cost,
                    'type' => $type,
                    'hotel_id' => $request->hotel_id,
                    'room_reservation_id' => $request->room_reservation_id
     
                ]);

            }

            else{
                return "Error en los parametros ingresados";
            }            
        }
        else{
            return "La habtiacion ingresada ya existe";
        }
 
        return Room::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Room::find($id);
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
        $room = Room::find($id);
        $room->delete();
        return "Se ha eliminado una habitacion";
    }
}