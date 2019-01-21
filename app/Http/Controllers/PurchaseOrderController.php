<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseOrder;
use App\User;
use Validator;

class PurchaseOrderController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $purchaseOrders = PurchaseOrder::all();
        return $purchaseOrders;
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
        $verifyPurchaseOrder = PurchaseOrder::find($request->id);
        $purchaseOrder = new PurchaseOrder();
 
        if($verifyPurchaseOrder == null){
 
            $cost = $request->cost;
            $date = $request->fecha;            //CON DATE NO FUNCIONA, DEBE ESTAR RESERVADO
            $user_id = $request->user_id;
 
            if(is_numeric($cost) and $cost > 0 
                and $user_id != null){
                
                $purchaseOrder->updateOrCreate([
                    
                    'cost' => $cost,
                    'date' => $date,
                    'user_id' => $request->user_id
         
                ]);
            }

            else{
                return "Error en los parametros ingresados";
            }

        }
        else{
            $cost = $request->cost;
            $date = $request->fecha;
            $user_id = $request->user_id;
 
            if(is_numeric($cost) and $cost > 0 
                and $user_id != null){
                
                $purchaseOrder->updateOrCreate([
                    'id' => $request->id
                ],
                [
                    
                    'cost' => $cost,
                    'date' => $date,
                    'user_id' => $request->user_id
         
                ]);
            }

            else{
                return "Error en los parametros ingresados";
            }
        }
 
        return PurchaseOrder::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PurchaseOrder::find($id);
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
        $purchaseOrder = PurchaseOrder::find($id);
        $purchaseOrder->delete();
        return "Se ha una orden de compra";
    }
}