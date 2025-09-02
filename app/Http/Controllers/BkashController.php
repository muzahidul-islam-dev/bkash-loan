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
        $paymentData = $this->bkash->createPayment($token, $request->payment, $invoice);
        return $paymentData;
    }

    /**
     * Execute Payment
     */
    public function executePayment(Request $request)
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

        return response()->json($executeData);
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
}
