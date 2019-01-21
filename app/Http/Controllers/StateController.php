<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Flight;
use Validator;

class StateController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $states = State::all();
        return view('state.show',['states'=> $states]);
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
        $verifyState = State::find($request->id);
        $state = new State();
    
        if($verifyState == null){
 
            $condition = $request->condition;
            $flight_id = Flight::find($request->flight_id);

            if(!(is_numeric($condition)) and $flight_id != null){

                $state->updateOrCreate([
                    'condition' => $condition,
                    'flight_id' => $request->flight_id
     
                ]);

            }

            else{
                return "Error en los parametros ingresados";
            }
            
        }
        else{
            $verifyState = State::find($request->id);
            $state = new State();
        
            if($verifyState == null){
    
                $condition = $request->condition;
                $flight_id = Flight::find($request->flight_id);

                if(!(is_numeric($condition)) and $flight_id != null){

                    $state->updateOrCreate([
                        'id' => $request->id
                    ],
                    [
                        'condition' => $condition,
                        'flight_id' => $request->flight_id
        
                    ]);

                }

                else{
                    return "Error en los parametros ingresados";
                }
            }
        }
 
         return State::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return State::find($id);
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
        $state = State::find($id);
        $state->delete();
        return "Se ha eliminado un estado";
    }
}
