<?php

namespace App\Http\Controllers;

use App\Models\PaymentRequest;
use Illuminate\Http\Request;

class PaymentRequestController extends Controller
{
    public function all(){
        $paymentRequests = PaymentRequest::all();
        return view('admin.pages.payment-request.all', compact('paymentRequests'));
    }

    public function paymentRequest(Request $request){
        $request->validate([
            'name'  => 'required|string'
        ]);
    }
}
