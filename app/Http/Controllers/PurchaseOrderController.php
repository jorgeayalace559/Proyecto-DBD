<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseOrder;
use Validator;

class PurchaseOrderController extends Controller
{
	 public function rules(){
    	return
    	[
    		'cost' => 'required|numeric',
    		'date' => 'required|string',
    		'user_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$purchaseorders = PurchaseOrder::all();
    	return $purchaseorders;
    }

    public function create(Request $request)
    {
    	//
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages(); 
        }
        
        $purchaseorders = new \App\PurchaseOrder;
        $purchaseorders->cost = $request->get('cost');
        $purchaseorders->date = $request->get('date');
        $purchaseorders->user_id = $request->get('user_id');
        $purchaseorders->save();
        return $purchaseorders;
    }

    public function show($id)
    {
    	$purchaseorders = PurchaseOrder::findOrFail($id);
    	return $purchaseorders;
    }

    public function edit(PurchaseOrder $purchaseorders)
    {
    	//
    }

    public function update(Request $request, PurchaseOrder $purchaseorders)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $purchaseorders = new \App\PurchaseOrder;
        $purchaseorders->cost = $request->get('cost');
        $purchaseorders->date = $request->get('date');
        $purchaseorders->user_id = $request->get('user_id');
        $purchaseorders->save();
        return $purchaseorders;
    }

    public function destroy(PurchaseOrder $purchaseorders)
    {
    	if($purchaseorders->es_valido){
            $purchaseorders->es_valido = false;
            $purchaseorders->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}