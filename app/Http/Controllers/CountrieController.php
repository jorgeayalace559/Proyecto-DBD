<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countrie;
use Validator;

class CountrieController extends Controller
{
	 /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $country = Countrie::all();
        return $country;
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
        $verifyCountrie = Countrie::find($request->id);
        $country = new Countrie();

        if($verifyCountrie == null){

            $name = $request->name;

            if(!(is_numeric($name))){

                $country->create([
                    'name' => $request->name,

                ]);
            }
            else{
                return "Error en el ingreso de datos";
            }
        }
        else{

            $name = $request->name;

            if(!(is_numeric($name))){

                $country->updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'name' => $request->name,

                ]);
            }
        }

        return Countrie::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Countrie::find($id);
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
        $country = Countrie::find($id);
        $country->delete();
        return "Se ha eliminado un pais";
    }
}
