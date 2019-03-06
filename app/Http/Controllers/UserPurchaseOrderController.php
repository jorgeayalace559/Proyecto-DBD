<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseOrder;
use App\User;

class UserPurchaseOrderController extends Controller
{
    /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index($id)
    {
        $user = User::find($id);      
        if (!$user) {
        	return response()->json(['mensaje'=>'No se encuentra el hotel'],404);
        }
        $purchaseOrder = $user->purchaseOrders;
        return response()->json(['datos'=>$purchaseOrder],202);
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
        if (!$request->get('cost') || !$request->get('date')) 
        {
            return response()->json(['mensaje'=>'Datos invalidos o incompletos'],404);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json(['mensaje'=>'Usuario no existe'],404);
        }

        PurchaseOrder::create([
                'cost'=>$request->get('cost'),
                'date'=>$request->get('date'),
                'user_id'=>$id
        ]);

        return response()->json(['mensaje'=>'PurchaseOrder se a creado con exito'],201);
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
    public function destroy($idUser,$idPurchaseOrder)
    {
        $user=User::find($idUser);
        if(!$user)
        {
            return response()->json(['mensaje'=>'User no existe'],404);
        }
        $purchaseOrder =$user->purchaseOrders()->find($idPurchaseOrder);
        if (!$purchaseOrder) 
        {
            return response()->json(['mensaje'=>'PurchaseOrder no se encuentra asociada a User'],404);
        }
        $purchaseOrder->delete();
        return response()->json(['mensaje'=>'PurchaseOrder a sido eliminada'],201);
    }
}
