<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Validator;

class PaymentController extends Controller
{
	 public function rules(){
    	return
    	[
    		'type' => 'required|string',
	    	'bank' => 'required|string',
	    	'count' => 'required|string',
	    	'quotas' => 'required|numeric',
	    	'purchase_order_id' => 'required|numeric'
    	];
    }

    public function index()
    {
    	$payments = Payment::all();
    	return $payments;
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
        
        $payments = new \App\Payment;
        $payments->type = $request->get('type');
        $payments->bank = $request->get('bank');
        $payments->count = $request->get('ticket_id');
        $payments->quotas = $request->get('quotas');
        $payments->purchase_order_id = $request->get('purchase_order_id');
        $payments->save();
        return $payments;
    }

    public function show($id)
    {
    	$payments = Payment::findOrFail($id);
    	return $payments;
    }

    public function edit(Payment $payments)
    {
    	//
    }

    public function update(Request $request, Payment $payments)
    {
    	$validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return json_encode(['outcome' => 'error']); 
        }
        
        $payments = new \App\Payment;
        $payments->type = $request->get('type');
        $payments->bank = $request->get('bank');
        $payments->count = $request->get('ticket_id');
        $payments->quotas = $request->get('quotas');
        $payments->purchase_order_id = $request->get('purchase_order_id');
        $payments->save();
        return $payments;
    }

    public function destroy(Payment $payments)
    {
    	if($payments->es_valido){
            $payments->es_valido = false;
            $payments->save();
            return json_encode(['outcome' => 'Eliminado']);
        }
        return json_encode(['outcome' => 'Hubo un error']);
    }
}
