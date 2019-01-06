<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Validator;

class PaymentController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $payments = Payment::all();
        return $payments;
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
         $verifyPayment = Payment::find($request->id);
         $payment = new Payment();
 
         if($verifyPayment == null){
 
             $payment->create([
                 'type' => $request->type,
    	         'bank' => $request->bank,
    	         'count' => $request->count,
    	         'quotas' => $request->quotas,
    	         'purchase_order_id' => $request->purchase_order_id
 
             ]);
         }
         else{
             return "El medio de pago ingresado ya existe";
         }
 
         return Payment::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Payment::find($id);
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
        $payment = Payment::find($id);
        $payment->delete();
        return "Se ha eliminado un medio de pago";
    }
}
