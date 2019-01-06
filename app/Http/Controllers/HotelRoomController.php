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
    public function store(Request $request)
    {
        $verifyHotel = Hotel::find($request->id);
        $hotels = new Hotel();

        if($verifyHotel == null){

            $hotels->create([
                'stars' => $request->stars,
                'capacity' => $request->capacity,
                'name' => $request->name

            ]);
        }
        else{
            return "El hotel ingresado ya existe";
        }

        return Hotel::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Hotel::find($id);
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
        $hotels = Hotel::find($id);
        $hotels->delete();
        return "Se ha eliminado un hotel";
    }
}
