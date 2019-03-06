<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Room;

class HotelRoomController extends Controller
{
    /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index($id)
    {
        $hotel = Hotel::find($id);      
        if (!$hotel) {
        	return response()->json(['mensaje'=>'No se encuentra el hotel'],404);
        }
        $room = $hotel->rooms;
        return response()->json(['datos'=>$room],202);
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
    public function store(Request $request,$id)
    {
        if (!$request->get('number') || !$request->get('capacity') || !$request->get('cost')|| !$request->get('type')) 
        {
            return response()->json(['mensaje'=>'Datos invalidos o incompletos'],404);
        }

        $hotel = Hotel::find($id);
        if (!$hotel) {
            return response()->json(['mensaje'=>'Hotel no existe'],404);
        }

        Room::create([
                'number'=>$request->get('number'),
                'capacity'=>$request->get('capacity'),
                'cost'=>$request->get('cost'),
                'type'=>$request->get('type'),
                'hotel_id'=>$id
        ]);

        return response()->json(['mensaje'=>'Room se a creado con exito'],201);
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
    public function destroy($idHotel,$idRoom)
    {
        $hotel=Hotel::find($idHotel);
        if(!$hotel)
        {
            return response()->json(['mensaje'=>'Hotel no existe'],404);
        }
        $room =$hotel->rooms()->find($idRoom);
        if (!$room) 
        {
            return response()->json(['mensaje'=>'Room no se encuentra asociada a hotel'],404);
        }
        $room->delete();
        return response()->json(['mensaje'=>'Room a sido eliminada'],201);
    }
}
