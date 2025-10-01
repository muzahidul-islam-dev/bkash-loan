<?php

namespace App\Http\Controllers;

use App\Models\PaymentRequest;
use Illuminate\Http\Request;

class PaymentRequestController extends Controller
{
    public function all()
    {
        $paymentRequests = PaymentRequest::with('service')->get();
        return view('admin.pages.payment-request.all', compact('paymentRequests'));
    }

    public function paymentRequest(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
            'payment' => 'required',
            'mobileNumber' => 'required',
        ]);

        $paymentInfo = PaymentRequest::where('phone_number', $request->mobileNumber)->first();
        if ($paymentInfo) {
            $result = $paymentInfo;
        } else {
            $data['service_id'] = $request->input('service_id');
            $data['phone_number'] = $request->input('mobileNumber');
            $data['amount'] = $request->input('payment');
            $result = PaymentRequest::create($data);
        }



        return view('redirect', compact('result'));
    }

    public function checkRequest(Request $request)
    {
        if ($request->phone_number) {
            $result = PaymentRequest::where('phone_number', $request->phone_number)->first();
            if ($result?->payment_link) {
                if ($result?->payment_link) {
                    $payment_link = $result->payment_link;
                    $result->delete();
                    return Response()->json([
                        'payment' => $payment_link
                    ]);
                } else {
                    return Response()->json([
                        'payment' => null
                    ]);
                }

            } else {
                return Response()->json([
                    'payment' => null
                ]);
            }
        } else {
            return Response()->json('Requeired Paramiter is missing');
        }
    }

    public function updateURL(Request $request)
    {
        $payment = PaymentRequest::find($request->payment_id);
        if ($payment) {
            $payment->update([
                'payment_link' => $request->payment_url,
            ]);

            return Response()->json([
                'message' => 'Update Successfully'
            ]);
        }
    }
}
