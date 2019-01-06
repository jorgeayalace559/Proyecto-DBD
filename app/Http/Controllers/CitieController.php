<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Citie;
use App\Countrie;
use Validator;	

class CitieController extends Controller
{
	 /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $city = Citie::all();
        return $city;
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
        $verifyCitie = Citie::find($request->id);
        $city = new Citie();

        if($verifyCitie == null){

            $name = $request->name;
            $airport_name = $request->airport_name;
            $country_id = Countrie::find($request->country_id);

            if(!(is_numeric($name)) and !(is_numeric($airport_name)) and $country_id != null){

                $city->create([
                    'name' => $request->name,
                    'airport_name' => $request->airport_name,
                    'country_id' => $request->country_id

                ]);
            }
            else{
                return "Error en el ingreso de datos";
            }
        }
        else{
            return "La ciudad ingresada ya existe";
        }

        return Citie::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Citie::find($id);
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
        $city = Citie::find($id);
        $city->delete();
        return "Se ha eliminado una ciudad";
    }
}
