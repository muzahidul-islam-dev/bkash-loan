<?php

namespace App\Http\Controllers;

use App\Service\BkashService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BkashController extends Controller
{
    protected $bkash;

    public function __construct(BkashService $bkash)
    {
        $this->bkash = $bkash;
    }

    /**
     * Start Payment (Create)
     */
    public function pay(Request $request)
    {

        // Step 1: Get token
        $tokenData = $this->bkash->grantToken();
        $token = $tokenData['id_token'] ?? null;

        if (!$token) {
            return response()->json(['error' => 'Failed to get token', 'details' => $tokenData], 500);
        }

        $invoice = "INV-" . uniqid() . time();
        $paymentData = $this->bkash->createPayment($token, $request->payment, $invoice, $request->mobileNumber);
        if (isset($paymentData['bkashURL'])) {
            return redirect($paymentData['bkashURL']);
        } else {
            return 'payment error';
        }
    }

    /**
     * Execute Payment
     */
    public function callback(Request $request)
    {

        $paymentID = $request->paymentID;

        // Step 1: Get token
        $tokenData = $this->bkash->grantToken();
        $token = $tokenData['id_token'] ?? null;

        if (!$token) {
            return response()->json(['error' => 'Failed to get token'], 500);
        }

        // Step 2: Execute payment
        $executeData = $this->bkash->executePayment($token, $paymentID);
        if (isset($executeData['statusCode']) == "2056") {
            return redirect('/');
        }
        return view('front-end.success');
    }

    /**
     * Query Payment
     */
    public function queryPayment(Request $request)
    {
        $paymentID = $request->paymentID;

        $tokenData = $this->bkash->grantToken();
        $token = $tokenData['id_token'] ?? null;

        $queryData = $this->bkash->queryPayment($token, $paymentID);

        return response()->json($queryData);
    }

    // public function callback()
    // {
    // }
}
