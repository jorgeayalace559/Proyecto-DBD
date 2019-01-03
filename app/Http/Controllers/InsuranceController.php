<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insurance;
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
    public function store(Request $request)
    {
        return Insurance::create($request->all());
    }
<<<<<<< Updated upstream

    public function show($id)
    {
    	$insurances = Insurance::findOrFail($id);
        return $insurances;
=======
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Insurance::find($id);
>>>>>>> Stashed changes
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

